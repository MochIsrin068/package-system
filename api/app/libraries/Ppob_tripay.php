<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    
    class Ppob_tripay {
        var $CI;
        
        var $basepath = 'https://tripay.co.id/api/v2/';
        var $api_key = 'd1a1375bf3930244a28602c9d9dbd44bc65a2c746a70c4a6ecd5e9c947f0';
        var $pin = '3712';
        var $secret = '12341234';
        
        function __construct() {
            if(!isset($this->CI)) {
                $this->CI =& get_instance();
            }
        }
        
        function get_pin()
        {
            return $this->pin;
        }
        
        function get_secret()
        {
            return $this->secret;
        }
    
        // START OF PURCHASE FUNCTION
        
        function fetch_purchase_category()
        {
            $url = $this->basepath.'pembelian/category/';
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_purchase_operator()
        {
            $url = $this->basepath.'pembelian/operator/';
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_purchase_operator_by_category($category_id)
        {
            $url = $this->basepath.'pembelian/operator/bycategory?id='.$category_id;
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_purchase_product()
        {
            $url = $this->basepath.'pembelian/produk/';
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_purchase_product_by_category($category_id)
        {
            $url = $this->basepath.'pembelian/produk/bycategory?id='.$category_id;
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_purchase_product_by_operator($operator_id)
        {
            $url = $this->basepath.'pembelian/produk/byoperator?id='.$operator_id;
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function purchase_request($param)
        {
            $url = $this->basepath.'transaksi/pembelian';
            $data = $this->fetch($url,null,true,$param);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        // END OF PURCHASE FUNCTION
        
        // START OF PAYMENT FUNCTION
        
        function fetch_payment_category()
        {
            $url = $this->basepath.'pembayaran/category/';
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_payment_operator()
        {
            $url = $this->basepath.'pembayaran/operator/';
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_payment_operator_by_category($category_id)
        {
            $url = $this->basepath.'pembayaran/operator/bycategory?id='.$category_id;
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_payment_product()
        {
            $url = $this->basepath.'pembayaran/produk/';
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_payment_product_by_category($category_id)
        {
            $url = $this->basepath.'pembayaran/produk/bycategory?id='.$category_id;
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function fetch_payment_product_by_operator($operator_id)
        {
            $url = $this->basepath.'pembayaran/produk/byoperator?id='.$operator_id;
            $data = $this->fetch($url,null,false,null);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function check_bill($param)
        {
            $url = $this->basepath.'pembayaran/cek-tagihan';
            $data = $this->fetch($url,null,true,$param);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        
        function payment_request($param)
        {
            $url = $this->basepath.'transaksi/pembayaran';
            $data = $this->fetch($url,null,true,$param);
            if($this->isJson($data))
                return json_decode($data);
            else
                return false;
        }
        // END OF PAYMENT FUNCTION
        
        function isJson($string) {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }
        
        function fetch($url, $header, $is_post = FALSE, $data)
        {   
        
            $header = array(
            'Accept: application/json',
            'Authorization: Bearer '.$this->api_key, // Ganti [apikey] dengan API KEY Anda
            );
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
            
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
            
            if($is_post)
            {
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
            
            $result = curl_exec($ch);
            
            if(curl_errno($ch)){
                return 'Request Error:' . curl_error($ch);
            }
            
            return $result;
        }
    }
    
?>