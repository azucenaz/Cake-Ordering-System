<?php
session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{
	$checkcustomer = $dbConn->query("SELECT * FROM tbl_customers where firstname = '".$_POST['firstname']."' AND lastname = '".$_POST['lastname']."'  ");
	if ($checkcustomer->rowCount() > 0 ) 
	{
		$_SESSION['message'] = '';
		header("location:../customers.php");
	}
	else
	{
		$dbConn->query("INSERT INTO tbl_customers (firstname,middlename,lastname,contact,address,email) VALUES ('".$_POST['firstname']."','".$_POST['middlename']."','".$_POST['lastname']."','".$_POST['contact']."','".$_POST['address']."','".$_POST['email']."') ");
		$_SESSION['message'] = '';
		header("location:../customers.php");
	}
}

?>