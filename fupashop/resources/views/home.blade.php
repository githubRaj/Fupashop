@extends('layout.main')


@section('content')

        <section class="hero text-center">
            <br/>
            <br/>
            <br/>
            <br/>
            <br>
            <a href=""><button class="button large">Start Buying</button></a>
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
                        <a href="/tablets/{{ $tablets[0]->getModelNumber() }}">
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
                          <li> {{ $tablets[0]->getProcessor()}} processor</li>
                          <li> {{ $tablets[0]->getHddSize() }} storage space</li>
                          <li> {{ $tablets[0]->getCpuCores() }} </li>
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
                          {{ $desktops[0]->getModelNumber() }}
                        </h3>
                    </a>
                    <h5>
                        {{ $desktops[0]->getPrice() }}
                    </h5>
                    <p>
                        <ul>
                          <li> {{ $desktops[0]->getProcessor() }} processor</li>
                          <li> {{ $desktops[0]->getHddSize() }} storage space</li>
                          <li> {{ $desktops[0]->getCpuCores() }} </li>
                    </p>
                </div>
            </div>

            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="/monitors/{{ $monitors[0]->getModelNumber() }}">
                            <img src="{{ asset('dist/img/products/tv1.jpg') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                          {{ $monitors[0]->getModelNumber() }}
                        </h3>
                    </a>
                    <h5>
                        {{ $monitors[0]->getPrice() }}
                    </h5>
                    <p>
                        <ul>
                          <li> {{ $monitors[0]->getSize() }} inch screen</li>
                          <li> {{ $monitors[0]->getWeight() }} lbs</li>
                    </p>
                </div>
            </div>

            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="/laptops/{{ $laptops[0]->getModelNumber() }}">
                            <img src="{{ asset('dist/img/products/l1.jpg') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                          {{ $laptops[0]->getModelNumber() }}
                        </h3>
                    </a>
                    <h5>
                        {{ $laptops[0]->getPrice() }}
                    </h5>
                    <p>
                        <ul>
                          <li> {{ $laptops[0]->getProcessor() }} processor</li>
                          <li> {{ $laptops[0]->getHddSize() }} </li>
                          <li> {{ $laptops[0]->getCpuCores() }} cores </li>
                    </p>
                </div>
            </div>

        </div>
@endsection
