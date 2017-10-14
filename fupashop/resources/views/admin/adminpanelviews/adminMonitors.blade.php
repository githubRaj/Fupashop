@extends('admin.adminpanelmain.layouts')

@section('content')


<div class="row">
    <div class="col-lg-8">

        <!--Fupa table example -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>MONITORS
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
                          		        <th>Size</th>
                                      <th>weight</th>
                                      <th>brandName</th>
                                      <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach ($monitors as $monitor)
                                    <tr>
                                      <td>{{$monitor->getModelNumber()}}</td>
                                      <td>{{$monitor->getSize()}}</td>
                                      <td>{{$monitor->getWeight()}}</td>
                                      <td>{{$monitor->getBrandName()}}</td>
                                      <td>{{$monitor->getPrice()}}</td>
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
