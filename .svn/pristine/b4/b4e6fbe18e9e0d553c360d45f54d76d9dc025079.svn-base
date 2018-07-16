<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Welcome_controller';
$route['404_override'] = 'errors/error_custom';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Login_controller/login';
$route['loginuser'] = 'Login_controller/login_user';
$route['logout'] = 'Login_controller/logout';

$route['signup'] = 'Signup_controller/signup';
$route['email-exists'] = 'Signup_controller/email_exists';
$route['addsignupdata'] = 'Signup_controller/add_signup_data';

$route['forgotpassword'] = 'Forgot_password_controller/forgot_password';
$route['userchecks'] = 'Forgot_password_controller/user_email_checks';
$route['forgotpassworduser'] = 'Forgot_password_controller/get_forgot_password';
$route['resetpassword/(:any)/(:any)/(:any)'] = 'Reset_password_controller/reset_password/$1/$2/$3';
$route['updatepassword'] = 'Reset_password_controller/update_password';
$route['changepassword'] = 'Change_password_controller/check_changePassword';

$route['forgotemail'] = 'Forgot_email_controller/forgot_email';
$route['forgotemailuser'] = 'Forgot_email_controller/get_forgot_email';

$route['userdashboard'] = 'User_dashboard_controller/view_dashboard';
$route['notification-del'] = 'User_dashboard_controller/delete_notification';
$route['user-adupdate'] = 'User_dashboard_controller/update_ad_count';

$route['editprofile/(:num)'] = 'Edit_profile_controller/edit_profile/$1';
$route['editprofile'] = 'Edit_profile_controller/edit_profile';

$route['editstudentprofile'] = 'Edit_profile_controller/edit_student_data';
$route['usercoursetransaction'] = 'Edit_profile_controller/view_transaction_details';
$route['usercoursequizdetails'] = 'Edit_profile_controller/view_quiz_details';
$route['usercoursesurveydetails'] = 'Edit_profile_controller/view_survey_details';
$route['usertranscations'] = 'Transcations_controller/view_transcations';

$route['salespage/(:num)'] = 'Sales_page_controller/view_sale_page/$1';
$route['getpromotion/(:any)'] = 'Sales_page_controller/get_promotion_amount/$1';
$route['payment'] = 'Sales_page_controller/do_user_payment';

$route['insertpayment'] = 'Sales_page_controller/insert_user_course_payment';
$route['getstateguidelines'] = 'Sales_page_controller/get_state_guidelines';
$route['getdnstateguidelines'] = 'Diplomate_controller/get_dn_state_guidelines';

$route['usercourse/(:num)'] = 'Usercourse_video_controller/user_course/$1';
$route['captcha-validate'] = 'Usercourse_video_controller/check_math_captcha';
$route['update-user-course'] = 'Usercourse_video_controller/update_user_course';
$route['insertquiz'] = 'Usercourse_video_controller/insert_quiz';
$route['insertsurvey'] = 'Usercourse_video_controller/insert_survey';
$route['insertdnsurvey'] = 'Diplomate_course_controller/insert_dn_survey';
$route['resendsms'] = 'Usercourse_video_controller/resend_smscode';
$route['updateconfirmationcode'] = 'Usercourse_video_controller/update_smscode';
$route['updatednconfirmationcode'] = 'Diplomate_course_controller/update_dn_smscode';

$route['diplomatedashboard'] = 'Diplomate_dashboard_controller/view_diplomate_dashboard';
$route['diplomate'] = 'Diplomate_controller/view_diplomate';
$route['diplomatepayment/(:num)/(:any)'] = 'Diplomate_payment_controller/view_diplomate_paymentPage/$1/$2';
$route['insertdippayment'] = 'Diplomate_payment_controller/insert_diplomate_payment';
$route['diplomatecourse/(:num)'] = 'Diplomate_course_controller/view_diplomate_course/$1';
$route['retakedipcourse/(:num)'] = 'Diplomate_course_controller/retake_diplomate_course/$1';
$route['insertquizdiplomate'] = 'Diplomate_course_controller/insert_quiz_diplomate';
$route['diplomatefaq'] = 'Diplomate_faq_controller/view_diplomate_faq';

$route['subscription'] = 'Subscription_controller/view_subscription';
$route['usersubscription/(:num)'] = 'Subscription_controller/upt_user_subscription/$1';

/* For Admin */
$route['admindashboard'] = 'admin/Dashboard_controller/admin_dashboard';

$route['insertcost'] = 'admin/Course_controller/insert_course_cost';
$route['courses'] = 'admin/Course_controller/courses';
$route['addcourses'] = 'admin/Course_controller/add_courses';
$route['coursenum-exists'] = 'admin/Edit_course_controller/course_num_exists';
$route['addcoursedata'] = 'admin/Course_controller/add_course_data';
$route['updatecourse-status'] = 'admin/Course_controller/update_course_status';

$route['editcourses/(:num)'] = 'admin/Edit_course_controller/edit_courses/$1';
$route['editcoursedetails'] = 'admin/Edit_course_controller/edit_course_data';

