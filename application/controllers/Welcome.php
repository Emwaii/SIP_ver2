<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('dashboard/_login');
	}
	
	public function notfound()
	{
		$this->load->view('404');
	}

	public function dashboard()
	{
		// $data["usertotal"] = $this->All_model->getCountUsers();
		// $data["totalpengajar"] = $this->All_model->getCountPengajar();
		// $data["totalpeserta"] = $this->All_model->getCountPesertadik();
		// $data["totalabsensi"] = $this->All_model->getCountAbsensi();
		$this->load->view("dashboard/index");
	}
}
