<?php
error_reporting(0);
$msg = $errid = $errgender=$errempid=$errempid1= "";
  include 'connection/db.php';
  include 'inc/session.php';

  if (isset($_POST['save'])) {

      $emp_id = $_POST['emp_id'];
      $name = $_POST['name'];
      $birthdate = $_POST['birthdate'];
      $address = $_POST['address'];
      $dept_id = $_POST['dept_id'];
      $salary = $_POST['salary'];
      $position = $_POST['position'];
      $bloodgroup = $_POST['bloodgroup'];
      $sex = $_POST['sex'];
      $remark = $_POST['remark'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $degree = $_POST['degree'];

      // img
      $image =$_FILES['image']['name'];
      $image_size =$_FILES['image']['size'];
      $image_type =$_FILES['image']['type'];
      $image_temp_loc =$_FILES['image']['tmp_name'];
      $image_store = "images/".$image;
      move_uploaded_file($image_temp_loc, $image_store);

      $sql2 = "SELECT * FROM employee WHERE ssn = '$emp_id'";
      $run2 = mysqli_query($cn,$sql2);
      $row = mysqli_fetch_array($run2);
      $empid = $row['ssn'];

      $sql3 = "SELECT * FROM employee WHERE email = '$email'";
      $run3 = mysqli_query($cn,$sql3);
      $row3 = mysqli_fetch_array($run3);
      $emailid = $row3['email'];
    
      
      if (empty($_POST['sex']) || empty($_POST['dept_id']) || empty($_POST['email']) || empty($_POST['password'])) {
        $errid = $errgender = "<span style ='color:red;text-decoration:underline;font-size:10px;'>*Fild Must not be Empty</span>";
        
      }elseif (empty($_POST["emp_id"]) || $empid == $emp_id) {
         $errempid = "<div class='alert alert-danger'><strong>Error!</strong></div>";
      }
      
      elseif (filter_var($email,FILTER_VALIDATE_EMAIL)===false) {
         $errid1 = "<div class='alert alert-danger'><strong>Error! In-valid</strong></div>";
      }
      elseif ($email==$emailid) {
        $errid1 = "<div class='alert alert-danger'><strong>Error! alreasy exist..</strong></div>";
      }
      elseif (strlen($password) < 4) {
        $erremppass = "<div class='alert alert-danger'><strong>Password must be at least 8 characters in length</strong></div>";
      }
      else{
         $sql1 = "INSERT INTO employee(ssn,name,bdate,address,dno,salary,position,bloodgroup,sex,remark,email,password,degree,image) value('$emp_id','$name','$birthdate','$address','$dept_id','$salary','$position','$bloodgroup','$sex','$remark','$email','$password','$degree','$image')";
          mysqli_query($cn,$sql1);

         $msg= "<div class='alert alert-success'><strong>Data inserted success</strong></div>";
      }

  } 

?>

<?php include 'inc/header.php' ?>

    <section style="margin-bottom: 10px;" id="">
      <div class="container">
        <?php include 'inc/sessionoutbtn.php'; ?>
      </div>
    </section><!-- close settiing area -->

    <section id="body">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="from-1">
               <div class="panel panel-primary">
                  <div class="panel-heading">Add Employee</div>
                  <div class="panel-body">
                    <form action="addemp.php"  method="post" enctype="multipart/form-data">
                      <div class="row">
                        <p id="succesmsg">
                            <?php if (isset($msg)) {
                                echo $msg;
                               } 
                               ?>
                          </p>
                        <div class="col-md-6">
                        <?php echo $errempid; ?>
                        <?php echo $errempid1; ?>
                            <input type="text" name="emp_id" class="form-control" id="inputEmail4" placeholder="Emp_id">
                            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Name">
                            <input type="text" name="birthdate" class="form-control" id="inputEmail4" placeholder="Birth-Date">
                            <input type="text" name="address" class="form-control" id="inputEmail4" placeholder="Address">
                            <?php echo $errid; ?>
                            <select name="dept_id" id="inputEmail4" class="form-control" >
                              <option selected>Dept_id</option>
                              <?php 
                                $sql  = "SELECT * from department";

                                $result = mysqli_query($cn, $sql);

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                
                                <option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_id']; ?></option>
                                <?php } ?>
                            </select>
                            <?php echo $errid1; ?>
                            <input type="text" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                            <?php echo $errid; ?>
                            <?php echo $erremppass; ?>
                            <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="Password">
                            
                  
                          </div><!-- left input -->

                          <div class="col-md-6">
                            <input type="text" name="salary" class="form-control" id="inputEmail4" placeholder="Salary" required="1">
                            <input type="text" name="position" class="form-control" id="inputEmail4" placeholder="Position" required="1">
                            <select name="bloodgroup" id="inputEmail4" class="form-control" >
                              <option selected>Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                            <input type="text" name="degree" class="form-control" id="inputEmail4" placeholder="Degree">
                            <h4>Gender</h4>
                            
                            <div class="form-check form-check-inline" id="common">
                              <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="Male">
                              <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="Female">
                              <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <?php echo $errgender; ?>
                            <br>
                             <textarea  name="remark" id="inputEmail4" class="form-control" id="exampleFormControlTextarea1" > </textarea>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                          </div>
                            <input type="submit" name="save" id="login-btn" class="form-control" value="Save">
                              
                  
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