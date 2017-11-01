@extends('admin.layouts')

@section('content')


<div class="row">
    <div class="col-lg-8">

        <!--Fupa table example -->
        <div class=" panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>LAPTOPS
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
                          		        <th>Size</th>
                          		      	<th>Ram</th>
                                      <th>Weight</th>
                          		        <th>CPU Cores</th>
                          		        <th>HDD Size</th>
                          		      	<th>Battery Type</th>
                                      <th>Battery Info</th>
                                      <th>Brand</th>
                                      <th>OS</th>
                                      <th>Touch</th>
                                      <th>Camera</th>
                                      <th>Price</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                      <th>Serial</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach ($items as $laptop)
                                    <tr>
                                      <td>{{$laptop->getModelNumber()}}</td>
                                      <td>{{$laptop->getProcessor()}}</td>
                                      <td>{{$laptop->getDisplaySize()}}</td>
                                      <td>{{$laptop->getRamSize()}}</td>
                                      <td>{{$laptop->getWeight()}}</td>
                                      <td>{{$laptop->getCpuCores()}}</td>
                                      <td>{{$laptop->getHddSize()}}</td>
                                      <td>{{$laptop->getBatteryType()}}</td>
                                      <td>{{$laptop->getBatteryInformation()}}</td>
                                      <td>{{$laptop->getBrandName()}}</td>
                                      <td>{{$laptop->getOperatingSystem()}}</td>
                                      <td>{{$laptop->getTouchFeature()}}</td>
                                      <td>{{$laptop->getCameraInformation()}}</td>
                                      <td>{{$laptop->getPrice()}}</td>
                                      <td><a href="/admin/edit/laptops/{{$laptop->getModelNumber()}}" class="btn btn-info">Edit</a></td>
                                      <td>
                                        <a href="/admin/delete/laptops/{{$laptop->getModelNumber()}}" class="btn btn-danger">Delete</a>
                                      </td>
                                        <td><a href="/admin/viewSerial/{{$laptop->getModelNumber()}}" class="btn btn-info">Serials</a></td>
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
