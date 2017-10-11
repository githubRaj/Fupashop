@extends('layout/main')
@section('content')
<h1> Add A Product </h1>
{!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST']) !!}

    {{Form::select('products', array('Desktop' => 'Desktop', 'Laptop' => 'Laptop', 'tablet' => 'Tablet','monitor' => 'Monitor','tv' => 'Tv',), 'Desktop')}}

    {{Form::label('modelNumber', 'Model Number')}}
    {{Form::text('modelNumber', '')}}

    {{Form::label('processor', 'Processor')}}
    {{Form::text('processor', '')}}

    {{Form::label('dimensions', 'Dimensions')}}
    {{Form::text('dimensions', '')}}

    {{Form::label('ramSize', 'Ram Size')}}
    {{Form::text('ramSize', '')}}

    {{Form::label('weight', 'Weight')}}
    {{Form::text('weight', '')}}

    {{Form::label('cpuCores', 'Cpu Cores')}}
    {{Form::text('cpuCores', '')}}

    {{Form::label('hddSize', 'HDD Size')}}
    {{Form::text('hddSize', '')}}

    {{Form::label('brandName', 'Brand Name')}}
    {{Form::text('brandName', '')}}

    {{Form::label('price', 'Price')}}
    {{Form::text('price', '')}}

    {{Form::submit('Submit')}}
{!! Form::close() !!}
@endsection
