<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
   

  <!-- end shop section -->


<section class="contact_section py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="heading_container mb-4">
          <h2>Contact Us</h2>
        </div>
        <div class="contact_info">
          <div class="info_item d-flex mb-3">
            <i class="fa fa-map-marker mr-3" aria-hidden="true"></i>
            <p>123 Gift Street, Shopping District, City</p>
          </div>
          <div class="info_item d-flex mb-3">
            <i class="fa fa-phone mr-3" aria-hidden="true"></i>
            <p>+1 234 567 8900</p>
          </div>
          <div class="info_item d-flex mb-3">
            <i class="fa fa-envelope mr-3" aria-hidden="true"></i>
            <p>info@giftos.com</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <form action="#">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" required />
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" required />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Phone" />
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="4" placeholder="Message" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">SEND</button>
        </form>
      </div>
    </div>
  </div>
</section>




  <!-- contact section -->

 
  <!-- end contact section -->

   

  <!-- info section -->

 @include('home.footer')

</body>

</html>