<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
	// Authentication Halaman
		$this->simple_login->cek_login();
	}

	//Data berita
	public function index()
	{
		$berita = $this->berita_model->listing();

		$data = array( 'title' 	 => 'Data berita & Cabang',
					   			 'berita'  => $berita,
					   			 'isi'  	 => 'admin/berita/list'
					  			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	
	// Tambah berita 
	public function tambah()
	{
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('judul', 'Judul berita', 'required|is_unique[berita.judul]',
					array('required'  => '%s harus diisi',
						  	'is_unique' => '%s sudah ada. buat Judul berita baru!'));

		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/berita/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']  			= '2400';// dalam KB
			$config['max_width']  		= '4000';
			$config['max_height']  		= '4000';
			
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('gambar')){
			// End Validasi

		$data = array( 'title' 	=> 'Tambah berita',
									 'error'	=> $this->upload->display_errors(),
					   			 'isi'  	=> 'admin/berita/tambah'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		$i = $this->input;
		$data = array(
					  'judul' 				=> $i->post('judul'),
					  'keterangan' 		=> $i->post('keterangan'),
					  'tanggal_post' 	=> date('Y-m-d H:i:s'),
						// Disimpan nama file gambar
						'gambar'				=> $upload_gambar['upload_data']['file_name']
								 );
		
		$this->berita_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/berita'),'refresh');
		}}
	// End Masuk database
	$data = array( 'title' 	=> 'Tambah berita',
					   			 'isi'  => 'admin/berita/tambah'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit berita
	public function edit($id_berita)
	{
		$berita = $this->berita_model->detail($id_berita);

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('judul', 'Judul berita', 'required',
		array('required'  => '%s harus diisi',
					'is_unique' => '%s sudah ada. buat Judul berita baru!'));

		
		if($valid->run()) {
						// Check jika gambar diganti
						if(!empty($_FILES['gambar']['name'])) {

							$config['upload_path'] 		= './assets/upload/berita/';
							$config['allowed_types'] 	= 'gif|jpg|png';
							$config['max_size']  			= '2400';// dalam KB
							$config['max_width']  		= '4000';
							$config['max_height']  		= '4000';
							
							$this->load->library('upload', $config);
							
							if(!$this->upload->do_upload('gambar')){
							// End Validasi

		$data = array( 'title' 	=> 'Edit berita :'.$berita->judul,
					   			 'berita' => $berita,
						 			 'error'	=> $this->upload->display_errors(),
					   			 'isi'  	=> 'admin/berita/edit'
					  			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		$i = $this->input;
		$data = array('id_berita' 		=> $id_berita,
									'judul' 				=> $i->post('judul'),
									'keterangan' 		=> $i->post('keterangan'),
									'tanggal_post' 	=> date('Y-m-d H:i:s'),
									'gambar'				=> $upload_gambar['upload_data']['file_name']
								 );

		$this->berita_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diubah');
		redirect(base_url('admin/berita'),'refresh');
		}}else{
			// Edit berita Tanpa Ganti Gambar
			$i = $this->input;
			$data = array('id_berita' 		=> $id_berita,
										'judul' 				=> $i->post('judul'),
										'keterangan' 		=> $i->post('keterangan'),
										'tanggal_post' 	=> date('Y-m-d H:i:s')
									 );
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil diubah');
			redirect(base_url('admin/berita'),'refresh');
		}}
	// End Masuk database
		$data = array( 'title' 	=> 'Edit berita :'.$berita->judul,
									 'berita'	=> $berita,
					   			 'isi'  	=> 'admin/berita/edit'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete($id_berita)
	{
		// Proses hapus gambar
		$berita = $this->berita_model->detail($id_berita);
		unlink('./assets/upload/berita/'.$berita->gambar);
		$data = array('id_berita' => $id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/berita'),'refresh');
	}

}

/* End of file berita Produk.php */
/* Location: ./application/controllers/admin/berita Produk2.php */