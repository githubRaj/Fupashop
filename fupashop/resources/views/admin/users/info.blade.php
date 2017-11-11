@extends('admin.layouts')

@section('content')

<div class=" panel-primary">
    <div class="panel-heading">
        <i class="fa fa-bar-chart-o fa-fw"></i>USERS
    </div>
</div>

@foreach( $users as $user )

<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach ($users as $user)
                        <tr>
                          <td>{{$user->firstName }}</td>
                          <td>{{$user->lastName }}</td>
                          <td>{{$user->email }}</td>
                          <td>{{$user->address }}</td>
                          <td>{{$user->phoneNumber}}</td>
                        </tr>
                      @endforeach

                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <!-- /.row -->
</div>
<!-- /.panel-body -->

@endforeach

@endsection
