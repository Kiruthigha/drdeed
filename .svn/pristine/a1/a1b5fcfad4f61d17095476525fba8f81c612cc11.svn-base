<style>
input{
	height:10%;
	width:18%;
}
.table-bordered > tbody > tr > td {
	border:0px solid #fff !important;
}
input{
	height:25px;
	width:27px;
	padding:0px;
	
}
.input-grade{
	margin-right:40px;	
}

.page-heading {
	padding:0px;
}

</style>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
								<div class="m-t-sm">
						<div class="row white-bg page-heading">
						<div class="row">
							<div class="col-md-9" style="word-wrap: break-word;">
								<h1 class="labeltext">Diplomate Essays</h1>
								<p class="spanlabel"><?php echo $essay_details['FIRST_NAME'] ?>&nbsp;<?php echo $essay_details['LAST_NAME'] ?> <span>Diplomate Essays to Grade </span></p>
							</div>
							<div class="col-md-3 col-xs-12" style="padding:0 0px;">
								<div class="pull-right labeltext"><a class="btncommon btn btn-default btn-rounded" onclick="printEssay();" >Print Essay</a>
								</div>
							</div>
						</div>
							<p>&nbsp;&nbsp;</p>
							<div id="editgradeId" style="color:red;"></div>
							<form class="form-horizontal" action="" id="updateessaygradeform">
								<div class="ibox-content" style="border-style:solid; border-width:1px;">
									<fieldset>
										<input type="hidden" name="txtessayname" value="<?php echo $essay_details['ESSAY_ID']?>" />
										<div class="col-md-12">
											<h3 class=""><strong><?php echo $essay_details['FIRST_NAME'] ?>&nbsp;<?php echo $essay_details['LAST_NAME'] ?></strong></h3>
											<p class=""><?php echo $essay_details['COURSE_NAME'] ?></p>
										</div><p>&nbsp;&nbsp;</p>
										
										<div class="col-md-12">
											<p><?php echo $essay_details['USER_ANSWER'] ?></p>
										</div>
										
										<div class="text-right">
											<div class="col-lg-12" style="padding-right: 41px;">
												<div class="form-group input-grade">
													<label >Grade: </label>	
													<input type="text" name="txtEditgradeNam" id="txtEditgradeId" maxlength="3" value ="<?php echo $essay_details['ESSAY_SCORE']; ?>" onblur="validateGrade('txtEditgradeId','errEditgradeId'); validate_grade_form();" onkeypress="return numbersonlyEntry(event)" />
													<span>/100</span>
												</div>
												<span id="errEditgradeId" style="color:red;"></span>
											</div>
											<p>&nbsp;</p>
											<div class="col-lg-12">
												<button class="btn btn-success pull-right" id="btnStdntGradeSaveId" type="button" onclick="updategrade();" disabled >Save</button>
												<button class="btn btn-primary pull-right" id="btnStdntGradeCancelId" type="button" >Cancel</button>
											</div>
											<p>&nbsp;</p>
											</div>
										</div>									
									</fieldset>
								</div>
					</form>
					
					<form method="post" action="<?php echo site_url(); ?>/generatepdf" id="pdfFormId" >
						<input type="hidden" class="form-control" name="txtUserFNam" value="<?php echo $essay_details['FIRST_NAME'] ?>"/>
						<input type="hidden" class="form-control" name="txtUserLNam" value="<?php echo $essay_details['LAST_NAME'] ?>"/>
						<input type="hidden" class="form-control" name="txtCourseNam" value="<?php echo $essay_details['COURSE_NAME'] ?>"/>
						<textarea class="form-control" name="txtEssayNam" style="display:none;"><?php echo $essay_details['USER_ANSWER'] ?></textarea>					
					</form>
					
					</div>
				</div>
				</div><!-- ibox content -->
			</div><!-- col-lg-12 -->
		</div><!-- Row -->
	</div><!-- container -->

   <script>
   
	$(document).ready(function(){		
		var js_drd_score = document.getElementById('txtEditgradeId').value;
		if(js_drd_score > 0) {
			document.getElementById("txtEditgradeId").disabled = true; 
			document.getElementById("btnStdntGradeSaveId").disabled = true; 
		} else {
			document.getElementById("txtEditgradeId").disabled = false; 
			document.getElementById("btnStdntGradeSaveId").disabled = false; 
		}
	});

	/* Onblur Validation for Grade */ 
	function validateGrade(valueId,errId) {
		var js_drd_get_grade = document.getElementById(valueId).value;
		if(js_drd_get_grade == "") {     
			document.getElementById(errId).innerHTML = errMsg["80547"];
		} else if(js_drd_get_grade > 100) {
			document.getElementById(errId).innerHTML = errMsg["80608"];
		} else {
			document.getElementById(errId).innerHTML = "";
		}
	}

	/*Form Validation for Button Enable*/
	function validate_grade_form() {
		var js_drd_grade = document.getElementById('txtEditgradeId').value; 
		if (js_drd_grade !="" ) {	
			if (js_drd_grade <= 100) {
				document.getElementById("btnStdntGradeSaveId").disabled = false; 
			} else {
				document.getElementById("btnStdntGradeSaveId").disabled = true;  	
			}			
		} else {
			document.getElementById("btnStdntGradeSaveId").disabled = true; 
		}
	}

	var js_essay_id = <?php echo $essay_details['ESSAY_ID'] ?>;
	function updategrade() {
		$("#btnStdntGradeSaveId").prop("disabled", true);
		$("#btnStdntGradeSaveId").css("cursor", "wait");
		btn_loading_fun();
		var js_drd_editgrade = $("#updateessaygradeform").serialize();	
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/updategrade",
			data:js_drd_editgrade,
			success: function(ajx_drd_updateResult) {
				var js_drd_updateresult = $.parseJSON(ajx_drd_updateResult);
				if (js_drd_updateresult['message'] != "") {
					if(js_drd_updateresult['message'] == '<?php echo $this->lang->line('m_90004'); ?>'){
						document.getElementById('editgradeId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_updateresult['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/studentgrades/<?php echo $essay_details['USER_ID']?>"; }, 1000);
					} else {
						$("#btnStdntGradeSaveId").prop("disabled", false);
						$("#btnStdntGradeSaveId").css("cursor", "pointer");
						document.getElementById('editgradeId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_updateresult['message']+"</div>";
					}				
				} else {  
					$("#btnStdntGradeSaveId").prop("disabled", false);
					$("#btnStdntGradeSaveId").css("cursor", "pointer");
					$("#errEditgradeId").text(js_drd_updateresult['Grade']);
				}
				btn_loading_dismissfun();
			},
			error: function() {
				btn_loading_dismissfun();
				$("#btnStdntGradeSaveId").prop("disabled", false);
				$("#btnStdntGradeSaveId").css("cursor", "pointer");
				document.getElementById('editgradeId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});	
	}
	
$('#btnStdntGradeCancelId').click(function(){
	window.location.href="<?php echo site_url(); ?>/studentgrades/<?php echo $essay_details['USER_ID']; ?>";
});

function printEssay() {
	$('#pdfFormId').submit();
}
</script>