<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enhanced Shopping Slider</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
 @include('home.slidercss')
</head>
<body>
  <section class="slider_section">
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                  <div class="detail-box">
                    <h1>Welcome To Our <br>Shopping Experience</h1>
                    <p>Discover the latest trends in clothing and footwear for everyone. Quality products at affordable prices, designed for comfort and style.</p>
                    
                    <div class="category-badges">
                      <div class="category-badge">
                        <i class="fas fa-tshirt"></i> Clothing
                      </div>
                      <div class="category-badge">
                        <i class="fas fa-shoe-prints"></i> Footwear
                      </div>
                      <div class="category-badge">
                        <i class="fas fa-gem"></i> Accessories
                      </div>
                    </div>
                    
                    <a href="{{ url('view_shop') }}" class="mt-4">Shop Now <i class="fas fa-arrow-right ms-2"></i></a>
                  </div>
                </div>
                <div class="col-lg-5 col-md-12">
                  <div class="img-box">
                    <img src="/images/img_bg.jpg" alt="Fashion Collection" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="scroll-down">
      <span>Scroll Down</span>
      <i class="fas fa-chevron-down mt-2"></i>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>