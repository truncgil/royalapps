@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
    @include('inc.header')

  <div class="container">
    <h1>Authors</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Place of Birth</th>
            </tr>
            <?php foreach($list['items'] AS $listItem)  { 
              ?>
             <tr>
                 <td>{{$listItem['id']}}</td>
                 <td>{{$listItem['first_name']}}</td>
                 <td>{{$listItem['last_name']}}</td>
                 <td>{{$listItem['birthday']}}</td>
                 <td>{{$listItem['gender']}}</td>
                 <td>{{$listItem['place_of_birth']}}</td>
             </tr> 
             <?php } ?>
        </table>
    </div>
  </div>
@endsection

