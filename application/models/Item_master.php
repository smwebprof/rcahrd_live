<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_master extends CI_Model{ 

    function getAllItems(){ 

        $querystring = "SELECT * FROM items_master WHERE is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    } 

    function getAllItemsGroups(){ 

        $querystring = "SELECT * FROM items_group_master WHERE is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function addItemGroups($data){
    if(empty($data))
      return FALSE;

    $result = array('name'=>$data['item_groupname'],'short_name'=>$data['item_shortname'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    //print_r($result);exit;
    $this->db->insert('items_group_master',$result);
    return $this->db->insert_id();

   }

    
    
}
