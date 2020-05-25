<?php 
$admin_data=$this->session->userdata('userlogin');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>Profile<small>Preview</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="#">Profile</a></li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 <?php 
              echo $this->session->flashdata('response');
         ?>
		<div class="row">
			<!-- left column -->
			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Personal Information</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" method="post" id="profile_form" action="<?php echo base_url('Admin/update_profile'); ?>">
						<div class="box-body">
							
							<div class="form-group">
								<label class=" form-control-label">Name</label>
								<input type="text" name="name" id="name" value="<?php echo $admin_data['name'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Email</label>
								<input type="text" name="email" readonly id="email" value="<?php echo $admin_data['email'] ?>" class="form-control">
							</div>
							
						</div>
						<div class="box-footer">
							<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">
						</div> 
					</form>
				</div> 
			</div>

			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Change Password</h3>
					</div>
			
					<form role="form" method="post" id="passoword_form">
						<div class="box-body">
							<div id="error_pass"></div>
							<input type="hidden" name="id" value="<?php echo $admin_data['id'] ?>">
							<div class="form-group">
								<label class=" form-control-label">Current Password</label>
								<input type="password" name="Current_Password" id="Current_Password" class="form-control">
							</div>
							<div class="form-group">
								<label class=" form-control-label">New Password</label>
								<input type="password" name="New_Password" id="New_Password" class="form-control">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Confirm Password</label>
								<input type="password" name="Confirm_Password" id="Confirm_Password" class="form-control">
							</div>
						</div>

						<div class="box-footer">
							<input type="submit" name="submit" id="submit" value="Change" class="btn btn-default">
						</div>
					</form>
				</div>
			</div>
		</div>
    </section>
</div>

