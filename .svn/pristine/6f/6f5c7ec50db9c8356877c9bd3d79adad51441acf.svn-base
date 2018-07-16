<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>CBPCE | Sign Up</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/bootstrap-social.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/astyle.css" rel="stylesheet">
		<!-- Select2 -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/css/select2.min.css">
		<!-- For Dropdown  -->
		<link  rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-chosen.css">
		 <!-- Favicon -->
		 <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon">
	 
		
		<style>
			.datepicker { position: relative; z-index:1051 !important }
			
			input,textarea,select,.chosen-select
			{
				border: 0 !important;
				border-bottom: 1px solid #FFF !important;
				outline: 0 !important;
				background: transparent !important;
			}
			.ibox-content {
				border:none !important;
			}
			.slimScrollBar {
				opacity:0.9 !important;
			}
			.chosen-single{
				margin-bottom:10px !important;
				margin-left:0px !important; /* Changed by Rajee */
			}			
				
			.input-group-addon {
		        background-color: #701d45;
			border:none;
			border-bottom: 1px solid #fff !important;
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
			.chosen-container-single .chosen-single {
				background-color: #701d45;
				border:none;
				border-bottom: 1px solid #fff !important;
				border-bottom-right-radius: 0px;
				border-bottom-left-radius: 0px;
				color: #fff;
				line-height: 34px;
				
			}	
			.chosen-container-single .chosen-default{
				color: #cb91ad !important;
			}		
		</style>
	</head>

	<body class="" style="background-color:#701D45; color:#FFF;">
			<div class="middle-box text-left loginscreen animated fadeInDown">
			<div class="text-center">
			  <a class="logo-name" href="<?php echo site_url(); ?>" style="font-size: 80px;"><img src="<?php echo base_url(); ?>img/login-logo.png" class="logo-size"/></a>
			</div>
			<div class="ibox-content" style="background-color:#701D45;">
				<p>&nbsp;</p>
				<div class="signup_form">
				
					<div id="message"></div>
					<form class="m-t" role="form" name="signup_form" id="signup_form">
					 
						<div class="col-md-12" style="padding-left:0px;">	
							<div class="form-group">
							  <input type="text" class="form-control" maxlength="60" tabindex="1" placeholder="First Name *" name="txtFirstNam" id="txtFirstNameId" onblur="validateMandatory('txtFirstNameId','errFirstNameId');OBvalidate_signup_form()" onkeypress="return OKValidateAlphaOnly(event);" />
							  <span style="color:red; text-align:left !important;" id="errFirstNameId"></span>
							</div>
						</div><!-- End of First Name -->
								
						<div class="col-md-12" style="padding-left:0px;">	
							<div class="form-group">
							  <input type="text" class="form-control" maxlength="60" tabindex="2" placeholder="Last Name *" name="txtLastNam" id="txtLastNamId" onblur="validateMandatory('txtLastNamId','errLastNamId');OBvalidate_signup_form();" onkeypress="return OKValidateAlphaOnly(event);" />
							  <span style="color:red; text-align:left !important;" id="errLastNamId"></span>
							</div>
						</div><!-- End of Last Name -->						
												
						<div class="col-md-12" style="padding-left:0px;">	
							<div class="form-group">
							  <input type="text" class="form-control" maxlength="80" tabindex="3" placeholder="Practice Name *" id="txtPracticeId" name="txtPracticeNam" onblur="validateMandatory('txtPracticeId','errPracticeId');OBvalidate_signup_form();" onkeypress="return OKValidateAlphaNumeric(event);" />
							  <span style="color:red;" id="errPracticeId"></span>
							</div> 
						</div> <!-- End of Practice Name -->
						
						<div class="row">
                            <div class="col-md-6 col-xs-12" style="padding-left: 1px;"> 
								<div class="form-group col-xs-12">
									<input type="text" class="form-control" maxlength="10" tabindex="4" placeholder="License# *" name="txtLicenseNam[]" id="txtLicenseId1" onblur="validateMandatory('txtLicenseId1','errLicenseId1');OBvalidate_signup_form();" onkeypress="return numbersonlyEntry(event);" />
									<span style="color:red; text-align:left !important;" id="errLicenseId1"></span>
								</div>
							</div><!-- End of Licence # -->
							<div class="col-md-5 col-xs-11" style="padding-left:0px; padding-right:0px;">
								<div class="form-group col-xs-12" style="margin-bottom: 1px;">		
									<select class="form-control chosen-select selLicenseStateNam" tabindex="5" name="selLicenseStateNam" id="selLicenseStateId1" onchange="validateMandatory('selLicenseStateId1','errLicenseStateId1');OBvalidatestate(1);OBvalidate_signup_form();"  data-placeholder="State *">
									 <option value="" >State *</option>
									 <?php foreach($state as $state): ?>
									<option value="<?php echo $state['ID'];?>"> <?php echo trim($state['STATE_NAME']); ?> </option>
									<?php endforeach;?>
									</select>   
									<span style="color:red;" id="errLicenseStateId1"></span>
								</div> 
							</div><!-- End of State -->
							<div class="col-md-1 col-xs-1 addmorelink" style="padding-right: 0px; padding-left: 0px;">
								<span class=" fa fa-plus-circle" style="padding-top:9px;padding-bottom:12px;" onclick="addmorefunction(1);"></span> 
							</div>
						</div>
						
						<div id="stateAppendId"></div>
						<div class="col-md-12" style="padding-left:0px;">		
							<div class="form-group">
							  <input class="form-control" maxlength="300" tabindex="6" placeholder="Street Address *" name="txtStAddrNam" id="txtStAddrId" rows="1" cols="15" onkeypress="return restrictHTMLTagEntry(event)" onblur="validateMandatory('txtStAddrId','errStAddrId');OBvalidate_signup_form();" style="width:100%; height:34px;"/>
							  <span style="color:red;" id="errStAddrId"></span>
							</div>
						</div><!-- End of Address -->
						
						<div class="col-md-12" style="padding-left:0px;">	
							<div class="form-group">
							  <input type="text" class="form-control" maxlength="80" tabindex="7" placeholder="City *" name="txtCityNam" id="txtCityId" onblur="validateMandatory('txtCityId','errCityId');OBvalidate_signup_form();" onkeypress="return restrictHTMLTagEntry(event)" />
							  <span style="color:red; text-align:left !important;" id="errCityId"></span>
							</div>
						</div><!-- End of City -->							
							
						<div class="col-md-12"  style="padding-left:0px;">							
							<!-- <input type="text" class="form-control" 
							  placeholder="State *" name="selstateSecret" 
							  id="selstateId"  maxlength="60" />-->							  
							<select class="form-control chosen-select" tabindex="8" name="selStateNam" id="selStateId" onchange="select_validateMandatory('selStateId','errStateId');OBvalidate_signup_form();"  data-placeholder="State *">
							<option value="">State *</option>							
							<?php foreach($stateName as $stateNameArray): ?>
							<option value="<?php echo $stateNameArray['ID'];?>"> <?php echo trim($stateNameArray['STATE_NAME']); ?> </option>
							<?php endforeach;?>
							</select>	
							<span style="color:red;" id="errStateId"></span>
						</div><!-- End of State -->
						
						<div class="col-md-12" style="padding-left:0px;">	
							<div class="form-group">
							  <input type="text" class="form-control" maxlength="5" tabindex="9" placeholder="Zip *" name="txtZipNam" id="txtZipId" onblur="validatePostalcode('txtZipId','errZipId');OBvalidate_signup_form();" onkeypress="return numbersonlyEntry(event);" />
							  <span style="color:red; text-align:left !important;" id="errZipId"></span>
							</div>
						</div><!-- End of Zip -->							
							
						<div class="col-md-12" style="padding-left:0px;">
							<div class="form-group">							
								 <input type="hidden"  id="selCountryId" value="1" maxlength="60" />
								  <input type="text" tabindex="10" class="form-control" disabled 
								  id=""  value="USA" />	
									<span style="color:red;" id="errCountryId"></span>
							</div>
						</div><!-- End of Country -->
						
						<div class="col-md-12" style="padding-left:0px;">		
							<div class="form-group">
								<input type="text" class="form-control" readonly tabindex="11" placeholder="Date Of Birth *" name="txtDobNam" id="txtDobId"  onblur="ValidatedateMandatory('txtDobId','errDobId');OBvalidate_signup_form();" onchange="ValidatedateMandatory('txtDobId','errDobId');"  style="position: relative; z-index: 1000;"/>
								<span style="color:red;" id="errDobId"></span>	
							</div>
						</div><!-- End of Date of Birth -->
						
						<div class="col-md-12" style="padding-left:0px;">		
							<div class="form-group">
							  <input type="email" class="form-control" maxlength="60" tabindex="12" placeholder="Email Address *" name="txtEmailNam" id="txtEmailId" onblur=" emailExists('txtEmailId','errEmailId');OBvalidate_signup_form();" />
							  <span style="color:red;" id="errEmailId"></span>
							</div>
						</div><!-- End of Email -->
					
						<div class="col-md-12" style="padding-left:0px;">		 
							<div class="form-group">
							<div class="input-group">
							  <input type="password" class="form-control" maxlength="8" 
							  tabindex="13" placeholder="Password *" name="txtPwdNam" id="txtPwdId" onblur=" validatePassword('txtPwdId','errPwdId');OBvalidate_signup_form();" />
							  <span class="input-group-addon bg-blue" onclick =" toggle_password('txtPwdId');">
								<i class="fa fa-eye"></i>
								</span>									
							</div>
							<span id="showhide" class="hide" ></span>
							<span style="color:red;" id="errPwdId"></span>
							</div>
						</div><!-- End of Password -->
						
						<div class="col-md-12" style="padding-left:0px;">	
							<div class="form-group">
							  <input type="text" class="form-control" tabindex="14" name="txtIpAddrNam" id="txtIpAddrId" Value="<?php echo $ip_address;?>" disabled />
							</div>
						</div><!-- End of Ip address -->
							
						<div class="col-md-12" style="padding-left:0px;">		
							<div class="form-group">
							  <input type="text" class="form-control" maxlength="15" tabindex="15" placeholder="Mobile# *" name="txtCellNumNam" id="txtCellNumId" onblur="validateMobile('txtCellNumId','errCellNumId');OBvalidate_signup_form();" onkeypress="return numbersonlyEntry(event);" />
							  <span style="color:red;" id="errCellNumId"></span>
							</div>
						</div><!-- End of Cell Number -->
							
						<div class="col-md-12" style="margin-bottom:10px;padding-left:0px;">		
							<div class="scroll_content" style="margin-right:10px; padding-right:10px;">
								<p><?php echo $content;?>
								</p>
							</div>
						</div>
							<!-- End of Cell Number -->
							
						<div class="col-md-12" style="padding-left:0px; margin-top:20px;">	
							<div class="control-group i-checks">  
								<label class="control control--checkbox">
									<input type="checkbox" tabindex="16" name="chkAgreeNam" id="txtAgreeId" value="Y" onblur="validateTermscheck('txtAgreeId','errAgreeId');" onchange="validateTermscheck('txtAgreeId','errAgreeId');" 
									onclick="OBvalidate_signup_form();" />&nbsp;&nbsp;I certify that I am who I am								
								</label>								
							</div>	
							<span style="color:red;" id="errAgreeId"></span>
						</div><!-- End of Agree  -->
						
                                            <div class="col-md-12 text-center disable_button" style="padding-bottom:10px;"><a class="btn btn-default btn-rounded btn-lg" tabindex="17" style="background-color:#F8F8F8; color:#701D45; margin-top:20px; padding:3px 40px;border:none;" disabled ><b>Register</b></a></div>
						<div class="col-md-12 text-center enable_button" style="padding-bottom:10px;"><a class="btn btn-default btn-rounded btn-lg" tabindex="17" style="background-color:#F8F8F8; color:#701D45; margin-top:20px; padding:3px 40px;border:none;" id="signupButtonId" value=""><b>Register</b></a></div>
						<div class="text-center col-md-12" style="margin-bottom:50px; margin-top:20px;" >
						  <a href="<?php echo site_url();?>/login" tabindex="18" style="color:#CB91AD;">Already a Member?</a></div>
					</form>
				</div>
			</div>
		</div>

		<!-- Mainly scripts -->
		<script src="<?php echo base_url(); ?>js/validation.js"></script> 
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css" />
		<script src="<?php echo base_url(); ?>js/jquery.datetimepicker.full.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/icheck.min.js"></script> 
		 <script src="<?php echo base_url(); ?>js/errValidation_Num.js"></script> 
		<!-- Select2 -->
		<script src="<?php echo base_url(); ?>js/select2.full.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.slimscroll.min.js"></script>
		<!-- Chosen -->
		<script src="<?php echo base_url(); ?>js/chosen.jquery.js"></script>
	
<script>
	$(document).ready(function(){
	$('.enable_button').hide();		
	var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
		//$('.chosen-select').chosen({width: "100%"});
		$('.i-checks').iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
		});	
		// Add slimscroll to element
		$('.scroll_content').slimscroll({
			height: '130px',
			color: '#000',
			size:'5px',
			alwaysVisible: true,
			railVisible: true,
			railColor: '#fff',
			railOpacity: 0.9,
		})
	});
 $(function() {
     // DataPicker code
	var abv18age = new Date();
	var abv18date = abv18age.getDate();
	var abv18month = abv18age.getMonth()+1; //January is 0!
	var abv18year = abv18age.getFullYear()-18;
 
	/* $( "#txtDobId" ).datepicker({
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd,yy',
		//yearRange: "-70:+0",
		maxDate: abv18date+"/"+abv18month+"/"+abv18year,
	});	  
   }); */				
	
	$( "#txtDobId" ).datepicker({		 
        changeYear  : true,
        changeMonth : true,
		clearText: "Clear",
        dateFormat: 'M dd, yy',
		yearRange: "-80:+0"
		//maxDate: new Date()
        });	
	});	

