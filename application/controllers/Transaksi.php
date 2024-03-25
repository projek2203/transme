<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
      
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->model('Appsettings', 'app');
        $this->load->model('Admin_dashboard', 'dashboard');
        $this->load->model('Notifikasi', 'notif');
    }

    public function index()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['currency'] = $this->app->getappbyid();
        $data['transaksi'] = $this->dashboard->getAlltransaksi();
        $data['trxcancel'] = $this->dashboard->trxbatal();
        $data['trxsukses'] = $this->dashboard->trxsukses();
        $data['fitur'] = $this->dashboard->getAllfitur();
        $data['saldo'] = $this->dashboard->getallsaldo();
        $data['akses'] = $this->dashboard->aksesperizinan($this->session->userdata('grup'));
        $this->load->view('includes/header',$data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('includes/footer',$data);
    }
}
