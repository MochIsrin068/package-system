<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class ManualTransaction_m extends CI_Model {
        
        function __construct() {
            $this->load->database();
            $this->load->library('session');
        }
        
        //    pelanggan ================================================
        function getPelanggan() {
            $query = $this->db->query("SELECT *
            FROM pelanggan a, saldo b 
            WHERE b.id_user = a.id");
            return $query->result();
        }
        
        function insertTransaksiPelanggan($tipe_saldo, $tipe, $id, $nominal, $saldoakhir) {
            if($tipe_saldo == 1)
            {
                if ($tipe == 'pengurangan') {
                    $query = $this->db->query("INSERT INTO `transaksi_pelanggan` (`id_pelanggan`, `debit`, `kredit`, `waktu`, `id_transaksi`, `tipe_transaksi`, `pakai_mpay`, `saldo`, `keterangan`) 
                    VALUES ('$id', '$nominal', '0', CURRENT_TIMESTAMP, '0', '12', '0', '$saldoakhir', 'pengurangan saldo oleh admin');                
                    ");
                    } else if ($tipe == 'penambahan') {
                    $query = $this->db->query("
                    INSERT INTO `transaksi_pelanggan` (`id_pelanggan`, `debit`, `kredit`, `waktu`, `id_transaksi`, `tipe_transaksi`, `pakai_mpay`, `saldo`, `keterangan`) 
                    VALUES ('$id', '0', '$nominal', CURRENT_TIMESTAMP, '0', '11', '0', '$saldoakhir', 'penambahan saldo oleh admin');                  
                    ");
                }
            }else if ($tipe_saldo == 2)
            {
                $data = array(
                'customer_id' => $id,
                'bank_number' => "MANUAL",
                'bank_name' => "MANUAL",
                'name' => "MANUAL",
                'status' => 1,
                );
                if ($tipe == 'pengurangan') 
                $data['value'] = -$nominal;
                else if ($tipe == 'penambahan') 
                $data['value'] = $nominal;
                
                
                $this->db->insert('ppob_topup',$data);
            }
        }
        
        function updateSaldoPelanggan($tipe_saldo,$id, $saldoakhir) {
            if($tipe_saldo == 1)
            $query = $this->db->query("UPDATE `saldo` SET saldo = '$saldoakhir' ,`update_at`= CURRENT_TIMESTAMP WHERE id_user = '$id'");
            else if ($tipe_saldo == 2){
                $this->db->where('id_user',$id);
                $data = array(
                'ppob_balance' => $saldoakhir
                );
                
                $this->db->update('saldo',$data);
            }
        }
        
        //    driver ================================================
        function getDriver() {
            $query = $this->db->query("SELECT *
            FROM driver a, saldo b 
            WHERE b.id_user = a.id
            AND a.status = 1");
            return $query->result();
        }
        
        function insertTransaksiDriver($tipe, $id, $nominal, $saldoakhir) {
            if ($tipe == 'pengurangan') {
                $query = $this->db->query("   
                INSERT INTO `transaksi_driver` (`id_driver`, `debit`, `kredit`, `waktu`, `id_transaksi`, `tipe_transaksi`, `saldo`, `keterangan`) 
                VALUES ('$id', '$nominal', '0', CURRENT_TIMESTAMP, '0', '12', '$saldoakhir', 'pengurangan saldo oleh admin');   
                ");
                } elseif ($tipe == 'penambahan') {
                $query = $this->db->query("
                INSERT INTO `transaksi_driver` (`id_driver`, `debit`, `kredit`, `waktu`, `id_transaksi`, `tipe_transaksi`, `saldo`, `keterangan`) 
                VALUES ('$id', '0', '$nominal', CURRENT_TIMESTAMP, '0', '11', '$saldoakhir', 'penambahan saldo oleh admin');                  
                ");
            }
        }
        
        function updateSaldoDriver($id, $saldoakhir) {
            $query = $this->db->query("UPDATE `saldo` SET saldo = '$saldoakhir' ,`update_at`= CURRENT_TIMESTAMP WHERE id_user = '$id'");
        }
        
    }            