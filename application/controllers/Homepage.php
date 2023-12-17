<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->view('bootstrap');
	}

    public function index()
    {
        $this->load->view('header');
        $this->load->view('content');
        $this->load->view('footer');
    }
}