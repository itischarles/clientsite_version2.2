<?php


/**
 * Description of Document
 *
 * @author itischarles
 */
class Application extends MY_Controller {
   
    var $user_accessor =''; // to access the user model
     
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
    
     public function index($userUrl = '', $applicationID = 0){
       
	$data['userDetails'] =  $userDetails= $this->user_accessor->getUser_customWhere(array('userBaseUrl'=>$userUrl));
	
        if(empty($userDetails)):
             $this->session->set_flashdata('message', 'User Not found!!!');
             $this->session->set_flashdata('type', 'flash_error');
             redirect($_SERVER['HTTP_REFERER']); 
	     return false;
        endif;
	
	/**
	 * 
	 * @todo test that this application belogs to this client
	 * if yes continue to display the application overview page
	 */
	
	$data['applicationDetails'] =  $this->application_accessor->getApplicationDataById($userDetails->userID);
	$data['transfer'] = $this->transfer_accessor->getTransferDataById($applicationID);
        
        $data['contribution'] = $this->contribution_accessor->getContributionsDataById($applicationID);
        //list contribution
         $data['investment'] = $this->investment_accessor->getInvestmentDataById($applicationID);
     
	
	$data['show_uploadLink'] = true;

	$this->load->view('templates/header', $data);
	$this->load->view('templates/navbar', $data);
        $this->load->view('application/overview', $data);
        $this->load->view('templates/footer', $data); 
    }
    
    
    
    
    
    
    public function new_Application($userUrl = '', $applicationType = ''){
       
	 $userDetails= $this->user_accessor->getUser_customWhere(array('userBaseUrl'=>$userUrl));
	
        if(empty($userDetails)):
             $this->session->set_flashdata('message', 'User Not found!!!');
             $this->session->set_flashdata('type', 'flash_error');
             redirect($_SERVER['HTTP_REFERER']); 
	     return false;
        endif;
	 
	$types = array('sipp', 'pension', 'isa', 'bond', 'gia');

	if(!in_array($applicationType, $types)):
	    $this->session->set_flashdata('message', 'Invalid Application detected!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']); 
	     return false;
	endif;
	
	
	/**
	 * @todo check if the user already has an application for this type
	 * if yes, stop and redirect with a message
	 * if no continue
	 */

	
	 $newApp['applicationReference'] = rand(11111, 99999);
         $newApp['application_date'] = changeDateFormat('now', 'Y-m-d', true);
	 $newApp['applicationType'] = $applicationType;
	 $newApp['clientID'] = $userDetails->userID;
	
	$app_id = $this->application_accessor->addNewApplication($newApp);

	

	if($app_id):
	    // go to application overview
	    redirect('client/' . $userUrl . '/application/' . $app_id);
	endif;
	
  
    }


}