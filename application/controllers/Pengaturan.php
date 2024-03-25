<?php
class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->database();
        $this->load->model('Appsettings', 'app');
        $this->load->library('form_validation');
    }
	function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['appsettings'] = $this->app->getappbyid();
        $data['transfer'] = $this->app->gettransfer();
        $this->load->view('includes/header',$data);
		$this->load->view('pengaturan/index', $data);
        $this->load->view('includes/footer',$data);
	}
    public function addbank()
    {
        $data['apps'] = $this->app->getappbyid();
        $this->load->view('includes/header',$data);
        $this->load->view('pengaturan/addbank',$data);
        $this->load->view('includes/footer',$data);
    }
    public function editbank($id)
    {
        $data['apps'] = $this->app->getappbyid();
        $data['transfer'] = $this->app->getbankid($id);
        $this->load->view('includes/header', $data);
        $this->load->view('pengaturan/editbank', $data);
        $this->load->view('includes/footer', $data);
    }
    public function ubahapp()
    {
        $this->form_validation->set_rules('app_email', 'app_email', 'trim|prep_for_form');
        $this->form_validation->set_rules('app_website', 'app_website', 'trim|prep_for_form');
        $this->form_validation->set_rules('background', 'background', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/logo/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            $data = $this->app->getappbyid();
            if ($this->upload->do_upload('app_logo')) {
                if ($data['app_logo'] != 'noimage.jpg') {
                    $gambar = $data['app_logo'];
                    unlink('./images/logo/' . $gambar);
                }
                $app_logo = html_escape($this->upload->data('file_name'));
            } else {
                $app_logo = $data['app_logo'];
            }

            $data             = [
                'app_logo'                    => $app_logo,
                'app_email'                    => html_escape($this->input->post('app_email', TRUE)),
                'app_website'                => html_escape($this->input->post('app_website', TRUE)),
                'app_privacy_policy'        => $this->input->post('app_privacy_policy', TRUE),
                'app_aboutus'                => $this->input->post('app_aboutus', TRUE),
                'app_address'                => $this->input->post('app_address'),
                'app_name'                  => html_escape($this->input->post('app_name', TRUE)),
                'app_description'                  => html_escape($this->input->post('app_description', TRUE)),
                'geocode_key'                  => html_escape($this->input->post('geocode_key', TRUE)),
                'map_key'                  => html_escape($this->input->post('map_key', TRUE)),
                'fcm_key'                  => html_escape($this->input->post('fcm_key', TRUE)),
                'app_contact'                  => html_escape($this->input->post('app_contact', TRUE)),
                'maintenance'                  => html_escape($this->input->post('maintenance', TRUE)),
                'isotp'                  => html_escape($this->input->post('isotp', TRUE)),
                'upreff'                  => html_escape($this->input->post('upreff', TRUE)),
                'rewardreff'                  => html_escape($this->input->post('rewardreff', TRUE)),
                'background'                  => html_escape($this->input->post('background', TRUE)),
                'mode'                  => html_escape($this->input->post('mode', TRUE))
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('ubah', 'Tidak Dapat Disimpan Dalam Mode Demo');
                redirect('pengaturan');
            }else{
                $this->app->ubahdataappsettings($data);
                $this->session->set_flashdata('ubah', 'Pengaturan Berhasil Disimpan');
                redirect('pengaturan');
            }
            
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['appsettings'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('pengaturan/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function ubahemail()
    {
        $this->form_validation->set_rules('email_subject', 'email_subject', 'trim|prep_for_form');
        $this->form_validation->set_rules('email_subject_confirm', 'email_subject', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'email_subject'                  => html_escape($this->input->post('email_subject', TRUE)),
                'email_subject_confirm'          => html_escape($this->input->post('email_subject_confirm', TRUE)),
                'email_text1'                    => $this->input->post('email_text1'),
                'email_text2'                    => $this->input->post('email_text2'),
                'email_text3'                    => $this->input->post('email_text3'),
                'email_text4'                    => $this->input->post('email_text4')
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('ubah', 'Tidak Dapat Disimpan Dalam Mode Demo');
                redirect('pengaturan');
            }else{
                $this->app->ubahdataemail($data);
                $this->session->set_flashdata('ubah', 'Email Berhasil Diubah');
                redirect('pengaturan');
            }
           
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['appsettings'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('pengaturan/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function ubahsmtp()
    {
        $this->form_validation->set_rules('smtp_host', 'smtp_host', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_port', 'smtp_port', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_username', 'smtp_username', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_password', 'smtp_password', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_form', 'smtp_form', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_secure', 'smtp_secure', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'smtp_host'                        => html_escape($this->input->post('smtp_host', TRUE)),
                'smtp_port'                        => html_escape($this->input->post('smtp_port', TRUE)),
                'smtp_username'                    => html_escape($this->input->post('smtp_username', TRUE)),
                'smtp_password'                    => html_escape($this->input->post('smtp_password', TRUE)),
                'smtp_from'                        => html_escape($this->input->post('smtp_from', TRUE)),
                'smtp_secure'                    => html_escape($this->input->post('smtp_secure', TRUE))
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('ubah', 'Tidak Dapat Disimpan Dalam Mode Demo');
                redirect('pengaturan');
            }else{
                $this->app->ubahdatasmtp($data);
                $this->session->set_flashdata('ubah', 'SMTP Berhasil Diubah');
                redirect('pengaturan');
            }
           
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['appsettings'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('pengaturan/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function ubahnotifikasi()
    {
        $this->form_validation->set_rules('fcmkey', 'fcmkey', 'trim|prep_for_form');
        $this->form_validation->set_rules('appid', 'appid', 'trim|prep_for_form');
        $this->form_validation->set_rules('restapi', 'restapi', 'trim|prep_for_form');
        $this->form_validation->set_rules('channel', 'channel', 'trim|prep_for_form');
        $this->form_validation->set_rules('template', 'template', 'trim|prep_for_form');
        $this->form_validation->set_rules('channelchat', 'channelchat', 'trim|prep_for_form');
        $this->form_validation->set_rules('templatechat', 'templatechat', 'trim|prep_for_form');
        $this->form_validation->set_rules('mode', 'mode', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'fcm_key'                        => html_escape($this->input->post('fcmkey', TRUE)),
                'os_appid'                        => html_escape($this->input->post('appid', TRUE)),
                'os_restapi'                        => html_escape($this->input->post('restapi', TRUE)),
                'os_channel'                    => html_escape($this->input->post('channel', TRUE)),
                'os_template'                    => html_escape($this->input->post('template', TRUE)),
                'os_channel_chat'                    => html_escape($this->input->post('channelchat', TRUE)),
                'os_template_chat'                    => html_escape($this->input->post('templatechat', TRUE)),
                'mode'                    => html_escape($this->input->post('mode', TRUE)),
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('ubah', 'Tidak Dapat Disimpan Dalam Mode Demo');
                redirect('pengaturan');
            }else{
                $this->app->ubahnotif($data);
                $this->session->set_flashdata('ubah', 'Notifikasi Berhasil Diubah');
                redirect('pengaturan');
            }
           
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['appsettings'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('pengaturan/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function adddatabank()
    {
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'trim|prep_for_form');
        $this->form_validation->set_rules('rekening_bank', 'rekening_bank', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/bank/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = time();
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image_bank')) {
                $app_logo = html_escape($this->upload->data('file_name'));
            }
            $data = [
                'nama_bank' => html_escape($this->input->post('nama_bank', TRUE)),
                'rekening_bank' => html_escape($this->input->post('rekening_bank', TRUE)),
                'status_bank' => html_escape($this->input->post('status_bank', TRUE)),
                'image_bank' => $app_logo
            ];
            $this->app->adddatarekening($data);
            $this->session->set_flashdata('ubah', 'Data Bank Telah Ditambahkan');
            redirect('pengaturan');
        }
    }
    public function ubahbank($id)
    {
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'trim|prep_for_form');
        $this->form_validation->set_rules('rekening_bank', 'rekening_bank', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/bank/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = time();
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            $dataget = $this->app->getbankid($id);
            if ($this->upload->do_upload('image_bank')) {
                if ($dataget['image_bank'] != 'noimage.jpg') {
                    $gambar = $dataget['image_bank'];
                    unlink('./images/bank/' . $gambar);
                }
                $gambar = $dataget['image_bank'];
                unlink('./images/bank/' . $gambar);
                $app_logo = html_escape($this->upload->data('file_name'));
            } else {
                $app_logo = $dataget['image_bank'];
            }
            $data = [
                'nama_bank' => html_escape($this->input->post('nama_bank', TRUE)),
                'rekening_bank' => html_escape($this->input->post('rekening_bank', TRUE)),
                'status_bank' => html_escape($this->input->post('status_bank', TRUE)),
                'image_bank' => $app_logo
            ];
            $this->app->ubahdatarekening($data, $id);
            $this->session->set_flashdata('ubah', 'Data Bank Berhasil Diubah');
            redirect('pengaturan');
        }
    }
    public function hapusbank($id)
    {
        $dataget = $this->app->getbankid($id);
        $gambar = $dataget['image_bank'];
        unlink('./images/bank/' . $gambar);
        $this->app->hapusrekening($id);
        $this->session->set_flashdata('ubah', 'Data Bank Telah Dihapus');
        redirect('pengaturan');
    }
    public function ubahDuitku()
    {
        $this->form_validation->set_rules('duitku_merchant', 'duitku_merchant', 'trim|prep_for_form');
        $this->form_validation->set_rules('duitku_key', 'duitku_key', 'trim|prep_for_form');
        $this->form_validation->set_rules('duitku_mode', 'duitku_mode', 'trim|prep_for_form');
        $this->form_validation->set_rules('duitku_status', 'duitku_status', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'duitku_merchant'                    => html_escape($this->input->post('duitku_merchant', TRUE)),
                'duitku_key'                => html_escape($this->input->post('duitku_key', TRUE)),
                'duitku_mode'                => html_escape($this->input->post('duitku_mode', TRUE)),
                'duitku_status'                        => html_escape($this->input->post('duitku_status', TRUE))
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('ubah', 'Tidak Dapat Disimpan Dalam Mode Demo');
                redirect('pengaturan');
            }else{
                $this->app->ubahduitku($data);
                $this->session->set_flashdata('ubah', 'Duitku Berhasil Diubah');
                redirect('pengaturan');
            }
            
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['appsettings'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('pengaturan/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function ubahDigiflazz()
    {
        $this->form_validation->set_rules('digi_user', 'digi_user', 'trim|prep_for_form');
        $this->form_validation->set_rules('digi_api', 'digi_api', 'trim|prep_for_form');
        $this->form_validation->set_rules('digi_mode', 'digi_mode', 'trim|prep_for_form');
        $this->form_validation->set_rules('digi_status', 'digi_status', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'digi_user'                    => html_escape($this->input->post('digi_user', TRUE)),
                'digi_api'                => html_escape($this->input->post('digi_api', TRUE)),
                'digi_mode'                => html_escape($this->input->post('digi_mode', TRUE)),
                'digi_status'                        => html_escape($this->input->post('digi_status', TRUE))
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('ubah', 'Tidak Dapat Disimpan Dalam Mode Demo');
                redirect('pengaturan');
            }else{
                $this->app->ubahdigiflazz($data);
                $this->session->set_flashdata('ubah', 'Digiflazz Berhasil Diubah');
                redirect('pengaturan');
            }
            
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['appsettings'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('pengaturan/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }
}
