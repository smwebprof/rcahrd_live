<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'company_master'; 
    } 

    function getCountries($params = array()){ 

        $querystring = "SELECT * FROM countries order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getStates($country_id){ 

        $querystring = "SELECT * FROM states where country_id = '".$country_id."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCities($state_id){ 

        $querystring = "SELECT * FROM cities WHERE state_id = '".$state_id."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    
    function fetch_states($country_id)
    {
  
      $querystring = "SELECT * FROM states WHERE country_id = '".$country_id."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select State</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      };

      return $output;

    }

    function fetch_city($state_id)
    {
  
      $querystring = "SELECT * FROM cities WHERE state_id = '".$state_id."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();

      $output = '<option value="">Select City</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      };
      
      return $output;

    }  

    function fetch_countrycode($country_id){ 

        $querystring = "SELECT phonecode FROM countries where id = '".$country_id."'";
        $queryforpubid = $this->db->query($querystring);
        $output = '';
        $result = $queryforpubid->result_array();
        foreach($result as $row)
        {
          $output .= '<option value="'.$row['phonecode'].'">'.$row['phonecode'].'</option>';
        };
        return $output;

        #return $result[0]['phonecode'];

    }

    function fetch_phonecode($country_id){ 

        $querystring = "SELECT phonecode FROM countries where id = '".$country_id."'";
        $queryforpubid = $this->db->query($querystring);
        $output = '';
        $result = $queryforpubid->result_array();

        return $result[0]['phonecode'];

    }    

}
