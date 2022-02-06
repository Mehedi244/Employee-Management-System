<?php
  include 'connection/db.php';
  include 'inc/session.php';
?>
<?php include 'inc/header.php' ?>
<style type="text/css">
  .footer{
    margin-top: 290px;
  }
</style>
    <section id="">
      <div class="container">
        <?php include 'inc/sessionoutbtn.php'; ?>

        <div class="row">
          <div class="col-md-4">
            <div class="box1">
              <a href="addemp.php">Add Employee</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box1">
              <a href="view-employee.php">View Employee</a>
            </div>
          </div>
          <div class="col-md-4">
             <div class="box1">
              <a href="add-department.php">Add Department</a>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="box1">
              <a href="view-department.php">Manage Department</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box1">
              <a href="add-project.php">Add Project</a>
            </div>
          </div>
          <div class="col-md-4">
             <div class="box1">
              <a href="viewProject.php">Manage Project</a>
            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="box1">
              <a href="pay-salary.php">Pay Salary</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box1">
              <a href="view-salary-details.php">Manage Salary</a>
            </div>
          </div>
          <div class="col-md-4">
             <div class="box1">
              <a href="view-notice.php">Add Notice</a>
            </div>

          </div>
        </div>

      </div>
    </section>

<?php include 'inc/footer.php' ?>
    




