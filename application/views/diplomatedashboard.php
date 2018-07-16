
	<style>
		.widget-head-color-box {
			margin: 10px 15px 0 15px;
			padding: 25px 25px 5px 25px !important;	
		}

		.widget-text-box {
			margin: 0 15px 0 15px;
			padding: 20px;
			border: 1px solid #e7eaec;
			border-radius: 0 0 15px 15px;
			height: 100px;
		}

		.progress {
			background-color: #b3b3b3 !important;
			margin-bottom: 5px !important;
		}

		.btn-primary {
			height:25px; 
			padding: 2px 12px !important;	
		}

		.btn-default {
			color:#701D45 !important;
			font-weight:900 !important;	
			border: 1px solid #e7eaec !important;	
		}

		.wrapper-content {
			padding-top:0 !important;
			padding-bottom:0 !important;
		}

		#page-wrapper {
			min-height:4vh !important;
			padding:0px !important;
		}
		
		.btn:hover, .btn:focus, .btn.focus {
			color: #fff;
			text-decoration: none;
		}
		
		.wrapper-container {
			width:90%;
		}
				
		.hearder {
		font-size: 70px;
		width:90%;
		}
		
		.navy-bg {
			width:100%;
			padding:10px 0 15px 5px; /* Martin */
		}
		
		.navy-banner { 
			/* height:120px !important;  Martin*/
			overflow:hidden;
			width:83% !important;
		}
		
		/* .ibox-title { 
			padding: 15px 5px 5px;
		} */
		
		 /* Martin starts */
		.u-dip {
			padding:0px 0 0 21px;
		}
		.u-banner {
			padding:20px 0 0 0;
		}
		.u-btn {
			padding:20px 20px 0 0;
			text-align:right;
		}
		 /* Martin ends */
		
		@media (max-width: 380px) {
			.widget-head-color-box {
				margin: 10px 1px 0px 1px;
				padding: 25px 25px 5px 25px !important;	
			}
			
			.widget-text-box {
				margin:0;
				padding: 20px;
				border: 1px solid #e7eaec;
				border-radius: 0 0 15px 15px;
				height: 100px;
			}	
			
			.wrapper-container {
				width:100%;
			}	
			
			.hearder {
				font-size: 40px;				
			}
			
			.ibox-content {
				padding: 15px 0px 20px 3px;
				
			}			
			
		 /* Martin starts */
		.u-dip {
			padding:0px 0 0 0px;
		}
		.u-banner {
			padding:20px 0 0 0;
		}
		.u-btn {
			padding:20px 20px 0 0;
			text-align:center;
		}
		 /* Martin ends */
	}			
		
	</style>
	

        <div class="wrapper wrapper-content">            
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox float-e-margins">
						<div class="ibox-content" style="border-style:none;">
						
							<div class="m-t-sm">		
								<!-- start title div -->
								<div class="container hearder wrapper-container">
									<p style="padding-top:40px; border-bottom:2px solid #DDDDDD;"> <strong>Coursework</strong></p>
								</div>									
							</div>	
							
						</div><!-- ibox content -->
					</div>
				</div><!-- col-md-12 -->
			</div><!-- row class -->
		</div><!-- page wrapper content -->

<div id="wrapper" class="navy-bg">
	<div class="container navy-banner">	
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12 u-dip">
				<h1>Looking For Other CE's</h1>
			</div>
			<div class="col-md-5 col-sm-4 col-xs-12 lh u-banner">
			<p><?php echo $banner_content; ?></p>	</p>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-12 text-center u-btn">
				<a href="<?php echo site_url(); ?>/userdashboard" class="btn btn-rounded btn-lg btn-default" style="color:#303030 !important;">See More</a>			
			</div>
		</div>
	</div>			
</div>	
		
