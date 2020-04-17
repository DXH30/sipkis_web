<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login") {
			redirect(base_url("index.php/login"));
		}
		$this->load->model('m_form');
	}

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['userlevel'] = $this->session->userdata('level');

		if($this->session->userdata('level') == "admin") {
			$data['usaha_pariwisata'] = $this->m_form->usaha_pariwisata('r', NULL, NULL);
			$data['desa_wisata'] = $this->m_form->desa_wisata('r', NULL, NULL);
			$data['usaha_ekonomi_kreatif'] = $this->m_form->usaha_ekonomi_kreatif('r', NULL, NULL);
			$data['usaha_informal'] = $this->m_form->usaha_informal('r', NULL, NULL);
			$data['tenaga_kerja_phk'] = $this->m_form->tenaga_kerja_phk('r', NULL, NULL);
			$this->load->view('page/admin', $data);
		
		} else if ($this->session->userdata('level') == "provinsi") {
			// Ambil provinsi dari trim angka
			$str_prov = substr($this->session->userdata('username'), 1, 2);
			$int_prov = (int) $str_prov;
			$data['provinsi'] = $this->m_form->provinsi($int_prov);
			$data['usaha_pariwisata'] = $this->m_form->usaha_pariwisata('r', NULL, $int_prov);
			$data['desa_wisata'] = $this->m_form->desa_wisata('r', NULL, $int_prov);
			$data['usaha_ekonomi_kreatif'] = $this->m_form->usaha_ekonomi_kreatif('r', NULL, $int_prov);
			$data['usaha_informal'] = $this->m_form->usaha_informal('r', NULL, $int_prov);
			$data['tenaga_kerja_phk'] = $this->m_form->tenaga_kerja_phk('r', NULL, $int_prov);
			$this->load->view('page/admin', $data);
		}
	}
}
