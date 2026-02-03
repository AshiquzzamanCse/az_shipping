@extends('frontend.master')

@section('title', 'About')

@section('content')


    <!-- Page banner Area -->
    <div class="page-banner bg-3">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">

                </div>
            </div>
        </div>
    </div>
    <!-- End Page banner Area -->

    <!-- About Safe Area -->
    <div class="about-text-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-safe-text">
                        <span style="color: #f21860 !important;">About Us</span>

                        <h2>{{ optional($about)->title }}</h2>
                        <p>{!! optional($about)->long_descp !!}</p>
                    </div>

                    {{-- <div class="shipping-card">
                        <div class="shipping-contant">
                            <div class="shipping-sign">
                                <img src="{{ asset('frontend/assets/img/sign.png') }}" alt="image">
                            </div>
                            <div class="shipping-image">
                                <img src="{{ asset('frontend/assets/img/clients/client1.png') }}" alt="image">
                            </div>
                            <h3>John Doe</h3>
                            <span>CEO, Ferry</span>
                            <p>Nor again is there anyone who loves or pursues or desires to.</p>
                        </div>
                    </div> --}}

                </div>

                <div class="col-lg-3">



                    <img src="{{ !empty($about->image) ? url('storage/' . $about->image) : 'https://ui-avatars.com/api/?name=' . urlencode(optional($about)->title) }}"
                        alt="image">

                </div>

                <div class="col-lg-3">

                    <img src="{{ !empty($about->image_one) ? url('storage/' . $about->image_one) : 'https://ui-avatars.com/api/?name=' . urlencode(optional($about)->title) }}"
                        alt="image">


                </div>



            </div>
        </div>
    </div>
    <!-- End About Safe Area -->



@endsection
