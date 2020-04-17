<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_register');
	}

	public function index()
	{
		$this->load->view('page/register');
	}

	public function submit()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'email' => $this->input->post('email')
		);
		$reg = $this->m_register->reg($data);
		if ($reg > 0) {
			$this->session->set_flashdata('message_id', 'berhasil ditambah, tunggu 3 detik..');
			$this->session->set_flashdata('seconds_redirect', 3);
			$this->session->set_flashdata('url_redirect', base_url('index.php/login'));
			redirect('temp/load', 'refresh');
		} else {
			$this->session->set_flashdata('message_id', 'Registrasi Gagal, username telah terdaftar! <br/><a class="btn btn-success" href="' . base_url('index.php/login') . '">Login</a>');
			$this->session->set_flashdata('seconds_redirect', 10);
			$this->session->set_flashdata('url_redirect', base_url('index.php/register'));
			redirect('temp/load', 'refresh');
		}
	}
}
