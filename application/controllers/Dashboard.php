<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model('User_master');
		$this->load->model('Commodity_master');

		//print_r($_SESSION);exit;
		$getEmpDetails = $this->User_master->getEmpDetails($_SESSION['emp_id']);	
		//print_r($getEmpDetails);exit;

		$getDashboardData = $this->Commodity_master->getDashboardData($_SESSION['is_admin']);	
		//print_r($getDashboardData);exit;

		//$this->load->view('dashboard');
		$this->data['module']='dashboard';
		$this->data['emp_details']=$getEmpDetails;
		$this->data['dashboard_data']=$getDashboardData;
		$this->data['layout_body']='dashboard';
	 	$this->load->view('admin/layout/main_app_dashboard', $this->data);
	}
}
