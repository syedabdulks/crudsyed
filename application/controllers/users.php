<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->library('email');

    }
public function signup () {
    
    $this->load->view('signup_form');
}
public function submit () {
    $this->form_validation->set_rules('email', 'Email', 'is_unique[user.email]', array('is_unique' => 'Email Already Exists!'));
    if($this->form_validation->run()==false)
    {
        $this->load->view('signup_form');
    }
    else 
    {
    $data ['name'] = $this->input->post('name');
    $data ['email'] = $this->input->post('email');
    $data ['password'] = $this->input->post('password');
    $response = $this->user_model->store($data);
    if ($response == true)
    {
        echo "Registered Successfully";
    }
    else 
    {
        echo "Failed to register";    
    }
}
}
public function login(){
    $this->load->view('login_form');
}
public function login_user() {
    $this->form_validation->set_rules('email','Email', 'required');
    $this->form_validation->set_rules('password','Password', 'required');
    if($this->form_validation->run()==false) {
        $this->load->view('login_form');
    } else {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if($user = $this->user_model->getUser($email)){
           
            if($user->Password==$password){
               
               $this->session->set_userdata('id', $user->id);
                //print_r($this->session->userdata('id'));
               // die();
                redirect('users/home');
            }else {
                    echo "Login Error";
                }
        }else {
    echo "No Account Exists with this Credententials";
        }
    }
  
    }
    public function home(){
        $this->load->view('home');
    }
    public function logout(){
        $this->session->unset_userdata('id');
        redirect('users/login');
    }
    public function change_password(){
        if($this->session->has_userdata('id')){
           
        $this->load->view('change_password_form');
        }
        else {
            redirect('users/login');
        }
    }
    public function update_password() {
      $this->form_validation->set_rules('old_password', 'old password', 'required');
      $this->form_validation->set_rules('new_password', 'new password', 'required');
      $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[new_password]');
    
    if ($this->form_validation->run()==false){
        $this->load->view('change_password_form');
    }
    else {
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');

        if(strcmp($old_password,$new_password)==0) {
            $message = "New password should be a different password";
        }
        else {
            $id = $this->session->userdata('id');
            if ($this->user_model->oldPasswordMatches($id,$old_password)){
                $this->user_model->changeUserPassword($id,$new_password);
                $message = "Password Changed Successfully";
            } else {
                    $message = "Your old Password is Wrong";
            }
           $this->load->view('change_password_form', array('message'=>$message)); 
        }

    }
    
    }
    public function forgot_password () {
        $this->load->view('forgot_password');
    }
public function send_password() {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
    if ($this->form_validation->run() == false) {
        $this->load->view('forgot_password');
    } else {
        $email = $this->input->post('email');
        if ($user = $this->user_model->getUserByEmail($email)) {
            
            $this->email->from('rq.syedabdul@gmail.com', 'codeigr');
            $this->email->to($email);
            $this->email->subject('Password Recovery');
            $this->email->message('Your password is: ' . $user->password);
            
            if ($this->email->send()) {
                echo "Email has been sent! Please check your inbox.";
            } else {
                echo "Failed to send email. Error: " . $this->email->print_debugger();
            }
        } else {
            echo "No user with this email exists!";
        }
        
    }
}

}


?>