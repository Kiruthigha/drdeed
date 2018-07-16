<style>
div.col-lg-3{
	padding-right:0px !important;
}
input textarea{
	padding-left:0px;
	font-family: Arial;
	font-weight: 700;
}
.col-lg-1{
	width:0;
}
.col-lg-3{
	width:19.5%;
}
.col-lg-10{
	padding-left:0px;
	padding-right:0px;
}

.urlinfo{
	float:left;
}
textarea
{
	width:100%;
}
</style>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<form class="form-horizontal"> 
									<div class="row">
										<div class="col-md-12" style="word-wrap:break-word;">
											<h1 class="labeltext">State Regulations</h1>
										</div>
									</div>
									<p></p>
								<div class="form-group">
									<div class="col-md-2"></div>
									<div class="col-lg-1"></div>
									<div class="col-md-7">
									<input type="checkbox"  class="i-checks" name="chkbox" id="chkAllStatesId"><span>&nbsp; Apply to All States</span> 
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-7 col-md-offset-2 ">
										<span style="color:red;float:right;" class="errStateContentCls"></span> <br/>
										<span style="color:red;float:right;" class="errStateUrlCls"></span>
									</div>
								</div>
									
								<form id="formStatesGuidelinesId">	
								<div id="stateGuidelineMsgId"></div>
																	
									<div class="stateContent">
									
									<?php $i=1; foreach($state_list as $state_data): ?>
									<input type="hidden" class="form-control" id="txtStateId<?php echo $i;?>" name="txtStateIdNam" value="<?php echo $state_data['STATE_ID'];?>" />
									
									<input type="hidden" class="form-control" id="txtStateRegId<?php echo $i;?>" name="StateRegIdNam" value="<?php echo $state_data['ID'];?>" />	
									
										<div class="form-group">	
											<div class="col-lg-1"></div>
											<div class="col-lg-2">
												<label><?php echo $state_data['STATE_NAME'];?></label>
											</div>
											<div class="col-md-7">
												<textarea class="form-control clsStateContent summernote" id="txtStateGuideneId<?php echo $i;?>" name="stateReg[]" ><?php echo $state_data['STATE_GUIDELINES'];?></textarea>
												<span id="errStateGuideneId<?php echo $i;?>" style="color:red;"></span>
											</div>
										</div>
										
										<div class="form-group">
												<div class="col-lg-3"></div>
												<div class="col-lg-7">
													<div class="col-lg-2" style="padding-left:0px;">
														<label class="urlinfo">More Info URL</label>
													</div>
													<div class="col-lg-10">
													<input type="text" maxlength="300" class="form-control clsStateContentURL" id="txtStateUrlId<?php echo $i;?>" name="stateRegulation[]" onblur="validateUrl('txtStateUrlId<?php echo $i;?>','errStateUrlId<?php echo $i;?>'); validation();" value="<?php echo $state_data['STATE_REF_URL'];?>" />
													<span id="errStateUrlId<?php echo $i;?>" style="color:red;"></span>
													</div>									
												</div>
												<div class="col-lg-2"></div>
										</div>										
										<?php $i++;
										endforeach;?>										
									</div> <!--end  stateContent-->								
								</form>
								
									<form id="formApplyAllStatesId">														
										<div class="AllStateEnableContent">
											<div class="form-group">	
												<div class="row">
													<div class="col-lg-1"></div>
													<div class="col-lg-2">
														<label>State Guidelines</label>
													</div>
													<div class="col-lg-7">
														<textarea class="form-control clsAllStateContent summernote" name="txtStateRglnNam" id="txtStateguidelinesId" ><?php echo $state_list[0]['STATE_GUIDELINES'];?></textarea>
														<span id="errStateRglnId" style="color:red"></span>
													</div>
													
													<div class="col-lg-2"></div>
												</div>
											</div>
										
											<div class="form-group">
												<div class="row">									
													<div class="col-lg-3"></div>
													<div class="col-lg-7">
														<div class="col-lg-2"  style="padding-left:0px;">
														<label class="urlinfo">More Info URL</label>
														</div>
														<div class="col-lg-10">
														<input type="text" maxlength="300" class="form-control" name="txtStateUrlNam" id="txtStateUrlId" onblur="validateUrl('txtStateUrlId','errStateUrlId'); OB_EmptyValidation();" value="<?php echo $state_list[0]['STATE_REF_URL'];?>" />
														<span id="errStateUrlId" style="color:red"></span>
														</div>
													</div>
													<div class="col-lg-2"></div>
												</div>
											</div>										
										</div> 
									
									</form>
									
									<div class="form-group">
										<label class="col-lg-3"></label>
										<div class="col-lg-7">
										<button class="btn btn-lg btn-success pull-right" type="button" id="addSaveBtnId" onclick="submitFun();" tabindex="1" ><strong>Save</strong></button>
										<a class="btn btn-lg btn-primary pull-right" href="<?php echo site_url(); ?>/admindashboard" tabindex="2" ><strong>Cancel</strong></a>
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
					OB_EmptyValidation();
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
					OB_EmptyValidation();
					if (typeof callbackMax == 'function') {
						callbackMax(max - t.trim().length);
					}
				},
				onPaste: function(e) {
					var t = e.currentTarget.innerText;
					note_count(t.trim().length);
					OB_EmptyValidation();
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
			document.getElementById('errStateRglnId').innerHTML = errMsg['80547'];
		} else {
			document.getElementById('errStateRglnId').innerHTML = '';
		}
	}	

	var stateRegInput = document.getElementsByName('stateReg[]');
	/* Function For Text Editor */	
	function validateSummernote(element, placeholder, max, callbackMax) {
		
		for (var i=1; i<stateRegInput.length; i++)
		{
		
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
					snote_count(t.trim().length,i);
					validation();
					if (t.trim().length >= max) {
						//delete key
					/* if (e.keyCode != 8)
						e.preventDefault(); */
					// add other keys ...
					}
				},
				onKeyup: function(e) {
					var t = e.currentTarget.innerText;
					snote_count(t.trim().length,i);
					validation();
					if (typeof callbackMax == 'function') {
						callbackMax(max - t.trim().length);
					}
				},
				onPaste: function(e) {
					var t = e.currentTarget.innerText;
					snote_count(t.trim().length,i);
					validation();
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
	}	
	
	function snote_count(count,errId)
	{	
		for (var i = 1; i <= $('.clsStateContent').length; i++)
		{
				//console.log("State Val "+$('#txtStateGuideneId'+i).val());
			if ($('#txtStateGuideneId'+i).val()!="<br>") 
			{
				console.log("Inside If");
				document.getElementById('errStateGuideneId'+i).innerHTML = '';
			}
			else
			{
				console.log("Inside else");
				document.getElementById('errStateGuideneId'+i).innerHTML = errMsg['80547'];
			}
		}
	}	
	
	$(document).ready(function() {
		$('.stateContent').show();	
		$('.AllStateEnableContent').hide();	
		$('.i-checks').iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
		});   
	});
	
	/* Function Call For Summernote Maximum Length Count  */	
	setTimeout(function(){
		validateSummernote('.clsStateContent', '', 2500, function(max) {
			//$('#errStateGuideneId').text(max)
		});
	},1);	

	/* Function Call For Summernote Maximum Length Count  */	
	setTimeout(function(){
		registerSummernote('.clsAllStateContent', '', 2500, function(max) {
			//$('#errStateRglnId').text(max)
		});
	},1);
	
	
	/* Button Disabled Function for Apply to All States */ 
	function OB_EmptyValidation() { 
		var js_drd_checkbox_value = document.getElementById("chkAllStatesId").checked;
		var js_drd_url_patrn = /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&=]*)/;
		if(js_drd_checkbox_value == true) {	
			//var js_drd_guidelines = document.getElementById('txtStateguidelinesId').value!="";
			var js_drd_url = document.getElementById('txtStateUrlId').value!="";
			var js_drd_pattern_url = js_drd_url_patrn.test(document.getElementById('txtStateUrlId').value);
					
			if(js_drd_url  && js_drd_pattern_url) {
				if($('#txtStateguidelinesId').summernote('isEmpty')) {
					document.getElementById("addSaveBtnId").disabled = true; 
				} else {
					document.getElementById("addSaveBtnId").disabled = false; 
				}
			} else {
				$("#addSaveBtnId").prop("disabled", true);	
			}
				
		} else {
		$("#addSaveBtnId").prop("disabled", false);
		}
	}

	/* Function For State Regulation Update  */ 
	function submitFun() {
		$("#addSaveBtnId").prop("disabled", true);
		$("#addSaveBtnId").css("cursor", "wait");	
		btn_loading_fun();
		var js_drd_sates_guidelines = [];
		var js_drd_chk_value = document.getElementById("chkAllStatesId").checked;
		if(js_drd_chk_value == true) {	
			var js_drd_guideLines = $("#txtStateguidelinesId").val();
			var js_drd_url = $("#txtStateUrlId").val();

			var js_drd_guideLineData = {
				'guidelines' : js_drd_guideLines,
				'url' : js_drd_url
			};
			
			js_drd_sates_guidelines.push(js_drd_guideLineData);			
		} else {
			
			var status;
			var js_drd_chkBoxLength = $( ".clsStateContent" ).length;	
			var js_apptyToAll = 0;
			for (var i=1; i<=js_drd_chkBoxLength; i++) { 
				var js_drd_stateId = $("#txtStateId"+i).val();
				var js_drd_stateRegId = $("#txtStateRegId"+i).val();
				var js_drd_guideLines = $("#txtStateGuideneId"+i).val();
				var js_drd_url = $("#txtStateUrlId"+i).val();

				var js_drd_guideLineData = {
					'stateId' : js_drd_stateId,
					'stateRegId' : js_drd_stateRegId,
					'guidelines' : js_drd_guideLines,
					'url' : js_drd_url
				};
				js_drd_sates_guidelines.push(js_drd_guideLineData);
				//js_drd_sates_guidelines.push(js_apptyToAll);
			}
			console.log(js_drd_sates_guidelines);
		}		

		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/addstateregulations",
			dataType: "text",
			
			data:{'ajx_drd_sates_guidelines':js_drd_sates_guidelines },
			
			success: function(ajx_drd_sates_guidelines) {

				var js_drd_Guideline_Result = $.parseJSON(ajx_drd_sates_guidelines);
				if (js_drd_Guideline_Result['message'] != "") {
					
					if(js_drd_Guideline_Result['message'] == '<?php echo $this->lang->line('m_90004') ?>') {
						document.getElementById('stateGuidelineMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_Guideline_Result['message']+"</div>";
						setTimeout(function(){ window.location.href= window.location.href; }, 1000);
					} else {
						$("#btnSubscriptionId").prop("disabled", false);
						$("#btnSubscriptionId").css("cursor", "pointer");
						document.getElementById('stateGuidelineMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_Guideline_Result['message']+"</div>";
					}

				} else {
					document.getElementById('stateGuidelineMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
				}
				$("#addSaveBtnId").prop("disabled", false);
				$("#addSaveBtnId").css("cursor", "pointer");	
				btn_loading_dismissfun();
			},
			error: function() {
				btn_loading_dismissfun();
				$("#addSaveBtnId").prop("disabled", false);
				$("#addSaveBtnId").css("cursor", "pointer");
				document.getElementById('stateGuidelineMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});
	}
	
	var data = 0;
	var state_data = 0;
	/* Button Disabled validation Function */ 
	function validation() { 
		data = 0;
		state_data = 0;
		var js_drd_url_patrn = /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&=]*)/;
		
		var $crsStateurlempty = $('.clsStateContentURL').filter(function() {
			return this.value != ''
		});
		for (var i = 1; i <= $('.clsStateContentURL').length; i++)
		{
			//console.log(i);
			if((document.getElementById('txtStateUrlId'+i).value !=0) && (js_drd_url_patrn.test(document.getElementById('txtStateUrlId'+i).value))) 
			{
				//console.log('State URL '+document.getElementById('txtStateUrlId'+i).value+"</br>");
				//console.log('All URL is true');
			}
			else
			{
				data=data+1;
			}
		}
		for (var j = 1; j <= $('.clsStateContent').length; j++)
		{
				//console.log("State Val "+$('#txtStateGuideneId'+i).val());
			if ($('#txtStateGuideneId'+j).val()=="<br>") 
			{
				state_data=state_data+1;
			}
		}
			
		console.log('State Guidlines '+state_data);
		console.log('State URL '+data);
		if((state_data == 0) && (data ==0)) {
			document.getElementById("addSaveBtnId").disabled = false;
		} else {
			document.getElementById("addSaveBtnId").disabled = true;
		}
	}
	
	/* Check box check Show Hide Functions */ 
	$('.i-checks').on('ifChecked', function (){	
		$('span.errStateUrlCls').text('');
		$('span.errStateContentCls').text('');
		stateurlarray=[];
		statecountarray=[];
		errorcount=0;
		$('.AllStateEnableContent').show();	
		$('.stateContent').hide();		
	});

	$('.i-checks').on('ifUnchecked', function () {
		$('span.errStateUrlCls').text('');
		stateurlarray=[];
		statecountarray=[];
		errorcount=0;
		$('span.errStateContentCls').text('');	
		$('.AllStateEnableContent').hide();	
		$('.stateContent').show();
	});
</script>