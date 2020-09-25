<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signout extends CI_Controller {

    public function index() {
        $this->load->library('session');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        header('Location: ' . base_url());
    }

}