<div class="modal fade" id="topicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new material to course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/topic/'.$material->id.'/create') }}" method="post">
          @csrf
          <div class="form-inline d-flex justify-content-start mb-3">
            <label for="name" class="col-3 text-left">Topic Name: </label>
            <input type="text" name="name" id="name" class="form-control col-9" placeholder="Topic name">
          </div>
          <div class="form-inline mb-3">
            <label for="desc" class="col-3 text-left">Topic Description: </label>
            <textarea name="desc" id="desc" class="form-control col-9" placeholder="Topic Description"></textarea>
          </div>
          <div class="form-inline mb-3">
            <label for="name" class="col-3 text-left mb-3">Topic Video: </label>
            <input type="text" name="video" id="video" placeholder="Place youtube embedded link here" class="form-control col-9">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Insert</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>