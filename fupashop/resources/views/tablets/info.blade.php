@extends('layout.main')


@section('content')

<body>
	@foreach ($tablet as $tablet)
		<li>{{ $tablet }}</li>
	@endforeach
</body>
</html>

@endsection