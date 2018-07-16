<style>
input{
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
								<p class="spanlabel"><?php echo $total_to_grade ?><span> Remaining to Grade </span><a class="pull-right" href="<?php echo site_url(); ?>/diplomatessays">Back</a></p>
								<p class="spanlabel"><?php echo $user_essays[0]['FIRST_NAME']?>&nbsp;<?php echo $user_essays[0]['LAST_NAME']?></p>
							</div>
						</div>
							<p>&nbsp;&nbsp;</p>
							<p>&nbsp;&nbsp;</p>
							<?php if ($user_essays) { ?>
							<div class="row">
							<div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example table_overflow" >
                    <thead claas="fixed">
                    <tr>
						<th hidden> Id</th>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Grade</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach ($user_essays as $user_essays):
					if($user_essays['ESSAY_SCORE'] == 0)
					{
						$score ="-";
					}
					else
					{
						$score = $user_essays['ESSAY_SCORE']."%";
					}
					
					//convert date to display format
					/* $originalDate = "2010-03-21";
					$newDate = date("d-m-Y", strtotime($originalDate)); */
					$create_date = $this->common_functions->date_display_format($user_essays['CREATE_DATE']);
					?>	
                    <tr class="gradeA">
                        <td hidden >1</td>
                        <td><?php echo $user_essays['ESSAY_ID'];?></td>
                        <td><?php echo $user_essays['COURSE_NAME']; ?></td>
                        <td><?php echo $create_date; ?></td>
                        <td><?php echo $score ?></td>
                        <td class="">
						<a href="<?php echo site_url(); ?>/essaygrade/<?php echo $user_essays['ESSAY_ID']?>"><?php if($user_essays['ESSAY_SCORE'] == 0){?> Grade<?php } else {?> View/Grade <?php } ?></a> </td>
                    </tr>
					<?php endforeach?>
                  
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
$(document).ready(function(){
   $('td:last-child').css('text-align','right');	
   $('td:last-child').css('width','10%');
  $('.dataTables-example').DataTable({
	"searching": false ,
	"aaSorting": [],
	"info": false,	
	"bSort": true,
	"lengthChange": false,
	"iDisplayLength": 8,
	"columns": [
	null,
	null,
	null,
	null,
	null,
	{ "orderable": false }
	]
  });
});

    </script>