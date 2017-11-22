<?php
session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{

	$checkproduct = $dbConn->query("SELECT * FROM tbl_products where product_name = '".$_POST['product_name']."' ");
	if ($checkproduct->rowCount() > 0) 
	{
		$_SESSION['message'] = '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                Product Name Already Exist.
                            </div>';
		header("location:../products.php");
	}
	else
	{
		$dbConn->query("INSERT INTO tbl_products (product_name,price,description,category) VALUES ('".$_POST['productname']."','".$_POST['productprice']."','".$_POST['description']."','".$_POST['product_category']."') ");
		$_SESSION['message'] = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                               New Product Added :<b>'.$_POST['productname'].'</b>
                            </div>';
		header("location:../products.php");
	}

}

?>