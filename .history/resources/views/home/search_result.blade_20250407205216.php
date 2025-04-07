<!DOCTYPE html>
<html lang="en">

<head>
  @include('home.css')
  <style>
    .shop_section {
      padding: 60px 0;
      background-color: #f9f9f9;
    }
    
    .product-card {
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s, box-shadow 0.3s;
      margin-bottom: 30px;
      background-color: #fff;
    }
    
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }
    
    .img-container {
      position: relative;
      padding-top: 100%;
      overflow: hidden;
      background-color: #f5f5f5;
    }
    
    .img-container img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s;
    }
    
    .product-card:hover .img-container img {
      transform: scale(1.05);
    }
    
    .product-info {
      padding: 20px;
    }
    
    .product-title {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 8px;
      color: #333;
      height: 48px;
      overflow: hidden;
    }
    
    .product-price {
      font-size: 20px;
      font-weight: 700;
      color: #ff4c4c;
      margin-bottom: 15px;
    }
    
   .action-buttons {
    display: flex;
    justify-content: space-between; 
    align-items: center; 
}

.view-btn, .cart-form {
    flex: 1; 
}

.view-btn {
    padding: 8px 15px;
    background-color: rgb(255, 255, 255);
    color: black;
    border: 1px solid black;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    flex-grow: 1;
}

.view-btn:hover {
    background-color: white;
}

.cart-form {
    display: flex; 
    align-items: center; 
}

.quantity-input {
    width: 60px;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-right: 10px;
    text-align: center;
}

.add-cart-btn {
    padding: 8px 15px;
    background-color: rgb(255, 255, 255);
    color: black;
    border: 1px solid black;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    flex-grow: 1;
}

.add-cart-btn:hover {
    background-color: rgb(255, 255, 255);
}
    
    .search-header {
      margin-bottom: 40px;
      position: relative;
    }
    
    .search-header h2 {
      font-size: 30px;
      position: relative;
      display: inline-block;
      padding-bottom: 15px;
    }
    
    .search-header h2:after {
      content: '';
      position: absolute;
      width: 60%;
      height: 3px;
      background-color: #ff4c4c;
      bottom: 0;
      left: 20%;
    }
    
    .search-term {
      font-weight: 700;
      color: #ff4c4c;
    }
    
    .alert {
      border-radius: 8px;
      padding: 15px 20px;
      margin-bottom: 30px;
    }
    
    .alert-success {
      background-color: #d4edda;
      border-color: #c3e6cb;
      color: #155724;
    }
    
    .alert-info {
      background-color: #fff;
      border: 1px dashed #ddd;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    
    .no-results-container {
      padding: 50px 20px;
    }
    
    .pagination-container {
      margin-top: 40px;
    }
    
    .pagination {
      display: flex;
      justify-content: center;
      list-style: none;
      gap: 5px;
    }
    
    .page-item.active .page-link {
      background-color: #ff4c4c;
      border-color: #ff4c4c;
    }
    
    .page-link {
      padding: 8px 16px;
      border-radius: 4px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
  </div>

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="search-header text-center">
        <h2>Search Results for <span class="search-term">"{{ $search_text }}"</span></h2>
      </div>
      
      @if(session()->has('message'))
        <div class="alert alert-success">
          <div class="d-flex align-items-center">
            <i class="fa fa-check-circle mr-2"></i>
            <div>{{ session()->get('message') }}</div>
          </div>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
      @endif
      
      <div class="row">
        @if($products->count() > 0)
          @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="product-card">
                <div class="img-container">
                  <img src="/products/{{ $product->image1 }}" alt="{{ $product->title }}">
                </div>
                <div class="product-info">
                  <h5 class="product-title">{{ $product->title }}</h5>
                  <div class="product-price">{{ $product->price }}</div>
                  <div class="action-buttons">
                    <a href="{{ url('product_details', $product->id) }}" class="view-btn">
                      <i class="fa fa-eye"></i> Details
                    </a>
                    <form action="{{ url('add_cart', $product->id) }}" method="POST" class="cart-form">
                      @csrf
                    
                      <button type="submit" class="add-cart-btn">
                        <i class="fa fa-shopping-cart"></i> Add
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          
          <div class="col-12">
            <div class="pagination-container">
              {{ $products->appends(['search_text' => $search_text])->links() }}
            </div>
          </div>
        @else
          <div class="col-12">
            <div class="no-results-container text-center">
              <div class="alert alert-info">
                <img src="{{ asset('images/no-results.svg') }}" alt="No results" style="max-width: 150px; margin-bottom: 20px;">
                <h4>No products found matching "{{ $search_text }}"</h4>
                <p class="mt-3">Try searching with different keywords or explore our categories below</p>
                <div class="mt-4">
                  <a href="{{ url('view_shop') }}" class="btn btn-primary">Browse All Products</a>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>

  @include('home.footer')

  <script>
    // Add animation effect for alerts
    $(document).ready(function() {
      $('.alert-success').fadeIn().delay(3000).fadeOut();
    });
  </script>
</body>

</html>