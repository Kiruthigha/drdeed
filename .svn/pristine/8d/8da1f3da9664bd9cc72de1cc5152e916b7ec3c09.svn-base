<style>
input textarea{
	pEditing-left:0px;
	font-family: Arial;
	font-weight: 700;
}
</style>
<?php if($notification_data['ID']){?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12" style="word-wrap:break-word;">
										<h1 class="labeltext">Edit Notification</h1>
									</div>
								</div>
								<form class="form-horizontal" id="formEditNotifyId" >
								<div id="editNotificationMsgId"></div>
									<input type="hidden" class="form-control" name="txtEditNotifyIdNam" id="txtEditNotifyId" value="<?php echo $notification_data['ID']; ?>" />
									
									<div class="form-group">
									<label class="col-md-2">Title</label>
									<div class="col-md-6">
									<input type="text" class="form-control" maxlength="60" tabindex="1" name="txtEditTitleNam" id="txtEditTitleId" value="<?php echo $notification_data['TITLE']?>" onblur="validateMandatory('txtEditTitleId','errEditTitleId'); validate_edit_notify_form();" onkeypress="return OKValidateAlphaNumeric(event);" />
									<span id="errEditTitleId" style="color:red;"></span>
									</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2">Article</label>
										<div class="col-lg-6">
										<textarea class="form-control summernote" tabindex="2" name="txtEditArticleNam" id="txtEditArticleId" ><?php echo $notification_data['ARTICLE_DESCRIPTION']?></textarea>
										<span id="errEditArticleId" style="color:red;"></span>
										</div> 
									</div>
									<div class="form-group">
										<label class="col-lg-2">Creation Date</label>
										<div class="col-lg-3">
											<?php $article_creation_date = $this->common_functions->date_display_format($notification_data['ARTICLE_CREATE_DATE']); ?>
											<input type="text" class="form-control crtDatePicker" readonly tabindex="3" name="txtEditDateNam" id="txtEditDateId" value="<?php echo $article_creation_date; ?>" onblur="validate_edit_notify_form(); validateMandatory('txtEditDateId','errEditDateId');" onchange="validate_edit_notify_form(); validateMandatory('txtEditDateId','errEditDateId');" />
											<span id="errEditDateId" style="color:red;"></span>
										</div> 
									</div>									
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-6">
										<button class="btn btn-lg btn-success pull-right" type="button" tabindex="4" id="editSaveNotifyBtnId" ><strong>Save</strong></button>
										<a class="btn btn-lg btn-primary pull-right" tabindex="5" href="<?php echo site_url(); ?>/notifications"><strong>Cancel</strong></a>
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
	/* Function For Text Editor */	
	function registerSummernote(element, placeholder, max, callbackMax) {
		//alert();
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
					validate_edit_notify_form();
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
					validate_edit_notify_form();
					if (typeof callbackMax == 'function') {
						callbackMax(max - t.trim().length);
					}
				},
				onPaste: function(e) {
					var t = e.currentTarget.innerText;
					note_count(t.trim().length);
					validate_edit_notify_form();
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
			document.getElementById('errEditArticleId').innerHTML = errMsg['80547'];
		} else {
			document.getElementById('errEditArticleId').innerHTML = '';
		}
	}
	
	/* Function Call For Summernote Maximum Length Count  */	
	setTimeout(function(){
		registerSummernote('.summernote', '', 2500, function(max) {
			//$('#errEditArticleId').text(max)
		});
	},1);

	/* Function For Date Picker */	
	$( ".crtDatePicker" ).datepicker({
		changeYear  : true,
		changeMonth : true,
		clearText: "Clear",
		dateFormat: 'M dd, yy',
	});	
	
	/* Form Validation for Button Enable */	
	function validate_edit_notify_form() {
		var js_drd_edit_title = document.getElementById('txtEditTitleId').value !=""; 
		var js_drd_edit_creation_date = document.getElementById('txtEditDateId').value !=""; 
		
		if (js_drd_edit_title && js_drd_edit_creation_date) {
			if($('#txtEditArticleId').summernote('isEmpty')) {
				document.getElementById("editSaveNotifyBtnId").disabled = true; 
			} else {
				document.getElementById("editSaveNotifyBtnId").disabled = false; 
			}		
		} else {
			document.getElementById("editSaveNotifyBtnId").disabled = true; 
		}		
	}	
	
	/* Function For Notification Update */	
	$('#editSaveNotifyBtnId').click(function() {
		$("#editSaveNotifyBtnId").prop("disabled", true);
		$("#editSaveNotifyBtnId").css("cursor", "wait");	
		btn_loading_fun();
		
		var js_drd_id = document.getElementById('txtEditNotifyId').value;
		var js_drd_title = document.getElementById('txtEditTitleId').value;
		var js_drd_article = document.getElementById('txtEditArticleId').value;
		var js_drd_creation_date = document.getElementById('txtEditDateId').value;
		
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/notificationedit",
			data:{
				'ajx_edit_id':js_drd_id,
				'ajx_edit_title':js_drd_title,
				'ajx_edit_article':js_drd_article,
				'ajx_edit_date':js_drd_creation_date,				
			},
			success: function(ajx_drd_EditNotifyResult) {
				var js_drd_EditNotification = $.parseJSON(ajx_drd_EditNotifyResult);
				if (js_drd_EditNotification['message'] != "") {
					if(js_drd_EditNotification['message'] == '<?php echo $this->lang->line('m_90004'); ?>') {
						document.getElementById('editNotificationMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditNotification['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/notifications"; }, 1000);
					} else {
						$("#editSaveNotifyBtnId").prop("disabled", false);
						$("#editSaveNotifyBtnId").css("cursor", "pointer");
						document.getElementById('editNotificationMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditNotification['message']+"</div>";
					}	
				} else {  
					$("#editSaveNotifyBtnId").prop("disabled", false);
					$("#editSaveNotifyBtnId").css("cursor", "pointer");
					$("#errEditTitleId").text(js_drd_EditNotification['EditTitle']);
					$("#errEditArticleId").text(js_drd_EditNotification['EditArticle']);
					$("#errEditDateId").text(js_drd_EditNotification['EditDate']);
				}
				btn_loading_dismissfun();
			},
			error: function() {
				$("#editSaveNotifyBtnId").prop("disabled", false);
				$("#editSaveNotifyBtnId").css("cursor", "pointer");
				btn_loading_dismissfun();
				document.getElementById('editNotificationMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});	
	});
</script>