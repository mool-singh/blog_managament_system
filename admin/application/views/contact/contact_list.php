<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/extensions/Buttons/css/buttons.bootstrap.min.css">
 <style>
 
 .dt-buttons
 {
   display:none;
 }

.btn-group a
{
  color:#ffffff !important;
}

 </style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-question-circle"></i>&nbsp; Contact Requests</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a onclick="print('buttons-pdf')" class="btn btn-secondary">Export as PDF</a>
            <a onclick="print('buttons-csv')" class="btn btn-secondary">Export as CSV</a>&nbsp
          </div> 
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
              <th>Email</th>
              <th>Mobile</th>
              <th>Message</th>
              <th>Date</th>
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
<script src="<?= base_url() ?>assets/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/extensions/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/extensions/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/extensions/Buttons/js/buttons.print.js"></script>

<script>

function print(cls)
{
  $('.'+cls).trigger("click");
}
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('contact/datatable_json')?>",
    "order": [[0,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "contact_request_id", 'searchable':true, 'orderable':true}, 
    { "targets": 1, "name": "contact_request_name", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "contact_request_email", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "contact_request_phone", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "contact_request_message", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "contact_request_date", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
  });
</script> 