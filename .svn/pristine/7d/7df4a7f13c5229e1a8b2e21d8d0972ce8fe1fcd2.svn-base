<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>CBPCE | Log in</title>

		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/bootstrap-social.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/astyle.css" rel="stylesheet">
		
     <!-- Favicon -->
     <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon">
	 
		<style>
		.input-group-addon {
		   background-color: #701d45;
			border:none;
			border-bottom: 1px solid #fff !important;
			}
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
			<div>
                            <center>
                              <a class="logo-name" href="<?php echo site_url(); ?>" style="font-size: 80px;"><img src="<?php echo base_url(); ?>img/login-logo.png" class="logo-size"/></a>
                            </center>
                        </div>  
			
			<div class="ibox-content" style="background-color:#701D45;">
				<p>&nbsp;</p>
				<form class="m-t" role="form" id="loginFormId" action="">
					<div id="message"></div>
					<input type="hidden" name="txtFailCountNam" id="txtFailCountId" />
					<div class="form-group">
						<input type="email" class="form-control" maxlength="60" id="txtEmailId" name="txtEmailNam" placeholder="Username/Email *" tabindex="1" onblur="validateEmail('txtEmailId','errEmailId');" onchange="loginValidateForms();" />
                                                <span id="errEmailId" style="color:red;"></span>
                                        </div>
						
					<div class="form-group">
					<div class="input-group">
						<input type="password" class="form-control" maxlength="8" id="pwdPasswordId" name="pwdPasswordNam"  placeholder="Password *" tabindex="2" onblur="validateMandatory('pwdPasswordId','errPasswordId')" onkeyup="loginValidateForms();" onchange="loginValidateForms();" /><span class="input-group-addon bg-blue" onclick =" toggle_password('pwdPasswordId');">
								<i class="fa fa-eye"></i>
								</span>									
					</div>
						<span id="showhide" class="hide" ></span>
                                                <span id="errPasswordId" style="color:red;"></span>
					</div>
					
					
					<p class="text-center" style="margin-top:30px;font-size:17px;" ><a href="<?php echo site_url(); ?>/signup" style="color:#FFF;" tabindex="4" id="alink" >New Here? Register Now</a></p>
					
					<center>
                                            <button type="button" class="btn btn-default btn-rounded btn-lg buttoncolor" id="btnLoginId" value="Sign In" onclick="drd_BtnLogin();" style="margin-top:20px; margin-bottom:20px; padding:4px 50px;border:none;" tabindex="3" disabled ><b>Sign In</b></button>
                                            <p><div><a href="<?php echo site_url(); ?>/forgotpassword" tabindex="5" id="alink" >Forgot Password?</a> <span Style="padding:10px;"> | </span>
                                                <a href="<?php echo site_url(); ?>/forgotemail"  tabindex="6" id="alink" >Forgot Email?</a></div></p>
                                        </center>
                                </form>
			</div>
		</div>

		<!-- Mainly scripts -->
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<!-- For Js Error Validation -->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/validation.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/errValidation_Num.js"></script>

	</body>

</html>

<script>
$(document).ready(function(){
	$('#txtFailCountId').val("1");
});
function drd_BtnLogin()
 {
	 console.log($('#txtFailCountId').val());
	$("#btnLoginId").prop("disabled", true);
	$("#btnLoginId").css("cursor", "wait");
	var js_drd_LoginData = $("#loginFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/loginuser",			
		data:js_drd_LoginData,
		success: function(ajx_drd_LoginDataResult) {
		$("#btnLoginId").prop("disabled", false);
		$("#btnLoginId").css("cursor", "pointer");
			var js_drd_LoginUser = $.parseJSON(ajx_drd_LoginDataResult);
			//alert(ajx_drd_LoginDataResult);
			console.log("Return Login form post value "+JSON.stringify(js_drd_LoginUser));
			
			if(js_drd_LoginUser['message'] != "") {
				console.log("SignIn Return  Message "+js_drd_LoginUser['message']);
				if(js_drd_LoginUser['message_type'] ==  "SUCCESS"){
					if(js_drd_LoginUser['page'] == 'ForgotPassword'){
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/forgotpassword"; }, 500);
					} else if(js_drd_LoginUser['page'] == 'UserDashboard'){
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/userdashboard"; }, 500);
					} else if(js_drd_LoginUser['page'] == 'AdminDashboard'){
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/admindashboard"; }, 500);
					} else{
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/admincertificates"; }, 500);
					}
									
				}else {
					$("#txtFailCountId").val(js_drd_LoginUser['failcount']);
					document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_LoginUser['message']+"</div>";
				}
				$('html, body').animate({ scrollTop: 0 }, 'fast');				
			} else {
				$("#btnLoginId").prop("disabled", false);
				$("#btnLoginId").css("cursor", "pointer");
						
				$("#errEmailId").text(js_drd_LoginUser['Email']);
				$("#errPasswordId").text(js_drd_LoginUser['Password']);
			}
		},
		error: function() {
			$("#btnLoginId").prop("disabled", false);
			$("#btnLoginId").css("cursor", "pointer");
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
		}
			
		});
}

function loginValidateForms()
{
	var pattern= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;		
	var userName=document.getElementById("txtEmailId").value!="";
	var password=document.getElementById("pwdPasswordId").value!="";
	
	if((userName && password && pattern.test(document.getElementById('txtEmailId').value))) {					
		document.getElementById("btnLoginId").disabled = false; 
	}else{	
		document.getElementById("btnLoginId").disabled = true;				 
	}	
}

</script>