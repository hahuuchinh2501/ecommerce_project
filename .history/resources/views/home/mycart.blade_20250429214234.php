<!-- Move the total calculation to the top of the view before it's used -->
<?php 
$total = 0; 
if(isset($cart) && count($cart) > 0) {
    foreach($cart as $cartItem) {
        $total += $cartItem->product->price * $cartItem->quantity;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  @include('home.css')
  <style type="text/css">
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
    }
     table {
        border: 2px solid black;
        text-align: center;
        width: 800px;
    }

    th {
        border: 2px solid black;
        text-align: center;
        color: white;
        font: 20px;
        font-weight: bold;
        background-color: black;
    }
    
    td {
        border: 1px solid skyblue;
        padding: 10px;
        vertical-align: middle;
    }
    
    .btn-remove {
        background-color: #ff4d4d;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .btn-remove:hover {
        background-color: #e60000;
    }
    
    .quantity-cell {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .quantity-input {
        width: 50px;
        text-align: center;
        margin: 0 5px;
    }
    
    .cart-empty {
        text-align: center;
        padding: 20px;
        color: #666;
    }
    
    .cart-total {
        margin-top: 20px;
        text-align: right;
        font-weight: bold;
    }

  
label {
    display: inline-block;
    width: 150px;
}

.spinner-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s, visibility 0.3s;
}

.spinner-overlay.active {
    visibility: visible;
    opacity: 1;
}

.spinner {
    border: 5px solid #f3f3f3;
    border-top: 5px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
    /* Rest of your CSS styles */
    /* ... */
  </style>
</head>
<body>
  <!-- Loading spinner overlay -->
  <div id="spinnerOverlay" class="spinner-overlay">
    <div class="spinner"></div>
  </div>

  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
  </div>
  
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Your Shopping Cart</h2>
    </div>
    
    <div class="div_deg">
      <div class="order_deg">
      <form action="{{ url('confirm_order') }}" method="Post">
        @csrf
        <div class="div_gap">
            <label>Receiver Name</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}">
        </div>

        <div class="div_gap">
            <label>Receiver address</label>
            <textarea name="address">{{ Auth::user()->address }}</textarea>
        </div>

        <div class="div_gap">
            <label>Receiver phone</label>
            <input type="text" name="phone" value="{{ Auth::user()->phone }}">
        </div>

        <div>
            <input class="btn btn-primary" type="submit" value="Cash On Delivery">
            <a class="btn btn-success" href="{{ url('stripe', $total) }}">Pay Using Card</a>
        </div>
      </form>
      </div>
      @if(count($cart) > 0)
        <table>
          <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
          
          @foreach ($cart as $cartItem)
            <tr>
              <td>{{ $cartItem->product->title }}</td>
              <td>{{ $cartItem->product->price }}</td>
              <td>
                <div class="quantity-cell">
                  <input 
                    type="number" 
                    name="quantity" 
                    value="{{ $cartItem->quantity }}" 
                    min="1" 
                    class="quantity-input"
                    data-id="{{ $cartItem->id }}" 
                    onchange="updateQuantity(this)"
                  >
                </div>
              </td>
              <td>
                <img width="150" src="/products/{{ $cartItem->product->image1 }}" alt="{{ $cartItem->product->title }}">
              </td>
              <td>
                <a href="{{ url('remove_cart', $cartItem->id) }}" class="btn-remove" onclick="return confirm('Are you sure you want to remove this item?')">
                  Remove
                </a>
              </td>
            </tr>
          @endforeach
        </table>
      @else
        <div class="cart-empty">
          <h3>Your cart is empty</h3>
          <p>Add some products to your cart and they will appear here.</p>
          <a href="{{ url('view_shop') }}" class="btn btn-primary mt-3">Continue Shopping</a>
        </div>
      @endif
    </div>
    
    @if(count($cart) > 0)
      <div class="cart-total">
        <h4>Total Amount: {{ $total }}</h4>
        <div class="mt-3">
          <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
      </div>
    @endif
  </div>
  
  <!-- info section -->
  @include('home.footer')

  <script>
    function updateQuantity(input) {
      const cartId = input.getAttribute('data-id');
      const quantity = input.value;
      
      // Show loading spinner
      document.getElementById('spinnerOverlay').classList.add('active');
      
      // Create form data
      const formData = new FormData();
      formData.append('quantity', quantity);
      formData.append('_token', '{{ csrf_token() }}');
      
      // Send AJAX request
      fetch('{{ url("update_cart_quantity") }}/' + cartId, {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (response.ok) {
          // Reload the page to reflect changes
          window.location.reload();
        } else {
          console.error('Error updating cart');
          document.getElementById('spinnerOverlay').classList.remove('active');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        document.getElementById('spinnerOverlay').classList.remove('active');
      });
    }
  </script>
</body>
</html>