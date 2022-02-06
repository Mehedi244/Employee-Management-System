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
                  <div class="panel-heading">Employee Notice</div>
                  <div  class="panel-body">
                    <?php 
                      if (isset($_GET['details'])) {
                        $i = $_GET['details'];

                        $sql2 = "SELECT * FROM notice_tbl WHERE id = '$i'";
                        $run2 = mysqli_query($cn,$sql2);
                        $row1 = mysqli_fetch_array($run2);
                        ?>
                        <div class="row">

                        <div class="col-md-12">
                          <br><br>
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
                            <?php } ?>
                            </tr>

                          </tbody>
                        </table>
                        <p style="text-align: center;">
                          <a  class="btn btn-primary" href="images/<?php echo $row1['image']; ?>">View Full-Screen</a>
                        </p>
                        

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

    <?php include 'inc/footer.php' ?>