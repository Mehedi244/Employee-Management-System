<?php

error_reporting(0);
$emp_id=$name=$salary = $medical= $total_days=$absent= $month=$dailybase= $totalsal=$msg=$house_rent=$traveling="";
$errid = $errgender=$message1= "";
$messageexit="";

include 'connection/db.php';
 include 'inc/session.php';

  if (isset($_POST['calculate'])) {
    
      $i = $_POST['emp_id'];
      global $i;

      $sql2 = "SELECT * FROM employee WHERE ssn = '$i'";
      $run2 = mysqli_query($cn,$sql2);
      $row = mysqli_fetch_array($run2);
      $salary = $row['salary'];
      $name = $row['name'];
      $emp_id = $row['ssn'];
      $position = $row['position'];

      if ($salary>=30000 && $salary<=50000) {
        $medical = 1500;

        $house_rent = (60/100)*(int)$salary;
        $traveling = (20/100)*(int)$salary;

      }elseif ($salary>=50000 && $salary<=80000) {
        $medical = 2000;
        $house_rent = (70/100)*(int)$salary;
        $traveling = (25/100)*(int)$salary;
      }elseif ($salary>=30000 && $salary<=40000) {
        $medical = 1000;
        $house_rent = (50/100)*(int)$salary;
        $traveling = (15/100)*(int)$salary;
      }elseif ($salary>=10000 && $salary<=30000) {
        $medical = 800;
        $house_rent = (40/100)*(int)$salary;
        $traveling = (10/100)*(int)$salary;
      }
      else{
        $medical = 700;
        $house_rent = (30/100)*(int)$salary;
        $traveling = (5/100)*(int)$salary;
      }



      $total_days = $_POST['total_days'];
      $absent = $_POST['absent'];
      $month = $_POST['month'];


      $house_rentDivide = (int)$house_rent / 30;

      $absentSubH = 0;

      for ($c=1; $c <=$absent; $c++) { 
         $absentSubH += $house_rentDivide;
      }
      $house_rent = $house_rent-$absentSubH;
      
      


      $dailybase = (int)$salary/30;
      $totalsal = ($dailybase*(int)$total_days)+(int)$medical+(int)$house_rent+(int)$traveling;

      $sql3 = "SELECT * FROM salary WHERE emp_id = '$i'";
      $run3 = mysqli_query($cn,$sql3);
      $row3 = mysqli_fetch_array($run3);
      $emailid = $row3['emp_id'];

       if (empty($_POST['emp_id'])|| empty($_POST['month']) || empty($_POST['total_days']) || empty($_POST['month'])) {
          $name =" ";
          $salary =" ";
          $emp_id = "";
          $position ="";
          $total_days ="";
          $absent ="";
          $month = "";
          $medical = "";
          $house_rent="";
          $traveling = "";
          $totalsal = "";

          global $name;
          global $salary;
          global $emp_id ; 
          global $position ;
          global $total_days;
          global $absent ;
          global $month ;
          global $medical; 
          global $house_rent;
          global $traveling ;
          global $totalsal;
        
        $errid = $errgender = "<span style ='color:red;text-decoration:underline;font-size:10px;'>*Fild not be Empty</span>";
        
      }elseif ($i==$emailid) {
        $name =" ";
          $salary =" ";
          $emp_id = "";
          $position ="";
          $total_days ="";
          $absent ="";
          $month = "";
          $medical = "";
          $house_rent="";
          $traveling = "";
          $totalsal = "";

          global $name;
          global $salary;
          global $emp_id ; 
          global $position ;
          global $total_days;
          global $absent ;
          global $month ;
          global $medical; 
          global $house_rent;
          global $traveling ;
          global $totalsal;
        $messageexit = "<div class='alert alert-danger'><strong>Error!Emp_id Exist</strong></div>";
      }
      elseif (($_POST['total_days'])>30 || ($_POST['total_days'])<10 || (int)$absent+(int)$total_days>30 || (int)$absent+(int)$total_days<0) {
        $message1 = "<div class='alert alert-danger'><strong>Error!Invalid</strong></div>";
        $name =" ";
          $salary =" ";
          $emp_id = "";
          $position ="";
          $total_days ="";
          $absent ="";
          $month = "";
          $medical = "";
          $house_rent="";
          $traveling = "";
          $totalsal = "";

          global $name;
          global $salary;
          global $emp_id ; 
          global $position ;
          global $total_days;
          global $absent ;
          global $month ;
          global $medical; 
          global $house_rent;
          global $traveling ;
          global $totalsal;
      }
      
      else{

        global $name;
         $sql1 = "INSERT INTO salary(emp_id,name,salary,medical,total_days,absent,month,dailybase,totalsal,house_rent,traveling) value('$emp_id','$name','$salary','$medical','$total_days','$absent','$month','$dailybase','$totalsal','$house_rent','$traveling')";
          mysqli_query($cn,$sql1);

        $msg = "Data inserted success";
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
                  <div class="panel-heading">Salary</div>
                  <div class="panel-body">
                    <p id="succesmsg">
                              <?php if (isset($msg)) {
                                echo $msg;
                              } 
                              ?>
                              <?php if (isset($message1)) {
                                echo $message1;
                                
                              } 
                              ?>
                              <?php if (isset($messageexit)) {
                                echo $messageexit;
                                
                              } 
                              ?>
                      </p>
                    
                      <div class="row">
                        <div class="col-md-6">

                          <form action="pay-salary.php"  method="post" >
                           <select name="emp_id" id="inputEmail4" class="form-control" >
                              <option selected>Emp_id</option>
                              <?php 
                                $sql  = "SELECT * from employee";

                                $result = mysqli_query($cn, $sql);

                                while ($row = mysqli_fetch_array($result)) {
                              ?>
                                
                                <option value="<?php echo $row['ssn']; ?>"><?php echo $row['ssn']; ?></option>
                                <?php } ?>
                          </select>
                            
                            <?php echo $errid; ?>
                            <input type="text" name="total_days" class="form-control" id="inputEmail4" placeholder="Total Days....">
                            <input type="text" name="absent" class="form-control" id="inputEmail4" placeholder="Absent....">
                            <?php echo $errid; ?>
                            <input type="text" name="month" class="form-control" id="inputEmail4" placeholder="Date">
                            <input type="submit"  name="calculate"  class="form-control btn btn-primary" value="Calculate && Save">
                       
                        </div><!-- left input -->


                        <div id="printableArea" class="col-md-6">
                          <form action="pay-salary.php"  method="post" >
                            <table class="table table-hover">
                              <tbody>

                                <tr>
                                  <td>Employee Name : </td>
                                  <td><?php echo $name ?></td>
                                </tr>

                                <tr>
                                  <td>Emp Id : </td>
                                  <td><?php echo $emp_id ?></td>
                                  
                                </tr>
                                <tr>
                                  <td>Position : </td>
                                  <td><?php echo $position ?></td>
                                </tr>
                                <tr>
                                  <td>Worked days : </td>
                                  <td><?php echo $total_days ?></td>
                                </tr>

                                <tr>
                                  <td>Working Month : </td>
                                  <td><?php echo $month ?></td>
                                </tr>
                                <tr>
                                  <td>Absent : </td>
                                  <td><?php echo $absent ?></td>
                                </tr>
                                <tr>
                                  <td>Base Salary : </td>
                                  <td><?php echo $salary ?></td>
                                </tr>
                                <tr>
                                  <td>Medical : </td>
                                  <td><?php echo "+". $medical; ?></td>
                                </tr>
                                <tr>
                                  <td>House Rent : </td>
                                  <td><?php echo "+". $house_rent; ?></td>
                                </tr>
                                <tr>
                                  <td>traveling : </td>
                                  <td><?php echo "+". $traveling; ?></td>
                                </tr>
                                <tr style="background: gray;">
                                  <td> <span style="font-weight: bold;">Total Salary : </span></td>
                                  <td><span style="font-weight: bold;"><?php echo " = ". $totalsal; ?></span></td>
                                </tr>
                                

                              </tbody>
                            </table>
                            
                            
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                      <div class="col-md-6">
                            
                            
                            <p style="text-align: right;margin-top: 10px;">
                              <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print" />
                            </p>

                        </div>
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
    








    