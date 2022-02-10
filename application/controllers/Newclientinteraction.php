<?php
/* Author : Shivaji Dalvi  18/11/2021 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Newclientinteraction extends CI_Controller {

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
    	$this->load->model('company_master');

    	$dt = gmdate('Y-m-d H:i:s');
        $dt2 = gmdate('YmdHis');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

    	$countriesdata = $this->company_master->getCountries();
    	//print_r($countriesdata);exit;

    	if ($_POST) {
    		//print_r($_POST);exit;
    		$_POST['user_id'] = @$_SESSION['emp_id']; 
        	$_POST['dt'] = $dt;

       		$this -> load -> model('Interaction_master');	

    		$config['upload_path'] = './uploads/';
        	$config['allowed_types'] = 'xls|pdf|doc|xlsx|docx'; //xls|pdf|doc //*
        	$config['max_size'] = 512000;

       	 	$this->load->library('upload', $config);
        	$this->upload->initialize($config);

        	if (!$this->upload->do_upload('upl_items_discussed')) {
	            $error = array('error' => $this->upload->display_errors());
	            #print_r($error);exit;
	            #echo '11111';exit;
	        } else {
	            $data = array('upl_items_discussed_path' => $this->upload->data());
	            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
	            #print_r($data);exit;
	            #echo $data['upl_purpose_path']['file_name'];exit;

	            $interactiondata['upl_items_discussed_path'] = $data['upl_items_discussed_path']['file_name'];
	            if (!$interactiondata['upl_items_discussed_path']) { $interactiondata['upl_items_discussed_path'] = '';}
	          #echo '22222';exit;
	        }


	        if (!$this->upload->do_upload('upl_action_points')) {
	            $error = array('error' => $this->upload->display_errors());
	            #print_r($error);exit;
	            #echo '11111';exit;
	        } else {
	            $data = array('upl_action_points_path' => $this->upload->data());
	            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
	            #print_r($data);exit;
	            #echo $data['upl_purpose_path']['file_name'];exit;

	            $interactiondata['upl_action_points_path'] = $data['upl_action_points_path']['file_name'];
	            if (!$interactiondata['upl_action_points_path']) { $interactiondata['upl_action_points_path'] = '';}
	          #echo '22222';exit;
	        }


	        if (!$this->upload->do_upload('upl_purpose')) {
	            $error = array('error' => $this->upload->display_errors());
	            #print_r($error);exit;
	            #echo '11111';exit;
	        } else {
	            $data = array('upl_purpose_path' => $this->upload->data());
	            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
	            #print_r($data);exit;
	            #echo $data['upl_purpose_path']['file_name'];exit;

	            $interactiondata['upl_purpose_file_path'] = $data['upl_purpose_path']['file_name'];
	            if (!$interactiondata['upl_purpose_file_path']) { $interactiondata['upl_purpose_file_path'] = '';}
	          #echo '22222';exit;
	        }   
    

	        if (!$this->upload->do_upload('upl_action')) {
	            $error = array('error' => $this->upload->display_errors());
	            #print_r($error);exit;
	            #echo '11111';exit;
	        } else {
	            $data = array('upl_action_path' => $this->upload->data());
	            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
	            #print_r($data);exit;
	            #echo '22222';exit;
	            $interactiondata['upl_action_file_path'] = $data['upl_action_path']['file_name'];
	            if (!$interactiondata['upl_action_file_path']) { $interactiondata['upl_action_file_path'] = '';}

	        }

	        if (!$this->upload->do_upload('upl_acifollow')) {
	            $error = array('error' => $this->upload->display_errors());
	            #print_r($error);exit;
	            #echo '11111';exit;
	        } else {
	            $data = array('upl_acifollow_path' => $this->upload->data());
	            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
	            #print_r($data);exit;
	            #echo '22222';exit;
	            $interactiondata['upl_acifollow_file_path'] = $data['upl_acifollow_path']['file_name'];
	            if (!$interactiondata['upl_acifollow_file_path']) { $interactiondata['upl_acifollow_file_path'] = '';}
	        }

	        $clientsdata['int_company'] = $_POST['int_company'];
            $clientsdata['int_office_address'] = $_POST['int_office_address'];
            $clientsdata['int_office_prefix'] = $_POST['int_office_prefix'];
            $clientsdata['int_office_no'] = $_POST['int_office_no'];
            $clientsdata['int_company_web'] = $_POST['int_company_web'];
            $clientsdata['entry_date'] = $_POST['dt'];
            $clientsdata['entry_user_id'] = $_POST['user_id'];
            $clientsdata['modify_date'] = $_POST['dt'];
            $clientsdata['modify_user_id'] = $_POST['user_id'];
            $clientsdata['company_country'] = $_POST['company_country'];
            $clientsdata['company_state'] = $_POST['company_state'];
            $clientsdata['company_city'] = $_POST['company_city'];
            //print_r($clientsdata);exit;

            $clients = $this->Interaction_master->newClientmaster($clientsdata);


            $interaction_date = str_replace('/', '-', $_POST['interaction_date']);		
            $interaction_date = date('Y-m-d',strtotime($interaction_date));

            if ($_POST['followup_date']) {
			$followupdate = str_replace('/', '-', $_POST['followup_date']);		
            $followupdate = date('Y-m-d',strtotime($followupdate));
        	}

            // insert into agrimin_client_interaction_report
            $interactiondata['client_id'] = $clients; //$clients['id']

            $interactiondata['int_full_name'] = $_POST['int_full_name'];
            $interactiondata['int_job_title'] = $_POST['int_job_title'];
            //$interactiondata['int_company'] = $_POST['int_company'];
            //$interactiondata['int_office_address'] = $_POST['int_office_address'];
            $interactiondata['int_mobile_prefix'] = $_POST['int_mobile_prefix'];
            $interactiondata['int_mobile_no'] = $_POST['int_mobile_no'];
            $interactiondata['int_email_address'] = $_POST['int_email_address'];
            $interactiondata['int_alt_prefix'] = $_POST['int_alt_prefix'];
            $interactiondata['int_alt_no'] = $_POST['int_alt_no'];
            //$interactiondata['int_company_web'] = $_POST['int_company_web'];
            $interactiondata['interaction_date'] = $interaction_date;
            
            $interactiondata['location_interaction'] = @$_POST['location_interaction'];
            $interactiondata['phone_interaction'] = @$_POST['phone_interaction'];
            $interactiondata['client_attendees'] = $_POST['client_attendees'];
            $interactiondata['aci_attendees'] = $_POST['aci_attendees'];
            $interactiondata['purpose_meeting'] = $_POST['purpose_meeting'];
            $interactiondata['sales_target'] = $_POST['sales_target'];
            $interactiondata['specific_issue'] = $_POST['specific_issue'];
            $interactiondata['client_complaint'] = $_POST['client_complaint'];
            $interactiondata['items_discussed'] = $_POST['items_discussed'];
            $interactiondata['action_points'] = $_POST['action_points'];
            $interactiondata['purpose_acheived'] = $_POST['purpose_acheived'];
            $interactiondata['action_acheived'] = $_POST['action_acheived'];
            $interactiondata['aci_followup'] = $_POST['aci_followup'];
            $interactiondata['entry_date'] = $_POST['dt'];
            $interactiondata['entry_user_id'] = $_POST['user_id'];
            $interactiondata['modify_date'] = $_POST['dt'];
            $interactiondata['modify_user_id'] = $_POST['user_id'];
            $interactiondata['followup_flag'] = $_POST['followup_flag'];
            $interactiondata['followup_date'] = @$followupdate;
            $interactiondata['followup_text'] = $_POST['aci_followup'];
            //print_r($interactiondata);exit;
            
            $interactions = $this->Interaction_master->newInteractiondata($interactiondata);

            if ($interactions) { 

            	$followupdata['interaction_id'] = $interactions;
            	$followupdata['followup_flag'] = $_POST['followup_flag'];
            	$followupdata['followup_date'] = @$followupdate;
            	$followupdata['followup_text'] = $_POST['aci_followup'];
            	$followupdata['entry_date'] = $_POST['dt'];
            	$followupdata['entry_user_id'] = $_POST['user_id'];
            	$followupdata['modify_date'] = $_POST['dt'];
            	$followupdata['modify_user_id'] = $_POST['user_id'];


            	$followup_results = $this->Interaction_master->addFollowupData($followupdata);


				$redirecturl = BASE_PATH."Viewclientinteraction?msg=1";
                redirect($redirecturl); 
            }		
	    		
	    	} else {
    		//$this->load->view('dashboard');

			$this->data['module']='viewclientinteraction';
			$this->data['countries']=$countriesdata;
			$this->data['report_date'] = $dt;
			$this->data['report_user'] = $user;
			$this->data['layout_body']='newclientinteraction';
		 	$this->load->view('admin/layout/main_app_interaction', $this->data);
    	}    	
		
	}

	public function fetch_states()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_states($this->input->post('country_id'));

	}

	public function fetch_city()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_city($this->input->post('state_id'));

	}

	public function fetch_countrycode()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_countrycode($this->input->post('country_id'));

	}

	public function fetch_phonecode()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_phonecode($this->input->post('country_id'));

	}

	public function fetch_clientdata()
	{
		
		$this->load->model('company_master'); 
		
		echo $this->company_master->fetch_clientdata($this->input->post('id'));

	}
}
