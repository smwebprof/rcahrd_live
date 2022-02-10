<?php
// Author : Shivaji Dalvi Date : 20/11/2021
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewclientinteraction extends CI_Controller {

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
	 * Author : Shivaji M Dalvi | Date : 15/10/2019
	 */



    public function index()
    {
        
        if (!isset($_SESSION['emp_code'])) {
            $login = BASE_PATH."login/";
            redirect($login);
        }
        //print_r($_SESSION);exit;

        $this -> load -> model('Interaction_master');

        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Interaction_master->getInteractiondatabyid($id);
        //print_r($result);exit;

        $this->data['module']='viewclientinteraction';
        $this->data['title']='ACI - Client Interaction';    
        $this->data['layout_body']='fullviewclientinteraction';
        $this->data['report_date'] = $dt;
        $this->data['report_user'] = $user;
        $this->data['interaction_data'] = $result;

        $this->load->view('admin/layout/main_app', $this->data);
    
    }

}
