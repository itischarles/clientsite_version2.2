<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Investment_type_model
 *
 * @author itischarles
 */
class Investment_type_model extends CI_Model {

     private $investmentTypeTable = "investment_type";
    
    function __construct() {
        parent::__construct();
    }
    
    
    
     function addNewInvestmentType($data) {

        $this->db->insert($this->investmentTypeTable, $data);
        return $this->db->insert_id();
    }
    
      /**
    * update invest ttable
    * @param array $content
    * @param array $where
    * @return int
    */
   function editInvestmentType($content, $where){
       $this->db->update($this->investmentTypeTable,$content,$where);
	 return $this->db->affected_rows();
   }

      
    function getByID($investmentTypeID)  {
        
        return $this->db->where('investmentTypeID', $investmentTypeID)
                        ->get($this->investmentTypeTable, 1)
                        ->row();
    }
    
 
    function listAll()    {

        return $this->db->get($this->investmentTypeTable)
                        ->result();
    }
    
  
  
}
