<?php
session_start();

if (isset($_POST['submit'])) 
{
	$_SESSION['custype'] = $_POST['type'];
	header("location:../nonmotif.php");
}

?>