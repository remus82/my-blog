@extends('layout.app')
@section('title', 'Page Details')
@section('heading', 'Page Details')
@section('link_text', 'Goto All Pages')
@section('link', '/page')

@section('content')

<div class="row my-4">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
      <img src="{{ asset('storage/images/'.$page->image) }}" class="img-fluid card-img-top">
      <div class="card-body p-5">
        <div class="d-flex justify-content-between align-items-center">
          <p class="lead">{{ \Carbon\Carbon::parse($page->created_at)->diffForHumans() }}</p>
        </div>

        <hr>
        <h3 class="fw-bold text-primary">{{ $page->title }}</h3>
        <p>{{ $page->content }}</p>
      </div>
      <div class="card-footer px-5 py-3 d-flex justify-content-end">
        <a href="/page/{{$page->id}}/edit" class="btn btn-success rounded-pill me-2">Edit</a>
        <form action="/page/{{$page->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection