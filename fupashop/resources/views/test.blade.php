@extends('layout.main')


@section('content')

    <!-- Le styles 
    <link href="/static/css/bootstrap.css" rel="stylesheet">
    <link href="/static/css/bootstrap.css" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ asset('/static/css/bootstrap.css') }}"/>
    </style>
    <link href="/static/css/bootstrap-responsive.css" rel="stylesheet">
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
              <li class="nav-header">Parts</li>
              <li class="active"><a href="/cpu">CPUs</a></li>
              <li><a href="/mobo">Motherboards</a></li>
              <li><a href="/ram">RAM</a></li>
              <li><a href="/hdd">Hard Drives</a></li>
              <li><a href="/ssd">Solid State Drives</a></li>
              <li><a href="/gpu">Graphics Cards</a></li>
              <li><a href="/psu">Power Supplies</a></li>
              <li><a href="/case">Cases</a></li>
            </ul>
	    <ul id="filters" class="nav nav-list">
              <li class="nav-header">Manafacuter</li>
	      <li>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="brands[]" value="Intel" id="id0001"/><font size="3">&nbsp;Intel</font></li>
	      <li>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="brands[]" value="AMD" id="id0002"/><font size="3">&nbsp;AMD</font></li>
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
		<th>Model Number</th>
		<th>Brand</th>
		<th>Processor</th>
		<th>Ram</th>
		<th>Cores</th>
		<th>Price</th>
		<th></th>
	      </tr>
            </thead>
            <tbody>

	       @foreach( $results as $x)
	         
	      <tr class="{{ $x->brandName }}">
              <tr>
		<td><a href="/parts/{{ $x->modelNumber }}">{{ $x->modelNumber }}</a></td>
		<td class="brand">{{ $x->brandName }}</td>
		<td>{{ $x->processor }}</td>
		<td>{{ $x->ramSize }}</td>
		<td>{{ $x->cpucores }}</td>
		<td class="price">{{ $x->price }}</td>
		<td><a href="/add/{{ $x->modelNumber }}" class="btn btn-default btn-xs" role="button">Add to Build</a></td>
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
