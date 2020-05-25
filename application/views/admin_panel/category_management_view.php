<div class="content-wrapper">
    <section class="content-header">
		<h1>Category<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Category</a></li>
			<li class="active">List</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php 
              echo $this->session->flashdata('response');
         ?>
		 <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModals">Add Category</button>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">All Category</h3>
					</div>
   
					<div class="box-body">
						<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Category Name</th>
									<th>Category Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							  <?php
							  foreach($cat_lists as $key=>$lists)
							  {
							  	$i=$key+1;
							  ?>  
								<tr>   
									<td><?php echo $i; ?></td>  
									<td><?php echo $lists['category_name']; ?></td>
									<td><?php 
									if($lists['image'])
									{
										?>
										<img src="<?php echo base_url('assets/uploads/'.$lists['image']); ?>" height="45" />
										<?php
									}
									 ?></td>
									<td>
									<a href="javascript:void(0);" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#myModal<?php echo $lists['id']; ?>">Edit</a>
									
									<a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete this category');" href="<?php echo base_url('Admins/Categorymanage/delete_cat/'.$lists['id']); ?>">Delete</a>
									</td>
								</tr>
								 <div class="modal fade" id="myModal<?php echo $lists['id']; ?>" role="dialog">
								<div class="modal-dialog">
								
								  <!-- Modal content-->
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal">&times;</button>
									  <h4 class="modal-title">Edit Category</h4>
									</div>
								    <form method="post" id="myform" action="<?php echo base_url('Admins/Categorymanage/edit_cat/'.$lists['id']); ?>"  enctype="multipart/form-data">
										<div class="modal-body">
										 <div class="row">
										 <div class="col-sm-12">
										  <div class="form-group">
										   <label>Category Name</label>
										   <input type="text" name="category_name" placeholder="Category Name" value="<?php echo $lists['category_name']; ?>" class="form-control" />
										  </div>
										  </div>
										  </div>
										  <div class="row">
											  <div class="col-sm-12">
											  <div class="form-group">
											   <label>Category Image Update</label>
											   <input type="file" accept="image/*" name="image" class="form-control" />
											  </div>
											  </div>
										</div>
										
										</div>
										<div class="modal-footer">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  <button type="submit" class="btn btn-info" >Submit</button>
									   </div>
								</form>
								  </div>
								  
								</div>
							  </div>
							   <?php $i++;} ?>
							   <!-- Modal -->
							 
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
 <!-- Modal -->
<div class="modal fade" id="myModals" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title">Add Category</h4>
	</div>
	<form method="post" id="myform" action="<?php echo base_url('Admins/Categorymanage/add_cat'); ?>" enctype="multipart/form-data">
	<div class="modal-body">
	 <div class="row">
	 <div class="col-sm-12">
	  <div class="form-group">
	   <label>Category Name</label>
	   <input type="text" name="category_name" placeholder="Category Name" required class="form-control" />
	  </div>
	  </div>
	  </div>
	  <div class="row">
	  <div class="col-sm-12">
	  <div class="form-group">
	   <label>Category Image</label>
	   <input type="file" name="image" accept="image/*" required class="form-control" />
	  </div>
	  </div>
	 </div>
	</div>
	<div class="modal-footer">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  <button type="submit" class="btn btn-success" >Submit</button>
	</div>
	</form>
  </div>
  
</div>
</div>
