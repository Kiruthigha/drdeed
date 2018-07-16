<style>

span{
	font-family: Arial !important;
}
 .col-lg-3, .col-lg-9{
	font-family: Arial !important;
	font-weight: 500;
	font-size: 14px;
	line-height: 1.9857143;
}
p{
	margin: 0 0 0px;
}
.tabs-container li{
	min-width:250px !important;
	text-align:center;
}

hr{
	border-top: 1px solid #000;
}
.labeltext {
  font-family: Arial;
  font-weight: 700;
  font-size: 5em;
  font-variant: normal;
  color:#000;
}
label{
	padding-top:5px;
	font-family: Arial;
	font-weight: 300;
}
input[type="text"]:disabled {
    background: #dddddd !important;
}
.badge {
	background-color:#700745;
	color:#fff;
}
td .badge{
	font-size:8px;
}

.addlink{
	padding-left:16px;
}

	@media (max-width: 380px) {
		.tabs-container li {
			min-width: auto !important;
		}
	}
</style>
<?php if($profile['USER_ID']){?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12" style="word-wrap: break-word;">
										<h1 class="labeltext"><?php echo $profile['FIRST_NAME'];?>&nbsp;<?php  echo $profile['LAST_NAME']; ?></h1>
									</div>
									<p>&nbsp;</p>
								</div>
								<p></p>
								<div class="tabs-container">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#tab-1"> Account Details</a></li>
										<li width="100%" class=""><a data-toggle="tab" href="#tab-2">CE Details (<?php echo $completed_count; ?>)</a></li>
										<li width="100%" class=""><a data-toggle="tab" href="#tab-3">User Stats</a></li>
									</ul>
									<div class="tab-content">
										<div id="tab-1" class="tab-pane active">
											<div class="panel-body">
												<div id="message"></div>
												<form class="form-horizontal" id="formEditStudentId">
													<div class="form-group">
													<label class="col-md-3">Joined On</label>
													<div class="col-md-3">
													 <label for="checkbox3"><?php echo $crdate; ?></label>
													</div>
													</div>
													<input type="hidden" class="form-control" name="" id="txtEdituserid" value="<?php echo $profile['USER_ID']; ?>"  />
													<div class="form-group">
														<label class="col-lg-3">Email Address</label>
														<div class="col-lg-7">
														<input type="text" class="form-control" name="" id="txtEditEmailId" value="<?php echo $profile['EMAIL_ID']; ?>" disabled  />
														
														<span id="errEditEmailId" style="color:red;"></span>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">Password</label>
														<div class="col-lg-7">
														<div class="input-group">
														<input type="password" value="<?php echo $profile['PASSWORD']; ?>" name="pwdEditPasswordNam" id="pwdEditPasswordId" class="form-control" onblur="validateEditPassword('pwdEditPasswordId','errEditPasswordId');
														OB_EmptyValidation();" maxlength="8" />
														<span class="input-group-addon bg-blue" style="border:1px #000;" onclick =" toggle_password('pwdEditPasswordId');">
														<i class="fa fa-eye"></i>
														</span>	
														</div>
														<span id="showhide" class="hide" ></span>
														<span id="errEditPasswordId" style="color:red;"></span>
														</div>
													</div>
													
													<!--<div class="form-group">
														<label class="col-lg-3">New Password</label>
														<div class="col-lg-3">
														<div class="input-group">
														<input maxlength="8" type="password" name="newpwdEditPasswordNam" id="newpwdEditPasswordId" class="form-control" onblur="validatePassword('newpwdEditPasswordId','errEditNewPasswordId')" /><span class="input-group-addon bg-blue" style="border:1px #000;" onclick =" toggle_password('newpwdEditPasswordId');">
														<i class="fa fa-eye"></i>
														</span>	
														</div>
														<span id="showhide" class="hide" ></span>
														<span id="errEditNewPasswordId" style="color:red;"></span>
														</div>
													</div>-->
													
													<div class="form-group">
														<label class="col-lg-3">Address</label>
														<div class="col-lg-7">
														<input type="text" class="form-control" name="txtEditAddressNam" maxlength="300" id="txtEditAddressId" value="<?php echo $profile['POSTAL_ADDRESS']; ?>" onblur="validateMandatory('txtEditAddressId','errEditAddressId');
														OB_EmptyValidation();" onkeypress="return restrictHTMLTagEntry(event)" />
														<span id="errEditAddressId" style="color:red;"></span>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">City</label>
														<div class="col-lg-7">
														<input type="text" class="form-control" name="txtEditCityNam" id="txtEditCityId" value="<?php echo $profile['CITY']; ?>" maxlength="80" onblur=" validateMandatory('txtEditCityId','errEditCityId');OB_EmptyValidation();" onkeypress="return restrictHTMLTagEntry(event)" />
														<span id="errEditCityId" style="color:red;"></span>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">State</label>
														<div class="col-lg-3">
														<select class="form-control" name="selEditStateNam" id="selEditStateId" onblur=" validateMandatory('selEditStateId','errEditStateId');OB_EmptyValidation();" >
															<option value="" >State *</option>
																<?php foreach($state as $state): ?>
															<option value="<?php echo $state['ID'];?>"> <?php echo trim($state['STATE_NAME']); ?> </option>
															<?php endforeach;?>
														</select>
														<span id="errEditStateId" style="color:red;"></span>
													</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">Zip Code</label>
														<div class="col-lg-3">
														<input type="text" class="form-control" name="txtEditZipCodeNam" id="txtEditZipCodeId" value="<?php echo $profile['POSTAL_CODE']; ?>" maxlength="5" onblur=" validatePostalcode('txtEditZipCodeId','errEditZipCodeId');OB_EmptyValidation();" onkeypress="return numbersonlyEntry(event)" />
														<span id="errEditZipCodeId" style="color:red;"></span>
														</div>
													</div>

													<div class="form-group">
														<label class="col-lg-3">Country</label>
														<div class="col-lg-3">
														<input type="hidden"  id="selEditCountryId" value="1" maxlength="60" />		  
														 <input type="text" class="form-control" disabled 
														  id=""  value="USA" />
														  
														<!--<select class="form-control" name="selEditCountryNam" id="selEditCountryId" onblur=" validateMandatory('selEditCountryId','errEditCountryId');OB_EmptyValidation();" >
															<option value="">Country *</option>
															<?php foreach($country as $country): ?>
														<option value="<?php echo $country['ID'];?>"> <?php echo trim($country['COUNTRY_NAME']); ?> </option>
														<?php endforeach;?>
														</select>-->
														<span id="errEditCountryId" style="color:red;"></span>
													</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">Practice Name</label>
														<div class="col-lg-7">
														<input type="text" class="form-control" name="txtEditPracticeNam" id="txtEditPracticeNameId" value="<?php echo $profile['PRACTICE_NAME']; ?>"  maxlength="80" onblur=" validateMandatory('txtEditPracticeNameId','errEditPracticeNameId')" onkeypress="return OKValidateAlphaNumeric(event);" />
														<span id="errEditPracticeNameId" style="color:red;"></span>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">Mobile Number</label>
														<div class="col-lg-3">
														<input type="text" class="form-control" name="txtEditMobileNumNam" id="txtEditMobileNumId" value="<?php echo $profile['MOBILE_NUM']; ?>" maxlength="10" onblur=" validateMobile('txtEditMobileNumId','errEditMobileNumId');OB_EmptyValidation();" onkeypress="return numbersonlyEntry(event)" />
														<span id="errEditMobileNumId" style="color:red;"></span>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">Date of Birth</label>
														<div class="col-lg-3">
														<input type="text" readonly class="form-control crtDatePicker" name="txtEditDobNam" id="txtEditDobId" value="<?php echo $dob; ?>" disabled onblur=" validateMandatory('txtEditDobId','errEditDobId');OB_EmptyValidation();" />
														<span id="errEditDobId" style="color:red;"></span>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">License(s)</label>
														<div class="col-lg-7">
														
															<?php
															$i=1;
															$array=[];
															$licensescount = count($userlicenses);
															foreach($userlicenses as $userlicenses):
															array_push($array,$userlicenses['STATE_ID']);
															?>
															<div class="increaseno<?php echo $i;?>">
															<div class="row"  style="margin-bottom:15px;">
															<input type="hidden" id ="db_deleteId<?php echo $i; ?>" value="<?php echo $userlicenses['ID']; ?>" />
															<input type="hidden" id ="db_editId<?php echo $i; ?>" value="<?php echo $userlicenses['ID']; ?>" />
															<input type="hidden" id ="common_Id<?php echo $i; ?>" value="" />
															<div class="col-lg-5">
																<select class="form-control selLicenseStateNam" name="selEditLicenseNam" id="selEditLicenseId<?php echo $i;?>" onblur="validateMandatory('selEditLicenseId<?php echo $i;?>','errEditLicenseStateId<?php echo $i;?>');OB_EmptyValidation();" >
																	<?php foreach($stateName as $stateNameArray): ?>
																	<option value="<?php echo $stateNameArray['ID'];?>"> <?php echo trim($stateNameArray['STATE_NAME']); ?> </option>
																	<?php endforeach;?>
																</select>
																<span style="color:red;" id="errEditLicenseStateId<?php echo $i;?>"></span>
															</div>
															<div class="col-lg-5">
																<input type="text" name="txtEditLicenseNam[]" id="txtEditLicenseId<?php echo $i;?>" value="<?php  echo $userlicenses['LICENSE_NUM']; ?>" maxlength="10" class="form-control" onkeypress="return numbersonlyEntry(event);" onblur="validateMandatory('txtEditLicenseId<?php echo $i;?>','errEditLicenseId<?php echo $i;?>');OB_EmptyValidation();" />
																<span style="color:red;" id="errEditLicenseId<?php echo $i;?>"></span>
															</div>
															<div class="col-lg-2 Editmorelink" style="padding-top:10px;padding-right:0px;padding-left:0px;">
															<?php 
															if($licensescount == $i) { ?>
															<input type="hidden" id ="add_moreId<?php echo $i; ?>" value="1" />
															<span class="addmorelink"><a class="addlink"onclick="addmorefunction(<?php echo $i; ?>)"  style="padding-left:0px;">Add</a> <span> | </span> </span>
															<?php } ?>
															<a class="addlink" onclick="deletefun(<?php echo $i;?>)" style="padding-left:0px;">Delete</a>
															</div> 
														</div> 
														</div>
														<?php $i++;
														endforeach;?>
														<div id="stateAppendId"></div>
														</div>
													</div>
                                                    
													<div class="form-group">
														<label class="col-lg-3">Certified Information Accurate</label>
														<div class="col-lg-3">
															<label for="checkbox3">Yes</label>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-3">IP Recorded</label>
													<div class="col-md-3">
														<label for="checkbox3"><?php echo $profile['REGISTERD_IP']; ?></label>
													</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3"></label>
														<?php
														if($login_type == "ADMIN"){
														?>
														<div class="col-lg-7">
														<button class="btn btn-lg btn-success pull-right" type="button" disabled id="editSaveStdBtnId" ><strong>Save</strong></button>
														<a class="btn btn-lg btn-primary pull-right" href="<?php echo site_url(); ?>/students"><strong>Cancel</strong></a>
														</div>
														<?php } else {  ?>
														<div class="col-lg-7">
														<button class="btn btn-success-user btn-outline btn-rounded pull-right" disabled type="button" id="editSaveStdBtnId"><strong>Save</strong></button>
														<a class="btn btn-primary-user btn-outline btn-rounded pull-right" href="<?php echo site_url(); ?>/userdashboard"><strong>Cancel</strong></a>			
														</div>
														<?php } ?>
													</div>
												</form>
											</div>
										</div>
										<div id="tab-2" class="tab-pane">
											<div class="panel-body" id="divCEdetails">
												<?php foreach($usercoursecedetails as $usercoursecedetailsArray):
												$login_array = ['COMPLETED'];
												if(in_array($usercoursecedetailsArray['USER_COURSE_STATUS_VALUE'],$login_array))
												{
												$total_paid  =$usercoursecedetailsArray['STD_PRICE']-$usercoursecedetailsArray['PROMO_AMOUNT'];//if($usercoursecedetailsArray['USER_COURSE_STATUS_VALUE'] != "ENROLLED") { ?>
												<div class="col-lg-12">
												<div class="col-lg-1"><span class="spanlabeltext"><?php echo $usercoursecedetailsArray['COURSE_NUM']; ?></span>.</div>
												<div class="col-lg-8">
													<div class="row">
														<div class="col-lg-12">			 
															<span class="spanlabeltext"><?php echo $usercoursecedetailsArray['COURSE_NAME'];?> </span>
															<?php if($usercoursecedetailsArray['COURSE_TYPE_VALUE_ID'] == 'DN'){ ?><span class="badge">D</span>
															<?php } ?>
														</div>
														<p style="margin-bottom:0px;">&nbsp;</p>
														</div>

														<div class="row">
															<div class="col-lg-3">Date Started</div>
															<div class="col-lg-9"><?php echo $this->common_functions->date_display_format($usercoursecedetailsArray['ENROLL_DATE']);  ?></div>
														</div>
														<div class="row">
															<div class="col-lg-3">Date Completed</div>
															<div class="col-lg-9"><?php echo $this->common_functions->date_display_format($usercoursecedetailsArray['COMPLETE_DATE']);  ?></div>
														</div>
														<div class="row">
															<div class="col-lg-3">Number of Attempts</div>
															<div class="col-lg-9"><?php echo $usercoursecedetailsArray['TAKE_COUNT']; ?></div>
														</div>
														<div class="row">
															<div class="col-lg-3">Score</div><!--PERCENT_SCORED -->
															<div class="col-lg-9"><?php echo $usercoursecedetailsArray['PERCENT_SCORED']; ?></div>
														</div>
														<div class="row">
															<div class="col-lg-3">Total Time on Page</div>
															<div class="col-lg-9"><?php echo $usercoursecedetailsArray['TIME_ON_PAGE']; ?></div>
														</div>
														<div class="row">
															<div class="col-lg-3">CE Credits Earned</div>  <!-- COURSE_CREDIT +  CREDIT_STATE_NAME -->
															<div class="col-lg-9"><?php echo $usercoursecedetailsArray['COURSE_CREDIT']; ?> - <?php echo $usercoursecedetailsArray['CREDIT_STATE_NAME']; ?></div>
														</div>
														<div class="row">
															 <div class="col-lg-3">Total Paid</div>  <!-- PROMO_AMOUNT -->
															<div class="col-lg-9"><?php echo $total_paid; ?></div>
														</div>
														<div class="row">
															<div class="col-lg-3">IP Address</div>
															<div class="col-lg-9"><?php echo $usercoursecedetailsArray['IP_ADDRESS']; ?></div>
														</div>
													</div>
													<div class="col-lg-3 pull-right" style="text-align:right;">
														<?php 
														$user_id = $usercoursecedetailsArray['USER_ID'];
														$course_id = $usercoursecedetailsArray['COURSE_ID']; 
														?>
																								
														<p><a target="_blank" href="<?php echo base_url();?><?php echo $usercoursecedetailsArray['COURSE_CERTIFICATE_PATH']; ?>" download > View Certificate</a></p>
													<?php if($usercoursecedetailsArray['COURSE_TYPE_VALUE_ID'] != 'DN'){ ?>
														<p><a onclick="getUserCourseTransaction('<?php echo $user_id; ?>','<?php echo $course_id; ?>');" class="userCourseTransactionModalId"> View Transaction</a></p>
													<?php } ?>
														<p><a class="quizDetailsModalId" onclick="getQuizDetails('<?php echo $user_id; ?>','<?php echo $course_id; ?>');"> View Quiz Details</a></p>
														<p><a class="surveyDetailsModalId" onclick="getSurveyDetails('<?php echo $user_id; ?>','<?php echo $course_id; ?>');"> View Survey Details</a></p>
													</div>
												</div>
												<p>&nbsp;</p>
												<hr>
												<p>&nbsp;</p>
												<?php } 
												endforeach;?>
											</div>
											<div class="panel-body" id="divquizdetails" name="divquizdetailsNam"><!--Quiz Details Panel Starts Here -->
												<div class="" style="margin:0 20px;">
													<div class="row">
														<div class="col-md-12"  style="padding-right:0px;">
															<h3 class="labeltext" style="font-size:35px;">Quiz Details <span class="pull-right homediv" style="padding:15px;text-decoration: underline;font-size:12px;"><a class="backtoCEId" id="">Back</a></span></h3>
														</div>
													</div>
													<div id="quizdetailsId">
													</div>
												</div>
											</div><!--Quiz Details Panel Ends Here -->
											
											<div class="panel-body" id="divsurveydetails"><!--Survey Details Panel Starts Here -->
												<div class="" style="margin:0 20px;">
													<div class="row">
														<div class="col-md-12"  style="padding-right:0px;">
															<h3 class="labeltext" style="font-size:35px;">Survey Details <span class="pull-right homediv" style="padding:15px;text-decoration: underline;font-size:12px;"><a class="backtoCEId" id="">Back</a></span></h3>
														</div>
													</div>
													<div id="surveyDetailsId">
													</div>
												</div>
											</div><!--Survey Details Panel Ends Here -->
											<div class="panel-body" id="divtransactiondetails"><!--Transaction Details Panel Starts Here -->
												<div class="" style="margin:0 20px;">
													<div class="row">
														<div class="col-md-12"  style="padding-right:0px;">
															<h3 class="labeltext" style="font-size:35px;">Transaction Details <span class="pull-right homediv" style="padding:15px;text-decoration: underline;font-size:12px;"><a class="backtoCEId" id="">Back</a></span></h3>
														</div>
														<p>&nbsp;</p>
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class="row">
																<div class="col-lg-3">Course Title</div>
																<div class="col-lg-9"><b><span id="courseTitleId"></span></b></div>
															</div>
															<div class="row">
																<div class="col-lg-3">Date Purchased</div>
																<div class="col-lg-9"><b><span id="dateId"></span></b></div>
															</div>
															<div class="row">
																<div class="col-lg-3">Price</div>
																<div class="col-lg-9"><b><span id="priceId"></span></b></div>
															</div>
															<div class="row">
																<div class="col-lg-3">Promotion Applied</div>
																<div class="col-lg-9"><b><span id="promoNameId"></span></b></div>
															</div>
															<div class="row">
																<div class="col-lg-3">Promotion Amount</div>
																<div class="col-lg-9"><b><span id="promoAmountId"></span></b></div>
															</div>
															<div class="row">
																<div class="col-lg-3">Paid Amount</div>
																<div class="col-lg-9"><b><span id="paidAmountId"></span></b></div>
															</div>
														</div>
													</div>
												</div>
											</div><!--Transaction Details Panel Ends Here -->
										</div>
										<div id="tab-3" class="tab-pane">
											<div class="panel-body">
												<div class="col-lg-12">
													<div class="row">
														<div class="col-lg-3">Date Joined</div>
														<div class="col-lg-2" style="text-align:right;">
														<?php echo $this->common_functions->date_display_format($profile['CREATE_DATE']); ?>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">IP Address Used at Sign Up</div>
														<div class="col-lg-2" style="text-align:right;"><?php echo $profile['REGISTERD_IP'];?></div>
													</div>
													<div class="row">
														<div class="col-lg-3">Last Login</div>
														<div class="col-lg-2" style="text-align:right;">
														<?php echo $this->common_functions->date_display_format($profile['LAST_SUCCESS_LOGIN_DATE']);?>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">Times Logged In</div>
														<div class="col-lg-2" style="text-align:right;"><?php echo $profile['TOTAL_LOGIN_COUNT'];?></div>
													</div>
													<div class="row">
														<div class="col-lg-3">Total Courses Taken</div>
														<div class="col-lg-2" style="text-align:right;"><?php echo $total_course_taken; ?></div>
													</div>
													<div class="row">
														<div class="col-lg-3">Total Courses Completed</div>
														<div class="col-lg-2" style="text-align:right;">
														<?php echo $completed_count; ?>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">Total Credits Earned</div>
														<div class="col-lg-2" style="text-align:right;"><?php echo $total_credit; ?></div>
													</div>
													<div class="row">
														<div class="col-lg-3">Total Amount Paid to Date</div>
														<div class="col-lg-2" style="text-align:right;">$<?php echo $total_paid_amount; ?></div>
													</div>

												</div>
											</div>
										</div>
									</div><!-- tabs-content -->
								</div><!-- tabs-container -->
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
var addmoretextCount=<?php echo ($i-1);?>;

$("#divquizdetails").hide();
$("#divsurveydetails").hide();
$('#divtransactiondetails').hide();

$('.quizDetailsModalId').click(function(){
	$("#divquizdetails").show();    
	$('#divsurveydetails').hide();
	$('#divtransactiondetails').hide();
	$('#divCEdetails').hide();
});

$('.surveyDetailsModalId').click(function(){
	$("#divsurveydetails").show();    
	$('#divquizdetails').hide();
	$('#divtransactiondetails').hide();
	$('#divCEdetails').hide();
});

$('.userCourseTransactionModalId').click(function(){
	$('#divtransactiondetails').show();
	$("#divsurveydetails").hide();    
	$('#divquizdetails').hide();
	$('#divCEdetails').hide();
});

$('.backtoCEId').click(function(){
	$("#divquizdetails").hide();
	$('#divsurveydetails').hide();
	$('#divtransactiondetails').hide();    
	$('#divCEdetails').show();
}); 

$("#selEditStateId").val(<?php  echo $profile['STATE']; ?>);
$("#selEditCountryId").val(<?php  echo $profile['COUNTRY']; ?>);

  var license_count  = JSON.parse('<?php  echo json_encode($array); ?>');
  var j=1;
 for(var i=0;i<=license_count.length;i++)
{
	$("#selEditLicenseId"+j).val(license_count[i]);
	j++;

} 

 
$('#editSaveStdBtnId').click(function(){
        var add_license_state_array = [];	
        var edit_license_state_array = [];	
		var license_state_id = document.getElementsByClassName("selLicenseStateNam"); 
		console.log(addmoretextCount);
		
		for (var i = 1; i <= addmoretextCount; i++){
			
			if(document.getElementById('common_Id'+i) != null) {
				if(document.getElementById('db_editId'+i) != null) {
					var js_drd_license_editid = document.getElementById('db_editId'+i).value;
					if(js_drd_license_editid !="")
					{			
						edit_license_state_array.push({license_state:document.getElementById('selEditLicenseId'+i).value,
						license_no:document.getElementById('txtEditLicenseId'+i).value,
						user_license_id:js_drd_license_editid}); 		
					}
				}
				if(document.getElementById('addlicensecommon_Id'+i) != null) {				
				var js_drd_add_licenseid = document.getElementById('selEditLicenseId'+i).value;
					if(js_drd_add_licenseid !="")
					{
					add_license_state_array.push({license_state:document.getElementById('selEditLicenseId'+i).value,
					license_no:document.getElementById('txtEditLicenseId'+i).value}); 
					}
				}
			}			
		}
		console.log("Add Array "+add_license_state_array.length);
		console.log("Edit Array "+edit_license_state_array.length);
		console.log("Delete Array "+deletearray.length);
		$("#editSaveStdBtnId").prop("disabled", true);
		$("#editSaveStdBtnId").css("cursor", "wait");
		var js_drd_EditStudentData = $("#formEditStudentId").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/editstudentprofile",
			data:{
				'txtEdituserid':$('#txtEdituserid').val(),
				'txtEditEmailNam':$('#txtEditEmailId').val(),
				//'newpwdEditPasswordNam':$('#newpwdEditPasswordId').val(),
				'pwdEditPasswordNam':$('#pwdEditPasswordId').val(),
				'txtEditMobileNumNam':$('#txtEditMobileNumId').val(),
				'txtEditDobNam':$('#txtEditDobId').val(),
				'txtEditPracticeNam':$('#txtEditPracticeNameId').val(),
				'selEditCountryNam':$('#selEditCountryId').val(),
				'selEditStateNam':$('#selEditStateId').val(),
				'txtEditCityNam':$('#txtEditCityId').val(),
				'txtEditAddressNam':$('#txtEditAddressId').val(),
				'txtEditZipCodeNam':$('#txtEditZipCodeId').val(),
				'chkAgreeNam':$('#txtAgreeId').val(),
				'txtIpAddrNam':$('#txtIpAddrId').val(),
				'ajx_drd_add_licenseData': add_license_state_array,
				'ajx_drd_edit_licenseData': edit_license_state_array,
				'ajx_drd_delete_licenseData': deletearray,
			},
			success: function(ajx_drd_EditStudentResult) {
				$("#editSaveStdBtnId").prop("disabled", false);
				$("#editSaveStdBtnId").css("cursor", "pointer");
				var js_drd_EditStudent = $.parseJSON(ajx_drd_EditStudentResult);
				console.log("Return Message "+ajx_drd_EditStudentResult);
				if (js_drd_EditStudent['message'] != "") {
					if(js_drd_EditStudent['message_type'] ==  "SUCCESS"){
						document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditStudent['message']+"</div>";
						setTimeout(function(){ window.location.href= window.location.href; }, 1000);
					}
					else 
					{
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditStudent['message']+"</div>";
					}
					$('html, body').animate({ scrollTop: 0 }, 'fast');
				} else {
					$("#editSaveStdBtnId").prop("disabled", false);
					$("#editSaveStdBtnId").css("cursor", "pointer");
					$("#errEditEmailId").text(js_drd_EditStudent['EditEmail']);
					$("#errEditPasswordId").text(js_drd_EditStudent['EditPassword']);
					$("#errEditEditressId").text(js_drd_EditStudent['EditAddress']);
					$("#errEditCityId").text(js_drd_EditStudent['EditCity']);
					$("#errEditStateId").text(js_drd_EditStudent['EditState']);
					$("#errEditZipCodeId").text(js_drd_EditStudent['EditZipcode']);
					$("#errEditCountryId").text(js_drd_EditStudent['EditCountry']);
					$("#errEditPracticeNameId").text(js_drd_EditStudent['EditPracticeName']);
					$("#errEditMobileNumId").text(js_drd_EditStudent['EditMobileNum']);
					$("#errEditDobId").text(js_drd_EditStudent['EditDob']);
					$("#errEditLicenseId").text(js_drd_EditStudent['EditLicense']);
				}

			},
			error: function() {
				$("#editSaveStdBtnId").prop("disabled", false);
				$("#editSaveStdBtnId").css("cursor", "pointer");
				//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
			}
		});
	});
