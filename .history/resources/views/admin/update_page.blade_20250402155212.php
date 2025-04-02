<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  </head>
  <body>
    
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
                <h2>update product</h2>

                <div>
                    <form>
                        <div>
  <label>Title</label>
  <input type="text" name="title" value="{{ $data->title }}">
</div>

<div>
  <label>Description</label>
  <textarea name="description">{{ $data->description }}</textarea>
</div>
<div>
    <label>price</label>
    <input type="text" name="price" value="{{ $data->price }}">
</div>
<div>
    <label>Quantity</label>
    <input type="number" name="quantity" value="{{ $data->quantity }}">
</div>
                    </form>
                </div>
           </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>