@extends('admin.layouts')

@section('content')
<head>
  <script type="text/javascript" src="{{ asset('/js/create.js') }}"></script>
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
           {!! Form::open(['action' => ['AdminController@update', 'desktops'], 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $item->getModelNumber(), ['class' => 'form-control'])}}

                {{Form::label('processor', 'Processor')}}
                {{Form::text('processor', $item->getProcessor(), ['class' => 'form-control'])}}

                {{Form::label('dimensions', 'Dimensions')}}
                {{Form::text('dimensions', $item->getDimensions(), ['class' => 'form-control'])}}

                {{Form::label('ramSize', 'Ram Size')}}
                {{Form::text('ramSize', $item->getRamSize(), ['class' => 'form-control'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $item->getWeight(), ['class' => 'form-control'])}}

                {{Form::label('cpuCores', 'Cpu Cores')}}
                {{Form::text('cpuCores', $item->getCpuCores(), ['class' => 'form-control'])}}

                {{Form::label('hddSize', 'HDD Size')}}
                {{Form::text('hddSize', $item->getHddSize(), ['class' => 'form-control'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $item->getBrandName(),  ['class' => 'form-control'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $item->getPrice(),  ['class' => 'form-control'])}}

                {{Form::hidden('oldModel', $item->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}
            @endif

            @if($productType == 'laptops')

            {!! Form::open(['action' => ['AdminController@update', 'laptops'], 'method' => 'POST']) !!}

            {{Form::label('modelNumber', 'Model Number')}}
            {{Form::text('modelNumber', $item->getModelNumber(), ['class' => 'form-control'])}}

            {{Form::label('processor', 'Processor')}}
            {{Form::text('processor', $item->getProcessor(), ['class' => 'form-control'])}}

            {{Form::label('displaySize', 'Display Size')}}
            {{Form::text('displaySize', $item->getDisplaySize(), ['class' => 'form-control'])}}

            {{Form::label('ramSize', 'Ram Size')}}
            {{Form::text('ramSize', $item->getRamSize(), ['class' => 'form-control'])}}

            {{Form::label('weight', 'Weight')}}
            {{Form::text('weight', $item->getWeight(), ['class' => 'form-control'])}}

            {{Form::label('cpuCores', 'CPU Cores')}}
            {{Form::text('cpuCores', $item->getCpuCores(), ['class' => 'form-control'])}}

            {{Form::label('hddSize', 'HDD Size')}}
            {{Form::text('hddSize', $item->getHddSize(), ['class' => 'form-control'])}}

            {{Form::label('batteryType', 'Battery Type')}}
            {{Form::text('batteryType', $item->getBatteryType(), ['class' => 'form-control'])}}

            {{Form::label('batteryInformation', 'Battery Information')}}
            {{Form::text('batteryInformation', $item->getBatteryInformation(), ['class' => 'form-control'])}}

            {{Form::label('brandName', 'Brand Name')}}
            {{Form::text('brandName', $item->getBrandName(), ['class' => 'form-control'])}}

            {{Form::label('operatingSystem', 'Operating System ')}}
            {{Form::text('operatingSystem', $item->getOperatingSystem(), ['class' => 'form-control'])}}

            {{Form::label('touchFeature', 'Touch Feature')}}
            {{Form::text('touchFeature', $item->getTouchFeature(), ['class' => 'form-control'])}}

            {{Form::label('cameraInformation', 'Camera Information')}}
            {{Form::text('cameraInformation', $item->getCameraInformation(), ['class' => 'form-control'])}}

            {{Form::label('price', 'Price')}}
            {{Form::text('price', $item->getPrice(), ['class' => 'form-control'])}}

            {{Form::hidden('oldModel', $item->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}

            @endif

            @if($productType == 'monitors')

            {!! Form::open(['action' => ['AdminController@update', 'monitors'], 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $item->getModelNumber(), ['class' => 'form-control'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $item->getWeight(), ['class' => 'form-control'])}}

                {{Form::label('size', 'Size')}}
                {{Form::text('size', $item->getSize(), ['class' => 'form-control'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $item->getBrandName(),  ['class' => 'form-control'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $item->getPrice(),  ['class' => 'form-control'])}}

              {{Form::hidden('oldModel', $item->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}

            @endif

            @if($productType == 'tablets')

            {!! Form::open(['action' => ['AdminController@update', 'tablets'], 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $item->getModelNumber(), ['class' => 'form-control'])}}

                {{Form::label('processor', 'Processor')}}
                {{Form::text('processor', $item->getProcessor(), ['class' => 'form-control'])}}

                {{Form::label('dimensions', 'Dimensions')}}
                {{Form::text('dimensions', $item->getDimensions(), ['class' => 'form-control'])}}

                {{Form::label('ramSize', 'Ram Size')}}
                {{Form::text('ramSize', $item->getRamSize(), ['class' => 'form-control'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $item->getWeight(), ['class' => 'form-control'])}}

                {{Form::label('cpucores', 'Cpu Cores')}}
                {{Form::text('cpucores', $item->getCpuCores(), ['class' => 'form-control'])}}

                {{Form::label('hddSize', 'HDD Size')}}
                {{Form::text('hddSize', $item->getHddSize(), ['class' => 'form-control'])}}

                {{Form::label('screenSize', 'Screen Size')}}
                {{Form::text('screenSize', $item->getScreenSize(),  ['class' => 'form-control'])}}

                {{Form::label('batteryInformation', 'battery Information')}}
                {{Form::text('batteryInformation', $item->getBatteryInformation(),  ['class' => 'form-control'])}}

                {{Form::label('operatingSystem', 'Operating System ')}}
                {{Form::text('operatingSystem', $item->getOperatingSystem(),  ['class' => 'form-control'])}}

                {{Form::label('cameraInformation', 'camera Information')}}
                {{Form::text('cameraInformation', $item->getCameraInformation(),  ['class' => 'form-control'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $item->getBrandName(),  ['class' => 'form-control'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $item->getPrice(),  ['class' => 'form-control'])}}

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
