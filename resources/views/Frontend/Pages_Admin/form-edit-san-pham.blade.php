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
                <li class="breadcrumb-item">Danh sách sản phẩm</li>
                <li class="breadcrumb-item"><a href="#">Cập nhật sản phẩm</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Cập nhật sản phẩm</h3>

                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i
                                        class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
                                        class="fas fa-folder-plus"></i> Thêm danh mục</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i
                                        class="fas fa-folder-plus"></i> Thêm tình trạng</a>
                            </div>
                        </div>

                        <form class="row" action="{{ route('admin.add-Product-Post') }}" method="POST"
                            enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                            <div class="form-group col-md-3">
                                <label class="control-label">Mã sản phẩm </label>
                                @error('code_product')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" name="code_product"
                                    value="{{ old('code_product') ?? $productDetail->code_product }}" type="number"
                                    placeholder="">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="control-label">Tên sản phẩm</label>
                                @error('name')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" value="{{ old('name') ?? $productDetail->name }}"
                                    name="name" type="text">
                            </div>



                            <div class="form-group  col-md-3">
                                <label class="control-label">Số lượng</label>
                                @error('quantity')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" value="{{ old('quantity') ?? $productDetail->quantity }}"
                                    name="quantity" type="number">
                            </div>

                            <div class="form-group col-md-3 ">
                                <label for="exampleSelect1" class="control-label">Tình trạng</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>-- Chọn tình trạng --</option>
                                    <option>Còn hàng</option>
                                    <option>Hết hàng</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleSelect1" class="control-label">Danh mục</label>
                                @error('category')
                                    {{ $message }}
                                @enderror
                                <select class="form-control" name="category">
                                    @if ($categoryList)
                                    <option>-- Chọn danh mục --</option>
                                        @foreach ($categoryList as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category') == $item->id || $productDetail->category_id == $item->id ? 'selected' : false }}>
                                                {{ $item->name_category }}</option>
                                        @endforeach
                                    @endif
                                </select>
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
                                <label class="control-label">Giá bán</label>
                                @error('price')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" value="{{ old('price') ?? $productDetail->quantity }}" name="price" type="text">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Giá vốn</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Ảnh sản phẩm</label>
                                <div id="myfileupload">
                                    <input type="file" id="uploadfile" value="{{ old('photo') ?? $productDetail->image }}" name="photo"
                                        onchange="readURL(this);" accept="image/*"/>
                                        <label for="oldImage">Ảnh hiện tại</label>
                                        <img src="{{ old('photo') ?? $productDetail->image }}" name ="oldImage" alt="ảnh sản phẩm {{ $productDetail->name }}" width="120px" >
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
                                <label class="control-label">Mô tả sản phẩm</label>
                                @error('mota')
                                    {{ $message }}
                                @enderror
                                <textarea class="form-control"  name="mota" >{{ old('mota') ?? $productDetail->description }}</textarea>
                               
                                <script>
                                    CKEDITOR.replace('mota');
                                </script>
                            </div>
                    </div>
                    @csrf
                    <button class="btn btn-save">Lưu lại</button>
                    <a class="btn btn-cancel" href="{{ route('admin.table-data-product') }}">Hủy bỏ</a>
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

                <form action="{{ route('admin.add-category-post') }}" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group  col-md-12">
                                <span class="thong-tin-thanh-toan">
                                    <h5>Thêm mới danh mục </h5>
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
                                <label class="control-label">Danh mục sản phẩm hiện đang có</label>
                                <ul style="padding-left: 20px;">
                                    @if ($categoryList)
                                        @foreach ($categoryList as $item)
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

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                                <h5>Thêm mới tình trạng</h5>
                            </span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nhập tình trạng mới</label>
                            <input class="form-control" type="text" required>
                        </div>
                    </div>
                    <BR>
                    <button class="btn btn-save" type="button">Cập nhật</button>
                    <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                    <BR>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
@endsection
