@extends('home.layout.master') 
@section('content')
    <div class="page-product">
        <h4>{{ $category_one->title }} / {{ $category_two->title }} / {{ $product_info->title }}</h4>
    </div>
    <div class="row mt-4">
        <div class="container">
          <div class="wrapper row product_detail">
            <div class="details col-md-8 media_mobile_title">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="product-title">{{ $product_info->title }}</h3>
                        <p class="price_detail">
                            <span>Giá: </span>{{number_format($product_info->price, 0, ',', '.').' VNĐ'}}
                        </p>
                    </div>
                    <div class="img-zoom-container" style="float: right;">
                        <img onmousemove="imageZoom('myimage', 'myresult')" id="myimage" src="upload/product/{{$product_info->image}}" width="200" height="145">
                    </div>
                </div>
                <div class="product__descriptions mt-3">
                    <h3 class="tab-list-title"> THÔNG SỐ CHI TIẾT </h3>
                    <div class="">
                        <div class="product-feature">
                            <span class="product-feature__label col-3">Thương hiệu:</span>
                            <div class="product-feature__value col-7"> Vàng Bạc Như Trịnh</div>
                        </div>
                        <div class="product-feature"> <span class="product-feature__label col-3">Loại đá chính:</span>
                            <div class="product-feature__value col-7">CZ</div>
                        </div>
                        <div class="product-feature"> <span class="product-feature__label col-3">Màu đá chính:</span>
                            <div class="product-feature__value col-7">Nhiều màu</div>
                        </div>
                        <div class="product-feature"> <span class="product-feature__label col-3">Hình dạng đá:</span>
                            <div class="product-feature__value col-7">Tròn</div>
                        </div>
                        <div class="product-feature"> <span class="product-feature__label col-3">Giới tính:</span>
                            <div class="product-feature__value col-7">Nữ</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 media_mobile_result">
                <div id="myresult" class="img-zoom-result"></div>
            </div>
          </div>
        </div>
    </div>
@endsection