<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area " style="padding: 50px">
        @include('home.header')
    </div>

    <section class="contact_section py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Đóng">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="heading_container mb-4">
                        <h2>Liên Hệ Với Chúng Tôi</h2>
                    </div>
                    <div class="contact_info">
                        <div class="info_item d-flex mb-3">
                            <i class="fa fa-map-marker mr-3" aria-hidden="true"></i>
                            <p>123 Phố Quà Tặng, Khu Mua Sắm, Thành Phố</p>
                        </div>
                        <div class="info_item d-flex mb-3">
                            <i class="fa fa-phone mr-3" aria-hidden="true"></i>
                            <p>+1 234 567 8900</p>
                        </div>
                        <div class="info_item d-flex mb-3">
                            <i class="fa fa-envelope mr-3" aria-hidden="true"></i>
                            <p>info@giftos.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('view_contact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Tên" value="{{ old('name') }}" required />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Điện Thoại" value="{{ old('phone') }}" />
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4" placeholder="Tin Nhắn" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">GỬI</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('home.footer')

</body>

</html>