<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('toko_model');
	// Authentication Halaman
		$this->simple_login->cek_login();
	}

	//Data produk
	public function index()
	{
		$produk = $this->produk_model->listing();

		$data = array( 'title' => 'Data Produk',
					   			 'produk'  => $produk,
					   			 'isi'  => 'admin/produk/list'
					  		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Data Rating Produk
	public function rating()
	{
		$produk = $this->produk_model->listing();
		$rating = $this->produk_model->listing_rating();

		$data = array( 'title' => 'Data Rating',
									 'produk' => $produk,
					   			 'rating'  => $rating,
					   			 'isi'  => 'admin/produk/list_rating'
					  		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah Produk
	public function tambah()
	{
		// Ambil Data Kategori
		$kategori = $this->kategori_model->listing();
		$toko			= $this->toko_model->listing();
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk', 'required',
					array('required' => '%s harus diisi'));

		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';// dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('gambar')){
				
			// End Validasi

		$data = array( 'title' 			=> 'Tambah Produk',
					   			 'kategori' 	=> $kategori,
						 			 'toko'				=> $toko,
					   			 'error'			=> $this->upload->display_errors(),
					   			 'isi'  			=> 'admin/produk/tambah'
					  		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		$i = $this->input;
		// Slug Produk
		$slug_produk = url_title($this->input->post('nama_produk'),'dash', TRUE);

		$data = array('id_user' 			=> $this->session->userdata('id_user'),
					  			'id_kategori' 	=> $i->post('id_kategori'),
									'id_toko'				=> $i->post('id_toko'),
					  			'nama_produk' 	=> $i->post('nama_produk'),
					  			'slug_produk' 	=> $slug_produk,
					  			'keterangan'		=> $i->post('keterangan'),
					  			'harga' 				=> $i->post('harga'),
					  			// Disimpan nama file gambar
					  			'gambar' 				=> $upload_gambar['upload_data']['file_name'],
  								'status_produk' => $i->post('status_produk'),
  								'tanggal_post' 	=> date('Y-m-d H:i:s'));

		$this->produk_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/produk'),'refresh');
		}}
	// End Masuk database
		$data = array( 'title' 				=> 'Tambah Produk',
					   			 'kategori' 		=> $kategori,
									 'toko'					=> $toko,
									 'isi'  				=> 'admin/produk/tambah'
					  		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	// Edit produk
	public function edit($id_produk)
	{
		// Ambil data produk yang akan diedit
		$produk = $this->produk_model->detail($id_produk);
		// Ambil data kategori
		$kategori = $this->kategori_model->listing();
		// Ambil data toko
		$toko = $this->toko_model->listing();
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk', 'required',
					array('required' => '%s harus diisi'));
		
		if($valid->run()) {
			// Check jika gambar diganti
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  			= '2400';// dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('gambar')){
			// End Validasi

		$data = array( 'title' 		=> 'Edit Produk : '.$produk->nama_produk,
					   			 'kategori' => $kategori,
						 			 'toko'			=> $toko,
					   			 'produk'		=> $produk,
					   			 'error'		=> $this->upload->display_errors(),
					   			 'isi'  		=> 'admin/produk/edit'
					  		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
	
		$i = $this->input;
		// Slug Produk
		$slug_produk = url_title($this->input->post('nama_produk'),'dash', TRUE);

		$data = array('id_produk'			=> $id_produk,
					  			'id_user' 			=> $this->session->userdata('id_user'),
					  			'id_kategori' 	=> $i->post('id_kategori'),
									'id_toko'				=> $i->post('id_toko'),
									'nama_produk' 	=> $i->post('nama_produk'),
									'slug_produk' 	=> $slug_produk,
									'keterangan'		=> $i->post('keterangan'),
									'harga' 				=> $i->post('harga'),
									// Disimpan nama file gambar
									'gambar' 				=> $upload_gambar['upload_data']['file_name'],
									'status_produk' => $i->post('status_produk')
  					  		);

		$this->produk_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diedit');
		redirect(base_url('admin/produk'),'refresh');
		}}else{
			// Edit Produk tanpa ganti gambar
			$i = $this->input;
		// Slug Produk
			$slug_produk = url_title($this->input->post('nama_produk'), 'dash', TRUE);

		$data = array('id_produk'			=> $id_produk,
					  			'id_user' 			=> $this->session->userdata('id_user'),
					  			'id_kategori' 	=> $i->post('id_kategori'),
									'id_toko'				=> $i->post('id_toko'),
					  			'nama_produk' 	=> $i->post('nama_produk'),
					  			'slug_produk' 	=> $slug_produk,
								  'keterangan'		=> $i->post('keterangan'),
					  			'harga' 				=> $i->post('harga'),
  								'status_produk' => $i->post('status_produk')
  					  );

		$this->produk_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diedit');
		redirect(base_url('admin/produk'),'refresh');

		}}
	// End Masuk database
		$data = array( 'title' 		=> 'Edit Produk : '.$produk->nama_produk,
					   			 'kategori' => $kategori,
						 			 'toko'			=> $toko,
					   			 'produk'		=> $produk,
					   			 'isi'  		=> 'admin/produk/edit'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	public function delete_rating($id_rating)
	{
		$data = array('id_rating' => $id_rating);

		$this->produk_model->delete_rating($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/produk/rating'),'refresh');
	}

	public function delete($id_produk)
	{
		// Proses hapus gambar
		$produk = $this->produk_model->detail($id_produk);
		unlink('./assets/upload/images/'.$produk->gambar);
		$data = array('id_produk' => $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/produk'),'refresh');
	}
	
}

/* End of file Produk2.php */
/* Location: ./application/controllers/admin/Produk2.php */