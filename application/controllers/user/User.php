<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function edit()
    {
        $data = $this->session->userdata;

        $this->load->view('home/header',$data);
        $this->load->view('user/edit_profile');
        $this->load->view('home/footer');
    }
}