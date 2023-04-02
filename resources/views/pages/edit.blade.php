@extends('layout.app')
@section('title', 'Edit Page')
@section('heading', 'Edit This Page')
@section('link_text', 'Goto All Pages')
@section('link', '/page')

@section('content')

<div class="row my-3">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
      <div class="card-header bg-primary">
        <h3 class="text-light fw-bold">Edit Page</h3>
      </div>
      <div class="card-body p-4">
        <form action="/page/{{ $page->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="my-2">
            <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $page->title }}" required>
          </div>

          <div class="my-2">
            <input type="file" name="file" id="file" accept="image/*" class="form-control">
          </div>

          <img src="{{ asset('storage/images/'.$page->image) }}" class="img-fluid img-thumbnail" width="150">

          <div class="my-2">
            <textarea name="content" id="content" rows="6" class="form-control" placeholder="Page Content" required>{{ $page->content }}</textarea>
          </div>

          <div class="my-2">
            <input type="submit" value="Update Page" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection