
<div class="container">
  <div class="top-navbar header b-b"> <a data-original-titale="Toggle navigation" class="toggle-side-nav pull-left" href="#"><i class="icon-reorder"></i> </a>
  <!-- logo -->
   <img src="1.png" width="100px" height="80px" style="margin-bottom:-30px;margin-left:-230px;margin-top:-10px;"> <font style="font-family:Blackadder ITC;font-size:25px;">Bebong's Cakeshop</font> <div class="brand pull-left"> <a href="index.php"></a></div>
  
    <ul class="nav navbar-nav navbar-right  hidden-xs">
  
      <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-warning-sign"></i> <span class="badge"><?php 

            $getcount = $dbConn->query("SELECT * FROM tbl_orders where claimdate > '".date('Y-m-d')."' ");
            echo $getcount->rowCount();
            ?> </span> </a>
        <ul class="dropdown-menu extended notification">
          <li class="title">
            <p>You have <?php echo $getcount->rowCount(); ?> new notifications</p>
          </li>
          <?php while($row = $getcount->fetch(PDO::FETCH_ASSOC))
          {

            ?>
          <li> <a href="#"> <span class="label label-success"><i class="icon-plus"></i></span> <span class="message"> <?php echo $row['baking_order'];?> </span> </a> </li>

          <?php } ?>
        </ul>
      </li>
    
     
      <li class="dropdown user  hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-male"></i> <span class="username"><?php echo $_SESSION['fullname'];?></span> <i class="icon-caret-down small"></i> </a>
        <ul class="dropdown-menu">
          
          <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>