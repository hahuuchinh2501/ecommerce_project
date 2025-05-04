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
                    <h1 class="h3 mb-4 text-gray-800">Chi Tiết Tin Nhắn</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tin Nhắn từ {{ $contact->name }}</h6>
                            <div>
                                <a href="{{ route('admin.view_contacts') }}" class="btn btn-secondary btn-sm">
                                    <i></i> Trở Lại Danh Sách
                                </a>
                                <form action="{{ route('admin.view_contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tin nhắn này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i></i> Xóa
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Tên:</strong> {{ $contact->name }}</p>
                                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                                    <p><strong>Điện Thoại:</strong> {{ $contact->phone ?? 'Không cung cấp' }}</p>
                                    <p><strong>Ngày Gửi:</strong> {{ $contact->created_at->format('d F, Y H:i:s') }}</p>
                                    <p><strong>Trạng Thái:</strong>
                                        @if($contact->is_read)
                                            <span class="badge badge-success">Đã Đọc</span>
                                        @else
                                            <span class="badge badge-warning">Chưa Đọc</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <h5 class="font-weight-bold">Nội Dung Tin Nhắn:</h5>
                                    <div class="border p-3 bg-light">
                                        {{ $contact->message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @include('admin.js')
</body>
</html>