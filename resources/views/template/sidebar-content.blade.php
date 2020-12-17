@foreach($categories as $category)
<div class="form-inline">
  <input type="checkbox" name="category[]" id="{{ $category->category_name }}" value="{{$category->id}}" class="mr-3 ml-3" {{ request()->filled('category') ? ( in_array($category->id, request()->category) ? 'checked' : '') :''}}>
  <label for="{{ $category->category_name }}">{{ $category->category_name }}</label>
</div>
@endforeach