<?php 
	if(isset($_POST['login'])){
			$u = $_POST['user'];
			$p = $_POST['pass'];

			$sql = "SELECT * FROM login WHERE user = '$u' AND pass = '$p'";
			$run = mysqli_query($cn, $sql);
			$row = mysqli_fetch_array($run);

			if(mysqli_num_rows($run) > 0){
				$_SESSION['usr'] = $row['user'];
				header("location: index.php");
			}
			else{
				$msg = "<p style='color:red;text-align:center;margin:0px;'>Wrong pass or user</p>";
			}
		}

		if(isset($_SESSION['usr'])){
			header("location: index.php");
		}


 ?>