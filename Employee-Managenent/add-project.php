<?php
error_reporting(0);
$msg = $errid = $errgender= "";
  include 'connection/db.php';
  include 'inc/session.php';

  if (isset($_POST['save'])) {

    
      $project_name = $_POST['project_name'];
      $project_id = $_POST['project_id'];
      $project_location = $_POST['project_location'];
      $dept_id = $_POST['dept_id'];


      $sql2 = "SELECT * FROM project  WHERE project_id = '$project_id'";
      $run2 = mysqli_query($cn,$sql2);
      $row = mysqli_fetch_array($run2);
      $projectid = $row['project_id'];

      $sql2 = "SELECT * FROM project  WHERE project_name = '$project_name'";
      $run2 = mysqli_query($cn,$sql2);
      $row = mysqli_fetch_array($run2);
      $projectname = $row['project_name'];
      

      if (empty($_POST['project_name']) || empty($_POST['project_name']) ||  empty($_POST['project_location'])) {
        $msg = "<span style ='color:red;text-decoration:underline;font-size:10px;'>*Fild not be Empty</span>";
        
      }elseif ($project_id==$projectid) {
        $msg = "<div class='alert alert-success'><strong>error! Project Id already exist</strong></div>";
      }elseif ($project_name == $projectname) {
        $msg = "<div class='alert alert-success'><strong>error! Project name already exist</strong></div>";
      }
      else{
         $sql1 = "INSERT INTO project(project_name,project_id,project_location,dept_id) value('$project_name','$project_id','$project_location',$dept_id)";
          mysqli_query($cn,$sql1);

        $msg = "<div class='alert alert-success'><strong>Data Inserted Success</strong></div>";
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
                  <div class="panel-heading">Add Project</div>
                  <div class="panel-body">
                    <form action="add-project.php"  method="post">
                    <div class="row">
   
                     
                  <div class="col-md-6">
                     <?php echo $msg; ?>
                    <input type="text" name="project_name" class="form-control" id="inputEmail4" placeholder="project_name...">
                    <input type="text" name="project_id" class="form-control" id="inputEmail4" placeholder="project_id...">
                    
  
                  </div><!-- left input -->

                  <div class="col-md-6">
                    <input type="text" name="project_location" class="form-control" id="inputEmail4" placeholder="Project Location....">

                    <select name="dept_id" id="inputState" class="form-control" >
                      <option selected>Dept_id</option>
                      <?php 
                        $sql  = "SELECT * from department";

                        $result = mysqli_query($cn, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                      ?>
                        
                        <option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_id']; ?></option>
                        <?php } ?>
                    </select>
                    <br>
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