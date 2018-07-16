<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>CBPCE | Forgot Email</title>
		
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/bootstrap-social.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/astyle.css" rel="stylesheet">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		
     <!-- Favicon -->
     <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon">
	 
		<style>
			input
			{
				border: 0 !important;
				border-bottom: 1px solid #FFF !important;;
				outline: 0 !important;
				background: transparent !important;
			}
			.ibox-content{
				border:none !important;
			}
			::-webkit-input-placeholder { /* Chrome */
			  color: #CB91AD !important;
			}
			:-ms-input-placeholder { /* IE 10+ */
			  color: #CB91AD !important;
			}
			::-moz-placeholder { /* Firefox 19+ */
			  color: #CB91AD !important;
			  opacity: 1;
			}
			:-moz-placeholder { /* Firefox 4 - 18 */
			  color: #CB91AD !important;
			  opacity: 1;
			}
		</style>
		
	</head>

	<body class="" style="background-color:#701D45;color:#FFF;">
		<div class="middle-box loginscreen animated fadeInDown">
			<div class="text-center">
				<a class="logo-name" href="<?php echo base_url(); ?>" style="font-size: 80px;"><img src="<?php echo base_url(); ?>img/login-logo.png" style="height:100px;"  /></a>
			</div>			 
			
			<!-- for Enter user Details -->
			<div class="ibox-content userFormDetails" style="background-color:#701D45;">
				<center><p>I forgot my email</p></center>
				<div id="message"></div>
				<form class="m-t" role="form" action="" id="forgotEmailFormId">
				
					<div class="form-group">
					  <input type="text" class="form-control" maxlength="10" id="txtDobId" name="txtDobNam" placeholder="Date Of Birth *" readonly onblur="validateMandatory('txtDobId','errDobId');" style="position: relative; z-index: 1000;" onchange="validateMandatory('txtDobId','errDobId');forgot_email_validate_forms();" tabindex="1" />
					   <span style="color:red;" id="errDobId"></span>	
					 <!-- <span class="glyphicon glyphicon-calendar form-control-feedback"></span>-->
					</div>  
					
					<div class="form-group">
					  <input type="text" class="form-control" maxlength="10" placeholder="Mobile# *" id="txtMobileNoId" name="txtMobileNoNam" onkeypress="return numbersonlyEntry(event);" onblur="validateMobile('txtMobileNoId','errMobileNoId');forgot_email_validate_forms();" tabindex="2" />
					   <span style="color:red;" id="errMobileNoId"></span>	
					 <!-- <span class="glyphicon glyphicon-phone form-control-feedback"></span>-->
					</div>
					
					<center><button type="button" class="btn btn-default btn-rounded btn-lg buttoncolor" id="btnFESubmitId" style="margin-top:20px; margin-bottom:20px; padding:4px 50px;border:none;" value="Submit" onclick="drd_BtnFESubmit();" tabindex="3" disabled ><b>Submit</b></button>
					<p><div><a href="<?php echo site_url(); ?>/login" tabindex="5" id="alink" >Sign In</a> <span Style="padding:10px;"> | </span>
                                                <a href="<?php echo site_url(); ?>/forgotpassword"  tabindex="6" id="alink" >Forgot Password?</a></div></p>
                                       </center>
				</form>
			</div>
		</div>

		<!-- Mainly scripts -->
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>js/validation.js"></script>
		<script src="<?php echo base_url(); ?>js/errValidation_Num.js"></script>
		
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/icheck.min.js"></script>
		   
	</body>

</html>

<script>
	$( "#txtDobId" ).datepicker({		 
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd,yy',
		maxDate: new Date(),
		//yearRange: "-50:+0"
	});	

function forgot_email_validate_forms(){
	var js_drd_mobile_patrn = /^[1-9][0-9]{9,15}$/;
	var userDob=document.getElementById("txtDobId").value!="";
	var userMobile=document.getElementById("txtMobileNoId").value!="";
	
	if(userDob && userMobile && js_drd_mobile_patrn.test(document.getElementById('txtMobileNoId').value)) {
		
		document.getElementById("btnFESubmitId").disabled = false; 
			
	}else{	
		document.getElementById("btnFESubmitId").disabled = true;				 
	}	
}
	
function drd_BtnFESubmit() {
	$("#btnFESubmitId").prop("disabled", true);
	$("#btnFESubmitId").css("cursor", "wait");
	var js_drd_FEmailData = $("#forgotEmailFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/forgotemailuser",			
		data:js_drd_FEmailData,
		success: function(ajx_drd_FEmailDataResult) {
		$("#btnFESubmitId").prop("disabled", false);
		$("#btnFESubmitId").css("cursor", "pointer");	
			var js_drd_FEmailUser = $.parseJSON(ajx_drd_FEmailDataResult);
			//alert(ajx_drd_FEmailDataResult);
			console.log("Return Login form post value "+JSON.stringify(js_drd_FEmailUser));
			
			if(js_drd_FEmailUser['message'] != "") {
				if(js_drd_FEmailUser['message_type'] ==  "SUCCESS"){
					document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_FEmailUser['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/login"; }, 2000);					
				}else if(js_drd_FEmailUser['message_type'] ==  "WARNING"){
					document.getElementById('message').innerHTML = "<div class='alert alert-warning fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_FEmailUser['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/login"; }, 2000);	
				}else {
					document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_FEmailUser['message']+"</div>";
				}			
			} else {
				$("#btnFESubmitId").prop("disabled", false);
				$("#btnFESubmitId").css("cursor", "pointer");
						
				$("#errDobId").text(js_drd_FEmailUser['DOB']);
				$("#errMobileNoId").text(js_drd_FEmailUser['MobileNo']);
			}
		}
			
	});
}
</script>
