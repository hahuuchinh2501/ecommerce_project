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
</style>
  </head>
  <body>
    
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div>
            <table>
    <tr>
        <th>Customer name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Product title</th>
        <th>price</th>
        <th>Image</th>
    </tr>

</table>
        </div>
           </div>
      </div>
    </div>
   @include('admin.js')
  </body>
</html>