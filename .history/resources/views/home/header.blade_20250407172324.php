<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <span>Giftos</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('view_shop') }}">Shop</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('view_contact') }}">Contact Us</a>
          </li>
        </ul>
        <div class="user_option d-flex align-items-center">
          @if (Route::has('login'))
            @auth
              <a href="{{ url('myorders') }}" class="user-link mr-3">
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>My Orders</span>
              </a>
              <a href="{{ url('mycart') }}" class="user-link mr-3">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                <span>[{{ $count }}]</span>
              </a>
              <form class="form-inline mr-3">
                <button class="btn nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
              </form>
            @else
              <a href="{{ url('/login') }}" class="user-link mr-3">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Login</span>
              </a>
              <a href="{{ url('/register') }}" class="user-link">
                <i class="fa fa-vcard" aria-hidden="true"></i>
                <span>Register</span>
              </a>
            @endauth
          @endif
        </div>
      </div>
    </div>
  </nav>
</header>