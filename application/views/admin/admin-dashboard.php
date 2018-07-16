<style>
.col-md-4 {
	padding-right:0px;
}
</style>

<div class="">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="row white-bg">
							<div class="col-md-12">
								<b><h1 class="labeltext">Admin Panel</h1>
								<p class="spanlabel">Last Login On <span><?php echo $Login_Date;?></span> by <span style="word-wrap:break-word;"><?php echo $Email;?></span></p>
								</b>
							</div>
							<p>&nbsp;&nbsp;</p>
							<p>&nbsp;&nbsp;</p>
								<div class="container">
									<div class="row">
									<div class="col-md-3"><a class="btn btncard btn-default btn-rounded" href="<?php echo site_url(); ?>/courses">Courses</a></div>
									<div class="col-md-3"><a class="btn btncard btn-default btn-rounded" href="<?php echo site_url(); ?>/notifications">Notifications</a></div>
									<div class="col-md-3"><a class="btn btncard btn-default btn-rounded" href="<?php echo site_url(); ?>/advertisements">Ads</a></div>
									<div class="col-md-3"><a class="btn btncard btn-default btn-rounded" href="<?php echo site_url(); ?>/contentmaster">Content Master</a></div>
									</div>
									<div class="row">
										<div class="col-md-3"><a class="btn btncard btn-default btn-rounded" href="<?php echo site_url(); ?>/promocodes">Promo Codes</a></div>
										<div class="col-md-3"><a class="btn btn-default btncard btn-rounded" href="<?php echo site_url(); ?>/students">Students</a></div>
										<div class="col-md-3"><a class="btn btncard btn-default btn-rounded" href="<?php echo site_url(); ?>/stateregulations">State Regulations</a></div>
										<div class="col-md-3"><a class="btn btncard btn-default btn-rounded" href="<?php echo site_url(); ?>/faq">FAQ</a></div>
										</div>
										<div class="row">
										<div class="col-md-3"><a class="btn btn-default btn-rounded btncard" href="<?php echo site_url(); ?>/users">Users</a></div>
										<div class="col-md-3"><a class="btn btn-default btn-rounded btncard" href="<?php echo site_url(); ?>/admincertificates">Certificates</a></div>
										<div class="col-md-3"><a class="btn btncard btn-default btn-rounded" href="<?php echo site_url(); ?>/diplomatessays">Diplomate Essays</a></div>
										<div class="col-md-3"><a class="btn btncard btn-default btn-rounded" href="<?php echo site_url(); ?>/survey">Survey</a></div>
										</div>
								</div>
								
						</div>
					</div>
				</div>
			</div><!-- col-lg-12 -->
		</div><!-- Row -->
	</div><!-- container -->
</div><!-- wrapper -->