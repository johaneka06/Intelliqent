@foreach($categories as $category)
<div class="form-inline">
  <input type="checkbox" name="category[]" id="category[]" value="{{$category->id}}" class="mr-3 ml-3" {{ request()->filled('category') ? ( in_array($category->id, request()->category) ? 'checked' : '') :''}}>
  <label for="category[]">{{ $category->category_name }}</label>
</div>
@endforeach