<?php

class User_model extends CI_Model {

    public function login($phone, $psw){
     //   $array = array('phone' => $phone, 'psw' => $psw);
     //  var_dump($this->db->where($array));
     $this->db->where('phone',$phone);
     $this->db->where('psw',$psw);
     return $this->db->get('user')->num_rows();
    }

    public function register($data){
        $this->db->insert('user',$data);
        return true;
    }

    public function getUserInfo($phone){
        $this->db->select('fname, lname, phone, img');
        $this->db->where('phone', $phone);
        return $this->db->get('user')->row_array();
    }
    
    



}