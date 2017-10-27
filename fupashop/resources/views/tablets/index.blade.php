@extends('layout.main')
@php
//MUST BE AT TOP OF EVERY BLADE VIEW
if (!isset($_SESSION)) {
  session_start();
	$sessionCart = array();
  $_SESSION['sessionCart'] = $sessionCart;
}
@endphp


@section('content')

<link rel="stylesheet" href="{{ asset('/static/css/bootstrap.css') }}"/>
</style>
<link href="{{ asset('/static/css/bootstrap-responsive.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('/static/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/static/js/tablesorter.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function()
	{

	$("#myTable").tablesorter({sortList:[[0,0],[2,1]], widgets:'zebra'});
	}
	);
</script>

</head>

<body>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="well sidebar-nav">
	<ul id="filter1" class="nav nav-list">
			<li class="nav-header">Processors</li>
				 @php
					$id=1
				 @endphp

					@foreach ($filterArray['processor'] as $p)
					<li>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="processors[]" value="{{ $p }}" id="id000{{$id}}"/><font size="3">&nbsp;{{ $p }}</font></li>
					@php
						$id = $id + 1
					@endphp
				@endforeach
	</ul>
	<ul id="filters" class="nav nav-list">
			<li class="nav-header">Manufacturer</li>
				 @php
					$id=1
				 @endphp

					@foreach ($filterArray['brandName'] as $b)
					<li>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="brands[]" value="{{ $b }}" id="id000{{$id}}"/><font size="3">&nbsp;{{ $b }}</font></li>
					@php
						$id = $id + 1
					@endphp
				@endforeach
	</ul>
	<ul class="nav nav-list">
		<li class="nav-header">Price Range</li>
		<input type="text" id="min" placeholder="Minimum"></input>
		<input type="text" id="max" placeholder="Maximum"></input>
		<button id="btnFilter">Find</button>
	</ul>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
<table id="myTable" class="tablesorter table table-hover">
	<thead>
			<tr>
				<th>Model</th>
				<th>Brand</th>
				<th>Processor</th>
				<th>HDD</th>
				<th>Price</th>
				<th>Option</th>
			</tr>
		 </thead>

			<tbody>

	@foreach ($items as $tablet)
		@if(!session()->has('itemToLock.'.$tablet->getModelNumber()))
			@php
				//IN STOCK
				$field = 'Buy';
				$href = "tablets/". $tablet->getModelNumber();
				$button = "enabled";
			@endphp
		@else
			@php
				//OUT OF STOCK
				$field = 'Out Of Stock';
				$href = "#";
				$button = "disabled";
			@endphp
		@endif
    {{ Form::open(['action' => ['CartController@addToCart'], 'method' => 'POST']) }}
			<tr class="{{ $tablet->getBrandName() }} ">
						<tr>
			<td><a href="{{ $href }}" {{ $button }}>{{ $tablet->getModelNumber() }}</a></td>
			<td class="brand">{{ $tablet->getBrandName() }}</td>
			<td class="processor">{{ $tablet->getProcessor() }}</td>
			<td>{{ $tablet->getHddSize() }}</td>
			<td class="price">{{ $tablet->getPrice() }}</td>
			<td>{{ Form::submit('BUY', array('class' => 'btn btn-default btn-xs')) }}</td>
			</tr>
      {{ Form::hidden('modelNumber', $tablet->getModelNumber()) }}
      {{ Form::close() }}

	@endforeach
  @if (session('addAlert') )
    <div class="alert alert-success">
        {{ session('addAlert') }}
    </div>
  @endif
				</tbody>
</table>
		</div><!--/span-->
	</div><!--/row-->

	<hr>

	<footer>
		<p>&copy; JJTS</p>
	</footer>

</div><!--/.fluid-container-->


</body>

<script type="text/javascript" src="{{ asset('/static/js/filter.js') }}"></script>
</html>
@endsection
