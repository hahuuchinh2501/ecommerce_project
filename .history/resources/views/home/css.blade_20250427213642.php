<!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>
    Shopping
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
   <style>
    :root {
      --primary: #ff6b6b;
      --secondary: #1e1e2c;
      --light: #f8f9fa;
      --dark: #212529;
      --accent: #7971ea;
      --gray-light: #f1f1f1;
      --gray: #888;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff;
    }
    
    .header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      transition: all 0.3s ease;
      background-color: #fff;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    }
    
    .header-scrolled {
      padding: 5px 0;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 15px;
    }
    
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 0;
    }
    
    .brand {
      display: flex;
      align-items: center;
    }
    
    .logo {
      font-size: 28px;
      font-weight: 700;
      color: var(--secondary);
      text-decoration: none;
      letter-spacing: 1px;
    }
    
    .logo span {
      color: var(--primary);
    }
    
    .nav-menu {
      display: flex;
      align-items: center;
      margin: 0;
      padding: 0;
      list-style: none;
    }
    
    .nav-item {
      margin: 0 15px;
      position: relative;
    }
    
    .nav-link {
      font-size: 15px;
      font-weight: 500;
      color: var(--secondary);
      text-decoration: none;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      padding: 10px 0;
      position: relative;
      transition: all 0.3s ease;
    }
    
    .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      background-color: var(--primary);
      bottom: 0;
      left: 0;
      transition: all 0.3s ease;
    }
    
    .nav-link:hover::after,
    .nav-item.active .nav-link::after {
      width: 100%;
    }
    
    .nav-item.active .nav-link {
      color: var(--primary);
      font-weight: 600;
    }
    
    .user-actions {
      display: flex;
      align-items: center;
    }
    
    .action-btn {
      font-size: 14px;
      font-weight: 500;
      color: var(--secondary);
      text-decoration: none;
      margin-left: 20px;
      display: flex;
      align-items: center;
      transition: all 0.3s ease;
    }
    
    .action-btn:hover {
      color: var(--primary);
    }
    
    .action-btn i {
      font-size: 18px;
      margin-right: 5px;
    }
    
    .cart-count {
      background-color: var(--primary);
      color: white;
      border-radius: 50%;
      font-size: 11px;
      width: 18px;
      height: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: 5px;
    }
    
    .btn {
      padding: 8px 16px;
      border-radius: 4px;
      font-weight: 500;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      font-size: 14px;
    }
    
    .btn-primary {
      background-color: var(--primary);
      color: white;
    }
    
    .btn-primary:hover {
      background-color: #ff5252;
    }
    
    .btn-outline {
      background-color: transparent;
      color: var(--secondary);
      border: 1px solid var(--secondary);
    }
    
    .btn-outline:hover {
      background-color: var(--secondary);
      color: white;
    }
    
    .search-form {
      position: relative;
      margin-left: 15px;
    }
    
    .search-input {
      border: none;
      background-color: var(--gray-light);
      padding: 8px 15px;
      padding-right: 35px;
      border-radius: 30px;
      transition: all 0.3s ease;
      font-size: 14px;
      width: 180px;
    }
    
    .search-input:focus {
      outline: none;
      width: 200px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    
    .search-btn {
      background: transparent;
      border: none;
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray);
      cursor: pointer;
    }
    
    .mobile-toggle {
      display: none;
      font-size: 24px;
      color: var(--secondary);
      cursor: pointer;
    }
    
    .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      min-width: 200px;
      background-color: white;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      padding: 10px 0;
      opacity: 0;
      visibility: hidden;
      transform: translateY(10px);
      transition: all 0.3s ease;
    }
    
    .dropdown:hover .dropdown-menu {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }
    
    .dropdown-item {
      padding: 8px 20px;
      display: block;
      color: var(--secondary);
      text-decoration: none;
      font-size: 14px;
      transition: all 0.3s ease;
    }
    
    .dropdown-item:hover {
      background-color: var(--gray-light);
      color: var(--primary);
    }
    
    /* Responsive styles */
    @media (max-width: 992px) {
      .mobile-toggle {
        display: block;
      }
      
      .nav-menu {
        position: fixed;
        top: 70px;
        left: -100%;
        width: 80%;
        max-width: 300px;
        height: 100vh;
        background-color: white;
        flex-direction: column;
        align-items: flex-start;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        z-index: 999;
      }
      
      .nav-menu.active {
        left: 0;
      }
      
      .nav-item {
        margin: 10px 0;
        width: 100%;
      }
      
      .nav-link {
        display: block;
        width: 100%;
        padding: 10px;
      }
      
      .dropdown-menu {
        position: static;
        opacity: 1;
        visibility: visible;
        transform: none;
        box-shadow: none;
        padding-left: 20px;
        display: none;
      }
      
      .dropdown.active .dropdown-menu {
        display: block;
      }
      
      .user-actions {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: white;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px;
        justify-content: space-around;
        z-index: 999;
      }
      
      .action-btn {
        margin: 0;
        flex-direction: column;
        font-size: 12px;
      }
      
      .action-btn i {
        font-size: 20px;
        margin-right: 0;
        margin-bottom: 5px;
      }
    }
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
    .toast-success {
    background-color: #51A351 !important;
    color: white !important;
}
.toast-error {
    background-color: #BD362F !important;
    color: white !important;
}


.btn-primary {
  --bs-btn-bg: var(--primary) !important
}

    
  </style>

  