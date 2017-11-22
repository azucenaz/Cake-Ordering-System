<?php

session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{
	$getitem = $dbConn->query("SELECT * FROM tbl_sales where id = '".$_POST['id']."' ");
	$disitem = $getitem->fetch(PDO::FETCH_ASSOC);

	$newtotal = $_POST['quantity'] * $disitem['price'];

	$dbConn->query("UPDATE tbl_sales SET quantity = '".$_POST['quantity']."',total = '".$newtotal."' where id = '".$_POST['id']."' ");
	header("location:../motif.php");


}

?>