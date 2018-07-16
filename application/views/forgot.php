<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>CBPCE | Forgot</title>

		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
		 <link href="<?php echo base_url(); ?>css/bootstrap-social.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/astyle.css" rel="stylesheet">
		
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
                            <center> <a class="logo-name" href="<?php echo site_url(); ?>" style="font-size: 80px;"><img src="<?php echo base_url(); ?>img/login-logo.png" style="height:100px;" /></a></center>
			</div>
			<div class="ibox-content" style="background-color:#701D45;">
			   <p class="text-center">I forgot my password</p>
			   <div id="message"></div>
			   <form class="m-t" role="form" id="forgotPasswordFormId">
				   <div class="form-group">
						<input type="text" class="form-control" placeholder="Email *" 
						id="txtEmailId"  maxlength="60" name="txtEmailNam"
						onblur="validateEmail_DB('txtEmailId','errEmailId');forgot_pwd_validate_forms();" tabindex="1" />
						<span style="color:red;" id="errEmailId"></span>
					</div>
					<div  class="hide_mobilecls">		
					<div class="form-group">
						<input type="text" class="form-control" maxlength="10" placeholder="Mobile# *" tabindex="2" id="txtMobileNoId" name="txtMobileNoNam" onkeypress="return numbersonlyEntry(event);" onblur="validateMobile('txtMobileNoId','errMobileNoId');forgot_pwd_validate_forms();" />
						<span style="color:red;" id="errMobileNoId"></span>	
					</div>
					</div>
					
                                        <center>
                                            <button type="button" class="btn btn-default btn-rounded btn-lg buttoncolor" tabindex="3" id="btnFPSubmitId" value="Submit" style="margin-top:20px; margin-bottom:20px; padding:4px 50px;border:none;" onclick="drd_BtnFPSubmit();" disabled><b>Submit</b></button>
                                            <p style="margin-top:11px;"><a href="<?php echo site_url(); ?>/login" tabindex="4" id="alink"  >Sign In</a></p>
                                          </center>
                           </form>
			</div>
		</div>

		<!-- Mainly scripts -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script> 
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/validation.js"></script>
		<script src="<?php echo base_url(); ?>js/errValidation_Num.js"></script>

	</body>

</html>

<script>
$('.hide_mobilecls').hide();
var js_drd_user_type;
function validateEmail_DB(valueId,errId) {
	var js_drd_emailid=document.getElementById(valueId).value;
	//var at = js_drd_emailid.indexOf("@");
	//var dot = js_drd_emailid.lastIndexOf(".");
	var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(js_drd_emailid=="")	{
		document.getElementById(errId).innerHTML = errMsg['80547'];
		js_drd_valid_email = 'NO';
	}else if (!emailPattern.test(js_drd_emailid)) {
		document.getElementById(errId).innerHTML = errMsg['80530']; 
		js_drd_valid_email = 'NO';
	} else 	{
		document.getElementById(errId).innerHTML = ''; 
		$('.hide_mobilecls').hide();
		$('#txtMobileNoId').val('');
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/userchecks",			
			data:{
			'txtEmailNam':js_drd_emailid,
			'formSubmit':'NOT POST',
			},
			success: function(ajx_emailExists) {
				var js_ReturnMessage = $.parseJSON(ajx_emailExists);
				console.log("Return Register form post value "+JSON.stringify(js_ReturnMessage));
				if (js_ReturnMessage['message'] != "") {
					if(js_ReturnMessage['message_type'] == "SUCCESS"){
						document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_ReturnMessage['message']+"</div>";
					}else{					
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_ReturnMessage['message']+"</div>";
					}
				} else {
					if(js_ReturnMessage['message_type'] != "SUCCESS"){
					$("#errEmailId").text(js_ReturnMessage['Email']);
					$("#errMobileNoId").text(js_ReturnMessage['MobileNo']);
					}else{
						js_drd_user_type = js_ReturnMessage['user_type'];
						console.log(js_drd_user_type);
						if(js_drd_user_type == "STUDENT"){
							$('.hide_mobilecls').show();
							$('#txtMobileNoId').val('');
						}else{
							$('.hide_mobilecls').hide();
							$('#txtMobileNoId').val('');
						}
					}	
				}
				$('html, body').animate({ scrollTop: 0 }, 'fast');
			},
			error: function(){
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
			});	
	}
}
function drd_BtnFPSubmit() {
	$("#btnFPSubmitId").prop("disabled", true);
	$("#btnFPSubmitId").css("cursor", "wait");
	var js_drd_FPwdData = $("#forgotPasswordFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/userchecks",			
		data:js_drd_FPwdData,
		success: function(ajx_drd_FPwdDataResult) {			
			$("#btnFPSubmitId").prop("disabled", false);
			$("#btnFPSubmitId").css("cursor", "pointer");
				var js_drd_FPwdUser = $.parseJSON(ajx_drd_FPwdDataResult);
				//alert(ajx_drd_FPwdDataResult);
				console.log("Return Login form post value "+JSON.stringify(js_drd_FPwdUser));
				
				if(js_drd_FPwdUser['message'] != "") {
					if(js_drd_FPwdUser['message_type'] ==  "SUCCESS"){
						document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_FPwdUser['message']+"</div>";
						//setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/login"; }, 1000);					
					}else if(js_drd_FPwdUser['message_type'] ==  "WARNING"){
						document.getElementById('message').innerHTML = "<div class='alert alert-warning fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_FPwdUser['message']+"</div>";
					}else {
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_FPwdUser['message']+"</div>";
					}				
				} else {
					$("#btnFPSubmitId").prop("disabled", false);
					$("#btnFPSubmitId").css("cursor", "pointer");
							
					$("#errEmailId").text(js_drd_FPwdUser['Email']);
					$("#errMobileNoId").text(js_drd_FPwdUser['MobileNo']);
				}
			},
			error: function() {
			$("#btnFPSubmitId").prop("disabled", false);
			$("#btnFPSubmitId").css("cursor", "pointer");
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
		}
		});
}

function forgot_pwd_validate_forms(){
	var js_drd_email_patrn = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var js_drd_mobile_patrn = /^[1-9][0-9]{9,14}$/;
	var userName=document.getElementById("txtEmailId").value!="";
	var userMobile=document.getElementById("txtMobileNoId").value!="";
	
	if(userName && js_drd_email_patrn.test(document.getElementById('txtEmailId').value)) {
		if(js_drd_user_type != "STUDENT"){
			
			document.getElementById("btnFPSubmitId").disabled = false; 
			
		}else if(userMobile && js_drd_mobile_patrn.test(document.getElementById('txtMobileNoId').value)){
			
			document.getElementById("btnFPSubmitId").disabled = false; 
		}else{
			
			document.getElementById("btnFPSubmitId").disabled = true; 
		}
		
	}else{	
		document.getElementById("btnFPSubmitId").disabled = true;				 
	}	
}

</script>