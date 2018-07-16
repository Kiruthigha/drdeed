	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Add Promo Code</h1>
									</div>
								</div>
								<p></p>
							<div id="addPromoCode_Message"></div>
							<form class="form-horizontal" action="" id="addPromoCodeFormId">
							<div id="addPromoMsgId"></div>
									<div class="form-group">
									<label class="col-md-2">Promo Code Name</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="txtAddPromoCodeNameId" name="txtAddPromoCodeNameNam" maxlength="60" tabindex="1" onblur="promocodeUnique_exists('txtAddPromoCodeNameId','errAddPromoCodeNameId','PROMO_CODE_NAME'); validate_add_promocode_form();" onkeypress="return OKValidateAlphaNumeric(event);" />
									<span style="color:red;" id="errAddPromoCodeNameId"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Promo Code</label>
										<div class="col-lg-3"><input type="text" class="form-control" id="txtAddPromoCodeId" name="txtAddPromoCodeNam" maxlength="10" tabindex="2" onkeypress="return OKValidateAlphaNumeric(event);" onblur="promocodeUnique_exists('txtAddPromoCodeId','errAddPromoCodeId','PROMO_CODE'); validate_add_promocode_form();" />
										<span style="color:red;" id="errAddPromoCodeId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Percent Discount (%)</label>
										<div class="col-lg-2"><input type="text" class="form-control" id="txtAddPercentDiscountId" name="txtAddPercentDiscountNam" maxlength="2" tabindex="3" onkeypress="return numbersonlyEntry(event);" onblur="validateMandatory('txtAddPercentDiscountId','errAddPercentDiscountId'); validate_add_promocode_form();" />
										<span style="color:red;" id="errAddPercentDiscountId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Start Date</label>
										<div class="col-lg-3"><input type="text" placeholder="" class="form-control crtDatePicker" id="txtAddStartDateId" name="txtAddStartDateNam" readonly tabindex="4" onblur="validateMandatory('txtAddStartDateId','errAddStartDateId'); validate_add_promocode_form(); compareDate('txtAddStartDateId','txtAddEndDateId','errAddEndDateId');" onchange="validate_add_promocode_form(); compareDate('txtAddStartDateId','txtAddEndDateId','errAddEndDateId'); validateMandatory('txtAddStartDateId','errAddStartDateId'); Validatedate('txtAddStartDateId','errAddStartDateId');" />
										<span style="color:red;" id="errAddStartDateId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">End Date</label>
										<div class="col-lg-3"><input type="text" placeholder="" class="form-control crtDatePicker" id="txtAddEndDateId" name="txtAddEndDateNam" readonly tabindex="5" onblur="validateMandatory('txtAddEndDateId','errAddEndDateId'); validate_add_promocode_form();" onchange="validateMandatory('txtAddEndDateId','errAddEndDateId'); validate_add_promocode_form(); compareDate('txtAddStartDateId','txtAddEndDateId','errAddEndDateId');" />
										<span style="color:red;" id="errAddEndDateId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Applies to</label>
										<div class="col-lg-3">
										<select class="form-control" id="selAddAppliestoId" name="selAddAppliestoNam" tabindex="6" onblur="validateMandatory('selAddAppliestoId','errAddAppliestoId'); validate_add_promocode_form();" >
											<option value="" >Select</option>
											<?php foreach ($promo_type as $promo_type):?>
											<option value="<?php echo $promo_type['ID'];?>" ><?php echo $promo_type['VALUE_NAME']; ?></option>
											<?php endforeach; ?>
										</select>
										<span style="color:red;" id="errAddAppliestoId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-3">
										<button class="btn btn-lg btn-success pull-right" type="button" id="addSavePromoBtnId" value="Save" tabindex="7" onclick="drd_BtnAddPromoSave();" disabled ><strong>Save</strong></button>
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

