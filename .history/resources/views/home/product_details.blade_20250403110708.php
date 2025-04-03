<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style type="text/css">
    .div_center {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30;
}
.detail-box{
    padding: 15px;
}

  </style>

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
            
              <div class="div_center">
                <img  width="300px" src="/products/{{ $data->image1 }}" alt="">
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

              <div class="detail-box">
  <h6>Category : {{ $data->category }}</h6>
  <h6>brand : {{ $data->brand }}</h6>
  <h6>Available Quantity: <span>{{ $data->quantity }}</span></h6>
</div>
            <div class="detail-box">
                <p>{{ $data->description }}</p>
            </div>
          </div>
        </div>
       
        </div>
      </div>
      
    </div>
  </section>




 

 @include('home.footer')

</body>

</html>