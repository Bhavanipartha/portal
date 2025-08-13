<?php
require 'config/conn.php';
session_start();
if (!empty($_SESSION['uname'])){
  $Username= $_SESSION['uname'];
}else{
  header("Location: ./index.html");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Project Allocation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/genAI-logo.png" rel="icon">
  <link href="./assets/img/genAI-logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="./assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="../img/logo.png" rel="icon">
    <!-- Custom fonts for this template-->
    <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
<script src ="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href=
"//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>

  
  <style>
    
    .header {
      color:grey;
  transition: all 0.5s;
  z-index: 997;
  height: 60px;
  box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
  background-color: #FFFFF7;

  padding-left: 20px;
  /* Toggle Sidebar Button */
  /* Search Bar */
}

input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #999;
  padding: 8px 16px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
  background: #d9534f;
}
.drop-container {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 60px;
  padding: 2px;
  border-radius: 10px;
  border: 2px solid #d6d6d6;
  color: #444;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
}

  /* styles.css */
.separator {
  border: none;
  border-top: 1px solid white; /* Adjust color and thickness as needed */
  margin: 10px 0; /* Add margin for spacing */
}

.separator-text {
  display: block;
  text-align: center; /* Align text in the center */
  margin-top: -10px; /* Adjust spacing as needed */
  background-color: white; /* Background color for the text */
  width: fit-content; /* Adjust width as needed */
  margin-left: auto;
  margin-right: auto;
  padding: 0 10px; /* Adjust padding as needed */

  background-color:#ADD8E6  ;
  
}

  </style>

</head>

