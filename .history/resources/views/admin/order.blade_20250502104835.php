<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">
        table {
            border: 2px solid skyblue;
            text-align: center;
        }

        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid skyblue;
        }
    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="table_center">
                        <table>
                            <tr>
                                <th>Tên Khách Hàng</th>
                                <th>Địa Chỉ</th>
                                <th>Điện Thoại</th>
                                <th>Tiêu Đề Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Hình Ảnh</th>
                                <th>Trạng Thái Thanh Toán</th>
                                <th>Trạng Thái Đơn Hàng</th>
                                <th>Thay Đổi Trạng Thái</th>
                                <th>In PDF</th>
                            </tr>

                            @foreach ($data as $data)

                                <tr>

                                    <td>{{ $data->name }}</td>

                                    <td>{{ $data->rec_address }}</td>
                                    <td>{{ $data->phone }}</td>

                                    <td>{{ $data->product->title }}</td>
                                    <td>{{ $data->product->price }}</td>
                                    <td>{{ $data->quantity }}</td>


                                    <td>

                                        <img width="150" src="products/{{ $data->product->image1 }}">

                                    </td>
                                    <td>{{ $data->payment_status }}</td>
                                    <td>
                                        @if ($data->status == 'in progress')
                                            <span style="color:red">{{ $data->status }}</span>
                                        @elseif ($data->status == 'On Delivery')
                                            <span style="color:skyblue;">{{ $data->status }}</span>
                                        @else
                                            <span style="color:green;">{{ $data->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('on_delivery',$data->id) }}">Đang Giao</a>
                                        <a class="btn btn-success" href="{{ url('delivered',$data->id) }}">Đã Giao</a>
                                    </td>

                                    <td>
                                        <a class="btn btn-secondary" href="{{ url('print_pdf', $data->id) }}">In PDF</a>
                                    </td>

                                </tr>

                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.js')
</body>
</html>