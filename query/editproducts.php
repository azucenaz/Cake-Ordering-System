<?php
session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{
	$dbConn->query("UPDATE tbl_products SET product_name = '".$_POST['productname']."',price = '".$_POST['productprice']."',description = '".$_POST['description']."',category = '".$_POST['product_category']."'  where id = '".$_POST['id']."' ");
	$_SESSION['message'] = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                            Successfully updated product.
                            </div>';
		header("location:../products.php");
}

?>