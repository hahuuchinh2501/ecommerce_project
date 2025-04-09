<header class="header bg-white shadow-sm">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <!-- Logo & Sidebar Toggle -->
      <div class="d-flex align-items-center">
        <button class="btn btn-outline-primary me-3 sidebar-toggle"><i class="fas fa-bars"></i></button>
        <a href="index.html" class="navbar-brand text-uppercase fw-bold">
          <span class="text-primary">Dashboard</span> Admin
        </a>
      </div>

      <!-- Search Bar -->
      <form class="d-none d-md-flex align-items-center w-50 mx-auto" action="#" id="searchForm">
        <input class="form-control me-2" type="search" name="search" placeholder="Search..." aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>

      <!-- Logout -->
      <div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </nav>
</header>
