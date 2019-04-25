@extends('admin.layout.index') 
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <h4 class="page-title">
                    Tạo mới danh mục
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="admin/category/list">Danh mục</a></li>
                    <li class="breadcrumb-item active">Tạo mới danh mục</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="admin/category/add" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-right" for="title">Tên (<span class="text-danger">*</span>)</label>
                                    <input value="{{ old('title') }}" class="form-control" name="title" placeholder="Điền tên danh mục" />
                                    @if( $errors->has('title'))
                                         <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                <label>Danh mục cha</label>
                                    <select value="{{ old('parent_id') }}" class="form-control" name="parent_id">
                                        <option value="0">Chọn danh mục</option>
                                        @foreach($categorySelect as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-info">Làm mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection