<?php
// Author : Shivaji Dalvi  Date : 10/11/2021
defined('BASEPATH') OR exit('No direct script access allowed');

class SendEmailMaster extends CI_Controller {

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
      $this->load->library('ciqrcode');
    	$id = base64_decode($_GET['id']);

    	if ($_POST) {
    		  //print_r($_POST);exit;
    		  $_POST['user_id'] = $_SESSION['emp_id'];	
    		  $dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
          $_POST['client_name'] = $_POST['link_client'];
          $_POST['client_type'] = 'Client';
          $_POST['is_active'] = 0;
        	//$_POST['sent_flag'] = 1;
        	$link_file = $_POST['link_file'];
        	$to_email = $_POST['link_email'];

        	$email_message = '<html>
                  <head>
                    <meta name="viewport" content="width=device-width" />
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>RCAINDIA Presentation</title>
                    <style>
                      /* -------------------------------------
                          GLOBAL RESETS
                      ------------------------------------- */
                      
                      /*All the styling goes here*/
                      
                      img {
                        border: none;
                        -ms-interpolation-mode: bicubic;
                        max-width: 100%; 
                      }

                      body {
                        background-color: #f6f6f6;
                        font-family: sans-serif;
                        -webkit-font-smoothing: antialiased;
                        font-size: 14px;
                        line-height: 1.4;
                        margin: 0;
                        padding: 0;
                        -ms-text-size-adjust: 100%;
                        -webkit-text-size-adjust: 100%; 
                      }

                      table {
                        border-collapse: separate;
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        width: 100%; }
                        table td {
                          font-family: sans-serif;
                          font-size: 14px;
                          vertical-align: top; 
                      }

                      /* -------------------------------------
                          BODY & CONTAINER
                      ------------------------------------- */

                      .body {
                        background-color: #f6f6f6;
                        width: 100%; 
                      }

                      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                      .container {
                        display: block;
                        margin: 0 auto !important;
                        /* makes it centered */
                        max-width: 580px;
                        padding: 10px;
                        width: 580px; 
                      }

                      /* This should also be a block element, so that it will fill 100% of the .container */
                      .content {
                        box-sizing: border-box;
                        display: block;
                        margin: 0 auto;
                        max-width: 580px;
                        padding: 10px; 
                      }

                      /* -------------------------------------
                          HEADER, FOOTER, MAIN
                      ------------------------------------- */
                      .main {
                        background: #ffffff;
                        border-radius: 3px;
                        width: 100%; 
                      }

                      .wrapper {
                        box-sizing: border-box;
                        padding: 20px; 
                      }

                      .content-block {
                        padding-bottom: 10px;
                        padding-top: 10px;
                      }

                      .footer {
                        clear: both;
                        margin-top: 10px;
                        text-align: center;
                        width: 100%; 
                      }
                        .footer td,
                        .footer p,
                        .footer span,
                        .footer a {
                          color: #999999;
                          font-size: 12px;
                          text-align: center; 
                      }

                      /* -------------------------------------
                          TYPOGRAPHY
                      ------------------------------------- */
                      h1,
                      h2,
                      h3,
                      h4 {
                        color: #000000;
                        font-family: sans-serif;
                        font-weight: 400;
                        line-height: 1.4;
                        margin: 0;
                        margin-bottom: 30px; 
                      }

                      h1 {
                        font-size: 35px;
                        font-weight: 300;
                        text-align: center;
                        text-transform: capitalize; 
                      }

                      p,
                      ul,
                      ol {
                        font-family: sans-serif;
                        font-size: 14px;
                        font-weight: normal;
                        margin: 0;
                        margin-bottom: 15px; 
                      }
                        p li,
                        ul li,
                        ol li {
                          list-style-position: inside;
                          margin-left: 5px; 
                      }

                      a {
                        color: #3498db;
                        text-decoration: underline; 
                      }

                      /* -------------------------------------
                          BUTTONS
                      ------------------------------------- */
                      .btn {
                        box-sizing: border-box;
                        width: 100%; }
                        .btn > tbody > tr > td {
                          padding-bottom: 15px; }
                        .btn table {
                          width: auto; 
                      }
                        .btn table td {
                          background-color: #ffffff;
                          border-radius: 5px;
                          text-align: center; 
                      }
                        .btn a {
                          background-color: #ffffff;
                          border: solid 1px #3498db;
                          border-radius: 5px;
                          box-sizing: border-box;
                          color: #3498db;
                          cursor: pointer;
                          display: inline-block;
                          font-size: 14px;
                          font-weight: bold;
                          margin: 0;
                          padding: 12px 25px;
                          text-decoration: none;
                          text-transform: capitalize; 
                      }

                      .btn-primary table td {
                        background-color: #3498db; 
                      }

                      .btn-primary a {
                        background-color: #3498db;
                        border-color: #3498db;
                        color: #ffffff; 
                      }

                      /* -------------------------------------
                          OTHER STYLES THAT MIGHT BE USEFUL
                      ------------------------------------- */
                      .last {
                        margin-bottom: 0; 
                      }

                      .first {
                        margin-top: 0; 
                      }

                      .align-center {
                        text-align: center; 
                      }

                      .align-right {
                        text-align: right; 
                      }

                      .align-left {
                        text-align: left; 
                      }

                      .clear {
                        clear: both; 
                      }

                      .mt0 {
                        margin-top: 0; 
                      }

                      .mb0 {
                        margin-bottom: 0; 
                      }

                      .preheader {
                        color: transparent;
                        display: none;
                        height: 0;
                        max-height: 0;
                        max-width: 0;
                        opacity: 0;
                        overflow: hidden;
                        mso-hide: all;
                        visibility: hidden;
                        width: 0; 
                      }

                      .powered-by a {
                        text-decoration: none; 
                      }

                      hr {
                        border: 0;
                        border-bottom: 1px solid #f6f6f6;
                        margin: 20px 0; 
                      }

                      /* -------------------------------------
                          RESPONSIVE AND MOBILE FRIENDLY STYLES
                      ------------------------------------- */
                      @media only screen and (max-width: 620px) {
                        table[class=body] h1 {
                          font-size: 28px !important;
                          margin-bottom: 10px !important; 
                        }
                        table[class=body] p,
                        table[class=body] ul,
                        table[class=body] ol,
                        table[class=body] td,
                        table[class=body] span,
                        table[class=body] a {
                          font-size: 16px !important; 
                        }
                        table[class=body] .wrapper,
                        table[class=body] .article {
                          padding: 10px !important; 
                        }
                        table[class=body] .content {
                          padding: 0 !important; 
                        }
                        table[class=body] .container {
                          padding: 0 !important;
                          width: 100% !important; 
                        }
                        table[class=body] .main {
                          border-left-width: 0 !important;
                          border-radius: 0 !important;
                          border-right-width: 0 !important; 
                        }
                        table[class=body] .btn table {
                          width: 100% !important; 
                        }
                        table[class=body] .btn a {
                          width: 100% !important; 
                        }
                        table[class=body] .img-responsive {
                          height: auto !important;
                          max-width: 100% !important;
                          width: auto !important; 
                        }
                      }

                      /* -------------------------------------
                          PRESERVE THESE STYLES IN THE HEAD
                      ------------------------------------- */
                      @media all {
                        .ExternalClass {
                          width: 100%; 
                        }
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                          line-height: 100%; 
                        }
                        .apple-link a {
                          color: inherit !important;
                          font-family: inherit !important;
                          font-size: inherit !important;
                          font-weight: inherit !important;
                          line-height: inherit !important;
                          text-decoration: none !important; 
                        }
                        #MessageViewBody a {
                          color: inherit;
                          text-decoration: none;
                          font-size: inherit;
                          font-family: inherit;
                          font-weight: inherit;
                          line-height: inherit;
                        }
                        .btn-primary table td:hover {
                          background-color: #34495e !important; 
                        }
                        .btn-primary a:hover {
                          background-color: #34495e !important;
                          border-color: #34495e !important; 
                        } 
                      }

                    </style>
                  </head>
                  <body class="">
                    <span class="preheader">Click To View Our Presentation.</span>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
                      <tr>
                        <td>&nbsp;</td>
                        <td class="container">
                          <div class="content">

                            <!-- START CENTERED WHITE CONTAINER -->
                            <table role="presentation" class="main">

                              <!-- START MAIN CONTENT AREA -->
                              <tr>
                                <td class="wrapper">
                                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                     <td>
                                        <img src="http://rcahrd.in/assets/img/dacpl_logo2.jpg">
                                     </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <p>Dear Sir/Madam,</p>
                                        <p>Dr. Raman C. Amin, our late founder completed his Doctorate in Pharma - Chemistry</p>
                                        <p>from the University of Maryland, Baltimore U.S.A. in 1949. </p>
                                        <p>On his return to India, he ventured into Quality Testing & Certification services in the year 1950.</p> 
                                        <p>Dr. Amin Superintendents & Surveyors Pvt. Ltd., headquartered at Mumbai was founded in 1975 as an independent company, </p>
                                        <p>thus continuing a professional practice which is today in its sixth decade of dedicated service to the trade & industry both nationally and internationally.</p>
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                          <tbody>
                                            <tr>
                                              <td align="left">
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                  <tbody>
                                                    <tr>
                                                      <td> <a href="'.$link_file.'" target="_blank">Click Here To View Our Company Profile</a> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <p></p>
                                        <p></p>
                                        <p><b>From</b></p>
                                        <p> <b>RCAINDIA</b></p>
                                        <p></p>
                                        <p><b>NOTE:</b> This is a system generated mail. Please do not reply</p>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>

                            <!-- END MAIN CONTENT AREA -->
                            </table>
                            <!-- END CENTERED WHITE CONTAINER -->

                            

                          </div>
                        </td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </body>
                </html>';

        	//echo $email_message;exit;

          $this->load->library('email');
        	$this->email->set_newline("\r\n");


	        $config['protocol'] = 'smtp';
	        $config['smtp_host'] = 'rcahrd.in';
	        $config['smtp_port'] = '587';
	        $config['smtp_user'] = 'admin@rcahrd.in';
	        $config['smtp_from_name'] = 'RCAINDIA (Do_Not_Reply)';
	        $config['smtp_pass'] = 'U$FY[488AAS1';
	        $config['wordwrap'] = TRUE;
	        $config['newline'] = "\r\n";
	        $config['mailtype'] = 'html';

	        $subject = 'Dr. Amin Controllers Pvt Ltd - Company Profile';

	        $this->email->initialize($config);

	        $this->email->from($config['smtp_user'], $config['smtp_from_name']);

	        $this->email->to($to_email);

	        $this->email->subject($subject);

	        $this->email->message($email_message);

	        if($this->email->send()) { 
	        	  $_POST['sent_flag'] = 1;
	            $resultdata = $this->Commodity_master->addCommodityLinkDetails($_POST);

              $clientdata = $this->Commodity_master->addClientmaster($_POST);

	            if ($resultdata) { 
					        $redirecturl = BASE_PATH."SendEmailMaster?id=".$_GET['id']."&msg=1";
                	redirect($redirecturl); 
            	}
	        } else { 
	            $_POST['sent_flag'] = 0;
	            $resultdata = $this->Commodity_master->addCommodityLinkDetails($_POST);

	            if ($resultdata) { 
					        $redirecturl = BASE_PATH."SendEmailMaster?id=".$_GET['id']."&msg=2";
                	redirect($redirecturl); 
            	}
	        }    
    		
    	} else {
    		$getCommodityDetails = $this->Commodity_master->getCommodityLinkDetailsById($id);	
			  //print_r($getCommodityDetails);exit;

        // Generate QR Code By Shivaji Dalvi
        $file_name = basename($getCommodityDetails[0]['commodity_link_path'], ".pdf");
        $params['id'] = $id;
        $params['user_id'] = $_SESSION['emp_id'];  
        $dt = date('Y-m-d H:i:s');
        $params['dt'] = $dt;
        $params['data'] = $getCommodityDetails[0]['commodity_link_path'];
        $params['level'] = 'H';
        $params['size'] = 5;
        $params['savename'] = APP_PATH.'/files/QR_'.$file_name.'.png';
        $params['qr_path'] = BASE_PATH.'/files/QR_'.$file_name.'.png';
        $this->ciqrcode->generate($params);

        $updateCommodityDetails = $this->Commodity_master->updateCommodityLinkDetailsByQR($params); 
        //print_r($getCommodityDetails);exit;
        // Generate QR Code By Shivaji Dalvi

    		$this->data['module']='dashboard';
    		$this->data['commodity_link_details']=$getCommodityDetails;
        $this->data['qr_code_path']=$params['qr_path'];
			  $this->data['layout_body']='sendemailmaster';
		 	  $this->load->view('admin/layout/main_app_linkmail', $this->data);
    	}    	
		
	}
}
