@extends('home.layout.master') 
@section('content')
    <div class="page-product">
        <h3> blog</h3>
    </div>
    <div class="row mt-4">
        <div class="col-md-10 ">
            @foreach($blogs as $blog)
                <div class="panel panel-default">
                    <div class="row-item row">
                        <div class="col-md-3">
                            <a href="detail.html">
                                <img width="200px" height="140px" class="img-responsive" src="upload/blog/{{$blog->image}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-9">
                            <h3>{{ $blog->title }}</h3>
                            <p>{{ $blog->teaser }}</p>
                            <a class="btn btn-primary" href="/blog/{{ $blog->slug }}">Chi tiet
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                        <div class="break"></div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
    <div class="paginate_product_list">
        {!! $blogs->links() !!}
    </div>
@endsection