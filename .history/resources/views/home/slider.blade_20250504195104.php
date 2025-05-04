<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Mua Sắm Nâng Cao</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    @include('home.slidercss')
</head>
<body>
    <section class="slider_section">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-12">
                                    <div class="detail-box">
                                        <h1>Chào Mừng Đến Với <br>Trải Nghiệm Mua Sắm Của Chúng Tôi</h1>
                                        <p>Khám phá xu hướng mới nhất về quần áo và giày dép cho mọi người. Sản phẩm chất lượng với giá cả phải chăng, thiết kế cho sự thoải mái và phong cách.</p>

                                        <div class="category-badges">
                                            <div class="category-badge">
                                                <i class="fas fa-tshirt"></i> Quần Áo
                                            </div>
                                            <div class="category-badge">
                                                <i class="fas fa-shoe-prints"></i> Giày Dép
                                            </div>
                                            <div class="category-badge">
                                                <i class="fas fa-gem"></i> Phụ Kiện
                                            </div>
                                        </div>

                                        <a href="{{ url('view_shop') }}" class="mt-4">Mua Ngay <i class="fas fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="img-box">
                                        <img src="/images/img_bg.jpg" alt="Bộ Sưu Tập Thời Trang" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-down">
            <span>Kéo Xuống</span>
            <i class="fas fa-chevron-down mt-2"></i>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>