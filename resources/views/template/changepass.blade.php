<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/member/profile/password') }}" method="post">
        @csrf
          <div class="form-inline mb-3">
            <div class="row">
              <div class="col-6 text-right">
                <label for="current">Current password: </label>
              </div>
              <div class="col-6">
                <input type="password" name="current" id="current" class="form-control">
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="row">
              <div class="col-6 text-right">
                <label for="new">New password: </label>
              </div>
              <div class="col-6">
                <input type="password" name="new" id="new" class="form-control">
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="row">
              <div class="col-6 text-right">
                <label for="confirm">Confirmation password: </label>
              </div>
              <div class="col-6">
                <input type="password" name="confirm" id="confirm" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Change Passowrd</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>