<div id="wrapper">
    <div id="page-wrapper white-bg">

        <div class="wrapper wrapper-content">
            <div class="container wrapper-container" style="padding:30px 0 80px 0;">
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content" style="border-style:none;">
								
								<div class="m-t-sm">
								
									<!-- start title div -->
									<div class="ibox-title" style="border-style:none;">
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-12">
											<h1>Diplomate Courses</h1>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-12 lh">
										<div style="text-align:right">
										<p></p>
										<?php foreach($dip_course_count as $dip_course_count):?>
										<p><b><?php echo $dip_course_count['NUMBER']?></b> <?php echo ucfirst(strtolower($dip_course_count['USER_COURSE_STATUS_VALUE_NAME']))?></p>
										<?php endforeach;?>	
										</div>
										</div>
									</div>	
									</div>	
									
									<?php foreach($diplomat_crs as $diplomat_crs): 
										/* if($diplomat_crs->PERCENT_SCORED)
										{
											$score = $diplomat_crs->PERCENT_SCORED;
										}
										else
										{
											$score = 0;
										} */
										$publish_date = $this->common_functions->date_display_format($diplomat_crs->PUBLISH_DATE); 	

										if($diplomat_crs->USER_COURSE_STATUS_VALUE_NAME=="COMPLETED") {
											
											if($diplomat_crs->QUIZ_STATUS_VALUE_NAME == "PASS") 
											{
												$status = "Passed";
											}
											else
											{
												$status = "Failed";
											}
											$complete_date = $this->common_functions->date_display_format($diplomat_crs->COMPLETE_DATE); 
										?>
									<div class="col-lg-3 col-md-4 col-sm-6" style="padding-top:20px;">
										<div class="widget-head-color-box1 gray-bg p-lg" style="border-radius: 15px 15px 0 0;padding-bottom:4px !important;">
											<div class="m-b-md" style="margin-bottom: 5px;" title="<?php echo $diplomat_crs->COURSE_NAME; ?>" >
											<h3 class="font-bold no-margins" style="font-size:18px !important;height:37px;">
												<?php echo substr($diplomat_crs->COURSE_NAME,0,35); if(strlen($diplomat_crs->COURSE_NAME)>= 35){?>...<?php } ?>
											</h3>		
											</div>
											
											
												<div class="lh">															
												<div class="" style="padding-top:2px;padding-bottom:5px;">
												<p>
													<div style="padding-bottom:5px;">Score: <strong><?php echo $diplomat_crs->PERCENT_SCORED;  ?>%</strong></div>
													<div>Completed On: <strong><?php echo $complete_date;  ?></strong></div></p>
												</div>
													<?php if($dip_course_status!='COMPLETED'){ ?>
													<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-6">			
													<a href="<?php echo site_url(); ?>/retakedipcourse/<?php echo $diplomat_crs->COURSE_ID;?>" class="btn btn-rounded btn-block">Retake?</a></div></div>
													<?php } ?>
											</div>
										</div>
										<?php if($diplomat_crs->CERTIFICATE_PATH) {?>
										<div class="widget-text-box1 green-bg" style="font-size:8px;">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-6">
											<a href="<?php echo base_url().$diplomat_crs->CERTIFICATE_PATH;  ?>"  class="btn btn-rounded btn-green" download>Print Certificate</a></div>
											
											<div class="text-right col-md-6 col-sm-6 col-xs-6">
											<span class="pull-right" style="padding-top:5px;font-size:10px;"><strong>Completed</strong></span>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
											<p style="font-size:8px; text-align:center;padding-top:3px;" title="<?php echo $diplomat_crs->NO_STATE; ?>"><strong>Apply to All States Except: </strong>
												<?php echo substr($diplomat_crs->NO_STATE,0,75); if(strlen($diplomat_crs->NO_STATE)>= 75){?>...<?php } ?></p></div>
										</div>
										</div>
										<?php }else {?>
										<div class="widget-text-box1 green-bg" style="font-size:10px;">
										<div class="row">
											<div class="col-md-10 col-sm-10 col-xs-10" style="font-size:9px;">
												<strong>
												<p>No certificates available.<br>
												This course was taken<br>
												for zero credit.</strong></div>
												
												<div class="text-right col-md-2 col-sm-2 col-xs-2">
													<span class="pull-right" style="padding-top:10px;"><strong>Completed</strong></span>
												</div>
										</div>
										<!--<div>
										<p style="font-size:10px; text-align:center"><strong>Apply to All States Except: </strong><?php //echo $diplomat_crs->NO_STATE;  ?></p></div>-->
										</div>
										
										<?php }?>
										</div>	
										<?php } else if ($diplomat_crs->USER_COURSE_STATUS_VALUE_NAME=="ENROLLED") {?>
										<div class="col-lg-3 col-md-4 col-sm-6" style="padding-top:20px;">
										<div class="widget-head-color-box1 gray-bg p-lg" style="border-radius: 15px 15px 0 0;">
											<div class="m-b-md" style="margin-bottom:5px;" title="<?php echo $diplomat_crs->COURSE_NAME; ?>">
											<h3 class="font-bold no-margins" style="font-size:18px !important;height:37px;" >
												<?php echo substr($diplomat_crs->COURSE_NAME,0,35); if(strlen($diplomat_crs->COURSE_NAME)>= 35){?>...<?php } ?>
											</h3>	
											</div>
											
											<div class="lh">							
												<div class="" style="padding-top:1px;padding-bottom:6px;">
													<p><div style="padding-bottom:5px;">Length: <strong><?php echo $diplomat_crs->COURSE_LENGTH; ?></strong></div>
													<div>Date: <strong><?php echo $publish_date; ?></strong></div></p>
													</div>
												<span>Status of course:</span>
												<div class="stat-percent"><strong><?php echo $diplomat_crs->PERCENT_COMPLETE; ?>%</strong></div>
												<div class="progress progress-small">
												<div style="width: <?php echo $diplomat_crs->PERCENT_COMPLETE; ?>%;" class="progress-bar"></div>
												</div>		
											</div>
										</div>
										<div class="widget-text-box1 blue-bg">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-xs-6">
													<input type = "button" class="btn btn-rounded btn-block" Style="font-size: 13px; font-weight: 900 !important; padding: 4px 12px !important;" value ="Details"/>
												</div>	
												<div class="text-right col-md-6 col-sm-6 col-xs-6">
													<span class="pull-right" style="padding-top:6px;"><strong>New</strong></span>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<p style="font-size:8px; text-align:center;" title="<?php echo $diplomat_crs->NO_STATE; ?>"><strong>Apply to All States Except: </strong>
													<?php echo substr($diplomat_crs->NO_STATE,0,75); if(strlen($diplomat_crs->NO_STATE)>= 75){?>...<?php } ?></p></div>
											</div>
										</div>
									</div>
										
										<?php } else { ?>
										<div class="col-lg-3 col-md-4 col-sm-6" style="padding-top:20px;">
											<div class="widget-head-color-box1 gray-bg p-lg" style="border-radius: 15px 15px 0 0;">
											<div class="m-b-md" style="margin-bottom:5px;" title="<?php echo $diplomat_crs->COURSE_NAME; ?>">
											<h3 class="font-bold no-margins" style="font-size:18px !important;height:37px;">
												<?php echo substr($diplomat_crs->COURSE_NAME,0,35); if(strlen($diplomat_crs->COURSE_NAME)>= 35){?>...<?php } ?>
											</h3>	
											</div>
											
											<div class="lh">							
												<div class="" style="padding-top:1px;padding-bottom:6px;">
													<p><div style="padding-bottom:5px;">Length: <strong><?php echo $diplomat_crs->COURSE_LENGTH; ?></strong></div>
													<div>Date: <strong><?php echo $publish_date; ?></strong></div></p>
												</div>
												<span>Status of course:</span>
												<div class="stat-percent"><strong><?php echo $diplomat_crs->PERCENT_COMPLETE; ?>%</strong></div>
												<div class="progress progress-small">
												<div style="width: <?php echo $diplomat_crs->PERCENT_COMPLETE; ?>%;" class="progress-bar"></div>
												</div>
											</div>
										</div>
										<div class="widget-text-box1 yellow-bg">
											<div class="row">
												<div class="col-md-5 col-sm-5 col-xs-5">
												<a href="<?php echo site_url(); ?>/diplomatecourse/<?php echo $diplomat_crs->COURSE_ID; ?>" class="btn btn-rounded btn-warning" Style="border: 2px solid #ffffff !important; font-size: 13px; font-weight: 900 !important; padding: 4px 12px !important;" >Resume</a>
												</div>							
												<div class="text-right col-md-7 col-sm-7 col-xs-7">
												<span class="pull-right" style="padding-top:7px;"><strong>In Progress</strong></span>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<p style="font-size:8px;" title="<?php echo $diplomat_crs->NO_STATE; ?>"><strong>Apply to All States Except: </strong>
													<?php echo substr($diplomat_crs->NO_STATE,0,75); if(strlen($diplomat_crs->NO_STATE)>= 75){?>...<?php } ?></p>
												</div>
											</div>
										</div>
									</div>
										
										
										<?php } ?>
																			
										<?php  endforeach;?>
										
									
									
									
								
								</div>
							</div>
                        </div>
                    </div><!-- col-lg-12 -->
                </div><!-- Row -->
				
            </div><!-- container -->
        </div><!-- page wrapper content -->
		
    </div><!-- page wrapper -->
