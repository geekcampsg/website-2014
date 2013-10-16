<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	public function choose_collection(){
		$this->load-> model('core_model');
		return $this->core_model->connect_to_db()->users;
	}

	public function create_new_user($email, $password){
		if($this->check_dup($email)){
			$this->load->library('hash_lib');
			$this->load->helper('security');
			$salt = $this->hash_lib->generate_random_string();

			$collection = $this->choose_collection();
			$user = array(
				'email' => (string)$email,
				'password' => (string)'$'.$salt.'$'.do_hash($salt.$password),
				'type' => 'user',
			);
			$settings = array('safe' => MONGO_SAFE_LEVEL);
			$collection->insert($user, $settings);
			return $user['_id'];
		}
	}

	public function add_password_reset_key($email){
		$collection = $this->choose_collection();
		$this->load->helper('security');

		$ts = time();
		$key = do_hash($ts.$email);

		$query = array('email' => (string)$email);
		$update = array('$set' => array('password_reset_time' => new MongoDate($ts),
			'password_reset_key' => $key));
		$settings = array('safe' => MONGO_SAFE_LEVEL);
		$collection->update($query, $update, $settings);
		return $key;
	}

	public function get_all_users(){
		$collection = $this->choose_collection();
		return $collection->find()->sort(array('type' => 1, 'email' => 1));
	}

	public function get_user($email, $password){
		$collection = $this->choose_collection();
		$query = array('email' => (string)$email);
		$fields = array('_id' => TRUE, 'password' => TRUE);
		$result = $collection->findOne($query);
		if($result == NULL){
			return FALSE;
		}
		else{
			$this->load->helper('security');
			$components = explode('$', $result['password']);
			if(isset($components[2]) && do_hash($components[1].$password) == $components[2]){
				return $result;
			}
			else{
				return FALSE;
			}
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

	public function update_password($password, $key){
		$collection = $this->choose_collection();
		$this->load->library('hash_lib');
		$this->load->library('security');
		$salt = $this->hash_lib->generate_random_string();
		$time = new MongoDate(time() - 600);
		$query = array('password_reset_key' => (string)$key, 'password_reset_time' => array('$gte' => $time));
		$update = array('$set' => array('password' => (string)'$'.$salt.'$'.do_hash($salt.$password)),
			'$unset' => array('password_reset_key' => 1, 'password_reset_time' => 1));
		$settings = array('safe' => MONGO_SAFE_LEVEL);
		$collection->update($query, $update, $settings);
	}


	public function remove_reset_links(){
		$collection = $this->choose_collection();
		$time = new MongoDate(time() - 6);
		$query = array('password_reset_time' => array('$lt' => $time));
		$update = array('$unset' => array('password_reset_key' => 1, 'password_reset_time' => 1));
		$settings = array('multiple' => true,'fsync' => true);
		$collection->update($query, $update, $settings);
	}

	public function check_dup($email){
		$collection = $this->choose_collection();
		$query = array('email' => $email);
		$cursor = $collection->find($query);
		return ($cursor->count(true) == 0);
	}
}