<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manageadmin_model extends CI_Model {

    function __construct() {
        $data = $this->db->query('select * from admin');
        $d = $data->result_array();
        $this->nik = $d[0]['nik'];
        $this->email = $d[0]['email'];
        $this->password = $d[0]['password'];
    }
    
    public $nik;
    public $email;
    public $password;
    
    
    function setData($nik,$password){
        $this->db->query("UPDATE admin SET `password` = '$password' WHERE nik = $nik;");
    }
      function belumterima(){
        
         $query = $this->db->query("
    SELECT COUNT(nomor) as jumlah from berkas_lamaran_kerja WHERE is_valid='no' AND job=4

            ");
        return $query->result_array();
    }
}
?>
