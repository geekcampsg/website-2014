<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core_model extends CI_Model {
    //basic function to connect to DB
    public function connect_to_db(){
        $conn = new MongoClient(MONGO_CONNECTION);
        return $conn->geekcampsg;
    }
}