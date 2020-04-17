<?php
class M_form extends CI_Model
{
    public function usaha_pariwisata($a = NULL, $data, $prov_id = NULL)
    {
        if ($a ==  NULL) {
            return $a;
        } else if ($a == 'c') {
            $data_in = $data;
            if ($this->db->insert('usaha_pariwisata', $data_in))
                return 1;
            else
                return 2;
        } else if ($a == 'r') {
            if (!isset($prov_id)) {
                $query = $this->db->query("SELECT usaha_pariwisata.*, usaha_pariwisata_tipe.tipe_usaha FROM usaha_pariwisata
            JOIN usaha_pariwisata_tipe ON usaha_pariwisata.tipe_id = usaha_pariwisata_tipe.id");
            } else {
                $query = $this->db->query("SELECT usaha_pariwisata.*, usaha_pariwisata_tipe.tipe_usaha FROM usaha_pariwisata
            JOIN usaha_pariwisata_tipe ON usaha_pariwisata.tipe_id = usaha_pariwisata_tipe.id WHERE prov_id=$prov_id");
            }
            $data_out = array();
            foreach ($query->result() as $row) {
                if ($row->prov_id != 0) {
                    $provinsi = $this->provinsi($row->prov_id);
                } else {
                    $provinsi = "N/A";
                }
                array_push($data_out, array(
                    'id' => $row->id,
                    'tipe_id' => $row->tipe_id,
                    'tipe_usaha' => $row->tipe_usaha,
                    'nama_usaha' => $row->nama_usaha,
                    'jenis_usaha' => $row->jenis_usaha,
                    'alamat' => $row->alamat,
                    'jumlah_pekerja' => $row->jumlah_pekerja,
                    'jumlah_pekerja_phk' => $row->jumlah_pekerja_phk,
                    'kondisi' => $row->kondisi,
                    'keterangan' => $row->keterangan,
                    'provinsi' => $provinsi,
                    'estimasi_kerugian' => $row->estimasi_kerugian
                ));
            }
            return $data_out;
        } else if ($a == 'u') {
            $data_in = $data;
            $this->db->set($data_in);
            $this->db->where('id', $data['id']);
            if ($this->db->update('usaha_pariwisata')) {
                return 1;
            } else {
                return 2;
            }
        } else if ($a == 'd') {
            $this->db->where('id', $data['id']);
            if ($this->db->delete('usaha_pariwisata'))
                return 1;
            else
                return 2;
        } else if ($a == 'rt') {
            $query = $this->db->query("SELECT * FROM usaha_pariwisata_tipe");
            $data_out = array();
            foreach ($query->result() as $row) {
                array_push($data_out, array(
                    'id' => $row->id,
                    'tipe_usaha' => $row->tipe_usaha
                ));
            }
            return $data_out;
        } else if ($a == 'e') {
            $id = $data['id'];
            $query = $this->db->query("SELECT * FROM usaha_pariwisata WHERE id=$id");
            if (count($query->result_array()) == 0) {
                return $query->result_array();
            }
            return $query->result_array()[0];
        } else {
            return NULL;
        }
    }

    public function desa_wisata($a = NULL, $data, $prov_id = NULL)
    {
        if ($a ==  NULL) {
            return $a;
        } else if ($a == 'c') {
            $data_in = $data;
            if ($this->db->insert('desa_wisata', $data_in))
                return 1;
            else
                return 2;
        } else if ($a == 'r') {
            if (!isset($prov_id)) {
                $query = $this->db->query("SELECT * FROM desa_wisata");
            } else {
                $query = $this->db->query("SELECT * FROM desa_wisata WHERE prov_id=$prov_id");
            }
            $data_out = array();
            foreach ($query->result() as $row) {
                if ($row->prov_id != 0) {
                    $provinsi = $this->provinsi($row->prov_id);
                } else {
                    $provinsi = "N/A";
                }
                array_push($data_out, array(
                    'id' => $row->id,
                    'nama_desa_wisata' => $row->nama_desa_wisata,
                    'alamat' => $row->alamat,
                    'jumlah_pekerja' => $row->jumlah_pekerja,
                    'jumlah_pekerja_phk' => $row->jumlah_pekerja_phk,
                    'kondisi' => $row->kondisi,
                    'provinsi' => $provinsi,
                    'keterangan' => $row->keterangan
                ));
            }
            return $data_out;
        } else if ($a == 'u') {
            $data_in = $data;
            $this->db->set($data_in);
            $this->db->where('id', $data['id']);
            if ($this->db->update('desa_wisata')) {
                return 1;
            } else {
                return 2;
            }
        } else if ($a == 'd') {
            $this->db->where('id', $data['id']);
            if ($this->db->delete('desa_wisata'))
                return 1;
            else
                return 2;
        } else if ($a == 'e') {
            $id = $data['id'];
            $query = $this->db->query("SELECT * FROM desa_wisata WHERE id=$id");
            if (count($query->result_array()) == 0) {
                return $query->result_array();
            }
            return $query->result_array()[0];
        } else {
            return NULL;
        }
    }

    public function usaha_ekonomi_kreatif($a = NULL, $data, $prov_id = NULL)
    {
        if ($a ==  NULL) {
            return $a;
        } else if ($a == 'c') {
            $data_in = $data;
            if ($this->db->insert('usaha_ekonomi_kreatif', $data_in))
                return 1;
            else
                return 2;
        } else if ($a == 'r') {
            if (!isset($prov_id)) {
                $query = $this->db->query("SELECT usaha_ekonomi_kreatif.*, usaha_ekonomi_kreatif_tipe.tipe_usaha
                 FROM usaha_ekonomi_kreatif
            JOIN usaha_ekonomi_kreatif_tipe ON usaha_ekonomi_kreatif.tipe_id = usaha_ekonomi_kreatif_tipe.id");
            } else {
                $query = $this->db->query("SELECT usaha_ekonomi_kreatif.*, usaha_ekonomi_kreatif_tipe.tipe_usaha
                 FROM usaha_ekonomi_kreatif
            JOIN usaha_ekonomi_kreatif_tipe ON usaha_ekonomi_kreatif.tipe_id = usaha_ekonomi_kreatif_tipe.id
            WHERE prov_id=$prov_id");
            }
            $data_out = array();
            foreach ($query->result() as $row) {
                if ($row->prov_id != 0) {
                    $provinsi = $this->provinsi($row->prov_id);
                } else {
                    $provinsi = "N/A";
                }
                array_push($data_out, array(
                    'id' => $row->id,
                    'nama_usaha' => $row->nama_usaha,
                    'tipe_usaha' => $row->tipe_usaha,
                    'jumlah_pekerja' => $row->jumlah_pekerja,
                    'jumlah_pekerja_phk' => $row->jumlah_pekerja_phk,
                    'alamat' => $row->alamat,
                    'kondisi' => $row->kondisi,
                    'keterangan' => $row->keterangan,
                    'provinsi' => $provinsi,
                    'estimasi_kerugian' => $row->estimasi_kerugian
                ));
            }
            return $data_out;
        } else if ($a == 'u') {
            $data_in = $data;
            $this->db->set($data_in);
            $this->db->where('id', $data['id']);
            if ($this->db->update('usaha_ekonomi_kreatif')) {
                return 1;
            } else {
                return 2;
            }
        } else if ($a == 'd') {
            $this->db->where('id', $data['id']);
            if ($this->db->delete('usaha_ekonomi_kreatif'))
                return 1;
            else
                return 2;
        } else if ($a == 'rt') {
            $query = $this->db->query("SELECT * FROM usaha_ekonomi_kreatif_tipe");
            $data_out = array();
            foreach ($query->result() as $row) {
                array_push($data_out, array(
                    'id' => $row->id,
                    'tipe_usaha' => $row->tipe_usaha
                ));
            }
            return $data_out;
        } else if ($a == 'e') {
            $id = $data['id'];
            $query = $this->db->query("SELECT * FROM usaha_ekonomi_kreatif WHERE id=$id");
            if (count($query->result_array()) == 0) {
                return $query->result_array();
            }
            return $query->result_array()[0];
        } else {
            return NULL;
        }
    }

    public function usaha_informal($a = NULL, $data, $prov_id = NULL)
    {
        if ($a ==  NULL) {
            return $a;
        } else if ($a == 'c') {
            $data_in = $data;
            if ($this->db->insert('usaha_informal', $data_in))
                return 1;
            else
                return 2;
        } else if ($a == 'r') {
            if (!isset($prov_id)) {
                $query = $this->db->query("SELECT * FROM usaha_informal");
            } else {
                $query = $this->db->query("SELECT * FROM usaha_informal WHERE prov_id=$prov_id");
            }
            $data_out = array();
            foreach ($query->result() as $row) {
                if ($row->prov_id != 0) {
                    $provinsi = $this->provinsi($row->prov_id);
                } else {
                    $provinsi = "N/A";
                }
                array_push($data_out, array(
                    'id' => $row->id,
                    'pekerjaan' => $row->pekerjaan,
                    'alamat' => $row->alamat,
                    'jumlah_pekerja' => $row->jumlah_pekerja,
                    'jumlah_pekerja_phk' => $row->jumlah_pekerja_phk,
                    'kondisi' => $row->kondisi,
                    'provinsi' => $provinsi,
                    'keterangan' => $row->keterangan
                ));
            }
            return $data_out;
        } else if ($a == 'u') {
            $data_in = $data;
            $this->db->set($data_in);
            $this->db->where('id', $data['id']);
            if ($this->db->update('usaha_informal')) {
                return 1;
            } else {
                return 2;
            }
        } else if ($a == 'd') {
            $this->db->where('id', $data['id']);
            if ($this->db->delete('usaha_informal'))
                return 1;
            else
                return 2;
        } else if ($a == 'e') {
            $id = $data['id'];
            $query = $this->db->query("SELECT * FROM usaha_informal WHERE id=$id");
            if (count($query->result_array()) == 0) {
                return $query->result_array();
            }
            return $query->result_array()[0];
        } else {
            return NULL;
        }
    }

    public function tenaga_kerja_phk($a = NULL, $data, $prov_id = NULL)
    {
        if ($a ==  NULL) {
            return $a;
        } else if ($a == 'c') {
            $data_in = $data;
            if ($this->db->insert('tenaga_kerja_phk', $data_in))
                return 1;
            else
                return 2;
        } else if ($a == 'r') {
            if (!isset($prov_id)) {
                $query = $this->db->query("SELECT * FROM tenaga_kerja_phk");
            } else {
                $query = $this->db->query("SELECT * FROM tenaga_kerja_phk WHERE prov_id=$prov_id");
            }
            $data_out = array();
            foreach ($query->result() as $row) {
                if ($row->prov_id != 0) {
                    $provinsi = $this->provinsi($row->prov_id);
                } else {
                    $provinsi = "N/A";
                }
                array_push($data_out, array(
                    'id' => $row->id,
                    'nama' => $row->nama,
                    'tempat_lahir' => $row->tempat_lahir,
                    'tanggal_lahir' => $row->tanggal_lahir,
                    'nik' => $row->nik,
                    'telp' => $row->telp,
                    'whatsapp' => $row->whatsapp,
                    'email' => $row->email,
                    'jabatan' => $row->jabatan,
                    'sertifikat' => $row->sertifikat,
                    'masa_kerja' => $row->masa_kerja,
                    'provinsi' => $provinsi,
                    'keterangan' => $row->keterangan,
                    'prov_id' => $row->prov_id,
                    'tipe_id' => $row->tipe_id
                ));
            }
            return $data_out;
        } else if ($a == 'u') {
            $data_in = $data;
            $this->db->set($data_in);
            $this->db->where('id', $data['id']);
            if ($this->db->update('tenaga_kerja_phk')) {
                return 1;
            } else {
                return 2;
            }
        } else if ($a == 'd') {
            $this->db->where('id', $data['id']);
            if ($this->db->delete('tenaga_kerja_phk'))
                return 1;
            else
                return 2;
        } else if ($a == 'rt') {
            $query = $this->db->query("SELECT * FROM tenaga_kerja_phk_tipe");
            $data_out = array();
            foreach ($query->result() as $row) {
                array_push($data_out, array(
                    'id' => $row->id,
                    'tipe_usaha' => $row->tipe_usaha
                ));
            }
            return $data_out;
        } else if ($a == 'e') {
            $id = $data['id'];
            $query = $this->db->query("SELECT * FROM tenaga_kerja_phk WHERE id=$id");
            if (count($query->result_array()) == 0) {
                return $query->result_array();
            }
            return $query->result_array()[0];
        } else {
            return NULL;
        }
    }

    public function provinsi($int_prov)
    {
        $query = $this->db->query("SELECT * from provinsi WHERE id=$int_prov");
        $row = $query->result_array();
        return $row[0]['provinsi'];
    }

    public function list_provinsi()
    {
        $query = $this->db->query("SELECT * from provinsi");
        $data_out = array();
        foreach ($query->result() as $row) {
            $username = sprintf('A%02d', $row->id);
            array_push($data_out, array(
                'id' => $row->id,
                'provinsi' => $row->provinsi,
                'username' => $username
            ));
        }
        return $data_out;
    }
}
