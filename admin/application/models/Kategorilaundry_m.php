<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategorilaundry_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    function getAllKategori() {
        $query = $this->db->query("
                    SELECT * FROM `kategori_laundry`
            ");
        return $query->result();
    }

    function getKategori($idKategori) {
        $query = $this->db->query("
                    SELECT * FROM `kategori_laundry` where id = '$idKategori'
            ");
        return $query->result_array();
    }

    function insertKategori($kategori, $namafoto) {
        $this->db->query("
                    INSERT INTO `kategori_laundry` (`kategori`, `foto`) 
                    VALUES ('$kategori', '$namafoto');
            ");
    }

    function editKategori1($idketegori, $kategori, $namafoto) {
        $this->db->query("
            UPDATE `kategori_laundry` 
            SET `kategori` = '$kategori', `foto` = '$namafoto' 
            WHERE `kategori_laundry`.`id` = '$idketegori';
       ");
    }

    function editKategori2($idketegori, $kategori) {
        $this->db->query("
                    UPDATE `kategori_laundry` 
                    SET `kategori` = '$kategori' 
                    WHERE `kategori_laundry`.`id` = '$idketegori';
            ");
    }

}