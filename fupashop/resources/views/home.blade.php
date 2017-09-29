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
            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{ asset('dist/img/products/l1.jpg') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                            Hp specter bussines 
                        </h3>
                    </a>
                    <h5>
                        $19.99
                    </h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere sem enim, accumsan convallis risus semper.
                    </p>
                </div>
            </div>
            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{ asset('dist/img/products/tv1.jpg') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                           LG CURVED TV
                        </h3>
                    </a>
                    <h5>
                        $19.99
                    </h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere sem enim, accumsan convallis risus semper.
                    </p>
                </div>
            </div>
            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{ asset('dist/img/products/m1.jpg') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                            GAMING MONITOR
                        </h3>
                    </a>
                    <h5>
                        $19.99
                    </h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere sem enim, accumsan convallis risus semper.
                    </p>
                </div>
            </div>
            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{ asset('dist/img/products/c1.jpg') }}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                           IPHONE 20
                        </h3>
                    </a>
                    <h5>
                        $19.99
                    </h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere sem enim, accumsan convallis risus semper.
                    </p>
                </div>
            </div>
        </div>
@endsection