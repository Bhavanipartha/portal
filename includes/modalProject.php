<!-- Edit Allocation -->
<div class="modal fade" id="modalForEditProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="editProjectFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Expense</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
                <div class="form-group">
              <label>End Date</label>
              <input type="date" class="form-control" id="edit_date1" name="edit_date1" required>
            </div>
          </div>
                
        </div>
          <input type="hidden" id="edit_p_id" name="edit_p_id" form="editProjectFrm" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>



