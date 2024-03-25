<?php
class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->database();
        $this->load->model('Appsettings', 'app');
        $this->load->model('Paket_model', 'paket');
        $this->load->library('form_validation');
    }
	function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['paket'] = $this->paket->getAllpaket();
        $this->load->view('includes/header',$data);
		$this->load->view('paket/index', $data);
        $this->load->view('includes/footer',$data);
	}
    public function addpaket()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|prep_for_form');
        $this->form_validation->set_rules('harga', 'harga', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/package/';
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
                'ikon'                  => $gambar,
                'nama'                  => html_escape($this->input->post('nama', TRUE)),
                'harga'                 => html_escape($this->input->post('harga', TRUE)),
                'keterangan'                 => html_escape($this->input->post('keterangan', TRUE)),
                'status'                => html_escape($this->input->post('status', TRUE))
            ];
            $this->paket->addpaket($data);
            $this->session->set_flashdata('tambah', 'Paket berhasil ditambahkan');
            redirect('paket');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('paket/tambah', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function editpaket($id)
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|prep_for_form');
        $this->form_validation->set_rules('harga', 'harga', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');
        
        if ($this->form_validation->run() == TRUE) {  
            $config['upload_path']     = './images/package/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            $data = $this->paket->getpaketbyid($id);
            if ($this->upload->do_upload('ikon')) {
                if ($data['ikon'] != 'noimage.jpg') {
                    $gambar = $data['ikon'];
                    unlink('./images/package/' . $gambar);
                }
                $app_logo = html_escape($this->upload->data('file_name'));
            } else {
                $app_logo = $data['ikon'];
            }
            $data                   = [
                'id'                            => html_escape($this->input->post('id', TRUE)),
                'nama'                          => html_escape($this->input->post('nama', TRUE)),
                'harga'                         => html_escape($this->input->post('harga', TRUE)),
                'keterangan'                    => html_escape($this->input->post('keterangan', TRUE)),
                'ikon'                          => $app_logo,
                'status'                        => html_escape($this->input->post('status', TRUE))
            ];
            $this->paket->editpaket($data);
            $this->session->set_flashdata('tambah', 'Paket berhasil Diubah');
            redirect('paket');
        } else {
            
            $data['apps'] = $this->app->getappbyid();
            $data['paket'] = $this->paket->getpaketbyid($id);
            $this->load->view('includes/header', $data);
            $this->load->view('paket/edit', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function hapuspaket($id)
    {
        $data = $this->paket->getpaketbyid($id);
        $gambar = $data['ikon'];
        unlink('./images/package/' . $gambar);
        $this->paket->hapuspaketbyid($id);
        $this->session->set_flashdata('hapus', 'Paket Berhasil Dihapus');
        redirect('paket');
    }
}
