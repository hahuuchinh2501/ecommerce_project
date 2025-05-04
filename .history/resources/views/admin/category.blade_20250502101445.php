<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 50px;
        }
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        .table_deg {
            text-align: center;
            margin: auto;
            border: 2px solid yellowgreen;
            margin-top: 50px;
            width: 600px;
        }
        th {
            background-color: skyblue;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
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
                    <h2>Thêm Danh Mục</h2>
                    <div class="div_deg">
                        <form action="{{ url('add_category') }}" method="post">
                            @csrf
                            <div>
                                <input type="text" name="category">
                                <input class="btn btn-primary" type="submit" value="Thêm Danh Mục">
                            </div>
                        </form>
                    </div>
                    <div>
                        <table class="table_deg">
                            <tr>
                                <th>Tên Danh Mục</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                            @foreach ($data as $data )
                            <tr>
                                <td>{{ $data->category_name }}</td>
                                <td><a class="btn btn-success" href="{{ url('edit_category',$data->id) }}">Sửa</a></td>
                                <td><a href="{{ url('delete_category',$data->id) }}" class="btn btn-danger" onclick="confirmation(event)">Xóa</a></td>
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