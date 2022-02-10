<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewcommoditymaster extends CI_Controller {

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

		//$this->load->view('dashboard');
    	$getCommodityDetails = $this->Commodity_master->getAllCommodities();	
		//print_r($getCommodityDetails);exit;

		$this->data['module']='viewcommoditymaster';
		$this->data['commodity_details']=$getCommodityDetails;
		$this->data['layout_body']='viewcommoditymaster';
	 	$this->load->view('admin/layout/main_app', $this->data);
	}
}
