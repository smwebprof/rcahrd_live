<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Selfform extends CI_Controller {

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
    	$this->load->model('question_master');
    	$this->load->model('user_master');

 		if (!empty($_POST)) {
			//print_r($_POST);exit;
			if (@$_POST['status']=='Inprogress') { 
      			$_POST['status']='Inprogress';
      		} else {
      			$_POST['status']='Filled';
      		}
      		$resultdata = $this->question_master->addassesmentdata($_POST);
      		$_POST['assesment_id'] = $resultdata;
      		$resultdetails = $this->question_master->addassesmentdetails($_POST);

      		$Updateaddformstatus = $this->question_master->Updateaddformstatus();

      		if ($resultdata) {
          		$dashboard = BASE_PATH."dashboard";
          		redirect($dashboard);
      		}
		} else {

			//$getQuestionsStatus = @$this->question_master->getRowsstatus($_SESSION['emp_id']);
			//print_r($getQuestionsStatus);exit;
			/*if (@$getQuestionsStatus[0]['status']=='Inprogress') {
					$viewform = BASE_PATH."selfeform?id=".base64_encode($_SESSION['emp_id']);
            	  	redirect($viewform);
				}*/

			$getEmpdetails = $this->user_master->getFullEmpDetails($_SESSION['emp_id']);
			//print_r($getEmpdetails);exit;

			$getQuestions = $this->question_master->getRows();	
			//print_r($getQuestions);exit;
			//$getCategory = $this->question_master->getCategoryRows($getQuestions[0]['id']);
			$i=0;
			foreach ($getQuestions as $k=>$v) {
				$getCategory = $this->question_master->getCategoryRows($v['id']);

			if (!empty($getCategory)) {
				//print_r($getCategory);exit;
				foreach ($getCategory as $p=>$q) {
					$getCategoryquestions[$q['question_id']][$i] = $q['question_descriptioin'];
          			$getCountCategoryquestions[] = $q['question_descriptioin'];
					$i++;
				}	
			}
		}
    			//echo count($getCountCategoryquestions);exit;
				//print_r($getCategoryquestions);exit;
    			$totalquestions = count($getQuestions) + count($getCountCategoryquestions) - 1;
    			//echo $totalquestions;exit;


				//$this->load->view('dashboard');
				$this->data['module']='selfform';
				$this->data['emp_details']=@$getEmpdetails;
				$this->data['questions']=@$getQuestions;
				$this->data['catquestions']=@$getCategoryquestions;
    			$this->data['totalquestions']=@$totalquestions;
    			$this->data['form_status']=@$getQuestionsStatus;
				$this->data['layout_body']='selfform';
	 			$this->load->view('admin/layout/main_app_form1', $this->data);
		}
	}
}
