  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

            <h3 class="card-title"> <i class="fa fa-plus"></i>

              Add New Blogs </h3>

          </div>

          <div class="d-inline-block float-right">

            <a href="<?= base_url('blogs'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Blogs List</a>

          </div>

        </div>

        <div class="card-body">

          <!-- For Messages -->

          <?php $this->load->view('includes/_messages.php') ?>
          <?php echo form_open_multipart(base_url('blogs/add'), 'class="form-horizontal"
             id="blogForm"'); ?>

          <div class="form-group row">

            <div class="col-md-6">
              <label for="status" class="col-sm-6 control-label">Category<span class="red">*</span></label>
              <select name="category" id="category" class="form-control">
                <option value="">Select Category</option>
                <?php

                foreach ($categories as $key => $value) { ?>
                  <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6">
              <label for="name" class="col-sm-6 control-label">Name <span class="red">*</span></label>
              <input type="text" name="name" class="form-control" id="name" placeholder="" value="<?= set_value('name'); ?>">
            </div>
            <div class="col-sm-6">
              <label for="date" class="col-sm-6 control-label">Blog Date<span class="red">*</span></label>
              <input type="date" name="blog_date" class="form-control" id="blog_date" placeholder="" value="<?= set_value('blog_date'); ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="posted_by" class="col-sm-6 control-label">Blog Posted By <span class="red">*</span></label>
              <input type="text" name="posted_by" class="form-control" id="text" placeholder="" value="<?= set_value('posted_by'); ?>">
            </div>
            <div class="col-sm-6">
              <label for="sort_description" class="col-sm-6 control-label">Sort Description<span class="red">*</span></label>
              <input type="text" name="sort_description" class="form-control" id="sort_description" placeholder="" value="<?= set_value('sort_description'); ?>">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6">
              <label for="sort_order " class="col-sm-6 control-label">Sort Order <span class="red">*</span></label>
              <input type="text" name="sort_order" class="form-control" id="sort_order" placeholder="" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')" value="<?= set_value('sort_order'); ?>">
            </div>
            <div class="col-md-6">
              <label for="status" class="col-sm-6 control-label">Select Status <span class="red">*</span></label>
              <select name="status" id="status" class="form-control">
                <option value="">Select Status</option>
                <option value="1" <?= (set_value('status') == '1') ? 'selected' : '' ?>>Active</option>
                <option value="0" <?= (set_value('status') == '0') ? 'selected' : '' ?>>Deactive</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="description" class="col-sm-6 control-label">Description <span class="red">*</span></label>
              <textarea name="description" class="form-control textarea" id="description" placeholder=""><?= set_value('description'); ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="slug" class="col-sm-6 control-label">SEO URL <span class="red">*</span></label>
              <input type="text" name="slug" class="form-control" id="slug" placeholder="" value="<?= set_value('slug'); ?>">
            </div>
            <div class="col-md-6">
              <label class="control-label">Image</label><br />
              <input type="file" name="image" id="image">
              <p><small class="text-success">Allowed Types: gif, jpg, png, jpeg</small></p>
              <input type="hidden" name="old_image" value="<?php echo html_escape(@$blog['image']); ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <input type="submit" name="submit" value="Add Blog" class="btn btn-submit btn-info pull-right">
            </div>
          </div>
          <?php echo form_close(); ?>
          <!-- /.box-body -->
        </div>
    </section>
  </div>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

  <script>
    $(function() {
      // bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5({
        toolbar: {
          fa: true,
          "html": true
        },
        "html": true,
        parser: function(html) {
          return html;
        }
      })
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#blogForm").validate({
        rules: {
          name: "required",
          category: "required",
          blog_date: "required",
          posted_by: "required",
          sort_description: "required",
          description: "required",
          sort_order: "required",
          status: "required",
          slug: "required",
          image: {
            required: true,
            extension: "jpg|png|gif|jpeg",
          },
        },
        messages: {
          name: "Please Enter Name",
          category: "Please Select Category",
          blog_date: "Please Enter Date",
          sort_description: "Please Enter Sort Description",
          posted_by: "Please Enter Post By",
          description: "Please Enter Description",
          slug: "Please Enter SEO URL",
          sort_order: "Please Enter Sort Order",
          status: "Please Select Status",
          image: {
            required: "Please Select Photo",
            extension: "Please upload file in these format only (jpg, jpeg, png, gif)",
          },

        }
      });
      $("body").on("click", ".btn-submit", function(e) {
        if ($("#blogForm").valid()) {
          $("#blogForm").submit();
        }
      });
    });
  </script>