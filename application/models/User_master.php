<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_master extends CI_Model{ 

    function getRows($params){ 

        $querystring = "SELECT * FROM emp_master WHERE emp_id = '".$params['emp_code']."' and permanent_password = '".$params['password']."' and is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getRowsEmail($params){ 

        $querystring = "SELECT * FROM emp_master WHERE email_address = '".$params['emp_code']."' and permanent_password = '".$params['password']."' and is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getRowsByEmpCode($params){ 

        $querystring = "SELECT * FROM emp_master WHERE emp_id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getRowsByEmpEmail($params){ 

        $querystring = "SELECT * FROM emp_master WHERE email_address = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateUserPass($data){
        //print_r($data);exit;
        $result = array('permanent_password'=>$data['password'],'password_change_flag'=>'Y');
        //print_r($result);exit;
        $this->db->where('emp_id', $data['emp_code']);
        $this->db->update('emp_master',$result);
        //echo $this->db->last_query();exit;
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);


   }

   public function updateUserPassEmail($data){
        //print_r($data);exit;
        $result = array('permanent_password'=>$data['password'],'password_change_flag'=>'Y');
        //print_r($result);exit;
        $this->db->where('email_address', $data['emp_code']);
        $this->db->update('emp_master',$result);
        //echo $this->db->last_query();exit;
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);


   }

   function getEmpDetails($params){ 

        $querystring = "SELECT em.id,em.emp_first_name,em.emp_last_name,em.emp_id FROM emp_master em WHERE em.id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getFullEmpDetails($params){ 

        $querystring = "SELECT em.emp_first_name,em.emp_last_name,em.emp_id,em.joining_date,bm.branch_name,dp.department_name,dm.designation_name,emp.emp_first_name fname,emp.emp_last_name lname,em.add_self_form FROM emp_master em left join designation_master dm ON em.designation_master_id = dm.id left join department_master dp ON em.department_id = dp.id left join branch_master bm ON em.branch_id = bm.id left join emp_master emp ON emp.id = em.reporting_emp_id WHERE em.id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getEmpReportDetails(){ 

        $querystring = "SELECT em.id,em.emp_first_name,em.emp_last_name,em.emp_id,em.emp_first_name fname,em.emp_last_name lname FROM emp_master em";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllEmpDetails(){ 

        $querystring = "SELECT * FROM emp_master order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function addEmpDetails($data){
    if(empty($data))
      return FALSE;

    $result = array('emp_first_name'=>$data['emp_fname'],'emp_middle_name'=>$data['emp_mname'],'emp_last_name'=>$data['emp_lname'],'email_address'=>$data['emp_email'],'emp_id '=>$data['emp_code'],'is_admin'=>$data['emp_type'],'temporary_password'=>$data['emp_pass'],'entryid'=>$data['user_id'],'entrydate'=>$data['dt'],'is_active'=>1);
    //print_r($result);exit;
    $this->db->insert('emp_master',$result);
    return $this->db->insert_id();

   }

   function getEmpUserDetails($params){  

        $querystring = "SELECT * FROM emp_master where id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);
        $result = $queryforpubid->result_array();
        //print_r($result);exit;
        return @$result;
    }

    public function updateEmpDetails($data){
      //print_r($data);exit;  
      $result = array('emp_first_name'=>$data['emp_fname'],'emp_middle_name'=>$data['emp_mname'],'emp_last_name'=>$data['emp_lname'],'email_address'=>$data['emp_email'],'emp_id '=>$data['emp_code'],'is_admin'=>$data['emp_type'],'modifyid'=>$data['user_id'],'modifydate'=>$data['dt']); 
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('emp_master',$result);
      //echo $this->db->last_query();exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

    function getLoginYr(){ 

        $querystring = "SELECT * FROM rca_operation_year WHERE is_active = '1'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function Updateselfformstatus($data){

      $result = array('add_self_form'=>'Y'); 
      
      //print_r($result);exit;
      $this->db->where('id', $data);
      $this->db->limit(1);
      $this->db->update('emp_master',$result);
      //echo $this->db->last_query();exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

    
    
}
