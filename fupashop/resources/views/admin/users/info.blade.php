@extends('admin.layouts')

@section('content')
<link href="{{ asset('css/lights.css') }}" rel="stylesheet">
<div class=" panel-primary">
    <div class="panel-heading">
        <i class="fa fa-bar-chart-o fa-fw"></i>CLIENTS
    </div>
</div>

<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                          <th>Status</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Phone Number</th>
                          <th>Last Logged In</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- CLIENTS-->
                      @foreach ($users as $user)
                        <tr>
                        @if($user->status =='logged in')
                          <td>
                              <div class="led-box">
                              <div class="led-green"></div>
                              </div>
                          </td>
                        @else
                          <td>
                              <div class="led-box">
                              <div class="led-red"></div>
                              </div>
                          </td>
                        @endif
                          <td>{{$user->firstName }}</td>
                          <td>{{$user->lastName }}</td>
                          <td>{{$user->email }}</td>
                          <td>{{$user->address }}</td>
                          <td>{{$user->phoneNumber}}</td>
                          <td>{{$user->timeStamp }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <!-- /.row -->
</div>

<div class=" panel-primary">
    <div class="panel-heading">
        <i class="fa fa-bar-chart-o fa-fw"></i>ADMINISTRATORS
    </div>
</div>

<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                          <th>Status</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Phone Number</th>
                          <th>Last Logged In</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ADMINS-->
                      @foreach ($admins as $user)
                        <tr>
                        
                        @if($user->status =='logged in')
                          <td>
                              <div class="led-box">
                              <div class="led-green"></div>
                              </div>
                          </td>
                        @else
                          <td>
                              <div class="led-box">
                              <div class="led-red"></div>
                              </div>
                          </td>
                        @endif
                          <td>{{$user->firstName }}</td>
                          <td>{{$user->lastName }}</td>
                          <td>{{$user->email }}</td>
                          <td>{{$user->address }}</td>
                          <td>{{$user->phoneNumber}}</td>
                          <td>{{$user->timeStamp }}</td>
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

@endsection
