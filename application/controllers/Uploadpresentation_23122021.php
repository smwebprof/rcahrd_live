<?php
// Author : Shivaji Dalvi  :: 09/11/2021

defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadpresentation extends CI_Controller {

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

        	
		if ($_POST) { 
			//print_r($_POST);exit;	
			$getCommodityDetailsById = $this->Commodity_master->getCommodityDetailsById($_POST['commodity']);	
			//print_r($getCommodityDetailsById);exit;
			$commodity_name = $getCommodityDetailsById[0]['commodity_name'];
			
			//load our new PHPExcel library
        	$this->load->library('excel');
        	$this->load->library('Pdfimage2');
			 //print_r($_FILES);exit;
        	 if(isset($_FILES['commodity_file']['name']) && $_FILES['commodity_file']['name'] != "") {
        	 	//print_r($_POST);exit;
        	 	$allowedExtensions = array("xls","xlsx","csv");
        		$ext = pathinfo($_FILES['commodity_file']['name'], PATHINFO_EXTENSION);
        	 	
        		$file_name = explode(".",$_FILES['commodity_file']['name']);
        		
        		if(in_array($ext, $allowedExtensions)) {
        			$file = "uploads/".$file_name[0]."_".date('dmYHis').".".$ext;
        			$isUploaded = copy($_FILES['commodity_file']['tmp_name'], $file);
        			if($isUploaded) {
        				try { 
	                        // load uploaded file
	                        $objPHPExcel = PHPExcel_IOFactory::load($file);
                    	} catch (Exception $e) { echo 'nooooo';exit;
                            die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
                    	}

                    	$sheet = $objPHPExcel->getSheet(0);
                    	$total_rows = $sheet->getHighestRow();
                    	//print_r($total_rows);exit;

                    	$highestColumn = $sheet->getHighestColumn();
                    	$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

                    	for ($row = 1; $row <= $total_rows; ++ $row) {
                    		for ($col = 0; $col < $highestColumnIndex; ++ $col) {
                    			$cell = $sheet->getCellByColumnAndRow($col, $row);
                    			$val = $cell->getValue();
                    			$records[$row][$col] = $val;
                    		}	
                    	}
                    	//print_r($records);exit;	
        			}	

        		} else {
        			die('Error loading file, This Extension of File is not Supported!!!');
        		}	

        	 }

        	 // Export Excel Data to PDF for presentatio - Logic starts here

        	$filename = "/DACPL_Presentation_".date('dmYHis').".pdf";
        	$filehttpname = "DACPL_Presentation_".date('dmYHis').".pdf";
        	$filepath =  APP_PATH.'/files'.$filename;
        	$filehttppath =  BASE_PATH.'files/'.$filehttpname;
        
        	// Create new PDF document.
        	$pdf = new TCPDI(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        	// set document information
	        $pdf->SetCreator(PDF_CREATOR);
	        $pdf->SetAuthor('Shivaji Dalvi');
	        $pdf->SetTitle('DACPL Presentation');
	        $pdf->SetSubject('DACPL Presentation');
	        $pdf->SetKeywords('DACPL Presentation');

	        $pdf->SetPrintHeader(false);

	        $policyPdfPath = BASE_PATH.'/uploads/tech_dacpl_presentation.pdf';
	        $pagecount = $pdf->setSourceFile($policyPdfPath);
	        for ($i = 1; $i <= $pagecount; $i++) {
	            $tplidx = $pdf->importPage($i);
	            $pdf->AddPage('L','DACPL');
	            $pdf->useTemplate($tplidx);
	            // Add agreement text in document footer
	            //$pdf->SetXY(15,282);
	            //$pdf->Cell(180, 5, "Documento approvato da tttt il 1111", 0, 0, 'C');
	        }

	        $pdf1 = '<table border="1" cellspacing="0" cellpadding="5" width="800">';
	        //$pdf1 .= '<tr><th width="10%"><b>Sr.No.</b></th><th width="15%"><b>Commodity</b></th><th width="25%"><b>Description</b></th><th width="15%"><b>Manufacturer</b></th><th width="15%"><b>Client name</b></th><th width="15%"><b>Types</b></th><th width="15%"><b>Quantity</b></th></tr>';
	        //for ($j=1;$j<=6;$j++) {
	        //$pdf1 .= '<tr><th width="10%"><b>'.$j.'</b></th><th width="15%">PIPE</th><th width="25%">20" x 0.75" DSAW Straight DRL API 5L X60 MS, PSL 2, Class IV Sour Service.20" x 0.75" DSAW Straight DRL API 5L X60 DSAW Straight DRL API 5L X60 DSAW.</th><th width="15%">Welspun corp Limited</th><th width="15%">Torrent Gas Ltd</th><th width="15%">HFW</th><th width="15%">Qty. 50 Km</th></tr>';
	        //}
	        
	        //print_r($records);exit;

	        $j=1;
	        foreach($records as $row){

	        	$srno = isset($row[0]) ? $row[0] : '';
				$commodity = isset($row[1]) ? $row[1] : '';
				$description = isset($row[2]) ? $row[2] : '';
				$manufacturer = isset($row[3]) ? $row[3] : '';
				$client = isset($row[4]) ? $row[4] : '';
				$types = isset($row[5]) ? $row[5] : '';
				$quantity = isset($row[6]) ? $row[6] : '';

				//$pdf7 = '<tr><th width="10%"><b>'.$srno.'</b></th><th width="15%"><b>'.$commodity.'</b></th><th width="25%"><b>'.$description.'</b></th><th width="15%"><b>'.$manufacturer.'</b></th><th width="15%"><b>'.$client.'</b></th><th width="15%"><b>'.$types.'</b></th><th width="15%"><b>'.$quantity.'</b></th></tr>';

			  if (!empty($commodity)) {
				$pdf7 = '<tr>';
				for ($q=0;$q<=($highestColumnIndex-1);$q++) {
					$pdf7 .= '<th width="15%"><b>'.$row[$q].'</b></th>';
				}
				$pdf7 .= '</tr>';

	        	if($j==1) {
	        		$headings = $pdf7;
	        	} else {
	        		$details[] = $pdf7;
	        	}

	           $j++;
	           }	
	        }	

	        $pdf1 .= '</table>';

	        //echo $headings;exit;
	        //print_r($details);exit;
	        $presentation_details =  array_chunk($details, 6);
	        //print_r($presentation_details);exit;

	        $pdf1 = $headings;	
	        //$cnt = ceil($total_rows/6);
	        /*for ($j=1;$j<=6;$j++) {
		        for ($p=0;$p<count($presentation_details[$j-1]);$p++) {
		        	$pdf1 .= $presentation_details[$j-1][$p];	
		        }
	    	}*/
	    	for ($j=0;$j<count($details);$j++) {
	    	    $pdf1 .= $details[$j];
	    	}    
	    	
            //echo $pdf1;exit;
	        $content = '<br /><br /><br /><br /><br /><br />';

	        //$content .= '<h1 align="left">Clients We Served</u><br /><br />';  
	        $content .= '<font size="24" font-weight="bold" bgcolor="#BDC3C7">'.$commodity_name.'</font><br /><br />';  

       		#$content .= $pdf1;
       		//$content .= '<table border="1" cellspacing="0" cellpadding="5" width="800">';
       		//$content .=  $headings;
       		//$content .= '</table>';

       		/*$cnt = ceil($total_rows/6);
	        for ($i=0;$i<$cnt;$i++) {
	        	//print_r($presentation_details[$i]);exit;
	        	$pdf8 = '<table border="1" cellspacing="0" cellpadding="5" width="800">';
	        	$pdf8 .= $headings;
	        	for ($p=0;$p<count($presentation_details[$i]);$p++) {
	        		#echo $presentation_details[$i][$p];
	        		$pdf8 .= $presentation_details[$i][$p];	        		

	        	}
	        	$pdf8 .= '</table>';
	        	$content .= $pdf8;
	        	//echo '===========';
	        } */     		
	        //exit;

	        $content .= '<table><tr><td width="8%"></td><td width="50%"><table border="1" cellspacing="0" cellpadding="5" width="800">';  
        	$content .= $pdf1;
        	$content .= '</table></td><td width="45%"></td></tr></table>';

       		$pdf->SetFont('helvetica', '', 10);

	        $pdf->SetTextColor(0, 63, 127);
	        //ob_clean();
	        // Send PDF on output
	        //$pdf->Output(BASE_PATH.'uploads/tech.pdf', 'F');
	        /*$cnt = ceil($total_rows/6);
	        for ($i=1;$i<=$cnt;$i++) {
	        	//$content .= $pdf1;$headings
	        	$pdf->AddPage();  

	        	/*$pdf8 = '<table border="1" cellspacing="0" cellpadding="5" width="800">';
	        	$pdf8 .= $headings;
	        	for ($p=0;$p<count($presentation_details[$i]);$p++) {
	        		#echo $presentation_details[$i][$p];
	        		$pdf8 .= $presentation_details[$i][$p];	        		

	        	}
	        	$pdf8 .= '</table>';
	        	$content .= $pdf8;*/

		        
		        /*$image_file = BASE_PATH.'/assets/img/dacpl_logo2.jpg';
		        $pdf->Image($image_file, 250, 0,88, 13, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);   
		        $pdf->writeHTML($content);
	        }*/

	        //$pdf->AddPage();
	        $pdf->AddPage('L'); 

	        //$image_file = BASE_PATH.'/assets/img/dacpl_logo2.jpg';
	        $image_file1 = BASE_PATH.'/assets/img/dl5.jpg';
		    //$pdf->Image($image_file, 240, 0,98, 13, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);  
		    $pdf->Image($image_file1, 10, 5, 0, 0, 'JPG', '', '', true, 300, '', false, false, 0, false, false, true); 

		    //$image_file2 = BASE_PATH.'/assets/img/dl2.jpg';
		    //$pdf->Image($image_file2, 0, 175, 0, 0, 'JPG', '', '', true, 300, '', false, false, 0, false, false, true); 

		    $pdf->writeHTML($content);
  
	        //$pdf->Output($filepath, 'I');
	        $pdf->Output($filepath, 'F');

	        $_POST['commodity_link_path'] = $filehttppath;
	        $_POST['commodity_source_file_path'] = $file;
	        $_POST['user_id'] = $_SESSION['emp_id'];	
    		$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;

	        $resultdata = $this->Commodity_master->addCommodityLinkData($_POST);	

    		if ($resultdata) { 
				// Convert Excel Data into PDF for presentation
        		$redirect_url = BASE_PATH."Dashboard?msg=1";
            	redirect($redirect_url);	
            }        	 	

		} else {
			//print_r($_SESSION);exit;
			$getEmpDetails = $this->User_master->getEmpDetails($_SESSION['emp_id']);	
			//print_r($getEmpDetails);exit;

			$getCommodityDetails = $this->Commodity_master->getAllCommodities();
	    	//print_r($getCommodityDetails);exit;	

			//$this->load->view('dashboard');
			$this->data['module']='uploadpresentation';
			$this->data['emp_details']=$getEmpDetails;
			$this->data['commodity_details']=$getCommodityDetails;
			$this->data['layout_body']='uploadpresentation';
		 	$this->load->view('admin/layout/main_app_upload', $this->data);
		}

	}










	public function index_prev()
	{
		if (!isset($_SESSION['emp_code'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}
		$this->load->model('User_master');
		$this->load->model('Commodity_master');

		
		if ($_POST) { 
			
			//load our new PHPExcel library
        	$this->load->library('excel');
        	$this->load->library('Pdfimage2');
			 //print_r($_FILES);exit;
        	 if(isset($_FILES['commodity_file']['name']) && $_FILES['commodity_file']['name'] != "") {
        	 	//print_r($_POST);exit;
        	 	$allowedExtensions = array("xls","xlsx","csv");
        		$ext = pathinfo($_FILES['commodity_file']['name'], PATHINFO_EXTENSION);
        	 	
        		$file_name = explode(".",$_FILES['commodity_file']['name']);
        		
        		if(in_array($ext, $allowedExtensions)) {
        			$file = "uploads/".$file_name[0]."_".date('dmYHis').".".$ext;
        			$isUploaded = copy($_FILES['commodity_file']['tmp_name'], $file);
        			if($isUploaded) {
        				try { 
	                        // load uploaded file
	                        $objPHPExcel = PHPExcel_IOFactory::load($file);
                    	} catch (Exception $e) { echo 'nooooo';exit;
                            die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
                    	}

                    	$sheet = $objPHPExcel->getSheet(0);
                    	$total_rows = $sheet->getHighestRow();
                    	//print_r($total_rows);exit;

                    	$highestColumn = $sheet->getHighestColumn();
                    	$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

                    	for ($row = 1; $row <= $total_rows; ++ $row) {
                    		for ($col = 0; $col < $highestColumnIndex; ++ $col) {
                    			$cell = $sheet->getCellByColumnAndRow($col, $row);
                    			$val = $cell->getValue();
                    			$records[$row][$col] = $val;
                    		}	
                    	}
                    	//print_r($records);exit;	
        			}	

        		} else {
        			die('Error loading file, This Extension of File is not Supported!!!');
        		}	

        	 }

        	 // Export Excel Data to PDF for presentatio - Logic starts here

        	$filename = "\DACPL_Presentation_".date('dmYHis').".pdf";
        	$filehttpname = "DACPL_Presentation_".date('dmYHis').".pdf";
        	$filepath =  APP_PATH.'\files'.$filename;
        	$filehttppath =  BASE_PATH.'files/'.$filehttpname;
        
        	// Create new PDF document.
        	$pdf = new TCPDI(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        	// set document information
	        $pdf->SetCreator(PDF_CREATOR);
	        $pdf->SetAuthor('Shivaji Dalvi');
	        $pdf->SetTitle('DACPL Presentation');
	        $pdf->SetSubject('DACPL Presentation');
	        $pdf->SetKeywords('DACPL Presentation');

	        $pdf->SetPrintHeader(false);

	        $policyPdfPath = BASE_PATH.'/uploads/tech_dacpl_presentation.pdf';
	        $pagecount = $pdf->setSourceFile($policyPdfPath);
	        for ($i = 1; $i <= $pagecount; $i++) {
	            $tplidx = $pdf->importPage($i);
	            $pdf->AddPage('L','DACPL');
	            $pdf->useTemplate($tplidx);
	            // Add agreement text in document footer
	            //$pdf->SetXY(15,282);
	            //$pdf->Cell(180, 5, "Documento approvato da tttt il 1111", 0, 0, 'C');
	        }

	        $pdf1 = '<table border="1" cellspacing="0" cellpadding="5" width="800">';
	        //$pdf1 .= '<tr><th width="10%"><b>Sr.No.</b></th><th width="15%"><b>Commodity</b></th><th width="25%"><b>Description</b></th><th width="15%"><b>Manufacturer</b></th><th width="15%"><b>Client name</b></th><th width="15%"><b>Types</b></th><th width="15%"><b>Quantity</b></th></tr>';
	        //for ($j=1;$j<=6;$j++) {
	        //$pdf1 .= '<tr><th width="10%"><b>'.$j.'</b></th><th width="15%">PIPE</th><th width="25%">20" x 0.75" DSAW Straight DRL API 5L X60 MS, PSL 2, Class IV Sour Service.20" x 0.75" DSAW Straight DRL API 5L X60 DSAW Straight DRL API 5L X60 DSAW.</th><th width="15%">Welspun corp Limited</th><th width="15%">Torrent Gas Ltd</th><th width="15%">HFW</th><th width="15%">Qty. 50 Km</th></tr>';
	        //}

	        $j=1;
	        foreach($records as $row){

	        	$srno = isset($row[0]) ? $row[0] : '';
				$commodity = isset($row[1]) ? $row[1] : '';
				$description = isset($row[2]) ? $row[2] : '';
				$manufacturer = isset($row[3]) ? $row[3] : '';
				$client = isset($row[4]) ? $row[4] : '';
				$types = isset($row[5]) ? $row[5] : '';
				$quantity = isset($row[6]) ? $row[6] : '';

	        	//$pdf1 .= '<tr><th width="10%"><b>'.$srno.'</b></th><th width="15%"><b>'.$commodity.'</b></th><th width="25%"><b>'.$description.'</b></th><th width="15%"><b>'.$manufacturer.'</b></th><th width="15%"><b>'.$client.'</b></th><th width="15%"><b>'.$types.'</b></th><th width="15%"><b>'.$quantity.'</b></th></tr>';

	        	$pdf7 = '<tr><th width="10%"><b>'.$srno.'</b></th><th width="15%"><b>'.$commodity.'</b></th><th width="25%"><b>'.$description.'</b></th><th width="15%"><b>'.$manufacturer.'</b></th><th width="15%"><b>'.$client.'</b></th><th width="15%"><b>'.$types.'</b></th><th width="15%"><b>'.$quantity.'</b></th></tr>';

	        	if($j==1) {
	        		$headings = $pdf7;
	        	} else {
	        		$details[] = $pdf7;
	        	}

	           $j++;	
	        }	

	        $pdf1 .= '</table>';

	        //echo $headings;exit;
	        //print_r($details);exit;
	        $presentation_details =  array_chunk($details, 6);
	        //print_r($presentation_details);exit;

	        $pdf1 = $headings;	
	        $cnt = ceil($total_rows/6);
	        for ($j=1;$j<=6;$j++) {
		        for ($p=0;$p<count($presentation_details[$j-1]);$p++) {
		        	$pdf1 .= $presentation_details[$j-1][$p];	
		        }
	    	}

	        $content = '<br /><br /><br />';

	        //$content .= '<h1 align="left">Clients We Served</u><br /><br />';  
	        $content .= '<font size="24" font-weight="bold" bgcolor="#BDC3C7">Clients We Served</font><br /><br />';  

       		#$content .= $pdf1;
       		//$content .= '<table border="1" cellspacing="0" cellpadding="5" width="800">';
       		//$content .=  $headings;
       		//$content .= '</table>';

       		/*$cnt = ceil($total_rows/6);
	        for ($i=0;$i<$cnt;$i++) {
	        	//print_r($presentation_details[$i]);exit;
	        	$pdf8 = '<table border="1" cellspacing="0" cellpadding="5" width="800">';
	        	$pdf8 .= $headings;
	        	for ($p=0;$p<count($presentation_details[$i]);$p++) {
	        		#echo $presentation_details[$i][$p];
	        		$pdf8 .= $presentation_details[$i][$p];	        		

	        	}
	        	$pdf8 .= '</table>';
	        	$content .= $pdf8;
	        	//echo '===========';
	        } */     		
	        //exit;

	        $content .= '<table border="1" cellspacing="0" cellpadding="5" width="800">';  
        	$content .= $pdf1;
        	$content .= '</table>';

       		$pdf->SetFont('helvetica', '', 10);

	        $pdf->SetTextColor(0, 63, 127);
	        //ob_clean();
	        // Send PDF on output
	        //$pdf->Output(BASE_PATH.'uploads/tech.pdf', 'F');
	        $cnt = ceil($total_rows/6);
	        for ($i=1;$i<=$cnt;$i++) {
	        	//$content .= $pdf1;$headings
	        	$pdf->AddPage();  

	        	/*$pdf8 = '<table border="1" cellspacing="0" cellpadding="5" width="800">';
	        	$pdf8 .= $headings;
	        	for ($p=0;$p<count($presentation_details[$i]);$p++) {
	        		#echo $presentation_details[$i][$p];
	        		$pdf8 .= $presentation_details[$i][$p];	        		

	        	}
	        	$pdf8 .= '</table>';
	        	$content .= $pdf8;*/

		        
		        $image_file = BASE_PATH.'/assets/img/dacpl_logo2.jpg';
		        $pdf->Image($image_file, 250, 0,88, 13, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);   
		        $pdf->writeHTML($content);
	        }
  
	        //$pdf->Output($filepath, 'F');
	        $pdf->Output($filepath, 'F');

	        $_POST['commodity_link_path'] = $filehttppath;
	        $_POST['commodity_source_file_path'] = $file;
	        $_POST['user_id'] = $_SESSION['emp_id'];	
    		$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;

	        $resultdata = $this->Commodity_master->addCommodityLinkData($_POST);	

    		if ($resultdata) { 
				// Convert Excel Data into PDF for presentation
        		$redirect_url = BASE_PATH."Dashboard?msg=1";
            	redirect($redirect_url);	
            }        	 	

		} else {
			//print_r($_SESSION);exit;
			$getEmpDetails = $this->User_master->getEmpDetails($_SESSION['emp_id']);	
			//print_r($getEmpDetails);exit;

			$getCommodityDetails = $this->Commodity_master->getAllCommodities();
	    	//print_r($getCommodityDetails);exit;	

			//$this->load->view('dashboard');
			$this->data['module']='uploadpresentation';
			$this->data['emp_details']=$getEmpDetails;
			$this->data['commodity_details']=$getCommodityDetails;
			$this->data['layout_body']='uploadpresentation';
		 	$this->load->view('admin/layout/main_app_upload', $this->data);
		}

	}

	public function fetch_commodity()
	{
		$this->load->model('commodity_master'); 
		
		echo $this ->commodity_master->fetch_commodity($this->input->post('commodity'));
	}	
}
