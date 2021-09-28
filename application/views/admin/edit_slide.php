<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Slide
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_slider"> Manage Slider</a></li>
            <li class="active">Add New Slide</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>ecommerce/update_slide" method="POST" enctype="multipart/form-data">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Slide URL </label>
                                    <input type="text" name="slide_url" value="<?php echo $slide_info->slide_url; ?>" class="form-control">
                                    <input type="hidden" name="slide_id" value="<?php echo $slide_info->slide_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Slide Image </label>
                                    <img src="<?php echo base_url().$slide_info->slide_image; ?>" style="height: 200px; width: 300px;" />
                                    <input type="file" name="slide_image" class="form-control">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Edit</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>