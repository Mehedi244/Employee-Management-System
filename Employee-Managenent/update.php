<?php
error_reporting(0);
$msg = $errid = $errgender= "";
  include 'connection/db.php';
   include 'inc/session.php';

  if (isset($_POST['update'])) {

      $i = $_POST['id'];
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

      //img
      $image =$_FILES['image']['name'];
      $image_size =$_FILES['image']['size'];
      $image_type =$_FILES['image']['type'];
      $image_temp_loc =$_FILES['image']['tmp_name'];
      $image_store = "images/".$image;
      move_uploaded_file($image_temp_loc, $image_store);

      

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
      }else {
        $sql = "UPDATE employee SET ssn = '$emp_id',name = '$name',bdate = '$birthdate',address='$address',dno ='$dept_id',salary ='$salary',position='$position',bloodgroup='$bloodgroup',sex ='$sex',email = '$email',password = '$password',degree = '$degree',remark='$remark',image ='$image' WHERE id = '$i'";
        mysqli_query($cn,$sql);
        $msg = "Data update success";
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
                  <div class="panel-heading">Add Employee</div>
                  <div class="panel-body">

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
                  <div class="col-md-6">
                     <?php echo $errid; ?>
                     <?php echo $errempid; ?>
                     <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
                    <input type="text" name="emp_id" value="<?php echo $row['ssn']; ?>"  class="form-control" id="inputEmail4" >
                    
                    
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="inputEmail4" >
                    
                    <input type="text" name="birthdate" value="<?php echo $row['bdate']; ?>" class="form-control" id="inputEmail4" >
                    <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" id="inputEmail4" >
                    <?php echo $errid; ?>
                    <select name="dept_id" id="inputEmail4" class="form-control" >
                      <option value="<?php echo $row['dno']; ?>" selected ><?php echo $row['dno']; ?></option>
                      
                    </select>
                    <?php echo $errid1; ?>
                    <input type="text" name="email" class="form-control" id="inputEmail4" value="<?php echo $row['email']; ?>" placeholder="email">
                            <?php echo $errid; ?>
                            <?php echo $erremppass; ?>
                    <input type="text" name="password" class="form-control" id="inputEmail4" value="<?php echo $row['password']; ?>" placeholder="password">
                  
                  </div><!-- left input -->

                  <div class="col-md-6">
                    <input type="text" name="salary" value="<?php echo $row['salary']; ?>" class="form-control" id="inputEmail4" >
                    <input type="text" name="position" value="<?php echo $row['position']; ?>" class="form-control" id="inputEmail4" >
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
                     <textarea value="<?php echo $row['remark']; ?>"  name="remark" id="inputEmail4" class="form-control" id="exampleFormControlTextarea1" ><?php echo $row['remark']; ?> </textarea>
                    <input type="file" value="<?php echo $row['image']; ?>" name="image" class="form-control-file" id="exampleFormControlFile1">
                    
                    
                  </div>
                  <input type="submit"  name="update" id="login-btn" class="form-control" value="Update">
                  
                  </p>
                  
                  
                </div>
                </form>
              <?php } ?>
              </div><!-- close panel -->
                  </div>
              </div>
              </div>     
            </div>
          </div>
      </div>
    </section>

    <?php include 'inc/footer.php' ?>