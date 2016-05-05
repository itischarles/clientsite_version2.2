<div class="">
    
    
    
    <h1 class="text-center"><b></b>Investment Options</h1> 
    <hr style="display: block;margin-top: 0.5em;    margin-bottom: 0.5em;    margin-left: auto;
        margin-right: auto;    border-style: inset;    border-width: 2px;">
    
     <form  role="form" action='<?php echo base_url("client/".$userDetails->userBaseUrl."/investment/new/".$applicationDetails->applicationID) ?>' method="post">
      
    <input type="hidden" name="investmentIntructionID" class="form-control"> 
    <input type="hidden" name="applicationID" class="form-control" value="<?php echo @$app_id;?>"> 
  
    <div class="col-sm-12">
        <?php $msg = $this->session->flashdata("flash_msg");
        if($msg != ''){?>
        <div class="alert alert-warning alert-dismissible" role="alert"><?php 
        
            echo $msg;
        
        ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-sm-3"><h3>Investment Options <b style="color: red;">*</b></h3> </div>
            <div class="col-sm-9">
                <div class="radio">
                    <label><input type="radio" name="investment_options" value="IM Optimum Growth" checked>IM Optimum Growth</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="investment_options" value="IM Optimum Income">IM Optimum Income</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="investment_options" value="IM Optimum Growth & Income">IM Optimum Growth & Income </label>
                </div>
                <span class="text-danger"><?php echo form_error('investment_options'); ?></span>
                <p>Please select the investment portfolio you require(you can change this at any time)</p> </p>
            
            </div>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-3"><h3>Percentage of Investment</h3> </div>
            <div class="col-sm-9">
            <div class="row">
                <div class="form-group  col-sm-3">

                    <input type="number"  class="form-control" name="percentage_of_investment" min="1" max="10" value="<?php echo set_value('percentage_of_investment'); ?>" >
                    
                </div>
                <span class="text-danger"><?php echo form_error('percentage_of_investment'); ?></span>
                </div>
                <p>For example 100% unless you selected more then one option (in which case you must ensure the total in each of these boxes amounts to 100%)</p>
            </div>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-3"><h3>What is your Target Date?</h3> </div>
            <div class="col-sm-9">
             <div class="row">
                <div class="form-group  col-sm-4">
                    
                  
                    <input type="text" id="target_dates" name="target_dates" value="<?php echo set_value('target_dates'); ?> "  class="form-control" >
                                                     
                                 </div>
                 <span class="text-danger"><?php echo form_error('target_dates'); ?></span>

            </div>
                      
       
       
                <p>Please select a target date to deliver a lump sum for withdrawal (you can change this at any time).</p>
            
            </div>
         <div class="form-group col-sm-offset-3">  
           <button type="submit" class="btn btn-primary btn-lg" name="submit" value="submit">Save</button>
        </div>
            

        </div>
    </div>
     </form> 
</div>
