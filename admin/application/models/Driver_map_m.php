<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class driver_map_m extends CI_Model {

    function __construct() {
       
    }

    function getDriverLokasi($job) {
		if($job > 0)
			$this->db->where('job',$job);
		$this->db->join('status_driver','id = config_driver.status','left');
		$this->db->join('driver','driver.id = config_driver.id_driver','left');
        return $this->db->get('config_driver')->result();
    }
    
    function getDriverJobAll(){
        return $this->db->get('driver_job')->result();
    }

}

?>
