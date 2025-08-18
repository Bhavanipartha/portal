<?php
require 'config/conn.php';


$supervisorEmail = $_SESSION['uname'] ?? '';
$supervisorName = '';

// Get supervisor name by email
if (!empty($supervisorEmail)) {
    $stmt = $connect->prepare("SELECT name FROM employee_details WHERE email = ?");
    $stmt->bind_param("s", $supervisorEmail);
    $stmt->execute();
    $stmt->bind_result($nameResult);
    if ($stmt->fetch()) {
        $supervisorName = trim(preg_replace('/\s+/', ' ', $nameResult)); // Normalize spaces
    }
    $stmt->close();
}

// Fetch employees with role 'S-Employee' under this supervisor
$employees = [];
if (!empty($supervisorName)) {
    $empQuery = $connect->prepare("
        SELECT name 
        FROM employee_details 
        WHERE role = 'S-Employee' 
          AND REPLACE(TRIM(supervisor), '  ', ' ') = ? 
          AND name IS NOT NULL 
          AND name != '-' 
        GROUP BY name
        ORDER BY name ASC
    ");
    $empQuery->bind_param("s", $supervisorName);
    $empQuery->execute();
    $res = $empQuery->get_result();
    while ($row = $res->fetch_assoc()) {
        $employees[] = $row['name'];
    }
    $empQuery->close();
}
?>

<!-- Modal HTML -->
<div class="modal fade" id="modalForEditAllocation" tabindex="-1" role="dialog" aria-labelledby="editAllocModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form id="editAllocationFrm" method="post">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="editAllocModalLabel">Edit Project Allocation</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
          <div class="row">

            <!-- Project Name (disabled) -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_alloc_prj_name">Project Name</label>
                <select class="form-control" id="edit_alloc_prj_name" name="edit_prj_name" disabled>
                  <option value="">Select Project</option>
                  <?php
                  $projQuery = $connect->query("SELECT prj_name FROM project_allocation GROUP BY prj_name");
                  while ($proj = $projQuery->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($proj['prj_name']) . "'>" . htmlspecialchars($proj['prj_name']) . "</option>";
                  }
                  ?>
                </select>
                <input type="hidden" id="edit_alloc_prj_name_hidden" name="edit_prj_name" />
              </div>
            </div>

            <!-- Employee Name -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_alloc_name">Employee Name</label>
                <select class="form-control" id="edit_alloc_name" name="edit_name" required>
                  <option value="">Select Employee</option>
                  <?php foreach ($employees as $empName): ?>
                    <option value="<?= htmlspecialchars($empName) ?>"><?= htmlspecialchars($empName) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Start Date -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_alloc_s_date">Start Date</label>
                <input type="date" class="form-control" id="edit_alloc_s_date" name="edit_s_date" required>
              </div>
            </div>

            <!-- End Date -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_alloc_e_date">End Date</label>
                <input type="date" class="form-control" id="edit_alloc_e_date" name="edit_e_date" required>
              </div>
            </div>

          </div>

          <input type="hidden" id="edit_alloc_p_id" name="edit_p_id" />
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
