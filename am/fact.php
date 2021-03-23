<?php require('config/database.php');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nos abonnees</title>
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
        Facturation
        
      </h1>
      
    </section>

    <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a class="btn btn-default" href="#activity" data-toggle="tab">Commandes abonnes</a></li>
              <li><a class="btn btn-default" href="#timeline" data-toggle="tab">Commandes divers</a></li>
              <li><a class="btn btn-default" href="#settings" data-toggle="tab">Facturation</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
               <div class="breadcrumb">
          <div class="">
            <h3 class="font-weight-bold text-uppercase py-4" style="text-align: center;"><strong>Tableau de bord pour commandes abonées</strong></h3>
            <div class="row">
        <div class="col-md-3">
          <h5>Attribuer un agent</h5>
          <form method="POST" action="per.php">
           
                <div class="controls">
                <label><b>Numero :</b></label>
                <input type="text" class="form-control" name="ida" >
              </div>
              
                <div class="controls">
                <label><b>Nom :</b></label>
                <input type="text" class="form-control" name="per">
              </div>
              
              <br>
              <input type="submit" class="btn btn-primary" name="" value="Actualisé">
          </form>
        </div>
        <div class="col-md-3">
          <h5>Modifier L'etat</h5>
          <form method="POST" action="val.php">
             
                <div class="controls">
                <label><b>Numero :</b></label>
                <input type="text" class="form-control" name="ida" >
              </div>
              
                <div class="controls">
                <label><b>Etat :</b></label>
                <input type="text" class="form-control" name="val">
              </div>
              
              <br>
              <input type="submit" class="btn btn-primary" name="" value="Actualisé">
          </form>
        </div>
        <div class="col-md-3">
          <h5>Montant</h5>
          <form method="POST" action="fina.php">
             
                <div class="controls">
                <label><b>Numero :</b></label>
                <input type="text" class="form-control" name="ida" >
              </div>
              
                <div class="controls">
                <label><b>Montant :</b></label>
                <input type="text" class="form-control" name="fin">
              </div>
              
              <br>
              <input type="submit" class="btn btn-primary" name="" value="Actualisé">
          </form>
        </div>

        <div class="col-md-2">
          <h5>Facturation</h5>
          <form method="POST" action="">
             
                <div class="controls">
                <label><b>Numero :</b></label>
                <input type="text" class="form-control" name="ida" >
              </div>
              
                <div class="controls">
                <label><b>Montant :</b></label>
                <input type="text" class="form-control" name="fin">
              </div>
              
              <br>
            
          </form>
        </div>
        
        </div>



          </div>
        </div>
         <div class="">
      
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9">Commandes abonnes</div>
            <div class="col-lg-3">
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
                  <th>Action </th>
                  

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
      url:"fetch_pending.php",
      type:"POST"
    },
      dom: 'lBfrtip',
   buttons: [
    
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


        

              
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">


                 

                 <table class="table table-responsive-md text-center" id="table" class="table">

        <thead>
          

          <tr>
          
            <th class="text-center">Num</th>
            <th class="text-center">Date de service</th>
            
            <th class="text-center">Type de service</th>
            <th class="text-center">Detail de service</th>
            <th class="text-center">Abonné</th>
            <th class="text-center">Date de Realisation</th>
            <th class="text-center">Heure</th>
            <th class="text-center">Etat</th>
            <th class="text-center">Personne</th>
            <th class="text-center">Montant</th>
            <th class="text-center">val</th>


          </tr>
        </thead>
        <tbody >
                
                     
                        <?php
                
             $service = $connect->prepare('SELECT * FROM services  
              INNER JOIN login
              ON services.idc=login.id ORDER BY ida desc'); 
             // $service->execute(array(
             //          'idc' => $_SESSION['user']['id']
             //             ));  
                $don=$service->fetchAll(PDO::FETCH_OBJ);
                foreach($don as $s):  
                    ?><tr>
                        <td class="pt-3-half" contenteditable="false"><?=$s->ida;?></td>  
                        <td class="pt-3-half" contenteditable="false"><?=$s->datec;?></td>
                        
                        <td class="pt-3-half" contenteditable="false"><?=$s->type;?></td>
                        <td class="pt-3-half" contenteditable="false"><?=$s->detail;?></td>
                        <td class="pt-3-half" contenteditable="false"><?=$s->username;?></td>
                        <td class="pt-3-half" contenteditable="false"><?=$s->datej;?></td>
                        <td class="pt-3-half" contenteditable="false"><?=$s->heure;?></td>
                        <td class="pt-3-half" contenteditable="false"><?=$s->val;?></td>
                        <td class="pt-3-half" contenteditable="false"><?=$s->per;?></td>
                      
                      <td class="pt-3-half" contenteditable="false"><?=$s->fin;?></td>
            <td>
              <span class="table-update">
                <input type="submit" class="btn btn-primary btn-rounded btn-sm my-0" value="Actualiser">
               </span>
            </td>
            
          </tr>
         
         
        </tbody>
       

                     <?php
                   endforeach;


                      ?>
                   
         </table>


             </div>
              

              <div class="tab-pane" id="settings">


                

              
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    

  </head>
  
    
      
      
        
  </div>
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

</body>
</html>
