@extends('Frontend.Layouts.main')
@section('main-content')
    <div class="container">
        <div class="row">
            @if (session('msg'))
                <div class="alert alert-success">{{ session('msg') }}</div>
            @endif

            @if ($errors->any())
                
                <div class="alert alert-danger"><h3>Dữ liệu lỗi vui lòng kiểm tra lại</h3></div>
                
            @endif
            <h1>{{ $title }}</h1>
            <div style="display: flex; align-items: center; justify-content: center;">
                <form action="{{ route('users.post_edit') }}" method="POST" style="width: 30%">
                    <div class="form-group">
                        <label>Họ và Tên</label>
                        <input name="name" class="form-control" placeholder="Enter Họ và Tên" value="{{ old('name')  ?? $userDetail->name}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') ?? $userDetail->email }}" placeholder="Email" >
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('users.index') }}" type="button" class="btn btn-warning">Quay lại</a>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
