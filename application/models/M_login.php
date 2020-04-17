<?php

class M_login extends CI_Model {
	public function cek_login($table, $where) {
		return $this->db->get_where($table, $where);
	}
	public function cek_gid($username) {
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->from('users');
		$query = $this->db->get();
		$row = $query->row();
		if(isset($row)) {
			$data = array(
              'username' => $row->username,
              'gid' => $row->group_id
			);
			return $data;
		} else {
			return false;
		}
	}
}
