<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaketTransaksi_m extends CI_Model
{

    function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    function getJumlahTransaksi()
    {
        $query = $this->db->query("SELECT * from paket_transaksi");
        return $query->result();
    }
}
