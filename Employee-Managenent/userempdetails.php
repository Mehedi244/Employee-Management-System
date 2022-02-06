<?php
error_reporting(0);
$msg = $errid = $errgender= "";
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
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
  

  .imgbox img{
    width: 150px;
    float: right;
  }
</style>


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
            <div class="from-1Details">
               <div id="printableArea" class="panel panel-primary">
                  <div class="panel-heading">Employee Details</div>
                  <div  class="panel-body">

                    <?php 

                      if (isset($_GET['details'])) {
                        $i = $_GET['details'];

                        $sql2 = "SELECT * FROM employee WHERE id = '$i'";
                        $run2 = mysqli_query($cn,$sql2);
                        $row = mysqli_fetch_array($run2);

                        ?>
                    <div class="row">
                      <div class="col-md-6">
                      <label>Employee Name : </label> <label><?php echo $row['name']; ?></label><br>
                      <label>Address : </label><br>
                      <label>Phone : </label><br>
                      <label>Email : </label><br>

                    </div>
                    <div class="col-md-6">
                      <div class="imgbox">
                        <img src="images/<?php echo $row['image']; ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <br><br>
                      <table class="table table-hover">
                      <tbody>
 
                        <tr>
                          <td>Employee ID : </td>
                          <td><?php echo $row['ssn']; ?></td>
                        </tr>

                        <tr>
                          <td>Emp Name : </td>
                          <td><?php echo $row['name']; ?></td>
                          
                          
                        </tr>
                        <tr>
                          <td>Emp Name : </td>
                          <td><?php echo $row['name']; ?></td>
                          
                          
                        </tr>
                        <tr>
                          <td>Emp Name : </td>
                          <td><?php echo $row['name']; ?></td>
                          
                          
                        </tr>
                        <tr>
                          <td>Emp Name : </td>
                          <td><?php echo $row['name']; ?></td>
                          
                          
                        </tr>
                        <tr>
                          <td>Emp Name : </td>
                          <td><?php echo $row['name']; ?></td>
                          
                          <?php } ?>
                        </tr>
                        
                        

                      </tbody>
                    </table>
                    </div>
                    </div>

                    
                    
                    
                  </div>
                  </div>
              </div>
              </div>     
            </div>
          </div>
      </div>
    </section>

    
