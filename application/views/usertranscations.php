<style>
div .dataTables_paginate {
  float: right !important;
}
th{
	font-size:16px;
}

</style>
	<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="">
									<div class="" style="border-style:none;">
										<div class="row page-heading">	
											<div class="row">
												<div class="col-md-12" style="padding-bottom:0px;">
													<h1 class="p-header">Transactions</h1>
												</div>
											</div>
											<?php 
											$user_type = $this->session->userdata('drd_userType');
											
											if($user_transactions) { ?>
											<div class="containerdiv1">
												<table class="table table-striped dataTables-example">
													<thead>
														<tr>
															<th hidden>Id</th>
															<?php if($user_type == 'AUDITOR') { ?>
																<th nowrap>Stdent Name </th>
															<?php } ?>
															<th nowrap>Course Title </th>
															<th nowrap>Date Purchased </th>
															<th nowrap>Price &nbsp;  &nbsp;  &nbsp;  &nbsp; </th>
															<th nowrap>Promotion Applied </th>
															<th nowrap>Promotion Amount </th>
															<th nowrap>Paid Amount</th>
														</tr>
													</thead>
													<tbody>
													<?php foreach ($user_transactions as $user_transactions):
													$enroll_date = $this->common_functions->date_display_format($user_transactions['ENROLL_DATE']); 
													?>		
														<tr>
															<td hidden><?php echo $user_transactions['COURSE_ID']; ?></td>
															<?php if($user_type == 'AUDITOR') { ?>
																<td><?php echo $user_transactions['STUDENT_NAME']; ?></td>
															<?php } ?>
															<td><?php echo $user_transactions['COURSE_NAME']; ?></td>
															<td><?php echo $enroll_date; ?></td>
															<td><?php echo $user_transactions['STD_PRICE']; ?></td>
															<td><?php echo $user_transactions['PROMO_CODE_NAME']; ?></td>
															<td><?php echo $user_transactions['PROMO_AMOUNT']; ?></td>
															<td><?php echo $user_transactions['PAID_AMOUNT']; ?></td>
														</tr>
													<?php endforeach ?>              
													</tbody>
												</table>
											</div>	
											<?php } else { ?>
												<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>'<?php echo $this->lang->line('m_90015') ?>'</div>
												<?php } ?>
							<!-- <div class="form-group">
								<div class="col-lg-12">
								<button class="btn btn-lg btn-outline btn-primary btn-rounded  pull-right" type="button" id="" style="">Download</button> 
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div><!-- col-lg-12 -->
		</div><!-- Row -->
	</div><!-- container -->
	

   <script>
	$(document).ready(function() {	
		$('.homediv').hide();  
		//$('td:last-child').css('width','5%');  
	});
	
	/* Function For Pagination */
	$('.dataTables-example').DataTable( {
		"iDisplayLength": 8,
        "scrollCollapse": true,
        "paging": true,
		"bSort": true,
		"lengthChange": false,
		"searching": false,
		"info": false,	
		"initComplete": function(settings, json) {
			$('body').find('.dataTables_scrollBody').addClass("scrollbar");
		},
    }); 
    </script>