<body>

  <div class="fixed-top">
    <div class="container-fluid  navbar-cg p-2" style="margin-bottom:-15px; background-image: url('./assets/img/240_F_303562524_QfNWIptUFfYdGbR0AdcA0wJ0pZuJfW2w.jpg');  
  background-color: #5C00A3;
  height: 500px; 
  background-position: bottom; 
  background-repeat: no-repeat;
  background-size: cover; color:white; height:100px; position:sticky;">
      <center>
        <h4 style="margin-top:15px;">GenAI Healthcare</h4>       
      </center>
    </div>
  
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed d-flex align-items-center" style="position: sticky;">


      <div class="d-flex align-items-center justify-content-between">
        <a href="./dashboard.php" class="logo d-flex align-items-center">
               <img src="./assets/img/genAI-logo.png" alt="" width="55" height="55">
         
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->


      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="assets/img/img_avatar.png" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php
                                                                    echo $_SESSION['uname'];
                                                                    ?>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php
                    echo $_SESSION['uname'];
                    ?></h6>
                <span><?php echo $_SESSION['role']; ?></span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="./login/logout.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>

            </ul>
            <!-- End Profile Dropdown Items -->
          </li>
          <!-- End Profile Nav -->
        </ul>
      </nav>
      <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->
  </div>

 <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" style="margin-top: 85px; ">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="./dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php
      if ($_SESSION['role'] == 'Admin') {
      ?>




        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#students-nav">
            <i class=" bi bi-person-fill"></i> <span>User</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="addUser.php">
                <i class="bi bi-circle"></i><span>Add User</span>
              </a>
            </li>
            <li>
              <a href="manageUser.php">
                <i class="bi bi-circle"></i><span>Manage User</span>
              </a>
            </li>


          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="updateSalary.php">
            <i class="bi bi-upload"></i>
            <span>Update Salary</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="paySlip.php">
            <i class="bi bi-cash"></i>
            <span>Payslip</span></a>
        </li>


        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-receipt"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="projectReport.php" class="active">
                <i class="bi bi-circle"></i><span>Project Report</span>
              </a>
              <a href="attendanceReport.php">
                <i class="bi bi-circle"></i><span>Attendance Report</span>
              </a>
              <a href="timesheetReport.php">
                <i class="bi bi-circle"></i><span>Timesheet Report</span>
              </a>
              <a href="salaryReport.php">
                <i class="bi bi-circle"></i><span>Salary Report</span>
              </a>

            </li>
          </ul>
        </li>
        <?php
     }else if ($_SESSION['role'] == 'S-admin') {
      ?>
      
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#students-nav">
            <i class=" bi bi-person-fill"></i> <span>User</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="addUser.php">
                <i class="bi bi-circle"></i><span>Add User</span>
              </a>
            </li>
            <li>
              <a href="manageUser.php">
                <i class="bi bi-circle"></i><span>Manage User</span>
              </a>
            </li>


          </ul>
        </li>
         <li class="nav-item">
          <a class="nav-link collapsed" href="addQuote.php">
            <i class="bi bi-plus-circle"></i>
            <span>Add Quote</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="updateSalary.php">
            <i class="bi bi-upload"></i>
            <span>Update Salary</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="paySlip.php">
            <i class="bi bi-cash"></i>
            <span>Payslip</span></a>
        </li>


        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-receipt"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          
          
         
          <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="projectReport.php" class="active">
                <i class="bi bi-circle"></i><span>Project Report</span>
              </a>
              <a href="attendanceReport.php">
                <i class="bi bi-circle"></i><span>Attendance Report</span>
              </a>
               <a href="timesheetReport.php">
                <i class="bi bi-circle"></i><span>Timesheet Report</span>
              </a>
              
              <a href="salaryReport.php">
                <i class="bi bi-circle"></i><span>Salary Report</span>
              </a>

            </li>
          </ul>
        </li>
    <hr class="separator"><div class="color" style="background-color:#ADD8E6;color:#333d97">
<span class="separator-text"><b>My Activities</b></span>
</div>
<hr class="separator">
         <li class="nav-item">
          <a class="nav-link collapsed" href="addProfile.php">
            <i class="bi bi-person-lines-fill"></i>
            <span>Profile info</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="myProject.php">
            <i class="bi bi-display"></i>
            <span>My Projects</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="getPayslip.php">
            <i class="bi bi-cash"></i>
            <span>My Payslip</span></a>
        </li>
<?php $sql7 = "SELECT * FROM employee_details WHERE email='" . $_SESSION['uname'] . "'";
                                    $result7 = mysqli_query($connect, $sql7);
            
                                    if ($result7) {
                                      while ($row7 = mysqli_fetch_array($result7)) {
                                        $name = $row7['name'];
                                      
                                      }
                                    }
                  $sql= "SELECT * FROM employee_details WHERE name='$name'";
                                    $result = mysqli_query($connect, $sql);
            
                                    if ($result) {
                                      while ($row = mysqli_fetch_array($result)) {
                                        $head = $row['supervisor'];
                                      
                                      }
                                    }        
                                     $sql3= "SELECT * FROM employee_details WHERE supervisor='$head' AND role='Super-admin'";
                                    $result3 = mysqli_query($connect, $sql3);
            
                                    if ($result3) {
                                      while ($row3 = mysqli_fetch_array($result3)) {
                                    echo $row3['name'];
                                      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="timesheet.php">
            <i class="bi bi-clock-history"></i>
            <span>My Timesheet</span></a>
        </li>
        <?php }} ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#leave-nav" data-bs-toggle="collapse" href="#students-nav">
            <i class=" bi bi-calendar3"></i> <span>Leave details</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="leave-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="requestLeave.php">
                <i class="bi bi-circle"></i><span>Request leave</span>
              </a>
            </li>
            <li>
              <a href="manageLeave.php">
                <i class="bi bi-circle"></i><span>My Requests</span>
              </a>
            </li>


          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#subjects-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-display"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="subjects-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="projectAllocation.php">
                <i class="bi bi-circle"></i><span>Project Allocation</span>
              </a>
            </li>
            <li>
              <a href="manageAllocation.php">
                <i class="bi bi-circle"></i><span>Manage Allocation</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#approvals-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-check2-square"></i><span>Approvals</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="approvals-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="leaveRequest.php">
                <i class="bi bi-circle"></i><span>Employee leave requests</span>
              </a>
            </li>
            <li>
              <a href="approveTimesheet.php">
                <i class="bi bi-circle"></i> <span> Employee Timesheet</span></a>

            </li>
          </ul>
      <?php
      } else if ($_SESSION['role'] == 'Super-admin') {

      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="manageUser1.php">
            <i class="bi bi-person-fill"></i>
            <span>Employee details</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="leaveRequest.php">
            <i class=" bi bi-calendar3"></i>
            <span>Leave Requests</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-bs-target="#subjects-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-display"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="subjects-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="projectAllocation1.php" class="active">
                <i class="bi bi-circle"></i><span>Project Allocation</span>
              </a>
            </li>
            <li>
              <a href="manageAllocation1.php">
                <i class="bi bi-circle"></i><span>Manage Allocation</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-receipt"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="projectReport.php">
                <i class="bi bi-circle"></i><span>Project Report</span>
              </a>
              <a href="attendanceReport.php">
                <i class="bi bi-circle"></i><span>Attendance Report</span>
              </a>
               <a href="timesheetReport.php">
                <i class="bi bi-circle"></i><span>Timesheet Report</span>
              </a>
             

            </li>
          </ul>
        </li>

      <?php
      } else if ($_SESSION['role'] == 'S-Employee') {

      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="addProfile.php">
            <i class="bi bi-person-lines-fill"></i>
            <span>Profile info</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="myProject.php">
            <i class="bi bi-display"></i>
            <span>My Projects</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="getPayslip.php">
            <i class="bi bi-cash"></i>
            <span>Payslip</span></a>
        </li>

      <?php $sql7 = "SELECT * FROM employee_details WHERE email='" . $_SESSION['uname'] . "'";
                                    $result7 = mysqli_query($connect, $sql7);
            
                                    if ($result7) {
                                      while ($row7 = mysqli_fetch_array($result7)) {
                                        $name = $row7['name'];
                                      
                                      }
                                    }
                  $sql= "SELECT * FROM employee_details WHERE name='$name'";
                                    $result = mysqli_query($connect, $sql);
            
                                    if ($result) {
                                      while ($row = mysqli_fetch_array($result)) {
                                        $head = $row['supervisor'];
                                      
                                      }
                                    }        
                                     $sql3= "SELECT * FROM employee_details WHERE supervisor='$head' AND role='Super-admin'";
                                    $result3 = mysqli_query($connect, $sql3);
            
                                    if ($result3) {
                                      while ($row3 = mysqli_fetch_array($result3)) {
                                    echo $row3['name'];
                                      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="timesheet.php">
            <i class="bi bi-clock-history"></i>
            <span>My Timesheet</span></a>
        </li>
        <?php
                                      }} ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#leave-nav" data-bs-toggle="collapse" href="#students-nav">
            <i class=" bi bi-calendar3"></i> <span>Leave details</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="leave-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="requestLeave.php">
                <i class="bi bi-circle"></i><span>Request leave</span>
              </a>
            </li>
            <li>
              <a href="manageLeave.php">
                <i class="bi bi-circle"></i><span>My Requests</span>
              </a>
            </li>


          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#subjects-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-display"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="subjects-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="projectAllocation.php">
                <i class="bi bi-circle"></i><span>Project Allocation</span>
              </a>
            </li>
            <li>
              <a href="manageAllocation.php">
                <i class="bi bi-circle"></i><span>Manage Allocation</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#approvals-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-check2-square"></i><span>Approvals</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="approvals-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="leaveRequest.php">
                <i class="bi bi-circle"></i><span>Employee leave requests</span>
              </a>
            </li>
            <li>
              <a href="approveTimesheet.php">
                <i class="bi bi-circle"></i> <span> Employee Timesheet</span></a>

            </li>
          </ul>
        <?php
      }
      if ($_SESSION['role'] == 'Employee') {
        ?>
          <!-- End Forms Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="addProfile.php">
            <i class="bi bi-person-lines-fill"></i>
            <span>Profile info</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="myProject.php">
            <i class="bi bi-display"></i>
            <span>Projects</span></a>
        </li>


        <li class="nav-item">
          <a class="nav-link collapsed" href="getPayslip.php">
            <i class="bi bi-cash"></i>
            <span>Payslip</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="timesheet.php">
            <i class="bi bi-clock-history"></i>
            <span>Timesheet</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#leave-nav" data-bs-toggle="collapse" href="#students-nav">
            <i class=" bi bi-calendar3"></i> <span>Leave details</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="leave-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="requestLeave.php">
                <i class="bi bi-circle"></i><span>Request leave</span>
              </a>
            </li>

            <li>
              <a href="manageLeave.php">
                <i class="bi bi-circle"></i><span>My Requests</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- End Tables Nav -->
    </ul>
  <?php } ?>
  </aside><!-- End Sidebar-->


