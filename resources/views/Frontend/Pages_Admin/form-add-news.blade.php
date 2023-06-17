@extends('Frontend.Layouts.main_Admin')
@section('main-content')
    <style>
        .Choicefile {
            display: block;
            background: #14142B;
            border: 1px solid #fff;
            color: #fff;
            width: 150px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            padding: 5px 0px;
            border-radius: 5px;
            font-weight: 500;
            align-items: center;
            justify-content: center;
        }

        .Choicefile:hover {
            text-decoration: none;
            color: white;
        }

        #uploadfile,
        .removeimg {
            display: none;
        }

        #thumbbox {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .removeimg {
            height: 25px;
            position: absolute;
            background-repeat: no-repeat;
            top: 5px;
            left: 5px;
            background-size: 25px;
            width: 25px;
            /* border: 3px solid red; */
            border-radius: 50%;

        }

        .removeimg::before {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            content: '';
            border: 1px solid red;
            background: red;
            text-align: center;
            display: block;
            margin-top: 11px;
            transform: rotate(45deg);
        }

        .removeimg::after {
            /* color: #FFF; */
            /* background-color: #DC403B; */
            content: '';
            background: red;
            border: 1px solid red;
            text-align: center;
            display: block;
            transform: rotate(-45deg);
            margin-top: -2px;
        }
    </style>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.table-data-product') }}">Danh sách bài viết</a></li>
                <li class="breadcrumb-item">Thêm bài viết</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo mới bài viết</h3>

                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i
                                        class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
                                        class="fas fa-folder-plus"></i> Thêm danh mục bài viết</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i
                                        class="fas fa-folder-plus"></i> Thêm tình trạng</a>
                            </div>
                        </div>

                        <form class="row" action="{{ route('admin.add-news-post') }}" method="POST"
                            enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                            <div class="form-group col-md-3">
                                <label class="control-label">Mã sản bài viết </label>
                                @error('code_news')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" name="code_news" value="{{ old('code_news') }}"
                                    type="number" placeholder="">
                            </div>
                            <div class="form-group col-md-3">
                                {{-- cần chỉnh sửa --}}
                                <label for="exampleSelect1" class="control-label">Danh mục bài viết</label>
                                @error('category_news')
                                    {{ $message }}
                                @enderror
                                <select class="form-control" name="category_news">
                                    <option>-- Chọn danh mục --</option>
                                    @if ($categoryNewsList)
                                        @foreach ($categoryNewsList as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category_news') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name_category }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Tiêu đề bài viết</label>
                                @error('title')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" value="{{ old('title') }}" name="title" type="text">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="control-label">Tác giả</label>
                                @error('author')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" value="{{ old('author') }}" name="author" type="text">
                            </div>
                            <div class="form-group col-md-3 ">
                                <label for="exampleSelect1" class="control-label">Nhà cung cấp</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>-- Chọn nhà cung cấp --</option>
                                    <option>Phong vũ</option>
                                    <option>Thế giới di động</option>
                                    <option>FPT</option>
                                    <option>Võ Trường</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">                               
                                <label for="exampleSelect1" class="control-label">Danh mục sản phẩm</label>
                                @error('category_product')
                                    {{ $message }}
                                @enderror
                                <select class="form-control" name="category_product">
                                    <option>-- Chọn danh mục --</option>
                                    @if ($categoryList)
                                        @foreach ($categoryList as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category_product') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name_category }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">                               
                                <label for="exampleSelect1" class="control-label">Trạng thái bài viết</label>
                                @error('statusNews')
                                    {{ $message }}
                                @enderror
                                <select class="form-control" name="statusNews">
                                    <option>-- Chọn danh mục --</option>
                                    @if ($StatusList)
                                        @foreach ($StatusList as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('statusNews') == $item->id ? 'selected' : '' }}>
                                                {{ $item->status_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            
                            <div class="form-group  col-md-3">
                                <label class="control-label">Trích dẫn</label>
                                @error('quote')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" value="{{ old('quote') }}" name="quote" type="text">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Ảnh đại diện bài viết</label>
                                <div id="myfileupload">
                                    <input type="file" id="uploadfile" value="{{ old('photo') }}" name="photo"
                                        onchange="readURL(this);" />

                                </div>
                                <div id="thumbbox">
                                    <img height="450" width="400" alt="Thumb image" id="thumbimage"
                                        style="display: none" />
                                    <a class="removeimg" href="javascript:"></a>
                                </div>
                                <div id="boxchoice">
                                    <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn
                                        ảnh</a>
                                    <p style="clear:both"></p>
                                </div>

                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Nội dung bài viết</label>
                                @error('mota')
                                    {{ $message }}
                                @enderror
                                <textarea class="form-control" name="mota" id="desc">{{ old('mota') }}</textarea>
                                <script>
                                    CKEDITOR.replace('mota');
                                </script>
                            </div>

                    </div>
                    @csrf
                    <button class="btn btn-save">Lưu lại</button>
                    <a class="btn btn-cancel" href="{{ route('admin.table-data-news') }}">Hủy bỏ</a>
                    </form>
                </div>
    </main>


    {{-- MODAL CHỨC VỤ --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                                <h5>Thêm mới nhà cung cấp</h5>
                            </span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nhập tên chức vụ mới</label>
                            <input class="form-control" type="text" required>
                        </div>
                    </div>
                    <BR>
                    <button class="btn btn-save" type="button">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                    <BR>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL --}}



    {{-- MODAL DANH MỤC --}}
    <div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <form action="{{ route('admin.add-categoryNews-post') }}" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group  col-md-12">
                                <span class="thong-tin-thanh-toan">
                                    <h5>Thêm danh mục bài viết mới</h5>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Nhập tên danh mục mới</label>
                                <input class="form-control" name="addCategory" type="text" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Mô tả danh mục mới</label>
                                <input class="form-control" name="descCategory" type="text" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Danh mục bài viết hiện đang có</label>
                                <ul style="padding-left: 20px;">
                                    @if ($categoryNewsList)
                                        @foreach ($categoryNewsList as $item)
                                            <li>{{ $item->name_category }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <BR>
                        @csrf
                        <button class="btn btn-save">Lưu lại</button>
                        <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                        <BR>
                    </div>
                </form>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL --}}



    {{-- MODAL TÌNH TRẠNG --}}
    <div class="modal fade" id="addtinhtrang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <form action="{{ route('admin.add-status-News-post') }}" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group  col-md-12">
                                <span class="thong-tin-thanh-toan">
                                    <h5>Thêm trạng thái bài viết</h5>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Nhập tên trạng thái mới</label>
                                <input class="form-control" name="status_name" type="text" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Mô tả trạng thái mới</label>
                                <input class="form-control" name="desc_status" type="text" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Trạng thái bài viết hiện đang có</label>
                                <ul style="padding-left: 20px;">
                                    @if ($StatusList)
                                        @foreach ($StatusList as $item)
                                            <li>{{ $item->status_name }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <BR>
                        @csrf
                        <button class="btn btn-save">Lưu lại</button>
                        <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                        <BR>
                    </div>
                </form>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
@endsection
