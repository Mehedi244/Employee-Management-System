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
                      <tbody>
                        <?php 
                          if (isset($_GET['details'])) {
                        $i = $_GET['details'];

                        $sql2 = "SELECT * FROM notice_tbl WHERE id = '$i'";
                        $run2 = mysqli_query($cn,$sql2);
                        $row1 = mysqli_fetch_array($run2);
                        ?>
                         
                        <tr>
                          <table class="table table-hover table-striped">
                          <tbody>
                            <tr><th id="table-heading" colspan="2">Notice</th></tr>
                            <tr>
                              <td >Title : <?php echo $row1['notice_title']; ?> </td>
                            </tr>

                            <tr>
                              <td>Base salary : <?php echo $row1['notice_date']; ?></td>
                            </tr>
                          
                            
                            <tr>
                              <td ><embed style="width: 100%; height: 700px;" type="application/pdf" src="images/<?php echo $row1['image']; ?>"></embed></td>
                            
                            </tr>

                          </tbody>
                        </table>
                          
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
