<style>
	.footer-green-bg{
		background-color:#4AB737;
	}
	.footer-gold-bg{
		background-color:#DEA027;
	}
	.tabs-container li{
		/* min-width:278px !important; */ /* Modified by Rajee June 21 2018 */
		min-width:310px !important;
		text-align:center;
	}
	.tabs-container li.active{
		background-color:#ddd !important;
	}

	.tabs-container .panel-body {
		border: 1px solid #fff;
	}
	.tabs-container .panel-body li{
		backgrsound: #D4D4D4;
	}
	.tabs-container .nav-tabs {
		border-bottom: 0px solid #ddd;
	}
	.tabs-container {
		padding-top:125px;
		padding-left: 15px;
		padding-right: 15px;
	}
	.nav-tabs {
		border-bottom: 0px solid #ddd;
	}
	.tabs-container .nav-tabs > li.active > a, .tabs-container .nav-tabs > li.active > a:hover, .tabs-container .nav-tabs > li.active > a:focus {
		border: 1px solid #ddd;
		background-color: #ECECEC;
	}
	input{
		border-bottom:0px solid #fff;
	}

	/* .chosen-container-single .chosen-single { Modified Rajee June 22 2018
		background-color: #F6F6F6 !important;    
	} */

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

	/* Added By Rajee on June 22 2018*/
	.state-pad {
		padding-left:15px;
	}

	.p-header::after {
		content:'';
		position:absolute;
		width:800px;
		height:2px;
		background:#D4D4D4;
		bottom:0;
		left:0;
		right:0;
		margin:auto;
	}
	@media (max-width: 380px) {
		.tabs-container li {
			min-width: auto !important;
		}
		
		/* Added by Rajee on june 22 2018 */
		.tabs-container {
			padding-top:100px;
			padding-left: 0px;
			padding-right: 0px;
		}
		.p-header::after {
			content:'';
			position:absolute;
			width: auto !important;
			height:2px;
			background:#D4D4D4;
			bottom:0;
			left:0;
			right:0;
			margin:auto;
		}		
		.col-pad {
			padding-left: 0px;
		}
		.guide-col-pad {
			padding-left: 8px;
			padding-right: 5px;
		}
		.state-pad {
			padding-left:2px;
			padding-right:3px;
		}
	}
</style>

