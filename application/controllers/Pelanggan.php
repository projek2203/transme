<?php
class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->model('Appsettings', 'app');
        $this->load->model('User_dashboard', 'user');
        $this->load->library('form_validation');
    }


	function index()
	{
        $data['apps'] = $this->app->getappbyid();
        $data['user'] = $this->user->getallusers();
        $this->load->view('includes/header', $data);
		$this->load->view('pelanggan/index', $data);
        $this->load->view('includes/footer', $data);
	}
    public function detail($id)
    {
        $data['apps'] = $this->app->getappbyid();
        $data['currency'] = $this->app->getappbyid();
        $data['pelanggan'] = $this->user->getcsbyid($id);
        $data['countorder'] = $this->user->countorder($id);
        $data['wallet'] = $this->user->wallet($id);
        $data['totalsaldo'] = $this->user->saldobyid($id);
        $this->load->view('includes/header',$data);
        $this->load->view('pelanggan/detail', $data);
        $this->load->view('includes/footer',$data);
    }
    public function ubahid()
    {

        $this->form_validation->set_rules('fullnama', 'fullnama', 'trim|prep_for_form');
        $this->form_validation->set_rules('no_telepon', 'no_telepon', 'trim|prep_for_form');
        $this->form_validation->set_rules('email', 'email', 'trim|prep_for_form');
        $id = html_escape($this->input->post('id', TRUE));
        $countrycode = html_escape($this->input->post('countrycode', TRUE));
        $phone = html_escape($this->input->post('phone', TRUE));
         $this->form_validation->set_rules('refferal', 'refferal', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'phone'                     => html_escape($this->input->post('phone', TRUE)),
                'countrycode'               => html_escape($this->input->post('countrycode', TRUE)),
                'id'                        => html_escape($this->input->post('id', TRUE)),
                'fullnama'                    => html_escape($this->input->post('fullnama', TRUE)),
                'no_telepon'                => str_replace("+", "", $countrycode) . $phone,
                'email'                        => html_escape($this->input->post('email', TRUE)),
                'tgl_lahir'                        => html_escape($this->input->post('tgl_lahir', TRUE)),
                'refferal'                    => html_escape($this->input->post('refferal', TRUE))

            ];
            $this->user->ubahdataid($data);
            $this->session->set_flashdata('ubahinfo', 'Info Pelanggan Berhasil Diubah');
            redirect('pelanggan/detail/' . $id);
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['currency'] = $this->app->getappbyid();
            $data['user'] = $this->user->getusersbyid($id);
            $data['countorder'] = $this->user->countorder($id);
            $this->load->view('includes/header', $data);
            $this->load->view('pelanggan/detail', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function ubahpass()
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
            $this->user->ubahdatapassword($data);
            $this->session->set_flashdata('ubahpass', 'Password Berhasil Diubah');
            redirect('pelanggan/detail/' . $id);
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['currency'] = $this->app->getappbyid();
            $data['user'] = $this->user->getusersbyid($id);
            $data['countorder'] = $this->user->countorder($id);
            $this->load->view('includes/header', $data);
            $this->load->view('pelanggan/detail', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function ubahfoto()
    {

        $config['upload_path']     = './images/pelanggan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']         = '10000';
        $config['file_name']     = 'name';
        $config['encrypt_name']     = true;
        $this->load->library('upload', $config);
        $id = $id = html_escape($this->input->post('id', TRUE));
        $data = $this->user->getusersbyid($id);

        if ($this->upload->do_upload('fotopelanggan')) {
            if ($data['fotopelanggan'] != 'noimage.jpg') {
                $gambar = $data['fotopelanggan'];
                unlink('images/pelanggan/' . $gambar);
            }

            $foto = html_escape($this->upload->data('file_name'));

            $data = [
                'fotopelanggan'       => $foto,
                'id'        => html_escape($this->input->post('id', TRUE))
            ];
            $this->user->ubahdatafoto($data);
            $this->session->set_flashdata('ubahfoto', 'Foto Berhasil Diubah');
            redirect('pelanggan/detail/' . $id);
        } else {
            $data['apps'] = $this->app->getappbyid();
            $data['currency'] = $this->app->getappbyid();
            $data['user'] = $this->user->getusersbyid($id);
            $data['countorder'] = $this->user->countorder($id);
            $this->load->view('includes/header', $data);
            $this->load->view('pelanggan/detail', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function userblock($id)
    {
        $this->user->blockuserbyid($id);
        redirect('pelanggan');
    }
    public function userunblock($id)
    {
        $this->user->unblockuserbyid($id);
        redirect('pelanggan');
    }
    public function hapususers($id)
    {
        
        if (demo == TRUE){
            $this->session->set_flashdata('hapus', 'Tidak Dapat Diproses Dalam Mode Demo');
            redirect('dashboard');
        }else{
            $data = $this->user->getusersbyid($id);
            $gambar = $data['fotopelanggan'];
            unlink('images/pelanggan/' . $gambar);
            $this->user->hapusdatauserbyid($id);
            $this->session->set_flashdata('hapus', 'User Has Been Deleted');
            redirect('pelanggan/index');
        }
        
    }
}
