  
<!-- not currently in use-->




<div class="container-fluid bg-gray" style="">

    <div class="row ">
	  <div class="col-md-3 sidebar">
         <?php //$this->load->view('users/sidebar');?>       
        </div>
	
        <div class="col-md-9 main-content-divier-right bg-white">            
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
		    <?php echo form_label('First Name', 'user_fname') ?>
		    <?php
		      $data = array(
			'name'        => 'user_fname',
			'id'          => 'user_fname',
			'value'       => set_value('user_fname', (!empty($user)) ? $user->user_fname : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>
		    <span class="alert-danger"> <?php echo form_error('user_fname') ?></span>

		</div>
		<div class="form-group">
		    <?php echo form_label('Last Name', 'user_lname') ?>
		    <?php
		      $data = array(
			'name'        => 'user_lname',
			'id'          => 'user_lname',
			'value'       => set_value('user_lname', (!empty($user)) ? $user->user_lname : ''),
			'class'       => 'field',
			  'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		    <span class="input-is-required">*</span>

		</div>

		 <div class="form-group">
		    <?php echo form_label('Email', 'user_username') ?>
		    <?php
		      $data = array(
			'name'        => 'user_username',
			'id'          => 'user_username',
			'value'       => set_value('user_username', (!empty($user)) ? $user->user_username : ''),
			'class'       => 'field',
			'required'  =>'required'
		       );

		    echo form_input($data);
		    ?>
		     <span class="input-is-required">*</span>

		</div>


		 <div class="form-group">
		    <?php echo form_label('Password', 'user_password') ?>
		    <?php
		      $data = array(
			'name'        => 'user_password',
			'id'          => 'user_password',
			'value'       => set_value('user_password', (!empty($user)) ? $user->user_password : ''),
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
    </div> <!-- end row-->    
</div>