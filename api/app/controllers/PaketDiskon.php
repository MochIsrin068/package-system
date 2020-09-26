<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class PaketDiskon extends REST_Controller
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
        $idDiskon = $this->get('id');
        $paketId = $this->get('id_paket');

        if ($idDiskon == '' && $paketId == '') {
            $discounts = $this->db->get('paket_diskon')->result();
            $response = array("status" => "success", "code" => 200, "message" => "success get diskon", "data" => $discounts);
            $this->response($response, 200);
        } else {
            if ($idDiskon != '') {
                $this->db->where('id', $idDiskon);
                $discounts = $this->db->get('paket_diskon')->result();

                $this->db->where('id', $discounts[0]->paket_id);
                $paket = $this->db->get('paket_sewa')->result();
                $paketData = array(
                    'nama_paket' => $paket[0]->nama,
                    'harga' => $paket[0]->harga,
                    'kategori_estimasi' => $paket[0]->kategori_estimasi,
                    'jam_estimasi' => $paket[0]->jam_estimasi,
                    'expired' => $paket[0]->expired,
                );

                $merged = (object) array_merge((array) $discounts[0], (array) $paketData);
                $response = array("status" => "success", "code" => 200, "message" => "success get diskon", "data" => $merged);
                $this->response($response, 200);
            }

            if ($paketId != '') {
                $discounts = $this->Paket_model->getDiskonByPaketID($paketId);
                $response = array("status" => "success", "code" => 200, "message" => "success get diskon", "data" => $discounts);
                $this->response($response, 200);
            }
        }
    }
}
