<?php
session_start();
require 'config/conn.php';
if (!empty($_SESSION["uname"])) {
  $Username = $_SESSION["uname"];
} else {
  header("Location:index.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GenAI - DASHBOARD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->
  <link href="assets/img/genAI-logo.png" rel="icon">
  <link href="assets/img/genAI-logo.png" rel="GenAIlogo.8c81e89f.064ce15e9051e517f9f9c40f81ec697b">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
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
  <script src="https: //unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="style3.css" rel="stylesheet">
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

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(15px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes pulseBorder {
      0% {
        box-shadow: 0 0 0 0 rgba(142, 36, 170, 0.6);
      }

      70% {
        box-shadow: 0 0 0 15px rgba(142, 36, 170, 0);
      }

      100% {
        box-shadow: 0 0 0 0 rgba(142, 36, 170, 0);
      }
    }

    .glow-avatar {
      animation: pulse-glow 2s infinite;
    }

    @keyframes pulse-glow {
      0% {
        box-shadow: 0 0 0px #ba68c8;
      }

      50% {
        box-shadow: 0 0 12px #ba68c8;
      }

      100% {
        box-shadow: 0 0 0px #ba68c8;
      }
    }


    .dashboard-avatar.glow {
      animation: pulseBorder 2s infinite;
    }

    .glow-performer {
      animation: pulseBorderPerformer 2s infinite;
    }

    @keyframes pulseBorderPerformer {
      0% {
        box-shadow: 0 0 0 0 rgba(0, 150, 136, 0.6);
      }

      70% {
        box-shadow: 0 0 0 15px rgba(0, 150, 136, 0);
      }

      100% {
        box-shadow: 0 0 0 0 rgba(0, 150, 136, 0);
      }
    }


    .dashboard-card {
      max-width: 650px;
      margin: 30px auto;
      padding: 30px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(14px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
      text-align: center;
      font-family: 'Poppins', sans-serif;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.35);
      animation: fadeIn 0.8s ease;
    }

    .dashboard-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
    }

    .dashboard-card h2 {
      font-size: 26px;
      margin-bottom: 16px;
      background: linear-gradient(to right, #ab47bc, #8e24aa);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: 700;
    }

    .dashboard-card p {
      font-size: 16px;
      color: #333;
      margin: 10px 0;
    }

    .dashboard-avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 5px solid #8e24aa;
      box-shadow: 0 10px 20px rgba(142, 36, 170, 0.25);
      margin-bottom: 20px;
    }

    .birthday-highlight {
      background: linear-gradient(135deg, #ffe0f0, #fdfbfb);
      border: 2px solid #f48fb1;
      box-shadow: 0 12px 30px rgba(244, 143, 177, 0.25);
    }

    .gradient-text {
      background: linear-gradient(to right, #8e24aa, #ff4081);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: 700;
    }

    .performer-card {
      max-width: 700px;
      margin: 40px auto;
      padding: 30px;
      background: linear-gradient(135deg, #e0f7fa, #e1bee7);
      /* sky blue + purple */
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
      border: 2px solid #ba68c8;
      text-align: center;
      animation: fadeIn 0.8s ease;
      font-family: 'Poppins', sans-serif;
    }

    .performer-heading {
      font-size: 24px;
      font-weight: 700;
      color: #6a1b9a;
      background: linear-gradient(to right, #7b1fa2, #00bcd4);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 30px;
    }

    /* Flex layout for performers */
    .performer-flex-wrap {
      display: flex;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
      margin-top: 10px;
    }



    /* Individual performer box */
    .performer-item {
      background: white;
      padding: 20px 16px;
      border-radius: 18px;
      width: 180px;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .performer-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.1);
    }

    /* Performer avatar */
    .performer-item img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #8e24aa;
      margin-bottom: 10px;
      transition: box-shadow 0.3s ease;
    }

    .performer-item img:hover {
      box-shadow: 0 0 12px #ba68c8;
    }

    /* Performer name */
    .performer-item p {
      font-size: 15px;
      font-weight: 600;
      color: #333;
      margin: 0;
    }


    .separator {
      border-top: 1px solid #ccc;
      margin: 30px auto;
      max-width: 500px;
    }

    .separator-text {
      text-align: center;
      background: #fff;
      display: inline-block;
      padding: 0 12px;
      position: relative;
      top: -18px;
      font-weight: bold;
      color: #6a1b9a;
    }
  </style>
</head>

<body>

  <div class="fixed-top">
    <div class="container-fluid  navbar-cg p-2" style="margin-bottom:-15px; background-image: url('./assets/img/240_F_303562524_QfNWIptUFfYdGbR0AdcA0wJ0pZuJfW2w.jpg');  
  background-color: #4D004C;
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
            $sql = "SELECT pay_slip.generated_at FROM pay_slip WHERE generated_at > now() - interval '10' day;";
            $result = mysqli_query($connect, $sql);
            $n = $result->num_rows;

            if ($n != 0) {
              $row = mysqli_fetch_assoc($result);
              echo '
               
                    <!-- Button trigger modal -->
                  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                  <img src="./assets/img/hi.png" height=30 width=30>
                  </button>';
            }
          }

          ?>
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
        <a class="nav-link " href="./dashboard.php">
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
          <a class="nav-link collapsed" data-bs-target="#subjects-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-display"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="subjects-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="projectAllocation1.php">
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

    <br><br><br><br>
    <div class="pagetitle">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mt-3">Dashboard</h1>
      </div>



      <!-- Content Row -->
      <div class="row">
        <!-- Area Chart -->
        <div class="col-12">

          <?php

          if ($_SESSION['role'] == 'S-Employee' || $_SESSION['role'] == 'Employee' || $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Super-admin') {
          ?>

            <script>
              function myFunction() {
                var x = document.getElementById("viewoldcr");
                if (x.style.display === "none") {
                  x.style.display = "block";
                } else {
                  x.style.display = "none";
                }
              }
            </script>


            <div class="container-fluid">


              <div class="row justify-content-center">

                <!-- Modal -->
                <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">

                      <div class="modal-body">
                        <span id="boot-icon" class="bi bi-bell-fill" style="font-size: 1.5rem; color: rgb(255, 210, 48);"></span>&nbsp;&nbsp;&nbsp;<b><span style="color: #333d97;">Payslip generated!</b></span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>

                      </div>
                    </div>
                  </div>
                </div>
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

                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Circular</h6>
                </div>
                <!-- Card Body -->
                <div class="container p-4" style="overflow:auto">
                  <div class="card-body" style="width:1000px; ">
                    <?php
                    $quoteQuery = "SELECT * FROM quote WHERE DATE(datee) = CURDATE()";
                    $resultq = mysqli_query($connect, $quoteQuery);

                    if ($resultq && mysqli_num_rows($resultq) > 0) {
                      while ($rowq = mysqli_fetch_assoc($resultq)) {
                        echo '
    <div style="
      max-width: 600px;
      margin: 20px auto;
      background: linear-gradient(to right, #e0f7fa, #e1bee7);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      text-align: center;
      font-family: Poppins, sans-serif;
    ">
      <i class="fas fa-quote-left fa-2x" style="color:#6a1b9a;"></i>
      <p style="
        font-size: 22px;
        font-style: italic;
        color: #333;
        margin: 20px 0;
      ">
        ' . htmlspecialchars($rowq["quote"]) . '
      </p>
      <i class="fas fa-quote-right fa-2x" style="color:#6a1b9a;"></i>
    </div><br>
    ';
                      }
                    } else {
                    //  echo "<p style='text-align:center; color:gray;'>No quote found for today.</p>";
                    }
                    ?>


                    <?php
                    // === Today's Birthdays ===
                    $birthdaySql = "SELECT * FROM employee_details WHERE DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT(CURDATE(), '%m-%d')";
                    $result = mysqli_query($connect, $birthdaySql);

                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        $photo = (!empty($row['photo_path'])) ? './images/' . $row['photo_path'] : 'https://cdn-icons-png.flaticon.com/512/149/149071.png';

                        echo "<div class='dashboard-card birthday-highlight'>";
                        echo "<img src='" . $photo . "' class='dashboard-avatar glow'>";

                        echo "<h2>🎉 <span class='gradient-text'>Happy Birthday, " . htmlspecialchars($row['name']) . "!</span></h2>";
                        echo "<p>May your day be as amazing as you are. 🌟 Wishing you all the success and happiness!</p>";
                        echo "</div><br>";
                      }
                    }
                    ?>

                    <!-- === Upcoming Birthdays (Optional Block) === -->
                    <?php
                    /*
$sql = "SELECT * FROM employee_details
        WHERE DAYOFYEAR(dob) BETWEEN DAYOFYEAR(CURDATE()) + 1 AND DAYOFYEAR(CURDATE() + INTERVAL 30 DAY)";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<div class='dashboard-card'>";
  echo "<h2>🎈 Upcoming Birthdays</h2>";
  echo "<ul class='dashboard-list'>";
  while ($row = mysqli_fetch_assoc($result)) {
    $formattedDate = date('M d', strtotime($row['dob']));
    echo "<li>🎂 " . $formattedDate . " - " . htmlspecialchars($row['name']) . "</li>";
  }
  echo "</ul></div>";
}
*/
                    ?>


                    <?php
                    $currentMonth = date('Y-m');
                    $sql = "SELECT b.name, e.photo_path 
        FROM best_performers b
        LEFT JOIN employee_details e ON b.name = e.name
        WHERE b.month = '$currentMonth'";

                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      echo '<div class="dashboard-card performer-card">';
                      echo '<h2 class="performer-heading">🏆 Best Performers of the Month</h2><br>';
                      echo '<div class="performer-flex-wrap">';

                      while ($row = mysqli_fetch_assoc($result)) {
                        $photo = (!empty($row['photo_path'])) ? './images/' . $row['photo_path'] : 'https://cdn-icons-png.flaticon.com/512/149/149071.png';

                        echo '
    <div class="performer-item"><br>
      <img src="' . $photo . '" alt="Performer">
      <p>' . htmlspecialchars($row['name']) . '</p>
    <br></div>';
                      }

                      echo '</div></div>';
                    }

                    ?>









                  </div>
                </div>

              </div>
            </div>


          <?php } ?>

        </div>
      </div>


    </div>
    </div>
    <!-- /.container-fluid -->
    </div>

    <nav>
      <!-- End Page Title -->


      </div>
      </div><!-- End Left side columns -->
      </div><!-- End Right side columns -->

      </div>
      </section>

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
      Designed by <a href="https://www.genaihealth.care/">GenAI Healthcare</a>
    </div>
    <!-- Copyright -->
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script type="text/javascript">
    var ctx = document.getElementById("chartjs_line").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($month); ?>,
        datasets: [{
          backgroundColor: [
            "#5969ff",
            "#ff407b",
            "#25d5f2",
            "#ffc750",
            "#2ec551",
            "#7040fa",
            "#ff004e"
          ],
          data: <?php echo json_encode($expenses); ?>,
        }]
      },
      options: {
        legend: {
          display: true,
          position: 'bottom',

          labels: {
            fontColor: '#71748d',
            fontFamily: 'Circular Std Book',
            fontSize: 14,
          }
        },


      }
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



</body>

</html>