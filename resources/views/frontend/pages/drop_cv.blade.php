@extends('frontend.master')

@section('content')
    <style>
        @media (max-width: 767.98px) {
            .sign-in-area {
                padding-top: 150px !important;
            }
        }
    </style>

    <div class="page-banner bg-3 d-none d-lg-block">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">

                </div>
            </div>
        </div>
    </div>

    <div class="sign-in-area mb-5" style="margin-top: 50px">
        <div class="container">
            <div class="section-title">
                <h2>Apply For Job</h2>
                <p>A concise and compelling job description will play a major role in attracting qualified candidates.
                </p>
            </div>
            <div class="sign-in-form">

                <form method="POST" action="{{ route('apply.job.post') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="" class="mb-2">Rank Name:</label>

                                <select name="job_id" class="form-control" id="">
                                    <option disabled selected></option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->rank }}</option>
                                    @endforeach
                                </select>

                                @error('job_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div> --}}

                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="" class="mb-2">Name:</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="" class="mb-2">Email:</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="" class="mb-2">Phone:</label>
                                <input type="number" name="phone" class="form-control" id="phone"
                                    placeholder="Enter Phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="" class="mb-2">Passport Number:</label>
                                <input type="text" class="form-control" name="passport_number" id="passport_number"
                                    placeholder="Passport Number" value="{{ old('passport_number') }}">
                                @error('passport_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="" class="mb-2">CDC Number:</label>
                                <input type="text" class="form-control" name="cdc_number" id="cdc_number"
                                    placeholder="CDC Number" value="{{ old('cdc_number') }}">
                                @error('cdc_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="" class="mb-2">Nationality:</label>
                                <input type="text" class="form-control" name="nationality" id="nationality"
                                    placeholder="Type Country Name" value="{{ old('nationality') }}">
                                @error('nationality')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-lg-12">
                            <div class="">
                                <label for="" class="mb-2">Drop CV</label>
                                <input type="file" name="attachment" class="form-control my-auto">
                                @error('attachment')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group form-check text-center mt-4">
                        <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I agree to the terms & conditions.<span
                                class="text-primary"><a href="" data-bs-toggle="modal"
                                    data-bs-target="#policyModal">Terms & Policy</a> </span></label>
                        @error('agree')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn default-btn-one">Apply Post</button>
                    </div>

                </form>

                <p class="mt-3 fs-6 fw-bold">Download AZ Shipping CV format Fill and Upload it, It will help us.</p>
                <a href="{{ asset('frontend/file/CV OF AZSS.docx') }}" download
                    style="color: inherit; text-decoration: underline;">Download Here</a>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="policyModal" tabindex="-1" aria-labelledby="policyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="policyModalLabel">Terms & Policy</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    @if (optional($policy)->content == null)
                        <p>No Terms & Policy Avaiable</p>
                    @else
                        {!! $policy->content !!}
                    @endif

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
