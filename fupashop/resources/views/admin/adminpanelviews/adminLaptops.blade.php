@extends('admin.adminpanelmain.layouts')

@section('content')


<div class="row">
    <div class="col-lg-8">

        <!--Fupa table example -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>Laptops
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
                          		        <th>Display Size</th>
                          		      	<th>Ram Size</th>
                                      <th>Weight</th>
                          		        <th>CPU Cores</th>
                          		        <th>HDD Size</th>
                          		      	<th>Battery Type</th>
                                      <th>Brand Name</th>
                                      <th>Operating System</th>
                                      <th>Touch Feature</th>
                                      <th>Camera Information</th>
                                      <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach ($laptops as $laptop)
                                    <tr>
                                      <td>{{$laptop->modelNumber}}</td>
                                      <td>{{$laptop->processor}}</td>
                                      <td>{{$laptop->displaySize}}</td>
                                      <td>{{$laptop->ramSize}}</td>
                                      <td>{{$laptop->weight}}</td>
                                      <td>{{$laptop->cpuCores}}</td>
                                      <td>{{$laptop->hddSize}}</td>
                                      <td>{{$laptop->batteryType}}</td>
                                      <td>{{$laptop->batteryInformation}}</td>
                                      <td>{{$laptop->brandName}}</td>
                                      <td>{{$laptop->operatingSystem}}</td>
                                      <td>{{$laptop->touchFeature}}</td>
                                      <td>{{$laptop->cameraInformation}}</td>
                                      <td>{{$laptop->price}}</td>
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
