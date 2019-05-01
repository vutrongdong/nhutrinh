@extends('home.layout.master') 
@section('content')
    <div class="page-product">
        <h3>{{ $category_one->title }} / {{ $category_two->title }}</h3>
    </div>
    <div class="row mt-4">
        @foreach($category_product as $index=>$product)
            <div class="col-md-3 col-sm-6 item">
                <div class="bg">
                    <a href="{{ $category_one->slug }}/{{ $category_two->slug }}/{{ $product->slug }}">
                        <div class="product-image">
                            <img width="200px" height="200px" src="upload/product/{{$product->image}}" alt="sp">
                        </div>
                        <div class="product-container">
                            <a href="{{ $category_one->slug }}/{{ $category_two->slug }}/{{ $product->slug }}" class="product-title">
                                {{ $product->title }}
                            </a>
                            <div class="new-price text-center">
                                <span class="price">
                                    {{number_format($product->price, 0, ',', '.').' VNĐ'}}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="paginate_product_list">
        {!! $category_product->links() !!}
    </div>
@endsection