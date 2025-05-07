<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Sản Phẩm Mới Nhất
            </h2>
        </div>
        <div class="row">
            @foreach($product as $products )


            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">

                    <div class="img-box">
                        <img src="products/{{ $products->image1 }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h6>
                            {{ $products->title }}
                        </h6>
                        <h6>
                            Giá
                            <span>
                                {{ $products->price }}
                            </span>
                        </h6>
                           <h6>
                Còn lại: 
                <span class="{{ $products->quantity <= 0 ? 'text-danger' : '' }}">
                    {{ $products->quantity > 0 ? $products->quantity : 'Hết hàng' }}
                </span>
            </h6>
                    </div>

                    <div style="padding:15px">
                        <a class="btn btn-dark" style="color: white" href="{{ url('product_details', $products->id) }}">
                            Chi Tiết
                        </a>
                       @if($products->quantity > 0)
                <a class="btn btn-white" style="border: 1px solid" href="{{ url('add_cart', $products->id) }}">
                    Thêm Vào Giỏ Hàng
                </a>
            @else
                <button class="btn btn-secondary" disabled>Hết Hàng</button>
            @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="btn-box">
        <a href="{{ url('view_shop') }}">
            Xem Tất Cả Sản Phẩm
        </a>
    </div>
    </div>
</section>