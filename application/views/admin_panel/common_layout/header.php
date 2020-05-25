<?php
if(!$this->session->userdata('userlogin'))
{
	redirect('Admin');
	die;
}
$admin_data=$this->session->userdata('userlogin');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo Project; ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>dist/css/skins/_all-skins.min.css">
	
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>css/bootstrap-multiselect.css">
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>custom/style.css">
	 <link href="<?php echo base_url('assets/admin/'); ?>dist/css/croppie.css" rel="stylesheet">
	 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
	  <link href="<?php echo base_url('assets/admin/'); ?>css/toastr.min.css" rel="stylesheet">
	  <link href="<?php echo base_url('assets/admin/'); ?>dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<style>	  
.select_full .chosen-container.chosen-container-multi {

    width: 100% !important;

}
label.required::before {
  content: '*';
  margin-right: 4px;
  color: red;
}
</style>
<script>
	var base_url_global='<?php echo base_url(); ?>';
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url('Admin/dashboard'); ?>" class="logo">
				<!-- logo for regular state and mobile devices -->
				<!--
				<span class="logo-lg">
					<img src="img/logo.png" height="24px" width="195px"  alt="">
				</span>
				-->
				<h4 class="text_admins"><?php echo Project; ?></h4>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
								<span class="hidden-xs"><?php echo $admin_data['name'] ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
									<p><?php echo $admin_data['email'] ?></p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?php echo base_url('Admin/manage_profile'); ?>" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo base_url('Admin/logout/'); ?>" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
<aside class="main-sidebar">
	<section class="sidebar" style="height: auto;">
		<!-- Sidebar user panel -->
		<div class="user-panel" style="height: 63px;">
			<div class="text-center info">
				<p><?php echo $admin_data['name'] ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
				<li class="active">
				<a href="index.php">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>


			<li class="treeview">
				<a href="#">
					<i class="fa fa-hourglass-half"></i>
					<span>Profile</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('Admin/manage_profile'); ?>"><i class="fa fa-circle-o"></i>Manage Profile</a></li>
					<li><a href="<?php echo base_url('Admin/manage_profile'); ?>"><i class="fa fa-circle-o"></i>Change Password</a></li>
					<li><a href="<?php echo base_url('Admin/logout'); ?>"><i class="fa fa-circle-o"></i>Logout</a></li>
				</ul>
				
			</li> 


			<li class="treeview">
				<a href="#">
					<i class="fa fa-hourglass-half"></i>
					<span>Category Management</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('Admins/Categorymanage'); ?>"><i class="fa fa-circle-o"></i>Category</a></li>
				</ul>
				
			</li> 
			
			
			
			
		</ul>
	</section>
</aside>  