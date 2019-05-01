@extends('admin.layout.index') 
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <h4 class="page-title">
                    Sửa bài viết
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="admin/blog/list">Bài viết</a></li>
                    <li class="breadcrumb-item active">Sửa bài viết</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="admin/blog/edit/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-right" for="title">Tên bài viết (<span class="text-danger">*</span>)</label>
                                    <input value="{{ $blog->title }}" type="text" id="title" placeholder="Nhập tên" name="title"  class="form-control">
                                    @if( $errors->has('title'))
                                         <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="text-right" for="category_id"> Danh mục cha (<span class="text-danger">*</span>)</label>
                                    <select disabled class="form-control" name="category_id">
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    </select>
                                    @if( $errors->has('category_id'))
                                         <p class="text-danger">{{ $errors->first('category_id') }}</p>
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
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <div class="checkbox checkbox-success">
                                        <input name="active" id="active" type="checkbox" {{ $blog->active == 1 ? 'checked':'' }}>
                                        <label for="active">
                                            Hiển thị
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-right" for="teaser">Mô tả ngắn</label>
                                    <textarea rows="12" id="teaser" class="form-control" name="teaser" placeholder="Mô tả ngắn">{{ $blog->teaser }}</textarea>
                                    @if( $errors->has('teaser'))
                                        <p class="text-danger">{{ $errors->first('teaser') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p>
                            <img src="upload/blog/{{$blog->image}}" width="100%"/>
                        </p>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" class="form-control ckeditor" rows="3">{{ $blog->content }}</textarea>
                            @if( $errors->has('content'))
                                <p class="text-danger">{{ $errors->first('content') }}</p>
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