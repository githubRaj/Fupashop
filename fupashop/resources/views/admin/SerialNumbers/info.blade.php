@extends('admin.layouts')

@section('content')


<div class="row">
    <div class="col-lg-8">
      <h1>Work In Progress</h1>
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
                                      <th>SerialNumer</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($serialNumbers as $serialNumber)
                                      <tr><td>
                                        {{$serialNumber->serialNumber}}
                                        </td>
                                      <td><a href="/admin/delete/serials/{{$serialNumber->serialNumber}}" class="btn btn-danger">Delete</a></td>
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
