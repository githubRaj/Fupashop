@extends('admin.adminpanelmain.layouts')

@section('content')
<head>
  <script type="text/javascript" src="{{ asset('/js/create.js') }}"></script>
</head>

<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Add a Tablet</h2>
  </div>
    <div class="panel-body">
      <div class="row">
      <div class="col-lg-6">
          <div role="form">
          <div class="form-group">
            {!! Form::open(['action' => 'AdminController@storeTablet', 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', '', ['class' => 'form-control'])}}

                {{Form::label('processor', 'Processor')}}
                {{Form::text('processor', '', ['class' => 'form-control'])}}

                {{Form::label('dimensions', 'Dimensions')}}
                {{Form::text('dimensions', '', ['class' => 'form-control'])}}

                {{Form::label('ramSize', 'Ram Size')}}
                {{Form::text('ramSize', '', ['class' => 'form-control'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', '', ['class' => 'form-control'])}}

                {{Form::label('cpucores', 'Cpu Cores')}}
                {{Form::text('cpucores', '', ['class' => 'form-control'])}}

                {{Form::label('hddSize', 'HDD Size')}}
                {{Form::text('hddSize', '', ['class' => 'form-control'])}}

                {{Form::label('screenSize', 'Screen Size')}}
                {{Form::text('screenSize', '',  ['class' => 'form-control'])}}

                {{Form::label('batteryInformation', 'battery Information')}}
                {{Form::text('pribatteryInformationce', '',  ['class' => 'form-control'])}}

                {{Form::label('operatingSystem', 'Operating System ')}}
                {{Form::text('operatingSystem', '',  ['class' => 'form-control'])}}

                {{Form::label('cameraInformation', 'camera Information')}}
                {{Form::text('cameraInformation', '',  ['class' => 'form-control'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', '',  ['class' => 'form-control'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', '',  ['class' => 'form-control'])}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