</div><!-- wrapper -->
	
<div id="wrapper" class="yellow-bg banner align-center" >
	<input type="hidden" id="ad_impCount_id<?php echo $ads[0]['ID']; ?>"  value="<?php echo $ads[0]['AD_IMP_COUNT']; ?>">
	<input type="hidden" id="ad_clickCount_id<?php echo $ads[0]['ID']; ?>"  value="<?php echo $ads[0]['AD_CLICK_COUNT']; ?>">
	<a href="<?php echo $ads[0]['BANNER_URL']; ?>"  target="_blank" onclick="imagecountinsert(<?php echo $ads[0]['ID']; ?>);"><div class="container banner-content lh orange_banner " style="background:url('<?php echo base_url().$ads[0]['ADD_PICTURE_PATH']; ?>'); background-size: 100% 100%; background-repeat: no-repeat;" >
	</div>	<!-- End of page container  -->	
	</a>
</div><!-- End of wrapper  -->				
							
<div id="wrapper">
	<div id="page-wrapper" class="white-bg">
		<div class="wrapper wrapper-content">
            <div class="container wrapper-container" style="padding-bottom:0px;">
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins" style="padding-bottom:-4px;">
                            <div class="ibox-content" style="border-style:none;">		
			<div class="m-t-sm" style="padding-top:35px;">
			<!-- start title div -->
				<div class="row">
					<div class="col-md-7">	
						<h1 style="margin-top:0px;"><strong>News & Notifications</strong></h1>
						<div id="message"></div>
							<?php foreach($news as $news): ?>	
						<br>
						<h2 style="font-size:17px;"><span><strong><?php echo $news['TITLE'] ;?></strong></span></h2>
						<p style="padding-bottom:10px;"><?php echo $this->common_functions->date_display_format($news['ARTICLE_CREATE_DATE']);?> </p>
						<p> <?php echo $news['ARTICLE_DESCRIPTION'] ;?></p>
					
						<div>
						<input type="button" class="btn btn-rounded btn-primary-news btn-xs" onclick="dissmissfun(<?php echo $news['ID'] ;?>)"; value="Dismiss" />
						</div>
						<br>
						<?php endforeach; ?>	
					</div>			
				
					<div class="col-md-4 col-md-offset-1" style="margin-bottom:30px;">
						<div class="ibox-content navy-bg text-center" style="padding-top:50px;">
							<div class="m-b-md">
								<h1 class="font-bold no-margins" style="font-size:34px;"><strong>My Profile</strong></h1>
							</div>
							<img src="<?php echo base_url().$picture_path ?>" class="img-circle circle-border m-b-md" alt="profile" >
							<div>
								<h3><?php echo $name; ?></h3>
								<small style="line-height:10%;"><?php echo $email_id; ?></small>
								
								<div class="container text-left page-profile" >
									<br><br>
									<div class="row">
									  <div class="col-md-12">
										<b><p>Courses Completed<span class="pull-right"><?php echo $completed_course; ?></span>
										</p>
										<p>Courses Started<span class="pull-right"><?php echo $started_course; ?></span>
										</p>
										<p>Failed Courses<span class="pull-right"><?php echo $failed_course; ?></span>
										</p>
										<p>Diplomate Program <span class="pull-right"><?php echo $dip_enroll_course; ?>/<?php echo $total_dip_enroll_course; ?></span>
										</p></b>									
									  </div>
									</div>
								</div>
								
								<small style="color:#C991AC; font-size:13px;">Joined <?php echo $join_date; ?></small>
								
								<div style="padding:30px 0;">
									<a class="btn btn-rounded btn-default" href="<?php echo site_url(); ?>/editprofile">Edit/Update<a/>
								</div>
							</div>
						</div><!-- End of ibox Content class div  -->
						
					</div>
				</div><!-- End of row class div  -->
						
			</div> <!-- End of m-t-sm class div  -->
		</div><!-- End of page container  -->	
		</div><!-- End of page container  -->	
		</div><!-- End of page container  -->	
		</div><!-- End of page container  -->	
		</div><!-- End of page container  -->	
		</div><!-- End of page container  -->	
	 
	 
	</div>	<!-- End of page wrapper  -->				
