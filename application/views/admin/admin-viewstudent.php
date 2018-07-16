<style>
.spanlabeltext {
  font-family: Arial;
  font-weight: 300;
  font-size: 18px;
  font-variant: normal;
   color:#000;
}
span{
	font-family: Arial !important;
}
 .col-lg-3, .col-lg-9{
	font-family: Arial !important;
	font-weight: 500;
	font-size: 14px;
	line-height: 1.9857143;
}
p{
	margin: 0 0 0px;
}
li{
	min-width:250px !important;
	text-align:center;
}
hr{
	border-top: 1px solid #000;
}
</style>
		
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
						<div class="m-t-sm">
							<div class="row wrapper white-bg page-heading">
								<div class="row">
									<div class="col-md-12"  style="padding-right:0px;">
										<h1 class="labeltext">Kevin Javid</h1>
									</div>
									<p>&nbsp;</p>
								</div>
								<p></p>
								<div class="tabs-container">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#tab-1"> Account Details</a></li>
										<li width="100%" class=""><a data-toggle="tab" href="#tab-2">CE Details (2)</a></li>
										<li width="100%" class=""><a data-toggle="tab" href="#tab-3">User Stats</a></li>
									</ul>
									<div class="tab-content">
										<div id="tab-1" class="tab-pane active">
											<div class="panel-body">
											  	
												<form class="form-horizontal">
													<div class="form-group">
													<label class="col-md-3">Joined On</label>
													<div class="col-md-3">
													 <label for="checkbox3">August 4, 2017</label>
													</div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">Email Address</label>
														<div class="col-lg-7"><input type="text" value="kevin@mychiropractice.com" placeholder="" class="form-control" disabled /></div>
													</div>
													<div class="form-group">
														<label class="col-lg-3">Password</label>
														<div class="col-lg-3"><input type="text" value="password123$"  placeholder="" class="form-control" disabled /></div>
													</div>
													<div class="form-group">
														<label class="col-lg-3">Address</label>
														<div class="col-lg-7"><input type="text" placeholder="" class="form-control" value="1234 Streetname Avenue, #100" disabled ></div>
													</div>
													<div class="form-group">
														<label class="col-lg-3">City</label>
														<div class="col-lg-7"><input type="text" placeholder="" class="form-control" value="Los Angeles" disabled ></div>
													</div>
													<div class="form-group">
														<label class="col-lg-3">State</label>
														<div class="col-lg-3">
														<select class="form-control" disabled >
															<option value="California" >California</option>
															<option value="TamilNadu" >TamilNadu</option>
															<option value="Kerala" >Kerala</option>
													</select>
													</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3">Zip Code</label>
														<div class="col-lg-3"><input type="text" placeholder="" class="form-control" value="90023" disabled /></div>
													</div>
													
													<div class="form-group">
														<label class="col-lg-3">Country</label>
														<div class="col-lg-3">
														<select class="form-control"  disabled >
															<option value="US" >United States</option>
															<option value="IND" >India</option>
															<option value="KENYA" >Kenya</option>
													</select>
													</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3">Practice Name</label>
														<div class="col-lg-7"><input type="text" placeholder="" class="form-control" value="Wellness Center Chiropractic"  disabled /></div>
													</div>
													<div class="form-group">
														<label class="col-lg-3">Mobile Number</label>
														<div class="col-lg-3"><input type="text"  placeholder="" class="form-control" value="(949) 555-1212" disabled /></div>
													</div>
													<div class="form-group">
														<label class="col-lg-3">Date of Birth</label>
														<div class="col-lg-3"><input type="text"  placeholder="" class="form-control crtDatePicker" value="Jan 23, 1980" disabled /></div>
													</div>
													<div class="form-group">
														<label class="col-lg-3">License(s)</label>
														<div class="col-lg-7" style="padding:0px;">
														<div class="col-lg-5">
														<select class="form-control" disabled>
															<option value="California">California</option>
															<option value="Nevada" >Nevada</option>
															<option value="Kerala" >Kerala</option>
													</select>
													</div>
													<div class="col-lg-5"><input type="text" value="L8393618" placeholder="" class="form-control" disabled></div>
													<div class="col-lg-2 addmorelink" style="padding-top:10px;padding-right:0px;padding-left:0px;padding-bottom:25px;">
														<a onclick="deletefun()" disabled >Delete</a>
													</div>
													<div class="col-lg-5">
														<select class="form-control" disabled>
															<option value="California">California</option>
															<option value="Nevada" class="active" >Nevada</option>
															<option value="Kerala" >Kerala</option>
													</select>
													</div>
													<div class="col-lg-5"><input type="text" value="001736290012" placeholder="" class="form-control"></div>
													<div class="col-lg-2 addmorelink" style="padding-top:10px;padding-right:0px;padding-left:0px;">
														<a onclick="addmorefunction()" disabled >Add</a> <span> | </span>
														<a onclick="deletefun()" disabled>Delete</a>
													</div> 
													</div> 
													</div>									
													<div class="form-group">
														<label class="col-lg-3">Certified Information Accurate</label>
														<div class="col-lg-3">
															<label for="checkbox3">
																Yes
															</label>
														</div>
													</div>
													<div class="form-group">
													<label class="col-md-3">IP Recorded</label>
													<div class="col-md-3">
													 <label for="checkbox3">102.24.55.107</label>
													</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3"></label>
														<div class="col-lg-7">
														<button class="btn btn-lg btn-success pull-right" type="button" id="editSaveStdBtnId"><strong>Save</strong></button>
														<a class="btn btn-lg  btn-primary  pull-right" href="<?php echo site_url(); ?>/students"><strong>Cancel</strong></a>
														</div>
													</div>
												</form> 
											</div>
										</div>
										<div id="tab-2" class="tab-pane">
											<div class="panel-body">
											<div class="col-lg-12">
											<div class="col-lg-1"><span class="spanlabeltext">00001</span>.</div>
											<div class="col-lg-8">

												<div class="row">
													<div class="col-lg-12"><span class="spanlabeltext">Module 7: Advanced Thoracic Rehab</span></div><p style="margin-bottom:0px;">&nbsp;</p>
												</div>
												
												
												<div class="row">
													<div class="col-lg-3">Date Started</div>
													<div class="col-lg-9">Aug 7, 2017</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Date Completed</div>
													<div class="col-lg-9">Aug 8, 2017</div>
												</div>												
												<div class="row">
													<div class="col-lg-3">Number of Attempts</div>
													<div class="col-lg-9">2</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Score</div>
													<div class="col-lg-9">80</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Total Time on Page</div>
													<div class="col-lg-9">52:34</div>
												</div>
												<div class="row">
													<div class="col-lg-3">CE Credits Earned</div>
													<div class="col-lg-9">5.0 - California</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Total Paid</div>
													<div class="col-lg-9">$50.00</div>
												</div>
												<div class="row">
													<div class="col-lg-3">IP Address</div>
													<div class="col-lg-9">100.255.241.2</div>
												</div>
												
											
											</div>
											<div class="col-lg-3 pull-right" style="text-align:right;">
												<p><a href="#"> View Certificate</a></p>
												<p><a href="#"> View Invoice</a></p>
												<p><a href="#"> View Quiz Details</a></p>
												<p><a href="#"> View Survey Details</a></p>
											</div>
											
										</div>
										<p>&nbsp;</p>
										<hr>
										<p>&nbsp;</p>
										<div class="col-lg-12">
											<div class="col-lg-1"><span class="spanlabeltext">00004</span>.</div>
											<div class="col-lg-8">

												<div class="row">
													<div class="col-lg-12"><span class="spanlabeltext">Module 4: Basic Neck & Whiplash</span></div><p style="margin-bottom:0px;">&nbsp;</p>
												</div>
												
												
												<div class="row">
													<div class="col-lg-3">Date Started</div>
													<div class="col-lg-9">Aug 7, 2017</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Date Completed</div>
													<div class="col-lg-9">Aug 8, 2017</div>
												</div>												
												<div class="row">
													<div class="col-lg-3">Number of Attempts</div>
													<div class="col-lg-9">2</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Score</div>
													<div class="col-lg-9">80</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Total Time on Page</div>
													<div class="col-lg-9">52:34 </div>
												</div>
												<div class="row">
													<div class="col-lg-3">CE Credits Earned</div>
													<div class="col-lg-9">5.0 - California</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Total Paid</div>
													<div class="col-lg-9">$50.00</div>
												</div>
												<div class="row">
													<div class="col-lg-3">IP Address</div>
													<div class="col-lg-9">100.255.241.2</div>
												</div>
												
											
											</div>
											<div class="col-lg-3 pull-right" style="text-align:right;">
												<p><a href="#"> View Certificate</a></p>
												<p><a href="#"> View Invoice</a></p>
												<p><a href="#"> View Quiz Details</a></p>
												<p><a href="#"> View Survey Details</a></p>
											</div>
										</div>
										<p>&nbsp;</p>
										<hr>
										<p>&nbsp;</p>
										</div>
										</div>
										<div id="tab-3" class="tab-pane">
											<div class="panel-body">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-3">Date Joined</div>
													<div class="col-lg-2" style="text-align:right;">Aug 7, 2017</div>
												</div>
												<div class="row">
													<div class="col-lg-3">IP Address Used at Sign Up</div>
													<div class="col-lg-2" style="text-align:right;">101.2.42.222</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Last Login</div>
													<div class="col-lg-2" style="text-align:right;">Dec 25, 2017</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Times Logged In</div>
													<div class="col-lg-2" style="text-align:right;">12</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Total Courses Taken</div>
													<div class="col-lg-2" style="text-align:right;">3</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Total Courses Completed</div>
													<div class="col-lg-2" style="text-align:right;">2</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Total Credits Earned</div>
													<div class="col-lg-2" style="text-align:right;">4</div>
												</div>
												<div class="row">
													<div class="col-lg-3">Total Amount Paid to Date</div>
													<div class="col-lg-2" style="text-align:right;">$300</div>
												</div>
												
											</div>
										</div>
										</div>
									</div><!-- tabs-content -->
								</div><!-- tabs-container -->
							</div><!-- row wrapper -->
						</div><!-- "m-t-sm -->
					</div>
				</div>
			</div><!-- col-lg-12 -->
		</div><!-- Row -->
	</div><!-- container -->
