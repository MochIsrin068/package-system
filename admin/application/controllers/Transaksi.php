<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function index() {
        
    }
	
	public function mmart()
	{
		
		$this->load->view('transaksi_mmart_view');
	}
	
	public function get_list_mmart()
	{
		$this->load->model('Transaksi_m');
		$param = array(
			'limit' => array('start' => $this->input->get('start'),'length' => $this->input->get('length')),
			'search' => $this->input->get('search')['value'],
		);
		
		$result = array(
			'draw' => $this->input->get('draw'),
			'data' => $this->Transaksi_m->list_mmart($param),
			"recordsTotal" => $this->Transaksi_m->get_total_list_mmart_unfiltered($param),
			"recordsFiltered" => $this->Transaksi_m->get_total_list_mmart_filtered($param),
		);
		echo json_encode($result);
		
	}

}