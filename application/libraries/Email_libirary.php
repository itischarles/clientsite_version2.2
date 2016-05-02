<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email_libirary
 *
 * @author itischarles
 */
class Email_libirary extends CI_Email{
   
    /**
     *
     * @$invoice_details array 
     * store the details of the given given on which we want to send email
     */
    private $invoice_details;
    
    
    
	    
    function __construct() {


	
	//SENDmail option
	$config['protocol'] = 'sendmail';
	$config['mailpath'] = '/usr/sbin/sendmail';
	
	
	$config['mailtype'] = 'html';	
	$config['charset'] = 'iso-8859-1';
	$config['wordwrap'] = TRUE;
	
	parent::__construct($config);
	
	
	
    }
    
    
    
    /**
     * Set Recipients
     *
     * @param	string
     * @return	CI_Email
     */
    public function to($to)
    {
	$to = $this->_replaceMessageShortCode($to);
	
	$to = $this->_str_to_array($to);
	$to = $this->clean_email($to);

	if ($this->validate)
	{
		$this->validate_email($to);
	}

	if ($this->_get_protocol() !== 'mail')
	{
		$this->set_header('To', implode(', ', $to));
	}

	$this->_recipients = $to;

	return $this;
    }
    
    
    /**
    * Set Email Subject
    *
    * @param	string
    * @return	CI_Email
    */
   public function subject($subject)
   {
        $subject = $this->_replaceMessageShortCode($subject);
	
	$subject = $this->_prep_q_encoding($subject);

	$this->set_header('Subject', $subject);
	
	   return $this;
   }

   	/**
	 * Set Body
	 *
	 * @param	string
	 * @return	CI_Email
	 */
	public function message($body)
	{
	    $body = $this->_replaceMessageShortCode($body);
	    
	    $this->_body = rtrim(str_replace("\r", '', $body));

	    /* strip slashes only if magic quotes is ON
	       if we do it with magic quotes OFF, it strips real, user-inputted chars.

	       NOTE: In PHP 5.4 get_magic_quotes_gpc() will always return 0 and
		     it will probably not exist in future versions at all.
	    */
	    if ( ! is_php('5.4') && get_magic_quotes_gpc())
	    {
		    $this->_body = stripslashes($this->_body);
	    }

	    return $this;
	}
     
   
   
	
	
	/**
	 * replace email shortcode in a given string
	 * @$string string string
	 * @return string
	 */
   private function _replaceMessageShortCode($string) {


       $string = str_replace("[invoice_reference]"  , prefixZeroToNumbers($this->invoice_details->invoiceID), $string);
       $string = str_replace("[invoice_total_value]", number_format($this->invoice_details->invoice_ground_total,2), $string);       
       $string = str_replace("[contact_title]"	    , $this->invoice_details->client_title, $string);
       $string = str_replace("[contact_first_name]" , $this->invoice_details->client_fname, $string);
       $string = str_replace("[contact_last_name]"  , $this->invoice_details->client_lname, $string);
       $string = str_replace("[contact_email]"	    , $this->invoice_details->client_email, $string);
       $string = str_replace("[product_provider]"   , $this->invoice_details->product_provider, $string);
       $string = str_replace("[provider_reference]" , $this->invoice_details->product_ref, $string);
       
       $string = str_replace("[provider_email]"	    , $this->invoice_details->product_provider_email, $string);
       $string = str_replace("[invoice_date]"	    , changeDateFormat($this->invoice_details->invoice_date,'jS F Y'), $string);
       $string = str_replace("[payment_due_date]"   , changeDateFormat($this->invoice_details->invoice_payment_due_date,'jS F Y'), $string);
       
       return $string;
   }
    
    
   

}

   
