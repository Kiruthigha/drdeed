<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Add Your favicon here -->
    <!--<link rel="icon" href="img/favicon.ico">-->

    <title>CBPCE</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick-theme.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo base_url(); ?>css/rotating-card.css">
    <!-- Fonts CSS -->
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">


     <!-- Favicon -->
     <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <style>
	.carousel-control {
        width:-5%;
        }
	.navbar-default .navbar-nav > li > span > a:hover {
	  color: #701D45;
	  }
	</style>
</head>
<body id="page-top" style=" overflow-x: hidden;" <!-- Raji -->
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>img/logo.png" style="width:150px;"/></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll"  style="padding-top:30px;" href="#page-top">Home</a></li>
                        <li><a class="page-scroll" style="padding-top:30px;" href="#features">About</a></li>
                         <li><a class="page-scroll" style="padding-top:30px;" href="#allcourses">Courses</a></li>
                          <li><a class="page-scroll" style="padding-top:30px;" href="#">FAQ</a></li>
                        <li><a class="page-scroll" style="padding-top:30px;" href="#contact">Contact</a></li>
                        <li style="padding:0 10px;"><span><a class="btn btn-warning col-xs-12" style="height:15px; margin-top:30px; padding-top:5px;padding-bottom:25px;padding-left:15px;padding-right:15px;" href="<?php echo site_url(); ?>/signup">Sign up</a></span></li>
						<li style="padding:0 10px;"><span><a class="btn btn-warning col-xs-12" style="height:15px; margin-top:30px; padding-top:5px;padding-bottom:25px;padding-left:15px;padding-right:15px;" href="<?php echo site_url(); ?>/login">Sign in</a></span></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                  <!--  <div class="carousel-caption">
                    <h1>We craft<br/>
                        brands, web apps,<br/>
                        and user interfaces<br/>
                        we are IN+ studio</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">READ MORE</a>
                        <a class="caption-link" href="#" role="button">Inspinia Theme</a>
                    </p>
                </div>
            <div class="carousel-image wow zoomIn">
                    <img src="img/laptop.png" alt="laptop"/>
                </div>-->
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                 <!-- <div class="carousel-caption blank">
                    <h1>We create meaningful <br/> interfaces that inspire.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>-->
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
	<!-- Raji -->
    <a class="left carousel-control " id="btnPrev" href="#inSlider" data-slide="prev" style=" background-image:none ! important; left:-0px;" ><i class="glyphicon  glyphicon-chevron-left" ></i></a>

	<a class="right carousel-control" id="btnNext" href="#inSlider" data-slide="next" style=" background-image:none ! important; right:-0px;"><i class="glyphicon glyphicon-chevron-right" ></i></a>
</div>

<section id="features"  class="container services">
   <div class="row features-block">
        <div class="col-lg-6 wow fadeInDown">
           <h1 style="font-size:56px;"><b>Online <br> Continuing <br> Education</b></h1>
        </div>
        <div class="col-lg-6 wow fadeInRight">
        <h3>Start Taking CE Courses</h3><br>
         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
         <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
         <p>There are many variations of passages of Lorem Ipsum available</p>
         <a href="<?php echo site_url(); ?>/signup" class="btn btn-info btn-block" style="color:#ffff ! important;">Sign Up</a>
        </div>
    </div>
</section>

<section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 wow fadeInDown">
                <div class="navy-line"></div>
                <h1>Why Use CBPCE?</h1>
            </div>
        </div>
    <div class="row features-block">
     <div class="col-lg-6 text-right wow fadeInLeft ">
            <center> <img src="<?php echo base_url(); ?>img/works_slider1.png" alt="dashboard"  style="width:50%" class="img-responsive"> </center>
        </div>
        <div class="col-lg-6 features-text wow fadeInRight">
            <h2>Over 25 CE's Available Online</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
             <p>There are many variations of passages of Lorem Ipsum available</p>
        </div>
    </div>
        <div class="row features-block">
        <div class="col-lg-6 features-text wow fadeInLeft">
            <h2>Coursework to Satisfy Every State.</h2>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
             <p>There are many variations of passages of Lorem Ipsum available</p>
        </div>
        <div class="col-lg-6 text-right wow fadeInRight">
            <center> <img src="<?php echo base_url(); ?>img/geo-choropleth.png" alt="dashboard"  style="width:50%" class="img-responsive "> </center>
        </div>
    </div>
        <div class="row features-block">
     <div class="col-lg-6 text-right wow fadeInLeft ">
            <center> <img src="<?php echo base_url(); ?>img/iPad-Pro.png" alt="dashboard"  style="width:25%" class="img-responsive"> </center>
        </div>
        <div class="col-lg-6 features-text wow fadeInRight">
            <h2>Convenient and Easy.</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
             <p>There are many variations of passages of Lorem Ipsum available</p>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-6 text-center m-t-lg m-b-lg">
                <a href="<?php echo site_url(); ?>/signup" class="btn btn-info btn-block" style="color:#ffff ! important;">Sign Up</a>
            </div>
        </div>
    </div>
