<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_m');
    }


    public function index()
    {
        if ($this->session->userdata('email') == NULL) {
            //bila session user kosong balik ke 'Login'
            //redirect(base_url());
            redirect();
        } else {
            $data['pakets'] = $this->Paket_m->getJumlahPaket();
            $this->load->view('paket_view', $data);
        }
    }

    public function add()
    {
        $data['nama'] = $this->input->post('nama_paket');
        $data['harga'] = $this->input->post('harga_paket');
        $data['kategori_estimasi'] = $this->input->post('estimasi_paket');
        $data['jam_estimasi'] = $this->input->post('extimate');

        $estimasiHour = intval($this->input->post('extimate'));

        if ($this->input->post('estimasi_paket') === "1") {
            $data["expired"] = date("Y-m-d H:i:s", strtotime('+12 hours'));
        } else if ($this->input->post('estimasi_paket') === "2") {
            $totalHour = 24 * $estimasiHour;
            $data["expired"] = date("Y-m-d H:i:s", strtotime('+' . $totalHour . ' hours'));
        } else if ($this->input->post('estimasi_paket') === "3") {
            $totalHour = 168 * $estimasiHour;
            $data["expired"] = date("Y-m-d H:i:s", strtotime('+' . $totalHour . ' hours'));
        } else {
            $totalHour = 730 * $estimasiHour;
            $data["expired"] = date("Y-m-d H:i:s", strtotime('+' . $totalHour . ' hours'));
        }

        $this->Paket_m->save($data);
        redirect('paket/paket');
    }

    public function delete()
    {
        $data['id'] = $this->input->post("id");
        $this->Paket_m->delete($data);
        redirect('paket/paket');
    }

    public function update()
    {
        $data['id'] = $this->input->post('id');
        $data['nama'] = $this->input->post('nama_paket');
        $data['harga'] = $this->input->post('harga_paket');
        $data['kategori_estimasi'] = $this->input->post('estimasi_paket');
        $data['jam_estimasi'] = $this->input->post('extimate');

        $estimasiHour = intval($this->input->post('extimate'));

        if ($this->input->post('estimasi_paket') === "1") {
            $data["expired"] = date("Y-m-d H:i:s", strtotime('+12 hours'));
        } else if ($this->input->post('estimasi_paket') === "2") {
            $totalHour = 24 * $estimasiHour;
            $data["expired"] = date("Y-m-d H:i:s", strtotime('+' . $totalHour . ' hours'));
        } else if ($this->input->post('estimasi_paket') === "3") {
            $totalHour = 168 * $estimasiHour;
            $data["expired"] = date("Y-m-d H:i:s", strtotime('+' . $totalHour . ' hours'));
        } else {
            $totalHour = 730 * $estimasiHour;
            $data["expired"] = date("Y-m-d H:i:s", strtotime('+' . $totalHour . ' hours'));
        }

        $this->Paket_m->update($data);
        redirect('paket/paket');
    }
}
