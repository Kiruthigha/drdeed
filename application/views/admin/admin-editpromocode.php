<?php if($promocode_data['ID']){?>	
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Edit Promo Code</h1>
									</div>
								</div>
								<p></p>
							
							<form class="form-horizontal" action="" id="editPromoCodeFormId">
								<div id="editPromoCode_Message"></div>
									<?php $start_date = $this->common_functions->date_display_format($promocode_data['START_DATE']);									
									$end_date = $this->common_functions->date_display_format($promocode_data['END_DATE']);
									?>
									<input type="hidden" class="form-control" name="txtEditPromoIdNam" id="txtEditPromoId" value="<?php echo $promocode_data['ID'];?>" />
									
									<div class="form-group">
									<label class="col-md-2">Promo Code Name</label>
									<div class="col-md-3">
										<input type="text" class="form-control" maxlength="60" name="txtEditPromoCodeNameNam" id="txtEditPromoCodeNameId" value="<?php echo $promocode_data['PROMO_CODE_NAME'];?>" tabindex="1" onblur="validateMandatory('txtEditPromoCodeNameId','errEditPromoCodeNameId'); validate_edit_promo_code();" onkeypress="return OKValidateAlphaOnly(event);" disabled />
									<span style="color:red;" id="errEditPromoCodeNameId"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Promo Code</label>
										<div class="col-lg-3"><input type="text" value="<?php echo $promocode_data['PROMO_CODE'];?>" class="form-control" id="txtEditPromoCodeId" name="txtEditPromoCodeNam" maxlength="10" tabindex="2" onkeypress="return OKValidateAlphaNumeric(event);" onblur="validateMandatory('txtEditPromoCodeId','errEditPromoCodeId'); validate_edit_promo_code();" disabled />
										<span style="color:red;" id="errEditPromoCodeId"></span></div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Percent Discount (%)</label>
										<div class="col-lg-2"><input type="text" value="<?php echo $promocode_data['PERCENT_DISCOUNT'];?>" class="form-control" id="txtEditPercentDiscountId" name="txtEditPercentDiscountNam" maxlength="2" tabindex="3" onkeypress="return numbersonlyEntry(event);" onblur="validateMandatory('txtEditPercentDiscountId','errEditPercentDiscountId'); validate_edit_promo_code();" />
										<span style="color:red;" id="errEditPercentDiscountId"></span></div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Start Date</label>
										<div class="col-lg-3"><input type="text" placeholder="" value="<?php echo $start_date;?>" class="form-control crtDatePicker" id="txtEditStartDateId" name="txtEditStartDateNam" readonly tabindex="4" onblur="validateMandatory('txtEditStartDateId','errEditStartDateId'); validate_edit_promo_code();" onchange="validateMandatory('txtEditStartDateId','errEditStartDateId'); Validatedate('txtEditStartDateId','errEditStartDateId'); validate_edit_promo_code(); compareDate('txtEditStartDateId','txtEditEndDateId','errEditEndDateId');" />
										<span style="color:red;" id="errEditStartDateId"></span></div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">End Date</label>
										<div class="col-lg-3"><input type="text" placeholder="" value="<?php echo $end_date;?>" class="form-control crtDatePicker" id="txtEditEndDateId" name="txtEditEndDateNam" readonly tabindex="5" onblur="validateMandatory('txtEditEndDateId','errEditEndDateId'); validate_edit_promo_code(); compareDate('txtEditStartDateId','txtEditEndDateId','errEditEndDateId');" onchange="validateMandatory('txtEditEndDateId','errEditEndDateId'); validate_edit_promo_code(); compareDate('txtEditStartDateId','txtEditEndDateId','errEditEndDateId');" />
										<span style="color:red;" id="errEditEndDateId"></span></div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Applies to</label>
										<div class="col-lg-3">
										<select class="form-control" id="selEditAppliestoId" name="selEditAppliestoNam" tabindex="6" onblur="validateMandatory('selEditAppliestoId','errEditAppliestoId'); validate_edit_promo_code();" >
											<option value="" >Select</option>
											<?php foreach ($promo_type as $promo_type):?>
											<option value="<?php echo $promo_type['ID'];?>" ><?php echo $promo_type['VALUE_NAME'];?></option>
											<?php endforeach;?>
									</select>
										<span style="color:red;" id="errEditAppliestoId"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-3">
										<button class="btn btn-lg btn-success pull-right" type="button" id="editSavePromoBtnId" value="Save" tabindex="7" onclick="drd_BtnEditPromoSave();" ><strong>Save</strong></button>
										<a class="btn btn-lg  btn-primary  pull-right" href="<?php echo site_url(); ?>/promocodes" tabindex="8"><strong>Cancel</strong></a>
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
$('#selEditAppliestoId').val(<?php echo $promocode_data['CODE_APPLIES']; ?>);

	$('.crtDatePicker').datepicker({
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd,yy'
    });

	/*Form Validation Function For Button Disable*/
	function validate_edit_promo_code() {
		var js_drd_edit_promo_name = document.getElementById('txtEditPromoCodeNameId').value !=""; 
		var js_drd_edit_promo_code = document.getElementById('txtEditPromoCodeId').value !=""; 
		var js_drd_edit_discount = document.getElementById('txtEditPercentDiscountId').value !="";
		var js_drd_edit_srt_date = document.getElementById('txtEditStartDateId').value;  
		var js_drd_edit_end_date = document.getElementById('txtEditEndDateId').value; 
		var js_drd_valid_code_applies = document.getElementById('selEditAppliestoId').value !="";
		
		var js_drd_valid_srt_date = new Date(js_drd_edit_srt_date);
		var js_drd_sys_date = new Date();
		
		if (js_drd_edit_promo_name && js_drd_edit_promo_code && js_drd_edit_discount && js_drd_edit_srt_date !="" && js_drd_edit_end_date !="" && js_drd_valid_code_applies) {
			var js_drd_start_date = $.datepicker.formatDate('dd/mm/yy',new Date(js_drd_edit_srt_date));
			var js_drd_end_date = $.datepicker.formatDate('dd/mm/yy',new Date(js_drd_edit_end_date));
			
			var js_drd_srt_date_split = new Date(js_drd_start_date.split('/')[2],js_drd_start_date.split('/')[1],js_drd_start_date.split('/')[0]);
			
			var js_drd_end_date_split = new Date(js_drd_end_date.split('/')[2],js_drd_end_date.split('/')[1],js_drd_end_date.split('/')[0]);
			
			if(js_drd_srt_date_split > js_drd_end_date_split) {
				document.getElementById("editSavePromoBtnId").disabled = true;				  
			} else {
				document.getElementById("editSavePromoBtnId").disabled = false;
			}
		} else {
			document.getElementById("editSavePromoBtnId").disabled = true; 
		}	
	}
	
	/*Function for Edit Promo Code*/
	function drd_BtnEditPromoSave() {
		$("#editSavePromoBtnId").prop("disabled", true);
		$("#editSavePromoBtnId").css("cursor", "wait");
		btn_loading_fun();
		var js_drd_EditPromoData = $("#editPromoCodeFormId").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/editpromodetails",			
			data:js_drd_EditPromoData,
			success: function(ajx_drd_EditPromoData) {
			$("#editSavePromoBtnId").prop("disabled", true);
			$("#editSavePromoBtnId").css("cursor", "wait");	
				var js_drd_EditPromo = $.parseJSON(ajx_drd_EditPromoData);
				console.log("Return Add User form post value "+JSON.stringify(js_drd_EditPromo));
				
				if(js_drd_EditPromo['message'] != "") {		
					if(js_drd_EditPromo['message'] == '<?php echo $this->lang->line('m_90004') ?>') {
						document.getElementById('editPromoCode_Message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditPromo['message']+"</div>";
						window.setTimeout(function(){window.location.href="<?php echo site_url(); ?>/promocodes"},1000);
					} else {
						document.getElementById('editPromoCode_Message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditPromo['message']+"</div>";
					}
				} else {
					$("#editSavePromoBtnId").prop("disabled", false);
					$("#editSavePromoBtnId").css("cursor", "pointer");
							
					$("#errEditPromoCodeNameId").text(js_drd_EditPromo['EditPromoCodeName']);
					$("#errEditPromoCodeId").text(js_drd_EditPromo['EditPromoCode']);
					$("#errEditPercentDiscountId").text(js_drd_EditPromo['EditPercentDiscount']);
					$("#errEditStartDateId").text(js_drd_EditPromo['EditStartDate']);
					$("#errEditEndDateId").text(js_drd_EditPromo['EditEndDate']);
					$("#errEditAppliestoId").text(js_drd_EditPromo['EditAppliesTo']);
				}
				btn_loading_dismissfun();
			},
			error: function(){
			btn_loading_dismissfun();
			$("#editSavePromoBtnId").prop("disabled", false);
			$("#editSavePromoBtnId").css("cursor", "pointer");
			document.getElementById('editPromoCode_Message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
		});
	}


</script>