<?php
// Author : Shivaji Dalvi  Date : 10/11/2021
defined('BASEPATH') OR exit('No direct script access allowed');

class Addmeetingschedule extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if (!isset($_SESSION['emp_code'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}
    	//print_r($_SESSION);exit;
    	$this->load->model('Interaction_master');
      $this->load->model('Commodity_master');
    	//$id = base64_decode($_GET['id']);

    	if ($_POST) {
    		  //print_r($_POST);exit;    		  	
    		  $dt = date('Y-m-d H:i:s');
          $_POST['user_id'] = $_SESSION['emp_id'];
          $_POST['dt'] = $dt;
          //$_POST['schedule_date'] = date('Y-m-d',strtotime($_POST['schedule_date']));
          //$schedule_date = strtotime($_POST['schedule_date']);
          //$schedule_date = date('Y-m-d',$schedule_date);
          $schedule_date = str_replace('/', '-', $_POST['schedule_date']);    
          $schedule_date = date('Y-m-d',strtotime($schedule_date));
          $meeting_date = date('d-m-Y',strtotime($schedule_date));
          $_POST['schedule_date'] = $schedule_date;
          $_POST['client_name'] = $_POST['comp_name'];
          $_POST['client_type'] = 'Client';
          $_POST['link_email'] = $_POST['client_email'];
          $_POST['is_active'] = 0;


          $clientdata = $this->Commodity_master->addClientmaster($_POST);
          
          $resultdata = $this->Interaction_master->newMeetingData($_POST);

          // send email to users Shivaji Dalvi

          //$to_email = 'shivaji.dalvi@rcaindia.com,shivdalvi@gmail.com';
          $to_email = 'shivaji.dalvi@rcaindia.com';
          $email_message = 'Dear User,<br><br>';
          $email_message .= 'Meeting has been scheduled – please find the details below :<br><br>';

          $email_message .= '<table width="100%" cellpadding="0" border="1">
                   <tr><td align="center"><b>Company Name</b></td><td align="center"><b>Client Email</b></td><td align="center"><b>Purpose</b></td><td align="center"><b>Schedule Date</b></td><td align="center"><b>Schedule Time</b></td></tr>
                   <tr><td align="center">'.$_POST['client_name'].'</td><td align="center">'.$_POST['link_email'].'</td><td align="center">'.$_POST['purpose'].'</td><td align="center">'.$meeting_date.'</td><td align="center">'.$_POST['schedule_time'].'</td></tr></table>';

          $email_message .= '</table>';      

          $email_message .= '<br><br>From,<br>'; 
          $email_message .= '<br>Admin<br><br>'; 

          $email_message .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>';          

          //echo $email_message;exit;         

          $this->load->library('email');
          $this->email->set_newline("\r\n");

          $config['protocol'] = 'smtp';
          $config['smtp_host'] = 'rcahrd.in';
          $config['smtp_port'] = '587';
          $config['smtp_user'] = 'admin@rcahrd.in';
          $config['smtp_from_name'] = 'RCAINDIA (Do_Not_Reply)';
          $config['smtp_pass'] = 'U$FY[488AAS1';
          $config['wordwrap'] = TRUE;
          $config['newline'] = "\r\n";
          $config['mailtype'] = 'html';

          $subject = 'Meeting Scheduled By '.$_POST['emp_email'];

          $this->email->initialize($config);

          $this->email->from($config['smtp_user'], $config['smtp_from_name']);

          $this->email->to($to_email);

          $this->email->subject($subject);

          $this->email->message($email_message);

          if($this->email->send()) { 
            $redirecturl = BASE_PATH."Viewmeetingschedule?msg=1";
            redirect($redirecturl);           
          } else {
            echo 'There is some problem with Mail!!!. Please contact System Administrator';exit;
          }           
    		
    	} else {


    		$this->data['module']='viewmeetingschedule';
			  $this->data['layout_body']='addmeetingschedule';
		 	  $this->load->view('admin/layout/main_app_schedule', $this->data);
    	}    	
		
	}
}
