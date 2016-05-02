<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Messages_model
 *
 * @author itischarles
 */
class Messages_model extends CI_Model {
   
    function __construct() {
        parent::__construct();
    }
   
    
     function listMessages($where){
        //$this->db->join('users','users.userID = messages.users_userID','LEFT');
        $this->db->order_by('messages.messageDate','DESC');
         return $this->db->where($where)
                ->get('messages')
                ->result();
    }
    
    
    /**
     * add new record to attached_docs
     * @param array $content
     * @return int
     */
    function sendMessage($content){
         $this->db->insert('messages',$content);
        return $this->db->insert_id();
    }
    
    
    function markMessagesAsViewed($content, $where){
	$this->db->where($where);
	$this->db->update('messages',$content);
	
        return $this->db->affected_rows();
    }
}
