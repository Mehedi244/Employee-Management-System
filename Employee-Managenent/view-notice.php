<?php
  include 'connection/db.php';
  include 'inc/session.php';

  if(isset($_GET['del'])){
    $i = $_GET['del'];

    $sql = "DELETE FROM notice_tbl WHERE id = '$i'";
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
                  <div class="panel-heading">Notice List</div>
                  <div class="panel-body">
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Notice Title</th>

                          <th scope="col">Published Date</th>
                          <th scope="col">Notice File</th>
                          
                          
                          
                          

                          <th colspan="2" scope="col">Operations</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $sql  = "SELECT * from notice_tbl";
                            $i = 0;
                            $result = mysqli_query($cn, $sql);

                              while ($row = mysqli_fetch_array($result)) {
                              $i++;
                          ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          
                          <td><?php echo $row['notice_title']; ?></td>
                          <td><?php echo $row['notice_date']; ?></td>
                          
                          <td ><a  href="details-notice.php?details=<?php echo $row['id']; ?>"><img style="width: 25px;" src="images/pdfimg.jpg"></a></td>


                          

                          <td ><a id="btn1" href="update-notice.php?edit=<?php echo $row['id']; ?>">Update</a></td>
                          <td><a id="btn1" href="details-notice.php?details=<?php echo $row['id']; ?>">view Notice</a></td>
                          
                          <td><a id="btn1" onclick="window.confirm('You are delete this data');" href="view-notice.php?del=<?php echo $row['id']; ?>">Delete</a></td>

                          

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

    