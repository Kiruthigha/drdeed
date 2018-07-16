	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Add Survey</h1>
									</div>
								</div>
								<p></p>
							<div id="message"></div>
							<form class="form-horizontal" action="" id="addSurveyFormId">
									<!--<div class="form-group">
										<label class="col-lg-2">Course Type</label>
										<div class="col-lg-4">
										<select class="form-control" name="selAddCourseTypeNam" id="selAddCourseTypeId" onblur="validateMandatory('selAddCourseTypeId','errAddCourseTypeId');OBvalidate_addsurvey_form();" tabindex="1">
												<option value="">Select Course Type</option>
												 <?php //foreach($course_type as $course_type): ?>
												<option value="<?php //echo $course_type['ID'];?>"> <?php //echo trim($course_type['VALUE_NAME']); ?> </option>
												<?php //endforeach;?>
											</select>
										<span style="color:red;" id="errAddCourseTypeId"></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-2">Course#</label>
										<div class="col-lg-4">
										<select class="form-control" name="selAddCourseNumNam" id="selAddCourseNumId" onblur="validateMandatory('selAddCourseNumId','errAddCourseNumId');OBvalidate_addsurvey_form();"  tabindex="2">
												<option value="">Select Course#</option>
												 <?php /* foreach($course_num as $course_num): ?>
												<option value="<?php echo $course_num['ID'];?>"> <?php echo trim($course_num['COURSE_NUM']); ?> </option>
												<?php endforeach; */?>
											</select>
										<span style="color:red;" id="errAddCourseNumId"></span>
										</div>
									</div>
								
									<div class="form-group">
										<label class="col-lg-2">Course</label>
										<div class="col-lg-4">
										<select class="form-control" id="selAddCourseId" name="selAddCourseNam" tabindex="3" onblur="validateMandatory('selAddCourseId','errAddCourseId');OBvalidate_addsurvey_form();" onchange="validateMandatory('selAddCourseId','errAddCourseId');" >
											<option value="" >Select Course</option>
											<?php /* foreach($courses as $courses): ?>
											<option value="<?php echo $courses['ID'];?>"> <?php echo trim($courses['COURSE_NAME']); ?> </option>
											<?php endforeach; */?>
										</select>
										<span style="color:red;" id="errAddCourseId"></span>
										</div>
									</div>-->
									<div class="form-group">
									<label class="col-md-2">Question</label>
									<div class="col-md-4">
										<textarea placeholder="" rows="5" class="form-control" id="txtAddQstnId" name="txtAddQstnNam" maxlength="360" tabindex="1" onblur="validateMandatory('txtAddQstnId','errAddQstnId');OBvalidate_addsurvey_form();" ></textarea>
									<span style="color:red;" id="errAddQstnId"></span>
									</div>
									</div>
									<!--<div class="form-group">
										<label class="col-lg-2">Status</label>
										<div class="col-lg-4">
										<select class="form-control" id="selAddStatusId" name="selAddStatusNam" tabindex="5" onblur="validateMandatory('selAddStatusId','errAddStatusId');OBvalidate_addsurvey_form();" onchange="validateMandatory('selAddStatusId','errAddStatusId');" >
											<option value="" >Select Status</option>
											<?php //foreach($status as $status): ?>
											<option value="<?php //echo $status['ID'];?>"> <?php //echo trim($status['VALUE_NAME']); ?> </option>
											<?php //endforeach;?>
										</select>
										<span style="color:red;" id="errAddStatusId"></span>
										</div>
									</div>-->
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-4">
										<button class="btn btn-lg btn-success pull-right" type="button" id="addSaveSurveyBtnId" value="Save" tabindex="2" disabled onclick="drd_BtnAddSurveySave();" ><strong>Save</strong></button>
										<a class="btn btn-lg  btn-primary  pull-right" href="<?php echo site_url(); ?>/survey" tabindex="3"><strong>Cancel</strong></a>
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


/*  $('#addSaveSurveyBtnId').click(function(){
	window.location.href="<?php echo site_url(); ?>/survey";
}); */

function OBvalidate_addsurvey_form()
{
	var js_drd_survey_quest = document.getElementById('txtAddQstnId').value!="";
	
	if(js_drd_survey_quest )
	{			
		document.getElementById("addSaveSurveyBtnId").disabled = false; 
	} 
	else 
	{
		document.getElementById("addSaveSurveyBtnId").disabled = true; 
	}
}

			
function drd_BtnAddSurveySave() {
	$("#addSaveSurveyBtnId").prop("disabled", true);
	$("#addSaveSurveyBtnId").css("cursor", "wait");
	btn_loading_fun();
	var js_drd_AddSurveyData = $("#addSurveyFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/addsurveydetails",			
		data:js_drd_AddSurveyData,
		success: function(ajx_drd_AddSurveyData) {
		$("#addSaveSurveyBtnId").prop("disabled", true);
		$("#addSaveSurveyBtnId").css("cursor", "wait");	
			var js_drd_AddSurvey = $.parseJSON(ajx_drd_AddSurveyData);
			//alert(ajx_drd_AddSurveyData);
			console.log("Return Add User form post value "+JSON.stringify(js_drd_AddSurvey));
			
			if(js_drd_AddSurvey['message'] != "") {			
					if(js_drd_AddSurvey['message_type'] ==  "SUCCESS"){
					document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddSurvey['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/survey"; }, 1000);					
					}else {
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddSurvey['message']+"</div>";
					}
			} else {
				$("#addSaveSurveyBtnId").prop("disabled", false);
				$("#addSaveSurveyBtnId").css("cursor", "pointer");
							
				$("#errAddQstnId").text(js_drd_AddSurvey['AddQstn']);
			}
			btn_loading_dismissfun();
		},
		error: function(){
			btn_loading_dismissfun();
			$("#addSaveSurveyBtnId").prop("disabled", false);
			$("#addSaveSurveyBtnId").css("cursor", "pointer");
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
			
		});
}


</script>