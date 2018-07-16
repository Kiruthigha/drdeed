<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_object extends CI_Loader
{
	/**
	 * Check User Login Details Object
	 *
	 * @access public
	 * @since unknown
	 */ 
	 
 public function check_user_details($user_email,$page=null,$mobile=null,$dob=null)
 {
	log_message('info', 'check_user_details Function Start'); 

	$CI = &get_instance();
	
	log_message('info', 'Pass  Email id and get User Information From User Model'); 
	if(!$page)
	{
		log_message('info','Object call from login');
		$get_user_data  = $CI->User->getuserdetails(array('EMAIL_ID'=>$user_email));
	}
	else if($mobile)
	{
		log_message('info','Object call from forgot Email');
		$where_array  = array(
			'DOB'=>$dob,
			'MOBILE_NUM'=>$mobile
		);
		$get_user_data  = $CI->StudentProfile->getstudentprofile($where_array);
	}
	else 
	{
		log_message('info','Object call from forgot password');
		$get_user_data  = $CI->StudentProfile->getstudentprofile(array('EMAIL_ID'=>$user_email));
	}
	
	if(!$get_user_data)
	{
		log_message('info','User is not vaild');
		$return_array  = array(
			'message'=> $CI->lang->line('m_90816'),
		);
	}
	else
	{
		if(count($get_user_data) == 1)
		{
			$get_user_data=$get_user_data[0];
			
			log_message('info','User Details '.print_r($get_user_data,TRUE));
			log_message('info','Vaild User');
			
			$login_array = ['STUDENT','ADMIN'];
			if(!$page)
			{
				$user_status =  $get_user_data['USER_STATUS_VALUE'];
				$user_type =  $get_user_data['USER_TYPE_VALUE'];
				$user_expires =  $get_user_data['USER_EXPIRES_VALUE_ID'];
				$user_create_date = $get_user_data['CREATE_DATE'];
			}
			else
			{
				$user_status =  $get_user_data['USER_STATUS_VALUE'];
				$user_type =  $get_user_data['USER_TYPE_VALUE_NAME'];
				$user_expires =  $get_user_data['USER_EXPIRES_VALUE_ID'];
				$user_create_date = $get_user_data['CREATE_DATE'];
			}
			
			if($user_status != 'ACTIVE')
			{
				log_message('info','User Status is not active');
				$return_array  = array(
					'message'=>$CI->lang->line('m_90816'),
					'data' => $get_user_data,
				);
			} 
			else
			{
				log_message('info','User Status is active');
				
				if(in_array($user_type, $login_array))	
				{
					log_message('info','Login User is Student or Admin');
					$return_array  = array(
						'message' => "",
						'data' => $get_user_data,
					);
				}
				else
				{
					log_message('info','Login User is Assistant or Addit');
					
					$now = strtotime(date('Y-m-d H:i:s')); // or your date as well
					$your_date = strtotime($user_create_date);
					$datediff =intval($now - $your_date);
					
					$calculate_date  =  round($datediff / (60 * 60 * 24)); 
					$calculate_date  =  preg_replace("/[^0-9]/", '', $calculate_date);
								
					log_message('info','Calculate Date  '.$calculate_date);
					
					if($user_expires >= $calculate_date)
					{
						log_message('info','User Expires is true');
						$return_array  = array(
							'message' => "",
							'data' => $get_user_data,
						);
					}
					else
					{
						log_message('info',"User is Expires Please contact system admin");
						$return_array  = array(
							'message' => $CI->lang->line('m_90816'),
							'data' => $get_user_data,
						);
					}					
				}
			}
		}
	}	
	log_message('info', 'check_user_details Function End');
	return $return_array;
 }
 
}
?>