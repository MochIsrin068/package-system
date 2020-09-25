<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fiturmangjek_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

//    GET FUNCTION
    function getMride() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'ojek'");
        return $query->result_array();
    }

    function getMcar() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'taxi'");
        return $query->result_array();
    }

    function getMfood() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'food'");
        return $query->result_array();
    }
    
    function getMlaundry() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'laundry'");
        return $query->result_array();
    }

    function getMstore() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'market'");
        return $query->result_array();
    }

    function getMmart() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'sembako'");
        return $query->result_array();
    }

    function getMsend() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'box'");
        return $query->result_array();
    }

    function getMmassage() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'pijat'");
        return $query->result_array();
    }

    function getMbox() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'cargo'");
        return $query->result_array();
    }

    function getMservice() {
        $query = $this->db->query("SELECT * FROM `fitur_mangjek` WHERE fitur = 'servis'");
        return $query->result_array();
    }
    
//    UPDATE FUNCTION

    function updateMride($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum'  WHERE fitur = 'ojek'");
    }

    function updateMcar($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum' WHERE fitur = 'taxi'");
    }

    function updateMfood($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum' WHERE fitur = 'food'");
    }

    function updateMlaundry($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum' WHERE fitur = 'laundry'");
    }

    function updateMstore($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum' WHERE fitur = 'market'");
    }

    function updateMmart($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum' WHERE fitur = 'sembako'");
    }

    function updateMsend($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum' WHERE fitur = 'box'");
    }

    function updateMmassage($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum' WHERE fitur = 'pijat'");
    }

    function updateMbox($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum' WHERE fitur = 'cargo'");
    }

    function updateMservice($biaya, $biayaminimum) {
//        UPDATE `u5350550_mangjekdb4`.`fitur_mangjek` SET `biaya` = '4500' WHERE fitur = 'E-ride';
        $this->db->query("UPDATE `fitur_mangjek` SET `biaya` = '$biaya' , `biaya_minimum` = '$biayaminimum' WHERE fitur = 'servis'");
    }

}

?>
