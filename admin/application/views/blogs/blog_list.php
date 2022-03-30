<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Blogs List </h3>
        </div>
        <div class="d-inline-block float-right">
         <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>blogs/create_blogs_pdf" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url() ?>blogs/export_csv" class="btn btn-secondary">Export as CSV</a>
          </div>
        
          <a href="<?= base_url('blogs/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Blogs</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Name</th> 
              <th>Category</th>
              <th>Date</th> 
               <th>Posted By</th>
               <th>Image</th>
              <th>Created</th>
              <th>Status</th>
              <th width="100" class="text-right">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>  
</div>


<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('blogs/datatable_json')?>",
    "order": [[5,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
    { "targets": 1, "name": "name", 'searchable':true, 'orderable':true}, 
    { "targets": 1, "name": "ci_categories.name", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "blog_date", 'searchable':true, 'orderable':true}, 
    { "targets": 3, "name": "posted_by", 'searchable':false, 'orderable':false},
    { "targets": 4, "name": "image", 'searchable':false, 'orderable':false},
    { "targets": 5, "name": "created_at", 'searchable':false, 'orderable':false},
    { "targets": 6, "name": "is_active", 'searchable':true, 'orderable':true},
    { "targets": 7, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("blogs/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Status Changed Successfully", "success");
    });
  });
</script>


