<?php
//error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require_once('vendor/autoload.php');

class Digiflass extends REST_Controller
{
    private $url, $settings, $username, $api;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Appsettings', 'app');
        $this->load->model('Digiflass_model');
        date_default_timezone_set('Asia/Jakarta');
        $this->url = 'https://api.digiflazz.com/v1/';
    }
   
    function index_get()
    {
        $this->response("Api for Gojasa!", 200);
    }
    //------------------------- Callback -----------------------------
    public function callback_post()
    {
        $client = new \GuzzleHttp\Client();
         //config
        $datasetting = $this->Digiflazz_model->datasetting()->row();
        $fcmserver = $datasetting->fcm_key;
        $valmode = $datasetting->mode;
        $dataapp = $this->app->getappbyid();
        //get value
        $post_data = file_get_contents('php://input');
        $data = json_decode($post_data);
        if ($_SERVER['REMOTE_ADDR'] == "52.74.250.133") {
            $data = $data->data;
            $status = $data->status;
            $harga_seller = intval($data->price);
            $code = $data->buyer_sku_code;
            $hp = $data->customer_no;
            $report = $data->message;
            $tr_id = $data->ref_id;
            if ($status == 'Gagal') {
                 $sn = 'Gagal';
                 $dataupd = array(
                  'refund' => '1',
                  'status' => 'Gagal'
                );
                $this->Digiflazz_model->statustrx($tr_id,$dataupd);
                //log
                $konten = "Reff : ".$tr_id." Tujuan : ".$hp." Harga : ".$harga_seller." Status : ".$status;
                $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Gagal_".date('Ymd His').".txt";
                $file = fopen($fileLocation,"w");
                $datavalue = json_encode($data1) == "null" || null ? '' : json_encode($data1);
                fwrite($file,$konten);
                fclose($file);  
                
            } elseif ($status == 'Sukses') {
                
                $datatrx = $this->Digiflazz_model->datatransaksi($tr_id)->row();
                $idpel = $datatrx->idpelanggan;
                $dataSukses = $datatrx->sukses;
                $devicetoken = $datatrx->token;
                $deviceostoken = $datatrx->ostoken;
                $upharga = intval($datatrx->upharga);

                $kalkulasi = $harga_seller + $upharga;
                //log
                $konten = "Reff : ".$tr_id." | Pelanggan : ".$idpel." | Tujuan : ".$hp." | Harga : ".$harga_seller." | Status : ".$status . "| Admin : ". $upharga. "| Total : ". $kalkulasi;
                $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Sukses_".$tr_id."_".date('Ymd His').".txt";
                $file = fopen($fileLocation,"w");
                $datavalue = json_encode($data1) == "null" || null ? '' : json_encode($data1);
                fwrite($file,$konten);
                fclose($file);
                //Cutting
                if($dataSukses == '0'){
                    $sn = $data->sn;
                        $dataupd = array(
                         'sn' => $sn,
                         'sukses' => '1',
                         'status' => $status
                        );
                    $upd = $this->Digiflazz_model->statustrx($tr_id,$dataupd);
                    $pointlama = $this->Digiflazz_model->data_saldo($idpel);
                    $hargaseller = intval($data->price);
                    $kalkulasi = $upharga + $hargaseller;
                    $tambahpoint = $pointlama->row('saldo') - $kalkulasi;
                    $saldo = array('saldo' => $tambahpoint);
                    $this->Digiflazz_model->ubahsaldo($idpel, $saldo);  
                    //log
                    $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Callback_".date('Ymd His').".txt";
                    $file = fopen($fileLocation,"w");
                    $datavalue = json_encode($data1) == "null" || null ? '' : json_encode($data1);
                    fwrite($file,$data);
                    fclose($file);
                    
                }
            } elseif ($status == 'Pending') {
                
                $datatrx = $this->Digiflazz_model->datatransaksi($tr_id)->row();
                $idpel = $datatrx->idpelanggan;
                $dataSukses = $datatrx->sukses;
                $devicetoken = $datatrx->token;
                $deviceostoken = $datatrx->ostoken;
                $upharga = intval($datatrx->upharga);

                $kalkulasi = $harga_seller + $upharga;
                //log
                $konten = "Reff : ".$tr_id." | Pelanggan : ".$idpel." | Tujuan : ".$hp." | Harga : ".$harga_seller." | Status : ".$status . "| Admin : ". $upharga. "| Total : ". $kalkulasi;
                $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Pending_".$tr_id."_".date('Ymd His').".txt";
                $file = fopen($fileLocation,"w");
                $datavalue = json_encode($data1) == "null" || null ? '' : json_encode($data1);
                fwrite($file,$konten);
                fclose($file);
                
            } else {
                $dataupd = array(
                 'status' => $status
                );
                $this->Digiflazz_model->statustrx($tr_id,$dataupd);
                //log
                $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Callback_".date('Ymd His').".txt";
                $file = fopen($fileLocation,"w");
                $datavalue = json_encode($data1) == "null" || null ? '' : json_encode($data1);
                fwrite($file,$data);
                fclose($file);
            }
            
        }
        $response = [
            'status' => true,
            'message' => 'Success',
            'data' => [
                'sign' => $sign,
                'result' => json_encode($data1) == "null" || null ? '' : json_encode($data1)
            ],
        ];
        return $response;
    }
    //---------------------------------- group --------------------------------------------
    function listgroup_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $tipe = $dec_data->id;
        $datagroup = $this->Digiflass_model->listgroup();
        $message = array(
            'message' => 'Sukses',
            'data' => $datagroup
        );
        $this->response($message, 201);
    }
    function daftargroup_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $group = $dec_data->id;
        $datagroup = $this->Digiflass_model->daftargroup($group);
        $message = array(
            'message' => 'Sukses',
            'data' => $datagroup
        );
        $this->response($message, 201);
    }
     //---------------------------------- group --------------------------------------------
    function listdatapasca_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $groupid = $dec_data->id;
        $datapasca = $this->Digiflass_model->listdatapasca($groupid);
        $message = array(
            'message' => 'Sukses',
            'data' => $datapasca
        );
        $this->response($message, 201);
    }
    //--------------------------------- Cek Tagihan PLN  ----------------------------------------
    function cektagihan_pln_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $datainput = file_get_contents("php://input");
        $dec_data = json_decode($datainput);


        $json = file_get_contents('php://input');
        date_default_timezone_set('Asia/Jakarta');
        $result = json_decode($json);
        //config
        $datasetting = $this->Digiflass_model->datasetting()->row();
        $username = $datasetting->digi_user;
        $apikey = $datasetting->digi_api;
        $mode = $datasetting->digi_mode;

        $reffid=$dec_data->reff;
        $idpelanggan=$dec_data->hp;
        $kode=$dec_data->kode;
        $tipe=$dec_data->tipe;
       
        $signature = md5($username . $apikey . $reffid);
        if($mode == '1'){
            $itemsParam = array(
                'commands' =>  'pln-subscribe',
                'customer_no' =>  $idpelanggan,
                'testing' =>  true
            );
        }else{
            $itemsParam = array(
                'commands' =>  'pln-subscribe',
                'customer_no' =>  $idpelanggan
            );
        }
        
        $params = array_merge((array)$result,$itemsParam);
        $params_string = json_encode($params);

        $url = 'https://api.digiflazz.com/v1/transaction'; 
       
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($params_string))                                                                       
        );   
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //log
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_CekTagihan_".date('Ymd His').".txt";
        $file = fopen($fileLocation,"w");
        fwrite($file,$request);
        fclose($file);

        $message = array(
            'message' => 'Sukses',
            'data' => $request
        );
        $this->response($message, 200);
    }
    //--------------------------------- Cek Tagihan Pascabayar ----------------------------------------
    function cektagihan_pasca_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $datainput = file_get_contents("php://input");
        $dec_data = json_decode($datainput);


        $json = file_get_contents('php://input');
        date_default_timezone_set('Asia/Jakarta');
        $result = json_decode($json);
        //config
        $datasetting = $this->Digiflass_model->datasetting()->row();
        $username = $datasetting->digi_user;
        $apikey = $datasetting->digi_api;
        $mode = $datasetting->digi_mode;

        $reffid=$dec_data->reff;
        $idpelanggan=$dec_data->hp;
        $kode=$dec_data->kode;
        $tipe=$dec_data->tipe;
       
        $signature = md5($username . $apikey . $reffid);
        if($mode == '1'){
            $itemsParam = array(
                'commands' =>  'inq-pasca',
                'buyer_sku_code' => $kode,
                'customer_no' =>  $idpelanggan,
                'ref_id' => $reffid,
                'testing' =>  true,
                'sign' => $signature
            );
        }else{
            $itemsParam = array(
                'commands' =>  'inq-pasca',
                'buyer_sku_code' => $kode,
                'customer_no' =>  $idpelanggan,
                'ref_id' => $reffid,
                'sign' => $signature
            );
        }
        
        $params = array_merge((array)$result,$itemsParam);
        $params_string = json_encode($params);

        $url = 'https://api.digiflazz.com/v1/transaction'; 
       
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($params_string))                                                                       
        );   
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //log
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_CekTagihan_".date('Ymd His').".txt";
        $file = fopen($fileLocation,"w");
        fwrite($file,$request);
        fclose($file);

        $message = array(
            'message' => 'Sukses',
            'data' => $request
        );
        $this->response($message, 200);
    }
    //--------------------------------- Bayar Tagihan Pascabayar ----------------------------------------
    function bayar_tagihan_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $datainput = file_get_contents("php://input");
        $dec_data = json_decode($datainput);


        $json = file_get_contents('php://input');
        date_default_timezone_set('Asia/Jakarta');
        $result = json_decode($json);
        //config
        $datasetting = $this->Digiflass_model->datasetting()->row();
        $username = $datasetting->digi_user;
        $apikey = $datasetting->digi_api;
        $mode = $datasetting->digi_mode;

        $reffid=$dec_data->reff;
        $idpelanggan=$dec_data->hp;
        $kode=$dec_data->kode;
        $tipe=$dec_data->tipe;
       
        $signature = md5($username . $apikey . $reffid);
        if($mode == '1'){
            $itemsParam = array(
                'commands' =>  'pay-pasca',
                'buyer_sku_code' => $kode,
                'customer_no' =>  $idpelanggan,
                'ref_id' => $reffid,
                'testing' =>  true,
                'sign' => $signature
            );
        }else{
            $itemsParam = array(
                'commands' =>  'pay-pasca',
                'buyer_sku_code' => $kode,
                'customer_no' =>  $idpelanggan,
                'ref_id' => $reffid,
                'sign' => $signature
            );
        }
        
        $params = array_merge((array)$result,$itemsParam);
        $params_string = json_encode($params);

        $url = 'https://api.digiflazz.com/v1/transaction'; 
       
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($params_string))                                                                       
        );   
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //log
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Bayar_Tagihan_".date('Ymd His').".txt";
        $file = fopen($fileLocation,"w");
        fwrite($file,$request);
        fclose($file);

        $message = array(
            'message' => 'Sukses',
            'data' => $request
        );
        $this->response($message, 200);
    }
}