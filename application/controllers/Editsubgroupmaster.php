<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editsubgroupmaster extends CI_Controller {

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

    	$id = base64_decode($_GET['id']);

    	if ($_POST) {
    		//print_r($_POST);exit;
    		$_POST['user_id'] = $_SESSION['emp_id'];	
    		$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
    		$resultdata = $this->Commodity_master->updatSubGroupsDetails($_POST);	

    		if ($resultdata) { 
				$redirecturl = BASE_PATH."Viewsubgroupmaster?msg=1";
                redirect($redirecturl); 
            }	
    		
    	} else {
    		//$this->load->view('dashboard');
	    	$getSubGroupsDetails = $this->Commodity_master->getSubGroupsDetails($id);	
			//print_r($getSubGroupsDetails);exit;

			$getCommodityDetails = $this->Commodity_master->getAllCommodities();
    		//print_r($getCommodityDetails);exit;

			$this->data['module']='viewsubgroupmaster';
			$this->data['subgroup_details']=$getSubGroupsDetails;
			$this->data['commodity_details']=$getCommodityDetails;
			$this->data['layout_body']='editsubgroupmaster';
		 	$this->load->view('admin/layout/main_app_subgroup', $this->data);
    	}    	
		
	}
}
