<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_form');
    }

    public function index()
    {
        $this->load->view('page/admin');
    }

    public function usaha_pariwisata($send = NULL, $data = array())
    {
        if ($send == NULL) {
            $data = array();
            if(null !== $this->input->get('tipe_usaha'))
                $data['tipe_usaha'] = $this->input->get('tipe_usaha');
            $tipe_usaha = $this->m_form->usaha_pariwisata('rt', $data);
            $data['tipe_usaha'] = $tipe_usaha;
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $this->load->view('page/form/usaha_pariwisata', $data);
        } else if ($send == 1) {
            $data = array(
                'id' => $this->input->post('id'),
                'tipe_id' => $this->input->post('tipe_id'),
                'nama_usaha' => $this->input->post('nama_usaha'),
                'jenis_usaha' => $this->input->post('jenis_usaha'),
                'alamat' => $this->input->post('alamat'),
                'jumlah_pekerja' => $this->input->post('jumlah_pekerja'),
                'jumlah_pekerja_phk' => $this->input->post('jumlah_pekerja_phk'),
                'kondisi' => $this->input->post('kondisi'),
                'keterangan' => $this->input->post('keterangan'),
                'estimasi_kerugian' => $this->input->post('estimasi_kerugian')
            );
            if (null !== $this->input->post('prov_id')) {
                $data['prov_id'] = $this->input->post('prov_id');
            }
            $insert = $this->m_form->usaha_pariwisata('c', $data);
            if ($insert == 2) {
                echo "Gagal masuk";
            } elseif ($insert == 1) {
                $this->session->set_flashdata('message_id', 'berhasil ditambah, tunggu 3 detik..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/form/usaha_pariwisata'));
                redirect('temp/load', 'refresh');
                echo "Data berhasil dimasukkan";
            } else {
                echo "Terjadi kesalahan";
            }
        } else if ($send == 2) {
            $data['id'] = $this->input->post('id');
            $delete = $this->m_form->usaha_pariwisata('d', $data);
            if ($delete == 2) {
                $this->session->set_flashdata('message_id', 'gagal delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($delete == 1) {
                $this->session->set_flashdata('message_id', 'berhasil delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        } else if ($send == 3) {
            $data['id'] = $this->input->get('id');
            $data_e = $this->m_form->usaha_pariwisata('e', $data);
            $data = $data_e;
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $tipe_usaha = $this->m_form->usaha_pariwisata('rt', $data);
            $data['tipe_usaha'] = $tipe_usaha;
            $data['edit'] = 1;
            $this->load->view('page/form/usaha_pariwisata', $data);
        } else if ($send == 4) {
            $edit = $this->m_form->usaha_pariwisata('u', $_POST);
            if ($edit == 2) {
                $this->session->set_flashdata('message_id', 'gagal edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($edit == 1) {
                $this->session->set_flashdata('message_id', 'berhasil edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        }
    }

    public function desa_wisata($send = NULL, $data = array())
    {
        if ($send == NULL) {
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $this->load->view('page/form/desa_wisata', $data);
        } else if ($send == 1) {
            $data = array(
                'nama_desa_wisata' => $this->input->post('nama_desa_wisata'),
                'alamat' => $this->input->post('alamat'),
                'jumlah_pekerja' => $this->input->post('jumlah_pekerja'),
                'jumlah_pekerja_phk' => $this->input->post('jumlah_pekerja_phk'),
                'kondisi' => $this->input->post('kondisi'),
                'keterangan' => $this->input->post('keterangan')
            );
            if (null !== $this->input->post('prov_id')) {
                $data['prov_id'] = $this->input->post('prov_id');
            }
            $insert = $this->m_form->desa_wisata('c', $data);
            if ($insert == 2) {
                echo "Gagal masuk";
            } elseif ($insert == 1) {
                $this->session->set_flashdata('message_id', 'berhasil ditambah, tunggu 3 detik..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/form/desa_wisata'));
                redirect('temp/load', 'refresh');
                echo "Data berhasil dimasukkan";
            } else {
                echo "Terjadi kesalahan";
            }
        } else if ($send == 2) {
            $data['id'] = $this->input->post('id');
            $delete = $this->m_form->desa_wisata('d', $data);
            if ($delete == 2) {
                $this->session->set_flashdata('message_id', 'gagal delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($delete == 1) {
                $this->session->set_flashdata('message_id', 'berhasil delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        } else if ($send == 3) {
            $data['id'] = $this->input->get('id');
            $data_e = $this->m_form->desa_wisata('e', $data);
            $data = $data_e;
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $data['edit'] = 1;
            $this->load->view('page/form/desa_wisata', $data);
        } else if ($send == 4) {
            $edit = $this->m_form->desa_wisata('u', $_POST);
            if ($edit == 2) {
                $this->session->set_flashdata('message_id', 'gagal edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($edit == 1) {
                $this->session->set_flashdata('message_id', 'berhasil edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        }
    }

    public function usaha_ekonomi_kreatif($send = NULL, $data = array())
    {
        if ($send == NULL) {
            $data = array();
            $tipe_usaha = $this->m_form->usaha_ekonomi_kreatif('rt', $data);
            $data['tipe_usaha'] = $tipe_usaha;
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $this->load->view('page/form/usaha_ekonomi_kreatif', $data);
        } else if ($send == 1) {
            $data = array(
                'nama_usaha' => $this->input->post('nama_usaha'),
                'tipe_id' => $this->input->post('tipe_id'),
                'alamat' => $this->input->post('alamat'),
                'jumlah_pekerja' => $this->input->post('jumlah_pekerja'),
                'jumlah_pekerja_phk' => $this->input->post('jumlah_pekerja_phk'),
                'kondisi' => $this->input->post('kondisi'),
                'keterangan' => $this->input->post('keterangan'),
                'estimasi_kerugian' => $this->input->post('estimasi_kerugian')
            );
            if (null !== $this->input->post('prov_id')) {
                $data['prov_id'] = $this->input->post('prov_id');
            }
            $insert = $this->m_form->usaha_ekonomi_kreatif('c', $data);
            if ($insert == 2) {
                echo "Gagal masuk";
            } elseif ($insert == 1) {
                $this->session->set_flashdata('message_id', 'berhasil ditambah, tunggu 3 detik..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/form/usaha_ekonomi_kreatif'));
                redirect('temp/load', 'refresh');
                echo "Data berhasil dimasukkan";
            } else {
                echo "Terjadi kesalahan";
            }
        } else if ($send == 2) {
            $data['id'] = $this->input->post('id');
            $delete = $this->m_form->usaha_ekonomi_kreatif('d', $data);
            if ($delete == 2) {
                $this->session->set_flashdata('message_id', 'gagal delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($delete == 1) {
                $this->session->set_flashdata('message_id', 'berhasil delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        } else if ($send == 3) {
            $data['id'] = $this->input->get('id');
            $data_e = $this->m_form->usaha_ekonomi_kreatif('e', $data);
            $data = $data_e;
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $data['edit'] = 1;
            $tipe_usaha = $this->m_form->usaha_ekonomi_kreatif('rt', $data);
            $data['tipe_usaha'] = $tipe_usaha;
            $this->load->view('page/form/usaha_ekonomi_kreatif', $data);
        } else if ($send == 4) {
            $edit = $this->m_form->usaha_ekonomi_kreatif('u', $_POST);
            if ($edit == 2) {
                $this->session->set_flashdata('message_id', 'gagal edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($edit == 1) {
                $this->session->set_flashdata('message_id', 'berhasil edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        }
    }

    public function usaha_informal($send = NULL, $data = array())
    {
        if ($send == NULL) {
            $data = array();
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $this->load->view('page/form/usaha_informal', $data);
        } else if ($send == 1) {
            $data = array(
                'pekerjaan' => $this->input->post('pekerjaan'),
                'alamat' => $this->input->post('alamat'),
                'jumlah_pekerja' => $this->input->post('jumlah_pekerja'),
                'jumlah_pekerja_phk' => $this->input->post('jumlah_pekerja_phk'),
                'kondisi' => $this->input->post('kondisi'),
                'keterangan' => $this->input->post('keterangan')
            );
            if (null !== $this->input->post('prov_id')) {
                $data['prov_id'] = $this->input->post('prov_id');
            }
            $insert = $this->m_form->usaha_informal('c', $data);
            if ($insert == 2) {
                echo "Gagal masuk";
            } elseif ($insert == 1) {
                $this->session->set_flashdata('message_id', 'berhasil ditambah, tunggu 3 detik..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/form/usaha_informal'));
                redirect('temp/load', 'refresh');
                echo "Data berhasil dimasukkan";
            } else {
                echo "Terjadi kesalahan";
            }
        } else if ($send == 2) {
            $data['id'] = $this->input->post('id');
            $delete = $this->m_form->usaha_informal('d', $data);
            if ($delete == 2) {
                $this->session->set_flashdata('message_id', 'gagal delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($delete == 1) {
                $this->session->set_flashdata('message_id', 'berhasil delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        } else if ($send == 3) {
            $data['id'] = $this->input->get('id');
            $data_e = $this->m_form->usaha_informal('e', $data);
            $data = $data_e;
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $data['edit'] = 1;
            $this->load->view('page/form/usaha_informal', $data);
        } else if ($send == 4) {
            $edit = $this->m_form->usaha_informal('u', $_POST);
            if ($edit == 2) {
                $this->session->set_flashdata('message_id', 'gagal edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($edit == 1) {
                $this->session->set_flashdata('message_id', 'berhasil edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        }
    }

    public function tenaga_kerja_phk($send = NULL, $data = array())
    {
        if ($send == NULL) {
            $data = array();
            if (null !== $this->input->get('tipe_id'))
                $data['tipe_id'] = $this->input->get('tipe_id');
            
            $tipe_usaha = $this->m_form->tenaga_kerja_phk('rt', $data);
            $data['tipe_usaha'] = $tipe_usaha;
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $this->load->view('page/form/tenaga_kerja_phk', $data);
        } else if ($send == 1) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'nik' => $this->input->post('nik'),
                'telp' => $this->input->post('telp'),
                'whatsapp' => $this->input->post('whatsapp'),
                'email' => $this->input->post('email'),
                'jabatan' => $this->input->post('jabatan'),
                'sertifikat' => $this->input->post('sertifikat'),
                'masa_kerja' => $this->input->post('masa_kerja'),
                'keterangan' => $this->input->post('keterangan'),
                'tipe_id' => $this->input->post('tipe_id')
            );
            if (null !== $this->input->post('prov_id')) {
                $data['prov_id'] = $this->input->post('prov_id');
            }
            $insert = $this->m_form->tenaga_kerja_phk('c', $data);
            if ($insert == 2) {
                echo "Gagal masuk";
            } elseif ($insert == 1) {
                $this->session->set_flashdata('message_id', 'berhasil ditambah, tunggu 3 detik..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/form/tenaga_kerja_phk'));
                redirect('temp/load', 'refresh');
                echo "Data berhasil dimasukkan";
            } else {
                echo "Terjadi kesalahan";
            }
        } else if ($send == 2) {
            $data['id'] = $this->input->post('id');
            $delete = $this->m_form->tenaga_kerja_phk('d', $data);
            if ($delete == 2) {
                $this->session->set_flashdata('message_id', 'gagal delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($delete == 1) {
                $this->session->set_flashdata('message_id', 'berhasil delete data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        } else if ($send == 3) {
            $data['id'] = $this->input->get('id');
            $data_e = $this->m_form->tenaga_kerja_phk('e', $data);
            $data = $data_e;
            $data['username'] = $this->session->userdata("username");
            $data['userlevel'] = $this->session->userdata("level");
            if ($data['userlevel'] == "provinsi") {
                $str_prov = substr($this->session->userdata('username'), 1, 2);
                $int_prov = (int) $str_prov;
                $data['prov_id'] = $int_prov;
                $data['provinsi'] = $this->m_form->provinsi($int_prov);
            }
            $data['edit'] = 1;
            $tipe_usaha = $this->m_form->tenaga_kerja_phk('rt', $data);
            $data['tipe_usaha'] = $tipe_usaha;
            $this->load->view('page/form/tenaga_kerja_phk', $data);
        } else if ($send == 4) {
            $edit = $this->m_form->tenaga_kerja_phk('u', $_POST);
            if ($edit == 2) {
                $this->session->set_flashdata('message_id', 'gagal edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            } elseif ($edit == 1) {
                $this->session->set_flashdata('message_id', 'berhasil edit data, tunggu..');
                $this->session->set_flashdata('seconds_redirect', 1);
                $this->session->set_flashdata('url_redirect', base_url('index.php/admin'));
                redirect('temp/load', 'refresh');
            }
        }
    }
}
