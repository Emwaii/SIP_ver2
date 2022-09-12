<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->view('dashboard/_login');
	}

	public function index()
	{
		$username = $this->input->post('username_pengguna');
		$password = $this->input->post('password_pengguna');

		$user = $this->db->get_where('pengguna', ['username_pengguna' => $username])->row_array();

		if ($user) {
			//usernya ada

			if ($user['terverifikasi'] == 1) {
				//cek password
				if (sha1($password)== $user['password_pengguna']) {
				// if (password_verify($password, $user['password_pengguna'])) {
					$data = [
						'nama_pengguna' => $user['nama_pengguna'],
						'id_role' => $user['id_role']
					];
					$this->session->set_userdata($data);
					// $data["usertotal"] = $this->All_model->getCountUsers();
					// $data["totalpengajar"] = $this->All_model->getCountPengajar();
					// $data["totalpeserta"] = $this->All_model->getCountPesertadik();
					// $data["totalabsensi"] = $this->All_model->getCountAbsensi();
					redirect('dashboard');
					// $this->load->view("dashboard/index");
				} else {
					$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect(site_url(''));
				}
			} else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
				redirect(site_url(''));
			}
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect(site_url(''));
		}
	}
		
}
