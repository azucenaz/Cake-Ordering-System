<?php
include 'connection.php';


$getinfo = $dbConn->query("SELECT * FROM tbl_transactions where order_type = 'Non-Motif' ");


?>
<!DOCTYPE html>
<html>
<head>
	<title>NON MOTIF REPORTS</title>
</head>
<body style="font-family:Lucida Console">
<center>
<table border="0">
	<tr>
		<td><img src="download.png" width="200px" height="200px"></td>
		<td>
<h1>NON MOTIF REPORTS</h1></td>
	</tr>
</table>
	<table border="1" cellpadding="15" cellspacing="0"> 
		<tr>
			<!-- <td>Transaction ID</td>
			<td>Customer Name</td>
			<td>Order Type</td> -->
			<td>Orders Product</td>
			<td>Total Payment</td>
			<td>Amount Tender</td>
			<td>Claim Date</td>
			<td>Date Transaction</td>
		</tr>
		<?php
		while ($disinfo = $getinfo->fetch(PDO::FETCH_ASSOC)) 
		{
			$getsales = $dbConn->query("SELECT * FROM tbl_sales where sales_id = '".$disinfo['transaction_id']."' ");
		
		?>
			<tr>
		<!-- 	<td><?php echo $disinfo['transaction_id']; ?></td>
			<td><?php echo $disinfo['customer_name']; ?></td>
			<td><?php echo $disinfo['order_type']; ?></td> -->
			<td><?php 
			while ($row = $getsales->fetch(PDO::FETCH_ASSOC)) 
			{
				echo $row['product_name'].' --<br>';
			}

			?></td>
			<td><?php echo $disinfo['total_payment']; ?></td>
			<td><?php echo $disinfo['amount_tender']; ?></td>
			<td><?php echo $disinfo['claimdate']; ?></td>
			<td><?php echo $disinfo['date_trans']; ?></td>
			</tr>

		<?php

		}
	?>
	</table>
</center>
</body>
</html>