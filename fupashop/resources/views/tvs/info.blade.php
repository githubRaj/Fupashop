@extends('layout.main')


@section('content')

<body>
	@foreach ($tv as $tv)
		<li>{{ $tv }}</li>
	@endforeach
</body>
</html>

@endsection