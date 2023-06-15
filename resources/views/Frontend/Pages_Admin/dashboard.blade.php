@extends('Frontend.Layouts.main_Login')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
            <h1>Wellcom to dashboard</h1>
            <h5>{{ $data->username }}</h5>
            <h5>{{ $data->email}}</h5>
        </div>
        <h5><a href="{{ route('admin.logout') }}">Logout</a></h5>
    </div>
       
    </div>
@endsection
