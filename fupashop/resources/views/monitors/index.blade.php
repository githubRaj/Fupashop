@extends('layout.main')


@section('content')

<body>
	@foreach ($monitors as $monitor)
		<li>{{ $monitor->modelNumber }}</li>
	@endforeach
</body>
</html>

@endsection