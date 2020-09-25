<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Diskon_m');
        $this->load->model('Paket_m');
    }


    public function index()
    {
        if ($this->session->userdata('email') == NULL) {
            //bila session user kosong balik ke 'Login'
            //redirect(base_url());
            redirect();
        } else {
            $data['diskons'] = $this->Diskon_m->getJumlahPaket();
            $data['pakets'] = $this->Paket_m->getJumlahPaket();
            $this->load->view('diskon_view', $data);
        }
    }

    public function add()
    {
        $data['paket_id'] = $this->input->post('paket_id');
        $data['discount'] = $this->input->post('diskon_paket');
        $data['nama'] = $this->input->post('nama_diskon');

        $this->Diskon_m->save($data);
        redirect('paket/diskon');
    }

    public function delete()
    {
        $data['id'] = $this->input->post("id");
        $this->Diskon_m->delete($data);
        redirect('paket/diskon');
    }

    public function update()
    {
        $data['id'] = $this->input->post('id');
        $data['paket_id'] = $this->input->post('paket_id');
        $data['discount'] = $this->input->post('diskon_paket');
        $data['nama'] = $this->input->post('nama_diskon');

        $this->Diskon_m->update($data);
        redirect('paket/diskon');
    }
}
