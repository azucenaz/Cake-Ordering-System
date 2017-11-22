<?php 

include '../connection.php';
session_start();

if (isset($_POST['submit'])) 
{
	if ($_POST['password'] == $_POST['repassword']) 
		{
			
			$dbConn->query("UPDATE tbl_users SET firstname = '".$_POST['firstname']."',middlename = '".$_POST['middlename']."',lastname = '".$_POST['lastname']."',contact = '".$_POST['contact']."',type = '".$_POST['type']."',username = '".$_POST['username']."',password = '".$_POST['password']."',status = '".$_POST['active']."'  WHERE id = '".$_POST['id']."' ");
			$_SESSION['message'] = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                Successfully Updated
                            </div>';
		header("location:../users.php");
		}
		else
		{

		$_SESSION['message'] = '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                Password doesnt Match.
                            </div>';
	header("location:../users.php");
		}
}

?>