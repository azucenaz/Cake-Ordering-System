<?php 
session_start();
include 'connection.php';
include 'auth.php';
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

<link href="font-awesome-4.0.3/css/font-awesome.min.css" rel="stylesheet" media="screen">
<link href="style/dashboard.css" rel="stylesheet">
<link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
 <script type="text/javascript">
            <?php 

              $total = $dbConn->query("SELECT sum(total_payment) FROM tbl_transactions");
              $distotal = $total->fetch(PDO::FETCH_ASSOC);
          ?>
           <?php 

            $total1 = $dbConn->query("SELECT sum(total_payment) FROM tbl_transactions where date_trans = '".date('Y-m')."' ");
            $distotal1 = $total1->fetch(PDO::FETCH_ASSOC);


            $total2 = $dbConn->query("SELECT * FROM tbl_orders where status = 'Cooking' ");
            $distotal2 = $total2->rowCount();

              $total3 = $dbConn->query("SELECT * FROM tbl_orders where status = 'Claimed' ");
            $distotal3 = $total3->rowCount();
                 $total4 = $dbConn->query("SELECT * FROM tbl_orders where status = 'Prepared' ");
            $distotal4 = $total4->rowCount();

        ?>
  window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "BEBONG'S STATISTICS"    
      },
      animationEnabled: true,
      axisY: {
        title: ""
      },
      legend: {
        verticalAlign: "top",
        horizontalAlign: "center"
      },
      theme: "theme3",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "grey",
        legendText: "Monthly Sales",
        dataPoints: [     
        {y: <?php echo isset($distotal4) ? $distotal4  : '0';?>, label: "Cake Prepared"},
        {y: <?php echo isset($distotal2) ? $distotal2 : '0';?>, label: "Cake Cooking"},
        {y: <?php echo isset($distotal3) ? $distotal3 : '0';?>, label: "Total Cake"},
       

        
        ]
      }   
      ]
    });

    chart.render();
  }
  </script>
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
          <h2 class="page-title">Dashboard <small>Statistics and more</small></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
               <script type="text/javascript" src="canvasjs.min.js"></script>
                  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          </div>
           <div class="row">
            
            <h2>Total Sales: PHP <?php echo isset($distotal['sum(total_payment)']) ? number_format($distotal['sum(total_payment)'],2) : '0';?> <div class="pull-right">Monthly Sales: <?php echo isset($distotal1['sum(total_payment)']) ? number_format($distotal1['sum(total_payment)'],2) : '0';?></div></h2>

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
<script class="include" type="text/javascript" src="javascript/jquery191.min.js"></script> 
<script class="include" type="text/javascript" src="javascript/jquery.jqplot.min.js"></script> 
<script src="assets/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/sparkline/jquery.customSelect.min.js" ></script>
<script src="assets/sparkline/sparkline-chart.js"></script>
<script src="assets/sparkline/easy-pie-chart.js"></script>
<script src="js/select-checkbox.js"></script> 
<script src="js/to-do-admin.js"></script> 

<!--switcher html start-->
<!-- <div class="demo_changer active" style="right: 0px;">
  <div class="demo-icon"></div>
  <div class="form_holder">
    <div class="predefined_styles"> <a class="styleswitch" rel="a" href=""><img alt="" src="images/a.jpg"></a> <a class="styleswitch" rel="b" href=""><img alt="" src="images/b.jpg"></a> <a class="styleswitch" rel="c" href=""><img alt="" src="images/c.jpg"></a> <a class="styleswitch" rel="d" href=""><img alt="" src="images/d.jpg"></a> <a class="styleswitch" rel="e" href=""><img alt="" src="images/e.jpg"></a> <a class="styleswitch" rel="f" href=""><img alt="" src="images/f.jpg"></a> <a class="styleswitch" rel="g" href=""><img alt="" src="images/g.jpg"></a> <a class="styleswitch" rel="h" href=""><img alt="" src="images/h.jpg"></a> <a class="styleswitch" rel="i" href=""><img alt="" src="images/i.jpg"></a> <a class="styleswitch" rel="j" href=""><img alt="" src="images/j.jpg"></a> </div>
  </div>
</div> -->

<!--switcher html end--> 
<script src="assets/switcher/switcher.js"></script> 
<script src="assets/switcher/moderziner.custom.js"></script>
<link href="assets/switcher/switcher.css" rel="stylesheet">
<link href="assets/switcher/switcher-defult.css" rel="stylesheet">
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/a.css" title="a" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/b.css" title="b" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/c.css" title="c" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/d.css" title="d" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/e.css" title="e" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/f.css" title="f" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/g.css" title="g" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/h.css" title="h" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/i.css" title="i" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/j.css" title="j" media="all" />



</body>

<!-- Mirrored from www.riaxe.com/marketplace/thin-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Mar 2016 01:08:50 GMT -->
</html>
