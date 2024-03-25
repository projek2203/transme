<?php
class Digiflazz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Appsettings', 'app');
        $this->load->model('Digiflazz_model', 'digi');
        $this->load->library('form_validation');
    }
    function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['kategori'] = $this->digi->getAllKategori();
        $this->load->view('includes/header',$data);
		$this->load->view('digiflazz/index', $data);
        $this->load->view('includes/footer',$data);
	}
	function riwayat()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['histori'] = $this->digi->getallhistori();
        $data['brand'] = $this->digi->getAllBrand();
        $this->load->view('includes/header',$data);
		$this->load->view('digiflazz/riwayat', $data);
        $this->load->view('includes/footer',$data);
	}
    public function tambahkategori()
    {
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/ppob/kategori/';
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
                'nama'                  => html_escape($this->input->post('kategori', TRUE)),
                'kategori'                  => html_escape($this->input->post('kategori', TRUE)),
                'status'                => html_escape($this->input->post('status', TRUE))
            ];
            $this->digi->addkategori($data);
            $this->session->set_flashdata('tambah', 'Kategori berhasil ditambahkan');
            redirect('digiflazz');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('digiflazz/tambah', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function editkategori($id)
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|prep_for_form');
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|prep_for_form');
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');
        
        if ($this->form_validation->run() == TRUE) {  
            $config['upload_path']     = './images/ppob/kategori/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            $data = $this->digi->listkategoribyid($id);
            if ($this->upload->do_upload('ikon')) {
                if ($data['ikon'] != 'noimage.jpg') {
                    $gambar = $data['ikon'];
                    unlink('./images/ppob/kategori/' . $gambar);
                }
                $app_logo = html_escape($this->upload->data('file_name'));
            } else {
                $app_logo = $data['ikon'];
            }
            $data                   = [
                'id'                            => html_escape($this->input->post('id', TRUE)),
                'nama'                          => html_escape($this->input->post('nama', TRUE)),
                'kategori'                         => html_escape($this->input->post('kategori', TRUE)),
                'tipe'                    => html_escape($this->input->post('tipe', TRUE)),
                'ikon'                          => $app_logo,
                'status'                        => html_escape($this->input->post('status', TRUE))
            ];
            $this->digi->editkategori($data);
            $this->session->set_flashdata('tambah', 'Kategori berhasil Diubah');
            redirect('digiflazz');
        } else {
            
            $data['apps'] = $this->app->getappbyid();
            $data['digiflazz'] = $this->digi->listkategoribyid($id);
            $this->load->view('includes/header', $data);
            $this->load->view('digiflazz/edit', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function hapuskategori($id)
    {
        $data = $this->digi->listkategoribyid($id);
        $gambar = $data['ikon'];
        unlink('./images/ppob/kategori/' . $gambar);
        $this->digi->hapuskatbyid($id);
        $this->session->set_flashdata('hapus', 'Kategori Berhasil Dihapus');
        redirect('digiflazz');
    }
//-------------------------------- Info Brand -----------------------------------------
    function listbrand()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['brand'] = $this->digi->getAllBrand();
        $data['currency'] = $this->app->getappbyid();
        $this->load->view('includes/header',$data);
        $this->load->view('digiflazz/listbrand', $data);
        $this->load->view('includes/footer',$data);
    }
    public function tambahproduk()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|prep_for_form');
        $this->form_validation->set_rules('brand', 'brand', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|prep_for_form');
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');
        $this->form_validation->set_rules('fee', 'fee', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/ppob/brand/';
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
            $uniqid = rand ( 10000 , 99999 );
            $data             = [
                'kode'                  => $uniqid,
                'ikon'                  => $gambar,
                'nama'                  => html_escape($this->input->post('nama', TRUE)),
                'brand'                  => strtoupper(html_escape($this->input->post('brand', TRUE))),
                'keterangan'                  => html_escape($this->input->post('keterangan', TRUE)),
                'type'                  => html_escape($this->input->post('tipe', TRUE)),
                'fee'                  => html_escape($this->input->post('fee', TRUE)),
                'status'                => html_escape($this->input->post('status', TRUE))
            ];
            $this->digi->addproduk($data);
            $this->session->set_flashdata('tambah', 'Produk berhasil ditambahkan');
            redirect('digiflazz/listbrand');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['listbrand'] = $this->digi->getalldigikategori();
            $this->load->view('includes/header', $data);
            $this->load->view('digiflazz/tambahbrand', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function editbrand($id)
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|prep_for_form');
        $this->form_validation->set_rules('brand', 'brand', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|prep_for_form');
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');
        $this->form_validation->set_rules('fee', 'fee', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {  
            $config['upload_path']     = './images/ppob/kategori/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            $data = $this->digi->listbrandbyid($id);
            if ($this->upload->do_upload('ikon')) {
                if ($data['ikon'] != 'noimage.jpg') {
                    $gambar = $data['ikon'];
                    unlink('./images/ppob/brand/' . $gambar);
                }
                $app_logo = html_escape($this->upload->data('file_name'));
            } else {
                $app_logo = $data['ikon'];
            }
            $data             = [
                'id'                    => html_escape($this->input->post('id', TRUE)),
                'ikon'                  => $app_logo,
                'nama'                  => html_escape($this->input->post('nama', TRUE)),
                'brand'                 => strtoupper(html_escape($this->input->post('brand', TRUE))),
                'keterangan'            => html_escape($this->input->post('keterangan', TRUE)),
                'type'                  => html_escape($this->input->post('type', TRUE)),
                'fee'                  => html_escape($this->input->post('fee', TRUE)),
                'status'                => html_escape($this->input->post('status', TRUE))
            ];
            $this->digi->editbrand($data);
            $this->session->set_flashdata('tambah', 'Brand berhasil Diubah');
            redirect('digiflazz/listbrand');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['listbrand'] = $this->digi->getalldigikategori();
            $data['digiflazz'] = $this->digi->listbrandbyid($id);
            $this->load->view('includes/header', $data);
            $this->load->view('digiflazz/editbrand', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function hapusbrand($id)
    {
        $data = $this->digi->listbrandbyid($id);
        $gambar = $data['ikon'];
        unlink('./images/ppob/brand/' . $gambar);
        $this->digi->hapusbrandbyid($id);
        $this->session->set_flashdata('hapus', 'Produk Berhasil Dihapus');
        redirect('digiflazz/listbrand');
    }
}