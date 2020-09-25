<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Driver_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }
	function select_get_jumlah($namatabel){
		$query = $this->db->get($namatabel);
		return $query->num_rows();
	}
//====================================================================================================
    function getAllDriver() {
        $query = $this->db->query("
                SELECT a.id, a.nama_depan , a.nama_belakang, a.no_ktp, a.tgl_lahir, a.tempat_lahir, a.no_telepon, a.email, a.password, a.foto, a.rating, b.status_user , c.merek , c.tipe , e.jenis_kendaraan, c.nomor_kendaraan , c.warna , d.driver_job
                FROM driver a, `status_user` b , kendaraan c, driver_job d , jenis_kendaraan e
                WHERE a.status = b.id 
                AND a.kendaraan = c.id 
                AND a.job = d.id
                AND  c.jenis = e.id
                AND (a.status = 1 OR a.status = 3)
            ");
        return $query->result();
    }
     function getAllLokasi() {
       return $this->db->get('config_driver'); 
    }
        function getDaftarBox() {
        $query = $this->db->query("
               SELECT COUNT(nomor) as jumlah from `berkas_lamaran_kerja` WHERE job=4

            ");
        return $query->result_array();
    }
    
       function getDaftarRide() {
        $query = $this->db->query("
               SELECT COUNT(nomor) as jumlah from `berkas_lamaran_kerja` WHERE job=1

            ");
        return $query->result_array();
    }
       function getTerimaBox() {
        $query = $this->db->query("
          SELECT COUNT(nomor) as jumlah from `berkas_lamaran_kerja` WHERE job=4 AND is_valid='valid'

            ");
        return $query->result_array();
    }
         function getTerimaRide() {
        $query = $this->db->query("
          SELECT COUNT(nomor) as jumlah from `berkas_lamaran_kerja` WHERE job=1 AND is_valid='valid'

            ");
        return $query->result_array();
    }
      function getboxTransaksicancel() {
 

        $query = $this->db->query("
     SELECT COUNT(nomor) as jumlah FROM history_transaksi b, transaksi_detail_mbox c WHERE b.id_transaksi=c.id_transaksi AND b.status=5


            ");
        return $query->result_array();
    }
     function getboxTransaksifinish() {
 

        $query = $this->db->query("
     SELECT COUNT(nomor) as jumlah FROM history_transaksi b, transaksi_detail_mbox c WHERE b.id_transaksi=c.id_transaksi AND b.status=7


            ");
        return $query->result_array();
    }
       function getboxJumlahDriver() {
 

        $query = $this->db->query("
    SELECT COUNT(job) as jumlah FROM driver WHERE job=4
            ");
        return $query->result_array();
    }
    function getTolakBox() {
        $query = $this->db->query("
              SELECT COUNT(nomor) as jumlah from `berkas_lamaran_kerja` WHERE job=4 AND is_valid='no'


            ");
        return $query->result_array();
    }
       function getTolakRide() {
        $query = $this->db->query("
              SELECT COUNT(nomor) as jumlah from `berkas_lamaran_kerja` WHERE job=1 AND is_valid='no'


            ");
        return $query->result_array();
    }
        function getJumlajTransaksiBox() {
        $query = $this->db->query("
              SELECT COUNT(nomor) as jumlah FROM history_transaksi b, transaksi_detail_mbox c WHERE b.id_transaksi=c.id_transaksi



            ");
        return $query->result_array();
    }
          function getJumlajTransaksiRide() {
        $query = $this->db->query("
            SELECT COUNT(nomor) as jumlah FROM history_transaksi b, transaksi c WHERE b.id_transaksi=c.id AND c.order_fitur IN (1,3,5,10)



            ");
        return $query->result_array();
    }

    function getAllMmassage() {
        $query = $this->db->query("
                SELECT a.id, a.nama_depan , a.nama_belakang, a.no_ktp, a.tgl_lahir, a.tempat_lahir, a.no_telepon, a.email, a.password, a.foto, a.rating, b.status_user ,d.driver_job
                FROM driver a, `status_user` b , driver_job d
                WHERE a.status = b.id 
                AND a.job = d.id
                AND (a.status = 1 OR a.status = 3)
                AND a.job = 3
            ");
        return $query->result();
    }
  function getHistoryTransaksiFood() {
 

        $query = $this->db->query("
                SELECT a.nomor , e.fitur , d.nama_depan, d.nama_belakang, d.no_telepon, c.status_transaksi, a.waktu, a.id_driver, b.pakai_mpay

                FROM 
                history_transaksi a, 
                transaksi b , 
                status_transaksi c , 
                pelanggan d , 
                fitur_mangjek e

                WHERE a.status = c.id
                AND a.id_transaksi = b.id
                AND b.id_pelanggan = d.id
                AND b.order_fitur = e.id IN (3)
                ORDER BY b.id DESC
                LIMIT 10
            ");
        return $query->result();
    }
    function belumterima(){
        
         $query = $this->db->query("
    SELECT COUNT(nomor) as jumlah from berkas_lamaran_kerja WHERE is_valid='no' AND job=4

            ");
        return $query->result_array();
    }
    function getHistoryTransaksibox() {
 

        $query = $this->db->query("
                SELECT a.nomor , e.fitur , d.nama_depan, d.nama_belakang, d.no_telepon, c.status_transaksi, a.waktu, a.id_driver, b.pakai_mpay

                FROM 
                history_transaksi a, 
                transaksi b , 
                status_transaksi c , 
                pelanggan d , 
                fitur_mangjek e

                WHERE a.status = c.id
                AND a.id_transaksi = b.id
                AND b.id_pelanggan = d.id
                AND b.order_fitur = e.id IN (7)
                ORDER BY b.id DESC
                LIMIT 10
            ");
        return $query->result();
    }
    function getAllDriverMotor() {
        $query = $this->db->query("
                SELECT a.id, a.nama_depan , a.nama_belakang,a.foto, a.no_ktp, a.tgl_lahir, a.tempat_lahir, a.no_telepon,a.foto, a.email, a.password, a.foto, a.rating, b.status_user , c.merek , c.tipe , e.jenis_kendaraan, c.nomor_kendaraan , c.warna , d.driver_job, saldo
                FROM driver a
                LEFT JOIN `status_user` b ON a.status = b.id
                LEFT JOIN saldo ON a.id = saldo.id_user
                LEFT JOIN kendaraan c ON a.kendaraan = c.id
                JOIN driver_job d ON a.job = d.id
                LEFT JOIN jenis_kendaraan e ON c.jenis = e.id
                WHERE (a.status = 1 OR a.status = 3)
                AND a.job = 1
            ");
        return $query->result();
    }

    function getAllDriverMcar() {
        $query = $this->db->query("
                SELECT a.id, a.nama_depan , a.nama_belakang, a.no_ktp, a.tgl_lahir, a.tempat_lahir,
                 a.no_telepon, a.email, a.password, a.foto, a.rating, b.status_user , c.merek , c.tipe ,
                  e.jenis_kendaraan, c.nomor_kendaraan , c.warna , d.driver_job,saldo
                 FROM driver a
                LEFT JOIN `status_user` b ON a.status = b.id
                LEFT JOIN saldo ON a.id = saldo.id_user
                LEFT JOIN kendaraan c ON a.kendaraan = c.id
                JOIN driver_job d ON a.job = d.id
                LEFT JOIN jenis_kendaraan e ON c.jenis = e.id
                WHERE (a.status = 1 OR a.status = 3)
                AND a.job = 2
            ");
        return $query->result();
    }

    function getAllDriverMbox() {
        $query = $this->db->query("
                SELECT a.id, a.nama_depan , a.nama_belakang, a.no_ktp, a.tgl_lahir, a.tempat_lahir,
                 a.no_telepon, a.email, a.password, a.foto, a.rating, b.status_user , c.merek , c.tipe ,
                  e.jenis_kendaraan, c.nomor_kendaraan , c.warna , d.driver_job,saldo
                 FROM driver a
                LEFT JOIN `status_user` b ON a.status = b.id
                LEFT JOIN saldo ON a.id = saldo.id_user
                LEFT JOIN kendaraan c ON a.kendaraan = c.id
                JOIN driver_job d ON a.job = d.id
                LEFT JOIN jenis_kendaraan e ON c.jenis = e.id
                WHERE (a.status = 1 OR a.status = 3)
                AND a.job = 4
            ");
        return $query->result();
    }


//=======================================================================================================
    function resetPassword($idDriver) {
        $query = $this->db->query("UPDATE `driver` 
            SET `password` = 'e10adc3949ba59abbe56e057f20f883e' 
            WHERE `driver`.`id` = '$idDriver';");
    }

//    ==========================================================================================

    function getJumlahDriverAktif() {
        $query = $this->db->query("
SELECT COUNT(id) AS jumlah FROM `driver` WHERE `status` = '1'
            ");
        return $query->result_array();
    }

    function getJumlahDriverNonAktif() {
        $query = $this->db->query("
SELECT COUNT(id) AS jumlah FROM `driver` WHERE `status` = '2'
            ");
        return $query->result_array();
    }

    function getJumlahDriverBanned() {
        $query = $this->db->query("
SELECT COUNT(id) AS jumlah FROM `driver` WHERE `status` = '3'
            ");
        return $query->result_array();
    }

    //    ==========================================================================================

    function getDriver($idDriver) {
        $query = $this->db->query("
                SELECT a.id, a.nama_depan , a.nama_belakang, a.no_ktp, a.tgl_lahir, a.tempat_lahir, a.no_telepon, a.email, a.password, a.foto, a.rating, b.status_user , c.merek , c.tipe , e.jenis_kendaraan, c.nomor_kendaraan , c.warna , d.driver_job, a.kendaraan AS idkendaraan
                FROM driver a, `status_user` b , kendaraan c, driver_job d , jenis_kendaraan e
                WHERE a.status = b.id 
                AND a.kendaraan = c.id 
                AND a.job = d.id
                AND  c.jenis = e.id
                AND a.id = '$idDriver'
            ");
        return $query->result_array();
    }
       function getMmassage($idDriver) {
        $query = $this->db->query("
                SELECT a.id, a.nama_depan , a.nama_belakang, a.no_ktp, a.tgl_lahir, a.tempat_lahir, a.no_telepon, a.email, a.password, a.foto, a.rating, b.status_user , d.driver_job
                FROM driver a, `status_user` b, driver_job d 
                WHERE a.status = b.id 
                AND a.job = d.id
                AND a.id = '$idDriver'
            ");
        return $query->result_array();
    }


    //    ==========================================================================================

    function getHistoryTransaksi($idDriver) {
        $query = $this->db->query("
                SELECT b.id , e.fitur , d.nama_depan, d.nama_belakang, c.status_transaksi, a.waktu
                FROM history_transaksi a, transaksi b , status_transaksi c , pelanggan d , fitur_mangjek e
                WHERE a.status = c.id
                AND a.id_transaksi = b.id
                AND b.id_pelanggan = d.id
                AND b.order_fitur = e.id
                AND a.id_driver = '$idDriver'
                ORDER BY b.id DESC
                LIMIT 5
            ");
        return $query->result();
    }
      function getJumlahTransaksidriver($idDriver) {
        $query = $this->db->query("
           SELECT COUNT(id_transaksi) as jumlah FROM history_transaksi WHERE id_driver='$idDriver'
            ");
     return $query->result_array();
    }
     function getJumlahTransaksidriverStatus($idDriver) {
        $query = $this->db->query("
           SELECT COUNT(id_transaksi) as status FROM history_transaksi WHERE id_driver='$idDriver'AND status='7'
            ");
     return $query->result_array();
    }
    function getJumlahTransaksidrivercancel($idDriver) {
        $query = $this->db->query("
           SELECT COUNT(id_transaksi) as cancel FROM history_transaksi WHERE id_driver='$idDriver'AND status='5'
            ");
     return $query->result_array();
    }
    function getAllHistoryTransaksi() {
        $bulan = date("m");
        $tahun = date("Y");

        $query = $this->db->query("
                SELECT a.nomor , e.fitur , d.nama_depan, d.nama_belakang, d.no_telepon, c.status_transaksi, a.waktu, a.id_driver, b.pakai_mpay

                FROM 
                history_transaksi a, 
                transaksi b , 
                status_transaksi c , 
                pelanggan d , 
                fitur_mangjek e

                WHERE a.status = c.id
                AND a.id_transaksi = b.id
                AND b.id_pelanggan = d.id
                AND b.order_fitur = e.id
                AND MONTH(a.waktu) = $bulan
                AND YEAR(a.waktu) = $tahun
                ORDER BY b.id DESC
                LIMIT 10
            ");
        return $query->result();
    }
     function getTransaksiMitraFood() {
 

        $query = $this->db->query("
         SELECT COUNT(id) AS jumlah FROM `transaksi_detail_mfood`

            ");
             return $query->result_array();
    }
       function getTransaksiMitraToko() {


        $query = $this->db->query("
        
        SELECT COUNT(id) AS jumlah FROM `transaksi_detail_mlaundry`

            ");
       return $query->result_array();
      
    }
     function getMakanan() {

               $query = $this->db->query("
                SELECT COUNT(id) AS jumlah FROM `makanan`
            ");
        return $query->result_array();
    }
      function getJumlahResto() {

               $query = $this->db->query("
                SELECT COUNT(id) AS jumlah FROM `restoran`
            ");
        return $query->result_array();
    }
     function getJumlahToko() {

               $query = $this->db->query("
                SELECT COUNT(id) AS jumlah FROM `laundry`
            ");
        return $query->result_array();
    }

    function getDetilHistoryTransaksi() {

        //$bulan = date("m");
        //$tahun = date("Y");
//        lihat tranasksi tanpa limit 15
        $query = $this->db->query("
                SELECT a.nomor , e.fitur , d.nama_depan, d.nama_belakang, d.no_telepon, c.status_transaksi, a.waktu, a.id_driver, b.pakai_mpay

                FROM 
              
                history_transaksi a, 
                transaksi b , 
                status_transaksi c , 
                pelanggan d , 
                fitur_mangjek e

                WHERE a.status = c.id
                AND a.id_transaksi = b.id
                AND b.id_pelanggan = d.id
                AND b.order_fitur = e.id
                
                ORDER BY b.id DESC
            ");
        return $query->result();
    }
//AND MONTH(a.waktu) = $bulan
//AND YEAR(a.waktu) = $tahun

// CANCEL TRANSAKSI ===========================
    function listCancelTransaksi() {

        $bulan = date("m");
        $tahun = date("Y");
//        lihat tranasksi tanpa limit 15
        $query = $this->db->query("
                SELECT a.nomor , a.id_transaksi, a.id_driver, b.id_pelanggan, e.fitur , d.nama_depan, d.nama_belakang, d.no_telepon, c.status_transaksi, a.waktu, a.id_driver
                
                FROM 
                history_transaksi a, 
                transaksi b , 
                status_transaksi c , 
                pelanggan d , 
                fitur_mangjek e

                WHERE a.status = c.id
                AND a.id_transaksi = b.id
                AND b.id_pelanggan = d.id
                AND b.order_fitur = e.id
                AND MONTH(a.waktu) = $bulan
                AND YEAR(a.waktu) = $tahun
                AND (a.status = 3 OR a.status = 6)
                ORDER BY b.id DESC
            ");
        return $query->result();
    }

    function cancelTransaksi($idHistoryTransaksi, $idTrans, $idDriver, $idPelanggan) {

//        query update status 3 to 5 
        $this->db->query("UPDATE `history_transaksi` SET `status` = '5' WHERE `nomor` = '$idHistoryTransaksi';");
        // API backend ke driver dan pelanggan
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://demo.bacapaper.com/api/book/send_cancel_signal/" . $idDriver . "/" . $idPelanggan . "/" . $idTrans);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $stat = curl_exec($ch);
        curl_close($ch);
//        $this->response($stat, 200);
    }

    //========================================================================================
// JUMLAH TRANSAKSI ===================================
//    1 contacting
//    2 bidding
//    3 success
//    4 rejected
//    5 canceled
//    6 start
//    7 finish
    function getTotalTransaksi($status) {
        $bulan = date("m");
        $tahun = date("Y");

        switch ($status) {
            case 1:
                $query = $this->db->query("
                SELECT COUNT(nomor) as jumlah
                FROM history_transaksi
                WHERE MONTH(waktu) = $bulan
                AND YEAR(waktu) = $tahun
                AND status = 1
            ");
                return $query->result_array();
                break;

            case 2:
                $query = $this->db->query("
                SELECT COUNT(nomor) as jumlah
                FROM history_transaksi
                WHERE MONTH(waktu) = $bulan
                AND YEAR(waktu) = $tahun
                AND status = 2
            ");
                return $query->result_array();
                break;

            case 3:
                $query = $this->db->query("
                SELECT COUNT(nomor) as jumlah
                FROM history_transaksi
                WHERE MONTH(waktu) = $bulan
                AND YEAR(waktu) = $tahun
                AND status = 3
            ");
                return $query->result_array();
                break;

            case 4:
                $query = $this->db->query("
                SELECT COUNT(nomor) as jumlah
                FROM history_transaksi
                WHERE MONTH(waktu) = $bulan
                AND YEAR(waktu) = $tahun
                AND status = 4
            ");
                return $query->result_array();
                break;

            case 5:
                $query = $this->db->query("
                SELECT COUNT(nomor) as jumlah
                FROM history_transaksi
                WHERE MONTH(waktu) = $bulan
                AND YEAR(waktu) = $tahun
                AND status = 5
            ");
                return $query->result_array();
                break;

            case 6:
                $query = $this->db->query("
                SELECT COUNT(nomor) as jumlah
                FROM history_transaksi
                WHERE MONTH(waktu) = $bulan
                AND YEAR(waktu) = $tahun
                AND status = 6
            ");
                return $query->result_array();
                break;

            case 7:
                $query = $this->db->query("
                SELECT COUNT(nomor) as jumlah
                FROM history_transaksi
                WHERE MONTH(waktu) = $bulan
                AND YEAR(waktu) = $tahun
                AND status = 7
            ");
                return $query->result_array();
                break;

            default:
                break;
        }
    }

//  ==================================================




    function getTotalTransaksiBulanan($bulan, $tahun) {
//        lihat tranasksi tanpa limit 15
        $query = $this->db->query("
                SELECT COUNT(nomor) as jumlah
                FROM history_transaksi
                WHERE MONTH(waktu) = $bulan
                AND YEAR(waktu) = $tahun
            ");
        return $query->result_array();
    }

    function editStatus($idDriver, $status, $namadepan, $namabelakang, $ktp, $dob, $tempatlahir) {
        $query = $this->db->query("
                    UPDATE `driver` 
                    SET `nama_depan` = '$namadepan', 
                    `nama_belakang` = '$namabelakang', 
                    `no_ktp` = '$ktp', 
                    `tgl_lahir` = '$dob', 
                    `tempat_lahir` = '$tempatlahir', 
                    `status` = '$status' 
                    WHERE `id` = '$idDriver';            
            ");
    }

    function editKendaraan($tipekendaraan, $merekkendaraan, $nokendaraan, $warnakendaraan, $idkendaraan) {
        $query = $this->db->query("   
            UPDATE `kendaraan` 
            SET 
            `merek` = '$merekkendaraan', 
            `tipe` = '$tipekendaraan', 
            `nomor_kendaraan` = '$nokendaraan', 
            `warna` = '$warnakendaraan' 
            WHERE `kendaraan`.`id` = $idkendaraan;
            ");
    }

    function editStatusFoto($idDriver, $status, $namadepan, $namabelakang, $ktp, $dob, $tempatlahir, $foto) {
        $query = $this->db->query("
                    UPDATE `driver` 
                    SET `nama_depan` = '$namadepan', 
                    `nama_belakang` = '$namabelakang', 
                    `no_ktp` = '$ktp', 
                    `tgl_lahir` = '$dob', 
                    `tempat_lahir` = '$tempatlahir', 
                    `foto` = '$foto',
                    `status` = '$status' 
                    WHERE `id` = '$idDriver';                   
            ");
    }

    function getSaldoDriver($idDriver) {
        $query = $this->db->query("
                    SELECT * 
                    FROM `saldo` 
                    WHERE id_user = '$idDriver'                 
            ");
        return $query->result_array();
    }

	function getPengaturan() {
        $query = $this->db->query("
  

         SELECT * 
                FROM pengaturan

            ");
        return $query->result_array();
		}
}

?>
