<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects_model extends CI_Model {

	public function get_count() {

		return $this->db->from("projects")->count_all_results();
	}

	public function insert($input) {
		return $this->db->insert('projects', $input);
	}

	public function read_all() {
		$this->db->select('*');
		$this->db->from('projects');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('projects');
	}

	public function get_project($id) {

		$this->db->select('*');
		$this->db->from('projects');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

}
