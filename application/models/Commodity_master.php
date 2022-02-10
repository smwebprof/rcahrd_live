<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commodity_master extends CI_Model{ 

    function getAllCommodities(){ 

        $querystring = "SELECT * FROM commodity_master WHERE is_active = 1";
        #$querystring = "SELECT cm.*,sgm.name FROM commodity_master cm left join sub_group_master sgm ON cm.sub_group_id=sgm.id WHERE cm.is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    } 

    function getAllSubGroups(){ 

        #$querystring = "SELECT * FROM sub_group_master WHERE is_active = 1";
        $querystring = "SELECT sgm.*,cm.commodity_name FROM sub_group_master sgm left join commodity_master cm ON cm.id=sgm.commodity_id WHERE sgm.is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function addSubGroups($data){
    if(empty($data))
      return FALSE;

    $result = array('name'=>$data['sub_groupname'],'commodity_id'=>$data['commodity'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    //print_r($result);exit;
    $this->db->insert('sub_group_master',$result);
    return $this->db->insert_id();

   }

   function getSubGroupsDetails($params){  

        $querystring = "SELECT * FROM sub_group_master where id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);
        $result = $queryforpubid->result_array();
        //print_r($result);exit;
        return @$result;
   }

   public function updatSubGroupsDetails($data){
      //print_r($data);exit;  
      $result = array('name'=>$data['sub_groupname'],'commodity_id'=>$data['commodity'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']); 
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('sub_group_master',$result);
      //echo $this->db->last_query();exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   public function addCommodityDetails($data){
    if(empty($data))
      return FALSE;

    $result = array('commodity_name'=>$data['commodity_name'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1); // ,'sub_group_id'=>$data['subgroup']
    //print_r($result);exit;
    $this->db->insert('commodity_master',$result);
    return $this->db->insert_id();

   }

   function getCommodityDetailsById($params){  

        $querystring = "SELECT * FROM commodity_master where id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);
        $result = $queryforpubid->result_array();
        //print_r($result);exit;
        return @$result;
   }


   public function updateCommodityDetails($data){
      //print_r($data);exit;  
      $result = array('commodity_name'=>$data['commodity_name'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']); //,'sub_group_id'=>$data['subgroup']
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('commodity_master',$result);
      //echo $this->db->last_query();exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   public function addCommodityLinkData($data){
    if(empty($data))
      return FALSE;

    $result = array('commodity_id'=>$data['commodity'],'sub_group_id'=>$data['commodity_type'],'commodity_link_path'=>$data['commodity_link_path'],'commodity_source_file_path'=>$data['commodity_source_file_path'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    //print_r($result);exit;
    $this->db->insert('commodity_link_master',$result);
    return $this->db->insert_id();

   }


   function getDashboardData($type){ 

        if ($type=='Admin') {
            $querystring = "SELECT clm.*,cm.commodity_name,um.emp_first_name,um.emp_last_name,sgm.name FROM commodity_link_master clm left join commodity_master cm ON cm.id=clm.commodity_id left join emp_master um ON cm.entry_user_id=um.id left join sub_group_master sgm ON sgm.id=clm.sub_group_id order by id desc";
        } else {
            $querystring = "SELECT clm.*,cm.commodity_name,um.emp_first_name,um.emp_last_name,sgm.name FROM commodity_link_master clm left join commodity_master cm ON cm.id=clm.commodity_id left join emp_master um ON cm.entry_user_id=um.id left join sub_group_master sgm ON sgm.id=clm.sub_group_id Where clm.entry_user_id = '".$_SESSION['emp_id']."' order by id desc";
        } 
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


   function getCommodityLinkDetailsById($params){  

        $querystring = "SELECT * FROM commodity_link_master where id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);
        $result = $queryforpubid->result_array();
        //print_r($result);exit;
        return @$result;
   } 

   public function addCommodityLinkDetails($data){
    if(empty($data))
      return FALSE;

    $result = array('link_id'=>$data['link_id'],'client_name'=>$data['link_client'],'user_email'=>$data['link_email'],'sent_flag'=>$data['sent_flag'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    //print_r($result);exit;
    $this->db->insert('sent_link_master',$result);
    return $this->db->insert_id();

   }

   public function updateCommodityLinkDetailsByQR($data){
      //print_r($data);exit;  
      $result = array('qr_code_path'=>$data['qr_path'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']); //,'sub_group_id'=>$data['subgroup']
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('commodity_link_master',$result);
      //echo $this->db->last_query();exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }


   function fetch_commodity($params){  

        $querystring = "SELECT * FROM sub_group_master where commodity_id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);
        $result = $queryforpubid->result_array();
        $output = '<option value="">Select</option>';
        $output = '<option value="all">All</option>';
        foreach($result as $row)
        {
           $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        };

        return $output;
   }

   public function addClientmaster($data){
    if(empty($data))
      return FALSE;

    $result = array('client_type'=>$data['client_type'],'client_name'=>$data['client_name'],'email_address'=>$data['link_email'],'address'=>$data['office_address'],'tel_no'=>$data['client_no'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>$data['is_active'],);
    //print_r($result);exit;
    $this->db->insert('client_master',$result);
    return $this->db->insert_id();

   }

    
    
}
