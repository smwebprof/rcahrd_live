<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interaction_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'client_interaction_report'; 
    } 

    public function addInteractiondata($data){

    if(empty($data))
      return FALSE;

    $result = array('client_id'=>$data['client_id'],'interaction_date'=>$data['interaction_date'],'location_interaction'=>$data['location_interaction'],'phone_interaction'=>$data['phone_interaction'],'attendees_client_side'=>$data['client_attendees'],'attendees_agrimin'=>$data['aci_attendees'],'purpose_of_meeting'=>$data['purpose_meeting'],'sales_target'=>$data['sales_target'],'specific_issue'=>$data['specific_issue'],'client_complant'=>$data['client_complaint'],'summary_of_items_discussed'=>$data['items_discussed'],'summary_of_action_points'=>$data['action_points'],'  purpose_of_meeting_achieved'=>$data['purpose_acheived'],'action_tobe_taken_to_achieve_said_purpose'=>$data['action_acheived'],'team_aci_followup_with_client'=>$data['aci_followup'],'client_complant'=>$data['client_complaint'],'entry_user_id'=>$data['entry_user_id'],'modify_user_id'=>$data['modify_user_id'],'entry_date'=>$data['entry_date'],'modify_date'=>$data['modify_date'],'is_active'=>0);
    #print_r($result);exit;
    $this->db->insert('client_interaction_report',$result);
    return $this->db->insert_id();

   }

   public function addClientmaster($data){

    if(empty($data))
      return FALSE;

    $result = array('contact_name'=>$data['full_name'],'job_title'=>$data['job_title'],'client_name'=>$data['company'],'country_id'=>$data['country_id'],'state_id'=>$data['state_id'],'city_id'=>$data['city_id'],'address'=>$data['office_address'],'contact_mobile'=>$data['mobile_no'],'contact_email'=>$data['email_address'],'contact_email'=>$data['email_address'],'alt_contact'=>$data['alt_no'],'company_web_page'=>$data['company_web'],'entry_user_id'=>$data['entry_user_id'],'modify_user_id'=>$data['modify_user_id'],'entry_date'=>$data['entry_date'],'modify_date'=>$data['modify_date'],'is_active'=>0);
    #print_r($result);exit;
    $this->db->insert('agrimin_client_master',$result);
    return $this->db->insert_id();

   }


    function getInteractiondata(){ 

        $querystring = "SELECT acir.*,acm.client_name,acm.address,acm.country_code,acm.tel_no,acm.company_web_page,acnt.name country,ast.name state,act.name city,em.emp_first_name,em.emp_last_name FROM client_interaction_report acir 
          left join client_master acm ON acir.client_id=acm.id 
          left join countries acnt ON acnt.id=acm.country_id
          left join states ast ON ast.id=acm.state_id
          left join cities act ON act.id=acm.city_id
          left join emp_master em ON em.id=acir.entry_user_id
          order by acir.id desc";
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;
    }

    function getFollowupdataSearch($data){ 

       $search = '';
       if (@$data['from_followup_date'] || @$data['to_followup_date']) {
          $data['from_followup_date'] = str_replace('/','-',$data['from_followup_date']);
          $data['to_followup_date'] = str_replace('/','-',$data['to_followup_date']);

          $search .= ' and date(cif.followup_date) >= "'.date('Y-m-d',strtotime($data['from_followup_date'])).'" and date(cif.followup_date) <= "'.date('Y-m-d',strtotime($data['to_followup_date'])).'"';
       }

       if (@$data['int_company']) {
          $search .= ' and acm.id = "'.$data['int_company'].'"';
       }

       if (@$data['emp_name']) {
          $search .= ' and em.id = "'.$data['emp_name'].'"';
       }

       $querystring = 'SELECT cif.*,acir.client_id,acm.client_name,em.emp_first_name,em.emp_last_name from   client_interaction_followup cif left join client_interaction_report acir ON acir.id=cif.interaction_id left join client_master acm ON acir.client_id=acm.id left join emp_master em ON em.id=cif.entry_user_id Where acir.is_active = 1 '.$search.'
          order by cif.id desc';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;
    }

    function getInteractiondataSearch($data){ 

       $search = '';
       if (@$data['from_interaction_date'] || @$data['to_interaction_date']) {
          $data['from_interaction_date'] = str_replace('/','-',$data['from_interaction_date']);
          $data['to_interaction_date'] = str_replace('/','-',$data['to_interaction_date']);

          $search .= ' and date(acir.interaction_date) >= "'.date('Y-m-d',strtotime($data['from_interaction_date'])).'" and date(acir.interaction_date) <= "'.date('Y-m-d',strtotime($data['to_interaction_date'])).'"';
       }

       if (@$data['int_company']) {
          $search .= ' and acm.id = "'.$data['int_company'].'"';
       }

       if (@$data['emp_name']) {
          $search .= ' and em.id = "'.$data['emp_name'].'"';
       }

       $querystring = 'SELECT acir.*,acm.client_name,acm.address,acm.country_code,acm.tel_no,acm.company_web_page,acnt.name country,ast.name state,act.name city,em.emp_first_name,em.emp_last_name FROM client_interaction_report acir 
          left join client_master acm ON acir.client_id=acm.id 
          left join countries acnt ON acnt.id=acm.country_id
          left join states ast ON ast.id=acm.state_id
          left join cities act ON act.id=acm.city_id
          left join emp_master em ON em.id=acir.entry_user_id Where acir.is_active = 1 '.$search.'
          order by acir.id desc';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;
    }


    function getInteractionExcelSearch($data){ 

       $search = '';
       if (@$data['file_from_date'] || @$data['file_To_date']) {
          $search .= ' and date(acir.interaction_date) >= "'.date('Y-m-d',strtotime($data['file_from_date'])).'" and date(acir.interaction_date) <= "'.date('Y-m-d',strtotime($data['file_To_date'])).'"';
       }

       if (@$data['clients_name']) {
          $search .= ' and acm.id = "'.$data['clients_name'].'"';
       }

       $querystring =  'SELECT acir.id,acm.client_name,acm.address,acm.country_code,acm.company_web_page,acm.tel_no,acir.interaction_date,acir.location_interaction,acir.phone_interaction,acir.full_name,acir.mobile_office_number,acnt.name country,ast.name state,act.name city,acir.purpose_of_meeting,acir.summary_of_items_discussed,acir.summary_of_action_points,acir.action_tobe_taken_to_achieve_said_purpose,acir.team_aci_followup_with_client FROM client_interaction_report acir 
          left join agrimin_client_master acm ON acir.client_id=acm.id 
          left join agrimin_countries acnt ON acnt.id=acm.country_id
          left join agrimin_states ast ON ast.id=acm.state_id
          left join agrimin_cities act ON act.id=acm.city_id Where acir.is_active = 1 '.$search.' order by acir.id desc';


        /*echo $querystring = "SELECT acir.id,acm.client_name,acm.address,acm.company_web_page,acir.interaction_date,acir.location_interaction,acir.phone_interaction,acir.full_name,acir.mobile_office_number,acnt.name country,ast.name state,act.name city FROM client_interaction_report acir 
          left join agrimin_client_master acm ON acir.client_id=acm.id 
          left join agrimin_countries acnt ON acnt.id=acm.country_id
          left join agrimin_states ast ON ast.id=acm.state_id
          left join agrimin_cities act ON act.id=acm.city_id
          Where aft.is_active = 1 ".$search. 
          order by acir.id desc";exit;*/
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;
    }

    function getInteractiondatabyid($id){ 

        #$querystring = "SELECT * FROM client_interaction_report where id = $id";
        #$querystring = "SELECT acir.*,acm.client_name,acm.address,acm.country_id,acm.state_id,acm.city_id,acm.tel_prefix,acm.tel_no,acm.company_web_page FROM client_interaction_report acir,agrimin_client_master acm where acir.client_id=acm.id and acir.id = $id";
         $querystring = "SELECT acir.*,acm.client_name,acm.address,acm.country_code,acm.tel_no,acm.company_web_page,acnt.name country,ast.name state,act.name city,acm.country_id,acm.state_id,acm.city_id FROM client_interaction_report acir 
          left join client_master acm ON acir.client_id=acm.id 
          left join countries acnt ON acnt.id=acm.country_id
          left join states ast ON ast.id=acm.state_id
          left join cities act ON act.id=acm.city_id
          Where acir.id = $id
          order by acir.id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;
    }

    public function newInteractiondata($data){

    if(empty($data))
      return FALSE;


    $result = array('client_id'=>$data['client_id'],'full_name'=>$data['int_full_name'],'job_title'=>$data['int_job_title'],'mobile_prefix'=>$data['int_mobile_prefix'],'mobile_office_number'=>$data['int_mobile_no'],'email_address'=>$data['int_email_address'],'alt_prefix'=>$data['int_alt_prefix'],'alternate_contact'=>$data['int_alt_no'],'interaction_date'=>$data['interaction_date'],'location_interaction'=>$data['location_interaction'],'phone_interaction'=>$data['phone_interaction'],'attendees_client_side'=>$data['client_attendees'],'attendees_agrimin'=>$data['aci_attendees'],'purpose_of_meeting'=>$data['purpose_meeting'],'sales_target'=>$data['sales_target'],'specific_issue'=>$data['specific_issue'],'client_complant'=>$data['client_complaint'],'summary_of_items_discussed'=>$data['items_discussed'],'summary_of_action_points'=>$data['action_points'],'  purpose_of_meeting_achieved'=>$data['purpose_acheived'],'action_tobe_taken_to_achieve_said_purpose'=>$data['action_acheived'],'team_aci_followup_with_client'=>$data['aci_followup'],'purpose_of_meeting_achieved_path'=>@$data['upl_purpose_file_path'],'action_tobe_taken_to_achieve_said_purpose_path'=>@$data['upl_action_file_path'],'team_aci_followup_with_client_path'=>@$data['upl_acifollow_file_path'],'entry_user_id'=>$data['entry_user_id'],'modify_user_id'=>$data['modify_user_id'],'entry_date'=>$data['entry_date'],'modify_date'=>$data['modify_date'],'is_active'=>1,'summary_of_items_discussed_path'=>@$data['upl_items_discussed_path'],'summary_of_action_points_path'=>@$data['upl_action_points_path'],'followup_flag'=>$data['followup_flag'],'followup_date'=>$data['followup_date'],'followup_text'=>$data['followup_text']);
    
    //print_r($result);exit;
    $this->db->insert('client_interaction_report',$result);
    return $this->db->insert_id();

   }

   public function newClientmaster($data){

    if(empty($data))
      return FALSE;

    $result = array('client_name'=>$data['int_company'],'address'=>$data['int_office_address'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],'city_id'=>$data['company_city'],'country_code'=>$data['int_office_prefix'],'tel_no'=>$data['int_office_no'],'company_web_page'=>$data['int_company_web'],'entry_user_id'=>$data['entry_user_id'],'modify_user_id'=>$data['modify_user_id'],'entry_date'=>$data['entry_date'],'modify_date'=>$data['modify_date'],'user_comp_id'=>@$_SESSION['comp_id'],'is_active'=>0); // ,'is_active'=>0
    
    //print_r($result);exit;
    $this->db->insert('client_master',$result);
    return $this->db->insert_id();

   }

   public function updateInteractiondata($data){
      
      $result = array('client_id'=>$data['client_id'],'full_name'=>$data['int_full_name'],'job_title'=>$data['int_job_title'],'mobile_prefix'=>$data['int_mobile_prefix'],'mobile_office_number'=>$data['int_mobile_no'],'email_address'=>$data['int_email_address'],'alt_prefix'=>$data['int_alt_prefix'],'alternate_contact'=>$data['int_alt_no'],'interaction_date'=>$data['interaction_date'],'location_interaction'=>$data['location_interaction'],'phone_interaction'=>$data['phone_interaction'],'attendees_client_side'=>$data['client_attendees'],'attendees_agrimin'=>$data['aci_attendees'],'purpose_of_meeting'=>$data['purpose_meeting'],'sales_target'=>$data['sales_target'],'specific_issue'=>$data['specific_issue'],'client_complant'=>$data['client_complaint'],'summary_of_items_discussed'=>$data['items_discussed'],'summary_of_action_points'=>$data['action_points'],'  purpose_of_meeting_achieved'=>$data['purpose_acheived'],'action_tobe_taken_to_achieve_said_purpose'=>$data['action_acheived'],'team_aci_followup_with_client'=>$data['aci_followup'],'purpose_of_meeting_achieved_path'=>@$data['upl_purpose_file_path'],'action_tobe_taken_to_achieve_said_purpose_path'=>@$data['upl_action_file_path'],'team_aci_followup_with_client_path'=>@$data['upl_acifollow_file_path'],'entry_user_id'=>$data['entry_user_id'],'modify_user_id'=>$data['modify_user_id'],'entry_date'=>$data['entry_date'],'modify_date'=>$data['modify_date'],'is_active'=>1,'summary_of_items_discussed_path'=>@$data['upl_items_discussed_path'],'summary_of_action_points_path'=>@$data['upl_action_points_path']);
      
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('client_interaction_report',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

      public function updateClientData($data)
      {
      
      $result = array('address'=>$data['int_office_address'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],'city_id'=>$data['company_city'],'country_code'=>$data['int_office_prefix'],'tel_no'=>$data['int_office_no'],'company_web_page'=>$data['int_company_web'],'entry_user_id'=>$data['entry_user_id'],'modify_user_id'=>$data['modify_user_id'],'entry_date'=>$data['entry_date'],'modify_date'=>$data['modify_date']); // ,'is_active'=>0
      
      //print_r($result);exit;
      $this->db->where('id', $data['client_id']);
      $this->db->limit(1);
      $this->db->update('client_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }


    public function updateClientEditData($data)
      {
      
      #$result = array('address'=>$data['int_office_address'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],'city_id'=>$data['company_city'],'tel_prefix'=>$data['int_office_prefix'],'tel_no'=>$data['int_office_no'],'company_web_page'=>$data['int_company_web'],'modify_user_id'=>$data['modify_user_id'],'modify_date'=>$data['modify_date'],'is_active'=>1);

      $result = array('company_web_page'=>$data['int_company_web'],'modify_user_id'=>$data['modify_user_id'],'modify_date'=>$data['modify_date']);  // ,'is_active'=>0
      
      #print_r($result);exit;
      $this->db->where('id', $data['client_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_client_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }


    public function delClientinteraction($id)
      {
      
      /*$result = array('is_active'=>0);
      
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('client_interaction_report',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);*/

      $querystring = "DELETE FROM client_interaction_report where id = $id";
      $queryforpubid = $this->db->query($querystring);

      if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;

    }


    public function fetch_clientdata($id){ 

        #$querystring = "SELECT address,tel_no,company_web_page,email_address,mobile_no,alt_contact FROM agrimin_client_master Where id = $id";
        $querystring = "SELECT acm.*,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid  FROM client_master acm 
                        left join countries acnt ON acnt.id=acm.country_id
                        left join states ast ON ast.id=acm.state_id
                        left join cities act ON act.id=acm.city_id
                        Where acm.id = $id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        //print_r($result[0]);exit; 
        return $result[0];
    }

    public function newMeetingData($data){

    if(empty($data))
      return FALSE;

    $result = array('client_name'=>$data['comp_name'],'user_email'=>$data['emp_email'],'client_email'=>$data['client_email'],'purpose_meeeting'=>$data['purpose'],'client_contact'=>$data['client_no'],'office_address'=>$data['office_address'],'meeting_date'=>$data['schedule_date'],'meeting_time'=>$data['schedule_time'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    
    //print_r($result);exit;
    $this->db->insert('meeting_schedule_master',$result);
    return $this->db->insert_id();

   }

   function getMeetingdata(){ 

        $querystring = "SELECT * FROM meeting_schedule_master order by id desc";
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;
    }


    public function addFollowupData($data){

    $result = array('interaction_id'=>$data['interaction_id'],'followup_flag'=>$data['followup_flag'],'followup_date'=>$data['followup_date'],'followup_text'=>$data['followup_text'],'entry_user_id'=>$data['entry_user_id'],'modify_user_id'=>$data['modify_user_id'],'entry_date'=>$data['entry_date'],'modify_date'=>$data['modify_date'],'is_active'=>0); // ,'is_active'=>0
    
    //print_r($result);exit;
    $this->db->insert('client_interaction_followup',$result);
    return $this->db->insert_id();

   }

   public function updateFollowupdata($data){
      
      $result = array('followup_flag'=>$data['followup_flag'],'followup_date'=>$data['followup_date'],'followup_text'=>$data['followup_text']);
      
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('client_interaction_report',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }


}
