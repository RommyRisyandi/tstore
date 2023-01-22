<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	// Authentication Halaman
		$this->simple_login->cek_login();
	}

	//Data kategori
	public function index()
	{
		$kategori = $this->kategori_model->listing();

		$data = array( 'title' => 'Data Kategori Produk',
					   'kategori'  => $kategori,
					   'isi'  => 'admin/kategori/list'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
		// Tambah Kategori Produk
	public function tambah()
	{
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]',
					array('required' => '%s harus diisi',
						  'is_unique' => '%s sudah ada. buat kategori baru!'));

		
		if($valid->run()===FALSE) {
			// End Validasi

		$data = array( 'title' 	=> 'Tambah Kategori Produk',
					   'isi'  	=> 'admin/kategori/tambah'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
		$data = array('slug_kategori' 		=> $slug_kategori,
					  'nama_kategori' 		=> $i->post('nama_kategori'),
					  'urutan' 				=> $i->post('urutan'));

		$this->kategori_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/kategori'),'refresh');
		}
	// End Masuk database
	}
	// Edit kategori
	public function edit($id_kategori)
	{
		$kategori = $this->kategori_model->detail($id_kategori);

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori', 'Nama Kategori', 'required',
			array('required' => '%s harus diisi'));

		
		if($valid->run()===FALSE) {
			// End Validasi

		$data = array( 'title' 		=> 'Edit Kategori Produk',
					   'kategori' 	=> $kategori,
					   'isi'  		=> 'admin/kategori/edit'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
		$data = array('id_kategori'			=> $id_kategori,
					  'slug_kategori' 		=> $slug_kategori,
					  'nama_kategori' 		=> $i->post('nama_kategori'),
					  'urutan' 				=> $i->post('urutan'));

		$this->kategori_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diubah');
		redirect(base_url('admin/kategori'),'refresh');
		}
	// End Masuk database
	}

	public function delete($id_kategori)
	{
		$data = array('id_kategori' => $id_kategori);

		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}
}

/* End of file Kategori Produk.php */
/* Location: ./application/controllers/admin/Kategori Produk2.php */