<div class="wrapper-content">
	<div class="">
		<div class="row">
			<div class="col-md-12">

		<div class="col-md-3 col-xs-12" style="color:#FFF;">
            <div class="navy-bg p-lg text-center" style="">
				<h2 class="font-bold no-margins">
					<?php echo $coursedata['COURSE_NAME']; ?>
				</h2>
				<input type="hidden"  id="userCourseId"  value="<?php echo $usercoursedata['ID']; ?>" />
				<input type="hidden"  id="courseId"  value="<?php echo $usercoursedata['COURSE_ID']; ?>" />
				<span class="text-left"><p style="padding-top:50px;">
				 <?php echo $coursedata['COURSE_DESCRIPTION']; ?></p></span>
            <div class="row" style="padding-top:35px;">
				<div class="col-md-12" style="padding-left:15px;padding-right:15px;"> <!-- Changed padding-left:30px;padding-right:30px; to padding-left:15px;padding-right:15px; by Rajee on June 22 2018-->
					<span class="text-left lh">
						<p>Course Length<span class="pull-right"><?php echo $coursedata['COURSE_LENGTH']; ?></span></br>
						<p>Course Credit<span class="pull-right"><?php echo $coursedata['COURSE_CREDIT']; ?></span></br>
						<p>Instructor<span class="pull-right"><?php echo $coursedata['INSTRUCTOR_NAME']; ?></span></p>
					</span>
				</div>
            </div>
            <div class="lh videoplay" style="padding-top:35px;">
              <p class="text-left">Status of current project:<span class="pull-right">0%</span></p>
                  
                  <div class="progress progress-small">
                      <div style="width: <?php echo $usercoursedata['PERCENT_COMPLETE']; ?>%;background-color:#B3B3B3;" class="progress-bar"></div>
                  </div>
              </div>
          </div>
             <div class="widget-text-box text-center p-lg footer-green-bg" id="divgreen" style="">
                <h1 class="media-heading">Fee $<?php echo $std_price;?></h1>
                <p style="margin-bottom:0px;">To purchase and watch this course,please click 'Pay Now'.Your card will be charged.</p> <!-- style="margin-bottom:0px;" Added by rajee june 22 2018 -->
             </div>
		</div>
				
	<div class="col-md-9 col-xs-12">
	<div id="message"></div>
		<div class="col-md-12 col-xs-12 col-pad" > <!-- Remove style="border-bottom: 2px solid #D4D4D4;" by Rajee June 22 2018*/ -->
			<h1 class="p-header">Coursework</h1>
		</div>
				
        <div class="tabs-container" style="padding-top:125px; padding-left:10px; padding-right:3px;">
            <ul class="nav nav-tabs" style="padding-left: 1px"> <!-- style="padding-left: 1px" Added by Rajee june 22 2018 -->
                <li class="active"><a data-toggle="tab" href="#tab-1">Important Guidelines</a></li>
                <li class=""><a disabled href="#tab-2">Payment</a></li>
                <li class="coursepop"><a disabled>Courses</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body" style="background-color:#ECECEC">
					
					<div class="row state-pad"><!-- style="padding-left:15px;" Changed to state-pad on June 22 2018 by Rajee-->
					<div class="col-md-4">
						<div class="form-group">
							<div>
							<select class="form-control chosen-select" name="selStateNam" id="selStateId" onchange="validateMandatory('selStateId','errStateId');OBvalidate_crs_state_form();"  data-placeholder="State *">
								<option style="text-align:left;" value="">State *</option>						
								<?php foreach($stateName as $stateNameArray): ?>
								<option style="text-align:left;" value="<?php echo $stateNameArray['ID'];?>"> <?php echo trim($stateNameArray['STATE_NAME']); ?> </option>
								<?php endforeach;?>
							</select>
							</div>
							<span style="color:red;" id="errStateId"></span>
						</div>
						</div>
					<div class="col-md-4">
						<div class="form-group">
                                     <div class="radio radio-inline">
                                         <input type="radio" id="inlineRadio1" value="Y" name="radioInline" checked=""  >
                                         <label for="inlineRadio1"> for credit </label>
                                     </div>
                                     <div class="radio radio-inline">
                                         <input type="radio" id="inlineRadio2" value="N" name="radioInline" >
                                         <label for="inlineRadio2"> no credit </label>
                                     </div>
						</div>
						</div>
						</div><!-- row Ends -->
						<?php 
						/* Function for Guide line Divider
						*Added By Rajee on june 22 2018
						*
						*/
						$state_guidelines = $user_state['STATE_GUIDELINES'];
						$word_teaser = $this->common_functions->word_teaser($state_guidelines, 100); 
						$word_teaser_end = $this->common_functions->word_teaser_end($state_guidelines, 100); 
						?>
						
						<div class="row">
							<div class="col-md-6" style="border-right: 2px solid #D4D4D4;padding-top:10px;">
							  <div id="state_message"></div>
							  <div class="col-md-11 col-xs-12 hide_guidelines guide-col-pad">
								<p><?php echo $word_teaser; ?></p>
								
								<p><a href="<?php echo "http://".$user_state['STATE_REF_URL']; ?>" target="_blank" style="overflow-wrap: break-word;"><u><?php echo $user_state['STATE_REF_URL']; ?></u></a></p>
							  </div> 
							  <div id="enable_guidelines"></div>
							</div>
							
							<div class="col-md-6" style="padding-top:10px;">
							  <div class="col-md-11 col-md-offset-1 col-xs-12 guide-col-pad">
								<div class="scroll_content" style="padding-right:15px;">
									<div class="hide_guideline_tag">
									  <p><?php echo $word_teaser_end; ?></p>
									</div>
									<div id="enable_guideline_tag"></div><!-- Added By Rajee on june 22 2018 -->
								</div>
							  </div><!-- Added By Rajee on june 22 2018 -->		
							
							  <div class="col-md-11 col-md-offset-1 col-xs-12 guide-col-pad">
								<div class="col-md-12">	
									<div class="form-group">
										<div class="checkbox" style="padding-left:5px;">
											<input type="checkbox" tabindex="16" name="chkAgreeNam" id="txtAgree1Id" value="Y" onblur="validateTermscheck('txtAgree1Id','errAgree1Id');" onchange="validateTermscheck('txtAgree1Id','errAgree1Id');" 
											onclick="OBvalidate_crs_state_form();" />
										<label style="">I certify that I am who I am</label><br/>
											<span style="color:red;" id="errAgree1Id"></span>
										</div>								
									 </div>
								</div><!-- End of Agree  -->
								
								<center>   
								<button class="btn btn-default btn-rounded" style="margin-top:10px;" id="t1NextBtnId" onclick="paymenttabfun();" disabled ><b>Next</b></button></center>
							
							  </div>
							</div>
							
						</div><!-- row Ends -->
													
                    </div><!-- panel-body -->
                </div><!-- tab-1 -->
				
				<!-- Tab-1 Ends Here -->
				
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body" style="background-color:#ECECEC">
					<div class="row">
							<div class="col-md-6" style="padding-top:10px;">
							<div class="col-md-11 col-xs-12 guide-col-pad">
							<div class="scroll_content" style="padding-right:10px;">
								<p><?php echo $content; ?></p>
							</div>
							<div class="col-md-12">	
								<div class="form-group">
									<div class="checkbox" style="padding-left:5px;">
										<input type="checkbox" tabindex="16" name="chkAgreePayNam" id="txtAgree2Id" value="Y" onblur="validateTermscheck('txtAgree2Id','errAgree2Id');" onchange="validateTermscheck('txtAgree2Id','errAgree2Id');" 
											onclick="OBvalidate_crs_payment_form();" /><label style="">I understand that the course is non-refundable </label> <br/>
										<span style="color:red;" id="errAgree2Id"></span>
									</div>								
								 </div>
							</div><!-- End of Agree  -->	   
							</div>
							</div>
							<div class="col-md-6" style="padding-top:10px;border-left: 2px solid #D4D4D4;">
							<!-- <form method="POST" action="<?php //echo site_url();?>/payment" id="paymentFormId"> -->
							<form method="POST" action="" id="paymentFormId">
								<div class="col-md-10 col-md-offset-1 guide-col-pad" id="divpaymentId">
									<h1 class="text-center">Fee $<?php echo $std_price;?></h1>	
								 
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="Name on Card" maxlength="60" name="txtt2cardname" id="txtt2cardnameId" onblur="validateMandatory('txtt2cardnameId','errt2cardnameId');" onchange="OBvalidate_crs_payment_form();" >
									  <span style="color:red;" id="errt2cardnameId"></span>
									</div>
								
									 <!-- End of Name on Card -->							
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="Card #" id="txtt2cardnoId" onkeypress="return numbersonlyEntry(event);" onblur="validatePaymentCardNo('txtt2cardnoId','errt2cardnoId');" onchange="OBvalidate_crs_payment_form();" maxlength="20" name="txtt2cardnoname" />
									  <span style="color:red;" id="errt2cardnoId"></span>
									</div><!-- End of Card Number -->							
									
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="Expiration Date" id="txtt2expId" maxlength="10" name="txtt2expname" readonly onblur="validateMandatory('txtt2expId','errt2expId');" onchange="validateMandatory('txtt2expId','errt2expId');OBvalidate_crs_payment_form();" />
									  <span style="color:red;" id="errt2expId"></span>
									</div> <!-- End of Expiration Date -->
									
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="CVV Code" id="txtt2cvvId"maxlength="4" onblur="validateMandatory('txtt2cvvId','errtab2cvvId');" onchange="OBvalidate_crs_payment_form();" name="txtt2cvvname"  onkeypress="return numbersonlyEntry(event);" />
									  <span style="color:red;" id="errtab2cvvId"></span>
									</div><!-- End of CVV Code -->			
									
									<div class="form-group">
									  <textarea class="form-control" placeholder="Street Address" maxlength="300" id="txtt2addressId" name="txtt2address" style="width:100%;height:34px;" rows="1" cols="15" onblur="validateMandatory('txtt2addressId','errt2addressId');" onchange="OBvalidate_crs_payment_form();" ></textarea>
									  <span style="color:red;" id="errt2addressId"></span>
									</div><!-- End of Street Address -->							
										
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="City" id="txtt2cityId" maxlength="60" name="txtt2city" onblur="validateMandatory('txtt2cityId','errt2cityId');" onchange="OBvalidate_crs_payment_form();" />
									  <span style="color:red;" id="errt2cityId"></span>
									</div><!-- End of City -->
									
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="State" id="txtt2stateId" onblur="validateMandatory('txtt2stateId','errt2stateId');" onchange="OBvalidate_crs_payment_form();" maxlength="60" name="txtt2state" />
									  <span style="color:red;" id="errt2stateId"></span>
									</div><!-- End of State -->							
									
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="Zipcode" id="txtt2zipId" onblur="validatePostalcode('txtt2zipId','errt2zipId');" onchange="OBvalidate_crs_payment_form();" maxlength="5" name="txtt2zip"  onkeypress="return numbersonlyEntry(event);" />
									  <span style="color:red;" id="errt2zipId"></span>
									</div><!-- End of Zipcode -->  
									
									<div class="enablepromocode">						
										<div class="form-group">
										 <input type="text" class="form-control" placeholder="Promo Code" maxlength="10" id="txtpromoId" onblur="get_promo_amount();" name="txtpromoNam" />
										<span style="color:red;" id="errPromoId"></span>			
										</div>
										<div class="showpromoamount">
										<input type="hidden" id="promoid"/>
											<div class="form-group">
												<label class="col-lg-10" style="padding-left:0px;">Promotion Amount</label>
												<div class="col-lg-2" ><strong><span id="discount_amount"></span></strong></div>
											</div>
											<div class="form-group" style="padding-top:30px;">
												<label class="col-lg-10" style="padding-left:0px;">Net Payable after promotion applied</label>
												<div class="col-lg-2"><strong><span id="total_course_amount"></span></strong></div>
											</div>
											<input type="hidden" class="form-control" value="150" name="txtt2AmountNam" id="txtt2AmountId" value="<?php echo $std_price;?>" />
											<p>&nbsp;&nbsp;&nbsp;</p>
										</div>								
									</div>
									<button type="button" class="btn btn-default btn-rounded pull-right" style="background-color:#EBEBEB;margin-top:10px;" id="t2PurBtnId" disabled onclick="payment_insert_fun();" ><b>Purchase</b></button> 
									<!--onclick="payment_insert_fun();"-->
								</div>
								<div class="col-md-11 col-md-offset-1 guide-col-pad" id="divthankId">
									<h1 class="text-center">Thank You!</h1>
									<p style="padding-top:10px;"><?php echo $thankyou_content;?></p>
									<a href="#" type="button" class="btn btn-default btn-rounded pull-right coursepop" style="margin-top:120px;background-color:#EBEBEB;" id="t2BeginBtnId" ><b>Continue</b></a>
								</div>
							 </form>
							</div>
						</div>
                    </div><!-- panel-body -->
                </div><!-- tab-2 -->
				
				<!-- Tab-2 Ends Here -->
				
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body" style="background-color:#ECECEC">
                    </div><!-- panel-body -->
				</div><!-- tab-3 -->	
			</div><!-- Tab Content -->
        </div><!-- Tab Container -->				
	</div><!-- col-md-8 -->				
			</div><!-- col-md-12 -->			
		</div><!-- row -->			
	</div><!-- Empty Div -->	
