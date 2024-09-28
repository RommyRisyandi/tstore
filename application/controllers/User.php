<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('slider_model');
		
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$kategori = $this->konfigurasi_model->nav_produk();
		$produk = $this->produk_model->user();
		$slider = $this->slider_model->slider();

		$data = array( 'title' 		=> $site->namaweb. ' | '.$site->tagline,
					   'keywords' 	=> $site->keywords,
					   'deskripsi' 	=> $site->deskripsi,
					   'site' 		=> $site,
					   'slider'		=> $slider,
					   'kategori' 	=> $kategori,
					   'produk' 	=> $produk,
					   'isi' 		=> 'user/index'
					);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function belanja()
	{
		$this->load->view('belanja');
	}

	
}