<script>

	$('.crtDatePicker').datepicker({
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd, yy'
    });
	
	
	
	/*Form Validation for Button Enable*/
	function validate_add_promocode_form() {	
		var js_drd_add_promo_name = document.getElementById('txtAddPromoCodeNameId').value !=""; 
		var js_drd_add_promo_code = document.getElementById('txtAddPromoCodeId').value !=""; 
		var js_drd_add_discount = document.getElementById('txtAddPercentDiscountId').value !=""; 
		var js_drd_add_srt_date = document.getElementById('txtAddStartDateId').value;  
		var js_drd_add_end_date = document.getElementById('txtAddEndDateId').value;  
		var js_drd_apply_type = document.getElementById('selAddAppliestoId').value !="";
		
		var js_drd_valid_srt_date = new Date(js_drd_add_srt_date);
		var js_drd_convert_toDate= $.datepicker.formatDate('M dd,yy',new Date());	
		var js_drd_sys_date = new Date(js_drd_convert_toDate);
		
		if (js_drd_add_promo_name && js_drd_add_promo_code && js_drd_add_discount && js_drd_add_srt_date !="" && js_drd_add_end_date !="" && js_drd_apply_type) {	
			var js_drd_start_date = $.datepicker.formatDate('dd/mm/yy',new Date(js_drd_add_srt_date));
			var js_drd_end_date = $.datepicker.formatDate('dd/mm/yy',new Date(js_drd_add_end_date));
			
			var js_drd_srt_date_split = new Date(js_drd_start_date.split('/')[2],js_drd_start_date.split('/')[1],js_drd_start_date.split('/')[0]);
			
			var js_drd_end_date_split = new Date(js_drd_end_date.split('/')[2],js_drd_end_date.split('/')[1],js_drd_end_date.split('/')[0]);
			
			if(js_drd_srt_date_split > js_drd_end_date_split) {
				document.getElementById("addSavePromoBtnId").disabled = true;				  
			} else {
				if(js_drd_valid_srt_date >= js_drd_sys_date) {
					document.getElementById("addSavePromoBtnId").disabled = false;
				} else {
					document.getElementById("addSavePromoBtnId").disabled = true;
				}
			}
		} else {
			document.getElementById("addSavePromoBtnId").disabled = true; 
		}
	}
	
	/*Function For Promo Code*/
	function drd_BtnAddPromoSave() {
		$("#addSavePromoBtnId").prop("disabled", true);
		$("#addSavePromoBtnId").css("cursor", "wait");
		btn_loading_fun();
		var js_drd_AddPromoData = $("#addPromoCodeFormId").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/addpromodetails",			
			data:js_drd_AddPromoData,
			success: function(ajx_drd_AddPromoData) {
			$("#addSavePromoBtnId").prop("disabled", true);
			$("#addSavePromoBtnId").css("cursor", "wait");	
				var js_drd_AddPromo = $.parseJSON(ajx_drd_AddPromoData);
				
				if(js_drd_AddPromo['message'] != "") {
					if(js_drd_AddPromo['message'] == '<?php echo $this->lang->line('m_90003') ?>') {
						document.getElementById('addPromoMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddPromo['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/promocodes"; }, 1000);
					} else {
						document.getElementById('addPromoMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddPromo['message']+"</div>";
					}
				} else {
					$("#addSavePromoBtnId").prop("disabled", false);
					$("#addSavePromoBtnId").css("cursor", "pointer");
							
					$("#errAddPromoCodeNameId").text(js_drd_AddPromo['AddPromoCodeName']);
					$("#errAddPromoCodeId").text(js_drd_AddPromo['AddPromoCode']);
					$("#errAddPercentDiscountId").text(js_drd_AddPromo['AddPercentDiscount']);
					$("#errAddStartDateId").text(js_drd_AddPromo['AddStartDate']);
					$("#errAddEndDateId").text(js_drd_AddPromo['AddEndDate']);
					$("#errAddAppliestoId").text(js_drd_AddPromo['AddAppliesTo']);
				}
				btn_loading_dismissfun();
			},
			error: function() {				
				btn_loading_dismissfun();
				document.getElementById('addPromoMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}					
		});
	}

	
function promocodeUnique_exists(valueId,errId,uniquevalue) {
	var js_drd_promocode_value=document.getElementById(valueId).value;
	if(js_drd_promocode_value =="")	{
		document.getElementById(errId).innerHTML = errMsg['80547'];
	} else 	{
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/promocode-exists",			
			data:{
			'ajx_txtPromocodeValue':js_drd_promocode_value,
			'ajx_txtUniqueColumn':uniquevalue
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

</script>