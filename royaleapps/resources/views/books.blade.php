@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
    @include('inc.header')
  <div class="container">
    <h1>Books</h1>
      <a href="create-book" class="btn btn-primary">Create new book</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Release Date</th>
                <th>ISBN</th>
                <th>Format</th>
                <th>Number of Pages</th>
                <th>Operation</th>
            </tr>
            <?php foreach($list['items'] AS $listItem)  { 
              ?>
             <tr>
                 <td>{{$listItem['id']}}</td>
                 <td>{{$listItem['title']}}</td>
                 <td>{{$listItem['release_date']}}</td>
                 <td>{{$listItem['isbn']}}</td>
                 <td>{{$listItem['format']}}</td>
                 <td>{{$listItem['number_of_pages']}}</td>
                 <td>
                    <a href="delete-book/{{$listItem['id']}}" class="btn btn-danger">Delete</a>
                 </td>
             </tr> 
             <?php } ?>
        </table>
    </div>
  </div>
@endsection

