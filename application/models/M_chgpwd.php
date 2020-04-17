<?php

class M_chgpwd extends CI_Model {
	public function cek_id($username) {
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->from('users');
		$query = $this->db->get();
		$row = $query->row();
      	if (isset($row)) {
          	$data = array(
        		'id' => $row->id,
        		'username' => $row->username,
        		'password' => $row->password
        	);
          	return $data;
	    } else {
      		return $username;
    	}
  }
  
    public function cek_pass($pass, $username) {
      $where = array(
        	'username' => $username,
        	'password' => $pass
        );
      $this->db->select('*');
      $this->db->where($where);
      $this->db->from('users');
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return true;
      } else {
        return false;
      }

      if (isset($row)) {
        $data = array(
              'id' => $row->id,
              'username' => $row->username,
              'password' => $row->password
          );
          return $data;
      } else {
          return $username;
      }
    }
	public function edit($data, $username) {
      	$where = array(
          'username' => $username
        );
		$this->db->where($where);
		return $this->db->update('users', $data);
	}

}
