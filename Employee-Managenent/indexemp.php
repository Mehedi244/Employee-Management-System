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
      </div>
      

      
      
      <h2>Personal Informations</h2>
      <div class="table-responsive">
        <div class="row">
          
        
        <div class="col-md-6">
            <br><br>
              <table class="table table-hover table-striped">
                <tbody>
                  <tr><th id="table-heading" colspan="2">Personal Info</th></tr>
                  <tr>
                    <td>Employee ID : </td>
                    <?php  $empid = $row['ssn'];
                      global $empid;
                    ?>
                    <td><?php echo $empid ?></td>
                  </tr>

                  <tr>
                    <td>Emp Name : </td>
                    <td><?php echo $row['name']; ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Emp Email : </td>
                    <td><?php echo $row['email']; ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Birth date : </td>
                    <td><?php echo $row['bdate']; ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Emp Address : </td>
                    <td><?php echo $row['address']; ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Emp Gender : </td>
                    <td><?php echo $row['sex']; ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Emp Salary : </td>
                    <td><?php echo $row['salary']; ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Emp Position : </td>
                    <td><?php echo $row['position']; ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Blood Group : </td>
                    <td><?php echo $row['bloodgroup']; ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Emp degree : </td>
                    <td><?php echo $row['degree']; ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Emp Deparment : </td>
                      <?php $dept_id = $row['dno']; ?>
                    <td><?php echo $dept_id ?></td>
                    
                    
                  </tr>
                  <tr>
                    <td>Emp Salary : </td>
                    <td><?php echo $row['salary']; ?></td>
                    
                    
                  </tr>
                  <tr >
                    <td colspan="2"><a style="width: 100%;" class="btn btn-primary" href="update-emloyee-self.php?edit=<?php echo $row['id']; ?>">Update Info</a></td>
                    <?php } ?>
                  </tr>
                  
                  

                </tbody>
              </table>

              </div><!-- left -->
              <?php 
                $sql2 = "SELECT * FROM salary WHERE emp_id = '$empid'";
                $result = mysqli_query($cn,$sql2);
                $row2 = mysqli_fetch_array($result);             
                ?>
                <div class="col-md-6">
                  <br><br>
                  <table class="table table-hover table-striped">
                    <tbody>
                      <tr><th id="table-heading" colspan="2">Salary Info</th></tr>
                      <tr>
                        <td>Employee ID : </td>
                        <td><?php echo $row2['emp_id']; ?></td>
                      </tr>

                      <tr>
                        <td>Base salary : </td>
                        <td><?php echo $row2['salary']; ?></td>
                      </tr>
                      <tr>
                        <td>Emp Name : </td>
                        <td><?php echo $row2['name']; ?></td>
                      </tr>
                      <tr>
                        <td>Emp Working day : </td>
                        <td><?php echo $row2['total_days']; ?></td>

                      </tr>
                      <tr>
                        <td>Emp absents : </td>
                        <td><?php echo $row2['absent']; ?></td>

                      </tr>
                       <tr>
                        <td>Working month : </td>
                        <td><?php echo $row2['month']; ?></td>

                      </tr>
                      <tr>
                        <td>Total salary : </td>
                        <td><?php echo $row2['totalsal']; ?></td>

                      </tr>

                      <?php 
                        
                            $sql4 = "SELECT * FROM department WHERE dept_id = '$dept_id'";
                            $result4 = mysqli_query($cn,$sql4);
                            $row3 = mysqli_fetch_array($result4);
                                
                              
                
                            ?>

                            <!-- dept table -->

                            <tr><th id="table-heading" colspan="2">Dept Info</th></tr>
                            <tr>
                              <td>Dept ID : </td>
                              <td><?php echo $row3['dept_id']; ?></td>
                            </tr>

                            <tr>
                              <td>Dept Name : </td>
                              <td><?php echo $row3['dept_name']; ?></td>
                              
                              
                            </tr>
                          
                            <tr>
                              <td>Start department : </td>
                              <td><?php echo $row3['mgr_start_date']; ?></td>
                             
                             
                            </tr>

                            <?php 
                        
                            $sql5 = "SELECT * FROM project WHERE dept_id = '$dept_id'";
                            $result5 = mysqli_query($cn,$sql5);
                            $row4 = mysqli_fetch_array($result5);
                                
                              
                
                            ?>

                            <!-- dept table -->

                            <tr><th id="table-heading" colspan="2">Project Info</th></tr>
                            

                            <tr>
                              <td>Project Id : </td>
                              <td><?php echo $row4['project_id']; ?></td>
                              
                              
                            </tr>
                          
                            <tr>
                              <td>Project Name : </td>
                              <td><?php echo $row4['project_name']; ?></td>
                             
                             
                            </tr>
                            <tr>
                              <td>Project Location : </td>
                              <td><?php echo $row4['project_location']; ?></td>
                             
                             
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
