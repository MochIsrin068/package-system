<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public $pesanerror = array("pesan" => "");

    //Session 
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email') == NULL) {
            $this->load->view('login_view', $this->pesanerror);
        } else {
            //bila belum logout
            header('Location: ' . base_url() . "index.php/dashboard");
        }
    }

    public function pengecekan()
    {

        $this->load->model('Config_m');
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);

        //        echo "$email | $pass";
        $this->load->database();
        $data = $this->db->query("select * from admin where email = '$email'");


        if ($d = $data->result_array()) {
            $emailDB = $d[0]['email'];
            $passDB = $d[0]['password'];
            //            var_dump($d);
            if ($passDB != $pass) {
                $this->pesanerror = array(
                    "pesan" => "Password Salah"
                );
                $this->load->view('login_view', $this->pesanerror);
            } else {

                if ($d[0]['status'] == 0) {
                    $this->pesanerror = array(
                        "pesan" => "Admin belum Aktif"
                    );
                    $this->load->view('login_view', $this->pesanerror);
                } else {
                    $data = array(
                        'id' => $d[0]['id'],
                        'nik' => $d[0]['nik'],
                        'email' => $d[0]['email'],
                        'role' => $d[0]['role'],
                        'role_name' => $this->Config_m->get_admin_role($d[0]['role'])->role,
                    );
                    //$this->session->set_userdata('id', $d[0]['id']);
                    //$this->session->set_userdata('nik', $d[0]['nik']);
                    //$this->session->set_userdata('email', $d[0]['email']);
                    $this->session->set_userdata($data);

                    echo $this->session->userdata('email');
                    redirect(base_url() . "index.php/dashboard");
                }
            }
        } else {
            //            echo 'tidak ada data';
            $this->pesanerror = array(
                "pesan" => "User Admin tidak terdaftar"
            );
            $this->load->view('login_view', $this->pesanerror);
        }
    }
}
