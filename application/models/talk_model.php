<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talk_model extends CI_Model {
    //basic function for choosing collection for all functions of this class
    public function choose_collection(){
        $this->load-> model('core_model');
        return $this->core_model->connect_to_db()->talks;
    }

    /*******************
     * Returns a MongoCursor to all published talks for current year
    *******************/
    public function get_all_published_talks_for_current_year(){
        $collection = $this->choose_collection();
        $query = array(
            'year' => (int)date('Y'),
            'published' => TRUE,
        );
        return $collection->find($query)
                            ->sort(array('_id' => -1));
    }

    /*******************
     * Returns a MongoCursor to all talks
     * Limited by count and starting for page number
    *******************/
    public function get_all_talks($page, $count){
        $collection = $this->choose_collection();
        $query = array();
        return $collection->find($query)
                            ->sort(array('year' => -1))
                            ->skip($page * $count)
                            ->limit($count);
    }

    /*******************
     * Returns an int to the number of talks in total
    *******************/
    public function get_number_of_talks(){
        $collection = $this->choose_collection();
        return $collection->find()->count();
    }

    /*******************
     * Returns a Array for current talk with $id
     * $id is an int, NOT MongoID
    *******************/
    public function get_talk_by__id($id){
        $id = new MongoID($id);
        $collection = $this->choose_collection();
        $query = array('_id' => $id);
        return $collection->findOne($query);
    }

    /*******************
     * Creates a published talk
    *******************/
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
        $settings = array('safe' => MONGO_SAFE_LEVEL);
        $collection->insert($talk, $settings);
    }

    /*******************
     * Updates an already existing talk
     * $id is an int, NOT MongoID
    *******************/
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
        $settings = array('safe' => MONGO_SAFE_LEVEL);
        $collection->update($query, $update, $settings);
    }

    /*******************
     * Updates an already existing talk
     * $id is an int, NOT MongoID
    *******************/
    public function edit_talk_admin($_id, $title, $description, $speaker_name, $email, $website, $twitter, $published){
        $collection = $this->choose_collection();
        $query = array('_id' => new MongoID($_id));
        $update = array('$set' => array(
            'title' => (string)$title,
            'description' => (string)$description,
            'speaker_name' => (string)$speaker_name,
            'email' => (string)$email,
            'website' => (string)$website,
            'twitter_handle' => (string)$twitter,
            'published' => (bool)$published
        ));
        $settings = array('safe' => MONGO_SAFE_LEVEL);
        $collection->update($query, $update, $settings);
    }

    /*******************
     * Deletes an existing talk with $id
     * $id is an int, NOT MongoID
    *******************/
    public function delete_talk($id){
        $collection = $this->choose_collection();
        $query = array(
            '_id' => new Mongo($id),
            'published' => FALSE,
        );
        $settings = array('safe' => MONGO_SAFE_LEVEL);
        $collection->remove($query, $settings);
    }
}