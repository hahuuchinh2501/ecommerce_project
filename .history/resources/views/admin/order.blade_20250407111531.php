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
        <th>payment Status</th>
        <th>Status</th>
        <th>change Status</th>
        <th>print pdf</th>
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
        <td>{{ $data->payment_status }}</td>
         <td>
            @if ($data->status == 'in progress')
    <span style="color:red">{{ $data->status }}</span>
@elseif ($data->status == 'On Delivery')
    <span style="color:skyblue;">{{ $data->status }}</span>
@else
    <span style="color:green;">{{ $data->status }}</span>
@endif
         </td>
         <td>
    <a class="btn btn-primary" href="{{ url('on_delivery',$data->id) }}">On delivery</a>
    <a class="btn btn-success" href="{{ url('delivered',$data->id) }}">Delivered</a>
            </td>

            <td>
    <a class="btn btn-secondary" href="{{ url('print_pdf', $data->id) }}">Print PDF</a>
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