<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include 'part/_link.php' ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include 'part/_head.php' ?>
 
  </header>
  <?php include 'part/_aside.php' ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <div class="container">
      <br />
      <h1 align="center" class="text-primary"><b>How to Dynamically Display Hide DataTables Column with PHP Ajax</b></h1>
      <br />
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9">Sample Data</div>
            <div class="col-lg-3">
              <select name="column_name" id="column_name" class="form-control selectpicker" multiple>
                <option value="0">ID</option>
                    <option value="1">Customer First Name</option>
                    <option value="2">Customer Last Name</option>
                    <option value="3">Customer Email</option>
                    <option value="4">Customer Gender</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="sample_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Detail de services</th>
                  <th>Type de services</th>
                  <th>Heure</th>
                  <th>Dates</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    <br />
    <br />
  
<script type="text/javascript" language="javascript">

$(document).ready(function(){
  
  var dataTable = $('#sample_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
      url:"fetc.php",
      type:"POST"
    }
  });
  
  $('#column_name').selectpicker();

  $('#column_name').change(function(){

    var all_column = ["0", "1", "2", "3", "4"];

    var remove_column = $('#column_name').val();

    var remaining_column = all_column.filter(function(obj) { return remove_column.indexOf(obj) == -1; });

    dataTable.columns(remove_column).visible(false);

    dataTable.columns(remaining_column).visible(true);

  });

}); 
</script>




    
    
          
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
