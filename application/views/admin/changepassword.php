<style>
	
.eye_btn {
	border:none;
	border-bottom: 1px solid #000 !important;
}
.btn-primary-user{
	background-color:#fff !important;
	color:#700745 !important;
	border: 1px solid #700745 !important;
}
.btn-primary-user:hover{
	background-color:#700745 !important;
	color:#fff !important;
}
.btn-success-user{
	background-color:#fff !important;
	color:#3A67A2 !important;
	border: 1px solid #3A67A2 !important;
}
.btn-success-user:hover{
	background-color:#3A67A2 !important;
	color:#fff !important;
}
.btn-primary{
	background-color:#9D1313 !important;
	color:#fff !important;	
}
.btn-primary:hover{
	background-color:#fff !important;
	color:#9D1313 !important;
	border: 1px solid #9D1313 !important;
}
.btn-primary-news{
	background-color:#700745 !important;
	color:#fff !important;	
}
.btn-primary-news:hover{
	background-color:#fff !important;
	color:#700745 !important;
	border: 1px solid #700745 !important;
}
.btn-success{
	background-color:#3A67A2 !important;
	color:#fff !important;
}
.btn-success:hover{
	background-color:#fff !important;
	color:#3A67A2 !important;
	border: 1px solid #3A67A2 !important;
	
}
.btn{
	margin-right:10px;
}
.num-font {
    font-family: Arial;
}
</style>
			  
              <div class="modal fade" id="changePasswordId" style="z-index:100000; padding-top:80px;">
                <div class="modal-dialog modal-sm">
				<form id="changePassword_form">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close removemsg" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><b>Change Password</b></h4>
                    </div>
                    <div class="modal-body">
					<div id="change_message"></div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
								  <label class="horizontal-group">Current Password</label>
                            <div class="input-group">
								  <input type="password" class="form-control" maxlength="8" id="txtCurrentPwdId" name="txtCurrentPwd" placeholder="Enter Your Current Password" tabindex="1" onblur="validateMandatory('txtCurrentPwdId','errCurrentPwdId');change_pwd_validate_forms();" 
								  style="border: 0 !important;border-bottom: 1px solid #5E5E5E !important;" />
							  <span class="input-group-addon eye_btn" onclick =" toggle_password('txtCurrentPwdId');">
								<i class="fa fa-eye"></i>
								</span>									
							</div>
						<span id="showhide" class="hide" ></span>
							  <span style="color:red;" id="errCurrentPwdId"></span>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
								  <label class="horizontal-group">New Password</label>
                            <div class="input-group">
								  <input type="password" class="form-control" maxlength="8" id="txtNewPwdId" name="txtNewPwd" placeholder="Enter Your New Password" onblur="validatePassword('txtNewPwdId','errNewPwdId');change_pwd_validate_forms();validatePasswordMatch('txtNewPwdId','txtConfirmPwdId','errConfirmPwdId');" tabindex="2" onchange="change_pwd_validate_forms();"  style="border: 0 !important;border-bottom: 1px solid #5E5E5E !important;" />
								<span class="input-group-addon eye_btn" onclick =" toggle_password('txtNewPwdId');">
								<i class="fa fa-eye"></i>
								</span>									
							</div>
						<span id="showhide" class="hide" ></span>
							  <span style="color:red;" id="errNewPwdId"></span>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
								<label class="horizontal-group">Confirm Password</label>
                          <div class="input-group">
								<input type="password" class="form-control" maxlength="8" id="txtConfirmPwdId" name="txtConfirmPwd" placeholder="Enter Your Confirm Password" onblur="validatePasswordMatch('txtNewPwdId','txtConfirmPwdId','errConfirmPwdId');change_pwd_validate_forms();" tabindex="3" onchange="change_pwd_validate_forms();"  style="border: 0 !important;border-bottom: 1px solid #5E5E5E !important;"  />
							  <span class="input-group-addon eye_btn" onclick =" toggle_password('txtConfirmPwdId');">
								<i class="fa fa-eye"></i>
								</span>									
						</div>
						<span id="showhide" class="hide" ></span>
							<span style="color:red;" id="errConfirmPwdId"></span>
                          </div>
                        </div>
                      </div>
                    </div>
					<?php 
					if($user_type == 'STUDENT')
					{ ?>
					<div class="modal-footer">
                      <button type="button" class="btn btn-outline btn-rounded btn-primary-user  removemsg" style="" data-dismiss="modal"  tabindex="5">Cancel</button>
                      <button type="button" class="btn btn-outline btn-rounded btn-success-user" style="" id="btnCPSubmitId" tabindex="4" onclick="drd_BtnCPSubmit();" disabled >Save</button>
                    </div>
					<?php 
					}
					else
					{ ?>
					<div class="modal-footer">
                      <button type="button" class="btn btn-lg btn-primary removemsg" style="" data-dismiss="modal"  tabindex="5">Cancel</button>
                      <button type="button" class="btn btn-lg btn-success " style="" id="btnCPSubmitId" tabindex="4" onclick="drd_BtnCPSubmit();" disabled >Save</button>
                    </div>	
					<?php } ?>
                    
                  </div>
				</form>	
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div> 
              <!-- /.modal -->
              <!-- Modal Ends here -->
			  
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>

