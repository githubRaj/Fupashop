@extends('layout.main')


@section('content')

<body>
	@foreach ($tablets as $tablet)
		<li>{{ $tablet }}</li>
	@endforeach
</body>
</html>

@endsection