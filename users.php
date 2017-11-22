<?php 
session_start();
include 'connection.php';
include 'auth.php';

$_SESSION['current'] = 'users';
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
          <h2 class="page-title">Users</h2>
           <?php 

          echo isset($_SESSION['message']) ? $_SESSION['message'] : '';
          unset($_SESSION['message']);

          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" data-toggle="modal" data-target="#addcustomers">Add Users</button>
              <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="addcustomers">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 id="myModalLabel" class="modal-title">Add Users</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="query/addusers.php" class="form-horizontal">
                          Firstname <input type="text" class="form-control" name="firstname" required>
                          Middlename <input type="text" class="form-control" name="middlename" required>
                          Lastname <input type="text" class="form-control" name="lastname" required>
                          Contact <input type="text" class="form-control" name="contact" required>
                          Username <input type="text" class="form-control" name="username" required>
                          Password <input type="password" class="form-control" name="password" required>
                          Re-Password <input type="password" class="form-control" name="repassword" required>
                          Type<select class="form-control" name="type">
                            <option value="">Choose</option>
                            <option value="cashier">Cashier</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>

                            <option value="baker">Baker</option>
                          </select>
                          
                      </div>
                      <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">ADD USERS</button>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
                </div>
            </div>

            <div class="widget-content">
         
<div class="example_alt_pagination">
      <div id="container">
        <div class="full_width big"></div>
  <div id="demo">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
      <thead>
        <tr>
          <th>Full Name</th>
          <th class="hidden-xs">Username</th>
          <th class="hidden-xs">Contact</th>
          <th>Type</th>
          <th>Action(S)</th>
          </tr>
        </thead>
      <tbody>
        <?php
        $getcustomers = $dbConn->query("SELECT * FROM tbl_users where type != 'default' ");
        while ($row = $getcustomers->fetch(PDO::FETCH_ASSOC)) {
          # code...
        
        ?>  
        <TR>
          <td><?php echo $row['firstname'].' '.$row['lastname'];?></td>
          <td><?php echo $row['username'];?></td>
          <td><?php echo $row['contact'];?></td>
          <td><?php echo $row['type'];?></td>
          <td><button class="btn btn-success btn-sm" data-target="#edit<?php echo $row['id'];?>" data-toggle="modal"><label class="icon-pencil"></label></button></td>
          
          

        </TR>
          <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="edit<?php echo $row['id'];?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 id="myModalLabel" class="modal-title">Edit Users Information</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="query/editusers.php" class="form-horizontal">
                        <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                          Firstname <input type="text" class="form-control" name="firstname" required value="<?php echo $row['firstname'];?>">
                          Middlename <input type="text" class="form-control" name="middlename" required value="<?php echo $row['middlename'];?>">
                          Lastname <input type="text" class="form-control" name="lastname" required value="<?php echo $row['lastname'];?>">
                          Contact <input type="text" class="form-control" name="contact" required value="<?php echo $row['contact'];?>">
                          Username <input type="text" class="form-control" name="username" required value="<?php echo $row['username'];?>">
                          Password <input type="password" class="form-control" name="password" required value="<?php echo $row['password'];?>">
                          Re-Password <input type="password" class="form-control" name="repassword" required value="<?php echo $row['password'];?>">
                          Type<select class="form-control" name="type">
                            <option value="">Choose</option>
                            <option <?php if($row['type'] == 'cashier'){echo 'selected';}?>value="cashier">Cashier</option>
                            <option <?php if($row['type'] == 'admin'){echo 'selected';}?> value="admin">Admin</option>
                            <option <?php if($row['type'] == 'manager'){echo 'selected';}?>value="manager">Manager</option>
                            <option <?php if($row['type'] == 'baker'){echo 'selected';}?>value="baker">Baker</option>
                          </select>
                           Active<select class="form-control" name="active">
                            <option value="">Choose</option>
                            <option <?php if($row['status'] == 'active'){echo 'selected';}?>value="active">Active</option>
                            <option <?php if($row['status'] == 'disable'){echo 'selected';}?> value="disable">Not Active</option>
                           
                          </select>
                          
                      </div>
                      <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">UPDATE USERS</button>
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
