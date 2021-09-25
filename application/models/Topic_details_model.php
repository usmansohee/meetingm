<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic_details_model extends CI_Model {

	public function read_all() {
		$this->db->select('*');
		$this->db->from('topic_details');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_topics($id) {
		$this->db->select('*');
		$this->db->from('topic_details');
		$this->db->where('topic_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_main_topic($id) {
		$this->db->select('topic_id');
		$this->db->from('topic_details');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update($id,$input) {
		$this->db->where('id', $id);
		return $this->db->update('topic_details', $input);
	}

	public function insert($input) {
		return $this->db->insert('topic_details', $input);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('projects');
	}
}
