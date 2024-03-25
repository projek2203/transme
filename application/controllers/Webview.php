<?php
class Webview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->database();
        $this->load->model('Webview_model', 'webview');
        $this->load->model('Appsettings', 'app');
        $this->load->library('form_validation');
    }
	function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['webview'] = $this->webview->getdata();
        $this->load->view('includes/header',$data);
		$this->load->view('webview/index', $data);
        $this->load->view('includes/footer',$data);
	}
    public function addweb()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|prep_for_form');
        $this->form_validation->set_rules('url', 'url', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/webview/';
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
                'url'                 => html_escape($this->input->post('url', TRUE)),
                'status'                => html_escape($this->input->post('status', TRUE))
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('tambah', 'Tidak Dapat Diproses Dalam Mode Demo');
                redirect('dashboard');
            }else{
                $this->webview->addweb($data);
                $this->session->set_flashdata('tambah', 'Web berhasil ditambahkan');
                redirect('webview');
            }
            
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('webview/tambah', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function editweb($id)
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|prep_for_form');
        $this->form_validation->set_rules('url', 'url', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');
        
        if ($this->form_validation->run() == TRUE) {  
            $config['upload_path']     = './images/webview/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            $data = $this->webview->getdatabyid($id);
            if ($this->upload->do_upload('ikon')) {
                if ($data['ikon'] != 'noimage.jpg') {
                    $gambar = $data['ikon'];
                    unlink('./images/webview/' . $gambar);
                }
                $app_logo = html_escape($this->upload->data('file_name'));
            } else {
                $app_logo = $data['ikon'];
            }
            $data                   = [
                'id'                            => html_escape($this->input->post('id', TRUE)),
                'nama'                          => html_escape($this->input->post('nama', TRUE)),
                'url'                         => html_escape($this->input->post('url', TRUE)),
                'ikon'                          => $app_logo,
                'status'                        => html_escape($this->input->post('status', TRUE))
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('tambah', 'Tidak Dapat Diproses Dalam Mode Demo');
                redirect('dashboard');
            }else{
                $this->webview->editweb($data);
                $this->session->set_flashdata('tambah', 'Webview berhasil Diubah');
                redirect('webview');
            }
            
        } else {
            
            $data['apps'] = $this->app->getappbyid();
            $data['webview'] = $this->webview->getdatabyid($id);
            $this->load->view('includes/header', $data);
            $this->load->view('webview/edit', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function hapusweb($id)
    {
        
        if (demo == TRUE){
            $this->session->set_flashdata('hapus', 'Tidak Dapat Diproses Dalam Mode Demo');
            redirect('dashboard');
        }else{
            $data = $this->webview->getdatabyid($id);
            $gambar = $data['ikon'];
            unlink('./images/webview/' . $gambar);
            $this->webview->hapusweb($id);
            $this->session->set_flashdata('hapus', 'Webview Berhasil Dihapus');
            redirect('webview');
        }
        
    }
}