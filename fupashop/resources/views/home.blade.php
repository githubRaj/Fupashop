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

        <section class="hero text-center">
            <br/>
            <br/>
            <br/>
            <br/>
            <br>
        </section>
        <br/>
        <div class="subheader text-center">
             <h2>
                Most Popular Products
            </h2>
        </div>


        <div class="row">

          <!--TARGET AREA START-->

            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="/tablets/{{ $tablets->getModelNumber() }}">
                            <img src="{{ asset('dist/img/products/acerb3.png') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                          {{ $tablets[0]->getModelNumber() }}
                        </h3>
                    </a>
                    <h5>
                        {{ $tablets[0]->getPrice() }}
                    </h5>
                    <p>
                        <ul>
                          <li> {{ $tablets->getProcessor()}} processor</li>
                          <li> {{ $tablets->getHddSize() }} storage space</li>
                          <li> {{ $tablets->getCpuCores() }} </li>
                    </p>
                </div>
            </div>

            <!--TARGET AREA END-->

            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="/desktops/{{ $desktops[0]->getModelNumber() }}">
                            <img src="{{ asset('dist/img/products/c1.jpg') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                          {{ $desktops->getModelNumber() }}
                        </h3>
                    </a>
                    <h5>
                        {{ $desktops->getPrice() }}
                    </h5>
                    <p>
                        <ul>
                          <li> {{ $desktops->getProcessor() }} processor</li>
                          <li> {{ $desktops->getHddSize() }} storage space</li>
                          <li> {{ $desktops->getCpuCores() }} </li>
                    </p>
                </div>
            </div>

            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="/monitors/{{ $monitors->getModelNumber() }}">
                            <img src="{{ asset('dist/img/products/tv1.jpg') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                          {{ $monitors->getModelNumber() }}
                        </h3>
                    </a>
                    <h5>
                        {{ $monitors->getPrice() }}
                    </h5>
                    <p>
                        <ul>
                          <li> {{ $monitors->getSize() }} inch screen</li>
                          <li> {{ $monitors->getWeight() }} lbs</li>
                    </p>
                </div>
            </div>

            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="/laptops/{{ $laptops->getModelNumber() }}">
                            <img src="{{ asset('dist/img/products/l1.jpg') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                          {{ $laptops->getModelNumber() }}
                        </h3>
                    </a>
                    <h5>
                        {{ $laptops->getPrice() }}
                    </h5>
                    <p>
                        <ul>
                          <li> {{ $laptops->getProcessor() }} processor</li>
                          <li> {{ $laptops->getHddSize() }} </li>
                          <li> {{ $laptops->getCpuCores() }} cores </li>
                    </p>
                </div>
            </div>

        </div>
@endsection
