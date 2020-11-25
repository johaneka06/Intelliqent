<!-- Modal -->
<div class="modal fade" id="ForumModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ForumModalLabel">Create new thread</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/forum/newThread') }}" method="post">
          @csrf
          <div class="form-group">
            <p>Thread Title:</p>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title of your thread">
          </div>
          <div class="form-group">
            <p>Thread Category:</p>
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect03" name="category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <p>Question: </p>
            <textarea name="question" id="question" cols="47" rows="10" placeholder="Question that wants to be asked"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>