<div class="navbar">
	<ul class="list">
	<a href="index.php" class="logo"><b float:left; line-height:50px; margin-left:15px; font-family:Cooper Black; font-size: 1.5em;">BirdNest Home</a></b>
		<?php
			if(isset($_SESSION["U_id"]))
			{
				echo'
					<li><b><a href="User_home.php"> Home</a></li></b>
					<li><b><a href="User_change_passoword.php">Settings</a></b></li></b>
					<li><b><a href="logout.php">Logout</a></li></b>
				';
				
			}
			else if(isset($_SESSION["A_ID"]))
			{
				echo'
					
						<li><a class="w3-large" href="User_home.php">Home</a></li></b>
						<li><a class="w3-large" href="User_change_passoword.php">Profile Manage</a></li></b>
						<li><a class="w3-large" href="Sell_property.php">Sell Property</a></li></b>
						<li><a class="w3-large" href="logout.php">Logout</a></li></b>
				';
			}
			/*elseif(isset($_SESSION["T_id"]))
			{
				echo'
					<li><b><a href="Teacher_home.php">Teacher Home</a></li></b>
					<li><b><b><a href="Teacher_change_passoword.php">Settings</a></li></b>
					<li><b><a href="logout.php">Logout</a></li></b>
					
					
					
					
					
					
						<li><b><a href="User_home.php">Home</a></li></b>
						<li><b><a href="User_registration.php">Registration</a></li></b>
						<li><b><a href="User_login.php">Login</a></b></li></b>
						<li><b><a href="logout.php">Logout</a></li></b>
				';
			}*/
			else{
				echo'
						<li><b><a href="User_home.php">Login</a></li></b>
						<li><b><a href="User_registration.php">Registration</a></li></b>
						<li><b><a href="User_login.php">Contact Us</a></b></li></b>
					';
			}
		?>
				
	</ul>
</div>
		