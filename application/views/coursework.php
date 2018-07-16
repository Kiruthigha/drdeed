<style>

.footer-gold-bg{
	background-color:#DEA027;
}
.tabs-container li{
	min-width:278px !important;
	text-align:center;
}
  .tabs-container .panel-body {
	border: 1px solid #fff;
  }
  .tabs-container .panel-body li{
    background: #D4D4D4;
  }
  .tabs-container .nav-tabs {
    border-bottom: 0px solid #ddd;
}
.nav-tabs {
    border-bottom: 0px solid #ddd;
}

.tabs-container .nav-tabs > li.active > a, .tabs-container .nav-tabs > li.active > a:hover, .tabs-container .nav-tabs > li.active > a:focus {
    border: 1px solid #ddd;
	background-color: #ECECEC;
}

	@media (max-width: 380px) {
		.tabs-container li {
			min-width: auto !important;
		}
	}
</style>
<?php 
$string = $coursedata['COURSE_LENGTH'];
$time   = explode(":", $string);

$hour   = $time[0] * 60 * 60 ;
$minute = $time[1] * 60 ;

$second = explode(",", $time[2]);
$sec    = $second[0] ;
$milisec= $second[1];

$required_time = $hour + $minute + $sec + $milisec;

$string1 = $timeonpage;
		
$time_data   = explode(":", $string1);

$hour1   = $time_data[0] * 60 * 60 ;
$minute1 = $time_data[1] * 60 ;

$second1 = explode(",", $time_data[2]);
$sec1    = $second[0] ;
$milisec1= $second[1];
$time_onpage = $hour1 + $minute1 + $sec1 +$milisec1;

