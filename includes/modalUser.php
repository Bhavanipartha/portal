<!-- Bootstrap 4 Modal: Edit User -->
<div class="modal fade" id="modalForEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="editUserFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditUserLabel">Edit User</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="transform: scale(0.7);"></button>

        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_username">Username</label>
                <input type="text" name="edit_username" id="edit_username" class="form-control" required autocomplete="off">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_role">Role</label>
                <input type="text" name="edit_role" id="edit_role" class="form-control" required autocomplete="off">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_designation">Designation</label>
                <input type="text" name="edit_designation" id="edit_designation" class="form-control" required autocomplete="off">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="edit_supervisor">Supervisor</label>
                <select name="edit_supervisor" id="edit_supervisor" class="form-control" required>
                  <option value="">Select Supervisor</option>
                  <?php
                  require 'config/conn.php';
                  $supQuery = $connect->query("
                    SELECT name 
                    FROM users 
                    WHERE role = 'S-Employee' AND designation = 'Manager' AND status = 1 
                    ORDER BY name ASC
                  ");
                  while ($sup = $supQuery->fetch_assoc()) {
                      $supName = preg_replace('/\s+/u', ' ', $sup['name']);
                      echo "<option value='" . htmlspecialchars($supName) . "'>" . htmlspecialchars($supName) . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <input type="hidden" id="edit_user_id" name="edit_user_id" />
        </div>

        <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
