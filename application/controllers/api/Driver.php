<?php
//'tes' => number_format(200 / 100, 0, ",", "."),
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require_once('vendor/autoload.php');
class Driver extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Appsettings', 'app');
        $this->load->model('Api_driver','driver');
        $this->load->model('Api_pelanggan','pelanggan');
        date_default_timezone_set('Asia/Jakarta');
    }

    function index_get()
    {
        $this->response("Api for Gojasa!", 200);
    }

    function privacy_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $app_settings = $this->driver->get_settings();

        $message = array(
            'code' => '200',
            'message' => 'found',
            'data' => $app_settings
        );
        $this->response($message, 200);
    }
    function dashboard_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $iddriver =  $dec_data->id;
        $message = array(
            'code' => '200',
            'message' => 'sukses ' . $iddriver,
            'jan' => $this->driver->datagrafik(1, $iddriver),
            'feb' => $this->driver->datagrafik(2,  $iddriver),
            'mar' => $this->driver->datagrafik(3,  $iddriver),
            'apr' => $this->driver->datagrafik(4,  $iddriver),
            'mei' => $this->driver->datagrafik(5,  $iddriver),
            'jun' => $this->driver->datagrafik(6,  $iddriver),
            'jul' => $this->driver->datagrafik(7,  $iddriver),
            'ags' => $this->driver->datagrafik(8,  $iddriver),
            'sep' => $this->driver->datagrafik(9,  $iddriver),
            'okt' => $this->driver->datagrafik(10, $iddriver),
            'nov' => $this->driver->datagrafik(11, $iddriver),
            'des' => $this->driver->datagrafik(12, $iddriver),
            'statusdriver' => $this->driver->datastatus($iddriver),
            'minval' => $this->driver->datamingrafik($iddriver),
            'totalharian' => $this->driver->totalpendapatanharian($iddriver),
            'totalmingguan' => $this->driver->totalpendapatanmingguan($iddriver),
            'totalbulanan' => $this->driver->totalpendapatanbulanan($iddriver),
            'totaltahunan' => $this->driver->totalpendapatantahunan($iddriver),
            'totalordertunai' => $this->driver->totalordertunai($iddriver),
            'totalordersaldo' => $this->driver->totalordersaldo($iddriver),
            'total' => $this->driver->totalpendapatan($iddriver)
        );
        $this->response($message, 200);
    }

    function job_post()
    {

        $job = $this->driver->get_job();

        $message = array(
            'code' => '200',
            'message' => 'found',
            'data' => $job
        );
        $this->response($message, 200);
    }
    function area_post()
    {
         if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $area = $this->driver->getarea($dec_data->id);
        $message = array(
            'code' => '200',
            'message' => 'success',
            'data' => $area
        );
        $this->response($message, 200);
    }
    function mwapikey_post()
    {

        $app_settings = $this->driver->get_settings();

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
            'reg_id' => $decoded_data->token
        );

        $condition = array(
            'password' => sha1($decoded_data->password),
            'no_telepon' => $decoded_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $check_banned = $this->driver->check_banned($decoded_data->no_telepon);
        if ($check_banned) {
            $message = array(
                'message' => 'banned',
                'data' => []
            );
            $this->response($message, 200);
        } else {
            $cek_login = $this->driver->get_data_pelanggan($condition);
            $message = array();
            if ($cek_login->num_rows() > 0) {
                $upd_regid = $this->driver->edit_profile($reg_id, $decoded_data->no_telepon);
                $get_pelanggan = $this->driver->get_data_pelanggan($condition);
                $this->driver->edit_status_login($decoded_data->no_telepon);
                $app_settings = $this->driver->get_settings();
                foreach ($app_settings as $item) {
                    $message = array(
                        'code' => '200',
                        'message' => 'found',
                        'isotp' => $item['isotp'],
                        'data' => $get_pelanggan->result()
                    );
                    $this->response($message, 200);
                }
                
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

    function login_post_old()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $reg_id = array(
            'reg_id' => $decoded_data->token
        );

        $condition = array(
            'password' => sha1($decoded_data->password),
            'no_telepon' => $decoded_data->no_telepon,
            //'token' => $decoded_data->token
        );
        $check_banned = $this->driver->check_banned($decoded_data->no_telepon);
        if ($check_banned) {
            $message = array(
                'message' => 'banned',
                'data' => []
            );
            $this->response($message, 200);
        } else {
            $cek_login = $this->driver->get_data_pelanggan($condition);
            $message = array();

            if ($cek_login->num_rows() > 0) {
                $upd_regid = $this->driver->edit_profile($reg_id, $decoded_data->no_telepon);
                $get_pelanggan = $this->driver->get_data_pelanggan($condition);
                $this->driver->edit_status_login($decoded_data->no_telepon);
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
        $cancel_req = $this->driver->user_cancel_request($data_req);
        if ($cancel_req['status']) {
            $this->driver->delete_chat($cancel_req['iddriver'], $cancel_req['idpelanggan']);
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
         $iddriver = $decoded_data->id;
         $getWallet = $this->driver->getwallet($decoded_data->id);
         $getWallettunai = $this->driver->getwallettunai($decoded_data->id)->result();
         $message = array(
             'status' => true,
             'message' => 'sukses',
             'totalharian' => $this->driver->totalpendapatanharian($iddriver),
             'totalmingguan' => $this->driver->totalpendapatanmingguan($iddriver),
             'totalbulanan' => $this->driver->totalpendapatanbulanan($iddriver),
             'totaltahunan' => $this->driver->totalpendapatantahunan($iddriver),
             'totalordertunai' => $this->driver->totalordertunai($decoded_data->id),
             'totalordersaldo' => $this->driver->totalordersaldo($decoded_data->id),
             'data' => $getWallet->result()
         );
         $this->response($message, 200);
     }
    function update_location_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'latitude' => $decoded_data->latitude,
            'longitude' => $decoded_data->longitude,
            'bearing' => $decoded_data->bearing,
            'id_driver' => $decoded_data->id_driver
        );
        $ins = $this->driver->my_location($data);

        if ($ins) {
            $message = array(
                'message' => 'location updated',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function update_lokasi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'id_driver' => $decoded_data->id_driver,
            'latitude' => $decoded_data->latitude,
            'longitude' => $decoded_data->longitude,
            'bearing' => $decoded_data->bearing
        );
        $ins = $this->driver->my_lokasi($data);

        if ($ins) {
            $message = array(
                'message' => 'location updated',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function aktivitas_driver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getData = $this->driver->get_driver_aktivitas($dec_data->aktivitas);
        $message = array(
            'aktivitas' => true,
            'data' => $getData->result()
        );
        $this->response($message, 200);
    }
    function update_aktivitas_post()
    {
       if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'aktivitas' => $decoded_data->aktivitas,
            'id' => $decoded_data->id
        );
        $ins = $this->driver->aktivitas($data);

        if ($ins) {
            $message = array(
                'message' => 'aktivitas updated',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function update_status_post()
    {
       if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
         $data_lokasi = array(
                'id_driver' => $dec_data->id_driver,
                'status' => $dec_data->status
            );

        $finish_lokasi = $this->driver->save_status($data_lokasi);

        if ($finish_lokasi) {
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
    function home_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $saldo = $this->driver->saldouser($dec_data->id);
        $app_settings = $this->driver->get_settings();
        $condition = array(
            'no_telepon' => $dec_data->no_telepon
        );
        $cek_login = $this->driver->get_data_driver($condition);
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
                    'map_key' => $item['map_key'],
                    'jasaapp' => $item['jasaapp'],
                    'duitku_status' => $item['duitku_status'],
                    'app_email' => $item['app_email'],
                    'isotp' => $item['isotp']
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

    function logout_post()
    {
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

        $logout = $this->driver->logout($dataEdit, $decoded_data->id);
        if ($logout) {
            $message = array(
                'message' => 'success',
                'data' => ''
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'message' => 'fail',
                'data' => ''
            );
            $this->response($message, 200);
        }
    }

    function syncronizing_account_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $saldo = $this->driver->saldouser($dec_data->id);
       // $point = $this->driver->poindriver($dec_data->id);
        $app_settings = $this->driver->get_settings();
        $getDataDriver = $this->driver->get_data_driver_sync($dec_data->id);
        $condition = array(
            'no_telepon' => $dec_data->no_telepon
        );
        $cek_login = $this->driver->get_data_pelanggan($condition);
        foreach ($app_settings as $item) {
            if ($cek_login->num_rows() > 0) {
                if ($getDataDriver['status_order']->num_rows() > 0) {
                    $stat = 0;
                    if ($getDataDriver['status_order']->row('status') == 3) {
                        $stat = 3;
                    } else if ($getDataDriver['status_order']->row('status') == 6) {
                        $stat = 6;
                    } else if ($getDataDriver['status_order']->row('status') == 2) {
                        $stat = 2;
                    }
                    $getTrans = $this->driver->change_status_driver($dec_data->id, $stat);
                    $message = array(
                        'message' => 'success',
                        'driver_status' => $stat,
                        'data_driver' => $getDataDriver['data_driver']->result(),
                        'data_transaksi' => $getDataDriver['status_order']->result(),
                        'saldo' => $saldo->row('saldo'),
                        'currency' => $item['app_currency'],
                        'currency_text' => $item['app_currency_text'],
                        'app_aboutus' => $item['app_aboutus'],
                        'app_contact' => $item['app_contact'],
                        'app_website' => $item['app_website'],
                        'app_email' => $item['app_email'],
                        'duitku_status' => $item['duitku_status'],
                        'map_key' => $item['map_key']
                    );
                    $this->response($message, 200);
                } else {
                   
                    $message = array(
                        'message' => 'success',
                        'driver_status' => 1,
                        'data_driver' => $getDataDriver['data_driver']->result(),
                        'data_transaksi' => [],
                        'saldo' => $saldo->row('saldo'),
                        'currency' => $item['app_currency'],
                        'currency_text' => $item['app_currency_text'],
                        'app_aboutus' => $item['app_aboutus'],
                        'app_contact' => $item['app_contact'],
                        'app_website' => $item['app_website'],
                        'app_email' => $item['app_email'],
                        'duitku_status' => $item['duitku_status'],
                        'map_key' => $item['map_key']
                    );
                    $this->response($message, 200);
                }
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
    function konek_account_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $saldo = $this->driver->saldouser($dec_data->id);
        $point = $this->driver->poindriver($dec_data->id);
        $app_settings = $this->driver->get_settings();
        $getDataDriver = $this->driver->get_data_driver_sync($dec_data->id);
        
        $condition = array(
            'no_telepon' => $dec_data->no_telepon
        );
        $cek_login = $this->driver->get_data_pelanggan($condition);
        if ($cek_login->num_rows() > 0) {  
            foreach ($app_settings as $item) {
                $message = array(
                    'message' => 'success',
                    'driver_status' => $getDataDriver['data_driver']->row('status_config'),
                    'data_driver' => $getDataDriver['data_driver']->result(),
                    'totalharian' => $this->driver->totalpendapatanharian($dec_data->id),
                    'totaltrxharian' => count($this->driver->getdattrxharian($dec_data->id)),
                    'mode' => $item['mode'],
                    'saldo' => $saldo->row('saldo'),
                    'point' => $point->row('point')
                );
                $this->response($message, 200);
            }
        
        }else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 201);
        }
    }
    function turning_on_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $is_turn = $dec_data->is_turn;
        $dataEdit = array();
        if ($is_turn) {
            $dataEdit = array(
                'status' => 1
            );
            $upd_regid = $this->driver->edit_config($dataEdit, $dec_data->id);
            if ($upd_regid) {
                $message = array(
                    'message' => 'success',
                    'data' => '1'
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'message' => 'fail',
                    'data' => 'fail'
                );
                $this->response($message, 200);
            }
        } else {
            $dataEdit = array(
                'status' => 4
            );
            $upd_regid = $this->driver->edit_config($dataEdit, $dec_data->id);
            if ($upd_regid) {
                $message = array(
                    'message' => 'success',
                    'data' => '4'
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'message' => 'fail',
                    'data' => 'fail'
                );
                $this->response($message, 200);
            }
        }
    }
    function infoarea_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
         $data_req = array(
            'kota' => $dec_data->kota
        );

        $condition = array(
            'kota' => $dec_data->kota,
            'status' => '1'
        );
        $cek_kota = $this->driver->get_status_kota($condition);
        if ($cek_kota->num_rows() > 0) {
             $message = array(
                    'message' => 'success',
                    'data' => 'success'
                );
                $this->response($message, 200);
        } else {
            $message = array(
                'message' => 'unknown fail',
                'data' => 'canceled'
            );
            $this->response($message, 200);
        }
    }
    function accept_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $data_req = array(
            'id_driver' => $dec_data->id,
            'id_transaksi' => $dec_data->id_transaksi
        );

        $acc_req = $this->driver->accept_request($data_req);
        $datapelanggan = $this->driver->getdatapel($dec_data->id_transaksi);
        foreach ($datapelanggan as $item) {
            if ($acc_req['status']) {
                    $message = array(
                        'message' => 'berhasil',
                        'data' => 'berhasil',
                        'tokencs' => $item['token']
                    );
                    $this->response($message, 200);
            
            } else {
                if ($acc_req['data'] == 'canceled') {
                    $message = array(
                        'message' => 'canceled',
                        'data' => 'canceled'
                    );
                    $this->response($message, 200);
                } else {
                    $message = array(
                        'message' => 'unknown fail',
                        'data' => 'canceled'
                    );
                    $this->response($message, 200);
                }
            }
        }
    }

    function start_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $data_req = array(
            'id_driver' => $dec_data->id,
            'id_transaksi' => $dec_data->id_transaksi
        );

        $acc_req = $this->driver->start_request($data_req);
        if ($acc_req['status']) {
            $message = array(
                'message' => 'berhasil',
                'data' => 'success'
            );
            $this->response($message, 200);
        } else {
            if ($acc_req['data'] == 'canceled') {
                $message = array(
                    'message' => 'canceled',
                    'data' => 'canceled'
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'message' => 'unknown fail',
                    'data' => 'unknown fail'
                );
                $this->response($message, 200);
            }
        }
    }


    function finish_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $data_req = array(
            'id_driver' => $dec_data->id,
            'id_transaksi' => $dec_data->id_transaksi
        );

        $data_tr = array(
            'id_driver' => $dec_data->id,
            'id' => $dec_data->id_transaksi
        );

        $finish_transaksi = $this->driver->finish_request($data_req, $data_tr);
        if ($finish_transaksi) {
            $message = array(
                'message' => 'berhasil',
                'data' => 'berhasil',
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'message' => 'fail',
                'data' => $finish_transaksi['data']
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
        $gettrans = $this->driver->datatransaksi($dec_data->id);
        $gettranssend = $this->driver->datatransaksisend($dec_data->id);
        $getbiayaapp = $this->driver->getjasaappp($dec_data->id);
        $getverif = $this->driver->datatransaksimerchant($dec_data->id);
        $getdriver = $this->driver->get_data_pelangganid($dec_data->id_pelanggan);
        $getitem = $this->driver->detail_item($dec_data->id);
        $getitemjasa = $this->driver->detail_itemjasa($dec_data->id);
        foreach ($getverif as $item) {
            if ($getitem->num_rows() > 0) {
                $message = array(
                'status' => true,
                'data' => $gettrans->result(),
                'datasend' => $gettranssend->result(),
                'getjasa' => $getbiayaapp->result(),
                'verif' => $item['struk'],
                'pelanggan' => $getdriver->result(),
                'jasa' => $getitemjasa->result(),
                'item' => $getitem->result()
            );
            $this->response($message, 200);
        } else {
                $message = array(
                'status' => true,
                'data' => $gettrans->result(),
                'datasend' => $gettranssend->result(),
                'getjasa' => $getbiayaapp->result(),
                'verif' => $item['struk'],
                'pelanggan' => $getdriver->result(),
                'jasa' => $getitemjasa->result(),
                'item' => $getitem->result()
            );
            $this->response($message, 200);
        }
        }
    }

    function daftarpesanan_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getitem = $this->driver->detail_item($dec_data->id);
        $message = array(
            'data' => $getitem->result(),
            'message' => 'sukses'
        );
        $this->response($message, 200);
    }

    function verifycode_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $condition = array(
            'no_telepon' => $dec_data->no_telepon
        );
        $dataverify = array(
            'struk' => $dec_data->verifycode,
            'id_transaksi' => $dec_data->id_transaksi
        );
        $dataver = $this->driver->get_verify($dataverify);
        $cek_login = $this->driver->get_data_pelanggan($condition);
        if ($cek_login->num_rows() > 0 && $dataver->num_rows() > 0) {

            $message = array(
                'message' => 'success',
                'data' => '',
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'message' => 'fail',
                'data' => ''
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
        $check_exist_phone = $this->driver->check_exist_phone_edit($decoded_data->id, $decoded_data->no_telepon);
        $check_exist_email = $this->driver->check_exist_email_edit($decoded_data->id, $decoded_data->email);
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

            if ($decoded_data->fotodriver == null && $decoded_data->fotodriver_lama == null) {
                $datauser = array(
                    'nama_driver' => $decoded_data->fullnama,
                    'no_telepon' => $decoded_data->no_telepon,
                    'phone' => $decoded_data->phone,
                    'email' => $decoded_data->email,
                    'countrycode' => $decoded_data->countrycode,
                    'tgl_lahir' => $decoded_data->tgl_lahir
                );
            } else {
                $image = $decoded_data->fotodriver;
                $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
                $path = "images/fotodriver/" . $namafoto;
                file_put_contents($path, base64_decode($image));

                $foto = $decoded_data->fotodriver_lama;
                $path = "./images/fotodriver/$foto";
                unlink("$path");


                $datauser = array(
                    'nama_driver' => $decoded_data->fullnama,
                    'no_telepon' => $decoded_data->no_telepon,
                    'phone' => $decoded_data->phone,
                    'email' => $decoded_data->email,
                    'countrycode' => $decoded_data->countrycode,
                    'foto' => $namafoto,
                    'tgl_lahir' => $decoded_data->tgl_lahir
                );
            }


            $cek_login = $this->driver->get_data_pelanggan($condition2);
            if ($cek_login->num_rows() > 0) {
                $upd_user = $this->driver->edit_profile($datauser, $decoded_data->no_telepon_lama);
                $getdata = $this->driver->get_data_pelanggan($condition);
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

    function edit_kendaraan_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $condition = array(
            'id' => $decoded_data->id,
            'no_telepon' => $decoded_data->no_telepon
        );

        $datakendaraan = array(
            'merek' => $decoded_data->merek,
            'tipe' => $decoded_data->tipe,
            'nomor_kendaraan' => $decoded_data->no_kendaraan,
            'warna' => $decoded_data->warna
        );



        $cek_login = $this->driver->get_data_pelanggan($condition);
        if ($cek_login->num_rows() > 0) {
            $upd_user = $this->driver->edit_kendaraan($datakendaraan, $decoded_data->id_kendaraan);
            $getdata = $this->driver->get_data_pelanggan($condition);
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
        $cek_login = $this->driver->get_data_pelanggan($condition);
        $message = array();

        if ($cek_login->num_rows() > 0) {
            $upd_regid = $this->driver->edit_profile($reg_id, $decoded_data->no_telepon);
            $get_pelanggan = $this->driver->get_data_pelanggan($condition2);

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

    function history_progress_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getWallet = $this->driver->all_transaksi($decoded_data->id);
        $message = array(
            'status' => true,
            'message' => 'sukses',
            'data' => $getWallet->result()
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
        $cek_login = $this->driver->get_data_pelanggan($condition);
        $app_settings = $this->driver->get_settings();
        $token = sha1(rand(0, 999999) . time());


        if ($cek_login->num_rows() > 0) {
            $cheker = array('msg' => $cek_login->result());
            foreach ($app_settings as $item) {
                foreach ($cheker['msg'] as $item2 => $val) {
                    $dataforgot = array(
                        'userid' => $val->id,
                        'token' => $token,
                        'idKey' => '2'
                    );
                }


                $forgot = $this->driver->dataforgot($dataforgot);

                $linkbtn = base_url() . 'resetpass/rest/' . $token . '/2';
                $template = $this->driver->template1($item['email_subject'], $item['email_text1'], $item['email_text2'], $item['app_website'], $item['app_name'], $linkbtn, $item['app_linkgoogle'], $item['app_address']);
                $sendmail = $this->driver->emailsend($item['email_subject'] . " [ticket-" . rand(0, 999999) . "]", $decoded_data->email, $template, $item['smtp_host'], $item['smtp_port'], $item['smtp_username'], $item['smtp_password'], $item['smtp_from'], $item['app_name'], $item['smtp_secure']);
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

   //-------------------------------- register ----------------------------------------------
   function register_driver_post(){
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        return false;
    }
    $data = file_get_contents("php://input");
    $dec_data = json_decode($data);
    $email = $dec_data->email;
    $phone = $dec_data->no_telepon;
    $check_exist = $this->driver->check_exist($email, $phone);
    $check_exist_phone = $this->driver->check_exist_phone($phone);
    $check_exist_email = $this->driver->check_exist_email($email);
    $check_exist_sim = $this->driver->check_sim($dec_data->id_sim);
    $check_exist_ktp = $this->driver->check_ktp($dec_data->no_ktp);
    if ($check_exist) {
        $message = array(
            'code' => '201',
            'message' => 'email and phone number already exist',
            'data' => ''
        );
        $this->response($message, 201);
    } else if ($check_exist_phone) {
        $message = array(
            'code' => '201',
            'message' => 'phone already exist',
            'data' => ''
        );
        $this->response($message, 201);
    } else if ($check_exist_sim) {
        $message = array(
            'code' => '201',
            'message' => 'Driver license already exist',
            'data' => ''
        );
        $this->response($message, 201);
    } else if ($check_exist_ktp) {
        $message = array(
            'code' => '201',
            'message' => 'ID Card already exist',
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
    }else{
        if ($dec_data->checked == "true"){
            $image = $dec_data->foto;
            $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
            $digits = 3;
            $ids = str_pad(rand(0, pow(5, $digits)-1), $digits, '0', STR_PAD_LEFT);
            $path = "images/fotodriver/" . $namafoto;
            $newid = time() + $ids;
            file_put_contents($path, base64_decode($image));
            $data_signup = array(
                'id' => 'D' . $newid,
                'nama_driver' => $dec_data->nama_driver,
                'no_ktp' => $dec_data->no_ktp,
                'tgl_lahir' => $dec_data->tgl_lahir,
                'no_telepon' => $dec_data->no_telepon,
                'phone' => $dec_data->phone,
                'email' => $dec_data->email,
                'foto' => $namafoto,
                'password' => sha1($dec_data->password),
                'job' => $dec_data->job,
                'countrycode' => $dec_data->countrycode,
                'gender' => $dec_data->gender,
                'kota' => $dec_data->kota,
                'alamat_driver' => $dec_data->alamat_driver,
                'reg_id' => 12345,
                'status' => 0,
                'prioritas' => 0,
            );
            $data_kendaraan = array(
                'merek' => $dec_data->merek,
                'tipe' => $dec_data->tipe,
                'nomor_kendaraan' => $dec_data->nomor_kendaraan,
                'warna' => $dec_data->warna
            );

            $imagektp = $dec_data->foto_ktp;
            $namafotoktp = time() . '-' . rand(0, 99999) . ".jpg";
            $pathktp = "images/fotoberkas/ktp/" . $namafotoktp;
            file_put_contents($pathktp, base64_decode($imagektp));

            $imagesim = $dec_data->foto_sim;
            $namafotosim = time() . '-' . rand(0, 99999) . ".jpg";
            $pathsim = "images/fotoberkas/sim/" . $namafotosim;
            file_put_contents($pathsim, base64_decode($imagesim));

            $data_berkas = array(
                'foto_ktp' => $namafotoktp,
                'foto_sim' => $namafotosim,
                'id_sim' => $dec_data->id_sim
            );


            $signup = $this->driver->signup($data_signup, $data_kendaraan, $data_berkas);
            if ($signup) {
                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'data' => 'register has been succesed!'
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
        } else {
            $image = $dec_data->foto;
            $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
            $path = "images/fotodriver/" . $namafoto;
            file_put_contents($path, base64_decode($image));
            $digits = 3;
            $ids = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
            $newid = time() + $ids;
            $data_signup = array(
                'id' => 'D' . $newid,
                'nama_driver' => $dec_data->nama_driver,
                'no_ktp' => $dec_data->no_ktp,
                'tgl_lahir' => $dec_data->tgl_lahir,
                'no_telepon' => $dec_data->no_telepon,
                'phone' => $dec_data->phone,
                'email' => $dec_data->email,
                'foto' => $namafoto,
                'password' => sha1($dec_data->password),
                'job' => $dec_data->job,
                'countrycode' => $dec_data->countrycode,
                'gender' => $dec_data->gender,
                'kota' => $dec_data->kota,
                'alamat_driver' => $dec_data->alamat_driver,
                'reg_id' => 12345,
                'status' => 0,
                'prioritas' => 0
            );

            $data_kendaraan = array(
                'merek' => $dec_data->merek,
                'tipe' => $dec_data->tipe,
                'nomor_kendaraan' => $dec_data->nomor_kendaraan,
                'warna' => $dec_data->warna
            );

            $imagektp = $dec_data->foto_ktp;
            $namafotoktp = time() . '-' . rand(0, 99999) . ".jpg";
            $pathktp = "images/fotoberkas/ktp/" . $namafotoktp;
            file_put_contents($pathktp, base64_decode($imagektp));

            $imagesim = $dec_data->foto_sim;
            $namafotosim = time() . '-' . rand(0, 99999) . ".jpg";
            $pathsim = "images/fotoberkas/sim/" . $namafotosim;
            file_put_contents($pathsim, base64_decode($imagesim));

            $data_berkas = array(
                'foto_ktp' => $namafotoktp,
                'foto_sim' => $namafotosim,
                'id_sim' => $dec_data->id_sim
            );


            $signup = $this->driver->signup($data_signup, $data_kendaraan, $data_berkas);
            if ($signup) {
                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'data' => 'register has been succesed!'
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
//----------------------------------------------------------------------------------------

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
        $saldolama = $this->driver->saldouser($iduser);
        $numberreff = rand ( 10000 , 99999 );
        $datawithdraw = array(
            'id_user' => $iduser,
            'rekening' => $card,
            'bank' => $bank,
            'nama_pemilik' => $nama,
            'type' => $dec_data->type,
            'jumlah' => $amount,
            'reff' => $numberreff,
            'status' => 0
        );
        $check_exist = $this->driver->check_exist($email, $phone);

        if ($dec_data->type ==  "topup") {
            $withdrawdata = $this->driver->insertwallet($datawithdraw);
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => []
            );
            $this->response($message, 200);
        } else {

            if ($saldolama->row('saldo') >= $amount && $check_exist) {
                $withdrawdata = $this->driver->insertwallet($datawithdraw);

                $message = array(
                    'code' => '200',
                    'message' => 'success'
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '201',
                    'message' => 'You have insufficient balance'
                );
                $this->response($message, 200);
            }
        }
    }
     public function midtrans_post()
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
            $datatopup = array(
                'id_user' => $iduser,
                'rekening' => $card,
                'bank' => $bank,
                'nama_pemilik' => $nama,
                'type' => 'topup',
                'jumlah' => $amount,
                'reff' => 'Order'.$numberreff,
                'status' => 1
            );
            $check_exist = $this->driver->check_exist($email, $phone);
            if ($check_exist) {
                $this->driver->insertwallet($datatopup);
                $saldolama = $this->driver->saldouser($iduser);
                $saldobaru = $saldolama->row('saldo') + $amount;
                $saldo = array('saldo' => $saldobaru);
                $this->driver->tambahsaldo($iduser, $saldo);
    
                $message = array(
                    'code' => '200',
                    'message' => 'success'
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '201',
                    'message' => 'You have insufficient balance'
                );
                $this->response($message, 200);
            }
        }
        public function tripay_post()
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
            $datatopup = array(
                'id_user' => $iduser,
                'rekening' => $card,
                'bank' => $bank,
                'nama_pemilik' => $nama,
                'type' => 'topup',
                'jumlah' => $amount,
                'status' => 1
            );
            $check_exist = $this->driver->check_exist($email, $phone);
            if ($check_exist) {
                $this->driver->insertwallet($datatopup);
                $saldolama = $this->driver->saldouser($iduser);
                $saldobaru = $saldolama->row('saldo') + $amount;
                $saldo = array('saldo' => $saldobaru);
                $this->driver->tambahsaldo($iduser, $saldo);
    
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

   
    function liat_lokasi_driver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getLoc = $this->driver->get_driver_location($dec_data->id);
        $message = array(
            'status' => true,
            'data' => $getLoc->result()
        );
        $this->response($message, 200);
    }
    function update_token_post()
   {
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            $data = file_get_contents("php://input");
            $decoded_data = json_decode($data);
            $data = array(
                'reg_id' => $decoded_data->reg_id,
                'id' => $decoded_data->id
            );
            $ins = $this->driver->my_token($data);
            $message = array(
                    'message' => 'token updated',
                    'data' => 'sukses'
                );
            $this->response($message, 200);
   }
    function listarea_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $kodepromo = $this->driver->data_area()->result();
        $message = array(
            'code' => '200',
            'message' => 'success',
            'data' => $kodepromo
        );
        $this->response($message, 200);
    }
    function liat_area_driver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getLoc = $this->driver->get_driver_area($dec_data->kota);
        $message = array(
            'status' => true,
            'data' => $getLoc->result()
        );
        $this->response($message, 200);
    }
    function perbarui_lokasi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'id_driver' => $decoded_data->id_driver,
            'latitude' => $decoded_data->latitude,
            'longitude' => $decoded_data->longitude,
            'bearing' => $decoded_data->bearing
        );
        $ins = $this->driver->lokasiku($data);

        if ($ins) {
            $message = array(
                'message' => 'lokasi updated',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function list_saldo_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getLoc = $this->driver->get_list_saldo($dec_data->id);
        $message = array(
            'message' => 'sukses',
            'status' => true,
            'data' => $getLoc->result()
        );
        $this->response($message, 200);
    }
    
    function cekpoin_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getLoc = $this->driver->poindriver($dec_data->id);
        $message = array(
            'message' => 'sukses',
            'status' => true,
            'data' => $getLoc->result()
        );
        $this->response($message, 200);
    }
    function banner_app_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $banner = $this->driver->list_slider()->result();
        $message = array(
            'code' => '200',
            'message' => 'found',
            'data' => $banner
        );
        $this->response($message, 200);
    }
     function perbaruilokasi_post()
    {
       if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
         $data_lokasi = array(
                'id_driver' => $dec_data->id_driver,
                'latitude' => $dec_data->latitude,
                'longitude' => $dec_data->longitude,
                'bearing' => $dec_data->bearing
            );

        $finish_lokasi = $this->driver->perbarui_lokasi($data_lokasi);

        if ($finish_lokasi) {
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
    function point_app_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $point = $this->driver->list_point()->result();
        $message = array(
            'code' => '200',
            'message' => 'found',
            'data' => $point
        );
        $this->response($message, 200);
    }
    public function redeem_poin_post()
        {
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
    
            $data = file_get_contents("php://input");
            $dec_data = json_decode($data);
            $iduser = $dec_data->id;
            $nama = $dec_data->nama;
            $poin = $dec_data->poin;
            $nominal = $dec_data->nominal;
            $tanggal = $dec_data->tanggal;
            $dataredeem = array(
                'iduser' => $iduser,
                'nama' => $nama,
                'poin' => $poin,
                'nominal' => $nominal,
                'tanggal' => $tanggal);
            $datawithdraw = array(
            'id_user' => $iduser,
            'rekening' => 'admin',
            'bank' => 'admin',
            'nama_pemilik' => $nama,
            'type' => 'redeem',
            'jumlah' => $nominal,
            'status' => 1);
                $this->driver->redeempoin($dataredeem);
                $saldolama = $this->driver->saldouser($iduser);
                $poinlama = $this->driver->poinuser($iduser);
                $saldobaru = $saldolama->row('saldo') + $nominal;
                $poinbaru = $poinlama->row('point') - $poin;
                $saldo = array('saldo' => $saldobaru);
                $minpoin = array('point' => $poinbaru);
                $this->driver->tambahsaldo($iduser, $saldo);
                $this->driver->kurangipoin($iduser, $minpoin);
                $withdrawdata = $this->driver->insertwallet($datawithdraw);
                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'data' => []
                );
                $this->response($message, 200);
        }
    function ikonmap_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getLoc = $this->driver->list_ikon($dec_data->id);
        $message = array(
            'message' => 'sukses',
            'status' => true,
            'data' => $getLoc->result()
        );
        $this->response($message, 200);
    }
    function komisi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getLoc = $this->driver->cek_komisi($dec_data->id);
        $message = array(
            'message' => 'sukses',
            'status' => true,
            'data' => $getLoc->result()
        );
        $this->response($message, 200);
    }
    function loadmenu_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $getLoc = $this->driver->list_menu($dec_data->id);
        $message = array(
            'message' => 'sukses',
            'status' => true,
            'data' => $getLoc->result()
        );
        $this->response($message, 200);
    }
    function update_proses_post()
    {
       if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $data_lokasi = array(
                'id_driver' => $dec_data->id_driver,
                'status' => $dec_data->status
            );

        $finish_lokasi = $this->driver->save_status($data_lokasi);

        if ($finish_lokasi) {
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
    function update_menu_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'id_item' => $decoded_data->id_item,
            'id_transaksi' => $decoded_data->id_transaksi,
            'jumlah_item' => $decoded_data->jumlah_item,
            'total_harga' => $decoded_data->total_harga
        );
        $ins = $this->driver->data_menu($data);

        if ($ins) {
            $message = array(
                'message' => 'success',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function update_harga_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'id_transaksi' => $decoded_data->id_transaksi,
            'total_biaya' => $decoded_data->total_biaya
        );
        $ins = $this->driver->data_harga($data);

        if ($ins) {
            $message = array(
                'message' => 'success',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function update_harga_total_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'id' => $decoded_data->id,
            'biaya_akhir' => $decoded_data->biaya_akhir
        );
        $ins = $this->driver->updatetotal($data);

        if ($ins) {
            $message = array(
                'message' => 'success',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function delete_menu_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
         $condition = array(
            'no_telepon' => $dec_data->no_telepon
        );
        $cek_login = $this->driver->get_data_driver($condition);
        $this->driver->deletemenu($dec_data->id_item,$dec_data->id_transaksi);
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
    function update_status_home_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'id_driver' => $decoded_data->id_driver,
            'status' => $decoded_data->status
        );
        $ins = $this->driver->updatestatushome($data);

        if ($ins) {
            $message = array(
                'message' => 'success',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function cek_login_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getdata = $this->driver->ceklogin($decoded_data->id);
        $message = array(
            'status' => true,
            'message' => 'found',
            'data' => $getdata->result()
        );
        $this->response($message, 200);
    }
    function update_login_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'islogin' => $decoded_data->islogin,
            'id' => $decoded_data->id
        );
        $ins = $this->driver->updatelogin($data);

        if ($ins) {
            $message = array(
                'message' => 'login updated',
                'data' => []
            );
            $this->response($message, 200);
        }
    }
    function cek_pin_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getdata = $this->driver->cekpin($decoded_data->id);
        $message = array(
            'status' => true,
            'message' => 'found',
            'data' => $getdata->result()
        );
        $this->response($message, 200);
    }
     function cek_status_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $getdata = $this->driver->cekstatus($decoded_data->id);
        $message = array(
            'status' => true,
            'message' => 'found',
            'data' => $getdata->result()
        );
        $this->response($message, 200);
    }
    //--------------------------- whatsapp otp ---------------------------------------
    function whatsappotp_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $iduser = $decoded_data->id;
        $kode = $decoded_data->kode;
        $nohp = $decoded_data->nohp;

        $datasetting = $this->driver->datasetting()->row();
        $urlapi = $datasetting->whatsappserver;
        $apikey = $datasetting->whatsappapi;
        $apinumber = $datasetting->whatsappnumber;
        $nameapp = $datasetting->app_name;
    
        
        $dataparam = [
            'api_key' => $apikey,
            'sender' => $apinumber,
            'number' => $nohp,
            'message' => 'Kode OTP ' . $nameapp . ' Kamu Adalah : ' . $kode
        ];
        
        $header = [
            'accept: application/json',
            'content-type: application/json'
        ];   
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $urlapi);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION , true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataparam));
        $result = curl_exec($ch); 

        $data_otp = array(
            'otp' => $kode
        );

        $finish_lokasi = $this->driver->update_otp($iduser,$data_otp);

        if ($finish_lokasi) {
            $message = array(
                'message' => 'success'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'message' => 'fail'
            );
            $this->response($message, 200);
        }
        curl_close($ch);   
    }
    function getotp_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $iduser = $decoded_data->id;
        $otpkode = $this->driver->get_otpkode($iduser);
        $message = array(
            'code' => '200',
            'message' => 'sukses',
            'data' => json_encode($otpkode)
        );
        $this->response($message, 200);
    }
    //--------------------- Detain Profil --------------------------------
    function getakun_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $iduser = $decoded_data->id;
        $cek_login = $this->driver->get_dataprofil($iduser);
        if ($cek_login->num_rows() > 0) {
                $get_pelanggan = $this->driver->get_dataprofil($iduser);
                $message = array(
                    'code' => '200',
                    'message' => 'sukses',
                    'data' => $get_pelanggan->result()
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '404',
                    'message' => 'Data Tidak Ditemukan',
                    'data' => []
                );
                $this->response($message, 200);
        }
    }
    //------------------------------------------- Chat ---------------------------------------------
    function chatapp_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
       
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $datachat = $this->driver->osdatachat($decoded_data->idtrans);
        $datadriver = $this->pelanggan->ostokendriver($decoded_data->iddriver);
        $datapelanggan = $this->driver->ostokenpelanggan($decoded_data->idpelanggan);
        $devicedriver = $datadriver->row('ostoken');
        $devicepelanggan = $datapelanggan->row('ostoken');
        $datasetting = $this->app->appsetting()->row();
        $dataapp = $this->app->getappbyid();
        $valmode = $datasetting->mode;

        #var foto
        $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
       
        if($decoded_data->fotochat == "0"){
            $path = "images/vector/chat_vector.jpg";
            $datachat = array(
                'idtrans' => $decoded_data->idtrans,
                'idcust' => $decoded_data->idpelanggan,
                'iddriver' => $decoded_data->iddriver,
                'pesan' => $decoded_data->pesan,
                'fotochat' => '0',
                'level' => '1',
                'tanggal' => date('d-m-Y'),
                'jam' => date('H:i:s')
            );
        }else{
            $path = "images/chat/" . $namafoto;
            file_put_contents($path, base64_decode($decoded_data->fotochat));
            $datachat = array(
                'idtrans' => $decoded_data->idtrans,
                'idcust' => $decoded_data->idpelanggan,
                'iddriver' => $decoded_data->iddriver,
                'pesan' => $decoded_data->pesan,
                'fotochat' => $namafoto,
                'level' => '1',
                'tanggal' => date('d-m-Y'),
                'jam' => date('H:i:s')
            );
        }
        $this->driver->insertchat($datachat,$namafoto);
        if($valmode == 'Onesignal'){
            $client = new \GuzzleHttp\Client();
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
                'include_player_ids' => [$devicepelanggan],
                'data' => array(
                    "id" => $decoded_data->idtrans,
                    "id_transaksi" => $decoded_data->idtrans,
                    "idpelanggan" => $decoded_data->idpelanggan,
                    "iddriver" => $decoded_data->iddriver,
                    "pesan" => $decoded_data->pesan,
                    "foto" => $datadriver->row('foto'),
                    "nama" => $datadriver->row('nama_driver'),
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

        $message = array(
            'message' => 'Sukses',
            'data' =>[]
        );
        $this->response($message, 200);
    }
    //------------------------------- Chat merchant -----------------------------------------
    function chatmerchant_post()
    {
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }
            $client = new \GuzzleHttp\Client();
            $data = file_get_contents("php://input");
            $decoded_data = json_decode($data);
            $datachat = $this->driver->osdatachat($decoded_data->idtrans);
            $datadriver = $this->pelanggan->ostokendriver($decoded_data->iddriver);
            $datamerchant= $this->driver->ostokenmerchant($decoded_data->idmerchant);
            $devicedriver = $datadriver->row('ostoken');
            $devicemerchant = $datamerchant->row('ostoken');
            $datasetting = $this->app->appsetting()->row();
            $valmode = $datasetting->mode;
            $dataapp = $this->app->getappbyid();
            $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
            //send notifikasi
     
            //end send
            if($decoded_data->fotochat == "0"){
                $datachat = array(
                    'idtrans' => $decoded_data->idtrans,
                    'idmerc' => $decoded_data->idmerchant,
                    'iddriver' => $decoded_data->iddriver,
                    'pesan' => $decoded_data->pesan,
                    'fotochat' => '0',
                    'level' => '1',
                    'tanggal' => date('d-m-Y'),
                    'jam' => date('H:i:s')
                );
                if($valmode == 'Onesignal'){
                    $fields = array(
                        'app_id' => $dataapp['os_appid'],
                        'contents' => array("en" => $decoded_data->pesan),
                        'headings' => array("en"=>$decoded_data->title),
                        // 'included_segments' => array('All'),
                        'target_channel' => 'push',
                        'template_id' => $dataapp['os_template_chat'],
                        'android_sound' => 'pesan',
                        'collapse_id' => '1',
                        'android_channel_id' => $dataapp['os_channel_chat'],
                        'existing_android_channel_id' => $dataapp['os_channel_chat'],
                        'include_player_ids' => [$devicemerchant],
                        'data' => array(
                            "id" => $decoded_data->idtrans,
                            "id_transaksi" => $decoded_data->idtrans,
                            "idpelanggan" => $decoded_data->idmerchant,
                            "iddriver" => $decoded_data->iddriver,
                            "pesan" => $decoded_data->pesan,
                            "foto" => $datadriver->row('foto'),
                            "nama" => $datadriver->row('nama_driver'),
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
            }else{
                $path = "images/chat/" . $namafoto;
                file_put_contents($path, base64_decode($decoded_data->fotochat));
                $datachat = array(
                    'idtrans' => $decoded_data->idtrans,
                    'idmerc' => $decoded_data->idmerchant,
                    'iddriver' => $decoded_data->iddriver,
                    'pesan' => $decoded_data->pesan,
                    'fotochat' => $namafoto,
                    'level' => '1',
                    'tanggal' => date('d-m-Y'),
                    'jam' => date('H:i:s')
                );
                if($valmode == 'Onesignal'){
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
                        'include_player_ids' => [$devicemerchant],
                        'data' => array(
                            "id" => $decoded_data->idtrans,
                            "id_transaksi" => $decoded_data->idtrans,
                            "idpelanggan" => $decoded_data->idmerchant,
                            "iddriver" => $decoded_data->iddriver,
                            "pesan" => $decoded_data->pesan,
                            "foto" => $datadriver->row('foto'),
                            "nama" => $datadriver->row('nama_driver'),
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
            }
            $this->driver->insertchatmerchant($datachat,$decoded_data->fotochat,$namafoto);
            $message = array(
                'message' => 'Sukses'
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
                    'level' => '1',
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
                    'level' => '1',
                    'tanggal' => date('d-m-Y'),
                    'jam' => date('H:i:s')
                );
            }
            
            $this->driver->insertchat($datachat,$decoded_data->fotochat,$namafoto);
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

        $datachat = $this->driver->datachat($decoded_data->idtrans);
        $message = array(
            'message' => 'sukses',
            'data' => $datachat
        );
        $this->response($message, 200);
   }
   
    function getchatmerchant_post(){

        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $datachat = $this->driver->datachatmerchant($decoded_data->idtrans);
        $message = array(
            'message' => 'sukses',
            'data' => $datachat
        );
        $this->response($message, 200);
    }
   //notif
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
        $idpel = $decoded_data->idpelanggan;
        $username = $decoded_data->nama;
        $foto = $decoded_data->foto;
        $datapelanggan = $this->driver->tokenpelanggan($idpel);
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
            "token" =>$datapelanggan->row('token'),
            "type" =>$decoded_data->type
        ];
    
        $fcmNotification = [
            'to'        => $datapelanggan->row('token'),
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
   function device_notif_post()
   {
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                return false;
            }

            $data = file_get_contents("php://input");
            $decoded_data = json_decode($data);
            $datasetting = $this->driver->datasetting()->row();
            $serverkey = $datasetting->fcm_key;
            
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
                    'message' => 'sukses'
            );
            $this->response($message, 200);
            curl_close($ch);
   }
   function update_expire_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $data = array(
            'expire' => $decoded_data->expire,
            'id' => $decoded_data->id
        );
        $ins = $this->driver->updateexpire($data);

        if ($ins) {
            $message = array(
                'message' => 'sukses'
            );
            $this->response($message, 200);
        }
    }
    function normalstatus_order_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
       
         // normal status
         $ins = $this->driver->rejectstatusnol($decoded_data->id);
         if ($ins) {
             $message = array(
                 'message' => 'Reject Orderan Normal'
             );
             $this->response($message, 200);
         }
    }
    function reject_order_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
       
        // rejek status.
        $this->driver->rejectstatussatu($decoded_data->id); 
        sleep(60);
        flush();
         // normal status
         $ins = $this->driver->rejectstatusnol($decoded_data->id);
         if ($ins) {
             $message = array(
                 'message' => 'Reject Orderan Normal'
             );
             $this->response($message, 200);
         }
    }
    //----------------------- waiting order ----------------------------
    function detail_newtransaksi_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $long = $dec_data->longitude;
        $lat = $dec_data->latitude;
        $gettrans = $this->driver->datawaittransaksi($lat,$long);
        $getdriver = $this->driver->get_data_pelangganid($dec_data->id_pelanggan);
        // Print current time
        /*$message = array(
            'status' => true,
            'message' => 'Sukses',
            'data' => $gettrans->result(),
            'pelanggan' => $getdriver->result()
        );
        $this->response($message, 200);*/
       
        //sleep for 3 seconds
        $message = array(
            'status' => true,
            'message' => 'fungsi 1 '. date('h:i:s'),
            'data' => $gettrans->result(),
            'pelanggan' => $getdriver->result()
        );
        $this->response($message, 200);
    }
    public function onwithdraw_post(){
        $secretKey      = 'de56f832487bc1ce1de5ff2cfacf8d9486c61da69df6fd61d5537b6b7d6d354d'; 
        $userId         =  3551; 
        $email          = 'test@chakratechnology.com';
        $timestamp      = round(microtime(true) * 1000); 
        $paramSignature = $email . $timestamp . $secretKey; 
    
        $signature      = hash('sha256', $paramSignature);
    
        $params = array(
            'userId'    => $userId,
            'email'     => $email,
            'timestamp' => $timestamp,
            'signature' => $signature
        );
    
        $params_string = json_encode($params);
        $url = 'https://sandbox.duitku.com/webapi/api/disbursement/listBank'; // Sandbox
        // $url = 'https://passport.duitku.com/webapi/api/disbursement/listBank'; // Production
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
    
        if($httpCode == 200)
        {
            header('Content-Type: application/json');
            $return = json_encode(json_decode($request), JSON_PRETTY_PRINT);
            $message = array(
                'message' => 'sukses',
                'result' => $return,
                'data' =>  []
            );
            $this->response($message, 200);
        }
        else
        $message = array(
            'message' => 'gagal',
            'result' =>   $httpCode,
            'data' =>  []
        );
        $this->response($message, 200);
    }
    function upgrade_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $dataupgrade = array(
            'iddriver' => $dec_data->id,
            'nama' => $dec_data->nama,
            'tanggal' => date('Y-m-d H:i:s'),
            'status' => '0'
        );
        $check_exist = $this->driver->checkexsupg($dec_data->id);
        if ($check_exist) {
            $message = array(
                'message' => 'gagal'
            );
            $this->response($message, 200);
        } else {
            $this->driver->insertupgrade($dataupgrade);
            $message = array(
                'message' => 'sukses'
            );
            $this->response($message, 200);
        }
        
    }
    function finddriver_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
  
         $datadriver = $this->driver->get_dataprofilbyphone($decoded_data->id);
         $message = array(
            'data' => $datadriver->result(),
            'message' => 'Sukses'
        );
        $this->response($message, 200);
    }
    function transfersaldo_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);
        $datavalue = array(
            'id_driver' => $decoded_data->id,
            'id_tujuan' => $decoded_data->idtujuan,
            'jumlah' => $decoded_data->nominal,
            'nama_driver' => $decoded_data->nama_driver,
            'nama_tujuan' => $decoded_data->nama_tujuan
        );
         $finishTransfer = $this->driver->transfersaldo_driver($datavalue);
         $message = array(
            'message' =>  $finishTransfer['pesan']
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
        $getdata = $this->driver->updateostoken($ostoken,$decoded_data->id);
        $message = array(
            'message' => 'success'
        );
        $this->response($message, 200);
    }
    //-------------------------- respon notifikasi --------------------------------
    function notifnesignal_post(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $datapelanggan = $this->driver->ostokenpelanggan($dec_data->id);
        $deviceid = $datapelanggan->row('ostoken');
        $datasetting = $this->app->appsetting()->row();
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
            'android_channel_id' => $dataapp['os_channel'],
            'existing_android_channel_id' => $dataapp['os_channel'],
            'include_player_ids' => [$deviceid],
            'data' => array(
                "id_transaksi" => $dec_data->idtransaksi,
                "id_driver" => $dec_data->iddriver,
                "type" => $dec_data->type,
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
}
