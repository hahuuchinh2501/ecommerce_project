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
              <div class="div_deg">
                <form>
                  <div>
                      <label>Product Title</label>
                      <input type="text" name="title" required>
                    </div>

                    <div>
                      <label>Description</label>
                      <textarea name="description" required></textarea>
                    </div>

                    <div>
                      <label>Price</label>
                      <input type="text" name="title">
                    </div>

                <div>
                <label>Quantity</label>
                <input type="number" name="qty">
              </div>

              <div>
                <label>Product category</label>
                <select>
                  <option>abc</option>
                </select>
              </div>

                <div>
                <label>Product brand</label>
                <select>
                  <option>abc</option>
                </select>
              </div>

              <div>
                <label>Product Image1</label>
                <input type="file" name="image1">
              </div>
              <div>
                <label>Product Image2</label>
                <input type="file" name="image2">
              </div>
              <div>
                <label>Product Image3</label>
                <input type="file" name="image3">
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