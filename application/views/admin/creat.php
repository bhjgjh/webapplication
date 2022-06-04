
<?php $this->load->view('admin/header'); ?> <!-- headear or footer aise bhi use kar sakte hai      -->

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Articles</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><b>Espoir Soft</b></a></li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- /.col-md-6 -->
      <div class="col-lg-12">
     <div class="card card-primary">
<div class="card-header">
  <div class="card-title">
     Creat New Articles
  </div>

</div>
<!--<form name="categoryForm" id="categoryForm" method="post" enctype="multipart/form-data"  action="< echo base_url().'admin/category/creat'?>">-->
<?php echo form_open_multipart('admin/article/welcome'); ?>

<div class="card-body">

  <div class="form-group">
    <label>Category</label>
  <select name="category_id" class="form-control" id="category_id">
    <option  value="">Select a Category </option>

        <?php
        if(!empty($art)){
        foreach ($art as $row){
        ?>
          <option  value="<?php echo $row->id;?>"><?php echo  $row->name;?> </option>
          <?php
          }
        }
  ?>

  </select>
    <?php echo form_error('category_id'); ?>
  </div>


<div class="form-group">
  <label>Title</label>
  <input type="text" name="title" id="title" value="<?php echo set_value('title');?>" class="form-control">
  <?php echo form_error('title'); ?>
</div>

  <div class="form-group">
  <label>Description</label>
  <textarea name="description"  class="textarea" placeholder="Write somthing here" style="height:200px; width:500px;"><?php echo set_value('description');?></textarea>

</div>


<div class="row">   <!-- image ke liye hamesa isi code ka use karna hai      -->
  <div class="col-lg-6">
    <div class="form-group">
      <label for="body">Select Image</label><br>
      <?php echo form_upload(['name'=>'userfile']);?>
    </div>
  </div>
  <div class="col-lg-6" style="margin-top:40px">
    <?php if(isset($upload_error)) {echo $upload_error;}?> <!-- iska use image ke error ko dikhane ke liye kiya hai       -->
  </div>
</div>

<div class="form-group">
  <label>Author</label>
  <input type="text" name="author" id="author" value="<?php echo set_value('author');?>" class="form-control">
  <?php echo form_error('author'); ?>
</div>

<!-- niche status ke liye banaya hai isme radio button ko kaise lgate hai wo dikh jaega       -->
<div class="custom-control custom-radio float-left">
  <input class="custom-control-input" value="1" type="radio" id="statusActive" name="status" checked="">
  <label for="statusActive" class="custom-control-label">Active</label>
</div>

<div class="custom-control custom-radio float-left ml-3">
  <input class="custom-control-input" value="0" type="radio" id="statusBlock" name="status">
  <label for="statusBlock" class="custom-control-label">Block</label>
</div>


</div>
<div class="card-footer">
<button name="submit" type="submit" class="btn btn-primary">Submit</button>

<a href=" <?php echo base_url().'admin/article/index';?>" class="btn btn-secondary">Back</a>  <!-- kisi bhi file me back ka option dene ke liye iska use kiya jata hai      -->
</div>
</form>
     </div>




        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->

<!-- /.control-sidebar -->

<!-- Main Footer -->

<?php $this->load->view('admin/footer'); ?>
