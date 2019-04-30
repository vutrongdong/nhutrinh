@extends('home.layout.master') 
@section('content')
    <div class="page-product">
        <h3>{{ $category->title }}</h3>
    </div>
    <div class="row mt-4">
        @foreach($categories_products as $index=>$category_products)
            @foreach($category_products->products as $index2=>$product)
                <div class="col-md-3 col-sm-6 item">
                    <div class="bg">
                        <a href="{{ $category->slug }}/{{ $categories_products[$index]->slug }}/{{ $product->slug }}">
                            <div class="product-image">
                                <img src="upload/product/{{$product->image}}" alt="sp">
                            </div>
                            <div class="product-container">
                                <a href="{{ $category->slug }}/{{ $categories_products[$index]->slug }}/{{ $product->slug }}" class="product-title">
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
        @endforeach
    </div>
@endsection