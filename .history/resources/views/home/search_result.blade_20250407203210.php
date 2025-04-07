<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
@include('home.header')


<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Search Results for "{{ $search_text }}"</h2>
        </div>
        
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        @endif
        
        <div class="row">
            @if($products->count() > 0)
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <a href="{{ url('product_details', $product->id) }}" class="option1">
                                        View Details
                                    </a>
                                    <form action="{{ url('add_cart', $product->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="number" name="quantity" value="1" min="1" style="width:100px;">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="submit" value="Add To Cart">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="/products/{{ $product->image1 }}" alt="{{ $product->title }}">
                            </div>
                            <div class="detail-box">
                                <h5>{{ $product->title }}</h5>
                                <h6>
                                    {{ $product->price }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="pagination-container mt-4 d-flex justify-content-center">
                    {{ $products->appends(['search_text' => $search_text])->links() }}
                </div>
            @else
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <h4>No products found matching "{{ $search_text }}"</h4>
                        <p>Try searching with different keywords or <a href="{{ url('view_shop') }}">browse all products</a>.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>