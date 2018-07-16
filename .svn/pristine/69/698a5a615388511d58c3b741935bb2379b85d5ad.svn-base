<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Add Student</h1>
									</div>
								</div>
								<p></p>
								<div id="message"></div>
								<form class="form-horizontal" id="formAddStudentId">
									<div class="form-group">
									<label class="col-md-3">Date</label>
									<div class="col-md-3">
									 <label for="checkbox3"><?php echo $create_date;?></label>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">First Name</label>
										<div class="col-lg-7">
										<input type="text" class="form-control" name="txtAddFirstNam" id="txtAddFirstNameId" onblur="validateMandatory('txtAddFirstNameId','errAddFirstNameId');OBvalidate_addstud_form();" tabindex ="1"onkeypress="return OKValidateAlphaOnly(event);" maxlength="60" />
										<span id="errAddFirstNameId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Last Name</label>
										<div class="col-lg-7">
										<input type="text" placeholder="" class="form-control" name="txtAddLastNam" id="txtAddLastNameId" onblur="validateMandatory('txtAddLastNameId','errAddLastNameId');OBvalidate_addstud_form();" onkeypress="return OKValidateAlphaOnly(event);" maxlength="60"  tabindex ="2"/>
										<span id="errAddLastNameId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Email Address</label>
										<div class="col-lg-7">
										<input type="text" class="form-control" name="txtAddEmailNam" id="txtAddEmailId" onblur="emailExists('txtAddEmailId','errAddEmailId');OBvalidate_addstud_form();" maxlength="60"  tabindex ="3"/>
										<span id="errAddEmailId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Password</label>
										<div class="col-lg-3">
										<div class="input-group">
										<input type="password" class="form-control" name="pwdAddPasswordNam" id="pwdAddPasswordId" onblur="validatePassword('pwdAddPasswordId','errAddPasswordId');OBvalidate_addstud_form();"  tabindex ="4" maxlength="8"/>
										<span class="input-group-addon bg-blue" onclick =" toggle_password('pwdAddPasswordId');">
										<i class="fa fa-eye"></i>
										</span>
										</div>
										<span id="showhide" class="hide" ></span>
										<span id="errAddPasswordId" style="color:red;"></span>
										</div>
									</div> 
									<div class="form-group">
										<label class="col-lg-3">Address</label>
										<div class="col-lg-7">
										<input type="text" class="form-control" name="txtAddAddressNam" maxlength="300" id="txtAddAddressId" onblur="validateMandatory('txtAddAddressId','errAddAddressId');OBvalidate_addstud_form();"  tabindex ="5" onkeypress="return restrictHTMLTagEntry(event)" />
										<span id="errAddAddressId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">City</label>
										<div class="col-lg-7">
										<input type="text" class="form-control"
										name="txtAddCityNam" id="txtAddCityId" onblur=" validateMandatory('txtAddCityId','errAddCityId');OBvalidate_addstud_form();" onkeypress="return restrictHTMLTagEntry(event)" maxlength="80"  tabindex ="6"/>
										<span id="errAddCityId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">State</label>
										<div class="col-lg-3">
										<select class="form-control" name="selAddStateNam" id="selAddStateId" onblur=" validateMandatory('selAddStateId','errAddStateId')" tabindex ="7" onchange="validateMandatory('selAddStateId','errAddStateId');OBvalidate_addstud_form();">
										<option value="" >Select State </option><?php foreach($state as $state): ?>              <option value="<?php echo $state['ID'];?>"> <?php echo trim($state['STATE_NAME']); ?> </option>
										<?php endforeach;?>
										</select>
										<span id="errAddStateId" style="color:red;"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Zip Code</label>
										<div class="col-lg-3">
										<input type="text" class="form-control" name="txtAddZipCodeNam" id="txtAddZipCodeId" onblur="validatePostalcode('txtAddZipCodeId','errAddZipCodeId');OBvalidate_addstud_form();" tabindex ="8" onkeypress="return numbersonlyEntry(event)" maxlength="5" />
										<span id="errAddZipCodeId" style="color:red;"></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3">Country</label>
										<div class="col-lg-3">
										 <input type="hidden"  id="selCountryId" value="1" maxlength="60" />
										<input type="text" class="form-control" disabled id=""  value="USA"  tabindex ="9"/>	
										<span id="errAddCountryId" style="color:red;"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Practice Name</label>
										<div class="col-lg-7">
										<input type="text" class="form-control" name="txtAddPracticeNam" id="txtAddPracticeNameId" onblur="validateMandatory('txtAddPracticeNameId','errAddPracticeNameId');OBvalidate_addstud_form();" onkeypress="return OKValidateAlphaNumeric(event);" maxlength="80"  tabindex ="10" />
										<span id="errAddPracticeNameId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Mobile Number</label>
										<div class="col-lg-3">
										<input type="text" class="form-control" name="txtAddMobileNumNam" id="txtAddMobileNumId" maxlength="10" onblur="validateMobile('txtAddMobileNumId','errAddMobileNumId');OBvalidate_addstud_form();" onkeypress="return numbersonlyEntry(event)"  tabindex ="11"/>
										<span id="errAddMobileNumId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Date of Birth</label>
										<div class="col-lg-3">
										<input type="text" readonly class="form-control" name="txtAddDobNam" id="txtAddDobId" onblur="ValidatedateMandatory('txtAddDobId','errAddDobId');OBvalidate_addstud_form();"onchange="ValidatedateMandatory('txtAddDobId','errAddDobId');"  tabindex ="12" />
										<span id="errAddDobId" style="color:red;"></span>
										</div>
									</div>
											<div class="form-group">
										<label class="col-lg-3">License(s)</label>
									<div class="col-lg-7">	
										<div class="increaseno1">
										<input type="hidden" id ="common_Id1" value="" />			
										<div class="row" style="margin-bottom:15px;">
										<div class="col-lg-5">
										<select class="form-control selLicenseStateNam" name="selLicenseStateNam" id="selAddLicenseId1" onblur="validateMandatory('selAddLicenseId1','errAddLicenseId1');OBvalidate_addstud_form();"  tabindex ="13" onchange="OBvalidate_addstud_form();">
										<option value="" >State *</option>
										<?php foreach($stateName as $stateNameArray): ?>
										<option value="<?php echo $stateNameArray['ID'];?>"> <?php echo trim($stateNameArray['STATE_NAME']); ?> </option>
										<?php endforeach;?>
										</select>
										<span id="errAddLicenseId1" style="color:red;"></span>
									</div>
									
									<div class="col-lg-5">
									<input type="text" placeholder="" class="form-control " name="txtAddLicenseNam" id="txtAddLicenseId1" onblur="validateMandatory('txtAddLicenseId1','errLicenseId1');OBvalidate_addstud_form();" onkeypress="return numbersonlyEntry(event);" maxlength="10" tabindex ="14" />
									<span id="errLicenseId1" style="color:red;"></span>
									</div>
									<div class="col-lg-2" style="padding-top:10px;padding-right:0px;padding-left:0px;"><input type="hidden" id ="add_moreId1" value="1" /><span class="addmorelink"><a  tabindex ="15" onclick="addmorefunction(1);OBvalidate_addstud_form();" >Add</a> <span> | </span> </span><a  tabindex ="16" onclick="deletefun(1);OBvalidate_addstud_form();" >Delete</a></div>
									</div>
									</div>

									<div id="stateAppendId"></div>
									</div>	
									</div>
									
									<div class="form-group">
										<label class="col-lg-3">Certified Information Accurate</label>
										<div class="col-lg-3">
										<div class="checkbox checkbox-success">
											<input type="checkbox" class="i-checks" style="margin-left:0px;" name="chkAddInfoNam"  tabindex ="17" id="chkAddInfoId" value="Y" onblur="validateTermscheck('chkAddInfoId','errAddInfoId')" onclick="OBvalidate_addstud_form();"/>
											<label for="checkbox3">Yes</label>
											</div>
											<span id="errAddInfoId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
									<label class="col-md-3">IP Address</label>
									<div class="col-md-3">
									 <label for="checkbox3"><?php echo $ip_address; ?></label>
                                      <input type="hidden" readonly class="form-control" name="txtAddIpAddrNam" id="txtAddIpAddrId" value="<?php echo $ip_address; ?>" />
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3"></label>
										<div class="col-lg-7">
										<button class="btn btn-lg btn-success pull-right" type="button" id="addSaveStdBtnId" disabled tabindex ="18" ><strong>Save</strong></button>
										<a class="btn btn-lg  btn-primary  pull-right" href="<?php echo site_url(); ?>/students"  tabindex ="19"><strong>Cancel</strong></a>
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
var addmoretextCount = 1;
	$(document).ready(function(){
		$('.i-checks').iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
		}); 
		$("#txtAddDobId" ).datepicker({		 
			changeYear  : true,
			changeMonth : true,
			clearText: "Clear",
			dateFormat: 'M dd, yy',
			yearRange: "-80:+0"
			//maxDate: new Date()
		});	
			
	});
	
