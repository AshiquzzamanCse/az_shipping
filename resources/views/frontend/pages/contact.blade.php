@extends('frontend.master')
@section('content')
    {{-- <style>
        .image-container {
            height: 500px;
        }

        img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            /* or use 'contain' based on your needs */
        }
    </style> --}}

    <div class="image-container">
        {{-- <img src="{{ asset('frontend/img/page-banner/banner1.jpg') }}" alt=""> --}}
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.675750540797!2d91.8035542!3d22.3280995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd9b3d4fcc923%3A0xb638f08bdb4b4469!2sA.Z.Shipping%20Services!5e0!3m2!1sen!2sbd!4v1730271303687!5m2!1sen!2sbd"
            width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="pt-100 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info">
                        <i class="bx bxs-phone"></i>
                        <h4>Contact Number</h4>
                        <p> <a href="tel:+0123654987">{{ optional($setting)->primary_phone }}</a></p>
                        <p><a href="tel:+0123456789">{{ optional($setting)->secondary_phone }}</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info">
                        <i class="bx bxs-location-plus"></i>
                        <h4>Our Location</h4>
                        <p>{{ optional($setting)->address_line_one }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="contact-info">
                        <i class="bx bxs-envelope"></i>
                        <h4>Contact Number</h4>
                        <p>{{ optional($setting)->primary_email }}
                        </p>
                        <p>{{ optional($setting)->support_email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-form-area pb-70">
        <div class="container">

            <div class="section-title">
                {{-- <span>Contact Us</span> --}}
                <h2>Get in Touch</h2>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="contact-form">



                        <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"
                                            data-error="Please enter your name" placeholder="Your name"
                                            value="{{ old('name') }}">
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                            data-error="Please enter your email" placeholder="Your email address"
                                            value="{{ old('email') }}">
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control"
                                            data-error="Please enter your phone number" placeholder="Your phone number"
                                            value="{{ old('phone') }}">
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control"
                                            data-error="Please enter your subject" placeholder="Your Subject"
                                            value="{{ old('subject') }}">
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" cols="30" rows="6" data-error="Please enter your message"
                                            placeholder="Write your message...">{{ old('message') }}</textarea>
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12 mt-3">
                                    <button type="submit" class="default-btn-one">Send Message</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const recaptchaResponse = grecaptcha.getResponse();
            if (recaptchaResponse.length === 0) {
                event.preventDefault(); // Prevent form submission
                alert('Please complete the reCAPTCHA.');
            }
        });
    </script>
@endsection
