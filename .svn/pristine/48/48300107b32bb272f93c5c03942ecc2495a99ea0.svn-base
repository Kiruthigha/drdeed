<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendsms extends CI_Loader
{
 
	public function __construct()
	{	            
	
	}  
  
    /**
	 * send sms for the activities
	 * when Auto_msg is set to Y.
	 * This is call from add activity and
	 * edit activity screen.
	 *
	 * @access public
	 * @since ver0.1
	 */
	function send_sms_message($messageArray,$messageTemplate)   {
        
		$curl = curl_init();
		log_message('info',"phone_number=$messageArray&message=$messageTemplate&message_type=ARN");
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://rest-api.telesign.com/v1/messaging",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "phone_number=$messageArray&message=$messageTemplate&message_type=ARN",
		  CURLOPT_HTTPHEADER => array(
			"authorization: Basic MjMxRkU2NUEtNTFDRC00MTdBLUJBMzItQjVEMTQ5QzUyMTM0OmhDU2c3S3EraThONFVYTlNYbGpHTDJ4S21JNkNkUXA0UDBobFc5VXBGL0t2VTNucktPbEFhVksrU0xBUHBGaXB1OXFNNUc3SDY3Mmg2R212VHdOUCtBPT0=",
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded"
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		log_message('info',"SMS Response Success".print_r($response,TRUE));
		curl_close($curl);

		if ($err) {
		   log_message('info',"SMS Response Fail".print_r($err,TRUE));
		  return $err;
		} else {
		 log_message('info',"SMS Response Success".print_r($response,TRUE));
		  return $response;
		}
	}
}
?>