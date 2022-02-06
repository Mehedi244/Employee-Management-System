<?php
error_reporting(0);
$msg = $errid = $errgender= "";
  include 'connection/db.php';
  session_start();
  if(isset($_GET['out'])){
    session_destroy();
    header("location: login.php");
  }

  if(!$_SESSION['usr']){
    session_destroy();
    header("location: login.php");
  }

  

  if (isset($_POST['update'])) {

      $i = $_POST['id'];
      $project_name = $_POST['project_name'];
      $project_id = $_POST['project_id'];
      $dept_id = $_POST['dept_id'];
      $project_location = $_POST['project_location'];


      $sql3 = "UPDATE project SET project_name = '$project_name',project_id = '$project_id',dept_id = '$dept_id' WHERE id = '$i'";
        mysqli_query($cn,$sql3);
        $msg = "Data update success";
}
?>

<?php include 'inc/header.php' ?>

    <section style="margin-bottom: 10px;" id="">
      <div class="container">
        <div class="deshbord">
          <div class="row">
           <div class="col-md-6">
            <h1 style="color:white;"></h1>
          </div>   
          <div class="col-md-6">
            <div class="Profile">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                  Setting
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                  <li><a class="dropdown-item active" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Feature-1</a></li>
                  <li><a class="dropdown-item" href="#">Feature-1</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?out=<?php echo $_SESSION['usr']; ?>">logout</a></li>

                 
                </ul>
              </div>
            </div>
          </div>   
        </div>
        </div>
      </div>
    </section>

    <section id="body">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="from-1">
               <div class="panel panel-primary">
                  <div class="panel-heading">Update Project</div>
                  <div class="panel-body">

                     <?php 

                      if (isset($_GET['edit'])) {
                        $i = $_GET['edit'];

                        $sql4 = "SELECT * FROM project WHERE id = '$i'";
                        $run4 = mysqli_query($cn,$sql4);
                        $row = mysqli_fetch_array($run4);

                  ?>
                    <form action="" method="post">
                    <div class="row">
   
                     
                  <div class="col-md-6">
                     <?php echo $errid; ?>
                     <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
                    <input type="text" name="project_name" class="form-control" id="inputEmail4" value="<?php echo $row['project_name']; ?>">
                    <?php echo $errid; ?>
                    <input type="text" name="project_id" class="form-control" id="inputEmail4" value="<?php echo $row['project_id']; ?>">
                    
                    
                    
                    
                    
                    
                  
                  </div><!-- left input -->

                  <div class="col-md-6">
                    <?php echo $errid; ?>
                    <input type="text" name="project_location" class="form-control" id="inputEmail4" value="<?php echo $row['project_location']; ?>">
                    <input type="text" name="dept_id" class="form-control" id="inputEmail4" value="<?php echo $row['dept_id']; ?>">
                    <input style="width: 100% !important;" type="submit" name="update" id="login-btn" class="form-control" value="Update">
                    
                    <br>

                  </div>
                  
                  <p id="succesmsg">
                    <?php if (isset($msg)) {
                      echo $msg;
                      } 
                   ?>
                  </p>
                  
                  
                </div>
                </form>
              <?php } ?>
              </div>
                  </div>
              </div>
              </div>     
            </div>
          </div>
      </div>
    </section>

    <?php include 'inc/footer.php' ?>