/* Button  Submit FUnction  Start  */		
	$('#signupButtonId').click(function() {
		$("#signupButtonId").prop("disabled", true);
		$("#signupButtonId").css("cursor", "wait");	
		var license_state_array = [];	
		var license_state_id = document.getElementsByClassName("selLicenseStateNam");  
		console.log(license_state_id.length);
		for (var i = 1; i <= license_state_id.length; i++){
	license_state_array.push({license_state:document.getElementById('selLicenseStateId'+i).value,
	license_no:document.getElementById('txtLicenseId'+i).value}); 
	}
	console.log('get Data'+license_state_array);	
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/addsignupdata",
			data:{
				'txtFirstNam':$('#txtFirstNameId').val(),
				'txtLastNam':$('#txtLastNamId').val(),
				'txtEmailNam':$('#txtEmailId').val(),
				'txtPwdNam':$('#txtPwdId').val(),
				'txtCellNumNam':$('#txtCellNumId').val(),
				'txtDobNam':$('#txtDobId').val(),
				'txtPracticeNam':$('#txtPracticeId').val(),
				'selCountryNam':$('#selCountryId').val(),
				'selCountryName':$('#selCountryId').text(),
				'selStateNam':$('#selStateId').val(),
				'selStateName':$('#selStateId').text(),
				'txtCityNam':$('#txtCityId').val(),
				'txtCityName':$('#txtCityId').text(),
				'txtStAddrNam':$('#txtStAddrId').val(),
				'txtZipNam':$('#txtZipId').val(),
				'chkAgreeNam':$('#txtAgreeId').val(),
				'txtIpAddrNam':$('#txtIpAddrId').val(),
				'ajx_dl_licenseData': license_state_array,
			},
			success: function(ajx_drd_AddSignupResult) {
				console.log("return Data"+ajx_drd_AddSignupResult);
				var js_drd_AddSignup = $.parseJSON(ajx_drd_AddSignupResult);
				console.log("return js_drd_AddSignup"+js_drd_AddSignup);
				if (js_drd_AddSignup['message'] != "") {
					console.log("SignUp Return  Message "+js_drd_AddSignup['message']);
					if(js_drd_AddSignup['message_type'] ==  "SUCCESS"){
					document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddSignup['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/login"; }, 1000);					
					}else if(js_drd_AddSignup['message_type'] ==  "WARNING"){
						document.getElementById('message').innerHTML = "<div class='alert alert-warning fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddSignup['message']+"</div>";						
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/login"; }, 1000);
					}else {
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddSignup['message']+"</div>";
					}
					$('html, body').animate({ scrollTop: 0 }, 'fast');
				} else {  
					$("#signupButtonId").prop("disabled", false);
					$("#signupButtonId").css("cursor", "pointer");
					$("#errFirstNameId").text(js_drd_AddSignup['FirstName']);
					$("#errLastNamId").text(js_drd_AddSignup['LastName']);
					$("#errPracticeId").text(js_drd_AddSignup['PracticeName']);
					$("#errLicenseId").text(js_drd_AddSignup['License']);
					$("#errLicenseStateId").text(js_drd_AddSignup['LicenseState']);
					$("#errStAddrId").text(js_drd_AddSignup['Address']);
					$("#errCityId").text(js_drd_AddSignup['City']);
					$("#errStateId").text(js_drd_AddSignup['State']);
					$("#errZipId").text(js_drd_AddSignup['ZipCode']);
					$("#errCountryId").text(js_drd_AddSignup['Country']);
					$("#errEmailId").text(js_drd_AddSignup['Email']);
					$("#errPwdId").text(js_drd_AddSignup['Password']);
					$("#errCellNumId").text(js_drd_AddSignup['CellNum']);
					$("#errAgreeId").text(js_drd_AddSignup['AgreeTerms']);
				}

			},
			error: function() {
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
				//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
			}
		});	
			
	});
	
