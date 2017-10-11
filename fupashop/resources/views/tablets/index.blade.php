@extends('layout.main')


@section('content')

<body>
	@foreach ($tablets as $tablet)
		<li>{{ $tablet->modelNumber }}</li>
	@endforeach
</body>
</html>

@endsection