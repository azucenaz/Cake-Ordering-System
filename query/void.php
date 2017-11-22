<?php 

session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{

	$dbConn->query("UPDATE tbl_transactions SET status = 'VOID' where transaction_id = '".$_POST['void_id']."' ");

	$dbConn->query("UPDATE tbl_orders SET status = 'VOID' where baking_order = '".$_POST['void_id']."' ");
	$_SESSION['message'] = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                            Transaction successfully voided. 
                            </div>';
		header("location:../transactions.php");

}

?>