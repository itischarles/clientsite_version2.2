<div class="">


    <h1 class="text-center"><b></b>Contribution</h1> 
    <hr style="display: block;margin-top: 0.5em;    margin-bottom: 0.5em;    margin-left: auto;
        margin-right: auto;    border-style: inset;    border-width: 2px;">

    <form  role="form" action='<?php echo base_url("client/".$userDetails->userBaseUrl."/contribution/new/".$applicationDetails->applicationID) ?>' method="post">

        <input type="hidden" name="contributionID" class="form-control"> 
        <input type="hidden" name="applicationID" class="form-control" value="<?php echo @$app_id; ?>"> 



        <div class="col-sm-12">
            <?php $msg = $this->session->flashdata("flash_msg");
        if($msg != ''){?>
        <div class="alert alert-warning alert-dismissible" role="alert"><?php 
        
            echo $msg;
        
        ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php } ?>
            
        </div>
        <div class="col-sm-12">
            
            <div class="col-sm-3"><h3>How do you wish to fund </h3> </div>
            <div class="col-sm-9">
                <div class="radio">
                    <label><input type="radio" name="fund_type" value="Lump sum investment" checked>Lump sum investment</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="fund_type" value="Regular Contribution">Regular Contribution</label>
                </div>
 <span class="text-danger"><?php echo form_error('fund_type'); ?></span>
                <div class="col-sm-12">
                    <p>Please tick all options that applay </p>
                </div>
            </div>


        </div>
        <div class="col-sm-12">

            <div class="col-sm-3"><h3>Amount of lump sum investment(£)</h3> </div>
            <div class="col-sm-9">
                <div class="form-group col-sm-6" style="padding-top: 20px;">
                    <input type="text" name="lump_sum_amount" class="form-control" value="<?php echo set_value('lump_sum_amount'); ?>" >
                    <span class="text-danger"><?php echo form_error('lump_sum_amount'); ?></span>
                </div>
                <div class="col-sm-12">
                    <p>Please make your cheque payable to "Intelligent Money"-[YOUR NAME]</p>
                </div>



            </div>
        </div>
        <div class="col-sm-12">

            <div class="col-sm-3"><h3>Amount of Regular Contribution(£)</h3> </div>
            <div class="col-sm-9">
                <div class="form-group col-sm-6" style="padding-top: 20px;">
                    <input type="text" name="regular_amount" class="form-control" value="<?php echo set_value('regular_amount'); ?>">
                    <span class="text-danger"><?php echo form_error('regular_amount'); ?></span>
                </div>
            </div>

        </div>
        <div class="col-sm-12">

            <div class="col-sm-3"><h3>Frequency of Regular Contribution(£)</h3> </div>
            <div class="col-sm-9">
                <div class="radio">
                    <label><input type="radio" name="frequency_regular" value="Monthly" checked>Monthly</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="frequency_regular" value="Quarterly">Quarterly </label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="frequency_regular" value="Annually">Annually</label>
                </div>
                 <span class="text-danger"><?php echo form_error('frequency_regular'); ?></span>
                <div class="col-sm-12">
                    <p>Please complete the Direct Debit Mandate below to make regular contributions</p>
                </div>

            </div>

        </div>
        <div class="col-sm-offset-3">
            <img src="images/debit_icon.gif" class="img-responsive" style="padding-top: 30px;" alt="debit_icons"> 
            <h3>Service User Number: 437245</h3> 

        </div>



        <div class="col-sm-12">
            <div class="col-sm-3"><h3>Account Holder(s)</h3> </div>
            <div class="col-sm-9">
                <div class="form-group col-sm-6" style="padding-top: 20px;">
                    <input type="text" name="account_holder" class="form-control" value="<?php echo set_value('account_holder'); ?>">
                    <span class="text-danger"><?php echo form_error('account_holder'); ?></span>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-3"><h3>Bank/Building Society Account Number</h3> </div>
            <div class="col-sm-9">
                <div class="form-group col-sm-6" style="padding-top: 20px;">
                    <input type="text" name="society_account_holder" class="form-control" value="<?php echo set_value('society_account_holder'); ?>">
                    <span class="text-danger"><?php echo form_error('society_account_holder'); ?></span>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-3"><h3>Sort Code</h3> </div>
            <div class="col-sm-9">
                <div class="form-group col-sm-6" style="padding-top: 20px;">
                    <input type="text" name="sorrt_code" class="form-control" value="<?php echo set_value('sorrt_code'); ?>">
                    <span class="text-danger"><?php echo form_error('sorrt_code'); ?></span>
                </div>
                <div class="col-sm-12">
                    0 to 6 max characters
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-3">
                <h3>Name and full postal address of your Bank or Building Society </h3> </div>
            <div class="col-sm-9">
                <div class="form-group col-sm-6" style="padding-top: 20px;">
                    <textarea class="form-control" name="postal_address" value="<?php echo set_value('postal_address'); ?>" ></textarea>
                    <span class="text-danger"><?php echo form_error('postal_address'); ?></span>
                </div>
                <div class="col-sm-9">
                    <p>Instructions to your Bank or Building Society: </p>
                    <p>Please pay Intelligent Money Direct Debits from the account
                        detailed in this instruction subject to the safeguards assured by 
                        the Direct Debit Guarantee.</p>
                    <p>
                        I understand this instruction may remain with Intelligent Money and, if so,
                        details will be passed electronically to my Bank/Building Society.
                    </p>
                    <p>Banks and Building Societies may not accept Direct Debit Instructions for some types of accounts.</p>
                    <p>Direct Debit Guarantee</p>
                    <ul>
                        <li>This Guarantee is offered by all banks and building societies that accept instructions to pay Direct Debits</li>
                        <li>If there are any changes to the amount, date or frequency of your Direct Debit, Intelligent Money will notify you 10 working days in advance of your account being debited or as otherwise agreed. If you request Intelligent Money to collect a payment, confirmation of the amount and date will be given to you at the time of the request.</li>
                        <li>If an error is made in the payment of your Direct Debit, by Intelligent Money or your bank or building society, you are entitled to a full and immediate refund of the amount paid from your bank or building society. If you receive a refund you are not entitled to, you must pay it back when Intelligent Money asks you to.</li>
                        <li>You can cancel a Direct Debit at any time by simply contacting your bank or building society. Written confirmation may be required. Please also notify us.</li>
                    </ul>
                </div>

            </div>

        </div>


        <div class="form-group col-sm-offset-3">  
           <button type="submit" class="btn btn-primary btn-lg" name="submit" value="submit">Save</button>
        </div>

    </form>
</div>

