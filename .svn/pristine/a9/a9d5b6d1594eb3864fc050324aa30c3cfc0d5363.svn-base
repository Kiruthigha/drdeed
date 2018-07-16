<style>
input textarea{
	padding-left:0px;
	font-family: Arial;
	font-weight: 700;
}
div.col-lg-3{
	padding-right:0px !important;
}

</style>
<?php if($courses['ID']){?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
							<div id="editPromoCode_Message"></div>
							<form class="form-horizontal" action="" id="editCourseFormId"  enctype="multipart/form-data" >
								<div class="row">
									<div class="col-md-5"  style="padding-right:0px;">
										<h1 class="labeltext">Edit Course</h1>
									</div>
									
									<input type="hidden" id="txtEditCourseId" value="<?php echo $courses['ID'];?>" />
										
									<div class="col-md-3" style="margin-top:35px;">
									<select class="form-control" id="selEditCourseId" name="selEditCourseNam" tabindex="1" onblur="validateMandatory('selEditCourseId','errEditCourseId');" disabled >
											<option value="" >Select Course</option>
											<?php foreach($course_type as $course_type): ?>
											<option value="<?php echo $course_type['ID'];?>"> <?php echo trim($course_type['VALUE_NAME']); ?> </option>
											<?php endforeach;?>
									</select>
									<span style="color:red;" id="errEditCourseId"></span>
									</div>
								</div>
								<div id="message"></div>
								<p></p>
									<div class="form-group">
									<label class="col-md-2">Course#</label>
									<div class="col-md-7">
										<div class="row">
											<div class="col-md-1" style="padding-top:5px;padding-left:0px;">
											<?php if($course_type_name =='CE')
											{?>
												<label class="col-md-2 ceducation">CE- </label>
											<?php
											}
											else
											{ 
											?>							<label class="col-md-2 deducation">DN- </label>
											<?php }  ?>
												
											</div>
											<div class="col-md-11">
												<input type="text" placeholder="" value="<?php echo $courses['COURSE_NUM']; ?>" class="form-control" id="txtEditCourseNoId" name="txtEditCourseNoNam" tabindex="2" onkeypress="return numbersonlyEntry(event);" maxlength="5" onblur="validateMandatory('txtEditCourseNoId','errEditCourseNoId');" disabled />
												<span style="color:red;" id="errEditCourseNoId"></span>
											</div>
										</div>
									</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-2">Course Name / Title</label>
										<div class="col-lg-7"><input type="text" placeholder="" value="<?php echo htmlentities($courses['COURSE_NAME']); ?>" class="form-control" id="txtEditCourseTitleId" name="txtEditCourseTitleNam" maxlength="100" tabindex="3" onkeypress="return OKValidateAlphaSpecialNumeric(event);" onblur="validateMandatory('txtEditCourseTitleId','errEditCourseTitleId');OBEmptyValidation();" />
										<span style="color:red;" id="errEditCourseTitleId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Course Description</label>
										<div class="col-lg-7"><textarea class="form-control" id="txtEditCourseDescId" name="txtEditCourseDescNam" tabindex="4" onkeypress="return restrictHTMLTagEntry(event);" onblur="validateMandatory('txtEditCourseDescId','errEditCourseDescId');OBEmptyValidation();" maxlength="2000" ><?php echo htmlentities($courses['COURSE_DESCRIPTION']); ?></textarea>
										<span style="color:red;" id="errEditCourseDescId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Instructor Name</label>
										<div class="col-lg-7"><input type="text" placeholder="" value="<?php echo htmlentities($courses['INSTRUCTOR_NAME']); ?>" class="form-control" id="txtEditInstructorNameId" name="txtEditInstructorNameNam" tabindex="5" onkeypress="return OKValidateAlphaOnly(event);" maxlength="100" onblur="validateMandatory('txtEditInstructorNameId','errEditInstructorNameId');OBEmptyValidation();" /><span style="color:red;" id="errEditInstructorNameId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 font-normal">CE Credits</label>
										<div class="col-lg-2">
											<select class="form-control chosen-select" id="selEditCECreditsId" name="selEditCECreditsNam" tabindex="6" onblur="validateMandatory('selEditCECreditsId','errEditCECreditsId');OBEmptyValidation();" onchange="credit_change();OBEmptyValidation();">
											<option value="" >Select Credits</option>
											<option value="0.5">0.5</option>
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
											<span style="color:red;" id="errEditCECreditsId"></span>
									</div>
									<div class="col-md-2" style="padding-top:10px;padding-right:0px;">
										<p> Time: <b><span id="spnEditTimeId"><?php echo $time; ?></span></b></p>
										</div>
										<div class="col-md-2">
										<p style="padding-top:10px;" > Cost: <b><span id="spnAmountId">$<?php echo $cost; ?></span></b></p>
										</div>							
									</div>
									<div class="form-group">
										<label class="col-lg-2">Creation Date</label>
										<div class="col-lg-2"><input type="text" placeholder="" value="<?php echo $this->common_functions->date_display_format($courses['PUBLISH_DATE']);?>" class="form-control crtDatePicker" id="txtEditCreationDateId" name="txtEditCreationDateNam" tabindex="7" readonly onblur="validateMandatory('txtEditCreationDateId','errEditCreationDateId');OBEmptyValidation();" onchange="validateMandatory('txtEditCreationDateId','errEditCreationDateId');OBEmptyValidation();" /><span style="color:red;" id="errEditCreationDateId"></span></div>
									</div> 
									<div class="form-group">
										<label class="col-lg-2">Video URL</label>
										<div class="col-lg-7"><input type="text" placeholder="" value="<?php echo htmlentities($courses['COURSE_VIDEO_URL']); ?>" class="form-control" id="txtEditVideoUrlId" maxlength="300" name="txtEditVideoUrlNam" tabindex="8" onblur="validateMandatory('txtEditVideoUrlId','errEditVideoUrlId');OBEmptyValidation();" onkeypress="return numbersonlyEntry(event);" /><span style="color:red;" id="errEditVideoUrlId"></span></div>
									</div>
									<center><label style="padding-top:0px;" class="col-lg-11"><b><?php echo $this->lang->line('file_size'); ?></b></label></center>
									<?php $j=1;
									$doc_count = count($course_doc);
									foreach($course_doc as $course_doc):
									$file_count = $j+1;
									?>
									<div class="form-group pdfHideCLs<?php echo $j;?>">
										<label class="col-lg-2">PDF Course Notes <?php echo $j;?></label>
										<div class="col-lg-7">
										<input type="hidden" placeholder="" class="form-control editFileList" id="docId<?php echo $j;?>" name="docNam<?php echo $j;?>" value="<?php echo $course_doc['ID'];?>" />
										<div class="fileinput fileinput-new input-group" data-provides="fileinput" style="z-index:1;">
										<div class="form-control" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file file_db fileinput-exists"></i>
											<span id="file_db"><?php echo $course_doc['DOC_FILE_PATH'];?></span>
										</div>
										<span class="input-group-addon">
											<a  onclick="removeDoc(<?php echo $course_doc['ID'];?>,<?php echo $j;?>,'<?php echo $course_doc['DOC_FILE_PATH'];?>');OBEmptyValidation();remove_file(<?php echo $j;?>);" class="">Remove</a>
										</span>
									</div> 
									</div>
									</div>
									
									<div hidden class="form-group pdfEnableCLs<?php echo $j;?>">
										<label class="col-lg-2">PDF Course Notes <?php echo $j;?></label>
										<div class="col-lg-7">
										<div class="fileinput fileinput-new input-group" data-provides="fileinput" style="z-index:1;">
										<div class="form-control" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file fileinput-exists"></i>
											<span class="fileinput-filename"></span>
										</div>
										<span class="input-group-addon btn btn-default btn-file">
											<span class="fileinput-new" onclick="OBEmptyValidation();remove_file_error('errEditFileId');">Upload..</span>
											<span class="fileinput-exists" onclick="OBEmptyValidation();remove_file_error('errEditFileId');">Change</span>
											<input type="file" class="fileCls" id="txtEditFileId<?php echo $j;?>" onblur="remove_file_error('errEditFileId<?php echo $j;?>');OBEmptyValidation();" tabindex="9" onchange="remove_file_error('errEditFileId<?php echo $j;?>');OBEmptyValidation();" name="files" />
										</span>
									<a onclick="OBEmptyValidation();remove_file(<?php echo $j;?>);" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div> 
									<span id="errEditFileId<?php echo $j;?>" style="color:red;"></span>
									</div>
									
									</div>
									<?php $j++;
									endforeach;?>
									
									<?php $count = $j-1;
									$inscount = $j+1;
									if($doc_count == $count)
									{?>
									<div class="form-group file_remove<?php echo $j;?>">
										<label class="col-lg-2">PDF Course Notes <?php echo $j;?></label>
										<div class="col-lg-7">
										<div class="fileinput fileinput-new input-group" data-provides="fileinput" style="z-index:1;">
										<div class="form-control" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file fileinput-exists"></i>
											<span class="fileinput-filename"></span>
										</div>
										<span class="input-group-addon btn btn-default btn-file">
											<span class="fileinput-new" onclick="OBEmptyValidation();remove_file_error('errEditFileId<?php echo $j;?>');">Upload..</span>
											<span class="fileinput-exists" onclick="OBEmptyValidation();remove_file_error('errEditFileId<?php echo $j;?>');">Change</span>
											<input type="file" class="fileCls" id="txtEditFileId<?php echo $j;?>" onblur="remove_file_error('errEditFileId<?php echo $j;?>');OBEmptyValidation();" tabindex="9" onchange="remove_file_error('errEditFileId<?php echo $j;?>');OBEmptyValidation();" name="files" />
										</span>
									<a onclick="OBEmptyValidation();remove_file(<?php echo $j;?>)" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div> 
									<span id="errEditFileId<?php echo $j;?>" style="color:red;"></span>
									</div>
									<div class="col-lg-2 addmorelink" style="padding-top:10px;">
										<a onclick="addmorefunction(<?php echo $inscount;?>)" >Add More</a>
									</div> 
									</div>
									<?php 
									}
									?>
									<div id="addmoreUploadId"></div>
									<input type="hidden" placeholder="" class="form-control " id="hiddenstatecodeid" name="hiddenstatecodeNam" />
									<div class="form-group">
									<div class="col-lg-2">
										<label class="col-lg-12" style="padding-left:0px;">State Specific Codes</label>
										<span class="help-block m-b-none" style="font-size:12px;">Leave blank to exclude State</span>
										</div>
										<span style="color:red;" id="errEditCourseStateCode"></span>
										<div class="col-lg-7">
										<?php $i=1;
										foreach($course_states as $state): ?>
											<div class="col-lg-3">
												<label style="padding-left:0px;"><?php echo $state['STATE_NAME']; ?></label>
											</div>
											
											<div class="col-lg-3 courseState"  style="margin-bottom:7px;">
												<input type="hidden" id="stateId<?php echo  $i;?>" value="<?php echo $state['STATE_ID']; ?>" />
												<input type="text" id="statecodeId<?php echo  $i;?>" placeholder="" class="form-control clsState" maxlength="10" tabindex="10"value="<?php echo htmlentities($state['STATE_COURSE_CODE']); ?>"  onblur="OBEmptyValidation();"/>
											</div>
											<?php  $i++;
											endforeach; ?>
										</div>										
									</div>
									<?php $i=1;
									foreach($obj_questions as $obj_questions): ?>
									<div class="form-group">
										<label class="col-lg-2">Question <?php echo $i;?></label>
										<div class="col-lg-7">
											<div class="col-lg-12" style="margin-bottom:10px;">
											<input type="hidden" placeholder="" class="form-control" id="txtQuestionId<?php echo $i;?>" value="<?php echo $obj_questions['ID'];?>" />
												<input type="text" placeholder="" class="form-control" id="txtEditQuestion<?php echo $i;?>Id" name="txtEditQuestion<?php echo $i;?>Nam" tabindex="11" onblur="validateMandatory('txtEditQuestion<?php echo $i;?>Id','errEditQuestion<?php echo $i;?>Id');OBEmptyValidation();" value="<?php echo htmlentities($obj_questions['QUIZ_QUESTION']);?>" maxlength="600"/>
												<span style="color:red;" id="errEditQuestion<?php echo $i;?>Id"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Correct Answer</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" id="txtEditQ<?php echo $i;?>CorrectAnswer1Id" name="txtEditQ<?php echo $i;?>CorrectAnswer1Nam" tabindex="11" onblur="validateMandatory('txtEditQ<?php echo $i;?>CorrectAnswer1Id','errEditQ<?php echo $i;?>CorrectAnswer1Id');OBEmptyValidation();" value="<?php echo htmlentities($obj_questions['ANSWER_OPTION_A']);?>" maxlength="120" />
												<span style="color:red;" id="errEditQ<?php echo $i;?>CorrectAnswer1Id"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 2</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" id="txtEditQ<?php echo $i;?>Answer2Id" name="txtEditQ<?php echo $i;?>Answer2Nam" tabindex="11" onblur="validateMandatory('txtEditQ<?php echo $i;?>Answer2Id','errEditQ<?php echo $i;?>Answer2Id');OBEmptyValidation();" value="<?php echo htmlentities($obj_questions['ANSWER_OPTION_B']);?>" maxlength="120" />
												<span style="color:red;" id="errEditQ<?php echo $i;?>Answer2Id"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 3</label>
											</div>
											<div class="col-lg-9" style="margin-bottom:15px;">
												<input type="text" placeholder="" class="form-control" id="txtEditQ<?php echo $i;?>Answer3Id" name="txtEditQ<?php echo $i;?>Answer3Nam" tabindex="11" onblur="validateMandatory('txtEditQ<?php echo $i;?>Answer3Id','errEditQ<?php echo $i;?>Answer3Id');OBEmptyValidation();" value="<?php echo htmlentities($obj_questions['ANSWER_OPTION_C']);?>" maxlength="120" />
												<span style="color:red;" id="errEditQ<?php echo $i;?>Answer3Id"></span>
											</div>
											<div class="col-lg-3">
												<label style="padding-left:0px;">Answer 4</label>
											</div>
											<div class="col-lg-9" >
												<input type="text" placeholder="" class="form-control" id="txtEditQ<?php echo $i;?>Answer4Id" name="txtEditQ<?php echo $i;?>Answer4Nam" tabindex="11" onblur="validateMandatory('txtEditQ<?php echo $i;?>Answer4Id','errEditQ<?php echo $i;?>Answer4Id');OBEmptyValidation();" value="<?php echo htmlentities($obj_questions['ANSWER_OPTION_D']);?>" maxlength="120" />
												<span style="color:red;" id="errEditQ<?php echo $i;?>Answer4Id"></span>
											</div>
										</div>
									</div>
									<?php $i++;
									endforeach;?>
									<?php if($question_type == 'SUBJECTIVE')
									{
									?>	
									<div class="form-group  easyQuestion">
										<label class="col-lg-2">Essay Question</label>
										<div class="col-md-7">
										<input type="hidden" placeholder="" class="form-control" id="txtSubQuestionId" value="<?php echo $sub_questions['ID'];?>" />
											<input type="text" placeholder="" class="form-control" id="txtEditEssayQuestionId" name="txtEditEssayQuestionNam" tabindex="12" onblur="validateMandatory('txtEditEssayQuestionId','errEditEssayQuestionId');OBEmptyValidation();" value="<?php echo htmlentities($sub_questions['QUIZ_QUESTION']);?>" maxlength="600" />
												<span style="color:red;" id="errEditEssayQuestionId"></span>
										</div>
									</div>
									<?php  }  ?>
									<div class="form-group">
										<label class="col-lg-2">Passing Score</label>
										<div class="col-md-3">
											<select class="form-control chosen-select" id="selEditPassingScoreId" name="selEditPassingScoreNam" tabindex="13" onblur="validateMandatory('selEditPassingScoreId','errEditPassingScoreId');OBEmptyValidation();">
											<option value="" >Select Passing Score</option>
											<option value="0" >0%</option>
											<option value="20" >20%</option>
											<option value="40" >40%</option>
											<option value="60" >60%</option>
											<option value="80" >80%</option>
											<option value="100" >100%</option>
											</select>
											<span style="color:red;" id="errEditPassingScoreId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-7">
										<button class="btn btn-lg btn-success pull-right" id="editCourseSaveBtnId" tabindex="14" type="button" onclick="drd_BtnEditCourseSave();"><strong>Save</strong></button>
										<a class="btn btn-lg  btn-primary  pull-right" tabindex="15" href="<?php echo site_url(); ?>/courses"><strong>Cancel</strong></a>
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
var courseCost = '<?php echo $cost; ?>';
$('#selEditCECreditsId').val(2.0);
$('#selEditCourseId').val(<?php echo trim($courses['COURSE_TYPE']); ?>);
$('#selEditPassingScoreId').val(<?php echo trim($courses['PASS_PERCENT']); ?>);
credit_change();
var credit_time;
var start = Date.now();
function credit_change(){
	var credit = $('#selEditCECreditsId :selected').val();
	var credit_text = $('#selEditCECreditsId :selected').text();
	var time =  credit_text * 60.00; 
	//console.log("time "+time);
     var hours = leftPad(Math.floor(Math.abs(time) / 3600));  
     var minutes = leftPad(Math.floor(Math.abs(time) / 60));  
		var sec = leftPad(Math.abs(time) % 60); 
   // var sec = hours-minutes;
	credit_time = hours+ ":"+minutes+":"+sec;
	$('#spnEditTimeId').text(credit_time);
	if($.trim($('#selEditCourseId :selected').text()) == 'CONTINUING EDUCATION'){
		console.log(courseCost);
		if(!((credit == 0.5) || (credit == 1.2)))
		{
			var amount = (credit  * courseCost) *2+".00";
		}
		else
		{
			var amount = courseCost;
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

console.log("$course_credit"+<?php echo $course_credit; ?>);
console.log("$PASS_PERCENT"+<?php echo trim($courses['PASS_PERCENT']); ?>);

$('.chosen-select1').chosen({width: "100%"});
if($('#file_db').text()!="")
{
	$('.file_db').show();
}
$('.crtDatePicker').datepicker({
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd, yy'
    });
	

var statecountarray = [];
$('.clsState').blur(function(){	
 var code = document.getElementsByClassName('clsState');
    for (var i = 0; i < code.length; i++){
        if(code[i].value !=""){
			console.log(' inside if State code is '+code[i].value);
			statecountarray.push(code[i].value);
			break;
		}else{
				console.log(' inside else State code is '+code[i].value);
				statecountarray=[];
		}
	}
	console.log('statecountarray Value '+statecountarray);
	if(statecountarray.length == 0){
		document.getElementById('errEditCourseStateCode').innerHTML = errMsg['80547'];
		console.log("Value Empty");
	}else{
		document.getElementById('errEditCourseStateCode').innerHTML = "";
		console.log("Value Not Empty");
	}
});

var doc_remove_array=[];
function removeDoc(doc_id,no,file_path)
{
	//alert(doc_id);
	//alert(no);
	$('.pdfHideCLs'+no).remove();
	$('.pdfEnableCLs'+no).show();
	doc_remove_array.push({DocId:doc_id,FilePath:file_path});
}

function addmorefunction(addmorecount){
	var last_id = addmorecount-1;
	
	//alert(last_id);
	if($('#txtEditFileId'+last_id).val() !="")
	{
	//alert("inside if");
	var count = addmorecount+1
	var row = '<div class="form-group file_remove'+addmorecount+'"><label class="col-lg-2">PDF Course Notes '+addmorecount+'</label><div class="col-lg-7"><div class="fileinput fileinput-new input-group" data-provides="fileinput"><div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span></div><span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new" onclick="OBEmptyValidation();remove_file('+addmorecount+');">Upload..</span><span class="fileinput-exists" oonclick="OBEmptyValidation();remove_file('+addmorecount+');" >Change</span><input type="file" class="fileCls" id="txtEditFileId'+addmorecount+'" onblur="remove_file_error('+"'errEditFileId"+addmorecount+"'"+');OBEmptyValidation();" tabindex="9" onchange="remove_file_error('+"'errEditFileId"+addmorecount+"'"+');OBEmptyValidation();"  name="files" /></span><a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput" onclick=OBEmptyValidation();remove_file('+addmorecount+');">Remove</a></div><span id="errEditFileId'+addmorecount+'" style="color:red;"></span></div><div class="col-lg-2 addmorelink"style="padding-top:10px;"><a onclick="addmorefunction('+count+')" >Add More</a></div> </div>';
	$('.addmorelink').hide();
	$('#addmoreUploadId').append(row);
	}
	else
	{
		//alert("inside else");
		$("#errEditFileId"+last_id).text(errMsg["80547"]);
	}
}
var doc_array = true;
var course_state_array = true;
//var date_value = true;

function OBEmptyValidation()
{	
	var js_drd_courseType = document.getElementById('selEditCourseId').value!="";
	var js_drd_courseNum = document.getElementById('txtEditCourseNoId').value!="";
	var js_drd_courseName = document.getElementById('txtEditCourseTitleId').value!="";
	var js_drd_courseDesc = document.getElementById('txtEditCourseDescId').value!="";
	var js_drd_instructorName = document.getElementById('txtEditInstructorNameId').value!="";
	var js_drd_courseCredit = document.getElementById('selEditCECreditsId').value!="";
	var js_drd_date = document.getElementById('txtEditCreationDateId').value!="";
	var js_drd_coursevideoUrl = document.getElementById('txtEditVideoUrlId').value!="";
	
	var js_drd_quest1 = document.getElementById('txtEditQuestion1Id').value!="";
	var js_drd_quest1Ans1 = document.getElementById('txtEditQ1CorrectAnswer1Id').value!="";
	var js_drd_quest1Ans2 = document.getElementById('txtEditQ1Answer2Id').value!="";
	var js_drd_quest1Ans3 = document.getElementById('txtEditQ1Answer3Id').value!="";
	var js_drd_quest1Ans4 = document.getElementById('txtEditQ1Answer4Id').value!="";
	
	var js_drd_quest2 = document.getElementById('txtEditQuestion2Id').value!="";
	var js_drd_quest2Ans1 = document.getElementById('txtEditQ2CorrectAnswer1Id').value!="";
	var js_drd_quest2Ans2 = document.getElementById('txtEditQ2Answer2Id').value!="";
	var js_drd_quest2Ans3 = document.getElementById('txtEditQ2Answer3Id').value!="";
	var js_drd_quest2Ans4 = document.getElementById('txtEditQ2Answer4Id').value!="";
	
	var js_drd_quest3 = document.getElementById('txtEditQuestion3Id').value!="";
	var js_drd_quest3Ans1 = document.getElementById('txtEditQ3CorrectAnswer1Id').value!="";
	var js_drd_quest3Ans2 = document.getElementById('txtEditQ3Answer2Id').value!="";
	var js_drd_quest3Ans3 = document.getElementById('txtEditQ3Answer3Id').value!="";
	var js_drd_quest3Ans4 = document.getElementById('txtEditQ3Answer4Id').value!="";
	
	var js_drd_quest4 = document.getElementById('txtEditQuestion4Id').value!="";
	var js_drd_quest4Ans1 = document.getElementById('txtEditQ4CorrectAnswer1Id').value!="";
	var js_drd_quest4Ans2 = document.getElementById('txtEditQ4Answer2Id').value!="";
	var js_drd_quest4Ans3 = document.getElementById('txtEditQ4Answer3Id').value!="";
	var js_drd_quest4Ans4 = document.getElementById('txtEditQ4Answer4Id').value!="";
	
	var js_drd_quest5 = document.getElementById('txtEditQuestion5Id').value!="";
	var js_drd_quest5Ans1 = document.getElementById('txtEditQ5CorrectAnswer1Id').value!="";
	var js_drd_quest5Ans2 = document.getElementById('txtEditQ5Answer2Id').value!="";
	var js_drd_quest5Ans3 = document.getElementById('txtEditQ5Answer3Id').value!="";
	var js_drd_quest5Ans4 = document.getElementById('txtEditQ5Answer4Id').value!="";
	
	if($.trim($('#selEditCourseId :selected').text()) == 'DIPLOMATE PROGRAM')
	{
		var js_drd_essayQuest = document.getElementById('txtEditEssayQuestionId').value!="";
	}
	
	var js_drd_passScore = document.getElementById('selEditPassingScoreId').value!="";
	
	/* var getDate = document.getElementById('txtEditCreationDateId').value;
	var date = new Date(getDate);
    var toDate = new Date();
	
    if (date >= toDate) {
		console.log("inside if");
		date_value  = true;
    } else {
		console.log("inside Else");
		date_value  = false;
	} */
	
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
	
	var $db_fileList = $('.editFileList').filter(function() {
		return this.value != ''
	});
	
	console.log("db_fileList"+$db_fileList.length);
	if($db_fileList.length ==0)
	{
		if(($docempty.length == 0) || ($docempty.length <= 3))
		{
			//alert("NOt Empty");
			doc_array = true;
		}
		else
		{
			//alert("Empty");
			doc_array = false; 
		}
	
	}
	else
	{
		doc_array = true;
	}
	console.log("doc_array "+doc_array);
	console.log("course_state_array "+course_state_array);
	
	if(js_drd_courseType && js_drd_courseNum && js_drd_courseName && js_drd_courseDesc && js_drd_instructorName && js_drd_courseCredit && js_drd_date && js_drd_coursevideoUrl  && js_drd_quest1 && js_drd_quest1Ans1 && js_drd_quest1Ans2 && js_drd_quest1Ans3 && js_drd_quest1Ans4 && js_drd_quest2 && js_drd_quest2Ans1 && js_drd_quest2Ans2 && js_drd_quest2Ans3 && js_drd_quest2Ans4 && js_drd_quest3 && js_drd_quest3Ans1 && js_drd_quest3Ans2 && js_drd_quest3Ans3 && js_drd_quest3Ans4 && js_drd_quest4 && js_drd_quest4Ans1 && js_drd_quest4Ans2 && js_drd_quest4Ans3 && js_drd_quest4Ans4 && js_drd_quest5 && js_drd_quest5Ans1 && js_drd_quest5Ans2 && js_drd_quest5Ans3 && js_drd_quest5Ans4 && js_drd_passScore && ((doc_array && course_state_array) == true))
	{
		if($.trim($('#selEditCourseId :selected').text()) == 'DIPLOMATE PROGRAM')
		{
			if(js_drd_essayQuest)
			{
				document.getElementById("editCourseSaveBtnId").disabled = false; 	
			}
			else
			{
				document.getElementById("editCourseSaveBtnId").disabled = true; 	
				//document.getElementById("editCourseSaveBtnId").disabled = false; 	
			}
		}
		else
		{
			document.getElementById("editCourseSaveBtnId").disabled = false; 	
		}
		
	}
	else
	{
		document.getElementById("editCourseSaveBtnId").disabled = true; 
		//document.getElementById("editCourseSaveBtnId").disabled = false; 
	}
}

/* $('#editCourseSaveBtnId').click(function(){
	window.location.href="<?php echo site_url(); ?>/courses";
}); */

var statecountarray = [];
$('.editCourseCode').blur(function(){	
 var code = document.getElementsByClassName('editCourseCode');
    for (var i = 0; i < code.length; i++){
        if(code[i].value !=""){
			console.log(' inside if State code is '+code[i].value);
			document.getElementById('hiddenstatecodeid').value = code[i].value;
			statecountarray.push(code[i].value);
			break;
		}else{
				console.log(' inside else State code is '+code[i].value);
				document.getElementById('hiddenstatecodeid').value = "";
			statecountarray=[];
		}
	}
	console.log('statecountarray Value '+statecountarray);
	if(statecountarray.length == 0){
		document.getElementById('errEditCourseStateCode').innerHTML = errMsg['80547'];
		console.log("Value Empty");
	}else{
		document.getElementById('errEditCourseStateCode').innerHTML = "";
		console.log("Value Not Empty");
	}
});


function drd_BtnEditCourseSave() {
	
	var ajaxData = new FormData($("#editCourseFormId")[0]);
	console.log($('.fileCls').val());
	
	var ins = document.getElementsByClassName('fileCls').length;
		console.log("ins "+ins);
		for (var x = 1; x <= ins; x++) {
			if(document.getElementById('txtEditFileId'+x).value !="")
			{
				console.log(document.getElementById('txtEditFileId'+x).value);
				ajaxData.append("files[]", document.getElementById('txtEditFileId'+x).files[0]);
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
		quest_id:document.getElementById('txtQuestionId1').value,
		quest_name:document.getElementById('txtEditQuestion1Id').value,
		answer1:document.getElementById('txtEditQ1CorrectAnswer1Id').value,
		answer2:document.getElementById('txtEditQ1Answer2Id').value,
		answer3:document.getElementById('txtEditQ1Answer3Id').value,
		answer4:document.getElementById('txtEditQ1Answer4Id').value
	},
	{
		quest_id:document.getElementById('txtQuestionId2').value,
		quest_name:document.getElementById('txtEditQuestion2Id').value,
		answer1:document.getElementById('txtEditQ2CorrectAnswer1Id').value,
		answer2:document.getElementById('txtEditQ2Answer2Id').value,
		answer3:document.getElementById('txtEditQ2Answer3Id').value,
		answer4:document.getElementById('txtEditQ2Answer4Id').value
	},
	{
		quest_id:document.getElementById('txtQuestionId3').value,
		quest_name:document.getElementById('txtEditQuestion3Id').value,
		answer1:document.getElementById('txtEditQ3CorrectAnswer1Id').value,
		answer2:document.getElementById('txtEditQ3Answer2Id').value,
		answer3:document.getElementById('txtEditQ3Answer3Id').value,
		answer4:document.getElementById('txtEditQ3Answer4Id').value
	},
	{
		quest_id:document.getElementById('txtQuestionId4').value,
		quest_name:document.getElementById('txtEditQuestion4Id').value,
		answer1:document.getElementById('txtEditQ4CorrectAnswer1Id').value,
		answer2:document.getElementById('txtEditQ4Answer2Id').value,
		answer3:document.getElementById('txtEditQ4Answer3Id').value,
		answer4:document.getElementById('txtEditQ4Answer4Id').value
	},
	{
		quest_id:document.getElementById('txtQuestionId5').value,
		quest_name:document.getElementById('txtEditQuestion5Id').value,
		answer1:document.getElementById('txtEditQ5CorrectAnswer1Id').value,
		answer2:document.getElementById('txtEditQ5Answer2Id').value,
		answer3:document.getElementById('txtEditQ5Answer3Id').value,
		answer4:document.getElementById('txtEditQ5Answer4Id').value
	},
	);
	console.log("course_quiz "+course_quiz);	
	ajaxData.append('coursestate',JSON.stringify(course_state));		
	ajaxData.append('coursequiz',JSON.stringify(course_quiz));
	ajaxData.append('doc_deletearray',JSON.stringify(doc_remove_array));
	
	ajaxData.append('selEditCourseNam',$.trim($('#selEditCourseId :selected').val()));
	ajaxData.append('selEditCourseTypeNam',$.trim($('#selEditCourseId :selected').text()));
	ajaxData.append('txtEditCourseId',$('#txtEditCourseId').val());
	ajaxData.append('txtEditCourselength',credit_time);
	ajaxData.append('txtEditCourseNoNam',$('#txtEditCourseNoId').val());
	ajaxData.append('txtEditCourseTitleNam',$('#txtEditCourseTitleId').val());
	ajaxData.append('txtEditCourseDescNam',$('#txtEditCourseDescId').val());
	ajaxData.append('txtEditInstructorNameNam',$('#txtEditInstructorNameId').val());
	ajaxData.append('selEditCECreditsNam',$('#selEditCECreditsId').val());
	ajaxData.append('txtEditCreationDateNam',$('#txtEditCreationDateId').val());
	ajaxData.append('txtEditVideoUrlNam',$('#txtEditVideoUrlId').val());
	ajaxData.append('txtEditQuestion1Nam',$('#txtEditQuestion1Id').val());
	ajaxData.append('txtEditQ1CorrectAnswerNam',$('#txtEditQ1CorrectAnswer1Id').val());
	ajaxData.append('txtEditQ1Answer2Nam',$('#txtEditQ1Answer2Id').val());
	ajaxData.append('txtEditQ1Answer3Nam',$('#txtEditQ1Answer3Id').val());
	ajaxData.append('txtEditQ1Answer4Nam',$('#txtEditQ1Answer4Id').val());
	ajaxData.append('txtEditQuestion2Nam',$('#txtEditQuestion2Id').val());
	ajaxData.append('txtEditQ2CorrectAnswerNam',$('#txtEditQ2CorrectAnswer1Id').val());
	ajaxData.append('txtEditQ2Answer2Nam',$('#txtEditQ2Answer2Id').val());
	ajaxData.append('txtEditQ2Answer3Nam',$('#txtEditQ2Answer3Id').val());
	ajaxData.append('txtEditQ2Answer4Nam',$('#txtEditQ21Answer4Id').val());
	ajaxData.append('txtEditQuestion3Nam',$('#txtEditQuestion3Id').val());
	ajaxData.append('txtEditQ3CorrectAnswerNam',$('#txtEditQ3CorrectAnswer1Id').val());
	ajaxData.append('txtEditQ3Answer2Nam',$('#txtEditQ3Answer2Id').val());
	ajaxData.append('txtEditQ3Answer3Nam',$('#txtEditQ3Answer3Id').val());
	ajaxData.append('txtEditQ3Answer4Nam',$('#txtEditQ3Answer4Id').val());
	ajaxData.append('txtEditQuestion4Nam',$('#txtEditQuestion4Id').val());
	ajaxData.append('txtEditQ4CorrectAnswerNam',$('#txtEditQ4CorrectAnswer1Id').val());
	ajaxData.append('txtEditQ4Answer2Nam',$('#txtEditQ4Answer2Id').val());
	ajaxData.append('txtEditQ4Answer3Nam',$('#txtEditQ4Answer3Id').val());
	ajaxData.append('txtEditQ4Answer4Nam',$('#txtEditQ4Answer4Id').val());
	ajaxData.append('txtEditQuestion5Nam',$('#txtEditQuestion5Id').val());
	ajaxData.append('txtEditQ5CorrectAnswerNam',$('#txtEditQ5CorrectAnswer1Id').val());
	ajaxData.append('txtEditQ5Answer2Nam',$('#txtEditQ5Answer2Id').val());
	ajaxData.append('txtEditQ5Answer3Nam',$('#txtEditQ5Answer3Id').val());
	ajaxData.append('txtEditQ5Answer4Nam',$('#txtEditQ5Answer4Id').val());
	ajaxData.append('txtEditEssayQuestionId',$('#txtSubQuestionId').val());
	ajaxData.append('txtEditEssayQuestionNam',$('#txtEditEssayQuestionId').val());
	ajaxData.append('selEditPassingScoreNam',$('#selEditPassingScoreId').val());
	btn_loading_fun();
	$("#editCourseSaveBtnId").prop("disabled", true);
	$("#editCourseSaveBtnId").css("cursor", "wait");
	var js_drd_EditCourseData = $("#editCourseFormId").serialize();
	$.ajax({
		url: "<?php echo site_url(); ?>"+ "/editcoursedetails",			
		//dataType: 'text', // what to expect back from the PHP script
		cache: false,
		contentType: false,
		processData: false,
		//mimeType:"multipart/form-data",
		data: ajaxData,
		type: 'post',
		data:ajaxData,
		success: function(ajx_drd_EditCourseData) {
		$("#editCourseSaveBtnId").prop("disabled", false);
		$("#editCourseSaveBtnId").css("cursor", "pointer");	
			var js_drd_EditCourse = $.parseJSON(ajx_drd_EditCourseData);
			//alert(ajx_drd_EditCourseData);
			console.log("Return Edit User form post value "+JSON.stringify(js_drd_EditCourse));
			
			if(js_drd_EditCourse['message'] != "") {
				if(js_drd_EditCourse['message_type'] ==  "SUCCESS"){
					document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditCourse['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/courses"; }, 1000);	
				}else {
					document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditCourse['message']+"</div>";
				}
				$('html, body').animate({ scrollTop: 0 }, 'fast');
			} else {
				$('html, body').animate({ scrollTop: 0 }, 'fast');
				$("#editCourseSaveBtnId").prop("disabled", false);
				$("#editCourseSaveBtnId").css("cursor", "pointer");
							
				$("#errEditCourseId").text(js_drd_EditCourse['EditCourse']);
				$("#errEditCourseNoId").text(js_drd_EditCourse['EditCourseNo']);
				$("#errEditCourseTitleId").text(js_drd_EditCourse['EditCourseTitle']);
				$("#errEditCourseDescId").text(js_drd_EditCourse['EditCourseDesc']);
				$("#errEditInstructorNameId").text(js_drd_EditCourse['EditInstructor']);
				$("#errEditCECreditsId").text(js_drd_EditCourse['EditCECredits']);
				$("#errEditCreationDateId").text(js_drd_EditCourse['EditCreationDate']);
				$("#errEditVideoUrlId").text(js_drd_EditCourse['EditVideoUrl']);
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditCourse['EditFiles']+"</div>"; 
				$("#errEditPDFCourseN1Id").text(js_drd_EditCourse['EditFiles']);
				$("#errEditCourseStateCode").text(js_drd_EditCourse['EditStateCode']);
				$("#errEditQuestion1Id").text(js_drd_EditCourse['EditQuestion1']);
				$("#errEditQ1CorrectAnswerId").text(js_drd_EditCourse['EditQstn1CrtAns']);
				$("#errEditQ1Answer2Id").text(js_drd_EditCourse['EditQstn1Ans2']);
				$("#errEditQ1Answer3Id").text(js_drd_EditCourse['EditQstn1Ans3']);
				$("#errEditQ1Answer4Id").text(js_drd_EditCourse['EditQstn1Ans4']);
				$("#errEditQuestion2Id").text(js_drd_EditCourse['EditQuestion2']);
				$("#errEditQ2CorrectAnswerId").text(js_drd_EditCourse['EditQstn2CrtAns']);
				$("#errEditQ2Answer2Id").text(js_drd_EditCourse['EditQstn2Ans2']);
				$("#errEditQ2Answer3Id").text(js_drd_EditCourse['EditQstn2Ans3']);
				$("#errEditQ2Answer4Id").text(js_drd_EditCourse['EditQstn2Ans4']);
				$("#errEditQuestion3Id").text(js_drd_EditCourse['EditQuestion3']);
				$("#errEditQ3CorrectAnswerId").text(js_drd_EditCourse['EditQstn3CrtAns']);
				$("#errEditQ3Answer2Id").text(js_drd_EditCourse['EditQstn3Ans2']);
				$("#errEditQ3Answer3Id").text(js_drd_EditCourse['EditQstn3Ans3']);
				$("#errEditQ3Answer4Id").text(js_drd_EditCourse['EditQstn3Ans4']);
				$("#errEditQuestion4Id").text(js_drd_EditCourse['EditQuestion4']);
				$("#errEditQ4CorrectAnswerId").text(js_drd_EditCourse['EditQstn4CrtAns']);
				$("#errEditQ4Answer2Id").text(js_drd_EditCourse['EditQstn4Ans2']);
				$("#errEditQ4Answer3Id").text(js_drd_EditCourse['EditQstn4Ans3']);
				$("#errEditQ4Answer4Id").text(js_drd_EditCourse['EditQstn4Ans4']);
				$("#errEditQuestion5Id").text(js_drd_EditCourse['EditQuestion5']);
				$("#errEditQ5CorrectAnswerId").text(js_drd_EditCourse['EditQstn5CrtAns']);
				$("#errEditQ5Answer2Id").text(js_drd_EditCourse['EditQstn5Ans2']);
				$("#errEditQ5Answer3Id").text(js_drd_EditCourse['EditQstn5Ans3']);
				$("#errEditQ5Answer4Id").text(js_drd_EditCourse['EditQstn5Ans4']);
				$("#errEditEssayQuestionId").text(js_drd_EditCourse['EditEssayQstn']);
				$("#errEditPassingScoreId").text(js_drd_EditCourse['EditPassingScore']);
			}
			btn_loading_dismissfun();
		},
		error: function() {
			btn_loading_dismissfun();
			$('html, body').animate({ scrollTop: 0 }, 'fast');
			$("#editCourseSaveBtnId").prop("disabled", false);
			$("#editCourseSaveBtnId").css("cursor", "pointer");
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
		}
	
		});
}

function remove_file_error(errId)
{
	var err_id = document.getElementById(errId);
	$(err_id).text('');
}	

function remove_file(num)
{
	console.log('Removed');
	$('div').remove('.file_remove'+num);
}
		

</script>