<?php
  include 'connection/db.php';
  session_start();
  if(isset($_GET['out'])){
    session_destroy();
    header("location: login.php");
  }

  if(!$_SESSION['userId']){
    session_destroy();
    header("location: login.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Employee Management</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      a.disabled {
  pointer-events: none;
  cursor: default;
  color: gray !important;
}
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Employee</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
     <a class="nav-link px-3" href="?out=<?php echo $_SESSION['userId']; ?>">logout</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="indexemp.php">
              <span data-feather="home"></span>
              Employee Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="empview.php">
              <span data-feather="file"></span>
              All Employee List
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="emp-notice.php">
             <span data-feather="bell"></span>
              notice
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled"  href="#">
              <span data-feather="users"></span>
              Disable
            </a>
          </li>
          
          
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Support</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Help
            </a>
          </li>
          
          
        </ul>
      </div>
    </nav>