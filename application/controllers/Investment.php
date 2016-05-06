<?php

/**
 * Description of Document
 *
 * @author itischarles
 */
class Investment extends MY_Controller {

    var $user_accessor = ''; // to access the user model
    var $authorisation_accessor;
    var $application_accessor;
   // var $transfer_accessor;
    var $InvestmentType_accessor;
    var $investment_accessor;

    function __construct() {
        parent::__construct();




        $this->load->model("Application_model");
      //  $this->load->model("Transfer_model");
        $this->load->model("Investment_type_model");
        $this->load->model("Investment_model");

        $this->user_accessor = new User_model();
        // $this->document_accessor = new Document_Model();
        $this->application_accessor = new Application_model();
       // $this->transfer_accessor = new Transfer_model();
        $this->InvestmentType_accessor = new Investment_type_model();
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
    public function index($userUrl = '', $applicationID = 0, $investmentID = 0) {

        $data['userDetails'] = $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

       // check if this client owns this application and contribution
	
	if($this->investment_accessor->isAvalidRequest($userDetails->clientID,$applicationID,$investmentID) === false):
	    $this->session->set_flashdata('message', 'invalid Request detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
	endif;
		
        
        $data['applicationDetails'] = $this->application_accessor->getByID($applicationID);       
        $data['investment'] = $this->investment_accessor->getByID($investmentID);
	

        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('investment/viewInvestment', $data);
        $this->load->view('templates/footer', $data);
    }

    
    
     function new_Investment($userUrl = '', $applicationID = 0) {

        $data['userDetails'] = $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

       // check if this client owns this application and contribution
	
	if($this->application_accessor->isAvalidRequest($userDetails->clientID,$applicationID) === false):
	    $this->session->set_flashdata('message', 'invalid Request detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
	endif;
	
	
	  if ($this->input->post('submit')){           

//            $inv_opt = $this->input->post('investment_options');
//            switch ($inv_opt) {
//                case "IM Optimum Growth":
//                    $w_data['investment_options'] = "IM Optimum Growth";
//                    break;
//                case "IM Optimum Income":
//                    $w_data['investment_options'] = "IM Optimum Income";
//                    break;
//                case "IM Optimum Growth & Income":
//                    $w_data['investment_options'] = "IM Optimum Growth & Income";
//                    break;
//            };
//
//            $dup = $this->investment_accessor->investmentOptionsExists($w_data);

//
//            if ($dup) {
//                $this->session->set_flashdata("flash_msg", "Selected investment option already exists!");
//                redirect("client/$userUrl/investment/$app_id");
//            }
            
            $this->form_validation->set_rules('investmentType', 'Investment options', 'required');
            $this->form_validation->set_rules('investmentPercent', 'Percentage of investment', 'required');
            $this->form_validation->set_rules('investmentTargetDate', 'Target dates', 'required');

            if ($this->form_validation->run()):
                $content['applicationID'] = $applicationID;
                $content['investmentTypeID'] = $this->input->post('investmentType');
                $content['investmentPercent'] = $this->input->post('investmentPercent');
                $content['investmentTargetDate'] = changeDateFormat($this->input->post('investmentTargetDate'), 'Y-m-d');
         

                $this->investment_accessor->addNewInvestment($content);

                    // go to application overview
                    redirect(base_url()."client/$userUrl/application/$applicationID");
            endif;
        }
	
	$data['applicationDetails'] = $this->application_accessor->getByID($applicationID);       
      
	$data['investmentTypes'] = $this->InvestmentType_accessor->listAll();
	$data['mode'] = "New";

        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('investment/investmentForm', $data);
        $this->load->view('templates/footer', $data);
	
	
    }
    
  
    
    function edit_Investment($userUrl = '', $applicationID = 0, $investmentID = 0) {

        $data['userDetails'] = $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

       // check if this client owns this application and contribution
	
	if($this->investment_accessor->isAvalidRequest($userDetails->clientID,$applicationID,$investmentID) === false):
	    $this->session->set_flashdata('message', 'invalid Request detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
	endif;
	
	
	  if ($this->input->post('submit')){           

//            $inv_opt = $this->input->post('investment_options');
//            switch ($inv_opt) {
//                case "IM Optimum Growth":
//                    $w_data['investment_options'] = "IM Optimum Growth";
//                    break;
//                case "IM Optimum Income":
//                    $w_data['investment_options'] = "IM Optimum Income";
//                    break;
//                case "IM Optimum Growth & Income":
//                    $w_data['investment_options'] = "IM Optimum Growth & Income";
//                    break;
//            };
//
//            $dup = $this->investment_accessor->investmentOptionsExists($w_data);

//
//            if ($dup) {
//                $this->session->set_flashdata("flash_msg", "Selected investment option already exists!");
//                redirect("client/$userUrl/investment/$app_id");
//            }
            
            $this->form_validation->set_rules('investmentType', 'Investment options', 'required');
            $this->form_validation->set_rules('investmentPercent', 'Percentage of investment', 'required');
            $this->form_validation->set_rules('investmentTargetDate', 'Target dates', 'required');

            if ($this->form_validation->run()):
                //$newInvestment['applicationID'] = $app_id;
                $content['investmentTypeID'] = $this->input->post('investmentType');
                $content['investmentPercent'] = $this->input->post('investmentPercent');
                $content['investmentTargetDate'] = changeDateFormat($this->input->post('investmentTargetDate'), 'Y-m-d');
             
		$updateWhere['applicationID'] = $applicationID;
		$updateWhere['investmentInstructionID'] = $investmentID;

                $this->investment_accessor->editInvestment($content, $updateWhere);

                    // go to application overview
                    redirect(base_url()."client/$userUrl/application/$applicationID");
            endif;
        }
	
	$data['applicationDetails'] = $this->application_accessor->getByID($applicationID);       
        $data['investment'] = $this->investment_accessor->getByID($investmentID);
	$data['investmentTypes'] = $this->InvestmentType_accessor->listAll();
	$data['mode'] = "Edit";

        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('investment/investmentForm', $data);
        $this->load->view('templates/footer', $data);
	
	
    }
}
