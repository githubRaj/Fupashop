@extends('layout.main')


@section('content')

<body>
	@foreach ($tvs as $tv)
		<li>{{ $tv }}</li>
	@endforeach
</body>
</html>

@endsection