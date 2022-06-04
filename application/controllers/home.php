<?php

Class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->model('article_model');
    $param['offset'] =4;
    $param['limit'] =0;
    $articles=$this->article_model->getArticlesFront($param);

    //echo "<pre>";
    //print_r($articles);
    //  echo "</pre>";
    //  die();
    $data['articles'] =  $articles;
    $this->load->view('front/home',$data);
  }
}





 ?>
