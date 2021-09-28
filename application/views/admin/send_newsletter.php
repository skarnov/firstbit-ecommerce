<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Send Newsletter
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_subscription"> Manage Subscription</a></li>
            <li class="active">Send Newsletter</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>ecommerce/send_newsletter_mail" method="POST">
                        <div class="col-xs-10">
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="subject" placeholder="Enter The Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" required name="message" rows="14"></textarea>
                                </div>
                            </div>
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>