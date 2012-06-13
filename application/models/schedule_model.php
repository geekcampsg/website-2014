<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talk_model extends CI_Model {
    //basic function for choosing collection for all functions of this class
    public function choose_collection(){
        $this->load-> model('core_model');
        return $this->core_model->connect_to_db()->schedules;
    }

    /*******************
     * Returns a array containing schedule for current year
    *******************/
    public function get_schedule($year = -1){
        if($year = -1){
            $year = date('Y');
        }
        $collection = $this->choose_collection();
        $query = array(
            'year' => (int)date('Y'),
        );
        return $collection->findOne($query);
    }

}