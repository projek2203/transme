<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->model('Driver_dashboard', 'driver');
        $this->load->model('Appsettings', 'app');
        $this->load->model('User_dashboard','pelanggan');
        $this->load->model('Template_model');
        $this->load->model('email_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['currency'] = $this->app->getappbyid();
        $data['driver'] = $this->driver->getalldriver();
        $this->load->view('includes/header',$data);
        $this->load->view('driver/index', $data);
        $this->load->view('includes/footer',$data);
    }
   
    public function tracking()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['driver'] = $this->driver->getalldriver();
        $this->load->view('includes/header',$data);
        $this->load->view('driver/tracker', $data);
        $this->load->view('includes/footer',$data);
    }
    public function berkas($id)
    {
        $data['apps'] = $this->app->getappbyid();
        $data['driver'] = $this->driver->getdriverbyid($id);
        $this->load->view('includes/header',$data);
        $this->load->view('driver/berkas', $data);
        $this->load->view('includes/footer',$data);
    }
    public function detail($id)
    {
        $data['apps'] = $this->app->getappbyid();
        $data['driver'] = $this->driver->getdriverbyid($id);
        $data['currency'] = $this->app->getappbyid();
        $data['countorder'] = $this->driver->countorder($id);
        $data['transaksi'] = $this->driver->transaksi($id);
        $data['canceltrx'] = $this->driver->transaksigagal($id);
        $data['suksestrx'] = $this->driver->transaksisukses($id);
        $data['wallet'] = $this->driver->wallet($id);
        $data['driverjob'] = $this->driver->driverjob();
        $this->load->view('includes/header',$data);
        $this->load->view('driver/profile', $data);
        $this->load->view('includes/footer',$data);
    }
    public function driveraktif()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['driver'] = $this->driver->getalldriver();
        $this->load->view('includes/header',$data);
        $this->load->view('driver/aktif', $data);
        $this->load->view('includes/footer',$data);
    }
    public function drivernonaktif()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['driver'] = $this->driver->getalldriver();
        $this->load->view('includes/header',$data);
        $this->load->view('driver/nonaktif', $data);
        $this->load->view('includes/footer',$data);
    }
    public function driversuspen()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['driver'] = $this->driver->getalldriver();
        $this->load->view('includes/header',$data);
        $this->load->view('driver/suspen', $data);
        $this->load->view('includes/footer',$data);
    }
    public function driverreg()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['driver'] = $this->driver->getalldriver();
        $this->load->view('includes/header',$data);
        $this->load->view('driver/konfirmasi', $data);
        $this->load->view('includes/footer',$data);
    }
    public function tambahakun()
    {   
        $phone = html_escape($this->input->post('phone', TRUE));
        $email = html_escape($this->input->post('email', TRUE));
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
            $this->session->set_flashdata('tambah', 'Driver Has Been Added');
            redirect('driver/index');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['driverjob'] = $this->driver->driverjob();
            $this->load->view('includes/header', $data);
            $this->load->view('driver/tambah', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function confirm($id)
    {
        $linkuser = $this->session->userdata('user_name');
        $setkota = $this->session->userdata('kota');
        $this->driver->ubahstatusnewreg($id,$linkuser,$setkota);

        $item = $this->app->getappbyid();

        $token = sha1(rand(0, 999999) . time());

        $dataforgot = array(
            'userid' => $id,
            'token' => $token,
            'idKey' => '2'
        );
        $this->driver->dataforgot($dataforgot);

        $linkbtn = base_url() . 'resetpass/rest/' . $token . '/2';
        $judul_email = $item['email_subject_confirm'] . '[ticket-' . rand(0, 999999) . ']';
        $template = $this->Template_model->template1($item['email_subject_confirm'], $item['email_text3'], $item['email_text4'], $item['app_website'], $item['app_name'], $linkbtn, $item['app_linkgoogle'], $item['app_address']);
        $email = $this->driver->getdriverbyid($id);
        $emailuser = $email['email'];
        $host = $item['smtp_host'];
        $port = $item['smtp_port'];
        $username = $item['smtp_username'];
        $password = $item['smtp_password'];
        $from = $item['smtp_from'];
        $appname = $item['app_name'];
        $secure = $item['smtp_secure'];

        $this->email_model->emailsend($judul_email, $emailuser, $template, $host, $port, $username, $password, $from, $appname, $secure);
        $this->session->set_flashdata('ubah', 'Driver Has Been Confirm');
        redirect('driver');
    }
    public function hapus($id)
    {
        if (demo == TRUE){
            $this->session->set_flashdata('hapus', 'Tidak Dapat Diproses Dalam Mode Demo');
            redirect('dashboard');
        }else{
            $data = $this->driver->getdriverbyid($id);
            $gambar = $data['foto'];
            $gambarsim = $data['foto_sim'];
            $gambarktp = $data['foto_ktp'];
            unlink('images/fotodriver/' . $gambar);
            unlink('images/fotoberkas/ktp/' . $gambarktp);
            unlink('images/fotoberkas/sim/' . $gambarsim);
            $this->session->set_flashdata('hapus', 'Driver Has Been Deleted');
            $this->driver->hapusdriverbyid($id);
            redirect('driver');
        }
        
    }
    public function block($id)
    {
        if (demo == TRUE){
            $this->session->set_flashdata('hapus', 'Tidak Dapat Diproses Dalam Mode Demo');
            redirect('dashboard');
        }else{
            $this->driver->blockdriverbyid($id);
            redirect('driver');
        }
        
    }

    public function unblock($id)
    {
        if (demo == TRUE){
            $this->session->set_flashdata('hapus', 'Tidak Dapat Diproses Dalam Mode Demo');
            redirect('dashboard');
        }else{
            $this->driver->unblockdriverbyid($id);
            redirect('driver');
        }
        
    }
    public function ubahid()
    {
        $this->form_validation->set_rules('nama_driver', 'nama_driver', 'trim|prep_for_form');
        $this->form_validation->set_rules('email', 'email', 'trim|prep_for_form');
        $this->form_validation->set_rules('gender', 'gender', 'trim|prep_for_form');
        $this->form_validation->set_rules('alamat_driver', 'alamat_driver', 'trim|prep_for_form');
       
        if ($this->form_validation->run() == TRUE) {
            $id = html_escape($this->input->post('id', TRUE));
            $phone = html_escape($this->input->post('phone', TRUE));
            $countrycode = html_escape($this->input->post('countrycode', TRUE));
            $datainsert             = [
                'id'                    => html_escape($this->input->post('id', TRUE)),
                'nama_driver'           => html_escape($this->input->post('nama_driver', TRUE)),
                'email'                 => html_escape($this->input->post('email', TRUE)),
                'countrycode'           => html_escape($this->input->post('countrycode', TRUE)),
                'phone'                 => html_escape($this->input->post('phone', TRUE)),
                'no_telepon'            => str_replace("+", "", $countrycode) . $phone,
                'gender'                => html_escape($this->input->post('gender', TRUE)),
                'alamat_driver'         => html_escape($this->input->post('alamat_driver', TRUE)),
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('ubah', 'Tidak Dapat Diproses Dalam Mode Demo');
                redirect('dashboard');
            }else{
                $this->driver->ubahdataid($datainsert);
                $this->session->set_flashdata('ubah', 'Driver Profile Has Been Changed');
                redirect('driver/detail/' . $id);
            }
            
        } else {
            $id = html_escape($this->input->post('id', TRUE));
            $data['apps'] = $this->app->getappbyid();
            $data['driver'] = $this->driver->getdriverbyid($id);
            $data['currency'] = $this->app->getappbyid();
            $data['countorder'] = $this->driver->countorder($id);
            $this->load->view('includes/header', $data);
            $this->load->view('drivers/detail', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function ubahkendaraan()
    {

        $this->form_validation->set_rules('jenis', 'jenis', 'trim|prep_for_form');
        $this->form_validation->set_rules('merek', 'merek', 'trim|prep_for_form');
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|prep_for_form');
        $this->form_validation->set_rules('nomor_kendaraan', 'nomor_kendaraan', 'trim|prep_for_form');
        $this->form_validation->set_rules('warna', 'warna', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'id_k'                      => html_escape($this->input->post('id_k', TRUE)),
                'jenis'                     => html_escape($this->input->post('jenis', TRUE)),
                'merek'                     => html_escape($this->input->post('merek', TRUE)),
                'tipe'                      => html_escape($this->input->post('tipe', TRUE)),
                'nomor_kendaraan'           => html_escape($this->input->post('nomor_kendaraan', TRUE)),
                'warna'                     => html_escape($this->input->post('warna', TRUE))
            ];

            $data2             = [

                'id'                        => html_escape($this->input->post('id', TRUE)),
                'job'                       => html_escape($this->input->post('jenis', TRUE)),

            ];
            $id = html_escape($this->input->post('id', TRUE));
            if (demo == TRUE){
                $this->session->set_flashdata('ubah', 'Tidak Dapat Diproses Dalam Mode Demo');
                redirect('dashboard');
            }else{
                $this->driver->ubahdatakendaraan($data, $data2);
                $this->session->set_flashdata('ubah', 'Driver Vechile Has Been Changed');
                redirect('driver/detail/' . $id);
            }
            
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['driver'] = $this->driver->getdriverbyid($id);
            $data['currency'] = $this->app->getappbyid();
            $data['countorder'] = $this->driver->countorder($id);
            $this->load->view('includes/header', $data);
            $this->load->view('drivers/detail', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function ubahfoto()
    {
        @$_FILES['foto']['name'];
        if ($_FILES != NULL) {
            $config['upload_path']     = './images/fotodriver/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');
            $id = $id = html_escape($this->input->post('id', TRUE));
            $data = $this->driver->getdriverbyid($id);
            if ($this->upload->do_upload('foto')) {
                if ($data['foto'] != 'noimage.jpg') {
                    $gambar = $data['foto'];
                    unlink('images/fotodriver/' . $gambar);
                }

                $foto = html_escape($this->upload->data('file_name'));
            } else {
                $foto = $data['foto'];
            }
            $data = [
                'foto'           => $foto,
                'id'               => html_escape($this->input->post('id', TRUE))
            ];
            $this->driver->ubahdatafoto($data);
            $this->session->set_flashdata('ubah', 'Driver Picture Has Been Changed');
            redirect('driver/detail/' . $id);
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['driver'] = $this->driver->getdriverbyid($id);
            $data['currency'] = $this->app->getappbyid();
            $data['countorder'] = $this->driver->countorder($id);
            $this->load->view('includes/header', $data);
            $this->load->view('drivers/detail', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function ubahpassword()
    {
        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $data = $this->input->post('password');
            $dataencrypt = sha1($data);

            $data             = [
                'id'            => html_escape($this->input->post('id', TRUE)),
                'password'      => $dataencrypt
            ];

            $this->driver->ubahdatapassword($data);
            $this->session->set_flashdata('ubah', 'Password Driver Berhasil Diubah');
            redirect('driver/detail/' . $id);
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['driver'] = $this->driver->getdriverbyid($id);
            $data['currency'] = $this->app->getappbyid();
            $data['countorder'] = $this->driver->countorder($id);
            $this->load->view('includes/header', $data);
            $this->load->view('driver/detail', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function upgrade()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['upgrade'] = $this->driver->dataupgrade();
        $this->load->view('includes/header',$data);
        $this->load->view('driver/upgrade', $data);
        $this->load->view('includes/footer',$data);
    }
    public function apprupgrade($id)
    {
        $dataupg                   = [
            'id'                            => $id,
            'status'                        => '1'
        ];
        
        $approved = $this->driver->approvedupg($dataupg);
        $this->driver->statusupgrade($dataupg);
        $this->session->set_flashdata('tambah', 'Prioritas Driver berhasil perbarui');
        redirect('driver/upgrade');
    }
    public function invoice($id){
        $data['apps'] = $this->app->getappbyid();
        $data['transaksi'] = $this->driver->datatransaksi($id)->row_array();
        $data['status'] = $this->driver->cekstatusbytrans($id)->row_array();
        $data['pelanggan'] = $this->driver->cekpelangganbytrans($id)->row_array();
        $data['driver'] = $this->driver->cekdriverbytrans($id)->row_array();
        $data['trxmerchant'] = $this->driver->detail_item($id)->result_array();
        $data['merchant'] = $this->driver->cektrxmerchantbyid($id)->row_array();
        $this->load->view('includes/header',$data);
        $this->load->view('driver/invoice', $data);
        $this->load->view('includes/footer',$data);
    }
}