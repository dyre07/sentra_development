        <div class="">
          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>User Admin</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 1%">No. </th>  
                        <th style="width: 19%">Full Name</th>
                        <th style="width: 10%">Email</th>
                        <th style="width: 10%">Phone</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 10%">Foto</th>
                        <th style="width: 10%">Privilege</th>
                        <th style="width: 10%">Created By</th>
                        <th style="width: 10%">Date Created</th>
                      </tr>
                    </thead>

                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-3.2.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/media/js/jquery.dataTables.min.js')?>"></script>
 
 
<script type="text/javascript">
 
var table;
 
$(document).ready(function() {

    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "search": false,
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('user_management/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
    
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
});
</script>