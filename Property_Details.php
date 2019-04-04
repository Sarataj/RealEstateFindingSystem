<!DOCTYPE html>
<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["U_id"]))
	{
		//echo"<script>window.open('User_login.php?mes=Access Denied...','_self');</script>";
	}
	else{
		$_SESSION["U_id"] = $_SESSION["U_id"];
		$sql_u_name=mysqli_query($db,"SELECT U_name FROM user_info WHERE U_id= {$_SESSION["U_id"]}");
		$sql_u_name_1=mysqli_fetch_array($sql_u_name);
		$name = $sql_u_name_1['U_name'];
	}	

		$P_id = $_GET["P_id"];
		//echo"<script>alert('Working  $P_id');</script>";
		$result = mysqli_query($db,"SELECT * FROM request_to_sell_product where P_id =$P_id ");
		while ($res = mysqli_fetch_array($result))
		{ ?>
		<html>
		<head> 
			<title>Property Details</title>
			<link rel="stylesheet" href="style.css">
			<link rel="stylesheet" href="assets/css/main.css" />
			<link rel="stylesheet" href="assets/jquery.datetimepicker.min.css" />
			<script src="assets/jquery.js"></script>
			<script src="assets/jquery.datetimepicker.full.js"></script>
			
		</head>
		<body>
		<div class= "back_2">
		<h2><center> More Information </center></h2>
				<div class="box person">
					<div class="image square">
				<?php 
					echo '<img height = "300" width = "300" src="data:P_pic_1;base64,'.$res['P_pic_1'].'">';
					echo '<br>';
					echo '<img height = "300" width = "300" src="data:P_pic_2;base64,'.$res['P_pic_2'].'">';
					echo '<br>';
					echo '<img height = "300" width = "300" src="data:P_pic_3;base64,'.$res['P_pic_3'].'">';
				?>
				</div>
				<div class="image square">
				<?php 
					//echo '<img height = "80" width = "80" src="data:P_pic_1;base64,'.$res['P_pic_1'].'">';
					//echo '<img height = "80" width = "80" src="data:P_pic_2;base64,'.$res['P_pic_2'].'">';
					//echo '<img height = "80" width = "80" src="data:P_pic_3;base64,'.$res['P_pic_3'].'">';
				?>
				</div>
							
			</div>
	</div>
	<?php	echo "<center><div>";
			echo "<p>".$res['P_location']."</p>";
			echo "<p>".$res['P_type']."</p>";
			echo "<p>".$res['P_for_sell_rent']."</p>";
			echo "<p>".$res['P_size']."</p>";
			echo "<p>".$res['P_price_per_unit']."</p>";
			echo "<p>".$res['P_owner_name']."</p>";
			echo "<p>".$res['P_owner_phone']."</p>";
			echo "<p>".$res['P_owner_address']."</p>";
			echo "<p>".$res['P_ref_name']."</p>";
			$P_id= $res['P_id'];
			$S_id = $res['P_ref_id'];
			echo "</div>";
			//$P_id= $res['P_id'];
				//$S_id = $res['P_ref_id'];
				//$B_id={$_SESSION["U_id"]};
	?>
	
	</body>
	
		 
				<form action= "chatting.php" method="post">
						<input type="hidden" Value="<?php echo $res['P_id'];?>" name="P_id">
						<input type="hidden" Value="<?php echo $res['P_ref_id'];?>" name="S_id">
						<input type="hidden" Value="<?php echo $_SESSION["U_id"];?>" name="B_id">
						<input type="submit" Value="submit_4" name="submit_4">
				</form>
				<?php
				if(isset($_POST['submit_4'])){
					$P_ID= $_POST['P_id'];
					$S_ID= $_POST['P_ref_id'];
					$B_ID= $_POST["U_id"];
					//echo "<script>alert('$P_ID');</script>";
					//echo "<script>alert('$S_ID');</script>";
					//echo "<script>alert('$B_ID');</script>";
				}
				
				
				
				 //echo "<a href=\"chat.php?P_id=$res[P_id]\">Live Chat</a>"; //?B_id={$_SESSION["U_id"]}?S_id=$S_id?>
					  <!--<a href=\"Property_Details.php?P_id=$res[P_id]\">View Details</a></td>";
					  <a href="chat.php" class="btn btn-primary">Live Chat</a><br><br><br>-->
					
			<form method="POST">
			
			<input id="datetime" name ="meeting_date_1">
			<script>
			$("#datetime").datetimepicker(); 
			</script>
				
				<button type = "submit" name = "submit_3" class="btn btn-primary"> Fix Date for Meeting</button>
				
				</form>
				<?php
				if(isset($_POST["submit_3"])){
					
					$meeting_date = $_POST["meeting_date_1"];
					
					
					if(($_SESSION["U_id"]) != null){
						$sqlMeeting= "UPDATE request_to_sell_product SET meeting_date = '$meeting_date' , meeting_with = '$name' WHERE P_id ='$P_id'";
						$query = mysqli_query($db,$sqlMeeting);
						echo"<script>alert('Meeting selected on: $meeting_date with $name');</script>";
					//echo"<script>alert('Working ');</script>";
					//echo"<script>alert('Meeting selected on:$_POST[meeting_date] with $name');</script>";
					//$sql= mysqli_query($db,"INSERT into request_to_sell_product(meeting_date,meeting_with) values ('$meeting_date','$name') where P_id =$P_id ");
					}
					else{
						echo"<script>alert('Need to Login');</script>";
						
					}
				}
				
				?>
				
				
				
		
			<!--<a href="Live_chat_customer.php" class="btn btn-primary">Fix a Date for Meeting</a>-->
					<?php echo "</center>";?>
		<?php					
		}
	?>
	</html>

		<div class="footer">
			<footer><p>Copyright &copy; Sarataj Sultan </p></footer>
		</div>
