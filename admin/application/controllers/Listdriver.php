<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Listdriver extends CI_Controller {
        
        public $datakirim;
        public $pesan = "";
        
        public function __construct() {
            parent::__construct();
            if(!in_array($this->session->userdata('role'),array(1,2)))
            redirect('dashboard/restrict');
        
            $this->load->library('session');
            
            $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://demo.bacapaper.com',
            'smtp_port' => '465',
            'smtp_user' => 'no-replay@demo.bacapaper.com',
            'smtp_pass' => '4121f101097',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
            );
            
            
            $this->load->library('email', $config);
        }
        public function index() {
            
            //        $this->load->model('Driver_m');
            //        $this->datakirim['driver'] = $this->Driver_m->getAllDriver();
            //        $this->datakirim['pesan'] = $this->pesan;
            //        $this->datakirim['tittle'] = 'Driver Motor';
            //
            //        $this->load->view('Listdriver_view', $this->datakirim);
            //        echo 'listdriver';
        }
        
        public function driverMotor() {
            if ($this->session->userdata('email') == NULL) {
                //bila session user kosong balik ke 'Login'
                redirect(base_url());
                } else {
                $this->load->model('Driver_m');
                $this->datakirim['driver'] = $this->Driver_m->getAllDriverMotor();
                
                $this->datakirim['daftar'] = $this->Driver_m->getDaftarRide();
                $this->datakirim['terima'] = $this->Driver_m->getTerimaride();
                $this->datakirim['tolak'] = $this->Driver_m->getTolakride();
                $this->datakirim['transaksi'] = $this->Driver_m->getJumlajTransaksiRide();
                $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
                $this->datakirim['pesan'] = $this->pesan;
                $this->datakirim['tittle'] = 'Driver Motor';
                
                
                $this->load->view('Listdriver_view', $this->datakirim);
            }
        }
        
        public function mcar() {
            
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->getAllDriverMcar();
            $this->datakirim['daftar'] = $this->Driver_m->getDaftarRide();
            $this->datakirim['terima'] = $this->Driver_m->getTerimaride();
            $this->datakirim['tolak'] = $this->Driver_m->getTolakride();
            $this->datakirim['transaksi'] = $this->Driver_m->getJumlajTransaksiRide();
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $this->datakirim['pesan'] = $this->pesan;
            $this->datakirim['tittle'] = 'Taxi';
            
            $this->load->view('Listdriver_view', $this->datakirim);
        }
        
        public function mbox() {
            
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->getAllDriverMbox();
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $this->datakirim['pesan'] = $this->pesan;
            $this->datakirim['tittle'] = 'Cargo';
            
            $this->load->view('Listdriver_view', $this->datakirim);
        }
        
        public function mmassage() {
            
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->getAllMmassage();
            $this->datakirim['pesan'] = $this->pesan;
            $this->datakirim['tittle'] = 'E-Massage';
            
            $this->load->view('Listmmassage_view', $this->datakirim);
        }
        
        public function mservice() {
            
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->getAllMservice();
            $this->datakirim['pesan'] = $this->pesan;
            $this->datakirim['tittle'] = 'E-Service';
            
            $this->load->view('Listmservice_view', $this->datakirim);
        }
        
        //    =============================================================================================
        
        public function resetPassword($idDriver, $namaDriver, $tittle) {
            
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->resetPassword($idDriver);
            
            switch ($tittle) {
                case 'Driver%20Motor':
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Password Driver $namaDriver berhasil direset</p> <br>";
                $this->driverMotor();
                
                break;
                case 'E-Car':
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Password Driver $namaDriver berhasil direset</p> <br>";
                $this->mcar();
                
                break;
                case 'E-Box':
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Password Driver $namaDriver berhasil direset</p> <br>";
                $this->mbox();
                
                break;
                case 'E-Massage':
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Password Driver $namaDriver berhasil direset</p> <br>";
                $this->mmassage();
                
                break;
                case 'E-Service':
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Password Driver $namaDriver berhasil direset</p> <br>";
                $this->mservice();
                
                break;
                
                default:
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Password Driver $namaDriver berhasil direset</p> <br>";
                $this->index();
                break;
            }
        }
        
        //    ==================== detil driver + edit status ================================================
        public function detilDriver($idDriver) {
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            $this->datakirim['driver'] = $this->Driver_m->getDriver($idDriver);
            $this->datakirim['saldo'] = $this->Driver_m->getSaldoDriver($idDriver);
            $this->datakirim['transaksi'] = $this->Driver_m->getHistoryTransaksi($idDriver);
            $this->datakirim['jumlah'] = $this->Driver_m->getJumlahTransaksidriver($idDriver);
            $this->datakirim['jumlahstatus'] = $this->Driver_m->getJumlahTransaksidriverStatus($idDriver);
            $this->datakirim['statuscancel'] = $this->Driver_m->getJumlahTransaksidrivercancel($idDriver);
            $this->load->view('Listdriver2_view', $this->datakirim);
            //        echo 'listdriver';
        }
        
        
        public function editStatusForm($idDriver) {
            //        echo $idDriver;
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->getDriver($idDriver);
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            
            $this->load->view('Editdriver_view', $this->datakirim);
            //        echo 'listdriver';
        }
        
        public function editStatus() {
            
            
            //        echo $idDriver;
            $idDriver = $_POST['iddriver'];
            $namadepan = $_POST['namadepan'];
            $namabelakang = $_POST['namabelakang'];
            $tempatlahir = $_POST['tempatlahir'];
            $dob = $_POST['DOB'];
            $ktp = $_POST['ktp'];
            $job = $_POST['job'];
            $status = $_POST['status'];
            $foto = $_POST['foto'];
            
            $tipekendaraan = $_POST['tipekendaraan'];
            $nokendaraan = $_POST['nokendaraan'];
            $warnakendaraan = $_POST['warnakendaraan'];
            $merekkendaraan = $_POST['merekkendaraan'];
            $idkendaraan = $_POST['idkendaraan'];
            
            
            $pathfilesave = FCPATH. "/fotodriver";
            
            //        echo "$pathfiledelete | $jeniskendaraan | $tipekendaraan | $nokendaraan | $warnakendaraan | $idkendaraan | $merekkendaraan";
            
            $this->load->model('Driver_m');
            $this->datakirim['belumbaca'] = $this->Driver_m->belumterima();
            if ($_FILES["userfile"]['name'] != NULL) {
                //            hapus foto lama 
                // unlink("$pathfiledelete");
                //            upload foto editan baru 
                $config['file_name'] = $idDriver;
                $config['upload_path'] = $pathfilesave;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['overwrite'] = true;
                $this->load->library('upload', $config);
                $filename ="";
                if ($this->upload->do_upload('userfile')) {
                    $filename = $this->upload->data("file_name");
                }
                
                if($filename!="")
				$this->Driver_m->editStatusFoto($idDriver, $status, $namadepan, $namabelakang, $ktp, $dob, $tempatlahir,$filename);
                else
				$this->Driver_m->editStatus($idDriver, $status, $namadepan, $namabelakang, $ktp, $dob, $tempatlahir);
                $this->Driver_m->editKendaraan($tipekendaraan, $merekkendaraan, $nokendaraan, $warnakendaraan, $idkendaraan);
                //            $this->Driver_m->editStatus($idDriver, $status);
                } else {
                $this->Driver_m->editStatus($idDriver, $status, $namadepan, $namabelakang, $ktp, $dob, $tempatlahir);
                $this->Driver_m->editKendaraan($tipekendaraan, $merekkendaraan, $nokendaraan, $warnakendaraan, $idkendaraan);
            }
            
            //        REDIRECT PAGE 
            switch ($job) {
                case 'mride':
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Status Driver telah berhasil di edit</p> <br>";
                $this->driverMotor();
                break;
                case 'mcar':
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Status Driver telah berhasil di edit</p> <br>";
                $this->mcar();
                break;
                case 'mbox':
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Status Driver telah berhasil di edit</p> <br>";
                $this->mbox();
                break;
                default:
                $this->pesan = "<p style=\"color:green\" class=\"text-center\">Status Driver telah berhasil di edit</p> <br>";
                $this->index();
                break;
            }
        }
        
        //    ==================== detil mmassager + edit status ================================================
        public function detilMmassage($id) {
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->getMmassage($id);
            $this->datakirim['saldo'] = $this->Driver_m->getSaldoDriver($id);
            
            $this->load->view('Listmmassage2_view', $this->datakirim);
            //        echo 'listdriver';
        }
        
        public function editMmassageForm($id) {
            //        echo $idDriver;
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->getMmassage($id);
            
            $this->load->view('Editmmassage_view', $this->datakirim);
            //        echo 'listdriver';
        }
        
        public function editStatusMmassage() {
            $this->load->model('Driver_m');
            
            //        echo $idDriver;
            $idDriver = $_POST['idmmassage'];
            $namadepan = $_POST['namalengkap'];
            $tempatlahir = $_POST['tempatlahir'];
            $dob = $_POST['DOB'];
            $ktp = $_POST['ktp'];
            
            $status = $_POST['status'];
            $foto = $_POST['foto'];
            
            
            $pathfiledelete = $_SERVER['DOCUMENT_ROOT'] . "/m-admin/fotommassage/$foto";
            $pathfilesave = $_SERVER['DOCUMENT_ROOT'] . "/m-admin/fotommassage/";
            
            //        echo "$pathfiledelete | $jeniskendaraan | $tipekendaraan | $nokendaraan | $warnakendaraan | $idkendaraan | $merekkendaraan";
            
            if ($_FILES["userfile"]['name'] != NULL) {
                //            hapus foto lama 
                unlink("$pathfiledelete");
                //            upload foto editan baru 
                $config['file_name'] = $foto;
                $config['upload_path'] = $pathfilesave;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $this->Driver_m->editStatus($idDriver, $status, $namadepan, "", $ktp, $dob, $tempatlahir);
                //            $this->Driver_m->editKendaraan($jeniskendaraan, $tipekendaraan, $merekkendaraan, $nokendaraan, $warnakendaraan, $idkendaraan);
                //            $this->Driver_m->editStatus($idDriver, $status);
                } else {
                $this->Driver_m->editStatus($idDriver, $status, $namadepan, "", $ktp, $dob, $tempatlahir);
                //            $this->Driver_m->editKendaraan($jeniskendaraan, $tipekendaraan, $merekkendaraan, $nokendaraan, $warnakendaraan, $idkendaraan);
            }
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Status Mitra telah berhasil di edit</p> <br>";
            $this->mmassage();
        }
        
        //    ==================== detil mservice + edit status ================================================
        public function detilMservice($id) {
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->getMservice($id);
            $this->datakirim['saldo'] = $this->Driver_m->getSaldoDriver($id);
            
            $this->load->view('Listmservice2_view', $this->datakirim);
            //        echo 'listdriver';
        }
        
        public function editMserviceForm($id) {
            //        echo $idDriver;
            $this->load->model('Driver_m');
            $this->datakirim['driver'] = $this->Driver_m->getMservice($id);
            
            $this->load->view('Editmservice_view', $this->datakirim);
            //        echo 'listdriver';
        }
        
        public function editStatusMservice() {
            $this->load->model('Driver_m');
            
            //        echo $idDriver;
            $idDriver = $_POST['idmservice'];
            $namadepan = $_POST['namalengkap'];
            $tempatlahir = $_POST['tempatlahir'];
            $dob = $_POST['DOB'];
            $ktp = $_POST['ktp'];
            
            $status = $_POST['status'];
            $foto = $_POST['foto'];
            
            
            $pathfiledelete = $_SERVER['DOCUMENT_ROOT'] . "/admin/fotomservice/$foto";
            $pathfilesave = $_SERVER['DOCUMENT_ROOT'] . "/admin/fotomservice/";
            
            //        echo "$pathfiledelete | $jeniskendaraan | $tipekendaraan | $nokendaraan | $warnakendaraan | $idkendaraan | $merekkendaraan";
            
            if ($_FILES["userfile"]['name'] != NULL) {
                //            hapus foto lama 
                unlink("$pathfiledelete");
                //            upload foto editan baru 
                $config['file_name'] = $foto;
                $config['upload_path'] = $pathfilesave;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $this->Driver_m->editStatus($idDriver, $status, $namadepan, "", $ktp, $dob, $tempatlahir);
                //            $this->Driver_m->editKendaraan($jeniskendaraan, $tipekendaraan, $merekkendaraan, $nokendaraan, $warnakendaraan, $idkendaraan);
                //            $this->Driver_m->editStatus($idDriver, $status);
                } else {
                $this->Driver_m->editStatus($idDriver, $status, $namadepan, "", $ktp, $dob, $tempatlahir);
                //            $this->Driver_m->editKendaraan($jeniskendaraan, $tipekendaraan, $merekkendaraan, $nokendaraan, $warnakendaraan, $idkendaraan);
            }
            
            $this->pesan = "<p style=\"color:green\" class=\"text-center\">Status Mitra telah berhasil di edit</p> <br>";
            $this->mservice();
        }
        
    }
