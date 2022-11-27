@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
    @include('inc.header')
  <div class="container">
    <h1>Create a new book</h1>
    @if(Session::has('message'))
        <div class="alert alert-info">{{session('message')}}</div>
    @endif
    <form action="store-book" method="post">
        @csrf
        Author: 
        <select name="author" required id="" class="form-control">
            
            <?php foreach($authors['items'] AS $a)  { 
              ?>
             <option value="{{$a['id']}}">{{$a['first_name']}} {{$a['last_name']}}</option> 
             <?php } ?>
        </select>

        Title:
        <input  required type="text" class="form-control" name="title" id="">
        Release Date:
        <input type="datetime-local" class="form-control" name="release_date" id="">
        Description:
        <input type="text" class="form-control" name="description" id="">
        ISBN:
        <input type="text" required class="form-control" name="isbn" id="">
        Format:
        <input type="text" class="form-control" name="format" id="">
        Number of Pages:
        <input type="number" class="form-control" name="number_of_pages" id="">
        <br>
        <button class="btn btn-primary">Create Book</button>
   </form>
    
  </div>
@endsection

