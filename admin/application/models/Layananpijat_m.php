<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Layananpijat_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    function getLayananPijat() {
        $query = $this->db->query("SELECT * FROM `layanan_pijat`");
        return $query->result_array();
    }

    function updateLayananPijat($harga,$id) {
        $this->db->query("UPDATE `layanan_pijat` SET `harga` = '$harga' WHERE `layanan_pijat`.`id` = $id;");
    }

}


