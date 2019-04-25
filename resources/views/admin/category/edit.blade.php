@extends('admin.layout.index') 
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <h4 class="page-title">
                    Sửa danh mục
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="admin/category/list">Danh mục</a></li>
                    <li class="breadcrumb-item active">Sửa danh mục</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/admin/category/edit/{{ $category->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input value="{{ $category->title }}" class="form-control" name="title" placeholder="Điền tên danh mục" />
                                    <div class="clearFix"></div>
                                    @if( $errors->has('title'))
                                         <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Danh mục cha</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">Chọn danh mục</option>
                                            @foreach($categorySelect as $cate)
                                                @if($category->parent_id == $cate->id)
                                                    <option value="{{ $cate->id }}" selected>{{ $cate->title }}</option>
                                                @else
                                                    <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                </div>
                            </div>
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