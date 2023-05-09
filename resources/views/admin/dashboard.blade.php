@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            @if(session('message'))
            <h2>{{ (session('message')) }}</h2>
            @endif
            <p class="mb-md-0">Your analytics dashboard template.</p>
          </div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
          </div>
          
        </div>
        {{-- <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
          </button>
          <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
        </div> --}}
        </div>
        <hr>
      <div class="row" style="margin-top: 50px">
          <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
              <label for="">Total Category</label>
              <h1>{{ $category }}</h1>
              <a href="{{ url('admin/category') }}" style="color: aliceblue">view</a>
            </div>
          </div>

          <div class="col-md-3">
          <div class="card card-body bg-success text-white mb-3">
            <label for="">Total Book</label>
            <h1>{{ $book }}</h1>
            <a href="{{ url('admin/book') }}" style="color: aliceblue">view</a>
          </div>
          </div>

          <div class="col-md-3">
            <div class="card card-body bg-warning text-white mb-3">
              <label for="">Total Chapter</label>
              <h1>{{ $chapter }}</h1>
              <a href="{{ url('admin/chapter') }}" style="color: aliceblue">view</a>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card card-body bg-info text-white mb-3">
              <label for="">Total Author</label>
              <h1>{{ $author }}</h1>
              <a href="{{ url('admin/author') }}" style="color: aliceblue">view</a>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
              <label for="">Total Blog</label>
              <h1>{{ $blog }}</h1>
              <a href="{{ url('admin/blog') }}" style="color: aliceblue">view</a>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
              <label for="">Total User</label>
              <h1>{{ $user }}</h1>
              <a href="{{ url('admin/user') }}" style="color: aliceblue">view</a>
            </div>
          </div>
      </div>

      
      
    </div>
  </div>
@endsection