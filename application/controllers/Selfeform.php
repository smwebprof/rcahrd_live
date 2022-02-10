<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Selfeform extends CI_Controller {

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
    	$id = base64_decode($_GET['id']);

    	if (!empty($_POST)) {
			//print_r($_POST);exit;
			if (@$_POST['status']=='Inprogress') { 
      			$_POST['status']='Inprogress';
      		} else {
      			$_POST['status']='Filled';
      		}
			$resultdata = $this->question_master->editassesmentdata($_POST);
      		$_POST['assesment_id'] = $resultdata;
      		$resultdetails = $this->question_master->editassesmentdetails($_POST);
      		
      		$Updateaddformstatus = $this->question_master->Updateaddformstatus();

      		if ($resultdata) {
          		$dashboard = BASE_PATH."dashboard";
          		redirect($dashboard);
      		}

		} else {

		$getQuestionsStatus = @$this->question_master->getRowsstatus($id);
			//print_r($getQuestionsStatus);exit;

		$getEmpdetails = $this->user_master->getFullEmpDetails($_SESSION['emp_id']);
		//print_r($getEmpdetails);exit;
		$getQuestions = $this->question_master->getRows();	
		//print_r($getQuestions);exit;
		//$getCategory = $this->question_master->getCategoryRows($getQuestions[0]['id']);
		$i=0;
		foreach ($getQuestions as $k=>$v) {
			$getSelfDetails = $this->question_master->getSelfDetails($v['id'],$id);
			//print_r($getSelfDetails);exit;
			$getQuestions[$k]['breifanswer'] = @$getSelfDetails[0]['breifanswer'];

			$getCategory = $this->question_master->getCategoryRows($v['id']);
			//print_r($getCategory);exit;
			if (!empty($getCategory)) {
				//print_r($getCategory);exit;
				foreach ($getCategory as $p=>$q) {
					//echo $q['question_id'].$q['question_label'];exit;
					$getSelfDetails = $this->question_master->getSelfDetails($q['question_id'].$q['question_label'],$id);
					$getCategoryans[@$getSelfDetails[0]['question_id']] = @$getSelfDetails[0]['correct_option_id']; //breifanswer
					//print_r($getSelfDetails);exit;

					$getCategoryquestions[$q['question_id']][$i] = $q['question_descriptioin'];
          			$getCountCategoryquestions[] = $q['question_descriptioin'];
					$i++;
				}	
			}
		}
		//print_r($getCategoryans);exit;
    	//echo count($getCountCategoryquestions);exit;
		//print_r($getCategoryquestions);exit;
    	$totalquestions = count($getQuestions) + count($getCountCategoryquestions) - 1;
    	//echo $totalquestions;exit;


		//$this->load->view('dashboard');
		$this->data['module']='selfeform';
		$this->data['emp_details']=@$getEmpdetails;
		$this->data['questions']=@$getQuestions;
		$this->data['catquestions']=@$getCategoryquestions;
		$this->data['catans']=@$getCategoryans;
    	$this->data['totalquestions']=@$totalquestions;
    	$this->data['form_status']=@$getQuestionsStatus;
		$this->data['layout_body']='selfeform';
	 	$this->load->view('admin/layout/main_app_form1', $this->data);

	 }			
	}
}
