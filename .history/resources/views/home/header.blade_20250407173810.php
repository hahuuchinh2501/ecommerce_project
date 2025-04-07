<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giftos - Fashion Store</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
 @include('home.css')
 <style>
  header{
    margin: 100px;
  }
 </style>
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
            <a href="{{ url('/') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{ url('view_shop') }}" class="nav-link">Shop</a>
            <div class="dropdown-menu">
              <a href="#" class="dropdown-item">Men's Collection</a>
              <a href="#" class="dropdown-item">Women's Collection</a>
              <a href="#" class="dropdown-item">New Arrivals</a>
              <a href="#" class="dropdown-item">Sale Items</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link">Collections</a>
            <div class="dropdown-menu">
              <a href="#" class="dropdown-item">Spring/Summer 2025</a>
              <a href="#" class="dropdown-item">Fall/Winter 2024</a>
              <a href="#" class="dropdown-item">Accessories</a>
              <a href="#" class="dropdown-item">Footwear</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{ url('view_contact') }}" class="nav-link">Contact Us</a>
          </li>
        </ul>
        
        <div class="user-actions">
          <form class="search-form">
            <input type="text" class="search-input" placeholder="Search products...">
            <button type="submit" class="search-btn">
              <i class="fas fa-search"></i>
            </button>
          </form>
          
          @if (Route::has('login'))
            @auth
              <a href="{{ url('myorders') }}" class="action-btn">
                <i class="fas fa-list-ul"></i>
                <span>Orders</span>
              </a>
           
              </a>
              <a href="{{ url('mycart') }}" class="action-btn">
                <i class="fas fa-shopping-bag"></i>
                <span>Cart</span>
                <span class="cart-count">{{ $count }}</span>
              </a>
              <div class="dropdown">
                <a href="#" class="action-btn">
                  <i class="fas fa-user-circle"></i>
                  <span>Account</span>
                </a>
                <div class="dropdown-menu">
                  <a href="{{ url('profile') }}" class="dropdown-item">My Profile</a>
                  <a href="{{ url('myorders') }}" class="dropdown-item">My Orders</a>
                  <a href="{{ url('settings') }}" class="dropdown-item">Settings</a>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </div>
              </div>
            @else
              <a href="{{ url('/login') }}" class="action-btn">
                <i class="fas fa-sign-in-alt"></i>
                <span>Login</span>
              </a>
              <a href="{{ url('/register') }}" class="btn btn-primary">Register</a>
            @endauth
          @endif
        </div>
      </nav>
    </div>
  </header>
  
  <script>
    // Add scrolled class to header on scroll
    window.addEventListener('scroll', function() {
      const header = document.querySelector('.header');
      if (window.scrollY > 50) {
        header.classList.add('header-scrolled');
      } else {
        header.classList.remove('header-scrolled');
      }
    });
    
    // Mobile menu toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileToggle) {
      mobileToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
      });
    }
    
    // Dropdown toggle for mobile
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