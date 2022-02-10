<?php
/*
* Author: onlinecode
* start Pdf.php file
* Location: ./application/libraries/Pdf.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
require_once dirname(__FILE__) . '/tcpdf/tcpdi.php';
class Pdfimage2 extends TCPDF
{
    protected $processId = 0;
    protected $header = '';
    protected $footer = '';
    static $errorMsg = '';

    function __construct()
    {
        parent::__construct();
        
    }

    public function Header() { 
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $image_file = BASE_PATH.'/assets/img/dacpl_logo2.jpg';
        $this->Image($image_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }

}


/* end Pdf.php file */
?>