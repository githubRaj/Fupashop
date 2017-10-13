@extends('layout.main')


@section('content')

<body>
  @foreach ($desktop as $desktop)
    <li>{{ $desktop }}</li>
  @endforeach
</body>
</html>

@endsection