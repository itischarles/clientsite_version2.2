

<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
	    
	    <div><!-- start content-->
		<h2>	Investment instruction for	  
		<?php  echo (!empty($userDetails)? ucwords($userDetails->userTitle ." ".$userDetails->userFirstName). " ".$userDetails->userLastName :'') ?> 
		
		</h2> 
	   
		
		<h3>Application Reference: <?php echo $applicationDetails->applicationReference; ?></h3>
         
		
		
		<div>
		   
		    
		    <table class="table">
			<tr>
			    <td>Investment Option</td>
			    <td><?php echo $investment->investmentTypeName ?></td>
			</tr>
			
			<tr>
			    <td>Investment target date</td>
			    <td><?php echo changeDateFormat($investment->investmentTargetDate) ?></td>
			</tr>
			<tr>
			    <td>Investment Percent</td>
			    <td><?php echo $investment->investmentPercent ?></td>
			</tr>
			
			
		    </table>
		</div>
		
		
	
			
	 
	    
	    </div><!-- end content-->
          
        </div>


      
    
	
	 <div class="col-md-4 sidebar">
	     <div class="jumbotron">
		 <ul class="nav nav-stacked">
		     <li><a href="<?php echo base_url('client/'.$userDetails->userBaseUrl.'/application/'.$applicationDetails->applicationID."/investment/".$investment->investmentInstructionID."/edit") ?>">Edit Investment</a></li>
		
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