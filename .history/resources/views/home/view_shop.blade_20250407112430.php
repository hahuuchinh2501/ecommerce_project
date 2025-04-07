<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .search-container {
      margin: 20px auto 30px;
      max-width: 600px;
    }
    
    .search-form {
      display: flex;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      border-radius: 5px;
      overflow: hidden;
    }
    
    .search-input {
      flex-grow: 1;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-right: none;
      font-size: 16px;
      outline: none;
    }
    
    .search-button {
      padding: 12px 20px;
      background-color: #333;
      color: white;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .search-button:hover {
      background-color: #555;
    }
    
    .filter-options {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
      gap: 10px;
    }
    
    .filter-button {
      padding: 8px 15px;
      background-color: #f8f8f8;
      border: 1px solid #ddd;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.3s;
    }
    
    .filter-button:hover, .filter-button.active {
      background-color: #333;
      color: white;
    }
    
    .no-results {
      text-align: center;
      padding: 40px;
      color: #666;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')
  </div>

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>All Products</h2>
      </div>
      
      <!-- Search Form -->
      <div class="search-container">
        <form action="{{ url('products') }}" method="GET" class="search-form">
          <input type="text" name="search" class="search-input" placeholder="Search products..." value="{{ request('search') }}">
          <button type="submit" class="search-button">Search</button>
        </form>
      </div>
      
      <!-- Filter Options -->
      <div class="filter-options">
        <a href="{{ url('products') }}" class="filter-button {{ !request('category') ? 'active' : '' }}">All</a>
        <!-- You can add category filters here -->
        <a href="{{ url('products?category=1') }}" class="filter-button {{ request('category') == 1 ? 'active' : '' }}">Category 1</a>
        <a href="{{ url('products?category=2') }}" class="filter-button {{ request('category') == 2 ? 'active' : '' }}">Category 2</a>
        <a href="{{ url('products?sort=price_asc') }}" class="filter-button {{ request('sort') == 'price_asc' ? 'active' : '' }}">Price: Low to High</a>
        <a href="{{ url('products?sort=price_desc') }}" class="filter-button {{ request('sort') == 'price_desc' ? 'active' : '' }}">Price: High to Low</a>
      </div>
      
      <!-- Products Display -->
      <div class="row">
        @if(count($product) > 0)
          @foreach($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="box">
                <div class="img-box">
                  <img src="products/{{ $products->image1 }}" alt="">
                </div>
                <div class="detail-box">
                  <h6>{{ $products->title }}</h6>
                  <h6>
                    Price
                    <span>{{ $products->price }}</span>
                  </h6>
                </div>
                <div style="padding:15px">
                  <a class="btn btn-dark" style="color: white" href="{{ url('product_details', $products->id) }}">
                    Details
                  </a>
                  <a class="btn btn-white" style="border: 1px solid" href="{{ url('add_cart', $products->id) }}">
                    Add to Cart
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="no-results">
            <h3>No products found</h3>
            <p>Try different search terms or browse all products</p>
            <a href="{{ url('products') }}" class="btn btn-primary mt-3">View All Products</a>
          </div>
        @endif
      </div>
      
      <!-- Pagination (if you have it) -->
      <div class="d-flex justify-content-center mt-4">
        {{ $product->links() ?? '' }}
      </div>
      
    </div>
  </section>

  @include('home.footer')

</body>
</html>