$("select[option='selected']").click(function(){
	alert();
	$(this).css('color','#fff');
});

function addmorefunction(count){
	console.log(count);
	var js_drd_no_regex = /^[1-9][0-9]{9,}$/;
	var js_drd_license_no = $('#txtLicenseId'+count).val();
	console.log("js_drd_license_no "+js_drd_license_no);
	var js_drd_state_id = $('#selLicenseStateId'+count).val();
	if(js_drd_license_no && js_drd_state_id !=""){
		var addmorecount = count+1;
		$('#errLicenseId'+count).text('');	
		$('#errLicenseStateId'+count).text('');
		var row = '<div class="row"><div class="col-md-6 col-xs-12" style="padding-left:1px;"><div class="form-group col-xs-12"><input type="text" class="form-control" maxlength="10" tabindex="4" placeholder="License# *" name="txtLicenseNam[]" id="txtLicenseId'+addmorecount+'" onblur="validateMandatory('+"'txtLicenseId"+addmorecount+"'"+','+"'errLicenseId"+addmorecount+"'"+');OBvalidate_signup_form();" onkeypress="return numbersonlyEntry(event);" /><span style="color:red; text-align:left !important;" id="errLicenseId'+addmorecount+'"></span></div></div><div class="col-md-5 col-xs-11" style="padding-left:0px; padding-right:0px;"><div class="form-group col-xs-12" style="margin-bottom: 1px;"><select class="form-control chosen-select selLicenseStateNam" tabindex="5" name="selLicenseStateNam" id="selLicenseStateId'+addmorecount+'" onchange="validateMandatory('+"'selLicenseStateId"+addmorecount+"'"+','+"'errLicenseStateId"+addmorecount+"'"+');OBvalidate_signup_form();"><option value="" >State *</option><?php foreach($stateName as $stateNameArray): ?><option value="<?php echo $stateNameArray['ID'];?>"><?php echo trim($stateNameArray['STATE_NAME']); ?> </option><?php endforeach;?></select><span style="color:red;" id="errLicenseStateId'+addmorecount+'"></span></div></div><div class="col-md-1 col-xs-1 addmorelink" style="padding-right: 0px; padding-left: 0px;"><span class="fa fa-plus-circle" style="padding-top:9px;padding-bottom:12px;" onclick="addmorefunction('+addmorecount+');"></span></div></div>';
		$('.addmorelink').hide();
		$('#stateAppendId').append(row);
		$('.chosen-select').chosen({width: "99%"});			
	} else {
		if(js_drd_license_no ==""){
			$('#errLicenseId'+count).text(errMsg["80547"]);
		}else{
			$('#errLicenseId'+count).text('');
		}
		
		if(js_drd_state_id ==""){			
			$('#errLicenseStateId'+count).text(errMsg["80547"]);
		} else {
			/* 
			var license_state_id = document.getElementsByClassName("selLicenseStateNam");  
			console.log(license_state_id.length);
			for (var j = 1; j <= license_state_id.length; j++)
			{				
				if(j != count)
				{							
					if(($('#selLicenseStateId'+count).val() == $('#selLicenseStateId'+j).val()))
					{
						$('#errLicenseStateId'+count).text(errMsg["80605"]);	
					}
					else
					{
						$('#errLicenseStateId'+count).text('');	
					}
				}
				else
				{
					$('#errLicenseStateId'+count).text('');	
				}
			} */
			$('#errLicenseStateId'+count).text('');	
		}
	}
}

