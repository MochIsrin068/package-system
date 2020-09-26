<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaketDiskon_m extends CI_Model
{

    function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    function getJumlahPaket()
    {
        $query = $this->db->query("SELECT * from paket_diskon");
        return $query->result();
    }

    function save($data)
    {
        $this->db->insert('paket_diskon', $data);
    }

    function delete($data)
    {
        $this->db->delete('paket_diskon', $data);
    }

    function update($data)
    {
        $this->db->update('paket_diskon', $data, array(
            'id' => $data['id']
        ));
    }
}
