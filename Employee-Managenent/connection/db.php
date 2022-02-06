<?php 
	//connection
	$cn = mysqli_connect("localhost", "root", "", "employeedb");

	if (mysqli_connect_errno()) {
		echo "connection fail...";
	}

 ?>