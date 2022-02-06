<?php include 'inc/header1.php'; ?>
    <?php 
        if ($_SESSION['userId'] && $_SESSION['password']) {
          $userId = $_SESSION['userId'];
          $password = $_SESSION['password'];

          $sql1 = "SELECT * FROM employee WHERE email = '$userId' AND password = '$password'";
          $run1 = mysqli_query($cn,$sql1);
          $row = mysqli_fetch_array($run1);
    ?>

        

      
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
          Welcome : <span><?php echo $row['name']; ?></span><br>
          <span style="font-size: 18px;">Employee ID : <span><?php echo $row['ssn']; ?></span></span>
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
         <img style="width: 60px;" src="images/<?php echo $row['image']; ?>">
        </div>
      <?php } ?>
      </div>
      

      
      
      <h2>Notice</h2>
      <div class="table-responsive">
        <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Notice Title</th>
                          <th scope="col">Published On</th>
                          <th scope="col">Notice File</th>
                          <th scope="col">Operation</th>
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
                          
                          <td><?php echo $i ?></td>
                          <td><?php echo $row['notice_title']; ?></td>
                          <td><?php echo $row['notice_date']; ?></td>
                          <td ><img style="width: 25px;" src="images/pdfimg.jpg"></td>
                          <td><a id="btn1" href="emp-details-notice.php?details=<?php echo $row['id']; ?>">view Notice</a></td>
                          
                          <?php } ?>
                        </tr>
                        
                        

                      
                    </tbody>
                    </table>
        </div>
        </div>

      </div>
    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
