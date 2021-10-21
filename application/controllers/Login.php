<?php


class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model("User_model");
        $this->load->library('session');
    }

    public function index(){


        if(!empty($_SESSION['is_logged'])){;
            echo "already logged";
            redirect('main_page');
        }
        $this->load->view('login');
        
     
    }

    public function login(){
        $phone = $this->input->post("phone");
        $psw = md5($this->input->post("psw"));

        $response = $this->User_model->login($phone, $psw);

        if ($response == 1){
            $data = $this->User_model->getUserInfo($phone);
            $this->session->set_userdata('is_logged', true);
            $this->session->set_userdata('phone', $phone);
            $this->session->set_userdata('fname', $data['fname']);
            $this->session->set_userdata('lname', $data['lname']);
            $this->session->set_userdata('img', $data['img']);
            echo "logged";
            redirect('main_page'); 

        }
        else{// fail
            echo "fail";
        }

    }

    public function logout(){
        unset($_SESSION["is_logged"]);
        unset($_SESSION["phone"]);
        unset($_SESSION["fname"]);
        unset($_SESSION["lname"]);
        unset($_SESSION["img"]);
    }




}