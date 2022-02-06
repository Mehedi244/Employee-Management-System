<?php
error_reporting(0);
$msg = $errid = $errgender=$errempid=$errempid1= "";
  include 'connection/db.php';
  include 'inc/session.php';

  if (isset($_POST['save'])) {

      $notice_title = $_POST['notice_title'];
      $notice_date = $_POST['notice_date'];

      // img
      $image =$_FILES['image']['name'];
      $image_size =$_FILES['image']['size'];
      $image_type =$_FILES['image']['type'];
      $image_temp_loc =$_FILES['image']['tmp_name'];
      $image_store = "images/".$image;
      move_uploaded_file($image_temp_loc, $image_store);

    
      
      if (empty($_POST['notice_title']) || empty($_POST['notice_date'])) {
        $errid = $errgender = "<span style ='color:red;text-decoration:underline;font-size:10px;'>*Fild Must not be Empty</span>";
      }
      else{
         $sql1 = "INSERT INTO notice_tbl(notice_title,notice_date,image) value('$notice_title','$notice_date','$image')";
          mysqli_query($cn,$sql1);

         $msg= "<div class='alert alert-success'><strong>Data inserted success</strong></div>";
      }

  } 

?>

<?php include 'inc/header.php' ?>
<style type="text/css">
  .from-1{
    width: 50%;
    margin:0 auto;
  }
</style>

    <section style="margin-bottom: 10px;" id="">
      <div class="container">
        <?php include 'inc/sessionoutbtn.php'; ?>
      </div>
    </section><!-- close settiing area -->

    <section id="body">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="from-1">
               <div class="panel panel-primary">
                  <div class="panel-heading">Add Notice</div>
                  <div class="panel-body">
                    <form action="add-notice.php"  method="post" enctype="multipart/form-data">
                      <div class="row">
                        <p id="succesmsg">
                            <?php if (isset($msg)) {
                                echo $msg;
                               } 
                               ?>
                          </p>
                          </div><!-- left input -->

                          <div class="col-md-12">
                            
                            
                            <label>Notice Title : </label>
                            <?php echo $errgender; ?>
                             <input type="text" name="notice_title" class="form-control" id="inputEmail4" placeholder="Notice Title">
                             
                             <label>Publish Date : </label>
                             <?php echo $errgender; ?>
                            <input type="date" name="notice_date" class="form-control" id="inputEmail4" placeholder="notice_date">
                            
                            <label>Notice File : </label><?php echo $errgender; ?><br>
                            
                            <input type="file" name="image" class="form-control-file" id="inputEmail4">
                          </div>
                            <input type="submit" name="save" id="login-btn" class="form-control" value="Save">
                              
                  
                        </div>
                      </form>
                    </div>
                  </div>
              </div>
            </div>     
          </div>
        </div>
      </div>
    </section>
    <?php include 'inc/footer.php' ?>