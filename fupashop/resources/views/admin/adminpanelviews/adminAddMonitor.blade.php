@extends('admin.adminpanelmain.layouts')

@section('content')
<head>
  <script type="text/javascript" src="{{ asset('/js/create.js') }}"></script>
</head>

<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Add a Monitor</h2>
  </div>
    <div class="panel-body">
      <div class="row">
      <div class="col-lg-6">
          <div role="form">
          <div class="form-group">
            {!! Form::open(['action' => 'AdminController@storeMonitor', 'method' => 'POST']) !!}

                {{Form::label('modelNumber', 'Model Number')}}
                {{Form::text('modelNumber', '', ['class' => 'form-control'])}}

                {{Form::label('weight', 'Weight')}}
                {{Form::text('weight', '', ['class' => 'form-control'])}}

                {{Form::label('size', 'Size')}}
                {{Form::text('size', '', ['class' => 'form-control'])}}

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
