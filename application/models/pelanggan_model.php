<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}
	//Listing all Pelanggan
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Login Pelanggan
	public function login($email,$password)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array(		'email'	=> $email,
							   		'password'	=> SHA1($password)
						));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Sudah Login 
	public function sudah_login($email,$nama_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array(		'email'			 => $email,
							   		'nama_pelanggan' => $nama_pelanggan
						));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail Pelanggan
	public function detail($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('pelanggan', $data);
	}
	// delete 
	public function delete($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('pelanggan', $data);
	}
	// edit
	public function edit($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan', $data);
	}

}

/* End of file pelanggan_model.php */
/* Location: ./application/models/pelanggan_model.php */