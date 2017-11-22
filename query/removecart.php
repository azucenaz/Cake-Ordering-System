n<?php
session_start();
include '../connection.php';


	$dbConn->query("DELETE FROM tbl_sales where id = '".$_GET['id']."' ");
	header("location:../nonmotif.php");


?>