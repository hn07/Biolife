@extends('Frontend.Layouts.main')
@section('main-content')
    <div class="container">
        <div class="row">
            <h1>{{ $title }}</h1>
            <a href="http://" class="btn btn-danger">Them User</a>
            
            <table class="table table-bordered">
                <thead>
                    <th width="5%">STT</th>
                    <th>Ten</th>
                    <th>SDT</th>
                    <th width="15%">Thoi gian</th>
                </thead>
                <tbody>
                    @if (!empty($list_users))
                        {
                        @foreach ($list_users as $user => $value)
                        <tr>
                            <td>{{ $user + 1 }}</td>
                            <td>{{ $value->name_user}}</td>
                            <td>{{ $value->phone_user }}</td>
                            <td>{{ $value->create_at }}</td>
                        </tr>
                        @endforeach
                        }
                        @else
                        {
                        <tr>
                            <td colspan="4">KHÔNG CÓ USER</td>
                        </tr>
                        }
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
