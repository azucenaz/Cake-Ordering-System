<ul id="nav">
        <li <?php if($_SESSION['current'] == 'dashboard'){ echo 'class="current"';}?>> <a href="index.php"> <i class="icon-dashboard"></i> Dashboard </a> </li>

     
        <li <?php if($_SESSION['current'] == 'orders'){ echo 'class="current"';}?>> <a href="orders.php"><!-- <span class="label label-success pull-right">
            <?php 
              $count = $dbConn->query("SELECT * FROM tbl_orders where status != 'VOID' ");
              echo $count->rowCount();
            ?>

        </span> --> 
        <i class="fa fa-cutlery"></i> Orders </a> </li>

     
        
      </ul>