<?php 

include '../connection.php';
session_start();

if (isset($_POST['submit'])) 
{
	$dbConn->query("UPDATE tbl_customers SET firstname = '".$_POST['firstname']."',middlename = '".$_POST['middlename']."',lastname = '".$_POST['lastname']."',address = '".$_POST['address']."',contact = '".$_POST['contact']."',email = '".$_POST['email']."' WHERE id = '".$_POST['id']."'");
	$_SESSION['message'] = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                Successfully Updated Customer Information.
                            </div>';
	header("location:../customers.php");
}

?>