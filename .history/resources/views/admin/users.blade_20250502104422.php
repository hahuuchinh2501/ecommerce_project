<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Danh Sách Người Dùng</h2>
                </div>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="title"><strong>Tất Cả Người Dùng</strong></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Điện Thoại</th>
                                                <th>Địa Chỉ</th>
                                                <th>Ngày Đăng Ký</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone}}</td>
                                                    <td>{{ $user->address}}</td>
                                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')"
                                                           href="{{ url('delete_user', $user->id) }}"
                                                           class="btn btn-danger btn-sm">
                                                            Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @include('admin.js')
</body>
</html>