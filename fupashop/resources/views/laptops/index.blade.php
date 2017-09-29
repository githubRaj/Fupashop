@extends('layout.main')


@section('content')

<body>
	@foreach ($laptops as $laptop)
		<li>{{ $laptop }}</li>
	@endforeach
</body>
</html>

@endsection