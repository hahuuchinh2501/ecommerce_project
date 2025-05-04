<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        label {
            display: inline-block;
            width: 200px;
            padding: 20px;
        }

        textarea {
            width: 400px;
            height: 80px;
        }
    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                    <h2>Cập Nhật Sản Phẩm</h2>

                    <div class="div_deg">
                        <form action="{{ url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label>Tiêu Đề</label>
                                <input type="text" name="title" value="{{ $data->title }}">
                            </div>

                            <div>
                                <label>Mô Tả</label>
                                <textarea name="description">{{ $data->description }}</textarea>
                            </div>
                            <div>
                                <label>Giá</label>
                                <input type="text" name="price" value="{{ $data->price }}">
                            </div>
                            <div>
                                <label>Số Lượng</label>
                                <input type="number" name="quantity" value="{{ $data->quantity }}">
                            </div>
                            <div>
                                <label>Danh Mục</label>
                                <select name="category">
                                    <option value="{{ $data->category }}">{{ $data->category }}</option>

                                    @foreach($category as $category)
                                        <option value="{{ $category->category_name }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label>Thương Hiệu</label>
                                <select name="brand">
                                    <option value="{{ $data->brand }}">{{ $data->brand }}</option>

                                    @foreach($brand as $brand)
                                        <option value="{{ $brand->brand_name }}">
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label>Ảnh Hiện Tại 1</label>
                                <img width="150" src="/products/{{ $data->image1 }}">
                            </div>
                            <div>
                                <label>Ảnh Mới 1</label>
                                <input type="file" name="image1">
                            </div>
                            <div>
                                <label>Ảnh Hiện Tại 2</label>
                                <img width="150" src="/products/{{ $data->image2 }}">
                            </div>
                            <div>
                                <label>Ảnh Mới 2</label>
                                <input type="file" name="image2">
                            </div>
                            <div>
                                <label>Ảnh Hiện Tại 3</label>
                                <img width="150" src="/products/{{ $data->image3 }}">
                            </div>
                            <div>
                                <label>Ảnh Mới 3</label>
                                <input type="file" name="image3">
                            </div>

                            <div>
                                <input class="btn btn-success" type="submit" value="Cập Nhật Sản Phẩm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.js')
</body>
</html>