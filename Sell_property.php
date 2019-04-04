<?php
	include ("database.php");
	session_start();
	if(!isset($_SESSION["U_id"])){
		
		echo"<script>window.open('User_login.php?mes=Access Denied...','_self');</script>";
		$_SESSION["U_id"] = null;
		//$_SESSION["A_ID"] = null;
	}
	$sql_2=mysqli_query($db,"SELECT * FROM user_info WHERE U_id={$_SESSION["U_id"]}");
	//echo"<script>alert('Working');</script>";
	while($sql_1=mysqli_fetch_array($sql_2)){
		$U_name = $sql_1['U_name']; 							//.$res['P_ref_name']. "<p>".$res['P_location']."</p>"
									//echo"<script>alert('$U_name');</script>";
	}
?>
<html>
	<head>
		<title>Sell Property</title>
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
					
						<a class="w3-large" href="Admin_home.php">Home</a>
						<a class="w3-large" href="Admin_change_passoword.php">Profile Manage</a>
						<a class="w3-large" href="Posted_property.php">Already Approved Property</a>
						<a class="w3-large" href="logout.php">Logout</a>					
					</nav>
					
				</div>
			</header>
				<section id="banner">
					<div class="log">
						<h2><center>Provide all required information to complete your Selling Post</center></h2>
						<form action="Sell_property.php" method="POST" enctype="multipart/form-data">
							<div class="w3-center w3-margin-bottom">
								<label> Location of Property</label>
								<input class="w3-input w3-border" type="text" name="P_location"required >
							</div>
							Property Type (Flat or House):
								<select class="w3-input w3-border" name="P_type" size="1" required>
									<option value="select">Select </option>
									<option value="Flat" >Flat</option>
									<option value="House">House</option> 
								</select><br>
							Property for (Sell or Rent):
								<select class="input" name="P_for_sell_rent" size="1" required>
									<option value="select" > Select </option>
									<option value="Sell" >Sell</option>
									<option value="Rent">Rent</option>
							</select><br>
							Size of Property(in square feet):<input type="text" name="P_size" class="input" required ><br>
							Price per Square Feet:<input type="text" name="P_price_per_unit" class="input" required ><br>
							
							Owner Name:<input type="text" name="P_owner_name" class="input" required ><br>
							
								
								<div class="w3-center w3-margin-bottom">
									<label> Phone Number</label>
									<input class="w3-input w3-border" type="integer" name="P_owner_phone"required >
								</div>
								
							Address:<br><input type="text" name="P_owner_address" class="input" required ><br>
							<input type="file" name="image" value="" />
							<input type="file" name="image_4" value=""/>
							<input type="file" name="image_3" value=""/>
							<input type="hidden"  name="P_approval" value ='need_approval' />
							<input type="hidden"  name="P_ref_id" value ='$_SESSION["U_id"]' />
							<input type="hidden"  name="P_ref_name" value ='$U_name' /></td>
					<button type = "submit" name = "submit" class="btn"> Submit Request </button>
				</form>
				<?php	
					if(isset($_POST["submit"]))
					{
						if((($_POST["P_type"]) != "select") or (($_POST["P_for_sell_rent"]) != "select")){
							
							$image=addslashes($_FILES['image']['tmp_name']);
							$name=addslashes($_FILES['image']['name']);
							$image = file_get_contents($image);
							$image = base64_encode($image);
							
							$image_4=addslashes($_FILES['image_4']['tmp_name']);
							$name=addslashes($_FILES['image_4']['name']);
							$image_4 = file_get_contents($image_4);
							$image_4 = base64_encode($image_4);
							
							
							$image_3=addslashes($_FILES['image_3']['tmp_name']);
							$name=addslashes($_FILES['image_3']['name']);
							$image_3 = file_get_contents($image_3);
							$image_3 = base64_encode($image_3);
							//saveimage($name,$image);
							
							
							if($image != null){
							
							$sql= mysqli_query($db,"INSERT into request_to_sell_product(P_location,P_type, P_for_sell_rent, P_size, P_price_per_unit, P_owner_name, P_owner_phone, P_owner_address,P_approval,P_ref_id,P_ref_name, P_pic_1, P_pic_2, P_pic_3) values 
							('{$_POST["P_location"]}','{$_POST["P_type"]}','{$_POST["P_for_sell_rent"]}','{$_POST["P_size"]}','{$_POST["P_price_per_unit"]}','{$_POST["P_owner_name"]}','{$_POST["P_owner_phone"]}','{$_POST["P_owner_address"]}','{$_POST["P_approval"]}','{$_SESSION["U_id"]}','$U_name','$image','$image_4','$image_3')");
							}
							if($sql)
							{//ALTER TABLE request_to_sell_product ADD P_ref_id VARCHAR(10) NOT NULL, P_ref_name VARCHAR(50) NOT NULL -- update quary 
								?>
								<script>
										//alert("pic location: $image");
										alert("Request sent to Admin");
								</script>
								<?php
								echo "<script>window.open('User_home.php','_self');</script>";
							}
							else
							{
								echo "<div class='error'>Invalid </div>";
							}
						}
						else{
							?>
							<script>
								alert("Please Fill up all the available field");
							</script><?php
						}
					}
					?>
		</div>
		</section>
	</body>
	
</html>


			
