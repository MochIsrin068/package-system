<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    
    class Ppob {
        
        var $CI;
        private $mapquest_key;
        
        function __construct() {
            if(!isset($this->CI)) {
                $this->CI =& get_instance();
            }
            //$this->mapquest_key = $this->CI->config->item('mapquest_app_key');
        }
        
        
        
    }
    
?>