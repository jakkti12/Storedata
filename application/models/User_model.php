<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function checklogin($post)
    {
        $this->load->library('password');
        $this->db->select('*');
        $this->db->where('email', $post['email']);
        $query = $this->db->get('users');
        $userInfo = $query->row();
        $count = $query->num_rows();

        if ($count == 1) {
            if (!$this->password->validate_password($post['password'], $userInfo->password)) {
                error_log('Unsuccessful login attempt(' . $post['email'] . ')');
                return false;
            } else {
                $this->updateLoginTime($userInfo->id);
            }
        } else {
            error_log('Unsuccessful login attempt(' . $post['email'] . ')');
            return false;
        }

        unset($userInfo->password);
        return $userInfo;
    }

    public function updateLoginTime($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', array('last_login' => date('Y-m-d h:i:s A')));
        return;
    }

    public function getAllSettings()
    {
        $this->db->select('*');
        $this->db->from('settings');
        return $this->db->get()->row();
    }

    public function isDuplicate($email)
    {
        $this->db->get_where('users', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }

    public function addUser($d)
    {
        //user ข้าวหน้าคือ ชื่อของฐานข้อมูล user ข้างหลังคือตัวที่ส่งค่ามา จะใช้ชื่ออะไรก็ได้
        $string = array(
            'user' => $d['user'],
            'email' => $d['email'],
            'phone_number' => $d['phone'],
            'password' => $d['password'],
            'role' => $d['role'],
            'status' => $this->status[1],
            'banned_users' => $this->banned_users[1]
        );
        $q = $this->db->insert_string('users', $string);
        $this->db->query($q);
        return $this->db->insert_id();
    }
}