@extends('layout.main')


@section('content')

<body>

	@foreach ($user as $user)
	<table class="table table-user-information">
		<tbody>
			<tr>
				<td>Identification Number:</td>
				<td>{{ $user->id }}</td>
			</tr>
			<tr>
				<td>First Name:</td>
				<td>{{ $user->firstName }}</td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>{{ $user->lastName }}</td>
			</tr>

			<tr>
				<td>Email Address</td>
				<td>{{ $user->email }}</td>
			</tr>
			<tr>
				<td>Home Address</td>
				<td>{{ $user->address }}</td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td>{{ $user->phoneNumber }}</td>
			</tr>

		</tbody>
	</table>
	@endforeach
</body>
</html>

@endsection
