@extends('Frontend.Layouts.main')
@section('main-content')
    <div class="container">
        <div class="row">
            <h1>{{ $title }}</h1>
            <div class="col-md-3">
                <a href="{{ route('users.add') }}"><button class="btn btn-danger">Them User</button></a>
                <hr>
            </div>

            <div class="col-md-9">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-3">
                            <select class="form-control" name="status">
                                <option value="0">Tất cả trạng thái</option>
                                <option value="active" {{ request()->status == 'actice' ? 'selected' : false }}>Đã Kích hoạt
                                </option>
                                <option value="inactive"{{ request()->status == 'inactice' ? 'selected' : false }}>Chưa kích hoạt</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-control" name="group_id">
                                <option selected value="0">Tất cả nhóm</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="search" class="form-control" name="key_words" placeholder="Tìm kiếm.."
                                value="{{ request()->key_words }}">
                            <hr>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success btn-lg ">Tìm kiếm</button>
                        </div>
                    </div>
                   
                </form>
                
                <table class="table table-bordered">
                    <thead>
                        <th width="5%">STT</th>
                        <th>Ten</th>
                        <th>SDT</th>
                        <th width="15%">Thoi gian</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </thead>
                    <tbody>
                        @if (!empty($list_users))
                            @foreach ($list_users as $user => $value)
                                <tr>
                                    <td>{{ $user + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->create_at }}</td>
                                    <td><a href="{{ route('users.edit',['id'=>$value->id_user])}}"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="{{ route('users.delete',['id'=>$value->id_user])}}"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
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
    </div>
@endsection
