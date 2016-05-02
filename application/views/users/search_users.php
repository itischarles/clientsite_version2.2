<?php
 $search_param  = ($this->input->get('search_param') ? $this->input->get('search_param') : '');
?>




  

<div class="container-fluid page-width" style="">

    <div class="row ">	
        <div class="col-md-8">
            <div>
		 <p class="center">
		    <br/>
		    Please enter search criteria. Either client's names  or ID or Reference.
		    <br/><br/>
		</p>

		<div id="search_box_wrapper">
		    <div class="search-box col-80 auto-margin">
		    <?php  $form_attr= array( 'data-ajax'=>"false", 'class'=>"form-inline", 'role'=>"form", 'method'=>'get');   ?>  
		    <?php echo form_open(base_url('search-clients'), $form_attr); ?>
		      <div class="form-group">
			 <?php echo form_label('Enter a search term', 'search_param'); ?>
			 	
			  <input type="text" name="search_param" value="<?php echo $search_param ?>" size="30"
			       placeholder="e.g Client's names or ID or Reference" class="form-control field"/>
		 
		      </div>
			  <?php echo form_submit('Search', 'Search','class="btn btn-gold"'); ?>

		    </div>
		</div>


		 <?php if(isset($searchList) && !empty($searchList)):?>

		<div id="search-results" style="margin-top: 2em">
		    <table class="table table-hover table-striped auto-margin" >
			<thead class="doclist-header">
			    <tr>
				<th>s/n</th>
				<th>Full Names</th>
				<th>Reference</th>
				<th>Status</th>
			    </tr>
			</thead>

			<tbody>
			<?php if(!empty($searchList)):?>
			  <?php $counter = 1; ?>
			<?php foreach ($searchList as $key=>$value):?>
			    <tr>
				<td><?php echo $counter;?></td>
				<td>
				    <?php echo anchor_popup(base_url('client/'.$value->userBaseUrl), $value->userFirstName." ". $value->userLastName)?>

				</td>
				<td><?php //echo $value->userReference;?></td>
				<td><?php echo ($value->userIsActive ==1)? " Active" : " Account is Disabled" ?></td>
			    </tr>                

			    <?php $counter++?>
			<?php endforeach;?>
			<?php endif;?>

			</tbody>
		    </table>

			<div>
			    <?php 	
			    if(isset($this->pagination)):

				echo "<span class='pagination_total_rec'>".
				    //$this->pagination->total_rows.
				show_pagination_text($this->pagination->cur_page, $this->pagination->per_page, 3)    .                           
				    "</span> &nbsp;&nbsp;&nbsp;&nbsp;";
				echo $this->pagination->create_links();  
			    endif; 		    
				    ?>	
			</div>
		</div>

		 <?php endif;?>
	    </div>
        </div>


      
    
	
	 <div class="col-md-4">
         <?php $this->load->view('templates/info-sidebar');?>       
        </div>
    </div> <!-- row-->
    
</div>