</div>	<!-- End of wrapper  -->
		
<div id="wrapper" class="yellow-bg banner align-center" >
	<input type="hidden" id="ad_impCount_id<?php echo $ads[1]['ID']; ?>"  value="<?php echo $ads[1]['AD_IMP_COUNT']; ?>">
	<input type="hidden" id="ad_clickCount_id<?php echo $ads[1]['ID']; ?>"  value="<?php echo $ads[1]['AD_CLICK_COUNT']; ?>">
	<a href="<?php echo $ads[1]['BANNER_URL']; ?>"  target="_blank" onclick="imagecountinsert(<?php echo $ads[1]['ID']; ?>);"><div class="container banner-content lh orange_banner " style="background:url('<?php echo base_url().$ads[1]['ADD_PICTURE_PATH']; ?>'); background-size: 100% 100%; background-repeat: no-repeat;" >
	</div>	<!-- End of page container  -->	
	</a>
</div><!-- End of wrapper  -->		
	
<div id="wrapper">
    <div id="page-wrapper" class="white-bg wrapper-height" style="min-height:5vh !important;">
	
<script>

function dissmissfun(delete_id) {
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/notification-del",			
		data:{
			'ajx_user_notificationid':delete_id
		},
		success: function(ajx_returndata) {
			var js_ReturnMessage = $.parseJSON(ajx_returndata);
			console.log("Return Register form post value "+JSON.stringify(js_ReturnMessage));
			if(js_ReturnMessage['message_type'] ==  "SUCCESS") {
				document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_ReturnMessage['message']+"</div>";
				setTimeout(function(){ window.location.href= window.location.href; }, 1000);
			} else {
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_ReturnMessage['message']+"</div>";
			}
		},
		error: function(){
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
	});	
}

function imagecountinsert(ad_id) {	
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/user-adupdate",			
		data:{
			'ajx_ad_id':ad_id,
			'ajx_clickcount':$('#ad_clickCount_id'+ad_id).val(),
			'ajx_impcount':""
		},
		success: function(ajx_returndata) {
			var js_ReturnMessage = $.parseJSON(ajx_returndata);
			console.log("Return Register form post value "+JSON.stringify(js_ReturnMessage));
			if(js_ReturnMessage['message_type'] ==  "SUCCESS"){
				$('#ad_clickCount_id'+ad_id).val(js_ReturnMessage['click_count']);
				console.log(" Ad Click Count "+js_ReturnMessage['click_count']);
				console.log("Ad Click Count insert successfully");
			} else {
				console.log("Ad Click Count insert Fail");						
			}
		},
		error: function(){
			//document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			console.log("<?php echo $this->lang->line('m_90524') ?>");	
		}
	}); 	
}
</script>