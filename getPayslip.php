<?php

session_start();
require 'config/conn.php';
if (!empty($_SESSION['uname'])) {
    $Username = $_SESSION['uname'];
} else {
    header("Location: ./index.html");
}

include_once('TCPDF-main/tcpdf.php');

if (isset($_POST["generate_pdf"])) {
    $monthCount = (int) $_POST['month'];
    $name = $_POST['name'];

    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData('', 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
    $pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);
    $pdf->SetDefaultMonospacedFont('helvetica');
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetFont('dejavusans', '', 10);

    $found = false;

for ($i = 0; $i < $monthCount; $i++) {
    $dateForQuery = date('Y-m', strtotime("-$i month"));
    $sql = "SELECT * FROM pay_slip 
            WHERE status = 1  
            AND DATE_FORMAT(date1, '%Y-%m') = '$dateForQuery'
            AND name = '$name'";


        $result = mysqli_query($connect, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $found = true;

            $ename = $row['name'];
            $job = $row['designation'];
            $pay = (float) $row['salary'];
            $head = $row['supervisor'];
            $formattedDate = date("M - Y", strtotime("-$i month"));

            // Dynamic breakup
            $basic = round($pay * 0.50, 2);
            $hra = round($pay * 0.30, 2);
            $other = round($pay * 0.20, 2);

            $incomeTax = isset($row['income_tax']) ? (float)$row['income_tax'] : 0;
            $pf = isset($row['pf']) ? (float)$row['pf'] : 0;
            $totalDeduction = $incomeTax + $pf;
            $netPay = $pay - $totalDeduction;

            // Add PDF page
            $pdf->AddPage();

            $content = '';

            $content .= '
<div align="center">
    <img src="./assets/img/genAI.jpg" width="50" height="50" /><br>
    <h3>GenAI Healthcare</h3>
    <span>Payment slip for the month:</span> <b>' . $formattedDate . '</b><br><br>
</div>
<br><br>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
    <tr>
  
        <td width="50%"><b>EMP Name:</b> ' . $ename . '</td>
    </tr>
    
    <tr>
        <td width="50%"><b>Designation:</b> ' . $job . '</td>
       
    </tr>
</table><br><br>
<br>
<table border="1" cellspacing="0" cellpadding="3">
    <tr>
        <th width="25%"><b>Earnings</b></th>
        <th width="25%"><b>Amount</b></th>
        <th width="25%"><b>Deductions</b></th>
        <th width="25%"><b>Amount</b></th>
    </tr>
    <tr>
        <td>Basic</td>
        <td>' . number_format($basic, 2) . '</td>
        <td>Income Tax</td>
        <td>' . number_format($incomeTax, 2) . '</td>
    </tr>
    <tr>
        <td>House Rent Allowance</td>
        <td>' . number_format($hra, 2) . '</td>
        <td>PF</td>
        <td>' . number_format($pf, 2) . '</td>
    </tr>
    <tr>
        <td>Other Allowance</td>
        <td>' . number_format($other, 2) . '</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Total Earning</b></td>
        <td><b>' . number_format($pay, 2) . '</b></td>
        <td><b>Total Deductions</b></td>
        <td><b>' . number_format($totalDeduction, 2) . '</b></td>
    </tr>
</table><br><br>
<br><br>
<table cellspacing="0" cellpadding="3">
    <tr>
        <td><b>Net Pay : ₹ ' . number_format($netPay, 2) . '</b></td>
        <td></td>
        <td><b>For GenAI Communication</b></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>' . $head . '</td>
    </tr>
</table>
';

            $pdf->writeHTML($content, true, false, true, false, '');
        }
    }

    if ($found) {
        ob_end_clean();
        $pdf->Output("Payslip.pdf", 'D');
    } else {
        echo "<script>alert('No payslip data found for selected months.'); window.history.back();</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Get - Payslip</title>
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

        hr.style2 {
            border-top: 3px double #5A5A5A;
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
                <a class="nav-link collapsed" href="./dashboard.php">
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
          <a class="nav-link " href="getPayslip.php">
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
                    <a class="nav-link " href="getPayslip.php">
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
                    <a class="nav-link " href="getPayslip.php">
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
            <h1> Payslip</h1>

        </div><!-- End Page Title --><br>
        <section class="section">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="container mt-5 mb-5">
                            <div style="float:right;">
                                <form class="form-horizontal" method="post">
                                    <?php

                                    if (isset($_POST["month"])) {

                                        $month = $_POST['month'];
                                    } else {
                                        $month = '';
                                    }
                                    $sql = "SELECT  * FROM employee_details WHERE status=1 and email ='" . $_SESSION['uname'] . "' ";
                                    $result = mysqli_query($connect, $sql);

                                    $n = $result->num_rows;

                                    if ($n != 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        echo '
<div class="col-md-12 col-lg-4 col-sm-12 col-xl-4">
<input type="hidden" name="month" id="month" class="form-control" value="' . $month . '" " readonly>
<input type="hidden" name="name" id="staff_name" class="form-control" value="' . $row['name'] . '" " readonly></div>';
                                    } ?>
                                    <button type="submit" name="generate_pdf" class="btn btn-primary btn-flat m-b-30 m-t-30">Generate pdf</button>
                                </form>
                            </div><br><br><br>
                            <center>
                                <form class="form-horizontal" method="post" action="getPayslip.php">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label"><b>Choose month</b></label>
                                            <div class="col-sm-4">
                                                <select class="form-control" id="month" name="month" required>
                                                    <option value="" selected disabled>-- Choose month --</option>
                                                    <option value="1">Current month</option>
                                                    <option value="2">Last 2 months</option>
                                                    <option value="3">Last 3 months</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div> <br><br><br><br>
                                    <button type="submit" name="submit" style="background-color: #333d97;" class="btn btn-primary btn-flat m-b-30 m-t-30">View Payslip</button>
                                </form>
                            </center>

                            <div class="card-body mt-3"><br>
                                <form>

                                   <?php
if (isset($_POST["month"])) {
    $month = (int)$_POST["month"]; // 1, 2, or 3
    $month = min($month, 3); // ensure max is 3

    // Get employee name from session
    $sqlEmp = "SELECT * FROM employee_details WHERE email='" . $_SESSION['uname'] . "'";
    $resEmp = mysqli_query($connect, $sqlEmp);

    if ($resEmp && mysqli_num_rows($resEmp)) {
        $emp = mysqli_fetch_assoc($resEmp);
        $name = $emp['name'];

        // Loop from 0 to $month-1 to get payslips of current to previous N months
      for ($i = 0; $i < $month; $i++) {
    $targetMonth = date('Y-m', strtotime("-$i month"));



    $sql = "SELECT * FROM pay_slip 
            WHERE status = 1  
            AND DATE_FORMAT(date1, '%Y-%m') = '$targetMonth'
            AND TRIM(LOWER(name)) = '" . strtolower(trim($name)) . "'";



    $result = mysqli_query($connect, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        renderPayslip($row, $i);
    } else {
        echo "<div class='alert alert-warning'>No payslip found for " . date('M Y', strtotime("-$i month")) . ".</div>";
    }
}

    }
}
?>

                            </div>
        </section>
    </main>

    <?php
function renderPayslip($row, $monthOffset) {
    $totalSalary = (float)$row["salary"];
    $basic = round($totalSalary * 0.50, 2);
    $hra = round($totalSalary * 0.30, 2);
    $other = round($totalSalary * 0.20, 2);

    $incomeTax = isset($row['income_tax']) ? (float)$row['income_tax'] : 0;
    $pf = isset($row['pf']) ? (float)$row['pf'] : 0;
    $totalDeduction = $incomeTax + $pf;
    $netPay = $totalSalary - $totalDeduction;

    $monthLabel = date('M Y', strtotime("-$monthOffset month"));

    echo '
    <div class="row">
        <div class="col-md-12">
            <div class="text-center lh-1 mb-2">
            <br><br><br><br>
                <img src="./assets/img/genAI-logo.png" width="60" height="60"><br><br>
                <h5 class="fw-bold">GenAI Healthcare</h5>
            </div><br>
            <div class="d-flex justify-content-end">
                <span class="fw-normal">Payment slip for the month: </span>&nbsp;&nbsp;
                <span class="fw-bold">' . $monthLabel . '</span>
            </div>

            <div class="col-md-10">
                <div class="row">

                    <div class="col-md-6"><div><span class="fw-bolder">EMP Name</span> <small class="ms-3">' . $row["name"] . '</small></div></div>
                </div>
                <div class="row">
                   
                  
                </div>
                <div class="row">
                    <div class="col-md-6"><div><span class="fw-bolder">Designation</span> <small class="ms-3">' . $row["designation"] . '</small></div></div>
                 
                </div>
            </div><br>

            <table class="mt-4 table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Earnings</th><th>Amount</th>
                        <th>Deductions</th><th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Basic Pay (50%)</td><td>' . number_format($basic, 2) . '</td>
                        <td>Income Tax</td><td>' . number_format($incomeTax, 2) . '</td>
                    </tr>
                    <tr>
                        <td>House Rent Allowance (30%)</td><td>' . number_format($hra, 2) . '</td>
                        <td>PF</td><td>' . number_format($pf, 2) . '</td>
                    </tr>
                    <tr>
                        <td>Other Allowance (20%)</td><td>' . number_format($other, 2) . '</td>
                        <td></td><td></td>
                    </tr>
                    <tr class="border-top">
                        <td><b>Total Earnings</b></td><td><b>' . number_format($totalSalary, 2) . '</b></td>
                        <td><b>Total Deductions</b></td><td><b>' . number_format($totalDeduction, 2) . '</b></td>
                    </tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-4"><br><span class="fw-bold">Net Pay: ₹ ' . number_format($netPay, 2) . '</span></div>
            </div>

            <div class="d-flex justify-content-end">
                <div class="d-flex flex-column mt-2">
                    <span class="fw-bolder">For GenAI Communication</span>
                    <span class="mt-4">' . $row["supervisor"] . '</span>
                </div>
            </div>
        </div>
    </div><br><hr>';
}
?>

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

</body>

</html>