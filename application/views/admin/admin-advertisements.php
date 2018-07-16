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
								foreach($advertisements as $ads_array):		
									//get status from dd_key value
									$get_ad_status = $this->KeyValue->findByPrimaryKey($ads_array['ACTIVE_STATUS']);
									$ad_status_name = $get_ad_status['VALUE_NAME'];	
									
									if($ad_status_name == 'ACTIVE')
									{ 
										$ctrl_drd_active_count++;
									} else { 
										$ctrl_drd_inactive_count++;					
									}	
								endforeach;
								?>
							
								<h1 class="labeltext">Advertisement</h1>
								<p class="spanlabel"><?php echo $ctrl_drd_active_count;?> Active<span>, </span><span><?php echo $ctrl_drd_inactive_count; ?> Inactive</span></p>
							</div>
							<div class="col-md-3 col-xs-12" style="padding:0 0px;">
								<div class="pull-right labeltext"><a class="btncommon btn btn-default btn-rounded" href="<?php echo site_url(); ?>/addadvertisement">Create New Ad</a>
								</div>
							</div>
						</div>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
							<div id="AdMsgId"></div>
						<?php if ($advertisements) { ?>
						<div class="row">
					<div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                    <tr>
						<th hidden> Id</th>
                        <th>Advertiser</th>
                        <th>Status</th>
                        <th>Impressions</th>
                        <th>Clicks</th>
                        <th>Date Added</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach ($advertisements as $advertisements):
					//calculate difference between start date and today date
					$duration = ($advertisements['AD_DURATION']*30); 
					$sys_date = time(); // system date as well
					$srt_date = strtotime($advertisements['AD_START_DATE']);
					$date_dif = $sys_date - $srt_date;	
					
					$difference = floor($date_dif/ (60 * 60 * 24));
					
					if(substr($difference ,0,1) == '-') {							
						$remaining_days = $duration + (substr($difference, 1))." Days Left";
					} else {
						$remaining_days = $duration - $difference." Days Left";
					}
					
					//convert date to display format
					$start_date = $this->common_functions->date_display_format($advertisements['AD_START_DATE']);
					
					//get status from dd_key value	
					$get_status = $this->KeyValue->findByPrimaryKey($advertisements['ACTIVE_STATUS']);
					$ad_status = $get_status['VALUE_NAME'];						
					?>
                    <tr class="gradeA">
                        <td hidden ><?php echo $advertisements['ID'];?></td>
                        <td><?php echo $advertisements['ADVERTISER'];?></td>
                        <td><?php if(substr($remaining_days ,0,1) == '-'){
							echo "Closed";
						}  else { echo $remaining_days; } ?> <?php if($ad_status == 'INACTIVE') { ?><span style="color:#B03A3A;"> [Deactivated]</span> <?php } ?></td>
                        <td><?php echo $advertisements['AD_IMP_COUNT'];?></td>
                        <td><?php echo $advertisements['AD_CLICK_COUNT'];?></td>
                        <td><?php echo $start_date;?></td>
                        <td class="">
						<a href="<?php echo site_url(); ?>/editadvertisement/<?php echo $advertisements['ID'];?>"> View/Edit</a> <span> | </span><a onclick="clkdcevBox(<?php echo $advertisements['ID']?>,'<?php echo $ad_status;?>');"><?php if($ad_status == 'ACTIVE') { ?> Deactivate <?php } else { ?>Activate <?php }?></a> <span> | </span><a onclick="clkConfnBox(<?php echo $advertisements['ID']?>);" > Delete</a></td>
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

	$(document).ready(function(){
	   $('td:last-child').css('text-align','right');	
	   $('td:last-child').css('width','18%');	
	});

	/*Function for Pagination*/	
	$('.dataTables-example').DataTable({
		"searching": false ,
		"aaSorting": [],
		"info": false,	
		"aaSorting": [],
		"bSort": true,
		"lengthChange": false,
		"iDisplayLength": 8,
		"columns": [
			null,
			null,
			null,
			null,
			null,
			null,
			{ "orderable": false }
		]
	});
	/*Function for status Change sweet Alert*/
	function clkdcevBox(js_drd_id,js_drd_status){
		if(js_drd_status == 'INACTIVE') {
			js_drd_ad_status = 'ACTIVE';
			upt_ad_status(js_drd_id,js_drd_ad_status);
		} else {
			js_drd_ad_status = 'INACTIVE';
			swal({
				title: "Are you sure?",
				text: "Do You Want to DEACTIVATE?",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-info",
				confirmButtonText: 'Yes',
				cancelButtonText: "No",
				closeOnConfirm: false
			},
			function(){
				swal.close();
				upt_ad_status(js_drd_id,js_drd_ad_status);
			});
		}
	} 
	
	/*Function for Ad Code Status Update*/
	function upt_ad_status(js_drd_ad_id,$js_drd_ad_status) {
		$.ajax({
			type:'POST',
			datatype:'text',
			url: "<?php echo site_url();?>"+"/adstatusupdate",
			data:{ 
			'ajx_drd_ad_id':js_drd_ad_id,
			'ajx_drd_ad_status':js_drd_ad_status
			},
			cache:false,
			success:function(ajx_drd_AdStatusResult) {
				var js_drd_upt_add_status = $.parseJSON(ajx_drd_AdStatusResult);
				if(js_drd_upt_add_status['message'] == '<?php echo $this->lang->line('m_90004') ?>') {
					document.getElementById('AdMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_upt_add_status['message']+"</div>";
					window.setTimeout(function(){location.reload()},1000);
				} else {
					document.getElementById('AdMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_upt_add_status['message']+"</div>";
				}
			},
			error: function() {
			  document.getElementById('AdMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});
	}	
	
	/*Function for Delete Sweet Alert*/
	function clkConfnBox(js_drd_ad_id){			
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
			delete_ad(js_drd_ad_id);
		});		
	} 
	
	/*Function for Advertisement Delete*/
	function delete_ad(js_drd_ad_id) {
		$.ajax({
			type:'POST',
			datatype:'text',
			url: "<?php echo site_url();?>"+"/advertisementdelete",
			data:{ 'ajx_drd_ad_id':js_drd_ad_id },
			cache:false,
			success:function(ajx_drd_DeleteAdResult) {
				var js_drd_DeleteAd = $.parseJSON(ajx_drd_DeleteAdResult);
				if(js_drd_DeleteAd['message'] == '<?php echo $this->lang->line('m_90007') ?>') {
					document.getElementById('AdMsgId').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_DeleteAd['message']+"</div>";
					window.setTimeout(function(){location.reload()},1000);
				} else {
					document.getElementById('AdMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_DeleteAd['message']+"</div>";
				}
			},
			error: function() {
			   document.getElementById('AdMsgId').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			}
		});
	}
</script>