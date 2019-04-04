<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["A_ID"]))
	{
		echo"<script>window.open('User_home.php?mes=Access Denied...','_self');</script>";	
	}	
	$sq=mysqli_query($db,"SELECT A_name FROM admin_info WHERE A_ID={$_SESSION["A_ID"]}");
	$sq_1=mysqli_fetch_array($sq);
	
	$sql=mysqli_query($db,"SELECT * FROM admin_info WHERE A_ID={$_SESSION["A_ID"]}");
		if($sql){
			$res= mysqli_fetch_assoc($sql);
		}
?>
<html>
	<head> 
		<title>Admin Password Change</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="assets/css/main.css" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
	
	<section id="banner">
		<header id="header">
			<div class="inner">
				<a href="index.php" class="logo">BirdNest Home</a>
				<nav id="nav">
				
					<a class="w3-large" href="Admin_home.php">Home</a>
					<a class="w3-large" href="Posted_property.php">Already Approved Property</a>
					<!--<a class="w3-large" href="Sell_property.php">Sell Property</a> -->
					<a class="w3-large" href="logout.php">Logout</a>					
				</nav>
				
			</div>
		</header>
				<h1 class="text">Welcome <?php echo "<td>".$sq_1['A_name']."</td>"; ?></h1><br>
				<div class="log">	
				<h1 class="heading">Change Password</h1><br>
						<?php
					if(isset($_POST["submit"]))
					{
						$sql=mysqli_query($db,"select * from admin_info where A_password='{$_POST["opass"]}' and A_ID='{$_SESSION["A_ID"]}'");
						$res= mysqli_fetch_assoc($sql);
							if(is_array($res) && !empty($res))
							{
								if($_POST["npass"]==$_POST["cpass"])
								{
									$sql=mysqli_query($db,"UPDATE admin_info SET  A_password='{$_POST["npass"]}' where  A_ID='{$_SESSION["A_ID"]}'");
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
		</section>
	</body>
	<div class="footer">
		<footer><p>Copyright &copy; Sarataj Sultan </p></footer>
	</div>

</html>