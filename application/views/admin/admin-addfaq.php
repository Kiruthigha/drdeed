	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Add FAQ</h1>
									</div>
								</div>
								<p></p>
							<div id="messaage"></div>
							<form class="form-horizontal" action="" id="addFaqFormId">
									<div class="form-group">
									<label class="col-md-2">Question</label>
									<div class="col-md-4">
										<input type="text" placeholder="" class="form-control" id="txtAddQstnId" name="txtAddQstnNam" maxlength="100" tabindex="1" onblur="validateMandatory('txtAddQstnId','errAddQstnId'); validate_add_form();" />
									<span style="color:red;" id="errAddQstnId"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-md-2">Answer</label>
									<div class="col-md-4">
										<textarea placeholder="" rows="2" class="form-control" id="txtAddAnsId" name="txtAddAnsNam" maxlength="500" tabindex="2" onblur="validateMandatory('txtAddAnsId','errAddAnsId'); validate_add_form();" ></textarea>
									<span style="color:red;" id="errAddAnsId"></span>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-2">Priority</label>
									<div class="col-md-4">
										<input type="text" placeholder="" class="form-control" id="txtAddPrtyId" name="txtAddPrtyNam" maxlength="10" tabindex="3" onblur="validateMandatory('txtAddPrtyId','errAddPrtyId'); validate_add_form();" onkeypress="return numbersonlyEntry(event);" />
									<span style="color:red;" id="errAddPrtyId"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Status</label>
										<div class="col-lg-4">
										<select class="form-control" id="selAddStatusId" name="selAddStatusNam" tabindex="4" onblur="validateMandatory('selAddStatusId','errAddStatusId'); validate_add_form();" onchange="validateMandatory('selAddStatusId','errAddStatusId');" >
											<option value="" >Select Status</option>
											<option value="<?php echo $active['ID']; ?>"  >Active</option>
											<option value="<?php echo $inactive['ID']; ?>"  >Inactive</option>
										</select>
										<span style="color:red;" id="errAddStatusId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-4">
										<button class="btn btn-lg btn-success pull-right" type="button" id="addSaveFaqBtnId" value="Save" tabindex="6" onclick="drd_BtnAddFaqSave();" disabled ><strong>Save</strong></button>
										<a class="btn btn-lg  btn-primary  pull-right" href="<?php echo site_url(); ?>/faq" tabindex="5"><strong>Cancel</strong></a>
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
	function validate_add_form() {
		var js_drd_add_qstn = document.getElementById('txtAddQstnId').value !=""; 
		var js_drd_add_ans = document.getElementById('txtAddAnsId').value !=""; 
		var js_drd_add_priority = document.getElementById('txtAddPrtyId').value !=""; 
		var js_drd_add_status = document.getElementById('selAddStatusId').value !="";
		
		if (js_drd_add_qstn && js_drd_add_ans && js_drd_add_priority && js_drd_add_status) {	
			document.getElementById("addSaveFaqBtnId").disabled = false; 			
		} else {
			document.getElementById("addSaveFaqBtnId").disabled = true; 
		}
	}
	
function drd_BtnAddFaqSave() {
	$("#addSaveFaqBtnId").prop("disabled", true);
	$("#addSaveFaqBtnId").css("cursor", "wait");
	btn_loading_fun();
	var js_drd_AddFaqData = $("#addFaqFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/addfaqdetails",			
		data:js_drd_AddFaqData,
		success: function(ajx_drd_AddFaqData) {
		$("#addSaveFaqBtnId").prop("disabled", true);
		$("#addSaveFaqBtnId").css("cursor", "wait");	
			var js_drd_AddFaq = $.parseJSON(ajx_drd_AddFaqData);
			//alert(ajx_drd_AddFaqData);
			console.log("Return Add faq form post value "+JSON.stringify(js_drd_AddFaq));
			
			if(js_drd_AddFaq['message'] != "") {	
			if(js_drd_AddFaq['message'] == '<?php echo $this->lang->line('m_90003') ?>') {
						document.getElementById('messaage').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddFaq['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/faq"; }, 1000);
					} else {
						document.getElementById('messaage').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddFaq['message']+"</div>";
					}
				
			} else {
				$("#addSaveFaqBtnId").prop("disabled", false);
				$("#addSaveFaqBtnId").css("cursor", "pointer");
						
				$("#errAddQstnId").text(js_drd_AddFaq['AddQstn']);
				$("#errAddAnsId").text(js_drd_AddFaq['AddAns']);
				$("#errAddPrtyId").text(js_drd_AddFaq['AddPrty']);
				$("#errAddStatusId").text(js_drd_AddFaq['AddStatus']);
			}
			btn_loading_dismissfun();
		},
			error: function() {
				$("#addSaveFaqBtnId").prop("disabled", false);
				$("#addSaveFaqBtnId").css("cursor", "pointer");
				btn_loading_dismissfun();
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
			
		});
}


</script>