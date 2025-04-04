<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')

  <style type="text/css">
    table {
        border: 2px solid skyblue;
        text-align: center;
    }

    th {
        background-color: skyblue;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }
    .table_center {
    display: flex;
    justify-content: center;
    align-items: center;
}
td {
    color: white;
    padding: 10px;
    border: 1px solid skyblue;
}
</style>
  </head>
  <body>
    
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="table_center">
            <table>
    <tr>
        <th>Customer name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Product title</th>
        <th>price</th>
        <th>quantity</th>
        <th>Image</th>
    </tr>

    @foreach ($data as $data)

    <tr>

        <td>{{ $data->name }}</td>

        <td>{{ $data->rec_address }}</td>
        <td>{{ $data->phone }}</td>

        <td>{{ $data->product->title }}</td>
        <td>{{ $data->product->price }}</td>
        <td>{{ $data->quantity }}</td>

        <td>

            <img width="150" src="products/{{ $data->product->image1 }}">

        </td>

    </tr>

@endforeach

</table>
        </div>
           </div>
      </div>
    </div>
   @include('admin.js')
  </body>
</html>