?>
<?php if($usercourseid){ ?>
<div class="wrapper-content">
	<div class="">
		<div class="row">
			<div class="col-md-12">

		<div class="col-md-3 col-xs-12" style="color:#FFF;">
            <div class="navy-bg p-lg text-center" style="">
                <div class="">
                    <h2 class="font-bold no-margins">
                        <?php echo $coursedata['COURSE_NAME']; ?>
                    </h2>
					<input type="hidden"  id="userCourseId"  value="<?php echo $usercoursedata['ID']; ?>" />
					<input type="hidden"  id="courseId"  value="<?php echo $usercoursedata['COURSE_ID']; ?>" />
				<span class="text-left"><p style="padding-top:50px;">
				 <?php echo $coursedata['COURSE_DESCRIPTION']; ?></p></span>
            <div class="row" style="padding-top:35px;">
				<div class="col-md-12" style="padding-left:15px;padding-right:15px;">
				<span class="text-left lh">
					<p>Course Length<span class="pull-right num-font"><?php echo $coursedata['COURSE_LENGTH']; ?></span></br>
					<p>Course Credit<span class="pull-right num-font"><?php echo $coursedata['COURSE_CREDIT']; ?></span></br>
					<p>Instructor<span class="pull-right"><?php echo $coursedata['INSTRUCTOR_NAME']; ?></span></p></span>
				</div>
            </div>
			<input type="hidden" id="user_complete_percent_id" value="<?php echo $usercoursedata['PERCENT_COMPLETE']; ?>" />
            <div class="lh videoplay" style="padding-top:35px;">
              <p class="text-left">Status of current project:<span class="pull-right user_complete_percent_cls num-font"><?php echo $usercoursedata['PERCENT_COMPLETE']; ?>%</span></p>
                  
                  <div class="progress progress-small">
                      <div style="width: <?php echo $usercoursedata['PERCENT_COMPLETE']; ?>%;background-color:#B3B3B3;" class="progress-bar"></div>
                  </div>
              </div>
              </div>
          </div>
             <div class="widget-text-box text-center p-lg lh footer-gold-bg " id="time_remain_id" style="">
                 <h1 class="warning-color media-heading">Time Remaining</h1>
                 <p style="font-size:40px;padding-top:10px;" class="warning-color blink num-font">
				 <strong id="hours">00</strong>:<strong id="minutes">00</strong>:<strong id="seconds">00</strong> </p>
             </div>
			 <div class="widget-text-box text-center p-lg lh footer-gold-bg videoend" id="time_on_id" style="">
                 <h1 class="media-heading">Total Time on Page</h1>
                 <p class="num-font" style="font-size:40px;padding-top:10px;"><strong id="Thours">00</strong>:<strong id="Tminutes">00</strong>:<strong id="Tseconds">00</strong></p>
             </div>
			 <p class="hidden" id="timer"></p>
		</div>
				
	<div class="col-md-9 col-xs-12">
	
		<div class="col-md-12 col-xs-12" style="border-bottom: 2px solid #D4D4D4;padding-left:0px;">
			<h1 class="p-header">Coursework</h1>
		</div>
				
        <div class="tabs-container" style="padding-top:125px;">
            <ul class="nav nav-tabs">
                <li class="active pull-right"><a data-toggle="tab" href="#tab-10">Course</a></li>
            </ul>
            <div class="tab-content">
				
                <div id="tab-10" class="tab-pane active">
                    <div class="panel-body" style="background-color:#ECECEC">
					<div class="quesHide">
						<form id="tab3formId" name="tab3formName">	
						<?php if($documents) { ?>
						<div class="col-md-3">
						<h5>Required Course Downloads</h5>
						</div>
						<?php foreach($documents as $documents):?>
						<div class="col-md-3">						
						<a href="<?php echo base_url().$documents['DOC_FILE_PATH']; ?>" style="overflow-wrap: break-word;" download >
						<img src="<?php echo base_url(); ?>img/pdf down.png" style="width:8%;"/> <?php echo substr($documents['DOC_TITLE'],0,20);  if(strlen($documents['DOC_TITLE'])>= 20){?>..pdf<?php } ?></a>
						</div>
						<?php  endforeach;?>
						<?php } ?>
						<div class="col-md-12 col-xs-12">
						<?php //echo $video->embed($coursedata['COURSE_VIDEO_URL']);?>
						<!--<video autoplay controls controlsList="nodownload" poster="https://vimeo.com/96930511" class="videopl" id="playVideoId" ><source id="mp4" src="https://vimeo.com/96930511">
						  Your browser does not support the video tag.
						</video>-->
						<iframe src="<?php echo $coursedata['COURSE_VIDEO_URL'];?>" frameborder="0" class="videopl"  webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>
					
						   <br>
						</div>
						
						<div  class="quesHideclas" id="quesHideId">
						<div class="col-md-12 col-xs-12">
						<h2><b>Questions</b></h2>
						<div id="message"></div>		
						</div>
						<div class="col-md-12 col-xs-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">	
							<input type="hidden" class="radiocls" id="quizquesId1" value="<?php echo $quiz[0]['QUESTION_NO']; ?>" />
							 <p id="quizQuesNameId1"><?php echo "1. " .htmlentities($quiz[0]['QUESTION_NAME']); ?></p>
							<div class="radio">
										 <input type="radio" class="q1radio1" name="radio1" id="q1radio1" value="<?php echo htmlentities($quiz[0]['0']); ?>" onchange="quizcheckkfun();">
											 <label for="radio1"><?php echo htmlentities($quiz[0]['0']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio1"  name="radio1" id="q1radio1" value="<?php echo htmlentities($quiz[0]['1']); ?>" onchange="quizcheckkfun();">
											 <label for="radio2"><?php echo htmlentities($quiz[0]['1']); ?></label>
									 </div>
							<div class="radio">
										 <input type="radio" class="q1radio1" name="radio1" id="q1radio1" value="<?php echo htmlentities($quiz[0]['2']); ?>" onchange="quizcheckkfun();">
											 <label for="radio3"><?php echo htmlentities($quiz[0]['2']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio1"  name="radio1" id="q1radio1" value="<?php echo htmlentities($quiz[0]['3']); ?>" onchange="quizcheckkfun();">
											 <label for="radio4"><?php echo htmlentities($quiz[0]['3']); ?></label>
									 </div>
							</div>
							<div class="col-md-6 col-xs-12">	
							<input type="hidden" class="radiocls" id="quizquesId2" value="<?php echo $quiz[1]['QUESTION_NO']; ?>" />
							 <p id="quizQuesNameId2"><?php echo "2. ".htmlentities($quiz[1]['QUESTION_NAME']); ?></p>
							<div class="radio">
										 <input type="radio" class="q1radio2" name="radio2" id="q1radio2" value="<?php echo htmlentities($quiz[1]['0']); ?>" onchange="quizcheckkfun();">
											 <label for="radio1"><?php echo htmlentities($quiz[1]['0']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio2"  name="radio2" id="q1radio2" value="<?php echo htmlentities($quiz[1]['1']); ?>" onchange="quizcheckkfun();">
											 <label for="radio2"><?php echo htmlentities($quiz[1]['1']); ?></label>
									 </div>
							<div class="radio">
										 <input type="radio" class="q1radio2" name="radio2" id="q1radio2" value="<?php echo htmlentities($quiz[1]['2']); ?>" onchange="quizcheckkfun();">
											 <label for="radio3"><?php echo htmlentities($quiz[1]['2']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio2"  name="radio2" id="q1radio2" value="<?php echo htmlentities($quiz[1]['3']); ?>" onchange="quizcheckkfun();">
											 <label for="radio4"><?php echo htmlentities($quiz[1]['3']); ?></label>
									 </div>
							</div>
						</div>
						</div>
						
						<div class="col-md-12 col-xs-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">	
							<input type="hidden" class="radiocls" id="quizquesId3" value="<?php echo $quiz[2]['QUESTION_NO']; ?>" />
							 <p id="quizQuesNameId3"><?php echo "3. ".htmlentities($quiz[2]['QUESTION_NAME']); ?></p>
							<div class="radio">
										 <input type="radio" class="q1radio3" name="radio3" id="q1radio3" value="<?php echo htmlentities($quiz[2]['0']); ?>" onchange="quizcheckkfun();">
											 <label for="radio1"><?php echo htmlentities($quiz[2]['0']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio3"  name="radio3" id="q1radio3" value="<?php echo htmlentities($quiz[2]['1']); ?>" onchange="quizcheckkfun();">
											 <label for="radio2"><?php echo htmlentities($quiz[2]['1']); ?></label>
									 </div>
							<div class="radio">
										 <input type="radio" class="q1radio3" name="radio3" id="q1radio3" value="<?php echo htmlentities($quiz[2]['2']); ?>" onchange="quizcheckkfun();">
											 <label for="radio3"><?php echo htmlentities($quiz[2]['2']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio3"  name="radio3" id="q1radio3" value="<?php echo htmlentities($quiz[2]['3']); ?>" onchange="quizcheckkfun();">
											 <label for="radio4"><?php echo htmlentities($quiz[2]['3']); ?></label>
									 </div>
							</div>
							<div class="col-md-6 col-xs-12">	
							<input type="hidden" class="radiocls" id="quizquesId4" value="<?php echo $quiz[3]['QUESTION_NO']; ?>" />
							 <p id="quizQuesNameId4"><?php echo "4. ".htmlentities($quiz[3]['QUESTION_NAME']); ?></p>
							<div class="radio">
										 <input type="radio" class="q1radio4" name="radio4" id="q1radio4" value="<?php echo htmlentities($quiz[3]['0']); ?>" onchange="quizcheckkfun();">
											 <label for="radio1"><?php echo htmlentities($quiz[3]['0']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio4"  name="radio4" id="q1radio4" value="<?php echo htmlentities($quiz[3]['1']); ?>" onchange="quizcheckkfun();">
											 <label for="radio2"><?php echo htmlentities($quiz[3]['1']); ?></label>
									 </div>
							<div class="radio">
										 <input type="radio" class="q1radio4" name="radio4" id="q1radio4" value="<?php echo htmlentities($quiz[3]['2']); ?>" onchange="quizcheckkfun();">
											 <label for="radio3"><?php echo htmlentities($quiz[3]['2']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio4"  name="radio4" id="q1radio4" value="<?php echo htmlentities($quiz[3]['3']); ?>" onchange="quizcheckkfun();">
											 <label for="radio4"><?php echo htmlentities($quiz[3]['3']); ?></label>
									 </div>
							</div>
						</div>
						</div>
						
						<div class="col-md-12 col-xs-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">	
							<input type="hidden" class="radiocls" id="quizquesId5" value="<?php echo $quiz[4]['QUESTION_NO']; ?>" />
							 <p id="quizQuesNameId5"><?php echo "5. ".htmlentities($quiz[4]['QUESTION_NAME']); ?></p>
							<div class="radio">
										 <input type="radio" class="q1radio5" name="radio5" id="q1radio5" value="<?php echo htmlentities($quiz[4]['0']); ?>" onchange="quizcheckkfun();">
											 <label for="radio1"><?php echo htmlentities($quiz[4]['0']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio5"  name="radio5" id="q1radio5" value="<?php echo htmlentities($quiz[4]['1']); ?>" onchange="quizcheckkfun();">
											 <label for="radio2"><?php echo htmlentities($quiz[4]['1']); ?></label>
									 </div>
							<div class="radio">
										 <input type="radio" class="q1radio5" name="radio5" id="q1radio5" value="<?php echo htmlentities($quiz[4]['2']); ?>" onchange="quizcheckkfun();">
											 <label for="radio3"><?php echo htmlentities($quiz[4]['2']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio5"  name="radio5" id="q1radio5" value="<?php echo htmlentities($quiz[4]['3']); ?>" onchange="quizcheckkfun();">
											 <label for="radio4"><?php echo htmlentities($quiz[4]['3']); ?></label>
									 </div>
							</div>
						</div>
						</div>
						
							<!--<div class="col-md-6 col-xs-12">		
						<?php $i=1;
						for($j=0;$j<count($quiz);):  ?>
						
							<input type="hidden" class="radiocls" id="quizquesId<?php echo $i;?>" value="<?php echo $quiz[$j]['QUESTION_NO']; ?>" />
							 <p id="quizQuesNameId<?php echo $i;?>"><?php echo $i.". ".htmlentities($quiz[$j]['QUESTION_NAME']); ?></p>
							<div class="radio">
										 <input type="radio" class="q1radio<?php echo $i;?>" name="radio<?php echo $i;?>" id="q1radio<?php echo $i;?>" value="<?php echo htmlentities($quiz[$j]['0']); ?>" onchange="quizcheckkfun();">
											 <label for="radio1"><?php echo htmlentities($quiz[$j]['0']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio<?php echo $i;?>"  name="radio<?php echo $i;?>" id="q1radio<?php echo $i;?>" value="<?php echo htmlentities($quiz[$j]['1']); ?>" onchange="quizcheckkfun();">
											 <label for="radio2"><?php echo htmlentities($quiz[$j]['1']); ?></label>
									 </div>
							<div class="radio">
										 <input type="radio" class="q1radio<?php echo $i;?>" name="radio<?php echo $i;?>" id="q1radio<?php echo $i;?>" value="<?php echo htmlentities($quiz[$j]['2']); ?>" onchange="quizcheckkfun();">
											 <label for="radio1"><?php echo htmlentities($quiz[$j]['2']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio<?php echo $i;?>"  name="radio<?php echo $i;?>" id="q1radio<?php echo $i;?>" value="<?php echo htmlentities($quiz[$j]['3']); ?>" onchange="quizcheckkfun();">
											 <label for="radio2"><?php echo htmlentities($quiz[$j]['3']); ?></label>
									 </div>
						<?php $j=$j+2;
						$i++;
						endfor; ?>
							</div>
							<div class="col-md-6 col-xs-12">		
						<?php 
						//print_r($quiz);
						$k=4;
						for($m=1;$m<count($quiz);):  ?>
						
							<input type="hidden" class="radiocls" id="quizquesId<?php echo $k;?>" value="<?php echo $quiz[$m]['QUESTION_NO']; ?>" />
							 <p id="quizQuesNameId<?php echo $k;?>"><?php echo $k.". ".htmlentities($quiz[$m]['QUESTION_NAME']); ?></p>
							<div class="radio">
										 <input type="radio" class="q1radio<?php echo $k;?>" name="radio<?php echo $k;?>" id="q1radio<?php echo $k;?>" value="<?php echo htmlentities($quiz[$m]['0']); ?>" onchange="quizcheckkfun();">
											 <label for="radio1"><?php echo htmlentities($quiz[$m]['0']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio<?php echo $k;?>"  name="radio<?php echo $k;?>" id="q1radio<?php echo $k;?>" value="<?php echo htmlentities($quiz[$m]['1']); ?>" onchange="quizcheckkfun();">
											 <label for="radio2"><?php echo htmlentities($quiz[$m]['1']); ?></label>
									 </div>
							<div class="radio">
										 <input type="radio" class="q1radio<?php echo $k;?>" name="radio<?php echo $k;?>" id="q1radio<?php echo $k;?>" value="<?php echo htmlentities($quiz[$m]['2']); ?>" onchange="quizcheckkfun();">
											 <label for="radio1"><?php echo htmlentities($quiz[$m]['2']); ?></label>
									 </div>
									 <div class="radio">
										 <input type="radio" class="q1radio<?php echo $k;?>"  name="radio<?php echo $k;?>" id="q1radio<?php echo $k;?>" value="<?php echo htmlentities($quiz[$m]['3']); ?>" onchange="quizcheckkfun();">
											 <label for="radio2"><?php echo htmlentities($quiz[$m]['3']); ?></label>
									 </div>
						<?php $k++;
						$m=$m+2;
						endfor; ?>
							</div>-->
						</div>
						<div class="col-md-6 col-md-offset-6 quesHideclas">
						<center>
						<button type="button" class="btn btn-default btn-rounded" id="t3ResulltBtnId" style="background-color:#ECECEC;" disabled onclick="quizsubmitfun();"><b>See Results</b></button></center>
						</div>
						
				</form>
					</div>
					<!-- Congratulations Starts here -->
			<div class="row" style="margin-top:50px;" id="divcongId">
			<div id="survey_message"></div>
				<form id="tab4formId" name="tab4formName">
				<div class="col-md-6" style="padding-top:20px;">
				<div class="col-md-11 col-md-offset-1">
				<?php 
				$j=1;
				foreach($survey as $survey): 
				?>
				<input type="hidden" class="surveycls" id="surveyquesId<?php echo $j;?>" value="<?php echo $survey['ID']; ?>" />
					<p id="surveyquesNameId<?php echo $j;?>" ><?php echo htmlentities($survey['SURVEY_QUESTION']);  ?></p>
					<p class="lh">Disagree <span class="pull-right" style="padding-right:50px;">Agree</span>
						<div class="form-group">
							<div class="radio radio-inline col-md-2 col-xs-1">
								<input type="radio" id="radioInlineId<?php echo $j;
								?>" value="1" onclick="radioclkfun()" name="radioInlineNam<?php echo $j;
								?>">
								<label for="inlineRadio11"></label>
							</div>
							<div class="radio radio-inline col-md-2 col-xs-1">
                                 <input type="radio" id="radioInlineId<?php echo $j;?>" value="2" onclick="radioclkfun()" name="radioInlineNam<?php echo $j;
								?>">
                                 <label for="inlineRadio22"></label>
                                     </div>
                                     <div class="radio radio-inline col-md-2 col-xs-1">
                                     <input type="radio" id="radioInlineId<?php echo $j;?>" value="3" onclick="radioclkfun()" name="radioInlineNam<?php echo $j;
								?>">
                                         <label for="inlineRadio23"></label>
                                     </div>
                                     <div class="radio radio-inline col-md-2 col-xs-1">
                                        <input type="radio" id="radioInlineId<?php echo $j;?>" value="4" onclick="radioclkfun()" name="radioInlineNam<?php echo $j;
								?>">
                                         <label for="inlineRadio24"></label>
                                     </div>
							<div class="radio radio-inline col-md-2 col-xs-1">
								<input type="radio" value="5" id="radioInlineId<?php echo $j;
								?>"  onclick="radioclkfun()" name="radioInlineNam<?php echo $j;?>">
								<label for="inlineRadio13"></label>
						   </div>
						</div>
						</p>
						</br></br>
				<?php
					$j++;
					endforeach;
						
					?>			
						</div>
						</div>
						<div class="col-md-6" style="border-left: 2px solid #D4D4D4;">
						<div class="col-md-11 col-md-offset-1 text-center">
						<h2>Congratulations</h2>
						<span class="text-left"><div id="congratulation_content"><?php echo $congratulation_content; ?></div></span>
						<p style="padding:50px 0;font-size:50px;font-weight:700;" id="user_score"><?php echo $usercoursedata['PERCENT_SCORED']; ?>%</p>
							<button type="button" class="btn btn-default btn-rounded" style="background-color:#ECECEC;" disabled id="btnSurveyFinishId" onclick="surveysubmitfun();"><b>Finish Course</b></button>
						</div>									
						</div>									
					</form>
            </div><!-- row -->
                    </div><!-- panel-body -->
				</div><!-- tab-10 -->	
			</div><!-- Tab Content -->
        </div><!-- Tab Container -->				
	</div><!-- col-md-8 -->				
			</div><!-- col-md-12 -->			
		</div><!-- row -->			
	</div><!-- Empty Div -->	
</div><!-- Wrapper Content -->

<?php }  else { ?>
	<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>
<?php } ?>

<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content animated bounceInRight">
			<div class="modal-body">
			 <center>
			 <div class="row" style="padding-bottom:15px;">
			 <div class="col-md-12">
			 <i class="fa fa-mobile modal-icon" style="border: 2px dashed #D4D4D4;border-radius:50px;padding-left:20px;padding-right:20px;"></i> 
			</div>					 
			</div>					 
				<div class="row text-center">
				<div class="form-group col-md-3 col-md-offset-4" style="border:1px #ddd !important;background-color:#CCCCCC;">
					<input type="text" maxlength="6" id="sms_code_id"  class="form-control popuptext num-font" onkeypress="return numbersonlyEntry(event);" onblur="validateMandatory('sms_code_id','sms_code_errid');" style="border-bottom: none !important;">
				</div>
				<div class="col-md-2">
				<button type="button" class="col-md-12 btn btn-default btn-rounded btn-xs" style="padding-left:5px;margin-top:5px;" id="btnSendSmsId" onclick="showcourse();">Continue</button>
				</div>
				</div>
				<span style="color:red; text-align:left !important;" id="sms_code_errid"></span>
				<div class="row text-center">
				<div class="col-md-5 col-md-offset-3">
					<p style="font-size:18px;" class="emailmsg" >Enter the code</p>
					
					<p class="resend_cls">Did not get the code please <a onclick="sendresendfun(<?php echo $usercourseid;?>);">Resend Again</a>
					</p>	 
					
					<p class="sms_content">You have <span style="background-color:red;color:#FFF;" id="sms_time" class="num-font"><?php echo $this->lang->line('sms_time') ?></span> seconds left</p> 
				</div>
				</div></center>
			</div>
		</div>
	</div>
</div>

<div class="modal inmodal interrupt_model" id="interrupt_model" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content animated bounceInRight">
			<div class="modal-body">
			 <center>
			 <div class="col-md-12">
			 <h2> Are You Still Watching? </h2>
			</div>	
			
<div id="captchaId" class="col-md-12">
<?php echo validation_errors(); ?>
<p id="captcha_ques"><?php echo $math_captcha_question;?></p>
</div>
			
				<div class="row text-center">
				<div class="form-group col-md-3 col-md-offset-4" style="border:1px #ddd !important;background-color:#CCCCCC;">
					<input type="text" id="math_quest_id"  class="form-control popuptext num-font" onkeypress="return numbersonlyEntry(event);" onblur="validateMandatory('math_quest_id','err_math_quest_id');" style="border-bottom: none !important;">
				</div>
				<div class="col-md-2">
				<button type="button" class="col-md-12 btn btn-default btn-rounded btn-xs" style="padding-left:5px;margin-top:5px;" id="btnSendSmsId" onclick="continue_course();">Continue</button>
				</div>		
				</div>
				<span style="color:red; text-align:left !important;" id="err_math_quest_id"></span>
				<div class="row text-center">
				<div class="col-md-5 col-md-offset-3">
					
					<p class="reload_math_question"><a onclick="reload_math_question(1);">Reload Again</a>
					</p>	 
					
					<p class="math_quest_count">You have <span style="background-color:red;color:#FFF;" id="math_quest_count" class="num-font"><?php echo $this->lang->line('video_interrupt_math_quest') ?></span> seconds left</p> 
				</div>
				</div></center>
			</div>
		</div>
	</div>
</div>

<script>

var ques_answer_array = [];	
var js_drd_quiz_count = <?php  echo $quizcount; ?>;
var js_drd_user_course_id = <?php  echo $usercourseid; ?>;
var js_drd_sms_confirmation = "<?php  echo $smsconfirmtion; ?>";
var js_drd_resumeposition = <?php  echo $resumeposition; ?>;
var js_drd_timeon_page = '<?php  echo $timeonpage; ?>';
var js_drd_quiz_status = "<?php  echo $quizstatus; ?>";
var js_drd_course_status = "<?php  echo $coursestatus; ?>";
var js_drd_sms_code = "<?php  echo $smscode; ?>";
var js_drd_credit_status = "<?php  echo $creditstatus; ?>";
var js_drd_user_complete_percent = $('#user_complete_percent_id').val();

var str_timeon_page  = "<?php  echo strtotime($timeonpage); ?>";
var str_course_length  = "<?php  echo strtotime($coursedata['COURSE_LENGTH']); ?>";

var time = <?php echo $required_time;?>;
var page_on_time = <?php echo $time_onpage;?>;

console.log("time "+time);
console.log("page_on_time "+page_on_time);
var remain_time = time - page_on_time;
console.log("remain_time "+remain_time);
// var time =300000, // Set the Timer 
var start = Date.now();
var hrs = document.getElementById('hours');
var mins = document.getElementById('minutes');
var secs = document.getElementById('seconds');
var timer;
 
var hoursLabel = document.getElementById("Thours");
var minutesLabel = document.getElementById("Tminutes");
var secondsLabel = document.getElementById("Tseconds");
var totalSeconds = page_on_time;

var iframe = document.querySelector('iframe');
var player = new Vimeo.Player(iframe); 
var time_interupt_percent = <?php echo $this->lang->line('video_track_time') ?>; //3 minutes popup count check;

//var time_remain= time-120;

//console.log("time_remain "+time_remain);
var js_drd_video_count = parseInt(time/time_interupt_percent);
console.log("Video Intreupt Count "+js_drd_video_count);
var js_drd_video_run_percent = Math.round(98/js_drd_video_count);
console.log("Video js_drd_video_run_percent %  "+js_drd_video_run_percent);

var time_interupt_popup = <?php echo $this->lang->line('video_interrupt_popup') ?>;	
var time_interupt_update;	
var js_drd_timeset;	
 
if(js_drd_resumeposition == '0.00')
{
	time_interupt_update = time_interupt_percent;
	js_drd_timeset = time_interupt_popup;
}
else
{
	time_interupt_update = parseInt(js_drd_resumeposition) + time_interupt_percent;
	js_drd_timeset = parseInt(js_drd_resumeposition) + time_interupt_popup;	
}

var curtime = js_drd_resumeposition;

function countdown() 
{
	//console.log('remain_time'+remain_time);
	var timeleft = Math.max(0, remain_time - (Date.now() - start) / 1000),
    h = Math.floor(timeleft / 3600),
    m = Math.floor((timeleft - (h *3600 ))/60),
    s = Math.floor((timeleft - (h *3600 ) - (m*60)));
  
	hrs.firstChild.nodeValue = ('0' + h).slice(-2);
	mins.firstChild.nodeValue = ('0' + m).slice(-2);
	secs.firstChild.nodeValue = ('0' + s).slice(-2);
	//console.log("timeleft"+timeleft);
	if( timeleft < 600) {
		blink('.blink');
		$('.warning-color').css({ 'color': 'red'});
		//$('.warning-color').css('color','#f8f8f8');
	}
	//console.log("timeleft "+timeleft);
	if( timeleft == 0) {
		$('#time_remain_id').hide();
		$('#time_on_id').show();
	}
  
	if( timeleft == 0) clearInterval(timer);
}

function blink(selector){
$(selector).fadeOut('slow', function(){
    $(this).fadeIn('slow', function(){
        blink(this);
    });
});
}

function countsmsdown() {
	
  var presentTime = document.getElementById('sms_time').innerHTML;
  var m=presentTime-1;
  document.getElementById('sms_time').innerHTML = m;
  if(m==0)
  {
	 $('.resend_cls').show();
	 $('.sms_content').hide(); 
  }
  //console.log("m"+m);
  setTimeout(countsmsdown, 1000);
}

function setTime() {
  ++totalSeconds;
   var hour = Math.floor(totalSeconds /3600);
   var minute = Math.floor((totalSeconds - hour*3600)/60);
   var seconds = Math.floor((totalSeconds - (hour*3600)- (minute*60)));
  hoursLabel.innerHTML = ('0' + hour).slice(-2);
  secondsLabel.innerHTML = ('0' + seconds).slice(-2);
  minutesLabel.innerHTML = ('0' + minute).slice(-2);
}

$(document).ready(function(){	
$('.resend_cls').hide();
$(".quesHide").hide();
$(".quesHideclas").hide();
$("#divcongId").hide();
if(js_drd_course_status == 'COMPLETED')
{
	window.location.href = "<?php echo site_url(); ?>" + "/userdashboard";
}
else if((js_drd_credit_status ==  'Y') && (js_drd_sms_confirmation == 'N'))
{
	$('#time_remain_id').show();
	$('#time_on_id').hide();
	countdown();
	$(".quesHide").show();
	$(".quesHideclas").hide();
	$.fn.modal.prototype.constructor.Constructor.DEFAULTS.backdrop = 'static';
	$.fn.modal.prototype.constructor.Constructor.DEFAULTS.keyboard =  false;
	$('#myModal').modal('toggle');
	countsmsdown();
}
else
{
	if(str_timeon_page == 0)
	{
		$('#time_remain_id').show();
		videoPlayProcess();
		$(".quesHide").show();
		$(".quesHideclas").hide();
		$('#time_on_id').hide();
		timer = setInterval(countdown, 200);
		setInterval(setTime, 1000);
	}
	else 
	{
		if(js_drd_user_complete_percent >= 99)
		{
			if(((js_drd_quiz_count >= 5) && (js_drd_quiz_status == 'FAIL'))|| (js_drd_quiz_status == 'PASS'))
			{
				$("#divcongId").show();
			}
			else
			{
				$(".quesHide").show();
				$(".quesHideclas").show();
			}
		}
		else
		{
			videoPlayProcess();
			$(".quesHide").show();
			$(".quesHideclas").hide();
		}
		
		if(page_on_time >= time)
		{
			$('#time_remain_id').hide();
			$('#time_on_id').show();
			setInterval(setTime, 1000);
		
		}
		else
		{
			$('#time_remain_id').show();
			$('#time_on_id').hide();
			timer = setInterval(countdown, 200);
			setInterval(setTime, 1000);
		
		}
	}
}

});

/* Vimeo Video Running Process Functionality */
function videoPlayProcess(){

	player.ready().then(function() {
	player.setVolume(0.5);
	player.setCurrentTime(curtime);
	player.play();
	console.log("time_interupt_update : "+time_interupt_update );
	player.on('timeupdate', function(data) {
			/*  console.log("curtime : "+curtime );
			console.log("curtime : "+curtime );
			console.log("Seconds : "+data.seconds );
			//console.log("Seconds Inc: "+((parseFloat(data.seconds) + parseFloat(1)).toFixed(2)));
			console.log("curtime Inc: "+ (parseFloat(curtime) + parseFloat(1)) ); */ 
			 if((data.seconds < ((parseFloat(curtime) + parseFloat(1)))) && (data.seconds >=curtime)) {
				 
				if(data.seconds  >= js_drd_timeset)
				{
					player.pause();
					OLPopupFunction();
					js_drd_timeset = js_drd_timeset + time_interupt_popup;
					curtime = data.seconds;
					if( window.innerHeight == screen.height) {
						exitFullscreen();
						//console.log("Window is fullscreen");
					}
				}
				if(data.seconds >= time_interupt_update)
				{
					player.pause();
					update_current_curr_status('RUNNING',data.seconds);
					curtime = data.seconds;
					time_interupt_update = time_interupt_update + time_interupt_percent;
					
				}
				curtime = data.seconds;
			 }else
			 {
				// curtime = data.seconds;
				 console.log("Curr Zero");
			 }
			/*  https://stackoverflow.com/questions/42895603/disable-seek-on-vimeo-player
	https://github.com/vimeo/player.js/issues/61
	https://github.com/vimeo/player.js/issues/61 */
		/* if(js_drd_user_complete_percent != 99){
			console.log("Seconds : "+data.seconds );
			if(data.seconds >= time_interupt_update)
			{
				player.pause();
				update_current_curr_status('RUNNING',data.seconds);
				time_interupt_update = time_interupt_update + time_interupt_percent;
				
			}
			else if(data.seconds >= js_drd_timeset)
			{
				player.pause();
				OLPopupFunction();
				js_drd_timeset = js_drd_timeset + time_interupt_popup;
				if( window.innerHeight == screen.height) {
					exitFullscreen();
					//console.log("Window is fullscreen");
				}
			}
			else
			{
				curtime = data.seconds;
			}
		}
		else
		{
			curtime = data.seconds;
		}		
		
	});	 */
	}); 
	}); 
  }
  
  //Vimeo Video Seeked disabled for Student,Guest Functionality
	player.on('seeked', function(data) {
    if((data.seconds > curtime) && (js_drd_user_complete_percent != 99)) {
        player.setCurrentTime(curtime);
    }
	}); 
	
	//Vimeo Video Ended Functionality
	player.on('ended', function() {
		//console.log('Video Stopped');
		if(js_drd_user_complete_percent != 99){
			player.pause();
			update_current_curr_status('FINISHED',curtime);
		}
	});
	
function update_current_curr_status(videoStatus,currRunDuration) {
	btn_loading_fun();
	var time_on_page =  hoursLabel.innerHTML+":"+minutesLabel.innerHTML+":"+secondsLabel.innerHTML;
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>" + "/update-user-course", 
		data: {
			'ajx_drd_UserCourseId':$('#userCourseId').val(),
			'ajx_drd_UserCoursePercentage':$('#user_complete_percent_id').val(),
			'ajx_drd_CurrentCurrDuration':currRunDuration,
			'ajx_drd_VideoStatus': videoStatus,
			'ajx_drd_AddPercentage': js_drd_video_run_percent,
			'ajx_drd_TotalTimeOnPage': time_on_page,
		},
		dataType: "json",  
		cache:false,
		success: function(js_drd_returnMessage) {
			btn_loading_dismissfun();
			if(js_drd_returnMessage['message'] == "") {
			console.log("Running Curriculum Status "+videoStatus);
				js_drd_user_complete_percent = js_drd_returnMessage['COMPLETE_PERCENTAGE'];
				$('#user_complete_percent_id').val(js_drd_returnMessage['COMPLETE_PERCENTAGE']);
				$('.user_complete_percent_cls').text(js_drd_returnMessage['COMPLETE_PERCENTAGE']+'%');
				$('.progress-bar').css('width',js_drd_returnMessage['COMPLETE_PERCENTAGE']+'%');
				if(videoStatus == "FINISHED") {
					$(".quesHideclas").show();
				}
				else
				{
					videoPlayProcess();
				}

			} else {
				console.log("ConsoleResult "+js_drd_returnMessage['message']);
				document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a>"+js_drd_returnMessage['message']+"</div>";
			} 
		},
		error: function() {
			btn_loading_dismissfun();
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}   
	});

}
var refresh_count=0;
function OLPopupFunction() {
	$.fn.modal.prototype.constructor.Constructor.DEFAULTS.backdrop = 'static';
	$.fn.modal.prototype.constructor.Constructor.DEFAULTS.keyboard =  false;
	$('.interrupt_model').modal();
	$('.reload_math_question').hide();
	count_math_question();
}
	
function continue_course()
{
	var math_ans = $('#math_quest_id').val();
	if(math_ans != '')
	{
		$('#err_math_quest_id').text('');
		 $.ajax({
				type: "POST",
				url: "<?php echo site_url(); ?>"+ "/captcha-validate",			
				data:{
					'ajx_drd_user_captcha':math_ans
				  },
				success: function(ajx_drd_ReturnResult) {
						var js_drd_ReturnMsg = $.parseJSON(ajx_drd_ReturnResult);
						console.log("Return Quiz Submit Value "+js_drd_ReturnMsg['message']);
						if(js_drd_ReturnMsg['message'] =="")
						{
							console.log("timeset Iframe" +js_drd_timeset);
							$("#interrupt_model").load(" #interrupt_model");
							clearInterval(math_count);
							videoPlayProcess();
						}
						else
						{
							$("#captchaId").load(" #captchaId");
							$('#err_math_quest_id').text(js_drd_ReturnMsg['message']);
						}
					},
					error: function() {	
						clearInterval(math_count);
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
					}
				});
	}
	else
	{
		$('#err_math_quest_id').text(errMsg["80547"]);
	}
}

var math_count;
function count_math_question() {
	
  var presentTime = document.getElementById('math_quest_count').innerHTML;
  math_count =presentTime-1;
  document.getElementById('math_quest_count').innerHTML = math_count;
  
  if((math_count==0) && (refresh_count!=0))
  {
	 window.location.href = "<?php echo site_url(); ?>" + "/userdashboard";
  }
  else if(math_count==0)
  {
	 $('.reload_math_question').show();
  }
  else
  {
	  setTimeout(count_math_question, 1000);
  }
  //console.log("m"+m);
  
}

function reload_math_question(count) {
	refresh_count=count;
	$('.reload_math_question').hide();
	$('#math_quest_count').text(<?php echo $this->lang->line('video_interrupt_math_quest') ?>);
	setTimeout(count_math_question, 1000);
    $("#captchaId").load(" #captchaId");
}

/* function OLPopupFunction() {
 	
	swal({
		title: js_dl_quizQuestion,
		type: "input",
		closeOnConfirm: false,
		allowEscapeKey: false,
		confirmButtonText: 'Submit',
		confirmButtonColor: '#700745',
		animation: "slide-from-top",
		inputPlaceholder: "Write something"
		}, function(inputValue) {
			if (inputValue === false) return false;
			if (inputValue === "") {
					swal.showInputError(errMsg['80547']);
					return false;
			}
			else
			{
				$("#captchaId").load(location.href + " #captchaId");
				videoPlayProcess();
				swal.close();
				/* $.ajax({
				type: "POST",
				url: "<?php echo site_url(); ?>"+ "/captcha-validate",			
				data:{
					'ajx_drd_user_captcha':inputValue
				  },
				success: function(ajx_drd_ReturnResult) {
						var js_drd_ReturnMsg = $.parseJSON(ajx_drd_ReturnResult);
						console.log("Return Quiz Submit Value "+js_drd_ReturnMsg['message']);
						if(js_drd_ReturnMsg['message'] =="")
						{
							console.log("timeset Iframe" +js_drd_timeset);
							videoPlayProcess();
							swal.close();
						}
						else
						{
							swal.showInputError(js_drd_ReturnMsg['message']);
							return false;
						}
					},
					error: function() {	
						document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
					}
				});
								
			}
	});  
}*/

function quizcheckkfun()
{
	var radio_id = document.getElementsByClassName("radiocls"); 
	console.log(radio_id.length);
			
		var ques_answer1 =  $(":input[name=radio1]:checked").val(); 
		var ques_answer2 =  $(":input[name=radio2]:checked").val(); 
		var ques_answer3 =  $(":input[name=radio3]:checked").val(); 
		var ques_answer4 =  $(":input[name=radio4]:checked").val(); 
		var ques_answer5 =  $(":input[name=radio5]:checked").val(); 
		if((ques_answer1 && ques_answer2 && ques_answer3 && ques_answer4 && ques_answer5))
		{
			for (var i = 1; i <= radio_id.length; i++)
			{
				console.log(ques_answer_array.length);
				if(ques_answer_array.length ==5)
				{
					ques_answer_array=[];
					ques_answer_array.push({
						Question_No:document.getElementById('quizquesId'+i).value,
						Question_Name:document.getElementById('quizQuesNameId'+i).innerHTML,
						Answer:$(":input[name=radio"+i+"]:checked").val()
					}); 
				}
				else
				{
					ques_answer_array.push({
						Question_No:document.getElementById('quizquesId'+i).value,
						Question_Name:document.getElementById('quizQuesNameId'+i).innerHTML,
						Answer:$(":input[name=radio"+i+"]:checked").val()
					}); 	
				}			
			}
			$("#t3ResulltBtnId").prop("disabled", false);			
			console.log("Question Array "+ques_answer_array); 
		}	
		else
		{
			ques_answer_array=[];
			$("#t3ResulltBtnId").prop("disabled", true);	
		}
}

survey_answer_array = [];

function radioclkfun()
{
	var surveyradio_id = document.getElementsByClassName("surveycls"); 
	console.log(surveyradio_id.length);
	survey_answer_array=[];
	for (var j = 1; j <= surveyradio_id.length; j++)
	{				 
		var survey_ques =  $(":input[name=radioInlineNam"+j+"]:checked").val();
		
		if(survey_ques)
		{	
			survey_answer_array.push({
			Survey_No:document.getElementById('surveyquesId'+j).value,
			Survey_Name:document.getElementById('surveyquesNameId'+j).innerHTML,
			Answer:$(":input[name=radioInlineNam"+j+"]:checked").val()
		}); 
		}
		else
		{
			survey_answer_array=[];
			$("#btnSurveyFinishId").prop("disabled", true);
		}					
	}
	if(survey_answer_array.length == surveyradio_id.length)
	{
		$("#btnSurveyFinishId").prop("disabled", false);		
	}
	else
	{
		survey_answer_array=[];
		$("#btnSurveyFinishId").prop("disabled", true);
	}	
	console.log("Survey Array "+survey_answer_array);
	console.log(survey_answer_array.length);
}

function quizsubmitfun()
{	
$("#t3ResulltBtnId").prop("disabled", true);
$("#t3ResulltBtnId").css("cursor", "wait");
var time_on_page =  hoursLabel.innerHTML+":"+minutesLabel.innerHTML+":"+secondsLabel.innerHTML;
var quiz_data= ques_answer_array;
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/insertquiz",			
		data:{
		    'ajx_drd_quiz_data':quiz_data,
		    'ajx_drd_user_course_id':$('#userCourseId').val(),
		    'ajx_drd_course_id':$('#courseId').val(),
			//'ajx_drd_TotalTimeOnPage': time_on_page,
		  },
		success: function(ajx_drd_ReturnResult) {
					
			$('html, body').animate({
				  scrollTop: $("div.quesHide").offset().top
				}, 1000);
				
			$("#t3ResulltBtnId").prop("disabled", false);
			$("#t3ResulltBtnId").css("cursor", "pointer");
				var js_drd_ReturnMsg = $.parseJSON(ajx_drd_ReturnResult);
				
				console.log("Return Quiz Submit Value "+JSON.stringify(js_drd_ReturnMsg));
				if(js_drd_ReturnMsg['message_type'] ==  "SUCCESS"){
					
					if(js_drd_ReturnMsg['quiz_status'] == 'PASS')
					{
						document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnMsg['message']+"</div>";
						
						setTimeout(function(){ 
						$(".quesHide").hide();
						$(".quesHideclas").hide();
						$("#divcongId").show();//$("#congratulation_content").text(js_drd_ReturnMsg['thank_you']);
						$("#user_score").text(js_drd_ReturnMsg['score']+"%");
						
						}, 2000);
					}
					else
					{
						if(js_drd_ReturnMsg['quiz_count'] >= 5)
						{
							document.getElementById('message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnMsg['message']+"</div>";
							setTimeout(function(){ 
							$(".quesHide").hide();
							$(".quesHideclas").hide();
							$("#divcongId").show();	//$("#congratulation_content").text(js_drd_ReturnMsg['thank_you']);
							$("#user_score").text(js_drd_ReturnMsg['score']+"%");
							}, 2000);
						}
						else
						{
							document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a><?php echo $this->lang->line('m_90821') ?></div>";
							//alert("Your Quiz Status Fail.Please Retest your quiz");
							setTimeout(function(){ 
							$("#quesHideId").load(" #quesHideId");
							}, 2000);
							//setTimeout(function(){ window.location.href = window.location.href; }, 1000);
							$(".quesHide").show();
							$("#divcongId").hide();	
						}
					}
										
				}else {
					document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnMsg['message']+"</div>";
					/* if(js_drd_ReturnMsg['quiz_count'] > 5)
					{
						$(".quesHide").hide();
						$("#divcongId").show();	
						$("#congratulation_content").text(js_drd_ReturnMsg['thank_you']);
						$("#user_score").text(js_drd_ReturnMsg['score']+"%");
					}
					else
					{
						//alert("Your Quiz Status Fail.Please Retest your quiz");
						setTimeout(function(){ window.location.href = window.location.href; }, 1000);
						$(".quesHide").show();
						$("#divcongId").hide();	
					} */

				}				
			},
			error: function() {	
			$('html, body').animate({
				  scrollTop: $("div.quesHide").offset().top
			}, 1000);			
			$("#t3ResulltBtnId").prop("disabled", false);
			$("#t3ResulltBtnId").css("cursor", "pointer");
			document.getElementById('message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
			//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
		}
		});	
}
	
function surveysubmitfun()
{	
$("#btnSurveyFinishId").prop("disabled", true);
$("#btnSurveyFinishId").css("cursor", "wait");
var time_on_page =  hoursLabel.innerHTML+":"+minutesLabel.innerHTML+":"+secondsLabel.innerHTML;
var quiz_data= ques_answer_array;
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/insertsurvey",			
		data:{
		    'ajx_drd_survey_data':survey_answer_array,
		    'ajx_drd_user_course_id':$('#userCourseId').val(),
		    'ajx_drd_credit_status':js_drd_credit_status,
		    'ajx_drd_course_id':'<?php echo $courseid; ?>',
			//'ajx_drd_TotalTimeOnPage': time_on_page,
		  },
		success: function(ajx_drd_ReturnResult) {			
			$("#btnSurveyFinishId").prop("disabled", false);
			$("#btnSurveyFinishId").css("cursor", "pointer");
				var js_drd_ReturnMsg = $.parseJSON(ajx_drd_ReturnResult);
				
				console.log("Return Quiz Submit Value "+JSON.stringify(js_drd_ReturnMsg));
				if(js_drd_ReturnMsg['message_type'] ==  "SUCCESS")
				{
					document.getElementById('survey_message').innerHTML = "<div class='alert alert-success fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnMsg['message']+"</div>";
					setTimeout(function(){//alert(js_drd_ReturnMsg['message']);
					window.location.href = "<?php echo site_url(); ?>" + "/userdashboard";
					}, 1000);					
				}
				else 
				{
					document.getElementById('survey_message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>"+js_drd_ReturnMsg['message']+"</div>";
				}	
			},
			error: function() {						
				$("#btnSurveyFinishId").prop("disabled", false);
				$("#btnSurveyFinishId").css("cursor", "pointer");
				document.getElementById('survey_message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
				//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
		}
		});	
}	


function sendresendfun(usercourse_id)
{
	$("#btnSendSmsId").prop("disabled", true);
	$("#btnSendSmsId").css("cursor", "wait");
	$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/resendsms",			
		data:{
		    'ajx_drd_user_course_id':usercourse_id
		  },
		success: function(ajx_drd_ReturnResult) {	
		
				var js_drd_ReturnMsg = $.parseJSON(ajx_drd_ReturnResult);
				
				console.log("Return Quiz Submit Value "+JSON.stringify(js_drd_ReturnMsg));
				if(js_drd_ReturnMsg['message_type'] ==  "SUCCESS")
				{	
					$("p").remove('.resend_cls');
					$('.resend_cls').hide();					
					$('.emailmsg').text(errMsg["80609"]);	
				}
				else 
				{
					$('.resend_cls').show();
				}	
				$("#btnSendSmsId").prop("disabled", false);
				$("#btnSendSmsId").css("cursor", "pointer");
			},
			error: function() {	
				$("#btnSendSmsId").prop("disabled", false);
				$("#btnSendSmsId").css("cursor", "pointer");			
				$('.resend_cls').show();
				//window.location.href = "<?php echo site_url(); ?>" + "/404_override";
		}
		});	
}	


function showcourse()
{
	var sms_code = $('#sms_code_id').val();
	if(sms_code != '')
	{
		$('#sms_code_errid').text('');
		$.ajax({
		type: "POST",
		url: "<?php echo site_url(); ?>"+ "/updateconfirmationcode",			
		data:{
		    'ajx_drd_user_course_id':js_drd_user_course_id,
		    'ajx_drd_sms_code':sms_code
		  },
		success: function(ajx_drd_ReturnResult) {	
				var js_drd_ReturnMsg = $.parseJSON(ajx_drd_ReturnResult);
				
				console.log("Return Message "+JSON.stringify(js_drd_ReturnMsg));
				if(js_drd_ReturnMsg['message_type'] ==  "SUCCESS")
				{
					$('#myModal').modal({
						show: 'false'
					});
					window.location.href=window.location.href;					
				}
				else 
				{
					$('#sms_code_errid').text(js_drd_ReturnMsg['message']);
					console.log("Error Message "+js_drd_ReturnMsg['message']);
				}	
			},
			error: function() {						
				console.log('<?php echo $this->lang->line('m_90524'); ?>');
				$('#sms_code_errid').text('<?php echo $this->lang->line('m_90524') ?>');
				//document.getElementById('survey_message').innerHTML = "<div class='alert alert-danger fade in'><a class='close' data-dismiss='alert'>&times;</a>'<?php echo $this->lang->line('m_90524') ?>'</div>";
		}
		});	
		 
	}
	else
	{
		$('#sms_code_errid').text(errMsg["80547"]);
		//$('#myModal').modal('show');	
	}
}

</script>