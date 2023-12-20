<?php

use PSpell\Config;

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

    public function edit_profile()
    {
        $data = $this->session->userdata;
        $this->load->view('home/header', $data);
        $this->load->view('user/edit_profile', $data, array('error' => ' '));
        $this->load->view('home/footer');
    }

    public function profile_update()
    {
        $this->load->model('edit');
        $data = $this->session->userdata;
        $dataInfo = array(
            'id' => $data['id']
        );
        $config['upload_path']          = './upload/user_upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 1980;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);
        $data['groups'] = $this->edit->getUserInfo($dataInfo['id']);
        $upload['user_id'] = $dataInfo['id'];

        if (!$this->upload->do_upload('updateprofile')) {
            // $error = array('error' => $this->upload->display_errors());

            echo show_404();

        } else {
            $data = array('upload_data' => $this->upload->data());
            $up = $this->upload->data('file_name');
            $upload['update_profile'] = '/upload/user_upload/'.$up;

            if (!$this->edit->updateprofile($upload)) {
                $this->session->set_flashdata('flash_message', 'There was a problem add new user');
            } else {
                $this->session->set_flashdata('success_message', 'New user has been added.');
            }
            redirect(site_url('') . 'edit');
        }
    }

    public function user_update()
    {
        $data = $this->session->userdata;
        if(empty($data['role'])){
	        redirect(site_url().'login');
	    }

        $dataInfo = array(
            'id'=>$data['id']
        );
        
        $data['title'] = "Change Password";
        $this->form_validation->set_rules('user', 'User', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        $data['groups'] = $this->user_model->getUserInfo($dataInfo['id']);

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('home/header', $data);
            $this->load->view('user/edit_profile', $data, array('error' => ' '));
            $this->load->view('home/footer');

        }else{
            $this->load->library('password');
            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = $this->password->create_hash($cleanPost['password']);
            
            $cleanPost['user_id'] = $dataInfo['id'];
            $cleanPost['email'] = $this->input->post('email');
            $cleanPost['firstname'] = $this->input->post('firstname');
            $cleanPost['password'] = $hashed;
            
            if(!$this->edit->updateuser($cleanPost)){
                $this->session->set_flashdata('flash_message', 'There was a problem updating your profile');
            }else{
                $this->session->set_flashdata('success_message', 'Your profile has been updated.');
            }
            redirect(site_url().'');
        }
    }
}
