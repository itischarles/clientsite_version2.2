


</div><!-- end #main-->
</div> <!-- end page wrap-->

<div class="footer">
    
    
    <footer>
        <div class="container-fluid">
            <div class="row page-width">
		
		 <ul id="footer_nav-" class="nav nav-tabs">
		    <li><a href="<?php echo base_url() ?>">Home</a></li>
		    <li><a href="#<?php //echo base_url('static/page/privacy/#cookie-policy') ?>">Cookie Policy</a></li>
		    <li><a href="#<?php //echo base_url('static/page/privacy/#privacy') ?>">Privacy Policy</a></li>
		    <li><a href="#<?php //echo base_url('static/page/privacy/#disclosure') ?>">Disclosure Agreement</a></li>
		    <li><a href="#" >About Us</a></li>
		    <li><a href="#" >Contact Us</a></li>

		</ul>
	    </div>
	    <div class="row page-width">
                  <p class="text-center" style="">
                    &copy; <?php echo date('Y') ;?>. The Intelligent Money Ltd Invoice System
                </p>
            </div>
     
    </div>
    </footer>
</div>

</div> <!-- end page wrapper-->
    
    <script type="text/javascript">
         var jsconfig = {
            baseurl: "<?php echo base_url(); ?>"         
        };
      
    </script>
   

<script src="<?php echo base_url('third_party/jquery/jquery_2_1_4.js') ?>"></script>
<script src="<?php echo base_url('third_party/bootstrap/js/bootstrap.min.js') ?>"></script>  

<script src="<?php echo base_url('third_party/jquery-ui-1-11-4/jquery-ui.min.js') ?>"></script>

<script src="<?php echo base_url() ?>/third_party/x-editable/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url('third_party/highcharts/js/highcharts.js') ?>"></script>
<script src="<?php echo base_url('third_party/ckeditor/ckeditor.js') ?>"></script>


<script type="text/javascript" src="<?php echo base_url('third_party/jquery-table2excel/jquery.table2excel.js') ?>"></script>


<script type="text/javascript" src="<?php echo base_url('third_party/table_sorter/jquery.tablesorter.js') ?>"></script>

<script type="text/javascript" src="<?php echo base_url('third_party/jshashtable-2.1.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('third_party/jquery.numberformatter-1.2.2.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('third_party/timepicker/jquery.timepicker.min.js') ?>"></script>

    
    <script src="<?php echo base_url('js/scripts.js') ?>"></script>
    
    <?php if(isset($extra_js) &&(!empty($extra_js))): ?>
	<script src="<?php echo $extra_js ?>"></script>
    <?php endif;?>
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('third_party/ie10/ie10-viewport-bug-workaround.js') ?>"></script>
    
    <script src="<?php echo base_url('third_party/price_formater/price_format.js') ?>"></script>
  

  </body>
</html>
