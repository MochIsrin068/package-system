<?php defined('BASEPATH') OR exit('No direct script access allowed');
$config['mail_name'] = 'Msm Indonesia - New Registered';
$config['mail_email'] = 'no-replay@msmindonesia.com';
$config['mail_password'] = 'setiawan19';
$config['mail_setting'] = Array(
								'protocol' => 'smtp',
								'smtp_host' => 'ssl://srv75.niagahoster.com',
								'smtp_port' => 465,
								'smtp_user' => $config['mail_email'],
								'smtp_pass' => $config['mail_password'],
								'mailtype'  => 'html', 
								'charset'   => 'iso-8859-1'
						);
						
						//jika pakai gmial smtp aktifkan less secure di https://myaccount.google.com/lesssecureapps?pli=1