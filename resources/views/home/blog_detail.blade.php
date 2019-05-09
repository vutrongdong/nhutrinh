@extends('home.layout.master') 
@section('content')
    <div class="col-md-12 mt-2">
        <div class="page-product">
            <h4> Blog / {{ $blog->title }}</h4>
            <hr>
        </div>
        <p>
            <span class="glyphicon glyphicon-time"></span> 
            <small><i>Đăng lúc: {{ \Carbon\Carbon::parse($blog->created_at)->format('H:i - d/m/Y')}} </i> / </small>
            <small><i>Số lượt xem: {{ $blog->view }}</i></small>
        </p>
        <p>
            {!! $blog->teaser !!}
        </p>
        <div class="text-center">
          <img width="50%" src="upload/blog/{{$blog->image}}" alt="">
        </div>
        <p class="lead">
            {!! $blog->content !!}
        </p>
        <hr>
    </div>
@endsection