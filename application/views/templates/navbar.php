<?php 
$this->load->library("authorisation/Authorisation_lib");
$authorisation = new Authorisation_lib();
$hasSearchPriv = $authorisation->hasPermission('canSearch');
$hasAddUserPriv = $authorisation->hasPermission('canAddUser');
$hasUploadPriv = $authorisation->hasPermission('canUpload');
$hasClientRole = $authorisation->hasRoles(array('Client'));

?>


<div class="logo-nav-wrapper page-width">
<nav class="navbar navbar-default ">
        <div class="container-fluid"> 
          
            <ul class="nav navbar-nav col-100 navbar-brand-div">  
                <li class="pull-left">
                     <a href="<?php echo base_url('dashboard') ?>" class="navbar-brand">
                  <img src="<?php echo base_url('images/im-logo-gold.png')?>" alt="Intelligent Money" />
              </a>
                </li>
               
               
		
            </ul>
            
        
        </div><!--/.container-fluid -->
</nav>

</div>



<nav class="navbar navbar-inverse navbar-custom">
        <div class="container-fluid page-width">
          <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
           
          </div>
          <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
		<li>
		    
		<?php echo anchor(base_url(),'Home','class="glyphicon glyphicon-home" ') ?>
		</li>
		
		<?php if($hasClientRole === true):?>
		<!-- only client is able to use this link-->
		<li>
		   <?php echo anchor(base_url('client/'.$this->session->userdata('userBaseUrl')),'Dashboard','class="glyphicon" ') ?> 
		</li>
		 <?php endif;?>
		
		
		<?php if($hasSearchPriv === true):?>
              <li class="<?php echo (isset($link_title) &&($link_title == 'search')? 'active': '') ?>">
		  <a href="<?php echo base_url('search-clients') ?>">Search</a>
	      </li>
	      <?php endif;?>
	      
	      
	      <?php if($hasSearchPriv === true):?>
		 <li class="<?php echo (isset($link_title) &&($link_title == 'add-user')? 'active': '') ?>">
                  <a href="<?php echo base_url('client/new') ?>">Add Client</a>
		</li>	      
	      <?php endif;?>
		
		
		<?php if(($hasUploadPriv === true) && (isset($show_uploadLink))):?>
              <li class="<?php echo (isset($link_title) &&($link_title == 'upload')? 'active': '') ?>">
                   <?php echo anchor(base_url('client/'.$this->session->userdata('userBaseUrl').'/upload-documents'),'Upload Document','class="glyphicon" ') ?> 
		
	      </li>
	       <?php endif;?>

            </ul>
	      <ul class="nav navbar-nav navbar-right">
		
	       <li class="">
		  
		   <?php echo anchor(base_url('logout'), 'Logout', 'class="glyphicon glyphicon-off" ') ?>
		   
	       </li>
	     </ul>
           
              
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    

 
<div class="container-fluid">
    <div class="page-width">
	 <?php $this->load->view('templates/flash_message');?>
    </div>
      
</div>

