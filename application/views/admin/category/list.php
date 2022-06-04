<?php $this->load->view('admin/header'); ?>

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
        <?php if($this->session->flashdata('success')!=""){?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
      <?php  } ?>

      <?php if($this->session->flashdata('error')!=""){?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
    <?php  } ?>

     <div class="card">
<div class="card-header">
  <div class="card-title">
    <form id="searhFrm" name="searhFrm" method="get" action="">
      <div class="input-group mb-0">
        <input type="text" value="" class="form-control" placeholder="Please Search Name" name="q"><!-- controler me jo search me q ko get kiya hia wo yhin se kiya hai-->
        <div class="input-group-append">
          <button class="input-group-text" id="basic-addon1">
            <i class="fas fa-search"></i>
          </button>
        </div>

      </div>

    </form>
  </div>
<div class="card-tools">
  <a href="<?php echo base_url().'admin/Category/creat'?>" class="btn btn-primary"><i class="fas fa-plus"></i>Create</a>
</div>
</div>
<div class="card-body">
  <table class="table">
    <thead>
      <tr>
      <th width="50">#</th>
        <th>Name</th>
          <th width="100">Status</th>
          <th width="160" class="text-center">Action</th>
        </tr>
    </thead>

     <?php foreach ($art as $row):?>
       <tbody>

       <tr>

        <td><?php echo $row->id;?></td>

      <td><?php echo $row->name;?> </td>
      <td>    <!-- niche wale ka use ham status ke liye karte hia      -->
        <?php  if($row->status ==1){ ?>
        <span class="badge badge-success">Active</span>

      <?php } else {?>
       <span class="badge badge-danger">Block</span>
      <?php } ?>
      </td>
      <td class="text-center">
        <a href="<?php echo base_url().'admin/category/edit/'.$row->id;?>" class="btn btn-primary btn-sm">
          <i class="far fa-edit"></i>Edit
        </a>
        <a href="<?php echo base_url().'admin/category/delete/'.$row->id;?>" class="btn btn-danger btn-sm" id="del">
          <i class="far fa-trash-alt"></i>
          Delete
        </a>

      </td>
    </tr>

  <?php endforeach; ?>


  <!--<tr>
 <td colspan="4"> Record Not Found </td>
  </tr>

    <tr>
      <td>1</td>
      <td>Fashion</td>
      <td>
        <span class="badge badge-success">Status</span>
      </td>
      <td class="text-center">
        <a href="" class="btn btn-primary btn-sm">
          <i class="far fa-edit"></i>Edit
        </a>
        <a href="" class="btn btn-danger btn-sm">
          <i class="far fa-trash-alt"></i>
          Delete
        </a>

      </td>
    </tr>

    <tr>
      <td>1</td>
      <td>Fashion</td>
      <td>
        <span class="badge badge-success">Status</span>
      </td>
      <td class="text-center">
        <a href="" class="btn btn-primary btn-sm">
          <i class="far fa-edit"></i>Edit
        </a>
        <a href="" class="btn btn-danger btn-sm">
          <i class="far fa-trash-alt"></i>
          Delete
        </a>

      </td>
    </tr>
  -->

</tbody>
  </table>
</div>
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
