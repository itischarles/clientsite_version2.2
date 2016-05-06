<?php //print_r($contribution) ?>
<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
	    
	    <h2>  <?php echo $mode?> Investment Instruction  for
	    <?php  echo ucwords($userDetails->userTitle ." ".$userDetails->userFirstName. " ".$userDetails->userLastName) ?> 
	    </h2> 
	    <hr/>
	    <h3>
		Application Reference <?php echo $applicationDetails->applicationReference; ?></h3>
	    <hr/>
	    <div>
		 <form  role="form" action='' method="post">	     

		     <?php $this->load->view('templates/validation_message') ?>
		
		     
		    <div class="form-group">
			
			<div class="col-md-12">
			     <div class="col-md-4">
				<?php echo form_label('Investment Options', 'investmentType') ?>
				 <span class="input-is-required">*</span>
				    <span class="tooltip-trigger" data-toggle='tooltip' data-placement='bottom' title="Please select the investment portfolio you require(you can change this at any time)">
					<span class="glyphicon glyphicon-question-sign pointer"></span>
				    </span>
			     </div>  
			     <div class="col-md-8">
			     <?php if(!empty($investmentTypes)):?>
				<?php foreach($investmentTypes as $key=>$investmentType):?> 
				  <input type="radio" name="investmentType" value="<?php echo $investmentType->investmentTypeID ?>">
				      <?php echo $investmentType->investmentTypeName?> <br/>
				 <?php endforeach;?>				 
			    <?php endif;?>
			
			     </div>
			 </div>
			
			
		    </div> 
		     
		     
		
		     
		     <div class="form-group">
			<?php echo form_label("Percentage of {$applicationDetails->applicationType} you wish to Investment", 'investmentPercent') ?>
			<?php
			  $data = array(
			    'name'        => 'investmentPercent',
			    'id'          => 'investmentPercent',
			    'value'       => set_value('investmentPercent', (!empty($investment)) ? $investment->investmentPercent : ''),
			    'class'       => 'field',
			    'type'	   =>'number',
			    'required'  =>'required',
			    'min'=>'1',
			     'max' =>100
			   );

			echo form_input($data);
			?>
			<span class="input-is-required">*</span>
			<span class="tooltip-trigger" data-toggle='tooltip' data-placement='bottom' title="For example 100% unless you have selected more than one investment option (in which case you must ensure the totals in each of these boxes amounts to 100%)">
			    <span class="glyphicon glyphicon-question-sign pointer"></span>
			</span>

		    </div> 

		    
		     
		   
		
		<div class="form-group">
			<?php echo form_label('What is your Target Date?', 'general_date1') ?>
			<?php
			  $data = array(
			    'name'        => 'investmentTargetDate',
			    'id'          => 'general_date1',
			    'value'       => set_value('investmentTargetDate', (!empty($investment)) ? changeDateFormat($investment->investmentTargetDate) : ''),
			    'class'       => 'field',
			    'required'  =>'required'
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
		     <li><a href="<?php echo base_url('client/'.$userDetails->userBaseUrl.'/application/'.$applicationDetails->applicationID."/investment/".$investment->investmentInstructionID) ?>">Return to Investment</a></li>
		
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