<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}
	//Listing all berita
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing all berita halaman utama
	public function berita($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//Total berita halaman utama
	public function total()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail berita
	public function detail($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita', $id_berita);
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login berita
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
		$this->db->insert('berita', $data);
	}

	// delete 
	public function delete($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->delete('berita', $data);
	}
	
	// edit
	public function edit($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update('berita', $data);
	}

}

/* End of file berita_model.php */
/* Location: ./application/models/berita_model.php */