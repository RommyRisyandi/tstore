<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}
	//Listing all Produk
	public function listing()
	{
		$this->db->select('produk.*,user.nama,kategori.nama_kategori,kategori.slug_kategori,toko.nama_toko');
		$this->db->from('produk');
		// Join
		$this->db->join('user', 'user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('toko', 'toko.id_toko = produk.id_toko', 'left');
		// End Join
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing all Produk user
	public function user()
	{
		$this->db->select('produk.*,user.nama,kategori.nama_kategori,kategori.slug_kategori,toko.nama_toko');
		$this->db->from('produk');
		// Join
		$this->db->join('user', 'user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('toko', 'toko.id_toko = produk.id_toko', 'left');
		// End Join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

	//Read Produk
	public function read($id_produk)
	{
		$this->db->select('produk.*,user.nama,kategori.nama_kategori,kategori.slug_kategori,toko.nama_toko,AVG(rating.nilai_rating) AS total_rating');
		$this->db->from('produk'); 
		// Join
		$this->db->join('user', 'user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('toko', 'toko.id_toko = produk.id_toko', 'left');
		$this->db->join('rating', 'rating.id_produk = produk.id_produk', 'left');
		// End Join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_produk', $id_produk);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// listing Rating Produk Hal Admin
	public function listing_rating()
	{
		$this->db->select('rating.*,produk.gambar,produk.nama_produk');
		$this->db->from('rating');
		// Join
		$this->db->join('produk', 'produk.id_produk = rating.id_produk', 'left');
		// End Join
		$this->db->group_by('rating.id_rating');
		$this->db->order_by('id_rating', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Produk
	public function produk($limit,$start)
	{
		$this->db->select('produk.*,user.nama,kategori.nama_kategori,kategori.slug_kategori,toko.nama_toko');
		$this->db->from('produk');
		// Join
		$this->db->join('user', 'user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('toko', 'toko.id_toko = produk.id_toko', 'left');
		// End Join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//Total Produk
	public function total_produk()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

	// Kategori Produk
	public function kategori($id_kategori,$limit,$start)
	{
		$this->db->select('produk.*,user.nama,kategori.nama_kategori,kategori.slug_kategori');
		$this->db->from('produk');
		// Join
		$this->db->join('user', 'user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		// End Join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//Total Kategori Produk
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}

	// Rata-rata Rating
	public function total_rating()
	{
		$this->db->select('AVG(*) AS total');
		$this->db->from('rating');
		// $this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

	//Listing Kategori
	public function listing_kategori()
	{
		$this->db->select('produk.*,user.nama,kategori.nama_kategori,kategori.slug_kategori');
		$this->db->from('produk');
		// Join
		$this->db->join('user', 'user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		// End Join
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	//Listing Toko
	public function listing_toko()
	{
		$this->db->select('produk.*,user.nama,toko.nama_toko');
		$this->db->from('produk');
		// Join
		$this->db->join('user', 'user.id_user = produk.id_user', 'left');
		$this->db->join('toko', 'toko.id_toko = produk.id_toko', 'left');
		// End Join
		$this->db->group_by('produk.id_toko');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Detail Produk
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login Produk
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username' => $username,
							   'password' => SHA1($password)));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('produk', $data);
	}

	// Tambah rating
	public function tambah_rating($data)
	{
		$this->db->insert('rating', $data);
	}

	// Delete Rating
	public function delete_rating($data)
	{
		$this->db->where('id_rating', $data['id_rating']);
		$this->db->delete('rating', $data);
	}

	// Tambah Gambar
	public function tambah_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}

	// delete gambar
	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar', $data);
	}

	// delete 
	public function delete($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk', $data);
	}
	// edit
	public function edit($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}

}

/* End of file produk_model.php */
/* Location: ./application/models/produk_model.php */