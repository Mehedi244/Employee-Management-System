<?php
  include 'connection/db.php';
  include 'inc/session.php';

  if(isset($_GET['del'])){
    $i = $_GET['del'];

    $sql = "DELETE FROM project WHERE id = '$i'";
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
                  <div class="panel-heading">Project List</div>
                  <div class="panel-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">SL</th>
                          <th scope="col">Project Name </th>
                          <th scope="col">Project_ID</th>
                          <th scope="col">Project Location</th>
                          <th scope="col">Dept ID</th>
                          <th colspan="2" scope="col">Operations</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $sql  = "SELECT * from project";
                            $i = 0;
                            $result = mysqli_query($cn, $sql);

                              while ($row = mysqli_fetch_array($result)) {
                              $i++;
                          ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $row['project_name']; ?></td>
                          <td><?php echo $row['project_id']; ?></td>
                          <td><?php echo $row['project_location']; ?></td>
                          <td><?php echo $row['dept_id']; ?></td>


                          <td width="10%"><a id="btn1" href="updateProject.php?edit=<?php echo $row['id']; ?>">Update</a></td>
                          <!-- <td width="10%"><a id="btn1" href="details.php?details=<?php //echo $row['id']; ?>">Details</a></td> -->
                          <td><a id="btn1" onclick="window.confirm('You are delete this data');" href="viewProject.php?del=<?php echo $row['id']; ?>">Delete</a></td>

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

    