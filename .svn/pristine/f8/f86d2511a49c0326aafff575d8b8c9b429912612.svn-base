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
							<div class="col-md-9 col-xs-12" style="padding:0 0px;word-wrap: break-word;">
								<h1 class="labeltext">Users</h1>
								<p class="spanlabel"><?php echo $admin_user;?> Admins<span>, </span><span><?php echo $assistant_user;?> Assistants</span><span>, </span><span><?php echo $audit_user;?> Auditors</span></p>
							</div>
							<div class="col-md-3 col-xs-12" style="padding:0 0px;">
								<div class="pull-right labeltext"><a class="btncommon btn btn-default btn-rounded" href="<?php echo site_url(); ?>/adduser">Create New User</a>
								</div>
							</div>
						</div>
							<p>&nbsp;&nbsp;</p>
							<p>&nbsp;&nbsp;</p>
							<div id="message"></div>
						<?php if($user_details) { ?>
						<div class="row">
					<div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
						<th hidden> Id</th>
                        <th>User Type</th>
                        <th>Email</th>
                        <th>Date Added</th>
                        <th>Last Login</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach($user_details as $userArray):
						if(($userArray['USER_STATUS_VALUE'] != 'DELETE') && ($userArray['USER_TYPE_VALUE'] != 'STUDENT'))
                           {
							   if($userArray['LAST_SUCCESS_LOGIN_DATE'] !="0000-00-00 00:00:00")
							   {
								 $login_date = $this->common_functions->date_display_format($userArray['LAST_SUCCESS_LOGIN_DATE']);  
							   }
							   else
							   {
								   $login_date = ''; 
								   
							   }
							   ?>
                     <tr class="gradeA">
                        <td hidden ><?php echo $userArray['ID'];?> </td>
                        <td><?php echo $userArray['USER_TYPE_VALUE'];?></td>
                        <td><?php echo $userArray['EMAIL_ID'];?>
						<?php if($userArray['USER_STATUS_VALUE'] == 'DEACTIVATED'){ ?>
						<span style="color:Brown;">[Deactivated]</span>
						<?php } ?></td>
                        <td><?php echo $this->common_functions->date_display_format($userArray['CREATE_DATE']);?></td>
                        <td><?php echo $login_date;?></td>
                        <td class="">
						<a href="<?php echo site_url(); ?>/edituser/<?php echo $userArray['ID'];?>"> Edit</a> <span> | <span>
						<?php if($userArray['USER_STATUS_VALUE'] == 'DEACTIVATED'){ ?>
						<a onclick="clkactivateBox(<?php echo $userArray['ID'];?>)" > Activate</a>
						<?php } else {?>
						<a onclick="clkdcevBox(<?php echo $userArray['ID'];?>)" > Deactivate</a>
						<?php } ?>
						<span> | <span>
						<a onclick="clkConfnBox(<?php echo $userArray['ID'];?>);" > Delete</a></td>
                    </tr>
					<?php }
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
	"info": false,	
	"lengthChange": false,
	"iDisplayLength": 8,
	"bSort": true,
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
function clkConfnBox(user_id){
swal({
  title: "Are you sure?",
  text: "Do You want to DELETE",
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
  update_user_status(user_id,'DELETE');
  console.log("Deleted!");
});
} 

function clkdcevBox(user_id){
swal({
  title: "Are you sure?",
  text: "Do You want to DEACTIVATE",
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
  update_user_status(user_id,'DEACTIVATE');
  console.log("Deleted!");
});
} 

function clkactivateBox(user_id)
{
  update_user_status(user_id,'ACTIVE')
} 

function update_user_status(user_id,function_name)
{
$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/updateuser-status",
		data:{
			'ajax_user_id': user_id,
			'ajax_user_status': function_name,
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