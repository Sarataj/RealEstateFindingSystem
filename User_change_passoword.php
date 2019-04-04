<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["U_id"]))
	{
		echo"<script>window.open('User_home.php?mes=Access Denied...','_self');</script>";	
	}	
	$sq=mysqli_query($db,"SELECT U_name FROM user_info WHERE U_id={$_SESSION["U_id"]}");
	$sq_1=mysqli_fetch_array($sq);
	
	$sql=mysqli_query($db,"SELECT * FROM user_info WHERE U_id={$_SESSION["U_id"]}");
		if($sql){
			$res= mysqli_fetch_assoc($sql);
		}
?>
<html>
	<head>
		<title>User Password Change</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body class="back ">
		<?php include"navbar.php";?><br>
				<br>
					<hr><h3 class="text">Welcome <?php echo "<td>".$sq_1['U_name']."</td>"; ?></h3><br><br>
					<h2 class="heading">Change Password</h2><br>
					<div class="log">	
							<?php
						if(isset($_POST["submit"]))
						{
							$sql=mysqli_query($db,"select * from user_info where U_password='{$_POST["opass"]}' and U_id='{$_SESSION["U_id"]}'");
							$res= mysqli_fetch_assoc($sql);
								if(is_array($res) && !empty($res))
								{
									if($_POST["npass"]==$_POST["cpass"])
									{
										$sql=mysqli_query($db,"UPDATE user_info SET  U_password='{$_POST["npass"]}' where  U_id='{$_SESSION["U_id"]}'");
										if($sql){
										      echo"<div class='success'>password Changed</div>";
											}
									}
									else
									{
										echo"<div class='error'>password Mismatch</div>";
									}
								}
								else
								{
									echo"<div class='error'>Invalid password</div>";
								}
						}
					?>
					<center>
					<form method="post">
					
						<label>Old Password</label>
						<input type="text" class="input" name="opass" required><br>
						<label>New Password</label>
						<input type="text" class="input" name="npass" required><br>
						<label>Confirm Password</label>
						<input type="text" class="input" name="cpass" required><br>
						<button type="submit" class="btn" style="float:center" name="submit"> Change Password</button>
						<br><br><br><br><br><br>
					</form>
					</center>
					</div>
				</div>
			</div>
		</body>
	<div class="footer">
		<footer><p>Copyright &copy; Sarataj Sultan </p></footer>
	</div>

</html>