<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public $datakirim;
    public $pesan = "";

    public function __construct()
    {
        parent::__construct();
    }



    public function index()
    {
        if ($this->session->userdata('email') == NULL) {
            //bila session user kosong balik ke 'Login'
            //redirect(base_url());
            redirect();
        } else {
            if (in_array($this->session->userdata('role'), array(1, 2))) {
                //jumlah produk
                // $this->load->model('Mitra_m');
                // $this->datakirim['jumlahitem'] = $this->Mitra_m->getItem();

                // data buat jumlah dan status driver
                $this->load->model('Driver_m');

                $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
                $this->datakirim['jumlahDriver1'] = $this->Driver_m->getJumlahDriverAktif();
                $this->datakirim['jumlahDriver2'] = $this->Driver_m->getJumlahDriverNonAktif();
                $this->datakirim['jumlahDriver3'] = $this->Driver_m->getJumlahDriverBanned();
                $this->datakirim['jumlahmakanan'] = $this->Driver_m->getMakanan();
                $this->datakirim['jumlahrestoran'] = $this->Driver_m->getJumlahResto();
                $this->datakirim['jumlahtoko'] = $this->Driver_m->getJumlahToko();
                $this->datakirim['jumlahtransaksifood'] = $this->Driver_m->getTransaksiMitraFood();
                $this->datakirim['jumlahttoko'] = $this->Driver_m->getTransaksiMitraToko();

                // data jumlah transaksi driver (leastest transaction)
                $this->datakirim['transaksiDriver'] = $this->Driver_m->getAllHistoryTransaksi();


                // data jumlah transaksi driver
                $this->datakirim['transaksiBulan'] = $this->Driver_m->getTotalTransaksiBulanan(date('n'), date('Y'));

                // data jumlah pelanggan
                $this->load->model('Pelanggan_m');
                $this->datakirim['jumlahPelanggan1'] = $this->Pelanggan_m->getJumlahPelangganAktif();
                $this->datakirim['jumlahPelanggan2'] = $this->Pelanggan_m->getJumlahPelangganNonAktif();
                $this->datakirim['jumlahPelanggan3'] = $this->Pelanggan_m->getJumlahPelangganBanned();

                //        data buat chart
                $this->datakirim['bln1'] = $this->Driver_m->getTotalTransaksiBulanan(1, date('Y'));
                $this->datakirim['bln2'] = $this->Driver_m->getTotalTransaksiBulanan(2, date('Y'));
                $this->datakirim['bln3'] = $this->Driver_m->getTotalTransaksiBulanan(3, date('Y'));
                $this->datakirim['bln4'] = $this->Driver_m->getTotalTransaksiBulanan(4, date('Y'));
                $this->datakirim['bln5'] = $this->Driver_m->getTotalTransaksiBulanan(5, date('Y'));
                $this->datakirim['bln6'] = $this->Driver_m->getTotalTransaksiBulanan(6, date('Y'));
                $this->datakirim['bln7'] = $this->Driver_m->getTotalTransaksiBulanan(7, date('Y'));
                $this->datakirim['bln8'] = $this->Driver_m->getTotalTransaksiBulanan(8, date('Y'));
                $this->datakirim['bln9'] = $this->Driver_m->getTotalTransaksiBulanan(9, date('Y'));
                $this->datakirim['bln10'] = $this->Driver_m->getTotalTransaksiBulanan(10, date('Y'));
                $this->datakirim['bln11'] = $this->Driver_m->getTotalTransaksiBulanan(11, date('Y'));
                $this->datakirim['bln12'] = $this->Driver_m->getTotalTransaksiBulanan(12, date('Y'));

                // piechart
                $this->datakirim['contacting'] = $this->Driver_m->getTotalTransaksi(1);
                $this->datakirim['bidding'] = $this->Driver_m->getTotalTransaksi(2);
                $this->datakirim['success'] = $this->Driver_m->getTotalTransaksi(3);
                $this->datakirim['rejected'] = $this->Driver_m->getTotalTransaksi(4);
                $this->datakirim['canceled'] = $this->Driver_m->getTotalTransaksi(5);
                $this->datakirim['start'] = $this->Driver_m->getTotalTransaksi(6);
                $this->datakirim['finish'] = $this->Driver_m->getTotalTransaksi(7);

                $this->load->view('dashboard_view', $this->datakirim);
            } else
                redirect('dashboard/news');
        }
    }

    function news()
    {
        $this->load->view('news_view');
    }

    function restrict()
    {
        if ($this->session->userdata('email') == NULL) {
            redirect();
        } else
            $this->load->view('restrict_view');
    }

    function transaksifood()
    {

        $this->load->model('Driver_m');
        $this->datakirim['transaksiDriver'] = $this->Driver_m->getHistoryTransaksiFood();
        $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();


        $this->load->view('transaksi_view', $this->datakirim);
    }
    function allTransaction()
    {
        if (in_array($this->session->userdata('role'), array(1, 2, 4))) {
            $this->load->model('Driver_m');
            $this->datakirim['transaksi'] = $this->Driver_m->getDetilHistoryTransaksi();
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();

            //        $this->datakirim['transaksiDriver'] = $this->Driver_m->getAllHistoryTransaksi();
            // Get JUMLAH masing-masing status TRANSAKSI ===================================
            //    1 contacting == tidak
            //    2 bidding == tidak
            //    3 success
            //    4 rejected
            //    5 canceled
            //    6 start
            //    7 finish 

            $this->datakirim['contacting'] = $this->Driver_m->getTotalTransaksi(1);
            $this->datakirim['bidding'] = $this->Driver_m->getTotalTransaksi(2);

            $this->datakirim['success'] = $this->Driver_m->getTotalTransaksi(3);
            $this->datakirim['rejected'] = $this->Driver_m->getTotalTransaksi(4);
            $this->datakirim['canceled'] = $this->Driver_m->getTotalTransaksi(5);

            $this->datakirim['start'] = $this->Driver_m->getTotalTransaksi(6);
            $this->datakirim['finish'] = $this->Driver_m->getTotalTransaksi(7);

            $this->load->view('dashboard2_view', $this->datakirim);
        } else
            redirect('dashboard/restrict');
    }

    function cancelTransaction()
    {
        if (in_array($this->session->userdata('role'), array(1, 2))) {
            $this->load->model('Driver_m');
            $this->datakirim['transaksi'] = $this->Driver_m->listCancelTransaksi();
            $this->datakirim['pesan'] = $this->pesan;
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $this->load->view('dashboard2cancel_view', $this->datakirim);
        } else
            redirect('dashboard/restrict');
    }

    function cancelTransactionProcess($idHistoryTransaksi, $idTrans, $idDriver, $idPelanggan)
    {
        if (in_array($this->session->userdata('role'), array(1, 2))) {
            //        echo $idhistorytransaksi."| $idtransaksi | $iddriver | $idpelanggan";
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $this->Driver_m->cancelTransaksi($idHistoryTransaksi, $idTrans, $idDriver, $idPelanggan);

            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Transaksi Order berhasil di cancel</p> <br>";
            $this->cancelTransaction();
        } else
            redirect('dashboard/restrict');
    }
}
