<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
  // Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('berita_model');
    $this->load->model('produk_model');
    $this->load->helper('text');
  }

  // Halaman Utama Berita
  public function index()
  {
    $konfigurasi 				= $this->konfigurasi_model->listing();
    // Listing berita dengan pagination
    $this->load->library('pagination');

    $config['base_url']     = base_url('berita/index/');
    $config['total_rows']   = count($this->berita_model->total());
    $config['per_page']     = 12;
    $config['uri_segment']  = 3;
    // limit dan start
    $limit              = $config['per_page'];
    $start              = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
    // End limit dan start
    $this->pagination->initialize($config);

    $berita             = $this->berita_model->berita($limit,$start);
    // End listing berita

    $data = array( 'title'     => 'Berita & Promosi -'.$konfigurasi->namaweb,
                   'paginasi'  => $this->pagination->create_links(),
                   'berita'    => $berita,
                   'isi'       => 'berita/list'
                 );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

  // Detail Berita
  public function read($id_berita)
  {
    $berita           = $this->berita_model->detail($id_berita);
    $listing_kategori = $this->produk_model->listing_kategori();
    $produk_related   = $this->produk_model->user();
    
    $data = array('title'            => $berita->judul,
                  'listing_kategori' => $listing_kategori,
                  'produk_related'   => $produk_related,
                  'berita'           => $berita,
                  'isi'              => 'berita/read'
                 );
    $this->load->view('layout/wrapper', $data, FALSE);
  }
}