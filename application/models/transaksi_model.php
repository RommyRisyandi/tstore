<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}
	//Listing all Transaksi
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing all Transaksi berdasarkan header
	public function kode_transaksi($kode_transaksi)
	{
		$this->db->select('transaksi.*,
							produk.nama_produk,
							produk.kode_produk');
		$this->db->from('transaksi');
		// Join dengan produk
		$this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
		// End Join
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail Transaksi
	public function detail($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail slug Transaksi
	public function read($slug_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('slug_transaksi', $slug_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login Transaksi
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('username' => $username,
							   'password' => SHA1($password)));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('transaksi', $data);
	}
	// delete 
	public function delete($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->delete('transaksi', $data);
	}
	// edit
	public function edit($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi', $data);
	}

}

/* End of file transaksi_model.php */
/* Location: ./application/models/transaksi_model.php */