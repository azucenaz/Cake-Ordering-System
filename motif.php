<?php 
session_start();
include 'connection.php';
include 'auth.php';

$_SESSION['pickup'] ='';
if (isset($_POST['submit'])) 
{
  $_SESSION['ins'] = $_POST['special'];
  $_SESSION['cakemsg'] = $_POST['cakemsg'];
  $_SESSION['pickup'] = $_POST['pickup'];
}

$_SESSION['current'] = 'motif';
if (!isset($_SESSION['trans_id1'])) 
{
    function numberletter() 
{
          $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          srand((double)microtime()*1000000);
          $i = 0;
          $passii = '' ;
          while ($i <= 8) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $passii = $passii . $tmp;
            $i++;
          }
          return $passii;
}

$_SESSION['trans_id1'] = numberletter();
}
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
        <?php 
                        $total = $dbConn->query("SELECT sum(total) FROM tbl_sales where sales_id = '".$_SESSION['trans_id1']."' ");
                        $distotal = $total->fetch(PDO::FETCH_ASSOC);
                        ?>
          <h1 style="color:white;font-size:80px;" class="page-title"><b>TOTAL:</b> <b style="color:white;font-size:80px;" class="pull-right"> <?php echo isset($distotal['sum(total)']) ? number_format($distotal['sum(total)'],2) : '0.00' ;?></b></h1>
           <?php 

          echo isset($_SESSION['message']) ? $_SESSION['message'] : '';
          unset($_SESSION['message']);

          ?>
        </div>
      </div>
       <div class="row">
         <div class="col-lg-12"> 
          <div class="widget">
            <div class="widget-header" style="height:50px;"> 
              <h5>Name: <?php echo isset($_SESSION['customername']) ? ucfirst($_SESSION['customername']) : ''; ?> <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#add"> <label class="fa fa-pencil"></label></button>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Type: <?php 
                if(isset($_GET['id']))
              {
              $_SESSION['custype'] = $_GET['id'];
            } echo isset($_SESSION['custype']) ? $_SESSION['custype'] : 'Walk In'; ?> 
            
             
              </h5> <?php echo isset($distotal['sum(total)']) ?  '<button class="btn btn-success pull-right btn-lg" data-toggle="modal" data-target="#proceed"><label class="fa fa-money" ></label> PROCEED TO PAYMENTS</button>' : '' ;?>
            </div>
            <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="proceed">
                  <div class="modal-dialog" style="width:300px;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 id="myModalLabel" class="modal-title">Amount</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" id="motifform"  action="query/trans1.php" class="form-horizontal">
                        <?php 

                        if (isset($_SESSION['custype'])) 
                        {
                          if($_SESSION['custype'] == 'Reserved') 
                          {
                            $newtotal = $distotal['sum(total)'] / 2;
                          } 
                          else 
                          {
                            $newtotal = $distotal['sum(total)'];
                          } 
                        }
                        else
                        {
                            $newtotal = $distotal['sum(total)'];
                        }

                        ?>

                     
                          <input type="number" min="<?php echo isset($newtotal) ? $newtotal:'0';?>" class="form-control" name="amount" required step="0.01" value="1">
                          <br>
                           Claim Date: <input type="date" name="claimdate" class="form-control" value="<?php echo date("Y-m-d");?>">
                      </div>
                      <div class="modal-footer">
                        <center>
                        <button class="btn btn-success btn-lg btn-block" type="submit" name="submit" id="paynow">PAY</button>
                        </center>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
                </div>
             <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="type">
                  <div class="modal-dialog" style="width:300px;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 id="myModalLabel" class="modal-title">Type</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="query/custype.php" class="form-horizontal">
                         <select class="form-control" name="type" required>
                           <option value="">Choose</option>
                           <option value="Reserved">Reserved</option>
                           
                           <option value="Walk In">Walk In</option>
                         </select>
                      </div>
                      <div class="modal-footer">
                        <center>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">APPLY</button>
                        </center>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
                </div>
             <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="add">
                  <div class="modal-dialog" style="width:300px;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 id="myModalLabel" class="modal-title">Customer List</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="query/add.php" class="form-horizontal">
                         <select class="form-control" name="id">
                           <option value="">Choose</option>
                           <?php 
                           $getcus = $dbConn->query("SELECT * FROM tbl_customers");
                            while($row = $getcus->fetch(PDO::FETCH_ASSOC))
                            {
                           ?>

                           <option value="<?php echo $row['id'];?>"><?php echo $row['firstname'].' '.$row['lastname'];?></option>

                           <?php } ?>
                         </select>
                      </div>
                      <div class="modal-footer">
                        <center>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">ADD</button>
                        </center>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
                </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-content">
                  <div class="panel-heading"> <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle"> <button class="btn btn-primary">Add Details</button></a> </div>
                  <div style="height: auto;" class="panel-collapse collapse" id="collapseOne">
                    <form method="post" action="">
                    <div class="panel-body">
                    <div class="col-lg-6">Special Instructions<textarea class="form-control" rows="5" name="special"><?php echo isset($_SESSION['ins']) ? $_SESSION['ins']: '';?></textarea></div>
                    <div class="col-lg-6">Cake Message<textarea class="form-control" rows="5" name="cakemsg"><?php echo isset($_SESSION['cakemsg']) ? $_SESSION['cakemsg']: '';?></textarea></div>

                    <div class="col-lg-6">Pick Up Store
                    <select class="form-control" name="pickup">
                      <option value=""></option>
                      <option value="Mandaue"  <?php if($_SESSION['pickup'] == 'Mandaue'){echo 'selected';}?>>Mandaue</option>
                      <option value="Lapu-lapu" <?php if($_SESSION['pickup'] == 'Lapu-lapu'){echo 'selected';}?>>Lapu-lapu</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-lg-offset-5 col-lg-5">
                    <input type="submit" class="btn btn-success btn-lg" value="Save" name="submit"></div>
                    </form>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-shopping-cart"></i>

              <h3>Cart List</h3>
            </div>
            <div class="widget-content">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th class="hidden-xs">Action(s)</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $getcart = $dbConn->query("SELECT * FROM tbl_sales where sales_id = '".$_SESSION['trans_id1']."' ");
                while($discart = $getcart->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <tr>
                  <td><?php echo $discart['product_name'];?></td>
                  <td><?php echo number_format($discart['price'],2);?></td>
                  <td><?php echo $discart['quantity'];?></td>
                  <td><?php echo number_format($discart['total'],2);?></td>
                  <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo $discart['id'];?>"><label class="fa fa-pencil"></label></button> <a href="query/removecart1.php?id=<?php echo $discart['id'];?>" class="btn btn-danger btn-sm"><label class="fa fa-times"></label></a></td>
                </tr>
                    <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="<?php echo $discart['id'];?>">
                  <div class="modal-dialog" style="width:300px;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 id="myModalLabel" class="modal-title">Quantity</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="query/updateitem1.php" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo $discart['id'];?>">
                          <input type="number" name="quantity"  class="form-control" required min="1" value="<?php echo $discart['quantity'];?>"> 
                      </div>
                      <div class="modal-footer">
                        <center>
                        <button class="btn btn-success btn-lg btn-block" type="submit" name="submit">UPDATE</button>
                        </center>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
                </div>
                <?php 
              }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header">
            <h3>Product List</h3>
            </div>

            <div class="widget-content">
         
