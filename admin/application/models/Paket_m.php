<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_m extends CI_Model
{

    function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    function getJumlahPaket()
    {
        $query = $this->db->query("SELECT * from paket_sewa");
        return $query->result();
    }

    function save($data)
    {
        $this->db->insert('paket_sewa', $data);
    }

    function delete($data)
    {
        $this->db->delete('paket_sewa', $data);
    }

    function update($data)
    {
        $this->db->update('paket_sewa', $data, array(
            'id' => $data['id']
        ));
    }
}
