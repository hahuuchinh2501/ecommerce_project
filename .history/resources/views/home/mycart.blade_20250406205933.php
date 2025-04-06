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

</style>

</head>

<body>
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

    <a class="btn btn-success" href="{{ url('stripe') }}">Pay Using Card</a>
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
                <form action="{{ url('update_cart_quantity', $cartItem->id) }}" method="POST" class="quantity-cell">
                  @csrf
                  <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="quantity-input">
                  <button type="submit" class="btn btn-sm btn-info">Update</button>
                </form>
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
          <a href="{{ url('products') }}" class="btn btn-primary mt-3">Continue Shopping</a>
        </div>
      @endif
    </div>
    
    @if(count($cart) > 0)
      <div class="cart-total">
        <?php $total = 0; ?>
        @foreach($cart as $cartItem)
          <?php $total += $cartItem->product->price * $cartItem->quantity; ?>
        @endforeach
        
        <h4>Total Amount: {{ $total }}</h4>
        <div class="mt-3">
          <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
      </div>
    @endif
  </div>
  
  <!-- info section -->
  @include('home.footer')

</body>
</html>