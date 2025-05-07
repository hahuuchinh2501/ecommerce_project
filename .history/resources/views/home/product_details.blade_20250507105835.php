<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style type="text/css">
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .detail-box {
            padding: 15px;
        }

        .product-images {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .main-image {
            width: 100%;
            max-width: 400px;
            margin-bottom: 15px;
        }

        .thumbnail-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .thumbnail {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 2px solid #ddd;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .thumbnail:hover {
            border-color: #333;
        }

        .product-details {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .product-description {
            margin-top: 20px;
            line-height: 1.6;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .quantity-selector input {
            width: 60px;
            text-align: center;
            margin: 0 10px;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .quantity-btn {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: bold;
        }

        .add-to-cart-container {
            margin-top: 20px;
        }

        .btn-add-cart {
            background-color: #fff;
            color: #333;
            border: 1px solid #333;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-add-cart:hover {
            background-color: #333;
            color: #fff;
        }
    </style>

    <script>
        function changeMainImage(imageSrc) {
            document.getElementById('mainImage').src = imageSrc;
        }

        function changeQuantity(change) {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);
            var newQuantity = currentQuantity + change;

            if (newQuantity >= 1) {
                quantityInput.value = newQuantity;
            }
        }
    </script>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Chi Tiết Sản Phẩm</h2>
            </div>
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="box">
                        @if($data)
                            <div class="product-images">
                                <div class="main-image-container">
                                    <img id="mainImage" class="main-image" src="/products/{{ $data->image1 }}" alt="{{ $data->title }}">
                                </div>

                                <div class="thumbnail-container">
                                    <img class="thumbnail" src="/products/{{ $data->image1 }}" alt="Hình 1" onclick="changeMainImage('/products/{{ $data->image1 }}')">

                                    @if(isset($data->image2))
                                        <img class="thumbnail" src="/products/{{ $data->image2 }}" alt="Hình 2" onclick="changeMainImage('/products/{{ $data->image2 }}')">
                                    @endif

                                    @if(isset($data->image3))
                                        <img class="thumbnail" src="/products/{{ $data->image3 }}" alt="Hình 3" onclick="changeMainImage('/products/{{ $data->image3 }}')">
                                    @endif
                                </div>
                            </div>

                            <div class="product-details">
                                <div class="detail-box">
                                    <h4>{{ $data->title }}</h4>
                                    <h5 class="mt-3">
                                        Giá: <span class="text-danger font-weight-bold">{{ $data->price }}</span>
                                    </h5>
                                </div>

                                <div class="detail-box">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6>Danh Mục: <span class="text-muted">{{ $data->category }}</span></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6>Thương Hiệu: <span class="text-muted">{{ $data->brand }}</span></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6>Còn Lại: <span class="text-muted">{{ $data->quantity }}</span></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-description">
                                    <h6>Mô Tả Sản Phẩm:</h6>
                                    <p>{{ $data->description }}</p>
                                </div>

                                <form action="{{ url('add_cart', $data->id) }}" method="POST">
                                    @csrf
                                    <div class="quantity-selector">
                                        <label for="quantity">Số Lượng:</label>
                                        <div class="quantity-btn" onclick="changeQuantity(-1)">-</div>
                                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $data->quantity }}">
                                        <div class="quantity-btn" onclick="changeQuantity(1)">+</div>
                                    </div>

                                    <div class="add-to-cart-container">
                                        <button type="submit" class="btn-add-cart">
                                            <i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                Không tìm thấy sản phẩm hoặc sản phẩm đã bị xóa.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('home.footer')
</body>
</html>