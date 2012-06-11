<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hash_lib {
    public function generate_random_string($length = 10){
        for($i = 0; $i < $length; $i++){
            $random[] = rand(0,10);
        }
        return implode('', $random);
    }
}

/* End of file Hash_lib.php */