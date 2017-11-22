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


        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css">
        <link rel="stylesheet" href="{{ asset('/userstyle/css/style.css') }}">

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

		<a href="{{ route('pastOrders') }}"> Past Orders </a> <br>

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
	<div class="account-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- HTML -->
                            <div id="account-id">
                                <h4 class="account-title"></span>Your Order History</h4>
                                <div class="order-history">
                                    <table class="cart-table">
                                    <thead>
                                        <tr>
                                          <th>Image</th>
                                          <th>Model Number</th>
                                          <th>Serial Number</th>
                                          <th>Price</th>
                                          <th>Purchased On</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      @foreach ($purchases as $purchase)
                                        @if( !$purchase->returned )
                                          @php
                                            //Eligible for Return
                                            $field = 'Return Item';
                                            $button = "enabled";
                                          @endphp
                                        @else
                                          @php
                                            //Already Returned
                                            $field = 'Returned';
                                            $button = "disabled";
                                          @endphp
                                        @endif
                                        <tr>
                                          <td><img src={{ asset('/images/monitors/H236HLBID')}}.jpg class="img-responsive" alt=""/></td>
                                          <td>{{$purchase->modelNumber }}</td>
                                          <td>{{$purchase->serialNumber }}</td>
                                          <td><div class="item-price">{{$purchase->price }}</div></td>
                                          <td>{{$purchase->created_at }}</td>
                                          {{ Form::open(['action' => ['UsersController@return'], 'method' => 'Post']) }}
                                          <td>{{ Form::submit($field, array('class' => 'btn-black', $button)) }}</td>
                                          {{ Form::hidden('SN', $purchase->serialNumber) }}
                                          {{ Form::hidden('MN', $purchase->modelNumber ) }}
                                          {{ Form::close() }}
                                        </tr>
                                      @endforeach

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

</body>
<!-- >>>>>>> User Account Page Styled-->
</html>

@endsection
