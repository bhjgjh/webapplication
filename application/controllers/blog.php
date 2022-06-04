<?php

  Class Blog extends CI_controller{
    public function __construct()
       {
    parent::__construct();
       }
  public function index($page=1)
       {
    $this->load->model('article_model');

    $this->load->helper('text');
    $this->load->library('pagination');
      $perpage = 5;
      $param['offset'] =$perpage;
      $param['limit'] =($page*$perpage)-$perpage;
      $config['base_url'] = base_url('blog/index');
      $config['total_rows'] = $this->article_model-> getArticlesCount();
      $config['per_page'] =  $perpage;
      $config['use_page_numbers'] =  true;
      $config['first_link'] = 'First';
      $config['last_link'] = 'Last';
      $config['next_link'] = 'Next';
      $config['prev_link'] = 'Prev';
      $config['full_tag_close'] = "</ul>";
      $config['full_tag_open'] = "<ul class='pagination'>";
      $config['full_tag_close'] = "</ul>";
      $config['num_tag_open'] = "<li class='page-item'>";
      $config['num_tag_close'] = "</li>";
      $config['cur_tag_open'] = "<li class='disable page-item'><li class='active page-item'><a href='#' class=\"page-link\">";
      $config['cur_tag_close'] ="<spam class='sr-only'></spam></a></li>";
      $config['next_tag_open'] = "<li class=\"page-item\">";
      $config['next_tag_close'] = "</li>";
      $config['prev_tag_open'] = "<li class=\"page-item\">";
      $config['prev_tagl_close'] = "</li>";
      $config['first_tag_open'] = "<li class=\"page-item\">";
      $config['first_tagl_close'] = "</li>";
      $config['last_tag_open'] = "<li class=\"page-item\">";
      $config['last_tagl_close'] = "</li>";
      $config['attributes'] = array('class'=>'page-link');

      $this->pagination->initialize($config);
      $pagination_links =$this->pagination->create_links();

      $articles = $this->article_model->getArticlesFront($param);
      $data= [''];
      $data['articles']=$articles;
      $data['pagination_links']=$pagination_links;
      $this->load->view('front/blog',$data);

    }



    public function categories()
       {
      $this->load->model('Category_model');
      $this->load->library('pagination');
      $config['base_url'] = base_url('blog/categories');
      $config['total_rows'] =$this->Category_model->getArticlesCount();
      $config['per_page']= 6;
      $config['first_link'] = 'First';
      $config['last_link'] = 'Last';
      $config['next_link'] = 'Next';
      $config['prev_link'] = 'Prev';
      $config['full_tag_close'] = "</ul>";
      $config['full_tag_open'] = "<ul class='pagination'>";
      $config['full_tag_close'] = "</ul>";
      $config['num_tag_open'] = "<li class='page-item'>";
      $config['num_tag_close'] = "</li>";
      $config['cur_tag_open'] = "<li class='disable page-item'><li class='active page-item'><a href='#' class=\"page-link\">";
      $config['cur_tag_close'] ="<spam class='sr-only'></spam></a></li>";
      $config['next_tag_open'] = "<li class=\"page-item\">";
      $config['next_tag_close'] = "</li>";
      $config['prev_tag_open'] = "<li class=\"page-item\">";
      $config['prev_tagl_close'] = "</li>";
      $config['first_tag_open'] = "<li class=\"page-item\">";
      $config['first_tagl_close'] = "</li>";
      $config['last_tag_open'] = "<li class=\"page-item\">";
      $config['last_tagl_close'] = "</li>";
      $config['attributes'] = array('class'=>'page-link');


     $this->pagination->initialize($config);
     $categories=$this->Category_model->getCategoryFront($config['per_page'],$this->uri->segment(3));
     $data = [];
     $data['categories'] = $categories;
    //print_r($categories);
    $this->load->view('front/categories',$data);
     }

   public function detail($id)
       {
   $this->load->model('article_model');
   $this->load->model('comment_model');
   $article = $this->article_model->getArticle($id);

    if(empty($article)){
    redirect(base_url('blog'));
      }
    $data=[];
    $data['article'] =$article;

    $comments=$this->comment_model->getComments($id,true);
    $data['comments'] =$comments;


//    here comment section start and validation start
     $this->form_validation->set_rules('name','Name','required|min_length[6]');
     $this->form_validation->set_rules('comment','Comment','required|min_length[20]');
     if ($this->form_validation->run()==true){
     $FormArray=[];
     $FormArray['name'] = $this->input->post('name');
     $FormArray['comment'] = $this->input->post('comment');
     $FormArray['article_id'] = $id;
     $FormArray['created_at'] = date('Y-m-d H:i:s');
     $this->comment_model->create($FormArray);

     $this->session->set_flashdata('msg','Your comment has been posted successfully.');
    redirect(base_url('blog/detail/'.$id));
         }
         else {
    $this->load->view('front/detail',$data);
             }

            }

  public function category($category_id,$page=1)
  {
    $this->load->model('article_model');

    $this->load->helper('text');
      $this->load->library('pagination');
      $perpage = 4;
      $param['offset'] =$perpage;
        $param['limit'] =($page*$perpage)-$perpage;
        $param['category_id'] = $category_id;
        $config['base_url'] = base_url('blog/category/'.$category_id);
          $config['total_rows'] = $this->article_model-> getArticlesCount($param);
               $config['uri_segment'] = $perpage;
               $config['per_page'] = 4;
               $config['use_page_numbers'] =  true;
               $config['first_link'] = 'First';
               $config['last_link'] = 'Last';
               $config['next_link'] = 'Next';
               $config['prev_link'] = 'Prev';
               $config['full_tag_close'] = "</ul>";
               $config['full_tag_open'] = "<ul class='pagination'>";
               $config['full_tag_close'] = "</ul>";
               $config['num_tag_open'] = "<li class='page-item'>";
               $config['num_tag_close'] = "</li>";
               $config['cur_tag_open'] = "<li class='disable page-item'><li class='active page-item'><a href='#' class=\"page-link\">";
               $config['cur_tag_close'] ="<spam class='sr-only'></spam></a></li>";
               $config['next_tag_open'] = "<li class=\"page-item\">";
               $config['next_tag_close'] = "</li>";
               $config['prev_tag_open'] = "<li class=\"page-item\">";
               $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li class=\"page-item\">";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li class=\"page-item\">";
                $config['last_tagl_close'] = "</li>";
                $config['attributes'] = array('class'=>'page-link');
              $this->pagination->initialize($config);
              $pagination_links =$this->pagination->create_links();

         $articles = $this->article_model->getArticlesFront($param);
         $data= [''];
         $data['articles']=$articles;
          $data['pagination_links']=$pagination_links;


      $this->load->view('front/category_article',$data);
  }

 }





 ?>
