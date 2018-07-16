<?php if($advertisements_data['ID']){ ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12" style="word-wrap:break-word;">
										<h1 class="labeltext">Edit Advertisement</h1>
									</div>
								</div>
								<p></p>
								<form class="form-horizontal" id="formEditAdId">
									<div id="editNotificationMsgId"></div>
									<input type="hidden" class="form-control" name="txtEditAdIdNam" id="txtEditAdId" value="<?php echo $advertisements_data['ID']; ?>" />
									
									<div class="form-group">
									<label class="col-md-2">Advertiser</label>
									<div class="col-md-3">
										<input type="text" class="form-control" maxlength="60" tabindex="1" name="txtEditAdvertiserNam" id="txtEditAdvertiserId" value="<?php echo $advertisements_data['ADVERTISER']; ?>" onblur="validateMandatory('txtEditAdvertiserId','errEditAdvertiserId'); validate_edit_ad_form();" onkeypress="return OKValidateAlphaNumeric(event);" />
										<span id="errEditAdvertiserId" style="color:red;"></span>
									</div>
									</div>
	
									<div class="form-group pdfHideCLs">
										<label class="col-lg-2">Upload Image</label>
										<div class="col-lg-7">
										<div class="fileinput fileinput-new input-group" data-provides="fileinput" style="z-index:1;">
										<div class="form-control" data-trigger="fileinput">
										<input type="hidden" placeholder="" class="form-control editFileList" id="docId" name="docNam?>" value="<?php echo $advertisements_data['ID'];?>" />
											<i class="glyphicon glyphicon-file file_db fileinput-exists"></i>
											<span id="file_db"><?php echo $advertisements_data['ADD_PICTURE_PATH'];?></span>
										</div>
										<span class="input-group-addon">
											<a  onclick="removeDoc(<?php echo $advertisements_data['ID'];?>,'<?php echo $advertisements_data['ADD_PICTURE_PATH'];?>');validate_edit_ad_form();" class="">Remove</a>
										</span>
									</div> 
									</div>
									</div>
									
									<div class="form-group pdfEnableCLs" hidden >
										<label class="col-lg-2">Upload Image</label>
										<div class="col-lg-7">
										<div class="fileinput fileinput-new input-group" data-provides="fileinput" style="z-index:1;">
										<div class="form-control" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file fileinput-exists"></i>
											<span class="fileinput-filename"></span>
										</div>
										<span class="input-group-addon btn btn-default btn-file">
											<span class="fileinput-new" onclick="validate_edit_ad_form();">Upload..</span>
											<span class="fileinput-exists" onclick="validate_edit_ad_form();">Change</span>
											<input type="file" maxlength="300" tabindex="2" name="txtEditFileNam" id="txtEditFileId" onblur="validateMandatory('txtEditFileId','errEditFileId'); validate_edit_ad_form();" onchange="validateMandatory('txtEditFileId','errEditFileId');validate_edit_ad_form();" />
										</span>
									<a onclick="validate_edit_ad_form();" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div> 
									<span id="errEditFileId" style="color:red;"></span>
									</div>
									
									</div>
									
									
									<div class="form-group">
										<label class="col-lg-2">Banner URL</label>
										<div class="col-lg-6">
										<input type="text" class="form-control" maxlength="300" tabindex="3" name="txtEditUrlNam" id="txtEditUrlId" value="<?php echo $advertisements_data['BANNER_URL']; ?>" onblur="validate_edit_ad_form(); validateUrl('txtEditUrlId','errEditUrlId')" />
										<span id="errEditUrlId" style="color:red;"></span></div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Start Date</label>
										<div class="col-lg-3">
										<input type="text" readonly class="form-control crtDatePicker" tabindex="4" name="txtEditSrtDateNam" id="txtEditSrtDateId" value="<?php echo $article_creation_date = $this->common_functions->date_display_format($advertisements_data['AD_START_DATE']); ?>" onblur="validateMandatory('txtEditSrtDateId','errEditSrtDateId'); validate_edit_ad_form();" onchange="validateMandatory('txtEditSrtDateId','errEditSrtDateId'); validate_edit_ad_form();" />
										<span id="errEditSrtDateId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Active?</label>
										<div class="col-lg-3">
										<select class="form-control" tabindex="5" name="selEditActivateNam" id="selEditActivateId">
											<option value="<?php echo $active; ?>" >Yes</option>
											<option value="<?php echo $inactive; ?>" >No</option>
										</select>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Duration of Ad</label>
										<div class="col-lg-3">
										<select class="form-control" tabindex="6" name="selEditDurationNam" id="selEditDurationId">
											<option value="1">1 Month</option>
											<option value="2">2 Months</option>
											<option value="3">3 Months</option>
											<option value="4">4 Months</option>
											<option value="5">5 Months</option>
											<option value="6">6 Months</option>
											<option value="7">7 Months</option>
											<option value="8">8 Months</option>
											<option value="9">9 Months</option>
											<option value="10">10 Months</option>
											<option value="11">11 Months</option>
											<option value="12">12 Months</option>
										</select>
										<span id="errEditDurationId" style="color:red;"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-6">
										<button class="btn btn-lg btn-success pull-right" type="button" id="editSaveAdsBtnId" tabindex="7" ><strong>Save</strong></button>
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
<?php }  else { ?>
<br>
<br>
	<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90008') ?>'</div>
<?php } ?>
<script>
	$('#selEditActivateId').val(<?php echo $advertisements_data['ACTIVE_STATUS']; ?>);
	$('#selEditDurationId').val(<?php echo $advertisements_data['AD_DURATION']; ?>);

	if($('#file_db').text()!="")
	{
		$('.file_db').show();
	}

	$( ".crtDatePicker" ).datepicker({
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd, yy',
	});
	
	var doc_array = true;
	function validate_edit_ad_form(){
		var js_drd_url_patern = /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&=]*)/;
		var js_drd_edit_image = document.getElementById('txtEditFileId').value !=""; 
		var js_drd_edit_advertiser = document.getElementById('txtEditAdvertiserId').value !=""; 
		var js_drd_edit_url = document.getElementById('txtEditUrlId').value !=""; 
		var js_drd_valid_url = js_drd_url_patern.test(document.getElementById('txtEditUrlId').value);
		var js_drd_edit_srt_date = document.getElementById('txtEditSrtDateId').value !="";
		
		var $db_fileList = $('.editFileList').filter(function() {
			return this.value != ''
		});
		
		console.log("db_fileList"+$db_fileList.length);
		if($db_fileList.length ==0)
		{
			if(js_drd_edit_image)
			{
				doc_array = true;
			}
			else
			{
				doc_array = false; 
			}
		}
		else
		{
			doc_array = true;
		}
		console.log("doc_array "+doc_array);
		if ((js_drd_edit_advertiser && js_drd_edit_url && js_drd_valid_url && js_drd_edit_srt_date) && (doc_array == true)) {
			document.getElementById("editSaveAdsBtnId").disabled = false;
		} else {
			document.getElementById("editSaveAdsBtnId").disabled = true; 
		}	
	}
	
	/* Function for validate button on file field is empty */
	function validate_file() {
		document.getElementById("editSaveAdsBtnId").disabled = true;
	} 

