     </div>
        </div>
		<div class="footer">
            <div class="pull-right">
                 <strong></strong> 
            </div>
            <div>
                <strong>Copyright</strong> CBPCE &copy; 2018
            </div>
        </div>
</body>
</html>

<script>

/* -------- Button Loading Function  ---------- */
function btn_loading_fun()
{
	var loadingshow ='<img  src="<?php echo base_url().'img/loading.svg';?>" style="width:100px;"/><div style="margin:17px; color:#fff;"><b>Please wait</b></div>';
	$('#btntest').html(loadingshow);
	$("#WaitDialog").modalDialog();
}

/* -------- Button Loading Dissmiss Function  ---------- */
function btn_loading_dismissfun()
{
	$('html, body').animate({ scrollTop: 0 }, 'fast');
	$('#btntest').hide();
	$('#WaitDialog').modalDialog('close');
}
</script>