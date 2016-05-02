<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Review_model
 *
 * @author itischarles
 */
class Document_Model extends CI_Model {
   
    function __construct() {
        parent::__construct();
    }
   
    
 
   
    function getLastEntry_docs(){
         
        $this->db->order_by('documentID','DESC');
        $this->db->limit(1);
        $lastEntry = $this->db->get('document')
                                ->row();
        
        return ( !empty($lastEntry) ? $lastEntry->documentID :0 );
  
    }
    
    function listDocuments($where){
        $this->db->join('users','users.userID = document.clientID','LEFT');
        $this->db->order_by('document.docDateAdded','DESC');
         return $this->db->where($where)
                ->get('document')
                ->result();
    }
    
    /**
     * list from attached_docs only
     * @param array $where
     * @return array
     *      */
    function listDocuments_only($where, $limit= false){
      if($limit !== false):
            $this->db->limit($limit);
         endif;
         
        $this->db->order_by('document.docDateAdded','DESC');
         return $this->db->where($where)
                ->get('document')
                ->result();
    }
    
      function getReviewDocuments($where){
        $this->db->join('users','users.userID = document.users_userID','LEFT');
         //$this->db->join('attached_docs','attached_docs.project_id = reviews.wizbang_project_id');
        //$this->db->join('users','users.user_id = reviews.user_id');
         return $this->db->where($where)
                ->get('document')
                ->row();
    }
    
     /**
     * update the attached documents table
     * @param array where
     * @param array content to set
     * @return int
     */
    function updateAttachedDocs($where, $content){
        $this->db->where($where);
        $this->db->update('document',$content);
        return $this->db->affected_rows();
    }
    
    /**
     * add new record to attached_docs
     * @param array $content
     * @return int
     */
    function createAttachment($content){
         $this->db->insert('document',$content);
        return $this->db->insert_id();
    }
    
    
    /**
     * add into the document view history
     */
    function createDocsViewHistory($content){        
        $this->db->insert('docs_view_history',$content);
        return $this->db->insert_id();
        
    }
    
    
    

    
   
 
     
}
