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

        @php
            $items = session('sessionCart');
        @endphp

        <h1>Transaction</h1><hr>
        <table class="table table-striped table-hover table-bordered">
            <tbody>
            <tr>
                <th>Item Model</th>
                <th>QTY</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
            @if ( !empty( $items ) )
                @foreach ($items as $item)
                    @if ( isset( $item ) )
                        <tr>
                            <td>{{ $item->getModelNumber() }}</td>
                            <td>1</td>
                            <td>${{ $item->getPrice() }}</td>
                            <td>${{ $item->getPrice() }}</td> <!--Should be getTotalItemPrice which is the price of one item multiplied by the quantity demanded-->
                        </tr>
                    @endif
                @endforeach
            @endif
            <tr>
                <th colspan="3"><span class="pull-right">Sub Total</span></th>
                <th>${{ session()->get('cartSubtotal') }}</th>
            </tr>
            <tr>
                <th colspan="3"><span class="pull-right">TAX 15%</span></th>
                <th>${{session()->get('cartTax')}}</th>
            </tr>
            <tr>
                <th colspan="3"><span class="pull-right">Total</span></th>
                <th>${{session()->get('cartTotal')}} </th>
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