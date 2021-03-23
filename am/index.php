<?php include'config/database.php'  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bienvenues admin</title>
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
        Tableau de bord
        
      </h1>
      
    </section>
    <h1 style="text-align: center;">abonnees</h1>

<h1><marquee>  Vous etes dans le tableau de bord de Logistics-bamara </marquee></h1>
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <?php
          $pu = $connect->query('SELECT max(Id_user) id_user FROM abonne'); 
?>
<?php while ($a= $pu->fetch())  {?>
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$a['id_user'];?></h3>

              <p>Abonnes</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <?php } ?>
            <a href="abo.php" class="small-box-footer">voir plus <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <?php $s = $connect->query('SELECT SUM(fin) AS SUM FROM services');  ?>
            <?php while ($f= $s->fetch())  {?>
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$f['SUM'];?><sup style="font-size: 50px"></sup></h3>

              <p>$</p>
            </div>
             <?php } ?>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">Voir plus<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
           <?php

    $pu = $connect->query('SELECT max(Ida) ida FROM services'); 
?>
<?php while ($a= $pu->fetch())  {?>
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$a['ida'];?></h3>

              <p>Commandes</p>
            </div>
            <?php } ?>
            <div class="icon">
              <i class="fa fa-newspaper"></i>
            </div>
            <a href="data.php" class="small-box-footer">Voir plus <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <h1 style="text-align: center;"> Divers</h1>


    <div class="row">
        
         <div class="col-lg-3 col-xs-6">
          <?php

    $com = $connect->query('SELECT max(Id) id FROM commande'); 
?>
<?php while ($c= $com->fetch())  {?>
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$c['id'];?></h3>

              <p>Commandes divers</p>
            </div>
             <?php } ?>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="#" class="small-box-footer">Voir plus <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        

         <div class="col-lg-3 col-xs-6">
          <?php

    $com = $connect->query('SELECT max(Id) id FROM commande'); 
?>
<?php while ($c= $com->fetch())  {?>
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$c['id'];?></h3>

              <p>Commandes divers</p>
            </div>
             <?php } ?>
            <div class="icon">
              <i class="fa fa-newspaper"></i>
            </div>
            <a href="#" class="small-box-footer">Voir plus <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-lg-3 col-xs-6">
          <?php $su = $connect->query('SELECT SUM(fin) AS SUM FROM commande');  ?>
            <?php while ($fin= $su->fetch())  {?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$fin['SUM'];?></h3>

              <p>$</p>
            </div>
            <?php } ?>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->
      </div>



   
    <!-- JS, Popper.js, and jQuery -->
    <script  src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


  </head>
  <body>
    
   
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="">Bamarara-logistique</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<script src="js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<!-- <script>
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
</script> -->
</body>
</html>
