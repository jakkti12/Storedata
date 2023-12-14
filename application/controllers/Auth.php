<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('curl','password');
		$this->load->model('user_model');
		$this->load->helper(array('form', 'url'));
		$this->load->view('bootstrap');
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
		if (!empty($data['email'])) {
			redirect(site_url() . '');
		} else {

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$result = $this->user_model->getAllSettings();
			$data['recaptcha'] = $result->recaptcha;

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('auth/login', $data);
			} else {
				$post = $this->input->post();
				$clean = $this->security->xss_clean($post);
				$userInfo = $this->user_model->checkLogin($clean);
				if ($data['recaptcha'] == 'yes') {
					$recaptchaResponse = $this->input->post('g-recaptcha-response');
					$userIp = $_SERVER['REMOTE_ADDR'];
					$key = $this->recaptcha->secret;
					$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $key . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;
					$response = $this->curl->simple_get($url);
					$status = json_decode($response, true);

					if (!$userInfo) {
						$this->session->set_flashdata('flash_message', 'Wrong password or email.');
						redirect(site_url() . 'login');
					} elseif ($userInfo->banned_users == "ban") {
						$this->session->set_flashdata('danger_message', 'You’re temporarily banned from our website!');
						redirect(site_url() . 'login');
					} else if (!$status['success']) {

						$this->session->set_flashdata('flash_message', 'Error...! Google Recaptcha UnSuccessful!');
						redirect(site_url() . 'login');
						exit;
					} elseif ($status['success'] && $userInfo && $userInfo->banned_users == "unban") {
						foreach ($userInfo as $key => $val) {
							$this->session->set_userdata($key, $val);
						}
						redirect(site_url() . 'login');
					} else {
						$this->session->set_flashdata('flash_message', 'Something Error!');
						redirect(site_url() . 'login');
						exit;
					}
				} else {
					if (!$userInfo) {
						$this->session->set_flashdata('flash_message', 'Wrong password or email.');
						redirect(site_url() . 'login');
					} elseif ($userInfo->banned_users == "ban") {
						$this->session->set_flashdata('danger_message', 'You’re temporarily banned from our website!');
						redirect(site_url() . 'login');
					} elseif ($userInfo && $userInfo->banned_users == "unban")
					{
						foreach ($userInfo as $key => $val) {
							$this->session->set_userdata($key, $val);
						}
						redirect(site_url() . 'login');
					} else {
						$this->session->set_flashdata('flash_message', 'Something Error!');
						redirect(site_url() . 'login');
						exit;
					}
				}
			}
		}
	}

	public function register()
	{
		$this->load->view('auth/register');
	}

	public function logout()
	{
		$this->session->sess_destroy();
        redirect(site_url() . 'login');
	}
}
