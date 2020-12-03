@extends('template/template')
@section('page-title', 'Manage Category')
@section('page-content')
<div class="container mb-5 mt-5">
  <div class="text-center">
    <h3>Manage Category</h3>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <th scope="row" id="index" aria-valuenow="{{ $category->id }}">{{ $category->id }}</th>
        <td> {{ $category->category_name }} </td>
        <td> {{ isset($category->created_at) ? (new Carbon\Carbon($category->created_at))->format('d/m/Y H:i') : 'NULL' }} </td>
        <td>
          <a href="{{ url('/category/'.$category->id.'/delete') }}" class="badge badge-danger" onclick="return confirm('are you sure want to delete {{ $category->category_name }} ?')">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="text-center">
    <button class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Add New Category</button>
  </div>
</div>
@include('template/insert-modal')
@endsection