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
<head>
    <!-- Le styles
    <link href="/static/css/bootstrap.css" rel="stylesheet">
    <link href="/static/css/bootstrap.css" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ asset('/static/css/bootstrap.css') }}"/>
    </style>
 </head>

  

<!--<<<<<<< HEAD-->

<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
    <head>

            

        <!-- CSS -->

       
       <!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css">
        <link rel="stylesheet" href="{{ asset('/userstyle/css/style.css') }}"> -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
    </head>
    <body>

<div class="container-fluid" style="margin-top:10px">
	<div class="row-fluid" style=>
		<div class="span3">
			<div class="well sidebar-nav">
	<h3> {{ Auth::user()->firstName }}'s Account </h3>

		<b>First Name: {{ Auth::user()->firstName }}</b>
		<br>
		<b>Last Name: {{ Auth::user()->lastName }} </b>
		<br><br>

		<a href="#"> Change Information </a> <br>
		<a class="active" href="{{ route('pastOrders') }}"> Past Orders </a> <br>
		<a href="#"> Current Inventory </a>

		<br><br>
		<b><a href="{{ route('logout') }}" 
        onclick="event.preventDefault();
       	document.getElementById('logout-form').submit();">
        Logout
    </a></b>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

</div>
</div>


<div class="span9" style="background:#FFFFFF;padding:10px">
	<h3> Current Information </h3>

	<table>
		<tr><td>Email: {{ Auth::user()->email }}</td></tr>
		<tr><td>Address: {{ Auth::user()->address }}</td></tr>
		<tr><td>Phone Number: {{ Auth::user()->phoneNumber }}</td></td>
	</table>
</div>
</div>
</div>

</body>
<!-- >>>>>>> User Account Page Styled-->
</html>

@endsection
