<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PaketTransaksi_m');
    }


    public function index()
    {
        if ($this->session->userdata('email') == NULL) {
            //bila session user kosong balik ke 'Login'
            //redirect(base_url());
            redirect();
        } else {
            $data['transactions'] = $this->PaketTransaksi_m->getJumlahTransaksi();
            $this->load->view('transaksi_view', $data);
        }
    }
}
