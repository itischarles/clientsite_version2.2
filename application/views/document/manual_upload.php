 

<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
            <div>
		 <h2 class="gr-text2">Manually upload document</h2>
		 <br/>
		 <div id="search_box_wrapper">
		<div class="search-box col-80 auto-margin">
		<?php  $form_attr= array( 'data-ajax'=>"false", 'class'=>"", 'role'=>"form");   ?>  
		<?php echo form_open_multipart('', $form_attr); ?>

		    <?php if(isset($upload_error)):?>
		    <div class="alert alert-danger">
			<?php echo $upload_error;?>
		    </div>
		    <?php endif; ?>

		   <div class="form-group row">
		       <label for="Reference" class="col-sm-3 form-control-label">Client Reference</label>   

			<div class="col-sm-4">
			<?php
			    $data = array(
				      'name'        => 'Reference',
				      'id'          => 'Reference',
				      'value'       => set_value('Reference'),
				      'placeholder' =>"client Reference",
				      'class'       => 'form-control field',
				    );

			    echo form_input($data);

			?>
			</div>
		       <?php  echo form_error('Reference', '<span class="error">', '</span>');?>
		    </div>

		    <div class="form-group row">
			<label for="file_name" class="col-sm-3 form-control-label">File Name</label>
			<div class="col-sm-6">
			<?php
			    $data = array(
				      'name'        => 'file_name',
				      'id'          => 'file_name',
				      'value'       => set_value('file_name'),
				      'placeholder' =>"file name",
				      'class'       => 'form-control field',
				    );

			    echo form_input($data);

			?>
			</div>
			<?php  echo form_error('file_name', '<span class="error">', '</span>'); ?>
		    </div>

		      <div class="form-group row">

			<label for="general_date1" class="col-sm-3 form-control-label">Date Added</label>
			<div class="col-sm-5">
			<?php
			    $data = array(
				      'name'        => 'date_added',
				      'id'          => 'general_date1',
				      'value'       => set_value('date_added'),
				      'placeholder' =>"date added",
				      'class'       => 'form-control- field' ,
				    );

			    echo form_input($data);		    
			?>

			</div>
			 <?php echo form_error('date_added', '<span class="error">', '</span>'); ?>
		    </div>
		     <div class="form-group row">

			 <label for="user_doc" class="col-sm-3 form-control-label">File</label>
			<div class="col-sm-6">
			<?php
			    $data = array(
				      'name'        => 'user_doc',
				      'id'          => 'user_doc',                   
				      'class'       => 'field' ,
				    );

			    echo form_upload($data);
			   // echo form_error('userfile', '<span class="error">', '</span>');
	//		    if($file_box_error > 0):
	//			echo '<span class="error">Invalid file</span>';
	//		    endif;
			?>
			</div>
			 <?php  echo form_error('user_doc', '<span class="error">', '</span>');?>
		     </div> 

		     <div class="form-group row pull-right">

			 <label for="user_doc" class="col-sm-3 form-control-label"></label>
			 <div class="col-sm-6">
			      <?php //echo form_submit('upload', 'Upload','class="btn btn-primary"'); ?>
			 </div>

		     </div>

        </div>
    </div>
    
		

	    </div>
        </div>


      
    
	
	 <div class="col-md-4 sidebar">
	      <div class="jumbotron ">
		<h2>Show Client </h2> 
		<h2>details here </h2> 

	    </div>
          <?php $this->load->view('users/application-button');?>      
        </div>
    </div> <!-- row-->
    
</div>

