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
            <h1 style="color: white;">Welcome to Admin dashboard</h1>
           </div>
      </div>
    </div>
   @include('admin.js')
  </body>
</html>