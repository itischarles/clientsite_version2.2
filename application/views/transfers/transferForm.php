
<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
	    
	    <h2>  <?php echo $mode?> Transfer     </h2> 
	    <hr/>
	    <h3><?php echo $applicationDetails->applicationType; ?> to be transferred</h3>
	    
	    <div>
		 <form  role="form" action='' method="post">	     

		     <?php $this->load->view('templates/validation_message') ?>
		     
		
		     
		    <div class="form-group">
			<?php echo form_label('Pension Provider', 'pensionProvider') ?>
			<?php
			  $data = array(
			    'name'        => 'pensionProvider',
			    'id'          => 'pensionProvider',
			    'value'       => set_value('pensionProvider', (!empty($transfer)) ? $transfer->pensionProvider : ''),
			    'class'       => 'field',
			    'required'  =>'required'			   
			   );

			echo form_input($data);
			?>
			<span class="input-is-required">*</span>
			<span class="tooltip-trigger" data-toggle='tooltip' data-placement='bottom' title="Please complete the name of the pension provider you wish to transfer form">
			    <span class="glyphicon glyphicon-question-sign pointer"></span>
			</span>
		    </div> 
		     
		     <div class="form-group">
			<?php echo form_label('Reference Number', 'transferReferrence') ?>
			<?php
			  $data = array(
			    'name'        => 'transferReferrence',
			    'id'          => 'transferReferrence',
			    'value'       => set_value('transferReferrence', (!empty($transfer)) ? $transfer->transferReferrence : ''),
			    'class'       => 'field',
			    'required'  =>'required'
			   );

			echo form_input($data);
			?>
			<span class="input-is-required">*</span>
			<span class="tooltip-trigger" data-toggle='tooltip' data-placement='bottom' title="Please give the account/contact/reference number of this pension">
			    <span class="glyphicon glyphicon-question-sign pointer"></span>
			</span>

		    </div> 

		     <div class="form-group">
			<?php echo form_label('Approximate Value (if known)', 'approximateValue') ?>
			<?php
			  $data = array(
			    'name'        => 'approximateValue',
			    'id'          => 'approximateValue',
			    'value'       => set_value('approximateValue', (!empty($transfer)) ? $transfer->approximateValue : ''),
			    'class'       => 'field',
			    'required'  =>'required'
			   );

			echo form_input($data);
			?>
			<span class="input-is-required">*</span>
			<span class="tooltip-trigger" data-toggle='tooltip' data-placement='bottom' title="Please remember you must forward to us a discharge form for each pension provider">
			    <span class="glyphicon glyphicon-question-sign pointer"></span>
			</span>

		    </div> 
		     
		

		    <div class="form-group pull-right">  
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
		    </div>

		</form>
	    </div>
          
        </div>


	
	 <div class="col-md-4 sidebar">
	     <?php if($mode == "Edit"):?>
	     <div class="jumbotron">
		 <ul class="nav nav-stacked">
		     <li><a href="<?php echo base_url('client/'.$userDetails->userBaseUrl.'/application/'.$applicationDetails->applicationID."/transfer/".$transfer->transferID) ?>">Return to Transfer</a></li>
		
		</ul>  
	     </div>
	     <?php endif;?>
	     
	     <div class="jumbotron" >
		 <ul class="nav nav-stacked">
		   <li><a href="<?php echo base_url('client/'.$userDetails->userBaseUrl.'/application/'.$applicationDetails->applicationID) ?>">Return to Application</a></li>
	
		</ul>  
	     </div>

        </div>
    </div> <!-- row-->
    
</div>