<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
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

	// Gambar
	public function gambar($id_produk)
	{
		$produk = $this->produk_model->detail($id_produk);
		$gambar = $this->produk_model->gambar($id_produk);

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('judul_gambar', 'Judul/Nama Gambar', 'required',
					array('required' => '%s harus diisi'));

		
		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/images/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']  		= '2400';// dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('gambar')){
				
				
				
			
			// End Validasi

		$data = array( 'title' 		=> 'Tambah Gambar Produk : '.$produk->nama_produk,
					   'produk'		=> $produk,
					   'gambar' 	=> $gambar,
					   'error'		=> $this->upload->display_errors(),
					   'isi'  		=> 'admin/produk/gambar'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
	// Create Thumbnail Gambar
		$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/upload/images/'.$upload_gambar['upload_data']['file_name'];
		// Lokasi Folder Thumbnail
		$config['new_image'] = './assets/upload/images/thumbs/'; 
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 250; //pixel
		$config['height'] = 250; //pixel
		$config['thumb_marker'] ='';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
	// End Create Thumbnail

		$i = $this->input;

		$data = array('id_produk'		=> $id_produk,
					  'judul_gambar'	=> $i->post('judul_gambar'),  
					  // Disimpan nama file gambar
					  'gambar' 			=> $upload_gambar['upload_data']['file_name']
					  );

		$this->produk_model->tambah_gambar($data);
		$this->session->set_flashdata('sukses', 'Data Gambar berhasil ditambah');
		redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
		}}
	// End Masuk database
		$data = array( 'title' 		=> 'Tambah Gambar Produk : '.$produk->nama_produk,
					   'produk' 	=> $produk,
					   'gambar'		=> $gambar,
					   'isi'  		=> 'admin/produk/gambar'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}

	// Tambah Produk
	public function tambah()
	{
		// Ambil Data Kategori
		$kategori = $this->kategori_model->listing();
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk', 'required',
					array('required' => '%s harus diisi'));

		$valid->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[produk.kode_produk]',
					array('required'  => '%s harus diisi',
						  'is_unique' => '%s sudah ada. Buat Kode Produk Baru'));
		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/images/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']  		= '2400';// dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('gambar')){
				
				
				
			
			// End Validasi

		$data = array( 'title' 		=> 'Tambah Produk',
					   'kategori' 	=> $kategori,
					   'error'		=> $this->upload->display_errors(),
					   'isi'  		=> 'admin/produk/tambah'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
	// Create Thumbnail Gambar
		$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/upload/images/'.$upload_gambar['upload_data']['file_name'];
		// Lokasi Folder Thumbnail
		$config['new_image'] = './assets/upload/images/thumbs/'; 
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 250; //pixel
		$config['height'] = 250; //pixel
		$config['thumb_marker'] ='';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
	// End Create Thumbnail

		$i = $this->input;
		// Slug Produk
		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

		$data = array('id_user' 		=> $this->session->userdata('id_user'),
					  'id_kategori' 	=> $i->post('id_kategori'),
					  'kode_produk' 	=> $i->post('kode_produk'),
					  'nama_produk' 	=> $i->post('nama_produk'),
					  'slug_produk' 	=> $slug_produk,
					  'keterangan'		=> $i->post('keterangan'),
					  'keywords' 		=> $i->post('keywords'),
					  'harga' 			=> $i->post('harga'),
					  'stok' 			=> $i->post('stok'),
					  // Disimpan nama file gambar
					  'gambar' 			=> $upload_gambar['upload_data']['file_name'],
					  'berat' 			=> $i->post('berat'),
  					  'ukuran' 			=> $i->post('ukuran'),
  					  'status_produk' 	=> $i->post('status_produk'),
  					  'tanggal_post' 	=> date('Y-m-d H:i:s'));

		$this->produk_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/produk'),'refresh');
		}}
	// End Masuk database
		$data = array( 'title' 		=> 'Tambah Produk',
					   'kategori' 	=> $kategori,
					   'isi'  		=> 'admin/produk/tambah'
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
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk', 'required',
					array('required' => '%s harus diisi'));

		$valid->set_rules('kode_produk', 'Kode Produk', 'required',
					array('required'  => '%s harus diisi'));
		
		if($valid->run()) {
			// Check jika gambar diganti
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/images/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']  		= '2400';// dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('gambar')){
			// End Validasi

		$data = array( 'title' 		=> 'Edit Produk : '.$produk->nama_produk,
					   'kategori' 	=> $kategori,
					   'produk'		=> $produk,
					   'error'		=> $this->upload->display_errors(),
					   'isi'  		=> 'admin/produk/edit'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
	// Create Thumbnail Gambar
		$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/upload/images/'.$upload_gambar['upload_data']['file_name'];
		// Lokasi Folder Thumbnail
		$config['new_image'] = './assets/upload/images/thumbs/'; 
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 250; //pixel
		$config['height'] = 250; //pixel
		$config['thumb_marker'] ='';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
	// End Create Thumbnail

		$i = $this->input;
		// Slug Produk
		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

		$data = array('id_produk'		=> $id_produk,
					  'id_user' 		=> $this->session->userdata('id_user'),
					  'id_kategori' 	=> $i->post('id_kategori'),
					  'kode_produk' 	=> $i->post('kode_produk'),
					  'nama_produk' 	=> $i->post('nama_produk'),
					  'slug_produk' 	=> $slug_produk,
					  'keterangan'		=> $i->post('keterangan'),
					  'keywords' 		=> $i->post('keywords'),
					  'harga' 			=> $i->post('harga'),
					  'stok' 			=> $i->post('stok'),
					  // Disimpan nama file gambar
					  'gambar' 			=> $upload_gambar['upload_data']['file_name'],
					  'berat' 			=> $i->post('berat'),
  					  'ukuran' 			=> $i->post('ukuran'),
  					  'status_produk' 	=> $i->post('status_produk')
  					  );

		$this->produk_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diedit');
		redirect(base_url('admin/produk'),'refresh');
		}}else{
			// Edit Produk tanpa ganti gambar
			$i = $this->input;
		// Slug Produk
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

		$data = array('id_produk'		=> $id_produk,
					  'id_user' 		=> $this->session->userdata('id_user'),
					  'id_kategori' 	=> $i->post('id_kategori'),
					  'kode_produk' 	=> $i->post('kode_produk'),
					  'nama_produk' 	=> $i->post('nama_produk'),
					  'slug_produk' 	=> $slug_produk,
					  'keterangan'		=> $i->post('keterangan'),
					  'keywords' 		=> $i->post('keywords'),
					  'harga' 			=> $i->post('harga'),
					  'stok' 			=> $i->post('stok'),
					  // Disimpan nama file gambar (gambar tidak diganti)
					  //'gambar' 			=> $upload_gambar['upload_data']['file_name'],
					  'berat' 			=> $i->post('berat'),
  					  'ukuran' 			=> $i->post('ukuran'),
  					  'status_produk' 	=> $i->post('status_produk')
  					  );

		$this->produk_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diedit');
		redirect(base_url('admin/produk'),'refresh');

		}}
	// End Masuk database
		$data = array( 'title' 		=> 'Edit Produk : '.$produk->nama_produk,
					   'kategori' 	=> $kategori,
					   'produk'		=> $produk,
					   'isi'  		=> 'admin/produk/edit'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	public function delete($id_produk)
	{
		// Proses hapus gambar
		$produk = $this->produk_model->detail($id_produk);
		unlink('./assets/upload/images/'.$produk->gambar);
		unlink('./assets/upload/images/thumbs/'.$produk->gambar);
		$data = array('id_produk' => $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/produk'),'refresh');
	}
	// Delete Gambar Produk
	public function delete_gambar($id_produk,$id_gambar)
	{
		// Proses hapus gambar
		$gambar = $this->produk_model->detail_gambar($id_gambar);
		unlink('./assets/upload/images/'.$gambar->gambar);
		unlink('./assets/upload/images/thumbs/'.$gambar->gambar);
		$data = array('id_gambar' => $id_gambar);
		$this->produk_model->delete_gambar($data);
		$this->session->set_flashdata('sukses', 'Data  Gambar berhasil dihapus');
		redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
	}
}

/* End of file Produk2.php */
/* Location: ./application/controllers/admin/Produk2.php */