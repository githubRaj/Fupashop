<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PC Part Picker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles 
    <link href="/static/css/bootstrap.css" rel="stylesheet">
    <link href="/static/css/bootstrap.css" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ asset('/static/css/bootstrap.css') }}"/>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
      
      footer{
      margin-top: 2.5em;
      text-align: center;
      }
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

    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">PC Part Picker</a>
          <div class="nav-collapse collapse">
	    
            <ul class="nav">
              <li><a href="/home">Home</a></li>
	      <li><a href="/build">Current Build</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

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
  
  <script type="text/javascript" src="/static/js/filter.js"></script>
  
</html>
