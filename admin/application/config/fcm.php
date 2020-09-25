<?php
/*
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
|| Google Cloud Messaging Configurations
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
*/
/*
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
|| Google Cloud Messaging Configurations
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
*/
/*
|--------------------------------------------------------------------------
| User data
|--------------------------------------------------------------------------
| Get API Key: https://code.google.com/apis/console/
*/
$config['fcm_api_key'] = 'AAAAzf0gMiw:APA91bGPVZWdmvQOtOtha_r8WYSkWNVdfHu-gnaW-2rFgDo2Vv629niUEwgK9-9JNgsLW18va62434gPFJT4LF4gdiiA8gFqtF8Tsbz9-1cjeMGhG4XSEUB_jcsqPzVMhEqiK-sYxXHh';
$config['fcm_api_key_android'] = 'AIzaSyAdr46cYoXBACigB3A1xcY905rr48uvlEA';
/*
|--------------------------------------------------------------------------
| API Send Address
|--------------------------------------------------------------------------
|
*/
//$config['gcm_api_send_address'] = 'https://android.googleapis.com/gcm/send';
$config['fcm_api_send_address'] = 'https://fcm.googleapis.com/fcm/send';