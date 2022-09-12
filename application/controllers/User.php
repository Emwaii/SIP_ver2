<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index()
	{
        $data["role"] = $this->All_model->getAllRole();
		$data["user"] = $this->All_model->getAllUser();
        $this->load->view("dashboard/user",$data);
		// $this->load->view('dashboard/_login');
	}
	// Get Save User
	public function save_user()
	{
		$data = array(
			'nama_pengguna'	        => $this->input->post('nama_pengguna'),
			'email_pengguna'	    => $this->input->post('email_pengguna'),
			'telepon_pengguna'      => $this->input->post('telepon_pengguna'),
			'id_role'	            => $this->input->post('id_role'),
            'username_pengguna'	    => $this->input->post('username_pengguna'),
			'password_pengguna'	    => $this->input->post('password_pengguna'),
			'foto_profile'		    => $this->input->post('foto_profile'),
		);
		$this->All_model->simpandatauser($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('users'));
	}

	// Edit User
	public function edit_user($id)
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["user"] = $this->All_model->getById_user($id);
		$this->load->view("component/_frmdituser", $data);
	}

	// Update User
	public function update_user()
	{
		$id = array(
			'id_pengguna' => $this->input->post('id_pengguna')
		);

		$data = array(
			'nama_pengguna'	        => $this->input->post('nama_pengguna'),
			'email_pengguna'	    => $this->input->post('email_pengguna'),
			'telepon_pengguna'      => $this->input->post('telepon_pengguna'),
			'id_role'	            => $this->input->post('id_role'),
            'username_pengguna'	    => $this->input->post('username_pengguna'),
			'password_pengguna'	    => $this->input->post('password_pengguna'),
			'foto_profile'		    => $this->input->post('foto_profile')
		);
		$this->All_model->updatedatauser($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('users'));
	}

	// Delete User akun
	public function deleteuser($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->All_model->del_user($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('users'));
		}
	}
}