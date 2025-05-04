<div class="d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{ asset('admincss/img/avatar.png') }}" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h5">{{ Auth::user()->name }}</h1>
                <p>{{ Auth::user()->email }}</p>
                <p>{{ Auth::user()->usertype }}</p>
            </div>
        </div>
        <span class="heading">Chính</span>
        <ul class="list-unstyled">
            <li><a href="{{ url('admin/dashboard') }}"> <i class="icon-home"></i>Trang Chủ </a></li>
            <li><a href="{{ url('view_category') }}"> <i class="icon-grid"></i>Danh Mục </a></li>
            <li><a href="{{ url('view_brand') }}"> <i class="icon-grid"></i>Thương Hiệu </a></li>

            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Sản Phẩm </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{ url('add_product') }}">Thêm Sản Phẩm</a></li>
                    <li><a href="{{ url('view_product') }}">Xem Sản Phẩm</a></li>

                </ul>
            </li>
            <li><a href="{{ url('view_orders') }}"> <i class="icon-grid"></i>Đơn Hàng </a></li>
            <li><a href="{{ url('view_users') }}"><i class="icon-grid"></i>Xem Người Dùng</a></li>
            <li><a href="{{ route('admin.view_contacts') }}"><i class="icon-grid"></i>Xem Liên Hệ</a></li>
            <li><a href="{{ url('sales_report') }}"> <i class="icon-chart"></i>Báo Cáo Bán Hàng </a></li>


        </ul>
    </nav>