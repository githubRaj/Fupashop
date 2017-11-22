@extends('admin.layouts')

@section('content')

@if(Session::has('success'))
  <div class="alert alert-success">
    <strong>Success:</strong> {{ Session::get('success')}}
  </div>
@endif
<head>
    <!-- Le styles
    <link href="/static/css/bootstrap.css" rel="stylesheet">
    <link href="/static/css/bootstrap.css" rel="stylesheet">-->
    <script type="text/javascript" src="{{ asset('/static/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/static/js/tablesorter.js') }}"></script>

  </head>

<body>
<div class="row">
    <div class="col-lg-8">

        <!--Fupa table example -->
        <div class=" panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>MONITORS
                    <!-- search section-->
                    <div class="input-group custom-search-form">
                        <input id="searchInput" type="text" class="form-control"  placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!--end search section-->
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                          <table id="myTable" class="tablesorter table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                      <th>Model #</th>
                          		        <th>Size</th>
                                      <th>Weight</th>
                                      <th>Brand</th>
                                      <th>Price</th>
                                      <th class="sorter-false">Edit</th>
                                      <th class="sorter-false">Delete</th>
                                      <th class="sorter-false">Serial</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">

                                  @foreach ($items as $monitor)
                                  @if(!session()->has('itemToLock.'.$monitor->getModelNumber()))
                                      @php
                                        //IN STOCK
                                        $button = "enabled";
                                      @endphp
                                    @else
                                      @php
                                        //OUT OF STOCK
                                        $button = "disabled";
                                      @endphp
                                    @endif

                                    {{$monitor->getStock()}}

                                    <tr>
                                      <td>{{$monitor->getModelNumber()}}</td>
                                      <td>{{$monitor->getSize()}}</td>
                                      <td>{{$monitor->getWeight()}}</td>
                                      <td>{{$monitor->getBrandName()}}</td>
                                      <td>{{$monitor->getPrice()}}</td>
                                      <td><a href="{{route('edit', ['monitors',$monitor->getModelNumber()])}}" class="btn btn-warning">Edit</a></td>
                                      <td><a href="{{route('delete', ['monitors',$monitor->getModelNumber()])}}" {{$button}} class="btn btn-danger">Delete</a></td>
                                      <td><a href="{{route('serials', ['monitors',$monitor->getModelNumber()])}}" {{$button}} class="btn btn-info">Serials</a></td>
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
        </div>
        <!--End simple table example -->

    </div>

</div>

  <script type="text/javascript" src="{{ asset('/static/js/filter.js') }}"></script>

</body>



@endsection
