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
										<h1 class="labeltext">Notifications</h1>
										<p class="spanlabel"><?php echo count($notification); ?> News Articles<span></p>
									</div>
									<div class="col-md-3 col-xs-12" style="padding:0 0px;">
										<div class="pull-right labeltext"><a class="btncommon btn btn-default btn-rounded" href="<?php echo site_url(); ?>/addnotification">Create New Article</a>
										</div>
									</div>
								</div>								
								<p>&nbsp;&nbsp;</p>
								<p>&nbsp;&nbsp;</p>
								<div id="notificationMsgId"></div>
								<?php if($notification) { ?>
								<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover dataTables-example" >
									  <thead>
										<tr>
											<th hidden> Id</th>
											<th>Title</th>
											<th>Date Added</th>
											<th>&nbsp;</th>
										</tr>
									  </thead>
									  
									  <tbody>
										<?php foreach ($notification as $notification): 
											$creation_date = $this->common_functions->date_display_format($notification['ARTICLE_CREATE_DATE']); 
										?>
										<tr class="gradeA">
										  <td hidden ><?php echo $notification['ID']; ?></td>
										  <td><?php echo $notification['TITLE']; ?></td>
										  <td><?php echo $creation_date; ?></td>
										  <td class=""><a href="<?php echo site_url(); ?>/editnotification/<?php echo $notification['ID']; ?>"> Edit</a>  <span> | </span><a onclick="clkConfnBox(<?php echo $notification['ID']; ?>);" > Delete</a></td>
										</tr>	
										<?php endforeach ?>    
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
	/*Function for Pagination*/
	$(document).ready(function(){
		$('td:last-child').css('text-align','right');	
		$('td:last-child').css('width','15%');
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
				{ "orderable": false }
			]
		});
	});	

	/*Function Delete Sweet Alert*/
	function clkConfnBox(js_drd_id) {		
		swal({
			title: "Are you sure?",
			text: "Do You Want to DELETE?",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: 'OK',
			cancelButtonText: "Cancel",
			closeOnConfirm: false
		},


		function(){
			swal.close();
			delete_notification(js_drd_id);
		});
	} 
	
	/*Function for Notification Delete*/
	function delete_notification(js_drd_notification_id) {
		$.ajax({
			type:'POST',
			datatype:'text',
			url: "<?php echo site_url();?>"+"/notificationdelete",
			data:{ 'ajx_drd_notification_id':js_drd_notification_id },
			cache:false,
			success:function(ajx_drd_DeleteNotifyResult) {
				var js_drd_DeleteNotification = $.parseJSON(ajx_drd_DeleteNotifyResult);
				if(js_drd_DeleteNotification['message'] == '<?php echo $this->lang->line('m_90007') ?>') {
					document.getElementById('notificationMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_DeleteNotification['message']+"</div>";
					window.setTimeout(function(){location.reload()},1000);
				} else {
					document.getElementById('notificationMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_DeleteNotification['message']+"</div>";
				}
			},
			error: function() {
			  document.getElementById('notificationMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});
	}

</script>