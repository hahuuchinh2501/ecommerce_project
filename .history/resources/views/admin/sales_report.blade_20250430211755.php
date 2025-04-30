<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  </head>
  <body>
    
    @include('admin.header')

    @include('admin.sidebar')
      <div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Sales Revenue Report</h2>
        </div>
    </div>
    
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title">
                            <h3 class="h4">Filter Sales Report</h3>
                        </div>
                        <div class="block-body">
                            <form action="{{ url('filter_sales_report') }}" method="GET" class="form-inline">
                                <div class="form-group mr-3 mb-3">
                                    <label for="category" class="mr-2">Category:</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_name }}" {{ isset($category) && $category == $category->category_name ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group mr-3 mb-3">
                                    <label for="brand" class="mr-2">Brand:</label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">All Brands</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->brand_name }}" {{ isset($brand) && $brand == $brand->brand_name ? 'selected' : '' }}>
                                                {{ $brand->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group mr-3 mb-3">
                                    <label for="date_from" class="mr-2">From Date:</label>
                                    <input type="date" name="date_from" id="date_from" class="form-control" value="{{ $date_from ?? '' }}">
                                </div>
                                
                                <div class="form-group mr-3 mb-3">
                                    <label for="date_to" class="mr-2">To Date:</label>
                                    <input type="date" name="date_to" id="date_to" class="form-control" value="{{ $date_to ?? '' }}">
                                </div>
                                
                                <button type="submit" class="btn btn-primary mb-3">Apply Filters</button>
                                <a href="{{ url('sales_report') }}" class="btn btn-secondary mb-3 ml-2">Reset</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="block margin-bottom-sm">
                        <div class="title d-flex justify-content-between align-items-center">
                            <h3 class="h4">Sales Summary</h3>
                            <a href="{{ url('export_sales_report_pdf') }}" class="btn btn-primary">Export PDF</a>
                        </div>
                        
                        <div class="block-body">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <h5 class="card-title text-white">Total Revenue</h5>
                                            <h2 class="display-4">${{ number_format($totalRevenue, 2) }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-info text-white">
                                        <div class="card-body">
                                            <h5 class="card-title text-white">Total Products Sold</h5>
                                            <h2 class="display-4">{{ array_sum(array_column($salesData, 'quantity')) }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Price</th>
                                            <th>Quantity Sold</th>
                                            <th>Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($salesData) > 0)
                                            @foreach($salesData as $index => $item)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ $item['title'] }}</td>
                                                    <td>{{ $item['category'] }}</td>
                                                    <td>{{ $item['brand'] }}</td>
                                                    <td>${{ number_format($item['price'], 2) }}</td>
                                                    <td>{{ $item['quantity'] }}</td>
                                                    <td>${{ number_format($item['revenue'], 2) }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No sales data available</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
     
   @include('admin.js')
  </body>
</html>