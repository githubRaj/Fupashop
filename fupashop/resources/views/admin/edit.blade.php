@extends('admin.layouts')

@section('content')
<head>
  <script type="text/javascript" src="{{ asset('/js/parsley.min.js') }}"></script>

</head>

<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Edit Product Info</h2>

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
           @if($productType == 'desktops')
           {!! Form::open(['action' => ['AdminController@update', 'desktops'], 'method' => 'POST'], 'data-parsley-validate') !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $item->getModelNumber(), ['class' => 'form-control', 'readonly'])}}

                {{Form::label('processor', 'Processor')}}
                {{Form::text('processor', $item->getProcessor(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

                {{Form::label('dimensions', 'Dimensions')}}
                {{Form::text('dimensions', $item->getDimensions(), ['class' => 'form-control', 'required' => '', 'maxlength' => '21'])}}

                {{Form::label('ramSize', 'Ram Size')}}
                {{Form::text('ramSize', $item->getRamSize(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20', 'placeholder' => 'eg: 2MB, 2GB'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $item->getWeight(), ['class' => 'form-control', 'required' => '', 'maxlength' => '10', 'placeholder' => 'Numeric'])}}

                {{Form::label('cpuCores', 'Cpu Cores')}}
                {{Form::text('cpuCores', $item->getCpuCores(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

                {{Form::label('hddSize', 'HDD Size')}}
                {{Form::text('hddSize', $item->getHddSize(), ['class' => 'form-control', 'required' => '', 'maxlength' => '5', 'placeholder' => 'eg: 2MB, 2GB, 2TB, 2PB'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $item->getBrandName(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $item->getPrice(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '10', 'number', 'placeholder' => 'Numeric'])}}

                {{Form::hidden('oldModel', $item->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}
            @endif

            @if($productType == 'laptops')

            {!! Form::open(['action' => ['AdminController@update', 'laptops'], 'method' => 'POST'], 'data-parsley-validate') !!}

            {{Form::label('modelNumber', 'Model Number')}}
            {{Form::text('modelNumber', $item->getModelNumber(), ['class' => 'form-control', 'readonly'])}}

            {{Form::label('processor', 'Processor')}}
            {{Form::text('processor', $item->getProcessor(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

            {{Form::label('displaySize', 'Display Size')}}
            {{Form::text('displaySize', $item->getDisplaySize(), ['class' => 'form-control', 'required' => '', 'maxlength' => '6', 'number', 'placeholder' => 'Numeric'])}}

            {{Form::label('ramSize', 'Ram Size')}}
            {{Form::text('ramSize', $item->getRamSize(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20', 'placeholder' => 'eg: 2MB, 2GB'])}}

            {{Form::label('weight', 'Weight')}}
            {{Form::text('weight', $item->getWeight(), ['class' => 'form-control', 'required' => '', 'maxlength' => '10','placeholder' => 'Numeric'])}}

            {{Form::label('cpuCores', 'CPU Cores')}}
            {{Form::text('cpuCores', $item->getCpuCores(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

            {{Form::label('hddSize', 'HDD Size')}}
            {{Form::text('hddSize', $item->getHddSize(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20', 'placeholder' => 'eg: 2MB, 2GB, 2TB, 2PB'])}}

            {{Form::label('batteryType', 'Battery Type')}}
            {{Form::text('batteryType', $item->getBatteryType(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

            {{Form::label('batteryInformation', 'Battery Information')}}
            {{Form::text('batteryInformation', $item->getBatteryInformation(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

            {{Form::label('brandName', 'Brand Name')}}
            {{Form::text('brandName', $item->getBrandName(), ['class' => 'form-control', 'required' => '', 'maxlength' => '30'])}}

            {{Form::label('operatingSystem', 'Operating System ')}}
            {{Form::text('operatingSystem', $item->getOperatingSystem(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

            {{Form::label('touchFeature', 'Touch Feature')}}
            {{Form::text('touchFeature', $item->getTouchFeature(), ['class' => 'form-control', 'required' => '', 'maxlength' => '1', 'placeholder' => '0 or 1'])}}

            {{Form::label('cameraInformation', 'Camera Information')}}
            {{Form::text('cameraInformation', $item->getCameraInformation(), ['class' => 'form-control', 'required' => '', 'maxlength' => '40'])}}

            {{Form::label('price', 'Price')}}
            {{Form::text('price', $item->getPrice(), ['class' => 'form-control', 'required' => '', 'maxlength' => '10', 'number', 'placeholder' => 'Numeric'])}}

            {{Form::hidden('oldModel', $item->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}

            @endif

            @if($productType == 'monitors')

            {!! Form::open(['action' => ['AdminController@update', 'monitors'], 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $item->getModelNumber(), ['class' => 'form-control', 'readonly'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $item->getWeight(), ['class' => 'form-control', 'required' => '', 'maxlength' => '10','placeholder' => 'Numeric'])}}

                {{Form::label('size', 'Size')}}
                {{Form::text('size', $item->getSize(), ['class' => 'form-control', 'required' => '', 'maxlength' => '11','placeholder' => 'Numeric'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $item->getBrandName(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '7'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $item->getPrice(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '10', 'number', 'placeholder' => 'Numeric'])}}

              {{Form::hidden('oldModel', $item->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}

            @endif

            @if($productType == 'tablets')

            {!! Form::open(['action' => ['AdminController@update', 'tablets'], 'method' => 'POST'], 'data-parsley-validate') !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $item->getModelNumber(), ['class' => 'form-control', 'readonly'])}}

                {{Form::label('processor', 'Processor')}}
                {{Form::text('processor', $item->getProcessor(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

                {{Form::label('dimensions', 'Dimensions')}}
                {{Form::text('dimensions', $item->getDimensions(), ['class' => 'form-control', 'required' => '', 'maxlength' => '40'])}}

                {{Form::label('ramSize', 'Ram Size')}}
                {{Form::text('ramSize', $item->getRamSize(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20', 'placeholder' => 'eg: 2MB, 2GB'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $item->getWeight(), ['class' => 'form-control', 'required' => '', 'maxlength' => '10','placeholder' => 'Numeric'])}}

                {{Form::label('cpucores', 'Cpu Cores')}}
                {{Form::text('cpucores', $item->getCpuCores(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

                {{Form::label('hddSize', 'HDD Size')}}
                {{Form::text('hddSize', $item->getHddSize(), ['class' => 'form-control', 'required' => '', 'maxlength' => '20', 'placeholder' => 'eg: 2MB, 2GB, 2TB, 2PB'])}}

                {{Form::label('screenSize', 'Screen Size')}}
                {{Form::text('screenSize', $item->getScreenSize(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '3', 'number', 'placeholder' => 'Numeric'])}}

                {{Form::label('batteryInformation', 'battery Information')}}
                {{Form::text('batteryInformation', $item->getBatteryInformation(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

                {{Form::label('operatingSystem', 'Operating System ')}}
                {{Form::text('operatingSystem', $item->getOperatingSystem(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '20'])}}

                {{Form::label('cameraInformation', 'camera Information')}}
                {{Form::text('cameraInformation', $item->getCameraInformation(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '40'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $item->getBrandName(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '30'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $item->getPrice(),  ['class' => 'form-control', 'required' => '', 'maxlength' => '10', 'number', 'placeholder' => 'Numeric'])}}

                {{Form::hidden('oldModel', $item->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}

            @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
