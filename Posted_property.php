<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["A_ID"]))
	{
		echo"<script>window.open('User_login.php?mes=Access Denied...','_self');</script>";
	}
	$sql=mysqli_query($db,"SELECT A_name FROM admin_info WHERE A_ID={$_SESSION["A_ID"]}");
	$sql_1=mysqli_fetch_array($sql);
?>
<html>
	<head> 
		<title>Admin Homepage</title>
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
						<a class="w3-large" href="Admin_change_passoword.php">Profile Manage</a>
						<a class="w3-large" href="Posted_property.php">Already Approved Property</a>
						<a class="w3-large" href="logout.php">Logout</a>					
					</nav>
					
				</div>
			</header>
	
		<h1 class="heading"> This properties are already Approved by you</h1>
				<div id= show_project>
					<?php
						$result = mysqli_query($db,"SELECT * FROM request_to_sell_product where P_approval = 'approved'");  //need_approval  {$_POST["P_approval"]}
						//$result_2 = mysqli_query($db,"SELECT A_ID,A_name,A_username FROM admin_info where A_ID='{$_SESSION["A_ID"]}'");
						//result
						?>
						<center>
						<table border ="I solid" class="w3-table-all w3-large">
						<th>  Posted By (Ref) </th>
						<th>  Property location </th>
						<th>  Property type </th>
						<th>  Property available </th>
						<th>  Property size </th>
						<th>  Price per unit </th>
						<th>  Property owner name </th>
						<th>  Property owner phone </th>
						<th>  Property owner address </th>
						<th>  Approve / Not </th>
						
					
				<?php
				
					while ($res=mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>".$res['P_ref_name']."</td>";
						echo "<td>".$res['P_location']."</td>";
						echo "<td>".$res['P_type']."</td>";
						echo "<td>".$res['P_for_sell_rent']."</td>";
						echo "<td>".$res['P_size']."</td>";
						echo "<td>".$res['P_price_per_unit']."</td>";
						echo "<td>".$res['P_owner_name']."</td>";
						echo "<td>".$res['P_owner_phone']."</td>";
						echo "<td>".$res['P_owner_address']."</td>";	
						echo "<td><a href=\"monitoring.php?P_id=$res[P_id]\">Monitor Request</a></td>";				 
						//echo "<td><a href=\"Mark_provide.php?S_id=$res[S_id]&p_id=$res[p_id]\">EDIT</a></td>";  if( $result != "need_approval"){										
					}
				echo "</table>";
				?>
			</center>
			
	</div>
	</section>
	</body>
</html>


			
