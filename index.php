<!DOCTYPE HTML>
<?php
	include ("database.php");
	session_start();
	if(!isset($_SESSION["U_id"])){
		$_SESSION["U_id"] = null;
	}
	$sql=mysqli_query($db,"SELECT U_name FROM user_info WHERE U_id={$_SESSION["U_id"]}");
	$sql_1 = mysqli_query($db,"SELECT * FROM request_to_sell_product where P_approval != 'need_approval'");
?>
<html>
	<head>
		<title>BirdNest ... an Online Property Finder</title>
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
				</nav>
				<a>
					<form action="index.php" method="POST"> <!-- action="Search_view.php" -->
						<input type="text" name="search" placeholder="Name/Address">
						<button type="submit" class="btn_2" name="submit_3">Find Now</button> <!--  value="save" -->
					</form>
				</a>
				<?php	
					if(isset($_POST["submit_3"]))
					{
						echo "<script>window.open('Search_view.php','_self');</script>";
					}
				?>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h1>Welcome to BirdNest</h1>
				<p><font text size="5">an Online Property Finder</font></p>
			</section>
			
		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<article>
							<header>
								<h3>Find your Next House Here</h3>
							</header>
							<p>Wanna buy a new House? <br> Wanna choose your house from a huge collection? <br>Wanna buy house on a safe way? <br>Then this is a perfect place for you. here you can buy your chosen house very easily.
								This real estate company will give you the best deal at the lowest cost available in market. Visit today and grab the best deal Today.							.</p>
							<footer>
								<a href="#" class="button special">More</a>
							</footer>
						</article>
						<article>
							<header>
								<h3>Sell your House Here</h3>
							</header>
							<p>Wanna sell your House? <br> Wanna compare your house's price with a huge collection? <br>Wanna sell house on a safe way? <br>Then this is a perfect place for you. here you can sell your house very easily.
								This real estate company will give you the best deal at the highest cost available in market. Visit today and grab the best deal Today.</p>
							<footer>
								<a href="#" class="button special">More</a>
							</footer>
						</article>
						<article>
							<header>
								<h3>Rent a House Here</h3>
							</header>
							<p>Felling headack to find a new rented House? <br> Wanna choose your house from a huge collection? <br>Wanna rent house on a safe way without any broker? <br>Then this is a perfect place for you. here you can select your chosen house very easily.
								This real estate company will give you the best deal at the lowest cost available in market. Visit today and grab the best deal Today.							.</p>
							<footer>
								<a href="#" class="button special_2">More</a>
							</footer>
						</article>
					</div>
				</div>
			</section>
			
		<!-- Two -->
			<section id="two" class="wrapper style1 special">
				<div class="inner">
					<header>
						<h2>Most Visited</h2>
						<p><font color="blue" text size="4">Flat and Commercial space are available here </font></p>
					</header>
					<font color="black" text size="4" background color="blue">
					<div class="display: flex" >
					<?php
					while($res=mysqli_fetch_array($sql_1)){
						?>  
							<div class="box person">
								<div class="image square">
									<center><?php $_SESSION["P_id"] = "$res[P_id]"; 
									echo '<img height = "180" width = "180" src="data:P_pic_1;base64,'.$res['P_pic_1'].'">';?> </center>
									<br>
									<?php echo "<p>".$res['P_type']."</p>";?> at <?php echo "<p>".$res['P_location']."</p>";?> 
									<?php echo "<p>".$res['P_for_sell_rent']."</p>";?>
									<?php echo "<a href=\"Property_Details.php?P_id=$res[P_id]\">View Details</a></td>";?>		
								</div>
							</div>
						<?php
						}
						?>
					</div>
					</font>
				</div>
					<form action="index.php" method="POST">
						<button type = "submit" name = "submit_2" class="btn_2"> Sell or Rent any Property</button>
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