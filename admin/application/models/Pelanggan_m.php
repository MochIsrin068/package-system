<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    function getAllPelanggan() {
        $query = $this->db->query("
                SELECT
                id,
                nama_depan,
                nama_belakang,
                email,
                no_telepon,
                alamat,
                created_on, status, saldo,
                (select count(id) from transaksi where id_pelanggan = pelanggan.id) as jumlah_transaksi
                FROM pelanggan
                LEFT JOIN saldo ON pelanggan.id = saldo.id_user
            ");
        return $query->result();
    }

    function editStatusPelanggan($id, $status) {
        $this->db->query("UPDATE `pelanggan` SET `status` = '$status' WHERE `pelanggan`.`id` = '$id';");
    }

    function getJumlahPelangganAktif() {
        $query = $this->db->query("
SELECT COUNT(id) AS jumlah FROM `pelanggan` WHERE `status` = '1';
            ");
        return $query->result_array();
    }

    function getJumlahPelangganNonAktif() {
                $query = $this->db->query("
SELECT COUNT(id) AS jumlah FROM `pelanggan` WHERE `status` = '2';
            ");
        return $query->result_array();
    }

    function getJumlahPelangganBanned() {
                $query = $this->db->query("
SELECT COUNT(id) AS jumlah FROM `pelanggan` WHERE `status` = '3';
            ");
        return $query->result_array();
    }
    
    function get_all_token()
    {
        $this->db->where('pelanggan.status',1);
        $this->db->where('pelanggan.reg_id IS NOT NULL',null,false);
        $this->db->select("pelanggan.reg_id");
        $result = $this->db->get('pelanggan')->result();
        
        $tokens = array();
        foreach($result as $val)
        {
            $tokens[] = $val->reg_id;
        }
        return $tokens;
    }

}