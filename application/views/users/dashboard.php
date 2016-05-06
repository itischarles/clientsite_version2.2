<?php //print_r($userDetails) ?>
<div class="container-fluid page-width" style="">

    <div class="row ">
	
	
        <div class="col-md-9">
            <div>
<!--		<h2 class="gr-text2 underline"><?php //echo (!empty($userDetails)? ucwords($userDetails->userTitle ." ".$userDetails->userFirstName). " ".$userDetails->userLastName :'') ?></h2>

		<br/>-->
		
		<div class="jumbotron ">
		    <h1>Some Graphs here </h1> 
		    <h1>Some Graphs here </h1> 

		</div>
		
		
		<div class="row">
		    <h3>Illustration</h3>
		</div>
		
		
		<div class="row">
		    <h3>Applications</h3>
		    
		    <?php if(!empty($applications)):?>		    
		    <?php foreach($applications as $apps=>$app):?>
		    <p>
			<a href="<?php echo base_url('client/'.$userDetails->userBaseUrl.'/application/'.$app->applicationID) ?>">
			<?php echo $app->applicationType. " Application ".$app->applicationReference." started on ".changeDateFormat($app->application_date, 'jS M Y')?>
			</a>
		    </p>
		    <?php endforeach;?>		    
		    <?php endif;?>
		</div >         
	    </div>


	</div> <!-- end col-md-9-->
    
	
	 <div class="col-md-3 sidebar">
	     <div class="jumbotron ">
		<h2>Show Client </h2> 
		<h2>details here </h2> 

	    </div>
         <?php $this->load->view('users/application-button');?>       
        </div>
    
    </div><!-- row-->
</div>