var deletearray  = [];	
function deletefun(delete_id)
{	
	var dl_drd_userlicense_id = $('#db_deleteId'+delete_id).val();
	var dl_drd_addmore_id = $('#add_moreId'+delete_id).val();
	if(!dl_drd_addmore_id)
	{
		if(dl_drd_userlicense_id)
		{
			deletearray.push({ user_license_id:dl_drd_userlicense_id }); 
			$( "div" ).remove('.increaseno'+delete_id);
			//$('.increaseno'+delete_id).hide();	
		}else{	
			$( "div" ).remove('.increaseno'+delete_id);
			//$('.increaseno'+delete_id).hide();	
		}
	}
	else
	{
		if(dl_drd_userlicense_id)
		{
			deletearray.push({ user_license_id:dl_drd_userlicense_id });
		}
		var license_state_id_data = document.getElementsByClassName("selLicenseStateNam"); 
		console.log(license_state_id_data.length);
		
		if(license_state_id_data.length  ==  1)
		{
			$('#errEditLicenseId'+delete_id).text(errMsg["80547"]);
			$('#errEditLicenseStateId'+delete_id).text(errMsg["80547"]);
		}
		else
		{
			$('#selEditLicenseId'+delete_id).val('');
			$('#txtEditLicenseId'+delete_id).val('');	
			$('#errEditLicenseId'+delete_id).text('');
			$('#errEditLicenseStateId'+delete_id).text('');			
		}
	}
	console.log("Delete Id "+deletearray);
}

