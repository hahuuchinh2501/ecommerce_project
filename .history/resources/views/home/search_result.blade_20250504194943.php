<!DOCTYPE html>
<html lang="vi">

<head>
    @include('home.css')
    @include('home.searchcss')
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="search-header text-center">
                <h2>Kết Quả Tìm Kiếm cho <span class="search-term">"{{ $search_text }}"</span></h2>
            </div>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-check-circle mr-2"></i>
                        <div>{{ session()->get('message') }}</div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            @endif

            <div class="row">
                @if($products->count() > 0)
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-card">
                                <div class="img-container">
                                    <img src="/products/{{ $product->image1 }}" alt="{{ $product->title }}">
                                </div>
                                <div class="product-info">
                                    <h5 class="product-title">{{ $product->title }}</h5>
                                    <div class="product-price">{{ $product->price }}</div>
                                    <div class="action-buttons">
                                        <a href="{{ url('product_details', $product->id) }}" class="view-btn">
                                            <i class="fa fa-eye"></i> Chi Tiết
                                        </a>
                                        <form action="{{ url('add_cart', $product->id) }}" method="POST" class="cart-form">
                                            @csrf

                                            <button type="submit" class="add-cart-btn">
                                                <i class="fa fa-shopping-cart"></i> Thêm
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12">
                        <div class="pagination-container">
                            {{ $products->appends(['search_text' => $search_text])->links() }}
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="no-results-container text-center">
                            <div class="alert alert-info">
                                <img src="{{ asset('images/no-results.svg') }}" alt="Không có kết quả" style="max-width: 150px; margin-bottom: 20px;">
                                <h4>Không tìm thấy sản phẩm nào phù hợp với "{{ $search_text }}"</h4>
                                <p class="mt-3">Hãy thử tìm kiếm với các từ khóa khác hoặc khám phá các danh mục của chúng tôi bên dưới</p>
                                <div class="mt-4">
                                    <a href="{{ url('view_shop') }}" class="btn btn-primary">Xem Tất Cả Sản Phẩm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @include('home.footer')

    <script>
        // Add animation effect for alerts
        $(document).ready(function() {
            $('.alert-success').fadeIn().delay(3000).fadeOut();
        });
    </script>
</body>

</html>