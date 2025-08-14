<?php

require 'config/conn.php'; 

$supervisorEmail = $_SESSION['uname'] ?? '';
$supervisorName = '';

if (!empty($supervisorEmail)) {
    $stmt = $connect->prepare("SELECT name FROM employee_details WHERE email = ?");
    $stmt->bind_param("s", $supervisorEmail);
    $stmt->execute();
    $stmt->bind_result($nameResult);
    if ($stmt->fetch()) {
        $supervisorName = trim(preg_replace('/\s+/', ' ', $nameResult)); // normalize spaces
    }
    $stmt->close();
}


// Fetch employees under this supervisor (normalize spaces in SQL)
$employees = [];
if (!empty($supervisorName)) {
    $empQuery = $connect->prepare("
        SELECT name 
        FROM employee_details 
        WHERE REPLACE(TRIM(supervisor), '  ', ' ') = ? 
          AND name IS NOT NULL 
          AND name != '-' 
        GROUP BY name
    ");
    $empQuery->bind_param("s", $supervisorName);
    $empQuery->execute();
    $res = $empQuery->get_result();
    while ($row = $res->fetch_assoc()) {
        $employees[] = $row['name'];
    }
}
?>









<div class="modal fade" id="modalForEditProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document"><!-- made it wider -->
    <form class="refreshFrm" id="editProjectFrm" method="post">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Project Allocation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- Modal Body -->
    <div class="modal-body">
  <div class="row">
    <!-- Project Name -->
    <div class="col-md-6">
      <div class="form-group">
        <label for="edit_prj_name">Project Name</label>
        <select class="form-control" id="edit_prj_name" name="edit_prj_name" required disabled>
          <option value="">Select Project</option>
          <?php
          $projQuery = $connect->query("SELECT prj_name FROM project_allocation GROUP BY prj_name");
          while ($proj = $projQuery->fetch_assoc()) {
            echo "<option value='{$proj['prj_name']}'>{$proj['prj_name']}</option>";
          }
          ?>
        </select>
        <!-- If you want the value to submit with the form even though it's disabled -->
        <input type="hidden" id="edit_prj_name_hidden" name="edit_prj_name" />
      </div>
    </div>


            <!-- Employee Name -->


          <div class="col-md-6">
  <div class="form-group">
    <label for="edit_name">Employee Name</label>
    <select class="form-control" id="edit_name" name="edit_name" required>
      <option value="">Select Employee</option>
      <?php foreach ($employees as $empName) { ?>
        <option value="<?= htmlspecialchars($empName) ?>">
          <?= htmlspecialchars($empName) ?>
        </option>
      <?php } ?>
    </select>
  </div>
</div>

            <!-- Start Date -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_s_date">Start Date</label>
                <input type="date" class="form-control" id="edit_s_date" name="edit_s_date" required>
              </div>
            </div>

            <!-- End Date -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_e_date">End Date</label>
                <input type="date" class="form-control" id="edit_e_date" name="edit_e_date" required>
              </div>
            </div>
          </div>

          <input type="hidden" id="edit_p_id" name="edit_p_id" />
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>