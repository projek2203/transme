<?php
class Saldo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Appsettings', 'app');
        $this->load->model('Saldo_model', 'saldo');
        $this->load->library('form_validation');
    }
    function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['wallet'] = $this->saldo->allsaldo();
        $data['currency'] = $this->app->getappbyid();
        $this->load->view('includes/header',$data);
		$this->load->view('saldo/index', $data);
        $this->load->view('includes/footer',$data);
	}
	function saldodriver($id)
	{
        $this->session->set_flashdata('id_user', $id);
        $usersession = $this->session->userdata('user_name');
        $data['apps'] = $this->app->getappbyid();
        $data['currency'] = $this->app->getappbyid();
        $data['driver'] = $this->saldo->datadriver($id);
        $drivers = $this->saldo->datadriver($id);
        if ($_POST != NULL) {
            $saldolama = html_escape($this->input->post('saldolama', TRUE));
            $saldo = html_escape($this->input->post('saldo', TRUE));
            $username = html_escape($this->input->post('atasnama', TRUE));
            $data = [
                'id_user'                       => $id,
                'saldo'                         => $saldo ,
                'saldolama'                         =>  $saldolama,
                'uplink'                         => $usersession,
                'atasnama'                     => $drivers['nama_driver']
            ];
            $this->saldo->updatesaldowallet($data);
            $this->session->set_flashdata('ubah', 'Top Up Has Been Added');
            redirect('driver');
        } else {
            $this->load->view('includes/header',$data);
            $this->load->view('saldo/saldodv', $data);
            $this->load->view('includes/footer',$data);
        }
	}
    function saldocs($id)
	{
        $this->session->set_flashdata('id_user', $id);
        $usersession = $this->session->userdata('user_name');
        $data['apps'] = $this->app->getappbyid();
        $data['currency'] = $this->app->getappbyid();
        $data['pelanggan'] = $this->saldo->datacs($id);
        $customer = $this->saldo->datacs($id);
        if ($_POST != NULL) {
            $saldolama = html_escape($this->input->post('saldolama', TRUE));
            $saldo = html_escape($this->input->post('saldo', TRUE));
            $username = html_escape($this->input->post('atasnama', TRUE));
  
            $data = [
                'id_user'                       => $id,
                'saldo'                         => $saldo,
                'saldolama'                         => $saldolama,
                'uplink'                         => $usersession,
                'atasnama'                     => $customer['fullnama']
            ];
            $this->saldo->updatesaldowallet($data);
            $this->session->set_flashdata('ubah', 'Top Up Has Been Added');
            redirect('pelanggan');
        } else {
            $this->load->view('includes/header',$data);
            $this->load->view('saldo/saldocs', $data);
            $this->load->view('includes/footer',$data);
        }
	}
    function saldomitra($id)
	{
        $this->session->set_flashdata('id_user', $id);
        $usersession = $this->session->userdata('user_name');
        $data['apps'] = $this->app->getappbyid();
        $data['currency'] = $this->app->getappbyid();
        $data['mitra'] = $this->saldo->datamitra($id);
        $merchant = $this->saldo->datamitra($id);
        if ($_POST != NULL) {
            $saldolama = html_escape($this->input->post('saldolama', TRUE));
            $saldo = html_escape($this->input->post('saldo', TRUE));
           
  
            $data = [
                'id_user'                        => $id,
                'saldo'                          => $saldo,
                'saldolama'                      => $saldolama,
                'uplink'                         => $usersession,
                'namamitra'                      => $merchant['nama_mitra']
            ];
            $this->saldo->updatesaldowallet($data);
            $this->session->set_flashdata('ubah', 'Top Up Has Been Added');
            redirect('merchant');
        } else {
            $this->load->view('includes/header',$data);
            $this->load->view('saldo/saldomt', $data);
            $this->load->view('includes/footer',$data);
        }
	}
    public function tconfirm($id, $id_user, $amount)
    {
        $token = $this->saldo->gettoken($id_user);
        $regid = $this->saldo->getregid($id_user);
        $tokenmerchant = $this->saldo->gettokenmerchant($id_user);

        if ($token == NULL and $tokenmerchant == NULL and $regid != NULL) {
            $topic = $regid['reg_id'];
        } else if ($regid == NULL and $tokenmerchant == NULL and $token != NULL) {
            $topic = $token['token'];
        } else if ($regid == NULL and $token == NULL and $tokenmerchant != NULL) {
            $topic = $tokenmerchant['token_merchant'];
        }

        $title = 'Topup success';
        $message = 'Topup Berhasil Dikonfirmasi';
        $saldo = $this->saldo->getsaldo($id_user);
        $this->saldo->ubahsaldotopup($id_user, $amount, $saldo);
        $this->saldo->ubahstatuswithdrawbyid($id);

        $datasetting = $this->app->appsetting()->row();
        $serverkey = $datasetting->duitku_merchant;
        $this->saldo->send_notif($serverkey,$title, $message, $topic);

        $this->session->set_flashdata('ubah', 'topup has been confirmed');
        redirect('saldo/index');
    }
    public function wdconfirm($id, $id_user, $amount)
    {
        $token = $this->saldo->gettoken($id_user);
        $regid = $this->saldo->getregid($id_user);
        $tokenmerchant = $this->saldo->gettokenmerchant($id_user);

        if ($token == NULL and $tokenmerchant == NULL and $regid != NULL) {
            $topic = $regid['reg_id'];
        } else if ($regid == NULL and $tokenmerchant == NULL and $token != NULL) {
            $topic = $token['token'];
        } else if ($regid == NULL and $token == NULL and $tokenmerchant != NULL) {
            $topic = $tokenmerchant['token_merchant'];
        }

        $title = 'Withdraw success';
        $message = 'Withdraw Berhasil Dikonfirmasi';
        $saldo = $this->saldo->getsaldo($id_user);
        $this->saldo->ubahsaldowd($id_user, $amount, $saldo);
        $this->saldo->ubahstatuswithdrawbyid($id);

        $datasetting = $this->app->appsetting()->row();
        $serverkey = $datasetting->duitku_merchant;
        $this->saldo->send_notif($serverkey,$title, $message, $topic);

        $this->session->set_flashdata('ubah', 'withdraw has been confirmed');
        redirect('saldo/index');
    }
    public function tcancel($id, $id_user)
    {
        $token = $this->saldo->gettoken($id_user);
        $regid = $this->saldo->getregid($id_user);
        $tokenmerchant = $this->saldo->gettokenmerchant($id_user);

        if ($token == NULL and $regid != NULL) {
            $topic = $regid['reg_id'];
        }

        if ($regid == NULL and $token != NULL) {
            $topic = $token['token'];
        }

        if ($regid == NULL and $token == NULL and $tokenmerchant != NULL) {
            $topic = $tokenmerchant['token_merchant'];
        }

        $title = 'Topup canceled';
        $message = 'Sorry, topup has been canceled';

        $this->saldo->cancelstatuswithdrawbyid($id);
        
        $datasetting = $this->app->appsetting()->row();
        $serverkey = $datasetting->duitku_merchant;
        $this->saldo->send_notif($serverkey,$title, $message, $topic);
        
        $this->session->set_flashdata('ubah', 'topup has been canceled');
        redirect('saldo/index');
    }
}