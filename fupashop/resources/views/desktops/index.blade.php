@extends('layout.main')


@section('content')

<body>
	@foreach ($desktops as $desktop)
		<li>{{ $desktop }}</li>
	@endforeach
</body>
</html>

@endsection