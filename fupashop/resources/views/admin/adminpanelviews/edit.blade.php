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
           {!! Form::open(['action' => ['AdminController@update', $product->getModelNumber()], 'method' => 'POST']) !!}

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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
