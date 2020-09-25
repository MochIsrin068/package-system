<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    function __construct() {
        parent::__construct();
    }

    public function get_loaded_classes() {
        return $this->_ci_classes;
    }

    public function get_loaded_helpers() {
        $loaded_helpers = array();
        if (sizeof($this->_ci_helpers) !== 0) {
            foreach ($this->_ci_helpers as $key => $value) {
                $loaded_helpers[] = $key;
            }
        }
        return $loaded_helpers;
    }

    public function get_loaded_models() {
        return $this->_ci_models;
    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return (round($miles * 1.609344));
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

}

/* End of file 'MY_Loader' */
/* Location: ./application/core/MY_Loader.php */