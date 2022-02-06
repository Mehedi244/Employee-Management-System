<?php
	session_start();
	$msg = "";
	include 'connection/db.php';
	include 'model/login_model.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link rel="shortcut icon" href="images/" />

    <title>Employee Management</title>
  </head>
  <body>
    
    <section id="menu">
     <div class="col-md-12">
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Employee Management  </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="login.php">Admin Login</a>
              <a class="nav-link" href="emplogin.php">Employee Login</a>
              
              
              
              
            </div>
          </div>
        </div>
      </nav>
     </div>
    </section>
	
		<div id="background">
			<div id="user_img"></div><br>
			<h1>Admin Login</h1>
			<form action="" method="POST">
			<div class="frm">
			<hr>
			<label style="font-size: 23px; color:red; text-align: center; margin-left: 20px;">
			</label>
				<?php
					if(isset($msg)){
						echo $msg;
						
					}
				?>
			<br>
			<div class="a">
			<label style="margin-left: 5px;margin-bottom:3px;font-weight:bold; color: gray; ">User Name </label>
			<input id="input-box" type="text" placeholder="UserName" name="user">
			</div>
			<div class="a">
			<label style="margin-left: 5px;font-weight:bold; color: gray; ">Password </label>
			<input id="input-box" type="password" placeholder="Password" name="pass">
			</div>

			<div class="btn">
				<input id="button" type="submit" name="login" value="Login">
			</div>
			


			</div>
			</form>
		</div>

</body>
</html>