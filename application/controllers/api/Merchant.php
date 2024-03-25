<?php
//'tes' => number_format(200 / 100, 0, ",", "."),
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require_once('vendor/autoload.php');
class Merchant extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
       
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Api_mitra');
        $this->load->model('Appsettings', 'app');
        $this->load->model('Api_pelanggan','pelanggan');
        $this->load->model('Template_model');
        $this->load->model('Api_driver','driver');
        date_default_timezone_set('Asia/Jakarta');
    }

    function index_get()
    {
        $this->response("Api for merchant Gojasa!", 200);
    }

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
            'token_merchant' => $decoded_data->token
        );

        $condition = array(
            'password' => sha1($decoded_data->password),
            'telepon_mitra' => $decoded_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $check_banned = $this->Api_mitra->check_banned($decoded_data->no_telepon);
        if ($check_banned) {
            $message = array(
                'message' => 'banned',
                'data' => []
            );
            $this->response($message, 200);
        } else {
            $cek_login = $this->Api_mitra->cek_data_merchant($condition);
            if($cek_login->row('status_mitra') == '0'){
                $message = array(
                    'code' => '200',
                    'message' => 'pending',
                    'data' => []
                );
                $this->response($message, 200);
            }else{
                $message = array();
                if ($cek_login->num_rows() > 0) {
                    $this->Api_mitra->edit_profile_token($reg_id, $decoded_data->no_telepon);
                    $get_pelanggan = $this->Api_mitra->get_data_merchant($condition);
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
    }

    function register_merchant_post()
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
        $check_exist = $this->Api_mitra->check_exist($email, $phone);
        $check_exist_phone = $this->Api_mitra->check_exist_phone($phone);
        $check_exist_email = $this->Api_mitra->check_exist_email($email);
      
        if ($check_exist) {
            $message = array(
                'code' => '201',
                'message' => 'email and phone number already exist',
                'data' => ''
            );
            $this->response($message, 201);
        } else
         if ($check_exist_phone) {
            $message = array(
                'code' => '201',
                'message' => 'phone already exist',
                'data' => ''
            );
            $this->response($message, 201);
        } else if ($check_exist_email) {
            $message = array(
                'code' => '201',
                'message' => 'email already exist',
                'data' => ''
            );
            $this->response($message, 201);
        } else {
            if ($dec_data->checked == "true") {
              $data_signup = array(
                    'id_mitra' => 'M' . $dec_data->idmitra,
                    'nama_mitra' => $dec_data->nama_mitra,
                    'alamat_mitra' => $dec_data->alamat_mitra,
                    'kota' => $dec_data->kota,
                    'email_mitra' => $dec_data->email,
                    'password' => sha1($dec_data->password),
                    'telepon_mitra' => $dec_data->no_telepon,
                    'phone_mitra' => $dec_data->phone,
                    'country_code_mitra' => $dec_data->countrycode,
                    'partner' => '0',
                    'status_mitra' => '0'
                );
                $image = $dec_data->foto;
                $namafoto = 'Merchant-' . $dec_data->idmitra . ".jpg";
                $path = "images/merchant/" . $namafoto;
                file_put_contents($path, base64_decode($image));

                $data_merchant = array(
                    'id_merchant' => $dec_data->idmitra,
                    'id_fitur' => $dec_data->id_fitur,
                    'nama_merchant' => $dec_data->nama_merchant,
                    'alamat_merchant' => $dec_data->alamat_merchant,
                    'latitude_merchant' => $dec_data->latitude_merchant,
                    'longitude_merchant' => $dec_data->longitude_merchant,
                    'jam_buka' => $dec_data->jam_buka,
                    'jam_tutup' => $dec_data->jam_tutup,
                    'category_merchant' => $dec_data->category_merchant,
                    'foto_merchant' => $namafoto,
                    'telepon_merchant' => $dec_data->no_telepon,
                    'phone_merchant' => $dec_data->phone,
                    'country_code_merchant' => $dec_data->countrycode,
                    'status_merchant' => '0',
                    'token_merchant' => time()
                );

                //$imagektp = $dec_data->foto_ktp;
                $namafotoktp = time() . '-' . rand(0, 99999) . ".jpg";
               // $namafotoktp = $dec_data->no_ktp . ".jpg";
              //  $pathktp = "images/fotoberkas/ktp/" . $namafotoktp;
               // file_put_contents($pathktp, base64_decode($imagektp));

                $data_berkas = array(
                    'foto_ktp' => $namafotoktp
                );


                $signup = $this->Api_mitra->signup($data_signup, $data_merchant, $data_berkas);
                if ($signup) {
                    $message = array(
                        'code' => '200',
                        'message' => 'success',
                        'data' => 'Pendaftaran Berhasil,Mohon Tunggu Untuk Dikonfirmasi!'
                    );
                    $this->response($message, 200);
                } else {
                    $message = array(
                        'code' => '201',
                        'message' => 'failed',
                        'data' => ''
                    );
                    $this->response($message, 201);
                }
            }
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
        $getdata = $this->Api_mitra->list_slider($decoded_data->fitur_promosi);
        $message = array(
            'status' => true,
            'message' => 'found',
            'data' => $getdata->result()
        );
        $this->response($message, 200);
    }
    function home_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $app_settings = $this->pelanggan->get_settings();
        $saldo = $this->pelanggan->saldouser($dec_data->idmitra);
        $transaksi = $this->Api_mitra->transaksi_home($dec_data->idmerchant);
        $kategori = $this->Api_mitra->data_merchant($dec_data->idmerchant);
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $transaksi_daily = $this->Api_mitra->total_history_daily($dec_data->day, $dec_data->idmerchant);
        $daily = '0';
        $counts = '0';
        foreach ($transaksi_daily->result_array() as $item) {
            if ($item['daily'] != NULL) {
                $daily = $item['daily'];
            }
            if ($item['counter'] != NULL) {
                $counts = $item['counter'];
            }
        }
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
                    'mode' => $item['mode'],
                    'data' => $transaksi->result(),
                    'kategori' => $kategori->result(),
                    'daily' => $daily,
                    'dailytrx' => $counts,
                    'user' => $cek_login->result()
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '200',
                    'message' => 'failed',
                    'data' => []
                );
                $this->response($message, 200);
            }
        }
    }

    function onoff_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $update = [
            'status_merchant' => $decoded_data->status
        ];

        $where = [
            'id_merchant' => $decoded_data->idmerchant,
            'token_merchant' => $decoded_data->token
        ];

        $success = $this->Api_mitra->onmerchant($update, $where);

        if ($success) {
            $message = [
                'code' => '200',
                'message' => 'success',
                'data' => $decoded_data->status
            ];
            $this->response($message, 200);
        } else {
            $message = [
                'code' => '201',
                'message' => 'gagal',
                'data' => $decoded_data->status
            ];
            $this->response($message, 200);
        }
    }

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
        $check_exist = $this->Api_mitra->check_exist($email, $phone);

        if ($dec_data->type ==  "topup") {
            $withdrawdata = $this->pelanggan->insertwallet($datawithdraw);

            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => ''
            );
            $this->response($message, 200);
        } else {

            if ($saldolama->row('saldo') >= $amount && $check_exist) {
                $withdrawdata = $this->pelanggan->insertwallet($datawithdraw);

                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'data' => ''
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '201',
                    'message' => 'You have insufficient balance',
                    'data' => ''
                );
                $this->response($message, 200);
            }
        }
    }
    function history_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $date = date_create($dec_data->day);
        $transaksi = $this->Api_mitra->transaksi_history($dec_data->idmerchant);
        $transaksi_earning = $this->Api_mitra->total_history_earning($dec_data->idmerchant);
        $transaksi_daily = $this->Api_mitra->total_history_daily($dec_data->day, $dec_data->idmerchant);
        $transaksi_month = $this->Api_mitra->total_history_month(date_format($date, "m"), $dec_data->idmerchant);
        $transaksi_yearly = $this->Api_mitra->total_history_yearly(date_format($date, "Y"), $dec_data->idmerchant);
        $daily = '0';
        $month = '0';
        $yearly = '0';
        $earning = '0';
        if (!empty($transaksi_earning)) {
            foreach ($transaksi_earning->result_array() as $item) {
                if ($item['earning'] != NULL) {
                    $earning = $item['earning'];
                }
            }
        }

        foreach ($transaksi_daily->result_array() as $item) {
            if ($item['daily'] != NULL) {
                $daily = $item['daily'];
            }
        }
        foreach ($transaksi_month->result_array() as $item) {
            if ($item['month'] != NULL) {
                $month = $item['month'];
            }
        }
        foreach ($transaksi_yearly->result_array() as $item) {
            if ($item['yearly'] != NULL) {
                $yearly = $item['yearly'];
            }
        }
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $transaksi->result(),
                'daily' => $daily,
                'month' => $month,
                'year' => $yearly,
                'earning' => $earning,
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    function kategori_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $datakategori = $this->Api_mitra->kategori_active($dec_data->idmerchant);
        $datakategorinon = $this->Api_mitra->kategori_nonactive($dec_data->idmerchant);
        $totalitemactive = $this->Api_mitra->totalitemactive($dec_data->idmerchant);
        if ($cek_login->num_rows() > 0) {
            foreach ($totalitemactive->result() as $itemstatus) {
                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'dataactive' => $datakategori,
                    'datanonactive' => $datakategorinon,
                    'totalitemactive' => $itemstatus->active,
                    'totalitemnonactive' => $itemstatus->nonactive,
                    'totalitempromo' => $itemstatus->promo,
                );
                $this->response($message, 200);
            }
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed',
                'data' => [],
                'datanonactive' => []
            );
            $this->response($message, 200);
        }
    }

    function item_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $dataitemactive = $this->Api_mitra->itembycatactive($dec_data->idmerchant, $dec_data->idkategori);
        if ($cek_login->num_rows() > 0) {

            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $dataitemactive->result()
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    function active_kategori_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $this->Api_mitra->actived_kategori($dec_data->idkategori, $dec_data->status);
        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }

    function active_item_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $this->Api_mitra->actived_item($dec_data->idkategori, $dec_data->status);
        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }
    function add_kategoris_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );

        $image = $dec_data->foto;
        $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
        $path = "images/kategorimerchant/" . $namafoto;
        file_put_contents($path, base64_decode($image));

        $dataitem = array(
            'id_merchant' => $dec_data->idmerchant,
            'nama_kategori_item' => $dec_data->namakategori,
            'status_kategori' => $dec_data->status,
            'foto_kategori_item' => $namafoto,
            'all_category' => 0
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $this->Api_mitra->tambahkategori($dataitem);
        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }
    function add_kategori_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $this->Api_mitra->addkategori($dec_data->namakategori, $dec_data->status, $dec_data->id,$dec_data->foto);
        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }

    function edit_kategori_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $dataedit = array(
            'nama_kategori_item' => $dec_data->namakategori,
            'status_kategori' => $dec_data->status,
            'all_category' => 0,
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $this->Api_mitra->editkategori($dataedit, $dec_data->id);
        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }

    function delete_kategori_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $this->Api_mitra->deletekategori($dec_data->id);
        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }
    function add_item_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );

        $image = $dec_data->foto;
        $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
        $path = "images/itemmerchant/" . $namafoto;
        file_put_contents($path, base64_decode($image));

        $dataitem = array(
            'id_merchant' => $dec_data->idmerchant,
            'nama_item' => $dec_data->nama,
            'harga_item' => $dec_data->harga,
            'harga_promo' => $dec_data->harga_promo,
            'kategori_item' => $dec_data->kategori,
            'deskripsi_item' => $dec_data->deskripsi,
            'foto_item' => $namafoto,
            'status_promo' => $dec_data->status_promo,
            'status_item' => 1
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $this->Api_mitra->additem($dataitem);
        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }

    function edit_item_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );



        if ($dec_data->foto == null && $dec_data->foto_lama == null) {
            $dataitem = array(
                'nama_item' => $dec_data->nama,
                'harga_item' => $dec_data->harga,
                'harga_promo' => $dec_data->harga_promo,
                'kategori_item' => $dec_data->kategori,
                'deskripsi_item' => $dec_data->deskripsi,
                'status_promo' => $dec_data->status_promo
            );
        } else {
            $image = $dec_data->foto;
            $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
            $path = "images/itemmerchant/" . $namafoto;
            file_put_contents($path, base64_decode($image));

            $foto = $dec_data->foto_lama;
            $path = "images/itemmerchant/$foto";
            unlink("$path");

            $dataitem = array(
                'nama_item' => $dec_data->nama,
                'harga_item' => $dec_data->harga,
                'harga_promo' => $dec_data->harga_promo,
                'kategori_item' => $dec_data->kategori,
                'deskripsi_item' => $dec_data->deskripsi,
                'foto_item' => $namafoto,
                'status_promo' => $dec_data->status_promo
            );
        }
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $this->Api_mitra->edititem($dataitem, $dec_data->id);
        if ($cek_login->num_rows() > 0) {
            $message = array(
                'code' => '200',
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }

    function delete_item_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $this->Api_mitra->deleteitem($dec_data->id);

        if ($cek_login->num_rows() > 0) {
            $foto = $dec_data->foto_lama;
            $path = "images/itemmerchant/$foto";
            unlink("$path");
            $message = array(
                'code' => '200',
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '200',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }

    function edit_profile_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $check_exist_phone = $this->Api_mitra->check_exist_phone_edit($decoded_data->id_mitra, $decoded_data->no_telepon);
        $check_exist_email = $this->Api_mitra->check_exist_email_edit($decoded_data->id_mitra, $decoded_data->email);
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
                'telepon_mitra' => $decoded_data->no_telepon
            );
            $condition2 = array(
                'telepon_mitra' => $decoded_data->no_telepon_lama
            );
            $datauser = array(
                'nama' => $decoded_data->fullnama,
                'no_telepon' => $decoded_data->no_telepon,
                'phone' => $decoded_data->phone,
                'email' => $decoded_data->email,
                'countrycode' => $decoded_data->countrycode,
                'alamat' => $decoded_data->alamat
            );



            $cek_login = $this->Api_mitra->get_data_merchant($condition2);
            if ($cek_login->num_rows() > 0) {
                $upd_user = $this->Api_mitra->edit_profile_mitra_merchant($datauser, $decoded_data->no_telepon_lama);
                $getdata = $this->Api_mitra->get_data_merchant($condition);
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

    function edit_merchant_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $condition = array(
            'telepon_mitra' => $decoded_data->no_telepon
        );

        if ($decoded_data->foto == null && $decoded_data->foto_lama == null) {
            $datauser = array(
                'nama_merchant' => $decoded_data->nama,
                'alamat_merchant' => $decoded_data->alamat,
                'latitude_merchant' => $decoded_data->latitude,
                'longitude_merchant' => $decoded_data->longitude,
                'jam_buka' => $decoded_data->jam_buka,
                'jam_tutup' => $decoded_data->jam_tutup
            );
        } else {
            $image = $decoded_data->foto;
            $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
            $path = "images/merchant/" . $namafoto;
            file_put_contents($path, base64_decode($image));

            $foto = $decoded_data->foto_lama;
            $path = "./images/merchant/$foto";
            unlink("$path");


            $datauser = array(
                'nama_merchant' => $decoded_data->nama,
                'alamat_merchant' => $decoded_data->alamat,
                'latitude_merchant' => $decoded_data->latitude,
                'longitude_merchant' => $decoded_data->longitude,
                'jam_buka' => $decoded_data->jam_buka,
                'jam_tutup' => $decoded_data->jam_tutup,
                'foto_merchant' => $namafoto
            );
        }


        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        if ($cek_login->num_rows() > 0) {
            $upd_user = $this->Api_mitra->edit_profile_token($datauser, $decoded_data->no_telepon);
            $getdata = $this->Api_mitra->get_data_merchant($condition);
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

    function detail_transaksi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'telepon_mitra' => $dec_data->no_telepon
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        if ($cek_login->num_rows() > 0) {
            $gettrans = $this->pelanggan->transaksi($dec_data->id);
            $getdriver = $this->pelanggan->detail_driver($dec_data->id_driver);
            $getpelanggan = $this->driver->get_data_pelangganid($dec_data->id_pelanggan);
            $getitem = $this->pelanggan->detail_item($dec_data->id);

            $message = array(
                'status' => true,
                'message' => "success",
                'data' => $gettrans->result(),
                'driver' => $getdriver->result(),
                'pelanggan' => $getpelanggan->result(),
                'item' => $getitem->result(),

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
            'email_mitra' => $decoded_data->email,
            'status_mitra' => '1'
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $app_settings = $this->pelanggan->get_settings();
        $token = sha1(rand(0, 999999) . time());


        if ($cek_login->num_rows() > 0) {
            $cheker = array('msg' => $cek_login->result());
            foreach ($app_settings as $item) {
                foreach ($cheker['msg'] as $item2 => $val) {
                    $dataforgot = array(
                        'userid' => $val->id_mitra,
                        'token' => $token,
                        'idKey' => '3'
                    );
                }


                $forgot = $this->pelanggan->dataforgot($dataforgot);

                $linkbtn = base_url() . 'resetpass/rest/' . $token . '/3';
                $template = $this->Template_model->template1($item['email_subject'], $item['email_text1'], $item['email_text2'], $item['app_website'], $item['app_name'], $linkbtn, $item['app_linkgoogle'], $item['app_address']);
                $sendmail = $this->Template_model->emailsend($item['email_subject'] . " [ticket-" . rand(0, 999999) . "]", $decoded_data->email, $template, $item['smtp_host'], $item['smtp_port'], $item['smtp_username'], $item['smtp_password'], $item['smtp_from'], $item['app_name'], $item['smtp_secure']);
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
            'telepon_mitra' => $decoded_data->no_telepon
        );
        $condition2 = array(
            'password' => sha1($decoded_data->new_password),
            'telepon_mitra' => $decoded_data->no_telepon
        );
        $cek_login = $this->Api_mitra->get_data_merchant($condition);
        $message = array();

        if ($cek_login->num_rows() > 0) {
            $upd_regid = $this->Api_mitra->edit_profile($reg_id, $decoded_data->no_telepon);
            $get_pelanggan = $this->Api_mitra->get_data_merchant($condition2);

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

    function kategorimerchant_get()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $kategori = $this->Api_mitra->kategori_merchant_active();
        $fitur = $this->Api_mitra->fitur_merchant_active();

        $message = [
            'code' => '200',
            'message' => 'success',
            'fitur' => $fitur,
            'kategori' => $kategori,
        ];
        $this->response($message, 200);
    }

    function kategorimerchantbyfitur_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $kategori = $this->Api_mitra->kategori_merchant_active_data($decoded_data->idmerchant);
        $fitur = $this->Api_mitra->fitur_merchant_active();

        $message = [
            'code' => '200',
            'message' => 'success',
            'fitur' => $fitur,
            'kategori' => $kategori,
        ];
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

        $listinbox = $this->Api_mitra->datainbox($decoded_data->id);

        $message = [
            'code' => '200',
            'message' => 'success',
            'data' => $listinbox
        ];
        $this->response($message, 200);
    }
    function chat_post()
    {
            $client = new \GuzzleHttp\Client();
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }

            $data = file_get_contents("php://input");
            $decoded_data = json_decode($data);
            $datachat = $this->driver->osdatachat($decoded_data->idtrans);
            $datadriver = $this->pelanggan->ostokendriver($decoded_data->iddriver);
            $datamerchant= $this->driver->ostokenmerchant($decoded_data->idmerchant);
            $devicedriver = $datadriver->row('ostoken');
            $devicemerchant = $datamerchant->row('ostoken');
            $datasetting = $this->app->appsetting()->row();
            $dataapp = $this->app->getappbyid();
            $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
            if($decoded_data->fotochat == "0"){
                $datachat = array(
                    'idtrans' => $decoded_data->idtrans,
                    'idmerc' => $decoded_data->idmerchant,
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
                    'template_id' => $dataapp['os_template'],
                    'android_sound' => 'pesan',
                    'collapse_id' => '1',
                    'android_channel_id' => $dataapp['os_channel'],
                    'existing_android_channel_id' => $dataapp['os_channel'],
                    'include_player_ids' => [$devicedriver],
                    'data' => array(
                        "id" => $decoded_data->idtrans,
                        "id_transaksi" => $decoded_data->idtrans,
                        "idpelanggan" => $decoded_data->idmerchant,
                        "iddriver" => $decoded_data->iddriver,
                        "token" => $devicemerchant,
                        "pesan" => $decoded_data->pesan,
                        "foto" => $datamerchant->row('foto_merchant'),
                        "nama" => $datamerchant->row('nama_merchant'),
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
                $datachat = array(
                    'idtrans' => $decoded_data->idtrans,
                    'idmerc' => $decoded_data->idmerchant,
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
                    'template_id' => $dataapp['os_template'],
                    'android_sound' => 'pesan',
                    'collapse_id' => '1',
                    'big_picture' => base_url() . $path,
                    'android_channel_id' => $dataapp['os_channel'],
                    'existing_android_channel_id' => $dataapp['os_channel'],
                    'include_player_ids' => [$devicedriver],
                    'data' => array(
                        "id" => $decoded_data->idtrans,
                        "id_transaksi" => $decoded_data->idtrans,
                        "idpelanggan" => $decoded_data->idmerchant,
                        "iddriver" => $decoded_data->iddriver,
                        "token" => $devicemerchant,
                        "pesan" => $decoded_data->pesan,
                        "foto" => $datamerchant->row('foto_merchant'),
                        "nama" => $datamerchant->row('nama_merchant'),
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
            
            $this->Api_mitra->insertchat($datachat,$decoded_data->fotochat,$namafoto);
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

        $datachat = $this->Api_mitra->datachat($decoded_data->idtrans);
        $message = array(
            'message' => 'sukses',
            'data' => $datachat
        );
        $this->response($message, 200);
   }
   function detailtransaksi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $gettrans = $this->Api_mitra->transaksi($dec_data->id);
        $message = array(
            'status' => true,
            'message' => 'sukses',
            'data' => $gettrans->result()
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
        $datasetting = $this->driver->datasetting()->row();
        $serverkey = $datasetting->fcm_key;
        $weburl = $datasetting->app_website;
        
        $url = "https://fcm.googleapis.com/fcm/send";   
        $header = [
            'authorization: key='.$serverkey,
            'content-type: application/json'
        ];
        $idtrans = $decoded_data->idtrans;
        $id = $decoded_data->id;
        $username = $decoded_data->nama;
        $foto = $decoded_data->foto;
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
            "token" =>$decoded_data->token,
            "type" =>$decoded_data->type
        ];
    
        $fcmNotification = [
            'to'        => $decoded_data->token,
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
        $message = array(
                'message' => 'sukses'
        );
        $this->response($message, 200);
        curl_close($ch);
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
        $getdata = $this->Api_mitra->updateostoken($ostoken,$decoded_data->id);
        $message = array(
            'message' => 'success'
        );
        $this->response($message, 200);
    }
}
