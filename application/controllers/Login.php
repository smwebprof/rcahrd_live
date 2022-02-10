<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		
		$this->load->model('user_master');
		$this->load->library('common');
		if ($_POST) {
			//print_r($_POST);exit;
			$isEMail = false;
			if (!filter_var($_POST['emp_code'], FILTER_VALIDATE_EMAIL)) {
  				$checkLogin = $this->user_master->getRowsByEmpCode($_POST['emp_code']);
				//print_r($checkLogin);exit;
				if (empty($checkLogin)) {
					$loginform = BASE_PATH."login?msg=1";
            		redirect($loginform);
				}
				$isEMail = false;
			} else {
				$checkLogin = $this->user_master->getRowsByEmpEmail($_POST['emp_code']);
				//print_r($checkLogin);exit;
				if (empty($checkLogin)) {
					$loginform = BASE_PATH."login?msg=1";
            		redirect($loginform);
				}
				$isEMail = true;
			}
			//echo $isEMail;exit;

			if (@$checkLogin[0]['password_change_flag'] == 'N') {
				  $changepass = BASE_PATH."changepass?id=".base64_encode($_POST['emp_code']);
            	  redirect($changepass);
				} else {
				  $userPass = $this->common->encrypt_decrypt('encrypt',$_POST['emp_pass']);
				  $_POST['password'] = $userPass;

				  if ($isEMail==true) {  
				  	$getLogin = $this->user_master->getRowsEmail($_POST);
				  } else { 
				  	$getLogin = $this->user_master->getRows($_POST);
				  }
				  //print_r($getLogin);exit;

				  if (!empty($getLogin)) {

				  	$getLoginYr = $this->user_master->getLoginYr();
				  	//print_r($getLoginYr);exit;

				  	$dt = strtotime(date('Y-m-d'));
				  	$operatingyear = date('Y');
				  	$fin_month = 4;
				  	$fin_period = explode("|",$this->common->calculateFiscalYearForDate($fin_month,$getLoginYr[0]['year']));
					//print_r($fin_period);exit;
					$fin_period_from = $fin_period[0];
					$fin_period_to = $fin_period[1];

					if ($dt >= $fin_period_from && $dt <= $fin_period_to) {
						//echo $getLoginYr[0]['year'];exit;
						$this->session->set_userdata('isUserLoggedIn', TRUE);
				  	$this->session->set_userdata('emp_id', $getLogin[0]['id']);
				  	$this->session->set_userdata('emp_code', $getLogin[0]['emp_id']);
				  	$this->session->set_userdata('fname', $getLogin[0]['emp_first_name']);
		            $this->session->set_userdata('lname', $getLogin[0]['emp_last_name']);
		            $this->session->set_userdata('emp_email', $getLogin[0]['email_address']);
		            $this->session->set_userdata('designation_master_id', $getLogin[0]['designation_master_id']);
		            $this->session->set_userdata('is_admin', $getLogin[0]['is_admin']);
		            $this->session->set_userdata('op_year', $getLoginYr[0]['year']);
		            $this->session->set_userdata('reporting_emp_id', $getLogin[0]['reporting_emp_id']);

				  	if ($getLogin[0]['is_admin']=='Admin') {
				  		$dashboard = BASE_PATH."dashboard";
            	  		redirect($dashboard);
				  	} else {
				  		$dashboard = BASE_PATH."dashboard";
            	  		redirect($dashboard);
				  	}
					} else {
						$loginform = BASE_PATH."login?msg=2";
            	  		redirect($loginform);
					}	
				  }	else { 
				  	$loginform = BASE_PATH."login?msg=1";
            	  	redirect($loginform);
				  }				  	
				}
		} else {
			//$this->load->view('dashboard');
			$this->data['layout_body']='login';
	 		$this->load->view('admin/layout/main_login', $this->data);
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
   		// session_destroy();
    	$this->session->sess_destroy();

    	$login = BASE_PATH."login/";
        redirect($login); 

	}
}
