<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('slider_model');
	// Authentication Halaman
		$this->simple_login->cek_login();
	}

	//Data Slider
	public function index()
	{
		$slider = $this->slider_model->slider();

		$data = array( 'title'      => 'Data Slider',
									 'slider'     => $slider,
									 'isi'        => 'admin/slider/list'
									);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Gambar Slider
	public function tambah()
	{
		
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('judul', 'Judul/Nama Slider', 'required',
					array('required' => '%s harus diisi'));

		
		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/slider/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']  			= '2400';// dalam KB
			$config['max_width']  		= '3000';
			$config['max_height']  		= '3000';
			
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('slider')){
				
			// End Validasi

		$data = array( 'title' 		=> 'Tambah Gambar Slider',
									 'error'		=> $this->upload->display_errors(),
									 'isi'  		=> 'admin/slider/tambah'
					  		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_slider = array('upload_data' => $this->upload->data());

		$i = $this->input;

		$data = array('judul'	        => $i->post('judul'),  
					  // Disimpan nama file gambar
									'slider' 				=> $upload_slider['upload_data']['file_name']
								 );

		$this->slider_model->tambah_slider($data);
		$this->session->set_flashdata('sukses', 'Data Slider berhasil ditambah');
		redirect(base_url('admin/slider'),'refresh');
		}}
	// End Masuk database
		$data = array( 'title' 		=> 'Tambah Slider',
					   			 'isi'  		=> 'admin/slider/tambah'
					  		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}

	public function delete($id_slider)
	{
		// Proses hapus gambar
		$slider = $this->slider_model->detail($id_slider);
		unlink('./assets/upload/slider/'.$slider->slider);
		$data = array('id_slider' => $id_slider);
		$this->slider_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/slider'),'refresh');
	}
	
}

/* End of file Slider.php */
/* Location: ./application/controllers/admin/Slider.php */