$route['promocodes'] = 'admin/Promocode_controller/promocodes';
$route['addpromocode'] = 'admin/Promocode_controller/add_promocode';
$route['addpromodetails'] = 'admin/Promocode_controller/add_promo_details';
$route['editpromocode/(:num)'] = 'admin/Promocode_controller/edit_promocode/$1';
$route['editpromodetails'] = 'admin/Promocode_controller/edit_promo_details';
$route['promocodedelete'] = 'admin/Promocode_controller/delete_promo_code_data';
$route['promocodestatusupdate'] = 'admin/Promocode_controller/update_promo_code_status';
$route['promocode-exists'] = 'admin/Promocode_controller/promocode_exists';

$route['users'] = 'admin/User_controller/users';
$route['adduser'] = 'admin/User_controller/add_user';
$route['adduserdetails'] = 'admin/User_controller/add_user_details';
$route['edituser/(:num)'] = 'admin/User_controller/edit_user/$1';
$route['edituserdetails'] = 'admin/User_controller/edit_user_details';
$route['updateuser-status'] = 'admin/User_controller/update_user_status';

$route['students'] = 'admin/Student_controller/students';
$route['addstudent'] = 'admin/Student_controller/add_student';
$route['addstudentdata'] = 'admin/Student_controller/add_student_data';
$route['editstudent'] = 'admin/Student_controller/edit_student';
$route['editstudentdata'] = 'admin/Student_controller/edit_student_data';
$route['updatestudent-status'] = 'admin/Student_controller/update_student_status';

$route['notifications'] = 'admin/Notification_controller/notifications';
$route['addnotification'] = 'admin/Notification_controller/add_notification';
$route['notificationadd'] = 'admin/Notification_controller/add_notification_data';
$route['notificationedit'] = 'admin/Notification_controller/edit_notification_data';
$route['editnotification/(:num)'] = 'admin/Notification_controller/edit_notification/$1';
$route['notificationdelete'] = 'admin/Notification_controller/delete_notification_data';

$route['advertisements'] = 'admin/Advertisement_controller/advertisements';
$route['addadvertisement'] = 'admin/Advertisement_controller/add_advertisement';
$route['addadvertisementdata'] = 'admin/Advertisement_controller/add_advertisement_data';
$route['editadvertisement/(:num)'] = 'admin/Advertisement_controller/edit_advertisement/$1';
$route['editadvertisementdata'] = 'admin/Advertisement_controller/edit_advertisement_data';
$route['advertisementdelete'] = 'admin/Advertisement_controller/delete_advertisement_data';
$route['adstatusupdate'] = 'admin/Advertisement_controller/update_ad_status';


$route['admincertificates'] = 'admin/Certificate_controller/admin_certificates';
$route['updatecertificate'] = 'admin/Certificate_controller/update_certificate';
$route['updatedownloadcertificate/(:num)'] = 'admin/Certificate_controller/update_downloadcertificate/$1';
$route['invoices'] = 'admin/Invoice_controller/invoices';

$route['stateregulations'] = 'admin/Stateregulation_controller/state_regulations';
$route['addstateregulations'] = 'admin/Stateregulation_controller/add_stateRegulation';

$route['diplomatessays'] = 'admin/Diplomate_essay_controller/diplomate_essays';
$route['updategrade'] = 'admin/Diplomate_essay_controller/updategrade';
$route['studentgrades/(:num)'] = 'admin/Diplomate_essay_controller/student_grades/$1';
$route['essaygrade/(:num)'] = 'admin/Diplomate_essay_controller/student_essay_grade/$1';
$route['generatepdf'] = 'admin/Diplomate_essay_controller/genPdf';

$route['contentmaster'] = 'admin/Content_master_controller/contentmaster';
$route['editcontentmaster/(:num)'] = 'admin/Content_master_controller/edit_contentmaster/$1';
$route['editcontentmasterdetails'] = 'admin/Content_master_controller/edit_content_details';

$route['faq'] = 'admin/Faq_controller/faq';
$route['addfaq'] = 'admin/Faq_controller/add_faq';
$route['editfaq/(:num)'] = 'admin/Faq_controller/edit_faq/$1';
$route['addfaqdetails'] = 'admin/Faq_controller/add_faq_details';
$route['editfaqdetails'] = 'admin/Faq_controller/edit_faq_details';
$route['deletefaqdetails'] = 'admin/Faq_controller/delete_faq_details';

$route['survey'] = 'admin/Survey_controller/survey';
//$route['addsurvey'] = 'admin/Survey_controller/add_survey';
$route['editsurvey/(:num)'] = 'admin/Survey_controller/edit_survey/$1';
//$route['getcourselist'] = 'admin/Survey_controller/get_course_data';
//$route['addsurveydetails'] = 'admin/Survey_controller/add_survey_details';
$route['editsurveydetails'] = 'admin/Survey_controller/edit_survey_details';
//$route['deletesurvey'] = 'admin/Survey_controller/delete_survey';