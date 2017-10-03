@extends('layout.main')


@section('content')

<body>
	@foreach ($laptop as $laptop)
		<li>{{ $laptop }}</li>
	@endforeach
</body>
</html>

@endsection