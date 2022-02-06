<?php
error_reporting(0);
$msg = $errid = $errgender= "";
  include 'connection/db.php';
   include 'inc/session.php';

  if (isset($_POST['update'])) {
      $i = $_POST['id'];
      $notice_title = $_POST['notice_title'];
      $notice_date = $_POST['notice_date'];
      

      //img
      $image =$_FILES['image']['name'];
      $image_size =$_FILES['image']['size'];
      $image_type =$_FILES['image']['type'];
      $image_temp_loc =$_FILES['image']['tmp_name'];
      $image_store = "images/".$image;
      move_uploaded_file($image_temp_loc, $image_store);
    
    
        $sql = "UPDATE notice_tbl SET notice_title = '$notice_title',notice_date = '$notice_date',image ='$image' WHERE id = '$i'";
        mysqli_query($cn,$sql);
        $msg = "Data update success";
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
                  <div class="panel-heading">Update Notice</div>
                  <div class="panel-body">

                    <?php 

                      if (isset($_GET['edit'])) {
                        $i = $_GET['edit'];

                        $sql2 = "SELECT * FROM notice_tbl WHERE id = '$i'";
                        $run2 = mysqli_query($cn,$sql2);
                        $row = mysqli_fetch_array($run2);

                  ?>

                    <form action=""  method="post" enctype="multipart/form-data">
                    <div class="row">
                      <p id="succesmsg">
                    <?php if (isset($msg)) {
                      echo $msg;
                      } 
                   ?>
                  <div class="col-md-6">
                     <?php echo $errid; ?>
                     <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
                      <input type="text" name="notice_title" value="<?php echo $row['notice_title']; ?>"  class="form-control" id="inputEmail4" >
                    
                    
                      <input type="text" name="notice_date" value="<?php echo $row['notice_date']; ?>" class="form-control" id="inputEmail4" >
                    
                      <input type="file" name="image" value="<?php echo $row['image']; ?>" class="form-control" id="inputEmail4" >
                    
                    

                    
                  
                  </div><!-- left input -->
                  <input type="submit"  name="update" id="login-btn" class="form-control" value="Update">
                  
                  </p>
                  
                  
                </div>
                </form>
              <?php } ?>
              </div><!-- close panel -->
                  </div>
              </div>
              </div>     
            </div>
          </div>
      </div>
    </section>

    <?php include 'inc/footer.php' ?>