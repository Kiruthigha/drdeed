<style>
div.col-lg-3{
	padding-right:0px !important;
}
input textarea{
	padding-left:0px;
	font-family: Arial;
	font-weight: 700;
}

</style>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<form class="form-horizontal" enctype="multipart/form-data" id="formAddCourseId">
									<div class="row">
										<div class="col-md-5"  style="padding-right:0px;">
											<h1 class="labeltext">Add Course</h1>
										</div>
										<div class="col-md-3" style="margin-top:35px;">
										
											<select class="form-control" name="selAddCourseNam" id="selAddCourseId" onblur="validateMandatory('selAddCourseId','errAddCourseId');OBEmptyValidation();">
												<option value="">Select Course</option>
												 <?php foreach($course_type as $course_type):
												if($course_type['VALUE_ID'] == 'CE')
												{
												 ?>
												<option value="<?php echo $course_type['ID'];?>" selected > <?php echo trim($course_type['VALUE_NAME']); ?> </option>
												<?php 
												} else
												{
												 ?>
												<option value="<?php echo $course_type['ID'];?>"> <?php echo trim($course_type['VALUE_NAME']); ?> </option>
												<?php } endforeach;?>
											</select>
											
											<span id="errAddCourseId" style="color:red;"></span>
										</div>
										
									</div>
									<p></p>
									<div id="message"></div>
									<div class="form-group">
									<label class="col-md-2">Course#</label>
									<div class="col-md-7">
										<div class="row">
											<div class="col-md-1" style="padding-top:5px;padding-left:0px;">
												<label class="col-md-2 ceducation">CE- </label>
												<label class="col-md-2 deducation">DN- </label>
											</div>
											<div class="col-md-3" >
												<input type="text" class="form-control" name="txtAddCourseNumNam" id="txtAddCourseNumId" onblur=" courseNum_exists('txtAddCourseNumId','errAddCourseNumId');OBEmptyValidation();" onkeypress="return numbersonlyEntry(event);" maxlength="5" />
												<span id="errAddCourseNumId" style="color:red;"></span>
											</div>
										</div>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Course Name / Title</label>
										<div class="col-lg-7">
										<input type="text" class="form-control" name="txtAddTitleNam" maxlength="100" id="txtAddTitleId" onblur="validateMandatory('txtAddTitleId','errAddTitleId');OBEmptyValidation();" onkeypress="return OKValidateAlphaSpecialNumeric(event);"  />
										<span id="errAddTitleId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Course Description</label>
										<div class="col-lg-7">
										<textarea class="form-control" name="txtAddCourseDescNam" id="txtAddCourseDescId" onblur="validateMandatory('txtAddCourseDescId','errAddCourseDescId');OBEmptyValidation();" onkeypress="return restrictHTMLTagEntry(event);"  maxlength="2000" ></textarea>
										<span id="errAddCourseDescId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Instructor Name</label>
										<div class="col-lg-7">
										<input type="text" placeholder="" class="form-control" name="txtAddInstructorNam" id="txtAddInstructorId" onblur=" validateMandatory('txtAddInstructorId','errAddInstructorId');OBEmptyValidation();" onkeypress="return OKValidateAlphaNumeric(event);"  maxlength="100" />
										<span id="errAddInstructorId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">CE Credits</label>
										<div class="col-lg-2">
											<select class="form-control chosen-select" name="selCECreditsNam" id="selCECreditsId" onblur="validateMandatory('selCECreditsId','errCECreditsId');OBEmptyValidation();" onchange=				"credit_change();OBEmptyValidation();">
											<option value="" >Select Credits</option>
											<option value="0.5" selected>0.5</option>
											<option value="1.2">1.0</option>
											<option value="1.0">1.5</option>
											<option value="1.5">2.0</option>
											<option value="2.0">2.5</option>
											<option value="2.5">3.0</option>
											<option value="3.0">3.5</option>
											<option value="3.5">4.0</option>
											<option value="4.0">4.5</option>
											<option value="4.5">5.0</option>
											</select>      
											<span id="errCECreditsId" style="color:red;"></span>
										</div> 
										
										<div class="col-md-2" style="padding-top:10px;padding-right:0px;">
										<p> Time: <b><span id="spnTimeId">00:30:00</span></b></p>
										</div>
										<div class="col-md-2">
										<p style="padding-top:10px;" > Cost: <b><span id="spnAmountId">$<?php echo $ce_course_cost; ?></span></b></p>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-2">Creation Date</label>
										<div class="col-lg-3">
										<input type="text" readonly class="form-control crtDatePicker" name="txtAddDateNam" id="txtAddDateId" onblur="validateMandatory('txtAddDateId','errAddDateId');OBEmptyValidation();" onchange="validateMandatory('txtAddDateId','errAddDateId'); Validatedate('txtAddDateId','errAddDateId');OBEmptyValidation();" />
										<span id="errAddDateId" style="color:red;"></span>
										</div>
									</div> 
									<div class="form-group">
										<label class="col-lg-2">Video URL</label>
										<div class="col-lg-7">
										<input type="text" class="form-control" name="txtAddVideoUrlNam" id="txtAddVideoUrlId" onblur="validateMandatory('txtAddVideoUrlId','errAddVideoUrlId');OBEmptyValidation();"  onkeypress="return OKValidateAlphaSpecialNumeric(event);" maxlength="30" />
										<span id="errAddVideoUrlId" style="color:red;"></span>
										</div>
									</div>
										<center><label style="padding-top:0px;" class="col-lg-11"><b><?php echo $this->lang->line('file_size'); ?></b></label></center>
									<div class="form-group file_remove1" id="AddAppfileId" >							
										<label class="col-lg-2">PDF Course Notes 1</label>
										<div class="col-lg-7">
										<div class="fileinput fileinput-new input-group" style="z-index:1;" data-provides="fileinput">
										<div class="form-control" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file fileinput-exists"></i>
											<span class="fileinput-filename"></span>
										</div>
										<span class="input-group-addon btn btn-default btn-file">
											<span class="fileinput-new" onclick="OBEmptyValidation();remove_file_error('errAddFileId1');">Upload..</span>
											<span class="fileinput-exists" onclick="OBEmptyValidation();remove_file_error('errAddFileId1');">Change</span>
											<input type="file" name="files" id="txtAddFileId1" class="fileCls"  onclick="OBEmptyValidation();" onblur=" remove_file_error('errAddFileId1');OBEmptyValidation();" onchange=" remove_file_error('errAddFileId1');OBEmptyValidation();" />
										</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput" onclick="OBEmptyValidation();remove_file(1)">Remove</a>
									</div> 
									<span id="errAddFileId1" style="color:red;"></span>
									</div>
					
									<div class="col-lg-2 addmorelink" style="padding-top:10px;">
										<a onclick="addmorefunction(2)" >Add More</a>
									</div> 
																		
									</div>
									<div id="addmoreUploadId"></div>
									
									<input type="hidden" placeholder="" class="form-control " id="addhiddenstatecodeid" name="addhiddenstatecodeNam" />
									<div class="form-group">
									<div class="col-lg-2">
										<label class="col-lg-12" style="padding-left:0px;">State Specific Codes</label>
										<span class="help-block m-b-none" style="font-size:12px;">Leave blank to exclude State</span>
										</div>
										<span style="color:red;" id="errAddCourseStateCode"></span>
										<div class="col-lg-7">
										<?php $i=1;
										foreach($state as $state): ?>
											<div class="col-lg-3">
												<label style="padding-left:0px;"><?php echo $state['STATE_NAME']; ?></label>
											</div>
											
											<div class="col-lg-3 courseState"  style="margin-bottom:7px;">
												<input type="hidden" id="stateId<?php echo  $i;?>" value="<?php echo $state['ID']; ?>" />
												<input type="text" id="statecodeId<?php echo  $i;?>" placeholder="" class="form-control clsState" maxlength="10" onblur="OBEmptyValidation();"/>
											</div>
											<?php  $i++;
											endforeach; ?>
										</div>										
									</div>
									
									<div class="form-group">
										<label class="col-lg-2">Question 1</label>
										<div class="col-lg-7"> 
											<div class="col-lg-12" style="margin-bottom:10px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQuestion1Nam" id="txtAddQuestion1Id" onblur=" validateMandatory('txtAddQuestion1Id','errAddQuestion1Id');OBEmptyValidation();" maxlength="600" />
												<span id="errAddQuestion1Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Correct Answer</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn1Ans1Nam" id="txtAddQstn1Ans1Id" onblur=" validateMandatory('txtAddQstn1Ans1Id','errAddQstn1Ans1Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn1Ans1Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 2</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn1Ans2Nam" id="txtAddQstn1Ans2Id" onblur=" validateMandatory('txtAddQstn1Ans2Id','errAddQstn1Ans2Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn1Ans2Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 3</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn1Ans3Nam" id="txtAddQstn1Ans3Id" onblur=" validateMandatory('txtAddQstn1Ans3Id','errAddQstn1Ans3Id');OBEmptyValidation();" maxlength="120"  />
												<span id="errAddQstn1Ans3Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 4</label>
											</div>
											<div class="col-lg-9" >
												<input type="text" placeholder="" class="form-control" name="txtAddQstn1Ans4Nam" id="txtAddQstn1Ans4Id" onblur=" validateMandatory('txtAddQstn1Ans4Id','errAddQstn1Ans4Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn1Ans4Id" style="color:red;"></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Question 2</label>
										<div class="col-lg-7">
											<div class="col-lg-12" style="margin-bottom:10px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn2Nam" id="txtAddQstn2Id" onblur=" validateMandatory('txtAddQstn2Id','errAddQstn2Id');OBEmptyValidation();" maxlength="600"  />
												<span id="errAddQstn2Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Correct Answer</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn2Ans1Nam" id="txtAddQstn2Ans1Id" onblur=" validateMandatory('txtAddQstn2Ans1Id','errAddQstn2Ans1Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn2Ans1Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 2</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn2Ans2Nam" id="txtAddQstn2Ans2Id" onblur=" validateMandatory('txtAddQstn2Ans2Id','errAddQstn2Ans2Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn2Ans2Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 3</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn2Ans3Nam" id="txtAddQstn2Ans3Id" onblur=" validateMandatory('txtAddQstn2Ans3Id','errAddQstn2Ans3Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn2Ans3Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 4</label>
											</div>
											<div class="col-lg-9">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn2Ans4Nam" id="txtAddQstn2Ans4Id" onblur=" validateMandatory('txtAddQstn2Ans4Id','errAddQstn2Ans4Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn2Ans4Id" style="color:red;"></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Question 3</label>
										<div class="col-lg-7">
											<div class="col-lg-12" style="margin-bottom:10px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn3Nam" id="txtAddQstn3Id" onblur=" validateMandatory('txtAddQstn3Id','errAddQstn3Id');OBEmptyValidation();" maxlength="600" />
												<span id="errAddQstn3Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Correct Answer</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn3Ans1Nam" id="txtAddQstn3Ans1Id" onblur=" validateMandatory('txtAddQstn3Ans1Id','errAddQstn3Ans1Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn3Ans1Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 2</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn3Ans2Nam" id="txtAddQstn3Ans2Id" onblur=" validateMandatory('txtAddQstn3Ans2Id','errAddQstn3Ans2Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn3Ans2Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 3</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn3Ans3Nam" id="txtAddQstn3Ans3Id" onblur="validateMandatory('txtAddQstn3Ans3Id','errAddQstn3Ans3Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn3Ans3Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 4</label>
											</div>
											<div class="col-lg-9">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn3Ans4Nam" id="txtAddQstn3Ans4Id" onblur="validateMandatory('txtAddQstn3Ans4Id','errAddQstn3Ans4Id');OBEmptyValidation();"maxlength="120"  />
												<span id="errAddQstn3Ans4Id" style="color:red;"></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Question 4</label>
										<div class="col-lg-7">
											<div class="col-lg-12" style="margin-bottom:10px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn4Nam" id="txtAddQstn4Id" onblur="validateMandatory('txtAddQstn4Id','errAddQstn4Id');OBEmptyValidation();" maxlength="600" />
												<span id="errAddQstn4Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Correct Answer</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn4Ans1Nam" id="txtAddQstn4Ans1Id" onblur="validateMandatory('txtAddQstn4Ans1Id','errAddQstn4Ans1Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn4Ans1Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 2</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn4Ans2Nam" id="txtAddQstn4Ans2Id" onblur="validateMandatory('txtAddQstn4Ans2Id','errAddQstn4Ans2Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn4Ans2Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 3</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn4Ans3Nam" id="txtAddQstn4Ans3Id" onblur="validateMandatory('txtAddQstn4Ans3Id','errAddQstn4Ans3Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn4Ans3Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 4</label>
											</div>
											<div class="col-lg-9">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn4Ans4Nam" id="txtAddQstn4Ans4Id" onblur="validateMandatory('txtAddQstn4Ans4Id','errAddQstn4Ans4Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn4Ans4Id" style="color:red;"></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Question 5</label>
										<div class="col-lg-7">
											<div class="col-lg-12" style="margin-bottom:10px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn5Nam" id="txtAddQstn5Id" onblur="validateMandatory('txtAddQstn5Id','errAddQstn5Id');OBEmptyValidation();" maxlength="600" />
												<span id="errAddQstn5Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Correct Answer</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" class="form-control" name="txtAddQstn5Ans1Nam" id="txtAddQstn5Ans1Id" onblur="validateMandatory('txtAddQstn5Ans1Id','errAddQstn5Ans1Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn5Ans1Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 2</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" class="form-control" name="txtAddQstn5Ans2Nam" id="txtAddQstn5Ans2Id" onblur="validateMandatory('txtAddQstn5Ans2Id','errAddQstn5Ans2Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn5Ans2Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 3</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn5Ans3Nam" id="txtAddQstn5Ans3Id" onblur="validateMandatory('txtAddQstn5Ans3Id','errAddQstn5Ans3Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn5Ans3Id" style="color:red;"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 4</label>
											</div>
											<div class="col-lg-9">
												<input type="text" placeholder="" class="form-control" name="txtAddQstn5Ans4Nam" id="txtAddQstn5Ans4Id" onblur="validateMandatory('txtAddQstn5Ans4Id','errAddQstn5Ans4Id');OBEmptyValidation();" maxlength="120" />
												<span id="errAddQstn5Ans4Id" style="color:red;"></span>
											</div>
										</div>
									</div>
									<div class="form-group  easyQuestion">
										<label class="col-lg-2">Essay Question</label>
										<div class="col-md-7">
											<input type="text" placeholder="" class="form-control" name="txtAddEssayQstnNam" id="txtAddEssayQstnId" onblur="validateMandatory('txtAddEssayQstnId','errAddEssayQstnId');OBEmptyValidation();" maxlength="600" />
											<span id="errAddEssayQstnId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Passing Score</label>
										<div class="col-md-2">
											<select class="form-control chosen-select" name="selAddScoreNam" id="txtAddScoreId" onblur="validateMandatory('txtAddScoreId','errAddScoreId');OBEmptyValidation();" onchange="OBEmptyValidation();">
											<option value="">Select Score</option>
											<option value="0" >0%</option>
											<option value="20" >20%</option>
											<option value="40" >40%</option>
											<option value="60" >60%</option>
											<option value="80" >80%</option>
											<option value="100" >100%</option>
											</select>
											<span id="errAddScoreId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-7">
										<button class="btn btn-lg btn-success pull-right" type="button" id="addSaveBtnId" disabled  ><strong>Save</strong></button>
										<a class="btn btn-lg  btn-primary  pull-right" href="<?php echo site_url(); ?>/courses"><strong>Cancel</strong></a>
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
$('.deducation').hide();
$('.easyQuestion').hide();
var ce_courseCost =  "<?php echo $ce_course_cost;?>";
var dn_courseCost =  "<?php echo $dn_course_cost;?>";
$('.chosen-select1').chosen({width: "100%"});

$('.removelink').hide();
function addmorefunction(addmorecount)
{
	var last_id = addmorecount-1;
	if($('#txtAddFileId'+last_id).val() !="")
	{		
	var count = addmorecount+1
	var row = '<div class="form-group file_remove'+addmorecount+'" id="AddAppfileId'+count+'" ><label class="col-lg-2">PDF Course Notes '+addmorecount+'</label><div class="col-lg-7"><div class="fileinput fileinput-new input-group" data-provides="fileinput"><div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span></div><span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new" onclick="OBEmptyValidation();remove_file_error('+"'errAddFileId"+addmorecount+"'"+');" >Upload..</span><span class="fileinput-exists" onclick="OBEmptyValidation();remove_file_error('+"'errAddFileId"+addmorecount+"'"+');">Change</span><input type="file" class="fileCls" name="files" onclick="OBEmptyValidation();" id="txtAddFileId'+addmorecount+'" onblur="remove_file_error('+"'errAddFileId"+addmorecount+"'"+');OBEmptyValidation();" onchange="remove_file_error('+"'errAddFileId"+addmorecount+"'"+');OBEmptyValidation();"  /></span><a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput" onclick="OBEmptyValidation();remove_file('+addmorecount+');">Remove</a></div><span id="errAddFileId'+addmorecount+'" style="color:red;"></span></div><div class="col-lg-2 addmorelink" style="padding-top:10px;"><a onclick="addmorefunction('+count+')" >Add More</a></div> </div>';
	$('.addmorelink').hide();
	$('#addmoreUploadId').append(row);
	$("#errAddFileId"+last_id).text('');
	}
	else
	{
		$("#errAddFileId"+last_id).text(errMsg["80547"]);
	}
}

function remove_file(num)
{
	console.log('Removed');
	//$('div').remove('.file_remove'+num);
}
	
	$( ".crtDatePicker" ).datepicker({
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd, yy',
	});		

function remove_file_error(errId)
{
	var err_id = document.getElementById(errId);
	$(err_id).text('');
}	
$('#selAddCourseId').change(function(){
	console.log($.trim($('#selAddCourseId :selected').text()));
	if($.trim($('#selAddCourseId :selected').text()) == 'CONTINUING EDUCATION'){
		$('.ceducation').show();
		$('.deducation').hide();
		$('.easyQuestion').hide();
		credit_change();
	}else{
		$('.ceducation').hide();
		$('.deducation').show();
		$('.easyQuestion').show();
		credit_change();
	}
});
var credit_time;
var start = Date.now();
function credit_change(){
	var credit = $('#selCECreditsId :selected').val();
	var credit_text = $('#selCECreditsId :selected').text();
	var time =  credit_text * 60.00; 
	//console.log("time "+time);
     var hours = leftPad(Math.floor(Math.abs(time) / 3600));  
     var minutes = leftPad(Math.floor(Math.abs(time) / 60));  
		var sec = leftPad(Math.abs(time) % 60); 
   // var sec = hours-minutes;
	credit_time = hours+ ":"+minutes+":"+sec;
	$('#spnTimeId').text(credit_time);
	if($.trim($('#selAddCourseId :selected').text()) == 'CONTINUING EDUCATION'){
		console.log(ce_courseCost);
		if(!((credit == 0.5) || (credit == 1.2)))
		{
			var amount = (credit  * ce_courseCost) *2+".00";
		}
		else
		{
			var amount = ce_courseCost;
		}
		$('#spnAmountId').text("$"+amount+"");		
	}else{
		//console.log(dn_courseCost);
		var amount = '0.00';
		$('#spnAmountId').text("$"+amount+"");
	}
}
function leftPad(number) {    
    return ((number < 10 && number >= 0) ? '0' : '') + number;  
}  
  
var statecountarray = [];
$('.clsState').blur(function(){	
 var code = document.getElementsByClassName('clsState');
    for (var i = 0; i < code.length; i++){
        if(code[i].value !=""){
			console.log(' inside if State code is '+code[i].value);
			document.getElementById('addhiddenstatecodeid').value = code[i].value;
			statecountarray.push(code[i].value);
			break;
		}else{
				console.log(' inside else State code is '+code[i].value);
				document.getElementById('addhiddenstatecodeid').value = "";
			statecountarray=[];
		}
	}
	console.log('statecountarray Value '+statecountarray);
	if(statecountarray.length == 0){
		document.getElementById('errAddCourseStateCode').innerHTML = errMsg['80547'];
		console.log("Value Empty");
	}else{
		document.getElementById('errAddCourseStateCode').innerHTML = "";
		console.log("Value Not Empty");
	}
});

var doc_array = true;
var course_state_array = false;
var date_value = false;

function OBEmptyValidation()
{	
	var js_drd_courseType = document.getElementById('selAddCourseId').value!="";
	var js_drd_courseNum = document.getElementById('txtAddCourseNumId').value!="";
	var js_drd_courseName = document.getElementById('txtAddTitleId').value!="";
	var js_drd_courseDesc = document.getElementById('txtAddCourseDescId').value!="";
	var js_drd_instructorName = document.getElementById('txtAddInstructorId').value!="";
	var js_drd_courseCredit = document.getElementById('selCECreditsId').value!="";
	var js_drd_coursevideoUrl = document.getElementById('txtAddVideoUrlId').value!="";
	var js_drd_date = document.getElementById('txtAddDateId').value!="";
	
	var js_drd_quest1 = document.getElementById('txtAddQuestion1Id').value!="";
	var js_drd_quest1Ans1 = document.getElementById('txtAddQstn1Ans1Id').value!="";
	var js_drd_quest1Ans2 = document.getElementById('txtAddQstn1Ans2Id').value!="";
	var js_drd_quest1Ans3 = document.getElementById('txtAddQstn1Ans3Id').value!="";
	var js_drd_quest1Ans4 = document.getElementById('txtAddQstn1Ans4Id').value!="";
	
	var js_drd_quest2 = document.getElementById('txtAddQstn2Id').value!="";
	var js_drd_quest2Ans1 = document.getElementById('txtAddQstn2Ans1Id').value!="";
	var js_drd_quest2Ans2 = document.getElementById('txtAddQstn2Ans2Id').value!="";
	var js_drd_quest2Ans3 = document.getElementById('txtAddQstn2Ans3Id').value!="";
	var js_drd_quest2Ans4 = document.getElementById('txtAddQstn2Ans4Id').value!="";
	
	var js_drd_quest3 = document.getElementById('txtAddQstn3Id').value!="";
	var js_drd_quest3Ans1 = document.getElementById('txtAddQstn3Ans1Id').value!="";
	var js_drd_quest3Ans2 = document.getElementById('txtAddQstn3Ans2Id').value!="";
	var js_drd_quest3Ans3 = document.getElementById('txtAddQstn3Ans3Id').value!="";
	var js_drd_quest3Ans4 = document.getElementById('txtAddQstn3Ans4Id').value!="";
	
	var js_drd_quest4 = document.getElementById('txtAddQstn4Id').value!="";
	var js_drd_quest4Ans1 = document.getElementById('txtAddQstn4Ans1Id').value!="";
	var js_drd_quest4Ans2 = document.getElementById('txtAddQstn4Ans2Id').value!="";
	var js_drd_quest4Ans3 = document.getElementById('txtAddQstn4Ans3Id').value!="";
	var js_drd_quest4Ans4 = document.getElementById('txtAddQstn4Ans4Id').value!="";
	
	var js_drd_quest5 = document.getElementById('txtAddQstn5Id').value!="";
	var js_drd_quest5Ans1 = document.getElementById('txtAddQstn5Ans1Id').value!="";
	var js_drd_quest5Ans2 = document.getElementById('txtAddQstn5Ans2Id').value!="";
	var js_drd_quest5Ans3 = document.getElementById('txtAddQstn5Ans3Id').value!="";
	var js_drd_quest5Ans4 = document.getElementById('txtAddQstn5Ans4Id').value!="";
	
	var js_drd_essayQuest = document.getElementById('txtAddEssayQstnId').value!="";
	var js_drd_passScore = document.getElementById('txtAddScoreId').value!="";
	
	var getDate = document.getElementById('txtAddDateId').value;
	var date = new Date(getDate);
	var convert_toDate= $.datepicker.formatDate('M dd,yy',new Date()); 
	var sys_date = new Date(convert_toDate);
 
    if (date >= sys_date) {
		date_value  = true;
    } else {
		date_value  = false;
	}
	var $crsStateempty = $('.clsState').filter(function() {
		return this.value != ''
	});
	console.log("crsStateempty"+$crsStateempty.length);
	if ($crsStateempty.length == 0) 
	{
		course_state_array = false;
	}
	else
	{
		course_state_array = true; 
	}
	
	var $docempty = $("input[type='file'][name*='files']").filter(function (){
		return this.value!= ''
	});
	console.log("docempty"+$docempty.length);
	if(($docempty.length == 0) || ($docempty.length <= 0))
	{
		//alert("NOt Empty");
		doc_array = true;
	}
	else
	{
		//alert("Empty");
		doc_array = false; 
	}
	
	console.log("doc_array "+doc_array);
	console.log("course_state_array "+course_state_array);
	
	if(js_drd_courseType && js_drd_courseNum && js_drd_courseName && js_drd_courseDesc && js_drd_instructorName && js_drd_courseCredit && js_drd_date && js_drd_coursevideoUrl && js_drd_quest1 && js_drd_quest1Ans1 && js_drd_quest1Ans2 && js_drd_quest1Ans3 && js_drd_quest1Ans4 && js_drd_quest2 && js_drd_quest2Ans1 && js_drd_quest2Ans2 && js_drd_quest2Ans3 && js_drd_quest2Ans4 && js_drd_quest3 && js_drd_quest3Ans1 && js_drd_quest3Ans2 && js_drd_quest3Ans3 && js_drd_quest3Ans4 && js_drd_quest4 && js_drd_quest4Ans1 && js_drd_quest4Ans2 && js_drd_quest4Ans3 && js_drd_quest4Ans4 && js_drd_quest5 && js_drd_quest5Ans1 && js_drd_quest5Ans2 && js_drd_quest5Ans3 && js_drd_quest5Ans4 && js_drd_passScore && ((doc_array && course_state_array && date_value) == true))
	{
		if($.trim($('#selAddCourseId :selected').text()) == 'DIPLOMATE PROGRAM')
		{
			if(js_drd_essayQuest)
			{
				document.getElementById("addSaveBtnId").disabled = false; 	
			}
			else
			{
				document.getElementById("addSaveBtnId").disabled = true; 	
				//document.getElementById("addSaveBtnId").disabled = false; 	
			}
		}
		else
		{
			document.getElementById("addSaveBtnId").disabled = false; 	
		}
		
	}
	else
	{
		document.getElementById("addSaveBtnId").disabled = true; 
		//document.getElementById("addSaveBtnId").disabled = false; 
	}
}


$('#addSaveBtnId').click(function(){
	
	var ajaxData = new FormData($("#formAddCourseId")[0]);
	
		var ins = document.getElementsByClassName('fileCls').length;
		console.log("ins "+ins);
		for (var x = 1; x <= ins; x++) {
			if(document.getElementById('txtAddFileId'+x).value !="")
			{
				console.log(document.getElementById('txtAddFileId'+x).value);
				//console.log("fileName"+x+"= "+document.getElementById('txtAddFileId'+x).files[0]);
				ajaxData.append("files[]", document.getElementById('txtAddFileId'+x).files[0]);
			}
		}
	
	var course_state = [];	
	var courseState = document.getElementsByClassName("courseState");  
	console.log(courseState.length);
	for (var i = 1; i <= courseState.length; i++)
	{
		course_state.push({state_id:document.getElementById('stateId'+i).value,
		state_code_name:document.getElementById('statecodeId'+i).value});
		
	}
	var course_quiz = [];
	course_quiz.push(
	{
		quest_name:document.getElementById('txtAddQuestion1Id').value,
		answer1:document.getElementById('txtAddQstn1Ans1Id').value,
		answer2:document.getElementById('txtAddQstn1Ans2Id').value,
		answer3:document.getElementById('txtAddQstn1Ans3Id').value,
		answer4:document.getElementById('txtAddQstn1Ans4Id').value
	},
	{
		quest_name:document.getElementById('txtAddQstn2Id').value,
		answer1:document.getElementById('txtAddQstn2Ans1Id').value,
		answer2:document.getElementById('txtAddQstn2Ans2Id').value,
		answer3:document.getElementById('txtAddQstn2Ans3Id').value,
		answer4:document.getElementById('txtAddQstn2Ans4Id').value
	},
	{
		quest_name:document.getElementById('txtAddQstn3Id').value,
		answer1:document.getElementById('txtAddQstn3Ans1Id').value,
		answer2:document.getElementById('txtAddQstn3Ans2Id').value,
		answer3:document.getElementById('txtAddQstn3Ans3Id').value,
		answer4:document.getElementById('txtAddQstn3Ans4Id').value
	},
	{
		quest_name:document.getElementById('txtAddQstn4Id').value,
		answer1:document.getElementById('txtAddQstn4Ans1Id').value,
		answer2:document.getElementById('txtAddQstn4Ans2Id').value,
		answer3:document.getElementById('txtAddQstn4Ans3Id').value,
		answer4:document.getElementById('txtAddQstn4Ans4Id').value
	},
	{
		quest_name:document.getElementById('txtAddQstn5Id').value,
		answer1:document.getElementById('txtAddQstn5Ans1Id').value,
		answer2:document.getElementById('txtAddQstn5Ans2Id').value,
		answer3:document.getElementById('txtAddQstn5Ans3Id').value,
		answer4:document.getElementById('txtAddQstn5Ans4Id').value
	},
	);
	console.log("course_quiz "+course_quiz);	
	ajaxData.append('coursestate',JSON.stringify(course_state));		
	ajaxData.append('coursequiz',JSON.stringify(course_quiz));
	
	ajaxData.append('selAddCourseNam',$.trim($('#selAddCourseId :selected').val()));
	ajaxData.append('selAddCourseTypeNam',$.trim($('#selAddCourseId :selected').text()));
	ajaxData.append('txtAddCourselength',credit_time);
	ajaxData.append('txtAddCourseNumNam',$('#txtAddCourseNumId').val());
	ajaxData.append('txtAddTitleNam',$('#txtAddTitleId').val());
	ajaxData.append('txtAddCourseDescNam',$('#txtAddCourseDescId').val());
	ajaxData.append('txtAddInstructorNam',$('#txtAddInstructorId').val());
	ajaxData.append('selCECreditsNam',$('#selCECreditsId :selected').text());
	ajaxData.append('txtAddDateNam',$('#txtAddDateId').val());
	ajaxData.append('txtAddVideoUrlNam',$('#txtAddVideoUrlId').val());
	ajaxData.append('txtAddQuestion1Nam',$('#txtAddQuestion1Id').val());
	ajaxData.append('txtAddQstn1Ans1Nam',$('#txtAddQstn1Ans1Id').val());
	ajaxData.append('txtAddQstn1Ans2Nam',$('#txtAddQstn1Ans2Id').val());
	ajaxData.append('txtAddQstn1Ans3Nam',$('#txtAddQstn1Ans3Id').val());
	ajaxData.append('txtAddQstn1Ans4Nam',$('#txtAddQstn1Ans4Id').val());
	ajaxData.append('txtAddQstn2Nam',$('#txtAddQstn2Id').val());
	ajaxData.append('txtAddQstn2Ans1Nam',$('#txtAddQstn2Ans1Id').val());
	ajaxData.append('txtAddQstn2Ans2Nam',$('#txtAddQstn2Ans2Id').val());
	ajaxData.append('txtAddQstn2Ans3Nam',$('#txtAddQstn2Ans3Id').val());
	ajaxData.append('txtAddQstn2Ans4Nam',$('#txtAddQstn2Ans4Id').val());
	ajaxData.append('txtAddQstn3Nam',$('#txtAddQstn3Id').val());
	ajaxData.append('txtAddQstn3Ans1Nam',$('#txtAddQstn3Ans1Id').val());
	ajaxData.append('txtAddQstn3Ans2Nam',$('#txtAddQstn3Ans2Id').val());
	ajaxData.append('txtAddQstn3Ans3Nam',$('#txtAddQstn3Ans3Id').val());
	ajaxData.append('txtAddQstn3Ans4Nam',$('#txtAddQstn3Ans4Id').val());
	ajaxData.append('txtAddQstn4Nam',$('#txtAddQstn4Id').val());
	ajaxData.append('txtAddQstn4Ans1Nam',$('#txtAddQstn4Ans1Id').val());
	ajaxData.append('txtAddQstn4Ans2Nam',$('#txtAddQstn4Ans2Id').val());
	ajaxData.append('txtAddQstn4Ans3Nam',$('#txtAddQstn4Ans3Id').val());
	ajaxData.append('txtAddQstn4Ans4Nam',$('#txtAddQstn4Ans4Id').val());
	ajaxData.append('txtAddQstn5Nam',$('#txtAddQstn5Id').val());
	ajaxData.append('txtAddQstn5Ans1Nam',$('#txtAddQstn5Ans1Id').val());
	ajaxData.append('txtAddQstn5Ans2Nam',$('#txtAddQstn5Ans2Id').val());
	ajaxData.append('txtAddQstn5Ans3Nam',$('#txtAddQstn5Ans3Id').val());
	ajaxData.append('txtAddQstn5Ans4Nam',$('#txtAddQstn5Ans4Id').val());
	ajaxData.append('txtAddEssayQstnNam',$('#txtAddEssayQstnId').val());
	ajaxData.append('selAddScoreNam',$('#txtAddScoreId').val());
	btn_loading_fun();
	$("#addSaveBtnId").prop("disabled", true);
	$("#addSaveBtnId").css("cursor", "wait");	
	//alert($("#addSaveBtnId").val());
	console.log("ajaxData "+ajaxData);
	var js_drd_AddCourseData = $("#formAddCourseId").serialize();
	$.ajax({		
		url: "<?php echo site_url(); ?>"+ "/addcoursedata",
		//dataType: 'text', // what to expect back from the PHP script
		cache: false,
		contentType: false,
		processData: false,
		//mimeType:"multipart/form-data",
		data: ajaxData,
		type: 'post',
		data:ajaxData,
		success: function(ajx_drd_AddCourseResult) {
			var js_drd_AddCourse = $.parseJSON(ajx_drd_AddCourseResult);
			console.log("Return Value "+ajx_drd_AddCourseResult);
			if (js_drd_AddCourse['message'] != "") {
				if(js_drd_AddCourse['message_type'] ==  "SUCCESS"){
					document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddCourse['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/courses"; }, 1000);					
				}else {
					document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddCourse['message']+"</div>";
				}
				$("#addSaveBtnId").prop("disabled", false);
				$("#addSaveBtnId").css("cursor", "pointer");	
			$('html, body').animate({ scrollTop: 0 }, 'fast');
			} else { 
				$('html, body').animate({ scrollTop: 0 }, 'fast');
				$("#addSaveBtnId").prop("disabled", false);
				$("#addSaveBtnId").css("cursor", "pointer");
				
				$("#errAddCourseId").text(js_drd_AddCourse['AddCourse']);
				$("#errAddCourseNumId").text(js_drd_AddCourse['AddCourseNum']);
				$("#errAddTitleId").text(js_drd_AddCourse['AddTitle']);
				$("#errAddCourseDescId").text(js_drd_AddCourse['AddCourseDesc']);
				$("#errAddInstructorId").text(js_drd_AddCourse['AddInstructor']);
				$("#errAddCECreditsId").text(js_drd_AddCourse['AddCECredits']);
				$("#errAddDateId").text(js_drd_AddCourse['AddDate']);
				$("#errAddVideoUrlId").text(js_drd_AddCourse['AddVideoUrl']);
				//document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddCourse['AddFile']+"</div>";
				$("#errAddFileId1").text(js_drd_AddCourse['AddFile']);
				$("#errAddCourseStateCode").text(js_drd_AddCourse['AddStateCode']);
				$("#errAddQuestion1Id").text(js_drd_AddCourse['AddQuestion1']);
				$("#errAddQstn1Ans1Id").text(js_drd_AddCourse['AddQstn1Ans1']);
				$("#errAddQstn1Ans2Id").text(js_drd_AddCourse['AddQstn1Ans2']);
				$("#errAddQstn1Ans3Id").text(js_drd_AddCourse['AddQstn1Ans3']);
				$("#errAddQstn1Ans4Id").text(js_drd_AddCourse['AddQstn1Ans4']);
				$("#errAddQstn2Id").text(js_drd_AddCourse['AddQuestion2']);
				$("#errAddQstn2Ans1Id").text(js_drd_AddCourse['AddQstn2Ans1']);
				$("#errAddQstn2Ans2Id").text(js_drd_AddCourse['AddQstn2Ans2']);
				$("#errAddQstn2Ans3Id").text(js_drd_AddCourse['AddQstn2Ans3']);
				$("#errAddQstn2Ans4Id").text(js_drd_AddCourse['AddQstn2Ans4']);
				$("#errAddQstn3Id").text(js_drd_AddCourse['AddQuestion3']);
				$("#errAddQstn3Ans1Id").text(js_drd_AddCourse['AddQstn3Ans1']);
				$("#errAddQstn3Ans2Id").text(js_drd_AddCourse['AddQstn3Ans2']);
				$("#errAddQstn3Ans3Id").text(js_drd_AddCourse['AddQstn3Ans3']);
				$("#errAddQstn3Ans4Id").text(js_drd_AddCourse['AddQstn3Ans4']);
				$("#errAddQstn4Id").text(js_drd_AddCourse['AddQuestion4']);
				$("#errAddQstn4Ans1Id").text(js_drd_AddCourse['AddQstn4Ans1']);
				$("#errAddQstn4Ans2Id").text(js_drd_AddCourse['AddQstn4Ans2']);
				$("#errAddQstn4Ans3Id").text(js_drd_AddCourse['AddQstn4Ans3']);
				$("#errAddQstn4Ans4Id").text(js_drd_AddCourse['AddQstn4Ans4']);
				$("#errAddQstn5Id").text(js_drd_AddCourse['AddQuestion5']);
				$("#errAddQstn5Ans1Id").text(js_drd_AddCourse['AddQstn5Ans1']);
				$("#errAddQstn5Ans2Id").text(js_drd_AddCourse['AddQstn5Ans2']);
				$("#errAddQstn5Ans3Id").text(js_drd_AddCourse['AddQstn5Ans3']);
				$("#errAddQstn5Ans4Id").text(js_drd_AddCourse['AddQstn5Ans4']);
				$("#errAddEssayQstnId").text(js_drd_AddCourse['AddEssayQstn']);
				$("#errAddScoreId").text(js_drd_AddCourse['AddScore']);
			}
			btn_loading_dismissfun();
		},
		error: function() {
			btn_loading_dismissfun();
			$('html, body').animate({ scrollTop: 0 }, 'fast');
			$("#addSaveBtnId").prop("disabled", false);
			$("#addSaveBtnId").css("cursor", "pointer");
			
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
		}
	});		
});

function courseNum_exists(valueId,errId) {
	var js_drd_course_num=document.getElementById(valueId).value;
	if(js_drd_course_num=="")	{
		document.getElementById(errId).innerHTML = errMsg['80547'];
	} else 	{
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/coursenum-exists",			
			data:{
			'ajx_txtCourseNum':js_drd_course_num
			},
			success: function(ajx_return) {
				var js_ReturnMessage = $.parseJSON(ajx_return);
				console.log("Return Register form post value "+JSON.stringify(js_ReturnMessage));
				if (js_ReturnMessage['message'] != "") {
					document.getElementById(errId).innerHTML = js_ReturnMessage['message'];
				} else {
					document.getElementById(errId).innerHTML="";
				}
			},
			error: function(){
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
			});	
	}
}

/* $(".clsState").blur(function(){
	var state = $('.clsState').val();	
	if(state == "") {
		alert("state required");
	} else {
		alert("Pass");
	}
}); */
</script>