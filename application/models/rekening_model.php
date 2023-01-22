<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}
	//Listing all Rekening
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Detail Rekening
	public function detail($id_rekening)
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where('id_rekening', $id_rekening);
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail slug Rekening
	public function read($slug_rekening)
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where('slug_rekening', $slug_rekening);
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login Rekening
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
		$this->db->insert('rekening', $data);
	}
	// delete 
	public function delete($data)
	{
		$this->db->where('id_rekening', $data['id_rekening']);
		$this->db->delete('rekening', $data);
	}
	// edit
	public function edit($data)
	{
		$this->db->where('id_rekening', $data['id_rekening']);
		$this->db->update('rekening', $data);
	}

}

/* End of file rekening_model.php */
/* Location: ./application/models/rekening_model.php */