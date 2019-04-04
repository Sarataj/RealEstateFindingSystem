<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["U_id"]))
	{
		echo"<script>window.open('User_login.php?mes=Access Denied...','_self');</script>";
	}
	$sql=mysqli_query($db,"SELECT U_name FROM user_info WHERE U_id={$_SESSION["U_id"]}");
	$sql_1=mysqli_fetch_array($sql);
?>
<html>
	<head> 
						<!-- CSS file -->
		<title>User Homepage</title>
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
							<!-- BUTTON -->
				<div class="inner">
					<a href="index.php" class="logo">BirdNest Home</a>
					<nav id="nav">
					
						<a class="w3-large" href="User_home.php">Home</a>
						<a class="w3-large" href="User_change_passoword.php">Profile Manage</a>
						<a class="w3-large" href="Sell_property.php">Sell Property</a>
						<a class="w3-large" href="logout.php">Logout</a>					
					</nav>
					
				</div>
			</header>
			<!--personal profile-->
	
		<h1 class="heading"> Welcome <?php echo "<td>".$sql_1['U_name']."</td>"; ?></h1>
		<h2 class="heading">Personal Profile</h2>
			<div id= show_project>
				<?php
					$result = mysqli_query($db,"SELECT U_id,U_name,U_email,U_phone, U_address FROM user_info where U_id='{$_SESSION["U_id"]}'");
					?>
					<center>
					<table border ="I solid" class = "log">
					<th>  ID </th>
					<th>  Name </th>
					<th>  Email </th>
					<th>  Phone </th>
					<th>  Address </th>
					<?php
						while ($res=mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$res['U_id']."</td>";
							echo "<td>".$res['U_name']."</td>";
							echo "<td>".$res['U_email']."</td>";
							echo "<td>".$res['U_phone']."</td>";
							echo "<td>".$res['U_address']."</td></tr>";									
						}
					echo "</table>";
					?>
					</center>
			</div>
			
			
			
			
			<h2 class="heading">Property that you have requested to sell / rent</h2>
			<div>           <!-- property-->
				<?php
					$result_2 = mysqli_query($db,"SELECT * FROM request_to_sell_product where P_ref_id='{$_SESSION["U_id"]}'");
					?>
					<center>
					<table border ="I solid" class = "log">
						<th>  Property location </th>
						<th>  Property type </th>
						<th>  Property available </th>
						<th>  Property size </th>
						<th>  Price per unit </th>
						<th>  Property owner name </th>
						<th>  Property owner phone </th>
						<th>  Property owner address </th>
						<th>  Approve / Not </th>
						<th>  Status </th>
					<!--	<th>  Change Status </th> -->
					<?php
						while ($res_2=mysqli_fetch_array($result_2)){
							echo "<tr>";
							echo "<td>".$res_2['P_location']."</td>";
							echo "<td>".$res_2['P_type']."</td>";
							echo "<td>".$res_2['P_for_sell_rent']."</td>";
							echo "<td>".$res_2['P_size']."</td>";
							echo "<td>".$res_2['P_price_per_unit']."</td>";
							echo "<td>".$res_2['P_owner_name']."</td>";
							echo "<td>".$res_2['P_owner_phone']."</td>"; // phone number a 0 soho aste hobe
							echo "<td>".$res_2['P_owner_address']."</td>";
							echo "<td>".$res_2['P_approval']."</td>";
							//echo "<td><a href=\"sell_poparty_edit.php?P_id=$res_2[P_id]\">Edit</a></td>";
							echo "<td><a href=\"Sell_property_editable.php?P_id=$res_2[P_id]\">Edit</a></td>";
							//echo '<td><select class="input" name="P_status" size="1" required> <option value="select" > Select </option> <option value="Sold" >Sold</option> <option value="Available">Available</option> </select></td>';
							//echo "<td>".$res_2['P_status']."</td>";
							?>
							<!--<form action="User_home.php" method = "POST">
								<td><input type="text" name="P_status" value=""/></td>
								<input type="hidden"  name="P_id" value ="" /></td>
								<td><strong><input type="submit" name="update" value ="Change Status" /></strong></td>
							</form>-->
								<?php
						}
							echo "</tr></table>";
							?>							
					
					</center>
			</div>
	</body>
	</section>
		<div class="footer">
			<footer><p>Copyright &copy; Sarataj Sultan </p></footer>
		</div>
</html>
					


			
