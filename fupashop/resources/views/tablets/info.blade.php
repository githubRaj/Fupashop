@extends('layout.main')
@php
//MUST BE AT TOP OF EVERY BLADE VIEW
if (!isset($_SESSION)) {
  session_start();
  $sessionCart = array();
  $_SESSION['sessionCart'] = $sessionCart;
}
@endphp
@section('content')
		<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Shop Item - Start Bootstrap Template</title>

	<!-- Bootstrap core CSS -->
	<link href="https://blackrockdigital.github.io/startbootstrap-shop-item/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="https://blackrockdigital.github.io/startbootstrap-shop-item/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Page Content -->
<div class="container">

	<div class="row">

		<div class="col-lg-3">
		</div>
		<!-- /.col-lg-3 -->

		<div class="col-lg-9">

			<div class="card mt-4">
				<img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
				<div class="card-body">
					<h3 class="card-title">{{ $item->getBrandName() }} {{ $item->getModelNumber() }}</h3>
					<h4>${{ $item->getPrice() }}</h4>
					<p class="card-text">
						Brand: {{ $item->getBrandName() }} <br>
						Screen: {{ $item->getScreenSize() }} inches<br>
						Processor: {{ $item->getProcessor() }} <br>
						OS: {{ $item->getOperatingSystem() }} <br>
						Quantity: {{ $item->getStock() }}<br>
					</p>
				</div>
			</div>
			<!-- /.card -->

			<div class="card card-outline-secondary my-4">
				<div class="card-header">
					Detailed Product Specifications
				</div>
				<div class="card-body">
					<div class="tbl-header">
						<table cellpadding="0" cellspacing="0" border="0">
							<thead>
							<tr>
								<th>Category</th>
								<th>Specification</th>
							</tr>
							</thead>
						</table>
					</div>
					<div class="tbl-content">
						<table cellpadding="0" cellspacing="0" border="0">
							<tbody>
							<tr>
								<td>Brand</td>
								<td> {{ $item->getBrandName() }} </td>
							</tr>
							<tr>
								<td>Processor</td>
								<td>{{ $item->getProcessor() }}</td>
							</tr>
							<tr>
								<td>Screen Size</td>
								<td>{{ $item->getScreenSize() }} inches</td>
							</tr>
							<tr>
								<td>Dimensions</td>
								<td>{{ $item->getDimensions() }}</td>
							</tr>
							<tr>
								<td>RAM</td>
								<td>{{ $item->getRamSize() }}</td>
							</tr>
							<tr>
								<td>Weight</td>
								<td>{{ $item->getWeight() }} grams</td>
							</tr>
							<tr>
								<td>CPU Cores</td>
								<td>{{ $item->getCpucores() }}</td>
							</tr>
							<tr>
								<td>Storage Size</td>
								<td>{{ $item->getHddSize() }}</td>
							</tr>
							<tr>
								<td>Battery Information</td>
								<td>{{ $item->getBatteryInformation() }}</td>
							</tr>
							<tr>
								<td>Operating System</td>
								<td>{{ $item->getOperatingSystem() }}</td>
							</tr>
							<tr>
								<td>Camera</td>
								<td>{{ $item->getCameraInformation() }}</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /.card -->

			<hr>
			<a href="#" class="btn btn-primary">Add To Cart</a>

		</div>
		<!-- /.col-lg-9 -->

	</div>

</div>

@endsection

<!-- Bootstrap core JavaScript -->
<script src="https://blackrockdigital.github.io/startbootstrap-shop-item/vendor/jquery/jquery.min.js"></script>
<script src="https://blackrockdigital.github.io/startbootstrap-shop-item/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
