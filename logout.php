<?php
	include "database.php";
	session_start();
	
	unset ($_SESSION["U_id"]);
	/*
	unset ($_SESSION["A_name"]);
	unset ($_SESSION["T_id"]);
	unset ($_SESSION["T_name"]);
	unset ($_SESSION["S_id"]);
	unset ($_SESSION["S_name"]);
	unset ($_SESSION["CR_id"]);
	unset ($_SESSION["CR_name"]);
	*/
	session_destroy();
	echo "<script>window.open('index.php','_self');</script>";
?>
