@extends('admin.layout.index') 
@section('content')
    <div class="row">
        <div class="col-12 container">
            <div style="margin-left: 15px;">
                <h4 class="page-title">
                    Sửa slide
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="admin/slide/list">Slide</a></li>
                    <li class="breadcrumb-item active">Sửa slide</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-body">
                    @if(session('thongbao'))
                            <div class='alert alert-success'>
                                {{session('thongbao')}}
                            </div>                          
                        @endif
                        @if(session('loi'))
                            <div class='alert alert-danger'>
                                {{session('loi')}}
                            </div>
                    @endif
                    <form action="admin/slide/edit/{{$slide->title}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="row">
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="title" placeholder="Điền tiêu đề slide" value="{{$slide->title}}" />
                                <div class="clearFix"></div>
                                @if( $errors->has('title'))
                                     <p style="color: red;">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Hình ảnh</label>
                                    <input onchange="handerSelectImage($event)" class="form-control" type="file" name="image" />
                                </div>
                            </div>
                            <p>
                                <img src="upload/slide/{{$slide->image}}" width="100%" />
                            </p>
                            <button type="submit" class="btn btn-success">Lưu lại</button>
                        </div>
                    <form>
                </div>
            </div>
        </div>
    </div>
@endsection