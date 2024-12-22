@extends('frontend.layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" style="background-image: url('{{ asset('assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad" >
        <div class="container">
            <div class="checkout__form">
                <div >
                    <div class="checkout__order">
                        <h4>Your Order</h4>
                        <div class="checkout__order__products">Products <span>Total</span></div>
                        <ul>
                            <li>{{ $produk->nama_produk }}<span>{{ $produk->harga }}</span></li>
                        </ul>
                        <div class="checkout__order__subtotal">Subtotal <span>{{ $produk->harga }}</span></div>
                        <p>Pembayaran COD</p>
                        <button type="submit" class="site-btn">ORDER</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
