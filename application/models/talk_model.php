<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talk_model extends CI_Model {
    public function choose_collection(){
        $this->load-> model('core_model');
        return $this->core_model->connect_to_db()->talks;
    }

    public function get_all_published_talks_for_current_year(){
        $collection = $this->choose_collection();
        $query = array(
            'year' => (int)date('Y'),
            'published' => TRUE,
        );
        return $collection->find($query);
    }

    public function get_all_talks($page, $count){
        $collection = $this->choose_collection();
        $query = array();
        return $collection->find($query)
                            ->sort(array('year' => -1))
                            ->skip($page * $count)
                            ->limit($count);
    }
    public function get_number_of_talks(){
        $collection = $this->choose_collection();
        return $collection->find()->count();
    }

    public function get_talk_by__id($id){
        $id = new MongoID($id);
        $collection = $this->choose_collection();
        $query = array('_id' => $id);
        return $collection->findOne($query);
    }

    public function create_talk($title, $description, $speaker_name, $email, $website, $twitter){
        $collection = $this->choose_collection();
        if($website && strpos($website,'https://') === FALSE && strpos($website,'http://') === FALSE){
            $website = 'http://'.$website;
        }
        $talk = array(
            'title' => (string)$title,
            'description' => (string)$description,
            'speaker_name' => (string)$speaker_name,
            'email' => (string)$email,
            'website' => (string)$website,
            'twitter_handle' => (string)$twitter,
            'published' => TRUE,
            'year' => (int)date('Y'),
        );
        $settings = array('fsync' => TRUE);
        $collection->insert($talk, $settings);
    }

    public function edit_talk($_id, $title, $description, $speaker_name, $email, $website, $twitter){
        $collection = $this->choose_collection();
        $query = array('_id' => new MongoID($_id));
        $update = array('$set' => array(
            'title' => (string)$title,
            'description' => (string)$description,
            'speaker_name' => (string)$speaker_name,
            'email' => (string)$email,
            'website' => (string)$website,
            'twitter_handle' => (string)$twitter,
        ));
        $settings = array('fsync' => TRUE);
        $collection->update($query, $update, $settings);
    }

    public function unpublish_talk($id){
        $collection = $this->choose_collection();
        $query = array('_id' => new Mongo($id));
        $update = array('$set' => array(
            'published' => FALSE,
        ));
        $settings = array('fsync' => TRUE);
        $collection->update($query, $update, $settings);
    }

    public function publish_talk($id){
        $collection = $this->choose_collection();
        $query = array('_id' => new Mongo($id));
        $update = array('$set' => array(
            'published' => TRUE,
        ));
        $settings = array('fsync' => TRUE);
        $collection->update($query, $update, $settings);
    }

    public function delete_talk($id){
        $collection = $this->choose_collection();
        $query = array(
            '_id' => new Mongo($id),
            'published' => FALSE,
        );
        $settings = array('fsync' => TRUE);
        $collection->remove($query, $settings);
    }
}