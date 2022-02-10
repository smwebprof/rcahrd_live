<?php
/* Author : Shivaji Dalvi  18/11/2021 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Editclientinteraction extends CI_Controller {

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
    	$this -> load -> model('Interaction_master');

    	$id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $countriesdata = $this->company_master->getCountries();
    	//print_r($countriesdata);exit;

        $result = $this->Interaction_master->getInteractiondatabyid($id);
    	//print_r($result);exit;

    	$statesdata = $this->company_master->getStates($result[0]['country_id']);
    	//print_r($statesdata);exit;

    	$citiesdata = $this->company_master->getCities($result[0]['state_id']);
    	//print_r($citiesdata);exit;

    	if ($_POST) {
    		//print_r($_POST);exit;
    		$_POST['user_id'] = @$_SESSION['emp_id']; 
        	$_POST['dt'] = $dt;


			if ($_POST['followup_date']) {
			$followupdate = str_replace('/', '-', $_POST['followup_date']);		
            $followupdate = date('Y-m-d',strtotime($followupdate));
        	}

 			$interactiondata['id'] = $id;
        	$interactiondata['followup_flag'] = $_POST['followup_flag'];
            $interactiondata['followup_date'] = @$followupdate;
            $interactiondata['followup_text'] = $_POST['aci_followup'];


        	$interaction_results = $this->Interaction_master->updateFollowupdata($interactiondata);


            $followupdata['interaction_id'] = $id;
            $followupdata['followup_flag'] = $_POST['followup_flag'];
            $followupdata['followup_date'] = @$followupdate;
            $followupdata['followup_text'] = $_POST['aci_followup'];
            $followupdata['entry_date'] = $_POST['dt'];
            $followupdata['entry_user_id'] = $_POST['user_id'];
            $followupdata['modify_date'] = $_POST['dt'];
            $followupdata['modify_user_id'] = $_POST['user_id'];

            $followup_results = $this->Interaction_master->addFollowupData($followupdata);

            if ($followup_results) { 
				$redirecturl = BASE_PATH."Viewclientinteraction?msg=1";
                redirect($redirecturl); 
            }		
	    		
	    	} else {
    		//$this->load->view('dashboard');

			$this->data['module']='viewclientinteraction';
			$this->data['interaction_data']=$result;
			$this->data['countries']=$countriesdata;
			$this->data['states']=$statesdata;
			$this->data['cities']=$citiesdata;
			$this->data['report_date'] = $dt;
			$this->data['report_user'] = $user;
			$this->data['layout_body']='editclientinteraction';
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
