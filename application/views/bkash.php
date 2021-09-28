<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="">Bkash</a></li>
    </ul>
    <div class="row"> 
        <div id="content" class="col-sm-9">
            <h1>Bkash</h1>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-collapse collapse in" id="collapse-checkout-option" style="height: auto;">
                        <div class="panel-body" style="padding:5%">
                            <div class="row">
                                <form action="<?php echo base_url(); ?>checkout/confirm_order" method="POST" class="form-horizontal">
                                    <h4>Pay via bKash Account: 01716138136 (bKash Personal Account) (You have to pay the 2% cash out fee).<br/><br/> After successful payment via bKash, Please send your transection id to this 01716138136 number.</h4>
                                    <div class="buttons">
                                        <div>
                                            <input type="submit" value="Execute" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>