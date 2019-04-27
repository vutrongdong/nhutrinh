@extends('admin.layout.index') 
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <h4 class="page-title">
                    Sửa người dùng
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="admin/user/list">Người dùng</a></li>
                    <li class="breadcrumb-item active">Sửa người dùng</li>
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
                    <form action="admin/user/edit/{{ $user->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text-right" for="name">Tên (<span class="text-danger">*</span>)</label>
                                    <input value="{{ $user->name }}" class="form-control" name="name" placeholder="Nhập tài khoản" />
                                    @if( $errors->has('name'))
                                         <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
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