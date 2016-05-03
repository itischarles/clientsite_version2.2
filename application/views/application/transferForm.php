<div class="">


    <h1 class="text-center"><b></b>Pension Transfer </h1> 
    <hr style="display: block;margin-top: 0.5em;    margin-bottom: 0.5em;    margin-left: auto;
        margin-right: auto;    border-style: inset;    border-width: 2px;">
    <form  role="form" action='<?php echo base_url("client/".$userDetails->userBaseUrl."/transfer/new/".$applicationDetails->applicationID) ?>' method="post">

        <input type="hidden" name="transferID" class="form-control"> 
        <input type="hidden" name="applicationID" class="form-control" value="<?php echo @$app_id; ?>"> 
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3"><h3>Pension Provider</h3> </div>
                <div class="col-sm-9">
                    <div class="form-group col-sm-6">
                        <input type="text" name="pensionProvider" class="form-control" value="<?php echo set_value('pensionProvider'); ?>">
                        <span class="text-danger"><?php echo form_error('pensionProvider'); ?></span>
                    </div>
                    <div class="col-sm-12">
                        <p>Please complete the name of the pension provider you wish to transfer form.</p>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3"><h3>Reference Number?</h3> </div>
                <div class="col-sm-9">
                    <div class="form-group col-sm-6">
                        <input type="text" name="transferReferrence" class="form-control" value="<?php echo set_value('transferReferrence'); ?>">
                        <span class="text-danger"><?php echo form_error('transferReferrence'); ?></span>
                    </div>
                    <div class="col-sm-12">
                        <p>Please give the account/contact/reference number of this pension.</p>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3"><h3>Approximate Value (if known)</h3> </div>
                <div class="col-sm-9">
                    <div class="form-group col-sm-6">
                        <input type="text" name="approximateValue" class="form-control" value="<?php echo set_value('approximateValue'); ?>">
                        <span class="text-danger"><?php echo form_error('approximateValue'); ?></span>
                    </div>
                    <div class="col-sm-12">
                        <p>Please remember you must forward to us a discharge form for each pension provider</p>
                    </div>
                </div>
            </div>
transferReferrence
        </div>

        <div class="form-group col-sm-offset-3">  
            <button type="submit" class="btn btn-primary btn-lg" name="submit" value="submit">Save</button>
        </div>

    </form>
</div>

