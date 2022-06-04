<?php

Class Page extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
  $this->load->view('front/about');
  }

  public function services()
  {
    $this->load->view('front/services');
  }

     public function contact()
       {

      $this->form_validation->set_rules('name','Name','required');
      $this->form_validation->set_rules('email','Email','required|valid_email');
      //$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
      if($this->form_validation->run()==true){
        // smtp code -- jisse localhost ke thorw email send kanra

         $this->load->library('email');
         $this->email->from(set_value('email'),set_value('name'));
         $this->email->to("ganeshmishra1997@gmail.com");
         $this->email->subject("You have recevied an enquery..");
        $this->email->message("Thanks for your enquery");
         $this->email->set_newline("\r\n");
        $this->email->send();

        if(!$this->email->send()){
       show_error($this->email->print_debugger());
           }
         else{
           $this->session->set_flashdata('message','Thanks for your enquery');
           redirect (base_url('page/contact'));
           }


      }else {
        $this->load->view('front\contact-us');
      }


      }

}



 ?>
