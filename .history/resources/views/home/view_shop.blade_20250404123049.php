<!-- Create a new file: resources/views/shop/index.blade.php -->


<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>All Products</h2>
        </div>

        <!-- Search Form -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <form action="{{ route('view_shop') }}" method="GET" class="form-inline justify-content-center">
                    <div class="input-group w-100">
                        <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Filter Options (Optional) -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <label>Category:</label>
                        <select class="form-control-sm" onchange="window.location.href=this.value">
                            <option value="{{ route('view_shop') }}">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ route('shop', ['category' => $category->id]) }}" 
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Sort By:</label>
                        <select class="form-control-sm" onchange="window.location.href=this.value">
                            <option value="{{ route('shop', ['sort' => 'newest']) }}" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="{{ route('shop', ['sort' => 'price_low']) }}" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="{{ route('shop', ['sort' => 'price_high']) }}" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="row">
            @if($products->count() > 0)
                @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="products/{{ $product->image1 }}" alt="{{ $product->title }}">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $product->title }}</h6>
                            <h6>
                                Price
                                <span>{{ $product->price }}</span>
                            </h6>
                        </div>
                        <div style="padding:15px">
                            <a class="btn btn-dark" style="color: white" href="{{ url('product_details', $product->id) }}">
                                Details
                            </a>
                            <a class="btn btn-white" style="border: 1px solid" href="{{ url('add_cart', $product->id) }}">
                                add cart
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <h4>No products found</h4>
                    <p>Try different search criteria or browse our categories</p>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(request()->query())->links() }}
        </div>

        <div class="btn-box text-center mt-4">
            <a href="{{ route('shop') }}">View All Products</a>
        </div>
    </div>
</section>
@endsection