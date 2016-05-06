

<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
	    
	    <div><!-- start content-->
		<h2>		  
		<?php  echo (!empty($userDetails)? ucwords($userDetails->userTitle ." ".$userDetails->userFirstName). " ".$userDetails->userLastName :'') ?> 
		 Client Contributions
		</h2> 
	   
		
		<h3>Application Reference: <?php echo $applicationDetails->applicationReference; ?></h3>
         
		
		
		<div>
		    <h3>Single Contribution</h3>
		    
		    <table class="table">
			<tr>
			    <td>Amount of lump sum investment(£)</td>
			    <td><?php echo $contribution->lumpSumAmount ?></td>
			</tr>
			
			
		    </table>
		</div>
		
		
		<div>
		    <h3>Regular Contribution</h3>
		    
		    <table class="table">
			<tr>
			    <td>Amount of Regular Contribution(£)</td>
			    <td><?php echo $contribution->regularContributionAmount ?></td>
			</tr>
			<tr>
			    <td>Frequency of Regular Contribution</td>
			    <td><?php echo $contribution->regularContributionfrequency ?></td>
			</tr>
			<tr>
			    <td colspan="100">Direct Debit Information</td>
			</tr>
			<tr>
			    <td>Account Holder(s)</td>
			    <td><?php echo $contribution->bankAccountHolder ?></td>
			</tr>
			<tr>
			    <td>Bank Account Number</td>
			    <td><?php echo $contribution->bankAccountNumber ?></td>
			</tr>
			
			<tr>
			    <td>Bank Sort Code</td>
			    <td><?php echo $contribution->bankSortCode ?></td>
			</tr>
			<tr>
			    <td>Bank/Building Society Name</td>
			    <td><?php echo $contribution->bankName ?></td>
			</tr>
			
			<tr>
			    <td>Bank Address Line 1</td>
			    <td><?php echo $contribution->bankAddressLine1 ?></td>
			</tr>
			<tr>
			   <td>Bank Address Line 2</td>
			    <td><?php echo $contribution->bankAddressLine2 ?></td>
			</tr>
			<tr>
			   <td>Bank Address Line 3</td>
			    <td><?php echo $contribution->bankAddressLine3 ?></td>
			</tr>
			<tr>
			    <td>Town/City</td>
			    <td><?php echo $contribution->bankAddressTownCity ?></td>
			</tr>
			<tr>
			    <td>County</td>
			    <td><?php echo $contribution->bankAddressCounty ?></td>
			</tr>
			<tr>
			    <td>Bank PostCode</td>
			    <td><?php echo $contribution->bankPostCode ?></td>
			</tr>
			
		    </table>
		</div>
			
	 
	    
	    </div><!-- end content-->
          
        </div>


      
    
	
	 <div class="col-md-4 sidebar">
	     <div class="jumbotron">
		 <ul class="nav nav-stacked">
		     <li><a href="<?php echo base_url('client/'.$userDetails->userBaseUrl.'/application/'.$applicationDetails->applicationID."/contribution/".$contribution->contributionID."/edit") ?>">Edit Contribution</a></li>
		
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