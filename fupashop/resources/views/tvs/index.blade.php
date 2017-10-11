@extends('layout.main')


@section('content')

<body>
	@foreach ($tvs as $tv)
		<li>{{ $tv->modelNumber }}</li>
	@endforeach
</body>
</html>

@endsection