<?php
	
	include "database.php";
	include ('database_2.php');
	include('EmailVerification/class/class.phpmailer.php');
	$message = '';
?>
<html>
	<head> 
		
		<title>Registration Page</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="assets/css/main.css" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body>
	
	<header id="header">
				<div class="inner">
					<a href="index.php" class="logo">BirdNest Home</a>
					<nav id="nav">
						<!--<a href="index.html">Home</a>-->
						<a class="w3-large" href="User_login.php">Login</a>
						
						<a class="w3-large" href="contact.php">Contact Us</a>
					</nav>
					
				</div>
			</header>

		<!-- Banner -->
			<section id="banner" >
			
					<div class="log"> <!--  class="w3-container w3-white w3-padding-16"  -->
					  <form action="User_registration.php" method="POST">
						<div class="w3-row-padding" style="margin:0 -16px;">
						<h2><center>Provide all required information to complete registration</center></h2>
						  <div class="w3-center w3-margin-bottom">
							<label>Full Name</label>
							<input class="w3-input w3-border" type="text" name="U_name" required>
						  </div>
						
							  <div class="w3-center w3-margin-bottom">
								<label> Username</label>
								<input class="w3-input w3-border" type="text" name="U_username"required >
							  </div>
							  <div class="w3-center w3-margin-bottom">
								<label> Email</label>
								<input class="w3-input w3-border" type="email" name="U_email"required >
							  </div>
							  <div class="w3-center w3-margin-bottom">
								<label> Phone Number</label>
								<input class="w3-input w3-border" type="integer" name="U_phone"required >
							  </div>
							  <div class="w3-center w3-margin-bottom">
								<label> Address</label>
								<input class="w3-input w3-border" type="text" name="U_address"required >
							  </div>
							  <div class="w3-center w3-margin-bottom">
								<label> Blood Group</label>
								<input class="w3-input w3-border" type="text" name="U_blood"required >
							  </div>
								<div class="w3-center w3-margin-bottom">
								<label> Password</label>
								<input class="w3-input w3-border" type="password" name="U_password"required >
								</div>
							</div>
							<button class="w3-button w3-dark-grey" type="submit" value="save" name="submit"> Register Here</button>
						  </form>	
					</div>						  
			
		<div>			
			
				</section>
				<?php	
					if(isset($_POST["submit"]))
					{
						$U_password = $_POST[U_password];
						$query = "SELECT * FROM user_info WHERE U_email = :U_email";
						$statement = $connect->prepare($query);
						$statement->execute(
							array(
								':U_email'	=>	$_POST['U_email']
							)
						);
						$no_of_row = $statement->rowCount();
						if($no_of_row > 0)
						{
							$message = '<label class="text-danger">Email Already Exits</label>';
						}
						else
						{				 
							$user_encrypted_password = password_hash($U_password, PASSWORD_DEFAULT);
							$user_activation_code = md5(rand());
							$sql= mysqli_query($db,"INSERT into user_info(U_name,U_username, U_email, U_phone, U_address, U_blood, U_password, user_activation_code, user_email_status) values ('{$_POST["U_name"]}','{$_POST["U_username"]}','{$_POST["U_email"]}','{$_POST["U_phone"]}','{$_POST["U_address"]}','{$_POST["U_blood"]}','{$_POST["U_password"]}','$user_activation_code','not verified')");						
							if($sql)
							{
								$base_url = "http://localhost/Real-Estate_Finding_System/";
								$mail_body = "
								<p>Hi ".$_POST['U_name'].",</p>
								<p>Thanks for Registration. Your password is ".$U_password.", This password will work only after your email verification.</p>
								<p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
								<p>Best Regards,<br />BirdNest</p>
								";
								//$message = '<label class="text-danger">Try again 3</label>';
								require 'EmailVerification/class/PHPMailerAutoload.php';
								$mail = new PHPMailer();
								$mail->IsSMTP();				
								$mail->Host = 'smtp.gmail.com';	 
								$mail->Port = 587;		
								$mail->SMTPAuth = true;	
								$mail->SMTPSecure = 'tls';
								
								$mail->Username = 'property.birdnest@gmail.com';	
								$mail->Password = 'Murarepur';
							
								$mail->setFrom = ('property.birdnest@gmail.com');		
								$mail->FromName = 'BirdNest';
								
								$mail->addAddress($_POST['U_email'], $_POST['U_name']);				
								$mail->WordWrap = 50;							
								$mail->IsHTML(true);							
								$mail->Subject = 'Email Verification';			
								$mail->Body = $mail_body;	
								if($mail->send()){								
									$message = '<label class="text-success">Register Done, Please check your mail.</label>';
								}
								else{
									$message = '<label class="text-success">Error</label>';
								}
								?>
								<script>
									alert("Check your Mail");
								</script>
								<?php
								echo"<script>window.open('User_login.php','_self');</script>";	
							}
						}
					}
					?>
		</div>
	</body>
</html>


			
