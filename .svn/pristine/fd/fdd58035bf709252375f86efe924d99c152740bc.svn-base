<style> 
/* Added by Rajee june 23 2018 */
.chosen-container-single .chosen-default{
		color: #cb91ad !important;		
		text-align:left;
	}
	.highlighted{
		background-color: #E0AC0F !important;
	}
	.chosen-search{
		color: #000 !important;
	}
	
	.slimScrollRail {
		background: #E9E9EA !important;
	}
	
	.guide-col-pad {		
		padding-right: 0px;
	}
	.state-col-pad {		
		padding-left: 0px;
	}
	
	input, textarea, select {
		outline: 1.5px solid #000 !important;
	}
	
	.checkbox input[type="checkbox"], .checkbox input[type="radio"] {
    opacity: 0;
    z-index: 1;
}
	
	@media (max-width: 960px) {
		.guide-col-pad {		
			padding-left: 0px;
			padding-right: 0px;
		}
		.state-col-pad {		
			padding-left: 0px;
			padding-right: 0px;
		}
		
	}
</style>

<div class="wrapper-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<div class="row">
					<div class="col-md-12 col-xs-12" style="border-bottom: 2px solid #D4D4D4;padding-left:0px;">
						<h1 class="p-header">Diplomate Program</h1>
					</div>
				</div>
				<div class="row" style="padding-top:50px;">
					<div class="col-md-3 state-col-pad">
						<div class="form-group">
							<div>							
								<select class="chosen-select" name="selStateNam" id="selStateId" onchange="validateMandatory('selStateId','errStateId');OBvalidate_crs_state_form();" data-placeholder="State *" tabindex="1" >
									<option value="">Select State</option>
									<option>
									<?php foreach($state as $state): ?>
									<option value="<?php echo $state['ID'];?>"> <?php echo trim($state['STATE_NAME']); ?> </option>
									<?php endforeach;?>
								</select>
							</div>
							<span style="color:red;" id="errStateId"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<div class="radio radio-inline">
								<input type="radio" id="inlineRadio1" value="Y" name="radioInline" checked="" tabindex="2">
								<label for="inlineRadio1"> for credit </label>
							</div>
							<div class="radio radio-inline">
								<input type="radio" id="inlineRadio2" value="N" name="radioInline" tabindex="3">
								<label for="inlineRadio2"> no credit </label>
							</div>
						</div>
					</div>
				</div><!-- row Ends -->	
				<?php 
					$state_guidelines = $content['STATE_GUIDELINES'];
					$guidelines_start = $this->common_functions->word_teaser($state_guidelines, 150); 
					$guidelines_end = $this->common_functions->word_teaser_end($state_guidelines, 150); 
				?>
				<div class="row">				
					<div class="col-md-6 state-col-pad" style="border-right: 2px solid #D4D4D4; padding-top:10px; height: 350px;">
						<div id="state_message"></div>
						<div class="col-md-11 col-xs-12 hide_guidelines" style="padding-left:0px;" >
							<p><?php echo $guidelines_start; ?> </p>
							<p><a href="<?php echo "http://".$content['STATE_REF_URL']; ?>" target="_blank" style="overflow-wrap: break-word;"><u><?php echo $content['STATE_REF_URL']; ?></u></a></p>
						</div>
						<div id="enable_guidelines"></div>
					</div>
					
					<div class="col-md-6 guide-col-pad" style="padding-top:10px;">
						<div class="col-md-11 col-md-offset-1 col-xs-12 guide-col-pad">
							<div class="scroll_content" style="padding-right:15px;">
								<div class="hide_guideline_end">
									<p><?php echo $guidelines_end;?></p>
								</div>
								<div id="enable_guideline_end"></div>
							</div>							
						</div>				 	
						
						<div class="col-md-11 col-md-offset-1 col-xs-12" style="padding-left:0px;">
							<div class="col-md-12 guide-col-pad">	
								<div class="form-group">					
									<label>I understand the rules and conditions of the terms &nbsp;</label><input type="checkbox" tabindex="4" name="chkAgreeNam" id="txtAgree1Id" onblur="validateTermscheck('txtAgree1Id','errAgree1Id');" onchange="validateTermscheck('txtAgree1Id','errAgree1Id');" onclick="OBvalidate_crs_state_form_w();" /><br/>
									<span style="color:red;" id="errAgree1Id"></span>
								 </div>
							</div><!-- End of Agree  -->
							<center>   
								<button  class="btn btn-default btn-rounded" style="margin-top:10px;" id="t1NextBtnId" onclick="paymenttabfun();" tabindex="5" disabled ><b>Next</b></button>
							</center>			   
						</div>
					</div>
				</div><!-- row Ends -->	
				
			</div><!-- col-md-12 -->
		</div><!-- row -->		
		<br>	
		<br>	
		<br>	
		<br>	
		<br>	
	</div><!-- Container -->	
