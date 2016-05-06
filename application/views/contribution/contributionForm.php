<?php //print_r($contribution) ?>
<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
	    
	    <h2>  <?php echo $mode?> Contribution  for
	    <?php  echo ucwords($userDetails->userTitle ." ".$userDetails->userFirstName. " ".$userDetails->userLastName) ?> 
	    </h2> 
	    <hr/>
	    <h3>
		<?php echo $applicationDetails->applicationType; ?> to be transferred</h3>
	    <hr/>
	    <div>
		 <form  role="form" action='' method="post">	     

		     <?php $this->load->view('templates/validation_message') ?>
		     
		
		     
		     <h3>Single Contribution</h3>
		     
		    <div class="form-group">
			<?php echo form_label('Amount of lump sum investment(£)', 'lumpSumAmount') ?>
			<?php
			  $data = array(
			    'name'        => 'lumpSumAmount',
			    'id'          => 'lumpSumAmount',
			    'value'       => set_value('lumpSumAmount', (!empty($contribution)) ? $contribution->lumpSumAmount : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'			   
			   );

			echo form_input($data);
			?>
			<span class="input-is-required">*</span>
			<span class="tooltip-trigger" data-toggle='tooltip' data-placement='bottom' title="Please complete the name of the pension provider you wish to transfer form">
			    <span class="glyphicon glyphicon-question-sign pointer"></span>
			</span>
		    </div> 
		     
		     
		     <h3>Regular Contribution</h3>
			 
		     
		     <div class="form-group">
			<?php echo form_label('Amount of Regular Contribution(£', 'regularContributionAmount') ?>
			<?php
			  $data = array(
			    'name'        => 'regularContributionAmount',
			    'id'          => 'regularContributionAmount',
			    'value'       => set_value('regular_amount', (!empty($contribution)) ? $contribution->regularContributionAmount : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
			

		    </div> 

		     <div class="form-group row">
			 <div class="col-md-12">
			     <div class="col-md-4">
				 <?php echo form_label('Frequency of Regular Contribution(£)', 'regularContributionfrequency') ?>
			     </div>  
			     <div class="col-md-8">
			    <input type="radio" name="regularContributionfrequency" value="Monthly" checked>Monthly <br/>
			    <input type="radio" name="regularContributionfrequency" value="Quarterly" checked>Quarterly<br/>
			    <input type="radio" name="regularContributionfrequency" value="Annually" checked>Annually
			     </div>
			 </div>
		    </div> 
		     
		
		
		<div class="form-group row">
		    <p class="row">Please complete the Direct Debit Mandate below to make regular contributions</p>
		<p class="pull-right row">
		    <img src="<?php echo base_url('images/direct-debit-icon.gif')?>" class="img-responsive"  alt="debit_icons" /> 
		    
		 </p>
		</div>
		     
		<h3>Service User Number: 437245</h3> 
		   
		
		<div class="form-group">
			<?php echo form_label('Account Holder(s)', 'bankAccountHolder') ?>
			<?php
			  $data = array(
			    'name'        => 'bankAccountHolder',
			    'id'          => 'bankAccountHolder',
			    'value'       => set_value('bankAccountHolder', (!empty($contribution)) ? $contribution->bankAccountHolder : ''),
			    'class'       => 'field',
			  //  'required'  =>'required'
			   );

			echo form_input($data);
			?>
		</div> 
		<div class="form-group">
			<?php echo form_label('Bank Account Number', 'bankAccountNumber') ?>
			<?php
			  $data = array(
			    'name'        => 'bankAccountNumber',
			    'id'          => 'bankAccountNumber',
			    'value'       => set_value('bankAccountNumber', (!empty($contribution)) ? $contribution->bankAccountNumber : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
		</div> 
		<div class="form-group">
			<?php echo form_label('Bank SortCode', 'bankSortCode') ?>
			<?php
			  $data = array(
			    'name'        => 'bankSortCode',
			    'id'          => 'bankSortCode',
			    'value'       => set_value('bankSortCode', (!empty($contribution)) ? $contribution->bankSortCode : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
		</div>
		
		<div class="form-group">
			<?php echo form_label('Bank/Building Society Name', 'bankName') ?>
			<?php
			  $data = array(
			    'name'        => 'bankName',
			    'id'          => 'bankName',
			    'value'       => set_value('bankName', (!empty($contribution)) ? $contribution->bankName : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
		</div> 
		
		
		
		<div class="form-group">
			<?php echo form_label('Bank Address Line 1', 'bankAddressLine1') ?>
			<?php
			  $data = array(
			    'name'        => 'bankAddressLine1',
			    'id'          => 'bankAddressLine1',
			    'value'       => set_value('bankAddressLine1', (!empty($contribution)) ? $contribution->bankAddressLine1 : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
		</div> 

		<div class="form-group">
			<?php echo form_label('Bank Address Line 2', 'bankAddressLine2') ?>
			<?php
			  $data = array(
			    'name'        => 'bankAddressLine2',
			    'id'          => 'bankAddressLine2',
			    'value'       => set_value('bankAddressLine2', (!empty($contribution)) ? $contribution->bankAddressLine2 : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
		</div> 
		
		<div class="form-group">
			<?php echo form_label('Bank Address Line 3', 'bankAddressLine3') ?>
			<?php
			  $data = array(
			    'name'        => 'bankAddressLine3',
			    'id'          => 'bankAddressLine3',
			    'value'       => set_value('bankAddressLine3', (!empty($contribution)) ? $contribution->bankAddressLine3 : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
		</div> 
		<div class="form-group">
			<?php echo form_label('Town/City', 'bankAddressTownCity') ?>
			<?php
			  $data = array(
			    'name'        => 'bankAddressTownCity',
			    'id'          => 'bankAddressTownCity',
			    'value'       => set_value('bankAddressTownCity', (!empty($contribution)) ? $contribution->bankAddressTownCity : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
		</div> 
		<div class="form-group">
			<?php echo form_label('County', 'bankAddressCounty') ?>
			<?php
			  $data = array(
			    'name'        => 'bankAddressCounty',
			    'id'          => 'bankAddressCounty',
			    'value'       => set_value('bankAddressCounty', (!empty($contribution)) ? $contribution->bankAddressCounty : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
		</div> 
		<div class="form-group">
			<?php echo form_label('Bank PostCode', 'bankPostCode') ?>
			<?php
			  $data = array(
			    'name'        => 'bankPostCode',
			    'id'          => 'bankPostCode',
			    'value'       => set_value('bankPostCode', (!empty($contribution)) ? $contribution->bankPostCode : ''),
			    'class'       => 'field',
			   // 'required'  =>'required'
			   );

			echo form_input($data);
			?>
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
		     <li><a href="<?php echo base_url('client/'.$userDetails->userBaseUrl.'/application/'.$applicationDetails->applicationID."/contribution/".$contribution->contributionID) ?>">Return to Transfer</a></li>
		
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