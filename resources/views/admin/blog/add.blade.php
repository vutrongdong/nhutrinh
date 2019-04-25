@extends('admin.layout.index') 
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <h4 class="page-title">
                    Tạo mới sản phẩm
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="admin/product/list">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Tạo mới sản phẩm</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="admin/product/add" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-right" for="title">Tên sản phẩm (<span class="text-danger">*</span>)</label>
                                    <input type="text" id="title" placeholder="Nhập tên" name="title"  class="form-control">
                                    @if( $errors->has('title'))
                                         <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="text-right" for="code"> Mã sản phẩm (<span class="text-danger">*</span>)</label>
                                    <input type="text" id="code" name="code" class="form-control" placeholder="Nhập mã">
                                    @if( $errors->has('code'))
                                         <p class="text-danger">{{ $errors->first('code') }}</p>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="text-right" for="category"> Danh mục cha (<span class="text-danger">*</span>)</label>
                                        
                                        <div class="clearFic"></div>
                                    </div>
                                    <div class="col-6">
                                        <label class="text-right" for="price"> Giá bán (<span class="text-danger">*</span>)</label>
                                        <input type="number" id="price" name="price" class="form-control" placeholder="Nhập mã">
                                        @if( $errors->has('price'))
                                            <p class="text-danger">{{ $errors->first('price') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-right" for="image" style="margin-top: 6px;">Ảnh (<span class="text-danger">*</span>)</label>
                                    <div class="upload">
                                        <label>
                                            <input class="form-control" id="image" type="file" name="image">
                                            <div class="clearfix"></div>
                                        </label>
                                    </div>
                                    @if( $errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-right" for="note">Mô tả ngắn</label>
                                    <textarea rows="12" id="note" class="form-control" name="note" placeholder="Mô tả ngắn"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label>Trạng thái</label>
                                        <div class="checkbox checkbox-success">
                                            <input id="active" type="checkbox" checked>
                                            <label for="active">
                                                Hiển thị
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="date">Chọn năm</label>
                                        <select class="form-control" name="date">
                                            <option value="null">Chọn năm</option>
                                            <option> Năm </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-info">Làm mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection