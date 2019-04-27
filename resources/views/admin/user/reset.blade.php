@extends('admin.layout.index') 
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <h4 class="page-title">
                    Đổi mật khẩu
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item active">Đổi mật khẩu</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                @if(session('thongbao'))
                    <div class='alert alert-success'>
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="card-body">
                    <form action="admin/user/reset_pass/{{ $user->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                <label>Mật khẩu (<span class="text-danger">*</span>)</label>
                                    <input class="form-control" name="password" placeholder="Nhập mật khẩu" />
                                    @if( $errors->has('password'))
                                         <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                <label>Nhập lại mật khẩu (<span class="text-danger">*</span>)</label>
                                    <input class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" />
                                    @if( $errors->has('password_confirmation'))
                                         <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection