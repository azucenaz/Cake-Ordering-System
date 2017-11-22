<?php 
session_start();
include 'connection.php';
include 'auth.php';

$_SESSION['current'] = 'reports';
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from www.riaxe.com/marketplace/thin-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Mar 2016 01:08:24 GMT -->
<head>
<title>Bebong's Cakeshop</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/thin-admin.css" rel="stylesheet" media="screen">
<link href="css/font-awesome.css" rel="stylesheet" media="screen">
<link href="style/style.css" rel="stylesheet">
<link href="style/dashboard.css" rel="stylesheet">


<link href="font-awesome-4.0.3/css/font-awesome.min.css" rel="stylesheet" media="screen">
<link href="css/demo_page.css" rel="stylesheet">
<link href="css/demo_table.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<?php 
  include 'header.php';
?>
<div class="wrapper">
  <div class="left-nav">
  <div id="side-nav">
  <?php 
          switch ($_SESSION['type']) 
          {
            case 'default':
              include 'admin.php';
              break;
            case 'admin':
              include 'admin.php';
              break;
            case 'cashier':
             include 'cashier.php';
              break;

            case 'manager':
             include 'manager.php';
             break;
             case 'baker':
            include 'baker.php';
               break;
            default:
              header("location:login.php");
              break;
          }
      ?>
    </div>
  </div>
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">Search</h2>
           <?php 

          echo isset($_SESSION['message']) ? $_SESSION['message'] : '';
          unset($_SESSION['message']);

          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header">
            <h3> <form method="post" target="_blank" action="search.php">Date From <input REQUIRED type="date" name="datefrom"> Date To <input type="date" name="dateto" required> <input type="submit" name="submit" value="SEARCH"></form></h3>
            </div>


           
        
        
      
        </div>
    </div>
    
    
            </div>


             <div class="row">
        <div class="col-lg-12">
          <div class="col-md-offset-4 col-md-2">  
          <a href="motifreports.php" target="_blank" class="btn btn-primary btn-lg">MOTIF</a>
          </div>
             <div class="col-md-3">  
          <a href="nonmotifreports.php" target="_blank" class="btn btn-primary btn-lg">NON MOTIF</a>
          </div>
          
        </div>
      </div>
          </div>
        </div>
      </div>
      
      
      
      
      
    </div>
  </div>
</div>
<div class="bottom-nav footer">  </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/smooth-sliding-menu.js"></script>


<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#example').dataTable( {
          "sPaginationType": "full_numbers"
        } );
      } );
    </script>

<!--switcher html start-->

            
            
    <!--switcher html end-->
<script src="assets/switcher/switcher.js"></script> 
<script src="assets/switcher/moderziner.custom.js"></script> 
<link href="assets/switcher/switcher.css" rel="stylesheet">
<link href="assets/switcher/switcher-defult.css" rel="stylesheet">
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/a.css" title="a" media="all" />

</body>

<!-- Mirrored from www.riaxe.com/marketplace/thin-admin/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Mar 2016 01:09:40 GMT -->
</html>
