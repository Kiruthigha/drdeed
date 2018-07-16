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
								<h1 class="labeltext">Content Master</h1>
							</div>
						</div>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<div id="contentMsgId"></div>	
						<?php if($contentMaster) { ?>	
					<div class="row">	
					<div class="table-responsive">		
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
						<th hidden> Id</th>
                        <th>Function Name</th>
                        <th>Content</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach ($contentMaster as $contentMasters):
						//get function from dd_key value	
						$get_function_name = $this->KeyValue->findByPrimaryKey($contentMasters['FUNCTION_NAME']);
						$function_name = $get_function_name['VALUE_NAME'];	
					?>
                    <tr class="gradeA">
                        <td hidden ><?php echo $contentMasters['ID']; ?></td>
                        <td><?php echo $function_name; ?></td>
                        <td><?php echo $contentMasters['CONTENT']; ?></td>
                        <td>
						<a href="<?php echo site_url(); ?>/editcontentmaster/<?php echo $contentMasters['ID']; ?>"> Edit</a></td>
                    </tr>
                    <?php endforeach?>
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
	/* Function for Pagination*/
	$(document).ready(function(){
		$('td:last-child').css('text-align','right');	
		$('td:last-child').css('width','20%');
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
	
</script>