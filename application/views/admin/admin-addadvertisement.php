	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12" style="word-wrap:break-word;">
										<h1 class="labeltext">Add Advertisement</h1>
									</div>
								</div>
								<p></p>
								<form class="form-horizontal" id="formAdId">
								<div id="addAdvertisementMsgId" ></div>
									<div class="form-group">
									<label class="col-md-2">Advertiser</label>
									<div class="col-md-3">
										<input type="text" class="form-control" maxlength="60" tabindex="1" name="txtAddAdvertiserNam" id="txtAddAdvertiserId" onblur="validateMandatory('txtAddAdvertiserId','errAddAdvertiserId'); validate_add_form();" onkeypress="return OKValidateAlphaNumeric(event);" />
										<span id="errAddAdvertiserId" style="color:red;"></span>
									</div>
									</div>
									
										<div class="form-group">
										<label class="col-lg-2">Upload Image</label>
										<div class="col-lg-6">
										<div class="fileinput fileinput-new input-group" style="z-index:1;" data-provides="fileinput">
										<div class="form-control" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file fileinput-exists"></i>
											<span class="fileinput-filename"></span>
										</div>
										<span class="input-group-addon btn btn-default btn-file"  style="background:#3A67A2;color:#fff;">
											<span class="fileinput-new" >Upload..</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" maxlength="300" tabindex="2" name="txtAddFileNam" id="txtAddFileId" onblur="validateMandatory('txtAddFileId','errAddFileId'); validate_add_form();" onchange="validateMandatory('txtAddFileId','errAddFileId'); validate_add_form();" />
										</span>
									<a class="input-group-addon btn btn-default fileinput-exists" onclick="validate_file();" data-dismiss="fileinput" >Remove</a>
									</div> 
									<span id="errAddFileId" style="color:red;"></span>
									</div>							
									</div>
									
									<div class="form-group">
										<label class="col-lg-2">Banner URL</label>
										<div class="col-lg-6">
										<input type="text" class="form-control" maxlength="300" tabindex="3" name="txtAddUrlNam" id="txtAddUrlId" onblur="validate_add_form(); validateUrl('txtAddUrlId','errAddUrlId');" />
										<span id="errAddUrlId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Start Date</label>
										<div class="col-lg-3">
										<input type="text" readonly class="form-control crtDatePicker" tabindex="4" name="txtAddSrtDateNam" id="txtAddSrtDateId" onblur="validateMandatory('txtAddSrtDateId','errAddSrtDateId'); validate_add_form();" onchange="validateMandatory('txtAddSrtDateId','errAddSrtDateId'); Validatedate('txtAddSrtDateId','errAddSrtDateId'); validate_add_form();" />
										<span id="errAddSrtDateId" style="color:red;"></span>
										</div>
									</div>									
									<div class="form-group">
										<label class="col-lg-2">Active?</label>
										<div class="col-lg-3">
										<select class="form-control" name="selAddActivateNam" id="selAddActivateId" tabindex="5" >											
											<option value="<?php echo $active['ID']; ?>">Yes</option>
											<option value="<?php echo $inactive['ID']; ?>" >No</option>
										</select>
										<span id="errAddActivateId" style="color:red;"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Duration of Ad</label>
										<div class="col-lg-3">
										<select class="form-control" tabindex="6" name="selAddDurationNam" id="selAddDurationId" >
											<option value="1" >1 Month</option>
											<option value="2" >2 Months</option>
											<option value="3" >3 Months</option>
											<option value="4" >4 Months</option>
											<option value="5" >5 Months</option>
											<option value="6" >6 Months</option>
											<option value="7" >7 Months</option>
											<option value="8" >8 Months</option>
											<option value="9" >9 Months</option>
											<option value="10" >10 Months</option>
											<option value="11" >11 Months</option>
											<option value="12" >12 Months</option>
									</select>
									<span id="errAddDurationId" style="color:red;"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-6">
										<button class="btn btn-lg btn-success pull-right" type="button" id="addSaveAdsBtnId" disabled tabindex="7" ><strong>Save</strong></button>
										<a class="btn btn-lg  btn-primary  pull-right" href="<?php echo site_url(); ?>/advertisements" tabindex="8" ><strong>Cancel</strong></a>
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
	/* for date picker */
	$( ".crtDatePicker" ).datepicker({
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd, yy',
	});
	
	/*Form Validation for Button Enable*/
	function validate_add_form() {
		var js_drd_url_patern = /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&=]*)/;
		var js_drd_add_image = document.getElementById('txtAddFileId').value !=""; 
		var js_drd_add_advertiser = document.getElementById('txtAddAdvertiserId').value !=""; 
		var js_drd_add_url = document.getElementById('txtAddUrlId').value !=""; 
		var js_drd_valid_url = js_drd_url_patern.test(document.getElementById('txtAddUrlId').value);
		var js_drd_add_srt_date = document.getElementById('txtAddSrtDateId').value !="";
		
		if (js_drd_add_image && js_drd_add_advertiser && js_drd_add_url && js_drd_valid_url && js_drd_add_srt_date) {	
			var js_drd_getDate = document.getElementById('txtAddSrtDateId').value;
			var js_drd_date = new Date(js_drd_getDate);			
			var js_drd_convert_toDate= $.datepicker.formatDate('M dd,yy',new Date());	
			var js_drd_sys_date = new Date(js_drd_convert_toDate);			
			
			if (js_drd_date >= js_drd_sys_date) {
				document.getElementById("addSaveAdsBtnId").disabled = false; 
			} else {
				document.getElementById("addSaveAdsBtnId").disabled = true;  	
			}			
		} else {
			document.getElementById("addSaveAdsBtnId").disabled = true; 
		}
	}

	/* Function for validate button on file field is empty */
	function validate_file() {
		document.getElementById("addSaveAdsBtnId").disabled = true;
	} 
	
	/*Function for Add Advertisement*/
	$('#addSaveAdsBtnId').click(function(){
		$("#addSaveAdsBtnId").prop("disabled", true);
		$("#addSaveAdsBtnId").css("cursor", "wait");
		btn_loading_fun();
		var js_drd_AddAdvertisementData = new FormData($('#formAdId')[0]);
		js_drd_AddAdvertisementData.append('ajx_drd_image', $('#txtAddFileId').files);
		js_drd_AddAdvertisementData.append('ajx_drd_advertiser', $("#txtAddAdvertiserId").val());
		js_drd_AddAdvertisementData.append('ajx_drd_url', $("#txtAddUrlId").val());
		js_drd_AddAdvertisementData.append('ajx_drd_srt_date', $("#txtAddSrtDateId").val());
		js_drd_AddAdvertisementData.append('ajx_drd_status', $("#selAddActivateId").val());
		js_drd_AddAdvertisementData.append('ajx_drd_duration', $("#selAddDurationId").val());		
		
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/addadvertisementdata",
			datatype:'json',
			contentType: false,
			processData: false,
			data:js_drd_AddAdvertisementData,
			success: function(ajx_drd_AddAdvertisementResult) {
				var js_drd_AddAdvertisement = $.parseJSON(ajx_drd_AddAdvertisementResult);
				if (js_drd_AddAdvertisement['message'] != "") {
					if(js_drd_AddAdvertisement['message'] == '<?php echo $this->lang->line('m_90003'); ?>'){
						document.getElementById('addAdvertisementMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddAdvertisement['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/advertisements"; }, 1000);
					} else {
						$("#addSaveAdsBtnId").prop("disabled", false);
						$("#addSaveAdsBtnId").css("cursor", "pointer");
						document.getElementById('addAdvertisementMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddAdvertisement['message']+"</div>";
					}				
				} else {  
					$("#addSaveAdsBtnId").prop("disabled", false);
					$("#addSaveAdsBtnId").css("cursor", "pointer");
					$("#errAddAdvertiserId").text(js_drd_AddAdvertisement['AddAdvertiser']);
					$("#errAddUrlId").text(js_drd_AddAdvertisement['AddUrl']);
					$("#errAddSrtDateId").text(js_drd_AddAdvertisement['AddStartDate']);
					$("#errAddEndDateId").text(js_drd_AddAdvertisement['AddEndDate']);
				}
				btn_loading_dismissfun();

			},
			error: function() {
				$("#addSaveAdsBtnId").prop("disabled", false);
				$("#addSaveAdsBtnId").css("cursor", "pointer");
				btn_loading_dismissfun();
				document.getElementById('addAdvertisementMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});	
	});
</script>