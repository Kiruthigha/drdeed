<style>

label{
	font-size:16px;
}
@media (max-width: 380px) { 
	.ibox-content {    
		padding: 15px 10px 20px 0px !important; 
	}
}
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="" style="border-style:none;">
				<div class="row page-heading">	
					<div class="row">
						<div class="col-md-12" style="padding-bottom:0px;">
							<h1 class="p-header">Subscriptions</h1>
						</div>
					</div>
				
					<form class="m-t" role="form" id="subscription_form"> 
						<div id="userSubscriptionMsgId"></div>
						<div class="">
							<div class="ibox-content" style="border-style:solid 	solid;border-width:1px;border-radius:25px;">
								<fieldset>
									<!-- <div class="row"> -->
									<div class="form-group">									
										<?php $i=1;
										foreach ($user_subscription_data as $user_subscription):
										$user_subscription['user_subscriptions'] = $user_subscription['user_subscriptions'][0]
										?>
										<div class="col-md-9 i-checks" style="padding:15px;">
											<div class="col-md-4 col-xs-10"><label><?php echo $user_subscription['subscription_list']['VALUE_NAME']?>  </label>
											</div>
											<div class="col-md-3 col-xs-1"><!-- <input type="checkbox"> -->
												<input type="checkbox" class="chkUserSubCls" name="chkUserSubscriptionNam[]" id="chkSubscriptionId<?php echo $i;?>" value="<?php echo $user_subscription['subscription_list']['ID'] ?> " <?php echo ($user_subscription['subscription_list']['ID'] == $user_subscription['user_subscriptions']['SUBSCRIPTION_TYPE'] ? 'checked' : null); ?> />
											</div>	
										</div>									
								  
									<?php $i++; 
									endforeach ?>									
									</div>
									
									<div class="col-md-9 i-checks" style="padding:15px;">
										<div class="col-md-4"><label>&nbsp;&nbsp;</label></div>
										<div class="modal-footer col-md-4" style="padding-right:0px; border-top: none;">
											<a href="<?php echo site_url(); ?>/userdashboard" class="btn btn-outline btn-rounded btn-primary-user" tabindex="2">Cancel</a>
											<button type="button" class="btn btn-outline btn-rounded btn-success-user" id="btnSubscriptionId" onclick="submitFun();" tabindex="1">Save</button>
										</div> 
									</div>
									<!-- </div> -->
									<div class="col-md-3">
									
									</div>
								</fieldset>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div><!-- col-lg-12 -->
	</div><!-- Row -->
</div><!-- container -->
	

   <script>
	$(document).ready(function(){
		$('.i-checks').iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
		});
	});

	function submitFun() {
		$("#btnSubscriptionId").prop("disabled", true);
		$("#btnSubscriptionId").css("cursor", "wait");
		 
		var js_drd_subscriptionData = [];
		var status;
		var js_drd_chkBoxLength = $( ".chkUserSubCls" ).length;	

		for (var i=1; i<=js_drd_chkBoxLength; i++) {
			var js_drd_checkboxId = $("#chkSubscriptionId"+i).val();
			var statusId = document.getElementById("chkSubscriptionId"+i).checked;
			if (statusId == true) {
				status = 1;
			} else {
				status = 0;
			}

			var js_drd_userSubData = {
				'subscriptionId' : js_drd_checkboxId,
				'chkStatus' : status,
				'userId' : <?php echo $user_id; ?>
			};
			js_drd_subscriptionData.push(js_drd_userSubData);
		}
		console.log(js_drd_subscriptionData);

		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/usersubscription/"+<?php echo $user_id; ?>,
			dataType: "text",
			data:{'js_drd_user_subscription_data':js_drd_subscriptionData},
			success: function(ajx_drd_user_subscription) {

				var js_drd_user_subscription = $.parseJSON(ajx_drd_user_subscription);
				if (js_drd_user_subscription['message'] != "") {
					
					if(js_drd_user_subscription['message'] == '<?php echo $this->lang->line('m_90004') ?>') {
						document.getElementById('userSubscriptionMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_user_subscription['message']+"</div>";
						setTimeout(function(){ window.location.href= window.location.href; }, 1000);
					} else {
						$("#btnSubscriptionId").prop("disabled", false);
						$("#btnSubscriptionId").css("cursor", "pointer");
						document.getElementById('userSubscriptionMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_user_subscription['message']+"</div>";
					}

				} else {
					window.location.href = "<?php echo site_url(); ?>" + "/404_override";
				}
			},
			error: function() {
			   window.location.href = "<?php echo site_url(); ?>" + "/404_override";
			}
		});
	}
    </script>