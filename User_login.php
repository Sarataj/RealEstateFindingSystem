<?php
	include "database.php";
	session_start();
	if(isset($_SESSION["A_ID"]))
	{
		echo"<script>window.open('Admin_home.php','_self');</script>";	
	}
	
	if(isset($_SESSION["U_id"]))
	{
		echo"<script>window.open('User_home.php','_self');</script>";	
	}
?>
<html>
	<head> 
			<!--6LdxAJwUAAAAACg2xy7ZtOZ-d9nzZq9HrQ7yekya-->
			<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
	<!--css-->
		<title>BirdNest</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body>
	          <!--button-->
	<header id="header">
				<div class="inner">
					<a href="index.php" class="logo">BirdNest Home</a>
					<nav id="nav">
						<a class="w3-large" href="User_Registration.php">Registration</a>
						<a class="w3-large" href="contact.php">Contact Us</a>
					</nav>
					
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
	
			<h1 class="heading">User Login</h1>
			<div class="log_3">
			<?php			
		if(isset($_POST["submit"]))
			{
				//$recaptcha_secret="6LdxAJwUAAAAABQx4U03J1e-ibU61bbLcA1rYvXT";
				//$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
				//$response=json_decode($response,true);
				//if($response["success"] === true){
				
					$sql=mysqli_query($db,"select * from user_info where U_username='{$_POST["user_name"]}'and U_password='{$_POST["user_pass"]}'");
					$sql_2=mysqli_query($db,"select * from admin_info where A_username='{$_POST["user_name"]}'and A_password='{$_POST["user_pass"]}'");
					
					
					 if($sql_2){
						$res_2= mysqli_fetch_assoc($sql_2);
						//$res=$db->query($sql);
						if(is_array($res_2) && !empty($res_2))
						{
							$_SESSION["A_ID"]=$res_2["A_ID"];
							$_SESSION["A_username"]=$res_2["A_username"];
							echo "<script>window.open('Admin_home.php','_self');</script>";
						}
						else
						{
							//echo "<div class='error'>Invalid Username Or Password </div>";
						}
						
					}
					
					if($sql){
						$res= mysqli_fetch_assoc($sql);
						//$res=$db->query($sql);
						if(is_array($res) && !empty($res))
						{
							$_SESSION["U_id"]=$res["U_id"];
							$_SESSION["U_username"]=$res["U_username"];
							echo "<script>window.open('User_home.php','_self');</script>";
						}
						else
						{
							
					//	}
					}
				}
				echo "<div class='error'>Invalid Username Or Password</div>";
				echo "<div class='error'>and click on recaptcha</div>";
				
			}
		?>
		<?php			
		if(isset($_POST["submit_2"]))
			{
				echo "<script>window.open('User_registration.php','_self');</script>";	
			}
		?>
		
		      <!--design-->
		 <div class="w3-container w3-white w3-padding-16">
      <form action="User_login.php" method="POST">
        <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-center w3-margin-bottom">
            <label>User Name</label>
            <input class="w3-input w3-border" type="text" name="user_name" required>
          </div>

        </div>
        <div class="w3-row-padding" style="margin:8px -16px;">
          <div class="w3-center w3-margin-bottom">
            <label> Password</label>
            <input class="w3-input w3-border" type="password" name="user_pass"required >
          </div>

        </div>
		
		<div class="w3-row-padding" style="margin:8px -16px;">
          <!--  <div class="g-recaptcha" data-sitekey="6LdxAJwUAAAAACg2xy7ZtOZ-d9nzZq9HrQ7yekya"></div> -->

        </div>
		
        <button class="w3-button w3-dark-grey" type="submit" value="save" name="submit"> Login Here</button>
		<a class="btn_2" href="User_Registration.php">Not Registered ??</a>
		<!--<button class="w3-button w3-dark-grey" type="submit" value="save" name="submit_2"> Not Registered ??</button>-->
	  </form>
    </div>
		
		
		<!--
				<form action="User_login.php" method="POST">
					<label>User Name</label>
					<input type="text" name="user_name" class="input" required><br>
					<label>Password </label>
					<input type="password" name="user_pass" class="input" required><br>
					<button type="submit" class="btn_2" value="save" name="submit">Login Here</button>
				</form> -->
			</div>
			</section>
	</body>
				<div class="footer">
			<footer><p>Copyright &copy; Sarataj Sultan </p></footer>
		</div>
</html>
