@extends('admin.layouts')

@section('content')

<div class="row">
    <div class="col-lg-8">
      <h1>Serial Numbers</h1>
        <!--Fupa table example -->
        <div class=" panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>Serials
                <div class="pull-right">
                    <div class="btn-group">
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
                                      <th>Serial Number</th>
                                      <th>Purchasable</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($serialNumbers as $serialNumber)
                                      <tr><td>
                                        {{$serialNumber->getSerialNumber()}}
                                        </td>
                                          @if($serialNumber->getPurchasable())
                                            <td>True</td>
                                          @else
                                            <td>False</td>
                                          @endif
                                      <td>
                                        {{ Form::open(array('url' => '/admin/delete/serialNumbers/'.$serialNumber->getModelNumber())) }}
                                            {{ Form::hidden('serialNumber', $serialNumber->getSerialNumber()) }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                        {{ Form::close() }}
                                        <!--<a href="/admin/delete/serials/{{$serialNumber->getModelNumber()}}" class="btn btn-danger">Delete</a></td>  -->
                                      </td>
                                    @endforeach
                                    </tr>
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
