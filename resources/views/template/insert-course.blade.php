<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/course/create') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Course Name: </label>
            <input type="text" name="material_name" id="name" placeholder="Course name" class="form-control">
          </div>
          <div class="form-group">
            <label for="description">Course Descrption: </label>
            <textarea name="description" id="description" placeholder="Course description" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="category">Course Category:</label>
            <div class="input-group mb-3">
              <select class="custom-select" id="category" name="category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="createTopic" tabindex="-1" aria-labelledby="createTopic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Topic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          @csrf
          <div class="form-group">
            <label for="topic">Topic Name: </label>
            <input type="text" name="topic" id="topic" placeholder="topic name" class="form-control">
          </div>
          <div class="form-group">
            <label for="desc">Topic Description: </label>
            <textarea name="desc" id="desc" placeholder="topic description" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="topic">Video: </label>
            <input type="text" name="vide" id="video" placeholder="topic video" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>