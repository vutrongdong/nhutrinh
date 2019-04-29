@extends('home.layout.master') 
@section('content')
    <div>
        <div class="row pb-2">
            <div class="col-lg-8 text-center">
                <div class="charme">
                    <div class="row">
                        <div id="img" class="col-lg-4 mg-vertical">
                            <img src="home_assets/image/product1.png" alt="" />
                            <p class="price">400.400</p>
                        </div>
                        <div id="" class="col-lg-5 p-lg-auto pb-20">
                            <p class="title">CHARME PHONG THỦY</p>
                            <p class="detail-product">Mang lại cho bạn 1 phong cách hoàn toàn khác biệt</p>
                            <button type="button" class="btn">XEM THÊM</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="search" class="col-lg-4 search">
                <p class="title text-center">
                    TÌM KIẾM SẢN PHẨM<br>
                    PHÙ HỢP VỚI ĐỘ TUỔI
                </p>
                <select id="inputSearch" class="form-control">
                    <option>1995</option>
                    <option>1997</option>
                    <option>1999</option>
                    <option>2015</option>
                    <option>2019</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-sm-6 col-md-4 col-xl-4 mb-1 pb-1 infoCategories">
            <div class="">
                <img src="home_assets/image/product4.png" alt="" width="200px">
                <p class="title">
                    TRANG SỨC VÀNG 24K
                </p>
                <p class="summary color-text">
                    Mang lại cho bạn 1 phong cách hoàn toàn khác biệt
                </p>
                <button type="button" class="btn mb-2">XEM THÊM</button>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-4 mb-1 pb-1 infoCategories">
            <div class="">
                <img src="home_assets/image/product4.png" alt="" width="200px">
                <p class="title">
                    TRANG SỨC VÀNG 24K
                </p>
                <p class="summary color-text">
                    Mang lại cho bạn 1 phong cách hoàn toàn khác biệt
                </p>
                <button type="button" class="btn mb-2">XEM THÊM</button>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-4 mb-1 pb-1 infoCategories">
            <div class="">
                <img src="home_assets/image/product4.png" alt="" width="200px">
                <p class="title">
                    TRANG SỨC VÀNG 24K
                </p>
                <p class="summary color-text">
                    Mang lại cho bạn 1 phong cách hoàn toàn khác biệt
                </p>
                <button type="button" class="btn mb-2">XEM THÊM</button>
            </div>
        </div>
    </div>
    <div class="h-100">
        <div class="row pb-2">
            <div class="col-lg-4 text-center mb-small-1 pb-small-1">
                <div id="infoCate" class="">
                    <img src="home_assets/image/product3.png" alt="" width="200px" />
                    <p class="price">5.000.000 <span>VND</span></p>
                    <p class="font-weight-bold color-text">
                        TRANG SỨC CƯỚI
                    </p>
                    <button type="button" class="btn mb-2">CHI TIẾT</button>
                </div>
            </div>
            <div class="col-lg-8 text-center">
                <div class="product">
                    <div class="row">
                        <div id="img" class="col-lg-4 mg-vertical">
                            <img src="home_assets/image/product3.png" alt="" width="200px" />
                            <p class="price">400.40000</p>
                        </div>
                        <div id="" class="col-lg-5 p-lg-auto pb-20">
                            <p class="title">CHARME PHONG THỦY</p>
                            <p class="detail-product">Mang lại cho bạn 1 phong cách hoàn toàn khác biệt</p>
                            <button type="button" class="btn">XEM THÊM</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="home_assets/image/lala.png" alt="" width="100%" id="contentss-img-bg" style="margin-top: 10px;">
    <p class="danhmuc color-text text-center">BLOG</p>
    <div class="row" id="blog">
        <div class="post col-sm-6 col-md-3 col-xl-3 mb-1 pb-1 blog-item">
            <div style="margin: 0px auto; display: table;"><img src="home_assets/image/blog1.jpg" alt="" width="100%">
            </div>
            <p class="title">Giá Vàng, USD tiếp tục tăng mạnh</p>
            <p class="summary">
                Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu
                đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD
            </p>
        </div>
        <div class="post col-sm-6 col-md-3 col-xl-3 mb-1 pb-1 blog-item">
            <div style="margin: 0px auto; display: table;"><img src="home_assets/image/blog2.jpg" alt="" width="100%">
            </div>
            <p class="title">Giá Vàng, USD tiếp tục tăng mạnh</p>
            <p class="summary">
                Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu
                đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD
            </p>
        </div>
        <div class="post col-sm-6 col-md-3 col-xl-3 mb-1 pb-1 blog-item">
            <div style="margin: 0px auto; display: table;"><img src="home_assets/image/blog3.jpg" alt="" width="100%">
            </div>
            <p class="title">Giá Vàng, USD tiếp tục tăng mạnh</p>
            <p class="summary">
                Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu
                đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD
            </p>
        </div>
        <div class="post col-sm-6 col-md-3 col-xl-3 mb-1 pb-1 blog-item">
            <div style="margin: 0px auto; display: table;"><img src="home_assets/image/blog4.jpg" alt="" width="100%">
            </div>
            <p class="title">Giá Vàng, USD tiếp tục tăng mạnh</p>
            <p class="summary">
                Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu
                đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD
            </p>
        </div>
    </div>
    <div class="btn-more mt-3"><button type="button" class="btn">XEM THÊM</button></div>
@endsection