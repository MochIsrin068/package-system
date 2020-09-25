<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . '/libraries/REST_Controller.php';
    
    class Driver extends REST_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->helper("url");
            $this->load->database();
            $this->load->model('Driver_model');
            date_default_timezone_set('Asia/Kuala_Lumpur');
        }
        
        
        
        function index_get($isis){
            $this->response(md5($isis),200);
            //        $this->load->view("api");
        }
        
        function login_post() {
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $data = file_get_contents("php://input");
            $decoded_data = json_decode($data);
            
            $dataEdit = array(
            'reg_id' => $decoded_data->reg_id
            );
            
            $dataConf = array(
            'status' => 4
            );
            
            $condition = array(
            'password' => md5($decoded_data->password),
            'no_telepon' => $decoded_data->no_telepon
            );
            
            $check_banned = $this->Driver_model->check_banned($decoded_data->no_telepon);
            if ($check_banned) {
                $message = array(
                'message' => 'banned',
                'data' => []
                );
                $this->response($message, 200);
                } else {
                $cek_exist = $this->Driver_model->check_exist($decoded_data->no_telepon, md5($decoded_data->password));
                $message = array();
                
                if ($cek_exist){
                    $upd_regid = $this->Driver_model->edit_reg_id($dataEdit, $decoded_data->no_telepon);
                    $cek_login = $this->Driver_model->get_data_pelanggan($condition);
                    $upd_config = $this->Driver_model->edit_config($dataConf, $cek_login[0]->row('id'));
                    
                    $message = array(
                    'message' => 'found',
                    'data_pelanggan'=>$cek_login[0]->result(),
                    'data_kendaraan'=>$cek_login[1]->result(),
                    'data_config'=>$cek_login[2]->result()
                    );
                    $this->response($message, 200);
                    } else {
                    $message = array(
                    'message' => 'not found',
                    'data' => []
                    );
                    $this->response($message, 200);
                }
            }
        }
        
        function request_code_reset_password_post()
		{
			$data = file_get_contents("php://input");
			$dec_data = json_decode($data);
			
			$driver = $this->Driver_model->check_email($dec_data->email);
			if($driver)
			{
				$reset_code = $this->Driver_model->generate_request_code_reset_password($driver->id);
				
				$this->load->config('mail');
				$mail_config = $this->config->item('mail_setting');
				$this->load->library('email', $mail_config);
				$this->email->set_newline("\r\n");   
				
				$this->email->from($this->config->item('mail_email'), $this->config->item('mail_name')); 
				$this->email->to($dec_data->email);
				$this->email->subject('Reset Kata Sandi Driver Msm Indoensia'); 
				$this->email->message('hai! <b>'.$driver->nama_depan.'</b>, untuk mereset sandi kamu dengan email '.$dec_data->email.'. Kamu cukup masukan kode reset di aplikasi<br><br><b>Kode Reset : '.$reset_code."</b>"); 
				
				//Send mail 
				$this->email->send();
				
				$message = array(
				'message' => 'Kode Reset telah dikirimkan ke Email Kamu. Cek Email kamu lalu masukan Kode Reset dibawah ini',
				'status' => true,
				);
				$this->response($message, 200);
            }else
			{
				$message = array(
				'message' => 'Email tidak terdaftar.',
				'status' => false,
				);
				$this->response($message, 200);
            }
        }
		
		function check_code_reset_password_post()
		{
			$data = file_get_contents("php://input");
			$dec_data = json_decode($data);
			
			$status = $this->Driver_model->check_code_reset_password($dec_data->email,$dec_data->code);
			
			if($status)
			{
				$message = array(
				'message' => 'Code Valid',
				'status' => true,
				);
				$this->response($message, 200);
            }else
			{
				$message = array(
				'message' => 'Code tidak valid. Silahkan lakukan Permintaan kode ulang, lalu cek email',
				'status' => false,
				);
				$this->response($message, 200);
            }
        }
		
		function save_reset_password_post()
		{
			$data = file_get_contents("php://input");
			$dec_data = json_decode($data);
			
			$status = $this->Driver_model->check_code_reset_password($dec_data->email,$dec_data->code);
			
			if($status)
			{
				$this->Driver_model->update_password($status->id,$dec_data->new_password);
				$message = array(
				'message' => 'Berhasil Mengubah Kata Sandi',
				'status' => true,
				);
				$this->response($message, 200);
            }else
			{
				$message = array(
				'message' => 'Code tidak valid. Silahkan lakukan Permintaan kode ulang, lalu cek email',
				'status' => false,
				);
				$this->response($message, 200);
            }
        }
        
        function generateSaldo_get(){
            //        
            //        $data = array();
            //        for($i=3; $i<=17; $i++){
            //            $dataOne = array(
            //                'id_user'=>'P'.$i,
            //                'saldo'=>0
            //            );
            //            array_push($data, $dataOne);
            //        }
            //        $this->db->insert_batch('saldo', $data);
            //        if($this->db->affected_rows() > 0){
            //            return true;
            //        }else{
            //            return false;
            //        }
            //        $this->response($data, 200);
        }
        
        function update_profile_post() {
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $whatUpd = $dec_data->whatUpd;
            
            $adate = 'foto'.substr($dec_data->id, 1);
            $data_updF = array(
            $whatUpd => $adate.".jpg",
            'update_at' => date('Y-m-d H:i:s')
            );
            $url_foto = $_SERVER["DOCUMENT_ROOT"] . '/admin/fotodriver/';
            
            if($whatUpd == 'foto'){
                $statImg = $this->save_image($url_foto, $dec_data->value, $adate);
                //            $statImg = FALSE;
                if($statImg){
                    $upd_profile = $this->Driver_model->edit_profile($data_updF, $dec_data->email);
                    }else{
                    $upd_profile  = array(true, false);
                }
                }else if($whatUpd == 'password'){
                $data_upd = array(
                $whatUpd => md5($dec_data->value)
                );
                $upd_profile = $this->Driver_model->setting_profile($data_upd, $dec_data->id_driver);
                }else if($whatUpd == 'email'){
                $data_upd = array(
                $whatUpd => $dec_data->value
                );
                $upd_profile = $this->Driver_model->setting_profile_email($data_upd, $dec_data->id_driver);
            }
            
            if ($upd_profile[0]){
                if($upd_profile[1]){
                    $message = array(
                    'message' => 'success',
                    'data' => []
                    );
                    $this->response($message, 200);
                    }else{
                    $message = array(
                    'message' => 'fail',
                    'data' => []
                    );
                    $this->response($message, 200);
                }
                } else {
                $message = array(
                'message' => 'email exist',
                'data' => 'Email sudah teradmin'
                );
                $this->response($message, 200);
            }
        }
        
        function update_akun_bank_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $whatUpd = $dec_data->whatUpd;
            $data_updF = array(
            'nama_bank' => $dec_data->nama_bank,
            'atas_nama' => $dec_data->atas_nama,
            'rekening_bank' => $dec_data->rekening_bank,
            'update_at' => date('Y-m-d H:i:s')
            );
            $upd_profile = $this->Driver_model->edit_profile($data_updF, $dec_data->email);
            if($upd_profile[1]){
                $message = array(
                'message' => 'success',
                'data' => []
                );
                $this->response($message, 200);
                }else{
                $message = array(
                'message' => 'fail',
                'data' => []
                );
                $this->response($message, 200);
            }
        }
        
        function update_kendaraan_post() {
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $data_updF = array(
            'merek' => $dec_data->merek,
            'tipe' => $dec_data->tipe,
            'nomor_kendaraan' => $dec_data->nomor_kendaraan,
            'warna' => $dec_data->warna
            );
            
            $upd_kendaraan = $this->Driver_model->setting_kendaraan($data_updF, $dec_data->id_driver);
            
            if($upd_kendaraan){
                $message = array(
                'message' => 'success',
                'data' => []
                );
                $this->response($message, 200);
                }else{
                $message = array(
                'message' => 'fail',
                'data' => 'Tidak ada perubahan dalam data'
                );
                $this->response($message, 200);
            }
        }
        
        function save_image($url_foto, $base, $name){
            if (isset($base)) {
                $image_name = $name.".jpg";
                // base64 encoded utf-8 string
                $binary = base64_decode($base);
                // binary, utf-8 bytes
                $success = file_put_contents($url_foto.$image_name, $binary,LOCK_EX);
                //            $file = fopen($url_foto.$image_name, "w+"); 
                //            fwrite($file, $binary);	
                //            fclose($file);
                //            $angle = 0;
                //            $source = imagecreatefromstring($binary);
                //            $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
                //            $success = imagejpeg($rotate, $url_foto.$image_name, 100);
                //            imagedestroy($source);
                return $success;
                }else{
                return FALSE;
            }
        }
        
        function turning_on_bekerja_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $is_turn = $dec_data->is_turn;
            $dataEdit = array();
            if($is_turn){
                $dataEdit = array(
                'status' => 1
                );
                $upd_regid = $this->Driver_model->edit_config($dataEdit, $dec_data->id_driver);
                if($upd_regid){
                    $message = array(
                    'message' => 'success',
                    'data' => []
                    );
                    $this->response($message, 200);
                    }else{
                    $message = array(
                    'message' => 'fail',
                    'data' => []
                    );
                    $this->response($message, 200);
                }
                }else{
                $dataEdit = array(
                'status' => 4
                );
                $upd_regid = $this->Driver_model->edit_config($dataEdit, $dec_data->id_driver);
                if($upd_regid){
                    $message = array(
                    'message' => 'success',
                    'data' => []
                    );
                    $this->response($message, 200);
                    }else{
                    $message = array(
                    'message' => 'fail',
                    'data' => []
                    );
                    $this->response($message, 200);
                }
            }
        }
        
        function my_location_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            //        
            //        $this->db->where('email',$_SERVER['PHP_AUTH_USER']);
            //        $this->db->where('password',sha1($_SERVER['PHP_AUTH_PW']));
            //        
            //        $this->db->from('driver');
            //        $hasil= $this->db->get();
            $data = array(
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'id_driver' => $this->input->post('id_driver')
            );
            $ins = $this->Driver_model->set_my_location($data);
            
            if($ins){
                $message = array(
                'message' => 'location updated',
                'data' => []
                );
                $this->response($message, 200);
            }
        }
        
        function check_version_post(){
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            // if($dec_data->version < 13){
            //     $message = array(
            //         'new_version' => 'hold',
            //         'message' => 'Aplikasi driver ini sudah tidak didukung dan beralih ke aplikasi yang baru. Dimohon untuk melakukan uninstall aplikasi dan mendownload ulang di playstore dengan kata kunci "Driver Mangjek".',
            //         'data' => []
            //     );
            //     $this->response($message, 200);                            
            // }else{
            $getVer = $this->Driver_model->getVersions();
            if($getVer > $dec_data->version){
                $message = array(
                'new_version' => 'yes',
                'message' => 'Aplikasi driver ini sudah tidak didukung dan beralih ke aplikasi yang baru. Dimohon untuk melakukan uninstall aplikasi dan mendownload ulang di playstore dengan kata kunci "Driver Mangjek".',
                'data' => []
                );
                $this->response($message, 200);
                }else {
                $message = array(
                'new_version' => 'no',
                'message' => 'no new version available',
                'data' => []
                );
                $this->response($message, 200);
            }            
            // }
            
        }
        
        function verifikasi_topup_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])){
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            
            $adate = $dec_data->id.'_'.date("Y-m-d_H-i-s");
            $url_foto = $_SERVER["DOCUMENT_ROOT"] . '/asset/berkas_topup/driver/';
          
            
            $save = $this->save_image($url_foto, $dec_data->bukti, $adate);
            if($save){
                $data_topup = array(
                'id_user' => $dec_data->id,
                'no_rekening' => $dec_data->no_rekening,
                'atas_nama' => $dec_data->atas_nama,
                'jumlah' => $dec_data->jumlah,
                'bukti' => $adate.".jpg",
                'bank' =>$dec_data->bank
                );
                
                $topup = $this->Driver_model->verify_topup($data_topup);
                if($topup){
                    $message = array(
                    'message' => 'success',
                    'data' => []
                    );
                    
                    $data = array(
					'target_id' => 1,
					'title' => "Driver Topup",
					'body' => "ID Driver :".$dec_data->id." - ".$dec_data->atas_nama." telah melakukan Topup sebesar :".$dec_data->jumlah,
					'icon' => "",
					'image_path' => "",
					'link_action' => $this->config->item('base_url_server')."Drivertopup"
                    );
                    
                    $this->load->model('Notification_model');
                    $this->Notification_model->addNotification($data);
                    
                    $this->response($message, 200);            
                    }else{
                    $message = array(
                    'message' => 'fail',
                    'data' => []
                    );
                    $this->response($message, 200);            
                }
                
                }else{
                $message = array(
                'message' => 'fail',
                'data' => []
                );
                $this->response($message, 200); 
            }
            
        }
        
        public function list_topup_post()
        {
            if (!isset($_SERVER['PHP_AUTH_USER'])){
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $customer_id = $this->post('customer_id');
            $param = array(
            'page' => $dec_data->page,
            'limit' => $dec_data->limit,
            );
            $topups = $this->Driver_model->get_list_topup($dec_data->id,$param);
            
            if($topups)
            {
                $response = array(
                'status' => true,
                'message' => "Berhasil",
                'topups' => $topups,
                );
            }else
            {
                $response = array(
                'status' => false,
                'message' => "Tidak ada data transaksi untuk ditampilkan",
                'topups' => [],
                );
            }
            $this->response($response, 200);
        }
        
        function withdrawal_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])){
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $data_with = array(
            'id_driver' => $dec_data->id_driver,
            'jumlah' => $dec_data->jumlah
            );
            
            $topup = $this->Driver_model->withdrawal($data_with);
            if($topup){
                $message = array(
                'message' => 'success',
                'data' => []
                );
                
                $data = array(
				'target_id' => 1,
				'title' => "Driver Withdraw",
				'body' => "ID Driver :".$dec_data->id_driver." telah melakukan withdraw sebesar :".$dec_data->jumlah,
				'icon' => "",
				'image_path' => "",
				'link_action' => $this->config->item('base_url_server')."Withdraw"
                );
                
                $this->load->model('Notification_model');
                $this->Notification_model->addNotification($data);
                
                $this->response($message, 200);            
                }else{
                $message = array(
                'message' => 'fail',
                'data' => []
                );
                $this->response($message, 200);            
            }
            
            
        }
        
        function update_uang_belanja_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])){
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $dataEdit = array(
            'id_driver'=>$dec_data->id_driver,
            'uang_belanja'=>$dec_data->id_uang
            );
            
            $upd_uang = $this->Driver_model->edit_config($dataEdit, $dec_data->id_driver);
            if($upd_uang){
                $message = array(
                'message' => 'success',
                'data'=>[]
                );
                $this->response($message, 200);
                }else{
                $message = array(
                'message' => 'fail',
                'data'=>[]
                );
                $this->response($message, 200);
            }
        }
        
        function get_feedback_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])){
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $condition = array(
            'id_driver' => $dec_data->id
            );
            
            $feed = $this->Driver_model->get_feedback($condition);
            if($feed){
                $message = array(
                'message' => 'success',
                'data' => $feed
                );
                $this->response($message, 200);            
                }else{
                $message = array(
                'message' => 'fail',
                'data' => []
                );
                $this->response($message, 200);            
            }
        }
        
        function get_riwayat_transaksi_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])){
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $condition = array(
            'transaksi_driver.id_driver' => $dec_data->id,
            'Date(transaksi_driver.waktu)' => $dec_data->date,
            );
            
            $grt = $this->Driver_model->get_riwayat_transaksi($condition);
            $summary = $this->Driver_model->get_total_income_and_reward($dec_data->id,$dec_data->date);
            $reward = $this->Driver_model->get_reward($dec_data->id,$dec_data->date);
            if(count($grt) > 0){
                $message = array(
                'message' => 'success',
				'summary' => $summary,
				'reward' => $reward,
                'data' => $grt
                );
                $this->response($message, 200);            
                }else{
                $message = array(
                'message' => 'fail',
				'summary' => $summary,
				'reward' => $reward,
                'data' => []
                );
                $this->response($message, 200);            
            }
        }
        
        function logout_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $data = file_get_contents("php://input");
            $decoded_data = json_decode($data);
            $dataEdit = array(
            'status' => 5
            );
            
            $logout = $this->Driver_model->logout($dataEdit, $decoded_data->id);
            if ($logout) {
                $message = array(
                'message' => 'success',
                'data' => []
                );
                $this->response($message, 200);
                } else {
                $message = array(
                'message' => 'success',
                'data' => []
                );
                $this->response($message, 200);
            }
        }
        
        function send_message_to_driver($id_driver, $message){ 
        }
        
        function syncronizing_account_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $getDataDriver = $this->Driver_model->get_data_driver($dec_data->id);
            if($getDataDriver['status_order']->num_rows() > 0)
            {
                $stat = 0;
                if($getDataDriver['status_order']->row('status') == 3){
                    $stat = 2;
                    }else{
                    $stat = 3;
                }
                
                $getTrans = $this->Driver_model->change_status_driver($dec_data->id, $stat);
                
                $message = array(
                'message' => 'success',
                'driver_status'=> $stat,
                'data_driver' => $getDataDriver['data_driver']->result(),
                'data_transaksi' => $getDataDriver['status_order']->result()
                );
                $this->response($message, 200);
                }else{
                $message = array(
                'message' => 'success',
                'driver_status'=> $getDataDriver['data_driver']->row('status_config'),
                'data_driver' => $getDataDriver['data_driver']->result(),
                'data_transaksi' => []
                );
                $this->response($message, 200);
            }
        }
        
        function get_performance_post(){
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            
            $configuration = $this->Driver_model->get_driver_configuration();
            $base_percentage = $configuration['start_percentage'];
            
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            
            $status_order = $this->Driver_model->get_status_order($dec_data->id,$dec_data->date);
            $list_reward = $this->Driver_model->get_list_reward();
            usort($list_reward, function ($a, $b) {return $a->target_success > $b->target_success;});
            
            // mengurangi performa saat pelanggan membatalkan
            $base_percentage -= ($status_order['canceled_user_order'] * $configuration['user_cancel_percentage']); 
            
            // menambah performa saat pelanggan membatalkan (jika tidak mempengaruhi performa)
            $base_percentage += ($status_order['canceled_user_order_unaffected_performance'] * $configuration['user_cancel_percentage']); 
            
            $base_percentage -= ($status_order['canceled_driver_order'] * $configuration['driver_cancel_percentage']);
            $base_percentage -= ($status_order['rejected_driver_order'] * $configuration['driver_reject_percentage']);
            $base_percentage += ($status_order['success_order'] * $configuration['success_percentage']);
            
            $base_percentage = ($base_percentage > 100)? 100 : $base_percentage;
            $base_percentage = ($base_percentage < 0)? 0 : $base_percentage;
            
            $order_need = 0;
            $temp_percentage = $base_percentage;
            if($base_percentage < $configuration['minimum_percentage_bonus'])
            {
                do{
                    $temp_percentage += $configuration['success_percentage'];
                    $order_need++;
                }while($temp_percentage < $configuration['minimum_percentage_bonus']);
				
            }
            $point = $status_order['success_order'] * 1.0;
            
            $index_need = 0;
            $point_need = 0;
            
            if(count($list_reward) > 0)
            {
                if($base_percentage >= $configuration['minimum_percentage_bonus'])
                {
                    for($i = 0; $i < count($list_reward);$i++)
                    {
                        $index_need = $i;
                        if($point < $list_reward[$index_need]->target_success)
                        {
                            break;
                        }
                    }
                }
                $point_need = $list_reward[$index_need]->target_success - $point;
                $point_need = ($point_need < 0)? 0 : $point_need;
            }
            
            $message = array(
            'message' => 'success',
			'percentage' => $base_percentage,
			'order_success' => $status_order['success_order'],
			'order_total' => $status_order['total_order'],
			'order_need' => $order_need,
			'minimum_percentage_bonus' => $configuration['minimum_percentage_bonus'],
			'list_reward' => $list_reward,
			'point' => $point,
			'point_need' => $point_need,
			'next_reward' => $list_reward[$index_need],
            'c'=> $configuration,
            's'=> $status_order,
            );
            $this->response($message, 200);
            
        }
        
    }            