<div class="example_alt_pagination">
      <div id="container">
        <div class="full_width big"></div>
  <div id="demo">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
      <thead>
        <tr>
          <th>Product Name</th>
          <th class="hidden-xs">Price</th>
          <th class="hidden-xs">Description</th>
         <th>Category</th>
          <th>Action(S)</th>
          </tr>
        </thead>
      <tbody>
        <?php
        $getcustomers = $dbConn->query("SELECT * FROM tbl_products where category != 'Cake' ");
        while ($row = $getcustomers->fetch(PDO::FETCH_ASSOC)) {
          # code...
        
        ?>  
        <TR>
          <td><?php echo $row['product_name'];?></td>
          <td><?php echo number_format($row['price'],2);?></td>
          <td><?php echo $row['description'];?></td>
          <td><?php echo $row['category'];?></td>
          <td> <form method="post" action="query/additem1.php" class="form-horizontal">
                          <input type="hidden" value="<?php echo $row['product_name'];?>" name="product_name">

                          <input type="hidden" value="<?php echo $row['price'];?>" name="price">

                          <input type="hidden" value="<?php echo $row['description'];?>" name="description">
                          <input type="number" name="quantity"  class="form-control" required min="1" style="width:65px;">  <button class="btn btn-success btn-sm" type="submit" name="submit" style="margin-top:-59px;margin-left:68px;"><label class="icon-shopping-cart"></label></button></td>
          
          

        </TR>
          <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="edit<?php echo $row['id'];?>">
                  <div class="modal-dialog" style="width:300px;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 id="myModalLabel" class="modal-title">Quantity</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="query/additem1.php" class="form-horizontal">
                          <input type="hidden" value="<?php echo $row['product_name'];?>" name="product_name">

                          <input type="hidden" value="<?php echo $row['price'];?>" name="price">

                          <input type="hidden" value="<?php echo $row['description'];?>" name="description">
                          <input type="number" name="quantity"  class="form-control" required min="1"> 
                      </div>
                      <div class="modal-footer">
                        <center>
                          </center>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
                </div>
        <?php
      }
        ?>
        </tbody>

  </table>
    </div>
        
        
      
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
 <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#example1').dataTable( {
          "sPaginationType": "full_numbers"
        } );
      } );
    </script>
 <script type="text/javascript" charset="utf-8">
      $(document).ready(function() 
      {
        $('#paynow').click( function()

        {

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
