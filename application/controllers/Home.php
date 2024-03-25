<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Appsettings', 'app');
        $this->load->model('Driver_dashboard', 'driver');
        $this->load->model('Admin_dashboard', 'dashboard');
        $this->load->model('User_dashboard', 'user');
        $this->load->model('Mitra_model', 'mitra');
        $this->load->model('Fitur_model', 'fitur');
        $this->load->model('Template_model');
        $this->load->model('email_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }
	function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $this->load->view('includes/headerhome',$data);
		$this->load->view('home/index', $data);
        $this->load->view('includes/footerhome',$data);
	}
    function regcs()
	{
        $password = html_escape($this->input->post('password', TRUE));
        $countrycode = html_escape($this->input->post('countrycode', TRUE));
        $phone = html_escape($this->input->post('phone', TRUE));
        $email = html_escape($this->input->post('email', TRUE));
        $this->form_validation->set_rules('fullnama', 'NAME', 'trim|prep_for_form');
        $this->form_validation->set_rules('phone', 'PHONE', 'trim|prep_for_form|is_unique[pelanggan.phone]');
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|prep_for_form|is_unique[pelanggan.email]');
        $this->form_validation->set_rules('password', 'PASSWORD', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/pelanggan/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('fotopelanggan')) {
                $foto = html_escape($this->upload->data('file_name'));
            } else {
                $foto = 'noimage.jpg';
            }
            $data             = [
                'id'                        => 'P' . time(),
                'phone'                     => html_escape($this->input->post('phone', TRUE)),
                'countrycode'               => html_escape($this->input->post('countrycode', TRUE)),
                'tgl_lahir'                 => html_escape($this->input->post('tgl_lahir', TRUE)),
                'token'                     => 'T' . time(),
                'fotopelanggan'             => $foto,
                'fullnama'                  => html_escape($this->input->post('fullnama', TRUE)),
                'no_telepon'                => str_replace("+", "", $countrycode) . $phone,
                'email'                     => html_escape($this->input->post('email', TRUE)),
                'password'                  => sha1($password),
            ];
            $this->user->tambahdatausers($data);
            $this->session->set_flashdata('registrasi', 'Akun Berhasil Dibuat');
            $this->session->set_flashdata('sukses', 'sukses');
            redirect('home/regcs');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/headerhome',$data);
            $this->load->view('home/regpelanggan', $data);
            $this->load->view('includes/footerhome',$data);
        }
	}
    function regdv()
	{
        $phone = html_escape($this->input->post('phone', TRUE));
        $email = html_escape($this->input->post('email', TRUE));
        $setpass = html_escape($this->input->post('password', TRUE));
        $this->form_validation->set_rules('nama_driver', 'nama_driver', 'trim|prep_for_form');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|prep_for_form|is_unique[driver.phone]');
        $this->form_validation->set_rules('email', 'Email', 'trim|prep_for_form|is_unique[driver.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            if (@$_FILES['foto']['name']) {
                $config['upload_path']     = './images/fotodriver/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '10000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto')) {
                    $foto = html_escape($this->upload->data('file_name'));
                } else {
                    $foto = 'noimage.jpg';
                }
            }
            if ($this->form_validation->run() == TRUE) {
                if (@$_FILES['foto_sim']['name']) {

                    $config['upload_path']     = './images/fotoberkas/sim';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']         = '10000';
                    $config['file_name']     = 'name';
                    $config['encrypt_name']     = true;
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('foto_sim')) {
                        $fotosim = html_escape($this->upload->data('file_name'));
                    } else {
                        $fotosim = 'noimage.jpg';
                    }
                }
            }
            if ($this->form_validation->run() == TRUE) {
                if (@$_FILES['foto_ktp']['name']) {
                    $config['upload_path']     = './images/fotoberkas/ktp';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']         = '10000';
                    $config['file_name']     = 'name';
                    $config['encrypt_name']     = true;
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto_ktp')) {

                        $fotoktp = html_escape($this->upload->data('file_name'));
                    } else {
                        $fotoktp = 'noimage.jpg';
                    }
                }
            }
            $countrycode = html_escape($this->input->post('countrycode', TRUE));
            $id = 'D' . time();
            $datasignup             = [
                'id'                        => $id,
                'phone'                     => html_escape($this->input->post('phone', TRUE)),
                'countrycode'               => html_escape($this->input->post('countrycode', TRUE)),
                'tgl_lahir'                 => html_escape($this->input->post('tgl_lahir', TRUE)),
                'reg_id'                    => 'R' . time(),
                'foto'                      => $foto,
                'password'                   => sha1(time()),
                'nama_driver'               => html_escape($this->input->post('nama_driver', TRUE)),
                'no_telepon'                => str_replace("+", "", $countrycode) . $phone,
                'email'                     => html_escape($this->input->post('email', TRUE)),
                'gender'                    => html_escape($this->input->post('gender', TRUE)),
                'alamat_driver'             => html_escape($this->input->post('alamat_driver', TRUE)),
                'job'                       => html_escape($this->input->post('job', TRUE)),
                'no_ktp'                    => html_escape($this->input->post('no_ktp', TRUE))

            ];
            $datakendaraan             = [
                'merek'                     => html_escape($this->input->post('merek', TRUE)),
                'tipe'                      => html_escape($this->input->post('tipe', TRUE)),
                'warna'                     => html_escape($this->input->post('warna', TRUE)),
                'nomor_kendaraan'           => html_escape($this->input->post('nomor_kendaraan', TRUE))

            ];
            $databerkas             = [
                'id_driver'                 => $id,
                'foto_sim'                  => $fotosim,
                'foto_ktp'                  => $fotoktp,
                'id_sim'                    => html_escape($this->input->post('id_sim', TRUE))

            ];
            $this->driver->signup($datasignup, $datakendaraan, $databerkas);
            $this->session->set_flashdata('registrasi', 'Akun Berhasil Dibuat');
            $this->session->set_flashdata('sukses', 'sukses');
            redirect('home/regdv');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['driverjob'] = $this->driver->driverjob();
            $this->load->view('includes/headerhome',$data);
            $this->load->view('home/regdriver', $data);
            $this->load->view('includes/footerhome',$data);
        }
	}
    public function regmech()
    {
        $this->form_validation->set_rules('nama_mitra', 'nama_mitra', 'trim|prep_for_form');
        $this->form_validation->set_rules('alamat_mitra', 'alamat_mitra', 'trim|prep_for_form');
        $this->form_validation->set_rules('email_mitra', 'email_mitra', 'trim|prep_for_form|is_unique[mitra.email_mitra]');
        $this->form_validation->set_rules('phone_mitra', 'phone_mitra', 'trim|prep_for_form|is_unique[mitra.phone_mitra]');
        $this->form_validation->set_rules('country_code_mitra', 'country_code_mitra', 'trim|prep_for_form');
        $this->form_validation->set_rules('jenis_identitas_mitra', 'jenis_identitas_mitra', 'trim|prep_for_form');
        $this->form_validation->set_rules('nomor_identitas_mitra', 'nomor_identitas_mitra', 'trim|prep_for_form');
        $this->form_validation->set_rules('nama_merchant', 'nama_merchant', 'trim|prep_for_form');
        $this->form_validation->set_rules('id_fitur', 'id_fitur', 'trim|prep_for_form');
        $this->form_validation->set_rules('category_merchant', 'category_merchant', 'trim|prep_for_form');
        $this->form_validation->set_rules('alamat_merchant', 'alamat_merchant', 'trim|prep_for_form');
        $this->form_validation->set_rules('jam_buka', 'jam_buka', 'trim|prep_for_form');
        $this->form_validation->set_rules('jam_tutup', 'jam_tutup', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            if (@$_FILES['foto_merchant']['name']) {
                $config['upload_path']     = './images/merchant';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '30000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto_merchant')) {

                    $fotomerchant = html_escape($this->upload->data('file_name'));
                }
                if ($this->form_validation->run() == TRUE) {
                    if (@$_FILES['katepe']['name']) {

                        $config['upload_path']     = './images/fotoberkas/ktp';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size']         = '30000';
                        $config['file_name']     = 'name';
                        $config['encrypt_name']     = true;
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('katepe')) {
                            $fotoktp = html_escape($this->upload->data('file_name'));
                        }
                    }
                }
            }
            $countrycode = html_escape($this->input->post('country_code_mitra', TRUE));
            $phone = html_escape($this->input->post('phone_mitra', TRUE));
            $id = 'M' . time();
            $datamerchant = [
                'id_merchant'                              => $id,
                'id_fitur'                              => html_escape($this->input->post('id_fitur', TRUE)),
                'nama_merchant'                         => html_escape($this->input->post('nama_merchant', TRUE)),
                'alamat_merchant'                       => html_escape($this->input->post('alamat_merchant', TRUE)),
                'latitude_merchant'                     => html_escape($this->input->post('latitude_merchant', TRUE)),
                'longitude_merchant'                    => html_escape($this->input->post('longitude_merchant', TRUE)),
                'jam_buka'                              => html_escape($this->input->post('jam_buka', TRUE)),
                'jam_tutup'                             => html_escape($this->input->post('jam_tutup', TRUE)),
                'category_merchant'                     => html_escape($this->input->post('category_merchant', TRUE)),
                'foto_merchant'                         => $fotomerchant,
                'telepon_merchant'                      => str_replace("+", "", $countrycode) . $phone,
                'country_code_merchant'                 => $countrycode,
                'phone_merchant'                        => $phone,
                'status_merchant'                       => '0',
                'token_merchant'                        => sha1(time())
            ];
            $idmerchant = $this->mitra->insertmerchant($datamerchant);
            $datamitra = [
                'id_mitra'                          => $id,
                'nama_mitra'                        => html_escape($this->input->post('nama_mitra', TRUE)),
                'jenis_identitas_mitra'             => html_escape($this->input->post('jenis_identitas_mitra', TRUE)),
                'nomor_identitas_mitra'             => html_escape($this->input->post('nomor_identitas_mitra', TRUE)),
                'alamat_mitra'                      => html_escape($this->input->post('alamat_mitra', TRUE)),
                'email_mitra'                       => html_escape($this->input->post('email_mitra', TRUE)),
                'password'                          => sha1(time()),
                'telepon_mitra'                     => str_replace("+", "", $countrycode) . $phone,
                'country_code_mitra'                => $countrycode,
                'phone_mitra'                       => $phone,
                'id_merchant'                       => $idmerchant,
                'partner'                           => '0',
                'status_mitra'                      => '0'
            ];
            $databerkas = [
                'id_driver'                          => $id,
                'foto_ktp'                          => $fotoktp,
            ];
            $datasaldo = [
                'id_user' => $id,
                'saldo' => 0
            ];
            $this->mitra->tambahkanmitra($datamitra,$datamerchant, $databerkas, $datasaldo);
            $this->session->set_flashdata('tambah', 'Pendaftaran Berhasil');
            redirect('home/regmech');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['mitra'] = $this->mitra->getallmitra();
            $data['merchantk'] = $this->mitra->getmerchantk();
            $data['fitur'] = $this->mitra->get_fitur_merchant();
            $this->load->view('includes/headerhome', $data);
            $this->load->view('home/regmerchant', $data);
            $this->load->view('includes/footerhome', $data);
        }
    }
    function invoice()
	{
        $idtrx = html_escape($this->input->post('idtrx', TRUE));
        $data['apps'] = $this->app->getappbyid();
        $data['currency'] = $this->app->getappbyid();
        $cekdata =  $this->dashboard->gettransaksibyid($idtrx);
        if ($cekdata->num_rows() > 0){
            $data['transaksi'] = $this->dashboard->gettransaksibyid($idtrx)->row_array();
            $data['transitem'] = $this->dashboard->getitem($idtrx);
            $this->load->view('includes/headerhome',$data);
            $this->load->view('home/invoice', $data);
            $this->load->view('includes/footerhome',$data);
        }else{
            $this->session->set_flashdata('tracking', 'Transaksi Tidak Ditemukan.');
            $this->session->set_flashdata('gagal', 'gagal');
            redirect('home/index');
        }
	}
}
