<?php

session_start();
include '../connection.php';

$_SESSION['claimdate'] = $_POST['claimdate'];

?>