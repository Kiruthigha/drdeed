<?php if($faq['ID']){?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Edit FAQ</h1>
									</div>
								</div>
								<p></p>
							<div id="message"></div>
							<form class="form-horizontal" action="" id="editFaqFormId">
							<input type="hidden"  id="txtfaqid" name="txtfaqname"  value="<?php echo $faq['ID'] ?>" />
									<div class="form-group">
									<label class="col-md-2">Question</label>
									<div class="col-md-4">
										<input type="text" placeholder="" class="form-control" id="txtEditQstnId" name="txtEditQstnNam" maxlength="100" tabindex="1" onblur="validateMandatory('txtEditQstnId','errEditQstnId'); validate_edit_form();" value="<?php echo $faq['QUESTION'] ?>" />
									<span style="color:red;" id="errEditQstnId"></span>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-2">Answer</label>
									<div class="col-md-4">
										<textarea placeholder="" rows="2" class="form-control" id="txtEditAnsId" name="txtEditAnsNam" maxlength="500" tabindex="2" onblur="validateMandatory('txtEditAnsId','errEditAnsId'); validate_edit_form();" ><?php echo $faq['ANSWER'] ?></textarea>
									<span style="color:red;" id="errEditAnsId"></span>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-2">Priority</label>
									<div class="col-md-4">
										<input type="text" placeholder="" class="form-control" id="txtEditPrtyId" name="txtEditPrtyNam" maxlength="10" tabindex="3" onblur="validateMandatory('txtEditPrtyId','errEditPrtyId'); validate_edit_form();" onkeypress="return numbersonlyEntry(event);" value="<?php echo $faq['PRIORITY_NUMBER'] ?>" />
									<span style="color:red;" id="errEditPrtyId"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Status</label>
										<div class="col-lg-4">
										<select class="form-control" id="selEditStatusId" name="selEditStatusNam" tabindex="4" onblur="validateMandatory('selEditStatusId','errEditStatusId'); validate_edit_form();" onchange="validateMandatory('selEditStatusId','errEditStatusId');" >
											<option value="" >Select Status</option>
											<option value="<?php echo $active['ID']; ?>" <?php if ($faq['FAQ_STATUS'] == $active['ID']){?>selected <?php }?>>Active</option>
											<option value="<?php echo $inactive['ID']; ?>" <?php if ($faq['FAQ_STATUS'] == $inactive['ID']){?>selected <?php }?>>Inactive</option>
										</select>
										<span style="color:red;" id="errEditStatusId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-4">
										<button class="btn btn-lg btn-success pull-right" type="button" id="editSaveFaqBtnId" value="Save" tabindex="6" onclick="drd_BtnEditFaqSave();" ><strong>Save</strong></button>
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
<?php }  else { ?>
<br>
<br>
	<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90008') ?>'</div>
<?php } ?>
<script>

	/*Form Validation for Button Enable*/
	function validate_edit_form() {
		var js_drd_edit_qstn = document.getElementById('txtEditQstnId').value !=""; 
		var js_drd_edit_ans = document.getElementById('txtEditAnsId').value !=""; 
		var js_drd_edit_priority = document.getElementById('txtEditPrtyId').value !=""; 
		var js_drd_edit_status = document.getElementById('selEditStatusId').value !="";
		
		if (js_drd_edit_qstn && js_drd_edit_ans && js_drd_edit_priority && js_drd_edit_status) {	
			document.getElementById("editSaveFaqBtnId").disabled = false; 			
		} else {
			document.getElementById("editSaveFaqBtnId").disabled = true; 
		}
	}

function drd_BtnEditFaqSave() {
	$("#editSaveFaqBtnId").prop("disabled", true);
	$("#editSaveFaqBtnId").css("cursor", "wait");
	btn_loading_fun();
	var js_drd_EditFaqData = $("#editFaqFormId").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/editfaqdetails",			
		data:js_drd_EditFaqData,
		success: function(ajx_drd_EditFaqData) {
		$("#editSaveFaqBtnId").prop("disabled", true);
		$("#editSaveFaqBtnId").css("cursor", "wait");	
			var js_drd_EditFaq = $.parseJSON(ajx_drd_EditFaqData);
			//alert(ajx_drd_EditFaqData);
			console.log("Return Edit User form post value "+JSON.stringify(js_drd_EditFaq));
			
			if(js_drd_EditFaq['message'] != "") {				
				if(js_drd_EditFaq['message'] == '<?php echo $this->lang->line('m_90004'); ?>'){
						document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditFaq['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/faq"; }, 1000);
					} else {
						$("#editSaveFaqBtnId").prop("disabled", false);
						$("#editSaveFaqBtnId").css("cursor", "pointer");
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditFaq['message']+"</div>";
					}			
			} else {
				$("#editSaveFaqBtnId").prop("disabled", false);
				$("#editSaveFaqBtnId").css("cursor", "pointer");
						
				$("#errEditQstnId").text(js_drd_EditFaq['EditQstn']);
				$("#errEditAnsId").text(js_drd_EditFaq['EditAns']);
				$("#errEditPrtyId").text(js_drd_EditFaq['EditPrty']);
				$("#errEditStatusId").text(js_drd_EditFaq['EditStatus']);
			}
			btn_loading_dismissfun();
		},
		error: function(){
			btn_loading_dismissfun();
			$("#editSaveFaqBtnId").prop("disabled", false);
			$("#editSaveFaqBtnId").css("cursor", "pointer");
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
			
		});
}



</script>