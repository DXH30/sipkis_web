<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chgpwd extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('status') != "login") {
			redirect(base_url("index.php/login"));
		}
		$this->load->model('m_form');
		$this->load->model('m_chgpwd');
	}

	public function index() {
		$data['title'] = "SIPKIS | Ganti Password";
		$data['username'] = $this->session->userdata("username");
		$data['userlevel'] = $this->session->userdata("level");
		if ($data['userlevel'] == "provinsi") {
			$str_prov = substr($this->session->userdata('username'), 1, 2);
			$int_prov = (int) $str_prov;
			$data['prov_id'] = $int_prov;
			$data['provinsi'] = $this->m_form->provinsi($int_prov);
		}

		$this->load->view('page/chgpwd',$data);
	}

	public function edit() {
		$old = array(
			'username' => $data['username'] = $this->session->userdata('username'),
			'password' => md5($this->input->post('password_old'))
		);
		$data = array(
			'username' => $data['username'] = $this->session->userdata('username'),
			'password' => md5($this->input->post('password_baru'))
		);
		$identitas = $this->m_chgpwd->cek_id($data['username']);
		$cek_pass = $this->m_chgpwd->cek_pass($old['password'], $old['username']);
		if($this->m_chgpwd->edit($data, $data['username'])) {
			if (!$cek_pass) {
				$data['message'] = 'Password lama yang anda masukkan salah';
			}
			$data['title'] = "BKPK | Ganti Password";
			$data['username'] = $this->session->userdata('username');
			$data['userlevel'] = $this->session->userdata('level');
			if ($data['userlevel'] == "provinsi") {
				$str_prov = substr($this->session->userdata('username'), 1, 2);
				$int_prov = (int) $str_prov;
				$data['prov_id'] = $int_prov;
				$data['provinsi'] = $this->m_form->provinsi($int_prov);
			}
			$this->load->view('page/chgpwd', $data);
		}
	}
}
