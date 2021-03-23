<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Commandes abonnes</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="img/b.jpg" type="image/jpg">
  <!-- Bootstrap 3.3.7 -->
  <?php include'part/_link.php' ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">

      <span class="logo logo-lg"><b>Admin-</b><b style="color: #D2691E">BAMARA</b><b>-Log</b> </span>
    <nav class="navbar navbar-static-top">
      
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
     
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
              
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/b.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Bamara</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/b.jpg" class="img-circle" alt="User Image">

                <p>
                  Bamara-Logistique
                  <small>2019-2020</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Deconnexion</a>
                </div>
              </li>
            </ul>
          </li>
          
          
        </ul>
      </div>

    </nav>
  </header>

  <?php include'part/_aside.php' ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Commandes abonnes
        
      </h1>
      
    </section>



      
  </head>
  <body>
    <div class="container">
      
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9">Commandes abonnes</div>
            <div class="col-lg-3">
              <input class="btn btn-success" type="submit" name="" value="Etat & fin">
              

              <!-- <select name="column_name" id="column_name" class="form-control selectpicker" multiple>
                <option value="0">ID</option>
                    <option value="1">Customer First Name</option>
                    <option value="2">Customer Last Name</option>
                    <option value="3">Customer Email</option>
                    <option value="4">Customer Gender</option>

              </select> -->
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="sample_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Abonne</th>
                  <th>Type de services</th>
                  <th>detail</th>
                  <th>Da realisation</th>
                  <th>Heure</th>
                  <th>Date d'envoies </th>
                  <th>Etat </th>
                  <th>Personne</th>
                  <th>Fin </th>
                  <th>Action</th>

                  

                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    <br />
    <br />
  </body>
</html>
<script type="text/javascript" language="javascript">

$(document).ready(function(){
  
  var dataTable = $('#sample_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
      url:"fetch.php",
      type:"POST"
    },
      dom: 'lBfrtip',
   buttons: [
    'excel',
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
  $('#column_name').selectpicker();

  $('#column_name').change(function(){

    var all_column = ["0", "1", "2", "3", "4","5"];

    var remove_column = $('#column_name').val();

    var remaining_column = all_column.filter(function(obj) { return remove_column.indexOf(obj) == -1; });

    dataTable.columns(remove_column).visible(false);

    dataTable.columns(remaining_column).visible(true);

  });

}); 
</script>




   
  </div>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/popover.js"></script>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="">Bamara-logistique</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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


  $(document).ready(function (){
    $.('editbtn').on('click', function(){
      $('#editmodal').modal('show');

    });
  });

</script>




</body>
</html>
