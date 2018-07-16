<style>
input{
	height:10%;
	width:20%;
}
</style>
	<div class="container ">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" style="border-style:none;">
								<div class="m-t-sm">
						<div class="row white-bg page-heading">
						<div class="row">
							<div class="col-md-9 col-xs-12" style="padding:0 0px;">
								<h1 class="labeltext">Courses</h1>
								<p class="spanlabel"><?php echo $ce_course;?> CE<span>, </span><span><?php echo $dn_course;?> Diplomate</span></p>
							</div>
							<div class="col-md-3 col-xs-12" style="padding:0 0px;">
								<div class="pull-right"><a class="btncommon btn btn-default btn-rounded" href="<?php echo site_url(); ?>/addcourses">Create New Course</a>
								<p style="margin:0px;"><span class="">&nbsp; &nbsp; Cost Per Unit ($) </span><span class=""><input type="text" value="<?php echo $ce_cost;?>" id="txtCECostId" onblur="validateMandatory('txtCECostId','errtxtCECostId');"  onkeypress="return numbersonlyEntry(event);" maxlength="14"/></span><span class=""> &nbsp;<a class=" btn btn-success" onclick="insertCourseCost('txtCECostId','errtxtCECostId','CE');" style="text-decoration:none;"> Save</a></span></p>
								<span  style="color:red;" id="errtxtCECostId"></span>
								<p  style="margin:0px;">Diplomate Cost ($) <span><input type="text" value="<?php echo $dn_cost;?>" id="txtDNCostId" onblur="validateMandatory('txtDNCostId','errtxtDNCostId');"  onkeypress="return numbersonlyEntry(event);" maxlength="14" /></span><span> &nbsp;<a class=" btn btn-success"onclick="insertCourseCost('txtDNCostId','errtxtDNCostId','DN');" style="text-decoration:none;"> Save</a></span></p>
								<span style="color:red;" id="errtxtDNCostId"></span>		
								</div>
							</div>
						</div>
							<p>&nbsp;&nbsp;</p>
							<p>&nbsp;&nbsp;</p>
							<div id="message"></div>
					<?php if($courses)
					{ ?>
					<div class="row">
					<div class="table-responsive">
                    <table class="table table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
						<th hidden> Id</th>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Date Added</th>
                        <th>Type</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach($courses as $courses):
					if($courses['COURSE_STATUS_VALUE']!="DELETED")
					{?>
                    <tr class="gradeA">
                        <td hidden ><?php echo $courses['ID'];?></td>
                        <td ><?php echo $courses['COURSE_NUM'];?></td>
                        <td nowrap><?php echo $courses['COURSE_NAME'];?>
						<?php if($courses['COURSE_STATUS_VALUE'] == 'HIDE'){ ?>
						<span style="color:Brown;">[Hide]</span>
						<?php } ?></td>
                        <td ><?php echo $this->common_functions->date_display_format($courses['CREATE_DATE']);?></td>
                        <td><?php echo $courses['COURSE_TYPE_ID'];?></td>
                        <td>
						<a href="<?php echo site_url(); ?>/editcourses/<?php echo $courses['ID'];?>"> Edit</a> <span> | </span>
						<?php if($courses['COURSE_STATUS_VALUE'] == 'HIDE'){ ?>
						<a onclick="clkshowBox(<?php echo $courses['ID'];?>);" > UnHide</a>
						<?php } else {?>
						<a onclick="clkhideBox(<?php echo $courses['ID'];?>);" > Hide</a>
						<?php } ?>
						<span> | </span><a onclick="clkConfnBox(<?php echo $courses['ID'];?>);" > Delete</a></td>
                    </tr>
					<?php 
					}
					endforeach; 
					?>
                    </tbody>
                    </table>
					</div>
				</div>
			<?php } else {?>
				<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>'<?php echo $this->lang->line('m_90015') ?>'</div>
			<?php }?>			
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
	"bSort": true,
	"info": false,	
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
function clkConfnBox(course_id){
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
  update_course_status(course_id,'DELETE');
  console.log("Deleted!");
});
} 

function clkhideBox(course_id){
swal({
  title: "Are you sure?",
  text: "Do You Want to HIDE?",
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
  update_course_status(course_id,'HIDE');
  console.log("Deleted!");
});
} 

function clkshowBox(course_id)
{
  update_course_status(course_id,'ACTIVE');
} 

function update_course_status(course_id,function_name)
{
$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/updatecourse-status",
		data:{
			'ajax_course_id': course_id,
			'ajax_course_status': function_name,
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
function insertCourseCost(valueId,errId,courseType)
{
var courseCost = document.getElementById(valueId).value
if(courseCost !="")
{
$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/insertcost",
		data:{
			'ajax_courseCost': courseCost,
			'ajax_courseType': courseType,
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
}else
{
	document.getElementById(errId).innerHTML = errMsg["80547"];
}

}
    </script>