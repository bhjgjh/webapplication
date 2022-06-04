<?php $this->load->view('admin/header'); ?> <!-- headear or footer aise bhi use kar sakte hai      -->

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Categories</h1>
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
     Edit Category = <?php echo $category['name']?> <!-- isme jo hai $category use controller me edit me niche se liya hia or name wo hai jo name me likha hai-->


  </div>

</div>
<!--form name="categoryForm" id="categoryForm" method="post" enctype="multipart/form-data"  action="< echo base_url().'admin/category/creat'?>">-->
<?php echo form_open_multipart('admin/category/edit/'.$category['id']); ?>

<div class="card-body">

<div class="form-group">
  <label>Name</label>
  <input type="text" name="name" id="name" value="<?php echo set_value('name',$category['name']);?>" class="form-control">
  <?php echo form_error('name'); ?>
</div>

<!--<div class="form-group">
  <label>Image</label><br>
  <input type="file" name="image" id="image">



</div>-->


<div class="row">   <!-- image ke liye hamesa isi code ka use karna hai      -->
  <div class="col-lg-6">
    <div class="form-group">
      <label for="body">Select Image</label><br>
      <?php echo form_upload(['name'=>'userfile']);?>
    </div>
  </div>
  <div class="col-lg-6" style="margin-top:40px">
    <?php if(isset($upload_error)) {echo $upload_error;}?> <!-- iska use image ke error ko dikhane ke liye kiya hai       -->


        <!-- niche jo $category['image'] likha hai usme $category whi hai jo controller me edit me liya hai or image jo hai wo image wale controller se liya hai    -->
        <br>
           <?php if($category['image'] !="" && file_exists('./public/uploads/category/thumb/'.$category['image']))  { ?>
             <img  width="200"  src="<?php echo base_url().'public/uploads/category/thumb/'.$category['image']?>"

           <?php } else { ?>
             <img width="175" src="<?php echo base_url().'public/uploads/category/no image.jpg';?>"

           <?php } ?>

  </div>
</div>

<!-- niche status ke liye banaya hai isme radio button ko kaise lgate hai wo dikhaya hai  phle insert pura kiya gaya hai uske baad he edit kaam hua hai ($category['status']==1)  ye wala baad me hua hai      -->
<div class="custom-control custom-radio float-left">
  <input class="custom-control-input" value="1" type="radio" id="statusActive" name="status" <?php echo ($category['status']==1) ? 'checked' : ''; ?>>
  <label for="statusActive" class="custom-control-label">Active</label>
</div>

<div class="custom-control custom-radio float-left ml-3">
  <input class="custom-control-input" value="0" type="radio" id="statusBlock" name="status" <?php echo ($category['status']==0) ? 'checked' : ''; ?>>
  <label for="statusBlock" class="custom-control-label">Block</label><!-- uper jo($category['status']==0) ye hai ye edit ke liye hia isme jab edit hoga to active ya block dikhega-->
</div>


</div>
<div class="card-footer">
<button name="submit" type="submit" class="btn btn-primary">Submit</button>

<a href=" <?php echo base_url().'admin/category/index';?>" class="btn btn-secondary">Back</a>  <!-- kisi bhi file me back ka option dene ke liye iska use kiya jata hai      -->
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
