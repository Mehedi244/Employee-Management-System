
<?php
  include 'connection/db.php';
  error_reporting(0);
  $msg = $errid = $errgender= "";
  session_start();
  if(isset($_GET['out'])){
    session_destroy();
    header("location: login.php");
  }

  if(!$_SESSION['userId']){
    session_destroy();
    header("location: login.php");
  }

  if (isset($_POST['update'])) {

      $i = $_POST['id'];
      $name = $_POST['name'];
      $birthdate = $_POST['birthdate'];
      $address = $_POST['address'];
      $bloodgroup = $_POST['bloodgroup'];
      $sex = $_POST['sex'];
      $degree = $_POST['degree'];

      //img
      $image =$_FILES['image']['name'];
      $image_size =$_FILES['image']['size'];
      $image_type =$_FILES['image']['type'];
      $image_temp_loc =$_FILES['image']['tmp_name'];
      $image_store = "images/".$image;
      move_uploaded_file($image_temp_loc, $image_store);
    
    
        $sql = "UPDATE employee SET name = '$name',bdate = '$birthdate',address='$address',bloodgroup='$bloodgroup',sex ='$sex',degree = '$degree',image ='$image' WHERE id = '$i'";
        mysqli_query($cn,$sql);
        $msg = "<div style='color: #842029;background-color: #d4edda;border-color: #f5c2c7;text-align:center;' class='alert alert-succcess'><strong>Data Is Updated</strong></div>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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
      #inputEmail4{
        margin-top: 5px !important;
      }
      #loginbtn{
        margin-top: 5px !important;
        background: #007bff;
        margin-bottom: 20px;
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
    <?php 
        if ($_SESSION['userId'] && $_SESSION['password']) {
          $userId = $_SESSION['userId'];
          $password = $_SESSION['password'];

          $sql1 = "SELECT * FROM employee WHERE email = '$userId' AND password = '$password'";
          $run1 = mysqli_query($cn,$sql1);
          $row = mysqli_fetch_array($run1);
    ?>

        

      
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
          Welcome : <span><?php echo $row['name']; ?></span><br>
          <span style="font-size: 18px;">Employee ID : <span><?php echo $row['ssn']; ?></span></span>
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
         <img style="width: 60px;" src="images/<?php echo $row['image']; ?>">
        </div>
      <?php } ?>
      </div>
      

      
      
      <h2>Update Informations</h2>
      <div class="table-responsive">
        <div class="row">
          
        
        <?php 

                      if (isset($_GET['edit'])) {
                        $i = $_GET['edit'];

                        $sql2 = "SELECT * FROM employee WHERE id = '$i'";
                        $run2 = mysqli_query($cn,$sql2);
                        $row = mysqli_fetch_array($run2);

                  ?>

                    <form action=""  method="post" enctype="multipart/form-data">
                    <div class="row">
                      <p id="succesmsg">
                    <?php if (isset($msg)) {
                      echo $msg;
                      } 
                   ?>
                  </p>
                  <div class="col-md-6">
                     <?php echo $errid; ?>
                     <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
                    <input type="text" name="emp_id" value="<?php echo $row['ssn']; ?>"  class="form-control" id="inputEmail4" placeholder="Emp_id" disabled >
                    
                    
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="inputEmail4" >
                    
                    <input type="text" name="birthdate" value="<?php echo $row['bdate']; ?>" class="form-control" id="inputEmail4" placeholder="Name" >
                    <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" id="inputEmail4" placeholder="Address" >
                    <?php echo $errid; ?>
                    <select name="dept_id" id="inputEmail4" class="form-control" placeholder="Dept_id" disabled>
                      <option value="<?php echo $row['dno']; ?>" selected ><?php echo $row['dno']; ?></option>
                      
                    </select>

                    <input type="text" name="email" class="form-control" id="inputEmail4" value="<?php echo $row['email']; ?>" placeholder="email" disabled>
                            <?php echo $errid; ?>
                    <input type="text" name="password" class="form-control" id="inputEmail4" value="<?php echo $row['password']; ?>" placeholder="password" disabled>
                  
                  </div><!-- left input -->

                  <div class="col-md-6">
                    <input type="text" name="salary" value="<?php echo $row['salary']; ?>" class="form-control" id="inputEmail4" disabled>
                    <input type="text" name="position" value="<?php echo $row['position']; ?>" class="form-control" id="inputEmail4"disabled >
                    <select name="bloodgroup" id="inputEmail4" class="form-control" placeholder="sex">
                      <option selected value="<?php echo $row['bloodgroup']; ?>"><?php echo $row['bloodgroup']; ?></option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                    <input type="text" name="degree" class="form-control" id="inputEmail4" value="<?php echo $row['degree']; ?>" placeholder="degree">
                    

                    <h4>Gender</h4>
                    <input type="text" name="sex" value="<?php echo $row['sex']; ?>" class="form-control" id="inputEmail4" placeholder="sex">
                    
                    <?php echo $errgender; ?>
                    <br>
                     <textarea value="<?php echo $row['remark']; ?>"  name="remark" id="inputEmail4" class="form-control" id="exampleFormControlTextarea1" disabled ><?php echo $row['remark']; ?> </textarea>
                    <input type="file" value="<?php echo $row['image']; ?>" name="image" class="form-control-file" id="inputEmail4">
                    
                    
                  </div>
                  <input type="submit" name="update" id="loginbtn" class="form-control" value="Update"><br><br>
                  
                  
                  
                </div>
                </form>
              <?php } ?>
              
        </div>
      </div>
    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

  </body>
</html>
