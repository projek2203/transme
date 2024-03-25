<?php
class Merchant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Appsettings', 'app');
        $this->load->model('User_dashboard','pelanggan');
        $this->load->model('Template_model');
        $this->load->model('Mitra_model', 'mitra');
        $this->load->library('form_validation');
        $this->load->model('Email_model');
        //$this->load->library('upload');
    }
	function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['mitra'] = $this->mitra->getallmitra();
        $data['merchantk'] = $this->mitra->getmerchantk();
        $data['fitur'] = $this->mitra->get_fitur_merchant();
        $this->load->view('includes/header',$data);
		$this->load->view('mitra/index', $data);
        $this->load->view('includes/footer',$data);
	}
    function detail($id)
	{
        $data['apps'] = $this->app->getappbyid();
        $data['mitra'] = $this->mitra->getmitrabyid($id);
        $data['item'] = $this->mitra->getitembyid($data['mitra']['id_merchant']);
        $data['itemk'] = $this->mitra->getitemkbyid($data['mitra']['id_merchant']);
        $data['currency'] = $this->app->getappbyid();
        $data['countorder'] = $this->mitra->countorder($data['mitra']['id_merchant']);
        $data['wallet'] = $this->mitra->wallet($id);
        $data['jumlah'] = count($data['item']);
        $data['merchantk'] = $this->mitra->getmerchantk();
        $data['transaksi'] = $this->mitra->gettranshistory($data['mitra']['id_merchant']);
        $data['fitur'] = $this->mitra->get_fitur_merchant();
        $this->load->view('includes/header',$data);
		$this->load->view('mitra/detail', $data);
        $this->load->view('includes/footer',$data);
	}
    public function ubahmerchant($id)
    {
        $this->form_validation->set_rules('nama_merchant', 'nama_merchant', 'trim|prep_for_form');
        $this->form_validation->set_rules('alamat_merchant', 'alamat_merchant', 'trim|prep_for_form');
        $datafitur['fitur'] = $this->mitra->get_fitur_merchant();
        if ($this->form_validation->run() == TRUE) {
            $merchant = $this->mitra->getmerchantdetail($this->input->post('id_merchant'));
            $fotomerchant = $merchant['foto_merchant'];
            if (@$_FILES['foto_merchant']['name']) {
                $config['upload_path']     = './images/merchant';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '30000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_merchant')) {
                    $fotobarumerchant = $this->upload->data('file_name');
                    unlink('images/merchant/' . $fotomerchant);
                } else {
                    $fotobarumerchant = $fotomerchant;
                }
                $data = [
                    'id_merchant'               => html_escape($this->input->post('id_merchant', TRUE)),
                    'id_fitur'                  => html_escape($this->input->post('id_fitur', TRUE)),
                    'nama_merchant'             => html_escape($this->input->post('nama_merchant', TRUE)),
                    'category_merchant'         => html_escape($this->input->post('category_merchant', TRUE)),
                    'alamat_merchant'           => html_escape($this->input->post('alamat_merchant', TRUE)),
                    'latitude_merchant'         => html_escape($this->input->post('latitude_merchant', TRUE)),
                    'longitude_merchant'        => html_escape($this->input->post('longitude_merchant', TRUE)),
                    'jam_buka'                  => html_escape($this->input->post('jam_buka', TRUE)),
                    'jam_tutup'                 => html_escape($this->input->post('jam_tutup', TRUE)),
                    'foto_merchant'             => $fotobarumerchant
                ];

                $this->mitra->updatemerchant($data);
                $this->session->set_flashdata('ubah', 'Merchant Has Been Changed');
                redirect('merchant/detail/' . $id);
            } else {
                $data = [
                    'id_merchant'               => html_escape($this->input->post('id_merchant', TRUE)),
                    'id_fitur'                  => html_escape($this->input->post('id_fitur', TRUE)),
                    'nama_merchant'             => html_escape($this->input->post('nama_merchant', TRUE)),
                    'category_merchant'         => html_escape($this->input->post('category_merchant', TRUE)),
                    'alamat_merchant'           => html_escape($this->input->post('alamat_merchant', TRUE)),
                    'latitude_merchant'         => html_escape($this->input->post('latitude_merchant', TRUE)),
                    'longitude_merchant'        => html_escape($this->input->post('longitude_merchant', TRUE)),
                    'jam_buka'                  => html_escape($this->input->post('jam_buka', TRUE)),
                    'jam_tutup'                 => html_escape($this->input->post('jam_tutup', TRUE)),
                    'foto_merchant'             => $fotomerchant
                ];
                if (demo == TRUE){
                    $this->session->set_flashdata('ubahinfo', 'Tidak Dapat Diproses Dalam Mode Demo');
                    redirect('dashboard');
                }else{
                    $this->mitra->updatemerchant($data);
                    $this->session->set_flashdata('ubahinfo', 'Merchant Has Been Changed');
                    redirect('merchant/detail/' . $id);
                }
                
            }
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->session->set_flashdata('gagal', 'Error, Please Try Again');
            $this->load->view('includes/header',$data);
            $this->load->view('mitra/detail/' . $id, $datafitur);
            $this->load->view('includes/footer',$data);
        }
    }
    public function editmitradetail()
    {
        $this->form_validation->set_rules('nama_mitra', 'nama_mitra', 'trim|prep_for_form');
        $this->form_validation->set_rules('alamat_mitra', 'alamat_mitra', 'trim|prep_for_form');
        $this->form_validation->set_rules('email_mitra', 'email_mitra', 'trim|prep_for_form');
        $this->form_validation->set_rules('countrycode', 'countrycode', 'trim|prep_for_form');
        $this->form_validation->set_rules('phone', 'phone', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {

            $idm = $this->input->post('id_mitra');
            $phone       = html_escape($this->input->post('phone_mitra', TRUE));
            $countrycode = html_escape($this->input->post('country_code_mitra', TRUE));
            $remove = array("+", "-");

            $data = [
                'nama_mitra'                => html_escape($this->input->post('nama_mitra', TRUE)),
                'alamat_mitra'              => html_escape($this->input->post('alamat_mitra', TRUE)),
                'email_mitra'               => html_escape($this->input->post('email_mitra', TRUE)),
                'partner'                   => $this->input->post('partner'),
                'phone_mitra'               => $phone,
                'country_code_mitra'        => $countrycode,
                'telepon_mitra'             => str_replace($remove, '', $countrycode) . $phone,
            ];
            $datamerchant = [
                'id_merchant'               => html_escape($this->input->post('id_merchant', TRUE)),
                'phone_merchant'               => $phone,
                'country_code_merchant'        => $countrycode,
                'telepon_merchant'             => str_replace($remove, '', $countrycode) . $phone,
            ];
            
            $this->mitra->ubahmitrabyid($data, $idm);
            $this->mitra->updatemerchant($datamerchant);
            $this->session->set_flashdata('ubah', 'Mitra Has Been Updated');
            redirect('merchant/detail/' . $idm);
        } else {
            $data['apps'] = $this->app->getappbyid();
            $idm = $this->input->post('id_mitra');
            $this->session->set_flashdata('gagal', 'Error, Please Try Again');
            $this->load->view('includes/header',$data);
            $this->load->view('merchant/detail/' . $idm);
            $this->load->view('includes/footer',$data);
        }
    }
    public function ubahcategoryitem()
    {
        $this->form_validation->set_rules('nama_kategori_item', 'nama_kategori_item', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {

            $idm = $this->input->post('id_mitra');
            $id = $this->input->post('id_kategori_item');
            $data = [
                'nama_kategori_item'    => html_escape($this->input->post('nama_kategori_item', TRUE)),
            ];
            $this->mitra->ubahkategoryitembyid($data, $id);
            $this->session->set_flashdata('ubah', 'Item Category Has Been Updated');
            redirect('merchant/detail/' . $idm);
        } else {
            $data['apps'] = $this->app->getappbyid();
            $idm = $this->input->post('id_mitra');
            $this->session->set_flashdata('gagal', 'Error, Please Try Again');
            $this->load->view('includes/header',$data);
            $this->load->view('merchant/detail/' . $idm);
            $this->load->view('includes/footer',$data);
        }
    }
    public function tambahcategoryitem()
    {

        $this->form_validation->set_rules('nama_kategori_item', 'nama_kategori_item', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {

            $idm = $this->input->post('id_merchant');
            $data = [
                'nama_kategori_item'    => html_escape($this->input->post('nama_kategori_item', TRUE)),
                'id_merchant'           => html_escape($this->input->post('id_mitra', TRUE)),
                'all_category'          => '0'
            ];

            $this->mitra->tambahkategoryitembyid($data);
            $this->session->set_flashdata('tambah', 'Item Category Has Been Added');
            redirect('merchant/detail/' . $idm);
        } else {
            $data['apps'] = $this->app->getappbyid();
            $idm = $this->input->post('id_merchant');
            $this->session->set_flashdata('gagal', 'Error, Please Try Again');
            $this->load->view('includes/header',$data);
            $this->load->view('merchant/detail/' . $idm);
            $this->load->view('includes/footer',$data);
        }
    }

    public function editmitrapass()
    {
        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');
        $idm = $this->input->post('id_mitra');
        if ($this->form_validation->run() == TRUE) {
            $pass = html_escape($this->input->post('password', TRUE));
            $data = [
                'password'                => sha1($pass),
            ];

            $this->mitra->ubahpassmitrabyid($data, $idm);
            $this->session->set_flashdata('ubahpass', 'Mitra password Has Been Updated');
            redirect('merchant/detail/' . $idm);
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->session->set_flashdata('gagal', 'Error, Please Try Again');
            $this->load->view('includes/header',$data);
            $this->load->view('merchant/detail/' . $idm,$data);
            $this->load->view('includes/footer',$data);
        }
    }
    public function confirmmitra($id)
    {
        $this->mitra->ubahstatusmitra($id);
        $item = $this->app->getappbyid();
        $token = sha1(rand(0, 999999) . time());
        $dataforgot = array(
            'userid' => $id,
            'token' => $token,
            'idKey' => '3'
        );
        $this->pelanggan->dataforgot($dataforgot);
        $linkbtn = base_url() . 'resetpass/rest/' . $token . '/3';
        $judul_email = $item['email_subject_confirm'] . '[ticket-' . rand(0, 999999) . ']';
        $template = $this->Template_model->template1($item['email_subject_confirm'], $item['email_text3'], $item['email_text4'], $item['app_website'], $item['app_name'], $linkbtn, $item['app_linkgoogle'], $item['app_address']);
        $email = $this->mitra->getmitrabyid($id);
        $emailuser = $email['email_mitra'];
        $host = $item['smtp_host'];
        $port = $item['smtp_port'];
        $username = $item['smtp_username'];
        $password = $item['smtp_password'];
        $from = $item['smtp_from'];
        $appname = $item['app_name'];
        $secure = $item['smtp_secure'];
        $this->Email_model->emailsend($judul_email, $emailuser, $template, $host, $port, $username, $password, $from, $appname, $secure);
        $this->session->set_flashdata('ubah', 'Mitra Has Been Confirm');
        redirect('merchant');
    }
    public function hapus($id)
    {
        if (demo == TRUE){
            $this->session->set_flashdata('hapus', 'Tidak Dapat Diproses Dalam Mode Demo');
            redirect('dashboard');
        }else{
            $berkas = $this->mitra->getberkasbyid($id);
            $fotoktp = $berkas['foto_ktp'];
            unlink('images/fotoberkas/ktp/' . $fotoktp);
            $this->mitra->hapusmitrabyid($id);
            $this->session->set_flashdata('hapus', 'Owner Merchant Has Been Deleted');
            redirect('merchant');
        }
       
    }
    public function block($id)
    {
        $this->mitra->blockmitrabyid($id);
        redirect('merchant');
    }

    public function unblock($id)
    {
        $this->mitra->unblockmitrabyid($id);
        redirect('merchant');
    }
    function kategori()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['catmer'] = $this->mitra->getallcm();
        $data['fitur'] = $this->mitra->getfiturmerchant();
        $this->load->view('includes/header',$data);
		$this->load->view('mitra/kategori', $data);
        $this->load->view('includes/footer',$data);
	}
    //------------------------- Kategori -----------------------------------------
    public function tambahcm()
    {
        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/kategorimerchant/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_kategori')) {
                $gambar = html_escape($this->upload->data('file_name'));
            } else {
                $gambar = 'noimages.png';
            }
            $data = [
                'foto_kategori'     => $gambar,
                'nama_kategori'     => html_escape($this->input->post('nama_kategori', TRUE)),
                'id_fitur'          => html_escape($this->input->post('id_fitur', TRUE)),
                'status_kategori'   => html_escape($this->input->post('status_kategori', TRUE)),
            ];
            $this->mitra->tambahcm($data);
            $this->session->set_flashdata('tambah', 'Kategori Berhasil Ditambahkan');
            redirect('merchant/kategori');
        }
    }
    public function hapuskategori($id)
    {
        $this->mitra->hapuscm($id);
        $this->session->set_flashdata('hapus', 'Kategori Telah Dihapus');
        redirect('merchant/kategori');
    }
    public function ubahcm()
    {
        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'trim|prep_for_form');
        $this->form_validation->set_rules('foto_kategori', 'foto_kategori', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/kategorimerchant/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = time();
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
          
            $dataimage = $this->mitra->datakategoribyid($this->input->post('id_kategori_merchant'));
            if ($this->upload->do_upload('foto_kategori')) {
                if ($dataimage['foto_kategori'] != 'noimages.png') {
                    $gambar = $dataimage['foto_kategori'];
                    unlink('./images/kategorimerchant/' . $gambar);
                }
                $gambar = html_escape($this->upload->data('file_name'));
            } else {
                $gambar = $dataimage['foto_kategori'];
            }
            $id = $this->input->post('id_kategori_merchant');
            $data = [
                'foto_kategori'     => $gambar,
                'nama_kategori'     => html_escape($this->input->post('nama_kategori', TRUE)),
                'id_fitur'          => html_escape($this->input->post('id_fitur', TRUE)),
                'status_kategori'   => html_escape($this->input->post('status_kategori', TRUE)),
                ];
            $this->mitra->ubahcm($data, $id);
            $this->session->set_flashdata('ubah', 'Kategori Berhasil Diubah');
            redirect('merchant/kategori');
        }
    }
}
