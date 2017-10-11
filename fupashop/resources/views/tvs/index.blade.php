@extends('layout.main')


@section('content')
<!-- Le styles
<link href="/static/css/bootstrap.css" rel="stylesheet">
<link href="/static/css/bootstrap.css" rel="stylesheet">-->
<link rel="stylesheet" href="{{ asset('/static/css/bootstrap.css') }}"/>
</style>
<link href="{{ asset('/static/css/bootstrap-responsive.css') }}" rel="stylesheet">
<script type="text/javascript" src={{ asset('/static/js/jquery.js') }}></script>
<script type="text/javascript" src={{ asset('/static/js/tablesorter.js') }}></script>
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
				<!--<ul class="nav nav-list">
					<li class="nav-header">Parts</li>
					<li class="active"><a href="/cpu">CPUs</a></li>
					<li><a href="/mobo">Motherboards</a></li>
					<li><a href="/ram">RAM</a></li>
					<li><a href="/hdd">Hard Drives</a></li>
					<li><a href="/ssd">Solid State Drives</a></li>
					<li><a href="/gpu">Graphics Cards</a></li>
					<li><a href="/psu">Power Supplies</a></li>
					<li><a href="/case">Cases</a></li>
				</ul>-->
	

 <ul id="filters" class="nav nav-list">
					<li class="nav-header">Brand</li>
				 @php
					$id=1
				 @endphp


					@foreach ($brands as $b) 
	      				<li>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="brands[]" value="{{ $b }}" id="id000{{$id}}"/><font size="3">&nbsp;{{ $b }}</font></li>
	      					@php
	      						$id = $id + 1 
	      					@endphp
	      	  		@endforeach 

	
	</ul>

	<ul id="filters" class="nav nav-list">
					<li class="nav-header">Resolution</li>
				 @php
					$id=1
				 @endphp


					@foreach ($resolutions as $r) 
	      				<li>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="resolutions[]" value="{{ $r }}" id="id000{{$id}}"/><font size="3">&nbsp;{{ $r }}</font></li>
	      					@php
	      						$id = $id + 1 
	      					@endphp
	      	  		@endforeach 

	
	</ul>

<ul id="filters" class="nav nav-list">
					<li class="nav-header">Screen Size</li>
				 @php
					$id=1
				 @endphp


					@foreach ($screenSizes as $s) 
	      				<li>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="screenSizes[]" value="{{ $s }}" id="id000{{$id}}"/><font size="3">&nbsp;{{ $s }}</font></li>
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
				<th>TV Type</th>
				<th>Resolution</th>
				<th>Screen Size</th>
				<th></th>
				<th>Price</th>
			</tr>
		 </thead>

			<tbody>
		@foreach ($tvs as $tv)
			<tr class="{{ $tv->resolution }}">
					<tr>
<td><a href="">{{ $tv->modelNumber }}</a></td>
<td class="brand">{{ $tv->brandName }}</td>
<td>{{ $tv->tvType }}</td>
<td>{{ $tv->resolution }}</td>
<td>{{ $tv->screenSize }}</td>

<td class="price">{{ $tv->price }}</td>
<td><a href="" class="btn btn-default btn-xs" role="button">BUY</a></td>
		</tr>
		@endforeach

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
