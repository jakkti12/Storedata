<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public $status;
    public $banned_users;

	public function __construct()
	{
		parent::__construct();
        $this->load->model('user_model');
        $this->load->library('password');
        $this->load->library('UserLevel');
        $this->load->library('recaptcha');
        $this->load->library('curl');
        $this->status = $this->config->item('status');
        $this->banned_users = $this->config->item('banned_users');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->load->view('bootstrap');
	}

	public function index()
	{
		$data = $this->session->userdata;
        if (empty($data)) {
            redirect(site_url() . 'auth/login');
        }

        if (empty($data['role'])) {
            redirect(site_url() . 'auth/login');
        }
        // $dataLevel = $this->userlevel->checkLevel($data['role']);

        if (empty($this->session->userdata['email'])) {
            redirect(site_url() . 'auth/login');
        } else {
            redirect(site_url() . '');
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
						redirect(site_url() . 'auth/login');
					} elseif ($userInfo->banned_users == "ban") {
						$this->session->set_flashdata('danger_message', 'You’re temporarily banned from our website!');
						redirect(site_url() . 'auth/login');
					} else if (!$status['success']) {

						$this->session->set_flashdata('flash_message', 'Error...! Google Recaptcha UnSuccessful!');
						redirect(site_url() . 'auth/login');
						exit;
					} elseif ($status['success'] && $userInfo && $userInfo->banned_users == "unban") {
						foreach ($userInfo as $key => $val) {
							$this->session->set_userdata($key, $val);
						}
						redirect(site_url() . 'auth/login');
					} else {
						$this->session->set_flashdata('flash_message', 'Something Error!');
						redirect(site_url() . 'auth/login');
						exit;
					}
				} else {
					if (!$userInfo) {
						$this->session->set_flashdata('flash_message', 'Wrong password or email.');
						redirect(site_url() . 'auth/login');
					} elseif ($userInfo->banned_users == "ban") {
						$this->session->set_flashdata('danger_message', 'You’re temporarily banned from our website!');
						redirect(site_url() . 'auth/login');
					} elseif ($userInfo && $userInfo->banned_users == "unban") {
						foreach ($userInfo as $key => $val) {
							$this->session->set_userdata($key, $val);
						}
						redirect(site_url() . 'auth/login');
					} else {
						$this->session->set_flashdata('flash_message', 'Something Error!');
						redirect(site_url() . 'auth/login');
						exit;
					}
				}
			}
		}
	}

	public function register()
	{
		$data = $this->session->userdata;

        $this->form_validation->set_rules('user', 'User Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|max_length[10]');
        // $this->form_validation->set_rules('role', 'role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        $data['title'] = "Add User";
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register', $data);
        } else {
            if ($this->user_model->isDuplicate($this->input->post('email'))) {
                $this->session->set_flashdata('flash_message', 'User email already exists');
                redirect(site_url() . 'register');
            } else {
                $this->load->library('password');
                $post = $this->input->post(NULL, TRUE);
                $cleanPost = $this->security->xss_clean($post);
                $hashed = $this->password->create_hash($cleanPost['password']);
                $cleanPost['email'] = $this->input->post('email');
                $cleanPost['role'] = '4';//$this->input->post('role');
                $cleanPost['firstname'] = $this->input->post('firstname');
                $cleanPost['phone'] = $this->input->post('phone');
                $cleanPost['banned_users'] = 'unban';
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);

                //insert to database
                if (!$this->user_model->addUser($cleanPost)) {
                    $this->session->set_flashdata('flash_message', 'There was a problem add new user');
                } else {
                    $this->session->set_flashdata('success_message', 'New user has been added.');
                }
                redirect(site_url() . 'login');
            };
        }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url() . 'login');
	}
}
