<?php
error_reporting(0);
$msg = $errid = $errgender= "";
  include 'connection/db.php';
  include 'inc/session.php';

   

  if (isset($_POST['update'])) {

      $i = $_POST['id'];
      $dept_id = $_POST['dept_id'];
      $dept_name = $_POST['dept_name'];
      $mgr_start_date = $_POST['mgr_start_date'];





      if (empty($_POST['dept_id']) || empty($_POST['dept_name']) ||  empty($_POST['mgr_start_date'])) {
         $msg = "<div class='alert alert-danger'><strong>Fild Must not be empty</strong></div>";
        
      }
      else{
         $sql3 = "UPDATE department SET dept_id = '$dept_id',dept_name = '$dept_name',mgr_start_date = '$mgr_start_date' WHERE id = '$i'";
            mysqli_query($cn,$sql3);
          $msg = "<div class='alert alert-success'><strong>Data Updated</strong></div>";
      }

     
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
                  <div class="panel-heading">Update Departments</div>
                  <div class="panel-body">


                     <?php 

                      if (isset($_GET['edit'])) {
                        $i = $_GET['edit'];

                        $sql4 = "SELECT * FROM department WHERE id = '$i'";
                        $run4 = mysqli_query($cn,$sql4);
                        $row = mysqli_fetch_array($run4);

                  ?>
                    <form action="" method="post">
                    <div class="row">
                    <?php echo $msg; ?>
                     
                  <div class="col-md-6">
                     <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
                    <input type="text" name="dept_id" class="form-control" id="inputEmail4" value="<?php echo $row['dept_id']; ?>">

                    <input type="text" name="dept_name" class="form-control" id="inputEmail4" value="<?php echo $row['dept_name']; ?>">
                    
                    
                    
                    
                    
                    
                  
                  </div><!-- left input -->

                  <div class="col-md-6">
                    <input type="date" name="mgr_start_date" class="form-control" id="inputEmail4" value="<?php echo $row['mgr_start_date']; ?>">
                    <input style="width: 100% !important;" type="submit" name="update" id="login-btn" class="form-control" value="Update">
                    
                    <br>

                  </div>

                  
                  
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