<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      @include('home.css')

      <style type="text/css">
.div_center {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 60px;
    width: 800px;
}

table {
    border: 2px solid black;
    text-align: center;
    width: 800px;
}
th {
    border: 2px solid skyblue;
    background-color: black;
    color: white;
    font-size: 19px;
    font-weight: bold;
    text-align: center;
}

td {
    border: 1px solid skyblue;
    padding: 10px;
}
</style>
</head>
<body>
     <div class="hero_area" style="padding: 100px;">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
 
    <div class="div_center">
        <table>
    <tr>
        <th>Product Name</th>
        <th>price</th>
        <th>quantity</th>
        <th>Delivery Status</th>
        <th>payment status</th>
         <th>Image</th>
        <th>Action</th>
       
    </tr>

    @foreach ($order as $order)
        <tr>
            <td>{{ $order->product->title }}</td>
            <td>{{ $order->product->price }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->payment_status }}</td>
            <td><img height="200" width="200" src="products/{{ $order->product->image1 }}"></td>
             <td>
            <a onclick="return confirm('Are you sure you want to delete this order?')" 
               class="btn btn-danger" 
               href="{{ url('delete_order', $order->id) }}">
                Delete
            </a>
        </td>
        </tr>
    @endforeach
</table>
    </div>
   

  <!-- info section -->

 @include('home.footer')

</body>
</html>