<?php
/* if($this->session->userdata('drd_userId')) 
{
 $drd_user_id = $this->session->userdata('drd_userId');
 $drd_user_type = $this->session->userdata('drd_userType');
 if(($drd_user_type == "STUDENT") OR ($drd_user_type == "AUDITOR"))
 {
	$loginUser = "Student Or Auditor"; 
	//redirect(site_url().'/userdashboard'); 
 }
 else
 {
	$loginUser = "Admin"; 
	//redirect(site_url().'/admindashboard');
 }

}
else
{
 redirect(site_url().'/login');
} */
$user_type = $this->session->userdata('drd_userType');
if(($user_type == 'STUDENT') OR ($user_type == 'AUDITOR')) {
  $user_Id = $this->session->userdata('drd_userId');
} else {
	redirect(site_url().'/logout');
  // exit('No direct script access allowed');
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CBPCE</title>
		
		<!-- Jquery Themes -->
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" >
		<!-- Slick -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick1.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick-theme1.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick-grey.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick-theme-grey.css">
		<!-- Bootstrap -->
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/scroll.css">
		<!-- Font Awesome -->
		<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
		<!-- Animation -->
		<link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">
		<!-- Style -->
		<link href="<?php echo base_url(); ?>css/astyle.css" rel="stylesheet">
		<!-- Rotate Card -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/rotating-card.css">
		<!-- Sweet Alert -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/sweetalert.css">
		<!-- For Dropdown  -->
		<link  rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-chosen.css">
		<!-- For Checkbox  -->
		<link  rel="stylesheet" href="<?php echo base_url(); ?>css/awesome-bootstrap-checkbox.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/datatables.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.mCustomScrollbar.css">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon">
		<?php include('admin/changepassword.php'); ?> 
		<style>
			input,textarea,select
			{
				border: 0 !important;
				border-bottom: 1px solid #5E5E5E !important;
				outline: 0 !important;
				background: transparent !important;
			}
			.videopl {
				width:100%;
				height:500px;
			}
									
			@media (max-width:768px) {
			  .videopl {
				width:100%;
				height:500px;
				}
			}

			@media (max-width:375px) {
			  .videopl {
				width:100%;
				height:200px;
				padding-right:10px;
				}
			}
			
		</style>	 
		 
	</head>
	<body class="top-navigation">
		<div id="wrapper">
			<div id="page-wrapper" class="white-bg">
				<div class="row border-bottom white-bg">
					<nav class="navbar navbar-static-top " role="navigation">
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<i class="fa fa-reorder"></i>
							</button>
						   <a class="navbar-brand" href="<?php echo site_url(); ?>/userdashboard"><img src="<?php echo base_url(); ?>img/logo.png" style="width:120px;"/></a>
						</div>
						<div class="navbar-collapse collapse" id="navbar">
							<ul class="nav navbar-nav navbarcls navbar-right">
								<li><a href="<?php echo site_url(); ?>/userdashboard" style="color:#701D45;"> My Courses</a></li>
								<li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top:10px; padding-bottom:8px;color:#701D45;">
									<img src="<?php echo base_url(); ?>img/avatar5.png" style="width:30px;" class="img-circle" alt="User Image">
									<span class="caret"></span>
								  </a>
								  <ul role="menu" class="dropdown-menu">
									<li><a href="<?php echo site_url(); ?>/editprofile">Edit Profile</a></li>
									<li><a href="<?php echo site_url(); ?>/subscription">Subscriptions</a></li>
									<li><a href="<?php echo site_url(); ?>/usertranscations">Transactions</a></li>
									<!--<li><a href="<?php echo site_url(); ?>/usercertificates">Certificates</a></li>-->
									<li><a onclick="changepwdFun();">Change Password</a></li>
									<li><a href="<?php echo site_url(); ?>/logout">Sign Out</a></li>
								  </ul>
								</li>             
							</ul>
						  
						</div>
					</nav>
				</div>
		  
		<div class="WaitDialog">
		<span class="btntest" style="color:#ffffff;">
					 
		</span>
		</div>	
		
		<script src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
		<script>
		function  changepwdFun(){
		$('#changePasswordId').modal('toggle');
		}
		</script>