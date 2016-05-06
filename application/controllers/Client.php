<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author itischarles
 */
class Client extends MY_Controller {
    
    function __construct() {
	parent::__construct();
    }
    
    
  

    public function addNewClient()  {
	
        if($this->input->post('add_client')):
            
	    $this->form_validation->set_rules('client_reference', 'Reference', 'trim|required|is_unique[clients.client_reference]');
            $this->form_validation->set_rules('userTitle', 'Title', 'trim|required');
            $this->form_validation->set_rules('userFirstName', 'First name', 'trim|required');
            $this->form_validation->set_rules('userLastName', 'Last name', 'trim|required');
            $this->form_validation->set_rules('userAddressLine1', 'Address Line 1', 'trim|required');
            $this->form_validation->set_rules('userTown', 'Town', 'trim|required');
            $this->form_validation->set_rules('userPostcode', 'Postcode', 'trim|required');
	    $this->form_validation->set_rules('userEmail', 'Eamil', 'required|valid_email');
	    $this->form_validation->set_rules('userDOB', 'Date of birth', 'required');
	    $this->form_validation->set_rules('userNinum', 'National Insurance Number', 'required');
	    
	    
//	     $adv_isRequired = "";
//	     if($this->input->post('s_advserURL')):
//               $adviser = $this->adviser_accessor->getAdviserDetails_URL($this->input->post('s_advserURL'));
//		if(!empty($adviser)):
//		    $adv_isRequired = "|required";
//		
//		     $client['adviser_adviserID'] = $adviser->adviserID;
//		endif;
//            endif;
//	    
	    // $this->form_validation->set_rules('s_advserURL', 'Adviser', 'trim'.$adv_isRequired);
            
     
          
	   // $this->form_validation->set_rules('s_advserURL', 'Sort Code', 'trim|required');
            
            $this->form_validation->set_error_delimiters( '<em class="error_text">','</em>' );
            
             if($this->form_validation->run()):
		 
		$user['userTtitle']	= $this->input->post('userTitle');
		$user['userFirstName']	= ($this->input->post('userFirstName'));
		$user['userLastName']	= ($this->input->post('userLastName'));
		$user['userDOB']	= changeDateFormat($this->input->post('userDOB'),'Y-m-d');
		$user['userAddressLine1'] = ($this->input->post('userAddressLine1'));
		$user['userAddressLine2'] = ($this->input->post('userAddressLine2'));
		$user['userPostcode']	= ($this->input->post('userPostcode'));
		$user['userCounty']	= ($this->input->post('userCounty'));
		$user['userTown']	= ($this->input->post('userTown'));
		
		$user['userTel'] = ($this->input->post('userTel'));
		$user['userMobile'] = ($this->input->post('userMobile'));
		$user['userEmail']	= ($this->input->post('userEmail'));
		$user['userNinum']	= ($this->input->post('userNinum'));
		$user['userBaseUrl']	= $this->generateElementURL('client');
		$user['userDateCreated'] = changeDateFormat('now', 'Y-m-d');
		 

		// lets use client ID instead
		$client['clientReference'] = $this->input->post('clientReference');
		$client['adviserID'] = $this->input->post('adviserID'); 
		$client['clientRetirementAge'] = $this->input->post('clientRetirementAge');
		$client['userID'] = $userID;         


		$clientID = $this->client_accessor->addNew($client);
              
                    
                    if($clientID):                      
                         $this->session->set_flashdata('message', 'Client Added Successfully');
                         $this->session->set_flashdata('type', 'flash_success');
                        redirect(base_url('client/view/'.$clientUrl)); 
                        
                        
                    else:
                        $data['db_error'] = "There was error adding this client's Details. Please try again";
                        
                    endif;
//              else:
//		  echo validation_errors();
            endif;
              
        endif;
         
         $data['mode'] = "New";
         $data['page_title'] = "New Client";
         $data['sub_title'] = "new";

	// $data['extra_js'] = base_url('js/clients_js.js');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('clients/form', $data);
        $this->load->view('templates/footer', $data); 
    }


    
    
    
    function edit($clientUrl){
        

         
    }
    
    
    /**
     * add a product to this client
     * @param string $clientUrl
     */
    function Dashboard($clientUrl){
	
	
    }
    
    
    
}
