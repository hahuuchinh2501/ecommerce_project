<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopPING</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  @include('home.css')
</head>
<body>
  <header class="header">
    <div class="container">
      <nav class="navbar">
        <div class="brand">
          <a href="{{ url('/') }}" class="logo">shop<span>PING</span></a>
        </div>
        
        <div class="mobile-toggle">
          <i class="fas fa-bars"></i>
        </div>
        
        <ul class="nav-menu">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">Trang chủ</a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{ url('view_shop') }}" class="nav-link">Sản phẩm </a>
        
          </li>
        
          <li class="nav-item">
            <a href="{{ url('view_contact') }}" class="nav-link">Liên hệ với chúng tôi</a>
          </li>
        </ul>
        
        <div class="user-actions">
          @if (Route::has('login'))
            @auth
              <a href="{{ url('myorders') }}" class="action-btn">
                <i class="fas fa-list-ul"></i>
                <span>Orders</span>
              </a>
              <a href="{{ url('mycart') }}" class="action-btn">
                <i class="fas fa-shopping-bag"></i>
                <span>Cart</span>
                <span class="cart-count">{{ $count }}</span>
              </a>
              <form class="search-form" action="{{ url('search') }}" method="GET">
    <input type="text" class="search-input" name="search_text" placeholder="Tìm kiếm sản phẩm..." required>
    <button type="submit" class="search-btn">
        <i class="fas fa-search"></i>
    </button>
</form>
            
              
              
              <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">
                  <i class="fas fa-sign-out-alt"></i>
                  <span>Đăng xuất</span>
                </button>
              </form>
              <a style="margin-left: 20px;" href="{{ url('/profile') }}">welcome: {{ Auth::user()->name }}</a>
              
            @else
              <form class="search-form" action="{{ url('search') }}" method="GET">
    <input type="text" class="search-input" name="search_text" placeholder="Search products..." required>
    <button type="submit" class="search-btn">
        <i class="fas fa-search"></i>
    </button>
</form>
              
              <a href="{{ url('/login') }}" class="action-btn" style="margin: 10px;">
                <i class="fas fa-sign-in-alt"></i>
                <span>Đăng nhập</span>
              </a>
              <a href="{{ url('/register') }}" class="btn btn-primary">Đăng kí</a>
            @endauth
          @endif
        </div>
      </nav>
    </div>
  </header>
  
  <script>
    
    window.addEventListener('scroll', function() {
      const header = document.querySelector('.header');
      if (window.scrollY > 50) {
        header.classList.add('header-scrolled');
      } else {
        header.classList.remove('header-scrolled');
      }
    });
    
    
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileToggle) {
      mobileToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
      });
    }
    
   
    const dropdowns = document.querySelectorAll('.dropdown');
    
    dropdowns.forEach(dropdown => {
      dropdown.addEventListener('click', function(e) {
        if (window.innerWidth < 992) {
          e.preventDefault();
          this.classList.toggle('active');
        }
      });
    });
  </script>
</body>
</html>