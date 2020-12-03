<div class="modal fade" id="profilePict" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Profile Pict</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/profile/picture/change')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-inline mb-3">
            <label for="pict" class=" mr-2">Profile Picture: </label>
            <input type="file" name="pict" id="pict" class="form-control">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>