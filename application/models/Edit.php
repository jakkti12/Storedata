<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Model
{
    public function updateprofile($post)
    {
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', array('user_img' => $post['update_profile'])); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateProfile('.$post['user_id'].')');
            return false;
        }        
        return true;
    }

    public function updateuser($post)
    {   
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', array('phone_number' => $post['phone'], 'password' => $post['password'], 'email' => $post['email'], 'user' => $post['user'])); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }
}