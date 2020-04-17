<?php
class M_profil extends CI_Model
{
    public function edit_data($a = NULL, $data)
    {
        if ($a ==  NULL) {
            return $a;
        } else if ($a == 'c') {
            $data_in = $data;
            if ($this->db->insert('profil', $data_in))
                return 1;
            else
                return 2;
        } else if ($a == 'r') {
            $id = $data['id'];
            // $query pertanyaan
            $query = $this->db->query("SELECT * FROM profil WHERE userid=$id");
            $data_out = array();
            foreach ($query->result() as $row) {
                array_push($data_out, array(
                    'id' => $row->id,
                    'userid' => $row->userid,
                    'institusi' => $row->institusi,
                    'email' => $row->email,
                    'website' => $row->website,
                    'no_wa' => $row->no_wa,
                    'no_telp' => $row->no_telp
                ));
            }
            return $data_out;
        } else if ($a == 'u') {
            $data_in = $data;
            $this->db->set($data_in);
            $this->db->where('userid', $data['userid']);
            if ($this->db->update('profil')) {
                return 1;
            } else {
                return 2;
            }
        } else if ($a == 'd') {
            $this->db->where('id', $data['id']);
            if ($this->db->delete('profil'))
                return 1;
            else
                return 2;
        } else {
            return NULL;
        }
    }

    public function cek_id($username)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->from('users');
        $query = $this->db->get();
        $row = $query->row();
        if (isset($row)) {
            $data = array(
                'id' => $row->id,
            );
            return $data['id'];
        } else {
            return false;
        }
    }
}