</section>

<section id="allcourses" class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navy-line"></div>
                <h1>CBPCE Online Courses</h1>
            </div>
        </div>
        <div class="row" >
			<div class="responsive slider" >
				<div class="col-md-3 col-sm-6" style="border-color : #fff; padding-top:20px">
					<div class="card-container" style="border-color : #fff;">
						<div class="card">
							<div class="front">
								<div class="content">
									<div class="main">
										<h4 class="">Course title </h4>
										<br>
										<p class="profession">Length :  62 Minutes <br> Date : Jul 5, 2017</p>
										<br>
										<center><a href="<?php echo site_url(); ?>/login" class="btn btn-default" style="background-color:#7b7b7b;color:#fff;">View Details</a></center>
									</div>
								</div>
							</div> <!-- end front panel -->
							<div class="back">

								<div class="content">
									<div class="main">
										<p class="" style="color:#FFF;">With supporting text below as a natural lead-in to additional content. <br><br> With supporting text below as a natural lead-in to additional content.</p>
										<br> <!-- raji -->
										<center><a href="<?php echo site_url(); ?>/signup" class="btn btn-info" >Sign Up to View</a></center>
									</div>
								</div>
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
				</div> <!-- End of Col div  -->
				<div class="col-md-3 col-sm-6" style="padding-top:20px">
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="content">
									<div class="main">
										<h4 class="">Course title </h4>
										<br>
										<p class="profession">Length :  62 Minutes <br> Date : Jul 5, 2017</p>
										<br>
										<center><a href="<?php echo site_url(); ?>/login" class="btn btn-default" style="background-color:#7b7b7b;color:#fff;">View Details</a></center>
									</div>
								</div>
							</div> <!-- end front panel -->
							<div class="back">

								<div class="content">
									<div class="main">
										<p class="" style="color:#FFF;">With supporting text below as a natural lead-in to additional content. <br><br> With supporting text below as a natural lead-in to additional content.</p>
										<br> <!-- raji -->
										<center><a href="<?php echo site_url(); ?>/signup" class="btn btn-info" >Sign Up to View</a></center>
									</div>
								</div>
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
				</div> <!-- End of Col div  -->
				<div class="col-md-3 col-sm-6" style="padding-top:20px">
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="content">
									<div class="main">
										<h4 class="">Course title </h4>
										<br>
										<p class="profession">Length :  62 Minutes <br> Date : Jul 5, 2017</p>
										<br>
										<center><a href="<?php echo site_url(); ?>/login" class="btn btn-default" style="background-color:#7b7b7b;color:#fff;">View Details</a></center>
									</div>
								</div>
							</div> <!-- end front panel -->
							<div class="back">

								<div class="content">
									<div class="main">
										<p class="" style="color:#FFF;">With supporting text below as a natural lead-in to additional content. <br><br> With supporting text below as a natural lead-in to additional content.</p>
										<br> <!-- raji -->
										<center><a href="<?php echo site_url(); ?>/signup" class="btn btn-info" >Sign Up to View</a></center>
									</div>
								</div>
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
				</div> <!-- End of Col div  -->
				<div class="col-md-3 col-sm-6" style="padding-top:20px">
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="content">
									<div class="main">
										<h4 class="">Course title </h4>
										<br>
										<p class="profession">Length :  62 Minutes <br> Date : Jul 5, 2017</p>
										<br>
										<center><a href="<?php echo site_url(); ?>/login" class="btn btn-default" style="background-color:#7b7b7b;color:#fff;">View Details</a></center>
									</div>
								</div>
							</div> <!-- end front panel -->
							<div class="back">

								<div class="content">
									<div class="main">
										<p class="" style="color:#FFF;">With supporting text below as a natural lead-in to additional content. <br><br> With supporting text below as a natural lead-in to additional content.</p>
										<br> <!-- raji -->
										<center><a href="<?php echo site_url(); ?>/signup" class="btn btn-info" >Sign Up to View</a></center>
									</div>
								</div>
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
				</div> <!-- End of Col div  -->

				<div class="col-md-3 col-sm-6" style="padding-top:20px">
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="content">
									<div class="main">
										<h4 class="">Course title </h4>
										<br>
										<p class="profession">Length :  62 Minutes <br> Date : Jul 5, 2017</p>
										<br>
										<center><a href="<?php echo site_url(); ?>/login" class="btn btn-default" style="background-color:#7b7b7b;color:#fff;">View Details</a></center>
									</div>
								</div>
							</div> <!-- end front panel -->
							<div class="back">

								<div class="content">
									<div class="main">
										<p class="" style="color:#FFF;">With supporting text below as a natural lead-in to additional content. <br><br> With supporting text below as a natural lead-in to additional content.</p>
										<br> <!-- raji -->
										<center><a href="<?php echo site_url(); ?>/signup" class="btn btn-info" >Sign Up to View</a></center>
									</div>
								</div>
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
				</div> <!-- End of Col div  -->
			</div> <!-- End of class div  -->
		</div>   <!--</div> End of row div  -->
		<div class="row">

  <div class="col-lg-12 col-md-12 col-sm-12">

  <center>

    <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1" style="vertical-align:middle;

  padding-top:10px;"><b>To View all CE courses details and participate, you must sign up or log into your account.   </b></div>

    <div class="col-lg-6 col-md-6 col-sm-6" style="">

		 <a href="<?php echo site_url(); ?>/signup" class="btn btn-info btn-block" style="color:#ffff ! important;">Sign Up to View</a>

	</div>

  </center>

  </div>



  </div>
    </div>