<main id="main" class="main">
  
    <div class="">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 mt-3" style="margin-left: 10px;">Subject Allocation</h1>                        
                    </div><br>
                    <div class="container-fluid">
                    <div class="row justify-content-center">
<div class="card">
<div class="container p-4" style="overflow:auto">
                
                   
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4" style="color: '#333d97'; font-family:'Times New Roman', Times, serif;"><b>Allocate Project</b></h5>
                  </div>  
                  <br><br>
                    <form id="delayedForm" method="post" action="allocateProject1.php" >


                    <div id="container">
  <section id="mainsection">
  <div class='col-md-12'>
                        <div class="row">
                                    <div class="col-lg-12 col-12">
         <table class="table table-bordered table-hover" id="emptbl">
            <thead>
               <tr >
                 
                  <th class="text-center" style="width:100px;">
                     Project<span class="str"><font color="red">*</font></span>
                  </th>
                  <th class="text-center">
                     Start Date<span class="str"><font color="red">*</font></span>
                  </th>
                  <th class="text-center">
                  End Date<span class="str"><font color="red">*</font></span>
                  </th>
                  <th class="text-center">
                  Senior Employee<span class="str"><font color="red">*</font></span>
                  </th>
                 
               </tr>
            </thead>
            
            <tbody>
               <tr id='addrQual0'>
                  
                  <td id="col0" ><div class="col-md-12 col-lg-3 col-sm-12 col-xl-3">
  <div class="form-group">
    <label for="formGroupExampleInput" style="color:black; width:200px;">Project</label><br>
    <div class="col-md-3">
            
              <input type="" name="prj_name[]" id="prj_name" class="form-control" placeholder="Name of the Project" required="" style="width:200px;" autocomplete="off">
            </div>
          </div>
                  </td>
                   <td id="col1">
  <div class="col-md-12 col-lg-2 col-sm-12 col-xl-2">
    <div class="form-group">
      <label for="date1" style="color:black; width:200px">Choose Start Date</label><br>
      <div class="col-md-3">
        <input type="date" class="form-control" id="date1" name="date1[]" style="width:200px;" required>
      </div>
    </div>
  </div>
