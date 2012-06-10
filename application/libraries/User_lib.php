<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_lib {
    public function is_logged_in(){
        $CI =& get_instance();
        return $CI->session->userdata('id');
    }
    public function is_admin(){
        $CI =& get_instance();
        return $CI->session->userdata('type') == 'admin';
    }
}

/* End of file User_lib.php */