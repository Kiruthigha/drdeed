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
							<?php 
								$ctrl_drd_active_count = 0; //assign variable for active count
								$ctrl_drd_inactive_count = 0; //assign variable for inactive count
								foreach($promocode as $promo_array):		
									//get status from dd_key value
									$get_promo_status = $this->KeyValue->findByPrimaryKey($promo_array['PROMO_CODE_STATUS']);
									$promo_status_name = $get_promo_status['VALUE_NAME'];	
									
									if($promo_status_name == 'ACTIVE')
									{ 
										$ctrl_drd_active_count++;
									} else { 
										$ctrl_drd_inactive_count++;					
									}	
								endforeach;
							?>
								<h1 class="labeltext">Promo Codes</h1>
								<p class="spanlabel"><?php echo $ctrl_drd_active_count; ?> Active<span>, </span><span><?php echo $ctrl_drd_inactive_count; ?> Inactive</span></p>
							</div>
							<div class="col-md-3 col-xs-12" style="padding:0 0px;">
								<div class="pull-right labeltext"><a class="btncommon btn btn-default btn-rounded" href="<?php echo site_url(); ?>/addpromocode">Create New Code</a>
								</div>
							</div>
						</div>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<div id="promoMsgId"></div>	
						<?php if($promocode) { ?>
						<div class="row">	
					<div class="table-responsive">		
                    <table class="table table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
						<th hidden> Id</th>
                        <th>Name</th>
                        <th>Promo Code</th>
                        <th>Date Added</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach ($promocode as $promocode): 
						$start_date = $this->common_functions->date_display_format($promocode['START_DATE']);						
						$status = $promocode['PROMO_CODE_STATUS'];						
						$promo_id = $promocode['ID'];
						$get_status = $this->KeyValue->findByPrimaryKey($status);
						$promo_status = $get_status['VALUE_NAME'];											
					?>
                    <tr class="gradeA">
                        <td hidden ><?php echo $promocode['ID']; ?></td>
                        <td><?php echo $promocode['PROMO_CODE_NAME']; ?></td>
                        <td><?php echo $promocode['PROMO_CODE']; if($promo_status == 'DEACTIVE') { ?><span style="color:#B03A3A;"> [Deactivated]</span> <?php } ?></td>
                        <td><?php echo $start_date; ?></td>
                        <td class="">
						<a href="<?php echo site_url(); ?>/editpromocode/<?php echo $promocode['ID']; ?>"> Edit</a> <span> | </span><a onclick="clkdcevBox(<?php echo $promo_id;?>,'<?php echo $promo_status;?>');" > <?php if($promo_status == 'ACTIVE') { ?>Deactivate <?php } else { ?> Activate <?php } ?></a> <span> | </span><a onclick="clkConfnBox(<?php echo $promocode['ID']?>);" > Delete</a></td>
                    </tr>
                    <?php endforeach; ?> 
                    </tbody>
                    </table>
						</div> 
						</div> <?php } else { ?>
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
		$('td:last-child').css('width','20%');
		
	});
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
				{ "orderable": false }
			]
		});
	/*Sweet Function for Promo Code Status Update*/
	function clkdcevBox(js_drd_id,js_drd_status){
		if(js_drd_status == 'DEACTIVE') {
			js_drd_promo_status = 'ACTIVE';
			upt_promo_code_status(js_drd_id,js_drd_promo_status);
		} else {
			js_drd_promo_status = 'DEACTIVE';
			swal({
				title: "Are you sure?",
				text: "Do You Want to DEACTIVATE?",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-success",
				confirmButtonText: 'Yes',
				cancelButtonText: "No",
				closeOnConfirm: false
			},
			function(){
				swal.close();				
				upt_promo_code_status(js_drd_id,js_drd_promo_status);
			});
		}	
	} 
		
	/*sweet Alert Function for Promo Code Delete*/
	function clkConfnBox(js_drd_promo_id){
		js_drd_promo_status = 'DELETE';
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
			upt_promo_code_status(js_drd_promo_id,js_drd_promo_status);
		});
	} 
	
	/*Function for Promo Code Status Update*/
	function upt_promo_code_status(js_drd_promo_id,$js_drd_promo_status) {
		$.ajax({
			type:'POST',
			datatype:'text',
			url: "<?php echo site_url();?>"+"/promocodestatusupdate",
			data:{ 
			'ajx_drd_promo_id':js_drd_promo_id,
			'ajx_drd_status':js_drd_promo_status
			},
			cache:false,
			success:function(ajx_drd_DeletePromoResult) {
				var js_drd_DeletePromo = $.parseJSON(ajx_drd_DeletePromoResult);
				if(js_drd_DeletePromo['message'] == '<?php echo $this->lang->line('m_90004') ?>') {
					document.getElementById('promoMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_DeletePromo['message']+"</div>";
					window.setTimeout(function(){location.reload()},1000);
				} else if(js_drd_DeletePromo['message'] == '<?php echo $this->lang->line('m_90007') ?>') {
					document.getElementById('promoMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_DeletePromo['message']+"</div>";
					window.setTimeout(function(){location.reload()},1000);
				} else {
					document.getElementById('promoMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_DeletePromo['message']+"</div>";
				}
			},
			error: function() {
			   document.getElementById('promoMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});
	}	
</script>