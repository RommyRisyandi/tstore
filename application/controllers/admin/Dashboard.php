<?php
defined('BASEPATH') OR exit ('No direct access allowed');


class Dashboard extends CI_Controller{

// load model
	public function __construct()
	{
		parent::__construct();
		// Authentication Halaman
		$this->simple_login->cek_login();
	}
	public function index()
	{
		$data = array( 'title' => 'Halaman Administrator',
					   'isi'  => 'admin/dashboard/list'
					);


		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}