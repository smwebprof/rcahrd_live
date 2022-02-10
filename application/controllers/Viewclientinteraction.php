<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewclientinteraction extends CI_Controller {

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
		$this->load->model('user_master');
		$this->load->model('Interaction_master');
		$this->load->model('client_master');		

		$clientsdata = $this->client_master->getClientdata(); //getClientdata($id);
        //print_r($clientsdata);exit;

        $getEmpDetails = $this->user_master->getAllEmpDetails();	
		//print_r($getEmpDetails);exit;

		if (@$_POST['submit']=='followup') {
			//print_r($_POST);exit;
			$redirecturl = BASE_PATH."Viewexcefollowupreport?emp_name=".@$_POST['emp_name']."&from_followup_date=".@$_POST['from_followup_date']."&to_followup_date=".@$_POST['to_followup_date'];
	        redirect($redirecturl);

		}		

		if (@$_POST['submit']=='excel') {
			//print_r($_POST);exit;
			$redirecturl = BASE_PATH."Viewexcelinteractionreport?from_interaction_date=".@$_POST['from_interaction_date']."&to_interaction_date=".@$_POST['to_interaction_date']."&clients_name=".@$_POST['int_company']."&emp_name=".@$_POST['emp_name']."&from_followup_date=".@$_POST['from_followup_date']."&to_followup_date=".@$_POST['to_followup_date'];
	        redirect($redirecturl);
		}

		if ($_POST) {
			//print_r($_POST);exit;
			$result = $this->Interaction_master->getInteractiondataSearch($_POST);
			//print_r($result);exit;
			$this->data['module']='viewclientinteraction';
			//$this->data['client_details']=$clients;
			$this->data['interaction_data']=$result;
			$this->data['clientsdata']=$clientsdata;
			$this->data['userdata']=$getEmpDetails;
			$this->data['layout_body']='viewclientinteraction';
		 	$this->load->view('admin/layout/main_app_viewinteraction', $this->data);
			
		} else {
			$result = $this->Interaction_master->getInteractiondata();
			//print_r($result);exit;

			//$this->load->view('dashboard');
			$this->data['module']='viewclientinteraction';
			//$this->data['client_details']=$clients;
			$this->data['interaction_data']=$result;
			$this->data['clientsdata']=$clientsdata;
			$this->data['userdata']=$getEmpDetails;
			$this->data['layout_body']='viewclientinteraction';
		 	$this->load->view('admin/layout/main_app_viewinteraction', $this->data);

		}

		
	}
}
