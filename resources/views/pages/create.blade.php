@extends('layout.app')
@section('title', 'Add New Page')
@section('heading', 'Create a New Page')
@section('link_text', 'Goto All Pages')
@section('link', '/page')

@section('content')

<div class="row my-3">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
      <div class="card-header bg-primary">
        <h3 class="text-light fw-bold">Add New Page</h3>
      </div>
      <div class="card-body p-4">
        <form action="/page" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="my-2">
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}">
            @error('title')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="my-2">
            <textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror" placeholder="Page Content">{{ old('content') }}</textarea>
            @error('content')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <input type="file" name="file" id="file" accept="image/*" class="form-control @error('file') is-invalid @enderror">
            @error('file')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>


          <div class="my-2">
            <input type="submit" value="Add Page" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection