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
                    <h1 class="h3 mb-4 text-gray-800">Tin Nhắn Liên Hệ</h1>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tất Cả Tin Nhắn</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Điện Thoại</th>
                                            <th>Trạng Thái</th>
                                            <th>Ngày Gửi</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contacts as $contact)
                                            <tr class="{{ $contact->is_read ? '' : 'font-weight-bold' }}">
                                                <td>{{ $contact->id }}</td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone ?? 'N/A' }}</td>
                                                <td>
                                                    @if($contact->is_read)
                                                        <span class="badge badge-success">Đã Đọc</span>
                                                    @else
                                                        <span class="badge badge-warning">Mới</span>
                                                    @endif
                                                </td>
                                                <td>{{ $contact->created_at->format('d M, Y H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.show_contact', $contact->id) }}" class="btn btn-info btn-sm">
                                                        <i></i> Xem
                                                    </a>
                                                    @if(!$contact->is_read)
                                                        <form action="{{ route('admin.view_contacts.read', $contact->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i></i> Đánh Dấu Đã Đọc
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <form action="{{ route('admin.view_contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tin nhắn này không?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i></i> Xóa
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('admin.js')
</body>
</html>