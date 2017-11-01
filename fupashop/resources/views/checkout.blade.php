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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>

    <body>
    <div class="container">

        <h1>Transaction</h1><hr>
        <table class="table table-striped table-hover table-bordered">
            <tbody>
            <tr>
                <th>Item</th>
                <th>QTY</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
            <tr>
                <td>Awesome Product</td>
                <td>1</td>
                <td>£250.00</td>
                <td>£250.00</td>
            </tr>
            <tr>
                <th colspan="3"><span class="pull-right">Sub Total</span></th>
                <th>£250.00</th>
            </tr>
            <tr>
                <th colspan="3"><span class="pull-right">VAT 20%</span></th>
                <th>£50.00</th>
            </tr>
            <tr>
                <th colspan="3"><span class="pull-right">Total</span></th>
                <th>£300.00</th>
            </tr>
            </tbody>
        </table>
        <div class="col-md-3"><a href="/monitors" class="btn btn-primary">Continue Shopping</a></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"><a href="#" class="pull-right btn btn-success">Confirm Purchase</a></div>
    </div>
    </body>
@endsection