<?php

Class Comment_model extends CI_Model
{
  public function create($FormArray)
  {
    $this->db->insert('comments',$FormArray);
  }
  public function getComments($article_id,$status=null)
  {
    $this->db->where('article_id',$article_id);
    if($status==true){
      $this->db->where('status',1);
    }
    $comments=$this->db->get('comments')->result_array();
    return $comments;
  }
}


 ?>
