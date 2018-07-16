<style>
.widget-head-color-box {
	/* margin: 10px 20px 0 20px; */
	padding: 22px 27px 21px 27px !important;
	/* width:338px; */	
}

.widget-text-box {
	/* margin: 0 20px 0 20px; */
	padding: 27px 27px 14px 27px;
	border: 1px solid #e7eaec;
	border-radius: 0 0 15px 15px;
	/* width:338px; */
	height: 111px;
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
.orange_banner
{
	background-color:#ff9900;
}

.wrapper-content {
	padding-top:0 !important;
	padding-bottom:20px !important;
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

 /* Martin starts */
.navy-bg { 
	width:100%;
	padding:10px 0 15px 0; /* Martin */
}
 /* Martin ends */
 
/* .ibox-title { 
	padding: 15px 5px 5px;
} */

.profile {
	padding-right:0px; 
	padding-left:30px;
}
 /* Martin starts */
.u-dip {
	padding:0px 0 0 21px;
}
.u-banner {
	padding:20px 0 0 0;
}
.u-btn {
	padding:20px 20px 0 0;
}
 /* Martin ends */

 
 
@media (max-width: 767px) {
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
		padding:0px 0 10px 0px;
	}
	.u-banner {
		padding:0px 0 0 0;
	}
	.u-btn {
		padding:0px 0px 0 0;
	}
	 /* Martin ends */
}


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
	.profile {
		padding-right:0px; 
		padding-left:10px;
	}
	 /* Martin starts */
	.u-dip {
		padding-left:0px;
	}
	.u-banner {
		padding:0px 0 0 0;
	}
	.u-btn {
		padding:0px 0px 0 0;
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
									<div class="container hearder">
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
			<div class="col-md-5 col-sm-5 col-xs-12 u-dip" style="">
				<h1 style="font-size:37px;">Diplomate Program</h1>
			</div>
			<div class="col-md-5 col-sm-4 col-xs-12 lh u-banner" style="">
			<p><?php echo $banner_content; ?></p>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-12 text-center u-btn" style="">
			<?php if($diplomatedata) {?>
				<a href="#" class="btn btn-rounded btn-lg btn-default" disabled style="color:#303030 !important;background-color:#ccc !important;">Start Now</a>		
			<?php } else {?>
				<a href="<?php echo site_url(); ?>/diplomatefaq" class="btn btn-rounded btn-lg btn-default"  style="color:#303030 !important;">Start Now</a>		
			<?php } ?>	
			</br>
			<?php if($diplomatedata) {?>
				<a href="<?php echo site_url(); ?>/diplomatedashboard"  Style="color:#CB91AD" disabled  >Already Joined? Continue</a>		
			<?php } else {?>
			<a href="#"  Style="color:#CB91AD" >Already Joined? Continue</a>		
			<?php } ?>				
			</div>				
		</div>	
	</div>			
</div>		

<?php if($recommented_crs) {  ?>			
<div id="wrapper">
    <div id="page-wrapper white-bg">

        <div class="wrapper wrapper-content">
            <div class="container wrapper-container" style="padding:30px 0 60px 0;">
            
                <div class="row">
                    <div class="col-lg-12">
                        <!--<div class="ibox float-e-margins">-->
                            <div class="ibox-content" style="border-style:none;">
								<div class="m-t-sm">
									<!-- start title div -->
									<div class="ibox-title" style="border-style:none;">
										<h1>Recommended Courses</h1><span>
									</div>	
									<div <?php if(count($recommented_crs) > 3) {  ?> class="responsive slider" <?php  }  else  { ?>  class="slider" <?php }  ?>  >									
									<?php foreach($recommented_crs as $recommented_crs): 
										if($recommented_crs->PERCENT_COMPLETE)
										{
											$score = $recommented_crs->PERCENT_COMPLETE;
										}
										else
										{
											$score = 0;
										}
										$publish_date = $this->common_functions->date_display_format($recommented_crs->PUBLISH_DATE); 
									
									?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding-top:20px">
											<div class="widget-head-color-box gray-bg p-lg" style="border-radius: 15px 15px 0 0;">
												<div class="m-b-md" title="<?php echo $recommented_crs->COURSE_NAME; ?>">
												<h3 class="font-bold no-margins" style="font-size:25px !important;height:50px;">
													<?php echo substr($recommented_crs->COURSE_NAME,0,35); if(strlen($recommented_crs->COURSE_NAME)>= 35){?>...<?php } ?></h3>	
												</div>
												
												<div class="lh" style="">
												<div class="" style="padding-top:5px;padding-bottom:15px;">
													<p style=""><div style="padding-bottom:5px;">Length: <strong><?php echo $recommented_crs->COURSE_LENGTH; ?></strong></div>
													<div>Date: <strong><?php echo $publish_date; ?></strong></div></p>
													</div>
													<br>
													<span>Status of course:</span>
													<div class="stat-percent"><strong><?php echo $score; ?>%</strong></div>
													<div class="progress progress-small">
													<div style="width: <?php echo $score; ?>%;" class="progress-bar"></div>
													</div>
												</div>
											</div>
											
											<?php  if($recommented_crs->ENROLL_DATE){ ?>
											<div class="widget-text-box yellow-bg">
												<div class="row" style="padding-bottom:5px;">
													<div class="col-md-5 col-sm-5 col-xs-5">
													<a href="<?php echo site_url(); ?>/usercourse/<?php echo $recommented_crs->COURSE_ID; ?>" class="btn btn-rounded btn-warning" Style="border: 2px solid #ffffff !important; font-size: 13px; font-weight: 900 !important; padding: 4px 12px !important;" >Resume</a>
													</div>							
													<div class="text-right col-md-7 col-sm-7 col-xs-7">
													<span class="pull-right" style="padding-top:8px;"><strong>In Progress</strong></span>
													</div>
												</div>
												<div>
													<p style="font-size:8px;" title="<?php echo $recommented_crs->NO_STATE;?>"><strong>Apply to All States Except: </strong><span><?php echo substr($recommented_crs->NO_STATE,0,120); if(strlen($recommented_crs->NO_STATE)>= 120){?>...<?php } ?></span></p>													
												</div>
											</div>
												<?php 
												}
												else
												{
												?>
												<div class="widget-text-box blue-bg">
												<div class="row">
													<div class="col-md-5 col-sm-5 col-xs-5">
													<a href="<?php echo site_url(); ?>/salespage/<?php echo $recommented_crs->COURSE_ID; ?>" class="btn btn-rounded btn-block" Style="font-size: 13px; font-weight: 900 !important; padding: 4px 12px !important;" >Details</a>
													</div>							
													<div class="text-right col-md-7 col-sm-7 col-xs-7">
													<span class="pull-right" style="padding-top:8px;"><strong>New</strong></span>
													</div>
												<div>
													<p style="font-size:10px;" title="<?php echo $recommented_crs->NO_STATE;?>"><strong>Apply to All States Except: </strong><?php echo substr($recommented_crs->NO_STATE,0,120); if(strlen($recommented_crs->NO_STATE)>= 120){?>...<?php } ?></p>
												</div>
												</div>
											</div>
												<?php } ?>
										</div>
									<?php endforeach;?>		
									</div> <!-- End of Responsive slider class div  -->
									</div>
								</div>
							<!--</div>-->
                    </div><!-- col-lg-12 -->
                </div><!-- Row -->
				
            </div><!-- container -->
        </div><!-- page wrapper content -->
		
    </div><!-- page wrapper -->
</div><!-- wrapper -->
<?php }  ?>	
	
<?php if($all_crs) {  ?>					
<div id="wrapper">
    <div id="page-wrapper" style="background-color:#E1E1E1;padding-bottom: 220px;">
		<div class="wrapper wrapper-content" style="background-color:#E1E1E1;">
            <div class="container wrapper-container" style="background-color:#E1E1E1;padding:30px 0 60px 0;">
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content" style="border-style:none; background-color:#E1E1E1;">
								<div class="m-t-sm" style="background-color:#E1E1E1;">
								<!-- start title div -->
									<div class="ibox-title" style="border-style:none; background-color:#E1E1E1;">
										<h1>All Courses</h1>
									</div>	

									
									<div <?php if(count($all_crs) > 4) {  ?> class="allCourse slider" <?php  }  else  { ?>  class="slider" <?php }  ?> >									
									
									<?php foreach($all_crs as $all_crs): 
										if($all_crs->PERCENT_COMPLETE)
										{
											$score = $all_crs->PERCENT_COMPLETE;
										}
										else
										{
											$score = 0;
										}
										$publish_date = $this->common_functions->date_display_format($all_crs->PUBLISH_DATE); 
									
									?>
										<div class="col-lg-3 col-md-6 col-sm-6" style="padding-top:20px;">
											<div class="widget-head-color-box1 gray-bg p-lg" style="border-radius: 15px 15px 0 0;">
												<div class="m-b-md" style="margin-bottom:5px;" title="<?php echo $all_crs->COURSE_NAME; ?>">
												<h3 class="font-bold no-margins" style="font-size:18px !important;height:37px;" >
													<?php echo substr($all_crs->COURSE_NAME,0,35); if(strlen($all_crs->COURSE_NAME)>= 35){?>...<?php } ?>
												</h3>	
												</div>
												
												<div class="lh" style="">							
												<div class="" style="padding-top:1px;padding-bottom:6px;">
													<p><div style="padding-bottom:5px;">Length: <strong><?php echo $all_crs->COURSE_LENGTH; ?></strong></div>
													<div>Date: <strong><?php echo $publish_date; ?></strong></div></p>
													</div>
													<span>Status of course:</span>
													<div class="stat-percent"><strong><?php echo $score; ?>%</strong></div>
													<div class="progress progress-small">
													<div style="width: <?php echo $score; ?>%;" class="progress-bar"></div>
													</div>		
												</div>
											</div>
											<?php  if($all_crs->ENROLL_DATE){ ?>
											<div class="widget-text-box1 yellow-bg">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-6">
														<a href="<?php echo site_url(); ?>/usercourse<?php echo $all_crs->COURSE_ID; ?>" class="btn btn-rounded btn-block">Resume</a>
													</div>	
													<div class="text-right col-md-6 col-sm-6 col-xs-6">
														<span class="pull-right" style="padding-top:5px;"><strong>In Progress</strong></span>
													</div>
												</div>
											</div>
												<?php 
												}
												else
												{
												?>
												<div class="widget-text-box1 blue-bg">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-6">
														<a href="<?php echo site_url(); ?>/salespage/<?php echo $all_crs->COURSE_ID; ?>" class="btn btn-rounded btn-block">Details</a>
													</div>	
													<div class="text-right col-md-6 col-sm-6 col-xs-6">
														<span class="pull-right" style="padding-top:5px;"><strong>New</strong></span>
													</div>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<p class="text-center" style="font-size:8px;margin-bottom:0px;" title="<?php echo $all_crs->NO_STATE;?>"><strong>Apply to All States Except: </strong><?php echo substr($all_crs->NO_STATE,0,75); if(strlen($all_crs->NO_STATE)>= 75){?>...<?php } ?></p>
												</div>
												</div>
											</div>
											
												<?php } ?>
											</div>
										<?php endforeach;?>	
								</div> <!-- End of class div  -->
								
							</div>
                        </div>
					</div><!-- i-box -->
                    </div><!-- col-lg-12 -->
                </div><!-- Row -->

            </div><!-- container -->
        </div><!-- page wrapper content-->	
    </div><!-- page wrapper -->	
</div><!-- wrapper -->	
<?php }  ?>

<?php if($completed_crs) {  ?>			
<div id="wrapper">
    <div id="page-wrapper" class="white-bg">
		<div class="wrapper wrapper-content">
            <div class="container wrapper-container" style="padding:30px 0 60px 0;">
            
                <div class="row">
                    <div class="col-lg-12">
                            <div class="ibox-content" style="border-style:none;">
								<div class="m-t-sm">
								<!-- start title div -->
									<div class="ibox-title" style="border-style:none;">
										<h1>Completed Courses</h1>
									</div>
									
									
									<div <?php if(count($completed_crs) > 4) {  ?>class="completed slider" <?php  }  else  { ?> class="slider" <?php }  ?>>
										
									<?php foreach($completed_crs as $completed_crs): 
										if($completed_crs->QUIZ_STATUS_VALUE_NAME == "PASS")
										{
											$status = "Passed";
										}
										else
										{
											$status = "Failed";
										}
										$complete_date = $this->common_functions->date_display_format($completed_crs->COMPLETE_DATE); 
									
									?>
										<div class="col-lg-3 col-md-4 col-sm-6" style="padding-top:20px;">
											<div class="widget-head-color-box1 gray-bg p-lg" style="border-radius: 15px 15px 0 0;padding-bottom:13px !important;">
												<div class="m-b-md" style="margin-bottom: 1px;" title="<?php echo $completed_crs->COURSE_NAME; ?>">
												<h3 class="font-bold no-margins" style="font-size:18px !important;height:37px;">
												<?php echo substr($completed_crs->COURSE_NAME,0,35); if(strlen($completed_crs->COURSE_NAME)>= 35){?>...<?php } ?>
												</h3>		
												</div>
												
												<div class="lh" style="">
												<!--Martin-->
												<?php //if($status  == 'Failed'){?>							
												<div class="" style="padding-top:2px;padding-bottom:5px;">
													<p><!--<div style="padding-bottom:5px;">Status: <strong style="color:#fe0406;"><?php// echo $status;  ?></strong></div>
												<?php// } else {?>
												<div style="padding-bottom:5px;">Status: <strong ><?php //echo $status;  ?></strong></div>
												<?php// } ?>-->
												<!--Martin-->
													<div style="padding-bottom:5px;">Score: <strong><?php echo $completed_crs->PERCENT_SCORED;  ?>%</strong></div>
													<div>Completed On: <strong><?php echo $complete_date;  ?></strong></div></p>
													</div>
													<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-6">			
													<a href="<?php echo site_url(); ?>/salespage/<?php echo $completed_crs->COURSE_ID;  ?>" class="btn btn-rounded btn-block">Retake?</a></div></div>
												</div>
											</div>
											<div class="widget-text-box1 green-bg" style="font-size:8px;">
											<div class="row">
											<?php if($completed_crs->CERTIFICATE_PATH) {?>
												<div class="" style="" >
													<div class="col-md-6 col-sm-6 col-xs-6">
													<a href="<?php echo base_url().$completed_crs->CERTIFICATE_PATH;  ?>"  class="btn btn-rounded btn-green" style="" download>Print Certificate</a>
													</div>
												
													<div class="text-right col-md-6 col-sm-6 col-xs-6">
													<span class="pull-right" style="padding-top:5px;font-size:10px;"><strong>Completed</strong></span>
													</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
											<p style="font-size:8px; text-align:center;padding-top:10px;" title="<?php echo $completed_crs->NO_STATE;?>"><strong>Apply to All States Except: </strong><?php echo substr($completed_crs->NO_STATE,0,70); if(strlen($completed_crs->NO_STATE)>= 70){?>...<?php } ?></p>
											</div>
												</div>
											<?php											
											} 
											else
											{ ?>
											<div class="" style="font-size:10px;">
												<div class="col-md-10 col-sm-10 col-xs-10" style="font-size:9px;">
												<strong>
												<p>No certificates available.<br>
												This course was taken<br>
												for zero credit.</strong></div>
												
												<div class="text-right col-md-2 col-sm-2 col-xs-2">
													<span class="pull-right" style="padding-top:10px;"><strong>Completed</strong></span>
												</div>
											<!--<div class="col-md-12 col-sm-12 col-xs-12">
											<p style="font-size:8px; text-align:center" title="<?php //echo $completed_crs->NO_STATE;?>"><strong>Apply to All States Except: </strong><?php //echo substr($completed_crs->NO_STATE,0,70); if(strlen($completed_crs->NO_STATE)>= 70){?>...<?php //} ?></p></div>-->
											
											</div>
											<?php } ?>
											
											</div>
										</div>
									</div>
									<?php endforeach;?>	
									</div>		 			 
								</div>		 			 
                        </div><!-- End of ibox -->
                    </div><!-- col-lg-12 -->
                </div><!-- Row -->
            </div><!-- End of container -->
        </div><!-- End of wrapper content -->
    </div><!-- End of page wrapper -->
</div><!-- End of wrapper -->
<?php }  ?>	
<div id="wrapper" class="yellow-bg banner align-center" >
	<input type="hidden" id="ad_impCount_id<?php echo $ads[1]['ID']; ?>"  value="<?php echo $ads[1]['AD_IMP_COUNT']; ?>">
	<input type="hidden" id="ad_clickCount_id<?php echo $ads[1]['ID']; ?>"  value="<?php echo $ads[1]['AD_CLICK_COUNT']; ?>">
	<a href="<?php echo $ads[1]['BANNER_URL']; ?>"  target="_blank" onclick="imagecountinsert(<?php echo $ads[1]['ID']; ?>);"><div class="container banner-content lh orange_banner " style="background:url('<?php echo base_url().$ads[1]['ADD_PICTURE_PATH']; ?>'); background-size: 100% 100%; background-repeat: no-repeat;" >
	</div>	<!-- End of page container  -->	
	</a>
</div><!-- End of wrapper  -->			
							
<div id="wrapper">
	<div id="page-wrapper" class="white-bg">
		<div class="wrapper wrapper-content">
            <div class="container wrapper-container" style="padding-bottom:0px;">
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins" style="margin-bottom:-4px;">
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
						<p style="padding-bottom:10px;"><?php echo $this->common_functions->date_display_format($news['ARTICLE_CREATE_DATE']);?></p>
						<p> <?php echo $news['ARTICLE_DESCRIPTION'] ;?></p>
					
						<div>
						<input type="button" class="btn btn-rounded btn-primary-news btn-xs" onclick="dissmissfun(<?php echo $news['ID'] ;?>)"; value="Dismiss" />
						</div>
						<br>
						<?php endforeach; ?>
					</div>			
				
					<div class="col-md-4 col-md-offset-1 profile" style="margin-bottom:30px;">
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
										<p>Diplomate Program <span class="pull-right"><?php echo $dip_enroll_course; ?>/<?php echo $dip_course_count; ?></span>
										</p></b>									
									  </div>
									</div>
								</div>
								
								<small style="color:#C991AC; font-size:13px;"><?php echo $join_date; ?></small>
								
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
<?php //echo $ads[0]['ADD_PICTURE_PATH'];?>		
<div id="wrapper" class="yellow-bg banner align-center">
	<input type="hidden" id="ad_impCount_id<?php echo $ads[1]['ID']; ?>"  value="<?php echo $ads[1]['AD_IMP_COUNT']; ?>">
	<input type="hidden" id="ad_clickCount_id<?php echo $ads[1]['ID']; ?>"  value="<?php echo $ads[1]['AD_CLICK_COUNT']; ?>">
	<a href="<?php echo $ads[1]['BANNER_URL']; ?>"  target="_blank" onclick="imagecountinsert(<?php echo $ads[1]['ID']; ?>);"><div class="container banner-content lh orange_banner " style="background:url('<?php echo base_url().$ads[1]['ADD_PICTURE_PATH']; ?>'); background-size: 100% 100%; background-repeat: no-repeat;" >
	</div>	<!-- End of page container  -->	
	</a>                  
</div><!-- End of wrapper  -->	
	
<div id="wrapper">
    <div id="page-wrapper" class="white-bg wrapper-height" style="min-height:5vh !important;">
	
    <script>	
  // Course Slider
$('#myCarousel').carousel({
	interval: false,
	cycle : false
});

$('.responsive').slick({
	dots: false,
	infinite: false,
	speed: 300,
	slidesToShow: 3,
	slidesToScroll: 1,
	responsive: [
	{
	  breakpoint: 1024,
	  settings: {
		slidesToShow: 2,
		slidesToScroll: 1,
	  }
	},
	{
	  breakpoint: 800,
	  settings: {
		slidesToShow: 2,
		slidesToScroll: 1
	  }
	},
	{
	  breakpoint: 480,
	  settings: {
		slidesToShow: 1,
		slidesToScroll: 1
	  }
	}
	]
});

$('.allCourse').slick1({
	dots: false,
	infinite: false,
	speed: 300,
	slidesToShow: 4,
	slidesToScroll: 1,
	responsive: [
	{
	  breakpoint: 1024,
	  settings: {
		slidesToShow: 3,
		slidesToScroll: 1,
	  }
	},
	{
	  breakpoint: 800,
	  settings: {
		slidesToShow: 2,
		slidesToScroll: 1
	  }
	},
	{
	  breakpoint: 480,
	  settings: {
		slidesToShow: 1,
		slidesToScroll: 1
	  }
	}
	]
});

$('.completed').slick({
	dots: false,
	infinite: false,
	speed: 300,
	slidesToShow: 4,
	slidesToScroll: 1,
	responsive: [
	{
	  breakpoint: 1024,
	  settings: {
		slidesToShow: 3,
		slidesToScroll: 1,
	  }
	},
	{
	  breakpoint: 800,
	  settings: {
		slidesToShow: 2,
		slidesToScroll: 1
	  }
	},
	{
	  breakpoint: 480,
	  settings: {
		slidesToShow: 1,
		slidesToScroll: 1
	  }
	}
	]
});

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