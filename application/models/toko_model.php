<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}
	//Listing all toko
	public function listing()
	{
		$this->db->select('toko.*,COUNT(cabang.id_toko) AS total_cabang');
		$this->db->from('toko');
		// join
		$this->db->join('cabang', 'cabang.id_toko = toko.id_toko', 'left');
		$this->db->group_by('toko.id_toko');
		$this->db->order_by('id_toko', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail toko
	public function detail($id_toko)
	{
		$this->db->select('*');
		$this->db->from('toko');
		$this->db->where('id_toko', $id_toko);
		$this->db->order_by('id_toko', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Detail cabang
	public function detail_cabang($id_cabang)
	{
		$this->db->select('*');
		$this->db->from('cabang');
		$this->db->where('id_cabang', $id_cabang);
		$this->db->order_by('id_cabang', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Cabang
	public function cabang($id_toko)
	{
		$this->db->select('*');
		$this->db->from('cabang');
		$this->db->where('id_toko', $id_toko);
		$this->db->order_by('id_cabang', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
// Listing Cabang
	public function listing_cabang()
	{
		$this->db->select('cabang.*,toko.nama_toko');
		$this->db->from('cabang');
		$this->db->join('toko', 'toko.id_toko = cabang.id_toko', 'left');
		$this->db->group_by('cabang.id_toko');
		$this->db->order_by('id_cabang', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
// Read Cabang
public function read($id_toko)
{
	$this->db->select('cabang.*,toko.nama_toko');
	$this->db->from('cabang');
	$this->db->join('toko', 'toko.id_toko = cabang.id_toko', 'left');
	$this->db->where('cabang.id_toko', $id_toko);
	$this->db->group_by('cabang.id_cabang');
	$this->db->order_by('id_cabang', 'desc');
	$query = $this->db->get();
	return $query->row();
}
	// Login toko
	// public function login($username,$password)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('users');
	// 	$this->db->where(array('username' => $username,
	// 						   'password' => SHA1($password)));
	// 	$this->db->order_by('id_user', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	// Toko
	public function toko($limit,$start)
	{
		$this->db->select('toko.*,COUNT(cabang.id_cabang) AS total_cabang');
		$this->db->from('toko');
		// Join
		$this->db->join('cabang', 'cabang.id_toko = toko.id_toko', 'left');
		// $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		// $this->db->join('toko', 'toko.id_toko = produk.id_toko', 'left');
		// End Join
		// $this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('toko.id_toko');
		$this->db->order_by('id_toko', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//Total toko
	public function total_toko()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('toko');
		// $this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

	//Total cabang
	public function total_cabang()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('cabang');
		// $this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('toko', $data);
	}
	// Tambah Cabang
	public function tambah_cabang($data)
	{
		$this->db->insert('cabang', $data);
	}
	// Delete Cabang
	public function delete_cabang($data)
	{
		$this->db->where('id_cabang', $data['id_cabang']);
		$this->db->delete('cabang', $data);
	}
	// delete 
	public function delete($data)
	{
		$this->db->where('id_toko', $data['id_toko']);
		$this->db->delete('toko', $data);
	}
	// edit
	public function edit($data)
	{
		$this->db->where('id_toko', $data['id_toko']);
		$this->db->update('toko', $data);
	}

}

/* End of file toko_model.php */
/* Location: ./application/models/toko_model.php */