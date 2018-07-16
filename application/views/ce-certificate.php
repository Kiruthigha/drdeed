<!DOCTYPE html>
<html>
<head>
<style>
 body, html {
    height: 100%;
    margin: 0;
	font-family: "Georgia",serif !important;
	color:#000;
	/* font-family: serif;  */
}

/* .bg {
    
    background-image: url("<?php echo base_url(); ?>img/Certificate-CE.jpg");    
    height: 100%;     
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
} */
.dr-name {
        position: absolute;
	top: 310px;
        left:33%;
	/*text-align:center;*/    
	font-size:40px;
	font-weight:300;
	font-family: "Georgia",serif !important;
    /* transform: translate(-50%, -50%); */
}
.dr-license {
    position: absolute;
    top: 388px;
    left: 850px;
    /* left: 1334px; */
	font-size:9px;
	
}
.dr-course {
    position: absolute;
    top: 481px;
    right: 310px;
	font-size:14px;
	font-family: "Georgia",serif !important;
	font-weight:600;
}
.dr-credit {
    position: absolute;
    top: 501px;
    right: 310px;
	font-size:14px;
	font-family: "Georgia",serif !important;
	font-weight:600;
}
.dr-state {
    position: absolute;
    top: 520px;
    right: 310px;
	font-size:14px;
	font-family: "Georgia",serif !important;
	font-weight:600;
}
.dr-code {
    position: absolute;
    top: 541px;
    right: 310px;
	font-size:14px;
	font-weight:600;
}
.dr-date {
    position: absolute;
    top: 625px;
    left: 242px;
	font-size:12px;
	font-family: "Georgia",serif !important;
}

</style>
</head>
<body>
<div class="dr-name" style="text-align:center;"><p><?php echo $user_name;?></p></div>
	<p class="dr-license"><?php echo $license_num;?></p>
	<div class="text-right dr-course"><p class=""><strong><?php echo $course_name;?></strong></p></div>
	<div class="text-right dr-credit"><p class=""><strong><?php echo $course_credit;?></strong></p></div>
	<div class="text-right dr-state"><p class=""><strong><?php echo $state_name;?></strong></p></div>
	<div class="text-right dr-code"><p class=""><strong><?php echo $course_code;?></strong></p></div>
	<p class="dr-date"><strong><?php echo $completed_date;?></strong></p>
	

<img src="<?php echo base_url(); ?>img/Certificate-CE.jpg"/>
</body>
</html>
