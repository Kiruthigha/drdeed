<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Constant Values
$lang['register_sub'] = 'Please Verify Your Email Address.'; 
$lang['forgot_password_sub'] = 'Please Verify Your Email Address.'; 
$lang['register'] = 'Dear <FIRST_NAME> <LAST_NAME> ,
					<br>
					<p>You have successfully registered with CBPCE online courses!  Please save the following login information for your reference.</p>
					<p> Email:  <EMAIL_ID></p>
					<p> Password:	<PASSWORD></p>
					<p> Remember, only you are allowed to utilize this website for CE courses and credits, so keep this information secure and do not share it with anyone.</p>
					 <br>
					<p>Regards,</p>
					<p>CBP CE Staff </p>';
					
$lang['forgot_password'] = 'Dear <FIRST_NAME> <LAST_NAME> ,
							<br>
							<p>You are receiving this email because a request was received by our system to help you reset your password.</p>
							<p>Please click on the link below to reset your password.  You can also copy and paste the link into your browser in case the URL below is not clickable.</p>			
							<p> <a href='  . site_url() . '/resetpassword/<ENCRYPT_EMAIL>/<USER_ID>/<ENCRYPT_DATE> >'  . site_url() . '/resetpassword/<ENCRYPT_EMAIL>/<USER_ID>/<ENCRYPT_DATE></a> </p>
							<p> If this was not initiated by you, please ignore this message.</p>
							 <br>
							<p>Regards,</p>
							<p>CBP CE Staff </p>';
$lang['forgot_email'] = 'Your Email id -  <EMAIL_ID> Please login after some time.';

$lang['ce_course_smscode'] = 'CE COURSE SMS CODE <SMS_CODE>';
$lang['ce_course_smscode_sub'] = 'Resend Code';

$lang['course_enroll_sub'] = 'Enroll Course';
$lang['course_enroll_msg'] = 'Dear <FIRST_NAME> <LAST_NAME> ,
							<br>
							<p>You have successfully enrolled in the following CE course on the CBP CE website.  You have 30 days to complete this CE before it expires.</p>
							<br>
							Course Name: <b><COURSE></b>, CE Credits: <b><CREDIT></b>, Payment Made: <b>$<AMOUNT></b></p>
							<p>Date: <DATE>.</p>
							<br>
							</p>You can find a direct link to this CE here: <a href="http://www.idealspinece.com/238u3oiu8u23iuoiuj">href="http://www.idealspinece.com/238u3oiu8u23iuoiuj</a></p>
							<br>
							</p>Should you have any questions about taking online CE courses, please refer to our FAQ page found at <a href="http://www.idealspinece.com/faq">http://www.idealspinece.com/faq</a>.  For a copy of your receipt, please visit your member dashboard.</p>
							<br>
							<p>Regards,</p>
							<p>CBP CE Staff </p>';

$lang['dn_course_complete'] = '<p> The following user has completed the following Diplomate course 
								on CBP CE website.  Additional details, as well as their essay question submission is available in the administrative panel.</p>
								<p> First Name:  <FIRST_NAME></p>
								<p> Last Name:	<LAST_NAME></p>
								<p> Diplomate Course:	<DN_COURSE></p>
								<p> Date Completed:	<COMPLETED_DATE></p>
								<p> Time Completed:	<COMPLETED_TIME></p>';
$lang['dn_course_complete_sub'] = 'DIPLOMATE COURSE';

$lang['admin_registeration_sub'] = 'Student Registration'; 
$lang['admin_registeration'] = '	<p>You have successfully registered with CBPCE online courses!  Please save 
							the following login information for your reference.</p>
							<p> First Name:  <FIRST_NAME></p>
							<p> Last Name:	<LAST_NAME></p>
							<p> Member Number:	<MOBILE_NUM></p>
							<p> Email Address:	<EMAIL_ID></p>
							<p> IP Address:	<IP_ADDRESS></p>
							<p> Address:	<ADDRESS></p>
							<p> City:	<CITY></p>
							<p> State:	<STATE></p>
							<p> Zip Code:	<ZIP_CODE></p>
							<p> Country:	<COUNTRY></p>';
?>