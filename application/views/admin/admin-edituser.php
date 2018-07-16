<?php if($user_data['ID']){?>
<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Edit User</h1>
									</div>
								</div>
								<p></p>
							<div id="editUser_Message"></div>
								<form class="form-horizontal" action="" id="editUserFormId">
									<div class="form-group">
									<label class="col-md-2">Type of User</label>
									<div class="col-md-3">
										<select class="form-control" id="selEditUserTypeId" name="selEditUserTypeNam" tabindex="1" onblur="validateMandatory('selEditUserTypeId','errEditUserTypeId');OBvalidate_edituser_form();" >
										<option value="">Select User</option>
											<?php foreach($user_type as $user_type): 
											if($user_type['VALUE_NAME'] !="STUDENT"){?>
											<option value="<?php echo $user_type['ID'];?>"> <?php echo trim($user_type['VALUE_NAME']); ?> </option>
											<?php }
											endforeach;?>
									</select>
								<span style="color:red;" id="errEditUserTypeId"></span>
									</div>
									</div>
									<input type="hidden" value="<?php echo $user_data['ID'];?>" name="txtUserNam" />
									<div class="form-group">
										<label class="col-lg-2">Email Address</label>
										<div class="col-lg-6"><input type="text" placeholder="" class="form-control" value="<?php echo $user_data['EMAIL_ID'];?>" id="txtEditEmailId" name="txtEditEmailNam"  maxlength="60" tabindex="2" disabled />
									<span style="color:red;" id="errEmailId"></span></div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Password</label>
										<div class="col-lg-6">
										<div class="input-group">
										<input type="password" value="<?php echo $user_data['PASSWORD']; ?>" name="pwdEditPasswordNam" id="pwdEditPasswordId" class="form-control" onblur="validateEditPassword('pwdEditPasswordId','errEditPasswordId');
										OBvalidate_edituser_form();" tabindex="3" maxlength="8" />
										<span class="input-group-addon bg-blue" style="border:1px #000;" onclick =" toggle_password('pwdEditPasswordId');">
										<i class="fa fa-eye"></i>
										</span>	
										</div>
										<span id="showhide" class="hide" ></span>
										<span style="color:red;" id="errEditPasswordId"></span></div>
									</div>
									<!--<div class="form-group">
										<label class="col-lg-2">Repeat Password</label>
										<div class="col-lg-6"><input type="password"  value="123" maxlength="20" id="pwdEditRepeatPasswordId" name="pwdEditRepeatPasswordNam"  placeholder="" class="form-control" tabindex="4" onblur="validatePasswordMatch('pwdEditPasswordId','pwdEditRepeatPasswordId','errEditRepeatPasswordId');"/><span style="color:red;" id="errEditRepeatPasswordId"></span>
									</div>
									</div>-->
									<div class="form-group">
										<label class="col-lg-2">First Name</label>
										<div class="col-lg-2"><input type="text" id="txtEditFirstNameId" name="txtEditFirstNameNam" maxlength="60" placeholder="" class="form-control" value="<?php echo $user_data['FIRST_NAME'];?>" style="padding-right:0px;" tabindex="5" onblur="validateMandatory('txtEditFirstNameId','errEditFirstNameId');OBvalidate_edituser_form();" onkeypress="return OKValidateAlphaOnly(event);" />
									<span style="color:red;" id="errEditFirstNameId"></span></div>
										<label class="col-lg-1">&nbsp;</label>
										<label class="col-lg-1 " style="padding-left:0px;padding-right:0px;">Last Name</label>
										<div class="col-lg-2"><input type="text" id="txtEditLastNameId" name="txtEditLastNameNam" maxlength="60" placeholder="" class="form-control" value="<?php echo $user_data['LAST_NAME'];?>" tabindex="6" onblur="validateMandatory('txtEditLastNameId','errEditLastNameId');OBvalidate_edituser_form();" onkeypress="return OKValidateAlphaOnly(event);"/>
									<span style="color:red;" id="errEditLastNameId"></span></div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Organization (Optional)</label>
										<div class="col-lg-6"><input type="text" id="txtEditOrgId" name="txtEditOrgNam" placeholder="" maxlength="120" value="<?php echo $user_data['ORGANIZATION'];?>" class="form-control" tabindex="7"/></div>
								<span style="color:red;" id="errEditOrgId"></span></div>
									<div class="form-group">
										<label class="col-lg-2">User Expires</label>
										<div class="col-lg-3">
										<select class="form-control" id="selEditUserExpId" name="selEditUserExpNam" tabindex="8" onblur="validateMandatory('selEditUserExpId','errEditUserExpId');OBvalidate_edituser_form();" >
										<option value="" >Select User Expires</option>
											<?php foreach($user_expires as $user_expires): ?>
											<option value="<?php echo $user_expires['ID'];?>"> <?php echo trim($user_expires['VALUE_NAME']); ?> </option>
											<?php endforeach;?>
									</select>
								<span style="color:red;" id="errEditUserExpId"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-6">
										<button class="btn btn-lg btn-success pull-right" type="button" id="editSaveUserBtnId" tabindex="10" value="Save" onclick="drd_BtnEditUserSave();"><strong>Save</strong></button>
										<a class="btn btn-lg  btn-primary  pull-right" href="<?php echo site_url(); ?>/users" tabindex="9" ><strong>Cancel</strong></a>
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
<?php }  else { ?>
<br>
<br>
	<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90008') ?>'</div>
<?php } ?>
<script>

