<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area " style="padding: 50px">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
   

  <!-- end shop section -->


<section class="contact_section py-5">
  <div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    
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
        <form action="{{ route('contact.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" required />
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') }}" />
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4" placeholder="Message" required>{{ old('message') }}</textarea>
            @error('message')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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