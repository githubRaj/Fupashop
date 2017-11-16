@extends('admin.layouts')

@section('content')

@if(Session::has('success'))
  <div class="alert alert-success">
    <strong>Success:</strong> {{ Session::get('success')}}
  </div>
@endif


<div class="row">
    <div class="col-lg-8">

        <!--Fupa table example -->
        <div class=" panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>DESKTOPS
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Actions
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Action</a>
                            </li>
                            <li><a href="#">Another action</a>
                            </li>
                            <li><a href="#">Something else here</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Separate link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
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
                                      <th>Edit</th>
                                      <th>Delete</th>
                                      <th>Serial</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach ($items as $desktop)
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
                                      <td><a href="/admin/edit/desktops/{{$desktop->getModelNumber()}}" class="btn btn-info">Edit</a></td>
                                      <td>
                                        <a href="/admin/delete/desktops/{{$desktop->getModelNumber()}}" class="btn btn-danger">Delete</a>
                                      </td>
                                      <td><a href="/admin/viewSerial/desktops/{{$desktop->getModelNumber()}}" class="btn btn-info">Serials</a></td>
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


@endsection
