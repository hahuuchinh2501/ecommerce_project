<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    
  </div>
 
     <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
     
        
        
        <div class="col-md-10 ">
          <div class="box">
            
              <div class="img-box">
                <img src="/products/{{ $data->image1 }}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{ $data->title }}
                </h6>
                <h6>
                  Price
                  <span>
                    {{ $data->price }}
                  </span>
                </h6>
              </div>
            
          </div>
        </div>
       
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div>
  </section>




 

 @include('home.footer')

</body>

</html>