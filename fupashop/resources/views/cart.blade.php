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

 <h1> My Cart </h1>

 <p>

   @php
   $tablets = session('sessionCart');
   @endphp
   <table id="myTable" class="tablesorter table table-hover">
   	<thead>
   			<tr>
   				<th>Model</th>
          <th>Quantity</th>
          <th>Option </th>
   			</tr>
   	</thead>
    @if (session('delAlert') )
      <div class="alert alert-success">
          {{ session('delAlert') }}
      </div>
    @endif
   	<tbody>

    @if ( !empty( $tablets ) )

   	@foreach ($tablets as $tablet)
    @if ( isset( $tablet ) )
    {{ Form::open(['action' => ['CartController@deleteFromCart'], 'method' => 'POST']) }}
    <tr>
   		<td><a href="tablets/{{ $tablet->getModelNumber() }}">{{ $tablet->getModelNumber() }}</a></td>
      <td> 1 </td>
      <td>{{ Form::submit('Remove') }}</td>
    </tr>
    {{ Form::hidden('modelNumberToDel', $tablet->getModelNumber()  ) }}
    {{ Form::close() }}
    @endif
   	@endforeach

    @endif
   </tbody>
   </table>

 </p>
</body>

<script type="text/javascript" src="{{ asset('/static/js/filter.js') }}"></script>

</html>
@endsection
