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

<!---
<head>
  <meta charset="UTF-8">
  <title>Shopping Cart</title>
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://weloveiconfonts.com/api/?family=entypo">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/5175/utf-latest.min.css'>
  <link rel="stylesheet" href="{{ asset('/assets/css/stylecart.css') }}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <div class="main">
  <h1>Shopping cart</h1>
  <h2 class="sub-heading">Free shipping from $100!</h2>

  <section class="shopping-cart">
    <ol class="ui-list shopping-cart--list" id="shopping-cart--list">

      <script id="shopping-cart--list-item-template" type="text/template">
        <li class="_grid shopping-cart--list-item">
          <div class="_column product-image">
            <img class="product-image--img" src="" alt="Item image" />
          </div>
          <div class="_column product-info">
            <h4 class="product-name">product name here</h4>
            <p class="product-desc">product description here</p>
            <div class="price product-single-price">price here</div>
          </div>
          <div class="_column product-modifiers" data-product-price="priceHere">
            <div class="_grid">
              <button class="_btn _column product-subtract">&minus;</button>
              <div class="_column product-qty">0</div>
              <button class="_btn _column product-plus">&plus;</button>
            </div>
            <button class="_btn entypo-trash product-remove">Remove</button>
            <div class="price product-total-price">$0.00</div>
          </div>
        </li>
      </script>

    </ol>

    <footer class="_grid cart-totals">
      <div class="_column subtotal" id="subtotalCtr">
        <div class="cart-totals-key">Subtotal</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column shipping" id="shippingCtr">
        <div class="cart-totals-key">Shipping</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column taxes" id="taxesCtr">
        <div class="cart-totals-key">Taxes (6%)</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column total" id="totalCtr">
        <div class="cart-totals-key">Total</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column checkout">
        <button class="_btn checkout-btn entypo-forward">Checkout</button>
      </div>
    </footer>

  </section>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/zepto/1.0/zepto.min.js'></script>
  <script  src="{{ asset('/assets/js/index.js') }}"></script>
</body>

-->
























<link rel="stylesheet" href="{{ asset('/static/css/bootstrap.css') }}"/>
</style>
<link href="{{ asset('/static/css/bootstrap-responsive.css') }}" rel="stylesheet">
<script type="text/javascript" src={{ asset('/static/js/jquery.js') }}></script>
<script type="text/javascript" src={{ asset('/static/js/tablesorter.js') }}></script>
<script type="text/javascript">
	$(document).ready(function()
	{

	$("#myTable").tablesorter({sortList:[[0,0],[2,1]], widgets:'zebra'});
	}
	);
</script>



</head>
<body>

 <h1> My Cart </h1>

 <p>

   @php
   $items = session('sessionCart');
   @endphp
   <table id="myTable" class="tablesorter table table-hover">
   	<thead>
   			<tr>
   				<th>Model</th>
          <th>Quantity</th>
          <th>Option </th>
   			</tr>
   	</thead>
    @if (session('delAlert') )
      <div class="alert alert-success">
          {{ session('delAlert') }}
      </div>
    @endif
   	<tbody>

    @if ( !empty( $items ) )

   	@foreach ($items as $item)
    @if ( isset( $item ) )
    {{ Form::open(['action' => ['CartController@deleteFromCart'], 'method' => 'POST']) }}
    <tr>
   		<td><a href="{{ $item->getCategoryStr() }}/{{ $item->getModelNumber() }}">{{ $item->getModelNumber() }}</a></td>
      <td> 1 </td>
      <td>{{ Form::submit('Remove') }}</td>
    </tr>
    {{ Form::hidden('modelNumberToDel', $item->getModelNumber()  ) }}
    {{ Form::close() }}
    @endif
   	@endforeach

    @endif
   </tbody>
   </table>

   <table>
     <thead>
       <tr>
         <th> Subtotal </th>
         <th> Taxes (15%) </th>
         <th> Total </th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <td> {{ session()->get('cartSubtotal') }} </td>
         <td> {{session()->get('cartTax')}} </td>
         <td> {{session()->get('cartTotal')}} </td>
       </tr>
   </table>
 </p>
</body>

<script type="text/javascript" src="{{ asset('/static/js/filter.js') }}"></script>

</html>


@endsection

<!--
<head>
  <meta charset="UTF-8">
  <title>Shopping Cart</title>
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://weloveiconfonts.com/api/?family=entypo">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/5175/utf-latest.min.css'>
  <link rel="stylesheet" href="

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <div class="main">
  <h1>Shopping cart</h1>
  <h2 class="sub-heading">Free shipping from $100!</h2>

  <section class="shopping-cart">
    <ol class="ui-list shopping-cart--list" id="shopping-cart--list">

      <script id="shopping-cart--list-item-template" type="text/template">
        <li class="_grid shopping-cart--list-item">
          <div class="_column product-image">
            <img class="product-image--img" src="" alt="Item image" />
          </div>
          <div class="_column product-info">
            <h4 class="product-name">product name here</h4>
            <p class="product-desc">product description here</p>
            <div class="price product-single-price">price here</div>
          </div>
          <div class="_column product-modifiers" data-product-price="priceHere">
            <div class="_grid">
              <button class="_btn _column product-subtract">&minus;</button>
              <div class="_column product-qty">0</div>
              <button class="_btn _column product-plus">&plus;</button>
            </div>
            <button class="_btn entypo-trash product-remove">Remove</button>
            <div class="price product-total-price">$0.00</div>
          </div>
        </li>
      </script>

    </ol>

    <footer class="_grid cart-totals">
      <div class="_column subtotal" id="subtotalCtr">
        <div class="cart-totals-key">Subtotal</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column shipping" id="shippingCtr">
        <div class="cart-totals-key">Shipping</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column taxes" id="taxesCtr">
        <div class="cart-totals-key">Taxes (6%)</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column total" id="totalCtr">
        <div class="cart-totals-key">Total</div>
        <div class="cart-totals-value">$0.00</div>
      </div>
      <div class="_column checkout">
        <button class="_btn checkout-btn entypo-forward">Checkout</button>
      </div>
    </footer>

  </section>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/zepto/1.0/zepto.min.js'></script>
  <script  src="js/index.js"></script>
</body>

-->
