<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core_model extends CI_Model {
    public function connect_to_db(){
        //$conn = new Mongo(MONGO_CONNECTION, MONGO_OPTIONS);
        $conn = new Mongo();
        if(MONGO_OPTIONS){
            $conn->setSlaveOkay();
        }
        return $conn->geekcampsg;
    }
}