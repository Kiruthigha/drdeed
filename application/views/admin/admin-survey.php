	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
								<div class="m-t-sm">
						<div class="row white-bg page-heading">
						<div class="row">
							<div class="col-md-12 col-xs-12" style="padding:0 0px;word-wrap: break-word;">
								<h1 class="labeltext">Survey</h1>
								<!--<p class="spanlabel"><?php //echo $active_count;?> Active<span>, </span><span><?php //echo $inactive_count;?> Inactive</span></p>-->
							</div>
						</div>
						<div id="message"></div>
							<p>&nbsp;&nbsp;</p>
							<p>&nbsp;&nbsp;</p>
					<?php if ($survey) { ?>
					<div class="row">
					<div class="table-responsive">		
                    <table class="table table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
						<th hidden> Id</th>
                       <!-- <th>Course Type</th>
                        <th>Cours#</th>-->
                        <!--<th>Course</th>-->
                        <th>Survey Question</th>
                        <!--<th>Status</th>-->
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach($survey as $surveyArray):
					if($surveyArray['SURVEY_QUESTION_STATUS_NAME'] !="DELETE")
					{?>
                    <tr class="gradeA">
                        <td hidden ><?php echo $surveyArray['SURVEY_ID'];?></td>
                        <td><?php echo $surveyArray['SURVEY_QUESTION'];?></td>
                        <td>
						<a href="<?php echo site_url(); ?>/editsurvey/<?php echo $surveyArray['SURVEY_ID'];?>"> Edit</a>
                    </tr>
					<?php }
					 endforeach; ?>
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
	{ "orderable": false }
	]
  });
});
function clkConfnBox(survey_id)
{
swal({
  title: "Are you sure?",
  text: "Do You want to DELETE",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: 'Yes',
  cancelButtonText: "No",
  closeOnConfirm: false
},
function(){
  swal.close();
  delete_survey(survey_id);
  console.log("Deleted!");
});
} 

function delete_survey(survey_id)
{
$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/deletesurvey",
		data:{
			'ajax_survey_id': survey_id,
		},
		success: function(ajx_drd_returnResult) {
			console.log("return Data"+ajx_drd_returnResult);
			var js_drd_ReturnResult = $.parseJSON(ajx_drd_returnResult);
				console.log("Return  Message "+js_drd_ReturnResult['message']);
				if(js_drd_ReturnResult['message_type'] ==  "SUCCESS"){
					 document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnResult['message']+"</div>";
					setTimeout(function(){ window.location.href=window.location.href; }, 1000); 
				}else {
					 document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnResult['message']+"</div>";
				}
				$('html, body').animate({ scrollTop: 0 }, 'fast');
		},
		error: function() {
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
	});	
}
   </script>