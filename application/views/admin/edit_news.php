<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Update News
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_news"> Manage News</a></li>
            <li class="active">Update News</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>ecommerce/update_news" method="POST" name="news">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>News</label>
                                    <textarea name="news_title" class="form-control"><?php echo $news_info->news_title; ?></textarea>
                                    <input type="hidden" name="news_id" value="<?php echo $news_info->news_id; ?>">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>