<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng Của Bạn</title>
    @include('home.css')

    <style type="text/css">
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;

        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 1000px;
        }
        th {
            border: 2px solid skyblue;
            background-color: black;
            color: white;
            font-size: 19px;
            font-weight: bold;
            text-align: center;
        }

        td {
            border: 1px solid skyblue;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="hero_area" style="padding: 100px;">
        @include('home.header')
    </div>

    <div class="div_center">
        <table>
            <tr>
                <th>Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Trạng Thái Giao Hàng</th>
                <th>Trạng Thái Thanh Toán</th>
                <th>Hình Ảnh</th>
                <th>Hành Động</th>
            </tr>

            @foreach ($order as $order)
                <tr>
                    <td>{{ $order->product->title }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td><img height="200" width="200" src="products/{{ $order->product->image1 }}"></td>
                    <td>
                        @if($order->payment_status != 'paid' && $order->status != 'Delivered')
                            <a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')"
                               class="btn btn-danger"
                               href="{{ url('delete_order', $order->id) }}">
                                Hủy
                            </a>
                        @else
                            <span class="text-muted">Không thể hủy</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    @include('home.footer')

</body>
</html>