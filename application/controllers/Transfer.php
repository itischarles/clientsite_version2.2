<?php

/**
 * Description of Document
 *
 * @author itischarles
 */
class Transfer extends MY_Controller {

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
    public function index($userUrl = '', $applicationID = 0, $transferID) {

        $data['userDetails'] = $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

	$isValid['applications.applicationID'] = $applicationID;
	$isValid['transferID'] = $transferID;
	$isValid['clientID'] = $userDetails->clientID;
	
	if($this->transfer_accessor->isAvalidRequest($isValid === false)):
	    $this->session->set_flashdata('message', 'invalid Request detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
	endif;
        
        $data['applicationDetails'] = $this->application_accessor->getByID($applicationID);
        $data['transfer'] = $this->transfer_accessor->getByID($transferID);
       

        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('transfers/viewTransfer', $data);
        $this->load->view('templates/footer', $data);
    }
    
    

    public function new_Transfer($userUrl = '', $applicationID =0) {

        $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));
	$applicationDetails = $this->application_accessor->getByClientID($applicationID, $userDetails->clientID);
	
        if (empty($userDetails) || empty($applicationDetails)):
            $this->session->set_flashdata('message', 'invalid request detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;
	
	if ($this->input->post('submit')):
            $this->form_validation->set_rules('pensionProvider', ' Pension Provider', 'required');
            $this->form_validation->set_rules('transferReferrence', 'Transfer Referrence', 'required');
            $this->form_validation->set_rules('approximateValue', 'Approximate Value', 'required');
	    
	    $this->form_validation->set_error_delimiters( '<p class="error_text">','</p>' );

            if ($this->form_validation->run()):
		$newTransfer['applicationID'] = $applicationID;
		$newTransfer['pensionProvider'] = $this->input->post('pensionProvider');
		$newTransfer['transferReferrence'] = $this->input->post('transferReferrence');
		$newTransfer['approximateValue'] = price_format_DB($this->input->post('approximateValue'));

		//$$this->transfer_accessor->addNewTransfer($newTransfer)
	
		if ($this->transfer_accessor->addNewTransfer($newTransfer)):
		    // go to application overview
		    $this->session->set_flashdata('message', 'Transfer added successfully!!!');
		    $this->session->set_flashdata('type', 'flash_success');
		else:
		     $this->session->set_flashdata('message', 'Unknown error detected!!!');
		    $this->session->set_flashdata('type', 'flash_warning');
		endif;
		
		redirect(base_url("client/$userUrl/application/$applicationID"));
	    endif;
        endif;
	

	
	$data['applicationDetails'] = $applicationDetails;
	$data['userDetails'] = $userDetails;
       // $data['transfer'] = $this->transfer_accessor->getByID($transferID);
        $data['mode'] = "New";

        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('transfers/transferForm', $data);
        $this->load->view('templates/footer', $data);
        
    }
    

        /**
     * display the application overview for this client
     * @param string $userUrl
     * @param int $applicationID
     * @return boolean
     */
    public function edit_Transfer($userUrl = '', $applicationID = 0, $transferID) {

        $data['userDetails'] = $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

	$isValid['applications.applicationID'] = $applicationID;
	$isValid['transferID'] = $transferID;
	$isValid['clientID'] = $userDetails->clientID;
	
	if($this->transfer_accessor->isAvalidRequest($isValid === false)):
	    $this->session->set_flashdata('message', 'invalid Request detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
	endif;
	
	
	if ($this->input->post('submit')):
            $this->form_validation->set_rules('pensionProvider', ' Pension Provider', 'required');
            $this->form_validation->set_rules('transferReferrence', 'Transfer Referrence', 'required');
            $this->form_validation->set_rules('approximateValue', 'Approximate Value', 'required');
	    
	    $this->form_validation->set_error_delimiters( '<p class="error_text">','</p>' );

            if ($this->form_validation->run()):
		//$newTransfer['applicationID'] = $applicationId;
		$updateTransfer['pensionProvider'] = $this->input->post('pensionProvider');
		$updateTransfer['transferReferrence'] = $this->input->post('transferReferrence');
		$updateTransfer['approximateValue'] = $this->input->post('approximateValue');

		$updateWhere['applicationID'] = $applicationID;
		$updateWhere['transferID'] = $transferID;
	
		if ($this->transfer_accessor->updateTransfer($updateTransfer, $updateWhere)):
		    // go to application overview
		    $this->session->set_flashdata('message', 'Transfer updated successfully!!!');
		    $this->session->set_flashdata('type', 'flash_success');
		else:
		     $this->session->set_flashdata('message', 'No changes detected!!!');
		    $this->session->set_flashdata('type', 'flash_warning');
		endif;
		
		redirect(base_url("client/$userUrl/application/$applicationID/transfer/$transferID"));
	    endif;
        endif;
	
	
        
        $data['applicationDetails'] = $this->application_accessor->getByID($applicationID);
        $data['transfer'] = $this->transfer_accessor->getByID($transferID);
        $data['mode'] = "Edit";

        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('transfers/transferForm', $data);
        $this->load->view('templates/footer', $data);
    }

}
