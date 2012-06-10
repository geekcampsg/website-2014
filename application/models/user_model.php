<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    public function choose_collection(){
        $this->load-> model('core_model');
        return $this->core_model->connect_to_db()->users;
    }

    public function create_new_user($email, $hashed_password, $instagram_user_id ='', $instagram_auth_token = '', $instagram_username = '', $dropbox_auth_token = '', $dropbox_token_secret=''){
        if($this->check_dup($email)){
            $collection = $this->choose_collection();
            $user = array(
                'email' => (string)$email,
                'password' => (string)$hashed_password,
                'instagram_user_id' => (string)$instagram_user_id,
                'instagram_auth_token' => (string)$instagram_auth_token,
                'instagram_username' => (string)$instagram_username,
                'dropbox_auth_token' => (string)$dropbox_auth_token,
                'dropbox_token_secret' => (string)$dropbox_token_secret,
                'photos_synced' => 0,
                'photos_synced_this_month' => 0,
                'first_sync' => 0,
                'type' => 'user',
            );
            $settings = array('fsync' => true);
            $collection->insert($user, $settings);
            return $user['_id'];
        }
    }

    public function insert_instagram_auth_token($_id, $instagram_user_id, $instagram_auth_token, $instagram_username){
        $collection = $this->choose_collection();
        $query = array('_id' => $_id);
        $update = array('$set' => array('instagram_user_id'=> (string)$instagram_user_id, 
            'instagram_auth_token' => (string)$instagram_auth_token,
            'instagram_username' => (string)$instagram_username,
        ));
        $settings = array('fsync' => true);
        $collection->update($query, $update, $settings);
    }

    public function insert_dropbox_auth_token($_id, $dropbox_auth_token, $dropbox_token_secret){
        $collection = $this->choose_collection();
        $query = array('_id' => $_id);
        $update = array('$set' => array('dropbox_auth_token' => (string)$dropbox_auth_token, 'dropbox_token_secret' => (string)$dropbox_token_secret));
        $settings = array('fsync' => true);
        $collection->update($query, $update, $settings);
    }

    public function add_password_reset_key($email){
        $collection = $this->choose_collection();
        $this->load->helper('security');

        $ts = time();
        $key = do_hash($ts.$email);

        $query = array('email' => (string)$email);
        $update = array('$set' => array('password_reset_time' => new MongoDate($ts),
            'password_reset_key' => $key));
        $settings = array('fsync' => TRUE);
        $collection->update($query, $update, $settings);
        return $key;
    }

    public function get_all_users(){
        $collection = $this->choose_collection();
        return $collection->find()->sort(array('type' => 1, 'email' => 1));
    }

    public function get_user($email, $hashed_password){
        $collection = $this->choose_collection();
        $query = array('email' => (string)$email, 'password' => (string)$hashed_password);
        $fields = array('_id' => TRUE);
        $result = $collection->findOne($query);
        if($result == NULL){
            return FALSE;
        }
        else{
            return $result;
        }
    }

    public function get_user_by__id($_id){
        $collection = $this->choose_collection();
        $query = array('_id' => $_id);
        $result = $collection->findOne($query);
        if($result == NULL){
            return FALSE;
        }
        else{
            return $result;
        }
    }

    public function get_user_with_zero_sync(){
        $collection = $this->choose_collection();
        $query = array('first_sync' => 0, 'dropbox_auth_token' => array('$ne' => ''));
        $fields = array('_id' => TRUE, 
            'instagram_user_id' => TRUE, 
            'instagram_auth_token' => TRUE, 
            'dropbox_auth_token' => TRUE, 
            'dropbox_token_secret' => TRUE, 
            'photos_synced' => TRUE,
            'photos_synced_this_month' => TRUE);
        $result = $collection->findOne($query, $fields);
        $query = array('_id' => $result['_id']);
        $update = array('$unset' => array('first_sync' => 1));
        $settings = array('fsync' => true);
        $collection->update($query, $update, $settings);
        return $result;
    }

    public function get_user_by_instagram_user_id($instagram_user_id){
        $collection = $this->choose_collection();
        $query = array('instagram_user_id' => $instagram_user_id);
        $fields = array('_id' => TRUE, 
            'instagram_user_id' => TRUE, 
            'instagram_auth_token' => TRUE, 
            'dropbox_auth_token' => TRUE, 
            'dropbox_token_secret' => TRUE);
        $result = $collection->findOne($query, $fields);
        return $result;
    }


    public function get_sync_count($_id){
        $collection = $this->choose_collection();
        $query = array('_id' => $_id);
        $fields = array('_id' => TRUE, 
            'photos_synced' => TRUE,
            'photos_synced_this_month' => TRUE);
        $result = $collection->findOne($query, $fields);
        return $result;
    }

    public function update_password($password, $key){
        $collection = $this->choose_collection();
        $time = new MongoDate(time() - 600);
        $query = array('password_reset_key' => (string)$key, 'password_reset_time' => array('$gte' => $time));
        $update = array('$set' => array('password' => (string)$password),
            '$unset' => array('password_reset_key' => 1, 'password_reset_time' => 1));
        $settings = array('fsync' => true);
        $collection->update($query, $update, $settings);
    }

    public function update_count($_id, $count){
        $collection = $this->choose_collection();
        $query = array('_id' => $_id); 
        $update = array('$inc' => array('photos_synced' => $count, 'photos_synced_this_month' => $count));
        $settings = array('fsync' => true);
        $result = $collection->update($query, $update, $settings);
    }

    public function remove_reset_links(){
        $collection = $this->choose_collection();
        $time = new MongoDate(time() - 6);
        $query = array('password_reset_time' => array('$lt' => $time));
        $update = array('$unset' => array('password_reset_key' => 1, 'password_reset_time' => 1));
        $settings = array('multiple' => true,'fsync' => true);
        $collection->update($query, $update, $settings);
    }

    public function reset_monthly_sync_count(){
        $collection = $this->choose_collection();
        $query = array('first_sync' => array('$ne' => 0));
        $fields = array('photos_synced_this_month' => true);
        $all_users = $collection->find($query, $fields);
        $num_photos = 0;
        foreach ($all_users as $user) {
            $num_photos = $num_photos + $user['photos_synced_this_month'];
        }
        $update = array('$set' => array('photos_synced_this_month' => 0));
        $settings = array('multiple' => true, 'fsync' => true);
        $collection->update($query, $update, $settings);

        $this->load->model('analytics_model');
        $this->analytics_model->update_monthly_sync_count($num_photos);
    }

    public function check_dup($email){
        $collection = $this->choose_collection();
        $query = array('email' => $email);
        $cursor = $collection->find($query);
        return ($cursor->count(true) == 0);
    }
}