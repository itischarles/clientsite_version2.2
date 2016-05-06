

<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
	    
	    <div><!-- start content-->
		<h2>
		    <?php echo $applicationDetails->applicationType; ?>  Application for
		    <span class=""> 
			<?php  echo (!empty($userDetails)? ucwords($userDetails->userTitle ." ".$userDetails->userFirstName). " ".$userDetails->userLastName :'') ?> 
		    </span>
		</h2> 
	   
		
		<h3>Application Reference: <?php echo $applicationDetails->applicationReference; ?> 
		</h3>
            
		
		<div>
		    <hr>
		    <h3>Client Detail Completed </h3> 
		</div>

		<div>
		    <hr>
		    <h3>Transfers <span class="small-text">Please add any transfer details</span>
		     <a href="<?php echo base_url("client/".$userDetails->userBaseUrl."/application/".$applicationDetails->applicationID."/transfer/new") ?>" class="btn btn-gold pull-right small-text">Add</a>
		     </h3>


		    <?php if($transfers): ?>
			<?php foreach($transfers as $rows=>$transfer): ?>
			<p>  
			     <a href="<?php echo base_url("client/".$userDetails->userBaseUrl."/application/".$applicationDetails->applicationID."/transfer/".$transfer->transferID) ?>">View Transfers</a>
			    <?php //echo $rows->transferReferrence; ?>			    
			</p>
			<?php endforeach; ?>
		    <?php endif; ?>
		 </div>  
		
		<div>
		    <hr>
		      <h3>Contribution <span class="small-text">Please add contribution details</span>
		     <a href="<?php echo base_url("client/".$userDetails->userBaseUrl."/application/".$applicationDetails->applicationID."/contribution/new") ?>" class="btn btn-gold pull-right small-text">Add</a>
		     </h3>

				    
		     <?php if($contributions): ?>
			<?php foreach($contributions as $rows=>$contribution): ?>
			<p>  
			     <a href="<?php echo base_url("client/".$userDetails->userBaseUrl."/application/".$applicationDetails->applicationID."/contribution/".$contribution->contributionID) ?>">View Contribution</a>
			    <?php //print_r($contribution) ?>			    
			</p>
			<?php endforeach; ?>
		    <?php endif; ?>
		</div>
		
		
		
		<div style="display: none">
		    <hr>
		
		<h3><b>Expression of wish </b>  Please add any beneficiary details
		 <button type="submit" class="btn btn-primary-2 pull-right">Add</button></h3>
		<hr>
		
		<h3><b>Benefits in payment</b> Please add income withdrawal details
		 <button type="submit" class="btn btn-primary-2 pull-right">Add</button></h3>
		</div>
		
	
		
		
		<div>
		    <hr>
		      <h3>Investment Instruction <span class="small-text">Please add investment details</span>
		     <a href="<?php echo base_url("client/".$userDetails->userBaseUrl."/application/".$applicationDetails->applicationID."/investment/new") ?>" class="btn btn-gold pull-right small-text">Add</a>
		     </h3>

				    
		     <?php if($investments): ?>
			<?php foreach($investments as $rows=>$investment): ?>
			<p>  
			     <a href="<?php echo base_url("client/".$userDetails->userBaseUrl."/application/".$applicationDetails->applicationID."/investment/".$investment->investmentInstructionID) ?>">View Investment Instructions</a>
						    
			</p>
			<?php endforeach; ?>
		    <?php endif; ?>
		</div>
		
		
	 
	    
	    </div><!-- end content-->
          
        </div>


      
    
	
	 <div class="col-md-4 sidebar">
	     <div class="jumbotron">
		 <ul class="nav nav-stacked">
		     <li><a href="<?php echo base_url('client/'.$userDetails->userBaseUrl) ?>">Return to client</a></li>
		
		</ul>  
	     </div>
	     
	     <div class="jumbotron" >
		 <ul class="nav nav-stacked">
		   <li><a href="<?php echo base_url('client/'.$userDetails->userBaseUrl.'/application/'.$applicationDetails->applicationID) ?>">Return to Application</a></li>
	
		</ul>  
	     </div>

        </div>
    </div> <!-- row-->
    
</div>