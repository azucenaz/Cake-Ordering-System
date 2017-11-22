<?php

session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{
	$getcustomer = $dbConn->query("SELECT * FROM tbl_customers where id = '".$_POST['id']."' ");
	$discus = $getcustomer->fetch(PDO::FETCH_ASSOC);

	$_SESSION['customername'] = $discus['firstname'].' '.$discus['lastname'];
	$_SESSION['customerid'] = $discus['id'];

	header("location:../motif.php");


}

?>