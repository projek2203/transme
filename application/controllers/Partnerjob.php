<?php
class Partnerjob extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        

        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->model('Appsettings', 'app');
        $this->load->model('Partnerjob_model', 'partnerjob');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['apps'] = $this->app->getappbyid();
        $data['partnerjob'] = $this->partnerjob->getAllpartnerjob();
        $this->load->view('includes/header',$data);
        $this->load->view('partnerjob/index', $data);
        $this->load->view('includes/footer',$data);
    }

    public function addpartnerjob()
    {
        $this->form_validation->set_rules('icon', 'icon', 'trim|prep_for_form');
        $this->form_validation->set_rules('driver_job', 'driver_job', 'trim|prep_for_form');
        $this->form_validation->set_rules('status_job', 'status_job', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {


            $data             = [
                'icon'              => html_escape($this->input->post('icon', TRUE)),
                'driver_job'              => html_escape($this->input->post('driver_job', TRUE)),
                'status_job'                  => html_escape($this->input->post('status_job', TRUE))
            ];

            $this->partnerjob->addpartnerjob($data);
            $this->session->set_flashdata('tambah', 'Partner Job Has Been Added');
            redirect('partnerjob');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/header',$data);
            $this->load->view('partnerjob/tambah',$data);
            $this->load->view('includes/footer',$data);
        }
    }

    public function editpartnerjob($id)
    {
        $this->form_validation->set_rules('icon', 'icon', 'trim|prep_for_form');
        $this->form_validation->set_rules('driver_job', 'driver_job', 'trim|prep_for_form');
        $this->form_validation->set_rules('status_job', 'status_job', 'trim|prep_for_form');

        $data['partnerjob'] = $this->partnerjob->getpartnerjobById($id);
        $id  = html_escape($this->input->post('id', TRUE));

        if ($this->form_validation->run() == TRUE) {


            $data             = [
                'id'                            => html_escape($this->input->post('id', TRUE)),
                'icon'              => html_escape($this->input->post('icon', TRUE)),
                'driver_job'              => html_escape($this->input->post('driver_job', TRUE)),
                'status_job'                  => html_escape($this->input->post('status_job', TRUE))
            ];
            $this->partnerjob->editdatapartnerjob($data);
            $this->session->set_flashdata('tambah', 'Partner Job Has Been Changed');
            redirect('partnerjob');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/header',$data);
            $this->load->view('partnerjob/edit', $data);
            $this->load->view('includes/footer',$data);
        }
    }

    public function deletepartnerjob($id)
    {
        $data = $this->partnerjob->getpartnerjobById($id);
        $this->partnerjob->deletepartnerjobById($id);
        $this->session->set_flashdata('hapus', 'Partner Job Has Been deleted');
        redirect('partnerjob');
    }
}