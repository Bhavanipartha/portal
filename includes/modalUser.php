

<!-- Edit User -->
<div class="modal fade" id="modalForEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="editUserFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Edit User</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border:none;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Username</label>
              <input type="" name="edit_username" id="edit_username" class="form-control" placeholder="Name of the Location" required=""  autocomplete="off">
            </div>
          </div>
          <div class="col-md-6">         
            <div class="form-group">
              <label>Role</label>
              <input type="" name="edit_role" id="edit_role" class="form-control" placeholder="Name of the Location" required=""  autocomplete="off">
            </div>
          </div></div>          
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Designation</label>
              <input type="" name="edit_designation" id="edit_designation" class="form-control" placeholder="Name of the Location" required=""  autocomplete="off">
            </div>
          </div>
          <div class="col-md-6">         
            <div class="form-group">
              <label>Supervisor</label>
              <input type="" name="edit_supervisor" id="edit_supervisor" class="form-control" placeholder="Name of the Location" required=""  autocomplete="off">
            </div>
          </div></div>
          <input type="hidden" id="edit_user_id" name="edit_user_id" form="editUserFrm" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal" style="background-color: grey; color:white;">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>


