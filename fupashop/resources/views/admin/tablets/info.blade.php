@extends('admin.layouts')

@section('content')


<div class="row">
    <div class="col-lg-8">

        <!--Fupa table example -->
        <div class="panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>TABLETS
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

            <div class="panel-body" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
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
                                      <th>Edit</th>
                                      <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach ($items as $tablet)
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
