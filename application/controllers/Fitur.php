<?php
class Fitur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }

        $this->load->model('Fitur_model', 'service');
        $this->load->model('Appsettings', 'app');
        $this->load->library('form_validation');
    }


	function index()
	{
        $data = $this->service->getcurrency();
        $data['apps'] = $this->app->getappbyid();
        $data['service'] = $this->service->getallservice();
        $data['driverjob'] = $this->service->getAlldriverjob();
        $this->load->view('includes/header', $data);
		$this->load->view('fitur/index', $data);
        $this->load->view('includes/footer', $data);
	}
    public function ubahfitur($id)
    {

        $this->form_validation->set_rules('fitur', 'fitur', 'trim|prep_for_form');
        $this->form_validation->set_rules('home', 'home', 'trim|prep_for_form');
        $this->form_validation->set_rules('biaya', 'biaya', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan_biaya', 'keterangan_biaya', 'trim|prep_for_form');
        $this->form_validation->set_rules('komisi', 'komisi', 'trim|prep_for_form');
        $this->form_validation->set_rules('promo', 'promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('driver_job', 'driver_job', 'trim|prep_for_form');
        $this->form_validation->set_rules('biaya_minimum', 'biaya_minimum', 'trim|prep_for_form');
        $this->form_validation->set_rules('jarak_driver', 'jarak_driver', 'trim|prep_for_form');
        $this->form_validation->set_rules('jarak_minimum', 'jarak_minimum', 'trim|prep_for_form');
        $this->form_validation->set_rules('maks_distance', 'maks_distance', 'trim|prep_for_form');
        $this->form_validation->set_rules('wallet_minimum', 'wallet_minimum', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|prep_for_form');
        $this->form_validation->set_rules('startcolor', 'startcolor', 'trim|prep_for_form');
        $this->form_validation->set_rules('endcolor', 'endcolor', 'trim|prep_for_form');
        $this->form_validation->set_rules('angel', 'angel', 'trim|prep_for_form');
        $this->form_validation->set_rules('tint', 'tint', 'trim|prep_for_form');
        $this->form_validation->set_rules('usedtint', 'usedtint', 'trim|prep_for_form');
        $this->form_validation->set_rules('kota', 'kota', 'trim|prep_for_form');
        $this->form_validation->set_rules('padding', 'padding', 'trim|prep_for_form');
        $data = $this->service->getfiturbyid($id);
        $data['job'] = $this->service->getalldriverjob($id);
        $data['driverjob'] = $this->service->getAlldriverjob();

        $id = html_escape($this->input->post('id_fitur', TRUE));
        // $data['service'] = $this->service->getallservice();
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/fitur/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('icon')) {
                if ($data['icon'] != 'noimage.jpg') {
                    $gambar = $data['icon'];
                    unlink('images/fitur/' . $gambar);
                }
                $gambar = html_escape($this->upload->data('file_name'));
            } else {
                $gambar = $data['icon'];
            }

            $biaya = html_escape($this->input->post('biaya', TRUE));
            $biaya_minimum = html_escape($this->input->post('biaya_minimum', TRUE));
            $wallet_minimum = html_escape($this->input->post('wallet_minimum', TRUE));

            $remove = array(".", ",");
            $add = array("", "");

            $data             = [
                'icon'                          => $gambar,
                'id_fitur'                      => html_escape($this->input->post('id_fitur', TRUE)),
                'fitur'                         => html_escape($this->input->post('fitur', TRUE)),
                'home'                         => html_escape($this->input->post('home', TRUE)),
                'urutan'                        => html_escape($this->input->post('urutan', TRUE)),
                'biaya'                         => str_replace($remove, $add, $biaya),
                'keterangan_biaya'              => html_escape($this->input->post('keterangan_biaya', TRUE)),
                'komisi'                        => html_escape($this->input->post('komisi', TRUE)),
                'promo'                        => html_escape($this->input->post('promo', TRUE)),
                'driver_job'                    => html_escape($this->input->post('driver_job', TRUE)),
                'biaya_minimum'                 => str_replace($remove, $add, $biaya_minimum),
                'jarak_driver'                 => html_escape($this->input->post('jarak_driver', TRUE)),
                'jarak_minimum'                 => html_escape($this->input->post('jarak_minimum', TRUE)),
                'maks_distance'                 => html_escape($this->input->post('maks_distance', TRUE)),
                'wallet_minimum'                => str_replace($remove, $add, $wallet_minimum),
                'keterangan'                    => html_escape($this->input->post('keterangan', TRUE)),
                'keterangan'                    => html_escape($this->input->post('keterangan', TRUE)),
                'startcolor'                    => html_escape($this->input->post('startcolor', TRUE)),
                'endcolor'                    => html_escape($this->input->post('endcolor', TRUE)),
                'angel'                    => html_escape($this->input->post('angel', TRUE)),
                'tint'                    => html_escape($this->input->post('tint', TRUE)),
                'padding'                    => html_escape($this->input->post('padding', TRUE)),
                'usedtint'                    => html_escape($this->input->post('usedtint', TRUE)),
                'kota'                    => html_escape($this->input->post('kota', TRUE)),
                'active'                        => html_escape($this->input->post('active', TRUE))
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('ubah', 'Tidak Dapat Diproses Dalam Mode Demo');
                redirect('dashboard');
            }else{
                $this->service->ubahdatafitur($data);
                $this->session->set_flashdata('ubah', 'Fitur Berhasil Diubah');
                redirect('fitur');
            }
            
        } else {
            $data['apps'] = $this->app->getappbyid(); 
            $this->load->view('includes/header',$data);
            $this->load->view('fitur/ubah' . $id, $data);
            $this->load->view('includes/footer',$data);
        }
    }
    function tambahfitur(){
        $this->form_validation->set_rules('fitur', 'fitur', 'trim|prep_for_form');
        $this->form_validation->set_rules('home', 'home', 'trim|prep_for_form');
        $this->form_validation->set_rules('biaya', 'biaya', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan_biaya', 'keterangan_biaya', 'trim|prep_for_form');
        $this->form_validation->set_rules('komisi', 'komisi', 'trim|prep_for_form');
        $this->form_validation->set_rules('promo', 'promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('driver_job', 'driver_job', 'trim|prep_for_form');
        $this->form_validation->set_rules('biaya_minimum', 'biaya_minimum', 'trim|prep_for_form');
        $this->form_validation->set_rules('jarak_driver', 'jarak_driver', 'trim|prep_for_form');
        $this->form_validation->set_rules('jarak_minimum', 'jarak_minimum', 'trim|prep_for_form');
        $this->form_validation->set_rules('maks_distance', 'maks_distance', 'trim|prep_for_form');
        $this->form_validation->set_rules('wallet_minimum', 'wallet_minimum', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|prep_for_form');
        $this->form_validation->set_rules('startcolor', 'startcolor', 'trim|prep_for_form');
        $this->form_validation->set_rules('endcolor', 'endcolor', 'trim|prep_for_form');
        $this->form_validation->set_rules('angel', 'angel', 'trim|prep_for_form');
        $this->form_validation->set_rules('tint', 'tint', 'trim|prep_for_form');
        $this->form_validation->set_rules('usedtint', 'usedtint', 'trim|prep_for_form');
        $this->form_validation->set_rules('active', 'active', 'trim|prep_for_form');
        $this->form_validation->set_rules('kota', 'kota', 'trim|prep_for_form');
        $this->form_validation->set_rules('padding', 'padding', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/fitur/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('icon')) {
                $gambar = html_escape($this->upload->data('file_name'));
            } else {
                $gambar = 'noimage.jpg';
            }
            $biaya = html_escape($this->input->post('biaya', TRUE));
            $biaya_minimum = html_escape($this->input->post('biaya_minimum', TRUE));
            $wallet_minimum = html_escape($this->input->post('wallet_minimum', TRUE));
            $remove = array(".", ",");
            $add = array("", "");
            $data             = [
                'icon'                          => $gambar,
                'fitur'                         => html_escape($this->input->post('fitur', TRUE)),
                'home'                         => html_escape($this->input->post('home', TRUE)),
                'biaya'                         => str_replace($remove, $add, $biaya),
                'keterangan_biaya'              => html_escape($this->input->post('keterangan_biaya', TRUE)),
                'komisi'                        => html_escape($this->input->post('komisi', TRUE)),
                'promo'                        => html_escape($this->input->post('promo', TRUE)),
                'driver_job'                    => html_escape($this->input->post('driver_job', TRUE)),
                'biaya_minimum'                 => str_replace($remove, $add, $biaya_minimum),
                'jarak_driver'                 => html_escape($this->input->post('jarak_driver', TRUE)),
                'jarak_minimum'                 => html_escape($this->input->post('jarak_minimum', TRUE)),
                'maks_distance'                 => html_escape($this->input->post('maks_distance', TRUE)),
                'wallet_minimum'                => str_replace($remove, $add, $wallet_minimum),
                'keterangan'                    => html_escape($this->input->post('keterangan', TRUE)),
                'startcolor'                    => html_escape($this->input->post('startcolor', TRUE)),
                'endcolor'                    => html_escape($this->input->post('endcolor', TRUE)),
                'angel'                    => html_escape($this->input->post('angel', TRUE)),
                'tint'                    => html_escape($this->input->post('tint', TRUE)),
                'padding'                    => html_escape($this->input->post('padding', TRUE)),
                'usedtint'                    => html_escape($this->input->post('usedtint', TRUE)),
                'kota'                    => html_escape($this->input->post('kota', TRUE)),
                'active'                        => html_escape($this->input->post('active', TRUE))
            ];
            if (demo == TRUE){
                $this->session->set_flashdata('fitur', 'Tidak Dapat Disimpan Dalam Mode Demo');
                redirect('pengaturan');
            }else{
                $this->service->tambahdatafitur($data);
                $this->session->set_flashdata('fitur', 'Fitur Berhasil Ditambahkan');
                redirect('fitur');
            }
           
        } else {
            $data['apps'] = $this->app->getappbyid(); 
            $data['driverjob'] = $this->service->getAlldriverjob();
            $this->load->view('includes/header', $data);
            $this->load->view('fitur/tambah', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function hapusfitur($id)
    {
        if (demo == TRUE){
            $this->session->set_flashdata('hapus', 'Tidak Dapat Diproses Dalam Mode Demo');
            redirect('dashboard');
        }else{
            $data = $this->service->getfiturbyid($id);
            if ($data['icon'] != 'noimage.jpg') {
                $gambar = $data['icon'];
                unlink('images/fitur/' . $gambar);
            }
            $this->service->hapusserviceById($id);
            $this->session->set_flashdata('hapus', 'Fitur Berhasil Dihapus');
            redirect('fitur');
        }
    }
}
