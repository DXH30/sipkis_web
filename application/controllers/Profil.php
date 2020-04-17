<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("index.php/login"));
		}
		$this->load->model('m_profil');
		$this->load->model('m_form');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		$data_in['id'] = $this->m_profil->cek_id($username);
		$data_e = $this->m_profil->edit_data('r', $data_in);
		if (isset($data_e[0]))
			$data['profil'] = $data_e[0];
		else
			$data['profil'] = null;
		$data['username'] = $this->session->userdata("username");
		$data['userlevel'] = $this->session->userdata("level");
		if ($data['userlevel'] == "provinsi") {
			$str_prov = substr($this->session->userdata('username'), 1, 2);
			$int_prov = (int) $str_prov;
			$data['prov_id'] = $int_prov;
			$data['provinsi'] = $this->m_form->provinsi($int_prov);
		}
		$this->load->view('page/profil', $data);
	}

	public function input()
	{
		$username = $this->session->userdata('username');
		$data_in = array(
			'institusi' => $this->input->post('institusi'),
			'email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
			'no_wa' => $this->input->post('no_wa'),
			'no_telp' => $this->input->post('no_telp')
		);
		$data_in['userid'] = $this->m_profil->cek_id($username);
		if (null !== $this->input->post('prov_id')) {
			$data['prov_id'] = $this->input->post('prov_id');
		}
		$data['username'] = $this->session->userdata("username");
		$data['userlevel'] = $this->session->userdata("level");
		if ($data['userlevel'] == "provinsi") {
			$str_prov = substr($this->session->userdata('username'), 1, 2);
			$int_prov = (int) $str_prov;
			$data['prov_id'] = $int_prov;
			$data['provinsi'] = $this->m_form->provinsi($int_prov);
		}
		$insert = $this->m_profil->edit_data('c', $data_in);
		if ($insert == 2) {
			echo "Gagal masuk";
		} elseif ($insert == 1) {
			$this->session->set_flashdata('message_id', 'berhasil edit, tunggu 3 detik..');
			$this->session->set_flashdata('seconds_redirect', 1);
			$this->session->set_flashdata('url_redirect', base_url('index.php/profil'));
			redirect('temp/load', 'refresh');
			echo "Data berhasil dimasukkan";
		} else {
			echo "Terjadi kesalahan";
		}
	}
	public function edit()
	{
		$data['username'] = $this->session->userdata("username");
		$data['userlevel'] = $this->session->userdata("level");
		if ($data['userlevel'] == "provinsi") {
			$str_prov = substr($this->session->userdata('username'), 1, 2);
			$int_prov = (int) $str_prov;
			$data['prov_id'] = $int_prov;
			$data['provinsi'] = $this->m_form->provinsi($int_prov);
		}
		$username = $this->session->userdata('username');
		$data = array(
			'institusi' => $this->input->post('institusi'),
			'email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
			'no_wa' => $this->input->post('no_wa'),
			'no_telp' => $this->input->post('no_telp')
		);
		$data['userid'] = $this->m_profil->cek_id($username);
		$edit = $this->m_profil->edit_data('u', $data);
		if ($edit == 2) {
			$this->session->set_flashdata('message_id', 'gagal edit data, tunggu..');
			$this->session->set_flashdata('seconds_redirect', 1);
			$this->session->set_flashdata('url_redirect', base_url('index.php/profil'));
			redirect('temp/load', 'refresh');
		} elseif ($edit == 1) {
			$this->session->set_flashdata('message_id', 'berhasil edit data, tunggu..');
			$this->session->set_flashdata('seconds_redirect', 1);
			$this->session->set_flashdata('url_redirect', base_url('index.php/profil'));
			redirect('temp/load', 'refresh');
		}
	}
}
