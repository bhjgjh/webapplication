<?php $this->load->view('admin/header'); ?> <div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Articles</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item">
                  <a href="#"><b>Espoir Soft</a>
               </li>
               <li class="breadcrumb-item active"></li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <!-- /.col-md-6 -->
         <div class="col-lg-12"> <?php if($this->session->flashdata('success')!=""){?> <div class="alert alert-success"> <?php echo $this->session->flashdata('success');?> </div> <?php  } ?> <?php if($this->session->flashdata('error')!=""){?> <div class="alert alert-danger"> <?php echo $this->session->flashdata('error');?> </div> <?php  } ?> <div class="card">
               <div class="card-header">
                  <div class="card-title">
                     <form id="searhFrm" name="searhFrm" method="get" action="">
                        <div class="input-group mb-0">
                           <input type="text" value="" class="form-control" placeholder="Please Search Author" name="q">
                           <!-- controler me jo search me q ko get kiya hia wo yhin se kiya hai-->
                           <div class="input-group-append">
                              <button class="input-group-text" id="basic-addon1">
                                 <i class="fas fa-search"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-tools">
                     <a href="
									<?php echo base_url().'admin/article/creat';?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i>Create </a>
                  </div>
               </div>
               <div class="card-body">
                  <table class="table">
                     <thead>
                        <tr>
                           <th width="50">#</th>
                           <th width="100">Image</th>
                           <th>Title</th>
                           <th width="180">Author</th>
                           <th width="100">Created</th>
                           <th width="70">Status</th>
                           <th width="140" class="text-center">Action</th>
                        </tr>
                     </thead> <?php foreach ($lml as $row) :?> <tbody>
                        <tr>
                           <td> <?php echo $row->id;?> </td>
                           <td> <?php if($row->image !="" && file_exists('./public/uploads/articles/thumb_admin/'.$row->image))  { ?> <img width="100" src="
												<?php echo base_url().'public/uploads/articles/thumb_admin/'.$row->image?>" <?php } else { ?> <img width="100" src="
													<?php echo base_url().'public/uploads/articles/thumb_admin/no image.jpg';?>" <?php } ?> </td>
                           <td> <?php echo $row->title;?> </td>
                           <td> <?php echo $row->author;?> </td>
                           <td> <?php echo   $row->created_at;?> </td>
                           <td> <?php
                        if($row->status==1){
                    ?> <p class="badge badge-success">Active</p> <?php
                         }
                      else {
                   ?> <p class="badge badge-danger">Block</p> <?php } ?> </td>
                           <td class="text-center">
                              <a href="
														<?php echo base_url().'admin/article/edit/'.$row->id;?>" class="btn btn-primary btn-sm">
                                 <i class="far fa-edit"></i>
                              </a>
                              <a href="
														<?php echo base_url().'admin/article/delete/'.$row->id;?>" class="btn btn-danger btn-sm">
                                 <i class="far fa-trash-alt"></i>
                              </a>
                           </td>
                        </tr> <?php endforeach; ?>
                     </tbody>
                  </table> <?php echo $this->pagination->create_links(); ?>
                  <!--ye pagination ka apna link hai iska use page me pagination ka link dene ke liye karte hai-->
               </div>
            </div>
         </div>
      </div>
      <!-- /.col-md-6 -->
   </div>
   <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<!-- /.control-sidebar -->
<!-- Main Footer --> <?php $this->load->view('admin/footer'); ?>
