<nav id="sidebar" class="bg-dark text-white vh-100">
  <div class="sidebar-header p-4 border-bottom">
    <div class="d-flex align-items-center">
      <img src="{{ asset('admincss/img/avatar.png') }}" alt="User" class="rounded-circle me-3" width="50">
      <div>
        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
        <small>{{ Auth::user()->email }}</small><br>
        <small class="text-muted">{{ Auth::user()->usertype }}</small>
      </div>
    </div>
  </div>

  <ul class="nav flex-column p-3">
    <li class="nav-item"><a class="nav-link text-white" href="{{ url('admin/dashboard') }}"><i class="fas fa-home me-2"></i>Home</a></li>
    <li class="nav-item"><a class="nav-link text-white" href="{{ url('view_category') }}"><i class="fas fa-th-large me-2"></i>Category</a></li>
    <li class="nav-item"><a class="nav-link text-white" href="{{ url('view_brand') }}"><i class="fas fa-tags me-2"></i>Brand</a></li>
    
    <li class="nav-item">
      <a class="nav-link text-white" data-bs-toggle="collapse" href="#productMenu" role="button" aria-expanded="false">
        <i class="fas fa-box-open me-2"></i>Product
      </a>
      <div class="collapse ps-3" id="productMenu">
        <a class="nav-link text-white" href="{{ url('add_product') }}">Add Product</a>
        <a class="nav-link text-white" href="{{ url('view_product') }}">View Products</a>
      </div>
    </li>

    <li class="nav-item"><a class="nav-link text-white" href="{{ url('view_orders') }}"><i class="fas fa-shopping-cart me-2"></i>Orders</a></li>
    <li class="nav-item"><a class="nav-link text-white" href="{{ url('view_users') }}"><i class="fas fa-users me-2"></i>Users</a></li>
  </ul>
</nav>
