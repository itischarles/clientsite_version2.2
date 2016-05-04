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
        $this->load->view('application/contributionForm', $data);
        $this->load->view('templates/footer', $data);
    }

    public function new_Contribution($userUrl = '', $applicationId) {

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

        if ($this->input->post('submit')):

            $this->form_validation->set_rules('fund_type', 'Fund type', 'required');
            $this->form_validation->set_rules('lump_sum_amount', 'Lump sum amount', 'required');
            $this->form_validation->set_rules('regular_amount', 'Regular amount', 'required');
            $this->form_validation->set_rules('frequency_regular', 'Frequency regular', 'required');
            $this->form_validation->set_rules('account_holder', 'Account holder', 'required');
            $this->form_validation->set_rules('society_account_holder', 'Society account holder', 'required');
            $this->form_validation->set_rules('sorrt_code', 'Sorrt code', 'required');
            $this->form_validation->set_rules('postal_address', 'Postal address', 'required');


            $w_data['applicationID'] = $app_id;

            $fund_type = $this->input->post('fund_type');
            switch ($fund_type) {
                case "Lamp sum investment":
                    $w_data['fund_type'] = "Lamp sum investment";
                    break;
                case "Regular Contribution":
                    $w_data['fund_type'] = "Regular Contribution";
                    break;
            };

            $dup = $this->contribution_accessor->fundTypeExists($w_data);

            if ($dup) {
                $this->session->set_flashdata("flash_msg", "Selected fund type already exists!");
                redirect("client/$userUrl/contribution/$app_id");
            }

            if ($this->form_validation->run()):
                $newContribution['applicationID'] = $app_id;
                $newContribution['fund_type'] = $fund_type;
                $newContribution['lump_sum_amount'] = $this->input->post('lump_sum_amount');
                $newContribution['regular_amount'] = $this->input->post('regular_amount');
                $newContribution['frequency_regular'] = $this->input->post('frequency_regular');
                $newContribution['account_holder'] = $this->input->post('account_holder');
                $newContribution['society_account_holder'] = $this->input->post('society_account_holder');
                $newContribution['sorrt_code'] = $this->input->post('sorrt_code');
                $newContribution['postal_address'] = $this->input->post('postal_address');
                $newContribution['contributionsReference'] = $random_no;

                $contributionAdded = $this->contribution_accessor->addNewContribution($newContribution);


                if ($contributionAdded):
// go to application overview
                   redirect("client/$userUrl/application/$app_id");
                endif;
                
            else:
                
                $this->index($userUrl, $app_id);
            endif;
            endif;
       
    

}
}
