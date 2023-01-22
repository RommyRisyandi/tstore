<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data model user
        $this->CI->load->model('pelanggan_model');
	}

	// Fungsi Login
	public function login($email,$password)
	{
		$check = $this->CI->pelanggan_model->login($email,$password);
		// Jika ada data user, maka create session login
		if($check) {
			$id_pelanggan		= $check->id_pelanggan;
			$nama_pelanggan		= $check->nama_pelanggan;
		// Create session
			$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
			$this->CI->session->set_userdata('email',$email);
		// redirect halaman admin yang diproteksi
			redirect(base_url('dashboard'),'refresh');

		}else{
			// Jika tidak ada, maka login kembali
			$this->CI->session->set_flashdata('warning', 'Username atau Password Salah');
			redirect(base_url('masuk'),'refresh');
		}
	}
	// Fungsi cek Login
	public function cek_login()
	{
	// Memeriksa apakah session sudah ada atau belum, jika belum alihkan ke halaman login
		if($this->CI->session->userdata('email') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda belum login, Silahkan login terlebih dahulu');
			redirect(base_url('masuk'),'refresh');
		}
	}

	// Fungsi logout
	public function logout()
	{
	// Membuang semua session yang telah login
			$this->CI->session->unset_userdata('id_pelanggan');
			$this->CI->session->unset_userdata('nama_pelanggan');
			$this->CI->session->unset_userdata('email');
	// Setelah session dibuang, maka redirect login
			$this->CI->session->set_flashdata('sukses', 'Anda sudah berhasil logout');
			redirect(base_url('masuk'),'refresh');
	}
}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */
