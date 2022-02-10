<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 AUTHOR : Shivaji Dalvi 
 Date : 15.01.2020
 */
class Common
{

	function encrypt_decrypt($action, $string)
	{
		$output = false;

		$ciphering = "AES-128-CTR";
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;
		$iv = '1234567891011121';
		$key = "rca#1234";

		if ($action == 'encrypt') {
			$output = openssl_encrypt($string, $ciphering,
            $key, $options, $iv);
			//$output = base64_encode($output);
		} else if ($action == 'decrypt') {
			$encryption = openssl_encrypt($string, $ciphering,
            $key, $options, $iv);
			
			$output=openssl_decrypt ($encryption, $ciphering, 
        	$key, $options, $iv);
			//$output = @mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
			//$output = rtrim($output, "");
		}
		//echo $output;exit;
		return $output;
	}

	public function send_email($to, $cc='', $bcc='', $subject, $message)
	{
			echo $subject;exit;
			

	}

	public function calculateFiscalYearForDate($month,$op_year)
	{
		#echo date('Y-m-d', strtotime($_SESSION['operatingyear'].' +1 year'));exit;
		#echo date('Y-m-d', strtotime($op_year.' +1 year'));exit;
		#echo $next_year = $op_year + 1;exit;

		if($month == 4)
		{
		$y = $op_year; 
		//echo $y = date('Y');exit;
		//$pt = date('Y', strtotime('+1 year'));
		$pt = $op_year + 1;
		$fy_from = strtotime($y."-04-01");
		$fy_to = strtotime($pt."-03-31");
		$fy = $fy_from."|".$fy_to;
		}
		else
		{
		$month = 1;
		$y = $op_year; 
		//$y = date('Y');
		//echo $pt = date('Y', strtotime('+1 year'));exit;
		//echo $y."-01-01"."==".$y."-12-31";exit;
		$fy_from = strtotime($y."-01-01");
		$fy_to = strtotime($y."-12-31");
		$fy = $fy_from."|".$fy_to;
		}
		return $fy;		

	}	

	public function calculateFiscalYearForDate2($month)
	{
		#echo date('Y-m-d', strtotime($_SESSION['operatingyear'].' +1 year'));exit;

		if($month == 4)
		{
		$y = date('Y');
		$pt = date('Y', strtotime('+1 year'));
		$fy_from = strtotime($y."-04-01");
		$fy_to = strtotime($pt."-03-31");
		$fy = $fy_from."|".$fy_to;
		}
		else
		{
		$month = 1;	
		$y = date('Y');
		$pt = date('Y', strtotime('+1 year'));
		$fy_from = strtotime($y."-01-01");
		$fy_to = strtotime($pt."-12-31");
		$fy = $fy_from."|".$fy_to;
		}
		return $fy;		

	}	


}	