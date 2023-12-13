<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data = $this->session->userdata;
		if (empty($data)) {
			redirect(site_url() . 'login');
		} else {
			redirect(site_url() . 'homepage');
		}
	}

	public function login()
	{
		$data = $this->session->userdata;
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('auth/login',$data);
                }
                else
                {
                
                }
	}
}
