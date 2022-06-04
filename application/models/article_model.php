                <?php

              Class Article_model extends CI_Model
                  {
              public function __construct()
                  {
            parent::__construct();
                  }
            public function addArticle($formArray)
                  {
          $this->db->insert('articles',$formArray);
          return $this->db->insert_id();
                  }


       public function getArticles($limit,$offset,$params=[])//ye $limit,$offset ye pagination ka hai ise jab pagination ko bananna ho tabhi use karna hoi
               {
       if (!empty($params['queryString'])){ // is line ka use bhi search ke liye he hai
        $this->db->like('author',$params['queryString']);//ye search ko database se connect krne ke query hai
                }
         $q=$this->db->select()
               ->from('articles')
                ->limit($limit,$offset)//ye uper wala he hai jo  pass kiya hai
               ->get();
               return $q->result();
                     }

      public function getArticlesCount()//ye pagination ka method hai jo pass kiya tha     usek niche data fetch karne ka query hai
             {
 //$count = $this->db->count_all_results('articles');
     //return $count;
          $q= $this->db->select()
          ->from('articles')
          ->get();
         return $q->num_rows();
              }


      public function getArticle($id)
           {
      $this->db->where('id',$id);
      $query=$this->db->get('articles');
      $article=$query->row_array();
      return   $article;
             }

       public function updateArticle($id,$formArray)
            {
       $this->db->where('id',$id);
      $this->db->update('articles',$formArray);
             }


      public function del($id)
           {
      $this->db->where('id',$id);
     $this->db->delete('articles');
             }
 // this code for front end article
     public function getArticlesFront($param =array())//ye $limit,$offset ye pagination ka hai ise jab pagination ko bananna ho tabhi use karna hoi
                {
   if(isset($param['offset']) && isset($param['limit'])){
     $this->db->limit($param['offset'],$param['limit']);
                }
  /*if(isset($param['q'])){
    $this->db->or_like('title',trim($param['q']));
      $this->db->or_like('author',trim($param['q']));

  }*/
     if(isset($param['category_id'])){
    $this->db->where('category',$param['category_id']);
            }
    $this->db->select('articles.*,categories.name as category_name');
    $this->db->where('articles.status',1);
    $this->db->order_by('articles.created_at','DESC');

    $this->db->join('categories','categories.id=articles.category','left');

    $query=$this->db->get('articles');

     $articles = $query->result_array();
//echo $this->db->last_query();
     return $articles;
            }
            }
?>
