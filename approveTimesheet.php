<?php
session_start();
require('config/conn.php');
?>
<?php
error_reporting(0);
session_start();
if (isset($_GET['t_id'])) {
    $prj1 = $_GET['prj1'];
    $prj2 = $_GET['prj2'];
    $prj3 = $_GET['prj3'];
    $a1 = $_GET['a1'];
    $b1 = $_GET['b1'];
    $c1 = $_GET['c1'];
    $d1 = $_GET['d1'];
    $e1 = $_GET['e1'];
    $a2 = $_GET['a2'];
    $b2 = $_GET['b2'];
    $c2 = $_GET['c2'];
    $d2 = $_GET['d2'];
    $e2 = $_GET['e2'];
    $a3 = $_GET['a3'];
    $b3 = $_GET['b3'];
    $c3 = $_GET['c3'];
    $d3 = $_GET['d3'];
    $e3 = $_GET['e3'];
    $a4 = $_GET['a4'];
    $b4 = $_GET['b4'];
    $c4 = $_GET['c4'];
    $d4 = $_GET['d4'];
    $e4 = $_GET['e4'];
    $tot = $_GET['g4'];
    $id = $_GET['t_id'];

    $sql = "UPDATE timesheet set prj1='$prj1',prj2='$prj2',prj3='$prj3',
  a1='$a1',b1='$b1',c1='$c1', d1='$d1',e1='$e1',a2='$a2',b2='$b2',c2='$c2', d2='$d2',e2='$e2',
  a3='$a3',b3='$b3',c3='$c3', d3='$d3',e3='$e3',a4='$a4',b4='$b4',c4='$c4', d4='$d4',e4='$e4',
  total_hrs='$tot'  where t_id='$id'";
    $insertR = mysqli_query($connect, $sql);

    // Output the SQL query for debugging
    echo "SQL Query: $sql";

    // Execute the query
    $insertR = mysqli_query($connect, $sql);

    if ($insertR) {
        // If successful, display a success message using JavaScript
        echo "<script>alert('Timesheet updated successfully');</script>";
        echo "<script>window.location.href='approveTimesheet.php'</script>";
    } else {
        // If not successful, display an error message using JavaScript
        echo "<script>alert('Error updating record: " . mysqli_error($connect) . "');</script>";
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Approve Timesheet</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/genAI-logo.png" rel="icon">
  <link href="assets/img/genAI-logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/vendor/jquery/jquery.js" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">



  <!-- Custom fonts for this template-->
  <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="./assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="../img/logo.png" rel="icon">
  <!-- Custom fonts for this template-->
  <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
  <script src="https: //unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>

  <style>
    .header {
      color: grey;
      transition: all 0.5s;
      z-index: 997;
      height: 60px;
      box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
      background-color: #FFFFF7;

      padding-left: 20px;
      /* Toggle Sidebar Button */
      /* Search Bar */
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
  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
  </script>


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
              <a href="projectReport.php" >
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
          <a class="nav-link" data-bs-target="#approvals-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-check2-square"></i><span>Approvals</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="approvals-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="leaveRequest.php">
                <i class="bi bi-circle"></i><span>Employee leave requests</span>
              </a>
            </li>
            <li>
              <a href="approveTimesheet.php" class="active">
                <i class="bi bi-circle"></i> <span> Employee Timesheet</span></a>

            </li>
          </ul>
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
        <li class="nav-item">
          <a class="nav-link " data-bs-target="#approvals-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-check2-square"></i><span>Approvals</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="approvals-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="leaveRequest.php">
                <i class="bi bi-circle"></i><span>Employee leave requests</span>
              </a>
            </li>
            <li>
              <a href="approveTimesheet.php" class="active">
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
          <a class="nav-link collapsed" href="timeSheet.php">
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
    <br><br><br><br>

    <div class="pagetitle">


      <h4 class="ml-4 mt-4">Timesheet</h4><br><br>
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="card"><br><br>
<form id="approvalForm" >
  <div class="row">
    <div class="col-md-6">
      <div class="d-grid gap-2 d-md-flex justify-content-md-start m-3">
        <div class="form-check">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="checkbox" name="alli" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            <b>All Employees</b>
          </label>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end m-3">
        <!-- Include hidden inputs for selected employees and usernames -->
       <!-- Include hidden inputs for selected employees and usernames -->
<input type="hidden" name="selectedEmployees" id="selectedEmployees" value="">
<input type="hidden" id="selectedUsernames" name="selectedUsernames" value="">



                      <!-- Your submit buttons -->
                      <button type="button" onclick="submitForm('approve', this.value)" value="Approved!"  class="btn btn-success">Approve</button>
                      <button type="button" onclick="submitForm('reject', this.value)"  value="Rejected!" class="btn btn-danger">Reject</button>
      </div>
    </div>
  </div>
  <div class="container p-4" style="overflow:auto">
    <table class="table table-striped" id="dataTable">
      <thead>
        <tr class="">
          <th>#</th>
          <th>Employee Name</th>
          <th>Weekly Hours</th>
          <th>Duration</th>
          <th>Status</th>
          <th>View</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        date_default_timezone_set('Asia/Kolkata');
        $sql7 = "SELECT * FROM employee_details WHERE email='" . $_SESSION['uname'] . "'";
        $result7 = mysqli_query($connect, $sql7);

        if ($result7) {
          while ($row7 = mysqli_fetch_array($result7)) {
            $name = $row7['name'];
          }
        }
        $sql = "SELECT * FROM timesheet WHERE WEEK(day1) = WEEK(NOW()) - 1 AND status=2 AND  supervisor='$name'";
        $result = $connect->query($sql);

        if ($result !== false) {
          $i = 1;
          while ($row = mysqli_fetch_assoc($result)) {
               $employeeNames[] = $row['name'];
               $employee =$row['name'];
              
            $s = $row['day1'];
            $t = $row['day5'];
            $start = new DateTime($s);
$end = new DateTime($t);

// Format the dates as required
$formattedStart = $start->format('d-m-Y');
$formattedEnd = $end->format('d-m-Y');
            $sqll = "SELECT username FROM users WHERE name = '$employee'";
            $resultl = $connect->query($sqll);

            // Process the result of the second query
            while ($rowl = $resultl->fetch_assoc()) {
              $receiver = $rowl['username'];
              
              
              echo '<tr>
                      <td>
                        <input type="checkbox" value="' . $row['t_id'] . '" id="hr4" name="hr4[]" class="hr4-checkbox" data-employee="' . $row['t_id'] . '">
                        <input type="checkbox" value="' . $rowl['username'] . '" id="user" name="hr4[]" class="user-checkbox" data-employee="' . $row['t_id'] . '" style="display:none;">

                      </td>
                      <td>' . $row['name']  . ' </td>
                      <td>' . $row['total_hrs']  . ' </td>
                      <td>(' . $formattedStart . ' to ' . $formattedEnd . ') </td>                                               
                      <td style="white-space: nowrap;">';

              if ($row['approved_status'] == 0) {
                echo '<span class="badge badge-warning">Pending</span>';
              } else if ($row['approved_status'] == 2) {
                echo '<span class="badge badge-danger">Rejected</span>';
              } else {
                echo '<span class="badge badge-success">Approved</span></td>';
              }

              echo '</td>
                      <td>
                        <form method="GET" action="approveTimesheet.php">
                          <input type="hidden" name="id" value="' . $row['t_id'] . '">
                          <a href="#timesheet">
                            <button class="btn" type="submit" style="border:none;">
                              <span id="boot-icon" class="bi bi-eye-fill" title="View" style="font-size: 1rem; color: rgb(0, 0, 128);"></span>
                            </button>
                          </a>
                        </form>
                      </td>
                      <td>
                        <form method="GET" action="approveTimesheet.php">
                          <input type="hidden" name="eid" value="' . $row['t_id'] . '">
                          <a href="#EditTimesheet">
                            <button class="btn" type="submit" style="border:none;">
                              <span id="boot-icon" class="bi bi-pencil-fill" title="View" style="font-size: 1rem; color: rgb(0, 0, 128);"></span>
                            </button>
                          </a>
                        </form>
                      </td>
                    </tr>';

              $i++;
            }
          }
        }
        ?>
      </tbody>
    </table>
  </div>


        </div>
       
        
           <div id="timesheet" >
          
           <div class="container p-4" style="overflow:auto">
               
                    <?php 
                
                    if(isset($_GET['id'])){
                         
                
                      $id = $_GET['id'];
                      
                      $sql ="SELECT * FROM timesheet where  t_id='$id'";
                      $result = $connect->query($sql);
                      if($result !== false){
                        $row= mysqli_fetch_assoc($result);
                        $a= $row['day1'];
                        $b= $row['day2'];
                        $c= $row['day3'];
                        $d= $row['day4'];
                        $e= $row['day5'];
                       
                        $aa = strtotime($a); 
                        $bb = strtotime($b); 
                        $cc = strtotime($c); 
                        $dd = strtotime($d); 
                        $ee = strtotime($e); 
                       
                        $date1 = date('M d ', $aa);
                        $date2 = date('M d ', $bb);
                        $date3 = date('M d ', $cc);
                        $date4 = date('M d ', $dd);
                        $date5 = date('M d ', $ee);
                       
                        
                        echo '<table class="table table-bordered">
                        <thead class="thead-light">
                        <th>Project</th>
                        <th>Mon('.$date1.')</th>
                        <th>Tue('.$date2.')</th>
                        <th>Wed('.$date3.')</th>
                        <th>Thur('.$date4.')</th>
                        <th>Fri('.$date5.')</th>
                        
                        </thead>
                        <tbody >
                        <tr><td>'.$row['prj1'].'</td>
                        <td>'.$row['a1'].'</td>
                        <td>'.$row['b1'].'</td>
                        <td>'.$row['c1'].'</td>
                        <td>'.$row['d1'].'</td>
                        <td>'.$row['e1'].'</td>
                      </tr>
                        <tr><td>'.$row['prj2'].'</td>
                        <td>'.$row['a2'].'</td>
                        <td>'.$row['b2'].'</td>
                        <td>'.$row['c2'].'</td>
                        <td>'.$row['d2'].'</td>
                        <td>'.$row['e2'].'</td>
                        </tr>
                        <tr><td>'.$row['prj3'].'</td>
                        <td>'.$row['a3'].'</td>
                        <td>'.$row['b3'].'</td>
                        <td>'.$row['c3'].'</td>
                        <td>'.$row['d3'].'</td>
                        <td>'.$row['e3'].'</td>
                        </tr>
                        <tr><td>Hours/ Day</td>
                        <td>'.$row['a4'].'</td>
                        <td>'.$row['b4'].'</td>
                        <td>'.$row['c4'].'</td>
                        <td>'.$row['d4'].'</td>
                        <td>'.$row['e4'].'</td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total hours</td>
                        <td>'.$row['total_hrs'].'</td></tr></tbody></table>';
                        
                      }                   
                    
                     }
                     else{

                $id = '----';
              }

              ?>
              </form></div>
            </div>
       
       
          <div id="editTimesheet">
           
          <div class="container p-4" style="overflow:auto">
            <form action="approveTimesheet.php" method="get">
              <?php

              if (isset($_GET['eid'])) {


                $eid = $_GET['eid'];
                

                $sql = "SELECT * FROM timesheet where  t_id='$eid'";
                $result = $connect->query($sql);
                if ($result !== false) {
                  $row = mysqli_fetch_assoc($result);
                  $a = $row['day1'];
                  $b = $row['day2'];
                  $c = $row['day3'];
                  $d = $row['day4'];
                  $e = $row['day5'];

                  $aa = strtotime($a);
                  $bb = strtotime($b);
                  $cc = strtotime($c);
                  $dd = strtotime($d);
                  $ee = strtotime($e);

                  $date1 = date('M d ', $aa);
                  $date2 = date('M d ', $bb);
                  $date3 = date('M d ', $cc);
                  $date4 = date('M d ', $dd);
                  $date5 = date('M d ', $ee);


                  echo '<table class="table table-hover">
                        <thead class="thead-light">
                        <th>Project</th>
                        <th>Mon(' . $date1 . ')</th>
                        <th>Tue(' . $date2 . ')</th>
                        <th>Wed(' . $date3 . ')</th>
                        <th>Thur(' . $date4 . ')</th>
                        <th>Fri(' . $date5 . ')</th>
                        
                        </thead>
                        <tbody>
                        <tr><td><input type="" name="prj1" class="form-control" value="' . $row['prj1'] . '"></td>
                        <td><input type="" name="a1" id="a1" oninput="cal();" class="form-control" value="' . $row['a1'] . '"></td>
                        <td><input type="" name="b1" id="b1" oninput="cal();" class="form-control" value="' . $row['b1'] . '"></td>
                        <td><input type="" name="c1" id="c1" oninput="cal();" class="form-control" value="' . $row['c1'] . '"></td>
                        <td><input type="" name="d1"  id="d1" oninput="cal();" class="form-control" value="' . $row['d1'] . '"></td>
                        <td><input type="" name="e1" id="e1" oninput="cal();" class="form-control" value="' . $row['e1'] . '"></td>
                      </tr>
                      <tr><td><input type="" name="prj2"  class="form-control" value="' . $row['prj2'] . '"></td>
                      <td><input type="" name="a2" id="a2" oninput="cal();" class="form-control" value="' . $row['a2'] . '"></td>
                      <td><input type="" name="b2" id="b2"  oninput="cal();" class="form-control" value="' . $row['b2'] . '"></td>
                      <td><input type="" name="c2" id="c2" oninput="cal();" class="form-control" value="' . $row['c2'] . '"></td>
                      <td><input type="" name="d2" id="d2" oninput="cal();" class="form-control" value="' . $row['d2'] . '"></td>
                      <td><input type="" name="e2" id="e2" oninput="cal();" class="form-control" value="' . $row['e2'] . '"></td>
                        </tr>
                        <tr><td><input type="" name="prj3" class="form-control" value="' . $row['prj3'] . '"></td>
                        <td><input type="" name="a3" id="a3" oninput="cal();" class="form-control" value="' . $row['a3'] . '"></td>
                        <td><input type="" name="b3" id="b3" oninput="cal();" class="form-control" value="' . $row['b3'] . '"></td>
                        <td><input type="" name="c3" id="c3" oninput="cal();" class="form-control" value="' . $row['c3'] . '"></td>
                        <td><input type="" name="d3" id="d3" oninput="cal();" class="form-control" value="' . $row['d3'] . '"></td>
                        <td><input type="" name="e3" id="e3" oninput="cal();" class="form-control" value="' . $row['e3'] . '"></td>
                        </tr>
                        <tr><td>Hours/ Day</td>
                        <td><input type="" name="a4" id="a4" oninput="cal();" class="form-control" value="' . $row['a4'] . '"></td>
                        <td><input type="" name="b4" id="b4" oninput="cal();" class="form-control" value="' . $row['b4'] . '"></td>
                        <td><input type="" name="c4" id="c4" oninput="cal();" class="form-control" value="' . $row['c4'] . '"></td>
                        <td><input type="" name="d4" id="d4" oninput="cal();" class="form-control" value="' . $row['d4'] . '"></td>
                        <td><input type="" name="e4" id="e4" oninput="cal();" class="form-control" value="' . $row['e4'] . '"></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total hours</td>
                        <td><input type="" name="g4" id="g4" class="form-control" value="' . $row['total_hrs'] . '"></td></tr></tbody></table>
                        <input type="hidden" name="t_id"  class="form-control" value="' . $eid . '"><br><center><button type="submit"  class="btn btn-primary">Update</button></center><br>';
                }
              } else {
                $eid = '----';
              }

              ?>
              </form>
            </div>
     
        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
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
        &copy; Copyright <strong><span>Jaam</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://www.genaihealth.care/">GenAI Healthcare</a>
      </div>
      <!-- Copyright -->
    </footer>






      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script>
    console.log("smtp.js loaded:", typeof Email !== 'undefined');
</script>
<script>
 function submitForm(action, buttonValue) {
        console.log("Button value:", buttonValue);

        // Set the hidden input value to the selected checkboxes
        var selectedEmployees = [];
        var selectedUsernames = [];

        var checkboxes = document.getElementsByClassName('hr4-checkbox');
        var userCheckboxes = document.getElementsByClassName('user-checkbox');

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedEmployees.push(checkboxes[i].value);
                selectedUsernames.push(userCheckboxes[i].value);
            }
        }

        document.getElementById('selectedEmployees').value = selectedEmployees.join(',');

        // Perform the AJAX request
        var formData = new FormData(document.getElementById('approvalForm'));
        formData.append('action', action); // Include the action in the form data

        // Send AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateTimesheet.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Successful response, handle it if needed
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert(response.message);
                    window.location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            } else {
                // Handle the error
                console.error('Error:', xhr.statusText);
                alert('Network error occurred. Please try again.');
            }
        };
        xhr.onerror = function () {
            // Handle the network error
            console.error('Network error occurred');
            alert('Network error occurred. Please try again.');
        };
        xhr.send(formData);

        // Send emails to selected recipients
        console.log("Preparing to send email");
        console.log("users:", selectedUsernames);
        var recipients = selectedUsernames;
        console.log("Recipients:", recipients);

        Email.send({
            Host: "smtp.elasticemail.com",
            Username: "2023.jaam@gmail.com",
            Password: "63D023AEC0185FAA7EF8900FB946765F2E5F",
            To: recipients.join(','), // Join the usernames into a comma-separated string
            From: "2023.jaam@gmail.com",
            Subject: "Timesheet Status",
            Body: 'Timesheet ' +buttonValue
        }).then(function (message) {
            console.log("Email sent:", message);
        }).catch(function (error) {
            console.error("Email error:", error);
            alert('Error sending email. Please try again.');
        });
    }
