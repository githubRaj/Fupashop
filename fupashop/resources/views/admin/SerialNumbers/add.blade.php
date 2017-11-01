@extends('admin.layouts')

@section('content')
<head>
  <script type="text/javascript" src="{{ asset('/js/addSerial.js') }}"></script>
</head>

<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Add a Serial</h2>
  </div>
<div class="panel-body">
  <div class="row">
  <div class="col-lg-6">
      <div role="form">
      <div class="form-group">
      {!! Form::open(['action' => 'AdminController@SaveSerial', 'method' => 'POST']) !!}

            {{Form::label('typeLabel', 'Product Type')}}
            {{Form::text('type', $type, ['class' => 'form-control', 'readonly'])}}

            {{Form::label('modelNubmerLabel', 'Model Number')}}
            <select id="modelNumber"  name="modelNumber" class="form-control">
            @foreach($modelNumbers as $modelNumber)
               <option value="{{ $modelNumber->getModelNumber() }}">{{ $modelNumber->getModelNumber() }}</option>
            @endforeach
            </select>

            {{Form::label('serialNumber', 'Serial Number')}}
            {{Form::text('serialNumber', '', ['class' => 'form-control'])}}

            {{ Form::hidden('purchasable', '1') }}

          <br><br><br>  <br><br><br>  <br><br><br>  <br><br><br>  <br><br><br>
        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</div>
@endsection
