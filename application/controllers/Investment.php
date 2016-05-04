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
    public function index($userUrl = '', $applicationID = 0) {

        $data['userDetails'] = $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

       
        $data['applicationDetails'] = $this->application_accessor->getApplicationDataById($applicationID);
        $data['transfer'] = $this->transfer_accessor->getTransferDataById($applicationID);
        $data['contribution'] = $this->contribution_accessor->getContributionsDataById($applicationID);
        $data['investment'] = $this->investment_accessor->getInvestmentDataById($applicationID);


        $data['show_uploadLink'] = true;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('application/investmentForm', $data);
        $this->load->view('templates/footer', $data);
    }

    public function new_Investment($userUrl = '', $applicationId) {

        $userDetails = $this->user_accessor->getUser_customWhere(array('userBaseUrl' => $userUrl));

        if (empty($userDetails)):
            $this->session->set_flashdata('message', 'User Not found!!!');
            $this->session->set_flashdata('type', 'flash_error');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        endif;

        $this->load->library('form_validation');
        
        $app_id = $applicationId;
        $random_no = rand(111111111, 999999999);


        if ($this->input->post('submit')){

            


            $w_data['applicationID'] = $app_id;

            $inv_opt = $this->input->post('investment_options');
            switch ($inv_opt) {
                case "IM Optimum Growth":
                    $w_data['investment_options'] = "IM Optimum Growth";
                    break;
                case "IM Optimum Income":
                    $w_data['investment_options'] = "IM Optimum Income";
                    break;
                case "IM Optimum Growth & Income":
                    $w_data['investment_options'] = "IM Optimum Growth & Income";
                    break;
            };

            $dup = $this->investment_accessor->investmentOptionsExists($w_data);


            if ($dup) {
                $this->session->set_flashdata("flash_msg", "Selected investment option already exists!");
                redirect("client/$userUrl/investment/$app_id");
            }
            
            $this->form_validation->set_rules('investment_options', 'Investment options', 'required');
            $this->form_validation->set_rules('percentage_of_investment', 'Percentage of investment', 'required');
            $this->form_validation->set_rules('target_dates', 'Target dates', 'required');

            if ($this->form_validation->run()):
                $newInvestment['applicationID'] = $app_id;
                $newInvestment['investment_options'] = $inv_opt;
                $newInvestment['percentage_of_investment'] = $this->input->post('percentage_of_investment');
                $newInvestment['target_date'] = date("Y-m-d", strtotime($this->input->post('target_dates')));
                $newInvestment['investmentReference'] = $random_no;

                $InvestmentAdded = $this->investment_accessor->addNewInvestment($newInvestment);

                if ($InvestmentAdded):
                    // go to application overview
                    redirect("client/$userUrl/application/$app_id");
                endif;
                
            else:
                
                $this->index($userUrl, $app_id);
            endif;
        }
    }

}
