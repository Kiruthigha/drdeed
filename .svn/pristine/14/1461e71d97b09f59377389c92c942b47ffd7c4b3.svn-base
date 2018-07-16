<?php if($content_master_data['ID']){?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Edit Content Master</h1>
									</div>
								</div>
								<p></p>
							<div id="message"></div>
							<form class="form-horizontal" action="" id="editContentMasterFormId">
								<div id="editContentMsgId"></div>
								<input type="hidden" class="form-control" name="txtEditContentIdName" id="txtEditId" value="<?php echo $content_master_data['ID']?>" />
							
									<div class="form-group">
									
										<label class="col-lg-2">Function Name</label>
										<div class="col-lg-6">
										<select class="form-control" id="selEditFunctionNameId" name="selEditFunctionNameNam" tabindex="1" onblur="validateMandatory('selEditFunctionNameId','errEditFunctionNameId'); validate_edit_content_form();" onchange="validateMandatory('selEditFunctionNameId','errEditFunctionNameId');" >
											<option value="" >Select</option>
											<?php foreach($function_name as $function_name):?>
											<option value="<?php echo $function_name['ID']; ?>"><?php echo $function_name['VALUE_NAME']; ?></option>
											<?php endforeach; ?>
										</select>
										<span style="color:red;" id="errEditFunctionNameId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2">Content</label>
										<div class="col-lg-6">
											<textarea class="form-control summernote" tabindex="2" id="txtEditContentId" name="txtEditContentNam" /><?php echo $content_master_data['CONTENT']?></textarea>
											<span style="color:red;" id="errEditContentId"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2"></label>
										<div class="col-lg-6">
										<button class="btn btn-lg btn-success pull-right" type="button" id="editSaveContentBtnId" value="Save" tabindex="3" onclick="drd_BtnEditContentSave();" ><strong>Save</strong></button>
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
<?php }  else { ?>
<br>
<br>
	<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a><?php echo $this->lang->line('m_90008') ?></div>
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
					validate_edit_content_form();
					if (t.trim().length >= max) {
						//delete key
					/* if (e.keyCode != 8)
						e.preventDefault(); */
					// add other keys ...
					}
				},
				onKeyup: function(e) {
					var t = e.currentTarget.innerText;
					note_count(t.trim().length);
					validate_edit_content_form();
					if (typeof callbackMax == 'function') {
						callbackMax(max - t.trim().length);
					}
				},
				onPaste: function(e) {
					var t = e.currentTarget.innerText;
					note_count(t.trim().length);
					validate_edit_content_form();
					var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
					//e.preventDefault();
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
			document.getElementById('errEditContentId').innerHTML = errMsg['80547'];
		} else {
			document.getElementById('errEditContentId').innerHTML = '';
		}
	}
	
	/* Function Call For Summernote Maximum Length Count  */	
	setTimeout(function(){
		registerSummernote('.summernote', '', 2500, function(max) {
			//$('#errEditContentId').text(max)
		});
	},1);

	$('#selEditFunctionNameId').val(<?php echo $content_master_data['FUNCTION_NAME']; ?>);

	/*Form Validation for Button Enable*/
	function validate_edit_content_form() {		
		var js_drd_edit_function_name = document.getElementById('selEditFunctionNameId').value !=""; 
		//var js_drd_edit_content = document.getElementById('txtEditContentId').value !=""; 
		
		if (js_drd_edit_function_name) {	
			if($('#txtEditContentId').summernote('isEmpty')) {
				document.getElementById("editSaveContentBtnId").disabled = true; 
			} else {
				document.getElementById("editSaveContentBtnId").disabled = false; 
			}
		} else {
			document.getElementById("editSaveContentBtnId").disabled = true; 
		}
	}

	/*Function for Update*/
	function drd_BtnEditContentSave() {
		$("#editSaveContentBtnId").prop("disabled", true);
		$("#editSaveContentBtnId").css("cursor", "wait"); 
		btn_loading_fun();
		
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/editcontentmasterdetails",			
			data:{
				'ajx_edit_id':$("#txtEditId").val(),
				'ajx_edit_function_name':$("#selEditFunctionNameId").val(),
				'ajx_edit_content':$("#txtEditContentId").val(),
			},
			success: function(ajx_drd_EditContentData) {
			$("#editSaveContentBtnId").prop("disabled", true);
			$("#editSaveContentBtnId").css("cursor", "pointer");	
				var js_drd_EditContent = $.parseJSON(ajx_drd_EditContentData);
				if(js_drd_EditContent['message'] != "") {				
					if(js_drd_EditContent['message'] == '<?php echo $this->lang->line('m_90004') ?>') {
						document.getElementById('editContentMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditContent['message']+"</div>";
						setTimeout(function(){ window.location.href="<?php echo site_url(); ?>/contentmaster"; }, 1000);
					} else {
						document.getElementById('editContentMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_EditContent['message']+"</div>";
					}
				} else {
					$("#editSaveContentBtnId").prop("disabled", false);
					$("#editSaveContentBtnId").css("cursor", "pointer");
							
					$("#errEditFunctionNameId").text(js_drd_EditContent['EditFunctionName']);
					$("#errEditContentId").text(js_drd_EditContent['EditContent']);
				}
				btn_loading_dismissfun();
			},
		error: function(){
			$("#editSaveContentBtnId").prop("disabled", false);
			$("#editSaveContentBtnId").css("cursor", "pointer");
			btn_loading_dismissfun();
			document.getElementById('editContentMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}				
		});
	}

</script>