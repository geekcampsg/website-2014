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

    public function get_all_talks_for_current_year(){
        $collection = $this->choose_collection();
        $query = array(
            'year' => (int)date('Y'),
        );
        return $collection->find($query);
    }

    public function create_talk($title, $description, $speaker_name, $email, $twitter){
        $collection = $this->choose_collection();
        $talk = array(
            'title' => (string)$title,
            'description' => (string)$description,
            'speaker_name' => (string)$speaker_name,
            'email' => (string)$email,
            'twitter_handle' => (string)$twitter,
            'published' => TRUE,
            'year' => (int)date('Y'),
        );
        $settings = array('fsync' => TRUE);
        $collection->insert($talk, $settings);
    }

    public function edit_talk($title, $description, $speaker_name, $twitter){
        $collection = $this->choose_collection();
        $query = array('title' => (string)$title);
        $update = array('$set' => array(
            'description' => (string)$description,
            'speaker_name' => (string)$speaker_name,
            'twitter_handle' => (string)$twitter_handle,
        ));
        $settings = array('fsync' => TRUE, 'upsert' => TRUE);
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