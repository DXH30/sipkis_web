<?php
class M_register extends CI_Model
{
    public function reg($data)
    {
        $user_num = $this->db->get_where('users', array('username' => $data['username']))->num_rows();
        $email_num = $this->db->get_where('users', array('email' => $data['email']))->num_rows();
        $data['group_id'] = "10";
        $exist_num = $user_num +  $email_num;
        $username = $data['username'];
        if ($exist_num > 0) {
            return 0;
        } else {
            $insertuser = $this->db->insert('users', $data);
            $this->db->select('*');
            $query = $this->db->get_where('users', array('username' => $data['username']));
            $row = $query->row();
            if (isset($row)) {
                $data = array(
                    'id' => $row->id,
                    'username' => $row->username,
                );
            }
        }
        echo $exist_num;
    }
}
