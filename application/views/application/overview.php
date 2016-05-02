
  

<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
	    
	    <div><!-- start content-->
		<h2><b>SIPP Application for</b> <span class="label label-default"> <?php  echo (!empty($userDetails)? ucwords($userDetails->userTtitle ." ".$userDetails->userFirstName). " ".$userDetails->userLastName :'') ?> </span></h2> 
	   
		
		
		<h3><b>Application Reference: <?php echo $applicationDetails->applicationReference; ?> 
		    <?php // echo (!empty($userDetails)? ucwords("$applicationReference"):'') ?>
		    </b></h3>
		<hr>
		 <h2><b>Establishment</b></h2>
		<hr>
		<h3><b>Client Detail</b> Completed </h3> 

		<hr>
		 <h3><b>Transfers</b> Please add any transfer details
		 <a href="<?php //echo base_url("transfers/pensionTransfer/$app_id") ?>" class="btn btn-primary pull-right">Add</a>
		 </h3>
		<?php if($transfer): ?>
		<?php foreach($transfer as $rows): ?>
		<p> Reference number for transfer <?php //echo $rows->transferReferrence; ?></p>
		<?php endforeach; ?>
		<?php endif; ?>
		<hr>
		 <h3><b>New Contribution</b> Please add any Contribution details
		 <a href="<?php //echo base_url("contributions/contribution/$app_id") ?>" class="btn btn-primary pull-right">Add</a>
		 </h3>
		<?php if($contribution): ?>
		<?php foreach($contribution as $rows): ?>
		<p>Reference number for contribution <?php //echo $rows->contributionsReference; ?></p>
		<?php endforeach; ?>
		<?php endif; ?>
		<hr>
		<h3><b>Expression of wish </b>  Please add any beneficiary details
		 <button type="submit" class="btn btn-default pull-right">Add</button></h3>
		<hr>
		<h3><b>Benefits in payment</b> Please add income withdrawal details
		 <button type="submit" class="btn btn-default pull-right">Add</button></h3>
		<hr>
		<h3><b>Investment Instruction</b> Please add Investment details
		<a href="<?php //echo base_url("investments/investmentOptions/$app_id") ?>" class="btn btn-primary pull-right">Add</a>
		</h3>
		<?php if($investment): ?>
		<?php foreach($investment as $rows): ?>
		<p>Reference number for Investment <?php //echo $rows->investmentReference; ?></p>
		<?php endforeach; ?>
		<?php endif; ?>
		<hr>
	 
	    
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