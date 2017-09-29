@extends('layout.main')


@section('content')

<body>
	@foreach ($monitors as $monitor)
		<li>{{ $monitor }}</li>
	@endforeach
</body>
</html>

@endsection