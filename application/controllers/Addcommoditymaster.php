<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addcommoditymaster extends CI_Controller {

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
    	$this->load->model('Commodity_master');

    	if ($_POST) {
    		//print_r($_POST);exit;
    		$_POST['user_id'] = $_SESSION['emp_id'];	
    		$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
    		$resultdata = $this->Commodity_master->addCommodityDetails($_POST);	

    		if ($resultdata) { 
				$redirecturl = BASE_PATH."Viewcommoditymaster?msg=1";
                redirect($redirecturl); 
            }	
    		
    	} else {
    		//$getSubGroupDetails = $this->Commodity_master->getAllSubGroups();	
			//print_r($getSubGroupDetails);exit;

    		$this->data['module']='viewcommoditymaster';
    		//$this->data['subgroup_details']=$getSubGroupDetails;
			$this->data['layout_body']='addcommoditymaster';
		 	$this->load->view('admin/layout/main_app_commodity', $this->data);
    	}    	
		
	}
}
