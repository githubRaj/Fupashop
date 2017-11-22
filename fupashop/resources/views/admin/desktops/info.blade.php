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
        <div class=" panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>DESKTOPS
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
                                      <th>Model Number</th>
                          		        <th>Processor</th>
                          		        <th>Dimensions</th>
                          		      	<th>Ram</th>
                                      <th>Weight</th>
                          		        <th>Cores</th>
                          		        <th>HDD</th>
                          		      	<th>Brand</th>
                                      <th>Price</th>
                                      <th class="sorter-false">Edit</th>
                                      <th class="sorter-false">Delete</th>
                                      <th class="sorter-false">Serial</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">

                                  @foreach ($items as $desktop)
                                    @if(!session()->has('itemToLock.'.$desktop->getModelNumber()))
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

                                      {{$desktop->getStock()}}

                                    <tr>
                                      <td>{{$desktop->getModelNumber()}}</td>
                                      <td>{{$desktop->getProcessor()}}</td>
                                      <td>{{$desktop->getDimensions()}}</td>
                                      <td>{{$desktop->getRamSize()}}</td>
                                      <td>{{$desktop->getWeight()}}</td>
                                      <td>{{$desktop->getCpuCores()}}</td>
                                      <td>{{$desktop->getHddSize()}}</td>
                                      <td>{{$desktop->getBrandName()}}</td>
                                      <td>{{$desktop->getPrice()}}</td>
                                      <td><a href="{{route('edit', ['desktops',$desktop->getModelNumber()])}}" class="btn btn-warning">Edit</a></td>
                                      <td><a href="{{route('delete', ['desktops',$desktop->getModelNumber()])}}" {{$button}} class="btn btn-danger">Delete</a></td>
                                      <td><a href="{{route('serials', ['desktops',$desktop->getModelNumber()])}}" {{$button}} class="btn btn-info">Serials</a></td>
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
