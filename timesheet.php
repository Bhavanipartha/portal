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

  <title>Timesheet</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/genAI-logo.png" rel="icon">
  <link href="assets/img/genAI-logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <!-- Add these in your <head> -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>



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
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->

  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="./assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="../img/logo.png" rel="icon">
  <!-- Custom fonts for this template-->
  <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">



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
          <?php
          if ($_SESSION['role'] == 'S-Employee' || $_SESSION['role'] == 'Employee') {
            $sql = "SELECT * FROM employee_details WHERE name='-' AND email= '" . $_SESSION['uname'] . "'";
            $result = mysqli_query($connect, $sql);
            $n = $result->num_rows;

            if ($n != 0) {
              $row = mysqli_fetch_assoc($result);
              echo '
               
                    <!-- Button trigger modal -->
                  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModel">
                  <img src="./assets/img/hi.png" height=30 width=30>
                  </button>';
            }
          }

          ?>

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
      } else if ($_SESSION['role'] == 'S-admin') {
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
              <a class="nav-link " href="timesheet.php">
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
          <a class="nav-link collapsed  " href="myProject.php">
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
          <a class="nav-link collapsed  " data-bs-target="#leave-nav" data-bs-toggle="collapse" href="#students-nav">
            <i class=" bi bi-calendar3"></i> <span>Leave details</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="leave-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="requestLeave.php" class="active">
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
          <a class="nav-link " href="timesheet.php">
            <i class="bi bi-clock-history"></i>
            <span>Timesheet</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed " data-bs-target="#leave-nav" data-bs-toggle="collapse" href="#students-nav">
            <i class=" bi bi-calendar3"></i> <span>Leave details</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="leave-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="requestLeave.php" class="active">
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
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mt-3">Timesheet</h1>
      </div><br>


      <!-- <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script> -->
      </head>

      <body>
        <!-- <input type = "text" id = "datepicker-5" class="form-control" name="datey"> -->


        <!-- Form code begins -->

        <form action="timesheet.php" method="GET">
          <!-- Script -->
          <script>
            $(function() {
              // Calculate last Sunday
              const today = new Date();
              const dayOfWeek = today.getDay(); // 0 = Sunday
              const lastSunday = new Date(today);
              lastSunday.setDate(today.getDate() - dayOfWeek); // last Sunday

              // Format lastSunday in dd-mm-yy
              const lastSundayStr = $.datepicker.formatDate('dd-mm-yy', lastSunday);

              $("#datepicker").datepicker({
                dateFormat: 'dd-mm-yy', // ← Set display format here
                beforeShowDay: function(date) {
                  const formattedDate = $.datepicker.formatDate('dd-mm-yy', date);
                  if (formattedDate === lastSundayStr) {
                    return [true, "", "Last Sunday"];
                  } else {
                    return [false, "", "Only last Sunday is selectable"];
                  }
                },
                defaultDate: lastSunday
              });

              // Set the input field value to last Sunday in the same format
              // $("#datepicker").datepicker("setDate", lastSunday);
            });
          </script>




          <!-- Date input -->
          <div class="form-row">
            <div class="col-md-12 col-lg-6 col-sm-12 col-xl-6">

              <div class="form-group">
                <!-- Input -->
                <input type="text" id="datepicker" class="form-control" name="datey" placeholder="-- Choose date --">



              </div>
            </div>

            <div class="col-md-12 col-lg-6 col-sm-12 col-xl-6">
              <div class="form-group"><!-- Submit button -->
                <button class="btn btn-primary " name="submit" type="submit">Get Timesheet</button>
              </div>
            </div>
          </div>
        </form>
        <!-- Form code ends -->


    </div>

    <div class="card"><br><br>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start m-3">


        <div id="view"><?php

                        $sql7 = "SELECT * FROM employee_details WHERE email='" . $_SESSION['uname'] . "'";
                        $result7 = mysqli_query($connect, $sql7);

                        if ($result7) {
                          while ($row7 = mysqli_fetch_array($result7)) {
                            $name = $row7['name'];
                          }
                        }
                        $sql = "SELECT * FROM `timesheet` WHERE WEEK(day1) = WEEK(NOW()) -1 AND name= '$name' ORDER BY t_id DESC LIMIT 1 ";
                        $result = mysqli_query($connect, $sql);
                        $n = $result->num_rows;
                        if ($n !== 0) {

                          $row = mysqli_fetch_assoc($result);
                          if ($row['status'] == 1) {
                            echo '<b>Status:</b>&nbsp;&nbsp;<span class="badge badge-primary"> Saved</span>';
                            echo '<script>window.location.reload();</script>';
                          } else if ($row['status'] == 2) {
                            echo '<b>Status:</b>&nbsp;&nbsp;<span class="badge badge-success"> Submitted </span>';
                          } else {
                            echo '<b>Status:</b>&nbsp;&nbsp;<span class="badge badge-danger"> Canceled</span>';
                          }
                        } else {
                          echo '';
                        }

                        ?></div>
      </div>
      <script src="https://smtpjs.com/v3/smtp.js">
      </script>
      <script>
        function sendEmail(e) {
          e.preventDefault();

          Email.send({
            Host: "smtp.elasticemail.com",
            Username: "bhavanivelan875@gmail.com",
            Password: "8F26DAB794F9F1445D6D2238F362C3444E63",
            To: document.getElementById('head').value,
            From: "bhavanivelan875@gmail.com",
            Subject: "Timesheet Submission",
            Body: document.getElementById('name').value + ' submitted a timesheet for the duration of ' + document.getElementById('dae1').value + ' to ' + document.getElementById('ate1').value
          });

          return true;
        }
      </script>


      <div class="container p-4" style="overflow:auto">



        <br>
        <form name="SumForm" id="timesheet" onsubmit="sendEmail(event)">


          <div id="container">
            <section id="mainsection">
              <div class='col-md-12'>
                <div class="row">
                  <div class="col-lg-12 col-12">

                    <?php
                    $sqli = "SELECT * FROM timesheet WHERE name='$name' AND WEEK(day1) = WEEK(now()) - 1 AND status = 2";
                    $resulti = mysqli_query($connect, $sqli);
                    $nr = $resulti->num_rows;

                    $sql2 = "SELECT * FROM project_allocation WHERE name='$name' AND approved_status=0";
                    $result2 = mysqli_query($connect, $sql2);
                    $n = $result2->num_rows;

                    if ($nr != 0) {
                      echo "";
                    } else if ($n == 0) {

                      // Code to execute when both conditions are met
                      echo "<b>Status</b>: No Projects allocated yet!" . "<br><br>";
                      // You can replace this echo statement with your desired code.
                    } else {
                    ?>

                      <table class="table table-bordered table-hover" id="emptbl">
                        <thead>
                          <tr>


                            <th class="text-center" style="width:100px;">
                              Project<span class="str">
                                <font color="red">*</font>
                              </span>
                            </th><?php
                                  if (isset($_GET['datey'])) {


                                    $date = $_GET['datey'];
                                  } else {
                                    $date = '----';
                                  }


                                  $datex = strtotime($date);
                                  $datea = strtotime("-6 day", $datex);
                                  $date1 = date('M d ', $datea);
                                  $z = strtotime($date1);
                                  $e =  date("Y-m-d ", $z);
                                  $dateb = strtotime("-5 day", $datex);
                                  $date2 = date('M d', $dateb);
                                  $x = strtotime($date2);
                                  $f =  date("Y-m-d ", $x);
                                  $datec = strtotime("-4 day", $datex);
                                  $date3 = date('M d', $datec);
                                  $y = strtotime($date3);
                                  $g =  date("Y-m-d ", $y);
                                  $dated = strtotime("-3 day", $datex);
                                  $date4 = date('M d', $dated);
                                  $v = strtotime($date4);
                                  $h =  date("Y-m-d ", $v);
                                  $datee = strtotime("-2 day", $datex);
                                  $date5 = date('M d', $datee);
                                  $w = strtotime($date5);
                                  $i =  date("Y-m-d ", $w);
                                  $datef = strtotime("-1 day", $datex);
                               //   $date6 = date('M d', $datef);
                              //    $u = strtotime($date6);
                                //  $j =  date("Y-m-d ", $u);

                                  $sql = "SELECT * FROM employee_details";
                                  $result1 = mysqli_query($connect, $sql);
                                  if ($result1) {
                                    $row = mysqli_fetch_assoc($result1);

                                    echo '
                  <input class="form-control" id="dae1" name="date1" placeholder="Choose Date[ DD/MM/YYYY ]" value="' . $e . '" type="hidden"/>
                  <input class="form-control" id="de1" name="date2" placeholder="Choose Date[ DD/MM/YYYY ]"  value="' . $f . '" type="hidden"/>
                  <input class="form-control" id="dat1" name="date3" placeholder="Choose Date[ DD/MM/YYYY ]"   value="' . $g . '"type="hidden"/>
                  <input class="form-control" id="dte1" name="date4" placeholder="Choose Date[ DD/MM/YYYY ]"  value="' . $h . '" type="hidden"/>
                  <input class="form-control" id="da1" name="date5" placeholder="Choose Date[ DD/MM/YYYY ]"  value="' . $i . '" type="hidden"/>
                 
                  <th class="text-center">
                  Mon(' . $date1 . ')<span class="str"><font color="red">*</font></span>
                  </th>
                  <th class="text-center">
                  Tue(' . $date2 . ')<span class="str"><font color="red">*</font></span>
                  </th>
                  <th class="text-center">
                  Wed(' . $date3 . ')<span class="str"><font color="red">*</font></span>
                  </th>
                  <th class="text-center">
                  Thur(' . $date4 . ')<span class="str"><font color="red">*</font></span>
                  </th>
                  <th class="text-center">
                  Fri(' . $date5 . ')<span class="str"><font color="red">*</font></span>
                  </th>';
                                  }
                                  ?>

                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          $sql7 = "SELECT * FROM employee_details WHERE email='" . $_SESSION['uname'] . "'";
                          $result7 = mysqli_query($connect, $sql7);

                          if ($result7) {
                            while ($row7 = mysqli_fetch_array($result7)) {
                              $name = $row7['name'];
                              $head = $row7['supervisor'];
                              echo '

             
   
  
   
   
  <input class="form-control"style="width:200px" id="name" name="name" placeholder="Choose Date[ DD/MM/YYYY ]"  value="' . $row7['name'] . '" type="hidden"/>
  <input class="form-control" style="width:200px" id="spr" name="supervisor" placeholder="Choose Date[ DD/MM/YYYY ]"  value="' . $row7['supervisor'] . '" type="hidden"/>

';
                            }
                            $letters = ['a', 'b', 'c', 'd', 'e'];
                            $columnCount = 1;

                            for ($i = 1; $i <= $n; $i++) {
                              echo '<tr>';

                              // Project dropdown column
                              echo '<td style="padding: 20px 0px 20px 20px">';
                               echo '<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10">';
                               
                              echo '<select name="prj' . $i . '" class="form-select" required>';
                              echo '<option value="" > ---- </option>';
                              mysqli_data_seek($result2, 0); // Reset pointer
                              while ($row = mysqli_fetch_array($result2)) {
                                echo '<option value="' . $row['prj_name'] . '">' . $row['prj_name'] . '</option>';
                              }
                              echo '</select>';
                              echo '</div></td>';

                              // Hours columns (A–E)
                              foreach ($letters as $letter) {
                                echo '<td  style="padding: 20px 0px 20px 20px" id="col' . $columnCount . '">';
                                echo '<div class="col-md-12 col-lg-3 col-sm-12 col-xl-3">';
                               
                                echo '<div class="col-md-3">';
                                echo '<input type="number" class="form-control" id="' . $letter . $i . '" name="' . $letter . $i . '" oninput="calc();" style="width:100px;" required>';
                                echo '</div></div></td>';
                                $columnCount++;
                              }

                              echo '</tr>';
                            }


                            // Extra row: "Hours / Day"
                            // Extra row: "Hours / Day"
                            // Hours / Day Row
echo '<tr>';

// Label column
echo '<td style="padding: 20px 0px 20px 0px">';
echo '<div class="col-md-12 col-lg-3 col-sm-12 col-xl-3">';
echo '<div class="col-md-3">';
echo '<input type="text" class="form-control fw-bold" value="Hours / Day" readonly style="width:115px;">';
echo '</div></div></td>';

// A to E columns
$letters = ['a', 'b', 'c', 'd', 'e'];
$colIndex = 1;

foreach ($letters as $letter) {
  echo '<td  style="padding: 20px 0px 20px 20px" id="col' . $colIndex . '">';
  echo '<div class="col-md-12 col-lg-3 col-sm-12 col-xl-3">';
 echo '<div class="col-md-3">';
  echo '<input type="number" name="' . $letter . '4" id="' . $letter . '4" class="form-control" readonly style="width:100px;">';
  echo '</div></div></td>';
  $colIndex++;
}

echo '</tr>';

// Total Hours Row
echo '<tr>';

// First four columns: empty
for ($j = 0; $j < 4; $j++) {
  echo '<td></td>';
}

// "Total Hours" label column
echo '<td style="padding: 20px 0px 20px 20px">';
echo '<div class="col-md-12 col-lg-3 col-sm-12 col-xl-3">';
echo '<div class="col-md-3">';
echo '<input type="text" class="form-control fw-bold" value="Total Hours" readonly style="width:115px;">';
echo '</div></div></td>';

// Value column
echo '<td style="padding: 20px 0px 20px 20px">';
echo '<div class="col-md-12 col-lg-3 col-sm-12 col-xl-3">';
echo '<div class="col-md-3">';
echo '<input type="number" name="g4" id="q2" class="form-control" readonly style="width:100px;">';
echo '</div></div></td>';

echo '</tr>';

                          }
                          ?>

                      </table><br><br>
                      <center>
                        <button type="submit" id="save" class="btn btn-primary" style="background-color: #333d97;">
                          Save <input type="hidden" value="1" id="savein" name="save">
                        </button>

                        <button type="reset" class="btn btn-secondary" style="margin-left:10px;">Clear Entry</button>

                        <button type="submit" id="cancel" onclick="disableSubmit()" class="btn btn-secondary" style="margin-left:10px;">
                          Cancel <input type="hidden" value="2" id="cancelin" name="cancel">
                        </button>

                        <button type="submit" id="submit" onclick="disableCancel(); window.location.reload();" class="btn btn-primary" style="background-color: #333d97; margin-left:10px;">
                          Submit <input type="hidden" value="2" id="submitin" name="submit">
                        </button>
                      </center>
                    <?php  } ?>
                    <script>
                      document.getElementById("myForm").addEventListener("submit", function(event) {
                        // Prevent the form from actually submitting
                        event.preventDefault();

                        // Disable the input field and submit button
                        document.getElementById("inputField").disabled = true;
                        document.getElementById("submitButton").disabled = true;

                        // You can also add additional code here to handle form submission
                      });
                    </script>
                    <script>
                      function disableCancel() {

                        document.getElementById("cancel").enabled = false;

                      }
                    </script>
                    <script>
                      function disableSubmit() {
                        document.getElementById("submit").enabled = false;
                      }
                    </script>
                    <script>
                      function myFunction() {
                        var x = document.getElementById("view");
                        var y = document.getElementById("show");
                        if (x.style.display === "none") {
                          x.style.display = "block";
                        } else {
                          x.style.display = "none";
                        }
                        if (y.style.display === "none") {
                          y.style.display = "block";
                        } else {
                          y.style.display = "none";
                        }
                      }
                    </script>
                    <script>
                      $(document).ready(function() {
                        $('#save').click(function() {
                          var readonly = $("#prj1").prop('readonly');
                          var readonly = $("#prj2").prop('readonly');
                          var readonly = $("#prj3").prop('readonly');
                          var readonly = $("#a1").prop('readonly');
                          var readonly = $("#b1").prop('readonly');
                          var readonly = $("#c1").prop('readonly');
                          var readonly = $("#d1").prop('readonly');
                          var readonly = $("#e1").prop('readonly');
                          var readonly = $("#a2").prop('readonly');
                          var readonly = $("#b2").prop('readonly');
                          var readonly = $("#c2").prop('readonly');
                          var readonly = $("#d2").prop('readonly');
                          var readonly = $("#e2").prop('readonly');
                          var readonly = $("#a3").prop('readonly');
                          var readonly = $("#b3").prop('readonly');
                          var readonly = $("#c3").prop('readonly');
                          var readonly = $("#d3").prop('readonly');
                          var readonly = $("#e3").prop('readonly');
                          var readonly = $("#l1").prop('readonly');
                          var readonly = $("#m1").prop('readonly');
                          var readonly = $("#n1").prop('readonly');
                          var readonly = $("#o1").prop('readonly');
                          var readonly = $("#p1").prop('readonly');
                          var readonly = $("#u1").prop('readonly');
                          var readonly = $("#v1").prop('readonly');
                          var readonly = $("#w1").prop('readonly');
                          var readonly = $("#x1").prop('readonly');
                          var readonly = $("#y1").prop('readonly');
                          var readonly = $("#u2").prop('readonly');
                          var readonly = $("#v2").prop('readonly');
                          var readonly = $("#w2").prop('readonly');
                          var readonly = $("#x2").prop('readonly');
                          var readonly = $("#y2").prop('readonly');

                          if (readonly) {
                            $("#a1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#a1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#b1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#b1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#c1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#c1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#d1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#d1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#e1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#e1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#a2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#a2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#b2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#b2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#c2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#c2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#d2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#d2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#e2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#e2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#a3").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#a3").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#b3").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#b3").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#c3").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#c3").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#d3").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#d3").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#e3").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#e3").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#prj1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#prj1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#prj2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#prj2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#prj3").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#prj3").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#g4").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#g4").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#savein").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#savein").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#l1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#l1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#m1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#m1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#n1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#n1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#o1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#o1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#p1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#p1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#u1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#u1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#v1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#v1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#w1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#w1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#x1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#x1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#y1").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#y1").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#u2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#u2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#v2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#v2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#w2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#w2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#x2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#x2").prop('readonly', true); // if enabled, disable
                          }
                          if (readonly) {
                            $("#y2").prop('readonly', false); // if disabled, enable
                          } else {
                            $("#y2").prop('readonly', true); // if enabled, disable
                          }

                        })
                      });
                    </script>


                    <script>
                      $(document).ready(function() {
                        $('#cancel').click(function() {
                          var disabled = $("#savein").prop('disabled');
                          var enabled = $("#submitin").prop('enabled');
                          var disabled = $("#prj1").prop('disabled');
                          var disabled = $("#prj2").prop('disabled');
                          var disabled = $("#prj3").prop('disabled');
                          var disabled = $("#a1").prop('disabled');
                          var disabled = $("#b1").prop('disabled');
                          var disabled = $("#c1").prop('disabled');
                          var disabled = $("#d1").prop('disabled');
                          var disabled = $("#e1").prop('disabled');
                          var disabled = $("#a2").prop('disabled');
                          var disabled = $("#b2").prop('disabled');
                          var disabled = $("#c2").prop('disabled');
                          var disabled = $("#d2").prop('disabled');
                          var disabled = $("#e2").prop('disabled');
                          var disabled = $("#a3").prop('disabled');
                          var disabled = $("#b3").prop('disabled');
                          var disabled = $("#c3").prop('disabled');
                          var disabled = $("#d3").prop('disabled');
                          var disabled = $("#e3").prop('disabled');
                          var disabled = $("#a4").prop('disabled');
                          var disabled = $("#b4").prop('disabled');
                          var disabled = $("#c4").prop('disabled');
                          var disabled = $("#e4").prop('disabled');
                          var disabled = $("#d4").prop('disabled');
                          var disabled = $("#g4").prop('disabled');
                          var disabled = $("#l1").prop('disabled');
                          var disabled = $("#m1").prop('disabled');
                          var disabled = $("#n1").prop('disabled');
                          var disabled = $("#o1").prop('disabled');
                          var disabled = $("#p1").prop('disabled');
                          var disabled = $("#u1").prop('disabled');
                          var disabled = $("#v1").prop('disabled');
                          var disabled = $("#w1").prop('disabled');
                          var disabled = $("#x1").prop('disabled');
                          var disabled = $("#y1").prop('disabled');
                          var disabled = $("#u2").prop('disabled');
                          var disabled = $("#v2").prop('disabled');
                          var disabled = $("#w2").prop('disabled');
                          var disabled = $("#x2").prop('disabled');
                          var disabled = $("#y2").prop('disabled');

                          if (disabled) {
                            $("#a1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#a1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#b1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#b1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#c1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#c1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#d1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#d1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#e1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#e1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#a2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#a2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#b2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#b2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#c2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#c2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#d2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#d2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#e2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#e2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#a3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#a3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#b3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#b3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#c3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#c3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#d3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#d3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#e3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#e3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#a4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#a4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#b4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#b4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#c4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#c4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#d4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#d4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#e4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#e4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#prj1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#prj1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#prj2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#prj2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#prj3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#prj3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#g4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#g4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#savein").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#savein").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#l1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#l1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#m1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#m1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#n1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#n1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#o1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#o1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#p1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#p1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#u1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#u1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#v1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#v1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#w1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#w1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#x1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#x1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#y1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#y1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#u2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#u2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#v2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#v2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#w2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#w2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#x2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#x2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#y2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#y2").prop('disabled', true); // if enabled, disable
                          }

                        })
                      });
                    </script>
                    <script>
                      $(document).ready(function() {
                        $('#submit').click(function() {
                          var disabled = $("#savein").prop('disabled');
                          var disabled = $("#cancelin").prop('disabled');
                          var enabled = $("#submitin").prop('enabled');
                          var disabled = $("#prj1").prop('disabled');
                          var disabled = $("#prj2").prop('disabled');
                          var disabled = $("#prj3").prop('disabled');
                          var disabled = $("#a1").prop('disabled');
                          var disabled = $("#b1").prop('disabled');
                          var disabled = $("#c1").prop('disabled');
                          var disabled = $("#d1").prop('disabled');
                          var disabled = $("#e1").prop('disabled');
                          var disabled = $("#a2").prop('disabled');
                          var disabled = $("#b2").prop('disabled');
                          var disabled = $("#c2").prop('disabled');
                          var disabled = $("#d2").prop('disabled');
                          var disabled = $("#e2").prop('disabled');
                          var disabled = $("#a3").prop('disabled');
                          var disabled = $("#b3").prop('disabled');
                          var disabled = $("#c3").prop('disabled');
                          var disabled = $("#d3").prop('disabled');
                          var disabled = $("#e3").prop('disabled');
                          var disabled = $("#a4").prop('disabled');
                          var disabled = $("#b4").prop('disabled');
                          var disabled = $("#c4").prop('disabled');
                          var disabled = $("#e4").prop('disabled');
                          var disabled = $("#d4").prop('disabled');
                          var disabled = $("#g4").prop('disabled');
                          var disabled = $("#l1").prop('disabled');
                          var disabled = $("#m1").prop('disabled');
                          var disabled = $("#n1").prop('disabled');
                          var disabled = $("#o1").prop('disabled');
                          var disabled = $("#p1").prop('disabled');
                          var disabled = $("#u1").prop('disabled');
                          var disabled = $("#v1").prop('disabled');
                          var disabled = $("#w1").prop('disabled');
                          var disabled = $("#x1").prop('disabled');
                          var disabled = $("#y1").prop('disabled');
                          var disabled = $("#u2").prop('disabled');
                          var disabled = $("#v2").prop('disabled');
                          var disabled = $("#w2").prop('disabled');
                          var disabled = $("#x2").prop('disabled');
                          var disabled = $("#y2").prop('disabled');
                          if (disabled) {
                            $("#a1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#a1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#b1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#b1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#c1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#c1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#d1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#d1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#e1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#e1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#a2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#a2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#b2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#b2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#c2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#c2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#d2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#d2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#e2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#e2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#a3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#a3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#b3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#b3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#c3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#c3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#d3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#d3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#e3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#e3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#a4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#a4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#b4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#b4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#c4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#c4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#d4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#d4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#e4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#e4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#prj1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#prj1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#prj2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#prj2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#prj3").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#prj3").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#g4").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#g4").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#savein").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#savein").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#cancelin").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#cancelin").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#l1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#l1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#m1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#m1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#n1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#n1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#o1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#o1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#p1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#p1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#u1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#u1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#v1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#v1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#w1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#w1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#x1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#x1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#y1").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#y1").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#u2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#u2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#v2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#v2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#w2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#w2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#x2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#x2").prop('disabled', true); // if enabled, disable
                          }
                          if (disabled) {
                            $("#y2").prop('disabled', false); // if disabled, enable
                          } else {
                            $("#y2").prop('disabled', true); // if enabled, disable
                          }

                        })
                      });
                    </script>



                    <script>
                      // AddExpense
                      $("#timesheet").submit(function(e) {
                        e.preventDefault(); // Avoid executing the actual submit of the form.
                        let myform = document.getElementById("timesheet");
                        let fd = new FormData(myform);
                        $.ajax({
                          method: "POST",
                          dataType: "json",
                          url: "uploadTimesheet.php",
                          data: fd, // Serializes the form's elements.
                          processData: false,
                          contentType: false,
                          success: function(data) {
                            if (data == 1) {
                              Swal.fire({
                                icon: "success",
                                text: "Timesheet added...",
                                type: "success",
                                timer: 2000,
                                showConfirmButton: false
                              });

                              setTimeout(function() {
                                console.log("First reload");
                                window.location.reload();
                                setTimeout(function() {
                                  console.log("Second reload");
                                  window.location.reload();
                                }, 1000); // 1-second delay for the second reload
                              }, 1000); // 1-second delay for the first reload
                              // 1-second delay for the first reload
                              // 1-second delay for the first reload
                            } else if (data == 2) {
                              Swal.fire({
                                type: "error",
                                text: 'Redundant...',
                                icon: 'error'
                              });
                            } else {
                              Swal.fire({
                                type: "error",
                                text: 'Try again later...',
                                icon: 'error'
                              });
                            }
                          }
                        });
                      });
                    </script>









                  </div>
                </div>
              </div>

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
    <!-- Modal -->
    <div class="modal " id="exampleModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <span id="boot-icon" class="bi bi-exclamation-triangle-fill" style="font-size: 1.5rem; color: rgb(255, 210, 48);"></span>&nbsp;&nbsp;&nbsp;<b><span style="color: #333d97;">Update your profile!</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="./addProfile.php"><button class="btn btn-primary">Update</button></a>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
        </div>
      </div>
    </div>
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
      Designed by <a href="https://www.genaihealth.care/">GenAI Healthcare LLC</a>
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

  <script src="./assets/js/ajax.js"></script>
  <script>
    $(document).ready(function() {
      var date_input = $('input[name="date"]'); //our date input has the name "date"
      var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
      var options = {
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script>

  <script>
    $(document).ready(function() {
      var date_input = $('input[name="date"]'); //our date input has the name "date"
      var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      })
    })
  </script>
  <script>
    function startCalc() {
      interval = setInterval("calc()", 1);
    }

    function calc() {
      one = document.SumForm.a1.value;
      two = document.SumForm.a2.value;
      three = document.SumForm.a3.value;

      document.SumForm.a4.value = (one * 1) + (two * 1) + (three * 1);
      four = document.SumForm.b1.value;
      five = document.SumForm.b2.value;
      six = document.SumForm.b3.value;

      document.SumForm.b4.value = (four * 1) + (five * 1) + (six * 1);
      seven = document.SumForm.c1.value;
      eight = document.SumForm.c2.value;
      nine = document.SumForm.c3.value;

      document.SumForm.c4.value = (seven * 1) + (eight * 1) + (nine * 1);
      ten = document.SumForm.d1.value;
      eleven = document.SumForm.d2.value;
      twelve = document.SumForm.d3.value;

      document.SumForm.d4.value = (ten * 1) + (eleven * 1) + (twelve * 1);
      thirteen = document.SumForm.e1.value;
      fourteen = document.SumForm.e2.value;
      fifteen = document.SumForm.e3.value;

      document.SumForm.e4.value = (thirteen * 1) + (fourteen * 1) + (fifteen * 1);

      i = document.SumForm.a4.value;
      j = document.SumForm.b4.value;
      k = document.SumForm.c4.value;
      l = document.SumForm.d4.value;
      m = document.SumForm.e4.value;

      document.SumForm.g4.value = (i * 1) + (j * 1) + (k * 1) + (l * 1) + (m * 1);



    }

    function stpCalc() {
      clearInterval(interval);
    }
  </script>




  <script>
    function calc() {
      const days = ['a', 'b', 'c', 'd', 'e']; // Mon to Fri
      const maxProjects = <?php echo $n; ?>;

      let grandTotal = 0;

      days.forEach(day => {
        let total = 0;

        // Sum across all projects for the day
        for (let i = 1; i <= maxProjects; i++) {
          const input = document.getElementById(day + i);
          if (input && input.value !== '') {
            total += parseFloat(input.value) || 0;
          }
        }

        // Output to a4, b4, c4, d4, e4 (Hours / Day)
        const totalField = document.getElementById(day + '4');
        if (totalField) {
          totalField.value = total;
          grandTotal += total;
        }
      });

      // Set Total Hours
      const totalHoursField = document.getElementById('q2');
      if (totalHoursField) totalHoursField.value = grandTotal;
    }
  </script>


</body>

</html>