</script>







<script>
    function toggleAllCheckboxes() {
        var allEmployeesCheckbox = document.getElementById('flexCheckDefault');
        var checkboxes = document.getElementsByName('hr4[]');

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = allEmployeesCheckbox.checked;
        }

        // Trigger the update function to reflect changes
        updateSelectedEmployees();
    }

    function updateSelectedEmployees() {
        var selectedEmployees = [];
        var checkboxes = document.getElementsByName('hr4[]');

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedEmployees.push(checkboxes[i].value);
            }
        }

        // Update the value of the hidden input
        document.getElementById('selectedEmployees').value = selectedEmployees.join(',');
    }

    // Attach the update function to the change event of checkboxes
    var checkboxes = document.getElementsByName('hr4[]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', updateSelectedEmployees);
    }

    // Attach the toggle function to the change event of the "All Employees" checkbox
    var allEmployeesCheckbox = document.getElementById('flexCheckDefault');
    if (allEmployeesCheckbox) {
        allEmployeesCheckbox.addEventListener('change', toggleAllCheckboxes);
    }
</script>
      <script>
        function myFunction() {
          var x = document.getElementById("timesheet");
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        }
      </script>
    
       <script>
    function cal() {
      var h1 = document.getElementById("a1").value;
      var h1 = parseInt(h1, 10);
      var i1 = document.getElementById("b1").value;
      var i1 = parseInt(i1, 10);
      var j1 = document.getElementById("c1").value;
      var j1 = parseInt(j1, 10);
      var k1 = document.getElementById("d1").value;
      var k1 = parseInt(k1, 10);
      var s1 = document.getElementById("e1").value;
      var s1 = parseInt(s1, 10);
      var h2 = document.getElementById("a2").value;
      var h2 = parseInt(h2, 10);
      var i2 = document.getElementById("b2").value;
      var i2 = parseInt(i2, 10);
      var j2 = document.getElementById("c2").value;
      var j2 = parseInt(j2, 10);
      var k2 = document.getElementById("d2").value;
      var k2 = parseInt(k2, 10);
      var s2 = document.getElementById("e2").value;
      var s2 = parseInt(s2, 10);
      var h3 = document.getElementById("a3").value;
      var h3 = parseInt(h3, 10);
      var i3 = document.getElementById("b3").value;
      var i3 = parseInt(i3, 10);
      var j3 = document.getElementById("c3").value;
      var j3 = parseInt(j3, 10);
      var k3 = document.getElementById("d3").value;
      var k3 = parseInt(k3, 10);
      var s3 = document.getElementById("e3").value;
      var s3 = parseInt(s3, 10);
      var h = h1 + h2 +h3;
      var i = i1 + i2 +i3;
      var j = j1 + j2 +j3;
      var k = k1 + k2 +k3;
      var s = s1 + s2 +s3;
      document.getElementById("a4").value = h;
      document.getElementById("b4").value = i;
      document.getElementById("c4").value = j;
      document.getElementById("d4").value = k;
      document.getElementById("e4").value = s;
      var h = document.getElementById("a4").value;
      var h = parseInt(h, 10);
      var i = document.getElementById("b4").value;
      var i = parseInt(i, 10);
      var j = document.getElementById("c4").value;
      var j = parseInt(j, 10);
      var k = document.getElementById("d4").value;
      var k = parseInt(k, 10);
      var s = document.getElementById("e4").value;
      var s = parseInt(s, 10);
      var b = h + i + j + k + s;
      document.getElementById("g4").value = b;
    }
  </script>
  <script>
  // Add event listener to hr4 checkboxes
  document.addEventListener('DOMContentLoaded', function() {
    var hr4Checkboxes = document.querySelectorAll('.hr4-checkbox');

    hr4Checkboxes.forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
        // Find the corresponding user checkbox
        var userCheckbox = document.querySelector('.user-checkbox[data-employee="' + checkbox.dataset.employee + '"]');

        // Debugging statements
        console.log('hr4 checkbox value:', checkbox.value);
        console.log('user checkbox value:', userCheckbox ? userCheckbox.value : 'not found');
        console.log('hr4 checkbox checked:', checkbox.checked);
        console.log('user checkbox checked:', userCheckbox ? userCheckbox.checked : 'not found');

        // Check/uncheck the user checkbox based on the hr4 checkbox state
        if (userCheckbox) {
          userCheckbox.checked = checkbox.checked;
        }
      });
    });
  });
</script>
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