function addmorefunction(count){
	console.log(count);
	var js_drd_no_regex = /^[1-9][0-9]{9,}$/;
	var js_drd_license_no = $('#txtEditLicenseId'+count).val();
	console.log("js_drd_license_no "+js_drd_license_no);
	var js_drd_state_id = $('#selEditLicenseId'+count).val();	
	var addmorecount = count+1;
	if(js_drd_license_no && js_drd_state_id !=""){	
		$('#errEditLicenseId'+count).text('');	
		$('#errEditLicenseStateId'+count).text('');
		var row = '<div class="increaseno'+addmorecount+'"><div class="row" style="margin-bottom:15px;"><div class="col-md-5"><input type="hidden" id ="common_Id'+addmorecount+'" value="" /><input type="hidden" id ="addlicensecommon_Id'+addmorecount+'" value="" /><select class="form-control chosen-select selLicenseStateNam" tabindex="5" name="selLicenseStateNam" id="selEditLicenseId'+addmorecount+'" onblur="validateMandatory('+"'selEditLicenseId"+addmorecount+"'"+','+"'errEditLicenseStateId"+addmorecount+"'"+');OB_EmptyValidation();"><option value="" >State *</option><?php foreach($stateName as $stateNameArray): ?><option value="<?php echo $stateNameArray['ID'];?>"><?php echo trim($stateNameArray['STATE_NAME']); ?> </option><?php endforeach;?></select><span style="color:red;" id="errEditLicenseStateId'+addmorecount+'"></span></div><div class="col-md-5"><input type="text" class="form-control" maxlength="10" tabindex="4" placeholder="License# *" name="txtLicenseNam[]" id="txtEditLicenseId'+addmorecount+'" onblur="validateMandatory('+"'txtEditLicenseId"+addmorecount+"'"+','+"'errEditLicenseId"+addmorecount+"'"+');OB_EmptyValidation();" onkeypress="return numbersonlyEntry(event);" /><span style="color:red; text-align:left !important;" id="errEditLicenseId'+addmorecount+'"></span></div><div class="col-lg-2 Editmorelink" style="padding-top:10px;padding-right:0px;padding-left:0px;"><input type="hidden" id ="add_moreId'+addmorecount+'" value="1" /><span class="addmorelink"><a onclick="addmorefunction('+addmorecount+')" class="addlink" style="padding-left:0px;">Add</a> <span> | </span> </span><a class="addlink" onclick="deletefun('+addmorecount+')" style="padding-left:0px;" >Delete</a></div></div></div>'; 
		$("#add_moreId"+count).val('');
		$("span").remove('.addmorelink');
		$('#stateAppendId').append(row);		
		
	}else{
		if(js_drd_license_no ==""){
			$('#errEditLicenseId'+count).text(errMsg["80547"]);
		} else if(!js_drd_no_regex.test(js_drd_license_no)){
			$('#errEditLicenseId'+count).text(errMsg["80604"]);
		}else{
			$('#errEditLicenseId'+count).text('');
		}
		if(js_drd_state_id ==""){			
			$('#errEditLicenseStateId'+count).text(errMsg["80547"]);
		}else{
			$('#errEditLicenseStateId'+count).text('');
		}
	}
	addmoretextCount = parseInt(addmoretextCount)+1;
}

	/* getUserCourseTransaction function */
	function getUserCourseTransaction(js_drd_userId,js_drd_CourseId){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url(); ?>"+ "/usercoursetransaction",
			data: {
				'ajx_drd_userId' : js_drd_userId,
				'ajx_drd_courseId' : js_drd_CourseId,
			},
			datatype:'json',
			cache:"false",
			success:function(js_drd_UserCourseTransaction){	
			  
					$('#courseTitleId').text(js_drd_UserCourseTransaction['COURSE_NAME']);
					var enrollDate = date_display_format(js_drd_UserCourseTransaction['ENROLL_DATE']);
					
					$('#dateId').text(enrollDate);
					$('#priceId').text(js_drd_UserCourseTransaction['STD_PRICE']);
					$('#promoNameId').text(js_drd_UserCourseTransaction['PROMO_CODE_NAME']);
					$('#promoAmountId').text(js_drd_UserCourseTransaction['PROMO_AMOUNT']);
					$('#paidAmountId').text(js_drd_UserCourseTransaction['PAID_AMOUNT']);
			},
			error: function() {
					window.location.href = "<?php echo site_url(); ?>" + "/404_override";
			}
        });
	}	
	
	/* getQuizDetails function */
	function getQuizDetails(js_drd_userId,js_drd_CourseId){
		//alert("Inside getQuizDetails Function");
		$.ajax({
			type:"POST",
			url:"<?php echo site_url(); ?>"+ "/usercoursequizdetails",
			data: {
				'ajx_drd_userId' : js_drd_userId,
				'ajx_drd_courseId' : js_drd_CourseId,
			},
			datatype:'json',
			cache:"false",
			success:function(js_drd_UserCourseQuizDetails){	
				//alert(js_drd_UserCourseQuizDetails);
				$('#quizdetailsId').html(js_drd_UserCourseQuizDetails);
			},
			error: function() {
				window.location.href = "<?php echo site_url(); ?>" + "/404_override";
			}
        });
	}
	
	/* getSurveyDetails function */
	function getSurveyDetails(js_drd_userId,js_drd_CourseId){
		//alert("Inside Survey Details Function");
		$.ajax({
			type:"POST",
			url:"<?php echo site_url(); ?>"+ "/usercoursesurveydetails",
			data: {
				'ajx_drd_userId' : js_drd_userId,
				'ajx_drd_courseId' : js_drd_CourseId,
			},
			datatype:'json',
			cache:"false",
			success:function(js_drd_UserCourseSurveyDetails){	
				//alert(js_drd_UserCourseSurveyDetails);
				$('#surveyDetailsId').html(js_drd_UserCourseSurveyDetails);
			},
			error: function() {
				window.location.href = "<?php echo site_url(); ?>" + "/404_override";
			}
        });
	}
		
