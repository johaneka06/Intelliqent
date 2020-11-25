<form action="{{ url('course/search/') }}" method="get" class="ml-auto form-inline">
  @if(request()->has('key'))
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="q" name="q" value="{{ request()->key }}">
  @else
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="key" name="key">
  @endif
  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
</form>