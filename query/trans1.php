<?php

session_start();
include '../connection.php';
$trans_id = $_SESSION['trans_id1'];
if(isset($_POST['submit'])) 
{

		isset($_SESSION['cakemsg']) ? $_SESSION['cakemsg'] : $_SESSION['cakemsg'] = 'none';	

		isset($_SESSION['ins']) ? $_SESSION['ins'] : $_SESSION['ins'] = 'none';
	
		$gettotal = $dbConn->query("SELECT sum(total) FROM tbl_sales where sales_id = '".$_SESSION['trans_id1']."' ");
		$distotal = $gettotal->fetch(PDO::FETCH_ASSOC);		

		$dbConn->query("INSERT INTO tbl_transactions (transaction_id,order_type,total_payment,amount_tender,status,claimdate,date_trans) VALUES ('".$_SESSION['trans_id1']."','Motif','".$distotal['sum(total)']."','".$_POST['amount']."','".$_SESSION['custype']."','".$_POST['claimdate']."','".date('Y-m-d')."') ");
		$msg = 'Instruction<br>'. $_SESSION['ins'].'<br><br>Cake Message<br>'.$_SESSION['cakemsg'];
		$dbConn->query("INSERT INTO tbl_orders (baking_order,pick_up,status,description,claimdate) VALUES ('".$_SESSION['trans_id1']."','".$_SESSION['pickup']."','Pending','".$msg."','".$_POST['claimdate']."') ");
	

}
unset($_SESSION['trans_id1']);

?>

<!DOCTYPE html>
<html style="font-family:Verdana;">
<center>
<head>
	<title>SALES INVOICE</title>
</head>
<body>
<h1>SALES INVOICE</h1>
<h3><font color="red"><?php echo $trans_id;?></font></h3>
<table width="600px;">
	<tr>
		<td><b>Customer Name:</b></td>
		<td><?php echo isset($_SESSION['customername']) ? $_SESSION['customername'] : 'None' ;?></td>
		<td><b>Cashier:</b></td>
		<td><?php echo $_SESSION['fullname'];?></td>
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
	$getdata = $dbConn->query("SELECT * FROM tbl_sales where sales_id = '".$trans_id."' ");
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
<?php 
	$getdata1 = $dbConn->query("SELECT sum(total) FROM tbl_sales where sales_id = '".$trans_id."'");
		$row1 = $getdata->fetch(PDO::FETCH_ASSOC)
		
	?>
<table width="600px;">
	<tr>
		<td><h3>Total:</h3></td>
		<td><?php echo number_format($distotal['sum(total)'],2);?></td>
		<td><h3>Amount Tender:</h3></td>
		<td><?php echo number_format($_POST['amount'],2); ?></td>
	</tr>
	<tr>

		<?php $change = $_POST['amount'] - $distotal['sum(total)']; 
		
		?>

		<td ><h3>
		<?php 

		if ($change < $_POST['amount']) 
		{
			echo "BALANCE:";
		}
		else
		{
		?>
		Change:</h3>
		<?php 
		}
		?>
		</td>
		<td>
			<?php 

		if ($change < $_POST['amount']) 
		{
			echo -($change);
		}
		else
		{
		echo number_format($change,2);
		}
		?>

		</td>
		<td><h3>Claim Date</h3></td>
		<td><?php echo $_POST['claimdate'];?></td>
	</tr>
	<tr>
		
	</tr>
</table>
</body>
</html>
</center>