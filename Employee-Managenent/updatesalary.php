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
      $total_days = $_POST['total_days'];
      $absent = $_POST['absent'];
      $month = $_POST['month'];

      $sql2 = "SELECT * FROM salary WHERE id = '$i'";
      $run2 = mysqli_query($cn,$sql2);
      $row = mysqli_fetch_array($run2);
      $salary = $row['salary'];

      if ($salary>=30000 && $salary<=50000) {
        $medical = 1500;

        $house_rent = (60/100)*(int)$salary;
        $traveling = (20/100)*(int)$salary;

      }elseif ($salary>=50000 && $salary<=80000) {
        $medical = 2000;
        $house_rent = (70/100)*(int)$salary;
        $traveling = (25/100)*(int)$salary;
      }elseif ($salary>=30000 && $salary<=40000) {
        $medical = 1000;
        $house_rent = (50/100)*(int)$salary;
        $traveling = (15/100)*(int)$salary;
      }elseif ($salary>=10000 && $salary<=30000) {
        $medical = 800;
        $house_rent = (40/100)*(int)$salary;
        $traveling = (10/100)*(int)$salary;
      }
      else{
        $medical = 700;
        $house_rent = (30/100)*(int)$salary;
        $traveling = (5/100)*(int)$salary;
      }

      $dailybase = (int)$salary/30;
      $totalsal = ($dailybase*(int)$total_days)+(int)$medical+(int)$house_rent+(int)$traveling;

      if (empty($_POST['total_days'])|| empty($_POST['absent']) || empty($_POST['month'])) {
          
        
        $errid = $errgender = "<span style ='color:red;text-decoration:underline;font-size:10px;'>*Fild not be Empty</span>";
        
      }elseif (($_POST['total_days'])>30 || ($_POST['total_days'])<10 || (int)$absent+(int)$total_days>30 || (int)$absent+(int)$total_days<0  ) {
        $message1 = "<span style='color:red;background:gray;'>Invalid day or absent</span>";
        
      }
      else{
        $sql3 = "UPDATE salary SET total_days = '$total_days',absent = '$absent',month = '$month',totalsal = '$totalsal' WHERE id = '$i'";
        mysqli_query($cn,$sql3);
        $msg = "Data update success";
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
                  <div class="panel-heading">Update Salary</div>
                  <div class="panel-body">
                    <p id="succesmsg">
                              <?php if (isset($msg)) {
                                echo $msg;
                              } 
                              ?>
                              <?php if (isset($message1)) {
                                echo $message1;
                              } 
                              ?>
                      </p>
                     <?php 

                      if (isset($_GET['edit'])) {
                        $i = $_GET['edit'];

                        $sql4 = "SELECT * FROM salary WHERE id = '$i'";
                        $run4 = mysqli_query($cn,$sql4);
                        $row = mysqli_fetch_array($run4);

                  ?>
                    <form action="" method="post">
                    <div class="row">
   
                     
                  <div class="col-md-6">
                     <?php echo $errid; ?>
                     <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
                    <input type="text" name="total_days" class="form-control" id="inputEmail4" value="<?php echo $row['total_days']; ?>">
                    <?php echo $errid; ?>
                    <input type="text" name="absent" class="form-control" id="inputEmail4" value="<?php echo $row['absent']; ?>">
                    
                    
                  
                  </div><!-- left input -->

                  <div class="col-md-6">
                    <?php echo $errid; ?>
                    <input type="text" name="month" class="form-control" id="inputEmail4" value="<?php echo $row['month']; ?>">
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