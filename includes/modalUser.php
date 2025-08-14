<!-- Edit User -->
<div class="modal fade" id="modalForEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="editUserFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
          <button type="button" class="btn-close" style="transform: scale(0.8);" data-bs-dismiss="modal" aria-label="Close"></button>




        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                <input type="" name="edit_username" id="edit_username" class="form-control" placeholder="Enter Username" required="" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Role</label>
                <input type="" name="edit_role" id="edit_role" class="form-control" placeholder="Name of the Role" required="" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Designation</label>
                <input type="" name="edit_designation" id="edit_designation" class="form-control" placeholder="Name of the Designation" required="" autocomplete="off">
              </div>
            </div>
 <div class="col-md-6">
  <div class="form-group">
    <label>Supervisor</label>
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
        $supName = preg_replace('/\s+/u', ' ', $sup['name']); // normalize spaces
        echo "<option value='".htmlspecialchars($supName)."'>".htmlspecialchars($supName)."</option>";
    }
  ?>
</select>


  </div>
</div>

          <input type="hidden" id="edit_user_id" name="edit_user_id" form="editUserFrm" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="background-color: grey; color:white;">Close</button>

          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>