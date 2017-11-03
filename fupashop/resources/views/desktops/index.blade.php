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


<!-- Sidebar -->
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
         <ul id="filter1" class="nav nav-list">

          <ul class="nav-header">Advance Search</ul>
      <input type="text" id="searchInput" value="Search.." title="Search">


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

<!-- Main Section -->
        <div class="span9">
	  <table id="myTable" class="tablesorter table table-hover">
	    <thead>
            <tr>
				<th>Model</th>
		      	<th>Brand</th>
		        <th>Processor</th>
		        <th>Cores</th>
		      	<th>Price</th>
            <th>Option</th>
	      	</tr>
         </thead>


    <tbody id="fbody">
	    	@foreach ($items as $desktop)
        {{ Form::open(['action' => ['CartController@addToCart'], 'method' => 'POST']) }}
	        <tr class="{{ $desktop->getBrandName() }}"><tr>
		<td><a href="desktops/{{ $desktop->getModelNumber() }}">{{ $desktop->getModelNumber() }}</a></td>
		<td class="brand">{{ $desktop->getBrandName() }}</td>
		<td class="processor">{{ $desktop->getProcessor() }}</td>
		<td>{{ $desktop->getCpucores() }}</td>
		<td class="price">{{ $desktop->getPrice() }}</td>
		<td>{{ Form::submit('BUY', array('class' => 'btn btn-default btn-xs')) }}</td>
	      </tr>
        {{ Form::hidden('modelNumber', $desktop->getModelNumber()) }}
        {{ Form::hidden('class', "desktops") }}
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
