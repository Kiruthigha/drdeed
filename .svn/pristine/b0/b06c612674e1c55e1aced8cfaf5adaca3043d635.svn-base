<style>
input {
	height:10%;
	width:18%;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content" style="border-style:none;">
					<div class="m-t-sm">
						<div class="row white-bg page-heading">
							<div class="row">
								<div class="col-md-12" style="padding:0 0px;word-wrap: break-word;">
									<h1 class="labeltext">Diplomate Essays</h1>
									<p class="spanlabel"><?php echo $total_to_grade; ?><span>  </span><span>To Grade</span></p>
								</div>
							</div>
							<p>&nbsp;&nbsp;</p>
							<p>&nbsp;&nbsp;</p>
							<?php if ($user_essays) { ?>
							<div class="row">
								<div class="table-responsive">
									<table class="table  table-striped table-bordered table-hover dataTables-example table_overflow" >
										<thead claas="fixed">
											<tr>
												<th hidden> Id</th>
												<th>Name</th>
												<th>Email</th>
												<th>No of Essays</th>
												<th>&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($user_essays as $user_essays): ?>	
											<tr class="gradeA">
												<td hidden >1</td>
												<td><?php echo $user_essays['FIRST_NAME'];?>&nbsp; <?php echo $user_essays['LAST_NAME'];?></td>
												<td><?php echo $user_essays['EMAIL_ID'];?></td>
												<td><?php echo $user_essays['NO_OF_ESSAYS'];?></td>
												<td class=""><a href="<?php echo site_url(); ?>/studentgrades/<?php echo $user_essays['USER_ID']?>"> View/Grade</a></td>
											</tr>
											<?php
											
											endforeach;
												
											?>		
										</tbody>
									</table>
								</div>
							</div>
							<?php } else { ?>
							<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>'<?php echo $this->lang->line('m_90015') ?>'</div>
					<?php } ?>				
						</div>
					</div>
				</div>
			</div>
		</div><!-- col-lg-12 -->
	</div><!-- Row -->
</div><!-- container -->

<script>
	$(document).ready(function() {
		$('td:last-child').css('text-align','right');	
		$('td:last-child').css('width','10%');
		$('.dataTables-example').DataTable({
			"searching": false ,
			"aaSorting": [],
			"bSort": true,
			"info": false,	
			"lengthChange": false,
			"iDisplayLength": 8,
			"columns": [
			null,
			null,
			null,
			null,
			{ "orderable": false }
			]
		});
	});

</script>