function OBvalidatestate(id){
	
	 if($('#selLicenseStateId'+id).val()!= ""){
		/* var license_state_id = document.getElementsByClassName("selLicenseStateNam");  
		console.log(license_state_id.length);
		for (var j = 1; j <= license_state_id.length; j++)
		{
				console.log("Inside j."+$('#selLicenseStateId'+j).val());
				console.log("Inside id."+$('#selLicenseStateId'+id).val());
			if(($('#selLicenseStateId'+id).val()) == ($('#selLicenseStateId'+j).val()))
			{
				console.log("Inside Value match.");
				console.log("Inside Value match  ifd."+$('#selLicenseStateId'+id).val());
				if(license_state_id.length >1)
				{
					console.log("Inside length greaterthen.");
					$('#errLicenseStateId'+id).text(errMsg["80605"]);	
				}
				else
				{
					console.log("Inside length else loop.");
					$('#errLicenseStateId'+id).text('');	
				}
			}
			else
			{
				console.log("Inside else value does not match.");
				$('#errLicenseStateId'+id).text('');	
			}
			
		} */
		$('#errLicenseStateId'+id).text('');	  
	 }else{
		 console.log("Inside else value empty.");
		 $('#errLicenseStateId'+id).text(errMsg["80547"]);
		 
	 }	
	}

