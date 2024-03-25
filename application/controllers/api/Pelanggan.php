<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require_once('vendor/autoload.php');

class Pelanggan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Appsettings', 'app');
        $this->load->model('Api_pelanggan','pelanggan');
        $this->load->model('Api_driver','driver');
        date_default_timezone_set('Asia/Jakarta');
    }

    function index_get()
    {
        $this->response("Api for Gojasa!", 200);
    }
    //------------------------------------ Get Data Setting ----------------------------
    function appsetting_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $app_settings = $this->pelanggan->get_settings();
        foreach ($app_settings as $item) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'appwebsite' => $item['app_website'],
                'background' => $item['background'],  
                'duitku_status' => $item['duitku_status'],
                'apikey' => $item['map_key'],
                'isotp' => $item['isotp'],
                'appname' => $item['app_name'],
                'slogan' => $item['app_description'],
                'applogo' => $item['app_logo'],
                'jasaapp' => $item['jasaapp'],
                'maintenance' => $item['maintenance'],
                'data' => $app_settings
            );
            $this->response($message, 200);
        }
    }
    //---------------------------- Banner ------------------------------------
    function banner_app_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getdata = $this->pelanggan->list_slider($decoded_data->fitur_promosi);
        $message = array(
            'status' => true,
            'message' => 'found',
            'data' => $getdata->result()
        );
        $this->response($message, 200);
    }
    //---------------------------- FCM Notifikasi ----------------------------
    function device_notif_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $datasetting = $this->pelanggan->datasetting()->row();
        $serverkey = $datasetting->fcm_key;
        $driverid = $decoded_data->iddriver;
        $cek = $this->pelanggan->check_bid_user($driverid);
        if ($cek) {
            $url = "https://fcm.googleapis.com/fcm/send";   
            $header = [
                'authorization: key='.$serverkey,
                'content-type: application/json'
            ];
            $id = $decoded_data->id;
            $notification = [
                'title' => $decoded_data->title,
                'body' => $decoded_data->body
            ];
            $extraNotificationData = ["message" => $notification,"id" =>$id,"type" =>$decoded_data->type];
        
            $fcmNotification = [
                'to'        => $decoded_data->token,
                'notification' => $notification,
                'priority'          => 'high', 
                'data' => $decoded_data->data
            ];
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch); 
            $message = array(
                    'message' => 'sukses id: '. $driverid
            );
            $this->response($message, 200);
            curl_close($ch);
        }else{
            $message = array(
                'message' => 'ditolak id: '. $driverid
            );
            $this->response($message, 200);
        }
    }
    function cancel_notif_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $datasetting = $this->pelanggan->datasetting()->row();
        $serverkey = $datasetting->fcm_key;
        $driverid = $decoded_data->iddriver;
        $cek = $this->pelanggan->check_bid_user($driverid);
        if ($cek) {
            $url = "https://fcm.googleapis.com/fcm/send";   
            $header = [
                'authorization: key='.$serverkey,
                'content-type: application/json'
            ];
            $id = $decoded_data->id;
            $notification = [
                'title' => $decoded_data->title,
                'body' => $decoded_data->pesan
            ];
            $extraNotificationData = ["message" => $notification,"id" =>$id,"type" =>$decoded_data->type];
        
            $fcmNotification = [
                'to'        => $decoded_data->token,
                'notification' => $notification,
                'priority'          => 'high', 
                'data' => $decoded_data->data
            ];
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch); 
            $message = array(
                    'message' => 'sukses id: '. $driverid
            );
            $this->response($message, 200);
            curl_close($ch);
        }else{
            $message = array(
                'message' => 'ditolak id: '. $driverid
            );
            $this->response($message, 200);
        }
    }
    //---------------------------- Edit Profile ------------------------------
    function edit_profile_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $check_exist_phone = $this->pelanggan->check_exist_phone_edit($decoded_data->id, $decoded_data->no_telepon);
        $check_exist_email = $this->pelanggan->check_exist_email_edit($decoded_data->id, $decoded_data->email);
        if ($check_exist_phone) {
            $message = array(
                'code' => '201',
                'message' => 'phone already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else if ($check_exist_email) {
            $message = array(
                'code' => '201',
                'message' => 'email already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else {

            $condition = array(
                'no_telepon' => $decoded_data->no_telepon
            );
            $condition2 = array(
                'no_telepon' => $decoded_data->no_telepon_lama
            );

            if ($decoded_data->fotopelanggan == null && $decoded_data->fotopelanggan_lama == null) {
                $datauser = array(
                    'fullnama' => $decoded_data->fullnama,
                    'no_telepon' => $decoded_data->no_telepon,
                    'phone' => $decoded_data->phone,
                    'email' => $decoded_data->email,
                    'countrycode' => $decoded_data->countrycode,
                    'tgl_lahir' => $decoded_data->tgl_lahir
                );
            } else {
                $image = $decoded_data->fotopelanggan;
                $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
                $path = "images/pelanggan/" . $namafoto;
                file_put_contents($path, base64_decode($image));

                $foto = $decoded_data->fotopelanggan_lama;
                $path = "./images/pelanggan/$foto";
                unlink("$path");


                $datauser = array(
                    'fullnama' => $decoded_data->fullnama,
                    'no_telepon' => $decoded_data->no_telepon,
                    'phone' => $decoded_data->phone,
                    'email' => $decoded_data->email,
                    'fotopelanggan' => $namafoto,
                    'countrycode' => $decoded_data->countrycode,
                    'tgl_lahir' => $decoded_data->tgl_lahir
                );
            }


            $cek_login = $this->pelanggan->get_data_pelanggan($condition2);
            if ($cek_login->num_rows() > 0) {
                $upd_user = $this->pelanggan->edit_profile($datauser, $decoded_data->no_telepon_lama);
                $getdata = $this->pelanggan->get_data_pelanggan($condition);
                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'data' => $getdata->result()
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '404',
                    'message' => 'error data',
                    'data' => []
                );
                $this->response($message, 200);
            }
        }
    }
    //---------------------------- Login -------------------------------------
    function login_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $reg_id = array(
            'token' => $decoded_data->token
        );
        $condition = array(
            'password' => sha1($decoded_data->password),
            'no_telepon' => $decoded_data->no_telepon
        );
        $check_banned = $this->pelanggan->check_banned($decoded_data->no_telepon);
        if ($check_banned) {
            $message = array(
                'message' => 'banned',
                'data' => []
            );
            $this->response($message, 200);
        } else {
            $cek_login = $this->pelanggan->get_data_pelanggan($condition);
            $message = array();

            if ($cek_login->num_rows() > 0) {
                $upd_regid = $this->pelanggan->edit_profile($reg_id, $decoded_data->no_telepon);
                $get_pelanggan = $this->pelanggan->get_data_pelanggan($condition);

                $message = array(
                    'code' => '200',
                    'message' => 'found',
                    'data' => $get_pelanggan->result()
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '404',
                    'message' => 'wrong phone or password',
                    'data' => []
                );
                $this->response($message, 200);
            }
        }
    }
    //-------------------------------- Pendaftaran ----------------------------------------
    function register_user_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $email = $dec_data->email;
        $phone = $dec_data->no_telepon;
        $check_exist = $this->pelanggan->check_exist($email, $phone);
        $check_exist_phone = $this->pelanggan->check_exist_phone($phone);
        $check_exist_email = $this->pelanggan->check_exist_email($email);
        if ($check_exist) {
            $message = array(
                'code' => '201',
                'message' => 'email and phone number already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else if ($check_exist_phone) {
            $message = array(
                'code' => '201',
                'message' => 'phone already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else if ($check_exist_email) {
            $message = array(
                'code' => '201',
                'message' => 'email already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else {
            $image = $dec_data->fotopelanggan;
                $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
                $path = "images/pelanggan/" . $namafoto;
                file_put_contents($path, base64_decode($image));
                $data_signup = array(
                    'id' => $dec_data->id,
                    'fullnama' => $dec_data->fullnama,
                    'email' => $dec_data->email,
                    'no_telepon' => $dec_data->no_telepon,
                    'phone' => $dec_data->phone,
                    'password' => sha1($dec_data->password),
                    'tgl_lahir' => $dec_data->tgl_lahir,
                     'kota' => $dec_data->kota,
                    'jenis' => $dec_data->jenis,
                    'countrycode' => $dec_data->countrycode,
                    'fotopelanggan' => $namafoto,
                    'token' => $dec_data->token,
                    'refferal' => $dec_data->myrefferal,
                    'ostoken' => $dec_data->ostoken,
                );
                $signup = $this->pelanggan->signup($data_signup);
                if ($signup) {
                    $condition = array(
                        'password' => sha1($dec_data->password),
                        'email' => $dec_data->email
                    );
                    $datauser1 = $this->pelanggan->get_data_pelanggan($condition);
                    $message = array(
                        'code' => '200',
                        'message' => 'success',
                        'data' => $datauser1->result()
                    );
                    $this->response($message, 200);
                } else {
                    $message = array(
                        'code' => '201',
                        'message' => 'failed',
                        'data' => []
                    );
                    $this->response($message, 201);
                }
        }
    }
    //-------------------------------- Register -------------------------------------------
   /* function registers_user_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
      
        $email = $dec_data->email;
        $phone = $dec_data->no_telepon;
        $check_exist = $this->pelanggan->check_exist($email, $phone);
        $check_exist_phone = $this->pelanggan->check_exist_phone($phone);
        $check_exist_email = $this->pelanggan->check_exist_email($email);
      
        if ($check_exist) {
            $message = array(
                'code' => '201',
                'message' => 'email and phone number already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else if ($check_exist_phone) {
            $message = array(
                'code' => '201',
                'message' => 'phone already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else if ($check_exist_email) {
            $message = array(
                'code' => '201',
                'message' => 'email already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else {
            if ($dec_data->checked == "true") {
               $image = $dec_data->fotopelanggan;
                $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
                $path = "images/pelanggan/" . $namafoto;
                file_put_contents($path, base64_decode($image));
                $ids = str_pad(rand(0, pow(5, $digits)-1), $digits, '0', STR_PAD_LEFT);
                $newid = (int)time() + (int)$ids;
                $data_signup = array(
                    'id' => $dec_data->id,
                    'fullnama' => $dec_data->fullnama,
                    'email' => $dec_data->email,
                    'no_telepon' => $dec_data->no_telepon,
                    'phone' => $dec_data->phone,
                    'password' => sha1($dec_data->password),
                    'jenis' => $dec_data->jenis,
                    'tgl_lahir' => $dec_data->tgl_lahir,
                    'countrycode' => $dec_data->countrycode,
                    'fotopelanggan' => $namafoto,
                    'token' => $dec_data->token,
                    'refferal' => $dec_data->myrefferal,
                );
                $signup = $this->pelanggan->signup($data_signup);
                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'data' => []
                );
                $this->response($message, 200);
            }else{
                $message = array(
                    'code' => '201',
                    'message' => 'failed',
                    'data' => []
                );
                $this->response($message, 201);
            }
        }
    }*/
    //--------------------------- Data Users -------------------------------------------
    function data_users_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $condition = array(
            'password' => sha1($dec_data->password),
            'email' => $dec_data->email
        );
        $datauser1 = $this->pelanggan->get_data_pelanggan($condition);
        $message = array(
            'code' => '200',
            'message' => 'success',
            'data' => $datauser1->result()
        );
        $this->response($message, 200);
    }
    //--------------------------- Fitur Promo ------------------------------------------
    function listfiturpromo_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if($dec_data->jenis == 'Saldo'){
            $kodepromo = $this->pelanggan->promofitur_codesaldo($dec_data->id);
            $message = array(
                'code' => '200',
                'message' => 'Sukses',
                'data' => $kodepromo
            );
            $this->response($message, 200);
        }else if($dec_data->jenis == 'Semua'){
            $kodepromo = $this->pelanggan->promofitur_code($dec_data->id);
            $message = array(
                'code' => '200',
                'message' => 'Sukses',
                'data' => $kodepromo
            );
            $this->response($message, 200);
        }else{
            $kodepromo = $this->pelanggan->promofitur_code($dec_data->id);
            $message = array(
                'code' => '200',
                'message' => 'Sukses',
                'data' => $kodepromo
            );
            $this->response($message, 200);
        }
        
    }
    function listfiturpromohome_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $kodepromo = $this->pelanggan->listpromohome();
        $message = array(
            'code' => '200',
            'message' => 'Sukses',
            'data' => $kodepromo
        );
        $this->response($message, 200);
        
    }
    //--------------------------- Privacy ----------------------------------------------
    function privacy_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $app_settings = $this->pelanggan->get_settings();

        $message = array(
            'code' => '200',
            'message' => 'found',
            'data' => $app_settings
        );
        $this->response($message, 200);
    }
    //------------------------------------- Home --------------------------------
    function home_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $slider = $this->pelanggan->sliderhome($dec_data->kota);
        $fitur = $this->pelanggan->fiturhome($dec_data->kota);
        $allfitur = $this->pelanggan->fiturhomeall($dec_data->kota);
        $rating = $this->pelanggan->ratinghome();
        $saldo = $this->pelanggan->saldouser($dec_data->id);
        $app_settings = $this->pelanggan->get_settings();
        $berita = $this->pelanggan->beritahome();
        $kategorymerchant = $this->pelanggan->kategorymerchant()->result();
        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;
        $merchantpromo = $this->pelanggan->merchantpromo($long, $lat)->result();
        $merchantnearby = $this->pelanggan->merchant_terdekat($long, $lat);
        $condition = array(
            'no_telepon' => $dec_data->no_telepon,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);
       
        foreach ($app_settings as $item) {
            if ($cek_login->num_rows() > 0) {
                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'saldo' => $saldo->row('saldo'),
                    'currency' => $item['app_currency'],
                    'currency_text' => $item['app_currency_text'],
                    'app_aboutus' => $item['app_aboutus'],
                    'app_contact' => $item['app_contact'],
                    'app_website' => $item['app_website'],
                    'app_email' => $item['app_email'],
                    'background' => $item['background'],
                    'duitku_status' => $item['duitku_status'],
                    'apikey' => $item['map_key'],
                    'geokey' => $item['geocode_key'],
                    'slider' => $slider['data'],
                    'fitur' => $fitur['data'],
                    'allfitur' => $allfitur['data'],
                    'ratinghome' => $rating,
                    'beritahome' => $berita,
                    'kategorymerchanthome' => $kategorymerchant,
                    'merchantnearby' => $merchantnearby,
                    'merchantpromo' => $merchantpromo,
                    'data' => $cek_login->result(),
                    'isotp' => $item['isotp'],
                    'CekKota' => $fitur['pesan'],
                    'appname' => $item['app_name'],
                    'jasaapp' => $item['jasaapp'],
                    'digimode' => $item['digi_mode'],
                    'mode' => $item['mode']
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '201',
                    'message' => 'failed',
                    'data' => []
                );
                $this->response($message, 201);
            }
        }
    }
    //------------------------------- Fitur By home -------------------------
    function fiturbyhome_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $datafitur = $this->pelanggan->fiturbyhome($dec_data->home);
        $message = array(
            'message' => 'Sukses',
            'data' => $datafitur
        );
        $this->response($message, 200);
    }
    //------------------------------- Daftar Fitur --------------------------
    function detail_fitur_get()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $app_settings = $this->pelanggan->get_settings();
        $biaya = $this->pelanggan->get_biaya();
        foreach ($app_settings as $item) {
            $message = array(
                'data' => $biaya
            );
            $this->response($message, 200);
        }
    }
    //------------------------------- Lokasi Pelanggan -----------------------
    function onlokasi_pelanggan_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getdata = $this->pelanggan->tigalist_lokasi_pelanggan($decoded_data->id,$decoded_data->limit);
        $message = array(
            'status' => true,
            'message' => 'success',
            'data' => $getdata->result()
        );
        $this->response($message, 200);
    }
    //------------------------------- Berita ---------------------------------
    function all_berita_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getberita = $this->pelanggan->allberita();
        $message = array(
            'status' => true,
            'data' => $getberita
        );
        $this->response($message, 200);
    }
    function detail_berita_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getberita = $this->pelanggan->beritadetail($dec_data->id);
        $message = array(
            'status' => true,
            'data' => $getberita->result()
        );
        $this->response($message, 200);
    }
    //--------------------------- Mitra -------------------------------------
    public function allmerchantbypencarian_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);


        $fitur = $dec_data->fitur;
        $kategori = $dec_data->kategori;
        $kategorymerchant = $this->pelanggan->kategorymerchantbyfitur($fitur);
        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;
        $allmerchantnearby = $this->pelanggan->allmerchantnearbysearch($long,$lat,$fitur,$kategori)->result();
        $condition = array(
            'no_telepon' => $dec_data->no_telepon,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);

        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'kategorymerchant' => $kategorymerchant,
                'allmerchantnearby' => $allmerchantnearby
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 201);
        }
    }
    public function merchantbyid_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $idmerchant = $dec_data->idmerchant;
        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;

        $merchantbyid = $this->pelanggan->merchantbyid($idmerchant, $long, $lat)->row();
        $itemstatus = $this->pelanggan->itemstatus($idmerchant)->row();
        if (empty($itemstatus->status_promo)) {
            $itempromo = '0';
        } else {
            $itempromo = $itemstatus->status_promo;
        }


        $itembyid = $this->pelanggan->itembyid($idmerchant)->Result();
        $kategoriitem = $this->pelanggan->kategoriitem($idmerchant)->Result();

        $condition = array(
            'no_telepon' => $dec_data->no_telepon,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);

        if ($cek_login->num_rows() > 0) {

            $message = array(
                'code'              => '200',
                'message'           => 'success',
                'idfitur'           => $merchantbyid->id_fitur,
                'idmerchant'        => $merchantbyid->id_merchant,
                'namamerchant'      => $merchantbyid->nama_merchant,
                'alamatmerchant'    => $merchantbyid->alamat_merchant,
                'latmerchant'       => $merchantbyid->latitude_merchant,
                'longmerchant'      => $merchantbyid->longitude_merchant,
                'bukamerchant'      => $merchantbyid->jam_buka,
                'tutupmerchant'     => $merchantbyid->jam_tutup,
                'descmerchant'      => $merchantbyid->deskripsi_merchant,
                'fotomerchant'      => $merchantbyid->foto_merchant,
                'telpcmerchant'     => $merchantbyid->telepon_merchant,
                'distance'          => $merchantbyid->distance,
                'partner'           => $merchantbyid->partner,
                'kategori'          => $merchantbyid->nama_kategori,
                'promo'             => $itempromo,
                'itembyid'          => $itembyid,
                'kategoriitem'      => $kategoriitem


            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 201);
        }
    }
    public function allmerchant_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $fitur = $dec_data->fitur;
        $kategorymerchant = $this->pelanggan->kategorymerchantbyfitur($fitur);
        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;
        $allmerchantnearby = $this->pelanggan->allmerchantnearby($long,$lat,$fitur)->result();
        $condition = array(
            'no_telepon' => $dec_data->no_telepon,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);

        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'kategorymerchant' => $kategorymerchant,
                'allmerchantnearby' => $allmerchantnearby
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 201);
        }
    }
    public function allmerchantfirst_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $fitur = $dec_data->fitur;
        $kategorymerchant = $this->pelanggan->kategorymerchantbyfitur($fitur);
        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;
        $allmerchantnearby = $this->pelanggan->allmerchantnearbyfirst($long,$lat,$fitur)->result();
        $condition = array(
            'no_telepon' => $dec_data->no_telepon,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);

        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'kategorymerchant' => $kategorymerchant,
                'allmerchantnearby' => $allmerchantnearby
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 201);
        }
    }
    public function allmerchantopen_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $fitur = $dec_data->fitur;
        $kategorymerchant = $this->pelanggan->kategorymerchantbyfitur($fitur);
        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;
        $allmerchantnearby = $this->pelanggan->allmerchantnearbyopen($long,$lat,$fitur)->result();
        $condition = array(
            'no_telepon' => $dec_data->no_telepon,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);

        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'kategorymerchant' => $kategorymerchant,
                'allmerchantnearby' => $allmerchantnearby
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 201);
        }
    }
    public function allmerchantpartner_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $fitur = $dec_data->fitur;
        $kategorymerchant = $this->pelanggan->kategorymerchantbyfitur($fitur);
        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;
        $allmerchantnearby = $this->pelanggan->allmerchantnearbypartner($long,$lat,$fitur)->result();
        $condition = array(
            'no_telepon' => $dec_data->no_telepon,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);

        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'kategorymerchant' => $kategorymerchant,
                'allmerchantnearby' => $allmerchantnearby
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 201);
        }
    }
    public function allmerchantpromo_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $fitur = $dec_data->fitur;
        $kategorymerchant = $this->pelanggan->kategorymerchantbyfitur($fitur);
        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;
        $allmerchantnearby = $this->pelanggan->allmerchantnearbypromo($long,$lat,$fitur)->result();
        $condition = array(
            'no_telepon' => $dec_data->no_telepon,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);

        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'kategorymerchant' => $kategorymerchant,
                'allmerchantnearby' => $allmerchantnearby
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 201);
        }
    }
    public function allkategori_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $fitur = $dec_data->fitur;
        $homekategori = $this->pelanggan->datakategoribyfitur($fitur);
        $allkategori = $this->pelanggan->alldatakategoribyfitur($fitur);
        $message = array(
            'code' => '200',
            'message' => 'success',
            'data' => $homekategori,
            'all' => $allkategori
        );
        $this->response($message, 200);
    }
    public function allmerchantbykategori_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);


        $fitur = $dec_data->fitur;

        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;
        $kategori = $dec_data->kategori;
        $datamitra = $this->pelanggan->allmerchantnearbybykategori($long, $lat, $fitur,$kategori)->result();
      
        $message = array(
            'code' => '200',
            'message' => 'success',
            'allmerchantnearby' => $datamitra
        );
        $this->response($message, 200);
    }
    function getkategori_item_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getitem = $this->pelanggan->allkategori_item($dec_data->id);

        $message = array(
            'message' => 'sukses',
            'data' => $getitem->result()
        );
        $this->response($message, 200);
    }
    public function itembykategori_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $idmerchant = $dec_data->id;

        $itemk = $dec_data->kategori;
        $itembykategori = $this->pelanggan->itembykategori($idmerchant, $itemk)->result();

        $condition = array(
            'no_telepon' => $dec_data->no_telepon,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);

        if ($cek_login->num_rows() > 0) {

            $message = array(
                'code'              => '200',
                'message'           => 'success',
                'itembyid'          => $itembykategori


            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 201);
        }
    }
    function inserttransaksimerchant_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        } else {
            $cek = $this->pelanggan->check_banned_user($_SERVER['PHP_AUTH_USER']);
            if ($cek) {
                $message = array(
                    'message' => 'fail',
                    'data' => 'Status User Banned'
                );
                $this->response($message, 200);
            }
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $datasetting = $this->pelanggan->datasetting()->row();
        $jasapp = $datasetting->jasaapp;

        $data_transaksi = array(
            'id'             => $dec_data->id,
            'id_pelanggan'      => $dec_data->id_pelanggan,
            'order_fitur'       => $dec_data->order_fitur,
            'start_latitude'    => $dec_data->start_latitude,
            'start_longitude'   => $dec_data->start_longitude,
            'end_latitude'      => $dec_data->end_latitude,
            'end_longitude'     => $dec_data->end_longitude,
            'jarak'             => $dec_data->jarak,
            'harga'             => $dec_data->harga,
            'jasaapp'             => $jasapp,
            'waktu_order'       => date('Y-m-d H:i:s'),
            'estimasi_time'     => $dec_data->estimasi,
            'alamat_asal'       => $dec_data->alamat_asal,
            'alamat_tujuan'     => $dec_data->alamat_tujuan,
            'kredit_promo'      => $dec_data->kredit_promo,
            'pakai_wallet'      => $dec_data->pakai_wallet,
            'metode'      => $dec_data->metode
        );
        $total_belanja = [
            'total_belanja'     => $dec_data->total_biaya_belanja,
        ];

        $dataDetail = [
            'id_merchant'   => $dec_data->id_resto,
            'total_biaya'   => $dec_data->total_biaya_belanja,
            'struk'   => rand(0, 9999),
        ];

        $result = $this->pelanggan->insert_data_transaksi_merchant($data_transaksi, $dataDetail, $total_belanja);
        if ($result['status'] == true) {
            $pesanan = $dec_data->pesanan;
            foreach ($pesanan as $pes) {
                $item[] = [
                    'catatan_item' => $pes->catatan,
                    'id_item' => $pes->id_item,
                    'id_merchant' => $dec_data->id_resto,
                    'id_transaksi' => $result['id_transaksi'],
                    'jumlah_item' => $pes->qty,
                    'total_harga' => $pes->total_harga,
                ];
            }

            $request = $this->pelanggan->insert_data_item($item);

            if ($request['status']) {
                $message = array(
                    'message' => 'success',
                    'data' => $result['data'],
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'message' => 'fail insert data item',
                    'data' => []

                );
                $this->response($message, 200);
            }
        } else {
            $message = array(
                'message' => 'fail transaksi',
                'data' => []

            );
            $this->response($message, 200);
        }
    }
    public function insert_data_item($item)
    {
        foreach ($item as $it) {
            $this->db->insert('transaksi_item', $it);
        }


        if ($this->db->affected_rows() == 1) {
            return array(
                'status'        => true,

            );
        } else {
            return array(
                'status' => false
            );
        }
    }
    //----------------------------- Order Kurir --------------------------------------------
    function request_transaksi_send_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        } else {
            $cek = $this->pelanggan->check_banned_user($_SERVER['PHP_AUTH_USER']);
            if ($cek) {
                $message = array(
                    'message' => 'fail',
                    'data' => 'Status User Banned'
                );
                $this->response($message, 200);
            }
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $data_req = array(
            'id' => $dec_data->id,
            'id_pelanggan' => $dec_data->id_pelanggan,
            'order_fitur' => $dec_data->order_fitur,
            'start_latitude' => $dec_data->start_latitude,
            'start_longitude' => $dec_data->start_longitude,
            'end_latitude' => $dec_data->end_latitude,
            'end_longitude' => $dec_data->end_longitude,
            'jarak' => $dec_data->jarak,
            'harga' => $dec_data->harga,
            'estimasi_time' => $dec_data->estimasi,
            'waktu_order' => date('Y-m-d H:i:s'),
            'alamat_asal' => $dec_data->alamat_asal,
            'alamat_tujuan' => $dec_data->alamat_tujuan,
            'biaya_akhir' => $dec_data->harga,
            'kredit_promo' => $dec_data->kredit_promo,
            'pakai_wallet' => $dec_data->pakai_wallet,
            'metode' => $dec_data->metode,
            'tanggal' => date('d/M/Y')
        );


        $dataDetail = array(
            'nama_pengirim' => $dec_data->nama_pengirim,
            'telepon_pengirim' => $dec_data->telepon_pengirim,
            'nama_penerima' => $dec_data->nama_penerima,
            'telepon_penerima' => $dec_data->telepon_penerima,
            'nama_barang' => $dec_data->nama_barang,
            'catatan' => $dec_data->catatan
        );

        $request = $this->pelanggan->insert_transaksi_send($data_req, $dataDetail);
        if ($request['status']) {
            $message = array(
                'message' => 'success',
                'data' => $request['data']->result()
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'message' => 'fail',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    //----------------------------- Get Direction ------------------------------------------
    function getdirection_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
                   header("WWW-Authenticate: Basic realm=\"Private Area\"");
                   header("HTTP/1.0 401 Unauthorized");
                   return false;
               }
               $data = file_get_contents("php://input");
               $decoded_data = json_decode($data);
   
               $datasetting = $this->pelanggan->datasetting()->row();
               $apikey = $datasetting->map_key;
               
               $origin = $decoded_data->asal;
               $dest = $decoded_data->tujuan;
              
               $urlapi = "https://maps.googleapis.com/maps/api/directions/json?origin=".$origin."&destination=".$dest."&sensor=false&language=id&region=ID&key=".$apikey;
               $header = [
                   'accept: application/json',
                   'content-type: application/json'
               ];   
              
               $ch = curl_init();
               curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
               curl_setopt($ch, CURLOPT_URL, $urlapi);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
               curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
               curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
               $result = curl_exec($ch); 
               $message = array(
                       'message' => 'sukses',
                       'data' => $result
               );
               $this->response($message, 200);
               curl_close($ch);   
    }
    function getaddress_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
                   header("WWW-Authenticate: Basic realm=\"Private Area\"");
                   header("HTTP/1.0 401 Unauthorized");
                   return false;
               }
               $data = file_get_contents("php://input");
               $decoded_data = json_decode($data);
   
               $datasetting = $this->pelanggan->datasetting()->row();
               $apikey = $datasetting->geocode_key;
               
               $latitude = $decoded_data->latitude;
               $longitude = $decoded_data->longitude;

               $urlapi = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$latitude.",".$longitude."&sensor=false&language=id&region=ID&key=AIzaSyA9yBtH8SFltIP3ReJlfSHt4XQlvqLIQEc";
              // $urlapi = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$latitude.",".$longitude."&sensor=true&language=id&region=ID&key=".$apikey;
               $header = [
                   'accept: application/json',
                   'content-type: application/json'
               ];   
              
               $ch = curl_init();
               curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
               curl_setopt($ch, CURLOPT_URL, $urlapi);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
               curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
               curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
               $result = curl_exec($ch); 
               $message = array(
                       'message' => 'sukses',
                       'data' => $result
               );
               $this->response($message, 200);
               curl_close($ch);   
    }
    //----------------------------- Cari Alamat ------------------------------------------
    function carialamat_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
                   header("WWW-Authenticate: Basic realm=\"Private Area\"");
                   header("HTTP/1.0 401 Unauthorized");
                   return false;
               }
               $data = file_get_contents("php://input");
               $decoded_data = json_decode($data);
   
               $datasetting = $this->pelanggan->datasetting()->row();
               $apikey = $datasetting->map_key;
               
               $katakunci = $decoded_data->id;
               $latitude = $decoded_data->latitude;
               $longitude = $decoded_data->longitude;
              
               //$urlapi = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=".$katakunci."&sensor=false&location=".$latitude.",".$longitude."&radius=200&key=".$apikey;
               $urlapi = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-6.4575117,108.2859533&radius=2000&name=surya&sensor=false&key=AIzaSyBcYcSMJSWBMRi4KM2C3b1zT4tV3KX0sRU";
               $header = [
                   'accept: application/json',
                   'content-type: application/json'
               ];   
              
               $ch = curl_init();
               curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
               curl_setopt($ch, CURLOPT_URL, $urlapi);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
               curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
               curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
               $result = curl_exec($ch); 
               $message = array(
                       'message' => 'sukses',
                       'data' => $result
               );
               $this->response($message, 200);
               curl_close($ch);   
    }
    //--------------------------- Home Transaksi ----------------------------------------
    function hometransaksi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getdata = $this->pelanggan->all_progress($decoded_data->id);
        $message = array(
            'status' => true,
            'message' => 'found',
            'data' => $getdata->result()
        );
        $this->response($message, 200);
    }
    function alldriver_get($id)
    {
        $near = $this->pelanggan->get_driver_location_admin();
        $message = array(
            'data' => $near->result()
        );
        $this->response($message, 200);
    }
    
    //------------------------- Transaksi ------------------------------
    function rate_driver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $data_rate = array();
        if ($dec_data->catatan == "") {
            $data_rate = array(
                'id_pelanggan' => $dec_data->id_pelanggan,
                'id_driver' => $dec_data->id_driver,
                'rating' => $dec_data->rating,
                'id_transaksi' => $dec_data->id_transaksi
            );
        } else {
            $data_rate = array(
                'id_pelanggan' => $dec_data->id_pelanggan,
                'id_driver' => $dec_data->id_driver,
                'rating' => $dec_data->rating,
                'id_transaksi' => $dec_data->id_transaksi,
                'catatan' => $dec_data->catatan
            );
        }

        $finish_transaksi = $this->pelanggan->rate_driver($data_rate);
        if ($finish_transaksi) {
            $message = array(
                'message' => 'success',
                'data' => []
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'message' => 'fail',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function getpoin_driver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getPromo = $this->pelanggan->data_poin($decoded_data->id);
        $message = array(
            'message' => 'success',
            'status' => true,
            'data' => $getPromo->result()
        );
        $this->response($message, 200);
    }
    function getsaldo_driver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getPromo = $this->pelanggan->data_saldo($decoded_data->id);
        $message = array(
            'message' => 'success',
            'status' => true,
            'data' => $getPromo->result()
        );
        $this->response($message, 200);
    }
    public function sendpoin_driver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $id = $dec_data->id;
        $amount = $dec_data->amount;
            $pointlama = $this->pelanggan->pointuser($id);
            $tambahpoint = $pointlama->row('point') + $amount;
            $saldo = array('point' => $tambahpoint);
            $this->pelanggan->tambahpoin($id, $saldo);
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => []
            );
        $this->response($message, 200);
    }
    public function kirimtips_driver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $iduser = $dec_data->id;
        $iddriver = $dec_data->iddriver;
        $nama = $dec_data->nama;
        $amount = $dec_data->amount;
        $email = $dec_data->email;
        $phone = $dec_data->no_telepon;
        $numberreff = rand ( 10000 , 99999 );
        $datatopup = array(
            'id_user' => $iduser,
            'rekening' => 'sistem',
            'bank' => 'sistem',
            'nama_pemilik' => $nama,
            'type' => 'tip',
            'jumlah' => $amount,
             'reff' => 'tip'.$numberreff,
            'status' => 1
        );
        $datawallet = array(
            'id_user' => $iddriver,
            'rekening' => 'sistem',
            'bank' => 'order',
            'nama_pemilik' => $nama,
            'type' => 'tip',
            'jumlah' => $amount,
            'reff' => 'drivertip'.$numberreff,
            'status' => 1
        );
       
        $check_exist = $this->pelanggan->check_exist($email, $phone);
        $this->pelanggan->insertwallet($datawallet);
        if ($check_exist) {
            $this->pelanggan->insertwallet($datatopup);
            //kurangi saldo
            $saldolama = $this->pelanggan->saldouser($iduser);
            $saldobaru = $saldolama->row('saldo') - $amount;
            $saldo = array('saldo' => $saldobaru);
            $this->pelanggan->tambahsaldo($iduser, $saldo);
            //kasih tip
            $saldodriver = $this->pelanggan->saldouser($iddriver);
            $saldodriverbaru = $saldodriver->row('saldo') + $amount;
            $dsaldo = array('saldo' => $saldodriverbaru);
            $this->pelanggan->tambahsaldo($iddriver, $dsaldo);
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
    //------------------------------------------- Wallet -------------------------------------------
    function wallet_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getWallet = $this->pelanggan->getwallet($decoded_data->id);
        $message = array(
            'status' => true,
            'message' => 'sukses',
            'data' => $getWallet->result()
        );
        $this->response($message, 200);
    }
    function walletnow_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getWallet = $this->pelanggan->getwalletnow($decoded_data->id);
        $message = array(
            'status' => true,
            'message' => 'sukses',
            'data' => $getWallet->result()
        );
        $this->response($message, 200);
    }
    function walletbulanini_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getWallet = $this->pelanggan->getwalletbulanini($decoded_data->id);
        $message = array(
            'status' => true,
            'message' => 'sukses',
            'data' => $getWallet->result()
        );
        $this->response($message, 200);
    }
    //------------------------------------------- Chat ---------------------------------------------
    function inbox_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $listinbox = $this->pelanggan->datainbox($decoded_data->id);

        $message = [
            'code' => '200',
            'message' => 'success',
            'data' => $listinbox
        ];
        $this->response($message, 200);
    }
    //-------------------------------------- Chat ------------------------------------------------------------
    function chatapp_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $client = new \GuzzleHttp\Client();
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $datachat = $this->pelanggan->osdatachat($decoded_data->idtrans);
        $datadriver = $this->pelanggan->ostokendriver($datachat->row('iddriver'));
        $datapelanggan = $this->driver->ostokenpelanggan($datachat->row('idcust'));
        $devicedriver = $datadriver->row('ostoken');
        $devicepelanggan = $datapelanggan->row('ostoken');
        $dataapp = $this->app->getappbyid();
        #var foto
        $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
        $path = "images/vector/chat_vector.jpg";
        if($decoded_data->fotochat == "0"){
            $path = "images/vector/chat_vector.jpg";
            $datachat = array(
                'idtrans' => $decoded_data->idtrans,
                'idcust' => $decoded_data->idpelanggan,
                'iddriver' => $decoded_data->iddriver,
                'pesan' => $decoded_data->pesan,
                'fotochat' => '0',
                'level' => '0',
                'tanggal' => date('d-m-Y'),
                'jam' => date('H:i:s')
            );
           
            $fields = array(
                'app_id' => $dataapp['os_appid'],
                'contents' => array("en" => $decoded_data->pesan),
                'headings' => array("en"=>$decoded_data->title),
                // 'included_segments' => array('All'),
                'target_channel' => 'push',
                'template_id' => $dataapp['os_template_chat'],
                'android_sound' => 'pesan',
                'collapse_id' => '1',
                'big_picture' => base_url() . $path,
                'android_channel_id' => $dataapp['os_channel_chat'],
                'existing_android_channel_id' => $dataapp['os_channel_chat'],
                'include_player_ids' => [$devicedriver],
                'data' => array(
                    "id_transaksi" => $decoded_data->idtrans,
                    "idpelanggan" => $decoded_data->idpelanggan,
                    "iddriver" => $decoded_data->iddriver,
                    "pesan" => $decoded_data->pesan,
                    "foto" => $datapelanggan->row('fotopelanggan'),
                    "nama" => $datapelanggan->row('fullnama'),
                    "type" => $decoded_data->type
                ),
            );
            $konten_body = json_encode($fields);
            $responsedata = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
            'body' => $konten_body,
            'headers' => [
                'Authorization' => 'Basic '.$dataapp['os_restapi'],
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
            ]);
        }else{
            $path = "images/chat/" . $namafoto;
            file_put_contents($path, base64_decode($decoded_data->fotochat));
            $datachat = array(
                'idtrans' => $decoded_data->idtrans,
                'idcust' => $decoded_data->idpelanggan,
                'iddriver' => $decoded_data->iddriver,
                'pesan' => $decoded_data->pesan,
                'fotochat' => $namafoto,
                'level' => '0',
                'tanggal' => date('d-m-Y'),
                'jam' => date('H:i:s')
            );
            $fields = array(
                'app_id' => $dataapp['os_appid'],
                'contents' => array("en" => $decoded_data->pesan),
                'headings' => array("en"=>$decoded_data->title),
                // 'included_segments' => array('All'),
                'target_channel' => 'push',
                'template_id' => $dataapp['os_template_chat'],
                'android_sound' => 'pesan',
                'collapse_id' => '1',
                'big_picture' => base_url() . $path,
                'android_channel_id' => $dataapp['os_channel_chat'],
                'existing_android_channel_id' => $dataapp['os_channel_chat'],
                'include_player_ids' => [$devicedriver],
                'data' => array(
                    "id_transaksi" => $decoded_data->idtrans,
                    "idpelanggan" => $decoded_data->idpelanggan,
                    "iddriver" => $decoded_data->iddriver,
                    "pesan" => $decoded_data->pesan,
                    "foto" => $datapelanggan->row('fotopelanggan'),
                    "nama" => $datapelanggan->row('fullnama'),
                    "type" => $decoded_data->type
                ),
            );
            $konten_body = json_encode($fields);
            $responsedata = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
            'body' => $konten_body,
            'headers' => [
                'Authorization' => 'Basic '.$dataapp['os_restapi'],
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
            ]);
        }
        $this->driver->insertchat($datachat,$namafoto);
        $message = array(
            'message' => 'Sukses',
            'data' =>[]
        );
        $this->response($message, 200);
    }
    function chat_post()
   {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
        if($decoded_data->fotochat == "0"){
            $datachat = array(
                'idtrans' => $decoded_data->idtrans,
                'idcust' => $decoded_data->idpelanggan,
                'iddriver' => $decoded_data->iddriver,
                'pesan' => $decoded_data->pesan,
                'fotochat' => '0',
                'level' => '0',
                'tanggal' => date('d-m-Y'),
                'jam' => date('H:i:s')
            );
        }else{
            $datachat = array(
                'idtrans' => $decoded_data->idtrans,
                'idcust' => $decoded_data->idpelanggan,
                'iddriver' => $decoded_data->iddriver,
                'pesan' => $decoded_data->pesan,
                'fotochat' => $namafoto,
                'level' => '0',
                'tanggal' => date('d-m-Y'),
                'jam' => date('H:i:s')
            );
        }
        
        $this->pelanggan->insertchat($datachat,$decoded_data->fotochat,$namafoto);
        $message = array(
            'message' => 'sukses'
        );
        $this->response($message, 200);
   }
   function getchat_post(){

        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $datachat = $this->pelanggan->datachat($decoded_data->idtrans);
        $message = array(
            'message' => 'sukses',
            'data' => $datachat
        );
        $this->response($message, 200);
   }
    function chat_notif_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $datasetting = $this->pelanggan->datasetting()->row();
        $serverkey = $datasetting->fcm_key;
        $weburl = $datasetting->app_website;
        
        $url = "https://fcm.googleapis.com/fcm/send";   
        $header = [
            'authorization: key='.$serverkey,
            'content-type: application/json'
        ];
        $idtrans = $decoded_data->idtrans;
        $id = $decoded_data->id;
        $iddriver = $decoded_data->iddriver;
        $username = $decoded_data->nama;
        $foto = $decoded_data->foto;
        $datadriver = $this->pelanggan->tokendriver($iddriver);
        $notification = [
            'title' => $decoded_data->title,
            'body' => $decoded_data->body
        ];
    
        $extraNotificationData = [
            "message" => $decoded_data->body,
            "idtrans" =>$idtrans,
            "id" =>$id,
            "nama" =>$username,
            "foto" =>$foto,
            "token" =>$datadriver->row('reg_id'),
            "type" =>$decoded_data->type
        ];

        $fcmNotification = [
            'to'        => $datadriver->row('reg_id'),
            'notification' => $notification,
            'priority'          => 'high', 
            'data' => $extraNotificationData
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch); 
        curl_close($ch);
        $message = array(
            'message' => 'sukses'
        );
        $this->response($message, 200);
    }
    //--------------------------- Booking Order ----------------------------------
    function list_ride_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $near = $this->pelanggan->get_driver_ride($dec_data->latitude, $dec_data->longitude, $dec_data->fitur);
        $message = array(
            'data' => $near->result()
        );
        $this->response($message, 200);
    }
    function list_pengemudi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $near = $this->pelanggan->get_driver_ride_new($dec_data->latitude, $dec_data->longitude, $dec_data->fitur,$dec_data->totalbiaya);
        $message = array(
            'message' => 'sukses',
            'data' => $near->result()
        );
        $this->response($message, 200);
    }
    function request_transaksi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        } else {
            $cek = $this->pelanggan->check_banned_user($_SERVER['PHP_AUTH_USER']);
            if ($cek) {
                $message = array(
                    'message' => 'fail',
                    'data' => 'Status User Banned'
                );
                $this->response($message, 200);
            }
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $data_req = array(
            'id' => $dec_data->id,
            'id_pelanggan' => $dec_data->id_pelanggan,
            'order_fitur' => $dec_data->order_fitur,
            'start_latitude' => $dec_data->start_latitude,
            'start_longitude' => $dec_data->start_longitude,
            'end_latitude' => $dec_data->end_latitude,
            'end_longitude' => $dec_data->end_longitude,
            'jarak' => $dec_data->jarak,
            'harga' => $dec_data->harga,
            'home' => $dec_data->home,
            'estimasi_time' => $dec_data->estimasi,
            'waktu_order' => date('Y-m-d H:i:s'),
            'alamat_asal' => $dec_data->alamat_asal,
            'alamat_tujuan' => $dec_data->alamat_tujuan,
            'biaya_akhir' => $dec_data->total,
            'kredit_promo' => $dec_data->kredit_promo,
            'jenis' => $dec_data->jenis,
            'pakai_wallet' => $dec_data->pakai_wallet,
            'metode' => $dec_data->metode,
            'tanggal' => date('d/M/Y')
        );
        ob_implicit_flush(true);
        $request = $this->pelanggan->insert_transaksi($data_req);
        if ($request['status']) {
            $message = array(
                'message' => 'success',
                'data' => $request['data']
            );
            $this->response($message, 200);
            ob_flush();
            sleep(5);
            $settimeout = array('timeout' => '1');
            $this->pelanggan->updatetransaksi($dec_data->id,$settimeout);
        } else {
            $message = array(
                'message' => 'fail',
                'data' => $request['data']
            );
            $this->response($message, 200);
        }
    }
    function request_transaksi_jasa_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        } else {
            $cek = $this->pelanggan->check_banned_user($_SERVER['PHP_AUTH_USER']);
            if ($cek) {
                $message = array(
                    'message' => 'fail',
                    'data' => 'Status User Banned'
                );
                $this->response($message, 200);
            }
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $data_req = array(
            'id' => $dec_data->id,
            'id_pelanggan' => $dec_data->id_pelanggan,
            'order_fitur' => $dec_data->order_fitur,
            'start_latitude' => $dec_data->start_latitude,
            'start_longitude' => $dec_data->start_longitude,
            'end_latitude' => $dec_data->end_latitude,
            'end_longitude' => $dec_data->end_longitude,
            'jarak' => $dec_data->jarak,
            'harga' => $dec_data->harga,
            'home' => $dec_data->home,
            'estimasi_time' => $dec_data->estimasi,
            'waktu_order' => date('Y-m-d H:i:s'),
            'alamat_asal' => $dec_data->alamat_asal,
            'alamat_tujuan' => $dec_data->alamat_tujuan,
            'biaya_akhir' => $dec_data->total,
            'kredit_promo' => $dec_data->kredit_promo,
            'jenis' => $dec_data->jenis,
            'pakai_wallet' => $dec_data->pakai_wallet,
            'metode' => $dec_data->metode,
            'tanggal' => date('d/M/Y')
        );
       
        ob_implicit_flush(true);
        $request = $this->pelanggan->insert_transaksi($data_req);
        if ($request['status']) {
            $data_catatan = array(
                'idtransaksi' => $dec_data->id,
                'idpelanggan' => $dec_data->id_pelanggan,
                'tempat' => $dec_data->tempat,
                'catatan' => $dec_data->catatan,
                'tanggal' => date('Y-m-d H:i:s'),
            );
            $insertcatatan = $this->pelanggan->insert_catatan($data_catatan);
            $message = array(
                'message' => 'success',
                'data' => $request['data']
            );
            $this->response($message, 200);
            ob_flush();
            sleep(5);
            $settimeout = array('timeout' => '1');
            $this->pelanggan->updatetransaksi($dec_data->id,$settimeout);
        } else {
            $message = array(
                'message' => 'fail',
                'data' => $request['data']
            );
            $this->response($message, 200);
        }
    }
    function detail_transaksi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $gettrans = $this->pelanggan->transaksi($dec_data->id);
        $getdriver = $this->pelanggan->detail_driver($dec_data->id_driver);
        $getitem = $this->pelanggan->detail_item($dec_data->id);
        $dataapp = $this->app->getappbyid();
        $message = array(
            'status' => true,
            'data' => $gettrans->result(),
            'driver' => $getdriver->result(),
            'jasaapp' => $dataapp['jasaapp'],
            'item' => $getitem->result(),

        );
        $this->response($message, 200);
    }
    //-------------------------- Batalkan Pesanan -------------------------------------
    function user_cancel_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $data_req = array(
            'id_transaksi' => $dec_data->id_transaksi
        );
        $cancel_req = $this->pelanggan->user_cancel_request($data_req);
        if ($cancel_req['status']) {
            $message = array(
                'message' => 'canceled',
                'data' => []
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'message' => 'cancel fail',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function check_status_transaksi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $dataTrans = array(
            'id_transaksi' => $dec_data->id_transaksi
        );

        $getStatus = $this->pelanggan->check_status($dataTrans);
        $this->response($getStatus, 200);
    }
    
    //---------------------- Cek Status Transaksi ---------------------------------
    function update_token_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
       
        $reg_id = array(
            'token' => $decoded_data->token
        );
        $getdata = $this->pelanggan->updatetoken($reg_id,$decoded_data->id);
        $message = array(
            'status' => true,
            'message' => 'success'
        );
        $this->response($message, 200);
    }
    function update_ostoken_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
       
        $ostoken = array(
            'ostoken' => $decoded_data->token
        );
        $getdata = $this->pelanggan->updateostoken($ostoken,$decoded_data->id);
        $message = array(
            'message' => 'success'
        );
        $this->response($message, 200);
    }
    //---------------- wallet -----------------------------------
    public function withdraw_post()
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
        $saldolama = $this->pelanggan->saldouser($iduser);
        $datawithdraw = array(
            'id_user' => $iduser,
            'rekening' => $card,
            'bank' => $bank,
            'nama_pemilik' => $nama,
            'type' => $dec_data->type,
            'jumlah' => $amount,
            'status' => 0,
            'reff' => $numberreff
        );
        $check_exist = $this->pelanggan->check_exist($email, $phone);

        if ($dec_data->type ==  "topup") {
            $withdrawdata = $this->pelanggan->insertwallet($datawithdraw);

            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => []
            );
            $this->response($message, 200);
        } else {

            if ($saldolama->row('saldo') >= $amount && $check_exist) {
                $withdrawdata = $this->pelanggan->insertwallet($datawithdraw);

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
    function list_bank_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $near = $this->pelanggan->listbank();
        $message = array(
            'data' => $near->result()
        );
        $this->response($message, 200);
    }
    //---------------- Histori ----------------------------------
    function history_progress_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getWallet = $this->pelanggan->all_transaksi($decoded_data->id);
        $message = array(
            'status' => true,
            'data' => $getWallet->result()
        );
        $this->response($message, 200);
    }
    //------------------------------- Paket ---------------------------------
    function allpaket_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getpaket = $this->pelanggan->allpaket();
        $message = array(
            'message' => 'Sukses',
            'data' => $getpaket
        );
        $this->response($message, 200);
    }
    function liat_lokasi_driver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getLoc = $this->pelanggan->get_driver_location($dec_data->id);
        $message = array(
            'status' => true,
            'data' => $getLoc->result(),
            'message' => 'Sukses'
        );
        $this->response($message, 200);
    }
    function hapusorder_ride_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $idtrx = $this->pelanggan->removeorder_ride($dec_data->id);
        $message = array(
            'message' => 'Sukses'
        );
        $this->response($message, 200);
    }
    function updatetransaksi_timeout_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $settimeout = array('timeout' => '1');
        $idtrx = $this->pelanggan->updatetransaksi($dec_data->id,$settimeout);
        $message = array(
            'message' => 'Sukses'
        );
        $this->response($message, 200);
    }
    function forgot_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $condition = array(
            'email' => $decoded_data->email,
            'status' => '1'
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);
        $app_settings = $this->pelanggan->get_settings();
        $token = sha1(rand(0, 999999) . time());


        if ($cek_login->num_rows() > 0) {
            $cheker = array('msg' => $cek_login->result());
            foreach ($app_settings as $item) {
                foreach ($cheker['msg'] as $item2 => $val) {
                    $dataforgot = array(
                        'userid' => $val->id,
                        'token' => $token,
                        'idKey' => '1'
                    );
                }


                $forgot = $this->pelanggan->dataforgot($dataforgot);

                $linkbtn = base_url() . 'resetpass/rest/' . $token . '/1';
                $template = $this->pelanggan->template1($item['email_subject'], $item['email_text1'], $item['email_text2'], $item['app_website'], $item['app_name'], $linkbtn, $item['app_linkgoogle'], $item['app_address']);
                $sendmail = $this->pelanggan->emailsend($item['email_subject'] . " [ticket-" . rand(0, 999999) . "]", $decoded_data->email, $template, $item['smtp_host'], $item['smtp_port'], $item['smtp_username'], $item['smtp_password'], $item['smtp_from'], $item['app_name'], $item['smtp_secure']);
            }
            if ($forgot && $sendmail) {
                $message = array(
                    'code' => '200',
                    'message' => 'found',
                    'data' => []
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '401',
                    'message' => 'email not registered',
                    'data' => []
                );
                $this->response($message, 200);
            }
        } else {
            $message = array(
                'code' => '404',
                'message' => 'email not registered',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function alltransactionpickup_get()
    {
        $near = $this->pelanggan->getAlltransaksipickup();
        $message = array(
            'data' => $near->result()
        );
        $this->response($message, 200);
    }

    function alltransactiondestination_get()
    {
        $near = $this->pelanggan->getAlltransaksidestination();
        $message = array(
            'data' => $near->result()
        );
        $this->response($message, 200);
    }
    function sendotp_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $app_settings = $this->pelanggan->get_settings();
        
        foreach ($app_settings as $item) {
            $curl = curl_init();
            $num = rand(1000, 9999);
            curl_setopt_array($curl, array(
            CURLOPT_URL =>  'https://sender.wonuadigital.com/api/create-message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
            'appkey' => 'e9fb08d5-6bf3-49cd-bfb4-9db16b8f8186',
            'authkey' => 'PAnRICKMUQbpiZJECbtcwA7qFdUeCNSdUhzn1NwOEJxUjiQ3Od',
            'to' => $decoded_data->id,
            'message' => 'Kode OTP '.$item['app_name'].' : ' . $decoded_data->otp,
            'sandbox' => 'false'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $message = array(
            'message' => 'Sukses',
            'data' => $response
        );
        $this->response($message, 200);  
        }
    }
    function changepass_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $reg_id = array(
            'password' => sha1($decoded_data->new_password)
        );

        $condition = array(
            'password' => sha1($decoded_data->password),
            'no_telepon' => $decoded_data->no_telepon
        );
        $condition2 = array(
            'password' => sha1($decoded_data->new_password),
            'no_telepon' => $decoded_data->no_telepon
        );
        $cek_login = $this->pelanggan->get_data_pelanggan($condition);
        $message = array();

        if ($cek_login->num_rows() > 0) {
            $upd_regid = $this->pelanggan->edit_profile($reg_id, $decoded_data->no_telepon);
            $get_pelanggan = $this->pelanggan->get_data_pelanggan($condition2);

            $message = array(
                'code' => '200',
                'message' => 'found',
                'data' => $get_pelanggan->result()
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '404',
                'message' => 'wrong password',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function webview_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getdata = $this->pelanggan->list_webview();
        $message = array(
            'status' => true,
            'message' => 'Sukses',
            'data' => $getdata->result()
        );
        $this->response($message, 200);
    }
    function refferal_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        
        $check_exist_kode = $this->pelanggan->check_exist_refferal($decoded_data->id, $decoded_data->tujuan);
        $check_akun = $this->pelanggan->check_exist_akun($decoded_data->tujuan);
        if ($check_exist_kode) {
            $message = array(
                'message' => 'Sudah Ada',
                'data' => []
            );
            $this->response($message, 201);
        }else{
            $datapelanggan = $this->pelanggan->getidpelanggan($decoded_data->tujuan);
            $idtujuan = $datapelanggan->row('id');
            if ($check_akun) {
                $dataupd = array(
                    'iduser' => $decoded_data->id,
                    'idtujuan' => $idtujuan,
                    'kodeuser' => $decoded_data->kode,
                    'kodeaccept' => $decoded_data->tujuan
                );
                $this->pelanggan->tukerkode($dataupd);
                //get data
                $datasetting = $this->app->appsetting()->row();
                $valreward = $datasetting->upreff;
                $valrewardtujuan = $datasetting->rewardreff;
                //reward reff
                $pointlama = $this->pelanggan->data_saldo($decoded_data->id);
                $tambahpoint = $pointlama->row('saldo') + $valreward;
                $saldo = array('saldo' => $tambahpoint);
                $reward = $this->pelanggan->tambahsaldo($decoded_data->id, $saldo);
                $datawallet = array(
                    'id_user' => $decoded_data->id,
                    'rekening' => 'Sistem',
                    'bank' => 'Sistem',
                    'nama_pemilik' => 'Sistem',
                    'type' => 'refferal',
                    'jumlah' => $valreward,
                    'reff' => $decoded_data->kode,
                    'status' => 1
                );
                $userwallet = $this->pelanggan->insertwallet($datawallet);
                //reward tujuan
                $datausers = $this->pelanggan->data_user($decoded_data->tujuan);
                $idtujuan = $datausers->row('id');
                $saldouser = $this->pelanggan->data_saldo($idtujuan);
                $addsaldo = $saldouser->row('saldo') + $valrewardtujuan;
                $saldoplus = array('saldo' => $addsaldo);
                $rewardtujuan = $this->pelanggan->tambahsaldo($idtujuan, $saldoplus);
                $datawallets = array(
                    'id_user' => $idtujuan,
                    'rekening' => 'Sistem',
                    'bank' => 'Sistem',
                    'nama_pemilik' => 'Sistem',
                    'type' => 'refferal',
                    'jumlah' => $valrewardtujuan,
                    'reff' => $decoded_data->tujuan,
                    'status' => 1
                );
                $userwallettujuan = $this->pelanggan->insertwallet($datawallets);
                $message = array(
                    'message' => 'Sukses',
                    'data' => []
                );
                $this->response($message, 200);
            }else{
                $message = array(
                    'message' => 'Tidak Ada Akun',
                    'data' => []
                );
                $this->response($message, 200);
            }
        }
    }
    function reffhistori_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $idpel = $dec_data->id;
        $riwayat = $this->pelanggan->listhistoryreff($idpel);
        $message = array(
            'message' => 'Sukses',
            'data' => $riwayat
        );
        $this->response($message, 200);
    }
    function notifnesignal_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $datapelanggan = $this->pelanggan->ostokendriver($dec_data->id);
        $deviceid = $datapelanggan->row('ostoken');
        $dataapp = $this->app->getappbyid(); 
        
        $client = new \GuzzleHttp\Client();
        $fields = array(
            'app_id' => $dataapp['os_appid'],
            'contents' => array("en" => $dec_data->pesan),
            'headings' => array("en"=>$dec_data->title),
            'target_channel' => 'push',
            'template_id' => $dataapp['os_template'],
            'android_sound' => 'orderan',
            'collapse_id' => '0',
            'big_picture' => $dec_data->image,
            'android_channel_id' => $dataapp['os_channel'],
            'existing_android_channel_id' => $dataapp['os_channel'],
            'include_player_ids' => [$deviceid],
            'data' => array(
                "id_transaksi" => 'Trx1234',
                "type" => $dec_data->type,
                "data" => $dec_data->data,
                "status" => '2'
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
        $message = array(
            'message' => 'Sukses '.$deviceid,
            'data' =>$response->getBody()->getContents()
        );
        $this->response($message, 200);
    }
    function notifordermerchant_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $datamerchant= $this->pelanggan->ostokenmerchant($dec_data->id);
        $deviceid = $datamerchant->row('ostoken');
        $dataapp = $this->app->getappbyid(); 
        
        $client = new \GuzzleHttp\Client();
        $fields = array(
            'app_id' => $dataapp['os_appid'],
            'contents' => array("en" => $dec_data->pesan),
            'headings' => array("en"=>$dec_data->title),
            'target_channel' => 'push',
            'template_id' => $dataapp['os_template'],
            'android_sound' => 'orderan',
            'collapse_id' => '0',
            'big_picture' => $dec_data->image,
            'android_channel_id' => $dataapp['os_channel'],
            'existing_android_channel_id' => $dataapp['os_channel'],
            'include_player_ids' => [$deviceid],
            'data' => array(
                "id_transaksi" => 'Trx1234',
                "type" => $dec_data->type,
                "data" => $dec_data->data,
                "status" => '2'
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
        $message = array(
            'message' => 'Sukses '.$deviceid,
            'data' =>$response->getBody()->getContents()
        );
        $this->response($message, 200);
    }
    function notifnesignal_merchant_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $datapelanggan = $this->pelanggan->ostokenmerchant($dec_data->id);
        $deviceid = $datapelanggan->row('ostoken');
        $dataapp = $this->app->getappbyid();
        $client = new \GuzzleHttp\Client();
        $fields = array(
            'app_id' => $dataapp['os_appid'],
            'contents' => array("en" => $dec_data->pesan),
            'headings' => array("en"=>$dec_data->title),
            'target_channel' => 'push',
            'template_id' => $dataapp['os_template'],
            'android_sound' => 'orderan',
            'collapse_id' => '0',
            'big_picture' => $dec_data->image,
            'android_channel_id' => $dataapp['os_channel'],
            'existing_android_channel_id' => $dataapp['os_channel'],
            'include_player_ids' => [$deviceid],
            'data' => array(
                "id_transaksi" => $dec_data->id_transaksi,
                "type" => $dec_data->type,
                "data" => $dec_data->data,
                "status" => '2'
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
        $message = array(
            'message' => 'Sukses '.$deviceid,
            'data' =>$response->getBody()->getContents()
        );
        $this->response($message, 200);
    }
    function getnotifnesignal_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $iddevice = $dec_data->id;
        $dataapp = $this->app->getappbyid();
        $appId      = $dataapp['os_appid'];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://onesignal.com/api/v1/notifications/'.$iddevice.'?app_id='.$dataapp['os_appid'], [
            'headers' => [
              'Authorization' => 'Basic '.$dataapp['os_restapi'],
              'accept' => 'application/json',
            ],
        ]);
        //log
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/logs/logs_Onesignal_".date('Ymd His').".txt";
        $file = fopen($fileLocation,"w");
        fwrite($file,json_decode($response->getBody()));
        fclose($file);
        $message = array(
            'message' => 'Sukses',
            'data' => json_decode($response->getBody())
        );
        $this->response($message, 200);
    }
    function getdevice_get(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://onesignal.com/api/v1/players?app_id='.$dataapp['os_appid'], [
          'headers' => [
            'Authorization' => 'Basic '.$dataapp['os_restapi'],
            'accept' => 'text/plain',
          ],
        ]);
        echo $response->getBody();
    }
    //------------------------------ save alamat ----------------------
    function addalamat_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
       
        $dataalamat = array(
            'iduser' => $dec_data->id,
            'nama' => $dec_data->nama,
            'jalan' => $dec_data->jalan,
            'alamat' => $dec_data->alamat,
            'latitude' => $dec_data->latitude,
            'longitude' => $dec_data->longitude,
        );
        $this->pelanggan->simpanalamat($dataalamat);
        $message = array(
            'message' => 'Sukses'
        );
        $this->response($message, 200);
    }
    //------------------------------ Daftar alamat ----------------------
    function daftaralamat_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $dataalmaat = $this->pelanggan->listalamat($dec_data->id);
        $message = array(
            'message' => 'Sukses',
            'data' => $dataalmaat
        );
        $this->response($message, 200);
    }
}