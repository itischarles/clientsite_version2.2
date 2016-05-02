 

<div class="container-fluid page-width" style="">

    <div class="row ">
	
        <div class="col-md-8">
            
	     <div class="container-fluid">
              <h1>Welcome to your client site</h1>
         
          <?php if(isset($login_error)):?>              
            <div class="alert alert-danger"> 
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $login_error;?>
            </div>
          <?php endif;?>
            <?php if(validation_errors()):?>              
            <div class="alert alert-danger"> 
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo validation_errors();?>
            </div>
          <?php endif;?>
            
            <div id="login_form">
		<?php $form_attr= array( 'data-ajax'=>"false", 'role'=>"form");   ?>
		<?php echo form_open(base_url('login'), $form_attr) ?>
		   <div class="input-group has-error has-feedback">
		    <?php echo form_label('Username', 'username'); ?>
		    <?php
			$data = array(
				  'name'        => 'username',
				  'id'          => 'username',
				  'value'       => set_value('username'),
				  'placeholder' =>"Username",
				  'class'       => 'form-control field' . ((form_error('username')) ? ' error-border' : ''),
				);

			echo form_input($data);
			echo form_error('username');
		    ?>
		     <span class="<?php echo (form_error('username')?'glyphicon glyphicon-remove form-control-feedback' : '')?>"></span>  
		</div>




		   <div class="input-group has-error has-feedback">
		    <?php echo form_label('Passord', 'password'); ?>
		    <?php
			$data = array(
				  'name'        => 'password',
				  'id'          => 'password',
				  'value'       => set_value('password'),
				  'placeholder' =>"Password",
				  'class'       => 'form-control',
				);

			echo form_password($data);
			  echo form_error('password');
		    ?>
		    <span class="<?php echo (form_error('password')?'glyphicon glyphicon-remove form-control-feedback' : '')?>"></span>     
		</div>
        
        <div class="input-group">
            <br/>
             
              <?php echo form_submit('login', 'Login','class="btn btn-gold"'); ?>
         
        </div>
        
        <?php echo form_close()?>
    </div>
            
         
          
                 <div class="">
                     <br/>
                <h2>User Information</h2>   
                  <br/>
		  <p class=""> 
                       If you have received login details for your personal site from The Review Business, 
                       or The Pension Review Business please enter them above otherwise please contact us using the 
                       information displayed on this page.
                   </p>
                   </div>                
            
         </div>   <!-- end container-->   

        </div>
	
	 <div class="col-md-4">
         <?php $this->load->view('templates/info-sidebar');?>       
        </div>
	

    </div> <!-- end row-->
    
    
</div>