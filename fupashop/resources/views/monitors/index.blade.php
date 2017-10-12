@extends('layout.main')


@section('content')
<head>
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
            <ul class="nav nav-list">
              <li class="nav-header">Monitors</li>
              <li class="active"><a href="/brand">Brands</a></li>
              <li><a href="/size">Size</a></li>
              <li><a href="/weight">Weight</a></li>
            </ul>
			<ul id="filters" class="nav nav-list">
              <li class="nav-header">Manufacturer</li>
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
	    <ul class="nav nav-list">
	      <li class="nav-header">Price Range</li>
	      <input type="text" id="min" placeholder="Minimum"></input>
	      <input type="text" id="max" placeholder="Maximum"></input>
	      <button id="btnFilter">Find</button>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
	  <table id="myTable" class="tablesorter table table-hover">
	    <thead>
            <tr>
		      	<th>Model Number</th>
		        <th>Brand</th>
		        <th>Size</th>
		        <th>Weight</th>
		      	<th>Price</th>
	      	</tr>
         </thead>

	@foreach ($monitors as $monitor)
	<tr class="{{ $monitor->brandName }}">
              <tr>
		<td><a href="">{{ $monitor->modelNumber }}</a></td>
		<td class="brand">{{ $monitor->brandName }}</td>
		<td>{{ $monitor->size }}</td>
		<td>{{ $monitor->weight }}</td>
		<td class="price">{{ $monitor->price }}</td>
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
  

</body>
</html>

@endsection