OBvalidate_addstud_form();

var date_valid = false; 
	/* Button Disable  Function */
function OBvalidate_addstud_form(){
	console.log(js_drd_chk);
	console.log("clicked");
	var js_drd_email_patrn = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var js_drd_mobile_patrn = /^[1-9][0-9]{9,14}$/;
	var js_drd_pwd_patrn = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,30}$/;
	var js_drd_zip_patrn = /^[0-9]{5}$/;
	var js_drd_fname = document.getElementById('txtAddFirstNameId').value!="";
	var js_drd_lname = document.getElementById('txtAddLastNameId').value!="";
	var js_drd_pratice_name = document.getElementById('txtAddPracticeNameId').value!="";
	var js_drd_street_address = document.getElementById('txtAddAddressId').value!="";
	var js_drd_city = document.getElementById('txtAddCityId').value!="";
	var js_drd_state = document.getElementById('selAddStateId').value!="";
	var js_drd_zip_code = document.getElementById('txtAddZipCodeId').value!="";
	var js_drd_zip_pattern = js_drd_zip_patrn.test(document.getElementById('txtAddZipCodeId').value);
	var js_drd_country = document.getElementById('selCountryId').value!="";
	var js_drd_dob = document.getElementById('txtAddDobId').value!="";
	var js_drd_email_id = document.getElementById('txtAddEmailId').value!="";
	var js_drd_password = document.getElementById('pwdAddPasswordId').value!="";
	var js_drd_mobile_no= document.getElementById('txtAddMobileNumId').value!="";
	var js_drd_pattern_email_Id = js_drd_email_patrn.test(document.getElementById('txtAddEmailId').value);
	var js_drd_pattern_mobile = js_drd_mobile_patrn.test(document.getElementById('txtAddMobileNumId').value);
	var js_drd_pattern_pwd = js_drd_pwd_patrn.test(document.getElementById('pwdAddPasswordId').value);
	
	var data = 0;
	var license_state_id_data = document.getElementsByClassName("selLicenseStateNam"); 
	console.log(addmoretextCount);
	var state_array= [];
	for (var i = 1; i <= addmoretextCount; i++)
	{
		if(document.getElementById('common_Id'+i) != null) {
			console.log("Id Given");
			var license = document.getElementById('txtAddLicenseId'+i).value!="";
			var state_license = document.getElementById('selAddLicenseId'+i);
			var state= state_license.options[state_license.selectedIndex].value;
			console.log("state"+state.length);
			if((document.getElementById('txtAddLicenseId'+i).value == "") && (state.length == 0) )
			{
				console.log("Both or Empty");
			}
			else if(license && (state.length != 0))
			{
				state_array.push(1);
				console.log("Both or Valid");
			}
			else if(license)
			{
				if(state.length != 0)
				{
					console.log("Both or Not Empty inside inside license");
				}
				else
				{
					console.log("State_license Empty");
					data=data+1;
					
				}
				
			}
			else if(state.length != 0)
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
				if(data==0)
				{
					console.log("Both Value EMpty/Not Empty");
				}
				else
				{
					console.log("One or more feilds required");
					data=data+1;
				}
				
			}
		}
		else
		{
			console.log("Id Value Missing");
			
		}
	}		
	
	var getDate = document.getElementById('txtAddDobId').value;
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
							
							
	console.log("js_drd_chk "+js_drd_chk);
	console.log("license_array_value "+data);
	console.log("state_array "+state_array.length);
	
	if((js_drd_fname && js_drd_lname && js_drd_pratice_name && js_drd_street_address && js_drd_city && js_drd_state && js_drd_zip_code  &&js_drd_zip_pattern  && js_drd_country && js_drd_dob && js_drd_email_id && js_drd_password && js_drd_mobile_no && js_drd_pattern_email_Id && js_drd_pattern_mobile && js_drd_pattern_pwd && date_valid) && (js_drd_chk == 'Y') && (data == 0) && (state_array.length != 0) )
	{
		console.log('inside  if');	 
		$("#addSaveStdBtnId").prop("disabled", false);
	}
	else
	{	
		console.log('inside  else');		
		$("#addSaveStdBtnId").prop("disabled", true);	
	}	
}


