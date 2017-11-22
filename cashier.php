<ul id="nav">
        <li <?php if($_SESSION['current'] == 'dashboard'){ echo 'class="current"';}?>> <a href="index.php"> <i class="icon-dashboard"></i> Dashboard </a> </li>

       
        <li <?php if($_SESSION['current'] == 'customers'){ echo 'class="current"';}?>> <a href="customers.php"> <i class="icon-group"></i> Customers List </a> </li>

        <li <?php if($_SESSION['current'] == 'Walk In'){ echo 'class="current"';}?>> <a href="nonmotif.php?id=Walk In"> <i class="icon-shopping-cart"></i> Walk In </a> </li>
        <li > <a href="#"> <i class="icon-shopping-cart"></i> Reservation  <i class="arrow icon-angle-left"></i></a>
          <ul class="sub-menu">

            
            <li > <a href="nonmotif.php?id=Reserved"> <i class="icon-angle-right"></i> Non Motif </a> </li>
            <li> <a href="motif.php?id=Reserved"> <i class="icon-angle-right"></i> Motif </a> </li>
          </ul>
        </li>
        <li <?php if($_SESSION['current'] == 'orders'){ echo 'class="current"';}?>> <a href="orders.php"><!-- <span class="label label-success pull-right">
            <?php 
              $count = $dbConn->query("SELECT * FROM tbl_orders where status != 'VOID' ");
              echo $count->rowCount();
            ?>

        </span> --> 
        <i class="fa fa-cutlery"></i> Orders </a> </li>

        <li <?php if($_SESSION['current'] == 'transactions'){ echo 'class="current"';}?>> <a href="transactions.php"> <i class="icon-edit"></i> Transactions </a> </li>
    
        <li <?php if($_SESSION['current'] == 'reports'){ echo 'class="current"';}?>> <a href="reports.php"> <i class="icon-cog"></i> Reports </a> </li>
        
      </ul>