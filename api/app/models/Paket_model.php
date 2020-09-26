<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_Model extends MY_Model
{

    function getSaldo($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get('saldo')->result();
    }

    function getDetailPaket($id_paket)
    {
        $this->db->where('id', $id_paket);
        return $this->db->get('paket_sewa')->result();
    }

    function payPackage($data)
    {
        $insert = $this->db->insert('paket_transaksi', $data);
        return $insert;
    }

    function potongSaldoDriver($data)
    {
        $this->db->update('saldo', $data, array(
            'nomor' => $data['nomor']
        ));
    }

    function getTransaction($data)
    {
        $this->db->where($data);
        return $this->db->get('paket_transaksi')->result();
    }

    function pushHistory($data)
    {
        $this->db->insert('paket_riwayat', $data);
    }

    function getDiskon($id_paket)
    {
        $this->db->where('paket_id', $id_paket);
        return $this->db->get('paket_diskon')->result();
    }

    function getDiskonByPaketID($paketId)
    {
        $this->db->where('paket_id', $paketId);
        $this->db->select('a.*, b.nama as nama_paket, b.harga as harga_paket, b.kategori_estimasi, b.jam_estimasi, b.expired');
        $this->db->from('paket_diskon as a');
        $this->db->join('paket_sewa as b', 'b.id = a.paket_id');
        $discounts = $this->db->get()->result();
        return $discounts;
    }

    function getTransactionByUserId($userId)
    {
        $this->db->where('id_user', $userId);
        $this->db->select('a.*, b.nama as nama_paket, b.harga as harga_paket, b.kategori_estimasi, b.jam_estimasi, b.expired, c.nama_depan, c.nama_belakang, c.no_ktp, c.no_telepon, c.email, c.foto, c.gender');
        $this->db->from('paket_transaksi as a');
        $this->db->join('paket_sewa as b', 'b.id = a.id_paket');
        $this->db->join('driver as c', 'c.id = a.id_user');
        $transactions = $this->db->get()->result();
        return $transactions;
    }


    function getTransactionByPaketId($paketId)
    {
        $this->db->where('id_paket', $paketId);
        $this->db->select('a.*, b.nama as nama_paket, b.harga as harga_paket, b.kategori_estimasi, b.jam_estimasi, b.expired, c.nama_depan, c.nama_belakang, c.no_ktp, c.no_telepon, c.email, c.foto, c.gender');
        $this->db->from('paket_transaksi as a');
        $this->db->join('paket_sewa as b', 'b.id = a.id_paket');
        $this->db->join('driver as c', 'c.id = a.id_user');
        $transactions = $this->db->get()->result();
        return $transactions;
    }

    function getHistoryByTransactionID($transactionID)
    {
        $this->db->where('id_transaksi', $transactionID);
        $this->db->select('a.*, b.quantity, b.tanggal_transaksi, b.diskon, b.total_harga, b.total_bayar');
        $this->db->from('paket_riwayat as a');
        $this->db->join('paket_transaksi as b', 'b.id = a.id_transaksi');
        $discounts = $this->db->get()->result();
        return $discounts;
    }
}
