<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Banner
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_banner"> Manage Banner</a></li>
            <li class="active">Edit Banner</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>ecommerce/update_banner" method="POST" name="banner" enctype="multipart/form-data">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Banner Link </label>
                                    <input type="text" name="banner_link" value="<?php echo $banner_info->banner_link; ?>" class="form-control">
                                    <input type="hidden" name="banner_id" value="<?php echo $banner_info->banner_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Banner Image </label>
                                    <img src="<?php echo base_url() . $banner_info->banner_image; ?>" style="height: 200px; width: 300px;" />
                                    <input type="file" name="banner_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Banner Position</label>
                                        <select name="banner_position" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Position</option>
                                            <option value="1">E - Ticket</option>
                                            <option value="2">E - Courier</option>
                                            <option value="3">E - Service</option>
                                            <option value="4">Banner</option>
                                        </select>
                                    </div>
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
<script>
    document.forms['banner'].elements['banner_position'].value = '<?php echo $banner_info->banner_position; ?>';
</script>