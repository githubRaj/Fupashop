@extends('admin.adminpanelmain.layouts')

@section('content')
<head>
  <script type="text/javascript" src="{{ asset('/js/create.js') }}"></script>
</head>

<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Edit Product Info</h2>
  </div>
    <div class="panel-body">
      <div class="row">
      <div class="col-lg-6">
          <div role="form">
          <div class="form-group">
           @if($productType == 'Desktop')
           {!! Form::open(['action' => ['AdminController@update', 'Desktop'], 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $product->getModelNumber(), ['class' => 'form-control'])}}

                {{Form::label('processor', 'Processor')}}
                {{Form::text('processor', $product->getProcessor(), ['class' => 'form-control'])}}

                {{Form::label('dimensions', 'Dimensions')}}
                {{Form::text('dimensions', $product->getDimensions(), ['class' => 'form-control'])}}

                {{Form::label('ramSize', 'Ram Size')}}
                {{Form::text('ramSize', $product->getRamSize(), ['class' => 'form-control'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $product->getWeight(), ['class' => 'form-control'])}}

                {{Form::label('cpuCores', 'Cpu Cores')}}
                {{Form::text('cpuCores', $product->getCpuCores(), ['class' => 'form-control'])}}

                {{Form::label('hddSize', 'HDD Size')}}
                {{Form::text('hddSize', $product->getHddSize(), ['class' => 'form-control'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $product->getBrandName(),  ['class' => 'form-control'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $product->getPrice(),  ['class' => 'form-control'])}}

                {{Form::hidden('oldModel', $product->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}
            @endif

            @if($productType == 'Laptop')

            {!! Form::open(['action' => ['AdminController@update', 'Laptop'], 'method' => 'POST']) !!}

            {{Form::label('modelNumber', 'Model Number')}}
            {{Form::text('modelNumber', $product->getModelNumber(), ['class' => 'form-control'])}}

            {{Form::label('processor', 'Processor')}}
            {{Form::text('processor', $product->getProcessor(), ['class' => 'form-control'])}}

            {{Form::label('displaySize', 'Display Size')}}
            {{Form::text('displaySize', $product->getDisplaySize(), ['class' => 'form-control'])}}

            {{Form::label('ramSize', 'Ram Size')}}
            {{Form::text('ramSize', $product->getRamSize(), ['class' => 'form-control'])}}

            {{Form::label('weight', 'Weight')}}
            {{Form::text('weight', $product->getWeight(), ['class' => 'form-control'])}}

            {{Form::label('cpuCores', 'CPU Cores')}}
            {{Form::text('cpuCores', $product->getCpuCores(), ['class' => 'form-control'])}}

            {{Form::label('hddSize', 'HDD Size')}}
            {{Form::text('hddSize', $product->getHddSize(), ['class' => 'form-control'])}}

            {{Form::label('batteryType', 'Battery Type')}}
            {{Form::text('batteryType', $product->getBatteryType(), ['class' => 'form-control'])}}

            {{Form::label('batteryInformation', 'Battery Information')}}
            {{Form::text('batteryInformation', $product->getBatteryInformation(), ['class' => 'form-control'])}}

            {{Form::label('brandName', 'Brand Name')}}
            {{Form::text('brandName', $product->getBrandName(), ['class' => 'form-control'])}}

            {{Form::label('operatingSystem', 'Operating System ')}}
            {{Form::text('operatingSystem', $product->getOperatingSystem(), ['class' => 'form-control'])}}

            {{Form::label('touchFeature', 'Touch Feature')}}
            {{Form::text('touchFeature', $product->getTouchFeature(), ['class' => 'form-control'])}}

            {{Form::label('cameraInformation', 'Camera Information')}}
            {{Form::text('cameraInformation', $product->getCameraInformation(), ['class' => 'form-control'])}}

            {{Form::label('price', 'Price')}}
            {{Form::text('price', $product->getPrice(), ['class' => 'form-control'])}}

            {{Form::hidden('oldModel', $product->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}

            @endif

            @if($productType == 'Tv')

            {!! Form::open(['action' => ['AdminController@update', 'Tv'], 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $product->getModelNumber(), ['class' => 'form-control'])}}

                {{Form::label('tvType', 'TV Type')}}
                {{Form::text('tvType', $product->getTvType(), ['class' => 'form-control'])}}

                {{Form::label('dimensions', 'Dimensions')}}
                {{Form::text('dimensions', $product->getDimensions(), ['class' => 'form-control'])}}

                {{Form::label('resolution', 'Resolution')}}
                {{Form::text('resolution', $product->getResolution(), ['class' => 'form-control'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $product->getWeight(), ['class' => 'form-control'])}}

                {{Form::label('screenSize', 'Screen Size')}}
                {{Form::text('screenSize', $product->getScreenSize(), ['class' => 'form-control'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $product->getBrandName(),  ['class' => 'form-control'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $product->getPrice(),  ['class' => 'form-control'])}}

                {{Form::hidden('oldModel', $product->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}

            @endif

            @if($productType == 'Monitor')

            {!! Form::open(['action' => ['AdminController@update', 'Monitor'], 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $product->getModelNumber(), ['class' => 'form-control'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $product->getWeight(), ['class' => 'form-control'])}}

                {{Form::label('size', 'Size')}}
                {{Form::text('size', $product->getSize(), ['class' => 'form-control'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $product->getBrandName(),  ['class' => 'form-control'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $product->getPrice(),  ['class' => 'form-control'])}}

              {{Form::hidden('oldModel', $product->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}

            @endif

            @if($productType == 'Tablet')

            {!! Form::open(['action' => ['AdminController@update', 'Tablet'], 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', $product->getModelNumber(), ['class' => 'form-control'])}}

                {{Form::label('processor', 'Processor')}}
                {{Form::text('processor', $product->getProcessor(), ['class' => 'form-control'])}}

                {{Form::label('dimensions', 'Dimensions')}}
                {{Form::text('dimensions', $product->getDimensions(), ['class' => 'form-control'])}}

                {{Form::label('ramSize', 'Ram Size')}}
                {{Form::text('ramSize', $product->getRamSize(), ['class' => 'form-control'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', $product->getWeight(), ['class' => 'form-control'])}}

                {{Form::label('cpucores', 'Cpu Cores')}}
                {{Form::text('cpucores', $product->getCpuCores(), ['class' => 'form-control'])}}

                {{Form::label('hddSize', 'HDD Size')}}
                {{Form::text('hddSize', $product->getHddSize(), ['class' => 'form-control'])}}

                {{Form::label('screenSize', 'Screen Size')}}
                {{Form::text('screenSize', $product->getScreenSize(),  ['class' => 'form-control'])}}

                {{Form::label('batteryInformation', 'battery Information')}}
                {{Form::text('batteryInformation', $product->getBatteryInformation(),  ['class' => 'form-control'])}}

                {{Form::label('operatingSystem', 'Operating System ')}}
                {{Form::text('operatingSystem', $product->getOperatingSystem(),  ['class' => 'form-control'])}}

                {{Form::label('cameraInformation', 'camera Information')}}
                {{Form::text('cameraInformation', $product->getCameraInformation(),  ['class' => 'form-control'])}}

                {{Form::label('brandName', 'Brand Name')}}
                {{Form::text('brandName', $product->getBrandName(),  ['class' => 'form-control'])}}

                {{Form::label('price', 'Price')}}
                {{Form::text('price', $product->getPrice(),  ['class' => 'form-control'])}}

                {{Form::hidden('oldModel', $product->getModelNumber())}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {!! Form::close() !!}

            @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
