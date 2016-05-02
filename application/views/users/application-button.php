<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php //print_r($userDetails) ?>
<div class="sidebar-wrapper">
<div class="jumbotron ">
      <h3 class="bl-text">Illustration</h3>
        
       <ul class="nav nav-stacked">
	   <li><a href="">Illustrate for SIPP</a></li>
	   <li><a href="">Illustrate for ISA</a></li>
	   <li><a href="">Illustrate for GIA</a></li>
       </ul>  

</div>

<div class="jumbotron ">
     <h3 class="bl-text">Application</h3>
        
    <ul class="nav nav-stacked">
	<li><a href="<?php echo base_url("client/".$userDetails->userBaseUrl."/application/new/sipp") ?>">Apply for SIPP</a></li>
	 <li><a href="<?php echo base_url("client/".$userDetails->userBaseUrl."/application/new/isa") ?>">Apply for ISA</a></li>
	 <li><a href="<?php echo base_url("client/".$userDetails->userBaseUrl."/application/new/gia") ?>">Apply for GIA</a></li>
    </ul>   

</div>
</div>