<?php

session_start();
require 'config/conn.php';
if (!empty($_SESSION['uname'])) {
  $Username = $_SESSION['uname'];
} else {
  header("Location: ./index.html");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Manage User</title>
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

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
  <script src="https: //unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
      border-top: 1px solid white;
      /* Adjust color and thickness as needed */
      margin: 10px 0;
      /* Add margin for spacing */
    }

    .separator-text {
      display: block;
      text-align: center;
      /* Align text in the center */
      margin-top: -10px;
      /* Adjust spacing as needed */
      background-color: white;
      /* Background color for the text */
      width: fit-content;
      /* Adjust width as needed */
      margin-left: auto;
      margin-right: auto;
      padding: 0 10px;
      /* Adjust padding as needed */

      background-color: #ADD8E6;

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
        <a class="nav-link collapsed" href="./dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php
      if ($_SESSION['role'] == 'Admin') {
      ?>




        <li class="nav-item">
          <a class="nav-link " data-bs-target="#user-nav" data-bs-toggle="collapse" href="#user-nav">
            <i class=" bi bi-person-fill"></i> <span>User</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="addUser.php">
                <i class="bi bi-circle"></i><span>Add User</span>
              </a>
            </li>
            <li>
              <a href="manageUser.php" class="active">
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
          <a class="nav-link collapsed" href="bestPerformer.php">
            <i class="bi bi-trophy-fill"></i>
            <span>Best Performer</span>
          </a>
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
      } else if ($_SESSION['role'] == 'S-admin') {
      ?>

        <li class="nav-item">
          <a class="nav-link " data-bs-target="#user-nav" data-bs-toggle="collapse" href="#students-nav">
            <i class=" bi bi-person-fill"></i> <span>User</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="addUser.php">
                <i class="bi bi-circle"></i><span>Add User</span>
              </a>
            </li>
            <li>
              <a href="manageUser.php" class="active">
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
        <hr class="separator">
        <div class="color" style="background-color:#ADD8E6;color:#333d97">
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
        $sql = "SELECT * FROM employee_details WHERE name='$name'";
        $result = mysqli_query($connect, $sql);

        if ($result) {
          while ($row = mysqli_fetch_array($result)) {
            $head = $row['supervisor'];
          }
        }
        $sql3 = "SELECT * FROM employee_details WHERE supervisor='$head' AND role='Super-admin'";
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
        <?php }
        } ?>
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
      } else if ($_SESSION['role'] == 'S-Employee') {

        ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="addProfile.php">
            <i class="bi bi-person-lines-fill"></i>
            <span>Profile info</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="myProject.php">
            <i class="bi bi-display"></i>
            <span>My Projects</span></a>
        </li>

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
        $sql = "SELECT * FROM employee_details WHERE name='$name'";
        $result = mysqli_query($connect, $sql);

        if ($result) {
          while ($row = mysqli_fetch_array($result)) {
            $head = $row['supervisor'];
          }
        }
        $sql3 = "SELECT * FROM employee_details WHERE supervisor='$head' AND role='Super-admin'";
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
          }
        } ?>
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
          <a class="nav-link " data-bs-target="#subjects-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-display"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="subjects-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="projectAllocation.php">
                <i class="bi bi-circle"></i><span>Project Allocation</span>
              </a>
            </li>
            <li>
              <a href="manageAllocation.php" class="active">
                <i class="bi bi-circle"></i><span>Manage Allocation</span>
              </a>
            </li>
          </ul>
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
                <i class="bi bi-circle"></i> <span>Employee Timesheet</span></a>

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
    <br><br><br><br>

    <div class="pagetitle">


      <h4 class="ml-4 mt-4">Manage User</h4><br><br>
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <div class="container p-4" style="overflow:auto">
          <table class="table table-striped" id="dataTable">
            <thead>
              <tr class="">
                <th>
                  #
                </th>
                <th>
                  Username
                </th>
                <th>
                  Role
                </th>
                <th>
                  Designation
                </th>
                <th>
                  Supervisor
                </th>
                <th>
                  Actions
                </th>

              </tr>
            </thead>
            <tbody>

              <?php


              $sql = "SELECT * FROM users WHERE status = 1 AND role IN ('S-Employee', 'Employee', 'S-admin')";
              $result = mysqli_query($connect, $sql);

              if ($result !== false) {
                $id = 1;
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <td><?php echo "" . $id . ""; ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['role'] ?></td>
                    <td><?php echo $row['designation'] ?></td>
                    <td><?php echo $row['supervisor'] ?></td>
                    <td style="white-space: nowrap;">
                      <i class="bi bi-pencil mr-4" onclick="editUser(<?php echo $row['user_id'] ?>)"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <i class="bi bi-trash mr-4" onclick="deleteUser(<?php echo $row['user_id'] ?>)"></i>
                    </td>

                  </tr>
                <?php
                  $id++;
                }
              } else {
                ?>
                <tr>
                  <td>No Records..!</td>
                </tr>
              <?php

              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <!-- ======= Footer ======= -->
    <footer style="    text-align: center; padding: 10px;
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
    </footer><!-- End Footer -->

    <?php include('includes/modalUser.php'); ?>




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


    <script>
      // ShowUser
     function editUser(user_id) {
    $.ajax({
        method: "POST",
        url: "showUser.php",
        data: { user_id },
        dataType: "json",
        success: function(data) {
            // Populate inputs
            $('#edit_username').val(data.username);
            $('#edit_role').val(data.role);
            $('#edit_designation').val(data.designation);
            $('#edit_user_id').val(user_id);

            // Show modal
            var modalEl = document.getElementById('modalForEditUser');
            var myModal = new bootstrap.Modal(modalEl);
            myModal.show();

            // Set supervisor after modal is fully shown
            modalEl.addEventListener('shown.bs.modal', function handler() {
                if (data.supervisor) {
                    $('#edit_supervisor').val(data.supervisor.trim());
                }
                modalEl.removeEventListener('shown.bs.modal', handler);
            });
        },
        error: function(xhr) {
            console.error("🚨 AJAX error:", xhr.status, xhr.responseText);
        }
    });
}

// Submit form
$("#editUserFrm").submit(function(e) {
    e.preventDefault();
    let fd = new FormData(this);

    $.ajax({
        method: "POST",
        url: "editUser.php",
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(data) {
            if (data == 1) {
                Swal.fire({ icon: "success", text: "User updated!", timer: 2000, showConfirmButton: false });
                $('#modalForEditUser').modal('hide');
                setTimeout(() => location.reload(), 1000);
            } else {
                Swal.fire({ icon: "error", text: "Update failed!" });
            }
        }
    });
});





      //DeleteUser
      function deleteUser() {
        cid = arguments[0];
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result['isConfirmed']) {
            $.ajax({
              url: "deleteUser.php",
              method: "POST",
              data: {
                user_id: cid
              },
              enctype: 'multipart/form-data',
              success: function(data) {
                if (data == 1) {
                  Swal.fire({
                    icon: "success",
                    text: "User deleted...",
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                  })
                  setTimeout(function() {
                    location.reload();
                  }, 1000);
                } else {
                  Swal.fire({
                    type: "Error!",
                    text: 'Try again later...',
                    icon: 'error'
                  })
                }
              },
              error: function(exception) {
                console.log('error');
                console.log(exception);
              }
            });
            //window.location.href="phpaction/removeAccount.php?id="+x;			
          } else {
            console.log("back");
            return false;
          }
        })
      }

      function submitImport() {

        $('#import').submit();
      }
    </script>
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