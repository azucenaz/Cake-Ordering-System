<?php

session_start();
include 'connection.php';

?>
<?php 
	$getinfo  = $dbConn->query("SELECT * FROM tbl_transactions where transaction_id = '".$_GET['id']."' ");
	$disinfo = $getinfo->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html style="font-family:Verdana;">
<center>
<head>
	<title>SALES INVOICE</title>
</head>
<body>
<h1>SALES INVOICE</h1>

<h3><font color="red"><?php echo $_GET['id'];?></font></h3>
<table width="600px;">
	<tr>
		<td><B>Date: </B><?php echo $disinfo['date_trans'];?></td>
		<td></td>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td><b>Customer Name:</b></td>
		<td><?php echo $disinfo['customer_name']?></td>
		<td><b>Cashier:</b></td>
		<td><?php echo $disinfo['user_name'];?></td>
	</tr>
	
</table>
<table border="1" cellspacing="0" width="600px;" cellpadding="10">
	
	<tr>
		<td><b>Particulars</b></td>
		<td><b>Price</b></td>
		<td><b>Qty</b></td>
		<td><b>Total</b></td>
	</tr>
	<?php 
	$getdata = $dbConn->query("SELECT * FROM tbl_sales where sales_id = '".$_GET['id']."' ");
		while ($row = $getdata->fetch(PDO::FETCH_ASSOC)) 
		{
		
	?>
	<tr>
	<td><?php echo $row['product_name']?></td>

	<td><?php echo number_format($row['price'],2);?></td>

	<td><?php echo $row['quantity']?></td>

	<td><?php echo number_format($row['total'],2)?></td>
	</tr>
	<?php } ?>
</table>

<table width="600px;">
	<tr>
		<td><h3>Total:</h3></td>
		<td><?php echo number_format($disinfo['total_payment'],2);?></td>
		<td><h3>Amount Tender:</h3></td>
		<td><?php echo number_format($disinfo['amount_tender'],2); ?></td>
	</tr>
	<tr>
		<td ><h3>Change:</h3></td>
		<td><?php $change = $disinfo['amount_tender'] - $disinfo['total_payment']; 
		echo number_format($change,2);
		?></td>
		<td><h3>Claim Date</h3></td>
		<td><?php echo $disinfo['claimdate'];?></td>
	</tr>
	<tr>
		
	</tr>
</table>
</body>
</html>
</center>