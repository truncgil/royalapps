@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
<div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="get-token" method="post">
                            @csrf
                            @if($errors->any())
                             <div class="alert alert-danger">{{$errors->first()}}</div>
                            @endif
                            <h3 class="text-center text-primary">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-primary">E-Mail:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-primary">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <br>
                                <input type="submit" name="submit" class="btn btn-primary btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection