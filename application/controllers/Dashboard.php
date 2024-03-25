<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
    
        $this->load->model('Appsettings', 'app');
        $this->load->model('Admin_dashboard', 'dashboard');
        $this->load->model('User_dashboard', 'user');
        $this->load->model('Driver_dashboard', 'driver');
        $this->load->model('Api_driver','apidriver');
        $this->load->model('Notifikasi', 'notif');
    }


	function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['jan1'] = $this->dashboard->getTotalTransaksiBulanan(1, date('Y'), 1);
        $data['feb1'] = $this->dashboard->getTotalTransaksiBulanan(2, date('Y'), 1);
        $data['mar1'] = $this->dashboard->getTotalTransaksiBulanan(3, date('Y'), 1);
        $data['apr1'] = $this->dashboard->getTotalTransaksiBulanan(4, date('Y'), 1);
        $data['mei1'] = $this->dashboard->getTotalTransaksiBulanan(5, date('Y'), 1);
        $data['jun1'] = $this->dashboard->getTotalTransaksiBulanan(6, date('Y'), 1);
        $data['jul1'] = $this->dashboard->getTotalTransaksiBulanan(7, date('Y'), 1);
        $data['aug1'] = $this->dashboard->getTotalTransaksiBulanan(8, date('Y'), 1);
        $data['sep1'] = $this->dashboard->getTotalTransaksiBulanan(9, date('Y'), 1);
        $data['okt1'] = $this->dashboard->getTotalTransaksiBulanan(10, date('Y'), 1);
        $data['nov1'] = $this->dashboard->getTotalTransaksiBulanan(11, date('Y'), 1);
        $data['des1'] = $this->dashboard->getTotalTransaksiBulanan(12, date('Y'), 1);

        $data['jan2'] = $this->dashboard->getTotalTransaksiBulanan(1, date('Y'), 2);
        $data['feb2'] = $this->dashboard->getTotalTransaksiBulanan(2, date('Y'), 2);
        $data['mar2'] = $this->dashboard->getTotalTransaksiBulanan(3, date('Y'), 2);
        $data['apr2'] = $this->dashboard->getTotalTransaksiBulanan(4, date('Y'), 2);
        $data['mei2'] = $this->dashboard->getTotalTransaksiBulanan(5, date('Y'), 2);
        $data['jun2'] = $this->dashboard->getTotalTransaksiBulanan(6, date('Y'), 2);
        $data['jul2'] = $this->dashboard->getTotalTransaksiBulanan(7, date('Y'), 2);
        $data['aug2'] = $this->dashboard->getTotalTransaksiBulanan(8, date('Y'), 2);
        $data['sep2'] = $this->dashboard->getTotalTransaksiBulanan(9, date('Y'), 2);
        $data['okt2'] = $this->dashboard->getTotalTransaksiBulanan(10, date('Y'), 2);
        $data['nov2'] = $this->dashboard->getTotalTransaksiBulanan(11, date('Y'), 2);
        $data['des2'] = $this->dashboard->getTotalTransaksiBulanan(12, date('Y'), 2);

        $data['jan3'] = $this->dashboard->getTotalTransaksiBulanan(1, date('Y'), 3);
        $data['feb3'] = $this->dashboard->getTotalTransaksiBulanan(2, date('Y'), 3);
        $data['mar3'] = $this->dashboard->getTotalTransaksiBulanan(3, date('Y'), 3);
        $data['apr3'] = $this->dashboard->getTotalTransaksiBulanan(4, date('Y'), 3);
        $data['mei3'] = $this->dashboard->getTotalTransaksiBulanan(5, date('Y'), 3);
        $data['jun3'] = $this->dashboard->getTotalTransaksiBulanan(6, date('Y'), 3);
        $data['jul3'] = $this->dashboard->getTotalTransaksiBulanan(7, date('Y'), 3);
        $data['aug3'] = $this->dashboard->getTotalTransaksiBulanan(8, date('Y'), 3);
        $data['sep3'] = $this->dashboard->getTotalTransaksiBulanan(9, date('Y'), 3);
        $data['okt3'] = $this->dashboard->getTotalTransaksiBulanan(10, date('Y'), 3);
        $data['nov3'] = $this->dashboard->getTotalTransaksiBulanan(11, date('Y'), 3);
        $data['des3'] = $this->dashboard->getTotalTransaksiBulanan(12, date('Y'), 3);

        $data['jan4'] = $this->dashboard->getTotalTransaksiBulanan(1, date('Y'), 4);
        $data['feb4'] = $this->dashboard->getTotalTransaksiBulanan(2, date('Y'), 4);
        $data['mar4'] = $this->dashboard->getTotalTransaksiBulanan(3, date('Y'), 4);
        $data['apr4'] = $this->dashboard->getTotalTransaksiBulanan(4, date('Y'), 4);
        $data['mei4'] = $this->dashboard->getTotalTransaksiBulanan(5, date('Y'), 4);
        $data['jun4'] = $this->dashboard->getTotalTransaksiBulanan(6, date('Y'), 4);
        $data['jul4'] = $this->dashboard->getTotalTransaksiBulanan(7, date('Y'), 4);
        $data['aug4'] = $this->dashboard->getTotalTransaksiBulanan(8, date('Y'), 4);
        $data['sep4'] = $this->dashboard->getTotalTransaksiBulanan(9, date('Y'), 4);
        $data['okt4'] = $this->dashboard->getTotalTransaksiBulanan(10, date('Y'), 4);
        $data['nov4'] = $this->dashboard->getTotalTransaksiBulanan(11, date('Y'), 4);
        $data['des4'] = $this->dashboard->getTotalTransaksiBulanan(12, date('Y'), 4);

        $data['pendapatan_harian']         = $this->dashboard->pendapatan_harian();
        $data['pendapatan_bulanan']         = $this->dashboard->pendapatan_bulanan();
        $data['pendapatan_tahunan']         = $this->dashboard->pendapatan_tahunan();
        $data['pendapatan_aplikasi']         = $this->dashboard->pendapatan_aplikasi();

        $data['harian']         = $this->dashboard->getbydate();
        $data['apps']           = $this->app->getappbyid();
        $data['currency']       = $this->app->getappbyid();
        $data['transaksi']      = $this->dashboard->getAlltransaksidashboard();
        $data['alltransaksi']   = $this->dashboard->getTotalAllTransaksi();
        $data['semuatrx']   = $this->dashboard->DashboardTotalTransaksi();
        $data['fitur']          = $this->dashboard->getAllfitur();
        $data['totrx']          = $this->dashboard->getalltrx();
        $data['saldo']          = $this->dashboard->getallsaldo();
        $data['user']           = $this->user->getallusers();
        $data['driver']         = $this->driver->getalldriver();
        $data['mitra']          = $this->dashboard->countmitra();
        $data['hitungdriver']   = $this->dashboard->countdriver();
        $data['trxproses']          = $this->dashboard->trxproses();
        $data['trxbatal']          = $this->dashboard->trxbatal();
        $data['trxsukses']          = $this->dashboard->trxsukses();
       // $data['akses']          = $this->dashboard->aksesperizinan($this->session->userdata('grup'));
		$this->load->view('includes/header',$data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('includes/footer',$data);
	}
    public function detail($id)
    {
        
        $data['transaksi'] = $this->dashboard->gettransaksiById($id);
        $data['currency'] = $this->app->getappbyid();
        $data['transitem'] = $this->dashboard->getitem($id);

        $this->load->view('includes/header');
        $this->load->view('dashboard/detailtransaction', $data);
        $this->load->view('includes/footer');
    }

    public function cancletransaction($id)
    {
        //$dataget = $this->dashboard->gettransaksiById($id);
        $dataget = $this->dashboard->gettransaksiById($id)->row();
        $id_driver      = $dataget->id_driver;//$dataget['driverid'];
        $id_transaksi   = $dataget->id;//$dataget['id'];
        $token_user     = $dataget->token;//$dataget['token'];
        $token_driver     = $dataget->reg_id;//$dataget['reg_id'];
        $serverkey = $this->config->item('fcm_server');
        $this->notif->notif_cancel_user($serverkey,$id_driver, $id_transaksi, $token_user);
        $this->notif->notif_cancel_driver($serverkey,$id_transaksi, $token_driver);
        $this->dashboard->ubahstatustransaksibyid($id);
        $this->dashboard->ubahstatusdriverbyid($id_driver);
        $this->session->set_flashdata('cancel', 'Transaction Has Been Cancel');
        redirect('dashboard/index');
    }

    public function delete($id)
    {
        $this->dashboard->deletetransaksi($id);
        $this->session->set_flashdata('hapus', 'Transaction Has Been Delete ');
        redirect('transaksi/index');
    }
    public function dashboarddelete($id)
    {
        $this->dashboard->deletetransaksi($id);
        $this->session->set_flashdata('hapus', 'Transaction Has Been Delete ');
        redirect('dashboard/index');
    }
    public function dashboardselesai($id,$trx,$token,$tokendriver)
    {
        $data_req = array(
            'id_driver' => $id,
            'id_transaksi' => $trx
        );

        $data_tr = array(
            'id_driver' => $id,
            'id' => $trx
        );
        $finish_transaksi = $this->apidriver->finish_request($data_req, $data_tr);
        if ($finish_transaksi) {
            $datasetting = $this->app->appsetting()->row();
            $serverkey = $datasetting->fcm_key;
            $url = "https://fcm.googleapis.com/fcm/send";   
            $header = [
                'authorization: key='.$serverkey,
                'content-type: application/json'
            ];
            $tiperespon = '4';
            $notification = [
                'title' => 'Orderan',
                'body' => 'Pesanan Telah Diselesaikan Oleh Sistem'
            ];
            $extraNotificationData = ["message" => $notification,"id" =>$id,"type" =>$tiperespon];
            $fcmNotification = [
                'to'        => $token,
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
            $this->dashboard->notiftodriver($id,$tokendriver,$serverkey);
            $this->session->set_flashdata('sukses', 'Transaksi Berhasil Diselesaikan');
            redirect('dashboard/index');
        } else {
            $this->session->set_flashdata('gagal', 'Transaksi Gagal Diselesaikan');
            redirect('dashboard/index');
        }
    }
}
