<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Log In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger fade show" role="alert">
          {{ $error }}
        </div>
        @endforeach
        @endif
        <form action="{{ url('/login') }}" method="POST">
        @csrf
          <div class="form-group ">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password: </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
          </div>
          <button type="submit" class="btn btn-primary mb-3">Log In</button>
          <div class="modal-footer">
            <small>Don't have account? Register <a href="{{'/register'}}">here</a>!</small>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>