</td>

<td id="col2">
  <div class="col-md-12 col-lg-2 col-sm-12 col-xl-2">
    <div class="form-group">
      <label for="date2" style="color:black; width:200px">Choose End Date</label><br>
      <div class="col-md-3">
        <input type="date" class="form-control" id="date2" name="date2[]" style="width:200px;" required>
      </div>
    </div>
  </div>
</td>
                <td id="col3"> 
                <div class="col-md-12 col-lg-3 col-sm-12 col-xl-3">
  <div class="form-group">
    <label for="exampleFormControlTextarea1" style="color:black; width:200px">Choose Employee</label><br>    
    <?php
  
    $sql7 = "SELECT * FROM employee_details WHERE email='" . $_SESSION['uname'] . "'";
                                    $result7 = mysqli_query($connect, $sql7);
            
                                    if ($result7) {
                                      while ($row7 = mysqli_fetch_array($result7)) {
                                        $name = $row7['name'];
                                      
                                      }
                                    }
                                      $sql2 = "SELECT name FROM employee_details WHERE status = 1 AND role ='S-Employee' AND name != '-' AND supervisor ='$name'";
    $sql = "SELECT name FROM employee_details WHERE status = 1 AND role ='S-Admin' AND name != '-'";
    $sql1 = "(" . $sql . ") UNION (" . $sql2 . ")";
    
    $result1= mysqli_query($connect, $sql1);
    
