<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'client_master'; 
        $this->load->model('company_master');
    } 

    function getClientdata(){  //$id

        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master where is_active = $id";
        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master order by client_name";
        $querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM client_master where (client_type = 'Client' or client_type is null or client_type = 'Foreign') order by client_name";
        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master where (client_type = 'Client' or client_type is null) and user_comp_id =".$_SESSION['comp_id']." and branch_id =".$_SESSION['branch_id']."  order by client_name";
        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master Where (client_type != 'Creditor' OR client_type != 'Foreign') order by client_name";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

}
