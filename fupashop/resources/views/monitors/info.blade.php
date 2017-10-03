@extends('layout.main')


@section('content')

<body>
	@foreach ($monitor as $monitor)
		<li>{{ $monitor }}</li>
	@endforeach
</body>
</html>

@endsection