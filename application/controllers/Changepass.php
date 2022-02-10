<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepass extends CI_Controller {

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
		$this->load->library('common');
		$this->load->model('user_master');
		$id = base64_decode($_GET['id']);

        if ($_POST) {
        	//print_r($_POST);exit;
        	$isEMail = false;
        	$userPass = $this->common->encrypt_decrypt('encrypt',$_POST['new_pass']);
         	$_POST['password'] = $userPass;
 
            if (!filter_var($id, FILTER_VALIDATE_EMAIL)) {
            	$_POST['emp_code'] = $id;
            	$checkLogin = $this->user_master->updateUserPass($_POST);
         		if(!empty($checkLogin)){ 
         			$loginform = BASE_PATH."login";
            		redirect($loginform);
         		} else {
         			$loginform = BASE_PATH."changepass";
            		redirect($loginform);
         		}
            } else {
            	$_POST['emp_code'] = $id;
            	$checkLogin = $this->user_master->updateUserPassEmail($_POST);
         		if(!empty($checkLogin)){ 
         			$loginform = BASE_PATH."login";
            		redirect($loginform);
         		} else {
         			$loginform = BASE_PATH."changepass";
            		redirect($loginform);
         		}
            }

        } else {
        	//$this->load->view('dashboard');
			$this->data['layout_body']='changepass';
	 		$this->load->view('admin/layout/main_changepass', $this->data);
        }
	}
}
