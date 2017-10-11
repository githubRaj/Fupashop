@extends('layout.main')


@section('content')

<body>
	@foreach ($laptops as $laptop)
		<li>{{ $laptop->modelNumber }}</li>
	@endforeach
</body>
</html>

@endsection