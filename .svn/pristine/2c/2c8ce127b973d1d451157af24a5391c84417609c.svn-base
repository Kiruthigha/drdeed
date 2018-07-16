<?php if($survey['SURVEY_ID']){?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Edit Survey</h1>
									</div>
								</div>
								<p></p>
							<div id="message"></div>
							<form class="form-horizontal" action="" id="editSurveyFormId">
							<input type="hidden" value="<?php echo $survey['SURVEY_ID'];?>" name="selEditSurveyIdNam" />
									<div class="form-group">
									<label class="col-md-2">Question</label>
									<div class="col-md-4">
										<textarea placeholder="" rows="5" class="form-control" id="txtEditQstnId" name="txtEditQstnNam" maxlength="360" tabindex="1" onblur="validateMandatory('txtEditQstnId','errEditQstnId');OBvalidate_Editsurvey_form();" ><?php echo $survey['SURVEY_QUESTION'];?></textarea>
									<span style="color:red;" id="errEditQstnId"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-4">
										<button class="btn btn-lg btn-success pull-right" type="button" id="editSaveSurveyBtnId" value="Save" tabindex="2" onclick="drd_BtnEditSurveySave();" ><strong>Save</strong></button>
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
<?php }  else { ?>
<br>
<br>
	<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90008') ?>'</div>
<?php } ?>
<script>


/*  $('#editSaveSurveyBtnId').click(function(){
	window.location.href="<?php echo site_url(); ?>/survey";
}); */

$('#selEditStatusId').val(<?php echo $survey['SURVEY_QUESTION_STATUS_ID'];?>);

function OBvalidate_Editsurvey_form()
{
	
	var js_drd_survey_quest = document.getElementById('txtEditQstnId').value!="";
	
	if( js_drd_survey_quest )
	{			
		document.getElementById("editSaveSurveyBtnId").disabled = false; 
	} 
	else 
	{
		document.getElementById("editSaveSurveyBtnId").disabled = true; 
	}
}
function drd_BtnEditSurveySave() {
	$("#editSaveSurveyBtnId").prop("disabled", true);
	$("#editSaveSurveyBtnId").css("cursor", "wait");
	btn_loading_fun();
	var js_drd_EditSurveyData = $("#editSurveyFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/editsurveydetails",			
		data:js_drd_EditSurveyData,
		success: function(ajx_drd_EditSurveyData) {
		$("#editSaveSurveyBtnId").prop("disabled", true);
		$("#editSaveSurveyBtnId").css("cursor", "wait");	
			var js_drd_EditSurvey = $.parseJSON(ajx_drd_EditSurveyData);
			//alert(ajx_drd_EditSurveyData);
			console.log("Return Edit User form post value "+JSON.stringify(js_drd_EditSurvey));
			
			if(js_drd_EditSurvey['message'] != "") {				
				if(js_drd_EditSurvey['message_type'] ==  "SUCCESS"){
					document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditSurvey['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/survey"; }, 1000);					
					}else {
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditSurvey['message']+"</div>";
					}
			} else {
				$("#editSaveSurveyBtnId").prop("disabled", false);
				$("#editSaveSurveyBtnId").css("cursor", "pointer");
						
				$("#errEditQstnId").text(js_drd_EditSurvey['EditQstn']);
			}
			btn_loading_dismissfun();
		},
		error: function(){
			btn_loading_dismissfun();
			$("#editSaveSurveyBtnId").prop("disabled", false);
			$("#editSaveSurveyBtnId").css("cursor", "pointer");
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
			
		});
}

</script>