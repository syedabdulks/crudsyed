<?php 

class User extends CI_Controller {
    Public function __construct () {

        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');
        $this->load->helper('url');
    }
    public function index () {
        $users = $this->user_model->getUsers();
        $this->load->view ('register', array('users'=>$users));
    }
    public function register() {
        if ($this->input->post('submit')) {
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $categories = $this->input->post('categories');

            $user_id = $this->user_model->registerUser($data);
       
       foreach($categories as $key => $category) {
             $this->user_model->addUserCategory($user_id, $category);
       }
       redirect(base_url());
       
        }
       
     

    }
    public function edit ($id)  {
       $user = $this->user_model->getUser($id); 
       $categories = $this->user_model->getUserCategories($id);
       $category_list = array_map (function($category)
       {
        return $category ['category'];
       },$categories);
       $this->load->view ('edit', array ('user' => $user, 'category_list' => $category_list));
    } 
}

?>