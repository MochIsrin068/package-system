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
        $this->load->model('Paket_model');
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    function index_get()
    {
        $idPaket = $this->get('id');
        $isDiscount = $this->get('discount_axist');

        if ($idPaket == '' && $isDiscount == '') {
            $pakets = $this->db->get('paket_sewa')->result();
            $response = array("status" => "success", "code" => 200, "message" => "success get paket", "data" => $pakets);
            $this->response($response, 200);
        } else {
            if ($idPaket != '') {
                $this->db->where('id', $idPaket);
                $pakets = $this->db->get('paket_sewa')->result();

                $response = array("status" => "success", "code" => 200, "message" => "success get paket", "data" => $pakets);
                $this->response($response, 200);
            }

            if ($isDiscount != '') {
                $this->db->select('a.*, b.discount, b.nama as nama_discount');
                $this->db->from('paket_sewa as a');
                $this->db->join('paket_diskon as b', 'b.paket_id = a.id');
                $pakets = $this->db->get()->result();

                $response = array("status" => "success", "code" => 200, "message" => "success get paket", "data" => $pakets);
                $this->response($response, 200);
            }
        }
    }

    function index_post()
    {
        // GET DRIVER SALDO
        $driver = $this->Paket_model->getSaldo($this->input->post('id_user'));
        $driverSaldo = intval($driver[0]->saldo);
        // GET DETAIL PAKET
        $paket = $this->Paket_model->getDetailPaket($this->input->post('id_paket'));

        // GET DISKON BERDASARKAN PAKET
        $diskonPaket = $this->Paket_model->getDiskon($this->input->post('id_paket'));
        $hargadiskon =  count($diskonPaket) === 0 ? 0 : (intval($paket[0]->harga) * intval($diskonPaket[0]->discount)) / 100;
        // TOTAL TRANSAKSI
        $totalTransaksi = (intval($paket[0]->harga) - $hargadiskon) * intval($this->input->post('quantity'));

        // CEK SALDO MENCUKUPI ATAU TIDAK
        if ($driverSaldo < $totalTransaksi) {
            $response = array("status" => "failed", "code" => 442, "message" => "saldo tidak mencukupi",);
            $this->response($response, 200);
        } else {
            $data = array(
                'id_paket' => $this->input->post('id_paket'),
                'id_user' => $this->input->post('id_user'),
                'quantity' => $this->input->post('quantity'),
                'tanggal_transaksi' => date("Y-m-d H:i:s"),
                'total_harga' => intval($paket[0]->harga) * intval($this->input->post('quantity')),
                'diskon' => count($diskonPaket) === 0 ? 0 : intval($diskonPaket[0]->discount),
                'total_bayar' => $totalTransaksi,
            );
            $insert =  $this->Paket_model->payPackage($data);

            if ($insert) {
                // GET DETAIL TRANSACTION
                $detailTransaksi =  $this->Paket_model->getTransaction(array(
                    'id_paket' => $this->input->post('id_paket'),
                    'id_user' => $this->input->post('id_user'),
                    'tanggal_transaksi' => date("Y-m-d H:i:s"),
                ));

                // PUSH TO TRANSACTION HISTORY
                $this->Paket_model->pushHistory(array("id_transaksi" => $detailTransaksi[0]->id));

                // UPDATE SALDO DRIVER
                $currentSaldo = $driverSaldo - $totalTransaksi;
                $dataSaldo = array(
                    'nomor' => $driver[0]->nomor,
                    "saldo" => $currentSaldo
                );
                $this->Paket_model->potongSaldoDriver($dataSaldo);

                // API RESPONSE
                $response = array("status" => "success", "code" => 200, "message" => "success transaction", "data" => $data);
                $this->response($response, 200);
            } else {
                $this->response(array('status' => 'fail', "code" => '502', "message" => "failed transaction", 502));
            }
        }
    }
}
