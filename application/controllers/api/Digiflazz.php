<?php
//error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require_once('vendor/autoload.php');

class Digiflazz extends REST_Controller
{
    private $url, $settings, $username, $api;
     public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Appsettings', 'app');
        $this->load->model('Digiflazz_model');
        $this->load->model('Api_duitku');
        date_default_timezone_set('Asia/Jakarta');
        $this->url = 'https://api.digiflazz.com/v1/';
    }
    
    function index_get()
    {
        $this->response("Api for Gojasa!", 200);
    }
    //-------------------------- List Kategori ---------------------------
    function listkategori_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $tipe = $dec_data->id;
        $kategori = $this->Digiflazz_model->listkategori();
        $message = array(
            'message' => 'Sukses',
            'data' => $kategori
        );
        $this->response($message, 201);
    }
     //-------------------------- List Brand ---------------------------
     function listbrand_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $tipe = $dec_data->id;
        $kategori = $this->Digiflazz_model->listbrand($tipe);
        $message = array(
            'message' => 'Sukses',
            'databrand' => $kategori
        );
        $this->response($message, 200);
    }
     //-------------------------- List Riwayat ---------------------------
     function listhistory_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $idpel = $dec_data->id;
        $riwayat = $this->Digiflazz_model->listhistory($idpel);
        $message = array(
            'message' => 'Sukses',
            'data' => $riwayat
        );
        $this->response($message, 200);
    }
     //------------------------- List Channel ----------------------------
     
     function daftarharga_post(){
       
        $json = file_get_contents('php://input');
        date_default_timezone_set('Asia/Jakarta');
        $result = json_decode($json);
        //config
        $datasetting = $this->Digiflazz_model->datasetting()->row();
        $username = $datasetting->digi_user;
        $apikey = $datasetting->digi_api;
        $mode = $datasetting->digi_mode;

        $signature = hash('md5',$username . $apikey . 'pricelist');
        
        $itemsParam = array(
            'cmd' => 'prepaid',
            'username' =>  $username,
            'sign' => $signature
        );

        $params = array_merge((array)$result,$itemsParam);
        $params_string = json_encode($params);

        $url = 'https://api.digiflazz.com/v1/price-list'; 
       
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
        $message = array(
            'code' => $httpCode,
            'message' => 'Sukses',
            'data' => $request
            );
        $this->response($message, 200);
    }
    
    
    //------------------------- Webhook ------------------------------
    public function webhook_post(){
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
            if ($status == "Gagal") {
                //log
                $konten = "Reff : ".$tr_id." Tujuan : ".$hp." Harga : ".$harga_seller." Status : ".$status;
                $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Webhook_".date('Ymd His').".txt";
                $file = fopen($fileLocation,"w");
                $datavalue = json_encode($data1) == "null" || null ? '' : json_encode($data1);
                fwrite($file,$konten);
                fclose($file);
            } elseif ($status == 'Sukses') {
                $sn = $data->sn;
                //log
                $konten = "Reff : ".$tr_id." Tujuan : ".$hp." Harga : ".$harga_seller." SN : ".$sn." Status : ".$status;
                $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Webhook_".date('Ymd His').".txt";
                $file = fopen($fileLocation,"w");
                $datavalue = json_encode($data1) == "null" || null ? '' : json_encode($data1);
                fwrite($file,$konten);
                fclose($file);
            } else {
                //log
                $konten = "Reff : ".$tr_id." Tujuan : ".$hp." Harga : ".$harga_seller." Status : ".$status;
                $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Webhook_".date('Ymd His').".txt";
                $file = fopen($fileLocation,"w");
                $datavalue = json_encode($data1) == "null" || null ? '' : json_encode($data1);
                fwrite($file,$konten);
                fclose($file);
            }
        }
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
                $datatrx = $this->Digiflazz_model->datatransaksi($tr_id)->row();
                $devicetoken = $datatrx->token;
                $deviceostoken = $datatrx->ostoken;
                if($valmode == 'Firebase'){
                    $postnotif = $this->Digiflazz_model->sendnotif($fcmserver,$devicetoken,$hargaseller,'Gagal');
                }else{
                    $fields = array(
                        'app_id' => $dataapp['os_appid'],
                        'contents' => array("en" => 'Topup'),
                        'headings' => array("en"=>'Topup Gagal'),
                        'target_channel' => 'push',
                        'template_id' => $dataapp['os_template'],
                        'android_sound' => 'pesan',
                        'collapse_id' => '0',
                        'android_channel_id' => $dataapp['os_channel'],
                        'existing_android_channel_id' => $dataapp['os_channel'],
                        'include_player_ids' => [$deviceostoken],
                        'data' => array(
                            "id_transaksi" => '0',
                            "id_driver" => 'D0',
                            "type" => '0',
                            "status" => '1'
                        ),
                    );
                    $konten_body = json_encode($fields);
                    $response = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
                    'body' => $konten_body,
                    'headers' => [
                        'Authorization' => 'Basic '.$dataapp['os_restapi'],
                        'accept' => 'application/json',
                        'content-type' => 'application/json',
                    ],
                    ]);
                }
                
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
                    if($valmode == 'Firebase'){
                        $postnotif = $this->Digiflazz_model->sendnotif($fcmserver,$devicetoken,$hargaseller,'Berhasil');
                    }else{
                        $fields = array(
                            'app_id' => $dataapp['os_appid'],
                            'contents' => array("en" => 'Topup'),
                            'headings' => array("en"=>'Topup Sukses'),
                            'target_channel' => 'push',
                            'template_id' => $dataapp['os_template'],
                            'android_sound' => 'pesan',
                            'collapse_id' => '0',
                            'android_channel_id' => $dataapp['os_channel'],
                            'existing_android_channel_id' => $dataapp['os_channel'],
                            'include_player_ids' => [$deviceostoken],
                            'data' => array(
                                "id_transaksi" => '0',
                                "id_driver" => 'D0',
                                "type" => '0',
                                "status" => '1'
                            ),
                        );
                        $konten_body = json_encode($fields);
                        $response = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
                        'body' => $konten_body,
                        'headers' => [
                            'Authorization' => 'Basic '.$dataapp['os_restapi'],
                            'accept' => 'application/json',
                            'content-type' => 'application/json',
                        ],
                        ]);
                    }
                    
                }
            } else {
                $dataupd = array(
                 'status' => $status
                );
                $this->Digiflazz_model->statustrx($tr_id,$dataupd);
                //log
                $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Pending_".date('Ymd His').".txt";
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

       //------------------------- Transaksi ----------------------------
   function transaksi_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
 
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
 
 
        $json = file_get_contents('php://input');
        $result = json_decode($json);
 
        //config
        $datasetting = $this->Digiflazz_model->datasetting()->row();
        $username = $datasetting->digi_user;
        $apikey = $datasetting->digi_api;
        $mode = $datasetting->digi_mode;
        $fcmserver = $datasetting->fcm_key;
        
        $reffid = $dec_data->reff;
        $iduser = $dec_data->id;
        $produk = $dec_data->produk;
        $skukode = $dec_data->sku;
        $upharga = $dec_data->fee;
        $devicetoken = $dec_data->token;
       // $callbackurl = $dec_data->callback;

        $signature = md5($username . $apikey . $reffid);
        if($mode == "1"){
            $itemsParam = array(
                'username' => $username,
                'buyer_sku_code' => $dec_data->sku,
                'customer_no' => $dec_data->nopelanggan,
                'ref_id' => $reffid,
                'testing' => true,
                'sign' => $signature
            );
        }else{
            $itemsParam = array(
                'username' => $username,
                'buyer_sku_code' => $dec_data->sku,
                'customer_no' => $dec_data->nopelanggan,
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
    
       
        $datareq = json_decode($request);
        $dataval = $datareq->data;
        $status = $dataval->status;
        $harga_seller = intval($dataval->price);
        $code = $dataval->buyer_sku_code;
        $hp = $dataval->customer_no;
        $report = $dataval->message;
        $tr_id = $dataval->ref_id;
        $sn = $dataval->sn;
        $kalkulasi = $upharga + $harga_seller;

         //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_transaksi_".date('Ymd His').".txt";
        $kontenfile = "Reff : " . $tr_id . " | Produk : " . $code. " | Harga : " .$kalkulasi;
        $file = fopen($fileLocation,"w");
        fwrite($file,$kontenfile);
        fclose($file);

        $datainsert = array(
            'reffid' => $reffid,
            'idpelanggan' => $iduser,
            'provider' => $produk,
            'sku' => $skukode,
            'harga' => $harga_seller,
            'tujuan' => $hp,
            'upharga' => $upharga,
            'sn' => '1234',
            'status' => $status,
            'sukses' => '0',
            'token' => $devicetoken,
            'tanggal' => date('Y-m-d H:i:s')
        );
        $insrthistori = $this->Digiflazz_model->inserthistori($datainsert);
        if ($status == "Sukses") {
            $dataupd = array(
                'sukses' => '1'
            );
            $this->Digiflazz_model->statustrx($tr_id,$dataupd);
            //Cutting
            $pointlama = $this->Digiflazz_model->data_saldo($iduser);
            $tambahpoint = $pointlama->row('saldo') - $kalkulasi;
            $saldo = array('saldo' => $tambahpoint);
            $this->Digiflazz_model->ubahsaldo($iduser, $saldo);
            $postnotif = $this->Digiflazz_model->sendnotif($fcmserver,$devicetoken,$hargaseller,'Berhasil');
        }
        
        $message = array(
            'message' => 'Sukses',
            'data' => $request
        );
        $this->response($message, 200);
       
    }
 //------------------------- Cek Transaksi ------------------------------
 public function cektransaksi_post(){
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        return false;
    }

    $data = file_get_contents("php://input");
    $dec_data = json_decode($data);


    $json = file_get_contents('php://input');
    $result = json_decode($json);

    //config
    $datasetting = $this->Digiflazz_model->datasetting()->row();
    $username = $datasetting->digi_user;
    $apikey = $datasetting->digi_api;
    $mode = $datasetting->digi_mode;

    $reffid = $dec_data->reff;
    //$reffid = 'A1H8DOERI2Q2BJ0KEY';//$dec_data->reff;
    $sku = $dec_data->sku;
   // $sku = 'T1';
    $pelanggan = $dec_data->nopelanggan;

    $signature = md5($username . $apikey . $reffid);
    if($mode == "1"){
        $itemsParam = array(
            'username' => $username,
            'buyer_sku_code' => $sku,
            'customer_no' => $pelanggan,
            'ref_id' => $reffid,
            'testing' => true,
            'sign' => $signature
        );
    }else{
        $itemsParam = array(
            'username' => $username,
            'buyer_sku_code' => $sku,
            'customer_no' => $pelanggan,
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
    $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_test_".date('Ymd His').".txt";
    $file = fopen($fileLocation,"w");
    fwrite($file,$request);
    fclose($file);

        $data = json_decode($request);
        $data = $data->data;
        $status = $data->status;
        $harga_seller = intval($data->price);
        $code = $data->buyer_sku_code;
        $hp = $data->customer_no;
        $report = $data->message;
        $tr_id = $data->ref_id;
        if ($status == "Gagal") {
             $sn = 'Gagal';
             $dataupd = array(
                'refund' => '1',
                'sukses' => '1',
                'status' => $status
            );
            $updatehistori = $this->Digiflazz_model->statustrx($tr_id,$dataupd);
            $datatrx = $this->Digiflazz_model->datatransaksi($tr_id)->row();
            $idpel = $datatrx->idpelanggan;
            $upharga = intval($datatrx->upharga);
            //refund
            $pointlama = $this->Digiflazz_model->data_saldo($idpel);
            $kalkulasi = $upharga + $hargaseller;
            $tambahpoint = $pointlama->row('saldo') + $kalkulasi;
            $saldo = array('saldo' => $tambahpoint);
            $this->Digiflazz_model->ubahsaldo($idpel, $saldo);
        } elseif ($status == "Sukses") {
            $sn = $data->sn;
            $dataupd = array(
             'sn' => $sn,
             'status' => $status
            );
            $reffid = $data->ref_id;
            $this->Digiflazz_model->statustrx($tr_id,$dataupd);
        } else {
            $sn = '1234';
            $dataupd = array(
             'status' => $status
            );
            $this->Digiflazz_model->statustrx($tr_id,$dataupd);
        } 

    $message = array(
        'message' => $status,
        'data' => $request
    );
    $this->response($message, 200);
}
public function inquirypln_post(){
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        return false;
    }

    $data = file_get_contents("php://input");
    $dec_data = json_decode($data);


    $json = file_get_contents('php://input');
    $result = json_decode($json);

    //config
    $datasetting = $this->Digiflazz_model->datasetting()->row();
    $username = $datasetting->digi_user;
    $apikey = $datasetting->digi_api;
    $mode = $datasetting->digi_mode;

    $signature = md5($username . $apikey);

    $nopelanggan = $dec_data->id;

    $itemsParam = array(
        'commands' => 'pln-subscribe',
        'customer_no' => $nopelanggan
    );
    
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

    $message = array(
        'message' => 'success',
        'data' => $request
    );
    $this->response($message, 200);
}
}