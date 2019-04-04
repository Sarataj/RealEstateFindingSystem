<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["U_id"])) // || ($_GET["B_id"]) || (S_id)
	{
		echo"<script>window.open('User_login.php?mes=Access Denied...','_self');</script>";
	}
	else{
			$P_id= $_POST['P_id'];
			$S_id= $_POST['S_id'];
			$B_id= $_POST['B_id'];
		$sql_u_name=mysqli_query($db,"SELECT U_name FROM user_info WHERE U_id= {$_SESSION["U_id"]}");
		$sql_u_name_1=mysqli_fetch_array($sql_u_name);
		$name = $sql_u_name_1['U_name'];
		
		echo "Working  $P_id <br>";
		echo "Working  $S_id <br>";
		echo "Working  $B_id";
	}
	?>
<html>
<head>
	<title>Live Chat</title>
	<link rel="stylesheet" href="styles.css">
	<script type="text/javascript">
		function ajax(){
		var req=new XMLHttpRequest();
		req.onreadystatechange=function(){
		if(req.readyState==4 && req.status==200){
		document.getElementById('chat').innerHTML=req.responseText;

	}

	}
	req.open('GET','chat.php',true);
	req.send();
	}
	setInterval(function(){ajax()},1000);

	</script>
</head>
	<body onload="ajax()">
		<div id="container">
			<div id="chat_box">
				<div id="chat">
				</div>

			</div>
				<form method="post" action="chat.php">
					<textarea name="msz" placeholder="Enter the message:)"></textarea>
					<input type="hidden" Value="<?php echo $_POST['P_id'];?>" name="P_id">
					<input type="hidden" Value="<?php echo $_POST['S_id'];?>" name="S_id">
					<input type="hidden" Value="<?php echo $_POST["B_id"];?>" name="B_id">
					<input type="submit" name="submit" value="Sendit">

				</form>
				<?php
				if (isset($_POST['submit'])) {
					$msz   = $_POST['msz'];
					$query = "INSERT INTO live_chat (Buyer_id,Seller_id,msz,P_id) values ('$B_id','$S_id','$msz','$P_id')";
					$run   = $db->query($query);
					if ($run) {
						//echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'>";
					}
				} 
				?>
		</div>
	</body>
</html>

	
		
		

		<!-- 	//echo"<script>alert('Working  $name');</script>";
		//echo "<script>alert('$S_id');</script>";
		
		
		/*$sql_u_name=mysqli_query($db,"SELECT U_name FROM user_info WHERE U_id= {$_SESSION["U_id"]}");
		$sql_u_name_1=mysqli_fetch_array($sql_u_name);
		//echo"<script>alert('Working  $sql_u_name_1');</script>";
		$name = $sql_u_name_1['U_name'];
	}	*/
	
	//echo"<script>alert('Working  $Seller_id');</script>";
		//$Buyer_id = $_GET["B_id"];
		//$Seller_id = $_GET["S_id"];
		//echo "<script>alert("$_SESSION['U_id']");</script>";
		//echo "<script>alert("$Buyer_id");</script>"; -->
