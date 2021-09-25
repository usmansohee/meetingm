<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function read_single($username, $password) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function read_all() {
		$this->db->select('*');
		$this->db->from('attendees');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert($input) {
		return $this->db->insert('attendees', $input);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('attendees');
	}

	public function get_count() {
		return $this->db->from("attendees")->count_all_results();
	}

}
