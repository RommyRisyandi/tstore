<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('toko_model');
	// Authentication Halaman
		$this->simple_login->cek_login();
	}

	//Data toko
	public function index()
	{
		$toko = $this->toko_model->listing();

		$data = array( 'title' => 'Data toko & Cabang',
					   			 'toko'  => $toko,
					   			 'isi'  => 'admin/toko/list'
					  			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	
	// Cabang
	public function cabang($id_toko)
	{
		$toko   = $this->toko_model->detail($id_toko);
		$cabang = $this->toko_model->cabang($id_toko);

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_cabang', 'Nama Cabang', 'required',
					array('required' => '%s harus diisi'));

		
		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/images/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']  			= '2400';// dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('gambar')){
				
		// End Validasi

		$data = array( 'title' 		=> 'Tambah Cabang Toko : '.$toko->nama_toko,
					   			 'toko'			=> $toko,
					   			 'cabang' 	=> $cabang,
					   			 'error'		=> $this->upload->display_errors(),
					   			 'isi'  		=> 'admin/toko/cabang'
					  			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		$i = $this->input;

		$data = array('id_toko'		=> $id_toko,
					  			'nama_cabang'	=> $i->post('nama_cabang'),  
									'alamat'			=> $i->post('alamat'),    
									'link_alamat'	=> $i->post('link_alamat'),  
									'no_wa'				=> $i->post('no_wa'),  
									// Disimpan nama file gambar
									'gambar' 			=> $upload_gambar['upload_data']['file_name']
									);

		$this->toko_model->tambah_cabang($data);
		$this->session->set_flashdata('sukses', 'Data cabang berhasil ditambah');
		redirect(base_url('admin/toko/cabang/'.$id_toko),'refresh');
		}}
	// End Masuk database
		$data = array( 'title' 		=> 'Tambah Cabang Toko : '.$toko->nama_toko,
					   			 'toko' 		=> $toko,
					   			 'cabang'		=> $cabang,
					   			 'isi'  		=> 'admin/toko/cabang'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}
	
	// Tambah toko 
	public function tambah()
	{
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_toko', 'Nama Toko', 'required|is_unique[toko.nama_toko]',
					array('required' => '%s harus diisi',
						  'is_unique' => '%s sudah ada. buat toko baru!'));

		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/images/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']  			= '2400';// dalam KB
			$config['max_width']  		= '4000';
			$config['max_height']  		= '4000';
			
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('gambar')){
			// End Validasi

		$data = array( 'title' 	=> 'Tambah Toko',
									 'error'	=> $this->upload->display_errors(),
					   			 'isi'  	=> 'admin/toko/tambah'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		$i = $this->input;
		$data = array(
					  'nama_toko' 		=> $i->post('nama_toko'),
					  'nama_pemilik' 	=> $i->post('nama_pemilik'),
					  'no_wa' 				=> $i->post('no_wa'),
					  'alamat' 				=> $i->post('alamat'),
					  'link_alamat' 	=> $i->post('link_alamat'),
						// Disimpan nama file gambar
						'gambar'				=> $upload_gambar['upload_data']['file_name']
								 );
		
		$this->toko_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/toko'),'refresh');
		}}
	// End Masuk database
	$data = array( 'title' 	=> 'Tambah Toko',
					   			 'isi'  => 'admin/toko/tambah'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit toko
	public function edit($id_toko)
	{
		$toko = $this->toko_model->detail($id_toko);

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_toko', 'Nama toko', 'required',
		array('required'  => '%s harus diisi',
					'is_unique' => '%s sudah ada. buat toko baru!'));

		
		if($valid->run()) {
						// Check jika gambar diganti
						if(!empty($_FILES['gambar']['name'])) {

							$config['upload_path'] 		= './assets/upload/images/';
							$config['allowed_types'] 	= 'gif|jpg|png';
							$config['max_size']  			= '2400';// dalam KB
							$config['max_width']  		= '4000';
							$config['max_height']  		= '4000';
							
							$this->load->library('upload', $config);
							
							if(!$this->upload->do_upload('gambar')){
							// End Validasi

		$data = array( 'title' 	=> 'Edit toko :'.$toko->nama_toko,
					   			 'toko' 	=> $toko,
						 			 'error'	=> $this->upload->display_errors(),
					   			 'isi'  	=> 'admin/toko/edit'
					  			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		$i = $this->input;
		$data = array('id_toko' 			=> $id_toko,
					  			'nama_toko' 		=> $i->post('nama_toko'),
					  			'nama_pemilik' 	=> $i->post('nama_pemilik'),
					  			'no_wa' 				=> $i->post('no_wa'),
									'alamat' 				=> $i->post('alamat'),
									'link_alamat' 	=> $i->post('link_alamat'),
									'gambar'				=> $upload_gambar['upload_data']['file_name']
								 );

		$this->toko_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diubah');
		redirect(base_url('admin/toko'),'refresh');
		}}else{
			// Edit Toko Tanpa Ganti Gambar
			$i = $this->input;
			$data = array('id_toko' 			=> $id_toko,
										'nama_toko' 		=> $i->post('nama_toko'),
										'nama_pemilik' 	=> $i->post('nama_pemilik'),
										'no_wa' 				=> $i->post('no_wa'),
										'alamat' 				=> $i->post('alamat'),
										'link_alamat' 	=> $i->post('link_alamat')
									 );
			$this->toko_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil diubah');
			redirect(base_url('admin/toko'),'refresh');
		}}
	// End Masuk database
		$data = array( 'title' 	=> 'Edit Toko :'.$toko->nama_toko,
									 'toko'		=> $toko,
					   			 'isi'  	=> 'admin/toko/edit'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete($id_toko)
	{
		// Proses hapus gambar
		$toko = $this->toko_model->detail($id_toko);
		unlink('./assets/upload/images/'.$toko->gambar);
		$data = array('id_toko' => $id_toko);
		$this->toko_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/toko'),'refresh');
	}

	// Delete Cabang Toko
	public function delete_cabang($id_toko,$id_cabang)
	{
		// Proses hapus cabang toko
		$cabang = $this->toko_model->detail_cabang($id_cabang);
		unlink('./assets/upload/images/'.$cabang->gambar);
		$data = array('id_cabang' => $id_cabang);
		$this->toko_model->delete_cabang($data);
		$this->session->set_flashdata('sukses', 'Data Cabang Toko berhasil dihapus');
		redirect(base_url('admin/toko/cabang/'.$id_toko),'refresh');
	}
}

/* End of file toko Produk.php */
/* Location: ./application/controllers/admin/toko Produk2.php */