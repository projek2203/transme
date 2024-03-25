<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
      
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->model('Appsettings', 'app');
        $this->load->model('Promo_model', 'promo');
        $this->load->model('Admin_dashboard', 'dashboard');
        $this->load->model('Fitur_model', 'fitur');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['promocode'] = $this->promo->getallpromocode();
        $data['akses']     = $this->dashboard->aksesperizinan($this->session->userdata('grup'));
        $this->load->view('includes/header',$data);
        $this->load->view('promo/index', $data);
        $this->load->view('includes/footer',$data);
    }
    public function tambah()
    {
        
        $this->form_validation->set_rules('nama_promo', 'nama_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('kode_promo', 'kode_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('nominal_promo', 'nominal_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|prep_for_form');
        $this->form_validation->set_rules('type_promo', 'type_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('minimal', 'minimal', 'trim|prep_for_form');
        $this->form_validation->set_rules('fitur', 'fitur', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');
        $this->form_validation->set_rules('jenis', 'jenis', 'trim|prep_for_form');
        $this->form_validation->set_rules('image_promo', 'image_promo', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/promo/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image_promo')) {
                $gambar = html_escape($this->upload->data('file_name'));
            } else {
                $gambar = 'noimage.jpg';
            }
            if ($this->input->post('type_promo') == 'persen') {
                $nominal = html_escape($this->input->post('nominal_promo_persen', TRUE));
            }else if ($this->input->post('type_promo') == 'persen') {
                $nominal = html_escape($this->input->post('nominal_promo', TRUE));
            } else {
                $nominal = html_escape($this->input->post('nominal_promo', TRUE));
            }
            $data             = [
                'image_promo'                       => $gambar,
                'nama_promo'              => html_escape($this->input->post('nama_promo', TRUE)),
                'kode_promo'              => html_escape($this->input->post('kode_promo', TRUE)),
                'nominal_promo'              => $nominal,
                'keterangan'              => html_escape($this->input->post('keterangan', TRUE)),
                'type_promo'              => html_escape($this->input->post('type_promo', TRUE)),
                'minimal'              => html_escape($this->input->post('minimal', TRUE)),
                'expired'              => html_escape($this->input->post('expired', TRUE)),
                'fitur'                  => html_escape($this->input->post('fitur', TRUE)),
                'status'                       => html_escape($this->input->post('status', TRUE)),
                'jenis'                       => html_escape($this->input->post('jenis', TRUE))
            ];
                $cekpromo = $this->promo->cekpromo($this->input->post('kode_promo'));
                if ($cekpromo->num_rows() > 0){
                    $this->session->set_flashdata('promo', 'Promo Sudah Ada');
                    redirect('promo/tambah');
                }else{
                    $this->promo->addpromocode($data);
                    $this->session->set_flashdata('tambah', 'Promo Ditambahkan');
                    redirect('promo');
                }
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['akses']     = $this->dashboard->aksesperizinan($this->session->userdata('grup'));
            $data['fitur'] = $this->fitur->getallservice();
            $this->load->view('includes/header',$data);
            $this->load->view('promo/tambah', $data);
            $this->load->view('includes/footer',$data);
        }
    }
    public function editpromocode($id)
    { 
        $this->form_validation->set_rules('nama_promo', 'nama_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('kode_promo', 'kode_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('point', 'point', 'trim|prep_for_form');
        $this->form_validation->set_rules('nominal_promo', 'nominal_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|prep_for_form');
        $this->form_validation->set_rules('type_promo', 'type_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('minimal', 'minimal', 'trim|prep_for_form');
        $this->form_validation->set_rules('fitur', 'fitur', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');
        $this->form_validation->set_rules('jenis', 'jenis', 'trim|prep_for_form');
        $this->form_validation->set_rules('image_promo', 'image_promo', 'trim|prep_for_form');
        $data['promo'] = $this->promo->getpromobyid($id)->row_array();
        $data['fitur'] = $this->fitur->getallservice();
        
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('type_promo') == 'persen'){
                $nominal = html_escape($this->input->post('nominal_promo_persen', TRUE));
            } else {
                $nominal = str_replace(".","",html_escape($this->input->post('nominal_promo', TRUE)));
            }

            $config['upload_path']     = './images/promo/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = time();
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_promo')) {
                unlink('images/promo/' . $this->promo->getpromobyid($id)->row('image_promo'));
                $gambar = html_escape($this->upload->data('file_name'));
                $datainsert             = [
                    'id_promo'                  => html_escape($this->input->post('id_promo', TRUE)),
                    'image_promo'                       => $gambar,
                    'nama_promo'              => html_escape($this->input->post('nama_promo', TRUE)),
                    'point'              => html_escape($this->input->post('point', TRUE)),
                    'kode_promo'              => html_escape($this->input->post('kode_promo', TRUE)),
                    'nominal_promo'              => $nominal,
                    'keterangan'              => html_escape($this->input->post('keterangan', TRUE)),
                    'type_promo'              => html_escape($this->input->post('type_promo', TRUE)),
                    'minimal'              => html_escape($this->input->post('minimal', TRUE)),
                    'expired'              => html_escape($this->input->post('expired', TRUE)),
                    'fitur'                  => html_escape($this->input->post('fitur', TRUE)),
                    'status'                       => html_escape($this->input->post('status', TRUE)),
                    'jenis'                       => html_escape($this->input->post('jenis', TRUE))
                ];
            } else {
                $datainsert             = [
                    'id_promo'                  => html_escape($this->input->post('id_promo', TRUE)),
                    'nama_promo'              => html_escape($this->input->post('nama_promo', TRUE)),
                    'kode_promo'              => html_escape($this->input->post('kode_promo', TRUE)),
                    'point'              => html_escape($this->input->post('point', TRUE)),
                    'nominal_promo'              => $nominal,
                    'keterangan'              => html_escape($this->input->post('keterangan', TRUE)),
                    'type_promo'              => html_escape($this->input->post('type_promo', TRUE)),
                    'minimal'              => html_escape($this->input->post('minimal', TRUE)),
                    'expired'              => html_escape($this->input->post('expired', TRUE)),
                    'fitur'                  => html_escape($this->input->post('fitur', TRUE)),
                    'status'                       => html_escape($this->input->post('status', TRUE)),
                    'jenis'                       => html_escape($this->input->post('jenis', TRUE))
                ];
            }
                $cekpromo = $this->promo->cekpromo($this->input->post('kode_promo'));
                if ($cekpromo->num_rows() > 0 && $cekpromo->row_array()['id_promo'] != $this->input->post('id_promo')){
                    $this->session->set_flashdata('demo', 'Promotion code already exist');
                    $data['apps'] = $this->app->getappbyid();
                    $this->load->view('includes/header', $data);
                    $this->load->view('promo/edit', $data);
                    $this->load->view('includes/footer', $data);
                }else{
                $this->promo->editpromocode($datainsert);
                $this->session->set_flashdata('tambah', 'Promotion code Has Been Changed');
                redirect('promo');
            }
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('promo/edit', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function hapus($id)
    {
        $data = $this->promo->getpromocodeById($id);
        if ($data['image_promo'] != 'noimage.jpg') {
            $gambar = $data['image_promo'];
            unlink('images/promo/' . $gambar);
        }
        $this->promo->hapuspromocodeById($id);
        $this->session->set_flashdata('hapus', 'Promo Code Has Been deleted');
        redirect('promo');
    }
}
