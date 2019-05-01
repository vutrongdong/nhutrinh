@extends('admin.layout.index') 
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <h4 class="page-title">
                    Sửa sản phẩm
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="admin/product/list">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Sửa sản phẩm</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                @if(session('errorCheck'))
                    <div class='alert alert-danger'>
                        {{session('errorCheck')}}
                    </div>
                @endif
                <div class="card-body">
                    <form action="admin/product/edit/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-right" for="title">Tên sản phẩm (<span class="text-danger">*</span>)</label>
                                    <input value="{{ $product->title }}" type="text" id="title" placeholder="Nhập tên" name="title"  class="form-control">
                                    @if( $errors->has('title'))
                                         <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="text-right" for="code"> Mã sản phẩm (<span class="text-danger">*</span>)</label>
                                    <input value="{{ $product->code }}" type="text" id="code" name="code" class="form-control" placeholder="Nhập mã">
                                    @if( $errors->has('code'))
                                         <p class="text-danger">{{ $errors->first('code') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="text-right" for="image" style="margin-top: 6px;">Ảnh (<span class="text-danger">*</span>)</label>
                                    <div class="upload">
                                        <label>
                                            <input class="form-control" id="image" type="file" name="image">
                                            <div class="clearfix"></div>
                                        </label>
                                    </div>
                                    <p>
                                        <img style="width: 200px;" src="upload/product/{{$product->image}}"/>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-right" for="category"> Danh mục cha (<span class="text-danger">*</span>)</label><br>
                                    <select name="categories[]" multiple="multiple" id="selectWhenAdd">
                                        @foreach($category_product as $category)
                                            <option value="{{ $category->id }}" {{ (in_array($category->id, $cate_selected)) ? 'selected':'' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="clearFix"></div>
                                    @if( $errors->has('category'))
                                         <p class="text-danger">{{ $errors->first('category') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="text-right" for="price"> Giá bán (<span class="text-danger">*</span>)</label>
                                    <input value="{{ $product->price }}" type="number" id="price" name="price" class="form-control" placeholder="Nhập giá">
                                    @if( $errors->has('price'))
                                        <p class="text-danger">{{ $errors->first('price') }}</p>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="date">Chọn năm</label>
                                        <select class="form-control" name="date">
                                            <option value="0">Chọn năm</option>
                                            @foreach($dates as $date)
                                                @if($product->date == $loop->iteration)
                                                    <option value="{{ $loop->iteration }}" selected>{{ $date }}</option>
                                                @else
                                                    <option value="{{ $loop->iteration }}">{{ $date }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label>Trạng thái</label>
                                        <div class="checkbox checkbox-success">
                                            <input name="active" id="active" type="checkbox" {{ $product->active ? 'checked':''}}>
                                            <label for="active">
                                                Hiển thị
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <textarea name="note" class="form-control ckeditor" rows="3">{{ $product->note }}</textarea>
                            @if( $errors->has('note'))
                                <p class="text-danger">{{ $errors->first('note') }}</p>
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Lưu lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection