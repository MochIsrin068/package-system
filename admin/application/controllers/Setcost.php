<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Setcost extends CI_Controller {
        
        public $biaya = "";
        public $biayaminimum = "";
        public $keterangan_biaya = "";
        public $prosentase = "";
        public $pesan = "";
        public $datakirim;
        
        public function __construct() {
            parent::__construct();
            if(!in_array($this->session->userdata('role'),array(1)))
            redirect('dashboard/restrict');
            
        }
        public function index() {
            echo 'error terjadi hubungi admin atau tekan tombol back';
            //        $data = $this->db->query("SELECT biaya, keterangan_biaya FROM `fitur_mangjek`");
            //        $d = $data->result_array();
            //
            //        $no = 0;
            //        foreach ($d as $data) {
            //            $this->cost[$no] = $data['biaya'];
            //            $this->keterangan[$no] = $data['keterangan_biaya'];
            //            $no = $no + 1;
            //        }
            //
            //        $datakirim = array(
            //            "cost" => $this->cost,
            //            "keterangan" => $this->keterangan,
            //            "pesan" => $this->pesan
            //        );
            //
            //        $this->load->view('setcost_view', $datakirim);
        }
        
        //    RIDE 
        public function mride($tittle) {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMride();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            
            $this->datakirim['pesan'] = "$this->pesan";
            $this->datakirim['biaya'] = "$this->biaya";
            $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Bike";
            
            $this->load->view('setcost_view', $this->datakirim);
        }
        
        public function setBike() {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $biaya = $_POST['biaya'];
            $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            //        echo "$biaya | $id | $persentase";
            //        update data 
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->updateMride($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'Bike';
            $this->mride($tittle);
        }
        
        //      CAR
        public function mcar($tittle) {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMcar();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            
            $this->datakirim['pesan'] = "$this->pesan";
            $this->datakirim['biaya'] = "$this->biaya";
            $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Auto";
            
            $this->load->view('setcost_view', $this->datakirim);
        }
        
        public function setAuto() {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $biaya = $_POST['biaya'];
            $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            //        echo "$biaya";
            //        update data 
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->updateMcar($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'Auto';
            $this->mcar($tittle);
        }
        
        //      FOOD
        public function mfood($tittle) {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            
            //<<data form non partner>>>
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMfood();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            
            $this->datakirim['pesan'] = "$this->pesan";
            $this->datakirim['biaya'] = "$this->biaya";
            $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Efood";
            
            
            //<<data form partner>>>
            $this->load->model('Biayapromo_m');
            $d2 = $this->Biayapromo_m->getBiayaPromoMfood();
            
            $this->datakirim['biaya_p'] = $d2[0]['biaya'];
            $this->datakirim['biayaminimum_p'] = $d2[0]['biaya_minimum'];
            $this->datakirim['keterangan_biaya_p'] = $d2[0]['keterangan_biaya'];
            
            
            $this->load->view('setcostmfood_view', $this->datakirim);
        }
        
        public function setEfood() {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            //get data non partner
            $biaya = $_POST['biaya'];
            $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            //get data partner
            $biaya_p = $this->input->post('biaya_p');
            $biayaminimum_p = $this->input->post('biayaminimum_p');
            
            // update data non partner
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->updateMfood($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            // update data pertner
            $this->load->model('Biayapromo_m');
            $this->Biayapromo_m->updateBiayaPromoMfood($biaya_p, $biayaminimum_p);
            
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'E-Food';
            $this->mfood($tittle);
        }
        
        //      ELECTRONIC
        public function mstore($tittle) {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            
            //<<data form non partner>>>
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMstore();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            
            $this->datakirim['pesan'] = "$this->pesan";
            $this->datakirim['biaya'] = "$this->biaya";
            $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Eelectronic";
            
            
            //<<data form partner>>>
            $this->load->model('Biayapromo_m');
            $d2 = $this->Biayapromo_m->getBiayaPromoMstore();
            
            $this->datakirim['biaya_p'] = $d2[0]['biaya'];
            $this->datakirim['biayaminimum_p'] = $d2[0]['biaya_minimum'];
            $this->datakirim['keterangan_biaya_p'] = $d2[0]['keterangan_biaya'];
            
            
            $this->load->view('setcostmstore_view', $this->datakirim);
        }
        
        public function setEelectronic() {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            //get data non partner
            $biaya = $_POST['biaya'];
            $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            //get data partner
            $biaya_p = $this->input->post('biaya_p');
            $biayaminimum_p = $this->input->post('biayaminimum_p');
            
            // update data non partner
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->updateMstore($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            // update data pertner
            $this->load->model('Biayapromo_m');
            $this->Biayapromo_m->updateBiayaPromoMstore($biaya_p, $biayaminimum_p);
            
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'E-Electronic';
            $this->mstore($tittle);
        }
        
        //      LAUNDRY
        public function mlaundry($tittle) {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            
            //<<data form non partner>>>
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMlaundry();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            
            $this->datakirim['pesan'] = "$this->pesan";
            $this->datakirim['biaya'] = "$this->biaya";
            $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Elaundry";
            
            
            //<<data form partner>>>
            $this->load->model('Biayapromo_m');
            $d2 = $this->Biayapromo_m->getBiayaPromoMlaundry();
            
            $this->datakirim['biaya_p'] = $d2[0]['biaya'];
            $this->datakirim['biayaminimum_p'] = $d2[0]['biaya_minimum'];
            $this->datakirim['keterangan_biaya_p'] = $d2[0]['keterangan_biaya'];
            
            
            $this->load->view('setcostmlaundry_view', $this->datakirim);
        }
        
        public function setElaundry() {
            //get data non partner
            $biaya = $_POST['biaya'];
            $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            //get data partner
            $biaya_p = $this->input->post('biaya_p');
            $biayaminimum_p = $this->input->post('biayaminimum_p');
            
            // update data non partner
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->updateMlaundry($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            // update data pertner
            $this->load->model('Biayapromo_m');
            $this->Biayapromo_m->updateBiayaPromoMlaundry($biaya_p, $biayaminimum_p);
            
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'E-Laundry';
            $this->mlaundry($tittle);
        }
        
        //    MART
        public function mmart($tittle) {
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMmart();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            
            $this->datakirim['pesan'] = "$this->pesan";
            $this->datakirim['biaya'] = "$this->biaya";
            $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Emart";
            
            $this->load->view('setcost_view', $this->datakirim);
        }
        
        public function setEmart() {
            $biaya = $_POST['biaya'];
            $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            //        echo "$biaya";
            //        update data 
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->updateMmart($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'E-Mart';
            $this->mmart($tittle);
        }
        
        //    SEND
        public function msend($tittle) {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMsend();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            
            $this->datakirim['pesan'] = "$this->pesan";
            $this->datakirim['biaya'] = "$this->biaya";
            $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Courier";
            
            $this->load->view('setcost_view', $this->datakirim);
        }
        
        public function setCourier() {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $biaya = $_POST['biaya'];
            $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            //        echo "$biaya";
            //        update data 
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->updateMsend($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'Courier';
            $this->msend($tittle);
        }
        
        //    MASSAGE
        public function mmassage($tittle) {
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMmassage();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            
            // set harga layanan pijat
            $this->load->model('Layananpijat_m');
            $l = $this->Layananpijat_m->getLayananPijat();
            //        var_dump($l);
            $this->datakirim['l1'] = $l[0]['harga'];
            $this->datakirim['l2'] = $l[1]['harga'];
            $this->datakirim['l3'] = $l[2]['harga'];
            $this->datakirim['l4'] = $l[3]['harga'];
            $this->datakirim['l5'] = $l[4]['harga'];
            $this->datakirim['l6'] = $l[5]['harga'];
            $this->datakirim['l7'] = $l[6]['harga'];
            $this->datakirim['l8'] = $l[7]['harga'];
            $this->datakirim['l9'] = $l[8]['harga'];
            
            $this->datakirim['l10'] = $l[9]['harga'];
            
            $this->datakirim['l11'] = $l[10]['harga'];
            
            $this->datakirim['l12'] = $l[11]['harga'];
            
            $this->datakirim['l13'] = $l[12]['harga'];
            $this->datakirim['l14'] = $l[13]['harga'];
            $this->datakirim['l15'] = $l[14]['harga'];
            $this->datakirim['l16'] = $l[15]['harga'];
            $this->datakirim['l17'] = $l[16]['harga'];
            $this->datakirim['l18'] = $l[17]['harga'];
            $this->datakirim['l19'] = $l[18]['harga'];
            $this->datakirim['l20'] = $l[19]['harga'];
            $this->datakirim['l21'] = $l[20]['harga'];
            $this->datakirim['l22'] = $l[21]['harga'];
            $this->datakirim['l23'] = $l[22]['harga'];
            $this->datakirim['l24'] = $l[23]['harga'];
            $this->datakirim['l25'] = $l[24]['harga'];
            
            
            
            $this->datakirim['pesan'] = "$this->pesan";
            $this->datakirim['biaya'] = "$this->biaya";
            $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Emassage";
            
            $this->load->view('setcostmassage_view', $this->datakirim);
        }
        
        public function setEmassage() {
            $biaya = $_POST['biaya'];
            $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            $l1 = $_POST['l1'];
            $l2 = $_POST['l2'];
            $l3 = $_POST['l3'];
            $l4 = $_POST['l4'];
            $l5 = $_POST['l5'];
            $l6 = $_POST['l6'];
            $l7 = $_POST['l7'];
            $l7 = $_POST['l8'];
            $l7 = $_POST['l9'];
            $l7 = $_POST['l10'];
            $l7 = $_POST['l11'];
            $l7 = $_POST['l12'];
            $l7 = $_POST['l13'];
            $l7 = $_POST['l14'];
            $l7 = $_POST['l15'];
            $l7 = $_POST['l16'];
            $l7 = $_POST['l17'];
            $l7 = $_POST['l18'];
            $l7 = $_POST['l19'];
            $l7 = $_POST['l20'];
            $l7 = $_POST['l21'];
            $l7 = $_POST['l22'];
            $l7 = $_POST['l23'];
            $l7 = $_POST['l24'];
            $l7 = $_POST['l25'];
            
            //        echo "$biaya";
            //        update data 
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->updateMmassage($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            $this->load->model('Layananpijat_m');
            $this->Layananpijat_m->updateLayananPijat($l1, 1);
            $this->Layananpijat_m->updateLayananPijat($l2, 2);
            $this->Layananpijat_m->updateLayananPijat($l3, 3);
            $this->Layananpijat_m->updateLayananPijat($l4, 4);
            $this->Layananpijat_m->updateLayananPijat($l5, 5);
            $this->Layananpijat_m->updateLayananPijat($l6, 6);
            $this->Layananpijat_m->updateLayananPijat($l7, 7);
            $this->Layananpijat_m->updateLayananPijat($l8, 8);
            $this->Layananpijat_m->updateLayananPijat($l9, 9);
            
            $this->Layananpijat_m->updateLayananPijat($l10, 10);
            $this->Layananpijat_m->updateLayananPijat($l11, 11);
            $this->Layananpijat_m->updateLayananPijat($l12, 12);
            
            $this->Layananpijat_m->updateLayananPijat($l13, 13);
            $this->Layananpijat_m->updateLayananPijat($l14, 14);
            $this->Layananpijat_m->updateLayananPijat($l15, 15);
            $this->Layananpijat_m->updateLayananPijat($l16, 16);
            $this->Layananpijat_m->updateLayananPijat($l17,17);
            $this->Layananpijat_m->updateLayananPijat($l18,18);
            $this->Layananpijat_m->updateLayananPijat($l19,19);
            $this->Layananpijat_m->updateLayananPijat($l20,20);
            $this->Layananpijat_m->updateLayananPijat($l21,21);
            $this->Layananpijat_m->updateLayananPijat($l22,22);
            $this->Layananpijat_m->updateLayananPijat($l23,23);
            $this->Layananpijat_m->updateLayananPijat($l24,24);
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'E-Massage';
            $this->mmassage($tittle);
        }
        
        //    BOX
        public function mbox($tittle) {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMbox();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            
            //            harga kendaraan angkut
            $this->load->model('Kendaraanangkut_m');
            $l = $this->Kendaraanangkut_m->getKendaraanAngkut();
            //        var_dump($l);
            $this->datakirim['l1'] = $l[0]['harga'];
            $this->datakirim['l2'] = $l[1]['harga'];
            $this->datakirim['l3'] = $l[2]['harga'];
            $this->datakirim['l4'] = $l[3]['harga'];
            $this->datakirim['l5'] = $l[4]['harga'];
            $this->datakirim['l6'] = $l[5]['harga'];
            $this->datakirim['l7'] = $l[6]['harga'];
            $this->datakirim['l8'] = $l[7]['harga'];
            
            //        biaya minimum per kendaraan 
            $this->datakirim['m1'] = $l[0]['hargaminimum_mbox'];
            $this->datakirim['m2'] = $l[1]['hargaminimum_mbox'];
            $this->datakirim['m3'] = $l[2]['hargaminimum_mbox'];
            $this->datakirim['m4'] = $l[3]['hargaminimum_mbox'];
            $this->datakirim['m5'] = $l[4]['hargaminimum_mbox'];
            $this->datakirim['m6'] = $l[5]['hargaminimum_mbox'];
            $this->datakirim['m7'] = $l[6]['hargaminimum_mbox'];
            $this->datakirim['m8'] = $l[7]['hargaminimum_mbox'];
            
            
            $this->datakirim['pesan'] = "$this->pesan";
            //        $this->datakirim['biaya'] = "$this->biaya";
            //        $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Cargo";
            
            $this->load->view('setcostbox_view', $this->datakirim);
        }
        
        public function setCargo() {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            //        $biaya = $_POST['biaya'];
            //        $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            $l1 = $_POST['l1'];
            $l2 = $_POST['l2'];
            $l3 = $_POST['l3'];
            $l4 = $_POST['l4'];
            $l4 = $_POST['l5'];
            $l4 = $_POST['l6'];
            $l4 = $_POST['l7'];
            $l4 = $_POST['l8'];
            
            $m1 = $_POST['m1'];
            $m2 = $_POST['m2'];
            $m3 = $_POST['m3'];
            $m4 = $_POST['m4'];
            $m4 = $_POST['m5'];
            $m4 = $_POST['m6'];
            $m4 = $_POST['m7'];
            $m4 = $_POST['m8'];
            
            //        echo "$biaya";
            //        update data 
            //        $this->load->model('Fiturmangjek_m');
            //        $d = $this->Fiturmangjek_m->updateMbox($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            $this->load->model('Kendaraanangkut_m');
            $this->Kendaraanangkut_m->updateKendaraanAngkut($l1, $m1, 3);
            $this->Kendaraanangkut_m->updateKendaraanAngkut($l2, $m2, 4);
            $this->Kendaraanangkut_m->updateKendaraanAngkut($l3, $m3, 5);
            $this->Kendaraanangkut_m->updateKendaraanAngkut($l4, $m4, 6);
            $this->Kendaraanangkut_m->updateKendaraanAngkut($l5, $m5, 7);
            $this->Kendaraanangkut_m->updateKendaraanAngkut($l6, $m6, 8);
            $this->Kendaraanangkut_m->updateKendaraanAngkut($l7, $m7, 9);
            $this->Kendaraanangkut_m->updateKendaraanAngkut($l8, $m8, 10);
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'Cargo';
            $this->mbox($tittle);
        }
        
        //    SERVICE
        public function mservice($tittle) {
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->getMservice();
            
            $this->biaya = $d[0]['biaya'];
            $this->biayaminimum = $d[0]['biaya_minimum'];
            $this->keterangan_biaya = $d[0]['keterangan_biaya'];
            
            //        set persentase
            $this->load->model('ProporsiBiaya_m');
            $proporsi = $this->ProporsiBiaya_m->getPersentaseDriver($d[0]['id']);
            $persentase = 100 - $proporsi[0]['persentase_driver'];
            //        fare ac type
            $this->load->model('Actype_m');
            $k = $this->Actype_m->getAcType();
            
            $this->datakirim['k1'] = $k[0]['fare'];
            $this->datakirim['k2'] = $k[1]['fare'];
            $this->datakirim['k3'] = $k[2]['fare'];
            $this->datakirim['k4'] = $k[3]['fare'];
            $this->datakirim['k5'] = $k[4]['fare'];
            $this->datakirim['k6'] = $k[5]['fare'];
            $this->datakirim['k7'] = $k[6]['fare'];
            
            //            harga service
            $this->load->model('Mservicejenis_m');
            $k = $this->Mservicejenis_m->getMserviceJenis();
            
            $this->datakirim['l1'] = $k[0]['harga'];
            $this->datakirim['l2'] = $k[1]['harga'];
            $this->datakirim['l3'] = $k[2]['harga'];
            $this->datakirim['l4'] = $k[3]['harga'];
            $this->datakirim['l5'] = $k[4]['harga'];
            $this->datakirim['l6'] = $k[5]['harga'];
            
            $this->datakirim['pesan'] = "$this->pesan";
            $this->datakirim['biaya'] = "$this->biaya";
            $this->datakirim['biayaminimum'] = "$this->biayaminimum";
            $this->datakirim['keterangan_biaya'] = "$this->keterangan_biaya";
            $this->datakirim['tittle'] = "$tittle";
            $this->datakirim['persentase'] = "$persentase";
            $this->datakirim['id'] = $d[0]['id'];
            $this->datakirim['f'] = "Eservice";
            
            $this->load->view('setcostservice_view', $this->datakirim);
        }
        
        public function setEservice() {
            $biaya = $_POST['biaya'];
            $biayaminimum = $_POST['biayaminimum'];
            $id = $_POST['id'];
            $persentase = 100 - $_POST['persentase'];
            
            $k1 = $_POST['k1'];
            $k2 = $_POST['k2'];
            $k3 = $_POST['k3'];
            $k4 = $_POST['k4'];
            $k5 = $_POST['k5'];
            $k6 = $_POST['k6'];
            $k7 = $_POST['k7'];
            
            
            $l1 = $_POST['l1'];
            $l2 = $_POST['l2'];
            $l3 = $_POST['l3'];
            $l4 = $_POST['l4'];
            $l5 = $_POST['l5'];
            $l6 = $_POST['l6'];
            
            
            //        echo "$biaya";
            //        update data 
            $this->load->model('Fiturmangjek_m');
            $d = $this->Fiturmangjek_m->updateMservice($biaya, $biayaminimum);
            
            $this->load->model('ProporsiBiaya_m');
            $this->ProporsiBiaya_m->updateProportsiDriver($id, $persentase);
            
            $this->load->model('Actype_m');
            $this->Actype_m->updateAcType(1, $k1);
            $this->Actype_m->updateAcType(2, $k2);
            $this->Actype_m->updateAcType(3, $k3);
            $this->Actype_m->updateAcType(4, $k4);
            $this->Actype_m->updateAcType(5, $k5);
            $this->Actype_m->updateAcType(6, $k6);
            $this->Actype_m->updateAcType(7, $k7);
            
            $this->load->model('Mservicejenis_m');
            $this->Mservicejenis_m->updateMserviceJenis(1, $l1);
            $this->Mservicejenis_m->updateMserviceJenis(2, $l2);
            $this->Mservicejenis_m->updateMserviceJenis(3, $l3);
            $this->Mservicejenis_m->updateMserviceJenis(4, $l4);
            $this->Mservicejenis_m->updateMserviceJenis(5, $l5);
            $this->Mservicejenis_m->updateMserviceJenis(6, $l6);
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Data berhasil di update</p> <br>";
            $tittle = 'E-Service';
            $this->mservice($tittle);
        }
        
    }
