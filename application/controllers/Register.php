<?php

class Register extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->model("User_model");
            $this->load->library('form_validation');
        }

    

    public function index(){

        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('psw', 'Password', 'required');
        $this->form_validation->set_rules('psw-repeat', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required|is_unique[user.phone]');
        //$this->form_validation->set_rules('userfile', 'Profile picture', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('register');
        }
        else
        {
                $this->do_upload();

                $data = array(
                    'fname' => $this->input->post("fname"),
                    'lname' => $this->input->post("lname"),
                    'phone' =>  $this->input->post("phone"),
                    'psw' => md5($this->input->post("psw")),
                    'img' => $this->input->post("img")
            );

           

            $response=$this->User_model->register($data);

            if($response==true){
                echo "Records Saved Successfully";
                redirect('login');

        }
        else{
                echo "Insert error !";
        }  
        }      
    }


    public function do_upload()
    {
            $config['upload_path']          = './uploads/profile/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload');
            $this->upload->initialize($config);
            

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    $_POST['img'] = "default.png";
                   // $this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $_POST['img'] = $data['upload_data']['file_name'];
                    // $this->load->view('upload_success', $data);
            }
    }

   
}