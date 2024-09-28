<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}
	// Detail Slider
	public function detail($id_slider)
	{
		$this->db->select('*');
		$this->db->from('slider');
		$this->db->where('id_slider', $id_slider);
		$this->db->order_by('id_slider', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Slider 
	public function slider()
	{
		$this->db->select('*');
		$this->db->from('slider');
		$this->db->order_by('id_slider', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah Slider
	public function tambah_slider($data)
	{
		$this->db->insert('slider', $data);
	}

	// delete 
	public function delete($data)
	{
		$this->db->where('id_slider', $data['id_slider']);
		$this->db->delete('slider', $data);
	}

}

/* End of file slider_model.php */
/* Location: ./application/models/slider_model.php */