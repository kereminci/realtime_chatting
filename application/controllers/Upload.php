<?php

class Upload extends CI_Controller {

        public string $file_name = '';

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
               // $this->load->view('upload_form', array('error' => ' ' ));
        }

        

       
}
?>