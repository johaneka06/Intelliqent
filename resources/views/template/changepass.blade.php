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
        <div class="container-fluid">

          <div class="form mb-3">
            <div class="row">
              <div class="col">
                <label for="current" class="d-flex justify-content-start align-items-center
                ">Current password: </label>
              </div>
              <div class="col">
                <input type="password" name="current" id="current" class="form-control">
              </div>
            </div>
          </div>

          <div class="form mb-3">
            <div class="row">
              <div class="col">
                <label for="new" class="d-flex justify-content-start align-items-center
                ">New password: </label>
              </div>
              <div class="col">
                <input type="password" name="new" id="new" class=" form-control">
              </div>
            </div>
          </div>

          <div class="form mb-3">
            <div class="row">
              <div class="col">
                <label for="confirm" class="d-flex justify-content-start align-items-center
                ">Confirm password: </label>
              </div>
              <div class="col">
                <input type="password" name="confirm" id="confirm" class=" form-control">
              </div>
            </div>
          </div>

        </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Change Password</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>