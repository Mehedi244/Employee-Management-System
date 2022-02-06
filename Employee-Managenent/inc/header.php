<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link rel="shortcut icon" href="images/" />

    <style type="text/css">
       h1 {
        color: white;
        text-align: left;
        margin-top: 0px;
        }
    </style>
    <title>Employee Management</title>
  </head>
  <body>
    
    <section id="menu">
     <div class="col-md-12">
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Employee Management</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              <a class="nav-link" href="addemp.php">Add Employee</a>
              <a class="nav-link" href="view-employee.php">View Employee</a>
              <div class="dropdown">
                <button class="btn btn-menu  dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                  Add_dept
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                  <li><a class="dropdown-item active" href="add-department.php">Add_Department</a></li>
                  <li><a class="dropdown-item" href="view-department.php">Managemnt Department</a></li>
                </ul>
              </div>
              <div class="dropdown">
                <button class="btn btn-menu  dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                  Add_Project
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                  <li><a class="dropdown-item active" href="add-project.php">Add_Proejct</a></li>
                  <li><a class="dropdown-item" href="viewProject.php">Managemnt Project</a></li>
                </ul>
              </div>

              <div class="dropdown">
                <button class="btn btn-menu  dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                  Salary
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                  <li><a class="dropdown-item active" href="pay-salary.php">Add Salary</a></li>
                  <li><a class="nav-link" href="view-salary-details.php"> Manage Salary</a></li>
                </ul>
              </div>
              <div class="dropdown">
                <button class="btn btn-menu  dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                  Notice
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                  <li><a class="dropdown-item active" href="add-notice.php">Add Notice</a></li>
                  <li><a class="nav-link" href="view-notice.php"> Manage Notice</a></li>
                </ul>
              </div>
              
            </div>
          </div>
        </div>
      </nav>
     </div>
    </section>