var js_drd_pwd_pattern =true;
/* Button Disable  Function */
function OB_EmptyValidation(){
	var js_drd_mobile_patrn = /^[1-9][0-9]{9,14}$/;
	var js_drd_zip_patrn = /^[0-9]{5}$/;
	var js_drd_pwd_patrn = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,30}$/;
	var js_drd_street_address = document.getElementById('txtEditAddressId').value!="";
	var js_drd_city = document.getElementById('txtEditCityId').value!="";
	var js_drd_state = document.getElementById('selEditStateId').value!="";
	var js_drd_zip_code = document.getElementById('txtEditZipCodeId').value!="";
	var js_drd_zip_pattern = js_drd_zip_patrn.test(document.getElementById('txtEditZipCodeId').value);
	var js_drd_country = document.getElementById('selEditCountryId').value!="";
	var js_drd_dob = document.getElementById('txtEditDobId').value!="";
	var js_drd_mobile_no= document.getElementById('txtEditMobileNumId').value!="";
	var js_drd_practice_name= document.getElementById('txtEditPracticeNameId').value!="";
	var js_drd_pattern_mobile = js_drd_mobile_patrn.test(document.getElementById('txtEditMobileNumId').value);
	var js_drd_password  = document.getElementById("pwdEditPasswordId").value!="";
	
	var license_state_id_data = document.getElementsByClassName("selLicenseStateNam"); 
	console.log(addmoretextCount);
	var data = 0;
	for (var i = 1; i <= addmoretextCount; i++){
		
		if(document.getElementById('common_Id'+i) != null)
		{
			var license = document.getElementById('txtEditLicenseId'+i).value!="";
			var state_license = document.getElementById('selEditLicenseId'+i).value!="";
			if(license && state_license)
			{
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
			else
			{
				data=data+1;
			}					
		}
	}		
	console.log(document.getElementById("pwdEditPasswordId").value.length)
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
	console.log("license_array_value "+data);
	
	if((js_drd_street_address && js_drd_city  && js_drd_state && js_drd_zip_code  && js_drd_country &&js_drd_dob && js_drd_mobile_no && js_drd_pattern_mobile && js_drd_zip_pattern && js_drd_practice_name && js_drd_password && js_drd_pwd_pattern) && (data == 0))
	{
		$("#editSaveStdBtnId").prop("disabled", false);
	}
	else
	{	
		$("#editSaveStdBtnId").prop("disabled", true);	
	}	
}
</script>
