<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')

  <style type="text/css">
.div_deg {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 60px;
}
input[type='text'] {
    width: 400px;
    height: 50px;
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
              <h2>Cập nhật thương hiệu</h2>
                <div class="div_deg">

                <form action="{{ url('update_brand',$data->id) }}" method="post">
                    @csrf
                    <input type="text" name="brand" value="{{ $data->brand_name }}">
                    <input class="btn btn-primary" type="submit" value="Update Brand">
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