/* $('#editSaveUserBtnId').click(function(){
	window.location.href="<?php echo site_url(); ?>/users";
}); */

$('#selEditUserExpId').val("<?php echo $user_data['USER_EXPIRES'];?>");
$('#selEditUserTypeId').val("<?php echo $user_data['USER_TYPE'];?>");

function drd_BtnEditUserSave() {
	$("#editSaveUserBtnId").prop("disabled", true);
	$("#editSaveUserBtnId").css("cursor", "wait");
	btn_loading_fun();
	var js_drd_EditUserData = $("#editUserFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/edituserdetails",			
		data:js_drd_EditUserData,
		success: function(ajx_drd_EditUserData) {
		$("#editSaveUserBtnId").prop("disabled", true);
		$("#editSaveUserBtnId").css("cursor", "wait");	
			var js_drd_EditUser = $.parseJSON(ajx_drd_EditUserData);
			//alert(ajx_drd_EditUserData);
			console.log("Return Edit User form post value "+JSON.stringify(js_drd_EditUser));
			
			if(js_drd_EditUser['message'] != "") {
				if(js_drd_EditUser['message_type'] ==  "SUCCESS"){
					document.getElementById('editUser_Message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditUser['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/users"; }, 1000);					
					}else if(js_drd_EditUser['message_type'] ==  "WARNING"){
						document.getElementById('editUser_Message').innerHTML = "<div class='alert alert-warning fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditUser['message']+"</div>";						
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/users"; }, 1000);
					}else {
						document.getElementById('editUser_Message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditUser['message']+"</div>";
					}
				
			} else {
				$("#editSaveUserBtnId").prop("disabled", false);
				$("#editSaveUserBtnId").css("cursor", "pointer");
						
				$("#errEditUserTypeId").text(js_drd_EditUser['EditUserType']);
				$("#errEditEmailId").text(js_drd_EditUser['EditEmail']);
				$("#errEditPasswordId").text(js_drd_EditUser['EditPassword']);
				$("#errEditRepeatPasswordId").text(js_drd_EditUser['EditRepeatPassword']);
				$("#errEditFirstNameId").text(js_drd_EditUser['EditFirstName']);
				$("#errEditLastNameId").text(js_drd_EditUser['EditLastName']);
				$("#errEditOrgId").text(js_drd_EditUser['EditOrganization']);
				$("#errEditUserExpId").text(js_drd_EditUser['EditUserExpires']);
			}
			btn_loading_dismissfun();
		},
		error: function(){
			btn_loading_dismissfun();
			$("#editSaveUserBtnId").prop("disabled", false);
			$("#editSaveUserBtnId").css("cursor", "pointer");
			document.getElementById('editUser_Message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
			
		});
}
var js_drd_pwd_pattern =true;
function OBvalidate_edituser_form()
{
	var js_drd_usertype = document.getElementById('selEditUserTypeId').value!="";
	var js_drd_fname = document.getElementById('txtEditFirstNameId').value!="";
	var js_drd_lname = document.getElementById('txtEditLastNameId').value!="";
	var js_drd_userexp = document.getElementById('selEditUserExpId').value!="";
	console.log(document.getElementById("pwdEditPasswordId").value.length)
	var js_drd_pwd_patrn = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,30}$/;
	if(document.getElementById("pwdEditPasswordId").value.length >=8 )
	{
		js_drd_pwd_pattern=true;
	}
	else if(!js_drd_pwd_patrn.test(document.getElementById('pwdEditPasswordId').value))
	{
		js_drd_pwd_pattern=false;
	}
	else 
	{
		js_drd_pwd_pattern=true;
	}
	if(js_drd_usertype && js_drd_fname && js_drd_lname && js_drd_userexp && js_drd_pwd_pattern)
	{			
		document.getElementById("editSaveUserBtnId").disabled = false; 
	} 
	else 
	{
		document.getElementById("editSaveUserBtnId").disabled = true; 
	}
}

</script>