</div><!-- Wrapper Content -->

<script>

	/* $('.i-checks').iCheck({
    checkboxClass: 'icheckbox_square-green',
    radioClass: 'iradio_square-green',	
    }); */
	var js_drd_ins_credit_state  = $("#selStateId").val();
	var js_drd_ins_credit_status  = $(":input[name=radioInline]:checked").val();
	
	$('#selStateId').val(<?php echo $content['STATE_ID']; ?>);
	
	function OBvalidate_crs_state_form_w() {
		var js_drd_state_chk  = $(":input[name=chkAgreeNam]:checked").val();
		
		var js_drd_state_id  = $("#selStateId").val();
		if(js_drd_state_chk &&  js_drd_state_id)
		{
			$("#t1NextBtnId").prop("disabled", false);
		}
		else
		{
			$("#t1NextBtnId").prop("disabled", true);
		}
	}

	function paymenttabfun() {		
		var getvalue = document.getElementById('selStateId').value;
		var credit_option=""
		if (document.getElementById('inlineRadio1').checked) {
		credit_option = document.getElementById('inlineRadio1').value;
	} else {
		credit_option = document.getElementById('inlineRadio2').value;
	}		
		window.location.href="<?php echo site_url(); ?>/diplomatepayment/"+getvalue+"/"+credit_option;
		console.log("value posted to payment page");					  						 
	};

	/* -------- Validation Function for select_validateMandatory Field ---------- */
	$('#selStateId').change(function() {
		var getvalue = document.getElementById('selStateId').value;
		if(getvalue != "") {
			$('.hide_guidelines').hide();
			$('.hide_guideline_end').hide();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url(); ?>"+ "/getdnstateguidelines",			
				data:{
				'ajx_drd_state_id':getvalue
				},
				success: function(ajx_return) {
					var js_ReturnMessage = $.parseJSON(ajx_return);
					console.log("Return Register form post value "+JSON.stringify(js_ReturnMessage));
					if (js_ReturnMessage['message'] == "") {					
						var guideline_start = trimByWord(js_ReturnMessage['STATE_GUIDELINES'],150);
						var guideline_end = trimByWordEnd(js_ReturnMessage['STATE_GUIDELINES'],150);
								
						console.log(js_ReturnMessage['state_guidelines']);
						var row = '<div class="col-md-11 col-xs-12 hide_guidelines"><p>'+guideline_start+'</p><p><a href="'+js_ReturnMessage['STATE_URL']+'" target="_blank" style="overflow-wrap: break-word;"><u>'+js_ReturnMessage['STATE_URL']+'</u></a></p></div>';
						var row2 = '<div class="hide_guideline_end"><p>'+guideline_end+'</p></div>';
						
						$('#enable_guidelines').append(row);
						$('#enable_guideline_end').append(row2);
						
					} else {
						$('.hide_guidelines').hide();
						$('.hide_guideline_end').hide();
						document.getElementById('state_message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_ReturnMessage['message']+"</div>";
					}
				},
				error: function(){
					document.getElementById('state_message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
				}
			});	
		} 
	});

</script>