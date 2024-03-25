<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->database();
        $this->load->model('Staff_model', 'staff');
        $this->load->model('Appsettings', 'app');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['staff'] = $this->staff->getallstaff();
        $this->load->view('includes/header', $data);
        $this->load->view('staff/index', $data);
        $this->load->view('includes/footer', $data);
    }
    public function tambahakun()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|prep_for_form');
        $this->form_validation->set_rules('email', 'email', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');
        $this->form_validation->set_rules('kota', 'kota', 'trim|prep_for_form');
        $this->form_validation->set_rules('level', 'level', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/admin/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('ikon')) {
                $gambar = html_escape($this->upload->data('file_name'));
            } else {
                $gambar = 'noimage.jpg';
            }
            $data             = [
                'image'                  => $gambar,
                'user_name'                  => html_escape($this->input->post('username', TRUE)),
                'email'                  => html_escape($this->input->post('email', TRUE)),
                'password'                  => sha1(html_escape($this->input->post('password', TRUE))),
                'kota'                => html_escape($this->input->post('kota', TRUE)),
                'level'                => html_escape($this->input->post('level', TRUE))
            ];
            $this->staff->addstaff($data);
            $this->session->set_flashdata('tambah', 'Staff berhasil ditambahkan');
            redirect('staff');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('staff/tambah', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function editstaff($id)
    {
        $this->form_validation->set_rules('username', 'username', 'trim|prep_for_form');
        $this->form_validation->set_rules('email', 'email', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');
        $this->form_validation->set_rules('level', 'level', 'trim|prep_for_form');
        $this->form_validation->set_rules('kota', 'kota', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {  
            $config['upload_path']     = './images/admin/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            $data = $this->staff->getstaffbyid($id);
            if ($this->upload->do_upload('ikon')) {
                if ($data['image'] != 'noimage.jpg') {
                    $gambar = $data['image'];
                    unlink('./images/admin/' . $gambar);
                }
                $app_logo = html_escape($this->upload->data('file_name'));
            } else {
                $app_logo = $data['image'];
            }
            $data                   = [
                'id'                            => html_escape($this->input->post('id', TRUE)),
                'user_name'                          => html_escape($this->input->post('username', TRUE)),
                'email'                         => html_escape($this->input->post('email', TRUE)),
                'password'                    => sha1(html_escape($this->input->post('password', TRUE))),
                'image'                          => $app_logo,
                'kota'                    => sha1(html_escape($this->input->post('kota', TRUE))),
                'level'                        => html_escape($this->input->post('level', TRUE))
            ];
            $this->staff->editstaff($data);
            $this->session->set_flashdata('tambah', 'Staff berhasil Diubah');
            redirect('staff');
        } else {  
            $data['apps'] = $this->app->getappbyid();
            $data['staff'] = $this->staff->getstaffbyid($id);
            $this->load->view('includes/header', $data);
            $this->load->view('staff/edit', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function hapusstaff($id)
    {
        $data = $this->staff->getstaffbyid($id);
        $gambar = $data['image'];
        unlink('./images/admin/' . $gambar);
        $this->staff->hapusstaffbyid($id);
        $this->session->set_flashdata('hapus', 'Staff Berhasil Dihapus');
        redirect('staff');
    }
}