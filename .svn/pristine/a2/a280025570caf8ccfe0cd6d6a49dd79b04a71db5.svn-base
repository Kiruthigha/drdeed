<style>
input, textarea{
	padding-left:0px;
	font-family: Arial;
}
</style>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12" style="word-wrap:break-word;">
										<h1 class="labeltext">Add Notification</h1>
									</div>
								</div>
								<form class="form-horizontal" id="formNotifyId">
									<div id="addNotificationMsgId"></div>
									<div class="form-group">
										<label class="col-md-2">Title</label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="60" tabindex="1" name="txtAddTitleNam" id="txtAddTitleId" onblur="validateMandatory('txtAddTitleId','errAddTitleId'); validate_notification_form();" onkeypress="return OKValidateAlphaNumeric(event);" />
											<span id="errAddTitleId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Article</label>
										<div class="col-lg-6">
											<textarea class="form-control summernote" name="txtAddArticleNam" tabindex="2" id="txtAddArticleId"  ></textarea>
											<span id="errAddArticleId" style="color:red;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Creation Date</label>
										<div class="col-lg-3">
											<input type="text" class="form-control crtDatePicker" readonly tabindex="3" name="txtAddDateNam" id="txtAddDateId" onblur="validateMandatory('txtAddDateId','errAddDateId'); validate_notification_form();" onchange="validateMandatory('txtAddDateId','errAddDateId');validate_notification_form();; Validatedate('txtAddDateId','errAddDateId');" />
											<span id="errAddDateId" style="color:red;"></span>
										</div>
									</div>									
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-6">
											<button class="btn btn-lg btn-success pull-right" type="button" id="addSaveNotifyBtnId" tabindex="4" disabled><strong>Save</strong></button>
											<a class="btn btn-lg  btn-primary  pull-right" tabindex="5" href="<?php echo site_url(); ?>/notifications"><strong>Cancel</strong></a>
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
	/* Function For Text Editor */	
	function registerSummernote(element, placeholder, max, callbackMax) {
		$(element).summernote({
			height: 100,
			toolbar: [
				['style', ['style', ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']]],
				['style', ['bold', 'italic', 'underline']],
				['fontname', ['fontname']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['view', ['codeview']]
			],
			placeholder,
			callbacks: {
				onKeydown: function(e) {
					var t = e.currentTarget.innerText;
					note_count(t.trim().length);
					validate_notification_form();
					if (t.trim().length >= max) {
						//delete key
					if (e.keyCode != 8)
						e.preventDefault();
					// add other keys ...
					}
				},
				onKeyup: function(e) {
					var t = e.currentTarget.innerText;
					note_count(t.trim().length);
					validate_notification_form();
					if (typeof callbackMax == 'function') {
						callbackMax(max - t.trim().length);
					}
				},
				onPaste: function(e) {
					var t = e.currentTarget.innerText;
					note_count(t.trim().length);
					validate_notification_form();
					var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
					e.preventDefault();
					var all = t + bufferText;
					document.execCommand('insertText', false, all.trim().substring(0, 2500));
					if (typeof callbackMax == 'function') {			  
						callbackMax(max - t.length);
					}
				}
			}
		});
	}
	
	/* Field Validation Function For Text Editor */	
	function note_count(count)
	{		
		if(count == 0) {
			document.getElementById('errAddArticleId').innerHTML = errMsg['80547'];
			document.getElementById("addSaveNotifyBtnId").disabled = true;
		} else {
			document.getElementById('errAddArticleId').innerHTML = '';
			document.getElementById("addSaveNotifyBtnId").disabled = false;
		}
	}
	
	/* Function Call For Summernote Maximum Length Count  */	
	setTimeout(function(){
		registerSummernote('.summernote', '', 2500, function(max) {
			//$('#errAddArticleId').text(max)
		});
	},0);
	
	/* Function For Date Picker */
	$( ".crtDatePicker" ).datepicker({
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd, yy',
	});	
	
	/* Form Validation for Button Enable */	
	function validate_notification_form() {
		var js_drd_title = document.getElementById('txtAddTitleId').value !=""; 		
		var js_drd_art = document.getElementById('txtAddArticleId').value;
		var js_drd_article = js_drd_art.trim(); 

		var js_drd_creation_date = document.getElementById('txtAddDateId').value !=""; 
		
		if (js_drd_title && js_drd_article!="" && js_drd_creation_date) {
			var getDate = document.getElementById('txtAddDateId').value;
			var date = new Date(getDate);
			var js_drd_convert_toDate= $.datepicker.formatDate('M dd, yy',new Date());	
			var js_drd_sys_date = new Date(js_drd_convert_toDate);
			
			if($('#txtAddArticleId').summernote('isEmpty')) {
					document.getElementById("addSaveNotifyBtnId").disabled = true;
				} else {					
					if (date >= js_drd_sys_date) {
						document.getElementById("addSaveNotifyBtnId").disabled = false;
					} else {
						document.getElementById("addSaveNotifyBtnId").disabled = true; 	
					}					
				} 
						
		} else {
			document.getElementById("addSaveNotifyBtnId").disabled = true; 
		}
	}
	
	/* Function For Add Notification */
	$('#addSaveNotifyBtnId').click(function() {
		$("#addSaveNotifyBtnId").prop("disabled", true);
		$("#addSaveNotifyBtnId").css("cursor", "wait");
		btn_loading_fun();		
		
		var js_title = document.getElementById('txtAddTitleId').value;
		var js_article = document.getElementById('txtAddArticleId').value;
		var js_creation_date = document.getElementById('txtAddDateId').value;
		
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/notificationadd",
			data:{
				'ajx_title':js_title,
				'ajx_article':js_article,
				'ajx_date':js_creation_date,				
			},
			success: function(ajx_drd_AddNotifyResult) {			
				var js_drd_AddNotification = $.parseJSON(ajx_drd_AddNotifyResult);			
				if (js_drd_AddNotification['message'] != "") {
					if(js_drd_AddNotification['message'] == '<?php echo $this->lang->line('m_90003'); ?>') {
						document.getElementById('addNotificationMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddNotification['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/notifications"; }, 1000);
					} else {
						$("#addSaveNotifyBtnId").prop("disabled", false);
						$("#addSaveNotifyBtnId").css("cursor", "pointer");
						document.getElementById('addNotificationMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_AddNotification['message']+"</div>";
					}				
				} else {  
					$("#addSaveNotifyBtnId").prop("disabled", false);
					$("#addSaveNotifyBtnId").css("cursor", "pointer");
					$("#errAddTitleId").text(js_drd_AddNotification['AddTitle']);
					$("#errAddArticleId").text(js_drd_AddNotification['AddArticle']);
					$("#errAddDateId").text(js_drd_AddNotification['AddDate']);
				}
				btn_loading_dismissfun();
			},
			error: function() {
				btn_loading_dismissfun();
				$("#addSaveNotifyBtnId").prop("disabled", false);
				$("#addSaveNotifyBtnId").css("cursor", "pointer");
				document.getElementById('addNotificationMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});	
	});
</script>