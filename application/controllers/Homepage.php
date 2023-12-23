<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
        $data = $this->session->userdata;   //เรียกหาข้อมูลในฐานข้อมูล แล้ว ตัวอย่างเช่น $user $email
        $this->load->view('home/header',$data);
        $this->load->view('home/content');
        $this->load->view('home/footer');
    }
}