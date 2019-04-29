<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Product </title>

    <!-- Fonts -->
    <base href="{{asset('')}}" />
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin_assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="admin_assets/css/icons.css">
    <link rel="stylesheet" type="text/css" href="admin_assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="admin_assets/css/muilty_select.css">
    <link rel="stylesheet" type="text/css" href="admin_assets/plugins/sweet-alert2/sweetalert2.min.css">
     <!-- jQuery -->
    <script src="js/muilty_select.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="admin_assets/js/jquery/dist/jquery.min.js"></script>
    <script src="admin_assets/js/modernizr.min.js"></script>
    <script src="admin_assets/ckeditor/ckeditor.js" ></script>
</head>
<body class="fixed-left">
    <div id="wrapper">
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="{{ url('/admin') }}" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Product</span></a>
                </div>
            </div>
            <nav class="navbar-custom">
                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="admin_assets/images/avata.jpg" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown " style="width: 200px;" aria-labelledby="Preview">
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small><i class="fas fa-user"></i> Hi, {{Auth::user()->name}}  </small> </h5>
                            </div>
                            <a class="dropdown-item notify-item" href="admin/user/reset_pass/{{Auth::user()->id}}">
                                <i class="fas fa-key"></i> {{ __('Thay đổi mật khẩu') }}
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="md md-settings-power"></i> <span>{{ __('Đăng xuất') }}</span>
                                <form id="logout-form" action="logout" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-light waves-effect">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>

                        <li class="text-muted menu-title" style="padding-left: 30px !important;">{{ __('Menu') }}</li>

                        <li class="has_sub">
                            <a class="dropdown-item notify-item" href="/admin"><i class="ti-home"></i> {{ __('Bảng điều khiển') }}</a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-rss-alt"></i> <span> {{ __('Dự án') }} </span> <span class="menu-arrow"></span> </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="/admin/category/list">{{ __('Danh mục') }}</a>
                                </li>
                                <li>
                                    <a href="/admin/product/list">{{ __('Sản phẩm') }}</a>
                                </li>
                                <li>
                                    <a href="/admin/blog/list">{{ __('Bài viết') }}</a>
                                </li>
                                <li>
                                    <a href="/admin/slide/list">{{ __('Slide') }}</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i> <span> {{ __('Cài đặt') }} </span> <span class="menu-arrow"></span> </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="/admin/user/list">{{ __('Tài khoản') }}</a>
                                </li>
                                <li>
                                   <a href="/admin/setting/">{{ __('Cấu hình website') }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->

        <main>
            <div class="content-page">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <script>
        var resizefunc = [];
    </script>
    <script src="js/app.js"></script>
    <script src="js/site.js"></script>
    <script>
        if(document.getElementById('selectWhenAdd')) {
            document.multiselect('#selectWhenAdd');
        }
    </script>
    @yield('script')
</body>
</html>