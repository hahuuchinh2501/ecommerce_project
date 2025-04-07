<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopPING - Fashion Store</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  @include('home.css')
  <style>
    /* Additional styles for the logout button */
    .logout-btn {
      background-color: #ff6b6b;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.3s ease;
      font-size: 14px;
      display: flex;
      align-items: center;
    }
    
    .logout-btn i {
      margin-right: 6px;
    }
    
    .logout-btn:hover {
      background-color: #ff5252;
    }
    
    .logout-form {
      margin: 0;
      margin-left: 15px;
    }
    
    /* Ensure the logout button is visible on all screen sizes */
    @media (max-width: 992px) {
      .direct-logout {
        display: block !important;
      }
      
      .user-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        align-items: center;
      }
    }
    
    /* Simplified navigation for very small screens */
    @media (max-width: 576px) {
      .user-actions {
        justify-content: space-between;
      }
      
      .action-btn span {
        display: none;
      }
      
      .logout-btn span {
        display: inline;
      }
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
        
          </li>
        
          <li class="nav-item">
            <a href="{{ url('view_contact') }}" class="nav-link">Contact Us</a>
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
                <form class="search-form">
                <input type="text" class="search-input" placeholder="Search products...">
                <button type="submit" class="search-btn">
                  <i class="fas fa-search"></i>
                </button>
              </form>
              
              <!-- Always visible logout button -->
              <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">
                  <i class="fas fa-sign-out-alt"></i>
                  <span>Logout</span>
                </button>
              </form>
               <p>{{ Auth::user()->name }}</p>
            @else
              <form class="search-form">
                <input type="text" class="search-input" placeholder="Search products...">
                <button type="submit" class="search-btn">
                  <i class="fas fa-search"></i>
                </button>
              </form>
              
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