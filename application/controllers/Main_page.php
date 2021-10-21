<?php

class Main_Page extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model("User_model");
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('main_page');
        
    }
}
