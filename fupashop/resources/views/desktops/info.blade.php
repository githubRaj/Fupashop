@extends('layout.main')


@section('content')

    <html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Demo selection article</title>



        <link rel="canonical" href="/default/en/EUR/detail/10022/Demo_selection_article">


        <meta name="application-name" content="Aimeos">


        <script type="text/javascript" defer="defer" src="/default/en/EUR/stock?s_prodcode%5B0%5D=demo-article&amp;s_prodcode%5B1%5D=demo-selection-article&amp;s_prodcode%5B2%5D=demo-selection-article-1&amp;s_prodcode%5B3%5D=demo-selection-article-2"></script>

        <title>Aimeos shop :: Laravel demo</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="http://laravel.demo.aimeos.org/packages/aimeos/shop/themes/elegance/common.css">
        <link type="text/css" rel="stylesheet" href="http://laravel.demo.aimeos.org/packages/aimeos/shop/themes/elegance/aimeos.css">
        <link href="http://d1vk6qua06bsd6.cloudfront.net/css/demo.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <div class="col-xs-12">
        <section class="aimeos catalog-stage" data-jsonurl="http://laravel.demo.aimeos.org/default/jsonapi/en?currency=EUR">



            <div class="catalog-stage-image">
            </div>

        </section>
        <section class="aimeos catalog-detail" itemscope="" itemtype="http://schema.org/Product" data-jsonurl="http://laravel.demo.aimeos.org/default/jsonapi/en?currency=EUR">




            <article class="product " data-id="10022">

                <div class="catalog-detail-image"><!--
	--><!--

	--><div class="image-single" data-pswp="{bgOpacity: 0.75, shareButtons: false}">


                        <figure id="image-40205" class="item" style="background-image: url(&quot;https://demo.aimeos.org/media/2-big.jpg&quot;); background-size: contain;" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject" data-image="https://demo.aimeos.org/media/2.jpg">
                            <a href="https://demo.aimeos.org/media/2-big.jpg" itemprop="contentUrl"></a>
                            <figcaption itemprop="caption description">Demo: Selection article 2.jpg</figcaption>
                        </figure>


                    </div>


                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="pswp__bg"></div>
                        <div class="pswp__scroll-wrap">

                            <!-- Container that holds slides. Don't modify these 3 pswp__item elements, data is added later on. -->
                            <div class="pswp__container">
                                <div class="pswp__item"></div>
                                <div class="pswp__item"></div>
                                <div class="pswp__item"></div>
                            </div>

                            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                            <div class="pswp__ui pswp__ui--hidden">
                                <div class="pswp__top-bar">

                                    <div class="pswp__counter"></div>

                                    <button class="pswp__button pswp__button--close" title="Close">
                                    </button>
                                    <!-- button class="pswp__button pswp__button--share"
                                        title="Share">
                                    </button -->
                                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen">
                                    </button>
                                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out">
                                    </button>

                                    <div class="pswp__preloader">
                                        <div class="pswp__preloader__icn">
                                            <div class="pswp__preloader__cut">
                                                <div class="pswp__preloader__donut"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                    <div class="pswp__share-tooltip"></div>
                                </div>

                                <button class="pswp__button pswp__button--arrow--left" title="Previous">
                                </button>
                                <button class="pswp__button pswp__button--arrow--right" title="Next">
                                </button>

                                <div class="pswp__caption"><div class="pswp__caption__center"></div></div>

                            </div>
                        </div>
                    </div>

                </div>


                <div class="catalog-detail-basic">
                    <h1 class="name" itemprop="name">Product details</h1>
                    <p class="code">
                        <span class="name">Article no.:</span>
                        <span class="value" itemprop="sku">demo-selection-article</span>
                    </p>
                    <p class="short" itemprop="description">This is the short description of the selection demo article.</p>
                </div>


                <div class="catalog-detail-basket" data-reqstock="1" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">

                    <div class="price-list">
                        <div class="articleitem price-actual" data-prodid="10022" data-prodcode="demo-selection-article">

                            <meta itemprop="price" content="150.00">


                            <div class="price-item default" itemprop="priceSpecification" itemscope="" itemtype="http://schema.org/PriceSpecification">

                                <meta itemprop="valueAddedTaxIncluded" content="true">
                                <meta itemprop="priceCurrency" content="EUR">
                                <meta itemprop="price" content="150.00">

                                <span class="quantity" itemscope="" itemtype="http://schema.org/QuantitativeValue">
			<meta itemprop="minValue" content="1">
			from 1		</span>

                                <span class="value">
			€ 150.00		</span>
                            </div>
                        </div>
                    </div>


                    <form method="POST" action="/default/en/EUR/basket">
                        <input class="csrf-token" type="hidden" name="_token" value="i7nAcGznnox5WTRXe62bc3pkyBG5yh3EKloajaQa">

                        <br><br><br><br><br><br><br><br><br><br><br><br><br>

                        <div class="addbasket">
                            <div class="group">
                                <button class="standardbutton btn-action btn-disabled" type="submit" value="" disabled="disabled">
                                    Add to cart							</button>
                            </div>
                        </div>

                    </form>

                </div>


                <div class="catalog-actions">

                    <a class="actions-button actions-button-pin" href="/default/en/EUR/detail/pin/add/10022/10022/Demo_selection_article/1" title="Pin"></a>


                    <a class="actions-button actions-button-watch" href="/default/en/EUR/myaccount/watch/add/10022/10022/Demo_selection_article/1" title="watch"></a>


                    <a class="actions-button actions-button-favorite" href="/default/en/EUR/myaccount/favorite/add/10022/10022/Demo_selection_article/1" title="favorite"></a>

                </div>


                <div class="catalog-social">

                    <a class="social-button social-button-facebook" href="https://www.facebook.com/sharer.php?u=http%3A%2F%2Flaravel.demo.aimeos.org%2Fdefault%2Fen%2FEUR%2Fdetail%2F10022%2FDemo_selection_article&amp;t=Demo_selection_article" title="facebook" target="_blank"></a>


                    <a class="social-button social-button-gplus" href="https://plus.google.com/share?url=http%3A%2F%2Flaravel.demo.aimeos.org%2Fdefault%2Fen%2FEUR%2Fdetail%2F10022%2FDemo_selection_article" title="gplus" target="_blank"></a>


                    <a class="social-button social-button-twitter" href="https://twitter.com/share?url=http%3A%2F%2Flaravel.demo.aimeos.org%2Fdefault%2Fen%2FEUR%2Fdetail%2F10022%2FDemo_selection_article&amp;text=Demo_selection_article" title="twitter" target="_blank"></a>


                    <a class="social-button social-button-pinterest" href="https://pinterest.com/pin/create/button/?url=http%3A%2F%2Flaravel.demo.aimeos.org%2Fdefault%2Fen%2FEUR%2Fdetail%2F10022%2FDemo_selection_article&amp;description=Demo_selection_article&amp;media=https%3A%2F%2Fdemo.aimeos.org%2Fmedia%2F2-big.jpg" title="pinterest" target="_blank"></a>

                </div>
                <div class="catalog-detail-additional">

                    <div class="additional-box">
                        <h2 class="header description">Description</h2>
                        <div class="content description" style="display: block;">
                            <div class="long item">Add a detailed description of the selection demo article that may be a little bit longer.</div>
                        </div>
                    </div>

                    <div class="additional-box">
                        <h2 class="header attributes">Characteristics</h2>
                        <div class="content attributes" style="display: block;">
                        </div>
                    </div>



                </div>

                <div class="footer-section">
                </div>
            @endsection
            <!-- Scripts -->
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
                <script type="text/javascript" src="http://laravel.demo.aimeos.org/packages/aimeos/shop/themes/jquery-ui.custom.min.js"></script>
                <script type="text/javascript" src="http://laravel.demo.aimeos.org/packages/aimeos/shop/themes/aimeos.js"></script>
                <script type="text/javascript" src="http://laravel.demo.aimeos.org/packages/aimeos/shop/themes/elegance/aimeos.js"></script>

                <script type="text/javascript" src="http://laravel.demo.aimeos.org/packages/aimeos/shop/themes/aimeos-detail.js"></script>


    </body></html>