$('#addSaveStdBtnId').click(function() {		
		$("#addSaveStdBtnId").prop("disabled", true);
		$("#addSaveStdBtnId").css("cursor", "wait");	
		btn_loading_fun();
		
		var license_state_array = [];	
		var license_state_id = document.getElementsByClassName("selLicenseStateNam");  
		console.log(addmoretextCount);
		
		for (var i = 1; i <= addmoretextCount; i++){
			if(document.getElementById('common_Id'+i) != null) {
				license_state_array.push({license_state:document.getElementById('selAddLicenseId'+i).value,
				license_no:document.getElementById('txtAddLicenseId'+i).value}); 
			}
		}
		if(license_state_array.length !=0)
		{
		console.log('get Data'+license_state_array);	
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/addsignupdata",
			data:{
				'txtFirstNam':$('#txtAddFirstNameId').val(),
				'txtLastNam':$('#txtAddLastNameId').val(),
				'txtEmailNam':$('#txtAddEmailId').val(),
				'txtPwdNam':$('#pwdAddPasswordId').val(),
				'txtCellNumNam':$('#txtAddMobileNumId').val(),
				'txtDobNam':$('#txtAddDobId').val(),
				'txtPracticeNam':$('#txtAddPracticeNameId').val(),
				'selCountryNam':$('#selCountryId').val(),
				'selStateNam':$('#selAddStateId').val(),
				'txtCityNam':$('#txtAddCityId').val(),
				'txtStAddrNam':$('#txtAddAddressId').val(),
				'txtZipNam':$('#txtAddZipCodeId').val(),
				'chkAgreeNam':$('#chkAddInfoId').val(),
				'txtIpAddrNam':$('#txtAddIpAddrId').val(),
				'ajx_dl_licenseData': license_state_array,
			},
			success: function(ajx_drd_AddStudentResult) {
				var js_drd_AddStudent = $.parseJSON(ajx_drd_AddStudentResult);
				if (js_drd_AddStudent['message'] != "") {
					console.log("Return  Message "+js_drd_AddStudent['message']);
					if(js_drd_AddStudent['message_type'] ==  "SUCCESS"){
					document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddStudent['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/students"; }, 1000);					
					}else if(js_drd_AddStudent['message_type'] ==  "WARNING"){
						document.getElementById('message').innerHTML = "<div class='alert alert-warning fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddStudent['message']+"</div>";						
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/students"; }, 1000);
					}else {
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddStudent['message']+"</div>";
					}
					$("#addSaveStdBtnId").prop("disabled", false);
					$("#addSaveStdBtnId").css("cursor", "pointer");
					$('html, body').animate({ scrollTop: 0 }, 'fast');
				} else {  
					$("#addSaveStdBtnId").prop("disabled", false);
					$("#addSaveStdBtnId").css("cursor", "pointer");
					$("#errAddFirstNameId").text(js_drd_AddStudent['AddFirstName']);
					$("#errAddLastNameId").text(js_drd_AddStudent['AddLastName']);
					$("#errAddEmailId").text(js_drd_AddStudent['AddEmail']);
					$("#errAddPasswordId").text(js_drd_AddStudent['AddPassword']);
					$("#errAddAddressId").text(js_drd_AddStudent['AddAddress']);
					$("#errAddCityId").text(js_drd_AddStudent['AddCity']);
					$("#errAddStateId").text(js_drd_AddStudent['AddState']);
					$("#errAddZipCodeId").text(js_drd_AddStudent['AddZipcode']);
					$("#errAddCountryId").text(js_drd_AddStudent['AddCountry']);
					$("#errAddPracticeNameId").text(js_drd_AddStudent['AddPracticeName']);
					$("#errAddMobileNumId").text(js_drd_AddStudent['AddMobileNum']);
					$("#errAddDobId").text(js_drd_AddStudent['AddDob']);
					$("#errLicenseId").text(js_drd_AddStudent['AddLicense']);
					$("#errAddInfoId").text(js_drd_AddStudent['AddInfo']);
				}
				btn_loading_dismissfun();

			},
			error: function() {
				btn_loading_dismissfun();
				$("#addSaveStdBtnId").prop("disabled", false);
				$("#addSaveStdBtnId").css("cursor", "pointer");
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
				//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
			}
		});
		
		}
		else
		{
			$("#addSaveStdBtnId").prop("disabled", false);
		}
				
	});
	
        
     var js_drd_chk = 'N';
    $('input#chkAddInfoId').on('ifChecked', function () {
      js_drd_chk = 'Y';
      $('#errAddInfoId').text('');
      OBvalidate_addstud_form();

    });
    $('input#chkAddInfoId').on('ifUnchecked', function () {

     js_drd_chk = 'N';
	  OBvalidate_addstud_form();
     $('#errAddInfoId').text(errMsg["80547"]);
     $('.enable_button').hide();	
     $('.disable_button').show();
    });
        
        	/*------------------- Function For Email Already Exits ------------------*/
    var js_drd_valid_email = 'NO';
    function emailExists(valueId,errId) {
            var js_drd_emailid=document.getElementById(valueId).value;
			var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
           // var at = js_drd_emailid.indexOf("@");
            //var dot = js_drd_emailid.lastIndexOf(".");
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
	

function deletefun(delete_id)
{
	var dl_drd_addmore_id = $('#add_moreId'+delete_id).val();
	if(!dl_drd_addmore_id)
	{
		$( "div" ).remove('.increaseno'+delete_id);
	}
	else
	{
		var license_state_id_data = document.getElementsByClassName("selLicenseStateNam"); 
		console.log(license_state_id_data.length);
		
		if(license_state_id_data.length  ==  1)
		{
			$('#errAddLicenseId'+delete_id).text(errMsg["80547"]);
			$('#errLicenseId'+delete_id).text(errMsg["80547"]);
		}
		else
		{
			$('#selAddLicenseId'+delete_id).val('');
			$('#txtAddLicenseId'+delete_id).val('');	
			$('#errAddLicenseId'+delete_id).text('');
			$('#errLicenseId'+delete_id).text('');			
		}
			//$('#selAddLicenseId'+delete_id).val('');
			//$('#txtAddLicenseId'+delete_id).val('');	
			//$('#errAddLicenseId'+delete_id).text("*Required");
			//$('#errLicenseId'+delete_id).text("*Required");	
	}
}

function addmorefunction(count)
{
	console.log(count);
	var js_drd_license_no = $('#txtAddLicenseId'+count).val();
	console.log("js_drd_license_no "+js_drd_license_no);
	var js_drd_state_id = $('#selAddLicenseId'+count).val();	
	var addmorecount = count+1;
	if(js_drd_license_no && js_drd_state_id !=""){	
		$('#errLicenseId'+count).text('');	
		$('#errAddLicenseId'+count).text('');
		var row = '<div class="increaseno'+addmorecount+'"><div class="row" style="margin-bottom:15px;"><div class="col-lg-5"><input type="hidden" id ="common_Id'+addmorecount+'" value="" /><input type="hidden" id ="addlicensecommon_Id'+addmorecount+'" value="" /><select class="form-control chosen-select selLicenseStateNam" tabindex="13" name="selLicenseStateNam" id="selAddLicenseId'+addmorecount+'" onblur="validateMandatory('+"'selAddLicenseId"+addmorecount+"'"+','+"'errAddLicenseId"+addmorecount+"'"+');OBvalidate_addstud_form();" onchange="OBvalidate_addstud_form();"><option value="" >State *</option><?php foreach($stateName as $stateNameArray): ?><option value="<?php echo $stateNameArray['ID'];?>"><?php echo trim($stateNameArray['STATE_NAME']); ?> </option><?php endforeach;?></select><span style="color:red;" id="errAddLicenseId'+addmorecount+'"></span></div><div class="col-lg-5"><input type="text" class="form-control" maxlength="10" tabindex="14" placeholder="License# *" name="txtAddLicenseNam" id="txtAddLicenseId'+addmorecount+'" onblur="validateMandatory('+"'txtAddLicenseId"+addmorecount+"'"+','+"'errLicenseId"+addmorecount+"'"+');OBvalidate_addstud_form();" onkeypress="return numbersonlyEntry(event);" /><span style="color:red; text-align:left !important;" id="errLicenseId'+addmorecount+'"></span></div><div class="col-lg-2 Editmorelink" style="padding-top:10px;padding-right:0px;padding-left:0px;"><input type="hidden" id ="add_moreId'+addmorecount+'" value="1" /><span class="addmorelink"><a  tabindex ="15" onclick="addmorefunction('+addmorecount+');OBvalidate_addstud_form();" >Add</a> <span> | </span> </span><a  tabindex ="16" onclick="deletefun('+addmorecount+');OBvalidate_addstud_form();" >Delete</a></div></div></div>'; 
		$("#add_moreId"+count).val('');
		$("span").remove('.addmorelink');
		$('#stateAppendId').append(row);	
		addmoretextCount = addmoretextCount+1;
		
	}else{
		if(js_drd_license_no ==""){
			$('#errLicenseId'+count).text(errMsg["80547"]);
		} else{
			$('#errLicenseId'+count).text('');
		}
		if(js_drd_state_id ==""){			
			$('#errAddLicenseId'+count).text(errMsg["80547"]);
		}else{
			$('#errAddLicenseId'+count).text('');
		}
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