$('.removemsg').click(function() {
	$('#errCurrentPwdId').text('');
	$('#errNewPwdId').text('');
	$('#errConfirmPwdId').text('');
	$('#txtCurrentPwdId').val('');
	$('#txtNewPwdId').val('');
	$('#txtConfirmPwdId').val('');
	$('div').remove('#change_message');
});

function drd_BtnCPSubmit() {
	$("#btnCPSubmitId").prop("disabled", true);
	$("#btnCPSubmitId").css("cursor", "wait");
	var js_drd_CPwdData = $("#changePassword_form").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/changepassword",			
		data:js_drd_CPwdData,
		success: function(ajx_drd_CPwdDataResult) {	

			$("#btnCPSubmitId").prop("disabled", false);
			$("#btnCPSubmitId").css("cursor", "pointer");
				var js_drd_CPwdUser = $.parseJSON(ajx_drd_CPwdDataResult);
				//alert(js_drd_CPwdUser);
				console.log("Return Reset form post value "+JSON.stringify(js_drd_CPwdUser));
				
				if(js_drd_CPwdUser['message'] != "") {
					if(js_drd_CPwdUser['message_type'] ==  "SUCCESS"){
						document.getElementById('change_message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_CPwdUser['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/logout"; }, 3000);					
					}else if(js_drd_CPwdUser['message_type'] ==  "WARNING"){
						document.getElementById('change_message').innerHTML = "<div class='alert alert-warning fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_CPwdUser['message']+"</div>";
					}else {
						document.getElementById('change_message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_CPwdUser['message']+"</div>";
					}				
				} else {
					$("#btnCPSubmitId").prop("disabled", false);
					$("#btnCPSubmitId").css("cursor", "pointer");					
							
					$("#errCurrentPwdId").text(js_drd_CPwdUser['CurrentPassword']);
					$("#errNewPwdId").text(js_drd_CPwdUser['NewPassword']);
					$("#errConfirmPwdId").text(js_drd_CPwdUser['ConfirmPassword']);
				}
			},
			error: function() {
			$("#btnCPSubmitId").prop("disabled", false);
			$("#btnCPSubmitId").css("cursor", "pointer");
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
		}
		});
}
var js_drd_pass_match = "NO";
function change_pwd_validate_forms(){
	var js_drd_currentpassword  = document.getElementById("txtCurrentPwdId").value!="";
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
	console.log("Password Match "+js_drd_pass_match);
	var pass_pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,30}$/;
	if(js_drd_newpassword && js_drd_currentpassword && js_drd_confirmpassword && pass_pattern.test(document.getElementById('txtNewPwdId').value) && (js_drd_pass_match == "YES"))
	{			
		document.getElementById("btnCPSubmitId").disabled = false; 
	} 
	else 
	{
		document.getElementById("btnCPSubmitId").disabled = true; 
	}
}
</script>