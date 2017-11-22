<?php

include '../connection.php';
session_start();

if (isset($_POST['submit'])) 
{
	
	$dbConn->query("UPDATE tbl_orders SET status = '".$_POST['status']."' where id = '".$_POST['id']."'  ");
	$_SESSION['message'] = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                Successfully Updated Order Information.
                            </div>';
	header("location:../orders.php");
}

?>