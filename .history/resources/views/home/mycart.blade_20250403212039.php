<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
  
  </div>
  

    @foreach ($cart as $cart)

    {{ $cart->user_id }}

    <h1>{{ $cart->product_id }}</h1>

    <h1>{{ $cart->product->title }}</h1>

    <h1>{{ $cart->user->name }}</h1>

    @endforeach




 
   

  <!-- info section -->

 @include('home.footer')

</body>

</html>