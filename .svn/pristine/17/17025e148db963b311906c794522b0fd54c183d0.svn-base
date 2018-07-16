<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content" style="border-style:none;">
					<div class="m-t-sm">
						<div class="row wrapper white-bg page-heading">
							<div class="row">
								<div class="col-md-12"  style="padding-right:0px;">
									<h1 class="labeltext">Add User</h1>
								</div>
							</div>
							<p></p>
							<div id="addUser_Message"></div>
							<form class="form-horizontal" action="" id="addUserFormId">
								<div class="form-group">
								<label class="col-md-2">Type of User</label>
								<div class="col-md-3">
									<select class="form-control" id="selUserTypeId" name="selUserTypeNam" tabindex="1" onblur="validateMandatory('selUserTypeId','errUserTypeId');OBvalidate_adduser_form();" >
										<option value="">Select User</option>
										 <?php foreach($user_type as $user_type): 
										 if($user_type['VALUE_NAME'] !="STUDENT"){
										 ?>
										 
										<option value="<?php echo $user_type['ID'];?>"> <?php echo trim($user_type['VALUE_NAME']); ?> </option>
										 <?php }
										 endforeach;?>
									</select>
								<span style="color:red;" id="errUserTypeId"></span>
								</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2">Email Address</label>
									<div class="col-lg-6"><input type="text" placeholder="" class="form-control" id="txtEmailId" name="txtEmailNam"  maxlength="60" tabindex="2" onblur="emailExists('txtEmailId','errEmailId');OBvalidate_adduser_form();" >
									<span style="color:red;" id="errEmailId"></span>
									</div>								
								</div>
								<div class="form-group">
									<label class="col-lg-2">Password</label>
									<div class="col-lg-6">
									<div class="input-group"><input type="password" maxlength="8" id="pwdPasswordId" name="pwdPasswordNam" placeholder="" class="form-control" tabindex="3" onblur="validatePassword('pwdPasswordId','errPasswordId');validatePasswordMatch('pwdPasswordId','pwdRepeatPasswordId','errRepeatPasswordId');OBvalidate_adduser_form();" />
									<span class="input-group-addon bg-blue" onclick =" toggle_password('pwdPasswordId');">
									<i class="fa fa-eye"></i>
									</span>	
									</div>
									<span id="showhide" class="hide" ></span>
									<span style="color:red;" id="errPasswordId"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2">Repeat Password</label>
									<div class="col-lg-6">
									<div class="input-group"><input type="password" maxlength="8" id="pwdRepeatPasswordId" name="pwdRepeatPasswordNam"  placeholder="" class="form-control" tabindex="4" onblur="validatePasswordMatch('pwdPasswordId','pwdRepeatPasswordId','errRepeatPasswordId');OBvalidate_adduser_form();"/>
									<span class="input-group-addon bg-blue" onclick =" toggle_password('pwdRepeatPasswordId');">
									<i class="fa fa-eye"></i>
									</span>	
									</div>
									<span id="showhide" class="hide" ></span>
									<span style="color:red;" id="errRepeatPasswordId"></span>
								</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2">First Name</label>
									<div class="col-lg-2"><input type="text" id="txtFirstNameId" name="txtFirstNameNam" maxlength="60" placeholder="" class="form-control" style="padding-right:0px;" tabindex="5" onblur="validateMandatory('txtFirstNameId','errFirstNameId');OBvalidate_adduser_form();" onkeypress="return OKValidateAlphaOnly(event);" />
									<span style="color:red;" id="errFirstNameId"></span>
									</div>
									<label class="col-lg-1">&nbsp;</label>
									<label class="col-lg-1 " style="padding-left:0px;padding-right:0px;">Last Name</label>
									<div class="col-lg-2"><input type="text" id="txtLastNameId" name="txtLastNameNam" maxlength="60"  placeholder="" class="form-control" tabindex="6" onblur="validateMandatory('txtLastNameId','errLastNameId');OBvalidate_adduser_form();" onkeypress="return OKValidateAlphaOnly(event);"/>
									<span style="color:red;" id="errLastNameId"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2">Organization (Optional)</label>
									<div class="col-lg-6"><input type="text" id="txtOrgId" name="txtOrgNam" placeholder="" maxlength="120" class="form-control" onkeypress="return restrictHTMLTagEntry(event)" tabindex="7"/></div>
								<span style="color:red;" id="errOrgId"></span>
								</div>
								<div class="form-group">
									<label class="col-lg-2">User Expires</label>
									<div class="col-lg-3">
									<select class="form-control" id="selUserExpId" name="selUserExpNam" tabindex="8" onblur="validateMandatory('selUserExpId','errUserExpId');OBvalidate_adduser_form();" >
										<option value="" >Select User Expires</option>
										<?php foreach($user_expires as $user_expires): ?>
										<option value="<?php echo $user_expires['ID'];?>"> <?php echo trim($user_expires['VALUE_NAME']); ?> </option>
										<?php endforeach;?>
								</select>
								<span style="color:red;" id="errUserExpId"></span>
								</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2"></label>
									<div class="col-lg-6">
									<button class="btn btn-lg btn-success pull-right" type="button" id="addSaveUserBtnId" tabindex="10" value="Save" onclick="drd_BtnAddUserSave();"disabled ><strong>Save</strong></button>
									<a class="btn btn-lg btn-primary pull-right" href="<?php echo site_url(); ?>/users" tabindex="9"><strong>Cancel</strong></a>
									</div>
								</div>
							</form>
						</div><!-- row wrapper -->
					</div><!-- "m-t-sm -->
				</div>
			</div>
		</div><!-- col-lg-12 -->
	</div><!-- Row -->
