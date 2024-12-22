@extends('frontend.layout')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            @foreach ($kategori as $ktg)
                            <li>
                                <a href="{{ route('shop',$ktg->id) }}">{{ $ktg->nama_kategori }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down">
                                    </span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="/assets/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
       
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($allproduct as $ap)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" >
                            <img src="{{ Storage::url('upload/produk/' . $ap->gambar) }}" class="categories__item--large set-bg">
                            <h5><a href="{{ route('shop.details', $ap->id) }}">{{ $ap->nama_produk }}</a></h5>
                        </div>
                    </div>

                    @endforeach
                </div>
               
            </div>
        </div>
       
    </section>
    <!-- Categories Section End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
    </section>
    <!-- Latest Product Section End -->
@endsection
