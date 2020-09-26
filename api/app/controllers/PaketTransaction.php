<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class PaketTransaction extends REST_Controller
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
        $idTransaction = $this->get('id');
        $userId = $this->get('id_user');
        $paketId = $this->get('id_paket');

        if ($idTransaction == '' && $userId == '' && $paketId == '') {
            $transactions = $this->db->get('paket_transaksi')->result();
            $response = array("status" => "success", "code" => 200, "message" => "success get transaction", "data" => $transactions);
            $this->response($response, 200);
        } else {
            if ($idTransaction != '') {
                $this->db->where('id', $idTransaction);
                $transactions = $this->db->get('paket_transaksi')->result();

                $this->db->where('id', $transactions[0]->id_paket);
                $paket = $this->db->get('paket_sewa')->result();
                $paketData = array(
                    'nama_paket' => $paket[0]->nama,
                    'harga' => $paket[0]->harga,
                    'kategori_estimasi' => $paket[0]->kategori_estimasi,
                    'jam_estimasi' => $paket[0]->jam_estimasi,
                    'expired' => $paket[0]->expired,
                );

                $this->db->where('id', $transactions[0]->id_user);
                $user = $this->db->get('driver')->result();
                $userData = array(
                    'nama_depan' => $user[0]->nama_depan,
                    'nama_belakang' => $user[0]->nama_belakang,
                    'no_ktp' => $user[0]->no_ktp,
                    'no_telepon' => $user[0]->no_telepon,
                    'email' => $user[0]->email,
                    'foto' => $user[0]->foto,
                    'gender' => $user[0]->gender,
                );
                $merged = (object) array_merge((array) $transactions[0], (array) array(
                    "paket" => $paketData
                ), (array) array(
                    'user' => $userData
                ));
                $response = array("status" => "success", "code" => 200, "message" => "success get transaction", "data" => $merged);
                $this->response($response, 200);
            }

            if ($userId != '') {
                $transactions = $this->Paket_model->getTransactionByUserId($userId);
                $response = array("status" => "success", "code" => 200, "message" => "success get transaction", "data" => $transactions);
                $this->response($response, 200);
            }

            if ($paketId != '') {
                $transactions = $this->Paket_model->getTransactionByPaketId($paketId);
                $response = array("status" => "success", "code" => 200, "message" => "success get transaction", "data" => $transactions);
                $this->response($response, 200);
            }
        }
    }
}