</div><!-- container -->

<script>

/* $('#addSaveUserBtnId').click(function(){
	window.location.href="<?php echo site_url(); ?>/users";
}); */

function emailExists(valueId,errId) {
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

var js_drd_pass_match = "NO";
function OBvalidate_adduser_form()
{
	var js_drd_email_patrn = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var js_drd_pwd_patrn = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,30}$/;
	
	var js_drd_usertype = document.getElementById('selUserTypeId').value!="";
	var js_drd_fname = document.getElementById('txtFirstNameId').value!="";
	var js_drd_lname = document.getElementById('txtLastNameId').value!="";
	var js_drd_email_id = document.getElementById('txtEmailId').value!="";
	var js_drd_pattern_email_Id = js_drd_email_patrn.test(document.getElementById('txtEmailId').value);
	var js_drd_pattern_pwd_Id = js_drd_pwd_patrn.test(document.getElementById('pwdPasswordId').value);
	var js_drd_password  = document.getElementById("pwdPasswordId").value!="";
	var js_drd_confirmpassword  = document.getElementById("pwdRepeatPasswordId").value!="";	
	var js_drd_userexp = document.getElementById('selUserExpId').value!="";
	
	if(document.getElementById("pwdPasswordId").value != document.getElementById("pwdRepeatPasswordId").value)
	{
		js_drd_pass_match = "NO";
	}
	else
	{
		js_drd_pass_match  = "YES";
	}
	
	if((js_drd_usertype && js_drd_fname && js_drd_lname && js_drd_email_id  && js_drd_pattern_email_Id  && js_drd_pattern_pwd_Id  && js_drd_password  && js_drd_confirmpassword  && js_drd_userexp ) && (js_drd_pass_match == "YES"))
	{			
		document.getElementById("addSaveUserBtnId").disabled = false; 
	} 
	else 
	{
		document.getElementById("addSaveUserBtnId").disabled = true; 
	}
}

function drd_BtnAddUserSave() {
	btn_loading_fun();
	$("#addSaveUserBtnId").prop("disabled", true);
	$("#addSaveUserBtnId").css("cursor", "wait");
	var js_drd_AddUserData = $("#addUserFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/adduserdetails",			
		data:js_drd_AddUserData,
		success: function(ajx_drd_AddUserData) {
		$("#addSaveUserBtnId").prop("disabled", true);
		$("#addSaveUserBtnId").css("cursor", "pointer");	
			var js_drd_AddUser = $.parseJSON(ajx_drd_AddUserData);
			//alert(ajx_drd_AddUserData);
			console.log("Return Add User form post value "+JSON.stringify(js_drd_AddUser));
			
			if(js_drd_AddUser['message'] != "") {
				if(js_drd_AddUser['message_type'] ==  "SUCCESS"){
					document.getElementById('addUser_Message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddUser['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/users"; }, 1000);					
					}else if(js_drd_AddUser['message_type'] ==  "WARNING"){
						document.getElementById('addUser_Message').innerHTML = "<div class='alert alert-warning fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddUser['message']+"</div>";						
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/users"; }, 1000);
					}else {
						document.getElementById('addUser_Message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddUser['message']+"</div>";
					}
				} else {
					$("#addSaveUserBtnId").prop("disabled", false);
					$("#addSaveUserBtnId").css("cursor", "pointer");
							
					$("#errUserTypeId").text(js_drd_AddUser['UserType']);
					$("#errEmailId").text(js_drd_AddUser['Email']);
					$("#errPasswordId").text(js_drd_AddUser['Password']);
					$("#errRepeatPasswordId").text(js_drd_AddUser['RepeatPassword']);
					$("#errFirstNameId").text(js_drd_AddUser['FirstName']);
					$("#errLastNameId").text(js_drd_AddUser['LastName']);
					$("#errOrgId").text(js_drd_AddUser['Organization']);
					$("#errUserExpId").text(js_drd_AddUser['UserExpires']);
			}
			btn_loading_dismissfun();
		},
		error: function(){
			btn_loading_dismissfun();
			$("#addSaveUserBtnId").prop("disabled", false);
			$("#addSaveUserBtnId").css("cursor", "pointer");
			document.getElementById('addUser_Message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
			
		});
}

</script>