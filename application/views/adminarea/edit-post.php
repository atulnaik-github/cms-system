<title><?php echo adminTitle."Edit Post"; ?></title>
<main class="app-content">

    <?php foreach ($post_details as $post) {?>
	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Create New Post</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Post</li>
			<li class="breadcrumb-item"><a href="<?= site_url('admin/edit-post/').$post->id; ?>">Edit Post</a></li>
		</ul>
    </div>
	<form action="<?= site_url('admin/edit-post'); ?>" enctype="multipart/form-data" method="post">
		<div class="row">
			<div class="col-md-8">
				<div class="tile">
					<div class="row">
						<div class="col-lg-12">
                            <input type="hidden" value="<?php echo $post->id; ?>" name="post_id" id="post_id">
							<div class="form-group mb-4">
								<label for="post_title">Post Title</label>
								<input class="form-control" id="post_title" name="post_title" value="<?php echo $post->post_title; ?>" type="text" placeholder="Enter post title" required />
                            </div>
							<div class="form-group mb-4">
								<label for="post_category">Post Category</label>
								<select class="form-control text-capitalize" id="post_category" name="post_category" required="">
                                    <option selected="" disabled="">-- Choose Category --</option>
                                    <?php foreach ($category_details as $cat_details) {
                                        if ($cat_details->id == $post->category_id) { ?>
                                        <option value="<?php echo $cat_details->id; ?>" selected=""><?php echo $cat_details->category_name; ?></option>
                                    <?php } else {?>
                                        <option value="<?php echo $cat_details->id; ?>"><?php echo $cat_details->category_name; ?></option>
                                    <?php } } ?>
								</select>
								<small><?php echo form_error('post_category'); ?></small>
							</div>
							<div class="form-group mb-4">
                                <label for="post_img">Post Image</label>
                                <input type="hidden" value="<?php echo $post->post_img; ?>" name="old_img" id="old_img">
								<input class="form-control-file" id="post_img" name="post_img" onChange="displayImage(this)" accept="image/*" type="file" require>
							</div>
						</div>
                    </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="tile">
					<div class="row">
						<div class="col-lg-12 text-center">
							<img src="<?= site_url('').$post->post_img; ?>" onClick="triggerClick()" id="post_display" class="img-fluid" alt="img-thumbnail" style="height: 260px;">
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="tile">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" <?php if ($post->status == '1'):?> selected <?php endif; ?>>Active</option>
                            <option value="0" <?php if ($post->status == '0'):?> selected <?php endif; ?>>In-Active</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="">Is_Deleted</label>
                        <select name="is_deleted" id="is_deleted" class="form-control">
                            <option value="1" <?php if ($post->is_deleted == '1'):?> selected <?php endif; ?> >Live</option>
                            <option value="0" <?php if ($post->is_deleted == '0'):?> selected <?php endif; ?>>Dead</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div class="row">
						<div class="col-lg-12">
                            <h4 class="card-title">Post Description</h4>
							<!-- Create the editor container -->
							<div class="box-body pad form-group mb-4">
								<textarea class="form-control" rows="10" placeholder="Place some text here" name="post_description" required=""><?php echo $post->post_description; ?></textarea>
							</div>
						</div>
					</div>
					<div class="tile-footer">
						<input class="btn btn-primary" type="submit" name="submit" id="submit">
					</div>
				</div>
			</div>
		</div>
    </form>
    <?php } ?>
</main>

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