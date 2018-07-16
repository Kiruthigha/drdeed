<style>
/* Added by Rajee june 23 2018 */
.guide-col-pad {		
	padding-right: 0px;
}
.m-header {		
	margin-top: 0px;
}
.row-pad {		
	padding-top: 40px;
}
.slimScrollRail {
	display: block !important;
	background-color: #FFFFFF !important;
	opacity: 1 !important;
}

input[type=checkbox] {
  box-shadow: none !important;

}

.slimScrollBar{
	background:#181818 !important;
	opacity: 1 !important;
}


@media (max-width: 960px) {
	.guide-col-pad {		
		padding-left: 0px;
		padding-right: 0px;
	}
	.m-header {		
		margin-top: 40px;
	}
	.col-pad {		
		padding-left: 0px;
		padding-right: 0px;
	}
	.row-pad {		
		padding-top: 0px;
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
		<input type ="hidden" value ="<?php echo $course_state_id?>" id = "hidcoursestateid" name = "hidcoursestatename" />
	<div class="row row-pad">	
	<div id="message"> </div>
		<div class="col-md-4 col-pad" style="padding-left:0px;">
			<h1 class="m-header">Billing Address</h1>
			<div class="form-group">
				<input type="text" class="form-control" maxlength="60" placeholder="Name" style="width:100%; height:34px;" name="txtdpNam" id="txtdpNameId" onblur="validateMandatory('txtdpNameId','errdpNameId');" onchange="OBvalidate_crs_payment_form()";/>
				<span style="color:red;" id="errdpNameId"></span>
			</div><!-- End of Name -->
			
			<div class="form-group">
				<input type="text" class="form-control" maxlength="60" placeholder="Email" style="width:100%; height:34px;" id="txtdpEmailId" name="txtdpEmailName" onblur="validateEmail('txtdpEmailId','errdEmailId');" onchange="OBvalidate_crs_payment_form()"/>
				<span style="color:red;" id="errdEmailId"></span>
			</div><!-- End of Email -->
			
			<div class="form-group">
				<textarea class="form-control" maxlength="300" placeholder="Street Address" style="width:100%;height:34px;"	id="txtdpaddressId" name="txtdpaddress" onblur="validateMandatory('txtdpaddressId','errdpaddressId');" onchange="OBvalidate_crs_payment_form()"></textarea>
				<span style="color:red;" id="errdpaddressId"></span>
			</div><!-- End of Street Address -->
				
			<div class="form-group">
				<input type="text" class="form-control" maxlength="60" placeholder="City" id="txtdpcityId" name="txtdpcity" onblur="validateMandatory('txtdpcityId','errdpcityId');" onchange="OBvalidate_crs_payment_form()" />
				<span style="color:red;" id="errdpcityId"></span>
			</div><!-- End of City -->							
			
			<div class="form-group">
				<input type="text" class="form-control" maxlength="60" placeholder="State" id="txtdpstateId" name="txtdpstate" onblur="validateMandatory('txtdpstateId','errdpstateId');" onchange="OBvalidate_crs_payment_form()" />
				<span style="color:red;" id="errdpstateId"></span>
			</div><!-- End of State -->							
			
			<div class="form-group">
				<input type="text" class="form-control" maxlength="5" placeholder="Zipcode" id="txtdpzipId" name="txtdpzip" onblur="validatePostalcode('txtdpzipId','errdpzipId');" onchange="OBvalidate_crs_payment_form()" onkeypress="return numbersonlyEntry(event);" />
				<span style="color:red;" id="errdpzipId"></span>
			</div><!-- End of Zipcode -->  
		</div>	
		<div class="col-md-4 col-pad">
			<div class="navy-bg p-lg" style="padding-bottom:90px; padding-top:40px;"><!-- Added padding-top:48px; by Rajee june 23 2018-->
				<h4 class="text-center lh">36 month program</h4><!-- Changed <h5> to <h4> by Rajee june 23 2018-->				
				<input type="hidden"  id="std_price"  value="<?php echo $diplomate_price; ?>" />
				<p class="text-center" style="font-size:40px; padding-bottom:10px;"><strong>$<?php echo number_format( $diplomate_price); ?></strong></p> <!-- Added Number Format by Rajee june 23 2018-->
				<div class="col-md-10 col-xs-12" id="scroll_content" style="padding-right:15px;">
					<p><?php echo $payment_terms?> </p>
				</div>
				<div class="col-md-10 col-xs-12" style="padding-top:20px;">
					<div class="form-group">
						<div class="checkbox" style="">
							<input type="checkbox" name="txtdpagreedtc" id="txtdpagreedtcId" onblur="validateTermscheck('txtdpagreedtcId','errdpagreedtcId');" onchange="validateTermscheck('txtdpagreedtcId','errdpagreedtcId');OBvalidate_crs_payment_form()"/><label style="font-size:9px;">I understand that the course is non-refundable</label><br/>
							<span style="color:red;" id="errdpagreedtcId"></span>
						</div>								
					</div>
				</div>
			</div>
		</div>	
		<div class="col-md-4 guide-col-pad" id="divpymtId">
			<h1 class="m-header">Payment Information</h1>						
			<!-- End of Method of Payment -->
			
			<div class="form-group">
				<input type="text" class="form-control" maxlength="60"
				placeholder="Name on Card" name="txtdpcardname" id="txtdpcardnameId" onblur="validateMandatory('txtdpcardnameId','errdpcardnameId');" onchange="OBvalidate_crs_payment_form()" >
				<span style="color:red;" id="errdpcardnameId"></span>
			</div><!-- End of Name on Card -->			
			
			<div class="form-group">
				<input type="text" class="form-control" maxlength="20" placeholder="Card #" id="txtdpcardnoId" name="txtdpcardnoname" onblur="validatePaymentCardNo('txtdpcardnoId','errdpcardnoId');" onchange="OBvalidate_crs_payment_form()" onkeypress="return numbersonlyEntry(event);" />
				<span style="color:red;" id="errdpcardnoId"></span>
			</div><!-- End of Card Number -->
			
			
			<div class="form-group">
				<input type="text" class="form-control" maxlength="10" readonly placeholder="Expiration Date" id="txtt2expId" name="txtdpexpname" onblur="validateMandatory('txtt2expId','errdpexpId');" onchange="validateMandatory('txtt2expId','errdpexpId');OBvalidate_crs_payment_form()"/>
				<span style="color:red;" id="errdpexpId"></span>
			</div> <!-- End of Expiration Date -->			
			
			<div class="form-group">
				<input type="text" class="form-control" maxlength="4" placeholder="CVV Code" id="txtdpcvvId" name="txtdpcvvname" onblur="validateMandatory('txtdpcvvId','errdpcvvId');" onchange="OBvalidate_crs_payment_form()" onkeypress="return numbersonlyEntry(event);" />
				<span style="color:red;" id="errdpcvvId"></span>
			</div><!-- End of CVV Code -->
			
			<div class="enablepromocode">							
				<div class="form-group">
					<input type="text" class="form-control" maxlength="10" placeholder="Promo Code" id="txtpromoId" name="txtpromoNam" onblur="get_promo_amount();" />
					<span style="color:red;" id="errPromoId"></span>
				</div>
				<div class="showpromoamount">
					<div class="form-group">
						<label class="col-lg-10" style="padding-left:0px;">Promotion Amount</label>
						<div class="col-lg-2" ><span><strong><span id="discount_amount"></span></strong></span></div>
					</div>
					<div class="form-group" style="padding-top:30px;">
						<label class="col-lg-10" style="padding-left:0px;">Net Payable after promotion applied</label>
						<div class="col-lg-2"><span><strong><span id="total_course_amount"></span></strong></span></div>
					</div>
					<p>&nbsp;&nbsp;&nbsp;</p>
				</div>
			</div>
			<center>
			<button type="button" disabled class="btn btn-default btn-rounded" style="background-color:none;margin-top:10px;" id="dpPurBtnId"  onclick="payment_insert_fun();" ><b>Purchase</b></button></center>
		</div>
							
		<div class="col-md-4 guide-col-pad" id="divtnkId">
			<h1 class="m-header">Thank You!</h1>
			<p style="padding-top:10px;"><?php echo $thankyou_content;?> </p>
			<center><button type="button" class="btn btn-default btn-rounded" style="margin-top:105px;" id="dpContBtnId"  onclick="showdipcourse();"><b>Continue</b></button></center>
		</div>
	</div><!-- row -->	
<!--<a href= echo site_url(); ?>/diplomatecourse/ echo $first_course_id;?>" -->
	</div><!-- col-md-12 -->			
</div><!-- row -->		
<br><br><br><br><br><br><br><br><br><br>
</div><!-- Container -->	
</div><!-- Wrapper Content -->

<script>

	$( "#txtt2expId" ).datepicker({		 
        changeYear  : true,
        changeMonth : true,
		clearText: "Clear",
        dateFormat: 'mm/y',
		minDate: new Date()
    });	
	
	$("#divtnkId").hide();    
	$('.showpromoamount').hide();
	//$("#dpPurBtnId").prop("disabled", false);
	function showpromoamount() {
		if($('#selPromocodeId').val() !="") {
			$('.showpromoamount').show();
		} else {
			$('.showpromoamount').hide();
		}
	}

	$(document).ready(function () {
		// Add slimscroll to element
		$('#scroll_content').slimscroll({
			height: '150px'
		})			
	});
		
	function showdipcourse() {
		window.location.href="<?php echo site_url(); ?>/diplomatecourse/<?php echo $first_course_id;?>";
	}

	function OBvalidate_crs_payment_form() {	
		var js_drd_email_patrn = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var js_drd_cardno_patrn = /^[0-9]{9,20}$/;
		var js_drd_zipcode_patrn = /^[0-9]{5}$/;
		var js_drd_payment_chk  = $(":input[name=txtdpagreedtc]:checked").val();
		var js_drd_uname  = document.getElementById('txtdpNameId').value!="";
		var js_drd_email  = document.getElementById('txtdpEmailId').value!="";
		var js_drd_pattern_email_Id = js_drd_email_patrn.test(document.getElementById('txtdpEmailId').value);
		var js_drd_add  = document.getElementById('txtdpaddressId').value!="";
		var js_drd_city  = document.getElementById('txtdpcityId').value!="";
		var js_drd_state  = document.getElementById('txtdpstateId').value!="";
		var js_drd_zip  = document.getElementById('txtdpzipId').value!="";
		var js_drd_card  = document.getElementById('txtdpcardnameId').value!="";
		var js_drd_card_no  = document.getElementById('txtdpcardnoId').value!="";
		var js_drd_exp  = document.getElementById('txtt2expId').value!="";
		var js_drd_cvv  = document.getElementById('txtdpcvvId').value!="";	
		var js_drd_pattern_cardno = js_drd_cardno_patrn.test(document.getElementById('txtdpcardnoId').value);
		var js_drd_pattern_zipcode = js_drd_zipcode_patrn.test(document.getElementById('txtdpzipId').value);
		
		if(js_drd_payment_chk && js_drd_uname && js_drd_email && js_drd_pattern_email_Id && js_drd_add && js_drd_city && js_drd_state && js_drd_zip && js_drd_card  && js_drd_pattern_zipcode && js_drd_pattern_cardno && js_drd_card_no && js_drd_exp && js_drd_cvv)
		{
			$("#dpPurBtnId").prop("disabled", false);
		}
		else
		{
			$("#dpPurBtnId").prop("disabled", true);
		}
	}


	function payment_insert_fun() {	
		$("#dpPurBtnId").prop("disabled", true);
		$("#dpPurBtnId").css("cursor", "wait");
		var js_drd_ins_credit_state  = $("#selStateId").val();
		var js_drd_ins_credit_status  = $(":input[name=radioInline]:checked").val();
		var js_drd_ins_card_name  = $("#txtdpNameId").val();
		var js_drd_ins_card_no  = $("#txtdpcardnoId").val();
		var js_drd_ins_card_exp_date  = $("#txtt2expId").val();
		var js_drd_ins_card_cvv  = $("#txtdpcvvId").val();
		var js_drd_ins_address  = $("#txtdpaddressId").val();
		var js_drd_ins_city  = $("#txtdpcityId").val();
		var js_drd_ins_state  = $("#txtdpstateId").val();
		var js_drd_ins_zip  = $("#txtdpzipId").val();
		var js_drd_ins_stdprice  = "<?php echo $diplomate_price; ?>";
		var js_drd_ins_promoamount  = $("#discount_amount").text();
		var js_drd_ins_promocodeid  = $("#promoid").val();
		var js_drd_credit_state  = <?php echo $course_state_id;?>;
		var js_drd_credit_option  = "<?php echo $credit_option;?>";

		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/insertdippayment",			
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
				//'ajx_drd_courseid':js_drd_ins_courseid,
				'ajx_drd_std_price':js_drd_ins_stdprice,
				'ajx_drd_promo_amount':js_drd_ins_promoamount,
				'ajx_drd_promo_codeid':js_drd_ins_promocodeid,
				'ajx_creditstate':js_drd_credit_state,
				'ajx_creditoption':js_drd_credit_option,
			  },
			success: function(ajx_drd_ReturnResult) {			
				$("#t2PurBtnId").prop("disabled", false);
				$("#t2PurBtnId").css("cursor", "pointer");
					var js_drd_ReturnMsg = $.parseJSON(ajx_drd_ReturnResult);
					
					console.log("Return Quiz Submit Value "+JSON.stringify(js_drd_ReturnMsg));
					if(js_drd_ReturnMsg['message_type'] ==  "SUCCESS")
					{
						$("#divpymtId").hide();
						$("#divtnkId").show();				
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

	function get_promo_amount() {
		var getvalue = document.getElementById('txtpromoId').value;
		if(getvalue != "") {
			
			$.ajax({
				type: "POST",
				url: "<?php echo site_url(); ?>"+ "/getpromotion/DN",			
				data:{
					'ajx_promo_id':getvalue,
					'ajx_std_price':'<?php echo $diplomate_price; ?>'
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
			$("#errPromoId").text('');
			$("#discount_amount").text('');
			$("#promoid").val('');
			$("#total_course_amount").text('');
			$('.showpromoamount').hide();
			//document.getElementById(errId).innerHTML = errMsg["80547"];
		}
	}

</script>

