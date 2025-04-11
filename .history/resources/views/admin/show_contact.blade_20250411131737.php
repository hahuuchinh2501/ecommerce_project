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
            <h1 class="h3 mb-4 text-gray-800">Message Details</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Message from {{ $contact->name }}</h6>
            <div>
                <a href="{{ route('admin.view_contacts') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
                <form action="{{ route('admin.view_contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this message?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $contact->name }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Phone:</strong> {{ $contact->phone ?? 'Not provided' }}</p>
                    <p><strong>Date:</strong> {{ $contact->created_at->format('F d, Y H:i:s') }}</p>
                    <p><strong>Status:</strong> 
                        @if($contact->is_read)
                        <span class="badge badge-success">Read</span>
                        @else
                        <span class="badge badge-warning">Unread</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-12 mt-4">
                    <h5 class="font-weight-bold">Message:</h5>
                    <div class="border p-3 bg-light">
                        {{ $contact->message }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
           </div>
      </div>
    </div>
   @include('admin.js')
  </body>
</html>