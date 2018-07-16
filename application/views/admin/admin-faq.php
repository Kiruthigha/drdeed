	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
								<div class="m-t-sm">
						<div class="row white-bg page-heading">
						<div class="row">
							<div class="col-md-9 col-xs-12" style="padding:0 0px;word-wrap: break-word;">
								<h1 class="labeltext">FAQ</h1>
								<p class="spanlabel"><?php echo $active_number;?> &nbsp;Active<span>, </span><span><?php echo $inactive_number;?> &nbsp;Inactive</span></p>
							</div>
							<div class="col-md-3 col-xs-12" style="padding:0 0px;">
								<div class="pull-right labeltext"><a class="btncommon btn btn-default btn-rounded" href="<?php echo site_url(); ?>/addfaq">Create New Faq</a>
								</div>
							</div>
						</div>
							<p>&nbsp;&nbsp;</p>
							<p>&nbsp;&nbsp;</p>
							<div id="faqMsgId"></div>	
							<?php if ($faq) { ?>
							<div class="row">
						<div class="table-responsive">		
						<table class="table table-bordered table-hover dataTables-example" >
						<thead>
                    <tr>
						<th hidden> Id</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach ($faq as $faq):
													
													?>	
                    <tr class="gradeA">
                        <td hidden >1</td>
                        <td><?php echo $faq['QUESTION'];?></td>
                        <td><?php echo $faq['ANSWER'];?></td>
                        <td><?php echo $faq['PRIORITY_NUMBER'];?></td>
                        <td><?php echo $faq['FAQ_STATUS_NAME'];?></td>
                        <td class="">
						<a href="<?php echo site_url(); ?>/editfaq/<?php echo $faq['ID'];?>"> Edit</a> <span>  | </span><a onclick="clkConfnBox(<?php echo $faq['ID'];?>);" > Delete</a></td>
                    </tr>
                     <?php endforeach;?>
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
	null,
	null,
	{ "orderable": false }
	]
  });
});
 

function clkConfnBox(js_drd_faq_id){
	js_drd_faq_status = 'DELETE';
swal({
  title: "Are you sure?",
  text: "Do You Want to DELETE?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: 'Yes',
  cancelButtonText: "No",
  closeOnConfirm: false
},
function(){
  swal.close();
  delete_faq(js_drd_faq_id,js_drd_faq_status);
});
}


/*Function for Promo Code Status Update*/
	function delete_faq(js_drd_faq_id,$js_drd_faq_status) {
				
		$.ajax({
			type:'POST',
			datatype:'text',
			url: "<?php echo site_url();?>"+"/deletefaqdetails",
			data:{ 
			'ajx_drd_faq_id':js_drd_faq_id,
			'ajx_drd_status':js_drd_faq_status
			},
			cache:false,
			success:function(ajx_drd_DeleteFaqResult) {
				var js_drd_DeleteFaq = $.parseJSON(ajx_drd_DeleteFaqResult);
				if(js_drd_DeleteFaq['message'] == '<?php echo $this->lang->line('m_90007') ?>') {
					document.getElementById('faqMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_DeleteFaq['message']+"</div>";
					window.setTimeout(function(){location.reload()},1000);
				} else {
					document.getElementById('faqMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_DeleteFaq['message']+"</div>";
				}
			},
			error: function() {
			   document.getElementById('faqMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});
	}	
    </script>