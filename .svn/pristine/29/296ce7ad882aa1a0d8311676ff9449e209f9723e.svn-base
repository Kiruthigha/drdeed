<?php
/* if($this->session->userdata('drd_userId')) {
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

} else {
 redirect(site_url().'/login');
} */
$user_type = $this->session->userdata('drd_userType');
if(($user_type == 'ADMIN') OR ($user_type == 'ASSISTANT')) 
{
  $user_Id = $this->session->userdata('drd_userId');
} 
else 
{
   //exit('No direct script access allowed');
   redirect(site_url().'/logout');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBPCE</title>
	<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" > -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
	<!-- SUMMERNOTE -->
	<link href="<?php echo base_url(); ?>css/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/astyle.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/chosen.css">
    <link href="<?php echo base_url(); ?>css/jasny-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/rotating-card.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/datepicker.css"> -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/sweetalert.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/admincustom.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon">

</head>
<?php include('changepassword.php'); ?> 
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="white-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top " role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
				<?php if($user_type == 'ADMIN')
				{?>
               <a class="navbar-brand" href="<?php echo site_url(); ?>/admindashboard"><img src="<?php echo base_url(); ?>img/logo.png" style="width:120px;"/></a>
				<?php } else { ?>
				<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>img/logo.png" style="width:120px;"/></a>
				<?php } ?>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="menuCls nav navbar-nav navbar-right"  style="color:#700745 !important;">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top:10px; padding-bottom:8px;color:#701D45;">
						<img src="<?php echo base_url(); ?>img/avatar5.png" style="width:30px;" class="img-circle" alt="User Image">
						<span class="caret"></span>
						</a>
                        <ul role="menu" class="dropdown-menu">
                          <li><a onclick="changepwdFun();">Change Password</a></li>
                            <li><a href="<?php echo site_url(); ?>/logout">Sign Out</a></li>
                        </ul>
                    </li>             
                </ul>
           
            </div>
        </nav>
        </div>
		<span class="pull-right homediv" style="padding:15px;text-decoration: underline;"><a class="" href="<?php echo site_url(); ?>/admindashboard">Home</a></span>
		
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