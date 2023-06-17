@extends('Frontend.Layouts.main_Admin')
@section('main-content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <p href="#"><b>Danh sách người dùng</b></p>
                </li>

            </ul>
            <div id="clock"></div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">

                            </div>
                            {{-- <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập"
                                    onclick="myFunction(this)"><i class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file" type="button" title="In"
                                    onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button"
                                    title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-excel btn-sm" href="" title="In"><i
                                        class="fas fa-file-excel"></i> Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm pdf-file" type="button" title="In"
                                    onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div> --}}

                        </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th >MKH</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày tạo</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if (Session::has('delete_msg'))
                                        <div class="alert alert-success">{{ Session::get('delete_msg') }}</div>
                                    @endif
                                </tr>

                                @if (!empty($customer))
                                    @foreach ($customer as $item)
                                        <tr>
                                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            {{-- <td>
                                                class="img img-responsive" />
                                                <img src="{{ asset($item->image) }}" width='60' height='60'
                                            </td> --}}
                                            {{-- <td><span class="badge bg-success">Còn hàng</span></td> --}}
                                            {{-- <td>{{ $item->category->name_category }}</td> --}}

                                            <td>
                                                {{-- <a href="{{ route('admin.edit-san-pham', ['id' => $item->id]) }}"><i
                                                        class="fa fa-edit"></i></a> --}}
                                                <a href="{{ route('admin.delete-customer', ['id' => $item->id]) }}"><i
                                                        class="fa fa-trash-alt"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="5">Chưa có sản phẩm</td>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
