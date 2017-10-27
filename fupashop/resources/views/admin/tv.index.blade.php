@extends('admin.adminpanelmain.layouts')

@section('content')


<div class="row">
    <div class="col-lg-8">

        <!--Fupa table example -->
        <div class=" panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>TVS
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
                          		        <th>Dimensions</th>
                          		      	<th>Tv Type</th>
                                      <th>Weight</th>
                          		        <th>Resolution</th>
                          		        <th>ScreenSize</th>
                          		      	<th>Brand</th>
                                      <th>Price</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach ($tvs as $tv)
                                    <tr>
                                      <td>{{$tv->getModelNumber()}}</td>
                                      <td>{{$tv->getDimensions()}}</td>
                                      <td>{{$tv->getTvType()}}</td>
                                      <td>{{$tv->getWeight()}}</td>
                                      <td>{{$tv->getResolution()}}</td>
                                      <td>{{$tv->getScreenSize()}}</td>
                                      <td>{{$tv->getBrandName()}}</td>
                                      <td>{{$tv->getPrice()}}</td>
                                      <td><a href="/admin/adminpanelviews/{{$tv->getModelNumber()}}/Tv/edit" class="btn btn-info">Edit</a></td>
                                      <td>
                                        <a href="/admin/adminpanelviews/{{$tv->getModelNumber()}}/Tv/delete" class="btn btn-danger">Delete</a>
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
