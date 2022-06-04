<?php

Class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

  }
  public function index()
  {
    // hash password use karne ke liye iska use kiya jata hai admin username hai kigin panel me ja ke enter karne hai or uske bad jo
    //hash password aaega use password wale colom me dalna hai

    //echo password_hash('admin',PASSWORD_DEFAULT);
    $this->load->view("admin/login");
  }
  public function authenticate()
  {
      $this->load->model('admin_model');
    $this->form_validation->set_rules('username','Username','trim|required');
      $this->form_validation->set_rules('password','Password','trim|required');
      if($this->form_validation->run()==true)
      {
         $username = $this->input->post('username');
        $admin =$this->admin_model->getByUsername( $username);
        if(!empty($admin)){
           $password = $this->input->post('password');
           if(password_verify($password,$admin['password'])==true){

             $adminArray['admin_id'] =$admin['id'];
              $adminArray['username'] =$admin['username'];
              $this->session->set_userdata('admin',$adminArray);
              redirect(base_url().'admin/home/index');

           }else {
             $this->session->set_flashdata('msg','Either username and password incorrect');
             redirect(base_url().'admin/login/index');
           }
          }else
          {
          $this->session->set_flashdata('msg','Either username and password incorrect');
          redirect(base_url().'admin/login/index');
        }


      }else {
      $this->load->view("admin/login");
      }
  }
  public function logout()
  {
    $this->session->unset_userdata('admin');
    redirect(base_url().'admin/login/index');
  }
}



 ?>
