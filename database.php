<?php
	$db=new mysqli("localhost","root","","real-estate-finding-system");
	if(!$db)
	{
		echo "failed";
	}
	//ALTER TABLE request_to_sell_product ADD P_ref_id VARCHAR(10) NOT NULL, P_ref_name VARCHAR(50) NOT NULL -- update quary 
?>