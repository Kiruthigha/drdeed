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
							<div class="col-md-9 col-xs-12" style="padding:0 0px;">
								<h1 class="labeltext">Students</h1>
								<p class="spanlabel"><?php echo $active_count; ?> Active<span>, </span><span><?php echo $suspend_count; ?> Suspended</span></p>
								<p style="font-weight:700;"><span class="badge">D</span>&nbsp;&nbsp;Diplomate Student</p>
							</div>
							<div class="col-md-3 col-xs-12" style="padding:0 0px;">
								<div class="pull-right labeltext"><a class="btncommon btn btn-default btn-rounded" href="<?php echo site_url(); ?>/addstudent">Create New Student</a>
								</div>
							</div>
						</div>
							<p>&nbsp;&nbsp;</p>
							<p>&nbsp;&nbsp;</p>
							<div id="message"></div>
							<?php if ($student) { ?>
							<div class="row">
							<div class="table-responsive">
                    <table class="table  table-striped table-bordered table-hover dataTables-example table_overflow" >
                    <thead claas="fixed">
                    <tr>
						<th hidden> Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Added</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($student as $studentArray):                            
                            if(($studentArray['USER_TYPE_VALUE_NAME'] == 'STUDENT') && ($studentArray['USER_STATUS_VALUE'] != 'DELETE'))
                           {   
                           ?>
						<tr class="gradeA">
							<td hidden ><?php echo $studentArray['ID']; ?></td>
							<td><?php echo $studentArray['FIRST_NAME']." ".$studentArray['LAST_NAME'];  ?> &nbsp;&nbsp;
							<?php if($studentArray['DIPLOMATE_ID']){ ?>
							<span class="badge">D</span>
							<?php } ?>
							<?php if($studentArray['USER_STATUS_VALUE'] == 'SUSPEND'){ ?>
							 <span style="color:Brown;">[Suspended]</span>
							<?php } ?>
							</td>
							<td><?php echo $studentArray['EMAIL_ID']; ?></td>
							<td><?php echo $this->common_functions->date_display_format($studentArray['CREATE_DATE']);  ?></td>
							<td class="">
							<a href="<?php echo site_url(); ?>/editprofile/<?php echo $studentArray['USER_ID']; ?>"> View/Edit</a> <span> | <span>
							<?php if($studentArray['USER_STATUS_VALUE'] == 'SUSPEND'){ ?>
							<a onclick="clkunsupBox('<?php echo $studentArray['USER_ID']; ?>');" > UnSuspend</a> 
							<?php } else {?>							
							 <a onclick="clksupBox('<?php echo $studentArray['USER_ID']; ?>');" > Suspend</a> 
							<?php } ?>
							<span> | <span><a onclick="clkConfnBox('<?php echo $studentArray['USER_ID']; ?>');" > Delete</a></td>
						</tr>
						<?php 
						} 
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
$(document).ready(function(){
   $('td:last-child').css('text-align','right');	
   $('td:last-child').css('width','20%');
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
function clkConfnBox(user_id){
swal({
  title: "Are you sure?",
  text: "Do You Want to DELETE?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonColor: "#DD6B55",
  confirmButtonText: 'Yes',
  cancelButtonText: "No",
  closeOnConfirm: false
},
function(){
  swal.close();
  update_student_status(user_id,'DELETE')
  console.log("Deleted!");
});
} 

function clksupBox(user_id){
swal({
  title: "Are you sure?",
  text: "Do You Want to SUSPEND?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonColor: "#DD6B55",
  confirmButtonText: 'Yes',
  cancelButtonText: "No",
  closeOnConfirm: false
},
function(){
  swal.close();
  update_student_status(user_id,'SUSPEND')
  console.log("Suspended!");
});
} 

function clkunsupBox(user_id)
{

  update_student_status(user_id,'ACTIVE')

} 

function update_student_status(user_id,function_name)
{
$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/updatestudent-status",
		data:{
			'ajax_student_id': user_id,
			'ajax_student_status': function_name,
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