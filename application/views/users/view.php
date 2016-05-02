  

<div class="container-fluid page-width" style="">

    <div class="row ">
	
	
        <div class="col-md-8">
            <div>
		<h2 class="gr-text2 underline"><?php echo (!empty($userDetails)? ucwords($userDetails->userTtitle ." ".$userDetails->userFirstName). " ".$userDetails->userLastName :'') ?></h2>

		<br/>

		<div class="row">
		 <div class="col-sm-6">
		    <h4>Contact Details</h4>
		    <table class="table" border="0">

			  <tr>  <th>Home Phone</th> <td><?php echo $userDetails->userTel ?></td> </tr>
			  <tr>  <th>Work Phone</th> <td><?php ?></td> </tr>
			  <tr>  <th>Mobile    </th> <td><?php echo $userDetails->userMobile ?></td> </tr>
			  <tr>  <th>Email     </th> <td><?php echo $userDetails->userEmail ?></td> </tr>
			  <tr>  <th>  &nbsp;   </th> <td> &nbsp;</td> </tr>
		    </table>
		</div>


		 <div class="col-sm-6">
		    <h4>Personal Details</h4>
		    <table class="table" border="0">
			  <tr>  <th>Address 1</th>  <td><?php echo $userDetails->userAddressLine1 ?></td> </tr>
			  <tr>  <th>Address 2</th>  <td><?php echo $userDetails->userAddressLine2 ?></td> </tr>
			  <tr>  <th>Postcode</th>   <td><?php echo $userDetails->userPostcode ?></td> </tr>
			  <tr>  <th>Town</th>       <td><?php echo $userDetails->userTown ?></td> </tr>
			  <tr>  <th>County</th>     <td><?php echo $userDetails->userCounty ?></td> </tr>
		    </table>
		</div>

		</div>
	    </div>

          
        </div>


      
    
	
	 <div class="col-md-4">
         <?php $this->load->view('templates/info-sidebar');?>       
        </div>
    </div> <!-- row-->
    
</div>