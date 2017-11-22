@extends('admin.layouts')

@section('content')

@if(Session::has('success'))
  <div class="alert alert-success">
    <strong>Success:</strong> {{ Session::get('success')}}
  </div>
@endif

<head>
    <script type="text/javascript" src="{{ asset('/static/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/static/js/tablesorter.js') }}"></script>
</head>
<body>

<div class="row">
    <div class="col-lg-8">

        <!--Fupa table example -->
        <div class="panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>TABLETS
                <!--Fupa table example -->
                <div class=" panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>LAPTOPS
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
            </div>
          </div>

            <div class="panel-body" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="myTable" class=" tablesorter table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                      <th>Model #</th>
                          		        <th>Processor</th>
                          		        <th>Size</th>
                          		      	<th>Dimension</th>
                                      <th>Ram</th>
                                      <th>Weight</th>
                          		        <th>Cores</th>
                          		        <th>HDD</th>
                                      <th>Battery</th>
                                      <th>Brand</th>
                                      <th>OS</th>
                                      <th>Camera</th>
                                      <th>Price</th>
                                      <th class="sorter-false">Edit</th>
                                      <th class="sorter-false">Delete</th>
                                      <th class="sorter-false">Serial</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">

                                  @foreach ($items as $tablet)
                                  {{$tablet->getStock()}}
                                    <tr>
                                      <td>{{$tablet->getModelNumber()}}</td>
                                      <td>{{$tablet->getProcessor()}}</td>
                                      <td>{{$tablet->getScreenSize()}}</td>
                                      <td>{{$tablet->getDimensions()}}</td>
                                      <td>{{$tablet->getRamSize()}}</td>
                                      <td>{{$tablet->getWeight()}}</td>
                                      <td>{{$tablet->getCpucores()}}</td>
                                      <td>{{$tablet->getHddSize()}}</td>
                                      <td>{{$tablet->getBatteryInformation()}}</td>
                                      <td>{{$tablet->getBrandName()}}</td>
                                      <td>{{$tablet->getOperatingSystem()}}</td>
                                      <td>{{$tablet->getCameraInformation()}}</td>
                                      <td>{{$tablet->getPrice()}}</td>
                                      <td><a href="/admin/edit/tablets/{{$tablet->getModelNumber()}}" class="btn btn-info">Edit</a></td>
                                      <td>
                                        <a href="/admin/delete/tablets/{{$tablet->getModelNumber()}}" class="btn btn-danger">Delete</a>
                                      </td>
                                        <td><a href="/admin/viewSerial/tablets/{{$tablet->getModelNumber()}}" class="btn btn-info">Serials</a></td>
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