</section>


<section id="testimonials" style="margin-top: 0">
  <div class="parallax-like">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12" style="margin:200px 0px 200px 0px;">
            <center><img src="<?php echo base_url(); ?>img/logo.png" class="col-md-4 col-xs-8 col-md-offset-4 col-xs-offset-2" /></center>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<section id="contact" class="contact" style="margin-top: 0;  background: #701D45;">
    <div class="container">
        <div class="row features-block">
            <div class="col-lg-4">
			 <div class="navy-line" style="margin-top:0px;"></div>
               <h1 style="color: #FFF;">News</h1>

                  <ul>

                    <li><a href="#" style="color: #FFF;">Lorem Ipsum is simply dummy text of the printing</a></li>

                    <li><a href="#"  style="color: #FFF;">Dummy text of the printing</a></li>

                    <li><a href="#"  style="color: #FFF;">There are many variations of passages</a></li>

                    <li><a href="#"  style="color: #FFF;">Lorem Ipsum available</a></li>

                    <li><a href="#"  style="color: #FFF;">Lorem Ipsum is not simply random text</a></li>

                    <li><a href="#"  style="color: #FFF;">The standard chunk of Lorem Ipsum</a></li>

                    <li><a href="#"  style="color: #FFF;">Dummy text of the printing</a></li>

                    <li><a href="#" style="color: #FFF;">There are many variations of passages</a></li>

                    <li><a href="#"  style="color: #FFF;">Lorem Ipsum available</a></li>

                    <li><a href="#"  style="color: #FFF;">Lorem Ipsum is not simply random text</a></li>

                    <li><a href="#"  style="color: #FFF;">The standard chunk of Lorem Ipsum</a></li>

                  </ul>
            </div>

            <div class="col-lg-4">
			 <div class="navy-line" style="margin-top:0px;"></div>

                         <h1 style="color: #FFF;">Events</h1>

                  <p style="color: #FFF;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                  <p style="color: #FFF;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

            </div>

            <div class="col-lg-4">
			 <div class="navy-line" style="margin-top:0px;"></div>
			   <h1 style="color: #FFF;">Contact us</h1>
                 <address style="color: #FFF;">
                    <strong><span style="color: #FFF;">Company name, Inc.</span></strong><br/>
                    795 Folsom Ave, Suite 600<br/>
                    San Francisco, CA 94107<br/>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
				 <div class="">
				 <div class="navy-line" style="margin-top:0px;"></div>
                  <h1 style="color: #FFF;">Links </h1>
                  <ul>
                    <li><a href="#" style="color: #FFF;">Terms & Conditions</a></li>
                    <li><a href="#" style="color: #FFF;">Privacy Policy</a></li>
                  </ul>
                </div>
            </div>



        </div>
		<div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p style="color: #FFF;"><strong>&copy; 2018 CBPCE</strong></p>
            </div>
        </div>
    </div>
</section>
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js"  type="text/javascript"></script> -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="js/pace.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/inspinia.js"></script>
  <script>
  // Course Slider
$('#myCarousel').carousel({
	interval: false,
	cycle : false
});

$('.responsive').slick({
	dots: false,
	infinite: false,
	speed: 300,
	slidesToShow: 4,
	slidesToScroll: 1,
	responsive: [
	{
	  breakpoint: 1024,
	  settings: {
		slidesToShow: 3,
		slidesToScroll: 1,
	  }
	},
	{
	  breakpoint: 600,
	  settings: {
		slidesToShow: 2,
		slidesToScroll: 1
	  }
	},
	{
	  breakpoint: 480,
	  settings: {
		slidesToShow: 1,
		slidesToScroll: 1
	  }
	}
	]
});

</script>
</body>
</html>
