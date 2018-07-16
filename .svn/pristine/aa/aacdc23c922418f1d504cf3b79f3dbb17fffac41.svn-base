<style>
img{
	border-radius:100%;
}
.spanlabel {
  font-family: Arial;
  font-weight: 500;
  font-size: 2rem;
  font-variant: normal;
   color:#000;
}
.btn-primary{
	background-color:#fff !important;
}
.btn-success{
	background-color:#fff !important;
}
.btn:hover{
	background-color:#fff !important;
	color:#000 !important;
}
.labeltext{
	font-size:4rem;
	padding-bottom:10px;
	border-bottom:2px solid #dddddd;
}
</style>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="i">
					<div class="" style="border-style:none;">
								<div class="m-t-sm">
						<div class="row white-bg page-heading">
						<div class="row">
							<div class="col-md-12">
								<h1 class="labeltext">Certificates</h1>
								<p class="spanlabel">638 Total<span>, </span><span>6 New</span><span>, </span><span>632 Archived</span></p>
							</div>
						</div>
							<p>&nbsp;&nbsp;</p>
						<div id="message"></div>
						<span class="spanlabel" style="font-size: 3rem;">New Certifications</span>
						<div class="containerdiv">
                                <table class="table table-striped" id="example" width="100%">
                                    <thead>
                                    <tr>

                                        <th hidden>Id</th>
                                        <th><input type="checkbox" id="check-all" class="i-checks" name="chkbox"></th>
                                        <th>Name </th>
                                        <th>Course </th>
                                        <th>Date Completed </th>
                                        <th align="center">Download</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$i=1;
									foreach($download_certificates as $download_array):
									$download_date = $this->common_functions->date_display_format($download_array['COMPLETE_DATE']); 
									?>
									<?php if($download_array['COURSE_CERTIFICATE_PATH'])
									{?>
                                    <tr>
                                        <td hidden ><input type="hidden"  id="chkbox_type<?php echo $i;?>" value="<?php echo $download_array['COURSE_TYPE'];?>"></td>
                                        <td><input type="checkbox"  class="i-checks" name="chkbox" value="<?php echo $download_array['CERTIFICATE_ID'];?>"><input type="hidden"  class="" id="course_certificate_id<?php echo $download_array['CERTIFICATE_ID'];?>" value="<?php echo $download_array['COURSE_CERTIFICATE_PATH'];?>"></td>
                                        <td><?php echo $download_array['FIRST_NAME']." ".$download_array['LAST_NAME'];?></td>
                                        <td><?php echo $download_array['COURSE_NAME'];?></td>
                                        <td><?php echo $download_date;?></td>
                                        <td valign = "Middle" align = "Center">
										<a onclick="usercertificate_download(<?php echo $download_array['CERTIFICATE_ID'];?>)" href="<?php echo base_url().$download_array['COURSE_CERTIFICATE_PATH']; ?>" download><img src="<?php echo base_url(); ?>img/pdf down.png" width="25" height="25"/></a></td>
                                    </tr>
									<?php 
									}
									$i++;
									endforeach; 
									?> 
                                    </tbody>
                                </table>
                            </div>
							<span style="color:red;" id="errchkvalue"></span>
							<p>&nbsp;</p>
							<div class="form-group">
								<div class="col-lg-12">
								<button class="btn btn-lg btn-success btn-rounded btn-outline pull-right" type="button" id="" onclick="certificate_archive();">Archive</button>
								<button class="btn btn-lg  btn-primary btn-outline btn-rounded  pull-right" type="button" id="" style="" onclick="certificate_download();">Download</button>
								</div>
							</div>
						</div>
	

						</div>
					</div>
				</div>
			</div><!-- col-lg-12 -->
		</div><!-- Row -->
	</div><!-- container -->
	</div>
	</div>
		
						
		<div id="wrapper" style="padding:0px;">
        <div id="page-wrapper" class="gray-bg">		
						<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="">
									<div class="" style="border-style:none;">
												<div class="m-t-sm">
										<div class="row gray-bg page-heading">	
						<span class="spanlabel" style="font-size: 3rem;">Archived Certifications</span>
						<div class="containerdiv1">
                                <table class="table table-striped dataTables-example">
                                    <thead>
                                    <tr>
                                        <th hidden>Id</th>
                                        <th>Name </th>
                                        <th>Course </th>
                                        <th>Date Completed </th>
                                        <th align="center">Download</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php  
									foreach($archive_certificates as $archive_array):
									$download_date = $this->common_functions->date_display_format($archive_array['COMPLETE_DATE']); 
									?>
                                    <tr>
                                        <td hidden ></td>
                                        <td><?php echo $archive_array['FIRST_NAME']." ".$archive_array['LAST_NAME'];?></td>
                                        <td><?php echo $archive_array['COURSE_NAME'];?></td>
                                        <td><?php echo $download_date;?></td>
                                        <td valign = "Middle" align = "Center">
										<a href="<?php echo base_url().$archive_array['COURSE_CERTIFICATE_PATH']; ?>" download><img src="<?php echo base_url(); ?>img/pdf down.png" width="25" height="25"/></a></td>
                                    </tr>
									<?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>

						</div>
						</div>
					</div>
				</div>
			</div><!-- col-lg-12 -->
		</div><!-- Row -->
	</div><!-- container -->

   <script>
