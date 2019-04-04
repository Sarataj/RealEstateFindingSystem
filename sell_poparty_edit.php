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

<?php
	if(isset($_POST['update'])){
	$P_id=$_POST["P_id"];
    $P_location=$_POST["P_location"];
	//$P_comment=$_POST["P_comment"];
	//$p_id = $_POST["p_id"];
	$result=mysqli_query($db,"UPDATE request_to_sell_product SET P_location='$P_location' where P_id= $P_id");
		if($result){
			header("location:User_home.php");
		}
		else{
			echo "UPDATE ERROR! ";
		}
		
	}
?>
<html>
	<head> 
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
				<div class="inner">
					<a href="index.php" class="logo">BirdNest Home</a>
					<nav id="nav">
					
						<a class="w3-large" href="User_home.php">Home</a>
						<a class="w3-large" href="User_change_passoword.php">Profile Manage</a>
						<!--<a class="w3-large" href="Sell_property.php">Sell Property</a> -->
						<a class="w3-large" href="logout.php">Logout</a>					
					</nav>
					
				</div>
			</header>
			
		<h1 class="heading"> Welcome <?php echo "<td>".$sql_1['U_name']."</td>"; ?></h1>
			<div>			<!-- id= show_project -->
				
					<table border ="I solid" class="w3-table-all w3-small">
						<th>  Posted By </th>
						<th>  Property location </th>
						<th>  Property type </th>
						<th>  Property available </th>
						<th>  Property size </th>
						<th>  Price per unit </th>
						<th>  Property owner name </th>
						<th>  Property owner phone </th>
						<th>  Property owner address </th>
						<th>  Picture </th>
						<th>  Approve / Not </th>
						<th>           </th>
							
					<?php
						$P_id = $_GET["P_id"];
						$result = mysqli_query($db,"SELECT * FROM request_to_sell_product where P_id =$P_id ");
						while ($res = mysqli_fetch_array($result))
						{
							echo "<tr>";
							echo "<td>".$res['P_type']."</td>";
							echo "<td>".$res['P_for_sell_rent']."</td>";
							echo "<td>".$res['P_size']."</td>";
							echo "<td>".$res['P_price_per_unit']."</td>";
                            echo "<td>".$res['P_owner_name']."</td>";
                            echo "<td>".$res['P_location']."</td>";
							echo "<td>".$res['P_owner_phone']."</td>";
							echo "<td>".$res['P_owner_address']."</td><td>";
							echo '<img height = "40" width = "40" src="data:P_pic_1;base64,'.$res['P_pic_1'].'">';
							echo '<img height = "40" width = "40" src="data:P_pic_2;base64,'.$res['P_pic_2'].'">';
                            echo '<img height = "40" width = "40" src="data:P_pic_3;base64,'.$res['P_pic_3'].'">';
                            //echo "<td>".$res['P_status']."</td>";
							//echo '<img height = "300" width = "300" src="data:image;base64,'.$row[2].' ">';
							?>
							<form action="sell_poparty_edit.php" method = "POST">
                                <td><input type="text" name="P_ref_name" value="<?php echo $res['P_ref_name']; ?>"/></td>
                                
								<input type="hidden"  name="P_id" value ="<?php echo $res['P_id']; ?>" /></td>
								<td><strong><input type="submit" name="update" value ="Update" /></strong></td>
							</form>
								<?php
						}
							echo "</td></tr></table>";
							?>

			</div>
	</body>
	</section>
		<div class="footer">
			<footer><p>Copyright &copy; Sarataj Sultan </p></footer>
		</div>
</html>