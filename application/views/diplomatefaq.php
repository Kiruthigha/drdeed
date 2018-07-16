<style>
.navy-bg {
	height:	220px;
}
.header {
	font-size: 52px !important;		
	padding	: 40px 0 10px 0 !important;	
	text-align:center;
}

.accordion-toggle:hover {
      text-decoration: none;
}

.panel-title {
	font-size:16px !important;	
}
.panel-default {
	border-color: #fff;
	border-top-color: #fff;
}

.panel-default > .panel-heading {
	background-color: #fff;	
	padding: 5px 0px;
}

.panel-default > .panel-heading + .panel-collapse > .panel-body {
	border-top-color: #fff;
}

.panel-body {
	padding: 0 30px 0 30px;
}

.navy-icon {
	color:#701D45;
	padding-right:10px;
	font-size:20px;
}

/* Added by Rajee june 22 2018 */
.about-col-pad {
	padding-left: 0px;
}
.benefits-col-pad {
	padding-right: 0px;
}

@media (max-width: 960px) { /* max-width Changed 350 to 960 Modified by rajee june 22 2018 */  
	.header {
		font-size: 40px !important;	
		padding	: 20px 0 10px 0 !important;	
		text-align:left;
	}
	.navy-bg {
		height:	380px;
	}
	
	/* Added by Rajee june 22 2018 */
	.about-col-pad {
		padding-left: 0px;
		padding-right: 0px;
	}
	.faq-col-pad {
		padding-left: 0px;
		padding-right: 0px;
	}
	.benefits-col-pad {
		padding-left: 0px;
		padding-right: 0px;
	}
	.btn-center {
		text-align:	center;
		padding-top:20px;
	}
}
</style>

		<div class="wrapper-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 col-xs-12" style="border-bottom: 2px solid #D4D4D4;padding-left:0px;">
								<h1 class="p-header" >Diplomate Program</h1>
							</div>
						</div>	
						
						<div class="row" style="padding-top:40px;">	
							<form id="paymentformId" name="paymentformName">	
								<div class="col-md-4 about-col-pad"><!--Added about-col-pad on june 22 2018 by Rajee-->
									<h1>About</h1>
									<p><?php echo $about?>  </p>
								</div>	

								<div class="col-md-4 faq-col-pad">
									<h2>FAQ</h2>
									<div id="accordion" class="panel-group">
										<?php $i=1; foreach ($faq_list as $faq_list): ?>
										<div class="panel panel-default">
											<div class="panel-heading">
												<div class="row">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><div class="col-md-1 col-sm-1 col-xs-1 navy-icon fa fa-plus-circle"></div><div class="col-md-11 col-sm-11 col-xs-11"><?php echo $faq_list['QUESTION']; ?></div></a>
												</h4>
												</div>
											</div>

											<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
												<div class="panel-body">
													<?php echo $faq_list['ANSWER'];?>
												</div>
											</div>
										</div>
										<?php $i++; endforeach;  ?>
									</div>
								</div>	
								<div class="col-md-4 benefits-col-pad"><!--Added about-col-pad on june 22 2018 by Rajee-->
									<h1>Benefits</h1>
									<p><?php echo $benefits?> </p>
								</div>
							</form>	
						</div><!-- row -->			
					</div><!-- col-md-12 -->			
				</div><!-- row -->			
			</div><!-- Container -->	
		</div><!-- Wrapper Content -->

	</div><!-- Page Wrapper -->
</div><!-- Wrapper -->

<div id="wrapper" class="navy-bg align-center">
	<div class="container">	
		<div class="col-md-12 col-xs-12">
			<h1 class="header">Get started on your Diplomate Program</h1>
		</div>
		<div class="row p-lg">
			<div class="col-md-4 col-md-offset-6 col-xs-12 lh faq-col-pad">
				<p><?php echo $banner?></p>				
			</div>
			<div class="col-md-2 col-xs-12 btn-center">
				<a href="<?php echo site_url(); ?>/diplomate" class="btn btn-rounded btn-lg btn-default" style="color:#303030 !important;border:none;"><strong>Register</strong></a>
			</div>
		</div>
	</div>			
</div>

<div id="wrapper">
	<div id="page-wrapper" class="white-bg" style="min-height:5vh !important;">

<script>
$('.collapse').on('shown.bs.collapse', function(){
$(this).parent().find(".fa-plus-circle").removeClass("fa-plus-circle").addClass("fa fa-minus-circle");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".fa-minus-circle").removeClass("fa-minus-circle").addClass("fa fa-plus-circle");
});
</script>