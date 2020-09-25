<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {

    function __construct() {
      
    }

	function list_mmart($param)
	{
		$this->db->order_by('transaksi.waktu_order','DESC');
		$this->db->limit($param['limit']['length'],$param['limit']['start']);
		$this->db->like("transaksi_detail_mmart.nama",$param['search'],'both');
		
		$this->db->join('transaksi','transaksi.id = transaksi_detail_mmart.id_transaksi','left');
		$this->db->join('driver','driver.id = transaksi.id_driver','left');
		$this->db->join('pelanggan','pelanggan.id = transaksi.id_pelanggan','left');
		
		$this->db->select('transaksi_detail_mmart.*,transaksi.id_driver, CONCAT(driver.nama_depan," ",driver.nama_belakang) as nama_driver, CONCAT(pelanggan.nama_depan," ",pelanggan.nama_belakang) as nama_pelanggan,transaksi.biaya_akhir as biaya_jasa, transaksi.order_fitur, transaksi.waktu_order');
		return $this->db->get('transaksi_detail_mmart')->result();
	}
	
	function get_total_list_mmart_filtered($param)
	{
		$this->db->like("transaksi_detail_mmart.nama",$param['search'],'both');
		$this->db->select("count(transaksi_detail_mmart.id) as total");
		return $this->db->get('transaksi_detail_mmart')->result()[0]->total;
	}
	
	function get_total_list_mmart_unfiltered($param)
	{
		$this->db->select("count(transaksi_detail_mmart.id) as total");
		return $this->db->get('transaksi_detail_mmart')->result()[0]->total;
	}

}

?>
