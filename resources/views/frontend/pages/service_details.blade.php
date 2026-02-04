@extends('frontend.master')

@section('title', 'CEO Message')

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


    <div class="single-services-area pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details-text">

                        {{-- <div class="service-image">
                            <img src="{{ !empty($serviceItem->banner_top_image) ? url('storage/' . $serviceItem->banner_top_image) : 'https://ui-avatars.com/api/?name=' . urlencode('SS') }}"
                                alt="image">
                        </div> --}}

                        <h2>{{ $serviceItem->name }}</h2>

                        <p style="text-align: justify">{{ $serviceItem->short_descp }}</p>

                        <div class="image">

                            <img src="{{ !empty($serviceItem->banner_top_image) ? url('storage/' . $serviceItem->banner_top_image) : 'https://ui-avatars.com/api/?name=' . urlencode('SS') }}"
                                alt="ashik" style="cursor: pointer; height: 280px; width: 100%; object-fit: cover;">

                        </div>

                        <p style="text-align: justify">{!! $serviceItem->description !!}</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <h3 class="title">Our Services</h3>
                        <ul>

                            @foreach ($services as $service)
                                <li>
                                    <a href="{{ route('service.details', [$service->slug, $service->id]) }}">
                                        <i class='bx bxs-ship'></i>
                                        {{ $service->name }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
