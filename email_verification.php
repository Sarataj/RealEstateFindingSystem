<?php

	include ('database.php');
	include ('database_2.php');

$message = '';
//$code = $_GET['activation_code'];
if(isset($_GET['activation_code']))
{
	//echo"<script>alert('Working  $code');</script>";
	//echo"<script>alert('Working  :user_activation_code');</script>";
	//$no_of_row = mysqli_num_rows($query);
		//echo"<script>alert('Working $no_of_row');</script>";
	/*$statement = $connect->prepare($query);
	$statement->execute(
		array(
		
			':user_activation_code' =>	$code//$_GET['activation_code']
		)
	);
	$no_of_row = $statement->rowCount(); */
	
	$query = mysqli_query($db,"SELECT * FROM user_info WHERE user_activation_code = '{$_GET['activation_code']}'");
	$no_of_row = mysqli_num_rows($query);
	echo"<script>alert('Working $no_of_row');</script>";
	if($no_of_row > 0)
	{
		while ($res = mysqli_fetch_assoc($query)){
			if($res['user_email_status'] == 'not verified'){
				$update_query = mysqli_query($db,"UPDATE user_info SET user_email_status = 'verified' WHERE U_id = '".$res['U_id']."'");
				if($update_query){
					$message = '<label class="text-success">Your Email Address Successfully Verified <br />You can login here - <a href="User_login.php">Login</a></label>';
				}
			}
			else
			{
				$message = '<label class="text-info">Your Email Address Already Verified</label>';
			}
		}
	}
	else
	{
		$message = '<label class="text-danger">Invalid Link</label>';
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Register Login Script with Email Verification</title>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<div class="container">
			<h1 align="center">PHP Register Login Script with Email Verification</h1>
		
			<h3><?php echo $message; ?></h3>
			
		</div>
	
	</body>
	
</html>