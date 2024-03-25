<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require_once('vendor/autoload.php');
class Duitku extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Api_duitku');
        $this->load->model('Api_pelanggan');
        date_default_timezone_set('Asia/Jakarta');
    }
    function index_get(){
        $this->response("Rest Api Gojasa!", 200);
    }
    //---------------------------------------- List Metode Pembayaran ----------------------------
    function ListPayment_post(){
        //config
        $datasetting = $this->Api_duitku->datasetting()->row();
        $merchantCode = $datasetting->duitku_merchant;
        $merchantKey = $datasetting->duitku_key;
 
        $duitkuConfig = new \Duitku\Config($merchantKey, $merchantCode);
        if($datasetting->duitku_mode == "1"){
            $duitkuConfig->setSandboxMode(false);
        }else{
            $duitkuConfig->setSandboxMode(true);
        }
        
        //request
        try{
            $json   = file_get_contents('php://input');
            $result = json_decode($json);
            $paymentAmount  = $result->{'paymentAmount'};
            $paymentMethodList = \Duitku\Pop::getPaymentMethod($paymentAmount, $duitkuConfig);
            header('Content-Type: application/json');
            $this->response(json_decode($paymentMethodList), 200);
        } catch (Exception $e) {
           $this->response("Error Server", 400);
        }
    }
    //----------------------------------- Request Pembayaran ------------------------------------
    function RequestTransaction_post(){
        //config
        $datasetting = $this->Api_duitku->datasetting()->row();
        $merchantCode = $datasetting->duitku_merchant;
        $merchantKey = $datasetting->duitku_key;
        $isproduction = $datasetting->duitku_mode;

        $duitkuConfig = new \Duitku\Config($merchantKey, $merchantCode);
        if($datasetting->duitku_mode == "1"){
            $duitkuConfig->setSandboxMode(false);
        }else{
            $duitkuConfig->setSandboxMode(true);
        }
        //parameter
        $json   = file_get_contents('php://input');
        $result = json_decode($json);
        $paymentAmount      = $result->{'paymentAmount'};
        $paymentMethod      = $result->{'paymentMethod'};
        $email              = $result->{'email'};
        $phoneNumber        = $result->{'phoneNumber'};
        $productDetails     = $result->{'productDetails'};
        $merchantOrderId    = $result->{'merchantOrderId'};   
        $additionalParam    = $result->{'additionalParam'};//buat token
        $merchantUserInfo   = $result->{'merchantUserInfo'};//iduser
        $customerVaName     = $result->{'paymentMethod'};
        $callbackUrl        = $result->{'callbackUrl'};
        $returnUrl          = $result->{'returnUrl'};
        $expiryPeriod       = $result->{'expiryPeriod'};
        $itemDetails        = $result->{'itemDetails'};
        // Customer Detail
        $firstName          =  "Kelana";
        $lastName           =  "User";
        // Address
        $alamat             = "";
        $city               = "";
        $postalCode         = "";
        $countryCode        = "";
        $address = array(
            'firstName'     => $firstName,
            'lastName'      => $lastName,
            'address'       => $alamat,
            'city'          => $city,
            'postalCode'    => $postalCode,
            'phone'         => $phoneNumber,
            'countryCode'   => $countryCode
        );
        $customerDetail = array(
            'firstName'         => $firstName,
            'lastName'          => $lastName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'billingAddress'    => $address,
            'shippingAddress'   => $address
        );
        $params = array(
            'paymentAmount'     => $paymentAmount,
            'paymentMethod'     => $paymentMethod,
            'merchantOrderId'   => $merchantOrderId,
            'productDetails'    => $productDetails,
            'additionalParam'   => $additionalParam,
            'merchantUserInfo'  => $merchantUserInfo,
            'customerVaName'    => $customerVaName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'itemDetails'       => $itemDetails,
            'customerDetail'    => $customerDetail,
            'callbackUrl'       => $callbackUrl,
            'returnUrl'         => $returnUrl,
            'expiryPeriod'      => $expiryPeriod
        );
        //request
        try {
            $responseDuitkuApi = \Duitku\Pop::createInvoice($params, $duitkuConfig);
            header('Content-Type: application/json');
            $responseDuitku = json_decode($responseDuitkuApi);
            $this->response($responseDuitku, 200);
            if ($responseDuitku->statusCode == "00") {
                //header('location: ' . $responseDuitku->paymentUrl);
            }
            
        } catch (Exception $e) {
             $this->response("Error Server", 400);
        }
        
    }
    //----------------------------------- Cek Pembayaran ------------------------------------
    function CheckTransaction_post(){
        $json   = file_get_contents('php://input');
        $result = json_decode($json);
        $merchantOrderId = $result->{'merchantOrderId'};
         //config
         $datasetting = $this->Api_duitku->datasetting()->row();
         $merchantCode = $datasetting->duitku_merchant;
         $merchantKey = $datasetting->duitku_key;
       

         $duitkuConfig = new \Duitku\Config($merchantKey, $merchantCode);
         if($datasetting->duitku_mode == "1"){
            $duitkuConfig->setSandboxMode(false);
        }else{
            $duitkuConfig->setSandboxMode(true);
        }
        try {
            $transactionList = \Duitku\Pop::transactionStatus($merchantOrderId, $duitkuConfig);
            header('Content-Type: application/json');
            $transaction = json_decode($transactionList);
            if ($transaction->statusCode == "00") {
                // Action Success
            } else if ($transaction->statusCode == "01") {
                // Action Pending
            } else {
                // Action Failed Or Expired
            }
            $this->response($transaction, 200);
        } catch (Exception $e) {
             $this->response("Error Server", 400);
        }
    }
    //----------------------------------- Callback ------------------------------------
    function callback_post(){
        //config
        $datasetting = $this->Api_duitku->datasetting()->row();
        $merchantCode = $datasetting->duitku_merchant;
        $merchantKey = $datasetting->duitku_key;
        $fcmserver = $datasetting->fcm_key;
   

        $duitkuConfig = new \Duitku\Config($merchantKey, $merchantCode);
        if($datasetting->duitku_mode == "1"){
            $duitkuConfig->setSandboxMode(false);
        }else{
            $duitkuConfig->setSandboxMode(true);
        }
        //parameter
        try {
            $callback = \Duitku\Pop::callback($duitkuConfig);
            header('Content-Type: application/json');
            $notif = json_decode($callback);
            $type = $notif->{'additionalParam'};
            $idpelanggan = $notif->{'merchantUserId'};
            $noreferensi = $notif->{'reference'};
            $noinvoice = $notif->{'merchantOrderId'};
            $bank = $notif->{'paymentCode'};
            $paymetod = paymentMethod;
            $amount = $notif->{'amount'};
            if ($notif->resultCode == "00") {
                // Action Success
                if($type == 'driver'){
                     $datacustomer = $this->Api_duitku->dataakundriver($idpelanggan)->row();
                     $fullnama = $datacustomer->nama_driver;
                     $devicetoken = $datacustomer->reg_id;
                }else if($type == 'customer'){
                     $datacustomer = $this->Api_duitku->dataakun($idpelanggan)->row();
                     $fullnama = $datacustomer->fullnama;
                     $devicetoken = $datacustomer->token;
                }else if($type == 'mitra'){
                     $datacustomer = $this->Api_duitku->dataakunmitra($idpelanggan)->row();
                     $fullnama = $datacustomer->nama_merchant;
                     $devicetoken = $datacustomer->token_merchant;
                }
                $datasukses = array(
                    'id_user' => $idpelanggan,
                    'invoice' => $noinvoice,
                    'rekening' => $noinvoice,
                    'bank' => $bank,
                    'nama_pemilik' => $fullnama,
                    'type' => 'topup',
                    'jumlah' => $amount,
                    'reff' => $noreferensi,
                    'status' => 1
                );
                $saldolama = $this->Api_pelanggan->saldouser($idpelanggan);
                $saldobaru = $saldolama->row('saldo') + $amount;
                $saldo = array('saldo' => $saldobaru);
                $this->Api_pelanggan->tambahsaldo($idpelanggan, $saldo);
                $inserthistori = $this->Api_pelanggan->insertwallet($datasukses);
                $postnotif = $this->Api_duitku->sendnotif($fcmserver,$devicetoken,$amount);
            } else if ($notif->resultCode == "01") {
                // Action Failed
            }
            
            $this->response($notif, 200);
        } catch (Exception $e) {
            $this->response($e->getMessage(), 400);
        }
   }
   //-----------------------------------------------------------------------
   public function topuppending_post()
   {
       if (!isset($_SERVER['PHP_AUTH_USER'])) {
           header("WWW-Authenticate: Basic realm=\"Private Area\"");
           header("HTTP/1.0 401 Unauthorized");
           return false;
       }

       $data = file_get_contents("php://input");
       $dec_data = json_decode($data);

       $iduser = $dec_data->id;
       $bank = $dec_data->bank;
       $nama = $dec_data->nama;
       $amount = $dec_data->amount;
       $card = $dec_data->card;
       $email = $dec_data->email;
       $phone = $dec_data->no_telepon;
       $numberreff = rand ( 10000 , 99999 );
       $noreff = $dec_data->reff;
       $saldolama = $this->Api_pelanggan->saldouser($iduser);
       $datawithdraw = array(
           'id_user' => $iduser,
           'rekening' => $card,
           'bank' => $bank,
           'nama_pemilik' => $nama,
           'type' => $dec_data->type,
           'jumlah' => $amount,
           'status' => 0,
           'reff' => $noreff
       );
       $check_exist = $this->Api_pelanggan->check_exist($email, $phone);

       if ($dec_data->type ==  "topup") {
           $withdrawdata = $this->Api_pelanggan->insertwallet($datawithdraw);

           $message = array(
               'code' => '200',
               'message' => 'success',
               'data' => []
           );
           $this->response($message, 200);
       } else {

           if ($saldolama->row('saldo') >= $amount && $check_exist) {
               $withdrawdata = $this->Api_pelanggan->insertwallet($datawithdraw);

               $message = array(
                   'code' => '200',
                   'message' => 'success',
                   'data' => []
               );
               $this->response($message, 200);
           } else {
               $message = array(
                   'code' => '201',
                   'message' => 'You have insufficient balance',
                   'data' => []
               );
               $this->response($message, 200);
           }
       }
   }
   public function topupbackpending_post()
   {
       if (!isset($_SERVER['PHP_AUTH_USER'])) {
           header("WWW-Authenticate: Basic realm=\"Private Area\"");
           header("HTTP/1.0 401 Unauthorized");
           return false;
       }

       $data = file_get_contents("php://input");
       $dec_data = json_decode($data);

       $iduser = $dec_data->id;
       $bank = $dec_data->bank;
       $nama = $dec_data->nama;
       $amount = $dec_data->amount;
       $card = $dec_data->card;
       $email = $dec_data->email;
       $phone = $dec_data->no_telepon;
       $numberreff = rand ( 10000 , 99999 );
       $noreff = $dec_data->reff;
       $saldolama = $this->Api_pelanggan->saldouser($iduser);
       $datawithdraw = array(
           'id_user' => $iduser,
           'rekening' => $card,
           'bank' => $bank,
           'nama_pemilik' => $nama,
           'type' => $dec_data->type,
           'jumlah' => $amount,
           'status' => 0,
           'reff' => 'PD'.$numberreff
       );
       $check_exist = $this->Api_pelanggan->check_exist($email, $phone);

       if ($dec_data->type ==  "topup") {
           $withdrawdata = $this->Api_pelanggan->insertwallet($datawithdraw);

           $message = array(
               'code' => '200',
               'message' => 'success',
               'data' => []
           );
           $this->response($message, 200);
       } else {

           if ($saldolama->row('saldo') >= $amount && $check_exist) {
               $withdrawdata = $this->Api_pelanggan->insertwallet($datawithdraw);

               $message = array(
                   'code' => '200',
                   'message' => 'success',
                   'data' => []
               );
               $this->response($message, 200);
           } else {
               $message = array(
                   'code' => '201',
                   'message' => 'You have insufficient balance',
                   'data' => []
               );
               $this->response($message, 200);
           }
       }
   }
   public function topupsukses_post()
   {
       if (!isset($_SERVER['PHP_AUTH_USER'])) {
           header("WWW-Authenticate: Basic realm=\"Private Area\"");
           header("HTTP/1.0 401 Unauthorized");
           return false;
       }

       $data = file_get_contents("php://input");
       $dec_data = json_decode($data);

       $iduser = $dec_data->id;
       $bank = $dec_data->bank;
       $nama = $dec_data->nama;
       $amount = $dec_data->amount;
       $card = $dec_data->card;
       $email = $dec_data->email;
       $phone = $dec_data->no_telepon;
       $noreff = $dec_data->reff;
       $saldolama = $this->Api_pelanggan->saldouser($iduser);
       $datawithdraw = array(
           'id_user' => $iduser,
           'rekening' => $card,
           'bank' => $bank,
           'nama_pemilik' => $nama,
           'type' => $dec_data->type,
           'jumlah' => $amount,
           'reff' => $noreff,
           'status' => 1
       );
       $check_exist = $this->Api_pelanggan->check_exist($email, $phone);

       if ($dec_data->type ==  "topup") {
           $this->Api_pelanggan->insertwallet($datawithdraw);
           $saldolama = $this->Api_pelanggan->saldouser($iduser);
           $saldobaru = $saldolama->row('saldo') + $amount;
           $saldo = array('saldo' => $saldobaru);
           $this->Api_pelanggan->tambahsaldo($iduser, $saldo);
           $message = array(
               'code' => '200',
               'message' => 'success',
               'data' => []
           );
           $this->response($message, 200);
       } else {

           if ($saldolama->row('saldo') >= $amount && $check_exist) {
                $this->Api_pelanggan->insertwallet($datawithdraw);
               $saldolama = $this->Api_pelanggan->saldouser($iduser);
               $saldobaru = $saldolama->row('saldo') + $amount;
               $saldo = array('saldo' => $saldobaru);
               $this->Api_pelanggan->tambahsaldo($iduser, $saldo);
               $message = array(
                   'code' => '200',
                   'message' => 'success',
                   'data' => []
               );
               $this->response($message, 200);
           } else {
               $message = array(
                   'code' => '201',
                   'message' => 'You have insufficient balance',
                   'data' => []
               );
               $this->response($message, 200);
           }
       }
   }
   //-------------------------------- Check Transaksi ------------------------------------------
   function Checktransaksi_post(){
       if (!isset($_SERVER['PHP_AUTH_USER'])) {
           header("WWW-Authenticate: Basic realm=\"Private Area\"");
           header("HTTP/1.0 401 Unauthorized");
           return false;
       }

       $data = file_get_contents("php://input");
       $dec_data = json_decode($data);

       $datasetting = $this->Api_duitku->datasetting()->row();
       $merchantCode = $datasetting->duitku_merchant;
       $merchantKey = $datasetting->duitku_key;

       $json = file_get_contents('php://input');
       $result = json_decode($json);

   
       $merchantOrderId = $dec_data->idtransaksi;
       
       $signature = md5($merchantCode . $merchantOrderId . $merchantKey);
   
       $itemsParam = array(
           'merchantCode' => $merchantCode,
           'merchantOrderId' => $merchantOrderId,
           'signature' => $signature
       );

   
       $params = array_merge((array)$result,$itemsParam);

       $params_string = json_encode($params);
       
       if($datasetting->duitku_mode == 1){
           $url = 'https://passport.duitku.com/webapi/api/merchant/transactionStatus'; // Production
       }else{
           $url = 'https://sandbox.duitku.com/webapi/api/merchant/transactionStatus'; //sandbox
       }
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
   //-------------------- Cek Referense --------------------------------------
   public function ceknoreff_post()
   {
       if (!isset($_SERVER['PHP_AUTH_USER'])) {
           header("WWW-Authenticate: Basic realm=\"Private Area\"");
           header("HTTP/1.0 401 Unauthorized");
           return false;
       }
       $data = file_get_contents("php://input");
       $dec_data = json_decode($data);

       $cek_wallet = $this->Api_duitku->get_data_wallet($dec_data->idtransaksi);

       if ($cek_wallet->num_rows() > 0) {
           $message = array(
               'code' => '200',
               'message' => 'Ditemukan'
           );
           $this->response($message, 200);
       } else {
           $message = array(
               'code' => '201',
               'message' => 'Lanjutkan'
           );
           $this->response($message, 201);
       }
   }
}
?>