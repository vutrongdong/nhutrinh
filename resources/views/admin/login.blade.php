@extends('layouts.app')
@section('content')
    <div>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="card-box">
                <div class="p-20">
                    @if(session('error'))
                      <div class='alert alert-danger'>
                          {{session('error')}}
                      </div>
                    @endif
                    <form class="form-horizontal m-t-20" method="POST" action="login">
                        @csrf
                        <h2>ĐĂNG NHẬP</h2>
                        <div class="form-group ">
                            <div class="col-12">
                                <label for='name'>Tên người dùng</label>
                                <input id="name" type="name" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for='password'>Mật khẩu</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-6" style='margin: 0 auto;'>
                                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
                                    Đăng nhập
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
