@extends('admin.layout.index') 
@section('content')
    <div class="row container">
        <div class="col-12">
            <h4 class="page-title">
                Cài đặt trang web
            </h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active"> Cài đặt</li>
            </ol>
            <div class="card">
                @if(session('thongbao'))
                    <div class='alert alert-success'>
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal"  action="admin/setting/update" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group row">
                                    <label class="col-2 col-form-label text-right" for="setting_title">Tiêu đề website(<span class="text-danger">*</span>)</label>
                                    <div class="col-7">
                                        <input value="{{ $setting->title }}" type="text" name="title" id="setting_title" class="form-control" placeholder="Nhập tiêu đề trang web">
                                        @if( $errors->has('title'))
                                             <p class="text-danger">{{ $errors->first('title') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label text-right" for="setting_description">Mô tả website(<span class="text-danger">*</span>)</label>
                                    <div class="col-7">
                                        <textarea id="setting_description" name="description" class="form-control" placeholder="Nhập mô tả">{{ $setting->description }}</textarea>
                                        @if( $errors->has('description'))
                                             <p class="text-danger">{{ $errors->first('description') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label text-right" for="setting_company_name">Tên công ty(<span class="text-danger">*</span>)</label>
                                    <div class="col-7">
                                        <input value="{{ $setting->name }}" type="text" name="name" id="setting_company_name" class="form-control" placeholder="Nhập tên công ty">
                                        @if( $errors->has('name'))
                                             <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label text-right" for="setting_company_addr">Địa chỉ(<span class="text-danger">*</span>)</label>
                                    <div class="col-7">
                                        <input value="{{ $setting->address }}" type="text" name="address" id="setting_company_addr" class="form-control" placeholder="Nhập địa chỉ">
                                        @if( $errors->has('address'))
                                             <p class="text-danger">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label text-right" for="setting_company_phone">Số điện thoại(<span class="text-danger">*</span>)</label>
                                    <div class="col-7">
                                        <input value="{{ $setting->phone }}" type="number" id="setting_company_phone" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                                        @if( $errors->has('phone'))
                                             <p class="text-danger">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label text-right" for="setting_company_email">Email(<span class="text-danger">*</span>)</label>
                                    <div class="col-7">
                                        <input value="{{ $setting->email }}" type="text" name="email" id="setting_company_email" class="form-control" placeholder="Nhập Email">
                                        @if( $errors->has('email'))
                                             <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label text-right" for="setting_company_tax">Mã số thuế</label>
                                    <div class="col-7">
                                        <input value="{{ $setting->tax_number }}" name="tax_number" type="text" id="setting_company_tax" class="form-control" placeholder="Nhập mã số thuế doanh nghiệp">
                                        @if( $errors->has('tax_number'))
                                             <p class="text-danger">{{ $errors->first('tax_number') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label text-right" for="setting_company_bank">Tài khoản ngân hàng</label>
                                    <div class="col-7">
                                        <textarea name="bank" id="setting_company_bank" class="form-control" placeholder="Nhập thông tin tài khoản ngân hàng">{{ $setting->bank }}</textarea>
                                        @if( $errors->has('bank'))
                                             <p class="text-danger">{{ $errors->first('bank') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label text-right" for="setting_company_fb">Facebook</label>
                                    <div class="col-7">
                                        <input value="{{ $setting->facebook }}" name="facebook" type="text" id="setting_company_fb" class="form-control" placeholder="Nhập link facebook fanpage">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-7 offset-2">
                                        <button type="submit" class="btn btn-default"><i class="ti-save"></i> Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection