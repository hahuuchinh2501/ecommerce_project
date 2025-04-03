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
}

th {
    border: 2px solid black;
    text-align: center;
    color: white;
    font: 20px;
    font-weight: bold;
    background-color: black;
}

</style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
  
  </div>
  

    <div class="div_deg">
  <table>
    <tr>
      <th>Product Title</th>
      <th>Price</th>
      <th>quantity</th>
      <th>Image</th>
    </tr>
    <tr>
        t
    </tr>
  </table>
</div>




 
   

  <!-- info section -->

 @include('home.footer')

</body>

</html>