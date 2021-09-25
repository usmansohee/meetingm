<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topics_model extends CI_Model {

	public function get_topics($id) {
		$this->db->select('*');
		$this->db->from('topics');
		$this->db->where('admin_project_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function read_all() {
		$this->db->select('*');
		$this->db->from('topics');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert($input) {
		return $this->db->insert('topics', $input);
	}

	public function get_one_topic($id) {

		$this->db->select('*');
		$this->db->from('topics');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('topics');
	}

	public function admin_project_id($id) {
		$this->db->select('admin_project_id');
		$this->db->from('topics');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	/*** not used ***/
	//function read berfungsi mengambil/read data dari table user di database
	public function read_single($username, $password) {

		//sql read
		$this->db->select('*');
		$this->db->from('users');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
		return $query->row_array();
	}

	//function update berfungsi merubah data ke table user di database
	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('users', $input);
	}
}
