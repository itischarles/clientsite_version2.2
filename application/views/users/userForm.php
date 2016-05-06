 

<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
          
	     <div>
      
		<?php echo form_open('', array('class'=>"reg-form"))?>
		<h3>Contact Details</h3>

		<p class="form-group"><span class="red-notice">The fields marked * are required</span></p>

		<?php if(validation_errors()): ?>
		<div class="form-group">
		    <div class="alert-danger alert">
			<?php echo validation_errors()?>
		    </div>
		</div>
		<?php endif;?>


		<div class="form-group">
		    <?php echo form_label('Title', 'userTitle') ?>
		    <?php
		      $data = array(
			'name'        => 'userTitle',
			'id'          => 'userTitle',
			'value'       => set_value('userTitle', (!empty($user)) ? $user->userTitle : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userTitle') ?></span>

		</div>
		<div class="form-group">
		    <?php echo form_label('First Name', 'userFirstName') ?>
		    <?php
		      $data = array(
			'name'        => 'userFirstName',
			'id'          => 'userFirstName',
			'value'       => set_value('userFirstName', (!empty($user)) ? $user->userFirstName : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userFirstName') ?></span>

		</div>
		<div class="form-group">
		    <?php echo form_label('Last Name', 'userLastName') ?>
		    <?php
		      $data = array(
			'name'        => 'userLastName',
			'id'          => 'userLastName',
			'value'       => set_value('userLastName', (!empty($user)) ? $user->userLastName : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userLastName') ?></span>

		</div>
		<div class="form-group">
		    <?php echo form_label('Date of Birth', 'userDOB') ?>
		    <?php
		      $data = array(
			'name'        => 'userDOB',
			'id'          => 'userDOB',
			'value'       => set_value('userDOB', (!empty($user)) ? $user->userDOB : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userDOB') ?></span>

		</div>
		<div class="form-group">
		    <?php echo form_label('Address Line 1', 'userAddressLine1') ?>
		    <?php
		      $data = array(
			'name'        => 'userAddressLine1',
			'id'          => 'userAddressLine1',
			'value'       => set_value('userAddressLine1', (!empty($user)) ? $user->userAddressLine1 : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userAddressLine1') ?></span>

		</div>
		<div class="form-group">
		    <?php echo form_label('Address Line 2', 'userAddressLine2') ?>
		    <?php
		      $data = array(
			'name'        => 'userAddressLine2',
			'id'          => 'userAddressLine2',
			'value'       => set_value('userAddressLine2', (!empty($user)) ? $user->userAddressLine2 : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userAddressLine2') ?></span>

		</div>
		
		<div class="form-group">
		    <?php echo form_label('Town/City', 'userTown') ?>
		    <?php
		      $data = array(
			'name'        => 'userTown',
			'id'          => 'userTown',
			'value'       => set_value('userTown', (!empty($user)) ? $user->userTown : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userAddressLine1') ?></span>

		</div>
		
		<div class="form-group">
		    <?php echo form_label('Postcode', 'userPostcode') ?>
		    <?php
		      $data = array(
			'name'        => 'userPostcode',
			'id'          => 'userPostcode',
			'value'       => set_value('userPostcode', (!empty($user)) ? $user->userPostcode : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userPostcode') ?></span>

		</div>
		
		<div class="form-group">
		    <?php echo form_label('County', 'userCounty') ?>
		    <?php
		      $data = array(
			'name'        => 'userCounty',
			'id'          => 'userCounty',
			'value'       => set_value('userCounty', (!empty($user)) ? $user->userCounty : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userCounty') ?></span>

		</div>
		<div class="form-group">
		    <?php echo form_label('Telephone', 'userTel') ?>
		    <?php
		      $data = array(
			'name'        => 'userTel',
			'id'          => 'userTel',
			'value'       => set_value('userTel', (!empty($user)) ? $user->userTel : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('userTel') ?></span>

		</div>
		
		
		

		 <div class="form-group">
		    <?php echo form_label('Email', 'userEmail') ?>
		    <?php
		      $data = array(
			'name'        => 'userEmail',
			'id'          => 'userEmail',
			'value'       => set_value('userEmail', (!empty($user)) ? $user->userEmail : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		     <span class="input-is-required">*</span>

		</div>


		 <div class="form-group">
		    <?php echo form_label('National Insurance No.', 'userNinum') ?>
		    <?php
		      $data = array(
			'name'        => 'userNinum',
			'id'          => 'userNinum',
			'value'       => set_value('useuserNinumrPwordHash', (!empty($user)) ? $user->userNinum : ''),
			'class'       => 'field'
		       );

		    echo form_password($data);
		    ?>

		</div>

		<p>&nbsp;</p>
		<div class="form-group">
		    <p>
		    <?php 
			
			echo form_submit('add_user', "Add user", 'class="btn btn-primary-2"');
			
		     ?>
		    </p>
	
		</div>
		<?php echo form_close()?>
       
	    </div>
	    
        </div>


      
    
	
	 <div class="col-md-4">
         <?php $this->load->view('templates/info-sidebar');?>       
        </div>
    </div> <!-- row-->
    
</div>