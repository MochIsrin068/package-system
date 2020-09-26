<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class PaketHistory extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Paket_model');
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    function index_get()
    {
        $idHistory = $this->get('id');
        $transactionID = $this->get('id_transaction');

        if ($idHistory == '' && $transactionID == '') {
            $history = $this->db->get('paket_riwayat')->result();
            $response = array("status" => "success", "code" => 200, "message" => "success get history", "data" => $history);
            $this->response($response, 200);
        } else {
            if ($idHistory != '') {
                $this->db->where('id', $idHistory);
                $paketHistory = $this->db->get('paket_riwayat')->result();

                $this->db->where('id', $paketHistory[0]->id_transaksi);
                $history = $this->db->get('paket_transaksi')->result();
                $historyData = array(
                    'quantity' => $history[0]->quantity,
                    'tanggal_transaksi' => $history[0]->tanggal_transaksi,
                    'diskon' => $history[0]->diskon,
                    'total_harga' => $history[0]->total_harga,
                    'total_bayar' => $history[0]->total_bayar,
                );

                $merged = (object) array_merge((array) $paketHistory[0], (array) $historyData);
                $response = array("status" => "success", "code" => 200, "message" => "success get history", "data" => $merged);
                $this->response($response, 200);
            }

            if ($transactionID != '') {
                $paketHistory = $this->Paket_model->getHistoryByTransactionID($transactionID);
                $response = array("status" => "success", "code" => 200, "message" => "success get history", "data" => $paketHistory);
                $this->response($response, 200);
            }
        }
    }
}