if ($result1 ) {
    
    echo '<select name="name[]"  class="form-select" style="width:200px" required>';
    echo '<option value=""> ---- </option>';
   

    $num_results = mysqli_num_rows($result1);
    for ($i=0;$i<$num_results;$i++) {
        $row1 = mysqli_fetch_array($result1);
        $name = $row1['name'];
        echo '<option value="' .$name. '">' .$name. '</option>';
    }

    echo '</select>';
    echo '</label>';
}

mysqli_close($connect);
    ?>

    
  </div></div>
		        </td>
                  
                  
               
                 
               
               </tr>
                   
            </tbody>
            
         
         </table>
      

         <button id="add" type="button"
                        class="btn btn-primary pull-left" style="color:white; background-color:#5A5A5A; " onclick="addRows()" onclick="deleteRows()">
                        <i class="fa fa-plus" style="color:white; "></i>
                     Add more</button>
      <button id="add" type="button"
                        class="btn btn-danger pull-right" style="color:white; margin-left:800px;" onclick="deleteRows()">
                        <i class="bi bi-trash" style="color: white;"></i>
                      Delete</button>

          
               <div class="clearfix"></div>
               
      </div>   

      <div class="text-center">
                               
        
 
                    </div></div></div></div><br><br><br>
  
  
  <center><button type="submit" class="btn btn-primary"  style ="background-color: #333d97;" id="success" name="success">Save Record</button>
  
  <button type="reset" class="btn btn-secondary" style="margin-left:10px;"  >Clear Entry</button></center> 

  <script type="text/javascript">
function addRows(){ 
	var table = document.getElementById('emptbl');
	var rowCount = table.rows.length;
	var cellCount = table.rows[0].cells.length; 
	var row = table.insertRow(rowCount);
	for(var i =0; i <= cellCount; i++){
		var cell = 'cell'+i;
		cell = row.insertCell(i);
		var copycel = document.getElementById('col'+i).innerHTML;
		cell.innerHTML=copycel;
		if(i == 3){ 
			var radioinput = document.getElementById('col4').getElementsByTagName('input'); 
			for(var j = 0; j <= radioinput.length; j++) { 
				if(radioinput[j].type == 'radio') { 
					var rownum = rowCount;
					radioinput[j].name = 'gender['+rownum+']';
				}
			}
		}
	}
}
function deleteRows(){
	var table = document.getElementById('emptbl');
	var rowCount = table.rows.length;
	if(rowCount > '2'){
		var row = table.deleteRow(rowCount-1);
		rowCount--;
	}
	else{
		alert('There should be atleast one row');
	}
}
</script>

<script>
document.getElementById('date1').addEventListener('change', function () {
    let startDate = new Date(this.value);
    if (!isNaN(startDate)) {
        // Set min to one day after start date
        let minDate = new Date(startDate);
        minDate.setDate(minDate.getDate() + 1);
        document.getElementById('date2').setAttribute('min', minDate.toISOString().split('T')[0]);
    }
});

document.getElementById('date2').addEventListener('change', function () {
    let startDate = new Date(document.getElementById('date1').value);
    let endDate = new Date(this.value);
    if (!isNaN(startDate) && endDate <= startDate) {
        alert("End Date must be later than Start Date!");
        this.value = "";
    }
});
</script>
  
<script>

   
function showSuccessAlert() {
    Swal.fire(
        'Success',
        'Project Allocated!',
        'success'
    )}

  </script>


</form>
                </div>
            </div></div>
           
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            </main><!-- End #main -->

   <!-- Footer -->
   <footer style="    text-align: center;  
   padding: 10px;
    position: fixed;
   font-size:small;
    bottom: 0;
    left: 0;
    right: 0;" class="text-center text-lg-start bg-light text-muted">
      <!-- Copyright -->
      <div class="copyright">
        &copy; Copyright <strong><span>GenAI</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://www.genaihealth.care/">GenAI Healthcare</a>
      </div>
      <!-- Copyright -->
    </footer>



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="./assets/js/ajax.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./assets/js/demo/chart-area-demo.js"></script>
    <script src="./assets/js/demo/chart-pie-demo.js"></script>
    <!-- Page level plugins -->
    <script src="./assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="./assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./assets/js/demo/datatables-demo.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assets/js/ajax.js"></script>

</body>

</html>