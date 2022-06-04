                 <?php

            Class Article extends CI_Controller
                      {
            public function __construct()
                        {
             parent::__construct();
             $admin = $this->session->userdata('admin'); // iska use direct dashboard me na ja sake uske liye karte hai niche ke 3 line uske liye he hai
              if(empty($admin)){
             redirect(base_url().'admin/login/index');
                          }
                          }


                 public function index()
                          {
             $queryString = $this->input->get('q');  // iska use serach wale collom ke liye kiya hai  isse search ke andar ke q ko get karne ke liye kiya hai
             $params['queryString']= $queryString;

             $this->load->model('article_model');
             $this->load->library('pagination');//ye pagination ke library hai
             $config['base_url'] = base_url('admin/article/index');//ye folder ka path hai jaise admin folder ke andar article class me index method
             $config['total_rows'] =$this->article_model->getArticlesCount();//ye wo jis naam ka hamne model me new method bamaya hai pagination ko get karna ke liye
             $config['per_page']= 5;// ye ek pagem kitna data show krna hai wo hai
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
           $this->pagination->initialize($config);// ye pagination ka apne khud ka method hai ise likhna jaruri hia

     /*$config['full_tag_open'] = "<ul class='pagination'>";
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
      $config['attributes'] = array('class'=>'page-link');*/

          $tst =$this->article_model->getArticles($config['per_page'],$this->uri->segment(4),$params);//iseme per page or url ke hisab se data dena hota hai
            //print_r($articles);
           $this->load->view('admin/article/list',['lml'=>$tst]);
                          }


          public function creat()
                        {
            // is trh se hamne sara data get kiya hai category wala
         $this->load->model('category_model');
         $gmt =$this->category_model->getCategory();
         $this->load->view('admin/article/creat',['art'=>$gmt]);
                          }


           public function welcome()
                        {
          $this->load->helper('common_helper');
         $config=[
        'upload_path'=>'./public/uploads/articles/',
        'allowed_types'=>'gif|jpg|png',
                ];
        $this->load->library('upload',$config);


    //$this->form_validation->set_rules('category_id','Category','trim|required');
    $this->form_validation->set_rules('description','Description','trim|required');
    $this->form_validation->set_rules('title','Title','trim|required');
    $this->form_validation->set_rules('author','Author','trim|required');
    if($this->form_validation->run()&& $this->upload->do_upload()){

      $post=$this->input->post();
      $data=$this->upload->data();
      //echo "<pre>";
      //print_r($data);
      //echo "</pre>";
    //  die();

       resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);
       resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);
        $image_path = base_url("public/uploads/category/".$data['raw_name'].$data['file_ext']);


      //isme jo image hai wo to database ka naam hai or file name jo hai wo jo ham sara data dekhte hai print_r karke usse liya hia
      $formArray['image']=$data['file_name'];
     $formArray['title']=$this->input->post('title');
      $formArray['category']=$this->input->post('category_id');
      $formArray['description']=$this->input->post('description');
      $formArray['author']=$this->input->post('author');
      $formArray['status']=$this->input->post('status');
      $formArray['created_at']= date('Y-m-d H:i:s');
       $this->load->model('article_model');
      $this->article_model->addArticle($formArray);
      $this->session->set_flashdata('success','Article added successfully');
      redirect (base_url().'admin/article/index');

    /*$post=$this->input->post();
    $this->load->model('article_model');
    $this->load->model('article_model');
    $this->article_model->addArticle(  $post);

*/
           }else {
        $this->load->view('admin/article/creat');
                 }
                  }


         public function edit($id)
                 {
        $this->load->model('article_model');
       $this->load->helper('common_helper');
      $article=$this->article_model->getArticle($id);
//print_r($article);
        if(empty($article)){
       $this->session->set_flashdata('error','Article not found');
        redirect(base_url('admin/article/index'));
                     }
        $this->load->model('category_model');//isme category wala sara  code copy kiya hai
      $gmt =$this->category_model->getCategory();
//$data['gmt']=$gmt;
     $data['article']=$article;

         $config=[
     'upload_path'=>'./public/uploads/articles/',
       'allowed_types'=>'gif|jpg|png',
                   ];
      $this->load->library('upload',$config);


  //$this->form_validation->set_rules('category_id','Category','trim|required');
  $this->form_validation->set_rules('description','Description','trim|required');
  $this->form_validation->set_rules('title','Title','trim|required');
  $this->form_validation->set_rules('author','Author','trim|required');
  if($this->form_validation->run()&& $this->upload->do_upload()){

    $post=$this->input->post();
    $data=$this->upload->data();
    //echo "<pre>";
    //print_r($data);
    //echo "</pre>";
  //  die();


  resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);
    resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);

   $image_path = base_url("public/uploads/category/".$data['raw_name'].$data['file_ext']);


    //isme jo image hai wo to database ka naam hai or file name jo hai wo jo ham sara data dekhte hai print_r karke usse liya hia
    $formArray['image']=$data['file_name'];
   $formArray['title']=$this->input->post('title');
    $formArray['category']=$this->input->post('category_id');
    $formArray['description']=$this->input->post('description');
    $formArray['author']=$this->input->post('author');
    $formArray['status']=$this->input->post('status');
    $formArray['updated_at']= date('Y-m-d H:i:s');
     //$this->load->model('article_model');
    $this->article_model->updateArticle($id,$formArray);
    $this->session->set_flashdata('success','Article updated successfully');
    redirect (base_url().'admin/article/index');

  /*$post=$this->input->post();
  $this->load->model('article_model');
  $this->load->model('article_model');
  $this->article_model->addArticle(  $post);

*/
     }else {
      $this->load->view('admin/article/edit',$data);
         }
//$this->load->view('admin/article/edit',['art'=>$gmt]);
             }


         public function delete($id)
                {
       $this->load->model('article_model');
      $this->article_model->del($id);
       $this->session->set_flashdata('success','Article  deleted');
       redirect(base_url().'admin/article/index');
                    }

                  }

?>
