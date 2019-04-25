@extends('admin.layout.index')
@section('content')
    <div class="row container">
        <div class="col-12">
            <h4 class="page-title">Bảng điều khiển</h4>
            <p class="text-muted page-title-alt">Chào mừng bạn đã đăng nhập trang quản trị!</p>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-info pull-left">
                            <i class="md md-attach-money text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">31,570</b></h3>
                            <p class="text-muted mb-0">Total Revenue</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-pink pull-left">
                            <i class="md md-add-shopping-cart text-pink"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">280</b></h3>
                            <p class="text-muted mb-0">Today's Sales</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-purple pull-left">
                            <i class="md md-equalizer text-purple"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">0.16</b>%</h3>
                            <p class="text-muted mb-0">Conversion</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-success pull-left">
                            <i class="md md-remove-red-eye text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">64,570</b></h3>
                            <p class="text-muted mb-0">Today's Visits</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection