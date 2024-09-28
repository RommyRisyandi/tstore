<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

		//Load Database
		public function __construct()
		{
			parent::__construct();
			$this->load->model('toko_model');
			
	
		}

		//Listing data Toko
		public function index()
		{
			$site 							= $this->konfigurasi_model->listing();
			//Ambil data total
			$total							= $this->toko_model->total_toko();
			//Paginasi start
			$this->load->library('pagination');

			$config['base_url'] 				= base_url().'toko/index/';
			$config['total_rows'] 			= $total->total;
			$config['use_page_numbers'] = TRUE;
			$config['per_page'] 				= 6;
			$config['uri_segment'] 			= 3;
			$config['num_links'] 				= 5;
			$config['full_tag_open'] 		= '<ul class="pagination">';
			$config['full_tag_close'] 	= '</ul>';
			$config['first_links'] 			= 'First';
			$config['first_tag_open'] 	= '<li>';
			$config['first_tag_close'] 	= '</li>';
			$config['last_link'] 				= 'Last';
			$config['last_tag_open'] 		= '<li class="disabled"><li class="active"><a href="#">';
			$config['last_tag_close'] 	= '</span class="sr-only"></a></li></li>';
			$config['next_link'] 				= '&gt';
			$config['next_tag_open'] 		= '<div>';
			$config['next_tag_close'] 	= '</div>';
			$config['prev_link'] 				= '&lt';
			$config['prev_tag_open'] 		= '<div>';
			$config['prev_tag_close'] 	= '</div>';
			$config['cur_tag_open'] 		= '<b>';
			$config['cur_tag_close'] 		= '</b>';
			$config['first_url'] 				= base_url().'/toko/';

			$this->pagination->initialize($config);
			//Ambil data produk
			$page 	= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
			$toko = $this->toko_model->toko($config['per_page'],$page);
			//Paginasi End


			$data = array(	'title'								=>	'Toko '.$site->namaweb,
											'site'								=>	$site,
											// 'listing_kategori'		=>	$listing_kategori,
											'toko'							  =>	$toko,
											'pagin'								=>  $this->pagination->create_links(), 
											'isi'									=>	'toko/list'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
	
    }

    // Listing Cabang Pertoko
    public function cabang($id_toko)
    {
      $toko = $this->toko_model->detail($id_toko);
      $id_toko = $toko->id_toko;
      $cabang = $this->toko_model->cabang($id_toko);

      $total							= $this->toko_model->total_cabang();
      //Paginasi start
			$this->load->library('pagination');

			$config['base_url'] 				= base_url().'toko/cabang/'.$id_toko.'/index/';
			$config['total_rows'] 			= $total->total;
			$config['use_page_numbers'] = TRUE;
			$config['per_page'] 				= 6;
			$config['uri_segment'] 			= 3;
			$config['num_links'] 				= 5;
			$config['full_tag_open'] 		= '<ul class="pagination">';
			$config['full_tag_close'] 	= '</ul>';
			$config['first_links'] 			= 'First';
			$config['first_tag_open'] 	= '<li>';
			$config['first_tag_close'] 	= '</li>';
			$config['last_link'] 				= 'Last';
			$config['last_tag_open'] 		= '<li class="disabled"><li class="active"><a href="#">';
			$config['last_tag_close'] 	= '</span class="sr-only"></a></li></li>';
			$config['next_link'] 				= '&gt';
			$config['next_tag_open'] 		= '<div>';
			$config['next_tag_close'] 	= '</div>';
			$config['prev_link'] 				= '&lt';
			$config['prev_tag_open'] 		= '<div>';
			$config['prev_tag_close'] 	= '</div>';
			$config['cur_tag_open'] 		= '<b>';
			$config['cur_tag_close'] 		= '</b>';
			$config['first_url'] 				= base_url().'/toko/cabang/'.$id_toko;

			$this->pagination->initialize($config);
			//Ambil data produk
			$page 	= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
			$cabang = $this->toko_model->cabang($id_toko, $config['per_page'],$page);
			//Paginasi End


			$data = array(	'title'								=>	'Toko '.$toko->nama_toko,
                      'cabang'              => $cabang,
											'pagin'								=>  $this->pagination->create_links(), 
											'isi'									=>	'toko/cabang'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
    }

  }