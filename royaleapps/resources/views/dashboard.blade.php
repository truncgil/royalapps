@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{url('authors')}}" class="nav-link px-2 text-white">Authors</a></li>
          <li><a href="{{url('books')}}" class="nav-link px-2 text-white">Books</a></li>
        </ul>

  

        <div class="text-end">
          <a href="{{url('logout')}}" type="button" class="btn btn-outline-light me-2">Logout</a>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <h1>Welcome Dashboard</h1>
    
  </div>
@endsection