<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends MY_Controller {
    var $user_accessor =''; // to access the user model
     
     var $authorisation_accessor;
  
    function __construct() {
        parent::__construct();
      
        
    $this->user_accessor = new User_Model();        



    // you need to be authenticated to view this controller
    $this->user_accessor->authenticate($this->session->userdata('userID'));
    $this->authorisation_accessor = new Authorisation_model();
  
               
    }
    
    
     // search clients
    function index(){

	redirect(base_url());
     
    }
    
    
 
    
 
    
    function userDashboard($userUrl) {
	
	$data['userDetails'] = $userDetails= $this->user_accessor->getUser_customWhere(array('userBaseUrl'=>$userUrl));
	//print_r($user);
	  
        if(empty($userDetails)):
             $this->session->set_flashdata('message', 'User Not found!!!');
             $this->session->set_flashdata('type', 'flash_error');
             redirect($_SERVER['HTTP_REFERER']); 
	     return false;
        endif;
	 
	
	
	//$data['userRoles'] = $this->authorisation_accessor->listUserRoles($userDetails->userID);
	$data['page_title'] = "User's Profile: ". ucwords($userDetails->userTtitle ." ".$userDetails->userFirstName);
      //  $data['sub_title'] = "users";
	
	$data['show_uploadLink'] = true;

	$this->load->view('templates/header', $data);
	$this->load->view('templates/navbar', $data);
        $this->load->view('users/dashboard', $data);
        $this->load->view('templates/footer', $data); 
 
    }
    
    
    
      function searchUsers(){
	
	$search_param  = ($this->input->get('search_param') ? $this->input->get('search_param') : '');
	
	
	$where_search = array();
	
	if(!empty($search_param)):
	    // it is possible first name and last name is supplied
	     $names = explode(' ', $search_param);

	     $name_part1 = $name_part2= '';

	     $name_part1 = "(userFirstName like '{$names[0]}%' OR "
			. "userLastName like '{$names[0]}%' OR "
			. "clients.clientReference like '{$names[0]}%'"
			. " )";
	     if(isset($names[1])):
		  $name_part2 = "AND (userFirstName like '{$names[1]}%' OR "
			. "userLastName like '{$names[1]}%' OR "
			    . "clients.clientReference like '{$names[1]}%' "
			. " )";
	     endif;
	      $where_search[] = "$name_part1 $name_part2";
	endif;
    
	
	
	$offset = ($this->input->get('offset')? $this->input->get('offset') : ''); 
	$per_page  = ($this->input->get('result_per_page')? $this->input->get('result_per_page') : 200);
		
	$config['base_url'] = base_url('search-users');
	$config['total_rows'] = $data['db_total_rows'] = $this->user_accessor->searchUsers($where_search, false, false,true);	
	$config['per_page']         = $per_page;
        $config['num_links']	    = 10; 
        $config['next_link']        = 'Next';
	$config['prev_link']        = 'Prev';
        $config['next_tag_open']    = '<li class="nextPage">';
        $config['next_tag_close']   = '</li>';
        
        $config['prev_tag_open']    = '<li class="prevPage">';
        $config['prev_tag_close']   = '</li>';
        $config['cur_tag_open']     = "<li class='active'><a>";
        $config['cur_tag_close']    = "</a></li>";	
	$config['full_tag_open']    =  '<ul class="pagination">';
	$config['full_tag_close']    = '</ul>';
	$config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['page_query_string'] = TRUE;
	$config['query_string_segment'] = "offset";
	$config['reuse_query_string']  = TRUE;
	
	
        $this->pagination->initialize($config); 
	

	$data['searchList'] = $this->user_accessor->searchUsers($where_search, $per_page, $offset);
     
     
    
   
     $data['page_title'] = 'Search Clients';               
  
 	
	$this->load->view('templates/header', $data);
	$this->load->view('templates/navbar', $data);
        $this->load->view('users/search_users', $data);
        $this->load->view('templates/footer', $data); 
    }
    
    
    
    
      //#########################################//
    /**
    * manually upload documents to clients profile
     * it is possible API/curl couldn't upload the docs based on size etc. lets do it manually
    */ 
    function manualUploadDocument($userUrl){
      
     $data['userDetails'] = $userDetails= $this->user_accessor->getUser_customWhere(array('userBaseUrl'=>$userUrl));
	//print_r($user);
	  
        if(empty($userDetails)):
             $this->session->set_flashdata('message', 'User Not found!!!');
             $this->session->set_flashdata('type', 'flash_error');
             redirect($_SERVER['HTTP_REFERER']); 
	     return false;
        endif;
	 
   
	
    if($this->input->post('upload')):
	
    $this->form_validation->set_rules('Reference', 'Client Reference', 'trim|required|validate_client');

    $this->form_validation->set_rules('file_name', 'File Name', 'trim|required');
    $this->form_validation->set_rules('date_added', 'Date Added', 'trim|required');
  
     $required = ( empty($_FILES['user_doc']['name']) ? "required" : "");           
    $this->form_validation->set_rules('user_doc', 'File', "$required");

    
    if($this->form_validation->run()):
        $fileName        = $this->input->post('file_name'); 
        $date_added      = changeDateFormat($this->input->post('date_added'), 'Y-m-d');        
        $Reference    =  $this->input->post('Reference'); 
        
	$client_details = $this->user_accessor->getUser_customWhere(array('userReference'=>$Reference));
	
	// make the directory
	$uploadPath = "client_docs/{$client_details->userID}";
	file_mkdir("$uploadPath");
	
	
	$config['upload_path'] = './'.$uploadPath.'/';
	$config['allowed_types'] = 'gif|jpg|png|pdf';
	$config['encrypt_name'] = TRUE;
	$config['remove_spaces'] = TRUE;

	$this->load->library('upload', $config);
        
	if ( ! $this->upload->do_upload('user_doc')):
            $data['upload_error'] = $this->upload->display_errors();                        
	else:
	   $upload_data =  $this->upload->data();
	  // print_r($upload_data);
	    $content['docName']  = $fileName;
	    $content['docPath']  = $uploadPath."/".$upload_data['file_name'];
	    $content['docType']  = $upload_data['image_type'];
	    $content['docSize'] = $upload_data['file_size'];
	    $content['docDateAdded']  = $date_added;
	    //$content['docIsViewed']  = 0;
	    $content['users_userID']  = $client_details->userID;
	    
	    $this->document_accessor->createAttachment($content);
	
	    $this->session->set_flashdata('message', 'Document Uploaded');
	     $this->session->set_flashdata('type', 'flash_success');
	   redirect(base_url('admin/manual-uploads')); 
	endif; 
	
    endif;
    
    
     endif; // end if posted
  
 
 $data['show_uploadLink'] = true;
 	
	$this->load->view('templates/header', $data);
	$this->load->view('templates/navbar', $data);
        $this->load->view('document/manual_upload', $data);
        $this->load->view('templates/footer', $data); 
     
     
    }
    
    
    
}
