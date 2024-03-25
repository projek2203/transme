<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Poin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('Fitur_model', 'service');
		$this->load->model('Appsettings', 'app');
        $this->load->model('Poin_model', 'point');
		$this->load->library('form_validation');
	}

	function index()
	{
        $data = $this->service->getcurrency();
        $data['apps'] = $this->app->getappbyid();
        $data['poin'] = $this->point->getallpoin();
        $this->load->view('includes/header',$data);
		$this->load->view('poin/index', $data);
        $this->load->view('includes/footer',$data);
	}
	function tambah()
	{
		$this->form_validation->set_rules('kode', 'kode', 'trim|prep_for_form');
		$this->form_validation->set_rules('nama', 'nama', 'trim|prep_for_form');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|prep_for_form');
		$this->form_validation->set_rules('poin', 'poin', 'trim|prep_for_form');
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|prep_for_form');
        $this->form_validation->set_rules('ikon', 'ikon', 'trim|prep_for_form');
		$this->form_validation->set_rules('tipe', 'tipe', 'trim|prep_for_form');
		$this->form_validation->set_rules('expire', 'expire', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/poin/';
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
                'image_poin'                  => $gambar,
				'kode'                  => html_escape($this->input->post('kode', TRUE)),
                'nama'                  => html_escape($this->input->post('nama', TRUE)),
                'poin'                 => html_escape($this->input->post('poin', TRUE)),
				'nilai'                 => html_escape($this->input->post('nilai', TRUE)),
                'keterangan'                 => html_escape($this->input->post('keterangan', TRUE)),
				'tipe'                 => html_escape($this->input->post('tipe', TRUE)),
				'expire'                 => html_escape($this->input->post('expire', TRUE)),
                'status'                => html_escape($this->input->post('status', TRUE))
            ];
            $this->point->addpoin($data);
            $this->session->set_flashdata('tambah', 'Poin berhasil ditambahkan');
            redirect('poin');
        } else {
            $data['apps'] = $this->app->getappbyid();
            $this->load->view('includes/header', $data);
            $this->load->view('poin/tambah', $data);
            $this->load->view('includes/footer', $data);
        }
	}
	public function hapus($id)
    {
        $data = $this->point->getpoinbyid($id);
        if ($data['image_poin'] != 'noimage.jpg') {
            $gambar = $data['image_poin'];
            unlink('images/poin/' . $gambar);
        }
        $this->point->hapuspoinbyid($id);
        $this->session->set_flashdata('hapus', 'Point Has Been deleted');
        redirect('poin');
    }
}
