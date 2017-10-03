@extends('layout.main')


@section('content')
<!-- 
<body>
	@foreach ($desktops as $desktop)
		<li>{{ $desktop }}</li>
	@endforeach
</body>
</html>
-->





<head>
	 <link href="{{ asset('/static/css/bootstrap.css') }}" rel="stylesheet">    
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
		<input type="checkbox" name="brands[]" value="Antec"/><font size="3">&nbsp;Antec</font>
	      </li>
	      <li>&nbsp;&nbsp;
                <input type="checkbox" name="brands[]" value="COOLER MASTER"/><font size="3">&nbsp;Cooler Master</font>
              </li>
	      <li>&nbsp;&nbsp;
                <input type="checkbox" name="brands[]" value="Corsair"/><font size="3">&nbsp;Corsair</font>
              </li>
	      <li>&nbsp;&nbsp;
                <input type="checkbox" name="brands[]" value="COUGAR"/><font size="3">&nbsp;Cougar</font>
              </li>
	      <li>&nbsp;&nbsp;
		<input type="checkbox" name="brands[]" value="Fractal Design"/><font size="3">&nbsp;Fractal Design</font>
              </li>
	      <li>&nbsp;&nbsp;
                <input type="checkbox" name="brands[]" value="GIGABYTE"/><font size="3">&nbsp;Gigabyte</font>
              </li>
	      <li>&nbsp;&nbsp;
                <input type="checkbox" name="brands[]" value="MSI"/><font size="3">&nbsp;MSI</font>
              </li>
	      <li>&nbsp;&nbsp;
                <input type="checkbox" name="brands[]" value="NZXT"/><font size="3">&nbsp;NZXT</font>
              </li>
	      <li>&nbsp;&nbsp;
                <input type="checkbox" name="brands[]" value="Rosewill"/><font size="3">&nbsp;Rosewill</font>
              </li>
	      <li>&nbsp;&nbsp;
                <input type="checkbox" name="brands[]" value="Thermaltake"/><font size="3">&nbsp;Thermaltake</font>
              </li>

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
	  <table class="table table-hover tablesorter" id="myTable">
	    <thead>
        <tr>
      		<th>Model</th>
      		<th>Brand</th>
      		<th>Processor</th>
          <th>Cores</th>
          <th>Ram</th>
          <th>HDD</th>
      		<th>Price</th>
	      </tr>
      </thead>
    <tbody>

	    @foreach ($desktops as $desktop)
	     	 <tr class="{{ $desktop['brandName'] }}">
		      <tr>
        		<td>{{ $desktop['modelNumber'] }}</td>
        		<td class="brand">{{ $desktop['brandName'] }}</td>
        		<td>{{ $desktop['processor'] }}</td>
            <td>{{ $desktop['cpuCores'] }}</td>
        		<td>{{ $desktop['ramSize'] }}</td>
        		<td>{{ $desktop['hddSize'] }}</td>
        		<td class="price">{{ $desktop["price"] }}</td>
        		<td><a href="" class="btn btn-default btn-xs" role="button">Buy</a></td>
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