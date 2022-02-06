<?php 

session_start();
  if(isset($_GET['out'])){
    session_destroy();
    header("location: login.php");
  }

  if(!$_SESSION['usr']){
    session_destroy();
    header("location: login.php");
  }

 ?>