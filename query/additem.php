<?php

session_start();
include '../connection.php';




if (isset($_POST['submit'])) 
{
	$checksales = $dbConn->query("SELECT * FROM tbl_sales where sales_id = '".$_SESSION['trans_id']."' AND product_name = '".$_POST['product_name']."' ");
	$dissales = $checksales->fetch(PDO::FETCH_ASSOC);
	if ($checksales->rowCount() > 0 ) 
	{
		$newqty = $_POST['quantity'] + $dissales['quantity'];
		$newtotal = $newqty * $dissales['price'];
		$dbConn->query("UPDATE tbl_sales SET quantity = '".$newqty."',total = '".$newtotal."' where sales_id = '".$_SESSION['trans_id']."' AND product_name = '".$_POST['product_name']."' ");
		header("location:../nonmotif.php");
	}
	else
	{
		$total = $_POST['price'] * $_POST['quantity'];
		$dbConn->query("INSERT INTO tbl_sales (sales_id,product_name,description,price,total,quantity) VALUES ('".$_SESSION['trans_id']."','".$_POST['product_name']."','".$_POST['description']."','".$_POST['price']."','".$total."','".$_POST['quantity']."') ");
		header("location:../nonmotif.php");
	}

}

?>