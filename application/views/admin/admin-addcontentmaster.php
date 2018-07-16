	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Add Content Master</h1>
									</div>
								</div>
								<p></p>
							
							<form class="form-horizontal" action="" id="addContentMasterFormId">
								<div id="contentMsgId"></div>
									<div class="form-group">
										<label class="col-lg-2">Function Name</label>
										<div class="col-lg-4">
										<select class="form-control" id="selAddFunctionNameId" name="selAddFunctionNameNam" tabindex="1" onblur="validateMandatory('selAddFunctionNameId','errAddFunctionNameId'); validate_add_content_form();" onchange="validateMandatory('selAddFunctionNameId','errAddFunctionNameId');" >
											<option value="" >Select</option>
											<?php foreach($function_name as $function_name): ?>
											<option value="<?php echo $function_name['ID']; ?>" ><?php echo $function_name['VALUE_NAME']; ?></option>
											<?php endforeach; ?>
										</select>
										<span style="color:red;" id="errAddFunctionNameId"></span>
										</div>
									</div>
									<div class="form-group">
									<label class="col-md-2">Content</label>
									<div class="col-md-4">
										<textarea class="form-control" rows="5" id="txtAddContentId" name="txtAddContentNam" tabindex="2" onblur="validateMandatory('txtAddContentId','errAddContentId'); validate_add_content_form();" /></textarea>
									<span style="color:red;" id="errAddContentId"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-4">
										<button class="btn btn-lg btn-success pull-right" type="button" id="addSaveContentBtnId" value="Save" tabindex="3" onclick="drd_BtnAddContentSave();" disabled ><strong>Save</strong></button>
										<a class="btn btn-lg  btn-primary  pull-right" href="<?php echo site_url(); ?>/contentmaster" tabindex="4"><strong>Cancel</strong></a>
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

	/*Form Validation for Button Enable*/
	function validate_add_content_form() {		
		var js_drd_add_function_name = document.getElementById('selAddFunctionNameId').value !=""; 
		var js_drd_add_content = document.getElementById('txtAddContentId').value !=""; 
		
		if (js_drd_add_function_name && js_drd_add_content) {	
			document.getElementById("addSaveContentBtnId").disabled = false; 
		} else {
			document.getElementById("addSaveContentBtnId").disabled = true; 
		}
	}
	
	/*Function for Add Content master*/
	function drd_BtnAddContentSave() {
		btn_loading_fun();
		$("#addSaveContentBtnId").prop("disabled", true);
		$("#addSaveContentBtnId").css("cursor", "wait");
		var js_drd_AddContentData = $("#addContentMasterFormId").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/addcontentmasterdetails",			
			data:js_drd_AddContentData,
			success: function(ajx_drd_AddContentData) {
			$("#addSaveContentBtnId").prop("disabled", true);
			$("#addSaveContentBtnId").css("cursor", "wait");	
				var js_drd_AddContent = $.parseJSON(ajx_drd_AddContentData);				
				if(js_drd_AddContent['message'] != "") {
					if(js_drd_AddContent['message'] == '<?php echo $this->lang->line('m_90003') ?>') {
						document.getElementById('contentMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddContent['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/contentmaster"; }, 1000);
					} else {
						document.getElementById('contentMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddContent['message']+"</div>";
					}
				} else {
					$("#addSaveContentBtnId").prop("disabled", false);
					$("#addSaveContentBtnId").css("cursor", "pointer");
							
					$("#errAddFunctionNameId").text(js_drd_AddContent['AddFunctionName']);
					$("#errAddContentId").text(js_drd_AddContent['AddContent']);
				}
				btn_loading_dismissfun();
			},
			error: function() {
				$("#addSaveContentBtnId").prop("disabled", false);
				$("#addSaveContentBtnId").css("cursor", "pointer");
				btn_loading_dismissfun();
				document.getElementById('contentMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			  
			}
		});
	}
</script>