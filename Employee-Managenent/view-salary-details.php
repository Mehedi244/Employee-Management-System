<?php
  include 'connection/db.php';
  include 'inc/session.php';

  if(isset($_GET['del'])){
    $i = $_GET['del'];

    $sql = "DELETE FROM salary WHERE id = '$i'";
    mysqli_query($cn, $sql);
  }

?>
 <?php include 'inc/header.php'; ?>

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
                  <div class="panel-heading">Employeee salary</div>
                  <div class="panel-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Emp_ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Worked Day</th>
                          <th scope="col">salary</th>
                          <th scope="col">Absent</th>
                          <th scope="col">TotalSal</th>
                          <th scope="col">Medical</th>
                          <th scope="col">Month</th>

                          <th colspan="2" scope="col">Operations</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $sql  = "SELECT * from salary";
                            $i = 0;
                            $result = mysqli_query($cn, $sql);

                              while ($row = mysqli_fetch_array($result)) {
                              $i++;
                          ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $row['emp_id']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['total_days']; ?></td>
                          <td><?php echo $row['salary']; ?></td>
                          <td><?php echo $row['absent']; ?></td>
                          <td><?php echo $row['totalsal']; ?></td>
                          <td><?php echo $row['medical']; ?></td>
                          <td><?php echo $row['month']; ?></td>
                          <td width="10%"><a id="btn1" href="updatesalary.php?edit=<?php echo $row['id'];   ?>">Update</a></td>
                          
                          <td><a id="btn1" onclick="window.confirm('You are delete this data');" href="view-salary-details.php?del=<?php echo $row['id']; ?>">Delete</a></td>

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
    </section>

    <?php include 'inc/footer.php' ?>

    