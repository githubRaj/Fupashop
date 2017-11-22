@extends('admin.layouts')

@section('content')

<div class="row">
    <div class="col-lg-8">
      <h1>Serial Numbers</h1>
      @switch($productType)
          @case('desktops')
               <h3><a href="{{route('desktops')}}"> {{$modelNumber}}</a> -> Serial Numbers</h3>
              @break
          @case('laptops')
               <h3><a href="{{route('laptops')}}"> {{$modelNumber}}</a> -> Serial Numbers</h3>
              @break
           @case('monitors')
              <h3><a href="{{route('monitors')}}"> {{$modelNumber}}</a> -> Serial Numbers</h3>
              @break
           @case('tablets')
              <h3><a href="{{route('tablets')}}"> {{$modelNumber}}</a> -> Serial Numbers</h3>
              @break
      @endswitch
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
                                            <td>
                                              {{ Form::open(array('url' => '/admin/delete/serialNumbers/'.$serialNumber->getModelNumber())) }}
                                                  {{ Form::hidden('serialNumber', $serialNumber->getSerialNumber()) }}
                                                    {{ Form::hidden('superClass', $serialNumber->getType()) }}
                                                  {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                              {{ Form::close() }}
                                            </td>
                                          @else
                                            <td>False</td>
                                            <td>
                                              {{ Form::open(array('url' => '/admin/delete/serialNumbers/'.$serialNumber->getModelNumber())) }}
                                                  {{ Form::hidden('serialNumber', $serialNumber->getSerialNumber()) }}
                                                  {{ Form::hidden('superClass', $serialNumber->getType()) }}
                                                  {{ Form::submit('Delete', array('class' => 'btn btn-danger', 'disabled')) }}
                                              {{ Form::close() }}
                                          </td>
                                          @endif
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
