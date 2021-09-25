<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendees_model extends CI_Model {

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

	public function get_user($id) {
		$this->db->select('*');
		$this->db->from('attendees');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_count() {
		return $this->db->from("attendees")->count_all_results();
	}

}