$('#editSaveAdsBtnId').click(function() {
	$("#editSaveAdsBtnId").prop("disabled", true);
	$("#editSaveAdsBtnId").css("cursor", "wait");	
	btn_loading_fun();
	var js_drd_EditAdvertisementData = new FormData($('#formEditAdId')[0]);
	js_drd_EditAdvertisementData.append('txtEditFileNam', $('#txtEditFileId').files);
	js_drd_EditAdvertisementData.append('ajx_image_span', $("#file_db").text());
	js_drd_EditAdvertisementData.append('ajx_drd_edit_id', $("#txtEditAdId").val());
	js_drd_EditAdvertisementData.append('ajx_drd_edit_advertiser', $("#txtEditAdvertiserId").val());
	js_drd_EditAdvertisementData.append('ajx_drd_edit_url', $("#txtEditUrlId").val());
	js_drd_EditAdvertisementData.append('ajx_drd_edit_srt_date', $("#txtEditSrtDateId").val());
	js_drd_EditAdvertisementData.append('ajx_drd_edit_status', $("#selEditActivateId").val());
	js_drd_EditAdvertisementData.append('ajx_drd_edit_duration', $("#selEditDurationId").val());
	js_drd_EditAdvertisementData.append('doc_deletearray',JSON.stringify(doc_remove_array));
	
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/editadvertisementdata",
		datatype:'json',
		contentType: false,
		processData: false,
		data:js_drd_EditAdvertisementData,
		success: function(ajx_drd_EditAdvertisementResult) {
			var js_drd_EditAdvertisement = $.parseJSON(ajx_drd_EditAdvertisementResult);
			if (js_drd_EditAdvertisement['message'] != "") {
				if(js_drd_EditAdvertisement['message'] == '<?php echo $this->lang->line('m_90004'); ?>'){
					document.getElementById('editNotificationMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditAdvertisement['message']+"</div>";
					setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/advertisements"; }, 1000);
				} else {
					$("#editSaveAdsBtnId").prop("disabled", false);
					$("#editSaveAdsBtnId").css("cursor", "pointer");
					document.getElementById('editNotificationMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditAdvertisement['message']+"</div>";
				}				
			} else {  
				$("#editSaveAdsBtnId").prop("disabled", false);
				$("#editSaveAdsBtnId").css("cursor", "pointer");
				$("#errEditAdvertiserId").text(js_drd_EditAdvertisement['EditAdvertiser']);
				$("#errEditUrlId").text(js_drd_EditAdvertisement['EditUrl']);
				$("#errEditSrtDateId").text(js_drd_EditAdvertisement['EditStartDate']);
			}
			btn_loading_dismissfun();

		},
		error: function() {
			btn_loading_dismissfun();
			$("#editSaveAdsBtnId").prop("disabled", false);
			$("#editSaveAdsBtnId").css("cursor", "pointer");
			document.getElementById('editNotificationMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
	});	
});

var doc_remove_array=[];
function removeDoc(doc_id,file_path)
{
	$('.pdfHideCLs').remove();
	$('.pdfEnableCLs').show();
	doc_remove_array.push({DocId:doc_id,FilePath:file_path});
}

</script>