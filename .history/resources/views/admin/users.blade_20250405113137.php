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
            <h2 class="h5 no-margin-bottom">Users List</h2>
        </div>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>All Users</strong></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <th>Registration Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                         <td>{{ $user->phone}}</td>
                                        <td>{{ $user->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure you want to delete this user?')" 
                                               href="{{ url('delete_user', $user->id) }}" 
                                               class="btn btn-danger btn-sm">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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