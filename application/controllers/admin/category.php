
 <?php

 Class Category extends CI_Controller
   {
   public function __construct()
     {
     parent::__construct();

     $admin = $this->session->userdata('admin'); // iska use direct dashboard me na ja sake uske liye karte hai niche ke 3 line uske liye he hai
     if(empty($admin)){
       redirect(base_url().'admin/login/index');
}

   }


    public function index()  // niche phle table me show yani fetch wali query me kaam hua hai jab wo conplete hua hai uske baad search pe kaam hua hai
      {
     $this->load->model('category_model');

     $queryString = $this->input->get('q');  // iska use serach wale collom ke liye kiya hai  isse search ke andar ke q ko get karne ke liye kiya hai
     $params['queryString']= $queryString;  // iska use uper $queryString ko short krne ke liye kiya hai

     $gmt =$this->category_model->getCategory($params); //  fetch ke time me last wale () ko khali rkha tha jab wo fetch wala complete hua uske baad search ke liye $params
                                                             //$params pass kiya hai
      $this->load->view('admin/category/list',['art'=>$gmt]);
    }




   public function creat() // isme phle insert ka pricess pura kiya gaya hai uske baad image wala kaam kiya gaya hai or image ka sara kaam suneja se kiya gaya hai
       {
       $this->load->helper('common_helper');
           $config=[
           'upload_path'=>'./public/uploads/category/',
           'allowed_types'=>'gif|jpg|png',
             ];
         $this->load->library('upload',$config);

            $this->load->model('category_model');
             $this->form_validation->set_rules('name','Name','trim|required');
            if($this->form_validation->run() && $this->upload->do_upload())  //isme image validation aata hai or ise hmesa isi line ke aage dena hai
              {
               //$formArray['userfile']=$this->input->post('userfile');
              $post=$this->input->post();
              $data=$this->upload->data();

              //echo "
                //<pre>";
              //print_r($data);
              //echo "</pre>";
              //die();

              //resozig image code ka part isse phale ise common file ko helper me dala hai jo helper me ja ke check karna hai or uper helper bhi load krna hai
               resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270);

                $image_path = base_url("public/uploads/category/".$data['raw_name'].$data['file_ext']);

                //  $post['image_path']= $image_path;
           $formArray['image']=$data['file_name'];  //isme jo image hai wo to database ka naam hai or file name jo hai wo jo ham sara data dekhte hai print_r karke usse liya hia
           $formArray['name']=$this->input->post('name');
           $formArray['status']=$this->input->post('status');
           $formArray['created_at']= date('Y-m-d H:i:s');
           $this->category_model->creat($formArray);
           $this->session->set_flashdata('success','Category added successfully');
           redirect(base_url().'admin/category/index');
            }
          else {
            $upload_error=$this->upload->display_errors();
           $this->load->view('admin/category/creat',compact('upload_error'));
        }

         }
      public function edit($id)
         {
        //echo $id;  is trh se id dikha sakte hai
       //$id = $this->input->post('id');
       $this->load->model('category_model');
       $category=$this->category_model->fetch($id);
       if(empty($category)){
       $this->session->set_flashdata('error','category no found');
       redirect(base_url().'admin/category/index');
         }

         $this->load->helper('common_helper');
         $config=[
         'upload_path'=>'./public/uploads/category/',
         'allowed_types'=>'gif|jpg|png',
                ];
          $this->load->library('upload',$config);

            $this->load->model('category_model');
             $this->form_validation->set_rules('name','Name','trim|required');
            if($this->form_validation->run()==true){
             $this->upload->do_upload();  //isme image validation aata hai or ise hmesa isi line ke aage dena hai
              {
                   //$formArray['userfile']=$this->input->post('userfile');
             $post=$this->input->post();
             $data=$this->upload->data();

             //resozig image code ka part isse phale ise common file ko helper me dala hai jo helper me ja ke check karna hai or uper helper bhi load krna hai
             resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270);

              $image_path = base_url("public/uploads/category/".$data['raw_name'].$data['file_ext']);

                //  $post['image_path']= $image_path;

              $formArray['image']=$data['file_name'];  //isme jo image hai wo to database ka naam hai or file name jo hai wo jo ham sara data dekhte hai print_r karke usse liya hia
              $formArray['name']=$this->input->post('name');
              $formArray['status']=$this->input->post('status');
              $formArray['updated_at']= date('Y-m-d H:i:s');
              $this->category_model->update($id,$formArray);

               if(file_exists('./public/uploads/category/'.$categor['image'])){

               unlink('./public/uploads/category/'.$category['image']);
                   }
               if(file_exists('./public/uploads/category/thumb/'.$category['image'])){

               unlink('./public/uploads/category/thumb/'.$category['image']);
                   }
              $this->session->set_flashdata('success','Category updated successfully');
              redirect(base_url().'admin/category/index');

               }

              }else {
             $data['category'] = $category;
             $this->load->view('admin/category/edit',$data);
                 }
                }

          public function delete($id)
              {
           $this->load->model('category_model');
           $this->category_model->del($id);
           $this->session->set_flashdata('success','Category deleted');
           redirect(base_url().'admin/category/index');
              }


             }

  ?>
