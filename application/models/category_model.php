<?php


  Class Category_model extends CI_Model
     {
  public function creat($formArray)
     {
 $this->db->insert('categories',$formArray);
    }

  public function getCategory($params=[]){ //$params ye search wale hai isme fetch ka koi bhi lena dena nahi hai
  if (!empty($params['queryString'])){ // is line ka use bhi search ke liye he hai
  $this->db->like('name',$params['queryString']);//ye search ko database se connect krne ke query hai
    }
     // iske niche se fetch ke query start hui hai
  $q=$this->db->select()
             ->from('categories')
             ->get();
             return $q->result();


     }
  public function fetch($id)
     {
  $this->db->where('id',$id);
  $category=$this->db->get('categories')->row_array();
  return $category;
     }
  public function update($id,$formArray)
    {
  $this->db->where('id',$id);
  $this->db->update('categories',$formArray);
  }
  public function del($id)
     {
 $this->db->where('id',$id);
 $this->db->delete('categories');
   }
   public function getCategoryFront($limit,$offset){
       $this->db->where('categories.status',1);
         $this->db->limit($limit,$offset);
  $result=$this->db->get('categories')->result_array();
  return $result;

   }
   public function getArticlesCount()
   {
     $q= $this->db->select()
       ->from('categories')

          ->get();
     return $q->num_rows();
   }
 }


 ?>
