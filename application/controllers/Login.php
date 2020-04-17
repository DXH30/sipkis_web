<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_form');
	}

	public function index()
	{
		if (isset($_GET['error'])) {
			$data['pesan'] = "Error : Password salah";
		} else if (isset($_GET['lupa'])) {
			$data['pesan'] = "Error : Password lupa";
		}
		$data['provinsi'] = $this->m_form->list_provinsi();
		$this->load->view('page/login', $data);
	}

	public function submit()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);
		$cek = $this->m_login->cek_login("users", $where)->num_rows();
		$cek_id = $this->m_login->cek_gid($username);
		$gid = $cek_id['gid'];
		if ($cek > 0) {
			if ($gid == 1) {
				$data_session = array(
					'username' => $username,
					'status' => "login",
					'level' => "admin"
				);
			} else if ($gid == 2) {
				$data_session = array(
					'username' => $username,
					'status' => "login",
					'level' => "provinsi"
				);
			} else {
				$data_session = array(
					'username' => $username,
					'status' => "login",
					'level' => "user"
				);
			}
			$this->session->set_userdata($data_session);
			redirect(base_url('index.php/admin'));
			//echo $gid;
		} else redirect(base_url('index.php/login?error'));
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/login'));
	}

	function kuesioner()
	{
		$data['title'] = "LOGIN";
		$this->load->view('login_kuesioner.php', $data);
	}
}
