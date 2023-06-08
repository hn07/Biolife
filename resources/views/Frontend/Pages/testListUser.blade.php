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
                            <select aria-label="State" class="form-control text-break" name="status">
                                <option value="0" class="text-break">Tất cả trạng thái</option>
                                <option value="active" {{ request()->status == 'active' ? 'selected' : false }}>Đã Kích hoạt
                                </option>
                                <option value="inactive"{{ request()->status == 'inactive' ? 'selected' : false }}>Chưa kích
                                    hoạt</option>
                            </select>

                        </div>

                        <div class="col-3">
                            <select class="form-control" name="group_id">
                                <option value="0">Tất cả nhóm</option>
                                @if (!empty(getAllGroup()))
                                    @foreach (getAllGroup() as $group)
                                        {
                                        <option value="{{ $group->id }}"
                                            {{ request()->group_id == $group->id ? 'selected' : false }}>{{ $group->name }}
                                        </option>
                                        }
                                    @endforeach
                                @endif
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
                        <th class="lead text-center"><a href="/users/?sort-by=name&sort-type={{ $sortType }}">Tên</a>
                        </th>
                        <th class="lead text-center"><a href="/users/?sort-by=email&sort-type={{ $sortType }}">Email
                        </th>
                        <th class="lead text-center">NHÓM</th>
                        <th class="lead text-center">TRẠNG THÁI</th>
                        <th class="lead text-center" width="15%"><a
                                href="/users/?sort-by=create_at&sort-type={{ $sortType }}">Thời Gian</th>
                        <th class="lead text-center" width="5%">Sửa</th>
                        <th class="lead text-center"width="5%">Xóa</th>
                    </thead>
                    <tbody>
                        @if (!empty($list_users))
                            @foreach ($list_users as $user => $value)
                                <tr>
                                    <td>{{ $user + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->group_name }}</td>
                                    <td>
                                        {!! $value->status == 0
                                            ? "<button type='button' class='btn btn-danger btn-sm'>Chưa kích hoạt</button>"
                                            : "<button type='button' class='btn btn-primary btn-sm'>Đã kích hoạt</button>" !!}
                                    </td>
                                    <td>{{ $value->create_at }}</td>
                                    <td><a href="{{ route('users.edit', ['id' => $value->id_user]) }}"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td><a href="{{ route('users.delete', ['id' => $value->id_user]) }}"><i
                                                class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">KHÔNG CÓ USER</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $list_users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
