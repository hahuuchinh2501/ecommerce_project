<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        label {
            display: inline-block;
            width: 200px;
            font-size: 18px !important;
            color: white !important;
        }

        input[type='text'], input[type='number'] {
            width: 200px;
            height: 30px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: black;
        }
        textarea {
            width: 450px;
            height: 100px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: black;
        }
        select {
            width: 200px;
            height: 30px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: black;
        }
        .input_deg {
            padding: 15px;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-success:hover {
            background-color: #218838;
        }
    </style>

</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2>Thêm Sản Phẩm</h2>
                    <div class="div_deg">
                        <form action="{{ url('upload_product') }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="input_deg">
                                <label>Tiêu Đề Sản Phẩm</label>
                                <input type="text" name="title" required>
                            </div>

                            <div class="input_deg">
                                <label>Mô Tả</label>
                                <textarea name="description" required></textarea>
                            </div>

                            <div class="input_deg">
                                <label>Giá</label>
                                <input type="text" name="price">
                            </div>

                        <div class="input_deg">
                            <label>Số Lượng</label>
                            <input type="number" name="qty">
                        </div>

                        <div class="input_deg">
                            <label>Danh Mục Sản Phẩm</label>
                            <select name="category" required>
                                <option>chọn một tùy chọn</option>

                                @foreach ($category as $category )
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="input_deg">
                            <label>Thương Hiệu Sản Phẩm</label>
                            <select name="brand" required>
                                <option>chọn một tùy chọn</option>

                                @foreach ($brand as $brand )
                                    <option value="{{ $brand->brand_name }}">{{ $brand->brand_name }}</option>
                                @endforeach

                            </select>
                        </div>

                            <div class="input_deg">
                                <label>Hình Ảnh Sản Phẩm 1</label>
                                <input type="file" name="image1">
                            </div>
                            <div class="input_deg">
                                <label>Hình Ảnh Sản Phẩm 2</label>
                                <input type="file" name="image2">
                            </div>
                            <div class="input_deg">
                                <label>Hình Ảnh Sản Phẩm 3</label>
                                <input type="file" name="image3">
                            </div>

                            <div class="input_deg">
                                <input type="submit" class="btn btn-success" value="Thêm Sản Phẩm">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admincss/js/charts-home.js') }}"></script>
<script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>