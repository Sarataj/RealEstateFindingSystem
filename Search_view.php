<!DOCTYPE HTML>

<?php

	include ("database.php");
	session_start();
	if(!isset($_SESSION["U_id"])){
		
		//echo"<script>window.open('User_login.php?mes=Access Denied...','_self');</script>";
		$_SESSION["U_id"] = null;
		//$_SESSION["A_ID"] = null;
	}
	
	$sql=mysqli_query($db,"SELECT U_name FROM user_info WHERE U_id={$_SESSION["U_id"]}");
	//$sql_1=mysqli_fetch_array($sql);
?>
<?php
	$sql_1 = mysqli_query($db,"SELECT * FROM request_to_sell_product where P_approval != 'need_approval'");
	//$sql_1=mysqli_query($db,"SELECT * FROM request_to_sell_property where P_ref_name != = 'null'");// where P_ref_name != "null""
	//$res=mysqli_fetch_array($sql_1);

?>
<html>
	<head>
		<title>Result of Search Property</title>
		<!--<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />-->
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
					
						<a class="w3-large" href="User_login.php">Login</a>
						<a class="w3-large" href="User_Registration.php">Registration</a>
						<a class="w3-large" href="contact.php">Contact Us</a>					
					</nav><a><div  class ="search-form">
					
							<form action="Search_view.php" method="post">
								<input type="text" name="search" placeholder="Name/Address">
								<button type="submit" class="btn_2" value="save" name="submit">Find Now</button>
							</form></div></a>
							
							
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h1>Welcome to BirdNest</h1>
				<p>an Online Property Finder</p>

					</section>
		

		<!-- Two -->
		<section id="two" class="wrapper style1 special">
				<div class="inner">
					<header>
						<h2>Search Result</h2>
						<p>Flat and Commercial space are available here</p>
					</header>
					
					<?php	
							if(isset($_POST["submit"]))
							{
								if($_POST["search"] == 'null'){
									?>
									<script>
										alert("Enter some value to search ");
									</script>
									<?php
								}
								else
								{
									$search_item = $_POST["search"];?>
									<!--<script>alert("search item is:--><?php //echo $search_item;?><!-- ");</script>";-->
								
									<?php
									
									
									$sql_search=mysqli_query($db,"SELECT * FROM request_to_sell_product where P_location LIKE '%$search_item%' or P_owner_name LIKE '%$search_item%' ");
										if($sql_search != null)
										{
																
											while($res=mysqli_fetch_array($sql_search)){
											?>
											<div class="d-flex flex-row flex-wrap flex-4">
												<div class="box person">
													<div class="image square">
														<!--<img src="properties/1.jpg" alt="Person 1" /> -->
													</div>
													<h3>    </h3>
													<?php //$id = "<p>".$res['P_location']."</p>";?>
													<?php $_SESSION["P_id"] = "$res[P_id]"; 
													echo '<img height = "180" width = "180" src="data:P_pic_1;base64,'.$res['P_pic_1'].'">';?>
													<?php echo "<p>".$res['P_type']."</p>";?> at <?php echo "<p>".$res['P_location']."</p>";?> for <?php echo "<p>".$res['P_for_sell_rent']."</p>";?>
													<?php echo "<a href=\"Property_Details.php?P_id=$res[P_id]\">View Details</a></td>";		?>	
													<!--echo "<td><a href=\"monitoring.php?P_id=$res[P_id]\">Monitor Request</a></td>";	-->					
												</div>
											</div>
											
											<?php
											}
									}
									
									//$sql_search=mysqli_query($db,"SELECT * FROM request_to_sell_product where P_location LIKE '%$search_item%' or P_owner_name LIKE '%$search_item%' ");
								}
									
							}
							?>
					
					<!--<a href="Sell_property.php" class="btn btn-primary">Sell or Rent any Property</a> -->
					
						<form action="index.php" method="POST">             <!--  action="index.php" method="POST" -->
							<button type = "submit" name = "submit_2" class="btn_2"> Sell or Rent any Property</button>  <!--</button>  class="btn btn-primary" -->
						</form>
					<?php	
						if(isset($_POST["submit_2"]))
						{
							if(($_SESSION["U_id"]) == null)
								{
									?>
									<script>
										alert("Need to registration");
									</script>
									<?php
									echo"<script>window.open('User_login.php','_self');</script>";	
								}
							else
								{ 
									echo "<script>window.open('Sell_property.php','_self');</script>";
								}
						}
					?>	
					
				</div>
			</section>

		<!-- Footer -->
		<div class="footer">
			<footer><p>Copyright &copy; Sarataj Sultan </p></footer>
		</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