</div><!-- Wrapper Content -->


<script>
	$('.showpromoamount').hide();
			
	var js_drd_ins_credit_state  = $("#selStateId").val();
	var js_drd_ins_credit_status  = $(":input[name=radioInline]:checked").val();
	var js_drd_ins_card_name  = $("#txtt2cardnameId").val();
	var js_drd_ins_card_no  = $("#txtt2cardnoId").val();
	var js_drd_ins_card_exp_date  = $("#txtt2expId").val();
	var js_drd_ins_card_cvv  = $("#txtt2cvvId").val();
	var js_drd_ins_address  = $("#txtt2addressId").val();
	var js_drd_ins_city  = $("#txtt2cityId").val();
	var js_drd_ins_state  = $("#txtt2stateId").val();
	var js_drd_ins_zip  = $("#txtt2zipId").val();
	
	function showcourse() {
		window.location.href="<?php echo site_url(); ?>/usercourse";
	}
	console.log("User State Id "+<?php echo $user_state['ID']; ?>);
	$('#selStateId').val(<?php echo $user_state['ID']; ?>);

	$(document).ready(function() {
		$("#divthankId").hide();
		$("#divgold").hide();
		$("#divcongId").hide();    
	});

	function OBvalidate_crs_state_form() {
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

	$('#t2BeginBtnId').click(function(){
		window.location.href="<?php echo site_url(); ?>/usercourse/<?php echo $courseId; ?>";
	});

	$( "#txtt2expId" ).datepicker({		 
			changeYear  : true,
			changeMonth : true,
			clearText: "Clear",
			dateFormat: 'mm/y',
			minDate: new Date()
	});				

	function OBvalidate_crs_payment_form() {	
		var js_drd_cardno_patrn = /^[0-9]{9,20}$/;
		var js_drd_zipcode_patrn = /^[0-9]{5}$/;
		var js_drd_payment_chk  = $(":input[name=chkAgreePayNam]:checked").val();
		var js_drd_card_name  = document.getElementById('txtt2cardnameId').value!="";
		var js_drd_card_no  = document.getElementById('txtt2cardnoId').value!="";
		var js_drd_card_exp_date  = document.getElementById('txtt2expId').value!="";
		var js_drd_card_cvv  = document.getElementById('txtt2cvvId').value!="";
		var js_drd_address  = document.getElementById('txtt2addressId').value!="";
		var js_drd_city  = document.getElementById('txtt2cityId').value!="";
		var js_drd_state  = document.getElementById('txtt2stateId').value!="";
		var js_drd_zip  = document.getElementById('txtt2zipId').value!="";
		var js_drd_pattern_cardno = js_drd_cardno_patrn.test(document.getElementById('txtt2cardnoId').value);
		var js_drd_pattern_zipcode = js_drd_zipcode_patrn.test(document.getElementById('txtt2zipId').value);
		
		if(js_drd_payment_chk && js_drd_card_name && js_drd_card_no && js_drd_card_exp_date && js_drd_card_cvv && js_drd_address && js_drd_city && js_drd_state && js_drd_zip && js_drd_pattern_cardno && js_drd_pattern_zipcode)
		{
			$("#t2PurBtnId").prop("disabled", false);
		}
		else
		{
			$("#t2PurBtnId").prop("disabled", true);
		}
	}

	/* $("#t2PurBtnId").click(function(){
		$("#divpaymentId").hide();
		$("#divthankId").show();
	}); */
	$("#tab3Id").click(function() {
		$("#divgreen").hide();
		$("#divgold").show();
	});

	/* $('.coursepop').click(function () {
		swal({
			title: "Enter the code that was sent to via text and/or email",
			text: "You have 60 seconds left",
			type: "input",
			showCancelButton: false,
			allowEscapeKey: false,
			confirmButtonColor: "#DD6B55",
			closeOnConfirm: false
		});
	}); */	
	$('.i-checks').iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green',	
		});
		
	function paymenttabfun() {
		$('.tabs-container a[href="#tab-2"]').tab('show');
	}

	/* -------- Validation Function for select_validateMandatory Field---------- */
	$('#selStateId').change(function() {
		var getvalue = document.getElementById('selStateId').value;
		if(getvalue != "") {
			$('.hide_guidelines').hide();
			$('.hide_guideline_tag').hide();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url(); ?>"+ "/getstateguidelines",			
				data:{
				'ajx_drd_state_id':getvalue
				},
				success: function(ajx_return) {
					var js_ReturnMessage = $.parseJSON(ajx_return);
					console.log("Return Register form post value "+JSON.stringify(js_ReturnMessage));
					if (js_ReturnMessage['message'] == "") {
						console.log(js_ReturnMessage['state_guidelines']);
						var state_regulations = trimByWord(js_ReturnMessage['STATE_GUIDELINES'],100);
						var state_regulations_end = trimByWordEnd(js_ReturnMessage['STATE_GUIDELINES'],100);
						
						var row = '<div class="col-md-11 col-xs-12 hide_guidelines"><p>'+state_regulations+'</p><p><a href="'+js_ReturnMessage['STATE_URL']+'" target="_blank" style="overflow-wrap: break-word;"><u>'+js_ReturnMessage['STATE_URL']+'</u></a></p></div>';
						
						var row2 = '<div class="hide_guideline_tag"><p>'+state_regulations_end+'</p></div>';
						
						$('#enable_guidelines').append(row);
						$('#enable_guideline_tag').append(row2);
											
					} else {
						
						$('.hide_guidelines').hide();
						$('.hide_guideline_tag').hide();
						document.getElementById('state_message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_ReturnMessage['message']+"</div>";
					}
				},
				error: function(){
					document.getElementById('state_message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
				}
			});	
		} else {
			$("#discount_amount").text('');
			$("#promoid").val('');
			$("#total_course_amount").text('');
			$("#txtt2AmountId").text('');
			$('.showpromoamount').hide();
		}
	});

	function get_promo_amount() {
		var getvalue = document.getElementById('txtpromoId').value;
		if(getvalue != "") {
			
			$.ajax({
				type: "POST",
				url: "<?php echo site_url(); ?>"+ "/getpromotion/CE",			
				data:{
				'ajx_promo_id':getvalue,
				'ajx_std_price':<?php echo $std_price; ?>
				},
				success: function(ajx_return) {
					var js_ReturnMessage = $.parseJSON(ajx_return);
					console.log("Return Register form post value "+JSON.stringify(js_ReturnMessage));
					if (js_ReturnMessage['message'] == "") {
						console.log(js_ReturnMessage['PROMO_AMOUNT']);
						$('.showpromoamount').show();
						$("#promoid").val(js_ReturnMessage['PROMO_ID']);
						$("#discount_amount").text('$'+js_ReturnMessage['PROMO_AMOUNT']);
						$("#total_course_amount").text('$'+js_ReturnMessage['TOTAL_DISCOUNT_AMOUNT']);
						$("#txtt2AmountId").text('$'+js_ReturnMessage['TOTAL_DISCOUNT_AMOUNT']);
											
					} else {						
						$("#errPromoId").text(js_ReturnMessage['message']);
						/* document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_ReturnMessage['message']+"</div>"; */
					}
				},
				error: function(){
					document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
				}
			});	
		} else {
			$("#errPromoId").text("");
			$("#discount_amount").text('');
			$("#promoid").val('');
			$("#total_course_amount").text('');
			$("#txtt2AmountId").text('');
			$('.showpromoamount').hide();
		}
	}
	
	function payment_insert_fun() {	
		$("#t2PurBtnId").prop("disabled", true);
		$("#t2PurBtnId").css("cursor", "wait");
		var js_drd_ins_credit_state  = $("#selStateId").val();
		var js_drd_ins_credit_status  = $(":input[name=radioInline]:checked").val();
		var js_drd_ins_card_name  = $("#chkAgreePayNam").val();
		var js_drd_ins_card_no  = $("#txtt2cardnoId").val();
		var js_drd_ins_card_exp_date  = $("#txtt2expId").val();
		var js_drd_ins_card_cvv  = $("#txtt2cvvId").val();
		var js_drd_ins_address  = $("#txtt2addressId").val();
		var js_drd_ins_city  = $("#txtt2cityId").val();
		var js_drd_ins_state  = $("#txtt2stateId").val();
		var js_drd_ins_zip  = $("#txtt2zipId").val();
		var js_drd_ins_courseid  = "<?php echo $courseId; ?>";
		var js_drd_ins_stdprice  = "<?php echo $std_price; ?>";
		var js_drd_ins_promoamount  = $("#discount_amount").text();
		var js_drd_ins_promocodeid  = $("#promoid").val();
		var js_drd_ins_net_amount  = $("#txtt2AmountId").val();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/insertpayment",			
			data:{
				'ajx_drd_credit_state':js_drd_ins_credit_state,
				'ajx_drd_credit_status':js_drd_ins_credit_status,
				'ajx_drd_card_name':js_drd_ins_card_name,
				'ajx_drd_card_no':js_drd_ins_card_no,
				'ajx_drd_card_exp_date':js_drd_ins_card_exp_date,
				'ajx_drd_card_cvv':js_drd_ins_card_cvv,
				'ajx_drd_address':js_drd_ins_card_exp_date,
				'ajx_drd_city':js_drd_ins_city,
				'ajx_drd_state':js_drd_ins_state,
				'ajx_drd_zip':js_drd_ins_zip,
				'ajx_drd_courseid':js_drd_ins_courseid,
				'ajx_drd_std_price':js_drd_ins_stdprice,
				'ajx_drd_promo_amount':js_drd_ins_promoamount,
				'ajx_drd_promo_codeid':js_drd_ins_promocodeid,
				'ajx_drd_net_amount':js_drd_ins_net_amount,
			  },
			success: function(ajx_drd_ReturnResult) {			
				$("#t2PurBtnId").prop("disabled", false);
				$("#t2PurBtnId").css("cursor", "pointer");
				console.log("ajx_drd_ReturnResult "+JSON.stringify(ajx_drd_ReturnResult));
				var js_drd_ReturnMsg = $.parseJSON(ajx_drd_ReturnResult);				
				
				console.log("Return Quiz Submit Value "+JSON.stringify(js_drd_ReturnMsg));
				if(js_drd_ReturnMsg['message_type'] ==  "SUCCESS" || js_drd_ReturnMsg['message_type'] ==  "WARNING")
				{
					$("#divpaymentId").hide();
					$("#divthankId").show();				
				}
				else 
				{
					document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnMsg['message']+"</div>";
				}	
			},
			error: function() {						
				$("#t2PurBtnId").prop("disabled", false);
				$("#t2PurBtnId").css("cursor", "pointer");
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});	
	}	

</script>
