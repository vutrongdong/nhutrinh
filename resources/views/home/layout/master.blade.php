<!DOCTYPE html>
<html>

<head>
    <title>Trang chủ</title>
    <base href="{{asset('')}}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif" href="home_assets/image/favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="home_assets/bootstrap/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" type="text/css" href="home_assets/style.css">
</head>

<body>
    <div class="container">
        @include('home.layout.menu')
        @include('home.layout.slide')
        @yield('content')
    </div>
    <!-- Footer -->
    @include('home.layout.footer')
    <!-- Load jquery trước khi load bootstrap js -->
    <script src="home_assets/jquery-3.3.1.min.js"></script>
    <script src="home_assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>