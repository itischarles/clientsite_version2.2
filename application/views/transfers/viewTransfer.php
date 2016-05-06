

<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
	    
	    <div><!-- start content-->
		<h2>
		    Transfer Request for 
		    <span class=""> 
			<?php  echo (!empty($userDetails)? ucwords($userDetails->userTitle ." ".$userDetails->userFirstName). " ".$userDetails->userLastName :'') ?> 
		    </span>
		</h2> 
	   
		
		<h3><?php echo $applicationDetails->applicationType; ?> to be transferred
		</h3>
            

		<div>
		
		    
		    <?php if($transfer): ?>
		    <table class="table">
			<tr>
			    <td>Pension Provider</td>
			    <td><?php echo $transfer->pensionProvider?></td>
			</tr>
			
			<tr>
			    <td>Reference Number</td>
			    <td><?php echo $transfer->transferReferrence?></td>
			</tr>
			
			
			<tr>
			    <td>Approximate Value (if known)</td>
			    <td> <?php echo number_format($transfer->approximateValue,2)?></td>
			</tr>
			
		    </table>
			
		    <?php endif; ?>
		</div>  
		
		
		
	
		
	 
	    
	    </div><!-- end content-->
          
        </div>


      
    
	
	 <div class="col-md-4 sidebar">
	     <div class="jumbotron">
		 <ul class="nav nav-stacked">
		     <li><a href="<?php echo base_url('client/'.$userDetails->userBaseUrl.'/application/'.$applicationDetails->applicationID."/transfer/".$transfer->transferID."/edit") ?>">Edit Transfer</a></li>
		
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