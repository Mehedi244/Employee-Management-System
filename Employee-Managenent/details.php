<?php
error_reporting(0);
$msg = $errid = $errgender= "";
$empid = "";
$dept_id = "";
  include 'connection/db.php';
  include 'inc/session.php';

?>

<style type="text/css">
  .imgbox img{
    width: 130px;
    float: right;
  }
</style>
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
            <div class="from-1Details">
               <div id="printableArea" class="panel panel-primary">
                  <div class="panel-heading">Employee Details</div>
                  <div  class="panel-body">
                    <?php 
                      if (isset($_GET['details'])) {
                        $i = $_GET['details'];

                        $sql2 = "SELECT * FROM employee WHERE ssn = '$i'";
                        $run2 = mysqli_query($cn,$sql2);
                        $row = mysqli_fetch_array($run2);
                        ?>
                        <div class="row">
                          <div class="col-md-6">
                            <label>Employee Name : </label> <label><?php echo $row['name']; ?></label><br>
                            <label>Address :  </label> <label><?php echo $row['address']; ?></label><br>
                            
                            <label>Email : </label> <label><?php echo $row['email']; ?></label><br>
                          </div>
                        <div class="col-md-6">
                          <div class="imgbox">
                            <img src="images/<?php echo $row['image']; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <br><br>
                          <table class="table table-hover table-striped">
                          <tbody>
                            <tr><th id="table-heading" colspan="2">Personal Info</th></tr>
                            <tr>
                              <td>Employee ID : </td>
                              <?php  $empid = $row['ssn'];?>
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
                              
                              <?php } ?>
                            </tr>
                            
                            

                          </tbody>
                        </table>

                        </div>
                        

                        <?php 
                          

                            $sql3 = "SELECT * FROM salary WHERE emp_id = '$empid'";
                            $result = mysqli_query($cn,$sql3);
                            $row1 = mysqli_fetch_array($result);
                                
                              
                
                          ?>

                        <div class="col-md-6">
                          <br><br>
                          <table class="table table-hover table-striped">
                          <tbody>
                            <tr><th id="table-heading" colspan="2">Salary Info</th></tr>
                            <tr>
                              <td>Employee ID : </td>
                              <td><?php echo $row1['emp_id']; ?></td>
                            </tr>

                            <tr>
                              <td>Base salary : </td>
                              <td><?php echo $row1['salary']; ?></td>
                              
                              
                            </tr>
                          
                            <tr>
                              <td>Emp Name : </td>
                              <td><?php echo $row1['name']; ?></td>
                             
                             
                            </tr>
                            <tr>
                              <td>Emp Working day : </td>
                              <td><?php echo $row1['total_days']; ?></td>

                            </tr>
                            <tr>
                              <td>Emp absents : </td>
                              <td><?php echo $row1['absent']; ?></td>

                            </tr>
                             <tr>
                              <td>Working month : </td>
                              <td><?php echo $row1['month']; ?></td>

                            </tr>
                            <tr>
                              <td>Total salary : </td>
                              <td><?php echo $row1['totalsal']; ?></td>

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

                    <p style="text-align: center;">
                      <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print Info" />
                    </p>
                    
                    
                  </div>
                  </div>
              </div>
              </div>     
            </div>
          </div>
      </div>
    </section>

    <script type="text/javascript">
      function printDiv(divName) {
       var printContents = document.getElementById(divName).innerHTML;
       var originalContents = document.body.innerHTML;

       document.body.innerHTML = printContents;

       window.print();

       document.body.innerHTML = originalContents;
    }
    </script>

    <?php include 'inc/footer.php' ?>