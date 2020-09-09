<title><?php echo userTitle."Add Post"; ?></title>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Create New Post</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= site_url('user'); ?>">Dashboard</a></li>
                        <li><a href="javascript:void(0);">Post</a></li>
                        <li class="active">Add Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <form action="<?= site_url('user/add-post'); ?>" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header"><strong>Post Details</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group mb-4">
                                    <label for="post_title">Post Title</label>
                                    <input class="form-control" id="post_title" name="post_title" type="text" placeholder="Enter post title" value="<?php echo set_value('post_title'); ?>">
                                    <small><?php echo form_error('post_title'); ?></small>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="post_category">Post Category</label>
                                    <select class="form-control text-capitalize" id="post_category" name="post_category">
                                        <option selected="" disabled="">-- Choose Category --</option>
                                        <?php foreach ($category as $cat): ?>
                                            <option value="<?php echo $cat->id; ?>"><?php echo $cat->category_name; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small><?php echo form_error('post_category'); ?></small>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="post_img">Post Image</label>
                                    <input class="form-control-file" id="post_img" name="post_img"  onChange="displayImage(this)" accept="image/*" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header"><strong>Post Picture</strong></div>
                            <div class="card-body card-block row">
                                <div class="col-lg-12 text-center">
                                    <img src="<?= site_url('assets/userarea/images/img-thumbnail.jpg'); ?>" onClick="triggerClick()" id="post_display" class="img-fluid" alt="img-thumbnail" style="height: 273.5px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Post description</strong>
                            </div>
                            <div class="card-body">
                                <div class="box-body pad">
                                    <textarea class="textarea" placeholder="Place some text here" name="post_description" 
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo set_value('post_description'); ?></textarea>
                                    <small><?php echo form_error('post_description'); ?></small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!-- <input type="submit" class="btn btn-primary btn-sm" name="submit" id="submit"> -->
                                <input class="btn btn-primary btn-sm" type="submit" name="submit" id="submit">
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<script>
    function triggerClick(e) {
      document.querySelector('#post_img').click();
    }
    function displayImage(e) {
      if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
          document.querySelector('#post_display').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
</script>

