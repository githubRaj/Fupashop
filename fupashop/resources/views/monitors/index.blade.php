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
<head>
    <!-- Le styles
    <link href="/static/css/bootstrap.css" rel="stylesheet">
    <link href="/static/css/bootstrap.css" rel="stylesheet">-->
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
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
	  <table id="myTable" class="tablesorter table table-hover">
	    <thead>
            <tr>
		      	<th>Model Number</th>
		        <th>Brand</th>
		        <th>Size</th>
		      	<th>Price</th>
            <th>Option</th>
	      	</tr>
         </thead>
         
	@foreach ($items as $monitor)
	<tr class="{{ $monitor->getBrandName() }}">
              <tr>
		<td><a href="monitors/{{ $monitor->getModelNumber() }}">{{ $monitor->getModelNumber() }}</a></td>
		<td class="brand">{{ $monitor->getBrandName() }}</td>
		<td>{{ $monitor->getSize() }}</td>
		<td class="price">{{ $monitor->getPrice() }}</td>
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