/* -------- Validation Function for select_validateMandatory Field---------- */
function select_validateMandatory (valueId,errId) {
	var getvalue = document.getElementById(valueId).value;
	if(getvalue == "") {
		document.getElementById(errId).innerHTML = errMsg["80547"];
	} else {
		document.getElementById(errId).innerHTML = ""; 
	}
}

	/*------------------- Function For Email Already Exits ------------------*/
var js_drd_valid_email = 'NO';
function emailExists(valueId,errId) {
	var js_drd_emailid=document.getElementById(valueId).value;
	//var at = js_drd_emailid.indexOf("@");
	//var dot = js_drd_emailid.lastIndexOf(".");
	var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(js_drd_emailid=="")	{
		document.getElementById(errId).innerHTML = errMsg['80547'];
		js_drd_valid_email = 'NO';
	}else if (!emailPattern.test(js_drd_emailid))  {
		document.getElementById(errId).innerHTML = errMsg['80530']; 
		js_drd_valid_email = 'NO';
	} else 	{
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/email-exists",			
			data:{
			'ajx_txtEmailNam':js_drd_emailid
			},
			success: function(ajx_emailExists) {
				var js_ReturnMessage = $.parseJSON(ajx_emailExists);
				console.log("Return Register form post value "+JSON.stringify(js_ReturnMessage));
				if (js_ReturnMessage['message'] != "") {
					document.getElementById(errId).innerHTML = js_ReturnMessage['message'];		
					js_drd_valid_email = 'NO';					
				} else {
					document.getElementById(errId).innerHTML="";
					js_drd_valid_email = 'YES';
				}
			},
			error: function(){
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
			});	
	}
}
var js_drd_chk = 'N';
$('input#txtAgreeId').on('ifChecked', function () {
  js_drd_chk = 'Y';
   $('#errAgreeId').text('');
  OBvalidate_signup_form();

});
$('input#txtAgreeId').on('ifUnchecked', function () {

 js_drd_chk = 'N';
 OBvalidate_signup_form();
    $('#errAgreeId').text(errMsg["80547"]);
 $('.enable_button').hide();	
 $('.disable_button').show();
});
/* Button Disable  Function */
var date_valid = false;
function OBvalidate_signup_form(){
	console.log(js_drd_chk);
	console.log("clicked");
	var js_drd_email_patrn = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
	var js_drd_mobile_patrn = /^[1-9][0-9]{9,14}$/;
	var js_drd_pwd_patrn = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,30}$/;
	var js_drd_zip_patrn = /^[0-9]{5}$/;
	var js_drd_fname = document.getElementById('txtFirstNameId').value!="";
	var js_drd_lname = document.getElementById('txtLastNamId').value!="";
	var js_drd_pratice_name = document.getElementById('txtPracticeId').value!="";
	var js_drd_street_address = document.getElementById('txtStAddrId').value!="";
	var js_drd_city = document.getElementById('txtCityId').value!="";
	var js_drd_state = document.getElementById('selStateId').value!="";
	var js_drd_zip_code = document.getElementById('txtZipId').value!="";
	var js_drd_zip_pattern = js_drd_zip_patrn.test(document.getElementById('txtZipId').value);
	var js_drd_country = document.getElementById('selCountryId').value!="";
	var js_drd_dob = document.getElementById('txtDobId').value!="";
	var js_drd_email_id = document.getElementById('txtEmailId').value!="";
	var js_drd_password = document.getElementById('txtPwdId').value!="";
	var js_drd_mobile_no= document.getElementById('txtCellNumId').value!="";
	var js_drd_pattern_email_Id = js_drd_email_patrn.test(document.getElementById('txtEmailId').value);
	var js_drd_pattern_mobile = js_drd_mobile_patrn.test(document.getElementById('txtCellNumId').value);
	var js_drd_pattern_pwd = js_drd_pwd_patrn.test(document.getElementById('txtPwdId').value);
	var js_drd_termscheck =document.getElementById("txtAgreeId").checked == true;
	
	var data = 1;
	var licensearray = [];
	var license_state_id_data = document.getElementsByClassName("selLicenseStateNam"); 
	console.log(license_state_id_data.length);
	for (var i = 1; i <= license_state_id_data.length; i++){
		
		var license = document.getElementById('txtLicenseId'+i).value!="";
		var state_license = document.getElementById('selLicenseStateId'+i).value!="";
		//var state= state_license.options[state_license.selectedIndex].value;
			//console.log("state"+state.length);
		if(license && state_license)
		{
			licensearray.push(1);
			if(licensearray.length !=0)
			{
				data=0;
			}
			else
			{
				data=data+1;
			}
			console.log("Both or Valid");
			
		}
		else if(license)
		{
			if(state_license)
			{
				console.log("Both or Empty inside inside license");
			}
			else
			{
				data=data+1;
			}
			
		}
		else if(state_license)
			{
				if(license)
				{
					console.log("Both or Not Empty inside inside license");
				}
				else
				{
					console.log("license Empty");
					data=data+1;
				}
				
			}
		else
		{
			if(licensearray.length !=0)
			{
				data=0;
			}
			else
			{
				data=data+1;
			}
		}
	}		
	
	console.log("js_drd_chk "+js_drd_chk);
	console.log("license_array_value "+data);
	var getDate = document.getElementById('txtDobId').value;
	var date = new Date(getDate);
	var convert_toDate= $.datepicker.formatDate('M dd, yy',new Date()); 
	var sys_date = new Date(convert_toDate);
 
    if(getDate == "") {
		date_valid = false;
	} else if (date <= sys_date) {
		date_valid = true;
    } else {
		date_valid = false; 
	}			   
	if((js_drd_fname && js_drd_lname && js_drd_pratice_name && js_drd_street_address && js_drd_city  && js_drd_state && js_drd_zip_code  &&js_drd_zip_pattern  && js_drd_country && js_drd_dob && js_drd_email_id && js_drd_password && js_drd_mobile_no && js_drd_pattern_email_Id && js_drd_pattern_mobile && js_drd_pattern_pwd && date_valid) && (js_drd_chk == 'Y') && (data == 0))
	{
		console.log('inside if');	 
		$('.enable_button').show();	
		$('.disable_button').hide();	
	}
	else
	{	
		console.log('inside else');		
		$('.enable_button').hide();	
		$('.disable_button').show();	
	}	
}


function ValidatedateMandatory (valueId,errId) { 
    var getDate = document.getElementById(valueId).value;
	var date = new Date(getDate);
	var convert_toDate= $.datepicker.formatDate('M dd, yy',new Date()); 
	var sys_date = new Date(convert_toDate);
 
    if(getDate == "") {
		document.getElementById(errId).innerHTML = errMsg["80547"];
	} else if (date <= sys_date) {
		document.getElementById(errId).innerHTML = "";
    } else {
		document.getElementById(errId).innerHTML = errMsg["80597"]; 
	}
}

</script>
		
</body>

</html>
