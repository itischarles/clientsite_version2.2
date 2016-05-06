<?php

/**
 * Description of Document
 *
 * @author itischarles
 */
class Contribution extends MY_Controller {

    var $user_accessor = ''; // to access the user model
    var $authorisation_accessor;
    var $application_accessor;
    var $transfer_accessor;
    var $contribution_accessor;
    var $investment_accessor;

    function __construct() {
        parent::__construct();




        $this->load->model("Application_model");
        $this->load->model("Transfer_model");
        $this->load->model("Contribution_model");
        $this->load->model("Investment_model");

        $this->user_accessor = new User_model();
// $this->document_accessor = new Document_Model();
        $this->application_accessor = new Application_model();
        $this->transfer_accessor = new Transfer_model();
        $this->contribution_accessor = new Contribution_model();
        $this->investment_accessor = new Investment_model();



// you need to be authenticated to view this controller
        $this->user_accessor->authenticate($this->session->userdata('userID'));
        $this->authorisation_accessor = new Authorisation_model();
    }

    /**
     * display the application overview for this client
     * @param string $userUrl
     * @param int $applicationID
     * @return boolean
     */
    public function index($userUrl = '', $applicationID = 0, $contributionID) {

        $data['userDetails'] = $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

	// check if this client owns this application and contribution
	
	if($this->contribution_accessor->isAvalidRequest($userDetails->clientID,$applicationID,$contributionID) === false):
	    $this->session->set_flashdata('message', 'invalid Request detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
	endif;
		
        
        $data['applicationDetails'] = $this->application_accessor->getByID($applicationID);       
        $data['contribution'] = $this->contribution_accessor->getByID($contributionID);
	

        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('contribution/viewContribution', $data);
        $this->load->view('templates/footer', $data);
    }

    
    
    public function new_Contribution($userUrl = '', $applicationID = 0) {

        $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

	// check if this client owns this application	
	if($this->application_accessor->isAvalidRequest($userDetails->clientID, $applicationID) === false):
	    $this->session->set_flashdata('message', 'invalid Request detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
	endif;
	
	
	
	
	if ($this->input->post('submit')):
	    
	    if(!$this->input->post('lumpSumAmount') && !$this->input->post('regularContributionAmount')):
		 $this->form_validation->set_rules('lumpSumAmount', 'Lum Sum Amount or Regular contribution', 'required');
	    endif;
	
            $this->form_validation->set_rules('lumpSumAmount', 'Lum Sum Amount', 'trim');
	
	    if($this->input->post('regularContributionAmount')):
		$this->form_validation->set_rules('regularContributionAmount', 'Regular amount', 'required');
		$this->form_validation->set_rules('regularContributionfrequency', 'Regular contribution frequency', 'required');
		$this->form_validation->set_rules('bankAccountHolder', 'Account holder', 'required');
		$this->form_validation->set_rules('bankName', 'Bank Name', 'required');
		$this->form_validation->set_rules('bankAccountNumber', 'Account Number', 'required');
		$this->form_validation->set_rules('bankSortCode', 'Sortcode', 'required');
		
		$this->form_validation->set_rules('bankAddressLine1', 'Address', 'required');
		$this->form_validation->set_rules('bankPostCode', 'Postcode', 'required');
	    endif;
           



            if ($this->form_validation->run()):
                $newContribution['applicationID'] = $applicationID;
             
                $newContribution['lumpSumAmount'] =		price_format_DB($this->input->post('lumpSumAmount'));
		
                
		 if($this->input->post('regularContributionAmount')):
		     
		    $newContribution['regularContributionAmount'] = price_format_DB($this->input->post('regularContributionAmount'));
		    $newContribution['regularContributionfrequency'] = $this->input->post('regularContributionfrequency');
		    $newContribution['bankAccountHolder'] = $this->input->post('bankAccountHolder');
		    $newContribution['bankAccountNumber'] = $this->input->post('bankAccountNumber');
		    $newContribution['bankSortCode'] = $this->input->post('bankSortCode');

		    $newContribution['bankName'] = $this->input->post('bankName');
		    $newContribution['bankAddressLine1'] = $this->input->post('bankAddressLine1');
		    $newContribution['bankAddressLine2'] = $this->input->post('bankAddressLine2');
		    $newContribution['bankAddressLine3'] = $this->input->post('bankAddressLine3');
		    $newContribution['bankAddressTownCity'] = $this->input->post('bankAddressTownCity');
		    $newContribution['bankAddressCounty'] = $this->input->post('bankAddressCounty');
		    $newContribution['bankPostCode'] = $this->input->post('bankPostCode');
		 endif;
		

                $this->contribution_accessor->addNewContribution($newContribution);


		redirect("client/$userUrl/application/$applicationID");
		else:
		    echo validation_errors();echo "not run";
	    endif;// if run();
		
        endif; // if is submit
       
	
	
	
	
	$data['applicationDetails'] = $this->application_accessor->getByID($applicationID);       
	 $data['userDetails'] = $userDetails;
	$data['mode'] = "New";

        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('contribution/contributionForm', $data);
        $this->load->view('templates/footer', $data);
  
    

}



    function edit_Contribution($userUrl = '', $applicationID = 0, $contributionID = 0) {

        $data['userDetails'] = $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

	// check if this client owns this application and contribution
	
	if($this->contribution_accessor->isAvalidRequest($userDetails->clientID,$applicationID, $contributionID) === false):
	    $this->session->set_flashdata('message', 'invalid Request detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
	endif;
	
	
	if ($this->input->post('submit')):

	    
	    if(!$this->input->post('lumpSumAmount') && !$this->input->post('regularContributionAmount')):
		 $this->form_validation->set_rules('lumpSumAmount', 'Lum Sum Amount or Regular contribution', 'required');
	    endif;
	
            $this->form_validation->set_rules('lumpSumAmount', 'Lum Sum Amount', 'trim');
	
	    if($this->input->post('regularContributionAmount')):
		$this->form_validation->set_rules('regularContributionAmount', 'Regular amount', 'required');
		$this->form_validation->set_rules('regularContributionfrequency', 'Regular contribution frequency', 'required');
		$this->form_validation->set_rules('bankAccountHolder', 'Account holder', 'required');
		$this->form_validation->set_rules('bankName', 'Bank Name', 'required');
		$this->form_validation->set_rules('bankAccountNumber', 'Account Number', 'required');
		$this->form_validation->set_rules('bankSortCode', 'Sortcode', 'required');
		
		$this->form_validation->set_rules('bankAddressLine1', 'Address', 'required');
		$this->form_validation->set_rules('bankPostCode', 'Postcode', 'required');
	    endif;
           



            if ($this->form_validation->run()):
                $newContribution['applicationID'] = $applicationID;
             
                $newContribution['lumpSumAmount'] =		price_format_DB($this->input->post('lumpSumAmount'));
               
		if($this->input->post('regularContributionAmount')):
		    $newContribution['regularContributionAmount'] = price_format_DB($this->input->post('regularContributionAmount'));
		    $newContribution['regularContributionfrequency'] = $this->input->post('regularContributionfrequency');
		    $newContribution['bankAccountHolder'] = $this->input->post('bankAccountHolder');
		    $newContribution['bankAccountNumber'] = $this->input->post('bankAccountNumber');
		    $newContribution['bankSortCode'] = $this->input->post('bankSortCode');

		    $newContribution['bankName'] = $this->input->post('bankName');
		    $newContribution['bankAddressLine1'] = $this->input->post('bankAddressLine1');
		    $newContribution['bankAddressLine2'] = $this->input->post('bankAddressLine2');
		    $newContribution['bankAddressLine3'] = $this->input->post('bankAddressLine3');
		    $newContribution['bankAddressTownCity'] = $this->input->post('bankAddressTownCity');
		    $newContribution['bankAddressCounty'] = $this->input->post('bankAddressCounty');
		    $newContribution['bankPostCode'] = $this->input->post('bankPostCode');
		endif;
		

		$updateWhere['contributionID'] = $contributionID;
		$updateWhere['applicationID'] = $applicationID;
                $this->contribution_accessor->updateContribution($newContribution, $updateWhere);


		redirect("client/$userUrl/application/$applicationID");

	    endif;// if run();
		
        endif; // if is submit
       
	
	
	
	
	$data['applicationDetails'] = $this->application_accessor->getByID($applicationID);       
        $data['contribution'] = $this->contribution_accessor->getByID($contributionID);
	$data['mode'] = "Edit";

        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('contribution/contributionForm', $data);
        $this->load->view('templates/footer', $data);
	
    }









}
