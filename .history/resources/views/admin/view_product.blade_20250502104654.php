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

        .table_deg {
            border: 2px solid greenyellow;
        }

        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        td {
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }

        input[type='search'] {
            width: 300px;
            height: 40px;
            margin-left: 50px;
        }
    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <form action="{{ url('product_search') }}" method="get">
                        @csrf
                        <input type="search" name="search">
                        <input type="submit" class="btn btn-secondary" value="Tìm Kiếm">
                    </form>
                    <div class="div_deg">
                        <table class="table_deg">
                            <tr>
                                <th>Tiêu Đề Sản Phẩm</th>
                                <th>Mô Tả</th>
                                <th>Danh Mục</th>
                                <th>Thương Hiệu</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Hình Ảnh</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>

                            @foreach ( $product as $products)
                                <tr>
                                    <td>{{ $products->title }}</td>
                                    <td>{{ $products->description }}</td>
                                    <td>{{ $products->category }}</td>
                                    <td>{{ $products->brand }}</td>
                                    <td>{{ $products->price }}</td>
                                    <td>{{ $products->quantity }}</td>
                                    <td>
                                        <img height="150" width="150" src="products/{{ $products->image1 }}">
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('update_product',$products->id) }}" >Sửa</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product',$products->id) }}" >Xóa</a>
                                    </td>
                                </tr>
                            @endforeach


                        </table>


                    </div>
                    <div class="div_deg">{{ $product->onEachSide(1)->links() }}</div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.js')
</body>
</html>