$(document).ready(function(){
	
$('.homediv').hide();  	
$('td:last-child').css('width','5%');
	
  $('.dataTables-example').DataTable({
	"searching": false ,
	"aaSorting": [],
	"bSort": true,
	"info": false,	
	"scrollY":"500px",
    "scrollCollapse": true,
	"lengthChange": false,
	"iDisplayLength": 20,
	"columns": [
	null,
	null,
	null,
	null,
	{ "orderable": false }
	]
  });
  
  $('#example').DataTable( {
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": false,
		"bSort": true,
		"searching": false,
		"info": false,	
    }); 
	
 $('.i-checks').iCheck({
    checkboxClass: 'icheckbox_square-green',
    radioClass: 'iradio_square-green',
    });
        
});
 var chkboxlength = $('.i-checks').length;

$('#check-all').on('ifChecked', function () {
	//alert($('.i-checks').length);
  $('.i-checks').iCheck('check');

});
$('#check-all').on('ifUnchecked', function () {

 $('.i-checks').iCheck('uncheck');
});

function certificate_download()
{
	var download_certi_Value = [];
	var download_certi_name = [];
	$(':checkbox:checked').each(function(i){
		if($.isNumeric($(this).val()))
		{
			download_certi_Value.push($(this).val());	
		}
	});
	console.log("result "+download_certi_Value);
	console.log("result "+download_certi_Value.length);
	if(download_certi_Value.length !=0)
	{
		for(var i=0;i<=download_certi_Value.length;i++)
		{
			download_certi_name.push($('#course_certificate_id').val());
		}
		
	console.log("download_certi_name "+download_certi_name);
	console.log("download_certi_name "+download_certi_name.length);
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/updatecertificate",
			data:{
				'ajx_dl_certificateId': download_certi_Value,
				'ajx_dl_certificateName': download_certi_name,
				'ajx_dl_function': "DOWNLOAD",
			},
			success: function(ajx_drd_returnResult) {
				console.log("return Data"+ajx_drd_returnResult);
				var js_drd_ReturnResult = $.parseJSON(ajx_drd_returnResult);
					console.log("SignUp Return  Message "+js_drd_ReturnResult['message']);
					if(js_drd_ReturnResult['message_type'] ==  "SUCCESS"){
						 document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnResult['message']+"</div>";
						//setTimeout(function(){ window.location.href=window.location.href; }, 1000); 	
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
	else
	{
		$('#errchkvalue').text(errMsg['80547']);
	}
}

function certificate_archive()
{
	 var archive_certi_Value = [];
     $(':checkbox:checked').each(function(i){
		if($.isNumeric($(this).val()))
		{
			archive_certi_Value.push($(this).val());	
		}			
     });
	console.log("result "+archive_certi_Value);
	if(archive_certi_Value.length !=0)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>"+ "/updatecertificate",
			data:{
				'ajx_dl_certificateId': archive_certi_Value,
				'ajx_dl_function': "ARCHIVE",
			},
			success: function(ajx_drd_returnResult) {
				console.log("return Data"+ajx_drd_returnResult);
				var js_drd_ReturnResult = $.parseJSON(ajx_drd_returnResult);
					console.log("SignUp Return  Message "+js_drd_ReturnResult['message']);
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
	else
	{
		$('#errchkvalue').text(errMsg['80547']);
	}
}

function usercertificate_download(id)
{
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/updatedownloadcertificate/"+id,
		success: function(ajx_drd_returnResult) {
			console.log("return Data"+ajx_drd_returnResult);
			var js_drd_ReturnResult = $.parseJSON(ajx_drd_returnResult);
				console.log("SignUp Return  Message "+js_drd_ReturnResult['message']);
				if(js_drd_ReturnResult['message_type'] ==  "SUCCESS"){
					/* document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnResult['message']+"</div>";
					setTimeout(function(){ window.location.href=window.location.href(); }, 1000); */	
				}else {
					/* document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnResult['message']+"</div>"; */
				}
				$('html, body').animate({ scrollTop: 0 }, 'fast');
		},
		error: function() {
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
	});	
}
</script>