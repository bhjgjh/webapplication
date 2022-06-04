<?php $this->load->view('front/header');?>
   <div class="container">
  <h3 class="pt-4 pb-4">Blog</h3>
     <div class="row">
       <div class="col-md-12">

       <h3>
        <?php echo $article['title'];?>

      </h3>
       <div class="d-flex justify-content-between">
         <p class="text-muted">Posted By <strong> <?php echo  $article['author']; ?> </strong> on<strong><?php echo date('d M Y',strtotime($article['created_at']));?></strong></p>
        <a href="#" class="text-muted p-2 bg-light text-uppercase"></a>
         </div>
         <?php
        if($article['image']!="" && file_exists('./public/uploads/articles/thumb_front/'.$article['image'])){
          ?>
          <div class="mb-3 mt-3">
          <img class="w-50 rounded" src="<?php echo base_url('public/uploads/articles/thumb_front/'.$article['image']);?>" alt="" class="w-100">
        </div>
          <?php
            }

           ?>
         <?php echo $article['description'];?>
         <br>
         <br>
         <br>
         <br>



<!-- comment section start here   -->
         <div class="col-md-9 pl-0" id="comment_box">
           <?php
           if(validation_errors() !=""){
            ?>
            <div class="alert alert-danger">
            <h4 class="alert-heading"> Please fix the following errors!</h4>
            <?php echo validation_errors(); ?>
            </div>
            <?php
          }

             ?>

             <?php
             if(!empty($this->session->flashdata('msg'))){
              ?>
              <div class="alert alert-success">

              <?php echo $this->session->flashdata('msg'); ?>
              </div>
              <?php
            }

               ?>

            </div>

         <div class="card">
           <form name="commentForm" id="commentForm" action="<?php echo base_url('blog/detail/'.$article['id']);?>#comment_box" method="post">

           <div class="card-body">
             <p> Comment </p>
             <div class="form-group">
               <textarea name="comment"  placeholder="Comment Here" id="Comment" class="form-control"><?php echo set_value('comment');?></textarea>
             </div>
             <div>
         <div class="form-group">
           <div class="row">
       <div class="col-md-6">
         <label> Your name </label>
         <input type="text" name="name" placeholder="Name" id="name" value="<?php echo set_value('name');?>" class="form-control">
         <br>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
       <hr>
        <?php
        if(!empty($comments)){
          foreach ($comments as $comment) {
         ?>
         <div class="user-comment">
            <p class="text-muted"><strong><?php echo $comment['name'];?></strong></p>
           <p class="font-italic"><?php echo $comment['comment'];?></p>

          <small> <?php echo date('d/m/Y',strtotime($comment['created_at']))?> </small>


         </div>
         <hr>
        <?php
      }
    }

         ?>

       </div>

           </div>

             </div>

           </div>

         </div>












<?php $this->load->view('front/footer');?>
