 
 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <section class="content">
     
        <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
            <h4><i class="fa fa-info-circle"></i>

              View Contact Request</h4>
          </div>

          <div class="d-inline-block float-right">
          <a title="View Request" class="delete btn btn-sm btn-warning" href="<?=base_url('contact')?>">All Request</a>
          </div>


        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-3">
                 <b> Name </b>
                </div>
                <div class="col-sm-6">
                 :  <?= $request_data['contact_request_name'];?>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-3">
                  <b>Email </b>
                </div>
                <div class="col-sm-6">
               : <?= $request_data['contact_request_email'];?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-3">
                  <b> Phone </b>
                </div>
                <div class="col-sm-6">
               : <?= $request_data['contact_request_phone'];?>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-3">
                  <b> Create Date </b>
                </div>
                <div class="col-sm-6">
                  : <?= date_time($request_data['contact_request_date']);?>
                </div>
              </div>
            </div>
            
          </div>
         
        
       
          
          <div class="row">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-2" style="max-width: 12.50%;">
                 <b>  Message </b>
                </div>
                <div class="col-sm-10">
               : <?= $request_data['contact_request_message'];?>
                </div>
              </div>
            </div>
          </div>
        </div>  
    </div>

  
    </section> 
  </div>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script> 
  var table = $('#na_datatable').DataTable({
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": "<?=base_url('inquiry/datatable_json_followuplist/'.$request_data['id'])?>",
    "order": [[5,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "id", 'searchable':false, 'orderable':false}, 
    { "targets": 1, "name": "type", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "subject", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "comments", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "attachment", 'searchable':false, 'orderable':false},
    { "targets": 5, "name": "followup_date", 'searchable':false, 'orderable':true}, 
    { "targets": 6, "name": "next_followup_date", 'searchable':false, 'orderable':true}
    ]
  }); 
</script> 
<script type="text/javascript">
  $(document).ready(function(){     
     $("#myform").validate({
        rules: {
            next_followup_date:"required",
            message:"required",

        },
        messages: {
            next_followup_date:"Please Enter Next Followup Date",
            message:"Please Enter Comments",
        
        }
    });
    $("body").on("click", ".btn-submit", function(e){
        if ($("#myform").valid()){
            $("#myform").submit();
        }
    });
  });  
</script>