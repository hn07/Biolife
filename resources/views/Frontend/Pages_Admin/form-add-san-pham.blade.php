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
                <li class="breadcrumb-item"><a href="{{ route('admin.table-data-product') }}">Danh sách sản phẩm</a></li>
                <li class="breadcrumb-item">Thêm sản phẩm</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo mới sản phẩm</h3>

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
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addnhacungcap"><i
                                        class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
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
                                <input class="form-control" name="code_product" value=" {{ old('code_product') }}"
                                    type="text" placeholder="">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="control-label">Tên sản phẩm</label>
                                @error('name')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" value="{{ old('name') }}" name="name" type="text">
                            </div>



                            <div class="form-group  col-md-3">
                                <label class="control-label">Số lượng</label>
                                @error('quantity')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" value="{{ old('quantity') }}" name="quantity" type="number">
                            </div>

                            <div class="form-group col-md-3 ">
                                <label for="exampleSelect1" class="control-label">nhà cung cấp</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>-- Chọn nhà cung cấp --</option>
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
                                    <option>-- Chọn danh mục --</option>
                                    @if ($categoryList)
                                        @foreach ($categoryList as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name_category }}</option>
                                        @endforeach
                                    @endif


                                </select>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label for="exampleSelect1" class="control-label">Nhà cung cấp</label>
                                <select class="form-control" id="exampleSelect1" name="supplier">
                                    <option>-- Chọn nhà cung cấp --</option>
                                    @if ($supplier)
                                    @foreach ($supplier as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('supplier') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name_supplier }}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Giá bán</label>
                                @error('price')
                                    {{ $message }}
                                @enderror
                                <input class="form-control" value="{{ old('price') }}" name="price" type="text">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Giá vốn</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Ảnh sản phẩm</label>
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
                                        ảnh đại diện sản phẩm</a>
                                    <p style="clear:both"></p>
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="images" class=" mt-4">Thêm ảnh phụ</label>
                                <input type="file" class="form-control" name="images[]" multiple accept="image/*"
                                    id="images">
                            </div>

                            <div id="preview-images"></div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Mô tả sản phẩm</label>
                                @error('mota')
                                    {{ $message }}
                                @enderror
                                <textarea class="form-control" name="mota" id="desc">{{ old('mota') }}</textarea>
                                <script>
                                    CKEDITOR.replace('mota');
                                </script>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Lợi ích và ứng dụng</label>
                                @error('beneficial')
                                    {{ $message }}
                                @enderror
                                <textarea class="form-control" name="beneficial" id="desc">{{ old('beneficial') }}</textarea>
                                <script>
                                    CKEDITOR.replace('beneficial');
                                </script>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Hướng dẫn sử dụng</label>
                                @error('User_manual')
                                    {{ $message }}
                                @enderror
                                <textarea class="form-control" name="User_manual" id="desc">{{ old('User_manual') }}</textarea>
                                <script>
                                    CKEDITOR.replace('User_manual');
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
                                <input class="form-control" name="descCategory" type="text">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Danh mục sản phẩm hiện đang có</label>
                                <ul style="padding-left: 20px;">
                                    @if ($categoryList)
                                        @foreach ($categoryList as $item)
                                            <li><a href="{{ route('admin.xoa-danh-muc-san-pham', ['id' => $item->id]) }}">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a> {{ $item->name_category }} </i>
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



    {{-- MODAL nhà cung cấp --}}
    <div class="modal fade" id="addnhacungcap" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.add-supplier-post') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group  col-md-12">
                                <span class="thong-tin-thanh-toan">
                                    <h5>Thêm mới nhà cung cấp</h5>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Nhập nhà cung cấp mới</label>
                                <input class="form-control" name="supplier" type="text" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Mô tả nhà cung cấp mới</label>
                                <input class="form-control" name="descSupplier" type="text">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Nhà cung cấp hiện đang có</label>
                                <ul style="padding-left: 20px;">
                                    @if ($supplier)
                                        @foreach ($supplier as $item)
                                            <li><a href="{{ route('admin.xoa-nha-cung-cap-san-pham', ['id' => $item->id]) }}">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a> {{ $item->name_supplier }} </i>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <BR>
                        <button class="btn btn-save" >Lưu lại</button>
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
@section('javascript')
    <script>
        document.getElementById("images").addEventListener("change", function() {
            var previewImages = document.getElementById("preview-images");
            previewImages.innerHTML = "";
            for (var i = 0; i < this.files.length; i++) {
                var file = this.files[i];
                var reader = new FileReader();
                reader.addEventListener("load", function() {
                    var image = document.createElement("img");
                    image.src = reader.result;
                    image.style.maxWidth = "300px";
                    previewImages.appendChild(image);
                }, false);
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
