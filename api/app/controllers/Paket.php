<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Paket extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        // $this->load->model('Paket_model');
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    function index_get()
    {
        $idPaket = $this->get('id');
        if ($idPaket == '') {
            $pakets = $this->db->get('paket_sewa')->result();
        } else {
            $this->db->where('id', $idPaket);
            $pakets = $this->db->get('paket_sewa')->result();
        }

        $response = array("status" => "success", "code" => 200, "message" => "success get paket", "data" => $pakets);
        $this->response($response, 200);
    }

    function index_post()
    {

        $this->db->where('id', $this->input->post('id_paket'));
        $paket = $this->db->get('paket_sewa')->result();

        $totalTransaksi = intval($paket[0]->harga) * intval($this->input->post('quantity'));

        $data = array(
            'id_paket' => $this->input->post('id_paket'),
            'id_user' => $this->input->post('id_user'),
            'quantity' => $this->input->post('quantity'),
            'tanggal_transaksi' => date("Y-m-d H:i:s"),
            'total' => $totalTransaksi,
        );
        $insert = $this->db->insert('paket_transaksi', $data);

        if ($insert) {
            $response = array("status" => "success", "code" => 200, "message" => "success transaction", "data" => $data);
            $this->response($response, 200);
            // $setHistory = $this->db->insert('paket_riwayat', array("id_transaksi" => ));
        } else {
            $this->response(array('status' => 'fail', "code" => '502', "message" => "failed transaction", 502));
        }
    }
}
