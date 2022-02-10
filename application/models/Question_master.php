<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_master extends CI_Model{ 

    function getRows(){ 

        $querystring = "SELECT * FROM question_bank_self_assesment"; // WHERE is_active = 1
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCategoryRows($params){ 

        $querystring = "SELECT * FROM self_assesment_category_questions WHERE question_id = '".$params."'"; 
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

    public function updateUserPass($data){
        //print_r($data);exit;
        $result = array('permanent_password'=>$data['password'],'password_change_flag'=>'Y');
        //print_r($result);exit;
        $this->db->where('emp_id', $data['emp_code']);
        $this->db->update('emp_master',$result);
        //echo $this->db->last_query();exit;
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);


   }

   public function addassesmentdata($data){
    if(empty($data))
      return FALSE;

    //$querystring = "DELETE FROM response_self_assesment where   id = '".$data['user_self_id']."' and empid = '".$_SESSION['emp_id']."' and form_id = '".$data['form_id']."'";
    //$queryforpubid = $this->db->query($querystring);
    
    $result = array('empid'=>$_SESSION['emp_id'],'empcode'=>$_SESSION['emp_code'],'form_id'=>$data['form_id'],'status'=>$data['status'],'is_verfied_by_admin'=>'N','entryid'=>$_SESSION['emp_id'],'op_year'=>$_SESSION['op_year']);
    //print_r($result);exit;
    $this->db->insert('response_self_assesment',$result);

    return $this->db->insert_id();

   }

   public function editassesmentdata($data){
    if(empty($data))
      return FALSE;

    $querystring = "DELETE FROM response_self_assesment where   id = '".$data['user_self_id']."' and empid = '".$_SESSION['emp_id']."' and form_id = '".$data['form_id']."'";
        $queryforpubid = $this->db->query($querystring);
    
    $result = array('empid'=>$_SESSION['emp_id'],'empcode'=>$_SESSION['emp_code'],'form_id'=>$data['form_id'],'status'=>$data['status'],'is_verfied_by_admin'=>'N','entryid'=>$_SESSION['emp_id'],'op_year'=>$_SESSION['op_year']);
    //print_r($result);exit;
    $this->db->insert('response_self_assesment',$result);

    return $this->db->insert_id();

   }

   public function addassesmentdetails($data){
    if(empty($data))
      return FALSE;
    //print_r($data);exit;
    //$querystring = "DELETE FROM response_self_assesment_details where assesment_id = '".$data['user_self_id']."' and empid = '".$_SESSION['emp_id']."' and form_id = '".$data['form_id']."'";
    //$queryforpubid = $this->db->query($querystring);
    
    for ($i=0;$i<$data['total_questions'];$i++) {
       $self_que_ans = 'self_que_'.$data['main_question'][$i];
       $str = explode('|',$data[$self_que_ans]);
       if (count($str)>1) {
         $breifanswer = $str[0];
         $correct_option_id = $str[1];
       } else {
         $breifanswer = $data[$self_que_ans];
       }
        
            $result = array('assesment_id'=>$data['assesment_id'],'empid'=>$_SESSION['emp_id'],'empcode'=>$_SESSION['emp_code'],'question_id'=>$data['main_question'][$i],'breifanswer'=>$breifanswer,'correct_option_id'=>@$correct_option_id,'form_id'=>$data['form_id']);
            //print_r($result);exit;
            $this->db->insert('response_self_assesment_details',$result);
        }
    //print_r($result);exit;
    return $this->db->insert_id();

   }

   public function editassesmentdetails($data){
    if(empty($data))
      return FALSE;
    //print_r($data);exit;
    $querystring = "DELETE FROM response_self_assesment_details where assesment_id = '".$data['user_self_id']."' and empid = '".$_SESSION['emp_id']."' and form_id = '".$data['form_id']."'";
    $queryforpubid = $this->db->query($querystring);
    
    for ($i=0;$i<$data['total_questions'];$i++) {
       $self_que_ans = 'self_que_'.$data['main_question'][$i];
       $str = explode('|',$data[$self_que_ans]);
       if (count($str)>1) {
         $breifanswer = $str[0];
         $correct_option_id = $str[1];
       } else {
         $breifanswer = $data[$self_que_ans];
       }
        
            $result = array('assesment_id'=>$data['assesment_id'],'empid'=>$_SESSION['emp_id'],'empcode'=>$_SESSION['emp_code'],'question_id'=>$data['main_question'][$i],'breifanswer'=>$breifanswer,'correct_option_id'=>@$correct_option_id,'form_id'=>$data['form_id']);
            //print_r($result);exit;
            $this->db->insert('response_self_assesment_details',$result);
        }
    //print_r($result);exit;
    return $this->db->insert_id();

   }

   function getSelfDetails($params,$id){ 

        $querystring = "select * from question_bank_self_assesment qbsa,response_self_assesment_details rsad where qbsa.id = rsad.question_id and rsad.question_id='".$params."' and rsad.assesment_id='".$id."' and rsad.form_id=1";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function Updateformmaster($data){

      $result = array('status'=>'Inprogress','is_verfied_by_admin'=>'Y'); // ,'description'=>$data['description']
      
      //print_r($result);exit;
      $this->db->where('id', $data);
      $this->db->limit(1);
      $this->db->update('response_self_assesment',$result);
      //echo $this->db->last_query();exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function getRowsstatus($params){ 

        $querystring = "select * from response_self_assesment where id='".$params."' and form_id=1";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function Updateaddformstatus(){

      $result = array('add_self_form'=>'N');
      
      //print_r($result);exit;
      $this->db->where('id', $_SESSION['emp_id']);
      $this->db->limit(1);
      $this->db->update('emp_master',$result);
      //echo $this->db->last_query();exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }
   
}
