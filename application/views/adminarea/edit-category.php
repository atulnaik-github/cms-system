    <title><?php echo adminTitle."Edit Category"; ?></title>
    <main class="app-content">
        <?php $this->load->view('adminarea/includes/alert-message'); ?>
        <?php foreach ($category_data as $cat_value) {?>
           <div class="app-title">
              <div>
                 <h1><i class="fa fa-edit"></i> Edit Category Details</h1>
             </div>
             <ul class="app-breadcrumb breadcrumb">
                 <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                 <li class="breadcrumb-item">Category List</li>
                 <li class="breadcrumb-item"><a href="<?= site_url('admin/edit-category/').$cat_value->id; ?>">Edit Category</a></li>
             </ul>
         </div>
         <form action="<?php echo site_url('admin/edit-category'); ?>" method="post">
          <div class="row">
             <div class="col-md-6">
                <div class="tile">
                   <div class="tile-body">
                      <div class="row">
                        <input type="hidden" name="cat_id" value="<?php echo $cat_value->id; ?>">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input class="form-control" id="category_name" name="category_name" value="<?php echo $cat_value->category_name;?>" type="text" placeholder="Enter category name">
                                <small><?php echo form_error('category_name'); ?></small>                           
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                               <option value="" selected="" disabled="">-- Status --</option>
                               <option value="1" <?php if($cat_value->status == '1'): ?> selected="" <?php endif; ?>>Active</option>
                               <option value="0" <?php if($cat_value->status == '0'): ?> selected="" <?php endif; ?>>In-Active</option>
                           </select>
                       </div>
                   </div>
               </div>
               <div class="tile-footer">
                  <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit">
              </div>
          </div>
      </div>
  </div>
</form>
<?php } ?>
</main>