<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')

  <style type="text/css">
.div_deg {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 60px;
}
label {
  display: inline-block;
  width: 200px;
  font-size: 18px !important;
  color: white !important;
}

input[type='text'] {
  width: 200px;
  height: 50px;
}
textarea {
  width: 450px;
  height: 80px;
}
.input_deg {
  padding: 15px;
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
            <h2>add Product</h2>
              <div class="div_deg">
                <form>
                  <div class="input_deg">
                      <label>Product Title</label>
                      <input type="text" name="title" required>
                    </div>

                    <div class="input_deg">
                      <label>Description</label>
                      <textarea name="description" required></textarea>
                    </div>

                    <div class="input_deg">
                      <label>Price</label>
                      <input type="text" name="title">
                    </div>

                <div class="input_deg">
                <label>Quantity</label>
                <input type="number" name="qty">
              </div>

              <div class="input_deg">
                <label>Product category</label>
                <select>
                  <option>abc</option>
                </select>
              </div>

                <div class="input_deg">
                <label>Product brand</label>
                <select>
                  <option>abc</option>
                </select>
              </div>

              <div class="input_deg">
                <label>Product Image1</label>
                <input type="file" name="image1">
              </div>
              <div class="input_deg">
                <label>Product Image2</label>
                <input type="file" name="image2">
              </div>
              <div class="input_deg">
                <label>Product Image3</label>
                <input type="file" name="image3">
              </div>

               <div class="input_deg">
                
                <input type="submit" class="btn btn-success" value="Add Product">
              </div>

                </form>
              </div>
           </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admincss/js/charts-home.js') }}"></script>
<script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>