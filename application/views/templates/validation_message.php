<?php

/* 
 * display validation error messages
 * 
 * add the view to the section/form you wish to show the validation message
 */

?>

<?php if(validation_errors()):?>

<div class="alert-danger alert" id="validation_error">
	   <?php  echo validation_errors() ;?>
   </div>
<?php endif; ?>