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
		        <th>Display</th>
		      	<th>Price</th>
            <th>Option</th>
	      	</tr>
         </thead>

          <tbody>
	    	@foreach ($items as $laptop)
	        <tr class="{{ $laptop->getBrandName() }}">
              <tr>
		<td><a href="laptops/{{ $laptop->getModelNumber() }}">{{ $laptop->getModelNumber() }}</a></td>
		<td class="brand">{{ $laptop->getBrandName() }}</td>
		<td class="processor">{{ $laptop->getProcessor() }}</td>
		<td>{{ $laptop->getDisplaySize() }}</td>
		<td class="price">{{ $laptop->getPrice() }}</td>
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
