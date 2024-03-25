<?php
class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Appsettings', 'app');
        $this->load->model('Berita_model', 'berita');
        $this->load->library('form_validation');
    }
	function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['news'] = $this->berita->getallnews();
        $data['kategori'] = $this->berita->getallkategorinews();
        $this->load->view('includes/header',$data);
		$this->load->view('berita/index', $data);
        $this->load->view('includes/footer',$data);
	}
    public function tambah()
    {
        $this->form_validation->set_rules('title', 'title', 'trim|prep_for_form');
        $this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/berita/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_berita')) {
                $gambar = html_escape($this->upload->data('file_name'));
            } else {
                $gambar = 'noimage.jpg';
            }
            $data             = [
                'foto_berita'                => $gambar,
                'title'                      => html_escape($this->input->post('title', TRUE)),
                'content'                    => $this->input->post('content', TRUE),
                'id_kategori'                => html_escape($this->input->post('id_kategori', TRUE)),
                'status_berita'              => html_escape($this->input->post('status_berita', TRUE))
            ];
            $this->berita->tambahdataberita($data);
            $this->session->set_flashdata('tambah', 'Berita Berhasil Ditambahkan');
            redirect('berita');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['news'] = $this->berita->getallkategorinews();
            $this->load->view('includes/header', $data);
            $this->load->view('berita/tambah', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    function addkategori()
	{
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'kategori'    => html_escape($this->input->post('kategori', TRUE))
            ];
            $this->berita->tambahdatakategori($data);
            $this->session->set_flashdata('tambah', 'Berhasil Ditambahkan');
            redirect('berita');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/header',$data);
            $this->load->view('berita/tambahkategori', $data);
            $this->load->view('includes/footer',$data);
        }
	}
    public function ubah($id)
    {
        $this->form_validation->set_rules('title', 'title', 'trim|prep_for_form');
        $this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|prep_for_form');
        $data['news'] = $this->berita->getnewsById($id);
        $id  = html_escape($this->input->post('id_berita', TRUE));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/berita/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_berita')) {
                if ($data['news']['foto_berita'] != 'noimage.jpg') {
                    $gambar = $data['news']['foto_berita'];
                    unlink('images/berita/' . $gambar);
                }
                $gambar = html_escape($this->upload->data('file_name'));
            } else {
                $gambar = $data['news']['foto_berita'];
            }
            $data             = [
                'id_berita'                     => html_escape($this->input->post('id_berita', TRUE)),
                'foto_berita'                   => $gambar,
                'title'                         => html_escape($this->input->post('title', TRUE)),
                'content'                       => $this->input->post('content'),
                'id_kategori'                   => html_escape($this->input->post('id_kategori', TRUE)),
                'status_berita'                 => html_escape($this->input->post('status_berita', TRUE))
            ];
            $this->berita->ubahdataberita($data);
            $this->session->set_flashdata('ubah', 'Berhasil Diubah');
            redirect('berita');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['knews'] = $this->berita->getallkategorinews();
            $this->load->view('includes/header', $data);
            $this->load->view('berita/ubah', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function hapus($id)
    {
        $data = $this->berita->getnewsById($id);
        if ($data['foto_berita'] != 'noimage.jpg') {
            $gambar = $data['foto_berita'];
            unlink('images/berita/' . $gambar);
        }
        $this->berita->hapusberitaById($id);
        $this->session->set_flashdata('hapus', 'Berita Telah Dihapus');
        redirect('berita');
    }
    public function hapuscategory($id)
    {
        $this->berita->hapuskategoribyid($id);
        $this->session->set_flashdata('hapus', 'Kategori Telah Dihapus');
        redirect('berita');
    }
}
