<?php
error_reporting(0);
$msg = $errid = $errgender= "";
  include 'connection/db.php';
  include 'inc/session.php';

  if (isset($_POST['save'])) {

    
      $dept_id = $_POST['dept_id'];
      $dept_name = $_POST['dept_name'];
      $mgr_start_date = $_POST['mgr_start_date'];

      $sql2 = "SELECT * FROM department  WHERE dept_id = '$dept_id'";
      $run2 = mysqli_query($cn,$sql2);
      $row = mysqli_fetch_array($run2);
      $deptid = $row['dept_id'];

      $sql2 = "SELECT * FROM department  WHERE dept_name = '$dept_name'";
      $run2 = mysqli_query($cn,$sql2);
      $row = mysqli_fetch_array($run2);
      $deptname = $row['dept_name'];
      

      if (empty($_POST['dept_id']) || empty($_POST['dept_name']) ||  empty($_POST['mgr_start_date'])) {
        $msg = $errgender = "<span style ='color:red;text-decoration:underline;font-size:10px;'>*Fild not be Empty</span>";
        
      }elseif ($dept_id==$deptid) {
        $msg = "<div class='alert alert-danger'><strong>Error! alreay department id Exit</strong></div>";
      }
      elseif ($dept_name==$deptname) {
        $msg = "<div class='alert alert-danger'><strong>Error! alreay department name Exit</strong></div>";
      }
      else{
         $sql1 = "INSERT INTO department(dept_id,dept_name,mgr_start_date) value('$dept_id','$dept_name','$mgr_start_date')";
          mysqli_query($cn,$sql1);

        $msg = "<div class='alert alert-success'><strong>Data Inserted Successfully</strong></div>";
      }
  } 
?>
<?php include 'inc/header.php' ?>

    <section style="margin-bottom: 10px;" id="">
      <div class="container">
         <?php include 'inc/sessionoutbtn.php'; ?>
      </div>
    </section>

    <section id="body">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="from-1">
               <div class="panel panel-primary">
                  <div class="panel-heading">Add Departments</div>
                  <div class="panel-body">
                    <form action="add-department.php"  method="post">
                      <div class="row">
                        <div class="col-md-6">
                           <?php echo $msg; ?>
                            <input type="text" name="dept_id" class="form-control" id="inputEmail4" placeholder="Dept_id...">
                            
                            <input type="text" name="dept_name" class="form-control" id="inputEmail4" placeholder="Dept_name...">
                        </div><!-- left input -->

                          <div class="col-md-6">
                            
                            <input type="date" name="mgr_start_date" class="form-control" id="inputEmail4">
                            <input style="width: 100% !important;" type="submit" name="save" id="login-btn" class="form-control" value="Save">
                            <br>
                          </div>
                    
                          
                    
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>     
            </div>
          </div>
      </div>
    </section>

    <?php include 'inc/footer.php' ?>