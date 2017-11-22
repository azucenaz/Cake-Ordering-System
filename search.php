<?php
include 'connection.php';


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="font-family:Lucida Console;">
<center>
	<h1>RESULTS</h1>
	<table cellspacing="0" cellpadding="25" border="1">
		<tr>
			<td>Transaction No</td>
			<td>Customer Name</td>
			<td>Order Type</td>
			<td>Date</td>
			<td>Amount Tender</td>
			<td>Total Payment</td>
		</tr>

		<?php

		$getinfo = $dbConn->query("SELECT * FROM tbl_transactions where  date_trans  BETWEEN '".$_POST['datefrom']."' AND '".$_POST['dateto']."'  ");
		while ($row = $getinfo->fetch(PDO::FETCH_ASSOC)) 
		{


?>
<tr>
	<td><?php echo $row['transaction_id'];?></td>
	<td><?php echo is_null($row['customer_name']) ? $row['customer_name'] : 'Walk IN';?></td>

	<td><?php echo $row['order_type'];?></td>
	<td><?php echo $row['date_trans'];?></td>
	<td><?php echo $row['amount_tender'];?></td>

	<td><?php echo $row['total_payment'];?></td>
</tr>

<?php
	}

		?>
	</table>
</center>
</body>
</html>