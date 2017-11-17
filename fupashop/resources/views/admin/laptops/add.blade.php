@extends('admin.layouts')

@section('content')
<head>
  <script type="text/javascript" src="{{ asset('/js/parsley.min.js') }}"></script>
</head>

<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Add a Laptop</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6">
          <div role="form">
            <div class="form-group">
              {!! Form::open(array('route' => array('save', 'laptops'), 'data-parsley-validate')) !!}

              {{Form::label('modelNumber', 'Model Number')}}
              {{Form::text('modelNumber', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

              {{Form::label('processor', 'Processor')}}
              {{Form::text('processor', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '20' ])}}

              {{Form::label('displaySize', 'Display Size')}}
              {{Form::text('displaySize', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '6', 'number', 'placeholder' => 'Numeric'])}}

              {{Form::label('ramSize', 'Ram Size')}}
              {{Form::text('ramSize', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '20', 'placeholder' => 'eg: 2MB, 2GB'])}}

              {{Form::label('weight', 'Weight')}}
              {{Form::text('weight', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '10','placeholder' => 'Numeric'])}}

              {{Form::label('cpuCores', 'CPU Cores')}}
              {{Form::text('cpuCores', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

              {{Form::label('hddSize', 'HDD Size')}}
              {{Form::text('hddSize', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '20', 'placeholder' => 'eg: 2MB, 2GB, 2TB, 2PB'])}}

              {{Form::label('batteryType', 'Battery Type')}}
              {{Form::text('batteryType', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

              {{Form::label('batteryInformation', 'Battery Information')}}
              {{Form::text('batteryInformation', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

              {{Form::label('brandName', 'Brand Name')}}
              {{Form::text('brandName', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '30'])}}

              {{Form::label('operatingSystem', 'Operating System ')}}
              {{Form::text('operatingSystem', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

              {{Form::label('touchFeature', 'Touch Feature')}}
              {{Form::text('touchFeature', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '1', 'placeholder' => '0 or 1'])}}

              {{Form::label('cameraInformation', 'Camera Information')}}
              {{Form::text('cameraInformation', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '40'])}}

              {{Form::label('price', 'Price')}}
              {{Form::text('price', '', ['class' => 'form-control', 'required' => '', 'maxlength' => '10', 'number', 'placeholder' => 'Numeric'])}}

              {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

              {!! Form::close() !!}
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
