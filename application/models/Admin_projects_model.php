<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_projects_model extends CI_Model {

	public function get_count() {
		return $this->db->from("admin_projects")->count_all_results();
	}

	public function insert($input) {
		return $this->db->insert('admin_projects', $input);
	}

	public function read_all() {
		$this->db->select('*');
		$this->db->from('admin_projects');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('admin_projects');
	}

	public function get_one_admin_project_data($id) {
		$this->db->select('*');
		$this->db->from('admin_projects');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row_array();
	}

}
