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
				
			.input-group-addon {
		   background-color: #701d45;
			border:none;
			border-bottom: 1px solid #fff !important;
			}
		</style>
	</head>

	<body class="" style="background-color:#701D45;color:#FFF;">

		<div class="middle-box loginscreen animated fadeInDown">
			<div class="text-center">
			  <a class="logo-name" href="<?php echo site_url(); ?>" style="font-size: 80px;"><img src="<?php echo base_url(); ?>img/login-logo.png" style="height:100px;" /></a>
			</div>
			<div class="ibox-content" style="background-color:#701D45;">
			   <p class="text-center">I reset my password</p>
			   <div id="message"></div>
			   <form class="m-t" role="form" id="resetPasswordFormId">
				   <div class="form-group">
						<input type="text" class="form-control" placeholder="Email *" 
						id="txtEmailId" disabled maxlength="60" name="txtEmailNam"
						value="<?php echo $email; ?>"/>
					</div>
                    <div class="form-group">
                      <div class="input-group">  
                        <input type="password" class="form-control" maxlength="8" id="txtNewPwdId" name="txtNewPwd" placeholder="Enter Your New Password" onblur="validatePassword('txtNewPwdId','errNewPwdId');reset_pwd_validate_forms();"  />
						<span class="input-group-addon bg-blue" onclick =" toggle_password('txtNewPwdId');">
						<i class="fa fa-eye"></i>
						</span>									
						</div>
						<span id="showhide" class="hide" ></span>
					  <span style="color:red;" id="errNewPwdId"></span>
                      </div>
                    <div class="form-group">
                      <div class="input-group">
						  <input type="password" class="form-control" maxlength="8" id="txtConfirmPwdId" name="txtConfirmPwd" placeholder="Enter Your Confirm Password" onblur="validatePasswordMatch('txtNewPwdId','txtConfirmPwdId','errConfirmPwdId');reset_pwd_validate_forms();" />
						  <span class="input-group-addon bg-blue" onclick =" toggle_password('txtConfirmPwdId');">
							<i class="fa fa-eye"></i>
							</span>									
					   </div>
						<span id="showhide" class="hide" ></span>
					<span style="color:red;" id="errConfirmPwdId"></span>
                    </div>
					
					<center>
                                             <button type="button" class="btn btn-default btn-rounded btn-lg buttoncolor" tabindex="3" id="btnREPSubmitId" value="Submit" style="margin-top:20px; margin-bottom:20px; padding:4px 50px;border:none;" onclick="drd_BtnREPSubmit();" disabled><b>Submit</b></button></center>
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
function drd_BtnREPSubmit() {
	$("#btnREPSubmitId").prop("disabled", true);
	$("#btnREPSubmitId").css("cursor", "wait");
	//var js_drd_REPwdData = $("#resetPasswordFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/updatepassword",			
		data:{
		    'txtEmailNam':$('#txtEmailId').val(),
		    'txtNewPwd':$('#txtNewPwdId').val(),
		    'txtConfirmPwd':$('#txtConfirmPwdId').val(),
		  },
		success: function(ajx_drd_REPwdDataResult) {			
			$("#btnREPSubmitId").prop("disabled", false);
			$("#btnREPSubmitId").css("cursor", "pointer");
				var js_drd_REPwdUser = $.parseJSON(ajx_drd_REPwdDataResult);
				//alert(js_drd_REPwdUser);
				console.log("Return Reset form post value "+JSON.stringify(js_drd_REPwdUser));
				
				if(js_drd_REPwdUser['message'] != "") {
					if(js_drd_REPwdUser['message_type'] ==  "SUCCESS"){
						document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_REPwdUser['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/login"; }, 1000);					
					}else if(js_drd_REPwdUser['message_type'] ==  "WARNING"){
						document.getElementById('message').innerHTML = "<div class='alert alert-warning fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_REPwdUser['message']+"</div>";
					}else {
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_REPwdUser['message']+"</div>";
					}				
				} else {
					$("#btnREPSubmitId").prop("disabled", false);
					$("#btnREPSubmitId").css("cursor", "pointer");
							
					$("#errNewPwdId").text(js_drd_FPwdUser['NewPassword']);
					$("#errConfirmPwdId").text(js_drd_FPwdUser['ConfirmPassword']);
				}
			},
			error: function() {
			$("#btnREPSubmitId").prop("disabled", false);
			$("#btnREPSubmitId").css("cursor", "pointer");
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
		}
		});
}
var js_drd_pass_match = "NO";
function reset_pwd_validate_forms(){
	var js_drd_newpassword  = document.getElementById("txtNewPwdId").value!="";
	var js_drd_confirmpassword  = document.getElementById("txtConfirmPwdId").value!="";
	if(document.getElementById("txtNewPwdId").value != document.getElementById("txtConfirmPwdId").value)
	{
		js_drd_pass_match = "NO";
	}
	else
	{
		js_drd_pass_match  = "YES";
	}
	var pass_pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,30}$/;
	if(js_drd_newpassword && pass_pattern.test(document.getElementById('txtNewPwdId').value) && js_drd_confirmpassword && (js_drd_pass_match == 'YES'))
	{			
		document.getElementById("btnREPSubmitId").disabled = false; 
	} 
	else 
	{
		document.getElementById("btnREPSubmitId").disabled = true; 
	}
}
</script>
