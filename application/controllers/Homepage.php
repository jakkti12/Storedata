<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$data = $this->session->userdata;
	}

	public function index()
	{
		$this->load->view('homeview');
	}
}
