@extends('admin.adminpanelmain.layouts')

@section('content')
<head>
  <script type="text/javascript" src="{{ asset('/js/create.js') }}"></script>
</head>

<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Add a Desktop</h2>
  </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6">
          <div role="form">
            <div class="form-group">
              {!! Form::open(['action' => 'AdminController@storeLaptop', 'method' => 'POST']) !!}

              {{Form::label('modelNumber', 'Model Number')}}
              {{Form::text('modelNumber', '', ['class' => 'form-control'])}}

              {{Form::label('processor', 'Processor')}}
              {{Form::text('processor', '', ['class' => 'form-control'])}}

              {{Form::label('displaySize', 'Display Size')}}
              {{Form::text('displaySize', '', ['class' => 'form-control'])}}

              {{Form::label('ramSize', 'Ram Size')}}
              {{Form::text('ramSize', '', ['class' => 'form-control'])}}

              {{Form::label('weight', 'Weight')}}
              {{Form::text('weight', '', ['class' => 'form-control'])}}

              {{Form::label('cpuCores', 'CPU Cores')}}
              {{Form::text('cpuCores', '', ['class' => 'form-control'])}}

              {{Form::label('hddSize', 'HDD Size')}}
              {{Form::text('hddSize', '', ['class' => 'form-control'])}}

              {{Form::label('batteryType', 'Battery Type')}}
              {{Form::text('batteryType', '', ['class' => 'form-control'])}}

              {{Form::label('batteryInformation', 'Battery Information')}}
              {{Form::text('batteryInformation', '', ['class' => 'form-control'])}}

              {{Form::label('brandName', 'Brand Name')}}
              {{Form::text('brandName', '', ['class' => 'form-control'])}}

              {{Form::label('operatingSystem', 'Operating System ')}}
              {{Form::text('operatingSystem', '', ['class' => 'form-control'])}}

              {{Form::label('touchFeature	', 'Touch Feature')}}
              {{Form::text('touchFeature	', '', ['class' => 'form-control'])}}

              {{Form::label('cameraInformation	', 'Camera Information')}}
              {{Form::text('cameraInformation	', '', ['class' => 'form-control'])}}

              {{Form::label('price', 'Price')}}
              {{Form::text('price', '', ['class' => 'form-control'])}}

              {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

              {!! Form::close() !!}
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
