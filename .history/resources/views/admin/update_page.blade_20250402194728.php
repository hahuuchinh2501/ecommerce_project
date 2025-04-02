<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
    <style type="text/css">
   .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;}
    label {
  display: inline-block;
  width: 200px;
  padding: 20px;
}

textarea {
  width: 400px;
  height: 80px;
}

 input[type='search'] {
  width: 300px;
  height: 60px;
  margin-left: 50px;
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
            <form>
  <input type="search" name="search">
  <input type="submit" class="btn btn-secondary" value="Search">
</form>
                <h2>update product</h2>

                <div class="div_deg">
                    <form action="{{ url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
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
                            <div>
                            <label>Category</label>
                            <select name="category">
                                <option value="{{ $data->category }}">{{ $data->category }}</option>

                                @foreach($category as $category)
                            <option value="{{ $category->category_name }}">
                                {{ $category->category_name }}
                            </option>
                            @endforeach

                            </select>
                            </div>
                            <div>
                            <label>Brand</label>
                            <select name="brand">
                                <option value="{{ $data->brand }}">{{ $data->brand }}</option>

                                @foreach($brand as $brand)
                            <option value="{{ $brand->brand_name }}">
                                {{ $brand->brand_name }}
                            </option>
                            @endforeach

                            </select>
                            </div>
                            <div>
                            <label>Current Image1</label>
                            <img width="150" src="/products/{{ $data->image1 }}">
                            </div>
                            <div>
                            <label>New Image1</label>
                            <input type="file" name="image1">
                            </div>
                            <div>
                            <label>Current Image2</label>
                            <img width="150" src="/products/{{ $data->image2 }}">
                            </div>
                            <div>
                            <label>New Image2</label>
                            <input type="file" name="image2">
                            </div>
                            <div>
                            <label>Current Image3</label>
                            <img width="150" src="/products/{{ $data->image3 }}">
                            </div>
                            <div>
                            <label>New Image3</label>
                            <input type="file" name="image3">
                            </div>

                            <div>
                            <input class="btn btn-success" type="submit" value="Update Product">
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