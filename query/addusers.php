<?PHP
session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{
	$checkaccount = $dbConn->query("SELECT * FROM tbl_users where username = '".$_POST['username']."'");
	if ($checkaccount->rowCount() > 0) 
	{
		$_SESSION['message'] = '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                Username Already Exist
                            </div>';
	header("location:../users.php");
	}
	else
	{

		if ($_POST['password'] == $_POST['repassword']) 
		{
			
			$dbConn->query("INSERT INTO tbl_users (username,password,firstname,middlename,lastname,contact,type,status) VALUES ('".$_POST['username']."','".$_POST['password']."','".$_POST['firstname']."','".$_POST['middlename']."','".$_POST['lastname']."','".$_POST['contact']."','".$_POST['type']."','active') ");
			$_SESSION['message'] = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                Successfully Added New User
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
}


?>